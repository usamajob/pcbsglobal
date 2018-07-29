<?php require_once('chksess.php'); ?>
<?php require_once('conn.php');
$title = "Orders Placed";

if($_POST['act'] != "") {
	$val = $_POST['act'];
	$val1 = $_POST['txtchk'];
	if($val1 != "")
		$squp = "update porder_tb set allow=1 where poid='".$val."'";
	else
		$squp = "update porder_tb set allow='' where poid='".$val."'";

	$resup = mysql_query($squp) or die('error in data');
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
<script type="text/javascript" src="ajax.js"></script>
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

		$j('.ttip_overlay_trig2').hover(function(){
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
	$ord_by = ' ORDER BY p.poid ';

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
	$wherestr = " where (p.cancel <> 1 AND p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) ";
	$excel_link = '';

	if( isset($_GET['hidden']) ) {
		if($_GET['hidden'] == 'po') $wherestr = " where p.status = 'hide' ";
		else $wherestr = " where i.status = 'hide' ";
	}

	function frmt_datestr($dd) {
		$dd_parts = explode('/', $dd);
		return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
	}

	$st_date = frmt_datestr(trim($_GET['st_date']));
	$en_date = frmt_datestr(trim($_GET['en_date']));
	$part_no = trim($_GET['srchpn']);
	$customer = trim($_GET['srchc']);
	$vendor = trim($_GET['srchv']);

	if (strlen($st_date) > 2 && strlen($en_date) > 2) {
		$wherearr[] = "
		( unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')
		AND unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "')  )

		";
	}

	if(strlen($part_no) > 1)
		$wherearr[] = " p.part_no = '".$part_no."'";

	if(strlen($customer) > 1)
		$wherearr[] = " p.customer = '".$customer."'";

	if(strlen($vendor) > 1)
		$wherearr[] = " v.c_shortname = '".$vendor."'";

	if(count($wherearr) > 0)
		$wherestr .= " AND ".implode(' AND ', $wherearr);

	if( isset($_GET['withinv']) ) {
		if( $_GET['withinv'] == 'yes' ){
			$wherestr .= " AND i.invoice_id is not null ";
		}
		if( $_GET['withinv'] == 'no' ) {
			$wherestr .= " AND i.invoice_id is null ";
		}
	}

	if( isset($_GET['tbd']) && $_GET['tbd'] == '1') {
		$wherestr .= " AND p.po like 'TBD' ";
	}

	$requestStr = '';

	foreach($_GET as $gk => $gv) {
		if($gk != 'ord')
			$requestStr .= '&'.$gk.'='.trim($gv);
	}

	if($vendor != '')
		$excel_link = "&nbsp; &nbsp; :: &nbsp; &nbsp;<a href='generate-excel.php?".substr($requestStr, 1)."'>WIP Excel</a>";

	$excel_link2 = "&nbsp; &nbsp; :: &nbsp; &nbsp;<a href='generate-status-report.php".($requestStr != '' ? '?'.(substr($requestStr, 1)) : '')."'>Status Report</a>";

	$sqlp = "select p.*, i.invoice_id, i.podate invoicedon, v.c_shortname vc,
	unix_timestamp(str_to_date(p.dweek,'%m-%d-%Y')) dw
	from porder_tb p
	LEFT OUTER JOIN invoice_tb i on
	(p.part_no = i.part_no AND p.rev = i.rev AND p.po = i.po)
	LEFT OUTER JOIN vendor_tb v on v.data_id = p.vid
	$wherestr group by p.poid
	$ord_by LIMIT 200";

	// echo $sqlp;

	$resp = mysql_query($sqlp) or die(mysql_error()."<br>".$sqlp."<br>Unable fetch order records!");

//echo "<pre>"; print_r($_SERVER); echo "</pre>";
	?>

	<div id="main" style='top: 55px; z-index: 10'>

		<!-- /** Search form ********/ -->
		<form name="form1" method="get" action="">
			<input type="hidden" name="withinv" value="<?php echo $_GET['withinv'] ?>">
			<input type="hidden" name="tbd" value="<?php echo $_GET['tbd'] ?>">
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
					<td width="11%"><input name="st_date" type="text" id="st_date" size="12" value="<?php echo trim($_GET['st_date']) ?>" ></td>
					<td width="3%"><strong>To</strong></td>
					<td width="11%"><input name="en_date" type="text" id="en_date" size="12" value="<?php echo trim($_GET['en_date']) ?>" ></td>
					<td><input type="text" name="srchpn" id="srchpn" size="25"></td>
					<td><input type="text" name="srchc" id="srchc"></td>
					<td><input type="text" name="srchv" id="srchv"></td>
				</tr>

				<tr height='20'><td colspan='10' align='left'><a href="orders_stats.php">All Orders</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="orders_stats.php?withinv=yes<?php echo ($requestStr != '' ? str_replace('&withinv=no', '', str_replace('&withinv=no', '', $requestStr)) : '') ?>">Orders with Invoice</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="orders_stats.php?withinv=no<?php echo ($requestStr != '' ? str_replace('&withinv=yes', '', str_replace('&withinv=no', '', $requestStr)) : '') ?>">Orders without Invoice</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="orders_stats.php?tbd=1<?php echo ($requestStr != '' ? str_replace('tbd=1', '', $requestStr) : '') ?>">Orders TBD</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="manage_purchase.php?hidden=1" target='new'>Hidden PO Orders</a>&nbsp; &nbsp; :: &nbsp; &nbsp;<a href="manage_invoice.php?hidden=1" target='new'>Hidden Invoices</a><?php echo $excel_link.$excel_link2 ?></td></tr>
			</table>

		</form>

		<table width='100%' class='headrow' border='0'>
			<tr>
				<td width='5%'><a href="orders_stats.php?<?php echo ($snum1 == 1 ? 'ord=2' : '').$requestStr ?>">Ord# <?php echo $arrow1 ?></a></td>
				<td width='9%'><a href="orders_stats.php?ord=<?php echo ($snum2 == 1 ? '4' : '3').$requestStr ?>">Customer <?php echo $arrow2 ?></a></td>
				<td width='10%'>P/N</td>
				<td width='4%'>Rev</td>
				<td width='9%'><a href="orders_stats.php?ord=<?php echo ($snum3 == 1 ? '6' : '5').$requestStr ?>">Due Date <?php echo $arrow3 ?></a></td>
				<td width='10%'>Customer PO</td>
				<td width='6%'>Our PO</td>
				<td width='8%'><a href="orders_stats.php?ord=<?php echo ($snum4 == 1 ? '8' : '7').$requestStr ?>">Vendor <?php echo $arrow4 ?></a></td>
				<td width='3%'>WT</td>
				<td width='6%'>Inv. #</td>
				<td width='8%'>Invoiced on</td>
				<td width='8%'>Credit#</td>
				<td width='6%'>Expected Dock</td>
				<td width='6%'>Cust. D/D</td>
				<td width='10%'>Note</td>
			</tr>
		</table>
		<?php
		echo "<div class='fr' style='padding-right: 5px; font : 11px Verdana; color: #000; background: #fff'><b>Total: ".mysql_num_rows($resp)." records</b></div>";
		echo "</div>
		<div class='clear'><br><br><br><br><br></div>";

		if(mysql_num_rows($resp) > 0) {
			echo "<table width='100%' border='0' >";

			$ct = 0;
			$ttotalprice = 0;
			$ttotalcost = 0;
			$tprofit = 0;
			$dweek = '';

			while($rowp = mysql_fetch_assoc($resp)) {
				$ct++;

	/*if($dweek != $rowp['dweek'] && $ct > 1 && strstr($ord_by, ' ORDER BY dw ') )
	echo "<tr style='height: 8px; background: #9cf'><td colspan='12'></td></tr>";*/

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
	<td width='10%' class='ctr'><a class='cusDueDate' id='".$rowp['poid']."'>".$rowp['part_no']."</a>
	<input id='cusDueDateVal".$rowp['poid']."' value='".$rowp['cus_due']."' type='hidden'/>
	<input id='expectedDockVal".$rowp['poid']."' value='".$rowp['supli_due']."' type='hidden'/>
	</td>
	<td width='4%' class='ctr'>".$rowp['rev']."</td>


	<td width='9%'>";
	/* Customer Details */
	echo "<a class='ttip_overlay_trig2' href=\"javascript:void(0)\">".$rowp['dweek']."</a>";
	echo"
	<div class='ttip_overlay' style='position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999'> <a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#cd0000;float:right'>Close</a>";
	echo "<h3>Note</h3>
	<p>";
	echo $rowp['note'];
	echo "</p>
	</div>";
	echo"
	</td>
	<td width='10%' class='ctr'>".$rowp['po']."</td>
	<td width='6%' class='ctr'><a target='new' href='edit_purchase.php?id=".$rowp['poid']."'>".($rowp['poid']+9933)."</a></td>
	<td width='8%' class='ctr'>".$rowp['vc']."</td>
	<td width='3%'>
	"; ?>
	<input type="checkbox" name="" id="<?php echo $rowp['poid']; ?>"  <?php echo ($rowp['allow'] == "true") ? "checked=\"checked\"" : ""; ?>  value="<?php echo $rowp['poid']; ?>" title="is processed" onclick="doAction(this.value, this.checked);" />


	<?php echo "</td>

	<td width='6%' class='ctr'>".(!is_null($rowp['invoice_id']) ? "<a href='edit_invoice.php?id=".$rowp['invoice_id']."' target='new'>".($rowp['invoice_id']+9976)."</a>" : "")."</td>
	<td width='8%' class='ctr'>".(!is_null($rowp['invoicedon']) ? $rowp['invoicedon'] : "")."</td>";

	echo "<td width='8%' class='ctr'>";

	$morestr = '';

	$cr = $rowp['invoice_id'] + 9976;
	$sqcr = "select * from credit_tb where inv_id='".$cr."'";
	$rescr = mysql_query($sqcr) or die('error in data');

	if(mysql_num_rows($rescr) > 0) {
		$rwcr = mysql_fetch_assoc($rescr);
		echo ($rwcr['credit_id']+10098);
		echo " <a href='downloadc-pdf2.php?id=".$rwcr['credit_id']."&oper=view' target='new'>V</a>&nbsp;
		<a href='edit_credit.php?id=".$rwcr['credit_id']."' target='new'>E</a>&nbsp;<a href='downloadc-pdf2.php?id=".$rwcr['credit_id']."'>D</a>";
	}

	echo "
	</td>
	<td>".$rowp['supli_due']."</td>
	<td>".$rowp['cus_due']."</td>
	<td width='3%' class='ctr'><button onclick='openNote(".$rowp['poid'].")'>Note</button></td>
	<div id='".$rowp['poid']."note' style='min-width:400px;min-height:150px;background:#fff;border:1px solid;color:#000;position:fixed;top:30%;left:40%;padding:15px;display:none;'>
	Your Note For Ord# :".$rowp['poid']."<form method='POST'  id='noteform' ><textarea style='width:100%;min-height:100px;' id='".$rowp['poid']."'>".$rowp['note'] ."</textarea><br><input type='button' value='Submit' onclick='addNote(".$rowp['poid'].")'><input  type='button' value='close' onclick='closing(".$rowp['poid'].")'></form
	</div>
	</tr>";

	$dweek = $rowp['dweek'];
}

echo "</table>";  }

?>
<div id="customer_dueDate" style="display: none;position: absolute;z-index: 9999;background: red;">

</div>
<script>


	jQuery(".cusDueDate").click(function(){
		document.getElementById("customer_dueDate").style.display="block";

		var id = jQuery(this).attr('id');
		var cus_duedate = document.getElementById("cusDueDateVal"+id).value;
		var cus_duedate2 = document.getElementById("expectedDockVal"+id).value;
		//alert(cus_duedate);
		jQuery("#customer_dueDate").replaceWith("<div class='graybackground' id='c'><div class='cus_due' >"
			+"<input type='hidden' value='"+id+"' id='proder'>Expected Dock Date<br><input type='text' value='"+cus_duedate+"' id='datepicker2' onclick='OnclickCal()'>Customer's Due Date<br><input type='text' value='"+cus_duedate2+"' onclick='OnclickCal()' id='datepicker1'><br><br><input type='button' value='Submit' onclick='submit_cus()'>&nbsp&nbsp<input type='button' onclick='opupcloase()' id='close' value='close'>"
			+"</div></div>");
		OnclickCal();
	});

	function OnclickCal(){
		jQuery( "#datepicker1" ).datepicker();
		jQuery( "#datepicker2" ).datepicker();
	}

	function submit_cus(){
			var url = "update_cusduedate.php"; // /Controller/Action
			var idd = document.getElementById("proder").value;
			var cus_duee = document.getElementById("datepicker1").value;
			var sup_duee = document.getElementById("datepicker2").value;


			jQuery.ajax({
				url: url,
				data: { Id: idd, cus_due:cus_duee, sup_due:sup_duee },
				cache: false,
				type: "GET",
				success: function (response) {
			        //alert(response.status);
			        //alert("succ");
			    },
			    error: function () {
			        //alert("error");
			        //alert("fail");
			    }
			});
			jQuery("#c").replaceWith("<div id='customer_dueDate' style='display: none;position: absolute;z-index: 9999;background: red;'>");
            //alert(idd+"---"+cus_duee+"---"+sup_duee);
        }


        function opupcloase(){
        	jQuery("#c").replaceWith("<div id='customer_dueDate' style='display: none;position: absolute;z-index: 9999;background: red;'>");

        }

        function openNote(id){
        	var thisi = id+'note';
        	document.getElementById(thisi).style.display="block";



		//alert("hi");
	}
	function doAction(record_id, status) {

		if(status == true){
				//alert('selected so should be checked here after');
				addCheckMark(record_id,status);
			}
			else {
				//alert('de selected so should NOT be checked here after');
				addCheckMark(record_id,status);

			}
		}
		function addCheckMark(record_id, status) {

			var url = "order_states_ajax_check.php";
			url = url+"?record_id="+record_id;
			url = url+"&status="+status;
			url = url+"&sid="+Math.random();
			//alert(url);

			$j.post(url, function(txt) {
				if(txt != '') {
					$j('#display_area').html(txt);
				}
			});

		}

		function closing(id){
			var thiid = id+'note';
			document.getElementById(thiid).style.display="none";
		}





	</script>


</body>
</html>
