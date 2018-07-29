<?php session_start(); 
require_once('conn.php'); 
$ftype = isset($_GET['ftype']) ? $_GET['ftype'] : "";
$custid = isset($_GET['custid']) ? $_GET['custid'] : "";
$custname = isset($_GET['custname']) ? $_GET['custname'] : "";

if($ftype == 'edit' || $ftype == 'purchase') {
	if($custid != "") {
		$cid = explode('|', $custid);
		$query = "select * from alerts_tb where (custid='".$cid[0]."' and atype='c' )";
	}
	elseif($custname != "") {
		$query = "select at.* from alerts_tb at inner join data_tb dt on at.custid=dt.data_id where dt.c_name='".$custname."' and at.atype='c' ";
	}
	else 
		$query = "select * from alerts_tb where (part_no='".$_GET['pno']."' and atype='p')"; //and rev='".$_GET['rev']."'
}
else {
	if($custid != "") {
		$cid = explode('|', $custid);
		$query = "select * from alerts_tb where ((custid='".$cid[0]."'  and custid <> '0') or (refid='".$_GET['refid']."') and atype='c')";
	}
	else
		$query = "select * from alerts_tb where ((part_no='".$_GET['pno']."'  and part_no <> '') or (refid='".$_GET['refid']."') and atype='p')"; //and rev='".$_GET['rev']."'
}
//echo $query; exit;
$result = mysql_query($query) or die();

if(mysql_num_rows($result) < 1 && $ftype == 'purchase') { // 
	echo "norecords"; // for order purchase
}
else {
	if($custid != "" || $custname != "") { //Customer alerts
		?>
<script type="text/javascript">
<!--
var $ = jQuery.noConflict();
var ftype = "<?php echo $ftype ?>";
var custid = "<?php echo $custid ?>";
var custname = "<?php echo $custname ?>";
var pcust = "";
var qstring2 = "";

if(ftype == 'edit') {	
	qstring2 = "custid="+ $.trim($('#prevcust').val())+ "&refid="+ "<?php echo $_SESSION['refid'] ?>"+"&ftype=edit";
	pcust = $.trim($('#prevcust').val());
}
else {
	if(custname != "")
		qstring2 = "custname="+ $.trim($('#customer').val())+ "&ftype=purchase";
	else
		qstring2 = "custid=" + $.trim($('#txtcust').val().replace('+','|')) + "&refid=" + "<?php echo $_SESSION['refid'] ?>"; 
}

function geturl(addr) {  
	var r = $.ajax({  
	 type: 'GET',  url: addr,  async: false  
	}).responseText;  return r;  
}  

$(document).ready(function() {

	$('#closealrt2').click(function(e) {
		if(flag3 > 1) {
			flag3 = flag3 - 1; $(this).parent().hide();
		}
		else  
			$('#form1').submit(); // form submit on close
	});		

	$('.remalert2').click(function(e){
		$.get("updatealerts.php", { aid: $(this).attr('id'), utype: 'del' }, function()  {
			var response = geturl("getalerts.php?"+qstring2);
			if(response == 'norecords') {
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$('#alertDiv2').hide();
				}
				else  
					$('#form1').submit(); //purchase form submit
			}
			else {			
				$('#alertDiv2').html(response); 
				$('#alertDiv2').show();	
			}
		});
	});
	
	//for ftype != 'purchase'
	$('#addalert2').click(function(e){		
		$.get("updatealerts.php", { atext: $.trim($('#txtalert2').val()), utype: 'addc', refid: "<?php echo $_SESSION['refid'] ?>", prevcust: pcust }, function() {		$('#alertDiv2').html(geturl("getalerts.php?"+qstring2)); 
		});
	});	
});
//-->
</script>
<?php
	echo "<a href='javascript:void(0)' id='closealrt2' style='color:#c00; float:right'>Close</a><br>";
	echo "<h2>Customer Alerts</h2>";
	if(mysql_num_rows($result) > 0) {
		$i = 1;
		while($row = mysql_fetch_assoc($result)) {
			echo ($i++).". ".$row['alert']."&nbsp;<a id='".$row['id']."' class='remalert2'>remove</a><br>";
		}
	}
	if($ftype != 'purchase') {	
		echo "<br><input type='text' name='txtalert2' id='txtalert2' size='30'>&nbsp;&nbsp;<input type='button' id='addalert2' value='Add Alert'>";
	}
}
else {
?>
<script type="text/javascript">
<!--
var $ = jQuery.noConflict();
var ftype = "<?php echo $ftype ?>";
var qstring = "";
var ppno = "";
var prev = "";

if(ftype == 'edit') {
		qstring = "pno="+ $.trim($('#prevpno').val())+ "&refid="+ "<?php echo $_SESSION['refid'] ?>"+"&ftype=edit";
		//+ "&rev="+ $.trim($('#prevrev').val())
		ppno = $.trim($('#prevpno').val());
		//prev = $.trim($('#prevrev').val());
}
else if(ftype == 'purchase') {
	qstring = "pno=" + $.trim($('#part_no').val()) + "&ftype=purchase";
	//+ "&rev=" + $.trim($('#rev').val())
}
else {
	qstring = "pno=" + $.trim($('#txtpno').val()) + "&refid=" + "<?php echo $_SESSION['refid'] ?>"; 
}

function geturl(addr) {  
	var r = $.ajax({  
	 type: 'GET',  url: addr,  async: false  
	}).responseText;  return r;  
}  

$(document).ready(function() {

	$('#closealrt').click(function(e) {
		if(flag3 > 1) {
			flag3 = flag3 - 1; $(this).parent().hide();
		}
		else  
			$('#form1').submit(); // form submit on close
	});	

	$('.remalert').click(function(e){
		$.get("updatealerts.php", { aid: $(this).attr('id'), utype: 'del' }, function()  {
			var response = geturl("getalerts.php?"+qstring);
			if(response == 'norecords') {
				if(flag3 > 1) {
					flag3 = flag3 - 1;
					$('#alertDiv').hide();					
				}
				else  
					$('#form1').submit(); //purchase form submit
			}
			else {
				$('#alertDiv').html(response); 
				$('#alertDiv').show();	
			}
		});
	});	

	$('#addalert').click(function(e){
		$.get("updatealerts.php", { atext: $.trim($('#txtalert').val()), utype: 'addp', refid: "<?php echo $_SESSION['refid'] ?>", prevpno: ppno}, function() { //, prevrev: prev
		$('#alertDiv').html(geturl("getalerts.php?"+qstring)); 
		});		
	});	

});
//-->
</script>
<?php

	echo "<a href='javascript:void(0)' id='closealrt' style='color:#c00; float:right'>Close</a><br>";
	echo "<h2>Part no Alerts</h2>";

	if(mysql_num_rows($result) > 0) {
		$i = 1;
		while($row = mysql_fetch_assoc($result)) {
			echo ($i++).". ".$row['alert']."&nbsp;<a id='".$row['id']."' class='remalert'>remove</a><br>";
		}
	}
	if($ftype != 'purchase') {	
		echo "<br><input type='text' name='txtalert' id='txtalert' size='30'>&nbsp;&nbsp;<input type='button' id='addalert' value='Add Alert'>";
	}
}


}

?>