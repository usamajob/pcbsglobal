<?php 
require_once('conn.php'); 
$cust = isset($_POST['cust']) ? $_POST['cust'] : '';
$salesrep = isset($_POST['salesrep']) ? $_POST['salesrep'] : '';

if( isset($_POST['comm']) && $_POST['comm']) {
	$sqlr = "select comval from rep_tb where r_name='".$salesrep."'";

	$rres = mysql_query($sqlr) or die('Rep query error'); if(mysql_num_rows($rres) > 0) {
		$rowr = mysql_fetch_assoc($rres);
		echo $rowr['comval'];
	}
	else echo '';
}
else { // 1 customer will have only 1 sales rep

	$sqlr = "select r_name, comval from rep_tb where invsoldto like '%|".$cust."|%' order by r_name";

	$rres = mysql_query($sqlr) or die('Rep query error');
	if(mysql_num_rows($rres) > 0) {
		echo '<option value="">Select Outside Sales Rep</option>';
		while($rowr = mysql_fetch_assoc($rres)) {
			$str = "<option value='".htmlspecialchars($rowr['r_name'], ENT_QUOTES)."' SELECTED >".$rowr['r_name']."</option>".'|'.$rowr['comval'];
		}
		echo $str;
	}
	else {
		$comval = 0;
		$sqlr = "select r_name, comval from rep_tb order by r_name";
		$rres = mysql_query($sqlr) or die('Rep query error');
		$str = '<option value="">Select Outside Sales Rep</option>';
		while($rowr = mysql_fetch_assoc($rres)) {
			$str .= "<option value='".htmlspecialchars($rowr['r_name'], ENT_QUOTES)."' ".($salesrep == $rowr['r_name'] ? ' SELECTED ' : '')." >".$rowr['r_name']."</option>";
			if($salesrep == $rowr['r_name']) $comval = $rowr['comval'];
		}
		echo $str.'|'.$comval;
	}
}
?>