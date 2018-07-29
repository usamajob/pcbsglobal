<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 


if(isset($_POST['Submit'])) {

	$dweek = substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1']));
	
	if($_POST['slipid'] != '') { // Edit case
		$sqin = "update return_slip_tb set vid='".$_POST['vid']."', sid='".$_POST['sid']."', svia='".$_POST['svia']."', comments='".$_POST['commts']."', podate='".date('m/d/Y')."', part_no='".$_POST['part_no']."', rev='".$_POST['rev']."', delto='".$_POST['delto']."', date1='".$_POST['date1']."', odate='".$_POST['odate']."', dweek='".$dweek."', po='".$_POST['po']."', our_ord_num='".$_POST['oo']."', no_layer='".$_POST['lyrcnt']."', rma='".$_POST['rma']."', svia_oth='".$_POST['svia_oth']."' where slip_id='".$_POST['slipid']."'";

		$resin = mysql_query($sqin) or die('error in data');

		$cnid = $_POST['slipid'];

		$delsql = "DELETE FROM return_items_tb WHERE slipid=".$cnid;
		mysql_query($delsql);
		$delsql = "DELETE FROM maincont_returnslip WHERE slipid=".$cnid;
		mysql_query($delsql);
	}
	else {
		$sqin = "insert into return_slip_tb (rma, vid, sid, svia, comments, podate, part_no, rev, delto, date1, odate, dweek, po, our_ord_num, no_layer, svia_oth) values('".$_POST['rma']."', '".$_POST['vid']."','".$_POST['sid']."', '".$_REQUEST['svia']."', '".$_POST['commts']."','".date('m/d/Y')."', '".$_POST['part_no']."', '".$_POST['rev']."', '".$_POST['delto']."', '".$_POST['date1']."', '".$_POST['odate']."', '".$dweek."', '".$_POST['po']."', '".$_POST['oo']."', '".$_POST['lyrcnt']."', '".$_POST['svia_oth']."')";

		$resin = mysql_query($sqin) or die('error in data');

		$cnid = mysql_insert_id($conn);
	}

	for($i = 1; $i <= 6; $i++) {

		$item = $_REQUEST['item_'.$i];
		$itemdesc = $_REQUEST['desc_'.$i];
		$qty = str_replace(',', '', $_REQUEST['qty_'.$i]);
		$qtyrej = str_replace(',', '', $_REQUEST['qtyrej_'.$i]);

		if($item != "") {

			$qtyrej = number_format($qtyrej, 0, '', ',');
			$qty = number_format($qty, 0, '', ',');

			$sqs = "insert into return_items_tb (item, itemdesc, qtyrec, qtyrej, slipid) values('".$item."','".$itemdesc."','".$qty."','".$qtyrej."', '".$cnid."')";

			$ress = mysql_query($sqs) or die('errro');
		}
	}

	$sqv = "select * from vendor_maincont_tb where coustid='".$_REQUEST['vid']."'";
	$resv = mysql_query($sqv) or die('err');
	$ii = mysql_num_rows($resv);

	for($i = 1; $i <= $ii; $i++) {
		$maincont = $_REQUEST['mcont_'.$i];
		if($maincont != "") {
			$sqs = "insert into maincont_returnslip (maincontid, slipid) values('".$maincont."', '".$cnid."')";
			$ress = mysql_query($sqs) or die('errro');
		}
	}	

	header('location: manage_return_slip.php');
}

$title = "ADD RETURN SLIP FORM";
if( isset($_GET['slipid']) && $_GET['slipid'] != '') {

	$slipid = trim($_GET['slipid']);
	$sqs = "select * from return_slip_tb where slip_id = '".$slipid."'";
	$res = mysql_query($sqs) or die('error in data');

	$rowrs = mysql_fetch_assoc($res);
	$dweek22 = substr($rowrs['odate'], -10); 
	$date1 = substr($rowrs['date1'], -10);
	$title = "EDIT RETURN SLIP FORM";
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

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();

jQuery(document).ready(function(){
	$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});

	$j("#vid").change(function() {

		vid = $j(this).val();
		var xmlhttp;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("content").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "getmaincontact.php?vid="+vid, true);
		xmlhttp.send();
	});

	$j("#Submit").click(function(e) {
		$j('#form1').submit();
	});

	$j("#svia").change(function() {
		if( $j(this).val() == 'Other' ) 
			$j("#svia_oth").css('visibility', 'visible');
		else $j("#svia_oth").css('visibility', 'hidden');
	});

});

function geturl(addr) {  
	var r = $j.ajax({  
	type: 'GET',  
	url: addr,  
	async: false  
	}).responseText;  
	return r;  
}  
  
function test11() {
	qt1 = document.getElementById('part_no11').value;	$j('#txtshow1').html(geturl('getquotedata11.php?pnorev='+ qt1+'&rs=1'));  
}
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

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript">
window.addEvent('domready', function() {
var d1 = new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true <?php echo (isset($date1) ? ", 'defaultDate': '".$date1."'" : "") ?> });});

