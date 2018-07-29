<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from invoice_tb where invoice_id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}

if($_REQUEST['dupid'] != "") {

	$sqdup1='CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM invoice_tb WHERE invoice_id= "'.$_REQUEST['dupid'].'"';

	$sqdup2='UPDATE  tmptable_1  SET invoice_id= NULL, invo_id=NULL';
	$sqdup3='INSERT INTO invoice_tb  SELECT * FROM tmptable_1';
	$sqdup4='DROP TEMPORARY TABLE IF EXISTS tmptable_1';

	/*$sqdel='insert into order_tb select * from order_tb where ord_id="'.$_REQUEST['dupid'].'"';
	*/
	$sqdup1 = mysql_query($sqdup1) or die('error in data 1');
	$sqdup2 = mysql_query($sqdup2) or die('error in data 2');
	$sqdup3 = mysql_query($sqdup3) or die('error in data 3');
	///////////New code
	$duplicate_invoice_id = mysql_insert_id();

	$qry_update_duplicate_invoice_date="UPDATE invoice_tb  set podate='".date('m/d/Y')."' Where invoice_id=".$duplicate_invoice_id;
	mysql_query($qry_update_duplicate_invoice_date);
	///////end new-code

	$sqdup4 = mysql_query($sqdup4) or die('error in data 4');

	$sqsc = "select * from invoice_items_tb where pid='".$_REQUEST['dupid']."'";
	$resc = mysql_query($sqsc) or die('error in data');

	while($rwsc = mysql_fetch_array($resc)) {
		$sqin="insert into invoice_items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$rwsc['item']."','".$rwsc['itemdesc']."','".$rwsc['qty2']."','".$rwsc['uprice']."','".$rwsc['tprice']."','".$duplicate_invoice_id."')";
		$resin=mysql_query($sqin) or die('error in q');
	}

	echo "<script language='javascript'>location.href='manage_invoice.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Invoice</title>
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
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	jQuery(document).ready(function(){
		$j('#srch').autocomplete({source:'getinvsrch.php', minLength:1});
		$j('#srchc').autocomplete({source:'getinvsrchc.php', minLength:1});
	});

</script> 
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script type="text/javascript">

function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href="manage_invoice.php?delid="+id;
	}
	else 	return false;
}

</script>
<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
<script src="js/jquery.js" type="text/javascript"></script>
</head><body>
<script type="text/javascript">
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': 
			window.location.href = 'welcome.php';
			break;
        }
    });
});
</script>
<!--  Core files -->
<script src="js/jquery.alerts.js" type="text/javascript"></script>
<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center">
<table  border="0" cellpadding="0" cellspacing="1" width="1300">
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
	<td width="180" height="30">Search BY Part Number</td>
	<td width="300" height="30">
	<input type="text" name="srch" id="srch">
	<input type="submit" value="submit" name="btnpart"></td>
  </tr>

  <tr>
	<td width="180" height="30">Search BY Customer Name</td>
	<td width="300" height="30">
	<input type="text" name="srchc"  id="srchc">
	<input type="submit" value="submit" name="btncus"></td>
  </tr>

</table>
</form>         </td>
</tr>

<!-- <tr>
<td>
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
</tr> -->
<tr>
<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br />
<br />
<img src="logo-pcb.png" width="189" height="198" border="0" /></a><br />
<br></td>
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

$sqs = "select * from invoice_tb";
$sqs .= " ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";

if( isset($_GET['hidden']) && $_GET['hidden'] == '1') {
	$sqs = "select * from invoice_tb where status='hide'";
	$sqs .= " ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";
}
if(isset($_REQUEST['btncus'])) {
	$srchc =$_REQUEST['srchc'];
	$sqs = "select * from invoice_tb where customer='".$srchc."'";
	$sqs .= " ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";
}
else if(isset($_REQUEST['btnpart'])) {	
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	$cname = $pieces[2];

	$sqs="select * from invoice_tb where part_no ='".$pno."'  and customer='".$cname."'";
	$sqs.=" ORDER BY invoice_id desc LIMIT $offset, $rowsPerPage ";
}

