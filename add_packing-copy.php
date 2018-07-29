<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_POST['Submit'])) {

$dweek = substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1'])); 
$sqin = "insert into packing_tb (vid, sid, namereq ,svia, fcharge, city, state, sterm, comments, podate, customer, cusaccno, part_no, rev, delto,date1, odate, dweek, po,our_ord_num, saletax, no_layer, sp_reqs, svia_oth) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['svia']."','".$_REQUEST['fcharge']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['area1']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['cusaccno']."','".$_REQUEST['part_no']."','".$_REQUEST['rev']."','".$_REQUEST['delto']."','".$_REQUEST['date1']."','".$_REQUEST['odate']."','".$dweek."','".$_REQUEST['po']."','".$_REQUEST['oo']."','".$_REQUEST['stax']."','".$_REQUEST['lyrcnt']."', '".$_REQUEST['specialreqval']."', '".$_POST['svia_oth']."')";




$resin = mysql_query($sqin) or die('error in data');
$invoice_id =mysql_insert_id();

$cnid = mysql_insert_id($conn);


$sql_select_temp ="SELECT * FROM  temp_profile2";
$res_tempprof2 = mysql_query($sql_select_temp);

while($temprow=mysql_fetch_assoc($res_tempprof2)){
	echo $sql_prof3 = "INSERT INTO profile_tb3 (invoice_id,custid,profid,reqs,selectable,viewable,profile_tb3.check,check2) VALUES (".$invoice_id.",".$_POST['customer'].",".$temprow['profid'].",'".$temprow['reqs']."',".$temprow['selectable'].",'".$temprow['viewable']."',".$temprow['check'].",".$temprow['check2'].")";
mysql_query($sql_prof3);
}





for($i = 1; $i <= 6; $i++) {

	$item = $_REQUEST['item_'.$i];
	$itemdesc = $_REQUEST['desc_'.$i];
	$qty = str_replace(',', '', $_REQUEST['qty_'.$i]);
	$shipqty = str_replace(',', '', $_REQUEST['shipqty_'.$i]);

	if($item != "") {

		$sqs = "insert into packing_items_tb(item,itemdesc,qty2,shipqty,pid) values('".$item."','".$itemdesc."','".$qty."','".$shipqty."','".$cnid."')";

		$ress = mysql_query($sqs) or die('errro');
	}
}

$sqv = "select * from maincont_tb where coustid='".$_REQUEST['customer']."'";
$resv = mysql_query($sqv) or die('err');
$ii = mysql_num_rows($resv);

for($i = 1; $i <= $ii; $i++) {

	$maincont = $_REQUEST['mcont_'.$i];

	if($maincont != "") {
		$sqs = "insert into maincont_packing(maincontid, packingid) values('".$maincont."', '".$cnid."')";
		$ress = mysql_query($sqs) or die('errro');
	}
}	

header('location:manage_packing.php');

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Packing Slip</title>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script> -->
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function(){
	$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});
});

</script>
<script type="text/javascript" src="js/gotowelcome.js"></script> 
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "simple",
forced_root_block : false
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
	$j('#txtshow1').html(geturl('getquotedata11.php?pnorev='+qty1));  
}

// window.onbeforeunload = function () {
//     return "Do you really want to close?";
// };

</script>
<script  type="text/javascript" src='js/draggable.js'></script>

<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript">
window.addEvent('domready', function() {
var d1 = new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>

<script type="text/javascript">
window.addEvent('domready', function() {
var d2 = new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });
});
</script>

<script type="text/javascript">
var flag1 = 0;
var flag3 = 0;

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
	xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	document.getElementById("content").innerHTML=xmlhttp.responseText;
	}
	}
	xmlhttp.open("GET","getmaincontact.php?uid="+uid,true);
	xmlhttp.send();

	var showlink = geturl("getRequirements.php?ftype=pac&cid="+uid);
	if(showlink != "") { //$j('#reqlink').show(); 
	$j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }
}

