<?php require_once('conn.php'); 

$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];
$cname = $pieces[2];
$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2

$query = "select * from order_tb where (( part_no='$pno') and (rev='$rev')and (cust_name='$cname')) limit 1";
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 

?>
<table border="0" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">
<tr>
	<td width="15%">Customer:</td><td><input name="customer" type="text" id="customer" size="30" value="<?php echo $name; ?>"></td>
</tr>
<tr>	
	<td>Part #:</td><td><input name="part_no" type="text" id="part_no" size="30" value="<?php echo $pno; ?>"></td>
</tr>
<tr>
	<td>Rev:</td><td><input name="rev" type="text" id="rev" size="30" value="<?php echo $rev; ?>"></td>
</tr>
</table>