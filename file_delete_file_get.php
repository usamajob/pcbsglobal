<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
$id = $_GET['id'];
$sql_select = "SELECT * FROM file_upload WHERE id =".$id;
$res_select = mysql_query($sql_select,$conn);
while($row = mysql_fetch_assoc($res_select))
{
	$path = $row['path'];
}
$sql = "DELETE FROM file_upload WHERE id =".$id;
$res = mysql_query($sql,$conn);
if($res>0){
	unlink($path);
}
header("location:file_upload_files.php?customer=".$_GET['customer']."&part_no=".$_GET['part_no']."&rev=".$_GET['rev']);
 ?>