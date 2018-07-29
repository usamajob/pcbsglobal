<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_REQUEST['Submit'])) {
	$dweek= substr($_REQUEST['date1'],-10);  // abcd

	$sqin = "update packing_tb set vid='".$_REQUEST['vid']."', sid='".$_REQUEST['sid']."', namereq='".$_REQUEST['namereq']."', svia='".$_REQUEST['svia']."', fcharge='".$_REQUEST['fcharge']."', city='".$_REQUEST['city']."', state='".$_REQUEST['state']."', sterm='".$_REQUEST['sterms']."', comments='".$_REQUEST['comments']."', date1='".$_REQUEST['date1']."', odate='".$_REQUEST['odate']."', dweek='".$dweek."', po='".$_REQUEST['po']."', customer='".$_REQUEST['customer']."', cusaccno='".$_REQUEST['cusaccno']."', part_no='".$_REQUEST['part_no']."', rev='".$_REQUEST['rev']."', delto='".$_REQUEST['delto']."', our_ord_num='".$_REQUEST['oo']."', saletax='".$_REQUEST['stax']."',
	sp_reqs='".$_REQUEST['specialreqval']."'
	where invoice_id='".$_REQUEST['id']."'";

	$cnid = $_REQUEST['inid'];
	$resin = mysql_query($sqin) or die('error in data');

	$sqin11 = "DELETE FROM packing_items_tb WHERE pid=".$cnid;
	$sqin111 = "DELETE FROM maincont_packing WHERE packingid=".$cnid;


mysql_query($sqin11);
mysql_query($sqin111);

for($i = 1; $i <= 6; $i++) {

	$item = $_REQUEST['item_'.$i];
	$itemdesc = $_REQUEST['desc_'.$i];
	$qty = $_REQUEST['qty_'.$i];
	$uprice = $_REQUEST['uprice_'.$i];

	if($item != "") {

		$tprice = $qty * $uprice;
		$tprice = number_format($tprice,2);

		$sqs = "insert into packing_items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

		$ress = mysql_query($sqs) or die('errro');
	}
}

$sqv = "select * from maincont_tb where coustid='".$_REQUEST['customer']."'";
$resv = mysql_query($sqv) or die('err');

$ii=0;
while($rwv = mysql_fetch_array($resv)){
	$ii++;
}

for($i = 1; $i <= $ii; $i++) {

$maincont = $_REQUEST['mcont_'.$i];

if($maincont != "") {
	$sqs = "insert into maincont_packing(maincontid,packingid) values('".$maincont."','".$cnid."')";
	$ress = mysql_query($sqs) or die('errro');
}
}	

header('location:manage_packing.php');
}

$sqs="select * from packing_tb where invoice_id='".$_REQUEST['id']."'";

$res=mysql_query($sqs) or die('error in data');

$rws=mysql_fetch_array($res);
$dweek22= substr($rws['odate'], -10); 
$date1= substr($rws['date1'], -10);// abcd

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Packing Slip</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/IE-7.css"/>
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/IE-8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/IE-9.css" />
<![endif]-->

<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();
var flag1 = 0;
var flag3 = 0;
jQuery(document).ready(function(){
	$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});

	$j("#Submit").click(function() {
		if( $j.trim($j('#part_no').val()) != "" && $j.trim($j('#rev').val()) != "") {
			var response = geturl("getalerts.php?pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&ftype=purchase"); 

			if(response != 'norecords') {
				$j('#alertDiv').html(response); 
				$j('#alertDiv').show();	
				if(flag3 <= 1) flag3 = flag3 + 1;
			}
		}

		if(flag1 == 1) { // Customer profile popup
			$j('#reqDiv').show();
			if(flag3 <= 1) flag3 = flag3 + 1;

			$j('#close').livequery('click', function(e){
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$j(this).parent().hide();
				}
				else  
					$j('#form1').submit();//form submit on close
			});

			$j('#save_value').livequery('click', function(){
				var reqstr = '';
				$j('.reqs_Checkbox:checked').each(function(){        
					var values = $j(this).val();
					reqstr += values + " | ";
				});
				$j('#reqDiv').hide(); 
				if(reqstr != "") {
				$j('#specialreq').html("<strong>Special requirements:</strong> " + reqstr.substring(0, reqstr.length - 3)); 
				$j('#specialreqval').val(reqstr.substring(0, reqstr.length - 3));
				}
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$j(this).parent().hide();
				}
				else  
					$j('#form1').submit();//form submit on close
			});
		}

		if(flag3 == 0) $j('#form1').submit();
	});

	getreq();

});
</script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple"
});
</script>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript">
function geturl(addr) {  
var r = $j.ajax({  
type: 'GET',  
url: addr,  
async: false  
}).responseText;  
return r;  
}  

