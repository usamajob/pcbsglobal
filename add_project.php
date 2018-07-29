<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from project_quotes where id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}
// Form submission
if(isset($_REQUEST['Submit'])) {
	//echo "<pre>";	print_r($_REQUEST); exit;

	if($_REQUEST['pid'] != "") {
		$sqls = "update project_tb set 
		project_name = '".escpe($_REQUEST['project'])."', 
		validity = '".escpe($_REQUEST['validity'])."' 
		where pid = '".$_REQUEST['pid']."'";
		$pid = $_REQUEST['pid'];
		$ress = mysql_query($sqls);
	} else {
		$sqls = "insert into project_tb (project_name, create_dt, validity) values ('".$_REQUEST['project']."', now(), '".$_REQUEST['validity']."')";
		$ress = mysql_query($sqls);
		$pid = mysql_insert_id();
		//echo $pid;
	}

	//echo $sqls;
	if(isset($_POST['quotes']) && count($_POST['quotes']) > 0) {
		$sqls2 = "insert ignore into project_quotes (pid, quote_id) values "; 
		foreach($_POST['quotes'] as $k => $v) 
			$sqls2 .= "('".$pid."', '".$v."'), ";

		$res2 = mysql_query(substr($sqls2, 0, -2)) or die(mysql_error().$sqls2);
	}
	
	header('location: manage_project.php');
}

//Project Edit Case
$projid = isset($_REQUEST['pid']) ? trim($_REQUEST['pid']) : "";
$title = ($projid != "" ? "Edit Project #".$projid : "Add Project");
if($projid != "") {
	$sqls = "select * from project_tb where pid='".$projid."'";
	$ress = mysql_query($sqls);
	if($ress) $rows = mysql_fetch_assoc($ress);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/IE-7.css"/>
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="css/IE-8.css" />
<![endif]-->
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/IE-9.css" />
<![endif]-->

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();

jQuery(document).ready(function(){
	$j('#btnsrch').click(function(){
		qt = document.getElementById('srch').value;
		$j('#quotelist').html(geturl('getQuotes.php?keywrd=' + qt));
	});

	$j("select option").livequery('mousedown', function (e) {
		this.selected = !this.selected;
		e.preventDefault();
	});

});

function geturl(addr) {  
	var r = $j.ajax({  
	type: 'GET',  
	url: addr,  
	async: false  
	}).responseText;  
	return r;  
}  
  
function del(id, pid) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href = "add_project.php?pid=" + pid+"&delid=" + id;
	}
	else {
		return false;
	}
}
</script>

<script type="text/javascript" src="js/gotowelcome.js"></script> 

<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>

</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>

<form name="form1" method="post">
<input type="hidden" name="pid" value="<?php echo $projid; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td width="35%">Project Name:</td><td><input name="project" type="text" id="project" size="30" value="<?php echo $rows['project_name'] ?>"></td>
</tr>

<tr>
	<td width="35%">Validity:</td><td><input name="validity" type="text" id="validity" size="30" value="<?php echo $rows['validity'] ?>"> days</td>
</tr>

<tr>
	<td width="35%">Search quotes:</td>
	<td><input type="text" name="srch" id="srch"><input type="button" value="Search" id="btnsrch"></td>
</tr>

<tr>
	<td width="35%">Add Quotes:</td><td>
	<select id='quotelist' size='10' multiple name='quotes[]'>
	<?php
	echo "<option value=''>----Select Quotes----</option>";
	$query = "select ord_id, cust_name, part_no, rev from order_tb where cust_name <> '' and part_no <> '' and simplequote <> '1' order by trim(cust_name)";
	$result = mysql_query($query) or die();

	if(mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_assoc($result)) {
			echo "<option value='".$row['ord_id']."'>".$row['cust_name']." - ".$row['part_no']." ".$row['rev']."</option>";
		}
	}
	?>
	</select>
	</td>
</tr>

<tr>
	<td height="30"><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset"></td>
	<td><a href="manage_project.php">Go back to Manage Project</a></td>
</tr>

</table>

</form>
<?php
if($projid != "") {
	$sqlq = "select p.*, o.cust_name, o.part_no, o.rev from project_quotes p inner join order_tb o on p.quote_id=o.ord_id where p.pid='".$projid."'";
	$resq = mysql_query($sqlq);
	if($resq) {
		echo '<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">';
		echo "<tr><td colspan='5'><h3>Quotes List</h3></td></tr>";
		echo "<tr>
				<th>Quote#</th>
				<th>Customer</th>
				<th>Part No.</th>
				<th>Rev</th>
				<th>Action</th>
			</tr>";
		while($rowq = mysql_fetch_assoc($resq)){
			echo "<tr>
				<td class='ctr'>".$rowq['quote_id']."</td>
				<td>".$rowq['cust_name']."</td>
				<td>".$rowq['part_no']."</td>
				<td>".$rowq['rev']."</td>
				<td class='ctr'><a style='cursor:pointer' onclick=\"del('".$rowq['id']."','".$projid."');\">Delete</a></td>
			</tr>";
		}
		echo "</table>";
	}
}
?><p><br>
</td>
</tr>
</table>

</body>
</html>