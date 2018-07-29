<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); 
$title = "Orders Placed";
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

	$j('.more').click(function(){
		var did = 'bl' + $j(this).attr('id');
		$j('#'+did).show();
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
$snum1 = 1; $arrow1 = '&darr;';
$snum2 = $snum3 = $snum4 = 0;
$arrow2 = $arrow3 = $arrow4 = '&uarr;';

$wherearr = array();
$wherestr = " where (p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) AND p.part_no <> '' AND p.customer <> '' ";

if( isset($_GET['hidden']) ) {
	if($_GET['hidden'] == 'po')
		$wherestr = " where p.status = 'hide' ";
	else 
		$wherestr = " where i.status = 'hide' ";
}

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

if( isset($_GET['withinv']) ) {
	if( $_GET['withinv'] == 'yes' )
		$wherestr .= " AND i.invoice_id is not null ";
	if( $_GET['withinv'] == 'no' )
		$wherestr .= " AND i.invoice_id is null ";	
}

if( isset($_GET['tbd']) && $_GET['tbd'] == '1') 
	$wherestr .= " AND p.po like 'TBD' ";	

$sqlp = "select p.*, i.invoice_id, i.podate invoicedon, v.c_shortname vc,
unix_timestamp(str_to_date(p.dweek,'%m-%d-%Y')) dw
from porder_tb p
LEFT OUTER JOIN invoice_tb i on
(p.part_no = i.part_no AND p.rev = i.rev AND p.po = i.po)
LEFT OUTER JOIN vendor_tb v on v.data_id = p.vid 
$wherestr
ORDER BY p.customer, p.part_no, p.rev, p.po, poid  ";

//echo $sqlp;

$resp = mysql_query($sqlp) or die(mysql_error()."<br>".$sqlp."<br>Unable fetch order records!");

//echo "<pre>"; print_r($_SERVER); echo "</pre>";
?>

<div id="main" style='top: 55px; z-index: 10'>
	
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

	<tr height='20'><td colspan='10' align='left'><a href="financial_report.php">All Orders</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="financial_report.php?withinv=yes">Orders with Invoice</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="financial_report.php?withinv=no">Orders without Invoice</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="financial_report.php?tbd=1">Orders TBD</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="manage_purchase.php?hidden=1" target='new'>Hidden PO Orders</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="manage_invoice.php?hidden=1" target='new'>Hidden Invoices</a></td></tr>
	</table>

	</form>

	<table width='100%' class='headrow' border='0'>
	<tr>
		<td width='4%'><a href="financial_report.php<?php echo ($snum1 == 1 ? '?ord=2' : '').$requestStr ?>">Ord# <?php echo $arrow1 ?></a></td>
		<td width='12%'>Customer</td>
		<td width='15%'>P/N</td>
		<td width='3%'>Rev</td>
		<td width='12%'>Customer PO</td>
		<td width='8%'>Due Date</td>
		<td width='9%'>Vendor</td>
		<td width='7%'>Our PO</td>
		<td width='5%'>Inv. #</td>
		<td width='9%'>Price</td>		
		<td width='8%'>Cost</td>		
		<td width='8%'>Profit</td>		
	</tr>
	</table>
<?php 
	echo "<div class='fr' style='padding-right: 5px; font : 11px Verdana; color: #000; background: #fff'><b>Total: ".mysql_num_rows($resp)." records</b></div>"; 
echo "</div>
<div class='clear'><br><br><br><br><br></div>";

if(mysql_num_rows($resp) > 0) {
	echo "<table width='100%' border='0' cellspacing='0'>";

$ct = 0;
$ttotalprice = 0;
$ttotalcost = 0;

$prev_poid = '';
$custstr = '';
$poprice = 0;
$pocost = 0;
$prevkeyval = '';
$keyval = '';

$statArr = array();
$flag = 1;

while($rowp = mysql_fetch_assoc($resp)) {

	$keyval = $rowp['po'].'|'. $rowp['customer'].'|'. $rowp['part_no'].'|'. $rowp['rev'];
	
	$invval = ( !is_null($rowp['invoice_id']) ? ($rowp['invoice_id'] + 9976) : '' );	
	
	$totalprice = 0;
	$totalcost = 0;

	if($invval != '') {
		/**** Invoice Price ****/
		$sqi = "select * from invoice_items_tb where pid='".$rowp['invoice_id']."' order by item";
		$resi = mysql_query($sqi) or die('error in data');
		
		while($rwi = mysql_fetch_assoc($resi)) {
			$totalprice += str_replace(',', '', $rwi['qty2']) * (str_replace(',', '', $rwi['uprice']));	
		}					
	}

	if($prev_poid != $rowp['poid'] || $flag == 0) {
		/*** Purchase Cost ***/
		$sqi = "select * from items_tb where pid='".$rowp['poid']."' order by item";
		$resi = mysql_query($sqi) or die('error in data');
		
		while($rwi = mysql_fetch_assoc($resi)) {
			$totalcost += str_replace(',', '', $rwi['qty2']) * (str_replace(',', '', $rwi['uprice']));	
		}

		$ttotalcost += $totalcost;
	}

	if($prevkeyval != $keyval && $prevkeyval != '') {
		$flag = 1;
		if(count($statArr) > 0) {
			if(is_array($statArr[$prevkeyval])) {
				$ctr = 0;
				
				foreach($statArr[$prevkeyval] as $k1 => $v1) {
					
					if(is_array($v1)){

						$tvals = explode('|', $prevkeyval);
						$tvals2 = explode('|', $v1[1]);

						$poprice += $v1[2];
						$pocost += $tvals2[3];

						if($ctr == 0) {
							$sqlc = "select * from data_tb where c_name='".$tvals[1] . "'";
							$resc = mysql_query($sqlc) or die('error in data');
							$rowc = mysql_fetch_assoc($resc);

							$custstr = "<a class='ttip_overlay_trig' href=\"javascript:void(0)\">".$rowc['c_shortname']."</a>
							<div class='ttip_overlay' style='position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999'> <a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#cd0000;float:right'>Close</a>";

							$custstr .= "<h3>".$rowc['c_name']."</h3>
							<p>";
							if ($rowc[c_address] != '') {
								$custstr .= $rowc[c_address] . '<br>';
							}
							if (($rowc[c_address2] != '') or ($rowc[c_address3] != '')) {
								$custstr .= $rowc[c_address2] . ' ' . $rowc[c_address3] . '<br>';
							}
							if ($rowc[c_phone] != '') {
								$custstr .= 'Phone : ' . $rowc[c_phone] . '<br>';
							}
							if ($rowc[c_fax] != '') {
								$custstr .= 'Fax : ' . $rowc[c_fax] . '<br>';
							}
							$custstr .= "</p>
							</div>";
						}

						$ttotalprice += $v1[2];

						echo "<tr style='height: 18px;".( strlen($tvals2[1]) < 10 && strlen($tvals2[1]) > 0 ? " background: #fee" : ($ct % 2 == 0 ? " background: #eee" : ""))."'>
							<td width='4%' class='ctr'>".$tvals2[0]."</td>
							<td width='12%'>".($ctr < 1 ? $custstr : '')."</td>
							<td width='15%' class='ctr'>".($ctr < 1 ? $tvals[2] : '')."</td>
							<td width='3%' class='ctr'>".($ctr < 1 ? $tvals[3] : '')."</td>
							<td width='12%' class='ctr'>".($ctr < 1 ? $tvals[0] : '')."</td>
							<td width='8%' class='ctr'>".$tvals2[1]."</td>
							<td width='9%' class='ctr'>".$tvals2[2]."</td>	
							<td width='7%' class='ctr'><a target='new' href='edit_purchase.php?id=".$tvals2[0]."'>".($tvals2[0]+9933)."</a></td>
							<td width='5%' class='ctr'><a href='edit_invoice.php?id=".($k1-9976)."' target='new'>".$k1."</a></td>
							<td width='9%' style='text-align: right'>".number_format($v1[2], 2, '.', ',')."</td>		
							<td width='8%' style='text-align: right'>".number_format($tvals2[3], 2, '.', ',')."</td>		
							<td width='8%' style='text-align: right'>".( $ctr == (count($statArr[$prevkeyval])-1) ? number_format(($poprice-$pocost), 2, '.', ',') : '')."&nbsp;</td>		
						</tr>";	
						if($ctr == (count($statArr[$prevkeyval])-1)) {
							$poprice = 0;
							$pocost = 0;
						}
					}
					
					$ctr++;
				}
				$ct++;
			}
			else {

				$tvals = explode('|', $prevkeyval);
				$tvals2 = explode('|', $statArr[$prevkeyval]);

				$sqlc = "select * from data_tb where c_name='".$tvals[1] . "'";
				$resc = mysql_query($sqlc) or die('error in data');
				$rowc = mysql_fetch_assoc($resc);

				$custstr = "<a class='ttip_overlay_trig' href=\"javascript:void(0)\">".$rowc['c_shortname']."</a>
				<div class='ttip_overlay' style='position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999'> <a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#cd0000;float:right'>Close</a>";

				$custstr .= "<h3>".$rowc['c_name']."</h3>
				<p>";
				if ($rowc[c_address] != '') {
					$custstr .= $rowc[c_address] . '<br>';
				}
				if (($rowc[c_address2] != '') or ($rowc[c_address3] != '')) {
					$custstr .= $rowc[c_address2] . ' ' . $rowc[c_address3] . '<br>';
				}
				if ($rowc[c_phone] != '') {
					$custstr .= 'Phone : ' . $rowc[c_phone] . '<br>';
				}
				if ($rowc[c_fax] != '') {
					$custstr .= 'Fax : ' . $rowc[c_fax] . '<br>';
				}
				$custstr .= "</p>
				</div>";

				echo "<tr style='height: 18px;".( strlen($tvals2[1]) < 10 && strlen($tvals2[1]) > 0 ? " background: #fee" : ($ct % 2 == 0 ? " background: #eee" : ""))."'>
					<td width='4%' class='ctr'>".$tvals2[0]."</td>
					<td width='12%'>".$custstr."</td>
					<td width='15%' class='ctr'>".$tvals[2]."</td>
					<td width='3%' class='ctr'>".$tvals[3]."</td>
					<td width='12%' class='ctr'>".$tvals[0]."</td>
					<td width='8%' class='ctr'>".$tvals2[1]."</td>
					<td width='9%' class='ctr'>".$tvals2[2]."</td>
					<td width='7%' class='ctr'><a target='new' href='edit_purchase.php?id=".$tvals2[0]."'>".($tvals2[0]+9933)."</a></td>
					<td width='5%' class='ctr'></td>
					<td width='9%' class='ctr'></td>		
					<td width='8%' style='text-align: right'>".number_format($tvals2[3], 2, '.', ',')."</td>		
					<td width='8%' style='text-align: right'>-".number_format($tvals2[3], 2, '.', ',')."&nbsp;</td>		
				</tr>";
				$ct++;
			}
		}
		$statArr = array();		

		if($invval != '') {
		
			$statArr[$keyval][$invval][1] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost;
			
			$statArr[$keyval][$invval][2] = $totalprice;
		}
		else {
			$statArr[$keyval] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost ;
		}

	}

	if($prevkeyval == $keyval || $prevkeyval == '') {	
		
		if($prevkeyval == '') { //First record
			if($invval != '') {		
				$statArr[$keyval][$invval][1] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost;
				
				$statArr[$keyval][$invval][2] = $totalprice;
			}
			else {
				$statArr[$keyval] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost ;
			}
		}
		else {

			if($invval != '') {	
				if($prev_poid != $rowp['poid']) {
					if($statArr[$keyval][$invval][1] == '') {
						$statArr[$keyval][$invval][1] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost;	
					}
					else $flag = 0;
				}
				else {
					if($flag == 0) {
						if($statArr[$keyval][$invval][1] == '') {
							$statArr[$keyval][$invval][1] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost;
							$flag = 1;
						}
					}
					else {
						$statArr[$keyval][$invval][1] = '';	$statArr[$keyval][$invval][2] = $totalprice;
					}
				}

				$statArr[$keyval][$invval][2] = $totalprice;
			} 
			else {
				$statArr[$keyval] = $rowp['poid']."|". $rowp['dweek']."|". $rowp['vc']."|". $totalcost ;
			}			
		}
	}

	$prev_poid = $rowp['poid'];	
	$prevkeyval = $keyval;
}

echo "<tr>
	<td colspan='9' style='background: #369; font-size:12px; color:#fff; font-family: Arial; text-align: right; font-weight: bold; padding: 5px'>Total</td>
	<td style='background: #369; font-size:12px; color:#fff; font-family: Arial; text-align: right; font-weight: bold;'>".number_format($ttotalprice, 2)."</td>
	<td colspan='2' style='background: #369; font-size:12px; color:#fff; font-family: Arial; text-align: right; font-weight: bold'>".number_format($ttotalcost, 2)."&nbsp;&nbsp;&nbsp;".number_format(($ttotalprice-$ttotalcost), 2)." &nbsp;</td>
</tr>";

echo "</table>";  }

?>

</body>
</html>