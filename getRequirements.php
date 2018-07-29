<?php 
require_once('conn.php'); 
require('library.php');

if(isset($_REQUEST['flag'])) {
	$sql = "select custid from profile_tb where custid='".$_REQUEST['cid']."'";
	$res = mysql_query($sql) or die('err');

	if(mysql_num_rows($res) > 0) echo true;
	else echo false;
}
else {
	$sql = "select c_name from data_tb where data_id = '".$_REQUEST['cid']."'";
	$res = mysql_query($sql) or die('err');
	$row = mysql_fetch_assoc($res);
	$cname = $row['c_name'];

	$sql = "select pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid where pt.custid='".$_REQUEST['cid']."' and instr(pt2.viewable, '".$_REQUEST['ftype']."') > 0 and trim(pt2.reqs) <> '' order by pt2.id";

	$res = mysql_query($sql) or die('err');

	if(mysql_num_rows($res) > 0) {		
		
		echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
		<div><h3>".$cname." Customer Profile</h3>";
		$i = 1;
		echo "<table border='0'>";

		while($rwv = mysql_fetch_assoc($res)) { 
			echo "<tr><td align='center'>".(getSelectable($_REQUEST['ftype'], $rwv['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($rwv['reqs'])."'> ": $i.'.')."</td><td>".trim($rwv['reqs'])."</td></tr>";
			$i++;
		}
		echo "</table>";
		echo "<br><input type='button' id='save_value' name='save_value' value='Save' /></div>";
	} else echo "";
}
?>
