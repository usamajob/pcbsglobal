<?php 
require_once('conn.php'); 
if( isset($_POST['inv']) && $_POST['inv'] != '') {
	mysql_query("update invoice_tb set pdfshipto='".$_POST['shipto']."', qty='".$_POST['qty']."' where invoice_id='".$_POST['inv']."'");
}
?>
