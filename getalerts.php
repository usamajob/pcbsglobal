<?php 
session_start(); 
require_once('conn.php'); 
$ftype = isset($_GET['ftype']) ? $_GET['ftype'] : "";
$mode = isset($_GET['mode']) ? $_GET['mode'] : "";
$txtcust = trim($_GET['customer']);

/*if($ftype == 'quo' || $ftype == 'po') {
	if($mode == 'edit') {
		//Updating alerts with new customer, part_no and rev
		if( trim($_GET['prevpno']) != trim($_GET['pno']) || trim($_GET['prevrev']) != trim($_GET['rev']) || trim($_GET['prevcust']) != $txtcust ) { 
			$asql = "insert into alerts_tb (customer, part_no, rev, alert, atype, viewable) select '".$txtcust."', '".trim($_GET['pno'])."', '".trim($_GET['rev'])."', alert, atype, viewable from alerts_tb b where b.customer='".trim($_GET['prevcust'])."' and b.part_no='".trim($_GET['prevpno'])."' and b.rev= '".trim($_GET['prevrev'])."' and b.atype='p'";
			$ares = mysql_query($asql);
		}
	}
}*/

if($ftype == 'pac') {
	//for packing slips data_id is passed as customer
	$query = "select c_name from data_tb where data_id = '".$txtcust."'";
	$presult = mysql_query($query) or die();
	if(mysql_num_rows($presult) > 0) {
		$prow = mysql_fetch_assoc($presult);
		$txtcust = $prow['c_name'];
	}
}

// $query = "select * from alerts_tb where ( ( customer='".$txtcust."' and part_no='".$_GET['pno']."' and rev='".$_GET['rev']."') or (refid='".$_SESSION['refid']."' and refid <> '') ) and atype='p' and instr(viewable, '".$_REQUEST['ftype']."') > 0 and trim(alert) <> '' order by frm, id";

$query = "select * from alerts_tb where  customer='".$txtcust."' and part_no='".$_GET['pno']."' and rev='".$_GET['rev']."' order by frm, id";
 //echo $query; 
$result = mysql_query($query) or die();

if(mysql_num_rows($result) < 1 && $ftype != 'quo' && $ftype != 'po' ) { echo "norecords"; }
else {
?>
<script type="text/javascript">
<!--
var $ = jQuery.noConflict();
var ftype = "<?php echo $ftype ?>";
var qstring = ""; 
var pno = "<?php echo isset($_GET['pno']) ? $_GET['pno'] : '' ?>";
var rev = "<?php echo isset($_GET['rev']) ? $_GET['rev'] : '' ?>"; 
var cust = "<?php echo isset($txtcust) ? $txtcust : '' ?>";

if(ftype == 'quo') {
	var uid = document.getElementById("txtcust").value;
	var uid2 = uid.split("+");
	qstring = "customer=" + uid2[1] + "&pno=" + $.trim($('#txtpno').val()) + "&rev=" + $.trim($('#txtrev').val()) + "&ftype="+ftype;	
}
if(ftype == 'po') {
	qstring = "customer=" + $.trim($('#customer').val()) + "&pno=" + $.trim($('#part_no').val()) + "&rev=" + $.trim($('#rev').val()) + "&ftype="+ftype;	
}

function geturl(addr) {  
	var r = $.ajax({ type: 'GET', url: addr, async: false  
	}).responseText; return r;  
}  

$(document).ready(function() {
	$('#closealrt').click(function(e) {
		if(flag3 > 1) {
			flag3 = flag3 - 1; $(this).parent().hide();
		}
		else $('#form1').submit(); // form submit on close
	});

	$('.editalert').click(function(e){
		var aid = $(this).attr('id').substring(1);
		$('#d'+aid).hide();
		$('#b'+aid).show();
	});

	$('.remalert').click(function(e){
		$.get("updatealerts.php", { aid: $(this).attr('id'), utype: 'del' }, function()  {
			var response = geturl("getalerts.php?"+qstring);
			if(response == 'norecords') {
				$('#form1').submit();
			}
			else { $('#alertDiv').html(response); 
				$('#alertDiv').show();	
			}
		});
	});	

	$('#addalert').click(function(e) {
		if($.trim($('#txtalert').val()) == '') alert('Add alert text');
		else { 
			$.get("updatealerts.php", { atext: $.trim($('#txtalert').val()), utype: 'add', prevcust: cust, prevpno: pno, prevrev: rev, ftype: ftype }, function() {
				$('#alertDiv').html(geturl("getalerts.php?" + qstring)); 
			});
		}
	});	

	$('.savealert').click(function(e) {
		var aid1 = $(this).attr('id').substring(1);

		if($.trim($('#a'+aid1).val()) == '') alert('Add alert text');
		else { 
			$.get("updatealerts.php", {aid: aid1,  atext: $.trim($('#a'+aid1).val()), utype: 'edit' }, function() {
				$('#alertDiv').html(geturl("getalerts.php?" + qstring)); 
			});
		}
	});	

});
//-->
</script>
<?php
	echo "<a href='javascript:void(0)' id='closealrt' style='color:#c00; float:right'>Close</a><br>";
	echo "<h2>Part no Alerts</h2>";

	if(mysql_num_rows($result) > 0) {
		$i = 1;
		$from = '';
		while($row = mysql_fetch_assoc($result)) {
			if($from != $row['frm'] && $row['frm'] == 'po')
				echo '<h3>--- Purchase order alerts ---</h3>';

			echo "<div id='b".$row['id']."' style='display: none'>".($i).". <input type='text' name='alertxt' 			value='".$row['alert']."' id='a".$row['id']."' size='30' maxlength='250'>&nbsp;&nbsp;<input type='button' id='s".$row['id']."' class='savealert' value='Save Alert'></div>
			<div id='d".$row['id']."'>".($i++).". ".$row['alert'].($ftype == 'quo' || $ftype == 'po' ? "&nbsp;<a id='e".$row['id']."' class='editalert'>edit</a>&nbsp;/&nbsp;<a id='".$row['id']."' class='remalert'>remove</a>" : "")."</div>";
			$from = $row['frm'];
		}
	}
	
	if($ftype == 'quo' || $ftype == 'po') {
		echo "<br><input type='text' name='txtalert' id='txtalert' size='30' maxlength='250'>&nbsp;&nbsp;<input type='button' id='addalert' value='Add Alert'>";
	}
}

?>