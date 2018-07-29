<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from rep_tb where repid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	header("location: manage_sales_rep.php");
	exit;
}

//Sales Rep List
$title = "Manage Sales Rep";

// Paging Code Starts
// how many rows to show per page 
$rowsPerPage = 15; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) { 
	$pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 

$sqls = "select * from rep_tb";

if(isset($_GET['srchc'])) {
	$srchc = $_GET['srchc'];
	$sqls .= " where r_name like '".escpe($srchc)."' ";
}

$sqls .= " ORDER BY repid ";

$cres  = mysql_query($sqls) or die('Error, query failed'); 
$numrows = mysql_num_rows($cres);

// how many pages we have when using paging? 
$maxPage = ceil($numrows/$rowsPerPage); 

// print the link to access each page
$self = $_SERVER['PHP_SELF']; 

$nav = ''; 

$srchstr = '';
if( isset($_GET['srchc']) && trim($_GET['srchc']) != '' )
	$srchstr = '&srchc='.trim($_GET['srchc']);

for($page = 1; $page <= $maxPage; $page++) { 

	if ($page == $pageNum) { 
		$nav .= " $page ";   // no need to create a link to current page 
	} 
	else  { 
		if($page == 1)
		$nav .= " <a href=\"$self\">$page".str_replace('&','?',$srchstr)."</a> "; 
		else
			$nav .= " <a href=\"$self?page=$page".$srchstr."\">$page</a> "; 
	}
} 


// creating previous and next link 
// plus the link to go straight to 
// the first and last page 

if ($pageNum > 1) { 
	$page = $pageNum - 1; 
	$prev = " <a href=\"$self?page=$page".$srchstr."\">[Prev]</a> "; 
	$first = " <a href=\"$self".str_replace('&','?',$srchstr)."\">[First Page]</a> "; 
}
else { 
	$prev  = '&nbsp;'; // we're on page one, don't print previous link
	$first = '&nbsp;'; // nor the first page link 
} 						

if ($pageNum < $maxPage) { 
	$page = $pageNum + 1; 
	$next = " <a href=\"$self?page=$page".$srchstr."\">[Next]</a> ";
	$last = " <a href=\"$self?page=$maxPage".$srchstr."\">[Last Page]</a> "; 
}  
else  { 
	$next = '&nbsp;'; // we're on the last page, don't print next link 
	$last = '&nbsp;'; // nor the last page link 
}

//Final query 
$sqls .= " LIMIT $offset, $rowsPerPage ";

$ress = mysql_query($sqls);
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
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
<script type="text/javascript">

function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) location.href = "manage_sales_rep.php?delid="+id;
	else return false;
}
</script>

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
</table><!-- Header Ends -->

<table border="0" cellpadding="0" cellspacing="0" width="99%">
<tr>
	<td align="center" valign="top" style="line-height: 16px; width: 200px"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'> <!-- Sales Rep List -->

	<form name="form1" method="get" action="">

		<table align='center' border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >

		  <tr>
			<td height="30" colspan="2"><strong>Search By </strong></td>
		  </tr>		  

		  <tr>
			<td width="180" height="30">Search By Rep Name</td>
			<td width="300" height="30">
			<select name="srchc" id="srchc" onChange="this.form.submit();">

				<option value="">--select Rep--</option>

				<?php 
				$sqc = "select DISTINCT r_name from rep_tb order by r_name";

				$resc = mysql_query($sqc) or die('error in data');

				while($rwc = mysql_fetch_assoc($resc)) {
				?>

				<option value="<?php echo $rwc['r_name'];?>" <?php if($rwc['r_name'] == $_REQUEST['srchc']){ ?> selected <?php } ?> ><?php echo $rwc['r_name'] ?></option>

				<?php 
				}

				?>
				</select></td>
		  </tr>

		</table>
	</form>
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
		<td colspan="3"><a href="add_sales_rep.php">Add Sales Rep</a></td>	
	</tr>

	<tr>
	  <td height="30" colspan="5" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td height="30" class="hdrow">ID#</td>
		<td class="hdrow">Rep Name</td>
		<td class="hdrow">Edit</td>
		<td class="hdrow">Delete</td>
	</tr>

	<?php
	if($ress) {
		while($rows = mysql_fetch_assoc($ress)) {

			echo "<tr>
				<td height='25' class='ctr'>".$rows['repid']."</td>
				<td class='ctr'>".$rows['r_name']."</td>	
				<td class='ctr'><a href='add_sales_rep.php?repid=".$rows['repid']."'>Edit</a></td>
				<td class='ctr'><a href='#' onclick=\"del(".$rows['repid'].");\">Delete</a></td>
			</tr>";
		}
	}
	?>
	</table>

	</td>
</tr>
</table>

</body>
</html>