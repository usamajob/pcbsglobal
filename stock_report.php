<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php

if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from stock_tb where stkid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);
	$sqdel = 'delete from stock_ret where stkid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);
	header("location: stock_report.php");
	exit;
}

$requestStr = '';
$clause = "";

if($_REQUEST['showall'] != "") $clause = "";

$ord_by = ' ORDER BY customer ,part_no ASC';
$snum1 = 1; $arrow1 = '&darr;';
$snum2 = 0;
$arrow2 = '&uarr;';

if(isset($_GET['ord'])) {
	switch($_GET['ord']) {
		case '1':
			$ord_by = ' ORDER BY trim(c_shortname)  ,part_no ASC '; $snum1 = 1;
			$arrow1 = '&darr;'; break;
		case '2':
			$ord_by = ' ORDER BY trim(c_shortname) desc   ,part_no ASC'; $snum1 = 0;
			$arrow1 = '&uarr;'; break;
		case '3':
			$ord_by = ' ORDER BY dw  ,part_no ASC '; $snum2 = 1;
			$arrow2 = '&darr;'; break;
		case '4':
			$ord_by = ' ORDER BY dw desc  ,part_no ASC '; $snum2 = 0;
			$arrow2 = '&uarr;'; break;
	}
}

//Stock List
$title = "Stock Report";
$searchlist = 0;
if($_REQUEST['srchp'] != "") {
	$requestStr .= '&srchp='.trim($_REQUEST['srchp']);
	$sqls = "select qty ssadd, customer, part_no, rev, supplier, dtadded dta, unix_timestamp(str_to_date(substr(dtadded, -10), '%m-%d-%Y')) dw, dc, finish, manuf_dt, docsready, stkid, dt.c_shortname from stock_tb st
	left outer join data_tb dt on dt.c_name = st.customer where concat(part_no,'_',rev,'_',customer) like '%".str_replace('+', ' ', $_REQUEST['srchp'])."%' order by stkid  ,part_no ASC ";
	$searchlist = 1;
}
else
	$sqls = "select sum(stkadded) ssadd, customer, part_no, rev, supplier, dta, unix_timestamp(str_to_date(substr(dta, -10), '%m-%d-%Y')) dw, dc, finish, manuf_dt, docsready, s.stkid, dt.c_shortname from (select st.stkid, st.qty stkadded, customer, part_no, rev, supplier, dtadded dta, dc, finish, manuf_dt, docsready from stock_tb st
	group by st.stkid) s left outer join data_tb dt on dt.c_name=s.customer group by stkid, customer, part_no, rev";

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

$cres  = mysql_query($sqls) or die('Error, query failed'.mysql_error());
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
if(!isset($_REQUEST['srchp']) || $_REQUEST['srchp'] == "")
	$sqls .= " $ord_by LIMIT $offset, $rowsPerPage ";

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

<link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery('#srchp').autocomplete({source:'getpno.php', minLength:1});
});

function del(id) {
	var answer = confirm ("Do you want to delete the record");

	if(answer)
		location.href = "stock_report.php?delid="+id;
	else
		return false;
}
</script>
<script type="text/javascript" src="js/gotowelcome.js"></script>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />

<title>Admin Panel - <?php echo $title; ?></title>
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

	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="12"><strong><?php echo $title; ?></strong></td>
	</tr>

	<tr>
		<td colspan="12">
		<form name="form1" method="get" action="">
		<table >
		<tr>
			<td><strong>Search By Part number</strong></td>
			<td><input type="text" name="srchp" id="srchp"></td>
			<td><input type="submit" value="Search"></td>
			<td><input type="submit" value="Show All" name="showall"></td>
		</tr>
		</table>
		</td>
	</tr>

	<tr>
		<td height="30" colspan="12" align="center"><?php echo $first . $prev . $nav . $next . $last; ?>
</td>
	</tr>

	<?php ($searchlist == 0) ?>

	<tr>
		<td height="30" class="hdrow">Stk#</td>
		<td class="hdrow"><?php echo ($searchlist == 1 ? 'Customer' : '<a href="stock_report.php?ord='.($snum1 == 1 ? '2' : '1').$requestStr. '">Customer '.$arrow1.'</a>' ) ?></td>
		<td class="hdrow">Part No</td>
		<td class="hdrow">Rev</td>
		<td class="hdrow">Supplier</td>
		<td class="hdrow"><?php echo ($searchlist == 1 ? 'Date Add.' : '<a href="stock_report.php?ord='.($snum2 == 1 ? '4' : '3').$requestStr. '">Date Add. '.$arrow2.'</a>' ) ?></td>
		<td class="hdrow">D/C</td>
		<td class="hdrow">Finish</td>
		<td class="hdrow">Mfg Date</td>
		<td class="hdrow">Docs<br>Ready</td>
		<td class="hdrow">In Stock</td>

		<!-- <td class="hdrow">Delete</td> -->
	</tr>

	<?php

	if($ress) {
		$stocktotal = 0;
		while($rows = mysql_fetch_assoc($ress)) {

			$rowbg = '';
			if($rows['manuf_dt'] != '') {
				$mdt = explode('-', $rows['manuf_dt']);
				$mdate = $mdt[0]."-".$mdt[2];
				$timestamp = strtotime($mdt[2].'-'.$mdt[0].'-'.$mdt[1]);

				if( (($rows['finish'] == 'HASL' || $rows['finish'] == 'ENEPIG') && (time() - $timestamp)/(3600*24) > 170) || ($rows['finish'] == 'ENIG' && (time() - $timestamp)/(3600*24) > 350) ) {
					$rowbg = "style='background: #fcc'";
				}
			}
			else $mdate = '';

			echo "<tr $rowbg >
				<td class='ctr'>".$rows['stkid']."</td>
				<td class='ctr'>".$rows['c_shortname']."</td>
				<td class='ctr'>".$rows['part_no']."</td>
				<td class='ctr'>".$rows['rev']."</td>
				<td class='ctr'>";

			$sqv = "select * from vendor_tb where data_id='".$rows['supplier']."'";
			$resv = mysql_query($sqv) or die('error in data');
			$rwv = mysql_fetch_assoc($resv);
			echo $rwv['c_shortname'];


			echo "</td>
				<td class='ctr'>".substr($rows['dta'], -10)."</td>
				<td class='ctr'>".$rows['dc']."</td>
				<td class='ctr'>".$rows['finish']."</td>
				<td class='ctr'>".$mdate."</td>
				<td class='ctr'>".(1 == $rows['docsready'] ? "yes" : "no")."</td>
				<td class='ctr'>".$rows['ssadd']."</td>";

			$stocktotal += $rows['ssadd'];

			echo "</tr>";

			/* <td class='ctr'><a href='#' onclick=\"del(".$rows['stkid'].");\">Delete</a></td> */
		}

		if($searchlist == 1)
			echo "<tr><td colspan='8'></td><td class='ctr'><b>Total:</b></td><td class='ctr'>".$stocktotal."</td></tr>";
	}
	?>

	</table>

	</td>
</tr>
</table>

</body>
</html>
