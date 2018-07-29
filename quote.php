<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
//For alerts reference
if(!isset($_SESSION['refid'])) $_SESSION['refid'] = time();

if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from order_tb where ord_id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add new quote</title>
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
<script type="text/javascript">
<!--
function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href = "manage_quote.php?delid="+id;
	} else { return false; }
}
//-->
</script>

<script type="text/javascript">

function xoutsnot () {
	if(!document.getElementById('chk95').checked)
		document.getElementById('textfield28').value = '';
}

function getprice() {

//id=document.form1.txtcid.value;

qty1 = document.form1.txtqty1.value;
qty2 = document.form1.txtqty2.value;
qty3 = document.form1.txtqty3.value;
qty4 = document.form1.txtqty4.value;
day1 = document.form1.txtday1.value;
day2 = document.form1.txtday2.value;
day3 = document.form1.txtday3.value;
day4 = document.form1.txtday4.value;

if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
} else { // code for IE6, IE5
  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("txtshow1").innerHTML = xmlhttp.responseText;
	}
}
url = "getprice.php?qty1="+qty1+ "&qty2="+qty2+ "&qty3="+qty3+ "&qty4="+qty4+"&day1="+day1+ "&day2="+ day2+ "&day3="+ day3+ "&day4="+day4;

xmlhttp.open("GET","getprice.php?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4,true);

xmlhttp.send();

}
</script>
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
    <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements : "txtinstadmin",
		theme : "simple",
		forced_root_block : false
	});
</script>
<script  type="text/javascript" src='js/draggable.js'></script>

<!-- <script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script> -->

<!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
--><!-- <script src="http://code.jquery.com/jquery-latest.js"></script>
-->
<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();

var flag1 = 0;
var flag3 = 0;

function getprice2() {
     for (index=0; index < document.form1.chk1.length; index++) {
		if (document.form1.chk1[index].checked) {
			var radioValue = document.form1.chk1[index].value;
			break;
		}
	}

	//alert(radioValue);
	chk1 = radioValue;
	qty1 = document.form1.txtqty1.value;
	qty2 = document.form1.txtqty2.value;
	qty3 = document.form1.txtqty3.value;
	qty4 = document.form1.txtqty4.value;
	day1 = document.form1.txtday1.value;
	day2 = document.form1.txtday2.value;
	day3 = document.form1.txtday3.value;
	day4 = document.form1.txtday4.value;
	per1 = document.form1.txtday4.value;
	per2 = document.form1.txtday4.value;

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtshow1").innerHTML = xmlhttp.responseText;
		}
	}
	var data = $("#form1").serialize();

	url = "getprice.php?"+data+"&qty1="+qty1+ "&qty2="+qty2+"&qty3="+qty3+ "&qty4="+qty4+ "&day1="+day1+ "&day2="+day2+"&day3="+day3+ "&day4="+day4+ "&per1_raj="+per1+ "&per2_raj="+per2+ "&chk1="+chk1+ "&bprice=1";
    console.log(url);
	 // alert(url);
	 xmlhttp.open("GET", "getprice.php?"+data+"&qty1="+qty1+"&qty2="+ qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+ day1+"&day2="+ day2+"&day3="+day3+ "&day4="+ day4+ "&per1_raj="+ per1+ "&per2_raj="+ per2+"&chk1="+chk1+"&bprice=1&inid=1", true);

	xmlhttp.send();
}

function showmanual() {
	for (index=0; index < document.form1.chk1.length; index++) {
		if (document.form1.chk1[index].checked) {
			var radioValue = document.form1.chk1[index].value;
			break;
		}
	}

	//alert(radioValue);
	chk1 = radioValue;
	qty1 = document.form1.txtqty1.value;
	qty2 = document.form1.txtqty2.value;
	qty3 = document.form1.txtqty3.value;
	qty4 = document.form1.txtqty4.value;
	day1 = document.form1.txtday1.value;
	day2 = document.form1.txtday2.value;
	day3 = document.form1.txtday3.value;
	day4 = document.form1.txtday4.value;
	per1 = document.form1.txtday4.value;
	per2 = document.form1.txtday4.value;

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("txtshow1").innerHTML = xmlhttp.responseText;
	   }
	}
	var data = $("#form1").serialize();

	url = "getprice2.php?"+data+ "&qty1="+qty1+"&qty2="+qty2+ "&qty3="+ qty3+"&qty4="+qty4+ "&day1="+day1+"&day2="+day2+ "&day3="+ day3+"&day4="+ day4+"&per1_raj="+per1+"&per2_raj="+ per2+"&chk1="+ chk1+"&bprice=1";
	
	xmlhttp.open("GET", "getprice2.php?"+data+ "&qty1="+qty1+ "&qty2="+qty2+ "&qty3="+qty3+"&qty4="+qty4+ "&day1="+ day1+"&day2="+ day2+"&day3="+ day3+"&day4="+ day4+"&per1_raj="+ per1+"&per2_raj="+ per2+"&chk1="+chk1+"&bprice=1&inid=1",true);

	xmlhttp.send();
}

function test123(){
uid = document.form1.txtcust.value;

var uid2 = uid.split("+");
var uid3 = uid2[0];

var xmlhttp;
if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("content").innerHTML = xmlhttp.responseText;
  }
}
	xmlhttp.open("GET","getmainenggcontact.php?uid="+uid3,true);
	xmlhttp.send();
}
//-->
</script>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />     

