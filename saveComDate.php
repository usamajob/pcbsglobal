<?php 
session_start(); 
require_once('conn.php'); 
if($_POST['flag'] == 0)
	$query = "update invoice_tb set due_date='".$_POST['comdate']."' where invoice_id='".$_POST['invid']."'";
else
	$query = "update invoice_tb set com_date='".$_POST['comdate']."' where invoice_id='".$_POST['invid']."'";

$result = mysql_query($query) or die(mysql_error());
echo true;
?>