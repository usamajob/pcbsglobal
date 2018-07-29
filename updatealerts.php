<?php require_once('conn.php'); 

if($_GET['utype'] == 'del') {
	$query = "delete from alerts_tb where id='".$_GET['aid']."'";
} 
elseif($_GET['utype'] == 'edit') {
	$query = "update alerts_tb set alert='".addslashes($_GET['atext'])."' where id='".$_GET['aid']."'";
}
else {
	$view_str = 'quo|po';
	$ftype = '';
	if($_GET['ftype'] == 'po') {
		$view_str = 'quo|po|pac|inv';
		$ftype = 'po';
	}

	if($_GET['prevpno'] != "") // && $_GET['prevrev'] != ""
		$query = "insert into alerts_tb (customer, part_no, rev, alert, viewable, frm) values ('".trim($_GET['prevcust'])."', '".trim($_GET['prevpno'])."', '".trim($_GET['prevrev'])."', '".addslashes($_GET['atext'])."', '".$view_str."', '".$ftype."')";
	else
		$query = "insert into alerts_tb (alert, refid, viewable, frm) values ('".addslashes($_GET['atext'])."', '".$_GET['refid']."', '".$view_str."', '".$ftype."')";
}

//echo $query;
$result = mysql_query($query) or die();

?>