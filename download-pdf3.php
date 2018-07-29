<?php require_once('conn.php'); 
//require('../pdfclass/html2fpdf.php');

require('../pdftest/html2pdf.class.php');
$sqs = "select * from packing_tb where invoice_id='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');
$rws = mysql_fetch_array($ress);
  
$pno = $rws['part_no'];
$rev = $rws['rev'];
$cname = $rws['customer']; 

$query313 = "select * from data_tb where (data_id='$cname') limit 1";
/*echo $query11;
exit;*/
$result313 = mysql_query($query313) or die();
$row313 = mysql_fetch_object($result313);

$custname = $row313->c_name;        
   
$query11 = "select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$custname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$ordon = $row11->ordon; 
$po = $row11->poid;  
$ypo = $row11->po; 
if ($po > 0) $po = $po+9933;
else $po = '';


$path="/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";

/*$pdf=new HTML2FPDF();

$pdf->AddPage(); */
$html2pdf = new HTML2PDF('P','A4','en');

$sqv = "select * from data_tb where data_id='".$rws['vid']."'";
$resv = mysql_query($sqv) or die('error in data');
$rwv = mysql_fetch_assoc($resv);

$temp = $rws['sid'];
$temp1 = substr($temp, 0, 1);
$temp2 = substr($temp,1, strlen($temp));
// $temp2 = intval(temp2);
// exit();

if ($temp1 == 'c') 
	$sqs1 = "select * from data_tb where data_id='".$temp2."'";
else      
	$sqs1 = "select * from shipper_tb where data_id='".$temp2."'";
$res1 = mysql_query($sqs1) or die('error in data');
$rws1 = mysql_fetch_assoc($res1);

$sqs11 = "select * from data_tb where data_id='".$rws['customer']."'";
$res11 = mysql_query($sqs11) or die('error in data');
$rws11 = mysql_fetch_assoc($res11);

$inv = $rws['invoice_id'] + 9987;

$messagee  = '

<page>

<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="200"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1"   > Packing Slip</h1>
	<br>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Ordered Date:    </strong> '.$rws[odate].'<br>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Date:   </strong>'.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Our Order No:  </strong>'.$rws[our_ord_num].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp; 
	<strong>Packing Slip No:  </strong>'.$inv.'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp; 
	<strong>Purchase Order No:  </strong>'.$rws[po].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Acct No:   </strong>'.$rws11[e_other].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Cust ID:    </strong>'.$rws11[e_cid].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>SHIPPED VIA:   </strong>'.( $rws['svia'] != 'Other' ? $rws['svia'] : (trim($rws['svia_oth']) == '' ? 'Other' : $rws['svia_oth'] ) ).'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Customer contacts:</strong>';	   


$sqia = "SELECT maincont_tb.name, maincont_tb.lastname,  maincont_tb.phone,maincont_packing.maincontid
FROM maincont_tb
INNER JOIN maincont_packing
ON maincont_tb.enggcont_id=maincont_packing.maincontid
where packingid='".$rws['invoice_id']."'";
                                                   
$resva = mysql_query($sqia) or die('err');

while($rwva = mysql_fetch_array($resva)){

$messagee  .= '<br>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;'.$rwva[name].' '.$rwva[lastname].' '.$rwva[phone];
}

/*$sqv45="select * from maincont_tb where coustid='".$rws['customer']."'";

$resv45=mysql_query($sqv45) or die('err');
while($rwv45=mysql_fetch_array($resv45)) {
$messagee  .= '<br>	
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;'.$rwv45[name].' '.$rwv45[lastname].' '.$rwv45[phone];

}
*/	
	
$messagee  .=
	
	'<br>	
	</td>
    </tr>
  </table> 
  
<table width="1500px" border="0">
   <tr> 
    <td width="300">
	<strong>PCBs Global Incorporated</strong> <br>

2500 E. La Palma Ave.<br>
Anaheim Ca. 92806<br>
Phone: (855) 722-7456<br>
Fax: (855) 262-5305<br>	
	</td>  
	<td width="50"></td>
	<td width="300"><br><br> 
	<table border="0">
	<tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
	<td width="125">PART NUMBER</td>
	<td width="50">REV</td></tr>
	<tr style="text-align:center ;font-size: 10pt;"><td>'.$pno.'</td><td>'.$rev.'</td></tr>
	</table>
	
	</td>
    </tr>
  </table>  
  <br><br>
  
  <table width="1500px" border="0">
   <tr> 
    <td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">BILL TO</td>  
	<td  width="50"></td>
	<td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>
</tr>
	<tr> 
	<td width="50" ><table style="vertical-align:top;"  width="200" border="0">';

	if ($rwv[c_name] != '')
$messagee.=	'<tr><td>'.$rwv[c_name].'</td></tr>';

$messagee.=	'<tr><td> (Accounts Payable)</td></tr>';

if ($rwv[c_address] != '')
$messagee.=	'<tr><td>'.$rwv[c_address].'</td></tr>';
	
	if ($rwv[c_address2] != '')
$messagee.=	'<tr><td>'.$rwv[c_address2].'</td></tr>';

	if ($rwv[c_address3] != '')
