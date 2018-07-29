<?php require_once('conn.php'); 
//require('../pdfclass/html2fpdf.php');

require('../pdftest/html2pdf.class.php');
?>
<?php 
$sqs="select * from corder_tb where poid='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);
?>
<?php
/*$path="/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";*/

/*$pdf=new HTML2FPDF();

$pdf->AddPage();
*/
$pno = $rws['part_no'];
$rev = $rws['rev'];
$cname = $rws['customer'];

$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$po11 = $row11->poid;  
$ypo = $row11->po; 
if ($po11 > 0)
	$po11 = $po11 + 9933;
else 
	$po11 = '';   
  
$html2pdf = new HTML2PDF('P','A4','en');

$sqv = "select * from data_tb where data_id='".$rws['vid']."'";
$resv = mysql_query($sqv) or die('error in data');
$rwv = mysql_fetch_assoc($resv);

if(substr($rws['sid'], 0, 1) == 'c')
	$sqs1 = "select * from data_tb where c_name <> '' and data_id='".substr($rws['sid'], 1)."'";
else
	$sqs1 = "select * from shipper_tb where data_id='".$rws['sid']."'";
$res1 = mysql_query($sqs1) or die('error in data');
$rws1 = mysql_fetch_assoc($res1);

$po = $rws['poid'] + 9992;
$conf= $rws['poid']+9992;
$messagee  = '

<page>

<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="60"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1">Order Confirmation</h1>
	<br>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>Date:</strong> '.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>SO #:</strong> '.$rws[our_ord_num].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>Conf #:</strong> '.$conf.'
	</td>
    </tr>
  </table> 
  
<table  width="1500px" border="0">
   <tr> 
    <td>
	<strong>PCBs Global Incorporated</strong><br>
	2500 E. La Palma Ave.<br>
	Anaheim Ca. 92806<br>
	Phone: (855) 722-7456<br>
	Fax: (855) 262-5305<br>	
	</td>  
	<td width="250"></td>
	<td> 
	
	</td>
    </tr>
  </table>  
  <br><br>
  
  <table width="1500px" border="0">
   <tr > 
    <td  width="350" style="background-color:#656BBC; color:#FFF;" colspan="2">BILL TO</td>  
	<td  width="50"></td>
	<td  width="320" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>

</tr><tr height="5px" > 
	<td style="margin-top:-20px"  width="100" height="5px" >
	<table style="vertical-align:top;"  width="200" border="0">';
	if ($rwv[c_name]!='')
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
    <td width="5"></td>  
	<td width="50"></td>
	<td width="100" height="5px" ><table style="vertical-align:top;"  width="200" border="0">';
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

	if ($rws1[c_website] != '')
$messagee.=	'<tr><td>'.$rws1[c_website].'</td></tr>';

$messagee.=	'</table></td>
	<td width="0"></td> 	
	<td width="0"></td>
</tr>	  
</table>    

<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="125">CUSTOMER PO</td>  
	<td width="75">SHIP VIA</td>
	<td width="150" >F.O.B.</td>
	<td width="100">TERMS</td>
	<td width="150">CUSTOMER CONTACT</td>
	<td width="115">DELIVER TO</td>
</tr>

<tr style="text-align:center"> 
    <td width="125">'.$rws[po].'</td>  
	<td width="75">'.( $rws['svia'] != 'Other' ? $rws['svia'] : (trim($rws['svia_oth']) == '' ? 'Other' : $rws['svia_oth'] ) ).'</td>
	<td width="150" >'.$rws[city].',&nbsp;'.$rws[state].'</td>
	<td width="100">'.$rwv[e_payment].'</td>
	<td width="150">'.$rws[namereq].'</td>
	<td width="115">'.$rws[delto].'</td>
</tr>
</table><br><br>
  
<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="50">ITEM #</td>
	<td width="125">PART NUMBER</td>
	<td width="40">REV</td>
	<td width="30">LYRS</td>
	<td width="225">DESCRIPTION</td>
	<td width="75" >TOTAL QTY</td>
	<td width="80">UNIT PRICE</td>
	<td width="80">TOTAL</td>
</tr>'; 
  
$sqi="select * from citems_tb where pid='".$rws['poid']."' order by item";

$resi=mysql_query($sqi) or die('error in data');

