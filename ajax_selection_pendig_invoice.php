<?php
 //db-connection
 require_once('conn.php');
 
/*echo "<pre>";
 print_r($_REQUEST);
 echo "</pre>";*/
 //alert('comming here');
 $sql = "";
 
 if($_REQUEST['status']=="true"){
 	
	$sql = "update invoice_tb set selected='yes' where invoice_id=$_REQUEST[record_id]";
 }
 else{
 	$sql = "update invoice_tb set selected='no' where invoice_id=$_REQUEST[record_id]";
 }
 
 $x = mysql_query($sql,$conn);
 
 if($x>0){
 	echo "successfully updated.!";
 }
 else{
 	echo "not updated.!";
 }

?>