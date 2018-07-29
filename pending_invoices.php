<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

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

<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	jQuery(document).ready(function(){
		$j('#srchc').autocomplete({source:'getinvsrchc.php?pending=yes', minLength:1});

		$j(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': window.location.href = 'welcome.php';
			break;
        }
		});

		$j('.custom').click(function() {
			var id = $j(this).attr('id');
			$j('#blk'+id).show(); 
		});

		$j('.save_value').livequery('click', function() {
			var id = $j(this).attr('id').substring(4, $j(this).attr('id').length);
			$j.post('save_custom_inv.php', { shipto: $j('#shipto'+id).val(), qty: $j('#qty'+id).val(), inv: id } , function(txt) {
				$j('#blk'+id).hide(); 
			});
		});

		$j('.cls').livequery('click', function() {	
			$j(this).parent().hide();
		});
	});
	function aaa(){
		alert ("Your browser does not support AJAX!")
	}
	
	function doAction(record_id, status) {		
			//alert ("checking the function")
			if(status == true){
				//alert('selected so should be checked here after');
				addCheckMark(record_id,status);
				//alert (record_id+status)
			}
			else {
				//alert('de selected so should NOT be checked here after');
				addCheckMark(record_id,status);
				
			}
		}
		
		var xmlhttp
	
		
		
			//AJAX function starts here
			
			function addCheckMark(record_id,status) {
			
			xmlhttp = GetXmlHttpObject();
			
			if (xmlhttp==null) {
			  alert ("Your browser does not support AJAX!");
			  return;
			  }
				var url="ajax_selection_pendig_invoice.php";
				url=url+"?record_id="+record_id;
				//alert(record_id)
				url=url+"&status="+status;			
				url=url+"&sid="+Math.random();
				xmlhttp.onreadystatechange=stateChanged;
				xmlhttp.open("post",url,true);
				xmlhttp.send(null);	
				//alert(url)	
			}
			
			function stateChanged() {
			if (xmlhttp.readyState == 4) {
			  document.getElementById("display_area").innerHTML=xmlhttp.responseText;
			  alert(xmlhttp.responseText);
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
</script> 

<style>
.invblk { position: absolute; z-index: 99; padding: 15px; 
	display: none; border: 1px solid #333; background: #ffc;
	width: 250px; text-align: left; }
.custom { cursor: pointer; }
</style>

</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>
</table><!-- Header Ends -->

<table border="0" cellpadding="0" cellspacing="0" width="99%">
<tr>
	<td align="center" valign="top" style="line-height: 16px; width: 200px"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>

	<form name="form1" method="get" action="">

	<table align='center' border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >
	<tr>
		<td height="30" colspan="2"><strong>Search By </strong></td>
	</tr>

	<tr>
		<td width="180" height="30">Search BY Customer Name</td>
		<td width="300" height="30">
		<input type="text" name="srchc" id="srchc">
		<input type="submit" value="submit" name="btncus"></td>
	</tr>
	</table>
	</form>  

<?php
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

$sqs = "select distinct customer from invoice_tb where pending='Yes' ";

if( isset($_GET['hidden']) && $_GET['hidden'] == '1') {
	$sqs .= " and status='hide' ";
}
if(isset($_REQUEST['btncus'])) {
	$srchc = $_REQUEST['srchc'];
	$sqs .= " and customer='".$srchc."' ";
}
$res1 = mysql_query($sqs, $conn) or die('error in data'.mysql_error());

if(mysql_num_rows($res1) > 0) {

	$numrows = mysql_num_rows($res1);
	
	// how many pages we have when using paging? 
	$maxPage = ceil($numrows/$rowsPerPage); 
	
	// print the link to access each page 
	$txtcname = $_REQUEST['txtcname'];
	$self = $_SERVER['PHP_SELF']; 
	$nav = ''; 
	for($page = 1; $page <= $maxPage; $page++)  { 
		if ($page == $pageNum)  { 
			$nav .= " $page ";   // no need to create a link to current page 
		} 
		else  { 
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
	else { 
		$prev  = '&nbsp;'; // we're on page one, don't print previous link 
		$first = '&nbsp;'; // nor the first page link 
	} 
	
	if ($pageNum < $maxPage) { 
		$page = $pageNum + 1; 
		$next = " <a href=\"$self?page=$page&txtcname=$txtcname\">[Next]</a> "; 
		 
		$last = " <a href=\"$self?page=$maxPage&txtcname=$txtcname\">[Last Page]</a> "; 
	}  
	else { 
		$next = '&nbsp;'; // we're on the last page, don't print next link 
		$last = '&nbsp;'; // nor the last page link 
	} 
	
	// print the navigation link 
	$sqs .= " ORDER BY customer LIMIT $offset, $rowsPerPage ";
	$res1 = mysql_query($sqs, $conn) or die('error in data'.mysql_error());

?>

	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">
	<tr>
		<td height="30" colspan="2"><font size="3"><strong>Past Due Invoices</strong></font></td>
		<td height="30" align="center"><a href="manage_invoice.php">MANAGE INVOICE</a></td>
		<td height="30" > <a href="pending_invoices.php">CLEAR SEARCH FILTERS</a></td>
	</tr>

	<tr>
		<td height="30" colspan="4" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>		  
		<td width="25%" height="30" align="center"><strong>Customer</strong></td>
		<td width="40%" height="30" align="center" style="padding-left: 15%"><table border="0px solid red" width="100%"><td><strong>Invoices</strong></td><td width="120px"><strong>Cust PO</strong></td><td width="20px"><strong>lncl</strong></td></table></td>
		<td width="20%" height="30" align="center"><strong>VIEW PDF</strong></td>
		<td height="30" align="center"><strong>Download PDF</strong></td>
	</tr>

	<?php 
	while($rwc = mysql_fetch_assoc($res1)) {
		$sqi = "select * from invoice_tb it where it.customer='".$rwc['customer']."' and it.pending='Yes' order by it.invoice_id";
		$resi = mysql_query($sqi) or die('errorn in data');
	?>
	<tr>
		<td height="30" align="center"><?php
		$csql = "select c_shortname from data_tb where c_name='".$rwc['customer']."'";
		$cres = mysql_query($csql);
		$crow = mysql_fetch_assoc($cres);
		echo $crow['c_shortname']; ?></td>	
		
		<td height="30" style="position: relative">
		<?php if(mysql_num_rows($resi) > 0) {
			while($rowi = mysql_fetch_assoc($resi)) {
				$isql = "select * from invoice_items_tb where pid='".$rowi['invoice_id']."' order by item limit 1";
				$ires = mysql_query($isql);
				if(mysql_num_rows($ires) > 0) 
				$irow = mysql_fetch_assoc($ires);
				$sql2="select invoice_id,selected from invoice_tb";
				$result=mysql_query($sql2);
				$result_set=mysql_fetch_assoc($result);
				$selected=$result_set['selected'];
				$select_value=$result_set['invoice_id'];
				
				//echo "tihs is the select - ".$selected;
				echo '<a target="new" href="edit_invoice.php?id='
				.$rowi['invoice_id']
				.'">'
				.($rowi['invoice_id'] + 9976)
				.'</a> &nbsp;&nbsp;&nbsp;'
				.$rowi['part_no'] 
				.$rowi['rev']
				.' &nbsp;<div style="float: right"> <div style="float:left;"> '
				.$rowi['po']
				.'&nbsp;&nbsp;</div> <a id="'
				.$rowi['invoice_id']
				.'" class="custom">  Customize</a>&nbsp;&nbsp;' ?>
				
				<input type="checkbox" name="" id="<?php echo $rowi['invoice_id']; ?>"  <?php echo ($rowi['selected']=='yes')? "checked=\"checked\"" : ""; ?>  value="<?php echo $rowi['invoice_id'] ?>" title="is processed" onclick="doAction(this.value, this.checked);"/>
				<?php //echo $rowi['selected'];?>

				<?php echo' </div><br><br>
				
				
				<div class="invblk" id="blk'.$rowi['invoice_id'].'">
					<a href="javascript:void(0)" class="cls" id="cls'.$rowi['invoice_id'].'"  style="color:#c00; float:right">Close</a>
					
					<table width="100%">
					<tr>
						<td>Ship to:</td>
						<td><input type="text" name="shippedto" id="shipto'.$rowi['invoice_id'].'" size="27" value="'.($rowi['pdfshipto']).'"></td>
					</tr>
					<tr>
						<td>Quantity:</td>
						<td><input type="text" name="qty" size="10" maxlength="10" id="qty'.$rowi['invoice_id'].'" value="'.($rowi['qty'] > 0 ? $rowi['qty'] : (!isset($irow['qty2']) ? 0 : $irow['qty2'])).'"> &nbsp;<div style="float: right"><input type="button" class="save_value" id="save'.$rowi['invoice_id'].'" value="Save" /></div></td>
					</tr>
					</table>
					
				</div>';
			}
		} ?>
		
		</td>
		  
		<td height="30" align="center">
		<a target="_blank" href="pend-inv-pdf.php?cust=<?php echo $rwc['customer']; ?>&amp;oper=view">VIEW Pdf</a>
		</td>
		<td height="30" align="center"><a href="pend-inv-pdf.php?cust=<?php echo $rwc['customer']; ?>">Download Pdf</a></td>
		  
	</tr>
<?php 
}
?>
</table>
<!-- new update code javascript function 2015-08-28 -->
	<script>
	
			
			
		
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
<?php 
} // end of if
else {
?>
</p>
  <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
	<tr>
	  <td height="50"><strong>No matching Invoices found!</strong></td>
	</tr>
	<tr>
	  <td height="50"><a href="pending_invoices.php">CLEAR SEARCH FILTERS</a></td>
	</tr>
  </table>
  <p>
<?php 
}
?>		  

	</td>
</tr>
</table>


</body>
</html>