$tot=0;
$j=0;
while($rwi = mysql_fetch_assoc($resi)) {

$messagee .= '

<tr style="text-align:center ;font-size: 10pt;"> 
    <td width="50">'.$rwi[item].'</td> 	
	<td width="125">';
	
if($j == 0)  $messagee .= $rws['part_no'] ;
	
$messagee .= '</td><td  width="40">';	
if($j==0)  $messagee.=	$rws['rev'] ;

$messagee .= '</td><td  width="30">';	

$pieces = explode("Lyrs", $rws['no_layer']);
$pno = $pieces[0]; // piece1

if($j==0) $messagee .= $pno ;

$messagee .= '</td>';
	
$messagee .= '	
	
<td  width="225">'; 
	
	if($j==0)  { 
		//$messagee.=	'<strong>P/N </strong>'. $rws[part_no].'   <strong>Rev</strong> '.$rws[rev] ;
	}

//$tottt = str_replace(',', '', $rwi['tprice']);
$tottt = str_replace(',', '', $rwi['qty2']) * str_replace(',', '', $rwi['uprice']);

	$messagee .= '  '.
	$rwi[itemdesc].'</td>
	<td  width="75" >'.$rwi[qty2].'</td>
	<td  width="80" align="right">  $'.number_format(str_replace(',', '', $rwi[uprice]),2).' </td>
	<td width="80" align="right">  $'.number_format($tottt,2).'</td>
</tr> '; 
 
 $tot = $tot + number_format($tottt, 2, '.', '');
 
$j++;
  }
	$tot = str_replace(',', '',  $tot);
	$tot = number_format($tot, 2, '.', '');
 
	$sqi33 = "select * from mdlitems_tb where pid='".$rws['poid']."'";

	$resi33 = mysql_query($sqi33);

	if($resi33)  { 
	  $messagee .= '
		</table><br><br>  
		<table width="1500px" border="0">
		<tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
		<td width="150">Scheduled Qty</td>  
		<td width="150">Dock Date</td>
		</tr>'; 

		while($rwi33 = mysql_fetch_assoc($resi33))  { 
			$messagee .= '
			<tr style="text-align:right ;font-size: 8pt;"> 
			<td style="text-align:center ;font-size: 8pt;"  width="150">'.$rwi33[qty].'</td>  
			<td  width="150">'.$rwi33["date"].'&nbsp;&nbsp;&nbsp;</td>
			</tr>'; 
		}
	}

$st = number_format(intval ($rws['stax']),4 );
$taxx = $tot*$st;
$taxx = str_replace(',', '',$taxx);

$tot2 = number_format($tot2,2);

$tot2 = $taxx + $tot;
$tot2 = number_format($tot2,2);

$taxx = number_format($taxx,2,'.',',');
$tot = number_format($tot,2,'.',',');

$messagee .= '

</table>  
<table width="1500px" border="0">
<tr > 
     <td  width="750"  >
	<hr > 
	</td>  
	
</tr>
</table>  
<table width="1500px" border="0">

<tr border="1" > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="192" ></td>
	<td  width="100"  >Sub Total</td>
	<td  width="100"  align="right" style="text-align:right"> $'.$tot.'</td>
</tr>
<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="192" ></td>
	<td  width="100">Sale Tax</td>
	<td  width="100" align="right" style="text-align:right"> $'.$taxx.'</td>
</tr>
<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="192" ></td>
	<td  width="100">Total</td>
	<td  width="100" align="right" style="text-align:right"> $'.$tot2.'</td>
</tr>

<tr > 
    <td  width="375" colspan="2" style="font-size: 10pt;" ><br><br>
    <strong>Comments</strong><br>'.$rws[comments]; 
$messagee.='<br>
</td>  
	
	
	<td  width="300" colspan="3"><br><br>If any errors are found in this Order Confirmation, please contact Armando Torres at:<br>(855) 722-7456 x 102 or (714) 553-7047</td>
	
</tr>




 </table> <br><br>  
    <p style="font-size: 12pt">
  
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; THANK YOU FOR YOUR BUSINESS AND TRUST!
  	
	</p>
 
  
  </page>
  ';
  






 $html2pdf->WriteHTML($messagee);
  //$html2pdf->Output('exemple.pdf');
  //$html2pdf->Output('exemple.pdf');
  
 
  
if ($_REQUEST['oper']=='view'){
	$html2pdf->Output('exemple.pdf');
}else{
  

$filename="confirmationpdf/OC-$po-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";

$html2pdf->Output($filename,'F');

$filename="OC-$po-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";

$html2pdf->Output($filename,'D');
}
?>