function test11() {

qty1=document.getElementById('part_no11').value;
//alert(qty1);
//alert(document.getElementById('part_no').value);
qty1=document.getElementById('part_no11').value;
//alert(qty1);
$j('#txtshow1').html(geturl('getquotedata11.php?pnorev='+qty1));  
}


</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true , 'defaultDate': '<?php echo $rws['date1'];  ?>', });});
</script>
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleIII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true , 'defaultDate': '<?php echo $dweek22;  ?>', });});

</script>

<script type="text/javascript">
function test(){
	uid=document.form1.customer.value;
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById("content").innerHTML = xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET", "getmaincontact.php?uid="+uid, true);
	xmlhttp.send();

	getreq();
	
}

function getreq(){
	uid=document.form1.customer.value;
	var showlink = geturl("getRequirements.php?cid="+uid);
	if(showlink != "") { 
	$j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }
	
}
</script>

</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr>

<td align="center">

<table  border="0" cellpadding="0" cellspacing="1" width="1300">

<tbody>

<tr style="height:20px; background-color:#FFF;"></tr>
<tr>
<td colspan="2" id="header" style="height:50px;"><!--menu-->
&nbsp; &nbsp;<strong class="titleWelcome">Welcome to Admin Panel</strong>


</td> <!--/menu-->
</tr>

<tr>
<td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

</tr>

<tr>



<td id="mainpage" style="width: 750px;">

<div>

<table cellpadding="5" cellspacing="1" width="100%">



<tbody><tr>



</tr>

<tr>
<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php"><br />
<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

<td style="line-height: 16px;"><form id="form1" name="form1" method="post" action="">
<input name="inid" id="inid" type="hidden" value="<?php echo $rws['invoice_id'];?>" >
<input type="hidden" name="specialreqval" id="specialreqval" value="<?php echo $rws['sp_reqs'] ?>">
<p>&nbsp;</p>

<table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

<tr>

<td height="30" colspan="2"><strong>EDIT PACKING SLIP FORM</strong></td>
</tr>

<!--<tr>

<td height="30" colspan="2"> PCBs Global Incorporated<br>

2500 E. La Palma Ave.<br>

Anaheim Ca. 92806<br>

Phone: (855) 722-7456<br>

Fax: (855) 262-5305 </td>

</tr>-->

<tr>

<td width="137" height="30">Bill to</td>

<td width="443" height="30"><label>

<select name="vid" id="vid">

<?php 

$sqv="select * from data_tb ORDER BY c_name";

$resv=mysql_query($sqv);

if(!$resv)

{

die('err');

}

while($rwv=mysql_fetch_array($resv))

{

?>
<option value="<?php echo $rwv['data_id'];

?>" <?php if($rwv['data_id']==$rws['vid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

?></option>

<?php 

}

?>
</select>

</label></td>
</tr>

<tr>

<td height="30">Shipped to</td>

<td height="30">


<?php 
// echo 'c'.$rws['sid'];
?>
<select name="sid" id="sid">

<?php 

$sqv="select * from data_tb ORDER BY c_name";

$resv=mysql_query($sqv);

if(!$resv)

{

die('err');

}

while($rwv=mysql_fetch_array($resv))

{

?>

<option value="c<?php echo $rwv['data_id'];

?>" <?php if('c'.$rwv['data_id']==$rws['sid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

?></option>

<?php 

}

?>

<option disabled value=""> ------- Shippers List -------- </option>
<?php 

$sqv="select * from shipper_tb order by c_name asc";

$resv=mysql_query($sqv);

if(!$resv)

{

die('err');

}

while($rwv=mysql_fetch_array($resv))

{

?>

<option value="s<?php echo $rwv['data_id'];

?>" <?php if('s'.$rwv['data_id']==$rws['sid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

?></option>

<?php 

}

