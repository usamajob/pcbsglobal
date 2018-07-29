<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
require('library.php');

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

function MysqlCopyRow($TableName, $IDFieldName, $IDToDuplicate) {
	if ($TableName && $IDFieldName && $IDToDuplicate > 0) {
		$sql = "SELECT * FROM $TableName WHERE $IDFieldName = $IDToDuplicate";
		$result = @mysql_query($sql);
		if ($result) {
			$sql = "INSERT INTO $TableName SET ";
			$row = mysql_fetch_array($result);
			$RowKeys = array_keys($row);
			$RowValues = array_values($row);
			for ($i = 3; $i < count($RowKeys); $i += 2) {
				if ($i != 3) { $sql .= ", "; }

				if ($RowKeys[$i] == 'iscancel')
					$sql .= $RowKeys[$i] . " = '" .'yes' . "'";
				else if ($RowKeys[$i] == 'customer')
					$sql .= $RowKeys[$i] . " = '" . $RowValues[$i].'-C' . "'";
				else if ($RowKeys[$i] == 'ccharge')
					$sql .= $RowKeys[$i] . " = '" . $_REQUEST['ccharge'] . "'";
				else
					$sql .= $RowKeys[$i] . " = '" . $RowValues[$i] . "'";
			}

			$result = @mysql_query($sql);
		}
	}
}

