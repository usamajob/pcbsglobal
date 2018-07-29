<?php 
	require_once('conn.php'); 
	$id = $_GET['ajaxid'];
	if($_GET['enable']==1){
		if($_GET['check']==1){
			$sql = "UPDATE profile_tb3 SET profile_tb3.check=1,profile_tb3.check2=0 WHERE id=".$_GET['ajaxid'];
		}else{
			$sql = "UPDATE profile_tb3 SET profile_tb3.check2=1,profile_tb3.check=0 WHERE id=".$_GET['ajaxid'];
		}
		
	}else{
		if($_GET['check']==1){
			$sql = "UPDATE profile_tb3 SET profile_tb3.check=0, profile_tb3.check2=1 WHERE id=".$_GET['ajaxid'];
		}else{
			$sql = "UPDATE profile_tb3 SET profile_tb3.check2=0, profile_tb3.check=1 WHERE id=".$_GET['ajaxid'];
		}
	}

	$res=mysql_query($sql,$conn);
 ?>