<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); 
$title = "Orders Placed";

if($_POST) {
	if(is_array($_POST['txtchk']))
		$idstr = "'".implode("', '",$_POST['txtchk'])."'";

	//echo $idstr;

	$query = "insert into posa_tb (customer, part_no, rev, ourpo, custpo, duedate, poid, vid) select customer, part_no, rev, poid+9933, po, STR_TO_DATE(dweek, '%m-%d-%Y'), poid, vid from porder_tb where poid in (".$idstr.")";

	//echo $query;
	mysql_query($query);
	header('location: posa_search.php');
}
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
<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

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
	$j('#srchv').autocomplete({source:'getreportv.php', minLength:1});

	$j('#checkAll').click(function () {    
     $j('input:checkbox').attr('checked', this.checked);  });
});
</script> 
</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>
</table><!-- Header Ends -->

<?php 
$ord_by = ' ORDER BY poid ';
$snum1 = 1; $arrow1 = '&darr;';
$snum2 = $snum3 = $snum4 = 0;
$arrow2 = $arrow3 = $arrow4 = '&uarr;';

if(isset($_GET['ord'])) {
	switch($_GET['ord']) {
		case '1':
			$ord_by = ' ORDER BY p.poid '; $snum1 = 1; 
			$arrow1 = '&darr;'; break;
		case '2':
			$ord_by = ' ORDER BY p.poid desc'; $snum1 = 0; 
			$arrow1 = '&uarr;'; break;
		case '3':
			$ord_by = ' ORDER BY p.customer '; $snum2 = 1; 
			$arrow2 = '&darr;'; break;
		case '4':
			$ord_by = ' ORDER BY p.customer desc '; $snum2 = 0; 
			$arrow2 = '&uarr;'; break;
		case '5':
			$ord_by = ' ORDER BY dw '; $snum3 = 1; 
			$arrow3 = '&darr;'; break;
		case '6':
			$ord_by = ' ORDER BY dw desc '; $snum3 = 0; 
			$arrow3 = '&uarr;'; break;
		case '7':
			$ord_by = ' ORDER BY vc '; $snum4 = 1; 
			$arrow4 = '&darr;'; break;
		case '8':
			$ord_by = ' ORDER BY vc desc '; $snum4 = 0; 
			$arrow4 = '&uarr;'; break;
	}
}

$wherearr = array();
$wherestr = " where (p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) ";

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
		$wherearr[] = "
		( unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')  
		AND unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "')  )";
	}

	if(strlen($part_no) > 1)
		$wherearr[] = " p.part_no = '".$part_no."'";

	if(strlen($customer) > 1)
		$wherearr[] = " p.customer = '".$customer."'";

	if(strlen($vendor) > 1)
		$wherearr[] = " v.c_shortname = '".$vendor."'";

	if(count($wherearr) > 0) 
		$wherestr .= " AND ".implode(' AND ', $wherearr);

	$requestStr = '';

	foreach($_GET as $gk => $gv) {
		if($gk != 'ord') $requestStr .= '&'.$gk.'='.trim($gv);
	}	
}

$sqlp = "select p.*, i.invoice_id, i.podate invoicedon, v.c_shortname vc,
unix_timestamp(str_to_date(p.dweek,'%m-%d-%Y')) dw
from porder_tb p
left join posa_tb ps on ps.poid = p.poid 
LEFT OUTER JOIN invoice_tb i on
(p.part_no = i.part_no AND p.rev = i.rev AND p.po = i.po)
LEFT OUTER JOIN vendor_tb v on v.data_id = p.vid 
$wherestr and ps.poid is null
$ord_by ";

//echo $sqlp;

$resp = mysql_query($sqlp) or die(mysql_error()."<br>".$sqlp."<br>Unable fetch order records!");

//echo "<pre>"; print_r($_SERVER); echo "</pre>";
?>

<div id="main" style='top: 55px; z-index: 10;background-color: #fff;'>
	
	<!-- /** Search form ********/ -->
	<form name="form1" method="get" action="">
	<table width="100%" border="1" align="center" cellpadding="2" cellspacing="1" bordercolor="#99ffcc" style="background-color: #fff;">

	<tr>
		<td colspan='8'><strong>Search Orders</strong></td>
	</tr>

	<tr>
		<td colspan='4'><strong>Date Range</strong></td>
		<td><strong>Part Number</strong></td>
		<td><strong>Customer Name</strong></td>
		<td><strong>Vendor Name</strong></td>
		<td rowspan='2'><input type="submit" name='srchbtn' value="Search"></td>
	</tr>

	<tr>
		<td width="5%"><strong> From</strong></td>
		<td width="11%"><input name="st_date" type="text" id="st_date" size="12" ></td>
		<td width="3%"><strong>To</strong></td>
		<td width="11%"><input name="en_date" type="text" id="en_date" size="12"></td>

		<td><input type="text" name="srchpn" id="srchpn" size="25"></td>

		<td><input type="text" name="srchc" id="srchc"></td>

		<td><input type="text" name="srchv" id="srchv"></td>
	</tr>	

	</table>

