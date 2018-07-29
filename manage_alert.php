<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "") {
	$sqdel = "delete from alerts_tb where concat(customer,'|',part_no,'|',rev) = '".$_REQUEST['delid']."'";
	//echo $sqdel;
	$resdel = mysql_query($sqdel);	
	header("location: manage_alert.php");
	exit;
}

//Profile List
$title = "Manage Part Number Alerts";
$sqls = "select * from alerts_tb where part_no <> '' and atype='p' order by customer, part_no, rev, id";

if(isset($_GET['btncus'])) {
	$srchc = $_GET['srchc'];
	$sqls = "select * from alerts_tb where customer like '%".$srchc."%' order by customer, part_no, rev, id";
}
else if(isset($_GET['btnpart'])) {	
	$pno = $_GET['srch'];
	$sqls = "select * from alerts_tb where part_no like '%".$pno."%' order by customer, part_no, rev, id";
}

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
$maxPage = ceil($numrows / $rowsPerPage); 

// print the link to access each page
$self = $_SERVER['PHP_SELF']; 

$nav = ''; 

for($page = 1; $page <= $maxPage; $page++) { 

	if ($page == $pageNum) { 
		$nav .= " $page ";   // no need to create a link to current page 
	} 
	else $nav .= " <a href=\"$self?page=$page\">$page</a> "; 
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

var $j = jQuery.noConflict();
jQuery(document).ready(function(){
	$j('#srch').autocomplete({source:'getalertsrch.php?s=1', minLength:1});
	$j('#srchc').autocomplete({source:'getalertsrch.php?s=2', minLength:1});
});

function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) location.href = "manage_alert.php?delid="+id;
	else return false;
}
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

	<td valign='top'> <!-- Profile List -->

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
			<td width="180" height="30">Search By Customer Name</td>
			<td width="300" height="30">
			<input type="text" name="srchc"  id="srchc">
			<input type="submit" value="submit" name="btncus"></td>
		  </tr>

		</table>
	</form>
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="4"><strong><?php echo $title; ?></strong></td>	
		<td colspan="2"><a href="add_alert.php">Add Alert</a></td>	
	</tr>

	<tr>
	  <td height="30" colspan="6" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td height="30" class="hdrow">#</td>
		<td class="hdrow">Customer</td>
		<td class="hdrow">Part Number / Rev</td>
		<td class="hdrow">Alerts</td>
		<td class="hdrow">Edit</td>
		<td class="hdrow">Delete</td>
		<!-- <td class="hdrow">Duplicate</td> -->
	</tr>

	<?php
	$previd = "";

	if($ress) {
		$ctr = 1;
		while($prow = mysql_fetch_assoc($ress)) {
			$aid = trim($prow['customer']).'|'.trim($prow['part_no']).'|'.trim($prow['rev']);

			if($previd != $aid && $ctr > 1) {
				if(count($tempArr) > 0) {
					$ct = 1;
					foreach($tempArr as $k => $v) 
						echo ($ct++).'. '.$v.'<br>';
				}

				echo "</td>
					<td class='ctr'><a href='add_alert.php?aid=".$previd."'>Edit</a></td>
					<td class='ctr'><a href='#' onclick=\"del('".$previd."');\">Delete</a></td>
					
				</tr>";
				//<td class='ctr'><a href='manage_alert.php?dupid=".$previd."'>Duplicate</a></td>
			}
			
			if($previd != $aid) {

				echo "<tr>
					<td height='30' class='ctr'>".($ctr++).".</td>
					<td height='30' class='ctr'>".$prow['customer']."</td>
					<td class='ctr'>".$prow['part_no'].' '.$prow['rev'];		
				echo "</td>
				<td>";
				$tempArr = array();
			}

			$tempArr[] = $prow['alert'];
			$previd = $aid;			
		}

		if(count($tempArr) > 0) { 
			$ct = 1;
			foreach($tempArr as $k => $v) 
				echo ($ct++).'. '.$v.'<br>';
		}

		echo "</td>
			<td class='ctr'><a href='add_alert.php?aid=".$previd."'>Edit</a></td>
			<td width='50' class='ctr'><a href='#' onclick=\"del('".$previd."');\">Delete</a></td>
			
		</tr>";

		//<td width='70' class='ctr'><a href='manage_alert.php?dupid=".$previd."'>Duplicate</a></td>
	}
	?>

	</table>

	</td>
</tr>
</table>

</body>
</html>