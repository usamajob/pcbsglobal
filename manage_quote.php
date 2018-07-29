<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php
unset($_SESSION['refid']);//unset alerts refid

if($_REQUEST['delid']!="") {
	$sqdel = 'delete from order_tb where ord_id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}

if($_REQUEST['dupid'] != "") {

	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM order_tb WHERE ord_id= "'.$_REQUEST['dupid'].'"';

	$sqdup2='UPDATE  tmptable_1  SET ord_id= NULL';
	$sqdup3='INSERT INTO order_tb  SELECT * FROM tmptable_1';
	$sqdup4='DROP TEMPORARY TABLE IF EXISTS tmptable_1';

	$sqdup1 = mysql_query($sqdup1);
	$sqdup2 = mysql_query($sqdup2);
	$sqdup3 = mysql_query($sqdup3);

	///////////New code
	$duplicate_order_id = mysql_insert_id();

	$qry_update_duplicate_order_date="UPDATE order_tb  set ord_date='".date('m/d/Y')."' Where ord_id=".$duplicate_order_id;

	mysql_query($qry_update_duplicate_order_date);
	///////end new-code

	$sqdup4 = mysql_query($sqdup4)or die('error in data');
	echo "<script language='javascript'>location.href='manage_quote.php'</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Quotes</title>
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

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>

<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 

<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function() {
	$j('#srch').autocomplete({source:'getqtsrch.php', minLength:1});
	$j('#srchc').autocomplete({source:'getqtsrchc.php', minLength:1});

	$j('.dalerts').hover(function(e) {
		var aid = $j(this).attr('id').substring(1);
		$j('#div_'+aid).show();
	});

	$j('.dalerts').mouseleave(function(){
		var aid = $j(this).attr('id').substring(1);
		$j('#div_'+aid).hide();
	});
});

</script> 
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script type="text/javascript">
function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href = "manage_quote.php?delid=" + id;
	}
	else {
		return false;
	}
}
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body>

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

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td align="center">

