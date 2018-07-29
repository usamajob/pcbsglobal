<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
 $fileName = $_FILES['file']['name'];
 if($_FILES['file']['error']==0){
 	 $tmp_name = $_FILES["file"]["tmp_name"];
 	$extension = pathinfo($_FILES['file']['name']);
 	 $name = 'file_upload/'.$_POST['part_no'].$_POST['rev'].rand(1,10000).".".$extension['extension'];
 	 
    move_uploaded_file($tmp_name, $name);
    $sql = "INSERT INTO file_upload (customer,part_no,rev,file_upload.date,name,path) VALUES('$_POST[customer]','$_POST[part_no]','$_POST[rev]','$_POST[birthdate]','$fileName','$name')";
    mysql_query($sql,$conn);
 	}
 	header("location:file_upload_files.php?customer=".$_POST['customer']."&part_no=".$_POST['part_no']."&rev=".$_POST['rev']);
 
  ?>