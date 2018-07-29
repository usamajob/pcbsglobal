<?php require_once('conn.php'); 
require('../pdftest/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','en');

$invlist = explode('|', $_GET['inv']);
$sqlr = "select * from rep_tb where repid = '".$_GET['repid']."'";
$resr = mysql_query($sqlr) or die('errorn in data');
$rowr = mysql_fetch_assoc($resr);

$sqli = "select * from invoice_tb where invoice_id in ('".implode("','", $invlist)."') order by invoice_id desc";
$resi = mysql_query($sqli) or die('errorn in data');

$messagee  = '<page backtop="70mm" backbottom="10mm" backleft="0mm" backright="10mm" pagegroup="new">
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
		<td width="800"><h1 style="font-size: 20pt; color:#5660B1">Sales Commission Report - '.$rowr['r_name'].'</h1></td>
		<td style="font-size: 16pt;">'.date("m-d-Y").'</td>
	</tr>
	</table>
	
	<table border="0">
	<tr style="background-color: #656BBC; color: #fff; text-align: center; font-size: 11pt;"> 
		<td width="150" style="padding-top:3px; padding-bottom:3px;">Customer</td>  
		<td width="100">Part Number</td>
		<td width="30">Rev</td>
		<td width="130">Ordered By</td>
		<td width="70">Invoice#</td>
		<td width="90">Invoiced On</td>
		<td width="150">Commission Due By</td>	
		<td width="150">Commission Pain On</td>	
		<td width="80">Commission</td>	
	</tr>
	</table>
</page_header>';

$messagee .= "<table border='0'>";

while($rwi = mysql_fetch_assoc($resi)) { 
	$messagee .= ' <tr style="text-align: center; font-size: 10pt;"> 
    <td width="150" align="left">'.$rwi['customer'].'</td>
	<td width="100">'.$rwi['part_no'].'</td>
	<td width="30">'.$rwi['rev'].'</td>
	<td width="130">'.$rwi['ord_by'].'</td>
	<td width="70"> '.($rwi['invoice_id']+9976).'</td>
	<td width="90">'.$rwi['podate'].'</td>
	<td width="150">'.($rwi['due_date'] == '' ? 'Pending' : $rwi['due_date']).' </td>
	<td width="150">'.($rwi['com_date'] == '' ? 'Pending' : $rwi['com_date']).' </td>
	<td width="80" align="right">$'.$rwi['comval'].' </td>
	</tr>'; 
	$totfinal = $totfinal + $rwi['comval'];
}

$messagee .= '
</table><br>  

<table border="0">
<tr > 
    <td width="1000" > <hr > </td>  	
</tr>
</table> 

<table border="0">
<tr > 
	<td width="150"></td>  
	<td width="100"></td>
	<td width="30"></td>
	<td width="130"></td>
	<td width="70"></td>
	<td width="90"></td>
	<td width="150"></td>	
	<td width="150" align="right"><strong>TOTAL</strong></td>	
	<td width="80" align="right">$'.format_num($totfinal).'</td>	
</tr>
</table> 
 
</page>';

$html2pdf->WriteHTML($messagee);
if ($_GET['oper'] == 'view') {
	$html2pdf->Output('exemple.pdf');
} else {	
	
	$filename = "salesreppdf/".$rowr['r_name']."_Sales Commissions Report_".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename,'F');
	$filename = $rowr['r_name']."_Sales Commissions Report_".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename, 'D');  
}

?>