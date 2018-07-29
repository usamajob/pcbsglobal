<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
require('library.php');

if(isset($_POST['Submit'])&&$_REQUEST[invoice_number]!='') {

	$dweek = substr($_REQUEST['date1'], -10);  // abcd

	if($_POST['pstatus'] == 'hide')
		$status = $_POST['pstatus'];
	else $status = 'show';

	$sqin = "update invoice_tb set vid='".$_REQUEST['vid']."', sid='".$_REQUEST['sid']."', namereq='".escpe($_REQUEST['namereq'])."', svia='".$_POST['svia']."', svia_oth='".trim($_POST['svia_oth'])."', fcharge='".$_REQUEST['fcharge']."', city='".escpe($_REQUEST['city'])."', state='".escpe($_REQUEST['state'])."', sterm='".$_REQUEST['sterms']."', comments='".escpe($_REQUEST['comments'])."', date1='".$_REQUEST['date1']."', dweek='".$dweek."', po='".$_REQUEST['po']."', customer='".escpe($_REQUEST['customer'])."', no_layer='', part_no='', rev='', delto='".$_REQUEST['delto']."', ord_by='".$_REQUEST['ord_by']."', order_on='".$_REQUEST['order_on']."', our_ord_num='".$_REQUEST['oo']."', saletax='".$_REQUEST['stax']."', sp_reqs='".escpe($_REQUEST['specialreqval'])."', invo_id='".$_REQUEST['invoice_number']."', invo_date='".$_REQUEST['invoice_date']."',
	status = '".$status."',
	whyhide = '".$_POST['whyhide']."', salesrep = '".escpe($_POST['salesrep'])."', commision = '".$_POST['commision']."', comval = '".$_POST['totcomm']."'
	where invoice_id='".$_REQUEST['id']."'";

	//echo $sqin; exit;

	$resin = mysql_query($sqin) or die('error in data');

	$cnid = $_REQUEST['inid'];
	$sqin11 = "DELETE FROM invoice_items_tb WHERE pid=".$cnid;
	mysql_query($sqin11);

	for($i = 1; $i <= $_REQUEST['row_count_row']; $i++) {

		$item = $_REQUEST['item_'.$i];
	$part_no=$_REQUEST['part_'.$i];
	$itemdesc = $_REQUEST['desc_'.$i];
	$qty = $_REQUEST['qty_'.$i];
	$uprice = str_replace(',', '', $_REQUEST['uprice_'.$i]);
	$sub_tot = $_REQUEST['sub_'.$i];
	$icomm = isset($_REQUEST['icomm_'.$i]) ? '1' : '0';

		if($item != "") {

			$tprice = str_replace(',', '', $qty) * $uprice;

			$sqs = "insert into invoice_items_tb(item,part_no, itemdesc, qty2, uprice,sub_tot, tprice, pid, commision,inv_id) values('".$item."','".$part_no."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$sub_tot."', '".$tprice."', '".$cnid."', '".$icomm."','".$_REQUEST[invoice_number]."')";

			$ress = mysql_query($sqs) or die('errro');
		}
	}
	header('location:manage_invoice.php');
}

$sqs = "select * from invoice_tb where invoice_id='".$_REQUEST['id']."'";
$res = mysql_query($sqs) or die('error in data');
$rws = mysql_fetch_assoc($res);
$date1 = substr($rws['date1'], -10); // abcd
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome</title>
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

	$j("#pstatus").click(function() {
		if( $j(this).attr('checked')  ) 
			$j("#whyhide").css('visibility', 'visible');
		else $j("#whyhide").css('visibility', 'hidden');
	});
		
	$j("#Submit").click(function() {

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
	});

	getsalesrep();
}); 
</script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

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
  
function test() {	
	qty1 = document.getElementById('part_no11').value;
	var date1 = "<?php echo $rws['date1'] ?>";
	$j('#txtshow1').html(geturl('getquotedata.php?frm=inv&date1='+date1+'&pnorev='+qty1));  
	var showlink = geturl('getquotedata22.php?pnorev='+qty1+'&flag=1&ftype=inv');
	if(showlink != "") { 
		$j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }	
}	
//-->
</script>
<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet">

