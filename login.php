<?php 
session_start();
require_once('conn.php'); ?>
<?php
$flag=0;
$sq='select * from admin_tb where uname="'.$_REQUEST['txtuname'].'" and pass="'.$_REQUEST['txtpass'].'"';
$res=mysql_query($sq);
if(!$res)
{
	die('error in database');
}
if(mysql_num_rows($res)>0)
{
	$rw=mysql_fetch_array($res);
	$_SESSION['uid']=$rw['id'];
	$_SESSION['uname']=$_REQUEST['txtuname'];
	$_SESSION['last_time'] = time();
	sleep(3);
	header('location:welcome.php');
}
else
{
	header('location:index.php?flag=1');
}
?>
