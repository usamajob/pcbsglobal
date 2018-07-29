<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_POST['Submit'])) {
	$dweek = substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1'])); 
	$sqin = "insert into invoice_tb (vid, sid, namereq, svia, fcharge, city, state, sterm, comments, podate, customer, part_no, rev, delto, ord_by, date1, dweek, po, our_ord_num, saletax, no_layer, sp_reqs, svia_oth, salesrep, commision, comval,fob) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."', '".escpe($_REQUEST['namereq'])."', '".$_REQUEST['svia']."', '".$_REQUEST['fcharge']."', '".escpe($_REQUEST['city'])."', '".escpe($_REQUEST['state'])."', '".$_REQUEST['sterms']."', '".escpe($_REQUEST['area1'])."', '".date('m/d/Y')."', '".escpe($_REQUEST['customer'])."', '".$_REQUEST['part_no']."', '".$_REQUEST['rev']."', '".$_REQUEST['delto']."', '".$_REQUEST['ord_by']."', '".$_REQUEST['date1']."', '".$dweek."', '".$_REQUEST['po']."', '".$_REQUEST['oo']."', '".$_REQUEST['stax']."', '".$_REQUEST['lyrcnt']."', '".escpe($_REQUEST['specialreqval'])."', '".$_POST['svia_oth']."',  '".escpe($_POST['salesrep'])."', '".$_POST['commision']."', '".$_POST['totcomm']."', '".$_POST['city1']."')";

$resin = mysql_query($sqin) or die('error in data'.mysql_error());
$cnid = mysql_insert_id($conn);

for($i = 1; $i <= 6; $i++) {

	$item = $_REQUEST['item_'.$i];
	$itemdesc = $_REQUEST['desc_'.$i];
	$qty = $_REQUEST['qty_'.$i];
	$uprice = str_replace(',', '', $_REQUEST['uprice_'.$i]);
	$icomm = isset($_REQUEST['icomm_'.$i]) ? '1' : '0';

	if($item != "") {
		$tprice = str_replace(',', '', $qty) * $uprice;
		$sqs = "insert into invoice_items_tb(item, itemdesc, qty2, uprice, tprice, pid, commision) values('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid."', '".$icomm."')";
		$ress = mysql_query($sqs) or die('errro');
	}
}

header('location: manage_invoice.php');

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Invoice</title>
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

<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();
var flag1 = 0;
var flag3 = 0;
function calcComm() {
	var totprice = 0;
	var sumprice = 0;
	var comm = $j('#commision').val();
	$j(':checkbox:checked').each(function() {
		var i = $j(this).val();
		var qty = $j('#qty_' + i).val().replace(",","");
		var uprice = $j('#uprice_' + i).val().replace(",","");
		if (!isNaN(qty) && !isNaN(uprice) && !isNaN(comm)) {
			var totprice = qty * uprice * comm;
			if(totprice > 0) sumprice =  sumprice + (totprice/100);
		}
	});
	$j('#totalcomm').html('$'+sumprice.toFixed(2));
	$j('#totcomm').val(sumprice.toFixed(2));
}

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
		calcComm();
	});

	$j(".icomm").click(function() { calcComm(); 	});
	
	$j("#svia").change(function() {
		if( $j(this).val() == 'Other' ) 
			$j("#svia_oth").css('visibility', 'visible');
		else $j("#svia_oth").css('visibility', 'hidden');
	});
	
	$j("#Submit").click(function(e) {

		if( $j.trim($j('#part_no').val()) != "") { 
			var response = geturl("getalerts.php?customer="+$j.trim($j('#customer').val())+"&pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&ftype=inv"); 
			if(response != 'norecords') {
				$j('#alertDiv').html(response); 
				$j('#alertDiv').show();	
				if(flag3 <= 1) flag3 = flag3 + 1;
			}
		}

		if(flag1 == 1) { // Customer profile popup
			$j('#reqDiv').show(); 
			if(flag3 <= 1) flag3 = flag3 + 1;

			$j('#close').livequery('click', function(e) {
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$j(this).parent().hide();
				}
				else  
					$j('#form1').submit();//form submit on close
			});

			$j('#save_value').livequery('click', function() {
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
	});

	getsalesrep();
}); 
</script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 
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
  
function test() {	
	qty1 = document.getElementById('part_no11').value;	$j('#txtshow1').html(geturl('getquotedata.php?frm=inv&pnorev='+qty1));  
	var showlink = geturl('getquotedata22.php?pnorev='+qty1+'&flag=1&ftype=inv');
	if(showlink != "") { $j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }
}
</script>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true }); });
</script>
<script type="text/javascript">
function getdate() {
	var pno = $j('#part_no').val();
	var rev = $j('#rev').val();
	var custpo = $j('#po').val();
	$j.post('getpkdate.php', {pno: pno, rev: rev, custpo: custpo}, function(txt) { $j('#blkdate').html(txt); });
}

function chngecomval() {
	var salesrep = $j('#salesrep').val();
	if(salesrep != "") {
		$j.post('getsalesrep.php', {comm: true, salesrep: salesrep}, function(txt) { if(txt != '') $j('#commision').val(txt); });
	}
	else $j('#commision').val('');
}

