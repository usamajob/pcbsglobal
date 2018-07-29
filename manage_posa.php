<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "") {
	if($_REQUEST['delid'] == 'all')
		$sqdel = 'truncate posa_tb';
	else 
		$sqdel = 'delete from posa_tb where id="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	header("location: manage_posa.php");
	exit;
}

if($_REQUEST['dupid'] != "") {
	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM posa_tb WHERE id= "'.$_REQUEST['dupid'].'"';
	$sqdup2 = 'UPDATE  tmptable_1 SET id = NULL';
	$sqdup3 = 'INSERT INTO posa_tb  SELECT * FROM tmptable_1';
	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';

	$sqdup1 = mysql_query($sqdup1);
	$sqdup2 = mysql_query($sqdup2);
	$sqdup3 = mysql_query($sqdup3);
	$sqdup4 = mysql_query($sqdup4);
	header("location: manage_posa.php");
	exit;
}

//Pending Orders / Stock Allocation List
$title = "Manage Pending Orders / Stock Allocation";

$ord_by = ' ORDER BY duedate ';
$snum1 = 1; $arrow1 = '&darr;';

if(isset($_GET['ord'])) {
	switch($_GET['ord']) {
		case '1':
			$ord_by = ' ORDER BY duedate asc'; $snum1 = 1; 
			$arrow1 = '&darr;'; break;
		case '2':
			$ord_by = ' ORDER BY duedate desc '; $snum1 = 0; 
			$arrow1 = '&uarr;'; break;		
	}
}

$wherearr = array();
$wherestr = " where 1=1 ";

function frmt_datestr($dd) {
	$dd_parts = explode('/', $dd);
	return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
}

if (isset($_GET['srchbtn'])) {
	$st_date = frmt_datestr(trim($_GET['st_date']));
	$en_date = frmt_datestr(trim($_GET['en_date']));
	$part_no = trim($_GET['srchpn']);
	$customer = trim($_GET['srchc']);
	$vendor = trim($_GET['srchv']);

	if (strlen($st_date) > 2 && strlen($en_date) > 2) {
		$wherearr[] = " ( unix_timestamp(duedate) >=  unix_timestamp('" . $st_date . "') AND unix_timestamp(duedate) <=  unix_timestamp('" . $en_date . "')  )";
	}

	if(strlen($part_no) > 1)
		$wherearr[] = " part_no = '".$part_no."'";

	if(strlen($customer) > 1)
		$wherearr[] = " customer = '".$customer."'";

	if(count($wherearr) > 0) 
		$wherestr .= " AND ".implode(' AND ', $wherearr);

	$requestStr = '';

	foreach($_GET as $gk => $gv) {
		if($gk != 'ord') $requestStr .= '&'.$gk.'='.trim($gv);
	}	
}

$sqls = "select pt.*, v.c_shortname vc from posa_tb pt 
LEFT OUTER JOIN vendor_tb v on v.data_id = pt.vid $wherestr ";
$sqls .= $ord_by;

