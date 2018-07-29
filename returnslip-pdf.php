<?php require_once('conn.php'); 
require('../pdftest/html2pdf.class.php');

$sqs = "select * from return_slip_tb where slip_id='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');
$rws = mysql_fetch_assoc($ress);
  
$path = "/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";

$html2pdf = new HTML2PDF('P','A4','en');

$messagee  = '

<page>

<br>
<table width="1500px" border="0">
   <tr> 
    <td><img src="http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="200"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1"> Return Slip</h1>
	<br> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Return Date:   </strong>'.$rws[date1].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>RMA#:   </strong>'.$rws[rma].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp; 
	<strong>Return Slip No:  </strong>'.($rws[slip_id]+10001).'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Our Order No:  </strong>'.$rws[our_ord_num].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>SHIPPED VIA:   </strong>'.( $rws['svia'] != 'Other' ? $rws['svia'] : (trim($rws['svia_oth']) == '' ? 'Other' : $rws['svia_oth'] ) ).'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Vendor contacts:</strong>';	

$sqia = "SELECT vmc.name, vmc.lastname,  vmc.phone, mcrs.maincontid
FROM  vendor_maincont_tb vmc
INNER JOIN maincont_returnslip mcrs
ON vmc.enggcont_id = mcrs.maincontid
where slipid='".$rws['slip_id']."'";
                                                   
$resva = mysql_query($sqia) or die('err');

while($rwva = mysql_fetch_assoc($resva)) {

	$messagee  .= '<br>	&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
	&nbsp;'.$rwva[name].' '.$rwva[lastname].' '.$rwva[phone];
}

// Vendor details
$sqv = "select * from vendor_tb where data_id='".$rws['vid']."'";
$resv = mysql_query($sqv) or die('error in data');
$rowv = mysql_fetch_assoc($resv);
/*****************************************/

//Shipped to details
$temp1 = substr($rws['sid'], 0, 1);
$temp2 = substr($rws['sid'], 1);

if ($temp1 == 'c') 
	$sqs1 = "select * from data_tb where data_id='".$temp2."'";
else      
	$sqs1 = "select * from shipper_tb where data_id='".$temp2."'";

$res1 = mysql_query($sqs1) or die('error in data');
$rws1 = mysql_fetch_assoc($res1);
/*****************************************/

	
$messagee .= '<br>	
	</td>
    </tr>
  </table> 
  
<table width="1500px" border="0">
<tr> 
	<td><strong>PCBs Global Incorporated</strong> <br>
	2500 E. La Palma Ave.<br>
	Anaheim Ca. 92806<br>
	Phone: (855) 722-7456<br>
	Fax: (855) 262-5305<br>	
	</td>  
	<td width="250"></td>
	<td></td>
</tr>
</table>  
<br><br>
  
<table width="1000px" border="0">
<tr> 
	<td width="300" style="background-color:#656BBC; color:#FFF;" >VENDOR</td>  
	<td width="50"></td>
	<td width="300" style="background-color:#656BBC; color:#FFF;" >SHIPPED TO</td>
	<td width="50"></td>
</tr>

<tr> 
	<td style="vertical-align:top;">
	<table width="250" border="0">';

	if ($rowv[c_name] != '')
		$messagee.=	'<tr><td>'.$rowv[c_name].'</td></tr>';

	if ($rowv[c_address] != '')
		$messagee.=	'<tr><td>'.$rowv[c_address].'</td></tr>';

	if (($rowv[c_address2] != '') or ($rowv[c_address3] != ''))
		$messagee .=	'<tr><td>'.$rowv[c_address2].'  '.$rowv[c_address3].'</td></tr>';

	if ($rowv[c_phone]!='')
		$messagee .=	'<tr><td>Phone '.$rowv[c_phone].'</td></tr>';

	if ($rowv[c_fax]!='')
		$messagee .=	'<tr><td>Fax '.$rowv[c_fax].'</td></tr>';

	if ($rowv[c_website] != '')
		$messagee .=	'<tr><td>'.$rowv[c_website].'</td></tr>';

