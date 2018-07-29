<?php require_once('conn.php'); 

$query = "select * from order_tb where (part_no like '%".$_REQUEST['keywrd']."%' or cust_name like '%".$_REQUEST['keywrd']."%' or rev like '%".$_REQUEST['keywrd']."%') and simplequote <> '1' order by trim(cust_name)";
$result = mysql_query($query) or die();
echo "<option value=''>----Select Quotes----</option>";
if(mysql_num_rows($result) > 0) {
	while($row = mysql_fetch_assoc($result)) {
		echo "<option value='".$row['ord_id']."'>".$row['cust_name']." - ".$row['part_no']." ".$row['rev']."</option>";
	}
}

?>