if (isset($_POST['submit11'])) {

	$target = "invoicepdf/"; 
	$target = $target . basename( $_FILES['uploaded']['name']) ; 
	$ok=1; 
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
	{
		echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	} 
	else {
		echo "Sorry, there was a problem uploading your file.";
	}
}

$res1 = mysql_query($sqs,$conn) or die('error in data'.mysql_error());

if(mysql_num_rows($res1) > 0) {
//$rw=mysql_fetch_array($res);

$query = "select * from invoice_tb";


//print $query;
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
	$txtcname=$_REQUEST['txtcname'];
	$self = $_SERVER['PHP_SELF']; 
	$nav = ''; 
	for($page = 1; $page <= $maxPage; $page++) { 
		if ($page == $pageNum)  { 
			$nav .= " $page ";   // no need to create a link to current page 
		} 
		else 
		{ 
			$nav .= " <a href=\"$self?page=$page&txtcname=$txtcname\">$page</a> "; 
		}         
	} 
						
	// creating previous and next link 
	// plus the link to go straight to 
	// the first and last page 
	
	if ($pageNum > 1) { 
		$page = $pageNum - 1; 
		$prev = " <a href=\"$self?page=$page&txtcname=$txtcname\">[Prev]</a> "; 
		 
		$first = " <a href=\"$self?page=1&txtcname=$txtcname\">[First Page]</a> "; 
	}  
	else  { 
		$prev  = '&nbsp;'; // we're on page one, don't print previous link 
		$first = '&nbsp;'; // nor the first page link 
	} 
	
	if ($pageNum < $maxPage) { 
		$page = $pageNum + 1; 
		$next = " <a href=\"$self?page=$page&txtcname=$txtcname\">[Next]</a> "; 
		 
		$last = " <a href=\"$self?page=$maxPage&txtcname=$txtcname\">[Last Page]</a>"; 
	}  
	else { 
		$next = '&nbsp;'; // we're on the last page, don't print next link 
		$last = '&nbsp;'; // nor the last page link 
	} 
	
	// print the navigation link 	

?>
	  <table class="manage" width="900" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:35px;">
		<tr>
		  <td height="30" colspan="4"><font size="3"><strong>MANAGE INVOICE</strong></font></td>
		  <td height="30" colspan="3" align="center"><a href="add_invoice.php">ADD INVOICE</a></td>
		  <td height="30" colspan="6"> <a href="manage_invoice.php">CLEAR SEARCH FILTERS</a></td>
		</tr>
		<tr>
		  <td height="30" colspan="13" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
		</tr>
		
			
		
		
		
		<tr>
		  <td width="56" height="30" align="center"><strong>Inv id </strong></td>
		  <td width="56" height="30" align="center"><strong>Inv # </strong></td>
		  <td width="247" height="30" align="center"><strong>Customer</strong></td>
		  <!--<td width="170" align="center"><strong>Part No </strong></td>-->
		  <!--<td width="40" align="center"><strong>Rev </strong></td>-->
		  <td width="107" align="center"><strong>Inv DATE</strong></td>
		  <td width="107" align="center"><strong>Part#</strong></td>
		  <td width="107" height="30" align="center"><strong>Edit</strong></td>
		  <td width="107" height="30" align="center"><strong>Download PDF</strong></td>
		  <td width="107" height="30" align="center"><strong>VIEW PDF</strong></td>
		  <!--<td width="107" height="30" align="center"><strong>Download DOC</strong></td>-->
		  <td width="76" height="30" align="center"><strong>Delete</strong></td>
		  <td width="76" height="30" align="center"><strong>Duplicate</strong></td>
		  <!--<td width="76" height="30" align="center"><strong>Past Due</strong></td>-->
		</tr>
		<?php 
	  while($rwc=mysql_fetch_array($res1))
	  {
	  	//selecting product ID
		$sqsc_x = "select part_no from invoice_items_tb where pid='".$rwc['invoice_id']."'";
		$x=mysql_query($sqsc_x);
	
	  ?>
		<tr>
		  <td height="30" align="center"><?php echo $rwc['invoice_id'];?>&nbsp;</td>
		  <td height="30" align="center"><?php echo $rwc['invo_id'];?>&nbsp;</td>
		  <td height="30" align="center"><?php echo $rwc['customer'];?></td>
		  <td align="center"><?php echo $rwc['invo_date'];?></td>
		  <!--<td align="center"><?php echo $rwc['rev'];?></td>-->
		  <td align="center"><button onclick="alert('<?php while($rs=mysql_fetch_assoc($x)){echo $rs['part_no']." ,";} ?>')">View Item(s)</button></td>
		  <!--<td align="center"><?php echo $rwc['podate'];?></td>-->
		  <td height="30" align="center"><a href="edit_invoice.php?id=<?php echo $rwc['invoice_id'];?>">Edit</a></td>
		  <td height="30" align="center"><a href="download-pdf2.php?id=<?php echo $rwc['invoice_id'];?>">Download Pdf</a></td>
		  <td height="30" align="center"><a target="_blank" href="download-pdf2.php?id=<?php echo $rwc['invoice_id'];?>&amp;oper=view">VIEW Pdf</a></td>
		  <!--<td height="30" align="center"><a href="download-doc2.php?id=<?php echo $rwc['invoice_id'];?>">Download doc</a></td>-->
		  <td height="30" align="center"><a href="#" onclick="del('<?php echo $rwc['invoice_id'];?>');">Delete</a></td>
		  <td height="30" align="center"><a href="manage_invoice.php?dupid=<?php echo $rwc['invoice_id'];?>">Duplicate</a></td>
		  <!--<td align="center"><input type="checkbox" name="" id="<?php echo $rwc['invoice_id']; ?>"  <?php echo ($rwc['pending']=='Yes')? "checked=\"checked\"" : ""; ?>  value="<?php echo $rwc['invoice_id']; ?>" title="is processed" onclick="doAction(this.value, this.checked);"/></td>-->
		</tr>
		<?php 
	  }
	  ?>
	  </table>
	  <div id="display_area"></div>
	  <!-- new update code javascript function 2015-08-28 -->
	<script>
	
		var xmlhttp
	
		function doAction(record_id, status) {		

			if(status == true){
				//alert('selected so should be checked here after');
				addCheckMark(record_id,status);
				//alert(record_id)
			}
			else {
				//alert('de selected so should NOT be checked here after');

				jConfirm('Do you want to unmark the Past Due Invoice?', 'Confirmation Dialog', function(answer) {
					if(answer) addCheckMark(record_id, status);
					else document.getElementById(record_id).checked = true;
				});
			}
		}
		
			//AJAX function starts here
			
			function addCheckMark(record_id,status) {
			
			xmlhttp = GetXmlHttpObject();
			
			if (xmlhttp==null) {
			  alert ("Your browser does not support AJAX!");
			  return;
			  }
				var url="ajax_add_check_mark.php";
				url=url+"?record_id="+record_id;
				url=url+"&status="+status;			
				url=url+"&sid="+Math.random();
				xmlhttp.onreadystatechange=stateChanged;
				xmlhttp.open("post",url,true);
				xmlhttp.send(null);		
			}
			
			function stateChanged() {
			if (xmlhttp.readyState == 4) {
			  document.getElementById("display_area").innerHTML=xmlhttp.responseText;
			  //alert(xmlhttp.responseText);
			  }
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
}// end of if
else {
?>
  </p>
  <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
	<tr>
	  <td height="50"><strong>No matching Invoices found!</strong></td>
	</tr>
	<tr>
	  <td height="50"><a href="manage_invoice.php">CLEAR SEARCH FILTERS</a></td>
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