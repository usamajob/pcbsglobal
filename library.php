<?php
function getSelectable($frm, $val) {
	if($val != '') {
		$pos = strpos($val, $frm);
		if ($pos === false) return '0';
		else return substr($val, $pos+strlen($frm), 1); 
	} else return '0';
}
?>