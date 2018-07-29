<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
require('library.php');

if(isset($_REQUEST['Submit'])) {
	$dweek = substr($_REQUEST['date1'], -10);  // abcd
$sqin = "update corder_tb set vid='".$_REQUEST['vid']."', sid='".$_REQUEST['sid']."', namereq='".$_REQUEST['namereq']."', svia='".$_REQUEST['svia']."', city='".$_REQUEST['city']."', state='".$_REQUEST['state']."', sterms='".$_REQUEST['sterms']."', rohs='".$_REQUEST['rohs']."', comments='".$_REQUEST['comments']."', customer='".$_REQUEST['customer']."', part_no='".$_REQUEST['part_no']."', rev='".$_REQUEST['rev']."', no_layer='".$_POST['lyrcnt']."', date1='".$_REQUEST['date1']."', date2='".$_REQUEST['date2']."', dweek='".$dweek."', po='".$_REQUEST['po']."', delto='".$_REQUEST['delto']."', stax='".$_REQUEST['stax']."', our_ord_num='".$_REQUEST['oo']."',
sp_reqs='".trim($_REQUEST['specialreqval'])."', svia_oth='".$_POST['svia_oth']."' where poid='".$_REQUEST['id']."'";
 /*$sqin="insert into invoice_tb(vid,sid,namereq,svia,fcharge,city,state,sterm,comments,podate,customer,date1,dweek,po,our_ord_num,saletax) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['svia']."','".$_REQUEST['fcharge']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['comments']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['date1']."','".$_REQUEST['dweek']."','".$_REQUEST['po']."','".$_REQUEST['oo']."','".$_REQUEST['stax']."')";
*/
$cnid = $_REQUEST['inid'];
$resin = mysql_query($sqin) or die('error in data');
$sqin11 = "DELETE FROM citems_tb WHERE pid=".$cnid;
mysql_query($sqin11);
/* $cnid=mysql_insert_id($conn); */
for($i=1; $i <= 6; $i++) {
	$item = $_REQUEST['item_'.$i];
	$itemdesc = addslashes($_REQUEST['desc_'.$i]);
	$qty = $_REQUEST['qty_'.$i];
	$uprice = $_REQUEST['uprice_'.$i];
	if($item != "") {
		$uprice = number_format(str_replace(',', '', $uprice), 2);
		$qty = str_replace(',', '', $qty);
		$tprice = $qty * $uprice;
		$tprice = number_format($tprice, 2);
		$sqs = "insert into citems_tb(item, itemdesc, qty2, uprice, tprice, pid) values('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."','".$cnid."')";
		$ress = mysql_query($sqs) or die('errro');
	}
}

$sqin22 = "DELETE FROM mdlitems_tb WHERE pid=".$cnid;
mysql_query($sqin22);
for($i = 1; $i <= 12; $i++) {
	$mdlqty = $_REQUEST['mdlqty_'.$i];
	$mdldate = $_REQUEST['mdldate_'.$i];
	if($mdlqty != "") {
		$sqs = "insert into mdlitems_tb(qty,date,pid) values('".$mdlqty."','".$mdldate."','".$cnid."')";
		$ress = mysql_query($sqs) or die('errro');
	}
}
header('location:manage_confirmation.php');
}

$sqs = "select * from corder_tb where poid ='".$_REQUEST['id']."'";
$res = mysql_query($sqs) or die('error in data');
$rws = mysql_fetch_array($res);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Confirmation</title>
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

	$j(".cprice").change(function() {
		var totprice = 0;
		var sumprice = 0;
		for (var i = 1; i <= 6; i++) {
			var qty = $j('#qty_' + i).val().replace(",","");
			var uprice = $j('#uprice_' + i).val().replace(",","");
			if (!isNaN(qty) && !isNaN(uprice)) {
				var totprice = qty * uprice;
				sumprice =  sumprice + totprice;
			}
		}
		$j('#totalprice').html('$'+sumprice.toFixed(2));
	});	

	$j("#svia").change(function() {
		if( $j(this).val() == 'Other' ) 
			$j("#svia_oth").css('visibility', 'visible');
		else $j("#svia_oth").css('visibility', 'hidden');
	});
	
	$j("#Submit").click(function() {

		if( $j.trim($j('#vid').val()) == "") { 
			alert('Please select Customer');
		}
		else if( $j.trim($j('#sid').val()) == "") { 
			alert('Please select Shipper');
		}
		else {

		if( $j.trim($j('#part_no').val()) != "") {
			var response = geturl("getalerts.php?customer="+$j.trim($j('#customer').val())+"&pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&ftype=con"); 
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
				if(reqstr.length > 2) {
					reqstr = reqstr.substring(0, reqstr.length - 3);
				}
				$j('#specialreq').html("<strong>Special requirements:</strong> " + reqstr); 
				$j('#specialreqval').val(reqstr);
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$j(this).parent().hide();
				}
				else  
					$j('#form1').submit();//form submit on close
			});
		}

		if(flag3 == 0) $j('#form1').submit();
		}
	});
}); 
</script> 
<script  type="text/javascript" src='js/draggable.js'></script>

