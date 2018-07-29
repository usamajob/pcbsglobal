<?php require_once('conn.php'); 

$pno = $_GET['pno'];
$rev = $_GET['rev'];
$po = $_GET['po'];

$sqo = "select ordon from porder_tb where ( part_no='$pno') and (rev='$rev') and po='".$po."' order by ordon desc limit 1";
//echo $sqo;
$reso = mysql_query($sqo) or die('error in data');

$rwo = mysql_fetch_assoc($reso); 

echo $rwo['ordon'];

?>