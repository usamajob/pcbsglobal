<?php
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment; Filename=SaveAsWordDoc.doc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<title>Saves as a Word Doc</title>
</head>
<body>
<?php require_once('conn.php'); 
?>
<?php 
$sqs="select * from porder_tb where poid='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);
?>
<?php
   $sqv="select * from vendor_tb where data_id='".$rws['vid']."'";
  $resv=mysql_query($sqv);
  if(!$resv)
  {
  die('error in data');
  }
  $rwv=mysql_fetch_array($resv);

    $sqs1="select * from shipper_tb where data_id='".$rws['sid']."'";

  $res1=mysql_query($sqs1);

  if(!$res1)

  {

  die('error in data');

  }

  $rws1=mysql_fetch_array($res1);
$po = $rws[poid] + 9933 ;
$messagee  ='
<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="250"></td>
	<td> <h1 style="color:#5660B1">PURCHASE ORDER</h1>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>Date:</strong> '.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>PO #</strong>'.$po.'
	</td>
    </tr>
  </table> 
  
<table  width="1500px" border="0">
   <tr> 
    <td>
	<strong>PCBs Global Incorporated</strong> 
	

<br>

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
    <td  width="350" style="background-color:#656BBC; color:#FFF;" colspan="2">VENDOR</td>  
	<td  width="50"></td>
	<td  width="320" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>

</tr><tr height="5px" > 
	<td style="margin-top:-20px"  width="100" height="5px" >
	<table style="vertical-align:top;"  width="400" border="0">

	
	
	';
	if ($rwv[c_name]!='')
$messagee.=	'<tr><td>'.$rwv[c_name].'</td></tr>';

if ($rwv[c_address]!='')
$messagee.=	'<tr><td>'.$rwv[c_address].'</td></tr>';
	
	if (($rwv[c_address2]!='')or($rwv[c_address3]!=''))
$messagee.=	'<tr><td>'.$rwv[c_address2].$rwv[c_address3].'</td></tr>';

	if ($rwv[c_phone]!='')
$messagee.=	'<tr><td>'.$rwv[c_phone].'</td></tr>';

	
	if ($rwv[c_fax]!='')
$messagee.=	'<tr><td>'.$rwv[c_fax].'</td></tr>';

	if ($rwv[c_website]!='')
$messagee.=	'<tr><td>'.$rwv[c_website].'</td></tr>';

$messagee.=	'</table>	
	</td>
    <td width="5"></td>  
	<td width="50"></td>
	<td width="100" height="5px" ><table style="vertical-align:top;"  width="400" border="0">

	
	
	';
	if ($rws1[c_name]!='')
$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address]!='')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
	if (($rws1[c_address2]!='')or($rws1[c_address3]!=''))
$messagee.=	'<tr><td>'.$rws1[c_address2].$rws1[c_address3].'</td></tr>';

	if ($rws1[c_phone]!='')
$messagee.=	'<tr><td>'.$rws1[c_phone].'</td></tr>';


	if ($rws1[c_fax]!='')
$messagee.=	'<tr><td>'.$rws1[c_fax].'</td></tr>';

	if ($rws1[c_website]!='')
$messagee.=	'<tr><td>'.$rws1[c_website].'</td></tr>';

$messagee.=	'</table>	</td>
	<td width="0"></td>  
	
	<td width="0"></td>

</tr>
	  
  </table>   
  

<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="250">REQUISITIONER</td>  
	<td  width="75">SHIP VIA</td>
	<td  width="150" >F.O.B.</td>
	<td  width="175">SHIPPING TERMS</td>

</tr>
   <tr style="text-align:center"> 
    <td  width="250">'.$rws[namereq].'</td>  
	<td  width="75">'.$rws[svia].'</td>
	<td  width="150" >'.$rws[city].'&nbsp;,'.$rws[state].'</td>
	<td  width="175">'.$rws[sterms].'</td>

</tr>
 </table>  <br><br>
  
<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="50">ITEM #</td>  
	<td  width="325">DESCRIPTION</td>
	<td  width="75" >QTY</td>
	<td  width="100">UNIT PRICE</td>
	<td  width="100">TOTAL</td>
</tr>
'; 
  
  $sqi="select * from items_tb where pid='".$rws['poid']."'";

  $resi=mysql_query($sqi);

  if(!$resi)

  {

  die('error in data');

  }

  $tot=0;
$j=0;
  while($rwi=mysql_fetch_array($resi))

  { 
$messagee.='
<tr style="text-align:center ;font-size: 8pt;"> 
    <td  width="50">'.$rwi[item].'</td>  
	<td  width="325">'; 
	if($j==0)  { 
$messagee.=	$rws[part_no].'   Rev '.$rws[rev] ;
	}
	$messagee.='  '.
	$rwi[itemdesc].'</td>
	<td  width="75" >'.$rwi[qty2].'</td>
	<td  width="100">  $'.$rwi[uprice].' </td>
	<td  width="100">  $'.$rwi[tprice].'</td>
</tr>
'; 
 $tottt=str_replace(',', '', $rwi['tprice']);
 $tot=$tot+number_format($tottt,2,'.','');
//$tot=$tot+number_format($rwi['tprice'],2);
$j++;
  }
$tot=number_format($tot,2);
$messagee.='
<tr > 
    <td  width="375" colspan="2" style="font-size: 10pt;" ><br><br>
	Customer  ' .$rws[customer].'<br>
	 PO  # ' .$rws[po].'<br>
	
	Boards to dock at destination  '.$rws[date1].'<br>'; 
	
	if($rws[rohs]=='yes')
$messagee.='	RoHS Cert’s required <br>'; 
	
	
$messagee.='	
	Certificate of compliance required <br>
Inspection report required <br>
Test certificate required <br>
Solder sample required <br><br>

<strong>Additional Requirements</strong><br>'.$rws[comments]; 




$messagee.='<br><br>
Invoice: armando@pcbsglobal.com and silvia@pcbsglobal.com <br>
Email working data to: armando@pcbsglobal.com and isaac@pcbsglobal.com <br>
Please refer any questions to: armando@pcbsglobal.com and isaac@pcbsglobal.com <br>



	
	
	</td>  
	
	<td  width="75" ></td>
	<td  width="100"></td>
	<td  width="100"></td>
</tr>

<tr > 
    <td  width="425" colspan="5" >
	<hr > 
	</td>  
	
</tr>

<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100">TOTAL</td>
	<td  width="100"> $'.$tot.'</td>
</tr>






 </table> <br><br>  
    <p style="font-size: 8pt">
  
  
  	
	</p>
 
  
  ';
  

echo $messagee;


//$pdf->WriteHTML($message);

//$filename=$path."$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";

//$filename="Purchase-ORDER".date("m-d-Y H:i:s") . ".pdf";

//$pdf->Output($filename,'D');


// $html2pdf->WriteHTML($messagee);
 //   $html2pdf->Output('exemple.pdf');
 // $html2pdf->Output('exemple.pdf');
  
 
  
  
 // $filename="porderpdf/$po-$rws[customer]-$rws[part_no]-$rws[rev]-$rwv[c_shortname] ".date("m-d-Y") . ".pdf";
 //  $html2pdf->Output($filename,'F');
//$html2pdf->Output($filename,'D');
  



?>
</body>
</html>

