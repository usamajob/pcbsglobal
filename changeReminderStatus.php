<?php session_start(); 
require_once('conn.php'); 

$status = ($_GET['status'] == 'Enable' ? 'yes' : 'no');
$newstatus = ($_GET['status'] == 'Enable' ? 'Yes|Disable' : 'No|Enable');

$query = "update reminder_tb set enabled='".$status."' where id='".$_GET['id']."'";
//echo $query; exit;
$result = mysql_query($query);

if(mysql_affected_rows() > 0) echo $newstatus;
?>