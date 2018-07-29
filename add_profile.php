<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

// Form submission
if(isset($_POST['Submit'])) {
	//echo "<pre>";	print_r($_POST);exit;

	if($_POST['cid'] != "") {
		if($_POST['profid'] != "") {		
			$sqls = "update profile_tb set custid='".$_POST['cid']."' where profid='".$_POST['profid']."'";
			mysql_query($sqls);
			$sqls = "delete from profile_tb2 where profid='".$_POST['profid']."'";
			mysql_query($sqls);
			$insprofid = $_POST['profid'];		
		} else {
			$sqls = "insert into profile_tb (custid) values ('".$_POST['cid']."')";
			mysql_query($sqls);
			$insprofid = mysql_insert_id();
		}

		foreach($_POST as $k => $v) {
			if(strstr($k, 'req') && trim($v) != "") {
				$i = substr($k, 3);
				$vformval = "";
				if(count($_POST['vforms'.$i]) > 0) {
					foreach($_POST['vforms'.$i] as $k1 => $v1) {
						$vformval .= $v1.(isset($_POST[$v1.'chk'.$i]) && $_POST[$v1.'chk'.$i] == 1 ? '1':'0').'|';
					}
				}
				if($vformval != "") 
					$vformval = substr($vformval, 0, -1);

				$sqls = "insert into profile_tb2 (profid, reqs, viewable) values ('".$insprofid."', '".trim(escpe($v))."', '".$vformval."')";	
				//echo "<br>".$sqls;
				mysql_query($sqls);
			}
		}
	}
	header('location: manage_profile.php');
}

$counter = 2;
$reqhtml = "<div id='TextBoxDiv1'><table><tr><td vertical-align='top'>
<label>Req. #1 : </label><input type='text' name='req1' id='req1' maxlength='100' size='50'></td><td><input type='checkbox' name='quochk1' id='quochk1' value='1'><br><input type='checkbox' name='pochk1' id='pochk1' value='1'><br><input type='checkbox' name='conchk1' id='conchk1' value='1'><br><input type='checkbox' name='pacchk1' id='pacchk1' value='1'><br><input type='checkbox' name='invchk1' id='invchk1' value='1'><br><input type='checkbox' name='crechk1' id='crechk1' value='1'></td><td><select multiple size='6' name='vforms1[]' id='vforms1'><option value='quo'>Quote</option> <option value='po'>Purchase</option> <option value='con'>Confirmation</option> <option value='pac' selected>Packing</option> <option value='inv'>Invoices</option> <option value='cre'>Credit</option> </select></td></tr></table></div>";

require('library.php');

