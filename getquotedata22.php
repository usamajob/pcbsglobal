<?php require_once('conn.php'); 

$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];
$cname = $pieces[2];
$pieces1 = explode("_", $temp);
$rev = $pieces1[0]; // piece2

$query = "select * from order_tb where (( part_no='$pno') and (rev='$rev')and (cust_name='$cname')) limit 1";
/*echo $query;
exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 

$lyrcnt= $row->no_layer; 
$cancharge = $row->cancharge; 
$req_by = $row->req_by;

if(isset($_REQUEST['flag'])) {
	$cname = $row->cust_name;
	$sql = "select * from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid inner join data_tb dt on 
	pt.custid = dt.data_id where dt.c_name='".$cname."' and instr(pt2.viewable, '".$_REQUEST['ftype']."') > 0 and trim(pt2.reqs) <> ''  order by pt2.id";
	$res = mysql_query($sql) or die('err');

	if(mysql_num_rows($res) > 0) {
		require('library.php');
		
		echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
		<div><h3>".$cname." Customer Profile</h3>";

		$i = 1;
		echo "<table border='0'>";
		while($rwv = mysql_fetch_assoc($res)) { 
			echo "<tr><td align='center'>".(getSelectable($_REQUEST['ftype'], $rwv['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($rwv['reqs'])."'> ": $i.'.')."</td><td>".$rwv['reqs']."</td></tr>";
			$i++;
		}	
		echo "</table>";
		echo "<br><input type='button' id='save_value' name='save_value' value='Save' /></div>";
	} else echo "";

} else {

?>

<table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;">
                                                    
<tr>
	<td height="30">Part # </td>
	<td height="30"><input name="part_no" type="text" id="part_no" value="<?php echo $pno; ?>"  size="30"></td>
</tr>

<tr>
	<td height="30">Customer </td>
	<td height="30"><input name="customer" type="text" id="customer" value="<?php echo $name; ?>" size="30"></td>
</tr>
 
<tr>
	<td height="30">Rev </td>
	<td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>
</tr>

<tr>
	<td height="30">Customer PO#</td>
	<td height="30"><input name="po" type="text" id="po" value="<?php echo $cpo; ?>" size="30"><!-- <input type="hidden" name="cancharge" id="cancharge" value="<?php //echo $cancharge; ?>" /> --></td>
</tr>

<tr>
	<td height="30">Layer Count</td>
	<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $lyrcnt; ?>" /></td>
</tr>

<tr>
	<td height="30"> Name of Requestor </td>
	<td height="30"><input name="namereq1" type="text" id="namereq1" size="30" value="<?php echo $req_by; ?>" ></td>
</tr>

</table>
<?php } ?>