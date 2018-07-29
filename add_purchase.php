<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
//For alerts reference
if( !isset($_SESSION['refid']) ) $_SESSION['refid'] = time();

$item_desc = array (
	"pcbp"	=> "PCB Fabrication (Production)",
	"pcbeo" => "PCB Fabrication (Expedited Order)",
	"nre"	=> "NRE",
	"exf"	=> "Expedite fee",
	"suc"	=> "Set-up charge",
	"frt"	=> "Freight",
	"etst"	=> "E-Test",
	"fpb"	=> "Flying Probe",
	"etstf" => "E-Test Fixture",
	"sf"	=> "Surface Finish",
	"oth"	=> "Other"
);

if(isset($_REQUEST['Submit'])) {
	
	 $dweek = substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1']));  // abcd
	
	/*date1
	$dweek=;*/
	
$sqin = "insert into porder_tb (vid, sid, namereq, namereq1,svia,city,state,sterms, rohs, comments,podate,customer, part_no, rev, date1, date2, po,dweek, no_layer, cancharge, ordon, iscancel, ccharge, sp_reqs, svia_oth) values ('".$_REQUEST['vid']."', '".$_REQUEST['sid']."', '".$_REQUEST['namereq']."', '".$_REQUEST['namereq1']."', '".$_REQUEST['svia']."', '".$_REQUEST['city']."', '".$_REQUEST['state']."', '".$_REQUEST['sterms']."', '".$_REQUEST['rohs']."', '".$_REQUEST['area1']."', '".date('m/d/Y')."', '".$_REQUEST['customer']."', '".$_REQUEST['part_no']."', '".$_REQUEST['rev']."', '".$_REQUEST['date1']."', '".$_REQUEST['date2']."', '".$_REQUEST['po']."', '".$dweek."', '".$_REQUEST['lyrcnt']."', '".$_REQUEST['cancharge']."', '".$_REQUEST['ordon']."', '".$_REQUEST['iscancel']."', '".$_REQUEST['ccharge']."', '".$_REQUEST['specialreqval']."', '".trim($_POST['svia_oth'])."')";

$resin = mysql_query($sqin) or die('error in data');

$cnid = mysql_insert_id($conn);

for($i = 1; $i <= 6; $i++) {
	$item = $_REQUEST['item_'.$i];
	$itemdesc = addslashes($_REQUEST['desc_'.$i]);
	$dpdesc = addslashes($_REQUEST['dpdesc_'.$i]);
	$qty = $_REQUEST['qty_'.$i];
	$uprice = str_replace(',', '', $_REQUEST['uprice_'.$i]);
	if($item != "") {
		$up = number_format($uprice, 4, '.', '');
		$tprice = str_replace(',', '', $qty) * $up;

		$sqs = "insert into items_tb (item, itemdesc, qty2, uprice, tprice, pid, dpval) values ('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid."', '".$dpdesc."')";

		$ress = mysql_query($sqs) or die('errro');
	}
}

header('location:manage_purchase.php');

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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

<!--
 <script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" /> -->
	 
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
		$j('#totalprice').html('$'+sumprice.toFixed(4));
	});

	$j("#svia").change(function() {
		if( $j(this).val() == 'Other' ) 
			$j("#svia_oth").css('visibility', 'visible');
		else $j("#svia_oth").css('visibility', 'hidden');
	});

	$j(".descdp").change(function() {
		var did = $j(this).attr('id').substring(2);
		if( $j(this).val() == 'oth' ) 
			$j("#"+did).css('visibility', 'visible');
		else $j("#"+did).css('visibility', 'hidden');
	});

	$j("#Submit").click(function(e) {

		var offset = $j(this).offset();

		if( $j.trim($j('#sid').val()) == "") { 
			alert('Please select Shipper');
		}
		else {

		if( $j.trim($j('#part_no').val()) != "") {
			var response = geturl("getalerts.php?customer="+$j.trim($j('#customer').val())+"&pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&ftype=po&refid=" + <?php echo $_SESSION['refid'] ?>); 
 //
			if(response != 'norecords') {
				$j('#alertDiv').html(response); 
				$j('#alertDiv').show();	
				if(flag3 <= 1) flag3 = flag3 + 1;
			}

			var stockleft = geturl('getStockLeft.php?pno='+$j('#part_no').val()+'_'+$j('#rev').val()+'_'+$j('#customer').val());
			if(stockleft != "norecords") {
				$j('#stockdiv').html(stockleft).show();	
				if(flag3 <= 2) flag3 = flag3 + 1;
				$j('#stockclose').livequery('click', function(e) {		
					if(flag3 > 1) {
						flag3 = flag3 - 1;
						$j(this).parent().hide();
					}
					else  
						$j('#form1').submit();//form submit on close
				});
			}

			var stockleft_comment = geturl('getStockLeftComment.php?pno='+$j('#part_no').val()+'_'+$j('#rev').val()+'_'+$j('#customer').val());
		
			if(stockleft_comment != "norecords") {
				$j('#stockdivComment').html(stockleft_comment).show();

				if(flag3 <= 2) flag3 = flag3 + 1;
				$j('#stockCommentclose').livequery('click', function(e) {		
					//$j('#stockdiv').hide();	
					if(flag3 > 1) {
						flag3 = flag3 - 1;
						$j(this).parent().hide();
					}
					else  
						$j('#form1').submit();//form submit on close
				});
			}
		}

		if(flag1 == 1) { // Customer profile popup
			$j('#reqDiv').css({top: (offset.top-150)+'px'}).show(); 
			if(flag3 <= 3) flag3 = flag3 + 1;

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
		}

	});	

}); 
</script> 
<script  type="text/javascript" src='js/draggable.js'></script>

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
	qty1 = document.getElementById('part_no11').value;
	$j('#txtshow1').html(geturl('getquotedata22.php?pnorev='+qty1));  
	var showlink = geturl('getquotedata22.php?pnorev='+qty1+'&flag=1&ftype=po');
	if(showlink != "") { $j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }	
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

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>