$messagee .= '</table>	
	</td>

    <td></td>  
	
	<td style="vertical-align:top;" >
	<table width="250" border="0">	';

	if ($rws1['c_name'] != '')
		$messagee .= '<tr><td>'.$rws1['c_name'].'</td></tr>';

	if ($rws1['c_address'] != '')
		$messagee.=	'<tr><td>'.$rws1['c_address'].'</td></tr>';

	if (($rws1['c_address2'] != '') or ($rws1['c_address3'] != ''))
		$messagee.=	'<tr><td>'.$rws1['c_address2'].'  '.$rws1['c_address3'].'</td></tr>';

	if ($rws1['c_phone'] != '')
		$messagee.=	'<tr><td>Phone '.$rws1['c_phone'].'</td></tr>';

	if ($rws1['c_fax'] != '')
		$messagee.=	'<tr><td>Fax '.$rws1['c_fax'].'</td></tr>';

	if ($rws['delto'] != '')
		$messagee .= '<tr><td> <strong>Delivered to</strong>: '.$rws['delto'].'</td></tr>';
	
$messagee .= '</table></td>
	<td></td>  	
</tr>	  
</table> <br><br>
  
<table width="1000px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="50">ITEM #</td>  
	<td width="100">PART NUMBER</td>
	<td width="40">REV</td>
	<td width="40">LYRS</td>
	<td width="275">DESCRIPTION</td>
	<td width="90" >QTY REC.</td>
	<td width="90">QTY REJ.</td>	
</tr>'; 
  
$sqi = "select * from return_items_tb where slipid='".$rws['slip_id']."'";

$resi = mysql_query($sqi) or die('error in data');

$totq = 0;
$qtot = 0;
$j = 0;

while($rwi = mysql_fetch_assoc($resi)) { 

	$messagee .= '

	<tr style="text-align:center ;font-size: 10pt;"> 
		<td>'.$rwi[item].'</td>
		<td>';
		
	if($j == 0)  $messagee .=	$rws['part_no'] ;

	$messagee .= '</td><td>';	
	if($j == 0)  $messagee.=	$rws['rev'] ;

	$messagee.='</td><td>';	

	$pieces = explode("Lyrs", $rws['no_layer']);
	$pno = $pieces[0]; // piece1

	if($j == 0)  $messagee .= $pno ;

	$messagee .= '</td>';

	$messagee .= '<td> '; 
		
	$messagee .=
		$rwi['itemdesc'].'</td>
		<td>'.$rwi['qtyrec'].'</td>
		<td>'.$rwi['qtyrej'].'</td>	
	</tr>'; 

	$tottt = str_replace(',', '', $rwi['qtyrec']);
	$qtot = $qtot + number_format(intval($tottt), 2, '.', '');

	$tottt22 = str_replace(',', '', $rwi['qtyrej']);
	$totq = $totq + number_format($tottt22, 2, '.', '');

	$j++;
}

$qtot = number_format($qtot, 0, '', ',');
$totq = number_format($totq, 0, '', ',');
 
$messagee .= '

</table>  <br><br>  

<br><br>
<table width="1500px" border="0">
<tr > 
	<td width="720" ><hr > 	</td> 	
</tr>
</table>  

<table width="1500px" border="0">
<tr> 
	<td width="520"><br></td>  
	<td  width="100" ><strong>Total <br>Received &nbsp;</strong>'.$qtot.'</td>
	<td  width="125"><strong>Total <br>Rejected </strong>  '.$totq.'</td>
</tr>
</table> <br><br>  
 
 <table width="1500px" border="0">
 
 <tr style="font-size: 10pt;"> 
     
	<td width="225" colspan="2"><br>

 <br>If you have any issues with your order, please contact: <br>  
	Armando Torres <br>  
	714-553-7047<br> 
	armando@pcbsglobal.com<br> 
	<strong></strong><br>'.$rws['comments']. '<br>
	
	</td>
	<td  width="75" ></td>
	<td  width="200"></td>
	<td  width="25"> </td>
</tr>

</table> <br><br>  
 
<p style="font-size: 12pt">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;	
THANK YOU FOR YOUR BUSINESS AND TRUST!</p>
 
</page>  ';  

/*echo $messagee;
exit;*/

$rsid = $rws['slip_id'] + 10001;

$html2pdf->WriteHTML($messagee);

if ($_REQUEST['oper'] == 'view'){
	$html2pdf->Output('exemple.pdf');
} else {   

	$filename="retslippdf/RS-$rsid-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename, 'F');
	$filename="RS-$rsid-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename, 'D');  
}


?>
