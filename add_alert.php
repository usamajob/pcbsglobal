<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

// Form submission
if($_POST['Submit'] == '1') {

// echo "<pre>";	print_r($_POST);//exit;
	if($_POST['prevaid'] != "") {
		$prevtemp = explode('|', $_POST['prevaid']);

		$sql = "delete from alerts_tb where concat(trim(customer),'|',trim(part_no),'|',trim(rev)) = '".$_POST['prevaid']."'";
		mysql_query($sql);
	}
			
	if($_POST['pno'] != "") {			
		
		foreach($_POST as $k => $v) {
			if(strstr($k, 'alert') && trim($v) != "") {
				$i = substr($k, 5);
				$vformval = "";
				if(count($_POST['vforms'.$i]) > 0) {
					foreach($_POST['vforms'.$i] as $k1 => $v1) 
						$vformval .= $v1.'|';
				}

				if($vformval != "") 
					$vformval = substr($vformval, 0, -1);

				if($_POST['newpno'] == 'yes') $vformval = 'quo';		

				$sqls = "insert into alerts_tb (customer, part_no, rev, alert, viewable) values ('".$_POST['txtcust']."', '".$_POST['pno']."', '".$_POST['rev']."', '".trim(escpe($v))."', '".$vformval."')";	
				//echo "<br>".$sqls;
				mysql_query($sqls) or die(mysql_error());
			}
		}
	}
	header('location: manage_alert.php');
	exit;
}

$counter = 2;
$reqhtml = "<div id='TextBoxDiv1'><table><tr><td vertical-align='top'>
<label>Alert #1 : </label><input type='text' name='alert1' id='alert1' maxlength='250' size='50'></td><td><select multiple size='6' name='vforms1[]'><option value='quo'>Quote</option> <option value='po'>Purchase</option> <option value='con'>Confirmation</option> <option value='pac'>Packing</option> <option value='inv'>Invoices</option> <option value='cre'>Credit</option> </select></td></tr></table></div>";

require('library.php');

