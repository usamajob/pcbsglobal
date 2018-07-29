<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from packing_tb where invoice_id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');

	$sqmc = "delete from maincont_packing where packingid='".$_REQUEST['delid']."'";
	$resmc = mysql_query($sqmc) or die('error in mc data');
	echo "<script type='text/javascript'>location.href='manage_packing.php'</script>";
}
if($_REQUEST['dupid'] != "") {
	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM packing_tb WHERE invoice_id= "'.$_REQUEST['dupid'].'"';
	$sqdup2 = "UPDATE  tmptable_1  SET invoice_id= NULL";
	$sqdup3 = 'INSERT INTO packing_tb  SELECT * FROM tmptable_1';
	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';

	

	$sqdup1 = mysql_query($sqdup1);
	$sqdup2 = mysql_query($sqdup2);
	$sqdup3 = mysql_query($sqdup3);
	$last_id = mysql_insert_id();




// get customer from last inserted record
	 $sel_get_customer = "SELECT profile_tb.custid,profile_tb.profid,profile_tb2.reqs,profile_tb2.selectable,profile_tb2.viewable FROM packing_tb LEFT JOIN profile_tb ON packing_tb.customer = profile_tb.custid LEFT JOIN profile_tb2 ON profile_tb.profid=profile_tb2.profid WHERE packing_tb.invoice_id=".$_REQUEST['dupid']." order by profile_tb2.id ASC";
	$sel_get_customer_res = mysql_query($sel_get_customer);
	while($row = mysql_fetch_assoc($sel_get_customer_res)){
		$reqs = addslashes($row['reqs']);
		 $profile_tb3_ins = "INSERT INTO profile_tb3 (invoice_id,custid,profid,reqs,selectable,viewable) VALUES(".$last_id.",".$row['custid'].",".$row['profid'].",'".$reqs."',".$row['selectable'].",'".$row['viewable']."')";
		$profile_tb3_res=mysql_query($profile_tb3_ins);
	}


/*
// duplication alert radio button rest
	$sqdup5 = ' CREATE TEMPORARY TABLE tmptable_2 SELECT * FROM profile_tb WHERE custid= "'.$_REQUEST['dupid'].'"';
	$sqdup6 = 'UPDATE  tmptable_1  SET invoice_id= NULL';
	$sqdup7 = 'INSERT INTO packing_tb  SELECT * FROM tmptable_1';
	$sqdup8 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';*/




	///////////New code
	$duplicate_invoice_id = $last_id;
	$qry_update_duplicate_invoice_date = "UPDATE packing_tb  set podate='".date('m/d/Y')."', pending='No' Where invoice_id=".$duplicate_invoice_id;
	mysql_query($qry_update_duplicate_invoice_date);
	///////end new-code

	$sqdup4 = mysql_query($sqdup4) or die('error in data');

	$sqsc = "select * from packing_items_tb where pid='".$_REQUEST['dupid']."'";
	$resc = mysql_query($sqsc) or die('error in data');

	while($rwsc = mysql_fetch_assoc($resc)) {
		$sqin="insert into packing_items_tb(item, itemdesc, qty2, shipqty, pid) values('".$rwsc['item']."','".$rwsc['itemdesc']."','".$rwsc['qty2']."','".$rwsc['shipqty']."','".$duplicate_invoice_id."')";
		$resin = mysql_query($sqin) or die('error in q');
	}

	$sqmc = "select maincontid from maincont_packing where packingid='".$_REQUEST['dupid']."'";
	$resmc = mysql_query($sqmc) or die('error in mc data');

	while($rwmc = mysql_fetch_assoc($resmc)) {
		$sqin = "insert into maincont_packing ( maincontid, packingid) values('".$rwmc['maincontid']."', '".$duplicate_invoice_id."')";
		$resin = mysql_query($sqin) or die('error in mcq');
	}

	echo "<script type='text/javascript'>location.href='manage_packing.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Packing</title>
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
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
<link href="style_Admin.css" rel="stylesheet" type="text/css">


<script type="text/javascript"> 
var $newJ = jQuery.noConflict();
jQuery(document).ready(function(){

	$newJ("#exampleII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});

	$newJ("#exampleIII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	})
	
});
</script>  
<script type="text/javascript">

function del(id) {
	var answer = confirm ("Do you want to delete the record");

	if(answer) { location.href="manage_packing.php?delid="+id; }
	else { return false; }
}

</script>
<script src="js/jquery.js" type="text/javascript"></script>
</head><body>
<script type="text/javascript">
$(function() {
$(document).keypress(function(event) {
	var ch = String.fromCharCode(event.keyCode || event.charCode);
	switch (ch) {
		case '~': 
		window.location.href = 'http://pcbsglobal.com/luke-new/admin/welcome.php';
		break;
	}
});
});
</script>
<script src="js/jquery.alerts.js" type="text/javascript"></script>
<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center">
<table border="0" cellpadding="0" cellspacing="1" width="1300">
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
<td colspan="2">

<form name="form1" method="get" action="">

	<table class="manageTop" width="500" border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

	  <tr>
		<td height="30" colspan="2"><strong>Search By </strong></td>
	  </tr>

	  	<tr>
			<td width="180" height="30">Start Date</td>
			<td width="300" height="30">
			<input type="text" name="start_date" id="exampleII">
		</td>
		</tr>
											  
		<tr>
		<td width="180" height="30">End Date</td>
					<td width="300" height="30">
					<input type="text" name="end_date"  id="exampleIII">
					<input type="submit" value="submit" name="btncus">
					</td>
				</tr>
	</table>
</form>                                                </td>
</tr>
<!-- <tr><td>

<form name="form2" enctype="multipart/form-data" method="POST" action="">

	<table width="500" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
	  <tr>
		<td height="30" colspan="2"><strong>Upload Form </strong></td>
	  </tr>

	  <tr>
		<td width="180" height="30">Select File</td>
		<td width="300" height="30">
	   <input name="uploaded" id="uploaded" type="file" /><br />
<input type="submit" name="submit11" id="submit11" value="Upload" />
		</td>
	  </tr>
	</table>
</form>

</td>

</tr>-->
<tr>
<td align="center" valign="top" style="line-height: 16px;">
<a href="welcome.php">Welcome To Admin Panel <br />
<br />
<img src="logo-pcb.png" width="189" height="198" border="0" /></a><br /></td>
<td style="line-height: 16px;"><?php
// Paging Code Starts
	// how many rows to show per page 
	$rowsPerPage = 100; 
	
	// by default we show first page 
	$pageNum = 1; 
	//echo "<br>PageNum :  ".$pageNum ;
	
	// if $_GET['page'] defined, use it as page number 
	if(isset($_GET['page']))  { 
		$pageNum = $_GET['page']; 
	} 

	// counting the offset 
	$offset = ($pageNum - 1) * $rowsPerPage; 
$sqs = "select * from packing_tb where year(packing_tb.real_date) = 2017";

if(isset($_REQUEST['btncus'])) {
	$srchc = $_REQUEST['srchc'];

if($_REQUEST['start_date'] != "" && $_REQUEST['end_date'] != ""  ) {
$explode_start_date = explode('/',$_REQUEST['start_date']);
$fixed_start_date = $explode_start_date[2]."-".$explode_start_date[0]."-".$explode_start_date[1];

$explode_end_date = explode('/',$_REQUEST['end_date']);
$fixed_end_date = $explode_end_date[2]."-".$explode_end_date[0]."-".$explode_end_date[1];

$sqs = "select pt.* from data_tb dt inner join packing_tb pt on dt.data_id = pt.customer where dt.c_shortname like '%".$srchc."%' and year(pt.real_date) = 2017 and pt.real_date between '".$fixed_start_date."' and '".$fixed_end_date."'";	



}else if($_REQUEST['end_date'] == "" && $_REQUEST['start_date'] != ""){
$explode_start_date = explode('/',$_REQUEST['start_date']);
$fixed_start_date = $explode_start_date[2]."-".$explode_start_date[0]."-".$explode_start_date[1];

$sqs = "select pt.* from data_tb dt inner join packing_tb pt on dt.data_id = pt.customer where dt.c_shortname like '%".$srchc."%' and year(pt.real_date) = 2017 and pt.real_date >= '".$fixed_start_date."' ";	


}else{
	$sqs = "select pt.* from data_tb dt inner join packing_tb pt on dt.data_id = pt.customer where dt.c_shortname like '%".$srchc."%' and year(pt.real_date) = 2017 ";	
}




	
}
else if(isset($_REQUEST['btnpart'])) {	
	$srch = $_REQUEST['srch'];
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	//$cname = $pieces[2];




	$sqs = "select * from packing_tb where part_no like '%".$pno."%' and year(packing_tb.podate) = 2017";

	/*$ponm =$_REQUEST['srch']-9987;

	$sqs="select * from packing_tb where invoice_id ='".$ponm."'";

	$sqs.=" ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";*/
}
$sqso = "  ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";


if (isset($_POST['submit11'])) {

	$target = "packingpdf/"; 
	$target = $target . basename( $_FILES['uploaded']['name']) ; 
	$ok = 1; 
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
	{
		echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	} 
	else {
		echo "Sorry, there was a problem uploading your file.";
	}
}
// echo $sqs.$sqso;
$res1 = mysql_query($sqs.$sqso, $conn) or die('error in data'.mysql_error());

if(mysql_num_rows($res1) > 0) {
	/*
	$query = "select * from packing_tb";
	//print $query;
	$result  = mysql_query($query) or die('Error, query failed'); 
	$numrows = mysql_num_rows($result);
	*/

	$result  = mysql_query($sqs) or die('Error, query failed'); 
	$numrows = mysql_num_rows($result);

	// how many pages we have when using paging? 
	$maxPage = ceil($numrows/$rowsPerPage); 
	//echo "<br>Maximum Pages : ".$maxPage;
	
	// print the link to access each page 
	$self = $_SERVER['PHP_SELF']; 
	$nav = ''; 
	$querystr = "";
	foreach($_GET as $k => $v) {
		if($k != 'page') $querystr .= '&'.$k.'='.$v;
	}

	for($page = 1; $page <= $maxPage; $page++) { 
		if ($page == $pageNum) { 
			$nav .= " $page ";   // no need to create a link to current page 
		} 
		else { 
			$nav .= " <a href=\"$self?page=$page".$querystr."\">$page</a> "; 
		}         
	} 
	
	// creating previous and next link 
	// plus the link to go straight to 
	// the first and last page 
	
	if ($pageNum > 1) { 
		$page = $pageNum - 1; 
		$prev = " <a href=\"$self?page=$page".$querystr."\">[Prev]</a> "; 
		 
		$first = " <a href=\"$self?page=1".$querystr."\">[First Page]</a> "; 
	}  
	else { 
		$prev  = '&nbsp;'; // we're on page one, don't print previous link 
		$first = '&nbsp;'; // nor the first page link 
	} 
	
	if ($pageNum < $maxPage) { 
		$page = $pageNum + 1; 
		$next = " <a href=\"$self?page=$page".$querystr."\">[Next]</a> "; 
		 
		$last = " <a href=\"$self?page=$maxPage".$querystr."\">[Last Page]</a> "; 
	}  
	else { 
		$next = '&nbsp;'; // we're on the last page, don't print next link 
		$last = '&nbsp;'; // nor the last page link 
	} 
	
	// print the navigation link 

?>
	  <table class="manage" width="900" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:35px;">
		<tr>
		  <td height="30" colspan="5"><font size="3"><strong>Manage Sent Orders</strong></font></td>
		  <td height="30" colspan="5" align="center"><a href="add_packing.php">ADD SLIP</a></td>
		  <td height="30" colspan="3"> <a href="2017_packing_report.php?start_date=<?php echo $_REQUEST['start_date'] ?>&end_date=<?php echo $_REQUEST['end_date'] ?>">Generate Sent Orders Report</a></td>
		</tr>
		<tr>
		  <td height="30" colspan="13" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
		</tr>
		<tr>
		  <td width="56" height="30" align="center"><strong>Slip id </strong></td>
		  <td width="56" height="30" align="center"><strong>Slip # </strong></td>
		  <td width="247" height="30" align="center"><strong>Customer</strong></td>
		  <td width="175" align="center"><strong>Part No </strong></td>
		  <td width="40" align="center"><strong>Rev </strong></td>
		  <td width="107" align="center"><strong>Packing DATE</strong></td>
		  <td width="80" height="30" align="center"><strong>Edit</strong></td>
		  <td width="100" height="30" align="center"><strong>Download PDF</strong></td>
		  <td width="107" height="30" align="center"><strong>VIEW PDF</strong></td>
		  <td width="100" height="30" align="center"><strong>Download DOC</strong></td>
		  <td width="76" height="30" align="center"><strong>Delete</strong></td>
		  <td width="76" height="30" align="center"><strong>Duplicate</strong></td>
		  <td width="50" height="30" align="center"><strong>Invoiced</strong></td>
		</tr>
		<?php 
	  while($rwc = mysql_fetch_assoc($res1)) { ?>
		<tr>
		  <td height="30" align="center"><?php echo $rwc['invoice_id'];?>&nbsp;</td>
		  <td height="30" align="center"><?php echo $rwc['invoice_id']+9987;?>&nbsp;</td>

		  <td height="30" align="center">
		  <?php
			  $sqcc = "select * from data_tb where data_id='".$rwc['customer']."'";

			$rescc = mysql_query($sqcc) or die('error in data');

			while($rwcc = mysql_fetch_assoc($rescc)) {
				echo $rwcc['c_shortname'];
			} 
		?>
		</td>
		  <td align="center"><?php echo $rwc['part_no'];?></td>
		  <td align="center"><?php echo $rwc['rev'];?></td>
		  <td align="center"><?php echo $rwc['podate'];?></td>
		  <td height="30" align="center"><a href="edit_packing.php?id=<?php echo $rwc['invoice_id'];?>">Edit</a></td>
		  <td height="30" align="center"><a href="download-pdf3.php?id=<?php echo $rwc['invoice_id'];?>">Download Pdf</a></td>
		  <td height="30" align="center"><a target="_blank" href="download-pdf3.php?id=<?php echo $rwc['invoice_id'];?>&amp;oper=view">VIEW Pdf</a></td>
		  <td height="30" align="center"><a href="download-doc3.php?id=<?php echo $rwc['invoice_id'];?>">Download doc</a></td>
		  <td height="30" align="center"><a href="#" onclick="del('<?php echo $rwc['invoice_id'];?>');">Delete</a></td>
		  <td height="30" align="center"><a href="manage_packing.php?dupid=<?php echo $rwc['invoice_id'];?>">Duplicate</a></td>
		  <td align="center"><input type="checkbox" name="" id="<?php echo $rwc['invoice_id']; ?>"  <?php echo ($rwc['pending']=='Yes')? "checked=\"checked\"" : ""; ?>  value="<?php echo $rwc['invoice_id']; ?>" title="is processed" onclick="doAction(this.value, this.checked);"/></td>
	</tr>
	<?php 
	}
	?>
	</table>
	<div id="display_area"></div>

	<!-- new update code javascript function 4/1/2016 -->
	<script>
	
		var xmlhttp

		function doAction(record_id, status) {		

			if(status == true){
				//alert('selected so should be checked here after');
				addCheckMark(record_id,status);
			}
			else {
				//alert('de selected so should NOT be checked here after');

				jConfirm('Do you want to unmark the pending invoice?', 'Confirmation Dialog', function(answer) {
				if(answer) addCheckMark(record_id, status);
				else document.getElementById(record_id).checked = true;
				});
			}
		}

		//AJAX function starts here

		function addCheckMark(record_id,status) {

			xmlhttp = GetXmlHttpObject();
			if (xmlhttp == null) {
				alert ("Your browser does not support AJAX!");
				return;
			}
			var url = "ajax_add_check_mark.php?frm=packing";
			url = url + "&record_id=" + record_id;
			url = url + "&status=" + status;			
			url = url + "&sid="+Math.random();
			xmlhttp.onreadystatechange = stateChanged;
			xmlhttp.open("post", url, true);
			xmlhttp.send(null);		
		}

		function stateChanged() {
			if (xmlhttp.readyState == 4) {
				document.getElementById("display_area").innerHTML = xmlhttp.responseText;  }
		}	


		function GetXmlHttpObject() {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				return new XMLHttpRequest();
			}
			if (window.ActiveXObject) {
				// code for IE6, IE5
				return new ActiveXObject("Microsoft.XMLHTTP");
			}
			return null;
		}
		//AJAX Function ends here	
		
		</script>	
		<!-- end of new javascript code  -->  
	<p>
	<?php 
} // end of if
else { ?>
  </p>
  <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >
	<tr>
	  <td height="50"><strong>Packing Slip is not found</strong></td>
	</tr>
  </table>
  <p>
<?php 
}
?>
</p></td>
</tr>                                           
</tbody></table>
</div></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody></table>

</body></html>