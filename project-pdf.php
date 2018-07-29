<?php 
$misccharge =	0;
$nre		=	0;
require_once('conn.php');

require('../pdftest/html2pdf.class.php');
session_start();

$sql = "select *  from project_tb where pid='".$_REQUEST['id']."'";
$res = mysql_query($sql) or die('error in data');
$row = mysql_fetch_assoc($res);

$projname = $row['project_name'];
$projdate = $row['create_dt'];
$projvalid = $row['validity'];

$sqlq = "select p.*, o.* from project_quotes p inner join order_tb o on p.quote_id=o.ord_id where p.pid='".$_REQUEST['id']."'";

$resq = mysql_query($sqlq) or die('error in data');

/************************************************************/

$path = "/home/pareomic/public_html/pcbsglobal.com/luke-pdf/upload/";

$html2pdf = new HTML2PDF('L','A4','en');

$bprice = 2;

$table = '';
$total = 0;

while($rowq = mysql_fetch_assoc($resq)) {

	//echo "<pre>";print_r($rowq);exit;	

	for($i = 1; $i <= 5; $i++) {

		$leadtm = $rowq['day'.$i];

		$tvar = 'd'.$i;

		if($leadtm == 7 ) 
			$$tvar = $bprice;

		if($leadtm == 1 ) 
			$$tvar = $bprice + ($bprice*(250/100));

		if($leadtm == 2 ) 
			$$tvar = $bprice + ($bprice*(200/100));

		if($leadtm == 3 ) 
			$$tvar = $bprice + ($bprice*(150/100));

		if($leadtm == 4 ) 
			$$tvar = $bprice + ($bprice*(100/100));
	}
	// end of day

	for($i = 1; $i <= 10; $i++) {

		$tvar = 'qnt'.$i;

		$$tvar = $rowq['qty'.$i];
		$tvar2 = 'q'.$i;

		if($$tvar >= 250 ) 
			$$tvar2 = $bprice;

		if($$tvar <= 100 ) 
			$$tvar2 = $bprice + ($bprice*(150/100));

		if($$tvar <= 50 ) 
			$$tvar2 = $bprice + ($bprice*(200/100));

		if($$tvar <= 10 ) 
			$$tvar2 = $bprice + ($bprice*(250/100));
	}
	// end of quantity

	$bp = $rowq['price'];

	for($i = 1; $i <= 10; $i++) {
		for($j = 1; $j <= 5; $j++) {
			$k = ( 5 * ($i - 1) ) + $j;
			$tvar3 = 'pr'.$k;
			$tvar4 = 'd'.$j;
			$tvar5 = 'q'.$i;
			$$tvar3 = $$tvar4 + $$tvar5 + $bp;
			$m = (10 * $i) + $j;
			$$tvar3 = $rowq['pr'.$m];
		}
	}

	for($m = 1; $m <= 50; $m++) {
		$var = 'pr'.$m;
		if($$var != "") {
			$$var = format_num($$var);
		}
	}

	if ($rowq['no_layer'] == 'single')
		$nol = '1';
	else if ($rowq['no_layer'] == 'Double Sided')
		$nol = '2';
	else if ($rowq['no_layer'] == '4Lyrs')
		$nol = '4';
	else if ($rowq['no_layer'] == '6Lyrs')
		$nol = '6';
	else if ($rowq['no_layer'] == '8Lyrs')
		$nol = '8';
	else if ($rowq['no_layer'] == '10Lyrs')	
		$nol = '10';
	else 
		$nol = $rowq['no_layer']. '';

	$ccharge = $rowq['ccharge'];
	$cancharge = $rowq['cancharge'];
	$thickness = $rowq['thickness'];
	$thickness_tole = $rowq['thickness_tole'];
	$fob = $rowq['fob'];
	$fob_oth = $rowq['fob_oth'];
	$ipc_class = $rowq['ipc_class'];

	$extchrges = $rowq['misccharge'] + $rowq['necharge'] + $rowq['descharge1'] + $rowq['descharge2'];

	$tot = ( $rowq['qty1'] * str_replace(",", "", $pr1) ) + $extchrges;
	 
	$table .= '
	 <tr>
		<td> '.$rowq['part_no'].' '.$rowq['rev'].'</td>		 
		<td> ';

		if($rowq['array'] == 'YES')
			$table .= '<strong>'.$rowq['array_size1'].' X '.$rowq['array_size2'].' ('.$rowq['b_per_array'].') Up</strong> ';

		$table .= '</td>';
		$day1 = $rowq['day1'];

		if($day1 > 0)
			$table .= '<td> $'.format_num($tot).'</td>
			<td> $'.$pr1.'</td>
			<td> '.$rowq['qty1'].'</td><td> $'.$extchrges.'</td>';

		$table .= '
		<td> '.$rowq['m_require'].'</td>
		<td> '.$rowq['finish'].'</td>
		<td> '.$rowq[board_size1].' X '.$rowq[board_size2].'</td>
	</tr> ';
	
	$total = $total + $tot;  
	
	$con_impe_sing = $rowq['con_impe_sing'];
	$con_impe_diff = $rowq['con_impe_diff'];
	$tore_impe = $rowq['tore_impe'];
}	