function getsalesrep() {
	var soldto = $j('#vid').val();
	var salesrep = $j('#salesrep').val();
	if(soldto != "") {
		$j.post('getsalesrep.php', {cust: soldto, salesrep: salesrep}, function(txt) { if(txt != '') { 
			var temp = txt.split('|');
			$j('#salesrep').html(temp[0]); 
			$j('#commision').val(temp[1]);
		}
		});
	}
}
</script>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr><td align="center">

<table border="0" cellpadding="0" cellspacing="1" width="1300">
<tbody>

<tr style="height:20px; background-color:#FFF;"></tr>

<tr>
	<td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>
</tr>

<tr>
<td id="mainpage" style="width: 750px;">

<div>

<table cellpadding="5" cellspacing="1" width="100%">
<tbody>

<tr>
<td valign="top" style="line-height: 16px;"><a href="welcome.php">
Welcome To Admin Panel <br />
<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>
<td style="line-height: 16px;">
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="specialreqval" id="specialreqval" value="">

<p>&nbsp;</p>

<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">

<tr>
	<td height="30" colspan="2"><strong>ADD INVOICE FORM</strong></td>
</tr>

<!-- <tr>
<td height="30" colspan="2"> PCBs Global Incorporated<br>
2500 E. La Palma Ave.<br>
Anaheim Ca. 92806<br>
Phone: (855) 722-7456<br>
Fax: (855) 262-5305 </td>
</tr> -->

<tr>
	<td width="125" height="30">Sold to</td>
	<td height="30"><select name="vid" id="vid" onchange="getsalesrep()"><?php 

	$sqv = "select * from data_tb ORDER BY c_name";
	$resv = mysql_query($sqv) or die('err');

	while($rwv = mysql_fetch_assoc($resv)) {
	?>
	<option value="<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; 
	?></option>
	<?php 
	}
	?>
	</select></td>
</tr>

<tr>
	<td height="30">Shipped to</td>
	<td height="30"><select name="sid" id="sid">

<?php 
$sqv = "select * from data_tb ORDER BY c_name";
$resv = mysql_query($sqv) or die('err');

while($rwv = mysql_fetch_array($resv)) {
?>
<option value="c<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; ?></option>
<?php 
}
?>
<option disabled value=""> ------ Shippers List -------- </option>
<?php 

$sqv = "select * from shipper_tb order by c_name";
$resv = mysql_query($sqv) or die('err');

while($rwv = mysql_fetch_array($resv)) {
	?>
	<option value="s<?php echo $rwv['data_id']; ?>" ><?php echo $rwv['c_name'];
	?></option>
	<?php 
}
?>
</select></td>
</tr>

<tr>
	<td height="30"> Sales Rep </td>
	<td height="30"><input name="namereq" type="text" id="namereq" size="16"> &nbsp; Outside Sales Rep <select id="salesrep" name="salesrep" onchange="chngecomval()" ><!--  -->
	<option value="">Select Outside Sales Rep</option>
	<?php 
	$sqlr = "select r_name from rep_tb order by r_name";
	$rres = mysql_query($sqlr) or die('Rep query error');
	if(mysql_num_rows($rres) > 0) {
		while($rowr = mysql_fetch_assoc($rres))
			echo "<option value='".$rowr['r_name']."'>".$rowr['r_name']."</option>";
	}
	?>
	</select> &nbsp; Commision% <input id="commision" name="commision" type="text" size="2"> </td>
</tr>

<tr>
	<td height="30">Ship Via</td>
	<td height="30">
	<select name="svia" id="svia">
		<option value="Elecronic Data">Elecronic Data</option>
		<option value="Fedex">Fedex</option>
		<option value="Personal Delivery" SELECTED>Personal Delivery</option>
		<option value="UPS">UPS</option>
		<option value="Other">Other</option>
	</select> <div style='display: inline; visibility: hidden' id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50'></div> </td>
</tr>

<tr>
	<td height="30"> Freight Charge</td>
	<td height="30"><input name="fcharge" type="text" id="fcharge" size="30"></td>
</tr>

<tr >
	<td height="30" id="city_check_1">City </td>
	<td height="30" style="display: none;" id="city_check_6">Alternate to FOB</td>
	<td height="30" ><div style="float: left">
		<input style="display: none;" name="city1" type="text" id="city_check_4"  size="30">
		<input name="city" type="text" id="city_check_2"  size="30">
		<span id="city_check_7">Alternate to FOB </span><input type="checkbox" name="city_check" id="city_check2" onclick="city_check1()"/></div> </td>
	
</tr>

<tr  >
	<td height="30" id="city_check_3">State </td>
	<td height="30"><input name="state" type="text"  size="30" id="city_check_5"></td>
</tr>

