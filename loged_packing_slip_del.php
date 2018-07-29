<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php 
	$sql = "DELETE FROM packing_tb_loged WHERE id =".$_REQUEST['id'];
	mysql_query($sql);
	header("location:loged_packing_slip_list.php");
 ?>