<script src="jquery-1.12.1.min.js"></script>
<script src="js/ajax.js"></script>

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true , 'defaultDate': '<?php echo $date1 ?>', });});
</script>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({	mode : "textareas",	theme : "simple"});
</script>
<script type="text/javascript">
function getdate() {
	var pno = $j('#part_no').val();
	var rev = $j('#rev').val();
	var custpo = $j('#po').val();
	var date1 = "<?php echo $rws['date1'] ?>";
	$j.post('getpkdate.php', {pno: pno, rev: rev, custpo: custpo, date1: date1}, function(txt) { $j('#blkdate').html(txt); });
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

function body_run(){
	if(<?php echo $rws ?>=='Inv# need to be Updated'){
	alert("Please Update the Invoice ID before Submission");
}else{
	alert("you don't have to");
}
}

</script>
</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td align="center">

<table border="0" cellpadding="0" cellspacing="1" width="1300">
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

<tr><td id="mainpage" style="width: 750px;">

<div>

<table cellpadding="5" cellspacing="1" width="100%"><tbody>

<tr>
<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php"><br />
<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

<td style="line-height: 16px;"><form id="form1" name="form1" method="post" action="">
<input name="inid" id="inid" type="hidden" value="<?php echo $rws['invoice_id'];?>" >
<input type="hidden" name="specialreqval" id="specialreqval" value="<?php echo $rws['sp_reqs'] ?>">
<p>&nbsp;</p>

<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">

<tr>
  <td height="30" colspan="2"><strong>EDIT INVOICE FORM</strong> <!--<input type="checkbox" name="pstatus" id="pstatus" value='hide' <?php echo ($rws['status'] == 'hide' ? ' CHECKED' : '') ?>> Hide <div style="display: inline; <?php if($rws['status'] != 'hide') echo 'visibility: hidden'; ?>" id="whyhide">Reason: <input type="text" name="whyhide" size="50" maxlength='255' value="<?php echo $rws['whyhide'] ?>" >--></div>
	<?php 
	if($rws['invo_id']==NULL){
		?>
		<script>alert("Please Update the Invoice Number before Submission");
			document.getElementById("Submit").disabled = true;
			</script><?php
	}
	?></td>
</tr>

<tr>
  <td width="125" height="30">Sold to</td>
  <td height="30"><select name="vid" id="vid" onchange="getsalesrep()">
	<?php 
	$sqv = "select * from data_tb ORDER BY c_name";
	$resv = mysql_query($sqv) or die('err');

	while($rwv = mysql_fetch_assoc($resv)) { 	?>
	<option value="<?php echo $rwv['data_id']; 	?>" <?php if($rwv['data_id'] == $rws['vid']){?> selected <?php } ?>><?php echo $rwv['c_name']; 	?></option>

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
	while($rwv = mysql_fetch_assoc($resv)) {
	?>

	<option value="c<?php echo $rwv['data_id']; 	?>" <?php if('c'.$rwv['data_id'] == $rws['sid']) { ?> selected <?php } ?>><?php echo $rwv['c_name']; 	?></option>

	<?php 
	}
	?>
	<option disabled value=""> ------- Shippers List -------- </option>
	<?php 

	$sqv = "select * from shipper_tb order by c_name";
	$resv = mysql_query($sqv) or die('err');

	while($rwv = mysql_fetch_assoc($resv)) {
	?>
	<option value="s<?php echo $rwv['data_id'];

	?>" <?php if('s'.$rwv['data_id']==$rws['sid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

	?></option>
	<?php 
	}

	?>
	</select></td>
</tr>

<!--<tr>
	<td height="30"> Sales Rep </td>
	<td height="30"><input name="namereq" type="text" id="namereq" value="<?php echo htmlspecialchars($rws['namereq'], ENT_QUOTES) ?>" size="16"> &nbsp; Outside Sales Rep <select id="salesrep" name="salesrep" onchange="chngecomval()" >
	<option value="">Select Outside Sales Rep</option>
	<?php 
	$sqlr = "select r_name from rep_tb order by r_name";
	$rres = mysql_query($sqlr) or die('Rep query error');
	if(mysql_num_rows($rres) > 0) {
		while($rowr = mysql_fetch_assoc($rres)) {
			echo "<option value='".htmlspecialchars($rowr['r_name'], ENT_QUOTES)."' ".($rws['salesrep'] == $rowr['r_name'] ? ' SELECTED ' : '').">".$rowr['r_name']."</option>";
		}
	}
	?>
	</select> &nbsp; Commision% <input id="commision" name="commision" type="text" size="2" value="<?php echo $rws['commision'] ?>"> </td>
</tr>-->

	<tr>
		<td height="30">Ship Via</td>
		<td height="30">
		<select name="svia" id="svia">
		<option <?php if($rws['svia']=='Elecronic Data'){?> selected <?php } ?> value="Elecronic Data"> Elecronic Data</option>
		<option <?php if($rws['svia']=='Fedex'){?> selected <?php } ?> value="Fedex">Fedex</option>
		<option <?php if($rws['svia']=='Personal Delivery' || $rws['svia']==''){?> selected <?php } ?> value="Personal Delivery">Personal Delivery</option>
		<option <?php if($rws['svia']=='UPS'){?> selected <?php } ?> value="UPS"> UPS</option>		
		<option <?php if($rws['svia']=='Other'){?> selected <?php } ?> value="Other"> Other</option>		
		</select> <div style="display: inline; <?php if($rws['svia'] != 'Other') echo 'visibility: hidden'; ?>" id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50' value="<?php echo $rws['svia_oth'] ?>" ></div> </td>
	</tr>	

	<tr>
		<td height="30"> Freight Charge</td>
		<td height="30"><input name="fcharge" type="text" id="fcharge" value="<?php echo format_num($rws['fcharge']); ?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">City </td>
		<td height="30"><input name="city" type="text" id="city" value="<?php echo $rws['city'] ?>" size="30"></td>
	</tr>

<tr>
	<td height="30">State </td>
	<td height="30"><input name="state" type="text" id="state" value="<?php echo $rws['state'];?>" size="30"></td>
</tr>

<tr>
	<td height="30">Shipping Terms :</td>
	<td height="40"><label><select name="sterms" id="sterms">
		<option value="<?php  echo $rws['sterm']; ?>"><?php  echo 'Selected -->'.$rws['sterm']; ?></option>
	<option value="Prepaid">Prepaid</option>
	<option value="Collect"> Collect</option>
	<option value="Exwork"> Exwork</option>
	</select>
	</label></td>
</tr>

<tr>

  <td height="30" colspan="2"><table id="myTable" width="690" border="0">

	<tr>

	  <td width="20" height="30">Item#</td>
	<td width="80" height="30">Item</td>
	<td width="250" height="30">Description</td>
	<td width="120" height="30">QTY</td>
	<td width="80" height="30">Unit Price </td>
	<td width="80" height="30">Sub Total </td>
	</tr>
<?php
	$sqi = "select * from invoice_items_tb where pid='".$rws['invoice_id']."' order by item";

$resi = mysql_query($sqi) or die('error in data');

$tot = 0;
$i = 1;
$totalprice = 0;
$totalcomm = 0;

while($rwi = mysql_fetch_assoc($resi)) { ?>

	<tr>
	
	<td height="30"><label><input name="item_<?php echo $i ?>" type="text" id="itemname[]" size="4" value="<?php echo $rwi['item']; ?>"></label></td>
	<td height="30"><input name="part_<?php echo $i ?>" type="text" id="" size="16" value="<?php echo $rwi['part_no']; ?>"></td>
	<td height="30"><input name="desc_<?php echo $i ?>" type="text" id="desc[]" size="40" value="<?php echo $rwi['itemdesc']; ?>"></td>
	<td height="30"><input name="qty_<?php echo $i ?>" type="text" id="qty_<?php echo $i ?>" class="cprice" size="10" onblur="tot()" value="<?php echo $rwi['qty2']; ?>" /></td>
	<td height="30"><input name="uprice_<?php echo $i ?>" type="text" id="uprice_<?php echo $i ?>" size="15" class="cprice" onblur="tot()" value="<?php echo $rwi['uprice']; ?>" /></td>
	<td height="30"><input name="sub_<?php echo $i ?>" type="text" id="sub_<?php echo $i ?>" size="15" class="cprice" readonly value="<?php echo $rwi['tprice']; ?>" /></td>
	
	</tr>
<?php 
	$totalprice += str_replace(",", "", $rwi['qty2']) * str_replace(",", "", $rwi['uprice']);
	/*if($rwi['commision'] == '1' && $rws['commision'] > 0) {
		$commval = str_replace(",", "", $rwi['qty2']) * str_replace(",", "", $rwi['uprice']) * $rws['commision'];
		if($commval > 0) $totalcomm += $commval/100;
	}*/
	$i++;	
	}
	
	?>

<input type="hidden" name="row_count_row" value="<?php echo $i-1 ?>" id="row_count_row" />
<br><span id="add_row" style="padding:10px;border:1px solid;float:right;cursor:pointer;">Add Row</span><br><br>
<script>
	var rowCount=1;
	$("#add_row").click(function(){
     rowCount= $('#myTable tr').length;
    $('#myTable tr:last').after('<tr id="addr'+rowCount+'">'+
    '<td><input type="text" name="item_'+rowCount+'" id="itemname[]" size="4" /></td>'+
    '<td><input type="text" name="part_'+rowCount+'"  size="16" id="" /></td>'+
    '<td><input type="text" name="desc_'+rowCount+'"  size="40" id="desc[]" /></td>'+
    '<td><input name="qty_'+rowCount+'" type="text" id="qty_'+rowCount+'" class="cprice" size="10" onblur="tot()"></td>'+
    '<td><input name="uprice_'+rowCount+'" type="text" id="uprice_'+rowCount+'" size="15" class="cprice" onblur="tot()"/></td>'+
    '<td height="30"><input name="sub_'+rowCount+'" type="text" id="sub_'+rowCount+'" size="15" class="cprice" readonly /></td>'+
    '<!--<td class="ctr"><input name="icomm_'+rowCount+'" value="'+rowCount+'" type="checkbox" id="icomm_'+rowCount+'" class="icomm" onclick="rep_com_1(this.value)"></td>-->'+
    '</tr>');
    //alert(rowCount);
	});
	
	function tot(){
		//alert(rowCount);
		rowCount= $('#myTable tr').length-1;
		var total=0;
		var sub_tot=0;
		for(var a=1;a<=rowCount;a++){
		var qty=0;
		var up=0;
		 qty= document.getElementById("qty_"+a).value;
		 up = document.getElementById('uprice_'+a).value;
		//alert(rowCount);
		total += qty*up;
		sub_tot=qty*up;
		//alert("sub_"+a);
		document.getElementById("totalprice").innerHTML = '$'+total;
		document.getElementById("sub_"+a).value = sub_tot;
		document.getElementById("row_count_row").value = rowCount;
		//document.getElementById('totalprice').displayEl.value = qty';
		}
	}
	
</script>


  </table></td>
</tr>

<tr>
	<td height="30"><b><!--Total Commission--></b></td>
	<td height="30" style=""><span id="totalcomm"><?php //echo "$".format_num($rws['comval'], 2); ?></span><input type="hidden" id="totcomm" name="totcomm" value="><?php echo $rws['comval'] ?>"> <div style='display: inline-block; padding-right: 10px; float: right; font-weight: bold;'>&nbsp;Total Price: <span id="totalprice"><?php echo "$".format_num($totalprice, 4); ?></span></div></td>
</tr>

<!--<tr>
	 <td height="30"> Lookup ID </td>
	 <td height="30"><input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
  <!-- <input name="part_no" type="text" id="part_no" size="30"> --><!--</td>
</tr>-->
</table>

<div id="txtshow1">
<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">
<tr>
	<td height="30" width="125">Customer </td>
	<td height="30"><input name="customer" type="text" id="customer" value="<?php echo $rws['customer'] ?>" size="30"></td>
</tr>

<!--<tr>
	<td height="30">Part # </td>
	<td height="30"><input name="part_no" type="text" id="part_no"  value="<?php echo $rws['part_no'] ?>" size="30"></td>
</tr>

<tr>
	<td height="30">Rev </td>
	<td height="30"><input name="rev" type="text" id="rev"  value="<?php echo $rws['rev'];?>" size="30"></td>
</tr>-->
<!--
<?php 
$pno = $rws['part_no'];
$rev = $rws['rev'];
$cname = $rws['customer'];

$query11 = "select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";

$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$po = $row11->poid; 
$ypo = $row11->po; 
if ($po > 0) $po = $po + 9933;
else $po = '';                                                   
?>                                
-->
<tr>
  <td height="30">Our PO#</td>
  <td height="30"><input  name="oo" type="text" id="oo" value="<?php echo $rws['our_ord_num'];?>" size="30"></td>
</tr>

<tr>
  <td height="30">Customer PO#</td>
  <td height="30"><input  name="po" type="text" id="po" value="<?php echo $rws['po'] ?>" size="30"></td>
</tr>

<tr>
  <td height="30">Ordered by</td>
  <td height="30"><input name="ord_by" type="text" value="<?php echo $rws['ord_by'];?>" id="ord_by" size="30"></td>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
		    $( "#datepicker2" ).datepicker();
		    $( "#datepicker2" ).datepicker('option', 'dateFormat' , 'DD mm/dd/yy');
		  });
		  
	</script>
	
	<td height="30">Ordered On Date</td>
	<td height="30"><input name="order_on" value="<?php echo $rws['order_on'];?>" type="text" id="" size="30"></td>
