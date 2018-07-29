<?php
 //db-connection
 require_once('conn.php');
 
 /*echo "<pre>";
 print_r($_REQUEST);
 echo "</pre>";//*/
 
 $sql = "";

 if(isset($_GET['frm']) && $_GET['frm'] == 'man_invoice') {
	 if($_GET['status'] == "true")  	
		$sql = "update invoice_tb set mailstop='1' where invoice_id='".$_GET['record_id']."'";
	 else 
		$sql = "update invoice_tb set mailstop='0' where invoice_id='".$_GET['record_id']."'";
 }
 else if(isset($_REQUEST['frm']) && $_REQUEST['frm'] == 'packing') {
	 if($_REQUEST['status'] == "true")  	
		$sql = "update packing_tb set pending='Yes' where invoice_id='".$_REQUEST['record_id']."'";
	 else 
		$sql = "update packing_tb set pending='No' where invoice_id='".$_REQUEST['record_id']."'";
 }
 else { 
	 if($_REQUEST['status'] == "true")  	
		$sql = "update invoice_tb set pending='Yes' where invoice_id='".$_REQUEST['record_id']."'";
	 else 
		$sql = "update invoice_tb set pending='No' where invoice_id='".$_REQUEST['record_id']."'";
 }

 $x = mysql_query($sql, $conn);

 /*
 if($x>0){
 	echo "successfully updated.!";
 }
 else{
 	echo "not updated.!";
 }
 */
?>