?>
</select></td>
</tr>

<!-- <tr>

<td height="30"> Sales Rep </td>

<td height="30"><input name="namereq" type="text" id="namereq" value="<?php // echo $rws['namereq'];?>" size="30"></td>

</tr>-->
	<tr>
		<td height="30">Ship Via</td>
		<td height="30">
		<select name="svia" id="svia">
		<option <?php if($rws['svia']=='Elecronic Data'){?> selected <?php } ?> value="Elecronic Data"> Elecronic Data</option>
		<option <?php if($rws['svia']=='Fedex'){?> selected <?php } ?> value="Fedex">Fedex</option>
		<option <?php if($rws['svia']=='Personal Delivery' || $rws['svia']==''){?> selected <?php } ?> value="Personal Delivery">Personal Delivery</option>
		<option <?php if($rws['svia']=='UPS'){?> selected <?php } ?> value="UPS"> UPS</option>		
		</select></td>
	</tr>	

<!-- <tr>

<td height="30"> Freigh Charge</td>

<td height="30"><input name="fcharge" type="text" id="fcharge" value="<?php // echo $rws['fcharge'];?>" size="30"></td>

</tr>

<tr>

<td height="30">City </td>

<td height="30"><input name="city" type="text" id="city" value="<?php //echo $rws['city'];?>" size="30"></td>

</tr>

<tr>

<td height="30">State </td>

<td height="30"><input name="state" type="text" id="state" value="<?php //echo $rws['state'];?>" size="30"></td>

</tr>


<tr>

<td height="30">Shipping Terms :</td>

<td height="30"><label>

<select name="sterms" id="sterms">

<option value="Prepaid">Prepaid</option>

<option value="Collect"> Collect</option>
</select>

</label></td>

</tr>-->

<tr>

<td height="30" colspan="2"><table width="690" border="0">

<tr>

<td width="202" height="30">Item</td>

<td width="225" height="30">Description</td>

<td width="140" height="30">QTY Ordered</td>

<td width="105" height="30">Qty Shipped </td>
</tr>
<?php
//   $sqi="select * from packing_items_tb where pid='".$rws['invoice_id']."'";
$sqi="select * from packing_items_tb where pid='".$_REQUEST['id']."'";

$resi=mysql_query($sqi) or die('error in data');

$tot=0;
$i=1;

while($rwi=mysql_fetch_array($resi))

{ ?>
<tr>

<td height="30"><label>

<input name="item_<?php echo $i;?>" type="text" value="<?php echo $rwi[item];?>"  id="itemname[]" size="30">

</label></td>

<td height="30"><input name="desc_<?php echo $i;?>" value="<?php echo $rwi[itemdesc];?>" type="text" id="desc[]" size="30"></td>

<td height="30"><input name="qty_<?php echo $i;?>" value="<?php echo $rwi[qty2];?>" type="text" id="qty[]" size="20"></td>

<td height="30"><input name="uprice_<?php echo $i;?>" value="<?php echo $rwi[uprice];?>" type="text" id="uprice[]" size="20"></td>
</tr>

<?php 
$i++;
}

?>                                                    

<?php 

for(;$i<=6;$i++)

{

?>

<tr>

<td height="30"><label>

<input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30">

</label></td>

<td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>

<td height="30"><input name="qty_<?php echo $i;?>" type="text" id="qty[]" size="20"></td>

<td height="30"><input name="uprice_<?php echo $i;?>" type="text" id="uprice[]" size="20"></td>
</tr>

<?php 

}

?>

</table></td>
</tr>

<tr>

<td height="30">&nbsp;</td>

<td height="30">&nbsp;</td>
</tr>

<tr>

<td height="30">Customer </td>

<td height="30"><select name="customer" id="customer" onChange="test();">
<option value="0">--Select Customer--</option>
<?php
$sqv="select * from data_tb ORDER BY c_name";

$resv=mysql_query($sqv) or die('err');

while($rwv=mysql_fetch_array($resv)) {

?>

<option value="<?php echo $rwv['data_id'];

?>" <?php if($rwv['data_id'] == $rws['customer']){ $custid = $rwv['data_id']; ?> selected <?php } ?> ><?php echo $rwv['c_name'];

?></option>

<?php 

}

?>
</select></td>
</tr>

<tr>

<td height="30">Customer Main Contact </td>