<script type="text/javascript">
<!--
	function geturl(addr) {  
	var r = $.ajax({  
	 type: 'GET',  
	 url: addr,  
	 async: false  
	}).responseText;  
	return r;  
}  
  
function test() {
	var uid = '';
	var uid2 = '';
	var uid3 = '';
	uid = document.getElementById("txtcust").value;
	uid2 = uid.split("+");
	uid3 = uid2[0];
	$('#content').html(geturl("getmainenggcontact.php?uid="+uid3)); 
	test2();
}

$(document).ready(function() {

	$("#Submit").click(function(e) {

		/*if( $.trim($('#txtcust').val()) != "") {
			$('#alertDiv2').html(geturl("getalerts.php?custid=" + $.trim($('#txtcust').val().replace('+','|')) + "&refid="+ <?php echo $_SESSION['refid'] ?>)); 
			$('#alertDiv2').show();		
			if(flag3 <= 1) flag3 = flag3 + 1;
		}*/
		var offset = $(this).offset();

		var uid = $.trim($('#txtcust').val());

		if( uid == "") { 
			alert('Please select Customer'); }
		else {
			var uid2 = uid.split("+");

		if($.trim($('#txtpno').val()) != "") { 
			var response = geturl("getalerts.php?customer=" + uid2[1] + "&pno=" + $.trim($('#txtpno').val()) + "&rev=" + $.trim($('#txtrev').val()) + "&ftype=quo" + "&refid="+ <?php echo $_SESSION['refid'] ?>); 
			//
			if(response != 'norecords') {
				$('#alertDiv').html(response); 
				$('#alertDiv').css({top: (offset.top-150)+'px'}).show();	
				if(flag3 <= 1) flag3 = flag3 + 1;
			}
		}

		var showlink = geturl("getRequirements.php?ftype=quo&cid="+uid2[0]);
		if(showlink != "") { //$('#reqlink').show(); 
		$('#reqDiv').html(showlink); flag1 = 1; }
		else { $('#specialreq').html(""); flag1 = 0; }

		if(flag1 == 1) { // Customer profile popup

			$('#reqDiv').css({top: (offset.top-300)+'px'}).show(); 
			if(flag3 <= 1) flag3 = flag3 + 1; 

			$('#close').livequery('click', function(e) {
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$(this).parent().hide();
				}
				else  
					$('#form1').submit();//form submit on close
			});

			$('#save_value').livequery('click', function() {
				var reqstr = '';
				$('.reqs_Checkbox:checked').each(function(){        
					var values = $(this).val();
					reqstr += values + " | ";
				});
				$('#reqDiv').hide(); 
				if(reqstr.length > 2) {
					reqstr = reqstr.substring(0, reqstr.length - 3);
				}
				$('#specialreq').html("<strong>Special requirements:</strong> " + reqstr); 
				$('#specialreqval').val(reqstr);

				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$(this).parent().hide();
				}
				else  
					$('#form1').submit();//form submit on close
			});
		}

		if(flag3 == 0) $('#form1').submit();
	}

	});
});

function test2() {
	var uid = '';
	uid= document.getElementById("txtreq").value;
	$('#content2').html(geturl("getmailphone.php?uid="+uid));  
}
//-->
</script>
<script type="text/javascript">
<!--
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': 
			window.location.href = 'http://pcbsglobal.com/luke-new/admin/welcome.php';
			break;
        }
    });

	$('#rep').click(function() {
		$('#necharge').attr("disabled", true);
	});

	$('#new').click(function() {
		$('#necharge').attr("disabled", false);
	});

	$('#simplequote').click(function() {
		if($(this).is(':checked')) {
			$('#comments').css("visibility", "visible");
			$('#complexform').hide();
		}
		else {
			$('#comments').css("visibility", "hidden");
			$('#complexform').show();
		}
	});

	$("#fob").change(function() {
	if( $(this).val() == 'Other' ) 
		$("#fob_oth").css('visibility', 'visible');
	else $("#fob_oth").css('visibility', 'hidden'); });

	$("#vid").change(function() {
	if( $(this).val() == '9999' ) 
		$("#vid_oth").css('visibility', 'visible');
	else $("#vid_oth").css('visibility', 'hidden'); });

	$('#alert_pno').autocomplete({source:'getalertpno.php', minLength:1});	

});

function setalertpno() {
	if($('#alert_pno').val() != "") {
		var tempno = $('#alert_pno').val().split('_');			
		$("#txtcust option").each(function() { 
			this.selected = (this.text == $.trim(tempno[0])); });
		$('#txtpno').val(tempno[1]);
		$('#txtrev').val(tempno[2]);
	}
}

function clearval(id) {
	$('#'+id).val('');
}

//-->
</script>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>

	<td align="center" id="container">
	<table width="1300" border="0" cellpadding="0" cellspacing="1">
	<tbody>

	<tr style="height:20px; background-color:#fff;"></tr>

	<tr>
		<td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>
	</tr>

	<tr>             
		<td id="mainpage" style="width: 750px;">
		<div>
		<table width="100%" cellpadding="5" cellspacing="1">
		<tbody>

		<tr>
			<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br />
			<br />
			<img src="logo-pcb.png" width="189" height="198" border="0" /></a><br /></td>

			<td style="line-height: 16px;"><?php

			// Paging Code Starts
			// how many rows to show per page 

			$rowsPerPage = 10; 
			// by default we show first page 

			$pageNum = 1; 

			// if $_GET['page'] defined, use it as page number 

			if(isset($_GET['page'])) { 
				$pageNum = $_GET['page']; 
			} 

		// counting the offset 
		$offset = ($pageNum - 1) * $rowsPerPage; 