$j(document).ready(function() {

	$j(".qty1").change(function() {
		var totqty = 0;
		var totqty2 = 0;
		for (var i = 1; i <= 6; i++) {
			var qty = $j('#qty_' + i).val().replace(",","");
			var sqty = $j('#shipqty_' + i).val().replace(",","");
			if (!isNaN(qty)) totqty = ((qty*1) + totqty);
			if (!isNaN(sqty)) totqty2 = ((sqty*1) + totqty2);
		}
		$j('#qtytot').html(totqty);
		$j('#qtytot2').html(totqty2);
	});	

	$j("#Submit").click(function(e) {

		if( $j.trim($j('#vid').val()) == "") { 
			alert('Please select Bill to option');
		}
		else if( $j.trim($j('#sid').val()) == "") { 
			alert('Please select Shipper');
		}
		else {

		if( $j.trim($j('#part_no').val()) != "") { 
			var response = geturl("getalerts.php?customer="+$j.trim($j('#customer').val())+"&pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&ftype=pac"); 
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
	}

	});

	$j("#svia").change(function() {
		if( $j(this).val() == 'Other' ) 
			$j("#svia_oth").css('visibility', 'visible');
		else $j("#svia_oth").css('visibility', 'hidden');
	});
});

</script>

</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>

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
<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">
Welcome To Admin Panel <br />
<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>
<td valign="top" style="line-height: 16px;">

<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="specialreqval" id="specialreqval" value="">

  <p>&nbsp;</p>

  <table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

	<tr>
	  <td height="30" colspan="2"><strong>ADD PACKING SLIP FORM</strong></td>
	</tr>

	<tr>
	  <td width="137" height="30">Bill to</td>
	  <td width="443" height="30"><label>

		<select name="vid" id="vid">
		<option value=''>Select Customer</option>
		<?php 
		$sqv = "select * from data_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>
			<option value="<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
		?>
	  </select>
	  </label></td>
	</tr>

	<tr>

	  <td height="30">Shipped to</td>
	  <td height="30"><select name="sid" id="sid">
	  <option value=''>Select Shipper</option>

		<?php 
		$sqv = "select * from data_tb where c_name <> '' ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_assoc($resv)) {
		?>
			<option value="c<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
		?>	
		<option class="sred" disabled value="">--------- Shippers List ------------</option>
		<?php 

		$sqv = "select * from shipper_tb order by c_name asc";
		$resv = mysql_query($sqv) or die('err');

		while($rwv = mysql_fetch_assoc($resv)) {
		?>
			<option value="s<?php echo $rwv['data_id']; ?>"><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
		?> 
		</select></td>
	</tr>

   <!-- <tr>
	  <td height="30"> Sales Rep </td>
	  <td height="30"><input name="namereq" type="text" id="namereq" size="30"></td>
	</tr> -->

	<tr>
		<td height="30">Ship Via</td>
		<td height="30">
		<select name="svia" id="svia">
			<option value="Elecronic Data">Elecronic Data</option>
			<option value="Fedex">Fedex</option>
			<option value="Personal Delivery" SELECTED>Personal Delivery</option>
			<option value="UPS">UPS</option>
			<option value="Other">Other</option>
		</select> <div style='display: inline; visibility: hidden' id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50'></div></td>
	</tr>

   <!-- <tr><td height="30"> Freigh Charge</td>
	  <td height="30"><input name="fcharge" type="text" id="fcharge" size="30"></td>
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
		  <td width="140" height="30">Qty Ordered</td>
		  <td width="105" height="30">Qty Shipped </td>
		</tr>

		<?php for($i = 1; $i <= 6; $i++) { 	?>

		<tr>
		  <td height="30"><label>
			<input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30">
		  </label></td>

		  <td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>
		  <td height="30"><input name="qty_<?php echo $i;?>" type="text" id="qty_<?php echo $i;?>" size="20" class='qty1'></td>
		  <td height="30"><input name="shipqty_<?php echo $i;?>" type="text" id="shipqty_<?php echo $i;?>" size="20"  class='qty1'></td>
		</tr>

		<?php 
		}
		?>

		<tr>
		  <td colspan='2' style="text-align: right;padding-right: 5px;font-weight: bold">Total:</td>
		  <td id='qtytot' style='font-weight: bold'>0</td>
		  <td id='qtytot2' style='font-weight: bold'>0</td>
		</tr>

	  </table></td>

	</tr>

	<tr>
	  <td height="30">&nbsp;</td>
	  <td height="30">&nbsp;</td>
	</tr>

  <tr>
	  <td height="30">Select Customer </td>
	  <td height="30">
	   <select name="customer" id="customer" onChange="test();">
		<option value="0">--Select Customer--</option>
		<?php 

		$sqv = "select * from data_tb ORDER BY trim(c_name)";
		$resv = mysql_query($sqv) or die('err');
		while($rwv=mysql_fetch_array($resv)) {
		?>
		<option value="<?php echo $rwv['data_id'];
		?>" ><?php echo $rwv['c_shortname'];
		?></option>
		<?php 
		}
		?>
		 </select>
	  </td>

	</tr>
   
	<tr>
	  <td height="30">Customer Main Contact </td>
	  <td height="30" ><span id="content"></span></td>

	</tr>  
  
   <!-- <tr>
	  <td height="30">Customer Account Number </td>
	  <td height="30"><input name="cusaccno" type="text" id="cusaccno" size="30"></td>
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
	  <td height="30">Ordered Date</td>
	  <td height="30"><input  name="odate" id="exampleIII" type="text"    size="30"></td>
	</tr>

	 <tr>
	  <td height="30">Layer Count</td>
	  <td height="30"><input name="lyrcnt" id="lyrcnt" /></td>
	</tr>

	 </table>
	</div>

	 <table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">	
	
	<tr>
	  <td height="30">Delivered to</td>
	  <td height="30"><input name="delto" type="text" id="delto" size="30"></td>
	</tr>	

	<tr>
	  <td height="30">Delivery Date</td>
	  <td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>
	</tr>
   
	<tr>
	  <td height="30">Comments</td>
	  <td height="30"><textarea name="area1" id="area1" cols="45" rows="5"></textarea>
	  </td>
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
		<!-- <div id='specialreq' style='color: #000; font: 11px/25px Verdana;'></div><a href="preview_packing_pdf.php"><button>Preview</button></a> --></td>
	</tr>

	<tr>
	  <td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">&nbsp;    <label><input type="reset" name="button2" id="button2" value="Reset"></label><a href="welcome.php">Go back to front page</a></td>
	</tr>

	<tr>
	  <td height="30">&nbsp;</td>
	  <td height="30">&nbsp;</td>
	</tr>

  </table>

  <!-- Requirements Popup -->
	<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:1100px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>
  <!-- Alerts form and list -->
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #c1fff8; border: 1px solid #369; position: absolute; top:1000px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

  <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

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