<td height="30" ><span id="content">
<?php
$sqia = "SELECT mc.name, mc.lastname, mc.enggcont_id, mcp.maincontid
FROM maincont_tb mc
left outer JOIN maincont_packing mcp
ON mc.enggcont_id = mcp.maincontid
where coustid='".$custid."'";
//packingid='".$rws['invoice_id']."'";

$resva = mysql_query($sqia) or die('err');

$i=1;

while($rwva = mysql_fetch_assoc($resva)){
?>

<input type="checkbox" name="mcont_<?php echo $i;?>" id="maincont[]" value="<?php echo $rwva['enggcont_id']; ?>" <?php echo (!is_null($rwva['maincontid']) ? ' CHECKED ' : '') ?> />
<?php 
echo $rwva['name'].' '.$rwva['lastname'].'<br>'; 
$i++;
}
?>                 
</span></td>
</tr>

<!-- <tr>

<td height="30">Customer Account Number </td>
</td>

<td height="30"><input name="cusaccno" type="text" id="cusaccno" value="<?php // echo $rws['cusaccno'];?>" size="30"></td>

</tr>-->

<tr>

<td height="30"> Lookup ID </td>

<td height="30">

<input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test11();},250);" size="30" />
<!--<input name="part_no" type="text" id="part_no" size="30">--></td>
</tr>
</table>
<div id="txtshow1">
<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
<tr>

<td height="30">Part # </td>

<td height="30"><input name="part_no" type="text" id="part_no"  value="<?php echo $rws['part_no'];?>" size="30"></td>
</tr>
<tr>

<td height="30">Rev </td>

<td height="30"><input name="rev" type="text" id="rev"  value="<?php echo $rws['rev'];?>" size="30"></td>
</tr>
<?php 
$pno=$rws['part_no'];
$rev=$rws['rev'];
$cname=$rws['customer'];

$query313="select * from data_tb where  (data_id='$cname') limit 1";
/*echo $query11;
exit;*/
$result313 = mysql_query($query313) or die();
$row313 = mysql_fetch_object($result313);

$custname = $row313->c_name;        

$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$custname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);
$ypo = $row11->po; 
$po = $row11->poid;      
if ($po>0)
$po=$po+9933;
else 
$po='';                                                   
?>                                

<!-- <tr>

<td height="30">Customer PO#</td>

<td height="30"><input  name="po" type="text" id="po" value="<?php // echo $ypo;?>" size="30"></td>

</tr>

<tr>

<td height="30">Our PO#</td>

<td height="30"><input name="oo"  type="text" id="oo" value="<?php // echo $po;?>" size="30"></td>

</tr>-->


<tr>

<td height="30">Customer PO#</td>

<td height="30">
<input  name="po" type="text" id="po" value="<?php echo $rws['po'];?>" size="30">
<!--<select name="po">
<?php 
$sqo="select DISTINCT po from porder_tb where ( part_no='".$rws['part_no']."') and (rev='".$rws['rev']."')";
$reso=mysql_query($sqo);
if(!$reso)
{
die('error in data');
}
while($rwo=mysql_fetch_array($reso))
{
?>
<option value="<?php echo $rwo['po'];?>" <?php if($rwo['po']==$rws['po']){?> selected="selected"<?php } ?>><?php echo $rwo['po'];?></option>
<?php 
}
?>
</select>--></td>
</tr>

<tr>
<td height="30">Our PO#</td>

<td height="30">
<!--   <select name="oo">
<option value="">--select--</option>
<?php 
$sqv1="select * from data_tb where data_id='".$rws['customer']."' ORDER BY c_name";
$resv1=mysql_query($sqv1);
if(!$resv1)

{

die('err');

}

//	while($rwv=mysql_fetch_array($resv))
$rwv1=mysql_fetch_array($resv1);

$query13="select * from porder_tb where ( part_no='".$rws['part_no']."') and (rev='".$rws['rev']."') and (customer='".$rwv1['c_name']."')";
$res13=mysql_query($query13);
if(!$res13)
{
die('error in ');
}
while($rw13=mysql_fetch_array($res13))
{
$tc=$rw13['poid']+9933;
?>
<option value="<?php echo $rw13['poid']+9933;?>" <?php if($tc==$rws['our_ord_num']){?> selected="selected"<?php } ?>><?php echo $rw13['poid']+9933;?></option>
<?php 
}
?>
</select> -->
<input name="oo"  type="text" id="oo" value="<?php echo $rws['our_ord_num'];?>" size="30"></td>
</tr>