</form>

<form name="form2" method="post" action="">

	<table width='100%' border='0'>
	<tr><td colspan='6' align='right'><input type="submit" name='srchbtn' value="Add to POSA"></td><td colspan='3'><div class='fr' style='padding-right: 5px; font : 11px Verdana; color: #000; background: #fff'><b>Total: <?php echo mysql_num_rows($resp) ?> records</b></div></td></tr>
	<tr class='headrow' >
		<td width='5%'><a href="posa_search.php<?php echo ($snum1 == 1 ? '?ord=2' : '').$requestStr ?>">Ord# <?php echo $arrow1 ?></a></td>
		<td width='9%'><a href="posa_search.php?ord=<?php echo ($snum2 == 1 ? '4' : '3').$requestStr ?>">Customer <?php echo $arrow2 ?></a></td>
		<td width='17%'>P/N</td>
		<td width='4%'>Rev</td>
		<td width='9%'><a href="posa_search.php?ord=<?php echo ($snum3 == 1 ? '6' : '5').$requestStr ?>">Due Date <?php echo $arrow3 ?></a></td>
		<td width='11%'>Customer PO</td>
		<td width='6%'>Our PO</td>
		<td width='8%'><a href="posa_search.php?ord=<?php echo ($snum4 == 1 ? '8' : '7').$requestStr ?>">Vendor <?php echo $arrow4 ?></a></td>
		<td width='3%'><input type="checkbox" id="checkAll"></td>		
	</tr>
	</table>
<?php 
echo "</div>
<div class='clear'><br><br><br><br><br></div>";

if(mysql_num_rows($resp) > 0) {
	echo "<table width='100%' border='0' >";

$ct = 0;
$ttotalprice = 0;
$ttotalcost = 0;
$tprofit = 0;

while($rowp = mysql_fetch_assoc($resp)) {
	$ct++;
	
	echo "<tr style='height: 18px;".( strlen($rowp['dweek']) < 10 ? " background: #fee" : ($ct % 2 == 0 ? " background: #eee" : ""))."'>
		<td width='5%' class='ctr'>".$rowp['poid']."</td>
		<td width='9%'>";
		/* Customer Details */
			$sqlc = "select * from data_tb where c_name='".$rowp['customer'] . "'";
			$resc = mysql_query($sqlc) or die('error in data');
			$rowc = mysql_fetch_assoc($resc);

			echo "<a class='ttip_overlay_trig' href=\"javascript:void(0)\">".$rowc['c_shortname']."</a>
			<div class='ttip_overlay' style='position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999'> <a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#cd0000;float:right'>Close</a>";

			echo "<h3>".$rowc['c_name']."</h3>
			<p>";
			if ($rowc[c_address] != '') {
				echo $rowc[c_address] . '<br>';
			}
			if (($rowc[c_address2] != '') or ($rowc[c_address3] != '')) {
				echo $rowc[c_address2] . ' ' . $rowc[c_address3] . '<br>';
			}
			if ($rowc[c_phone] != '') {
				echo 'Phone : ' . $rowc[c_phone] . '<br>';
			}
			if ($rowc[c_fax] != '') {
				echo 'Fax : ' . $rowc[c_fax] . '<br>';
			}
			echo "</p>
			</div>
		</td>
		<td width='17%' class='ctr'>".$rowp['part_no']."</td>
		<td width='4%' class='ctr'>".$rowp['rev']."</td>
		<td width='9%' class='ctr'>".$rowp['dweek']."</td>
		<td width='11%' class='ctr'>".$rowp['po']."</td>
		<td width='6%' class='ctr'><a target='new' href='edit_purchase.php?id=".$rowp['poid']."'>".($rowp['poid']+9933)."</a></td>
		<td width='8%' class='ctr'>".$rowp['vc']."</td>
		<td width='3%' class='ctr'><input name='txtchk[]' type='checkbox' value='".$rowp['poid']."' /></td>";
		
		echo "
	</tr>";	
}

echo "</table>";  }

?>
</form>

</body>
</html>