//Profile Edit Case
$profid = isset($_REQUEST['profid']) ? trim($_REQUEST['profid']) : "";
$title = ($profid != "" ? "Profile #".$profid : "Add Profile");
if($profid != "") {
	$counter = 1;
	$sqlp = "select pt.custid, pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid where pt.profid='".$profid."' order by id";
	$resp = mysql_query($sqlp);
	$orClause = "";
	if($resp) { 
		$reqhtml = "";
		while($rowp = mysql_fetch_assoc($resp)) {
			$cid = $rowp['custid'];
			$orClause = " or pt.custid = '".$cid."'";
			$reqhtml .= "<div id='TextBoxDiv".$counter."'>
			<table><tr><td vertical-align='top'>
			<label>Req. #$counter : </label> <input type='text' name='req".$counter."' id='req".$counter."' maxlength='100' value='".trim(htmlspecialchars($rowp['reqs'], ENT_QUOTES))."' size='50' ></td>
			<td>
				<input type='checkbox' name='quochk".$counter."' id='quochk".$counter."' value='1' ".(getSelectable('quo', $rowp['viewable']) == 1 ? ' CHECKED ':'')."><br>
				<input type='checkbox' name='pochk".$counter."' id='pochk".$counter."' value='1' ".(getSelectable('po', $rowp['viewable']) == 1 ? ' CHECKED ':'')."><br>
				<input type='checkbox' name='conchk".$counter."' id='conchk".$counter."' value='1' ".(getSelectable('con', $rowp['viewable']) == 1 ? ' CHECKED ':'')."><br>
				<input type='checkbox' name='pacchk".$counter."' id='pacchk".$counter."' value='1' ".(getSelectable('pac', $rowp['viewable']) == 1 ? ' CHECKED ':'')."><br>
				<input type='checkbox' name='invchk".$counter."' id='invchk".$counter."' value='1' ".(getSelectable('inv', $rowp['viewable']) == 1 ? ' CHECKED ':'')."><br>
				<input type='checkbox' name='crechk".$counter."' id='crechk".$counter."' value='1' ".(getSelectable('cre', $rowp['viewable']) == 1 ? ' CHECKED ':'').">
			</td>
			<td>
				<select size='6' multiple id='vforms".$counter."' name='vforms".$counter."[]'><option value='quo'".(strstr($rowp['viewable'], 'quo') ? ' SELECTED ':'').">Quote</option> <option value='po'".(strstr($rowp['viewable'], 'po') ? ' SELECTED ':'').">Purchase</option> <option value='con'".(strstr($rowp['viewable'], 'con') ? ' SELECTED ':'').">Confirmation</option> <option value='pac'".(strstr($rowp['viewable'], 'pac') ? ' SELECTED ':' SELECTED ').">Packing</option> <option value='inv'".(strstr($rowp['viewable'], 'inv') ? ' SELECTED ':'').">Invoices</option> <option value='cre'".(strstr($rowp['viewable'], 'cre') ? ' SELECTED ':'').">Credit</option> </select></td>
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
	$j('#cid').change(function() {
		$j('#reqblk').show();
	});
 
	var counter = "<?php echo $counter ?>";

	$j("select option").livequery('mousedown', function (e) {
		this.selected = !this.selected;
		e.preventDefault();
	});

	$j('input[type="checkbox"]').livequery('click', function () {
		if( $j(this).is(':checked') ) {
			var counter2, selval;
			var id = $j(this).attr('id');
			if(id.indexOf('quochk') > -1) {
				counter2 = id.replace('quochk', '');
				selval = '#vforms'+counter2+' option[value="quo"]';
			}
			if(id.indexOf('pochk') > -1) {
				counter2 = id.replace('pochk', '');
				selval = '#vforms'+counter2+' option[value="po"]';
			}
			if(id.indexOf('pacchk') > -1) {
				counter2 = id.replace('pacchk', '');
				selval = '#vforms'+counter2+' option[value="pac"]';
			}
			if(id.indexOf('conchk') > -1) {
				counter2 = id.replace('conchk', '');
				selval = '#vforms'+counter2+' option[value="con"]';
			}
			if(id.indexOf('invchk') > -1) {
				counter2 = id.replace('invchk', '');
				selval = '#vforms'+counter2+' option[value="inv"]';
			}
			if(id.indexOf('crechk') > -1) {
				counter2 = id.replace('crechk', '');
				selval = '#vforms'+counter2+' option[value="cre"]';
			}
			$j(selval).attr('selected', 'selected');
		}
	});

	$j("#addReq").click(function () {

	if(counter > 20) {
		alert("Only 20 requirements are allowed.");
		return false;
	}   

	var newTextBoxDiv = $j(document.createElement('div'))
	.attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.html('<table><tr><td vertical-align="top"><label>Req. #'+ counter + ' : </label>' + '<input type="text" name="req' + counter + '" id="req' + counter + '" value=""  size="50"></td><td><input type="checkbox" name="quochk' + counter + '" id="quochk' + counter + '" value="1"><br><input type="checkbox" name="pochk' + counter + '" id="pochk' + counter + '" value="1"><br><input type="checkbox" name="conchk' + counter + '" id="conchk' + counter + '" value="1"><br><input type="checkbox" name="pacchk' + counter + '" id="pacchk' + counter + '" value="1"><br><input type="checkbox" name="invchk' + counter + '" id="invchk' + counter + '" value="1"><br><input type="checkbox" name="crechk' + counter + '" id="crechk' + counter + '" value="1"></td><td><select size="6" multiple id="vforms' + counter + '" name="vforms' + counter + '[]"><option value="quo">Quote</option> <option value="po">Purchase</option> <option value="con">Confirmation</option> <option value="pac" selected >Packing</option> <option value="inv">Invoices</option> <option value="cre">Credit</option> </select></td></tr></table>');

	newTextBoxDiv.appendTo("#TextBoxesGroup"); 

	counter++;
	});

	$j("#remReq").click(function () {
		if(counter == 1){
			alert("No more requirement to remove");
			return false;
		}   
		counter--;
		$j("#TextBoxDiv" + counter).remove();
	});

});

function validate() {
	var cid = $j('#cid').val();
	if(cid == "") {
		alert("Please Select Customer.");
		return false;
	}
	return true;
}

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

<form name="form1" method="post" onsubmit="return validate()">
<input type="hidden" name="profid" value="<?php echo $profid; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="2"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30" width='130'><strong>Select Customer</strong></td>
	<td><select name="cid" id="cid">
	<option value="">Select Customer</option>
	<?php 
	$sqv = "select dt.* from data_tb dt left outer join profile_tb pt on dt.data_id = pt.custid where (pt.custid is null $orClause) order by c_name";
	$resc = mysql_query($sqv) or die(mysql_error());

	while($rwc = mysql_fetch_assoc($resc)) {
	?>
	<option value="<?php echo $rwc['data_id']; ?>" <?php echo ($cid == $rwc['data_id'] ? "SELECTED" : ""); ?> ><?php echo $rwc['c_name']; ?></option>
	<?php
	}
	?>
	</select>
	<div style='float:right'><input type='button' value='Add Requirement' id='addReq'></div>
	</td>
</tr>

<tr id='reqblk'>
	<td height="30"><strong>Requirements</strong></td>
	<td>
	<div id='TextBoxesGroup'>
		<?php echo $reqhtml; ?>
	</div>
	</td>
</tr>

<tr>
	<td height="30" colspan='2'><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset">&nbsp;&nbsp;<a href="manage_profile.php">Go back to Manage Profile</a></td>
</tr>

</table>

</form>


</td>
</tr>
</table>

</body>
</html>