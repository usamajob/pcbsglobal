<?php require_once('conn.php'); 

$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];

$cname = $pieces[2];

$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2

/*echo $pieces1[1];
exit;*/
$query="select * from order_tb where (( part_no='$pno') and (rev='$rev') and (cust_name='$cname')) limit 1";
/*echo $query;
exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 
$lyrcnt= $row->no_layer; 
$orddate1= $row->orddate1;

$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);
$ordon = $row11->ordon; 
$po = $row11->poid; 
$ypo = $row11->po; 
if ($po>0)
$po=$po+9933;
else 
$po='';
/*echo $po;
exit;*/

?>
<script type="text/javascript">
window.addEvent('domready', function() {
var d1 = new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>

<script type="text/javascript">
<!--
function geturl(addr) {  
	var r = $j.ajax({  
	type: 'GET',  
	url: addr,  
	async: false  
	}).responseText;  
	return r;  
}  

function getOrderDate() {
	var e = document.getElementById("po");
	var po = e.options[e.selectedIndex].value;
	var odate = geturl("getorderdate.php?po="+po+"&rev=<?php echo $rev ?>&pno=<?php echo $pno ?>");
	var e = document.getElementById("exampleIII");
	e.value = odate;
}
// -->
</script>

<!-- <table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;"> -->

<?php if(isset($_GET['rs'])) 
	echo '<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">';
else 
	echo '<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">';
?>
                                                    
<tr>
	<td height="30">Part # </td>
	<td height="30"><input name="part_no" type="text" id="part_no" value="<?php echo $pno; ?>"  size="30"></td>
</tr>

<tr>
	<td height="30">Rev </td>
	<td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>
</tr>

<tr>
	<td height="30">Our PO#</td>
	<td height="30">
	<input type="text" list="oo" name="oo" placeholder="--Select--" />
	<datalist id="oo">
	<?php 
	$query13 = "select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname'))";
	$res13 = mysql_query($query13) or die('error in ');

	while($rw13 = mysql_fetch_array($res13)) {
	$tc = $rw13['poid']+9933;
	?>

	
	  <!-- <option value="<?php echo $rw13['poid']+9933;?>"><?php echo $rw13['poid']+9933;?></option> -->
	
	</td>
	<?php 
	}
	?>
	</datalist>


</tr>

<?php if(!isset($_GET['rs'])) { ?>

<tr>
	<td height="30">Customer PO#</td>
	<td height="30">
	<input type="text" list="po" name="po"  placeholder="--Select--" onChange="getOrderDate();"/>
	<datalist id="po">
	<?php 
	$sqo = "select DISTINCT po from porder_tb where ( part_no='$pno') and (rev='$rev')";
	$reso = mysql_query($sqo) or die('error in data');
	while($rwo = mysql_fetch_assoc($reso)) {
		if($rw13['poid']!=0){
			?>
	  		<option value="<?php echo $rw13['poid']+9933;?>"><?php echo $rw13['poid']+9933;?></option>
		<?php 
		}
	
	}
	?>
	</datalist>
	</td>
</tr>

<?php } ?>

<tr>
	<td height="30">Ordered Date</td>
	<td height="30"><input name="odate" id="exampleIII" type="text" size="30"></td>
</tr>

<tr>
	<td height="30">Layer Count</td>
	<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $lyrcnt; ?>" /></td>
</tr>

</table>