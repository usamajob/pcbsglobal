<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php
$poid = $_GET['pid'];
$txt_note= $_GET['txt_note'];
$sql_update="UPDATE porder_tb  SET note ='".$txt_note."' WHERE poid=".$poid;
		mysql_query($sql_update);
/*
$sql='SELECT note FROM porder_tb WHERE poid = '.$poid;
$resp=mysql_query($sql);
while($rowp = mysql_fetch_assoc($resp)) {
 $note = $rowp ['note'];
}
*/
?>




