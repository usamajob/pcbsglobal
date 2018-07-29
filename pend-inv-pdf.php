<?php require_once('conn.php'); 
require('../pdftest/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','en');
$messagee  = '
<page backtop="68mm" backbottom="10mm" backleft="0mm" backright="10mm" pagegroup="new">
<page_header>
	<table border="0">
	<tr> 
		<td>
			<img src="images/logopdf.jpg" width="1050" height="150" alt="PCBsGlobal Inc. Logo">		
		</td>
	</tr>
	</table>

	<table border="0">
	<tr> 
		<td width="700"><h1 style="font-size: 24pt; color:#5660B1">Past Due Invoices</h1></td>
		<td style="font-size: 16pt;">'.date("m-d-Y").'</td>
	</tr>
	</table>

	<table border="0">
	<tr style="background-color: #656BBC; color: #fff; text-align: center; font-size: 11pt;"> 
		<td width="20" style="padding-top:3px; padding-bottom:3px;" >#</td> 
		<td width="100">Sold To</td>
		<td width="170">Ship To</td>
		<td width="140">Part Number</td>
		<td width="50">Rev</td>
		<td width="115">Purchase Order</td>
		<td width="50">Qty</td>
		<td width="90">Shipped On</td>
		<td width="65">Invoice #</td>
		<td width="90">Invoice Date</td>
		<td width="100">Total</td>
	</tr>
	</table>
</page_header>';

/*<page_footer>
	<p style="font-size: 12pt; text-align: center;">	
	THANK YOU FOR YOUR BUSINESS AND TRUST!</p>
</page_footer> */

$sqs = "select * from invoice_tb where customer='".$_REQUEST['cust']."' and pending='Yes' order by invoice_id";
$ress = mysql_query($sqs) or die('errorn in data');

$totfinal = 0;
$j = 1;
$messagee .= "<table border='0'>";
while($rws = mysql_fetch_assoc($ress)) {
	if($rws['selected']=="yes"){

	$pno = $rws['part_no'];
	$rev = $rws['rev'];
	$cname = $rws['customer'];  
	  
	$query11 = "select * from porder_tb where part_no='$pno' and rev='$rev' and customer='$cname' limit 1";
	$result11 = mysql_query($query11) or die();
	$row11 = mysql_fetch_assoc($result11);

	$po = $row11['poid'];
	if ($po > 0) $po = $po + 9933;
	else $po = '';

	$inv = $rws['invoice_id'] + 9976;

	$sqv = "select * from data_tb where data_id='".$rws['vid']."'";
	$resv = mysql_query($sqv) or die('error in data');
	$rwv = mysql_fetch_assoc($resv); 
	
	$tot = 0;
	$qty2 = 0;
		 
	$sqi = "select tprice, qty2 from invoice_items_tb where pid='".$rws['invoice_id']."' order by item desc";
	$resi = mysql_query($sqi) or die('error in data');
	if(mysql_num_rows($resi) > 0) {
	while($rwi = mysql_fetch_assoc($resi)){
		$tot += $rwi['tprice'];
		$qty2 = $rwi['qty2'];
	}
	}

	$fcharg = 0;
	$taxx = 0;
	$tot2 = 0;	

	$st = $rws['saletax'] * 1;
	$taxx = $tot * $st;
	$fcharg = $rws['fcharge'] * 1;
	$tot2 =   $fcharg + $tot + $taxx ;

	$arr =  explode("/", $rws['podate']);			
	$done_date = $arr[0] . "-" . $arr[1] . "-" . $arr[2];
	$arr =  explode("-", $rws['date1']);			
	$done_date2 = $arr[1] . "-" . $arr[2] . "-" . $arr[3];

	$shipto = '';
	if(substr($rws['sid'],0,1) == 'c') {
		$query2 = "select c_shortname from data_tb where data_id='".substr($rws['sid'],1)."' limit 1";
		$result2 = mysql_query($query2) or die();
		$row2 = mysql_fetch_assoc($result2);
		$shipto = $row2['c_shortname']; 
	}
	else {
		$query3 = "select c_name from shipper_tb where data_id='".substr($rws['sid'],1)."' limit 1";
		$result3 = mysql_query($query3) or die();
		$row3 = mysql_fetch_assoc($result3);
		$shipto = $row3['c_name']; 
	}	

	//$date1 = substr($rws['date1'], -10);
	
//for($i=1; $i<40; $i++) {
 	$messagee .= "<tr>";
	$messagee .= "<td width='20' align='center'>".$j."</td>";
	$messagee .= "<td width='100'>&nbsp;&nbsp;".$rwv['c_shortname']."</td>";
	$messagee .= "<td width='170'>".( trim($rws['pdfshipto']) != '' ? $rws['pdfshipto'] : str_replace('(','<br>(',$shipto))."</td>";
	$messagee .= "<td width='140'>&nbsp;&nbsp;".$rws['part_no']."</td>";
	$messagee .= "<td width='50' align='center'>".$rws['rev']."</td>";
	$messagee .= "<td width='115' align='center'>".$rws['po']."</td>";
	$messagee .= "<td width='50' align='center'>".( $rws['qty'] > 0 ? $rws['qty'] : $qty2 )."</td>";
	$messagee .= "<td width='90' align='center'>".$done_date2."</td>";
	$messagee .= "<td width='65' align='center'>".$inv."</td>
	<td width='90' align='center'>".$done_date."</td>
	<td width='100' align='right'>$".format_num($tot2)."&nbsp;&nbsp;</td>";
	$messagee .= "</tr>";
	
	$j++;
//}
	$totfinal = $totfinal + $tot2;
	}
}////////

$messagee .= '
</table><br><br>  

<table border="0">
<tr > 
    <td width="1050" > <hr > </td>  	
</tr>
</table> 

<table border="0">
<tr > 
	<td width="860"></td>
	<td width="70"><strong>TOTAL</strong></td>
	<td width="100" align="right"> $'.format_num($totfinal).'</td>
</tr>
</table> 
 
</page>';
  
$html2pdf->WriteHTML($messagee);

if ($_REQUEST['oper'] == 'view') {
	$html2pdf->Output('exemple.pdf');
} else {		
	$filename = "invoicepdf/PastDueInvoices-".$_REQUEST['cust']."-".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename,'F');
	$filename="PastDueInvoices-".$_REQUEST['cust']."-".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename,'D');  
}

?>