<script type="text/javascript" src="js/gotowelcome.js"></script> 
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<!-- <script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple"
});
</script> -->

<script type="text/javascript">
function geturl(addr) {  
var r = $j.ajax({  
type: 'GET',  
url: addr,  
async: false  
}).responseText;  
return r;  
}  
  
function test() {	
	qty1=document.getElementById('part_no11').value;
	$j('#txtshow1').html(geturl('getquotedata.php?pnorev='+qty1));  
	var showlink = geturl('getquotedata22.php?pnorev='+qty1+'&ftype=con&flag=1');
	if(showlink != "") { 
		$j('#reqDiv').html(showlink); flag1 = 1; }
	else { 
		$j('#specialreq').html("");
		flag1 = 0; }
}	

</script>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "simple",
	forced_root_block : false
});
</script>

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa1', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa2', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa3', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa4', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa5', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa6', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa7', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa8', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa9', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa10', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa11', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exa12', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
</head><body>
        

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr>

<td align="center" id="container">

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
<tbody>

<tr>
  <td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">
 Welcome To Admin Panel <br />
  <br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td style="line-height: 16px;">
	<form id="form1" name="form1" method="post" action="">
	<input name="inid" id="inid" type="hidden" value="<?php echo $rws['poid'];?>" >
	<input type="hidden" name="specialreqval" id="specialreqval" value="<?php echo $rws['sp_reqs'] ?>">
  <p>&nbsp;</p>

  <table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

	<tr>

  <td height="30" colspan="2"><strong>Edit Order Confirmation FORM</strong></td>
</tr>

<!-- <tr>
  <td height="30" colspan="2"> PCBs Global Incorporated<br>
	2500 E. La Palma Ave.<br>
	Anaheim Ca. 92806<br>
	Phone: (855) 722-7456<br>
  Fax: (855) 262-5305 </td>
