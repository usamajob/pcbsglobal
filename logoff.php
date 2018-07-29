<?php
session_start();
$_SESSION['uid']="";
$_SESSION['uname']="";
$_SESSION['last_time']="";
header('location:index.php');
?>
