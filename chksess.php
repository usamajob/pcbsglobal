<?php
session_start();
//print_r( $_SESSION);
if($_SESSION['uid'] == "") {
	header('location:index.php');
}
if((time() - $_SESSION['last_time']) > 8379) {
 header('location:logoff.php');
}
?>