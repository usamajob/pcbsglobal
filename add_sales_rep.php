<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_POST['Submit'])) {
	$invsoldto = (is_array($_POST['invsoldto']) ? implode('|',$_POST['invsoldto']) : $_POST['invsoldto']);
	if($_POST['repid'] > 0) {
		$sqin = "UPDATE rep_tb set r_name='".escpe($_POST['repname'])."', c_name='".escpe($_POST['compname'])."', c_email='".escpe($_POST['txtemail'])."', c_address='".escpe($_POST['txtaddress'])."', c_address2='".escpe($_POST['txtaddress2'])."', c_address3='".escpe($_POST['txtaddress3'])."', c_phone='".escpe($_POST['txtphone2'])."', c_fax='".escpe($_POST['txtfax2'])."', c_website='".escpe($_POST['txtweb'])."', e_payment='".escpe($_POST['txtepay'])."',
		e_comments='".escpe($_POST['txtecomments'])."',
		invsoldto='|".escpe($invsoldto)."|',
		comval='".escpe($_POST['comval'])."',		
		indirect='".(isset($_POST['indirect']) ? '1' : '0')."' where repid='".$_POST['repid']."'";
	}
	else {
		$sqin = "insert into rep_tb (r_name, c_name, c_email, c_address, c_address2, c_address3, c_phone, c_fax, c_website, e_payment, e_comments, indirect, invsoldto, comval) values('".escpe($_POST['repname'])."', '".escpe($_POST['compname'])."', '".escpe($_POST['txtemail'])."', '".escpe($_POST['txtaddress'])."', '".escpe($_POST['txtaddress2'])."', '".escpe($_POST['txtaddress3'])."', '".escpe($_POST['txtphone2'])."', '".escpe($_POST['txtfax2'])."', '".escpe($_POST['txtweb'])."', '".escpe($_POST['txtepay'])."', '".escpe($_POST['txtecomments'])."',  '".(isset($_POST['indirect']) ? '1' : '0')."', '|".escpe($invsoldto)."|', '".escpe($_POST['comval'])."')";
	}
	//echo $sqin;

	$resin = mysql_query($sqin) or die('error in data'.mysql_error());

	header('location: manage_sales_rep.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Sales Rep</title>
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

<link href="style_Admin.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script> 
<script type="text/javascript">
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': 
                window.location.href = 'welcome.php';
                break;
        }
    });
});
</script>
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

<?php $title = 'Add';
if( isset($_GET['repid']) && $_GET['repid'] > 0 ) {
	$title = 'Submit';
	$sql = " select * from rep_tb where repid='".escpe($_GET['repid'])."'";
	$res = mysql_query($sql) or die('select list error');
	if(mysql_num_rows($res) > 0) $rrow = mysql_fetch_assoc($res);
}
?>

<form name="form1" method="post" action="">
<input type="hidden" name="repid" value="<?php echo $rrow['repid'] ?>">

<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="80%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title ?> SALES REP</strong></td>
</tr>

<tr>
	<td width="140" height="30">Rep's Name</td>
	<td height="30"><label><input type="text" name="repname" id="repname" size="35" value="<?php echo $rrow['r_name'] ?>" /></label></td>
</tr>

<tr>
	<td height="30">Company Name</td>
	<td height="30"><label><input type="text" name="compname" id="compname" size="35" value="<?php echo $rrow['c_name'] ?>"  /></label></td>
</tr>

<tr>
	<td height="30">Customer Represented</td>
	<td height="30"><select name="invsoldto[]" size="5" id="invsoldto" multiple>
	<option value="" >Select Customer Represented</option>
	<?php 
	$sqv = "select * from data_tb ORDER BY c_name";
	$resv = mysql_query($sqv) or die('err');

	while($rwv = mysql_fetch_assoc($resv)) { ?>
	<option value="<?php echo $rwv['data_id']; ?>" <?php if( strstr($rrow['invsoldto'], '|'.$rwv['data_id'].'|') ) { ?> selected <?php } ?> ><?php echo $rwv['c_name']; ?></option>
	<?php 
	}
	?></select></td>
</tr>

<tr>
	<td height="30">Commision%</td>
	<td height="30"><input id="comval" name="comval" type="text" size="4" maxlength="8" value="<?php echo $rrow['comval'] ?>"></td>
</tr>

<tr>
	<td height="30">Address 1</td>
	<td height="30"><label><input type="text" name="txtaddress" id="txtaddress" size="35" value="<?php echo $rrow['c_address'] ?>"  /></label></td>
</tr>

<tr>
	<td height="30">Address 2</td>
	<td height="30"><label><input type="text" name="txtaddress2" id="txtaddress2" size="35" value="<?php echo $rrow['c_address2'] ?>"  /></label></td>
</tr>

<tr>
	<td height="30">Address 3</td>
	<td height="30"><label><input type="text" name="txtaddress3" id="txtaddress3" size="35" value="<?php echo $rrow['c_address3'] ?>"  /></label></td>
</tr>

<tr>
	<td width="146" height="30">Phone</td>
	<td width="292" height="30"><label><input name="txtphone2" type="text" id="txtphone2" size="35" value="<?php echo $rrow['c_phone'] ?>" ></label></td>
</tr>

<tr>
	<td height="30">Fax</td>
	<td height="30"><input name="txtfax2" type="text" id="txtfax2"  size="35" value="<?php echo $rrow['c_fax'] ?>" ></td>
</tr>

<tr>
	<td height="30">Website</td>
	<td height="30"><input name="txtweb" type="text" id="txtweb" size="35" value="<?php echo $rrow['c_website'] ?>" ></td>
</tr>

<tr>
	<td height="30">Payment Terms</td>
	<td height="30"><input name="txtepay" type="text" id="txtepay" size="35" value="<?php echo $rrow['e_payment'] ?>" ></td>
</tr>

<tr>
	<td height="30">Comments</td>
	<td height="30"><textarea name="txtecomments" id="txtecomments" cols="35" rows="5"><?php echo $rrow['e_comments'] ?></textarea></td>
</tr>

<tr>
	<td height="30">Rep type</td>
	<td height="30"><input type="checkbox" name="indirect" value="1" <?php echo ( isset($rrow['indirect']) && $rrow['indirect'] == 1 ? ' CHECKED ' : ''  ); ?> > Indirect (Leave unchecked for "Direct" Rep)</td>
</tr>

<tr>
	<td height="30">&nbsp;</td>
	<td height="30">&nbsp;</td>
</tr>

<tr>
	<td height="30" colspan="2">
	<input type="submit" name="Submit" id="Submit" value="<?php echo $title; ?>">
	</td>
</tr>

</table>

<p>&nbsp;</p><p>&nbsp;</p>

</form>


</td>
</tr>
</table>

</body>
</html>