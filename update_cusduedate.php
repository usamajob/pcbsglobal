<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); 

$id = $_GET['Id'];
$cus_due = $_GET['cus_due'];
$sup_due = $_GET['sup_due'];



$sql = "UPDATE porder_tb SET cus_due = '".$cus_due."' , supli_due='".$sup_due."' WHERE poid =".$id;
$res = mysql_query($sql);


?>