<title>Add Purchase</title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

</head><body>      

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr>

<td align="center" id="container">

<table  border="0" cellpadding="0" cellspacing="1" width="1300">

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
		<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
		<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>
		<td style="line-height: 16px;">
		<form id="form1" name="form1" method="post" action="">
		<input type="hidden" name="specialreqval" id="specialreqval" value="">

	  <p>&nbsp;</p>

	<table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

	<tr>
		<td height="30" colspan="2"><strong>ADD PURCHASE ORDER FORM</strong></td>
	</tr>

		<!-- <tr>
		  <td height="30" colspan="2"> PCBs Global Incorporated<br>
			2500 E. La Palma Ave.<br>
			Anaheim Ca. 92806<br>
			Phone: (855) 722-7456<br>
		  Fax: (855) 262-5305 </td>

		</tr> -->

		<tr>

		  <td width="137" height="30"><strong>Cancellation</strong></td>
		   <td width="443" height="30"> <input type="radio" name="iscancel" id="radio12" value="yes"> Yes

		  <input type="radio" name="iscancel" id="radio122" checked value="no">  No</td>
		</tr>
		
		<!-- <tr>

		  <td width="137" height="30"> <strong>Charge</strong></td>
		   <td width="443" height="30"> <input name="ccharge" type="text" id="ccharge" size="8" /> </td>
		</tr>-->
		
		<tr>
		  <td width="137" height="30">Select Vendor</td>
		  <td width="443" height="30"><label>

			<select name="vid" id="vid">

			<?php 

			$sqv = "select * from vendor_tb order by c_name";
			$resv = mysql_query($sqv) or die('err');
			while($rwv = mysql_fetch_assoc($resv)) {

			?>

			<option value="<?php echo $rwv['data_id'];
			?>"><?php echo $rwv['c_name'];
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

			$sqs = "select * from data_tb where c_name <> '' ORDER BY c_name";

			$ress = mysql_query($sqs) or die('err');

			while($rwv = mysql_fetch_assoc($ress)) {
			?>
				<option value="c<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; ?></option>
			<?php 
			}
			?>			
			<option class="sred" disabled value="">--------- Shippers List ------------</option>
			<?php

			$sqv = "select * from shipper_tb order by c_name";
			$resv = mysql_query($sqv) or die('err');

			while($rwv = mysql_fetch_assoc($resv)) {
			?>
				<option value="<?php echo $rwv['data_id'];
				?>" <?php echo ($rwv['data_id'] == '3' ? "SELECTED" : ""); ?> ><?php echo $rwv['c_name'];
				?></option>
			<?php 
			}
			?> 
			</select></td>
		</tr>

		<tr>
		  <td height="30"> Name of Requisitioner </td>
		  <td height="30"><input name="namereq" type="text" id="namereq" size="30"></td>
		</tr>

		<tr>
		  <td height="30">Ship Via</td>
		  <td height="30"><select name="svia" id="svia">
			<option value="Fedex">Fedex</option>
			<option value="UPS"> UPS</option>			
			<option value="Personal Delivery"> Personal Delivery</option>	
			<option value="Elecronic Data"> Elecronic Data</option>
			<option value="Other">Other</option>
		</select> <div style='display: inline; visibility: hidden' id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50'></div></td>
		</tr>

		<tr>
		  <td height="30">City </td>
		  <td height="30"><input name="city" type="text" id="city" size="30"></td>
		</tr>

		<tr>
		  <td height="30">State </td>
		  <td height="30"><input name="state" type="text" id="state" size="30"></td>
		</tr>

		<tr>
		  <td height="30">&nbsp;Shipping Terms :</td>
		  <td height="30"><label>
			<select name="sterms" id="sterms">			
				<option value="Prepaid">Prepaid</option>
				<option value="priority">priority</option>
				<option value="ground"> ground</option>
				<option value="2nd Day">2nd Day</option>
		  </select>
		  </label></td>
		</tr>

		<tr>
			<td colspan="2">
			<table width="100%" border="0">

			<tr>
				<td height="30">Item</td>
				<td>Description</td>
				<td>QTY</td>
				<td>Unit Price </td>
			</tr>

			<?php 
			for($i = 1; $i <= 6; $i++) {
			?>

			<tr>
				<td height="30" valign='top'><label><input name="item_<?php echo $i; ?>" type="text" id="itemname[]" size="3" ></label></td>

				<td height="30" valign='top'><select id="dpdesc_<?php echo $i; ?>" name="dpdesc_<?php echo $i; ?>" class="descdp">
				<?php 
					echo "<option value=''>Select</option>"; 
					foreach($item_desc as $ki => $vi) 
					echo "<option value='".$ki."'>".$vi."</option>"; ?>
				</select><input name="desc_<?php echo $i; ?>" value="" type="text" id="desc_<?php echo $i; ?>" size="30" style="visibility:hidden;  margin: 0 0 0 5px" ></td>

				<td height="30" valign='top'><input name="qty_<?php echo $i; ?>" type="text" id="qty_<?php echo $i; ?>" size="5" class="cprice" ></td>

				<td height="30" valign='top'><input name="uprice_<?php echo $i; ?>" type="text" id="uprice_<?php echo $i; ?>" size="10" class="cprice" ></td>
			</tr>

			<?php 
			}
			?>

		  </table></td>
		</tr>

		<tr>
			<td height="30">Total Price:</td>
			<td height="30" id="totalprice" style="padding-right: 10px; text-align: right; font-weight: bold;">&nbsp;</td>
		</tr>

		<tr>
			<td height="30"> Lookup ID </td>
			<td height="30">
			<input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" /></td>
		</tr>
		
		</table>

		<div id="txtshow1">
		<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

		<tr>
			<td height="30">Part # </td>
			<td height="30"><input name="part_no" type="text" id="part_no" size="30"></td>
		</tr>

		<tr>
			<td height="30">Customer </td>
			<td height="30"><input name="customer" type="text" id="customer" size="30"></td>
		</tr>

		<tr>
			<td height="30">Rev </td>
			<td height="30"><input name="rev" type="text" id="rev" size="30"></td>
		</tr>

		<tr>
			<td height="30">Customer PO#</td>
			<td height="30"><input  name="po" type="text" id="po" size="30"></td>
		</tr>

		<tr>
			<td height="30">Layer Count</td>
			<td height="30"><input name="lyrcnt" id="lyrcnt" /></td>
		</tr>

		<tr>
			<td height="30"> Name of Requestor </td>
			<td height="30"><input name="namereq1" type="text" id="namereq1" size="30"></td>
		</tr>

		</table>
		</div>

		<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

		<tr>
			<td height="30">Ordered On</td>
			<td height="30"><input name="ordon" type="text" id="exampleIII" size="30"></td>
		</tr>

		<tr>
			<td height="30">Required Dock Date</td>
			<td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>
		</tr>

	   <!-- <tr>

		  <td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 

			<input name="date2" type="text" id="date2" size="30"></td>

		</tr> -->

		<tr>
			<td height="30">ROHS Cerificate Required</td>
			<td height="30"><input type="radio" name="rohs" id="radio" value="yes">Yes<input type="radio" name="rohs" id="radio2" value="no">No</td>
		</tr>
		<!-- <tr>

		<td height="30">Cancellation charge</td>
		<td height="30"><input type="radio" name="cancharge" id="radio12" value="yes">Yes<input type="radio" name="cancharge" id="radio122" value="no">No</td>

		</tr> -->

		<tr>
			<td height="30">Comments</td>
			<td height="30"><label><textarea name="area1" id="area1" cols="45" rows="5"></textarea></label></td>
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
			<div id='specialreq' style='color: #000; font: 11px/25px Verdana;'></div></td>
		</tr>		

		<tr>
			<td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">
			&nbsp;<label><input type="reset" name="button2" id="button2" value="Reset"></label> &nbsp; &nbsp; <a href="welcome.php">Go back to front page</a></td>
		</tr>

		<tr>
			<td height="30">&nbsp;</td>
			<td height="30">&nbsp;</td>
		</tr>

		</table>
		<div id="stockdiv" style='z-index: 110;  border: 1px solid #369; position: absolute; top: 850px; left: 650px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");' ></div>

		<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:1250px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

		<div id='alertDiv' style='z-index: 100; padding: 10px; background: #c1fff8; border: 1px solid #369; position: absolute; top:1000px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

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

</tbody></table>  
</body></html>