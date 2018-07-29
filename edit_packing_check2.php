<?php 
	require_once('conn.php'); 
	$id = $_GET['ajaxid'];
	if($_GET['enable']==1){
		if($_GET['check']==1){
			$sql = "UPDATE temp_profile2 SET temp_profile2.check=1,temp_profile2.check2=0 WHERE id=".$_GET['ajaxid'];
		}else{
			$sql = "UPDATE temp_profile2 SET temp_profile2.check2=1,temp_profile2.check=0 WHERE id=".$_GET['ajaxid'];
		}
		
	}else{
		if($_GET['check']==1){
			$sql = "UPDATE temp_profile2 SET temp_profile2.check=0, temp_profile2.check2=1 WHERE id=".$_GET['ajaxid'];
		}else{
			$sql = "UPDATE temp_profile2 SET temp_profile2.check2=0, temp_profile2.check=1 WHERE id=".$_GET['ajaxid'];
		}
	}

	$res=mysql_query($sql,$conn);
 ?>