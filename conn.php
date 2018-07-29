<?php
// $mysql_host = "localhost";
// $mysql_database = "pareomic_testdb";
// $mysql_user = "pareomic_proot";
// $mysql_password = "admin@123";

$mysql_host = "localhost";
$mysql_database = "pcbs_test";
$mysql_user = "root";
$mysql_password = "";

$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
if(!$conn) die('problem in connection');
mysql_select_db($mysql_database,$conn);

function escpe($value) {

   // Stripslashes
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   $value = mysql_real_escape_string($value);
   return $value;
}

function format_num($num=0, $deci=4) {
	if(trim($num) == '') $num = 0;
	$nnum = number_format(str_replace(',', '', $num), $deci);
	while(substr($nnum, -1) == '0' && $deci > 2) {
		$nnum = substr($nnum, 0, -1); $deci--;
	}
	return $nnum;
}

function round_num($num=0, $deci=4) {
	if($num == '') $num = 0;
	$nnum = number_format(str_replace(',', '', $num), $deci);
	$flag = 0;
	while(substr($nnum, -1) == '0' || substr($nnum, -1) == '.') {
		if(substr($nnum, -1) == '.') $flag = 1;
		$nnum = substr($nnum, 0, -1);
		if($flag == 1) break;
	}
	return $nnum;
}

function toNum($num=0) {
	if($num == '') $num = 0;
	return str_replace(' ', '', str_replace(',', '', $num));
}

$pdfpath = "/home/pareomic/public_html/pcbsglobal.com/luke-new/pdfclass/html2fpdf.php";
?>