if(isset($_REQUEST['Submit'])) {

	$dweek = substr($_REQUEST['date1'], -10);  // abcd

	$rest = substr($_REQUEST['customer'], -2);

	if ($rest != '-C') {

		$iscancel = 'no';
		if ($_REQUEST['iscancel'] == 'yes') {

			$ProductID = $_REQUEST['id']; //The id of the product you want to copy
			MysqlCopyRow("porder_tb","poid",$ProductID);

			$cnid1 = mysql_insert_id($conn);

			for($i = 1; $i <= 6; $i++) {

				$item = $_REQUEST['item_'.$i];
				$itemdesc = addslashes($_REQUEST['desc_'.$i]);
				$dpdesc = addslashes($_REQUEST['dpdesc_'.$i]);
				$qty = $_REQUEST['qty_'.$i];
				$uprice = str_replace(",", "", $_REQUEST['uprice_'.$i]);

				if($item != "") {
					$up = number_format($uprice, 4, '.', '');
					$tprice = str_replace(",", "", $qty) * $up;

					$sqs = "insert into items_tb (item, itemdesc, qty2, uprice, tprice, pid, dpval) values ('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid1."', '".$dpdesc."')";
					$ress = mysql_query($sqs) or die('errro');
				}
			}
		}
	}
	else {
		for($i = 1; $i <= 6; $i++) {

			$item = $_REQUEST['item_'.$i];
			$itemdesc = addslashes($_REQUEST['desc_'.$i]);
			$dpdesc = addslashes($_REQUEST['dpdesc_'.$i]);
			$qty = $_REQUEST['qty_'.$i];
			$uprice = str_replace(",", "", $_REQUEST['uprice_'.$i]);

			if($item != "") {
				$up = number_format($uprice, 4, '.', '');
				$tprice = str_replace(",", "", $qty) * $up;

				$sqs = "insert into items_tb (item, itemdesc, qty2, uprice, tprice, pid, dpval) values ('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid."', '".$dpdesc."')";
				$ress = mysql_query($sqs) or die('errro');
			}
		}
		$iscancel = 'yes';
	}

	if($_POST['pstatus'] == 'hide') $status = $_POST['pstatus'];
	else $status = 'show';

	if($_POST['ocancel'] == '1') {
		$ostatus = $_POST['ocancel'];
		$redirect = 'cancelled_purchase.php';
	}
	else { $ostatus = '0';	$redirect = 'manage_purchase.php'; }

	$sqin = "update porder_tb set vid='".$_REQUEST['vid']."', sid='".$_REQUEST['sid']."', namereq='".escpe($_REQUEST['namereq'])."', namereq1='".$_REQUEST['namereq1']."', svia='".$_REQUEST['svia']."', city='".$_REQUEST['city']."', state='".$_REQUEST['state']."', sterms='".escpe($_REQUEST['sterms'])."', rohs='".$_REQUEST['rohs']."', comments='".escpe($_REQUEST['comments'])."', customer='".escpe($_REQUEST['customer'])."', part_no='".$_REQUEST['part_no']."', rev='".$_REQUEST['rev']."', date1='".$_REQUEST['date1']."', date2='".$_REQUEST['date2']."', dweek='".$dweek."', po='".$_REQUEST['po']."', no_layer='".$_REQUEST['lyrcnt']."' , ordon='".$_REQUEST['ordon']."', iscancel='".$iscancel."', ccharge='".$_REQUEST['ccharge']."', sp_reqs='".escpe(trim($_REQUEST['specialreqval']))."',
	svia_oth='".$_POST['svia_oth']."',
	status = '".$status."', whyhide = '".escpe($_POST['whyhide'])."',
	cancel = '".$ostatus."', canceldate = '".$_POST['canceldate']."', whycancel = '".escpe($_POST['whycancel'])."' where poid='".$_REQUEST['id']."'";

	/* $sqin = "insert into invoice_tb(vid,sid,namereq,svia,fcharge,city,state,sterm,comments,podate,customer,date1,dweek,po,our_ord_num,saletax) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['svia']."','".$_REQUEST['fcharge']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['comments']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['date1']."','".$_REQUEST['dweek']."','".$_REQUEST['po']."','".$_REQUEST['oo']."','".$_REQUEST['stax']."')"; */

	$cnid = $_REQUEST['inid'];
	$resin = mysql_query($sqin) or die('error in data');

	if ($_REQUEST['iscancel'] == 'no') {

		$sqin11 = "DELETE FROM items_tb WHERE pid=".$cnid;
		mysql_query($sqin11);

		for($i = 6; $i >= 1; $i--) {
			$item = $_REQUEST['item_'.$i];
			$itemdesc = addslashes($_REQUEST['desc_'.$i]);
			$dpdesc = addslashes($_REQUEST['dpdesc_'.$i]);
			$qty = $_REQUEST['qty_'.$i];
			$uprice = str_replace(",", "", $_REQUEST['uprice_'.$i]);

			if($item != "") {
				$up = number_format($uprice, 4, '.', '');
				$tprice = str_replace(",", "", $qty) * $up;

				$sqs = "insert into items_tb (item, itemdesc, qty2, uprice, tprice, pid, dpval) values('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid."', '".$dpdesc."')";

				$ress = mysql_query($sqs) or die('errro');
			}
		}
	}
	else if (($rest == '-C') && (($_REQUEST['iscancel'] == 'yes'))) {

		$sqin11 = "DELETE FROM items_tb WHERE pid=".$cnid;
		mysql_query($sqin11);

		for($i = 1; $i <= 6; $i++) {
			$item = $_REQUEST['item_'.$i];

			$itemdesc = addslashes($_REQUEST['desc_'.$i]);
			$dpdesc = addslashes($_REQUEST['dpdesc_'.$i]);
			$qty = $_REQUEST['qty_'.$i];
			$uprice = str_replace(",", "", $_REQUEST['uprice_'.$i]);

			if($item != "") {
				$up = number_format($uprice, 4, '.', '');
				$tprice = str_replace(",", "", $qty) * $up;

				$sqs = "insert into items_tb(item, itemdesc, qty2, uprice, tprice, pid, dpval) values('".$item."', '".$itemdesc."', '".$qty."', '".$uprice."', '".$tprice."', '".$cnid."', '".$dpdesc."')";

				$ress = mysql_query($sqs) or die('errro');
			}
		}
	}
	header('location: '.$redirect);
}

$sqs = "select * from porder_tb where poid ='".$_REQUEST['id']."'";
$res = mysql_query($sqs) or die('error in data');
$rws = mysql_fetch_assoc($res);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Purchase</title>
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

$j("#pstatus").click(function() {
	if( $j(this).attr('checked')  )
		$j("#whyhide").css('visibility', 'visible');
	else $j("#whyhide").css('visibility', 'hidden');
});

$j("#ocancel").click(function() {
	if( $j(this).attr('checked')  ) {
		$j("#whycancel").css('visibility', 'visible');
		$j("#canceldate").css('visibility', 'visible');
	}
	else { $j("#whycancel").css('visibility', 'hidden');
		$j("#canceldate").css('visibility', 'hidden');
	}
});