</tr>

<!--<tr>
  <td height="30">Layer Count</td>
  <td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $rws['no_layer']; ?>" /></td>
</tr>-->

</table>

<table width="750" border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;" id="blkdate">
<?php
	$sqsh = "select distinct pt.date1 from packing_tb pt 
	inner join data_tb dt on pt.vid = dt.data_id where pt.part_no='$pno' and pt.rev='$rev' and dt.c_name='$cname' and pt.po='".$rws['po']."' ORDER BY pt.invoice_id";

	$ressh = mysql_query($sqsh) or die('err');	

	$date1 = $rws['date1'];

	echo '<tr><td width="125" height="30">Delivered On</td>
	<td height="30">';

	if(mysql_num_rows($ressh) > 0) {
		echo '<select name="date1">';
		$flag = 0;
		while($rwsh = mysql_fetch_assoc($ressh)) {
			echo '<option value="'.$rwsh['date1'].'" '.($date1 == $rwsh['date1'] ? ' SELECTED ' : '').'>'.$rwsh['date1'].'</option>';
			if($date1 == $rwsh['date1']) $flag = 1; 
		}
		if($flag == 0 && $date1 != '')
			echo '<option value="'.$date1.'" SELECTED >'.$date1.'</option>';

		echo '</select>';
	}
	else echo '<input name="date1" type="text" id="exampleII" value="'.$date1.'" size="30">';

	echo '</td></tr>';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script>
	
		  $(function() {
		    $( "#datepicker3" ).datepicker();
		    $( "#datepicker3" ).datepicker('option', 'dateFormat' , 'DD mm/dd/yy');
		  });
		  
		  
		  }
	</script>
	
	<td height="30">Invoice Number</td>
	<td height="30" id="nivoTest"><input name="invoice_number" required="required" onblur="FuncToExecute(this.value,'inv_id_test.php','nivoTest')" type="text" id="sub_but" size="30" value="" ></td>
	<td height="30">Date</td>
	<td height="30"><input name="invoice_date" type="text" id="" size="30" value="<?php echo $rws['invo_date'];?>" ></td>
	