</tr> -->

	<tr>
	  <td width="137" height="30">Select Customer</td>
	  <td width="443" height="30"><label>

		<select name="vid" id="vid">
		<option value=''>Select Customer</option>
		<?php 

		$sqv = "select * from data_tb ORDER BY c_name";

		$resv = mysql_query($sqv) or die('err');

		while($rwv = mysql_fetch_assoc($resv)){
		?>
		<option value="<?php echo $rwv['data_id'];

		?>" <?php if($rwv['data_id'] == $rws['vid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

		?></option>

		<?php 

		}

		?>
	  </select>

	  </label></td>
	</tr>

	<tr>
	  <td height="30">Select Shipper</td>
	  <td height="30"><select name="sid" id="sid">
	  <option value=''>Select Shipper</option>

	   <?php 
		$sqv = "select * from data_tb where c_name <> '' ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_assoc($resv)) {
		?>
			<option value="c<?php echo $rwv['data_id'];	?>" <?php if('c'.$rwv['data_id'] == $rws['sid']) { ?> selected <?php } ?>><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
		?>

		<option class="sred" disabled value=""> ------- Shippers List -------- </option>
		<?php  
		$sqv = "select * from shipper_tb order by c_name";
		$resv = mysql_query($sqv) or die('err');

		while($rwv = mysql_fetch_assoc($resv)) {
		?>
			<option value="<?php echo $rwv['data_id']; ?>" <?php if($rwv['data_id'] == $rws['sid'] || ($rws['sid'] == '' && $rwv['data_id'] == '3') ){?> selected <?php } ?>><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
?>    
	</select></td>
	</tr>

	<tr>
		<td height="30"> Name of Requestor  </td>
		<td height="30"><input name="namereq" type="text" id="namereq" value="<?php echo $rws['namereq'];?>" size="30"></td>
	</tr>

	<tr>
		<td height="30"> Deliver to  </td>
		<td height="30"><input name="delto" type="text" id="delto" value="<?php echo $rws['delto'];?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">Ship Via</td>
		<td height="30">
		<select name="svia" id="svia">
		<option <?php if($rws['svia'] == 'Elecronic Data'){?> selected <?php } ?> value="Elecronic Data"> Elecronic Data</option>
		<option <?php if($rws['svia'] == 'Fedex'){?> selected <?php } ?> value="Fedex">Fedex</option>
		<option <?php if($rws['svia'] == 'Personal Delivery' || $rws['svia']==''){?> selected <?php } ?> value="Personal Delivery">Personal Delivery</option>
		<option <?php if($rws['svia'] == 'UPS'){?> selected <?php } ?> value="UPS"> UPS</option>		
		<option <?php if($rws['svia']=='Other'){?> selected <?php } ?> value="Other"> Other</option>		
		</select> <div style="display: inline; <?php if($rws['svia'] != 'Other') echo 'visibility: hidden'; ?>" id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50' value="<?php echo $rws['svia_oth'] ?>" ></div></td>
	</tr>		

	<tr>
		<td height="30">City </td>
		<td height="30"><input name="city" type="text" id="city" value="<?php echo $rws['city'];?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">State </td>
		<td height="30"><input name="state" type="text" id="state" value="<?php echo $rws['state'];?>" size="30"></td>
	</tr>
    
	<!-- <tr>
	  <td height="30">Shipping Terms :</td>
	  <td height="30"><label>
		<select name="sterms" id="sterms">
		<option value="Prepaid">Prepaid</option>
		 <option value="Collect"> Collect</option>
	  </select>
	  </label></td>
	</tr> -->

<tr>
	<td height="30" colspan="2">
	<table width="690" border="0">
	<tr>
		<td width="202" height="30">Item</td>
		<td width="225" height="30">Description</td>
		<td width="140" height="30">Total Qty</td>
		<td width="105" height="30">Unit Price </td>
	</tr>
	<?php

	$sqi = "select * from citems_tb where pid='".$rws['poid']."' order by item";
	$resi = mysql_query($sqi) or die('error in data');
	$tot = 0;
	$i = 1;
	$totalprice = 0;

while($rwi = mysql_fetch_assoc($resi)) { ?>
  
<tr>
	<td height="30"><label>
	<input name="item_<?php echo $i;?>" type="text" value="<?php echo $rwi[item];?>" id="itemname[]" size="30">
	</label></td>
	<td height="30"><input name="desc_<?php echo $i;?>" value="<?php echo $rwi[itemdesc];?>" type="text" id="desc[]" size="30"></td>
	<td height="30"><input name="qty_<?php echo $i;?>" value="<?php echo $rwi[qty2];?>" type="text" id="qty_<?php echo $i;?>" class="cprice" size="20"></td>
	<td height="30"><input name="uprice_<?php echo $i;?>" value="<?php echo $rwi[uprice];?>" type="text" id="uprice_<?php echo $i;?>" class="cprice" size="20"></td>
</tr>

<?php 
	$totalprice += str_replace(",", "", $rwi['qty2']) * str_replace(",", "", $rwi['uprice']);
	$i++;
}

for(;$i<=6;$i++) {

?>

<tr>
	<td height="30"><label>
	<input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30">
	</label></td>
	<td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>
	<td height="30"><input name="qty_<?php echo $i;?>" class="cprice" type="text" id="qty_<?php echo $i;?>" size="20"></td>
	<td height="30"><input name="uprice_<?php echo $i;?>" class="cprice" type="text" id="uprice_<?php echo $i;?>" size="20"></td>
</tr>

<?php 

}

?>

</table></td>
</tr>

<tr>
	<td height="30">Total Price:</td>
	<td height="30" id="totalprice" style="padding-right: 10px; text-align: right; font-weight: bold;"><?php echo "$".number_format($totalprice, 2); ?></td>
</tr>

<tr>
	<td height="30"> Lookup ID </td>
	<td height="30"><input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
	<!--<input name="part_no" type="text" id="part_no" size="30">--></td>
</tr>
</table>

<div id="txtshow1">
<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
<tr>

<td height="30">Customer </td>

<td height="30"><input name="customer" type="text" id="customer" value="<?php echo $rws['customer'];?>" size="30"></td>
</tr>
<tr>

<td height="30">Part # </td>

<td height="30"><input name="part_no" type="text" id="part_no"  value="<?php echo $rws['part_no'];?>" size="30"></td>
</tr>
<tr>

<td height="30">Rev </td>

<td height="30"><input name="rev" type="text" id="rev"  value="<?php echo $rws['rev'];?>" size="30"></td>
</tr>

<!--<tr>
<td height="30">Date of week</td>
<td height="30"><input name="dweek" type="text" id="dweek" value="<?php // echo $rws['dweek'];?>" size="30"></td>
</tr>-->
<?php      

$pno=$rws['part_no'];
$rev=$rws['rev'];
$cname=$rws['customer'];

$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$po = $row11->poid;  
$ypo = $row11->po;
if ($po>0)
$po=$po+9933;
else 
$po='';                                                   
?>                                

<tr>

<td height="30">Our PO#</td>

<td height="30"><input name="oo"  type="text" id="oo" value="<?php echo  $rws['our_ord_num'];?>" size="30"></td>
</tr>
<tr>

<td height="30">Customer PO#</td>

<td height="30"><input  name="po" type="text" id="po" value="<?php echo  $rws['po'];?>" size="30"></td>
</tr>
<tr>

<td height="30">Layer Count</td>

<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $rws['no_layer']; ?>" /></td>
</tr>
</table>
</div>
<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
<!-- <tr>
<td height="30">Date and Day</td>
<td height="30"><input name="date1" type="text" id="exampleII" value="<?php // echo $rws['date1'];?>" size="30"></td>
</tr> -->

<!-- <tr>
<td height="30">ROHS Cerificate Required</td>
<td height="30">
<input type="radio" name="rohs" id="radio" <?php //  if ($rws['rohs']=='yes') echo 'checked';?>  value="yes">

Yes
<input type="radio" name="rohs" id="radio2" <?php // if ($rws['rohs']=='no') echo 'checked';?> value="no"> 

No</td>
</tr>-->

<!-- <tr>
<td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 

<input name="date2" type="text" id="date2" size="30"></td>

</tr>-->
<tr>

<td height="30">Sale Tax</td>

<td height="30"><input name="stax" type="text" id="stax" value="<?php echo $rws['stax'];?>" size="30"></td>
</tr>

<tr>

<td height="30">Comments</td>

<td height="30"><label>

<textarea name="comments" id="comments" cols="45" rows="5"><?php echo $rws['comments'];?></textarea>

</label></td>
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

</tr>-->

<?php if ($rws['mdl']!='no')  {?>
<tr  >

<td height="30" colspan="2"><table width="690" border="0">

<tr>

<td width="140" height="30">QTY</td>

<td width="105" height="30">Date  </td>
</tr>
<?php
$sqi="select * from mdlitems_tb where pid='".$rws['poid']."'";

$resi=mysql_query($sqi);

if(!$resi)
{

die('error in data');

}

$i=1;

while($rwi=mysql_fetch_array($resi))

{ ?>

<tr>

<td height="30"><input name="mdlqty_<?php echo $i;?>" value="<?php echo $rwi[qty];?>" type="text" id="mdlqty[]" size="20"></td>

<td height="30"><input name="mdldate_<?php echo $i;?>" value="<?php echo $rwi[date];?>" type="text" id="exa<?php echo $i;?>" size="20"></td>
</tr>

<?php 
$i++;
}

for(;$i<=12;$i++) {

?>

<tr>
<td height="30"><input name="mdlqty_<?php echo $i;?>" type="text" id="mdlqty[]" size="20"></td>

<td height="30"><input name="mdldate_<?php echo $i;?>" type="text" id="exa<?php echo $i;?>" size="20"></td>
</tr>

<?php 

}

?>

</table></td>
</tr>

<?php } ?>  

	<tr>
		<td height="30" colspan="2"><div style="position: relative">	
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

<?php

	echo "<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:1300px; left: 250px; display: none; ' onmousedown='mydragg.startMoving(this,\"container\",event);' onmouseup='mydragg.stopMoving(\"container\");'>";		

	$cname = $rws['customer'];
	$psql = "select pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid inner join data_tb dt on pt.custid = dt.data_id where dt.c_name='".$cname."' and instr(pt2.viewable, 'con') > 0 and trim(pt2.reqs) <> ''";

	$pres = mysql_query($psql) or die('err');
	if(mysql_num_rows($pres) > 0) { 

		echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
		<div><h3>".$cname." Customer Profile</h3>";
		$i = 1;
		echo "<table border='0'>";
		while($prow = mysql_fetch_assoc($pres)) {
			echo "<tr><td align='center'>".(getSelectable('con', $prow['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($prow['reqs'])."' ".(strstr($rws['sp_reqs'], trim($prow['reqs'])) ? " CHECKED " : "")."> " : $i.'.')."</td><td>".trim($prow['reqs'])."</td></tr>";
			$i++;
		}
		echo "</table>";
		echo "<br><input type='button' id='save_value' name='save_value' value='Save' /></div>";
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
	</div>

	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #c1fff8; border: 1px solid #369; position: absolute; top:1500px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

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