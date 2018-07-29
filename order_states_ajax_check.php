<?php 
 require_once('conn.php');
 $check = $_GET['status'];

$squp1 = "update porder_tb set allow='".$check."' where poid='".$_GET[record_id]."'";
	$resup = mysql_query($squp1) or die('error in data'); ?>