</table>

</div>

<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">
<tr>
  <td height="30" width="125">Delivered to</td>
  <td height="30"><input name="delto" type="text" id="delto" value="<?php echo $rws['delto'];?>" size="30"></td>
</tr>

<!-- <tr><td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00<input name="date2" type="text" id="date2" size="30"></td></tr> -->

<tr>
  <td height="30">Sales Tax</td>
  <td height="30"><input name="stax" type="text" id="stax" value="<?php echo $rws['saletax'];?>" size="30"></td>
</tr>

<tr>
  <td height="30">Comments</td>
  <td height="30"><textarea name="comments" id="comments" cols="45"  rows="5"><?php echo $rws['comments'];?></textarea></td>
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
	$psql = "select pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid inner join data_tb dt on pt.custid = dt.data_id where dt.c_name='".$cname."' and instr(pt2.viewable, 'inv') > 0 and trim(pt2.reqs) <> ''";

	$pres = mysql_query($psql) or die('err');
	if(mysql_num_rows($pres) > 0) { 

		echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
		<div><h3>".$cname." Customer Profile</h3>";
		$i = 1;
		echo "<table border='0'>";
		while($prow = mysql_fetch_assoc($pres)) {
			echo "<tr><td align='center'>".(getSelectable('inv', $prow['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($prow['reqs'])."' ".(strstr($rws['sp_reqs'], trim($prow['reqs'])) ? " CHECKED " : "")."> " : $i.'.')."</td><td>".trim($prow['reqs'])."</td></tr>";
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
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #fee; border: 1px solid #369; position: absolute; top:-200px; left: 250px; display: none;'></div>
	</div>
	<div id='specialreq' style='color: #000; font: 11px/25px Verdana;'><?php echo ($rws['sp_reqs'] != "" ? "<strong>Special requirements:</strong> ". $rws['sp_reqs'] : ""); ?></div></td>
</tr>

<tr>
	<td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">&nbsp; <label> <input type="reset" name="button2" id="button2" value="Reset"> </label></td>
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

</form></td>
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