<script>
	function city_check1(){
		if(document.getElementById("city_check2").checked == true){
			//alert("hi");
			document.getElementById("city_check_1").style.display="none";
			document.getElementById("city_check_2").style.display="none";
			document.getElementById("city_check_3").style.display="none";
			document.getElementById("city_check_5").style.display="none";
			document.getElementById("city_check_4").style.display="block";
			document.getElementById("city_check_6").style.display="block";
			document.getElementById("city_check_7").style.display="none";
		}
		else{
			document.getElementById("city_check_1").style.display="block";
			document.getElementById("city_check_2").style.display="block";
			document.getElementById("city_check_3").style.display="block";
			document.getElementById("city_check_5").style.display="block";
			document.getElementById("city_check_4").style.display="none";
			document.getElementById("city_check_6").style.display="none";
			document.getElementById("city_check_7").style.display="block";
		}
	}	
</script>

<tr>
	<td height="30">Shipping Terms :</td>
	<td height="30"><label>
	<select name="sterms" id="sterms">
	<option value="Prepaid">Prepaid</option>
	<option value="Collect"> Collect</option>
	</select></label></td>
</tr>

<tr>

<td height="30" colspan="2">
<div id="txtdisp">
<table width="690" border="0">

<tr>
	<td width="202" height="30">Item</td>
	<td width="225" height="30">Description</td>
	<td width="120" height="30">QTY</td>
	<td width="80" height="30">Unit Price </td>
	<td width="45" height="30">Commission </td>
</tr>

<?php 

for($i=1; $i <= 6; $i++) { ?>
<tr>
	<td height="30"><label><input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30"></label></td>
	<td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>
	<td height="30"><input name="qty_<?php echo $i; ?>" type="text" id="qty_<?php echo $i; ?>" class="cprice" size="20"></td>
	<td height="30"><input name="uprice_<?php echo $i; ?>" type="text" id="uprice_<?php echo $i; ?>" size="20" class="cprice"></td>
	<td height="30" class="ctr"><input name="icomm_<?php echo $i; ?>" value="<?php echo $i; ?>" type="checkbox" id="icomm_<?php echo $i; ?>" class="icomm"></td>

</tr>
<?php 
}
?>
</table></div></td>
</tr>

<tr>
	<td height="30"><b>Total Commission</b></td>
	<td height="30" style=""><span id="totalcomm">&nbsp;</span><input type="hidden" id="totcomm" name="totcomm"> <div style='display: inline-block; padding-right: 10px; float: right; font-weight: bold;'>&nbsp;Total Price: <span id="totalprice"></span>&nbsp;</div></td>
</tr>

<tr>
	<td height="30"> Lookup ID </td>
	<td height="30"><input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
	<!-- <input name="part_no" type="text" id="part_no" size="30"> --></td>
</tr>

</table>
<div id="txtshow1" style='text-align: left'>
<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">

<tr>
	<td height="30" width="125">Customer </td>
	<td height="30"><input name="customer" type="text" id="customer" size="30"></td>
</tr>

<tr>
	<td height="30">Part # </td>
	<td height="30"><input name="part_no" type="text" id="part_no" size="30"></td>
</tr>

<tr>
<td height="30">Rev </td>
<td height="30"><input name="rev" type="text" id="rev" size="30"></td>
</tr>

<tr>
	<td height="30">Our PO#</td>
	<td height="30"><input  name="oo" type="text" id="oo" size="30"></td>
</tr>

<tr>
	<td height="30">Customer PO#</td>
	<td height="30"><input  name="po" type="text" id="po" size="30"></td>
</tr>

<tr>
	<td height="30">Ordered by</td>
	<td height="30"><input name="ord_by" type="text" id="ord_by" size="30"></td>
</tr>

<tr>
	<td height="30">Layer Count</td>
	<td height="30"><input name="lyrcnt" id="lyrcnt" /></td>
</tr>

<tr>
	<td height="30">Delievered On</td>
	<td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>
</tr>

</table>
</div>

<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">

<!--  <tr>
<td height="30">Date of week</td>
<td height="30"><input name="dweek" type="text" id="dweek" size="30"></td>

</tr> -->


<tr>
	<td height="30" width="125">Delivered to</td>
	<td height="30"><input name="delto" type="text" id="delto" size="30"></td>
</tr>


<!-- <tr>
<td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 
<input name="date2" type="text" id="date2" size="30"></td>

</tr> -->

<tr>
	<td height="30">Sales Tax</td>
	<td height="30">
	<input name="stax" type="text" id="stax" size="30">
	</td>
</tr>

<tr>
	<td height="30">Comments</td>
	<td height="30">
<!-- <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//]]>
</script> -->
	<label>
	<textarea name="area1" id="area1" cols="45" rows="5"></textarea>
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

</tr> -->

<tr>
	<td height="30" colspan="2">
	<div style="position: relative">
	<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:-100px; left: -150px; display: none;'></div>
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #fee; border: 1px solid #369; position: absolute; top:-200px; left: 250px; display: none;'></div>
	</div>
	<div id='specialreq' style='color: #000; font: 11px/25px Verdana;'></div></td>
</tr>

<tr>
	<td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">&nbsp;<label><input type="reset" name="button2" id="button2" value="Reset"></label><a href="welcome.php">Go back to front page</a></td>
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

</form>

</td>
</tr>                                           

</tbody></table>

</div>
</td>

</tr>
</tbody>

</table>

</td>
</tr>

</table>
</body></html>