<tr>

<td height="30">Ordered Date</td>

<td height="30"><input name="odate" id="exampleIII"  type="text" value="<?php echo $rws['odate'];?>"  size="30"></td>
</tr>

<tr>

<td height="30">Layer Count</td>

<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $rws['no_layer']; ?>" /></td>
</tr>
</table>
</div>
<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

<tr>
	<td height="30">Delivered to</td>
	<td height="30"><input name="delto" type="text" id="delto" value="<?php echo $rws['delto'];?>" size="30"></td>
</tr>

<tr>

<td height="30">Delivery Date</td>

<td height="30"><input name="date1" type="text" id="exampleII" value="<?php echo $rws['date1'];?>" size="30"></td>
</tr>

<!-- <tr>
<td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 
<input name="date2" type="text" id="date2" size="30"></td>

</tr> -->

<!-- <tr>
<td height="30">sales tax</td>
<td height="30">
<input name="stax" type="text" id="stax" value="<?php // echo $rws['saletax'];?>" size="30">

</td>

</tr> -->

<tr>
	<td height="30">Comments</td>
	<td height="30"><label><textarea name="comments" id="comments" cols="45"  rows="5"><?php echo $rws['comments'];?></textarea></label></td>
</tr>

<!-- <tr>

<td height="30" colspan="2"> Micro section and cross section report required with shipment.<br>

Certificate of compliance required<br>
Inspection report required<br>
Test certificate required<br>
Solder sample required<br>
Invoice:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:silvia@pcbsglobal.com" target="_blank">silvia@pcbsglobal.com</a><br>

Email working data to:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:isaac@pcbsglobal.com" target="_blank">isaac@pcbsglobal.com</a><br>

Please refer any questions to:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:isaac@pcbsglobal.com" target="_blank">isaac@pcbsglobal.com</a> </td>

</tr> -->

<tr>
	<td height="30" colspan="2"><div style="position: relative">
	<?php

	echo "<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:-100px; left: -150px; display: none; '>";		

	$cname = $rws['customer'];
	$psql = "select * from profile_tb pt inner join data_tb dt on 	pt.custid = dt.data_id where dt.c_name='".$rws['customer']."'";
	$pres = mysql_query($psql) or die('err');
	if(mysql_num_rows($pres) > 0) { 
		
		$temparr = array();
		$tempstr = "";
		while($rwp = mysql_fetch_assoc($pres)) {  		
			$tempstr .= trim($rwp['reqs'])."|";
		}

		if($tempstr != "") $temparr = explode('|', $tempstr);

		if(count($temparr) > 0) {
			echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
			<div><h3>".$cname." Customer Profile</h3>";

			$i = 0;

			foreach($temparr as $k => $v) {
				if(trim($v) != "") {
					echo "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($v)."' ".(strstr($rws['sp_reqs'], trim($v)) ? " CHECKED " : "")."> ".trim($v)."<br>";
					$i++;
				}
			}
			//if($i % 2 == 1) echo "<td></td>";
			echo "<br><input type='button' id='save_value' name='save_value' value='Save' /></div>";
		}
		?>
		<script type="text/javascript">
		<!--
		flag1 = 1;
		//-->
		</script>
		<?php
	} 
	?>
	</div>
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #fee; border: 1px solid #369; position: absolute; top:-200px; left: 250px; display: none;'></div>
	</div>
	<div id='specialreq' style='color: #000; font: 11px/25px Verdana;'><?php echo ($rws['sp_reqs'] != "" ? "<strong>Special requirements:</strong> ". $rws['sp_reqs'] : ""); ?></div></td>
</tr>

<tr>
	<td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">
	&nbsp; <label>
	<input type="reset" name="button2" id="button2" value="Reset">
	</label></td>
</tr>

<tr>
	<td height="30">&nbsp;</td>
	<td height="30">&nbsp;</td>
</tr>

</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</form>	</td>
</tr>                                           
</tbody></table>

</div>

</td>

</tr>

</tbody>

</table>

</td>

</tr>
</tbody></table>

</body></html>