$j("#Submit").click(function() {

	var offset = $j(this).offset();

	if( $j.trim($j('#sid').val()) == "") {
		alert('Please select Shipper');
	}
	else {
	if( $j.trim($j('#part_no').val()) != "") {
		var response = geturl("getalerts.php?customer="+$j.trim($j('#customer').val())+"&pno=" + $j.trim($j('#part_no').val()) + "&rev=" + $j.trim($j('#rev').val()) + "&prevcust=" + $j.trim($j('#prevcust').val()) + "&prevpno=" + $j.trim($j('#prevpno').val()) + "&prevrev=" + $j.trim($j('#prevrev').val())  + "&ftype=po&mode=edit");

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
				//$j('#stockdiv').hide();
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

	/*if( $j.trim($j('#customer').val()) != "") {
		var response = geturl("getalerts.php?custname=" + $j.trim($j('#customer').val()) + "&ftype=purchase");
		if(response != 'norecords') {
			$j('#alertDiv2').html(response);
			$j('#alertDiv2').show();
			if(flag3 <= 1) flag3 = flag3 + 1;
		}
	}*/

	if(flag1 == 1) { // Customer profile popup
		$j('#reqDiv').css({top: (offset.top-150)+'px'}).show();
		if(flag3 <= 3) flag3 = flag3 + 1;

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

<script type="text/javascript">
function geturl(addr) {
	var r = $j.ajax({  	type: 'GET',  	url: addr,
	async: false  	}).responseText;
	return r;
}

function test() {
	qty1 = document.getElementById('part_no11').value;
	$j('#txtshow1').html(geturl('getquotedata22.php?pnorev='+qty1));
	var showlink = geturl('getquotedata22.php?pnorev='+qty1+'&flag=1&ftype=po');
	if(showlink != "") {
		$j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html("");
		flag1 = 0;	}
}

</script>

<?php
$dweek22 = substr($rws['ordon'], -10);
$candate = ( strlen($rws['canceldate']) > 5 ? $rws['canceldate'] : date('m-d-Y') );

?>

<script type="text/javascript">

window.addEvent('domready', function() {

	new CalendarEightysix('canceldate', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%m-%d-%Y', 'draggable': true , });

	new CalendarEightysix('exampleII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true, });

	new CalendarEightysix('exampleIII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true, 'defaultDate': '<?php echo $dweek22;  ?>', });
});
</script>

<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple",
		forced_root_block : false
	});

	function cleartable () {
	//alert('asdf');

document.getElementsByName('item_1').item(0).value='';
document.getElementsByName('item_2').item(0).value='';
document.getElementsByName('item_3').item(0).value='';
document.getElementsByName('item_4').item(0).value='';
document.getElementsByName('item_5').item(0).value='';
document.getElementsByName('item_6').item(0).value='';

document.getElementsByName('desc_1').item(0).value='';
document.getElementsByName('desc_2').item(0).value='';
document.getElementsByName('desc_3').item(0).value='';
document.getElementsByName('desc_4').item(0).value='';
document.getElementsByName('desc_5').item(0).value='';
document.getElementsByName('desc_6').item(0).value='';

document.getElementsByName('qty_1').item(0).value='';
document.getElementsByName('qty_2').item(0).value='';
document.getElementsByName('qty_3').item(0).value='';
document.getElementsByName('qty_4').item(0).value='';
document.getElementsByName('qty_5').item(0).value='';
document.getElementsByName('qty_6').item(0).value='';

document.getElementsByName('uprice_1').item(0).value='';
document.getElementsByName('uprice_2').item(0).value='';
document.getElementsByName('uprice_3').item(0).value='';
document.getElementsByName('uprice_4').item(0).value='';
document.getElementsByName('uprice_5').item(0).value='';
document.getElementsByName('uprice_6').item(0).value='';

document.getElementById('totalprice').innerHTML = '$0.00';

}
</script>
</head><body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr>

	<td align="center" id="container">
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

	<tr>
		<td id="mainpage" style="width: 750px;">
		<div>
		<table cellpadding="5" cellspacing="1" width="100%">
		<tbody>

		<tr>
			<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php"><br />
			<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

			<td style="line-height: 16px;">
			<form id='form1' name="form1" method="post" action="">
			<input name="inid" id="inid" type="hidden" value="<?php echo $rws['poid'];?>" >
			<input type="hidden" name="specialreqval" id="specialreqval" value="<?php echo $rws['sp_reqs'] ?>">
			<p>&nbsp;</p>

			<table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

			<tr>
				<td height="30" colspan="2"><strong>EDIT PURCHASE ORDER FORM</strong> <input type="checkbox" id="pstatus" name="pstatus" value='hide' <?php echo ($rws['status'] == 'hide' ? ' CHECKED' : '') ?>> Hide <div style="display: inline; <?php if($rws['status'] != 'hide') echo 'visibility: hidden'; ?>" id="whyhide">Reason: <input type="text" name="whyhide" size="50" maxlength='255' value="<?php echo $rws['whyhide'] ?>" ></div></td>
			</tr>

			<tr>
				<td height="30" colspan="2"><input type="checkbox" id="ocancel" name="ocancel" value='1' <?php echo ($rws['cancel'] == '1' ? ' CHECKED' : '') ?> > <strong>Cancel Order</strong> &nbsp;&nbsp;<div style="display: inline; <?php if( $rws['cancel'] != '1') echo 'visibility: hidden'; ?>" id="whycancel"> Reason: <input type="text" name="whycancel" size="30" maxlength='255' value="<?php echo $rws['whycancel'] ?>" > &nbsp;&nbsp;Date: <input name="canceldate" type="text" id="canceldate" size="25" value='<?php echo $candate ?>' ></div></td>
			</tr>

			<tr>
				<td width="137" height="30"><strong>Cancellation to Supplier</strong></td>
				<td width="443" height="30"> <input onSelect="cleartable();" onChange="cleartable();" <?php if($rws['iscancel'] == 'yes'){ ?> checked <?php } ?> type="radio" name="iscancel" id="radio12" value="yes"> Yes <input type="radio" <?php if($rws['iscancel']=='no'){?> checked <?php } ?> name="iscancel" id="radio122" value="no"> No</td>
			</tr>

			<tr>
				<td width="137" height="30">Select Vendor</td>
				<td width="443" height="30">
				<select name="vid" id="vid">
				<?php
				$sqv = "select * from vendor_tb order by c_name";
				$resv = mysql_query($sqv) or die('err');

				while($rwv = mysql_fetch_assoc($resv)) { ?>
				<option value="<?php echo $rwv['data_id']; ?>" <?php if($rwv['data_id'] == $rws['vid']){ ?> selected <?php } ?> ><?php echo $rwv['c_name'];

				?></option>
				<?php
				}
				?>
				</select></td>
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
					<option value="c<?php echo $rwv['data_id'];
					?>" <?php if('c'.$rwv['data_id'] == $rws['sid']) { ?> selected <?php } ?>><?php echo $rwv['c_name']; ?></option>
				<?php
				}
				?>

				<option class="sred" disabled value=""> ------- Shippers List -------- </option>
				<?php
				$sqv = "select * from shipper_tb order by c_name";
				$resv = mysql_query($sqv) or die('err');

				while($rwv = mysql_fetch_assoc($resv)) {
				?>
					<option value="<?php echo $rwv['data_id'];	?>" <?php if($rwv['data_id'] == $rws['sid']){ ?> selected <?php } ?>><?php echo $rwv['c_name']; ?></option>
				<?php
				}
				?>

				</select></td>
			</tr>

			<tr>

				<td height="30"> Name of Requisitioner  </td>
				<td height="30"><input name="namereq" type="text" id="namereq" value="<?php echo $rws['namereq'];?>" size="30"></td>
			</tr>

			<tr>
				<td height="30">Ship Via</td>
				<td height="30"><select name="svia" id="svia">

				<option <?php if($rws['svia']=='Fedex'){?> selected <?php } ?> value="Fedex">Fedex</option>

				<option <?php if($rws['svia']=='UPS'){?> selected <?php } ?> value="UPS"> UPS</option>

				<option <?php if($rws['svia']=='Personal Delivery'){?> selected <?php } ?> value="Personal Delivery"> Personal Delivery</option>

				<option <?php if($rws['svia']=='Elecronic Data'){?> selected <?php } ?> value="Elecronic Data"> Elecronic Data</option>

				<option <?php if($rws['svia']=='Other'){?> selected <?php } ?> value="Other"> Other</option>

				</select> <div style="display: inline; <?php if($rws['svia'] != 'Other') echo 'visibility: hidden'; ?>" id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50' value="<?php echo $rws['svia_oth'] ?>" ></div>
				</td>
			</tr>

			<tr>
				<td height="30">City </td>
				<td height="30"><input name="city" type="text" id="city" value="<?php echo $rws['city'];?>" size="30"></td>
			</tr>

			<tr>
				<td height="30">State </td>
				<td height="30"><input name="state" type="text" id="state" value="<?php echo $rws['state'];?>" size="30"></td>
			</tr>

			<tr>
				<td height="30">Shipping Terms :</td>
				<td height="30"><label>
				<select name="sterms" id="sterms">

				<option value="Prepaid">Prepaid</option>
				<option value="Collect"> Collect</option>
				</select>
				</label></td>
			</tr>

			<tr>
				<td colspan="2">
				<table width="100%" border="0">
				<tr>
					<td height="30">Item</td>
					<td height="30">Description</td>
					<td height="30">QTY</td>
					<td height="30">Unit Price </td>
				</tr>
		<?php
		$sqi = "select * from items_tb where pid='".$rws['poid']."' order by item";

		$resi = mysql_query($sqi) or die('error in data');

		$tot = 0;
		$i = 1;
		$totalprice = 0;

		while($rwi = mysql_fetch_assoc($resi)) { ?>

		<tr>
			<td valign='top' height="30"><label><input name="item_<?php echo $i;?>" type="text" value="<?php echo $rwi['item']; ?>"  id="<?php echo $rwi['item']; ?>" size="3"></label></td>

			<td valign='top'><select id="dpdesc_<?php echo $i; ?>" name="dpdesc_<?php echo $i; ?>" class="descdp">
			<?php
				echo "<option value=''>Select</option>";
				foreach($item_desc as $ki => $vi)
				echo "<option value='".$ki."'".($rwi['dpval'] == $ki ? ' SELECTED ' : '').">".$vi."</option>"; ?>
			</select><input name="desc_<?php echo $i; ?>" value="<?php echo $rwi['itemdesc']; ?>" type="text" id="desc_<?php echo $i; ?>" size="30" style="visibility: <?php echo ($rwi['dpval'] == 'oth' ? 'visible' : 'hidden') ?>; margin: 0 0 0 5px" ></td>

			<td valign='top' height="30"><input name="qty_<?php echo $i; ?>" value="<?php echo $rwi['qty2']; ?>" type="text" id="qty_<?php echo $i; ?>" size="5" class="cprice" ></td>

			<td valign='top' height="30"><input name="uprice_<?php echo $i; ?>" value="<?php echo format_num($rwi['uprice']); ?>" type="text" id="uprice_<?php echo $i; ?>" size="10" class="cprice" ></td>
		</tr>

		<?php
			$totalprice += str_replace(',', '', $rwi['qty2']) * (str_replace(',', '', $rwi['uprice']));
			$i++;
		}
		?>

		<?php
		for(; $i <= 6; $i++) {
		?>

		<tr>
			<td height="30" valign='top'><label><input name="item_<?php echo $i; ?>" type="text" id="item_<?php echo $i; ?>" size="3"></label></td>

			<td height="30" valign='top'><select id="dpdesc_<?php echo $i; ?>" name="dpdesc_<?php echo $i; ?>" class="descdp">
			<?php echo "<option value=''>Select</option>";
				foreach($item_desc as $ki => $vi)
				echo "<option value='".$ki."'>".$vi."</option>"; ?>
			</select><input name="desc_<?php echo $i; ?>" type="text" id="desc_<?php echo $i; ?>" size="30" style="visibility: hidden; margin: 0 0 0 5px"></td>

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
		<td height="30" id="totalprice" style="padding-right: 10px; text-align: right; font-weight: bold;"><?php echo "$".format_num($totalprice, 4); ?></td>
	</tr>

	<tr>
		<td height="30"> Lookup ID </td>
		<td height="30">
		<input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
		<!-- <input name="part_no" type="text" id="part_no" size="30"> --></td>
	</tr>
	</table>
	<input type="hidden" name="prevpno" id="prevpno" value="<?php echo $rws['part_no'] ?>">
	<input type="hidden" name="prevrev" id="prevrev" value="<?php echo $rws['rev'] ?>">
	<input type='hidden' name='prevcust' id='prevcust' value="<?php echo $rws['customer']; ?>">

	<div id="txtshow1">
	<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

	<tr>
		<td height="30">Part # </td>
		<td height="30"><input name="part_no" type="text" id="part_no"  value="<?php echo $rws['part_no']; ?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">Customer </td>
		<td height="30"><input name="customer" type="text" id="customer" value="<?php echo $rws['customer']; ?>" size="30">
		</td>
	</tr>

	<tr>
		<td height="30">Rev </td>
		<td height="30"><input name="rev" type="text" id="rev"  value="<?php echo $rws['rev']; ?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">Customer PO#</td>
		<td height="30"><input name="po" type="text" id="po" value="<?php echo $rws['po'];?>" size="30"></td>
	</tr>

	<tr>
		<td height="30">Layer Count</td>

		<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $rws['no_layer']; ?>" /></td>
	</tr>

	<tr>
		<td height="30"> Name of Requestor  </td>
		<td height="30"><input name="namereq1" type="text" id="namereq1" value="<?php echo $rws['namereq1'];?>" size="30"></td>
	</tr>

	</table>
	</div>

	<table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
	<!-- <tr>
	<td height="30">Date of week</td>
	<td height="30"><input name="dweek" type="text" id="dweek" value="<?php // echo $rws['dweek'];?>" size="30"></td>
	</tr> -->
	<tr>
		<td height="30">Ordered On</td>
		<td height="30"><input name="ordon" type="text" id="exampleIII" size="30"></td>
	</tr>

	<tr>
		<td height="30"> Required Dock Date</td>
		<td height="30"><input  name="date1" type="text" value="<?php echo $rws['date1'];?>" id="exampleII"  size="30"></td>
	</tr>

	<tr>
		<td height="30">ROHS Cerificate Required</td>
		<td height="30">
		<input type="radio" name="rohs" id="radio" <?php  if ($rws['rohs']=='yes') echo 'checked';?>  value="yes"> Yes

		<input type="radio" name="rohs" id="radio2" <?php  if ($rws['rohs']=='no') echo 'checked';?> value="no"> No</td>
	</tr>
	<!--<tr>

	<td height="30">Cancellation charge</td>

	<td height="30">

	<input type="radio" name="cancharge" id="radio12" <?php //  if ($rws['cancharge']=='yes') echo 'checked';?>  value="yes">

	Yes

	<input type="radio" name="cancharge" id="radio122" <?php //  if ($rws['cancharge']=='no') echo 'checked';?> value="no">

	No</td>

	</tr>-->

	<!-- <tr>

	<td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00

	<input name="date2" type="text" id="date2" size="30"></td>

	</tr>-->

	<tr>
		<td height="30">Comments</td>
		<td height="30"><label>
		<textarea name="comments" id="comments" cols="45" rows="5"><?php echo $rws['comments'];?></textarea>
		</label></td>
	</tr>

	<!--<tr>

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

	<div id="stockdiv" style='z-index: 110;   border: 1px solid #369; position: absolute; top: 850px; left: 650px; display: none;'  onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

	<div id="stockdivComment" style='z-index: 110; min-width:300px;  border: 1px solid #369; position: absolute; top: 850px; left: 900px; display: none;'  onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

	<!-- Requirements Popup -->
	<?php
		echo "<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:1250px; left: 250px; display: none; '  onmousedown='mydragg.startMoving(this,\"container\",event);' onmouseup='mydragg.stopMoving(\"container\");'>";

		$cname = $rws['customer'];
		$psql = "select pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid inner join data_tb dt on pt.custid = dt.data_id where dt.c_name='".$cname."' and instr(pt2.viewable, 'po') > 0 and trim(pt2.reqs) <> ''";

		$pres = mysql_query($psql) or die('err');
		if(mysql_num_rows($pres) > 0) {

			echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
			<div><h3>".$cname." Customer Profile</h3>";

			$i = 1;
			echo "<table border='0'>";
			while($prow = mysql_fetch_assoc($pres)) {
				echo "<tr><td align='center'>".(getSelectable('po', $prow['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($prow['reqs'])."' ".(strstr($rws['sp_reqs'], trim($prow['reqs'])) ? " CHECKED " : "")."> " : $i.'.')."</td><td>".trim($prow['reqs'])."</td></tr>";
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
	<div id='alertDiv2' style='z-index: 100; padding: 10px; background: #efe; border: 1px solid #369; position: absolute; top:1250px; left: 200px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #c1fff8; border: 1px solid #369; position: absolute; top:1000px; left: 330px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

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