$sqs = "select * from order_tb";
$sqs .= " ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

$res1 = mysql_query($sqs,$conn) or die('error in data'.mysql_error());

if(mysql_num_rows($res1) > 0) {

	$query = "select * from order_tb";
	//print $query;

	$result  = mysql_query($query) or die('Error, query failed'); 
	$row     = mysql_fetch_array($result, MYSQL_ASSOC); 
	$numrows = mysql_num_rows($result);

	// No of rows u need to assign
	// how many pages we have when using paging? 

	$maxPage = ceil($numrows/$rowsPerPage); 

	//echo "<br>Maximum Pages : ".$maxPage;
	// print the link to access each page 
	$self = $_SERVER['PHP_SELF']; 

	$nav = ''; 

	for($page = 1; $page <= $maxPage; $page++)  { 

		if ($page == $pageNum)  { 
			$nav .= " $page ";   // no need to create a link to current page 
		}  else  { 
			$nav .= " <a href=\"$self?page=$page\">$page</a> "; 
		}         
	} 

	// creating previous and next link 
	// plus the link to go straight to 
	// the first and last page 
	if ($pageNum > 1) { 
		$page = $pageNum - 1; 
		$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 
		$first = " <a href=\"$self?page=1\">[First Page]</a> "; 
	}  else  { 
		$prev  = '&nbsp;'; // we're on page one, don't print previous link 
		$first = '&nbsp;'; // nor the first page link 
	} 

	if ($pageNum < $maxPage) { 
		$page = $pageNum + 1; 
		$next = " <a href=\"$self?page=$page\">[Next]</a> "; 
		$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 
	}  else { 
		$next = '&nbsp;'; // we're on the last page, don't print next link 
		$last = '&nbsp;'; // nor the last page link 
	} 						

	// print the navigation link 
?>

	<form id="form1" name="form1" method="post" action="sendmail.php">
	<input type="hidden" name="specialreqval" id="specialreqval" value="">

	<table width="880" border="1" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6" class="up" style="left:35px;">

	<tr>
		<td height="25" bgcolor='#336699' colspan="3" align="center">
		  <font color="white"><span class="style1">Online Request For Quote Form</font></span></td>
	</tr>

	<tr>
		<td height="25" colspan='3'><strong>Lookup ID :</strong> <input type="text" name="alert_pno" id="alert_pno" size="60" onChange="setTimeout(function() { setalertpno(); }, 250);" />
		</td>
	</tr>		

	<tr>
		<td width="312" height="25"><strong>Customer :</strong> 

		<select name="txtcust" id="txtcust" onChange="test();">
		<option value=''>Select Customer</option>
		<?php 

		$sqv = "select * from data_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');

		while($rwv = mysql_fetch_assoc($resv)) { ?>
			<option value="<?php echo $rwv['data_id'].'+'.$rwv['c_name'];
		?>"><?php echo $rwv['c_name'];	?></option>
		<?php 		}		?>
		</select></td>

		<td width="252"><strong>Part Number :</strong> 

		<input type="text" name="txtpno" id="txtpno" /></td>

		<td width="238"><strong>Rev :</strong> 
		<input name="txtrev" type="text" id="txtrev" size="2" />
		<label for="new"><strong> New</strong></label>
		<input type="radio" name="nor1"  value="New Part" id="new" />
		&nbsp;&nbsp;&nbsp;
		<label for="rep"><strong> Repeat</strong></label>
		<input type="radio" name="nor1"  value="Repeat Order" id="rep" />
		</td>
		</tr>

		<tr>
			<td height="25"><strong>Requested By :</strong> 
			<span id="content"></span></td>

			<td colspan="2" id="content2" height="25">
				<strong>Email :</strong> 

				<input type="text" name="txtemail" id="txtemail" /> <strong>Phone :</strong> 

				<input type="text" name="txtphone" id="txtphone" />
			</td>

			<!-- <td><strong>Phone :</strong><input type="text" name="txtphone" id="txtphone" /></td> -->
		</tr>

		<tr>
			<td colspan="3"><strong>FAX :</strong> 

			<input name="txtfax" type="text" id="txtfax" size="14" /> 

			<strong>Quote Needed by:      </strong>

			<input name="txtquote" type="text" id="txtquote" size="10" />
			<strong> NRE Charge:</strong> <input size="3" type="text" value="" name="necharge" id="necharge">

			Select Misc :
			<select name="txtmisc" id="txtmisc" onchange="getmisc();">
			<option value="">--select MISC--</option>
			<option value="m1">Misc 1</option>
			<option value="m2">Misc 2</option>
			<option value="m3">Misc 3</option>
			</select>
			&nbsp; <input type="checkbox" id="simplequote" name="simplequote" value='1'> Simple Quote
			<br />
			<script type="text/javascript">
			<!--			
     function getmisc() {
		//alert('hi');
		if(document.form1.txtmisc.value=='m1') {
		document.getElementById('misc1').style.visibility = 'visible';
		}
		if(document.form1.txtmisc.value=='m2') {
		document.getElementById('misc2').style.visibility = 'visible';
		}
		if(document.form1.txtmisc.value=='m3') {
		document.getElementById('misc3').style.visibility = 'visible';
		}
	}
	//-->
	</script>

	<table width='100%' border='0'>
	<tr>
		<td>
		<div id="misc1" style="visibility:hidden;"><strong>Misc Charge1:</strong> <input size="3" type="text" name="descharge"  id="descharge"> 
		&nbsp;Name of Misc1 :
		<input type="text" name="desdesc" id="desdesc" />
		</div>
		<div id="misc2" style="visibility:hidden;">  <strong>Misc Charge2:</strong> <input size="3" type="text" name="descharge1"  id="descharge1"> 
		&nbsp;Name of Misc2 :
		<input type="text" name="desdesc1" id="desdesc1" />
		</div>
		<div id="misc3" style="visibility:hidden;"> <strong>Misc Charge3:</strong> <input size="3" type="text" name="descharge2" id="descharge2"> 
		&nbsp;Name of Misc3 :
		<input type="text" name="desdesc2" id="desdesc2" />
		</div>
		</td>
		<td><div id='comments' style="visibility:hidden;"><br><b>Comments:</b><br><textarea name="comments" rows="3" cols="30"></textarea></div></td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
	<!--<strong>Customer PO:      </strong>

	<input name="cpo" type="text" id="cpo" size="8" />-->

	<!-- <strong>Our PO:      </strong>

	<input name="opo" type="text" id="opo" size="8" />
	-->

	<div id='complexform'>

	<table width="880" border="1" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6" class="up" style="left:35px;">
	<tr><td>
		<strong><br />
		Cancellation</strong>
		<input type="radio" name="cancharge" id="radio12" value="yes">	Yes <input type="radio" name="cancharge" id="radio122" value="no"> No
		<strong>Charge</strong>
          
		<input name="ccharge" type="text" id="ccharge" size="8" />  
		<!-- <strong>Order Date</strong><input name="orddate1" type="text" id="exampleII" size="18" />    -->    

		<strong>FOB:</strong>
		<select name="fob" id="fob">
			<option value="Anaheim">Anaheim</option>
			<option value="Customer Dock">Customer Dock</option>
			<option value="Factory">Factory</option>
			<option value="Hong Kong">Hong Kong</option>
			<option value="Other">Other</option>
		</select> <div style='display: inline; visibility: hidden' id="fob_oth">Other: <input type="text" name="fob_oth" size="15" maxlength='50'></div>

		<br><br><strong>Vendor:</strong>
			<select name="vid" id="vid">
			<?php 
			echo "<option value='' >Select Vendor</option>";
			$sqv = "select * from vendor_tb order by c_name";
			$resv = mysql_query($sqv) or die('err');
			while($rwv = mysql_fetch_assoc($resv)) {			
				echo "<option value='".$rwv['data_id']."' >".$rwv['c_name']."</option>";
			}
			echo "<option value='9999' >Other</option>";
			?>
			</select> <div style='display: inline; visibility: hidden' id="vid_oth">Other: <input type="text" name="vid_oth" size="30" maxlength='100'></div>
		</td>
	</tr>

    <tr>
		<td height="25"><strong>Qty(s) : </strong>

        <input name="txtqty1" type="text" id="txtqty1" size="1" /> , 
        <input name="txtqty2" type="text" id="txtqty2" size="2" /> , 
        <input name="txtqty3" type="text" id="txtqty3" size="3" />  ,
        <input name="txtqty4" type="text" id="txtqty4" size="4" /> ,
        <input name="txtqty5" type="text" id="txtqty5" size="4" /> ,
        <input name="txtqty6" type="text" id="txtqty6" size="4" /> ,
        <input name="txtqty7" type="text" id="txtqty7" size="4" /> ,
        <input name="txtqty8" type="text" id="txtqty8" size="4" /> ,
        <input name="txtqty9" type="text" id="txtqty9" size="4" /> ,
        <input name="txtqty10" type="text" id="txtqty10" size="4" /> 
		<br><br>
		<strong>Lead Times (In Days) :</strong> 

		<input name="txtday1" type="text" id="txtday1" size="1" /> ,
		<input name="txtday2" type="text" id="txtday2" size="1" /> ,
		<input name="txtday3" type="text" id="txtday3" size="1" /> ,
		<input name="txtday4" type="text" id="txtday4" size="1" /> ,
        <input name="txtday5" type="text" id="txtday5" size="1" />
        <input name="txtprice1" type="hidden" id="txtprice1" value="$12" size="15" />
        <input name="txtprice2" type="hidden" id="txtprice2" value="$10" size="15" />
        <input name="txtprice3" type="hidden" id="txtprice3" value="$5" size="15" />
        <input name="txtprice4" type="hidden" id="txtprice4" value="$4.40" size="15" /></td>
    </tr>

	<tr>
		<td height="25">
		<input type="button" name="button" id="button" value="Calculate Price" onClick="getprice2();">
		&nbsp;&nbsp;&nbsp;
		<input type="button" name="button" id="button" value="Manual Price" onClick="showmanual();">

		<br><br><div id="txtshow1"></div><br>
		</td>
	</tr>

    <tr>
		<td>
		<table width='100%'>
		<tr>
			<td colspan='2' height="25" bgcolor='#336699' align="Left">
			<font color="white"><strong id='labelcomments'>ADMIN INSTRUCTIONS:</strong> </font></span>      </td>
		</tr>

		<tr>
			<td height="25" width='50%' ><label>
			<textarea name="txtinstadmin" id="txtinstadmin" cols="45" rows="5"></textarea></label></td>

			<td height="25" >
			<strong>Replace with Comments</strong> <br>
			Yes 
			<input name="admcmntstat" type="radio" id="admcmntstat1" value="yes" />
			<br>
			No &nbsp;<input name="admcmntstat" type="radio" id="admcmntstat2" checked value="no" /></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>

	<table class="upTT" width="880" border="1" style="border-color: #336699; left:35px;" cellpadding="1" cellspacing="0" bordercolor="#e6e6e6">

    <tr>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Number of Layers : </font></strong></td>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Material Required : </font></strong></td>
		<td height="25" bgcolor='#336699'><font color="white"><strong>IPC Class:</strong> 1 
		<input name="chki1" type="radio" id="chki1" value="1" /> 2
		<input name="chki1" type="radio" id="chki2" value="2" /> 3 
		<input name="chki1" type="radio" id="chki3" value="3" /></font></td>
    </tr>

    <tr>
		<td height="25"> Single Sided <input name="chk1" type="radio" id="chk1" value="single" />
		Double Sided <input name="chk1" type="radio" id="chk2" value="Double Sided" />
		<br /><br />
		<strong>Multilayer: </strong>4Lyr 
		<input name="chk1" type="radio" id="chk3" value="4Lyrs" /> 6Lyr 
		<input name="chk1" type="radio" id="chk4" value="6Lyrs" /> 8Lyr 
		<input name="chk1" type="radio" id="chk5" value="8Lyrs" /> 10Lyr 
		<input name="chk1" type="radio" id="chk6" value="10Lyrs" />
		<br /><br />
		Other :
		<input name="chk1" type="radio" id="chk99" value="Other" />
		<input type="text" name="txtother1" id="txtother1" />

		<br />
		</label></td>

		<td height="25"> FR-4 
		<input name="chk7" type="radio" id="chk7" value="FR-4" onclick="clearval('txtother2')"  />
		&nbsp;
		FR-4/170TG Min
		<input name="chk7" type="radio" id="chk8" value="FR-4/170TG Min"  onclick="clearval('txtother2')" />
		<br /><br />
		Rogers 4003 
		<input name="chk7" type="radio" id="chk9" value="Rogers 4003" onclick="clearval('txtother2')"  />
		&nbsp;		
		Other: 
		<input name="chk7" type="radio" id="chk107" value="Other" />
		<input name="txtother2" type="text" id="txtother2" size="12" />
		<br /><br />

		<strong>Inner Copper Oz: </strong>N/A
		<input name="chk18" type="radio" id="chk18" value="N/A" />
		&nbsp; .5
		<input name="chk18" type="radio" id="chk19" value=".5" />
		&nbsp; 1
		<input name="chk18" type="radio" id="chk20" value="1" />
		&nbsp; 2
		<input name="chk18" type="radio" id="chk21" value="2" />
		<br />
		Other
		<input name="chk18" type="radio" id="chk102" value="Other" />
		<input name="txtother6" type="text" id="txtother6" size="10" /> Oz
		<br /></td>

		<td height="25" valign="top"><strong>Thickness:</strong> 0.031&quot;
		<input name="chk13" type="radio" id="chk13" value="0.031" onclick="clearval('txtother4')"  />
		&nbsp; 0.062&quot;
		<input name="chk13" type="radio" id="chk14" value="0.062" onclick="clearval('txtother4')"  />
		<br /><br /> 0.093&quot; 
		<input name="chk13" type="radio" id="chk15" value="0.093" onclick="clearval('txtother4')"  />
		&nbsp; Other: 
		<input name="chk13" type="radio" id="chk108" value="Other" />
		<input name="txtother4" type="text" id="txtother4" size="5" />
		<br />
		<br />
		<strong>Thickness Tolerance:</strong>
		<br />
		<br />
		+-10% <input name="chk17" type="radio" id="chk17" value="+/- 10%" /> 
		Other <input name="chk17" type="radio" id="chk101" value="Other" />
		<input name="txtother5" type="text" id="txtother5" size="5" />
		<br />
		<br /></td>
	</tr>

	<tr>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Plate : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Design Type/Requirements : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Design Technology : </font></strong></td>
    </tr>

	<tr>
		<td height="25" width="307px"><strong>External Cu Oz:</strong> 0.5
		<input name="chk10" type="radio" id="chk10" value="0.5" />
		&nbsp; 1
		<input name="chk10" type="radio" id="chk11" value="1" />
		&nbsp; 2
		<input name="chk10" type="radio" id="chk12" value="2" />
		<br />
		<br />
		Other :
		<input name="chk10" type="radio" id="chk100" value="Other" />
		<input type="text" name="txtother3" id="txtother3" /> Oz
		<br />
		<br />
        <br />
        <strong>Plated Cu in Holes (Min.):</strong> .0010 
        <input name="chk22" type="radio" id="chk22" value=".0010" />
		&nbsp;
        .0014 
        <input name="chk22" type="radio" id="chk23" value=".0014 " />
        &nbsp;&nbsp;&nbsp;&nbsp;1oz 
        <input name="chk22" type="radio" id="chk24" value="1oz " />
		&nbsp;
        Other 
        <input name="chk22" type="radio" id="chk106" value="Other" /> 
        <input name="txtother7" type="text" id="txtother7" size="5" />
        <br />
        <br />
		<strong>Fingers Nickel/Hard Gold: </strong>Yes <input name="chk25" type="checkbox" id="chk25" value="yes" />
		&nbsp;
		<!-- NO 
		<input name="chk25" type="radio" id="chk26" checked value="No" /> -->
		<br />
		<br /></td>

		<td height="25" width="330px" valign="top"><strong>Trace Min. = </strong>.006 
		<input name="chk27" type="radio" id="chk27" value=".006" onclick="clearval('txtother54')"  />
		.005 
		<input name="chk27" type="radio" id="chk28" value=".005" onclick="clearval('txtother54')"  />
		.004 
		<input name="chk27" type="radio" id="chk29" value=".004" onclick="clearval('txtother54')"  />
		.003
		<input name="chk27" type="radio" id="chk30" value=".003" onclick="clearval('txtother54')"  />
		<br />Other 
		<input name="chk27" type="radio" id="chk212" value="Other" />
		<input name="txtother54" type="text" id="txtother54" size="10" />
		<br />
		<br />
		<strong>Space Min. =</strong>.006
		<input name="chk31" type="radio" id="chk31" value=".006" onclick="clearval('txtother55')"  /> .005 
		<input name="chk31" type="radio" id="chk32" value=".005" onclick="clearval('txtother55')"  /> .004 
		<input name="chk31" type="radio" id="chk33" value=".004" onclick="clearval('txtother55')"  /> .003 
		<input name="chk31" type="radio" id="chk34" value=".003" onclick="clearval('txtother55')"  />
		<br />
		Other 
		<input name="chk31" type="radio" id="chk213" value="Other" />
		<input name="txtother55" type="text" id="txtother55" size="10" />
		<br />
		<br />
		<strong>Controlled Impedance:</strong> 
		<input name="chk35" type="checkbox" id="chk35" value="Yes" /> Yes <!-- No 
		<input name="chk35" type="radio" id="chk36" checked value="No" /> -->
		<br />
		<br />      
      
		<!-- <div id="yes_box" style="display: block; "  >-->
		Single Ended 
		<input name="chk109" type="checkbox" id="chk109" value="Single Ended" />

		Differential
		<input name="chk110" type="checkbox" id="chk110" value="Differential" />
		<br />
		<br />
		<strong>Impedance Tolerance:</strong>
		<br />+-10% 
		<input name="chk202" type="radio" id="chk202" value="+/- 10%" /> 

		Other 
		<input name="chk202" type="radio" id="chk203" value="Other" />
		<input name="txtother51" type="text" id="txtother51" size="10" />

		<!-- </div> -->      
		<br />
		<td height="25" valign="top"><strong>Smallest  Hole Size:</strong>
		<input name="txtother8" type="text" id="txtother8" size="8" />
		<br /><br /><strong>Smallest Pad:</strong>
		<input name="txtother19" type="text" id="txtother14" size="10" />
		<br />
		<br />
		<strong>Blind Vias:</strong>  
		<input name="chk37" type="checkbox" id="chk37" value="yes" />
		&nbsp;Yes
		<!-- No <input name="chk37" type="radio" id="chk38" value="No" /> -->
		<br />
		<br />
		<strong>Buried Vias: </strong>
		<input name="chk39" type="checkbox" id="chk39" value="yes" /> Yes 
		&nbsp; <!-- No <input name="chk39" type="radio" id="chk40" value="No" /> -->
		<br />
		<br />
		<!-- <strong>Blind/Buried Vias:</strong> Yes 
		<input name="chk41" type="radio" id="chk41" value="Yes" />
		&nbsp; No 
		<input name="chk41" type="radio" id="chk42" value="No" />
		<br />
		<br /> -->
		<strong>HDI Design:</strong> 
        <input name="chk200" type="checkbox" id="chk200" value="Yes" /> Yes
		<!-- No <input name="chk200" type="radio" id="chk201" value="No" /> -->
	   <br />
	   <br />
	   <strong>Non-Conductive Filled/Plated Over:</strong><br>
       <input name="chk215" type="checkbox" id="chk215" value="Yes" /> Yes 
		<!-- No <input name="chk215" type="radio" id="chk216" value="No" /> -->
	   <br />
		<strong>Conductive Filled Vias:</strong> 
        <input name="chk210" type="checkbox" id="chk210" value="Yes" /> Yes
		<!-- No <input name="chk210" type="radio" id="chk211" value="No" /> -->
		</td>
	</tr>

	<tr>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Finish : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Solder Resist : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Nomenclature : </font></strong></td>
	</tr>

	<tr>
		<td height="25"><strong>Finish:</strong> HASL 
		<input name="chk43" type="radio" id="chk43" value="HASL" />
		&nbsp; Lead-Free HASL
		<input name="chk43" type="radio" id="chk44" value="Lead-Free HASL" />
		<br />
		<br /> ENIG
		<input name="chk43" type="radio" id="chk45" value="ENIG" />
		&nbsp; Imm.Silver
		<input name="chk43" type="radio" id="chk46" value="Imm.Silver" /> 
		&nbsp; Imm.Tin
		<input name="chk43" type="radio" id="chk47" value="Imm.Tin" />
		<br />
		<br /> Other :
		<input name="chk43" type="radio" id="chk103" value="Other" />
		<input name="txtother9" type="text" id="txtother9" size="15" /></td>

		<td height="25"><strong>Mask Sides:</strong> N/A
		<input name="chk48" type="radio" id="chk48" value="N/A" /> 
		&nbsp; 1 
		<input name="chk48" type="radio" id="chk49" value="1" />
		&nbsp;
		Both <input name="chk48" type="radio" id="chk50" value="Both" />
		<br />
		<br />
		<strong>Color:</strong> Green 
		<input name="chk51" type="radio" id="chk51" value="Green" onclick="clearval('txtother10')"  />
		&nbsp;
		Blue <input name="chk51" type="radio" id="chk52" value="Blue" onclick="clearval('txtother10')"  />
		<br />
		<br />
		Other :
		<input name="chk51" type="radio" id="chk104" value="Other" />
		<input name="txtother10" type="text" id="txtother10" size="15" />
		<br />
		<br />
		<strong>Mask Type:</strong> Glossy 
		<input name="chk53" type="radio" id="chk53" value="Glossy" />
		&nbsp;
		Matte 
		<input name="chk53" type="radio" id="chk54" value="Matte " />    </td>

		<td height="25" width="273px"><strong>S/S Sides: </strong>N/A 
		<input name="chk55" type="radio" id="chk55" value="N/A" />
		&nbsp; 1 
		<input name="chk55" type="radio" id="chk56" value="1" />
		&nbsp; 2 <input name="chk55" type="radio" id="chk57" value="2" />
		<br />
		<br />

		<strong>S/S Color: </strong>
		White <input name="chk58" type="radio" id="chk58" value="White" onclick="clearval('txtother11')" />
		Black <input name="chk58" type="radio" id="chk59" value="Black" onclick="clearval('txtother11')" />  Yellow <input name="chk58" type="radio" id="chk60" value="Yellow"onclick="clearval('txtother11')" />
		<br />
		<br />
		<strong>Other:</strong>
		<input name="chk58" type="radio" id="chk105" value="Other" />		
		<input name="txtother11" type="text" id="txtother11" size="15" /></td>
	</tr>

	<tr>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Fabrication : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Array Requirements : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Special Call-Outs : </font></strong></td>
	</tr>

	<tr>
		<td height="25"><!-- <strong>Individual Route 1-up: </strong>Yes 
		<input name="chk61" type="radio" id="chk61" value="Yes" />
		&nbsp;
		No
		<input name="chk61" type="radio" id="chk62" value="No" />
		<br />
		<br /> -->
		<strong>Board Size (in.)</strong> 
		<input name="txtother12" type="text" id="txtother12" size="5" /> X
		<input name="txtother13" type="text" id="txtother13" size="5" />
		<br />
		<br />
		<strong>Array:</strong> 
		<input name="chk63" type="checkbox" id="chk63" value="YES" /> Yes
		<!-- &nbsp; No <input name="chk63" type="radio" id="chk64" value="NO" /> -->
		<br /><br />

		<div id="yes_box2" style="display: block; "  >

		<strong>Bds Per Array:</strong> 
		<input name="txtother14" type="text" id="textfield26" size="4" />
		<br /><br />
		<strong>Array Size:</strong>
		<input name="txtother15" type="text" id="txtother15" size="5" /> X
		<input name="txtother16" type="text" id="textfield25" size="5" />
		</div>
		<br />
		<strong>Rout Tolerance:</strong> +/-.005 <input name="chk204" type="radio" id="chk204" value="+/-.005" onclick="clearval('txtother53')" /> Other 
		<input name="chk204" type="radio" id="chk205" value="Other" />
		<input name="txtother52" type="text" id="txtother53" size="2" />    </td>

		<td height="25"><strong>Array Design Provided:</strong>
		<input name="chk65" type="checkbox" id="chk65" value="Yes" /> Yes 
		&nbsp; <!-- No
		<input name="chk65" type="radio" id="chk66" value="No" /> -->
		<br /><br />
		<strong>Factory to Design Array: </strong> 
		<input name="chk67" type="checkbox" id="chk67" value="yes" /> Yes
		&nbsp; <!-- No
        <input name="chk67" type="radio" id="chk68" value="No" /> -->
        <br /><br />
        <strong>Array Type:</strong> Tab Route
        <input name="chk69" type="checkbox" id="chk69" value="Tab Route" /> 
		&nbsp; V Score
        <input name="chk70" type="checkbox" id="chk70" value="V Score" />
        <br /><br /> 
		<strong>Array Requires: </strong>Tooling Holes <input name="chk72" type="checkbox" id="chk72" value="Tooling Holes" />
        <br /><br />
		Fiducials
		<input name="chk73" type="checkbox" id="chk73" value="Fiducials" /> 
		&nbsp; Mousebites
		<input name="chk74" type="checkbox" id="chk74" value="Mousebites" /></td>

		<td height="25"><strong>Milling: </strong> 
		<input name="chk75" type="checkbox" id="chk75" value="yes" /> Yes
		&nbsp; <!-- No
		<input name="chk75" type="radio" id="chk76" value="No" /> -->
		<br />
		<br />
		<strong>Countersink:</strong>
		<input name="chk77" type="checkbox" id="chk77" value="yes" /> Yes 
		&nbsp; <!-- No
		<input name="chk77" type="radio" id="chk78" value="No" /> -->
		<br />
		<br />
		<strong>Control Depth:</strong>
		<input name="chk79" type="checkbox" id="chk79" value="Yes" /> Yes 
		&nbsp; <!-- No
		<input name="chk79" type="radio" id="chk80" value="No" /> -->
		<br />
		<br />
		<strong>Edge Plating:</strong>
		<input name="chk81" type="checkbox" id="chk81" value="Yes" /> Yes 
		&nbsp; <!-- No
		<input name="chk81" type="radio" id="chk82" value="No" /> -->
		</td>
	</tr>

    <tr>
		<td height="25" bgcolor='#336699'><font color="white"><strong>Markings : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>QA Requirements : </font></strong></td>

		<td height="25" bgcolor='#336699'><font color="white"><strong>Miscellaneous : </font></strong></td>
	</tr>

    <tr>
		<td height="25" width="307px"><strong>Logo:</strong> <!-- None 
		<input name="chk83" type="radio" id="chk83" value="None" onclick="clearval('txtother56')"  /> -->
		Factory <input name="chk83" type="radio" id="chk84" value="Factory" onclick="clearval('txtother56')"  /> Other 
		<input name="chk83" type="radio" id="chk214" value="Other" />
		<input name="txtother56" type="text" id="txtother56" size="3" /> Logo
		<br />
		<br />
		<strong>94V-0 Mark: </strong> 
		<input name="chk85" type="checkbox" id="chk85" value="Yes" /> Yes 		<!-- &nbsp;		No <input name="chk85" type="radio" id="chk86" value="No" /> -->
		<br />
		<br />
		<strong>Date Code Format:</strong> <!-- None 
		<input name="chk87" type="radio" id="chk87" value="None" /> 
		&nbsp; --> WWYY 
		<input name="chk87" type="radio" id="chk88" value="WWYY" />
		&nbsp; YYWW  <input name="chk87" type="radio" id="chk89" value="YYWW" />
		&nbsp;
		<strong>Other Marking: </strong>
		<input  name="chk87" type="radio" id="chk111" value="Other Marking " />
		
		<input name="txtother17" type="text" id="textfield27" size="10" /> D/C Format
		<br /></td>
		<td height="25"><strong>Microsection Required:</strong> 
		<input name="chk90" type="checkbox" id="chk90" value="YES" /> Yes
		&nbsp;
		<!-- No <input name="chk90" type="radio" id="chk91" value="NO" /> -->
		<br />
		<br />
		<strong>Electrical Test Stamp: </strong>
		<input name="chk92" type="checkbox" id="chk92" value="Yes" /> Yes
		&nbsp; <!-- No <input name="chk92" type="radio" id="chk93" value="No" /> -->
		<br />
		<br />
		In Board <input name="chk94" type="checkbox" id="chk94" value="In Board" />&nbsp;In Array Rail <input name="chk199" type="checkbox" id="chk199" value="In Array Rail" /></td>

		<td height="25"><strong>X-Outs Allowed:</strong>
		<input name="chk95" type="checkbox" id="chk95" value="yes" onClick="xoutsnot();" /> Yes
		&nbsp;<!-- 		
		No <input onSelect="xoutsnot();" onChange="xoutsnot();" name="chk95" type="radio" id="chk96" value="no" /> -->
		<br />
		<br />
		<strong># of X-outs per Array:</strong> 
		<input name="txtother28" type="text" id="textfield28" size="4" />
		<br /><br />
		<strong>RoHS Cert:</strong> 
		<input name="chk97" type="checkbox" id="chk97" value="Yes" /> Yes
		&nbsp; <!-- No <input name="chk97" type="radio" id="chk98" value="No" /> --></td>
	</tr>
	</table>
	</div>

	<!-- Part no alerts -->
	<div id='alertDiv' style='z-index: 100; padding: 10px; background: #c1fff8; border: 1px solid #369; position: absolute; top:1500px; left: 330px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>	
	<!-- Requirements Popup -->
	<div id='reqDiv' style='z-index: 110; padding: 10px; background: #eee; border: 1px solid #369; position: absolute; top:1400px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>
	<!-- Alerts form and list -->
	
	<div id='alertDiv2' style='z-index: 100; padding: 10px; background: #efe; border: 1px solid #369; position: absolute; top:1600px; left: 250px; display: none;' onmousedown='mydragg.startMoving(this,"container",event);' onmouseup='mydragg.stopMoving("container");'></div>

	<table class="upTT" width="880" border="1" style="border-color: #336699; left:35px;" cellpadding="1" cellspacing="0" bordercolor="#e6e6e6">
	<tr>
		<td height="25" colspan="3">
		
		<div id='specialreq' style='color: #000; font: 11px/25px Verdana;'></div>
		</td>
	</tr>

	<tr>
		<td height="25" colspan="3"><input type="hidden" name="Submit" value=""><input type="button" id="Submit" value="Submit">
		&nbsp;
		<label><input type="reset" name="button2" id="button2" value="Reset" />
		</label> <!-- &nbsp;<input type="button" style='display:none' id="reqlink" value="Customer Profile">
		&nbsp;<input type="button" id="alertlink" value="Alerts"> -->
		&nbsp;&nbsp;Receive reminders <input type="checkbox" name="reminders" value='yes' > after every <input type="text" name="days" size='2' maxlength='3' value="15"> days</td>
	</tr>

	<tr><td height="25" colspan="3">&nbsp;</td></tr>
	</table>	
			

	<p>&nbsp;</p>
	<p>&nbsp;</p>
	</form>
	<p>

	<?php 	}// end of if
	else {			?>
		</p>

		<table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
		<tr>
			<td height="50"><strong>No Quote Details Found</strong></td>
		</tr>
		</table>

		<p>

		<?php 
		}
		?>
		</p>

		<br></td>
		</tr>                                           
		</tbody></table>

		</div>

		</td>
	</tr>
	</tbody></table>

	</td>
</tr>
</tbody></table>

</body></html>