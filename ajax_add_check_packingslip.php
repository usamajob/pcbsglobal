<?php
 //db-connection
 require_once('conn.php');
 
 /*echo "<pre>";
 print_r($_REQUEST);
 echo "</pre>";//*/
 
 $sql = "";

$flag = false;
	 if($_REQUEST['status'] == "true"){  	
		// $sql = "update packing_tb set loged=1 where invoice_id='".$_REQUEST['record_id']."'";
		$flag = true;
	}else{ 
		$sql = "update packing_tb set loged=0 where invoice_id='".$_REQUEST['record_id']."'";
		$sql_del = "DELETE FROM packing_tb_loged WHERE invoice_id = ".$_REQUEST['record_id'];
		mysql_query($sql_del,$conn);
 		$x = mysql_query($sql, $conn);
 	}

 echo $flag;
 ?>