$messagee.=	'<tr><td>'.$rwv[c_address3].'</td></tr>';

	if ($rwv[c_phone] != '')
$messagee.=	'<tr><td>Phone '.$rwv[c_phone].'</td></tr>';
	
	if ($rwv[c_fax] != '')
$messagee.=	'<tr><td>Fax '.$rwv[c_fax].'</td></tr>';

	if ($rwv[c_website] != '')
$messagee.=	'<tr><td>'.$rwv[c_website].'</td></tr>';

$messagee.=	'</table>	
	</td>
    <td width="50"></td>  
	
	<td width="50"></td>
	<td width="50" ><table style="vertical-align:top;"  width="200" border="0">	';

	if ($rws1[c_name] != '')
$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address] != '')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
if ($rws1[c_address2] != '')
$messagee.=	'<tr><td>'.$rws1[c_address2].'</td></tr>';

if ($rws1[c_address3] != '')
$messagee.=	'<tr><td>'.$rws1[c_address3].'</td></tr>';

	if ($rws1[c_phone] != '')
$messagee.=	'<tr><td>Phone '.$rws1[c_phone].'</td></tr>';

	if ($rws1[c_fax] != '')
$messagee.=	'<tr><td>Fax '.$rws1[c_fax].'</td></tr>';

if ($rws[delto] != '')
$messagee.=	'<tr><td> <strong>Delivered to</strong>: '.$rws[delto].'</td></tr>';
	
if ($rws[date1] != '')
$messagee.=	'<tr><td> <strong>Delivered On</strong>: '.$rws[date1].'</td></tr>';
	
	/*if ($rws1[c_website]!='')
$messagee.=	'<tr><td>'.$rws1[c_website].'</td></tr>';
*/
$messagee.=	'</table></td>
	<td width="50"></td>  	
	<td width="50"></td>
</tr>	  
</table><br><br>
  
<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="50">ITEM #</td>  
	<td width="125">PART NUMBER</td>
	<td width="50">REV</td>
	<td width="30">LYRS</td>
	<td width="275">DESCRIPTION</td>
	<td width="90" >Qty Ordered</td>
	<td width="90">Qty Delivered</td>	
</tr>'; 
  
$sqi = "select * from packing_items_tb where pid='".$rws['invoice_id']."'
order by item_id ";

$resi = mysql_query($sqi) or die('error in data');

$totq = 0;
$qtot = 0;
$j = 0;

while($rwi = mysql_fetch_assoc($resi)) { 

$messagee .= '<tr style="text-align:center ;font-size: 10pt;"> 
    <td  width="50">'.$rwi['item'].'</td>
	<td  width="125">';
	
if($j == 0) $messagee .= $rws['part_no'] ;

$messagee .= '</td><td  width="50">';	
if($j == 0)   $messagee .=	$rws['rev'] ;

$messagee.='</td><td  width="30">';	

$pieces = explode("Lyrs", $rws['no_layer']);
$pno = $pieces[0]; // piece1


if($j == 0)   $messagee .= $pno ;

$messagee .= '</td>';

$messagee .= '<td  width="275"> '; 
$messagee .= $rwi['itemdesc'].'</td>
	<td width="90" >'.$rwi['qty2'].'</td>
	<td width="90">  '.$rwi['shipqty'].' </td>	
</tr>'; 

$qtot = $qtot + $rwi['qty2'];
$totq = $totq + $rwi['shipqty'];

$j++;
}

$messagee .= '</table>  <br><br>  

<br><br>
<table width="1500px" border="0">
<tr> 
    <td width="720" >
	<hr > 
	</td> 	
</tr>

</table>  
<table width="1500px" border="0">

<tr> 
 <td width="520">
	<br>
	</td>  
	
	<td  width="100" ><strong>Total <br>Ordered &nbsp;</strong>'.$qtot.'</td>
	<td  width="125"><strong>Total <br>Delivered </strong>  '.$totq.'</td>
	
</tr>
</table> <br><br>  
 
<table width="1500px" border="0">

<tr style="font-size: 10pt;"> 
     
	<td width="225" colspan="2"><br>

 <br>If you have any issues with your order, please contact: <br>  
	Armando Torres <br>  
	714-553-7047<br> 
	armando@pcbsglobal.com<br> 
	<strong></strong><br>'.$rws[comments]. '<br>
	
	</td>
	<td  width="75" ></td>
	<td  width="200"></td>
	<td  width="25"> </td>
</tr>

</table> <br>  
 
<p style="font-size: 12pt">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;	
THANK YOU FOR YOUR BUSINESS AND TRUST!</p>

<span style="position:absolute;bottom:0px;font-size:8px;">FM8.5.1</span>
</page>  ';
  

$inv = $_REQUEST['id'] + 9987;

$html2pdf->WriteHTML($messagee);

if ($_REQUEST['oper'] == 'view'){
	$html2pdf->Output('exemple.pdf');
} else {   

$filename="packingpdf/PS-$inv-$rws11[c_shortname]-$rws[part_no]-$rws[rev]-".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'F');
$filename="PS-$inv-$rws11[c_shortname]-$rws[part_no]-$rws[rev]-".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'D');
  
}


?>
