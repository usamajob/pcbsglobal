<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "" && $_REQUEST['stkid'] != "") {
	$sqdel = "delete from stock_ret where rid='".$_REQUEST['delid']."'";
	$resdel = mysql_query($sqdel);	
	header("location: add_stock.php?stkid=".$_REQUEST['stkid']);
	exit;
}

// Form submission
if(isset($_REQUEST['Submit']) && $_REQUEST['stkid'] != "") {
	//echo "<pre>";
	//print_r($_REQUEST);

	if(ini_get("magic_quotes_gpc") != 1) {
		foreach($_REQUEST as $key => $val)
			$_REQUEST[$key] = addslashes($val);
	}

	if($_REQUEST['rid'] != "") {

		$sqlr = "update stock_ret set 
		dtretrieve = '".$_REQUEST['dateret']."', 
		uprice = '".$_REQUEST['uprice']."', 
		qty = '".$_REQUEST['qty']."', 
		comments = '".$_REQUEST['area']."' 
		where stkid = '".$_REQUEST['stkid']."' and rid='".$_REQUEST['rid']."'";

	} else {

		$sqlr = "insert into stock_ret (stkid, dtretrieve, uprice, qty, comments) values ('".$_REQUEST['stkid']."', '".$_REQUEST['dateret']."', '".$_REQUEST['uprice']."', '".$_REQUEST['qty']."', '".$_REQUEST['area']."')";
	}

	$resr = mysql_query($sqlr);
	header('location: add_stock.php?stkid='.$_REQUEST['stkid']);
}

//Edit Case
$rid = isset($_REQUEST['rid']) ? trim($_REQUEST['rid']) : "";
$stockid = isset($_REQUEST['stkid']) ? trim($_REQUEST['stkid']) : "";
$title = ($rid != "" ? "Edit Stock Retrieved" : "Retrieve Stock");
if($rid != "") {
	$sqlr = "select * from stock_ret where rid='".$rid."'";
	$resr = mysql_query($sqlr);
	if($resr) $rowr = mysql_fetch_assoc($resr);
	$stockid = $rowr['stkid'];
	$dateret = $rowr['dtretrieve'];
}

if($dateret == "") $dateret = date('m-d-Y');

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
<script type="text/javascript"> 
var $j = jQuery.noConflict();

jQuery(document).ready(function(){

	$j(".cprice").change(function() {
		var totprice = 0;
		var qty = $j('#qty').val();
		var uprice = $j('#uprice').val();
		if (!isNaN(qty) && !isNaN(uprice)) {
			var totprice = qty * uprice;
		}
		$j('#total').html('<strong>Total:</strong> $'+totprice.toFixed(2));
	});
});

</script>
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript"> 
window.addEvent('domready', function() {
new CalendarEightysix('dateI', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true, 'defaultDate': '<?php echo substr($dateret, -10);  ?>'  });
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

	<td>

<form name="form1" method="post">
<input type="hidden" name="stkid" value="<?php echo $stockid; ?>">
<input type="hidden" name="rid" value="<?php echo $rid; ?>">
 
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="6"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30">Date Retrieved:</td><td><input name="dateret" type="text" id="dateI" size="30" value="<?php echo $rowr['dtretrieve'] ?>" ></td>
	<td>Unit Price:</td><td><input name="uprice" type="text" id="uprice" size="20" class="cprice" value="<?php echo $rowr['uprice'] ?>" ></td>
	<td>Qty:</td><td><input name="qty" type="text" id="qty" size="5" class="cprice" value="<?php echo $rowr['qty'] ?>" ></td>
</tr>

<tr>
	<td height="20" colspan="2"></td>
	<td class='ctr' colspan="4" id="total"><strong>Total:</strong> $<?php echo ($rowr['qty']*$rowr['uprice']) ?></td>
</tr>

<tr>
	<td height="30">Comments:</td>
	<td colspan="5"><textarea name="area" id="area" cols="45" rows="3"><?php echo $rowr['comments'] ?></textarea></td>
</tr>

<tr>
	<td height="30"></td>
	<td><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset"></td>
	<td colspan="4"><?php if($stockid != "") echo '<a href="add_stock.php?stkid='.$stockid.'">Go back to Stock Added #'.$stockid.'</a>'; ?></td>
</tr>

</table>

</form>

</td>
</tr>
</table>

</body>
</html>