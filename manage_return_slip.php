<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from return_slip_tb where slip_id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	$sqdel = 'delete from return_items_tb where slipid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	$sqdel = 'delete from maincont_returnslip where slipid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	header("location: manage_return_slip.php");
	exit;
}

if($_REQUEST['dupid'] != "") {
	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM return_slip_tb WHERE slip_id= "'.$_REQUEST['dupid'].'"';
	$sqdup2 = 'UPDATE  tmptable_1 SET slip_id = NULL';
	$sqdup3 = 'INSERT INTO return_slip_tb  SELECT * FROM tmptable_1';
	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';

	$sqdup1 = mysql_query($sqdup1) or die(mysql_error());
	$sqdup2 = mysql_query($sqdup2) or die(mysql_error());
	$sqdup3 = mysql_query($sqdup3) or die(mysql_error());
	$sqdup4 = mysql_query($sqdup4) or die(mysql_error());
	header("location: manage_return_slip.php");
	exit;
}

//Stock List
$title = "Manage Return Slip";
$sqls = "select * from return_slip_tb";

if(isset($_GET['btnvnd'])) {
	$srchv = $_GET['srchv'];
	$sqls = "select * from return_slip_tb rs inner join vendor_tb v on rs.vid = v.data_id where v.data_id like '".$srchv."' ";
}
else if(isset($_GET['btnpart'])) {	
	$pno = $_GET['srch'];
	$sqls = "select * from return_slip_tb where part_no like '".$pno."' ";
}

$sqls .= " ORDER BY slip_id ";

// Paging Code Starts
// how many rows to show per page 
$rowsPerPage = 100; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) { 
	$pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 

$cres  = mysql_query($sqls) or die('Error, query failed'); 
$numrows = mysql_num_rows($cres);

// how many pages we have when using paging? 
$maxPage = ceil($numrows/$rowsPerPage); 

// print the link to access each page
$self = $_SERVER['PHP_SELF']; 

$nav = ''; 

for($page = 1; $page <= $maxPage; $page++) { 

	if ($page == $pageNum) { 
		$nav .= " $page ";   // no need to create a link to current page 
	} 
	else  { 
		$nav .= " <a href=\"$self?page=$page\">$page</a> "; 
	}
} 

// creating previous and next link 
// plus the link to go straight to 
// the first and last page 

if ($pageNum > 1) { 
	$page = $pageNum - 1; 
	$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 
	$first = " <a href=\"$self\">[First Page]</a> "; 
}
else { 
	$prev  = '&nbsp;'; // we're on page one, don't print previous link
	$first = '&nbsp;'; // nor the first page link 
} 						

if ($pageNum < $maxPage) { 
	$page = $pageNum + 1; 
	$next = " <a href=\"$self?page=$page\">[Next]</a> ";
	$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 
}  
else  { 
	$next = '&nbsp;'; // we're on the last page, don't print next link 
	$last = '&nbsp;'; // nor the last page link 
}

//Final query 
$sqls .= " LIMIT $offset, $rowsPerPage ";

$ress = mysql_query($sqls);
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
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
<script type="text/javascript">

function del(id) {
	var answer = confirm ("Do you want to delete the record");

	if(answer) 
		location.href = "manage_return_slip.php?delid="+id;
	else 
		return false;
}
</script>
<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function(){
	$j('#srch').autocomplete({source:'getstocksrch.php?r=1', minLength:1});
	$j('#srchv').autocomplete({source:'getstocksrch.php?r=2', minLength:1});
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
</table><!-- Header Ends -->

<table border="0" cellpadding="0" cellspacing="0" width="99%">
<tr>
	<td align="center" valign="top" style="line-height: 16px; width: 200px"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'> <!-- Stock List -->

	<form name="form1" method="get" action="">

		<table align='center' border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >

		  <tr>
			<td height="30" colspan="2"><strong>Search By </strong></td>
		  </tr>

		  <tr>
			<td width="180" height="30">Search By Part Number</td>
			<td width="300" height="30">
			<input type="text" name="srch" id="srch">
			<input type="submit" value="submit" name="btnpart"></td>
		  </tr>

		  <tr>
			<td width="180" height="30">Search By Vendor Name</td>
			<td width="300" height="30">
			<input type="text" name="srchv"  id="srchv">
			<input type="submit" value="submit" name="btnvnd"></td>
		  </tr>

		</table>
	</form>
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="5"><strong><?php echo $title; ?></strong></td>	
		<td colspan="5"><a href="add_return_slip.php">Add Return Slip</a></td>	
	</tr>

	<tr>
	  <td height="30" colspan="10" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td height="30" class="hdrow">Slip id</td>
		<td class="hdrow">RMA#</td>
		<td class="hdrow">Vendor</td>
		<td class="hdrow">Part No</td>
		<td class="hdrow">Rev</td>
		<td class="hdrow">Edit</td>
		<td width="107" height="30" align="center"><strong>Download PDF</strong></td>
		<td width="107" height="30" align="center"><strong>VIEW PDF</strong></td>
		<td class="hdrow">Delete</td>
		<td class="hdrow">Duplicate</td>
	</tr>

	<?php

	if($ress) {
		while($rows = mysql_fetch_assoc($ress)) {

			echo "<tr>
				<td height='30' class='ctr'>".($rows['slip_id']+10001)."</td>
				<td height='30' class='ctr'>".$rows['rma']."</td>
				<td class='ctr'>";

			$csql = "select c_name from vendor_tb where data_id='".$rows['vid']."'";
			$cres = mysql_query($csql);
			$crow = mysql_fetch_assoc($cres);

			echo $crow['c_name'];
		
			echo "</td>
				<td class='ctr'>".$rows['part_no']."</td>
				<td class='ctr'>".$rows['rev']."</td>";		

			echo "
				<td class='ctr'><a href='add_return_slip.php?slipid=".$rows['slip_id']."'>Edit</a></td>
				<td class='ctr'><a href='returnslip-pdf.php?id=".$rows['slip_id']."'>Download Pdf</a></td>
				<td class='ctr'><a target='_blank' href='returnslip-pdf.php?id=".$rows['slip_id']."&amp;oper=view'>VIEW Pdf</a></td>
				<td class='ctr'><a href='#' onclick=\"del(".$rows['slip_id'].");\">Delete</a></td>
				<td class='ctr'><a href='manage_return_slip.php?dupid=".$rows['slip_id']."'>Duplicate</a></td>
			</tr>";
				
				
		}
		
		/*
		
		
		
		*/
	}
	?>

	</table>

	</td>
</tr>
</table>

</body>
</html>