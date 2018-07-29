<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_GET['delid'] != "" && $_GET['id'] != "") {
	$sqdel = "delete from posa_tb where id='".$_GET['delid']."'";
	$resdel = mysql_query($sqdel);	
	header("location: add_posa.php?id=".$_GET['id']);
	exit;
}

// Form submission
if(isset($_POST['Submit'])) {
	//echo "<pre>";	print_r($_POST);

	if(ini_get("magic_quotes_gpc") != 1) {
		foreach($_POST as $key => $val)
			$_POST[$key] = addslashes($val);
	}

	$file = $_FILES['docs']['name'];

	if($file != "") {
		move_uploaded_file($_FILES['docs']['tmp_name'], 'uploads/'.$file);
	} 

	if($_POST['id'] != "") {
		$sqls = "update posa_tb set 
		customer = '".$_POST['customer']."', 
		part_no = '".$_POST['part_no']."', 
		rev = '".$_POST['rev']."', 
		ourpo = '".$_POST['ourpo']."', 
		custpo = '".$_POST['custpo']."', 
		qty = '".$_POST['qty']."', 
		qty2 = '".$_POST['qty2']."', 
		pdate = STR_TO_DATE('".$_POST['pdate']."', '%m-%d-%Y'), 
		courier = '".$_POST['courier']."',
		duedate = STR_TO_DATE('".$_POST['duedate']."', '%m-%d-%Y'), 
		note = '".$_POST['note']."',
		vid = '".$_POST['vid']."'".
		($file != '' ? ", docs = '".$file."'" : "")." 
		where id = '".$_POST['id']."'";
	} else {
		$sqls = "insert into posa_tb (customer, part_no, rev, ourpo, custpo, qty, qty2, pdate, courier, duedate, note, docs, vid) values ('".$_POST['customer']."', '".$_POST['part_no']."', '".$_POST['rev']."', '".$_POST['ourpo']."', '".$_POST['custpo']."', '".$_POST['qty']."', '".$_POST['qty2']."', '".$_POST['pdate']."', '".$_POST['courier']."', '".$_POST['duedate']."', '".$_POST['note']."', '".$file."', '".$_POST['vid']."')";
	}

	//echo $sqls;
	$ress = mysql_query($sqls);
	header('location: manage_posa.php');
}

//Edit Case
$id = isset($_GET['id']) ? trim($_GET['id']) : "";
$title = ($id != '' ? 'Edit' : 'Add').' Pending Order / Stock Allocation';
if($id != "") {
	$sqls = "select * from posa_tb where id='".$id."'";
	$ress = mysql_query($sqls);
	if($ress) {
		$rows = mysql_fetch_assoc($ress);
		$pdate	= $rows['pdate'];
		$duedate	= $rows['duedate'];
	}
}
if($pdate == '') $pdate	= date('m-d-Y');
if($duedate == '') $duedate	= date('m-d-Y');

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

<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();

jQuery(document).ready(function(){
	$j('#lookup').autocomplete({source:'getstocks.php', minLength:1});	
});

function setVals() {
	var selval = $j('#lookup').val().split('_');
	if(selval.length > 1) {
		$j('#customer').val(selval[0]);
		$j('#part_no').val(selval[1]);
		$j('#rev').val(selval[2]);
		$j('#qty').val(selval[3]);
	}
}

function geturl(addr) {  
	var r = $j.ajax({  
	type: 'GET',  
	url: addr,  
	async: false  
	}).responseText;  
	return r;  
}  
  
function del(id) {
	var id = "<?php echo $_REQUEST['id'] ?>";
	if(id != "" ) {
	var answer = confirm ("Do you want to delete the record");

	if(answer) 
		location.href = "add_stock.php?delid="+id+"&id="+id;
	else 
		return false;
	}
}
</script>
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
<script type="text/javascript"> 
window.addEvent('domready', function() {
new CalendarEightysix('pdate', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%m-%d-%Y', 'draggable': true, 'defaultDate': '<?php echo $pdate; ?>' });
});
window.addEvent('domready', function() {
new CalendarEightysix('duedate', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%m-%d-%Y', 'draggable': true, 'defaultDate': '<?php echo $duedate; ?>' });
});
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
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>


<form name="form1" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td width='20%'>Lookup ID:</td><td><input name="lookup" type="text" id="lookup" size="30" onChange="setTimeout(function() {setVals();},250);" ></td>
</tr>
<tr>
	<td width='20%'>Customer:</td><td><input name="customer" type="text" id="customer" size="30" value="<?php echo $rows['customer'] ?>"></td>
</tr>
<tr>	
	<td>Part #:</td><td><input name="part_no" type="text" id="part_no" size="30" value="<?php echo $rows['part_no'] ?>"></td>
</tr>
<tr>
	<td>Rev:</td><td><input name="rev" type="text" id="rev" size="30" value="<?php echo $rows['rev'] ?>" ></td>
</tr>
		
<tr>
	<td height="30">Our PO:</td><td><input name="ourpo" type="text" id="ourpo" size="30" value="<?php echo $rows['ourpo'] ?>" ></td>
</tr>

<tr>
	<td height="30">Customer PO:</td><td><input name="custpo" type="text" id="custpo" size="30" value="<?php echo $rows['custpo'] ?>" ></td>
</tr>

<tr>
	<td height="30">Stock Qty:</td><td><input name="qty" type="text" id="qty" size="30" value="<?php echo $rows['qty'] ?>" ></td>
</tr>

<tr>
	<td height="30">Quantity:</td><td><input name="qty2" type="text" id="qty2" size="30" value="<?php echo $rows['qty2'] ?>" ></td>
</tr>

<tr>
	<td height="30">Expected Date:</td><td><input name="pdate" type="text" id="pdate" size="30" value="<?php echo $rows['pdate'] ?>" ></td>
</tr>

<tr>
	<td height="30">Courier:</td><td><input name="courier" type="text" id="courier" size="30" value="<?php echo $rows['courier'] ?>" ></td>
</tr>

<tr>
	<td height="30">Due Date:</td><td><input name="duedate" type="text" id="duedate" size="30" value="<?php echo $rows['duedate'] ?>" ></td>
</tr>

<tr>
	<td height="30">Attach Docs:</td><td><input name="docs" type="file" size="30" ><?php echo $rows['docs'] ?></td>
</tr>

<tr>
	<td height="30">Note:</td>
	<td><textarea  name="note" id="note" cols="70" rows="2"><?php echo $rows['note'] ?></textarea></td>
</tr>

<tr>
	<td height="30">Vendor:</td><td><select name="vid" id="vid">
	<?php 
	echo "<option value='' >Select Vendor</option>";
	$sqv = "select * from vendor_tb order by c_name";
	$resv = mysql_query($sqv) or die('err');
	while($rwv = mysql_fetch_assoc($resv)) {			
		echo "<option value='".$rwv['data_id']."' ".($rows['vid'] == $rwv['data_id'] ? ' SELECTED ' : '' )." >".$rwv['c_name']."</option>";
	}
	?>
	</select></td>
</tr>

<tr>
	<td height="30"></td>
	<td><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset"> &nbsp;&nbsp;<a href="manage_posa.php">Go to Manage Pending Orders/Stock Allocation</a></td>
</tr>

</table>
</form>


</td>
</tr>
</table>

</body>
</html>