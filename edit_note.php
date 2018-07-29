<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

// Form submission
if(isset($_POST['Submit'])) {
	$sqls = "update notes_tb set ntext='".escpe($_POST['ntext'])."' where ntype='".$_POST['ntype']."'";

	//echo $sqls;
	$ress = mysql_query($sqls) or die(mysql_error());
	header('location: manage_notes.php');
}

//Note Edit Case
$ntype = isset($_GET['ntype']) ? trim($_GET['ntype']) : "";
if($ntype != "") {
	$sqlp = "select * from notes_tb where ntype='".$ntype."'";
	$resp = mysql_query($sqlp);
	$orClause = "";
	if($resp) { 
		$nrow = mysql_fetch_assoc($resp);
		$title = "Note: ".$nrow['ntitle'];		
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
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
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
<input type="hidden" name="ntype" value="<?php echo $ntype; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30"><strong>&nbsp;Note text&nbsp;</strong></td>
	<td><textarea name="ntext" rows="20" cols="83"><?php echo $nrow['ntext'] ?></textarea></td>
</tr>

<tr>
	<td height="30" colspan="2"><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset">&nbsp; &nbsp;&nbsp;&nbsp;<a href="manage_notes.php">Go back to Manage Notes</a></td>
</tr>

</table>

</form>


</td>
</tr>
</table>

</body>
</html>
<?php } ?>