//Alert Edit Case
$aid = isset($_REQUEST['aid']) ? trim($_REQUEST['aid']) : "";
$title = ($aid != "" ? "Alert# ".str_replace('|', ' ', $aid) : "Add Alert");
if($aid != "") {
	$counter = 1;
	$sqlp = "select * from alerts_tb where concat(trim(customer),'|',trim(part_no),'|',trim(rev)) = '".$aid."' and atype='p' order by id";
	$resp = mysql_query($sqlp);
	$orClause = "";
	if($resp) { 
		$reqhtml = "";
		while($rowp = mysql_fetch_assoc($resp)) {
			$orClause = " concat(trim(customer),'|',trim(part_no),'|',trim(rev)) = '".$aid."' ";
			$reqhtml .= "<div id='TextBoxDiv".$counter."'>
			<table><tr><td vertical-align='top'>
			<label>Alert. #$counter : </label> <input type='text' name='alert".$counter."' id='alert".$counter."' maxlength='250' value='".htmlentities(trim($rowp['alert']),ENT_QUOTES)."' size='50' ></td>			
			<td>
				<select size='6' multiple name='vforms".$counter."[]'><option value='quo'".(strstr($rowp['viewable'], 'quo') ? ' SELECTED ':'').">Quote</option> <option value='po'".(strstr($rowp['viewable'], 'po') ? ' SELECTED ':'').">Purchase</option> <option value='con'".(strstr($rowp['viewable'], 'con') ? ' SELECTED ':'').">Confirmation</option> <option value='pac'".(strstr($rowp['viewable'], 'pac') ? ' SELECTED ':'').">Packing</option> <option value='inv'".(strstr($rowp['viewable'], 'inv') ? ' SELECTED ':'').">Invoices</option> <option value='cre'".(strstr($rowp['viewable'], 'cre') ? ' SELECTED ':'').">Credit</option> </select></td>
			</tr></table>
			</div>
			";
			$counter++;
		}
	}
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
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 

var $j = jQuery.noConflict();

jQuery(document).ready(function() {
	$j('#aid').change(function() {
		var aid = $j('#aid').val();
		if(aid != "") {
			var pno = aid.split('|');
			$j("#txtcust option[value='" + $j.trim(pno[0]) + "']").attr("selected", true);
			$j('#pno').val(pno[1]);
			$j('#rev').val(pno[2]);
		}
	});

	$j("select option").livequery('mousedown', function (e) {
		this.selected = !this.selected;
		e.preventDefault();
	});
 
	var counter = "<?php echo $counter ?>";
	$j("#addAlert").click(function () {

	if(counter > 20) {
		alert("Only 20 alerts are allowed.");
		return false;
	}   

	var newTextBoxDiv = $j(document.createElement('div'))
	.attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.html('<table><tr><td vertical-align="top"><label>Alert. #'+ counter + ' : </label>' + '<input type="text" name="alert' + counter + '" id="alert' + counter + '" value=""  size="50"></td><td><select size="6" multiple name="vforms' + counter + '[]"><option value="quo">Quote</option> <option value="po">Purchase</option> <option value="con">Confirmation</option> <option value="pac">Packing</option> <option value="inv">Invoices</option> <option value="cre">Credit</option> </select></td></tr></table>');

	newTextBoxDiv.appendTo("#TextBoxesGroup"); 

	counter++;
	});

	$j("#remReq").click(function () {
		if(counter == 1){
			alert("No more alerts to remove");
			return false;
		}   
		counter--;
		$j("#TextBoxDiv" + counter).remove();
	});

	$j("#Submit").click(function(e) {
		var cust = $j.trim($j('#txtcust').val());
		var pno = $j.trim($j('#pno').val());
		var rev = $j.trim($j('#rev').val());
		if(pno == "") {
			alert("Enter Part number.");
		}

		$j.get("getalertpno.php", {cust: cust, pno: pno, rev: rev}, function(txt) {
			if(txt == 'norecords') {
				alert('Alerts With New Part Numbers Can Only be Added to Quote Form.');
				$j('#newpno').val('yes');				
			}
			else $j('#newpno').val('no');	
			
			$j('#form1').submit();
		}); 
	});
});

//-->
</script>
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#reqblk { padding: 5px; }
	.cf { content: ""; display: table; }
	.tc { display: table-cell; vertical-align: top; }
	input { margin: 2px;  }
</style>
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

<form id="form1" method="POST" action="add_alert.php" >
<input type="hidden" name="prevaid" value="<?php echo $aid; ?>">
<input type="hidden" name="newpno" id="newpno" value="no">
 
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30" width='130'><strong>Select Part No./Rev</strong></td>
	<td valign="top"><select name="aid" id="aid">
	<option value="">Select</option>
	<?php 
	$sqv = "select distinct cust_name, part_no, rev from order_tb where part_no <> '' order by trim(cust_name), trim(part_no), trim(rev)";
	$resc = mysql_query($sqv) or die(mysql_error());

	$tempaid = explode('|', $aid);

	while($rwc = mysql_fetch_assoc($resc)) {
	?>
	<option value="<?php echo $rwc['cust_name'].'|'.trim($rwc['part_no'].'|'.$rwc['rev']); ?>" <?php echo ($aid == $rwc['cust_name'].'|'.$rwc['part_no'].'|'.$rwc['rev'] ? "SELECTED" : ""); ?> ><?php echo $rwc['cust_name'].'_'.$rwc['part_no'].($rwc['rev'] != '' ? '_'.$rwc['rev'] : ''); ?></option>
	<?php
	}
	?>
	</select>  

	</td>
</tr>

<tr>
	<td height="30"><b>Customer</b></td>
	<td valign="top"><select name="txtcust" id="txtcust">
	<?php 
	$sqv = "select * from data_tb ORDER BY c_name";
	$resv = mysql_query($sqv) or die('err');
	while($rwv = mysql_fetch_assoc($resv)) {
	?>
	<option value='<?php echo trim($rwv['c_name']); ?>' <?php echo ($tempaid[0] == trim($rwv['c_name']) ? 'SELECTED' : '') ?> ><?php echo $rwv['c_name']; ?></option>
	<?php 
	}
	?>
	</select>
	</td>
</tr>
<tr>
	<td height="30"><b>Part no.</b></td>
	<td valign="top"><input type="text" name="pno" size="50" id="pno" value="<?php echo $tempaid[1] ?>">
	<b>Rev.</b> <input type="text" name="rev" id="rev" size="5" value="<?php echo $tempaid[2] ?>">

	<div style='float:right'><input type='button' value='Add Alert' id='addAlert'></div>
	</td>
</tr>

<tr id='reqblk'>
	<td height="30"><strong>Alerts</strong></td>
	<td>
	<div id='TextBoxesGroup'>
		<?php echo $reqhtml; ?>
	</div>
	</td>
</tr>

<tr>
	<td height="30" colspan='2'><input type="hidden" name="Submit" value="1"><input type="button" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset">&nbsp;&nbsp;<a href="manage_alert.php">Go back to Manage Alerts</a></td>
</tr>

</table>

</form>


</td>
</tr>
</table>

</body>
</html>