window.addEvent('domready', function() {
var d2 = new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true <?php echo (isset($dweek22) ? ", 'defaultDate': '".$dweek22."'" : "") ?> });
});
</script>

<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>

</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>

	<form id="form1" name="form1" method="post">

	<input type="hidden" name="slipid" value="<?php echo ( isset($rowrs['slip_id']) ? $rowrs['slip_id'] : '') ?>">

	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

	<tr>
		<td height="30" colspan="6"><strong><?php echo $title; ?></strong></td>	
	</tr>

	<!-- <tr>
		<td width="137" height="30">Bill to</td>
		<td width="443" height="30"><label>
		<select name="cid" id="cid">

		<?php 
		$sqv = "select * from data_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>
		<option value="<?php echo $rwv['data_id']; ?>" <?php echo ( isset($rowrs['cid']) && $rowrs['cid'] == $rwv['data_id'] ? ' SELECTED' : '') ?> ><?php echo $rwv['c_name'];
		?></option>
		<?php 
		}
		?>
		</select>
		</label>
		</td>
	</tr> -->

	<tr>
		<td height="30">Shipped to</td>
		<td height="30"><select name="sid" id="sid">
		<?php 

		$sqv = "select * from data_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>

		<option value="c<?php echo $rwv['data_id'];
		?>" <?php echo ( isset($rowrs['sid']) && $rowrs['sid'] == 'c'.$rwv['data_id'] ? ' SELECTED' : '') ?> ><?php echo $rwv['c_name'];
		?></option>

		<?php 
		}
		?>

		<option class="sred" disabled value="">--------- Shippers List ------------</option>
		<?php 
		$sqv = "select * from shipper_tb order by c_name asc";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>

		<option value="s<?php echo $rwv['data_id'];
		?>" <?php echo ( isset($rowrs['sid']) && $rowrs['sid'] == 's'.$rwv['data_id'] ? ' SELECTED' : '') ?> ><?php echo $rwv['c_name'];
		?></option>

		<?php 
		}
		?> 
		</select>
		</td>
	</tr>

	<tr>
		<td height="30">Ship Via</td>
		<td height="30">
		<select name="svia" id="svia">
		<option value="Elecronic Data" <?php echo ( isset($rowrs['svia']) && $rowrs['svia'] == 'Elecronic Data' ? ' SELECTED' : '') ?> >Elecronic Data</option>
		<option value="Fedex" <?php echo ( isset($rowrs['svia']) && $rowrs['svia'] == 'Fedex' ? ' SELECTED' : '') ?> >Fedex</option>
		<option value="Personal Delivery"  <?php echo ( isset($rowrs['svia'])  ? ($rowrs['svia'] == 'Personal Delivery' ? ' SELECTED' : '') : ' SELECTED') ?> >Personal Delivery</option>
		<option value="UPS" <?php echo ( isset($rowrs['svia']) && $rowrs['svia'] == 'UPS' ? ' SELECTED' : '') ?> >UPS</option>
		<option value="Other" <?php echo ( isset($rowrs['svia']) && $rowrs['svia'] == 'Other' ? ' SELECTED' : '') ?> >Other</option>
		</select> <div style='display: inline; visibility: hidden' id="svia_oth">Other: <input type="text" name="svia_oth" size="30" maxlength='50' value=" <?php echo ( isset($rowrs['svia_oth']) ? $rowrs['svia_oth'] : '') ?> "></div></td>
	</tr>

	
	<tr>
		<td height="30">Select Vendor</td>
		<td height="30">
		<select name="vid" id="vid" >
			<option value="">--select Vendor--</option>
			<?php 
			$sqc = "select DISTINCT data_id, c_name from vendor_tb order by c_name";
			$resc = mysql_query($sqc) or die('error in data');

			while($rwc = mysql_fetch_assoc($resc)) {
			?>
			<option value="<?php echo $rwc['data_id'] ?>" <?php echo ( isset($rowrs['vid']) && $rowrs['vid'] == $rwc['data_id'] ? ' SELECTED ' : '') ?> ><?php echo $rwc['c_name'] ?></option>
		<?php 
		}
		?>
		</select>
		</td>
	</tr>

	<tr>
		<td height="30">Vendor Main Contact </td>
		<td height="30" ><span id="content">
		<?php
		if(isset($rowrs['slip_id'])) { // Edit case
			$sqia = "SELECT distinct name, lastname, enggcont_id, maincontid
			FROM vendor_maincont_tb vmc
			left outer JOIN (select * from maincont_returnslip WHERE slipid='".$rowrs['slip_id']."') mcrs
			ON vmc.enggcont_id = mcrs.maincontid
			where coustid='".$rowrs['vid']."' ";

			$resva = mysql_query($sqia) or die('err');
			$i = 1;

			while($rwva = mysql_fetch_assoc($resva)){
			?>
				<input type="checkbox" name="mcont_<?php echo $i;?>" id="maincont[]" value="<?php echo $rwva['enggcont_id']; ?>" <?php echo (!is_null($rwva['maincontid']) ? ' CHECKED ' : '') ?> />
				<?php 
				echo $rwva['name'].' '.$rwva['lastname'].'<br>'; 
				$i++;
			}
		}
		?>
		</span></td>
	</tr>

	<tr>
		<td height="30" colspan="2">
		
		<table width="690" border="0">

		<tr>
			<td width="202" height="30">Item</td>
			<td width="225" height="30">Description</td>
			<td width="140" height="30">Qty Received</td>
			<td width="105" height="30">Qty Rejected</td>
		</tr>

		<?php
		$i = 1;
		if(isset($rowrs['slip_id'])) {
			$sqi = "select * from return_items_tb where slipid='".$rowrs['slip_id']."'";

			$resi = mysql_query($sqi) or die('error in data');

			$tot = 0;

			while($rwi = mysql_fetch_assoc($resi)) { ?>

			<tr>
				<td height="30"><label>
				<input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30" value="<?php echo $rwi['item'] ?>" >
				</label></td>
				<td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30" value="<?php echo $rwi['itemdesc'] ?>" ></td>
				<td height="30"><input name="qty_<?php echo $i;?>" type="text" id="qty[]" size="20" value="<?php echo $rwi['qtyrec'] ?>" ></td>
				<td height="30"><input name="qtyrej_<?php echo $i;?>" type="text" id="qtyrej[]" size="20" value="<?php echo $rwi['qtyrej'] ?>" ></td>
			</tr>		

			<?php 
				$i++;
			}
		}

		for(; $i <= 6; $i++) {
		?>
		<tr>
			<td height="30"><label>
			<input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30">
			</label></td>
			<td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>
			<td height="30"><input name="qty_<?php echo $i;?>" type="text" id="qty[]" size="20"></td>
			<td height="30"><input name="qtyrej_<?php echo $i;?>" type="text" id="qtyrej[]" size="20"></td>
		</tr>
		<?php 
		}
		?>

		</table>
		</td>
	</tr>

	<tr>
		<td height="30">RMA#</td>
		<td height="30"><input name="rma" type="text" id="rma" size="30" value="<?php echo (isset($rowrs['rma']) ? $rowrs['rma'] : "") ?>"></td>
	</tr>
    

	<tr>
		<td height="30"> Lookup ID </td>
		<td height="30">	  
		<input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test11();},250);" size="30" />
		</td>
	</tr>

	</table>

	<div id="txtshow1">

		<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center"> 

		<tr>
			<td height="30">Part # </td>
			<td height="30"><input name="part_no" type="text" id="part_no" size="30" value="<?php echo (isset($rowrs['part_no']) ? $rowrs['part_no'] : "") ?>"></td>
		</tr>

		<tr>
			<td height="30">Rev </td>
			<td height="30"><input name="rev" type="text" id="rev" size="30" value="<?php echo (isset($rowrs['rev']) ? $rowrs['rev'] : "") ?>"></td>
		</tr>

		<tr>
			<td height="30">Our PO#</td>
			<td height="30"><input  name="oo" type="text" id="oo" size="30" value="<?php echo (isset($rowrs['our_ord_num']) ? $rowrs['our_ord_num'] : "") ?>"></td>
		</tr>

		<tr>
			<td height="30">Ordered Date</td>
			<td height="30"><input  name="odate" id="exampleIII" type="text" size="30"></td>
		</tr>

		<tr>
			<td height="30">Layer Count</td>
			<td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo (isset($rowrs['no_layer']) ? $rowrs['no_layer'] : "") ?>" /></td>
		</tr>

		</table>

	</div>

	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

	<tr>
		<td height="30">Delivered to</td>
		<td height="30"><input name="delto" type="text" id="delto" size="30" value="<?php echo (isset($rowrs['delto']) ? $rowrs['delto'] : "") ?>"></td>
	</tr>	

	<tr>
		<td height="30">Ship Back Date</td>
		<td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>
	</tr>

	<tr>
		<td height="30">Comments</td>
		<td height="30">	  
		<label>
		<textarea name="commts" id="commts" cols="45" rows="5"> <?php echo (isset($rowrs['comments']) ? $rowrs['comments'] : "") ?></textarea>
		</label>
		</td>
	</tr>

	<tr>
		<td height="30" colspan="2">&nbsp;</td>
	</tr>

	<tr>
		<td height="30" colspan="2"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">&nbsp;     <label><input type="reset" name="button2" id="button2" value="Reset"></label> <a href="welcome.php">Go back to front page</a></td>
	</tr>

	<tr>
		<td height="30" colspan="2">&nbsp;</td>
	</tr>

	</table>

	</form>

</td>
</tr>
</table>

</body>
</html>