/* Paging Code Starts
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

$cres  = mysql_query($sqls) or die('<br>Error, query failed'); 
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
$sqls .= " LIMIT $offset, $rowsPerPage ";*/

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
		location.href = "manage_posa.php?delid="+id;
	else 
		return false;
}
</script>
<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function(){

	var dates = $j( "#st_date, #en_date" ).datepicker({
	numberOfMonths: 1,
	dateFormat:'mm/dd/yy',			
	beforeShow: function( ) {
	var other = this.id == "st_date" ? "#en_date" : "#st_date";
	var option = this.id == "st_date" ? "maxDate" : "minDate";
	var selectedDate = $j(other).datepicker('getDate');

	$j(this).datepicker( "option", option, selectedDate );
	}
	}).change(function(){
	var other = this.id == "#st_date" ? "#en_date" : "#st_date";

	if ( $j('#st_date').datepicker('getDate') > $j('#en_date').datepicker('getDate') )
	$j(other).datepicker('setDate', $j(this).datepicker('getDate') );
	});

	$j('.overlay_close_trig').click(function(){
		$j(this).parent().hide();
	});

	$j('.ttip_overlay_trig').click(function(){
		$j('.ttip_overlay').hide();
		$j(this).next().show();
		var ele = $j(this).next();
	});

	$j('.ttip_overlay_close_trig').click(function(){
		$j(this).parent().hide();
	});

	$j('.ttip_overlay').mouseleave(function(){
		$j('.ttip_overlay').hide();
	});

	$j('#srchpn').autocomplete({source:'getpordpno.php', minLength:1});
	$j('#srchc').autocomplete({source:'getreportc.php', minLength:1});
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

<div id="main" style='top: 55px; z-index: 10;background-color: #fff;'>

<!-- /** Search form ********/ -->
<form name="form1" method="get" action="">
	<table width="100%" border="1" align="center" cellpadding="2" cellspacing="1" bordercolor="#99ffcc" style="">

	<tr>
		<td colspan='8'><strong>Search POSA</strong></td>
	</tr>

	<tr>
		<td colspan='4'><strong>Date Range</strong></td>
		<td><strong>Part Number</strong></td>
		<td><strong>Customer Name</strong></td>
		<td rowspan='2'><input type="submit" name='srchbtn' value="Search"></td>
	</tr>

	<tr>
		<td width="5%"><strong> From</strong></td>
		<td width="11%"><input name="st_date" type="text" id="st_date" size="12" ></td>
		<td width="3%"><strong>To</strong></td>
		<td width="11%"><input name="en_date" type="text" id="en_date" size="12"></td>
		<td><input type="text" name="srchpn" id="srchpn" size="25"></td>
		<td><input type="text" name="srchc" id="srchc"></td>
	</tr>	

	</table>
</form>

	<!-- Pending Orders / Stock Allocation List -->
	
	<table width="100%" border='0'>

	<tr>
		<td height="20" colspan="6"><strong><?php echo $title; ?></strong></td>	
		<td colspan="9"><a href="add_posa.php">Add Pending Orders</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href='#' onclick="del('all')">Delete All Pending Orders</a><div class='fr' style='padding-right: 10px; font : 11px Verdana; color: #000; background: #fff'><b>Total: <?php echo mysql_num_rows($ress) ?> records</b></div></td>	
	</tr>

	<tr class='headrow'>
		<td width='3%'>ID#</td>
		<td width='9%'>Customer</td>
		<td width='15%'>Part No</td>
		<td width='3%'>Rev</td>
		<td width='5%'>Our PO</td>
		<td width='15%'>Cust. PO</td>
		<td width='5%'>Stk. Qty.</td>
		<td width='3%'>Qty.</td>
		<td width='7%'>Exp. Date</td>
		<td>Courier</td>
		<td width='7%'><a href="manage_posa.php?ord=<?php echo ($snum1 == 1 ? '2' : '1').$requestStr ?>">Due Date <?php echo $arrow1 ?></a></td>
		<td width='8%'>Vendor</td>
		<td width='4%'>Edit</td>
		<td width='4%'>Del.</td>
		<td width='4%'>Dup.</td>
	</tr>
	</table>
	</div>
<div class='clear'><br><br><br><br><br></div>
	<?php

	if($ress) {
		$prevdate = "";
		$color = '#eee';
		echo "<table width='100%' border='0'>";

		while($rows = mysql_fetch_assoc($ress)) {

			if($prevdate != $rows['duedate']) {
				if($color == '#eee') $color = '#fff';
				else $color = '#eee';
			}
			if(strtotime($rows['duedate']) < strtotime($rows['pdate']))
				$color = "#fee";

			echo "<tr style='height: 18px; background: ".$color."'>
				<td width='3%' class='ctr'>".$rows['id']."</td>
				<td width='9%' class='ctr'>";
				
				$sqlc = "select * from data_tb where c_name='".$rows['customer'] . "'";
				$resc = mysql_query($sqlc) or die('error in data');
				$rowc = mysql_fetch_assoc($resc);

			echo $rowc['c_shortname'];
				
			echo "</td>
				<td width='15%' class='ctr'>".$rows['part_no']."</td>
				<td width='3%' class='ctr'>".$rows['rev']."</td>
				<td width='5%' class='ctr'>".(trim($rows['ourpo']) != '' && $rows['poid'] != '' ? "<a target='new' href='edit_purchase.php?id=".$rows['poid']."'>".$rows['ourpo']."</a>" : "")."</td>
				<td class='ctr' width='15%'>".$rows['custpo']."</td>

				<td class='ctr' width='5%'>";

				if(trim($rows['note']) != '') {

					echo "<a class='ttip_overlay_trig' href=\"javascript:void(0)\">".($rows['qty'] != '' ? $rows['qty'] : '0')."</a>
					<div class='ttip_overlay' style='position: absolute; margin-top:-10px; background:#eee; padding: 5px; width: 300px; display: none; z-index: 9999'> <a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#cd0000;float:right'>Close</a>";

					echo "<p>".$rows['note']."</p>
					</div>";
				}
				else echo $rows['qty'];
				
				echo "</td>
				<td class='ctr' width='3%'>".$rows['qty2']."</td>

				<td class='ctr' width='7%'>".($rows['pdate'] != '0000-00-00' ? date('m-d-Y', strtotime($rows['pdate'])): '')."</td>
				<td class='ctr'>".$rows['courier']."</td>
				<td class='ctr' width='7%'>".($rows['duedate'] != '0000-00-00' ? date('m-d-Y', strtotime($rows['duedate'])) : '')."</td>

				<td class='ctr' width='8%'>".$rows['vc']."</td>
				<td class='ctr' width='4%'><a href='add_posa.php?id=".$rows['id']."'>Edit</a></td>
				<td class='ctr' width='4%'><a href='#' onclick=\"del(".$rows['id'].");\">Del.</a></td>
				<td class='ctr' width='4%'><a href='manage_posa.php?dupid=".$rows['id']."'>Dup.</a></td>
			</tr>";

			$prevdate = $rows['duedate'];
		}
	}
	?>

	</table>

</body>
</html>