if($total > 0) $table .= '<tr><td colspan="2"> <b>Total:</b></td><td> $'.format_num($total).'</td><td colspan="6"></td></tr>';

$message  = '<page>
<table border="0" >
<tr> 
	<td style="width:300px">
		<img src="http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="50px" height="40px" style="width:160px; height:180px; " alt="PCBsGlobal Inc. Logo">
	</td>  
	<td style="width:600px" style="vertical-align:top">

		<h1 style="font-size: 40pt;color:#5660B1">  Quotation &nbsp;&nbsp;</h1>

		<strong>PCBs Global Incorporated.</strong><br>
		Phone (855) 722-7456<br> 
		Fax: (855) 262-5305 <br>
		sales@pcbsglobal.com <br>
		Quote Prepared By: '.$_SESSION['uname'].'
	</td>	
	<td style="font-size: 18px;"><br><br><br>
	<b>Project No.: </b>#'.$_REQUEST['id'].'<br>
	<b>Project Name: </b>'.$projname.'<br>
	<b>Project Date: </b> '.date('d M Y', strtotime($projdate)).'<br>
	<b>Valid for: </b> '.$projvalid.' days<br>
	</td>	

</tr>
</table>

<table border="0" >

	<tr style="background-color:#656bbc; color:#fff; text-align: center; font-size: 18pt;">
		<td width="1000" height="25" ><b>Project Information</b></td>
	</tr>

	<tr><td height="3px" ></td></tr>
	</table>';

$message .= '
<table  border="1" cellspacing="0">
  <tr>
    <td style="width:120px" > PCB Type: <strong>'.$nol.'</strong> Lyr</td>
    <td style="width:150px"> Thick: <strong>'.$thickness.'</strong>';	
	
	if($thickness_tole != '')
		$message .= ' '.$thickness_tole;
	
	$message .= '</td>
	
	<td style="width:120px"> FOB:  <strong>'.($fob == 'Other' ? $fob_oth : $fob).'</strong>&nbsp;</td>
	<td style="width:100px"> IPC Class: <strong>'.$ipc_class.'</strong></td>
	
    <td style="width:160px"> Imp: <strong>';	
	
	if ( ($con_impe_sing != '') and ($con_impe_diff != '') )
		$message  .= '&nbsp;SE/Diff&nbsp; &nbsp;&nbsp;&nbsp;Tol:&nbsp;'.$tore_impe;
	else if ($con_impe_sing != '')
		$message  .= '&nbsp;SE&nbsp;&nbsp; &nbsp;&nbsp;Tol:&nbsp;'.$tore_impe;
	else if ($con_impe_diff != '')
		$message  .= '&nbsp;Diff&nbsp;&nbsp; &nbsp;&nbsp;Tol:&nbsp;'.$tore_impe;
	
	$message .= '</strong></td>
	<td style="width:300px"> Material, Array Info, Bd size, Finish:  <strong>See Below</strong></td></tr>
	</table><br>';

  $message .= '
    <table style=" text-align: center;" width="1100" border="1">
	<tr>
		<td colspan="2"></td>';
   
    if($day1 > 0)
		$message .= '<td colspan="4">'.$day1.' Days</td>';
   
    $message .= '<td colspan="3"></td></tr>

	<tr>
		<td width="120">Part Number</td>
		<td width="120">Panel Qty</td>';
   
    if($day1 > 0) $message .= '<td width="100">Total Price</td><td width="100">Piece Price</td>
		<td width="80">Qty</td><td width="80">NRE</td>';
   
    $message .= '			
		<td width="110">Material</td>
		<td width="80">Finish</td>
		<td width="120">Panel Size</td>
	</tr>'.$table;

$message  .= '</table>'; 

$message  .= '<br>
When placing your purchase order, please refer to the Project Number listed at the top of this page. <br>
Please feel free to call us should any requirements change.<br>

Thank you for the opportunity to quote your printed circuit board requirements.<br>

Sincerely,<br>
PCBsGlobal Inc. Sales Team.  

</page>';

$html2pdf->WriteHTML($message);

if ($_REQUEST['oper']  ==  'view') {
	$html2pdf->Output('exemple.pdf');
} else {

	if ($cancharge != 'yes') {		
		$filename = "quotationpdf/Project-$projname ".date("m-d-Y") . ".pdf";
		$html2pdf->Output($filename,'F');
		$filename = "Project-$projname ".date("m-d-Y") . ".pdf";
		$html2pdf->Output($filename,'D');
	}
	else {
		$filename = "quotationpdf/Project-".$projname."-Cancellation_".date("m-d-Y") . ".pdf";
		$html2pdf->Output($filename,'F');
		$filename = "Project-".$projname."-Cancellation_".date("m-d-Y") . ".pdf";
		$html2pdf->Output($filename,'D');
	}
}

?>