<table width="1300" border="0" cellpadding="0" cellspacing="1" height="20px">
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
		<td colspan="2">
		<form name="form1" method="get" action="">

	<table class="manageTop" width="500" border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
	<tr>
		<td height="30" colspan="2"><strong>Search By </strong></td>
	</tr>

	<tr>
		<td width="180" height="30">Search BY Part Number </td>
		<td width="300" height="30">
		<input type="text" name="srch"  id="srch">
		<input type="submit" value="submit" name="btnpart">
		</td></tr>

		<tr>
			<td width="180" height="30">Search BY Customer Name </td>
			<td width="300" height="30">
			<input type="text" name="srchc"  id="srchc">
			<input type="submit" value="submit" name="btncus"></td>
		</tr>
		</table>
		</form>
	</td>
	</tr>

	<!-- <tr>
	<td>
	<form name="form2" enctype="multipart/form-data" method="POST" action="">
	<table align="center" width="500" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
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
	</tr> -->								
								
	<tr>
		<td align="center" valign="top" style="line-height: 16px;">
		<a href="welcome.php">Welcome To Admin Panel <br />
		<br />
		<img src="logo-pcb.png" width="189" height="198" border="0" /></a><br /></td>

		<td style="line-height: 16px;">
		<?php

		/* Fetching part_no + rev alerts */
		$alert_arr = array();
		$alert_arr2 = array();
		//mysql_query("delete from alerts_tb where part_no='' and atype='p'");
		//mysql_query("delete from alerts_tb where custid='0' and atype='c'");
		$aquery = "select * from alerts_tb where part_no <> '' and atype='p' and instr(viewable, 'quo') > 0 and alert <> '' order by part_no, rev";
		$ares = mysql_query($aquery) or die();
		if($ares) {
			if(mysql_num_rows($ares) > 0){
				while($arow = mysql_fetch_assoc($ares)) {
					$alert_arr[trim($arow['customer'])."_".trim($arow['part_no'])."_".trim($arow['rev'])][] = $arow['alert'];
					//$alert_arr[$arow['part_no']][] = $arow['alert'];
				}
			}
		}
		/*$aquery = "select * from alerts_tb where custid <> '0' and atype='c' ";
		$ares = mysql_query($aquery) or die();
		if($ares) {
			if(mysql_num_rows($ares) > 0) {
				while($arow = mysql_fetch_assoc($ares)) 
					$alert_arr2[$arow['custid']][] = $arow['alert'];
			}
		}
		//echo "<pre>";	print_r($alert_arr2);	echo "</pre>";*/
		/**********************************/

		// Paging Code Starts
		// how many rows to show per page 

		$rowsPerPage = 100; 

		// by default we show first page 
		$pageNum = 1; 

		//echo "<br>PageNum :  ".$pageNum ;
		// if $_GET['page'] defined, use it as page number 

		if(isset($_GET['page'])) { 
			$pageNum = $_GET['page']; 
		} 
		// counting the offset 
		$offset = ($pageNum - 1) * $rowsPerPage; 

		$sqs = "select * from order_tb";
		$sqs .= " ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

		if(isset($_REQUEST['btncus'])) {
			$srchc =$_REQUEST['srchc'];
			$sqs = "select * from order_tb where cust_name like '%".$srchc."%'";
			$sqs .= " ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";
		}
		else if(isset($_REQUEST['btnpart'])) {

			$srch = $_REQUEST['srch'];
			$pieces = explode("_", $_REQUEST['srch']);
			$pno = $pieces[0]; // piece1
			$cname = $pieces[2];

			$sqs = "select * from order_tb where part_no like '%".$pno."%'";
			$sqs .= " ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";
			/*echo $sqs;
			exit;*/
		}

		if($_REQUEST['srch2'] != "") {
			$srch = $_REQUEST['srch2'];
			$sqs = "select * from order_tb where part_no like '%".$srch."%' or cust_name like '%".$srch."%'";
			$sqs .= " ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

			/*echo $sqs;
			exit;*/
		}

		if (isset($_POST['submit11'])) {

			$target = "quotationpdf/"; 
			$target = $target . basename( $_FILES['uploaded']['name']) ; 
			$ok = 1; 
			if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
				echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
			} 
			else {
				echo "Sorry, there was a problem uploading your file.";
			}
		}

		$res1 = mysql_query($sqs, $conn) or die('error in data'.mysql_error());

		if(mysql_num_rows($res1) > 0) {

			$query = "select * from order_tb";
			$result  = mysql_query($query) or die('Error, query failed');
			$row     = mysql_fetch_array($result, MYSQL_ASSOC); 

			//$numrows = $row['numrows'];

			$numrows = mysql_num_rows($result);

			// No of rows u need to assign
			//$numrows = 3; 
			//echo "<br>Numrows : ".$numrows ;

			// how many pages we have when using paging? 
			$maxPage = ceil($numrows/$rowsPerPage); 

			//echo "<br>Maximum Pages : ".$maxPage;

			// print the link to access each page 
			$self = $_SERVER['PHP_SELF']; 

			$nav = ''; 

			for($page = 1; $page <= $maxPage; $page++) { 

				if ($page == $pageNum) { 
					$nav .= " $page ";   // no need to create a link to current page 
				} 
				else { 
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
			}  
			else  { 
				$prev  = '&nbsp;'; // we're on page one, don't print previous link 
				$first = '&nbsp;'; // nor the first page link 
			} 			

			if ($pageNum < $maxPage)  {
				$page = $pageNum + 1; 
				$next = " <a href=\"$self?page=$page\">[Next]</a> "; 
				$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 
			}  
			else  { 
				$next = '&nbsp;'; // we're on the last page, don't print next link 
				$last = '&nbsp;'; // nor the last page link
			} 		

			// print the navigation link 

?>
		<table class="manage" width="950" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:35px;">
		<tr>
			<td height="30" colspan="6"><font size="3"><strong>MANAGE QUOTE</strong></font></td>
			<td height="30" colspan="6" align="center"><a href="quote.php">ADD QUOTE</a></td>
		</tr>
		<tr>
			<td height="30" colspan="12" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
		</tr>
		<tr>
			<td width="56" height="30" align="center"><strong>ID</strong></td>
			<td width="70" height="30" align="center"><strong>Quote #</strong></td>
			<td width="207" height="30" align="center"><strong>Customer Name</strong></td>
			<td width="150" align="center"><strong>Part No </strong></td>
			<td width="40" align="center"><strong>Rev </strong></td>
			<td width="107" align="center"><strong>Added Date</strong></td>
			<td width="107" align="center"><strong>EDIT</strong> </td>
			<td width="107" align="center"><strong>Download PDF</strong></td>
			<td width="107" align="center"><strong>VIEW PDF</strong></td>
			<td width="135" align="center"><strong>Download DOC</strong></td>
			<td width="76" height="30" align="center"><strong>Delete</strong></td>
			<td width="76" height="30" align="center"><strong>Duplicate</strong></td>
		</tr>
		<?php 

		while($rwc = mysql_fetch_array($res1)) {
			//print_r($alert_arr);
		?>
		<tr>
			<td height="30" align="center"><?php echo $rwc['ord_id'];?>&nbsp;</td>
			<td height="30" align="center"><?php echo $rwc['ord_id']+10000;?>&nbsp;</td>
			<td height="30" align="center"><?php 
			$csql = "select c_shortname, data_id from data_tb where c_name='".$rwc['cust_name']."' and c_name <> ''";
			$cres = mysql_query($csql) or die(mysql_error());
			$crow = mysql_fetch_assoc($cres);

			/*$aflag2 = 0;
			if(count($alert_arr2) > 0) {					
				echo "<div style='position: relative; clear: both'>";	

				if( array_key_exists( trim($crow['data_id']), $alert_arr2) ) {
					$aflag2 = 1;
					echo "<div class='ttip_overlay' id='div_c".$rwc['ord_id']."' style='z-index: 1000; padding: 0 10px 10px; background: #efe; border: 1px solid #369; position: absolute; top:-10px; left: 150px; display: none; text-align: left; width: 200px'><h3>Customer Alerts</h3>";
					$actr = 1;
					foreach($alert_arr2[$crow['data_id']] as $ak => $av) 
						echo ($actr++).".&nbsp;".$av."<br>";

					echo "</div>";
				}
				echo "</div>";
			}

			if($aflag2 == 1)
				echo "<a href='javascript:void(0)' class='dalerts' id='cc".$rwc['ord_id']."'>";*/

			echo $crow['c_shortname'];

			if($aflag2 == 1) echo "</a>";

			?></td>

			<td align="center"><?php 

			$aflag = 0;
			
			if(count($alert_arr) > 0) {					
				echo "<div style='position: relative; clear: both'>";
				
				if( array_key_exists(trim($rwc['cust_name'])."_". trim($rwc['part_no'])."_".trim($rwc['rev']), $alert_arr ) ) {

				//if( array_key_exists( trim($rwc['part_no']), $alert_arr) ) {
					$aflag = 1;
					echo "<div class='ttip_overlay' id='div_".$rwc['ord_id']."' style='z-index: 1000; padding: 0 10px 10px; background: #fee; border: 1px solid #369; position: absolute; top:-10px; left: 150px; display: none; text-align: left; width: 200px'><h3>Alerts</h3>";
					//<a href='javascript:void(0)'  class='close_trig' style='color: #c00; float: right'>Close</a><br>
					$actr = 1;
					foreach($alert_arr[trim($rwc['cust_name'])."_".trim($rwc['part_no'])."_".trim($rwc['rev'])] as $ak => $av) 
						echo ($actr++).".&nbsp;".$av."<br>";

					echo "</div>";
				}
				echo "</div>";
			}

			if($aflag == 1)
				echo "<a href='javascript:void(0)' class='dalerts' id='p".$rwc['ord_id']."'>";

			echo $rwc['part_no'];

			if($aflag == 1)
				echo "</a>"; 

			?></td>

			<td align="center"><?php 
			/*if($aflag == 1)
				echo "<a href='javascript:void(0)' class='dalerts' id='r".$rwc['ord_id']."'>";*/

			echo $rwc['rev'];

			/*if($aflag == 1)
				echo "</a>"; */

			?></td>

			<td align="center"><?php echo $rwc['ord_date'];?></td>
			<td align="center"><a href="edit_quote.php?id=<?php echo $rwc['ord_id'];?>">EDIT</a></td>
			<td align="center"><a href="download-pdf.php?id=<?php echo $rwc['ord_id'];?>">Download PDF</a></td>
			<td align="center"><a target="_blank" href="download-pdf.php?id=<?php echo $rwc['ord_id'];?>&amp;oper=view">VIEW PDF</a></td>
			<td align="center"><a href="download-doc.php?id=<?php echo $rwc['ord_id'];?>">Download DOC</a></td>
			<!-- <td height="30" align="center"><a href="view_detail.php?id=<?php // echo $rwc['ord_id'];?>">View</a></td>-->
			<td height="30" align="center"><a href="#" onclick="del('<?php echo $rwc['ord_id'];?>');">Delete</a></td>
			<td height="30" align="center"><a href="manage_quote.php?dupid=<?php echo $rwc['ord_id'];?>">Duplicate</a></td>
		</tr>
		<?php 
	  }

	  ?>
	  <tr>
			<td height="30" colspan="12" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
		</tr>
	  </table>
	  <p>
		<?php 
}// end of if

else {

?>
		</p>
		<table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
		<tr>
			<td height="50"><strong>No Quote NUMBER Found</strong></td>
		</tr>
		</table>
		<p>
		<?php 
}

?>
		</p></td>
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