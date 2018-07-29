<?php require_once('conn.php'); 
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
  
   $sqv="select * from data_tb where data_id='".$rws['vid']."'";

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
<table  width="920px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="250"></td>
	<td> <h1 style="color:#5660B1">Order Confirmation</h1>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<strong>Date:</strong> '.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<strong>SO #</strong>'.$rws[our_ord_num].'
	</td>
    </tr>
  </table> 
  
<table  width="920px" border="0">
   <tr> 
    <td>
	
	<tr style="font-size: 9pt;" >
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

  <table width="920px" border="0">
   <tr >
  
    <td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">BILL TO</td>  
	<td  width="50"></td>
	<td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>

</tr><tr height="5px" style="font-size: 9pt;" >
 
	<td style="margin-top:-20px"  width="300" height="5px" >
	<table style="vertical-align:top;"  width="300" border="0">

	
	
	';
	
	if ($rwv[c_name]!='')
$messagee.=	'<tr><td>'.$rwv[c_name].'</td></tr>';

$messagee.=	'<tr><td> (Accounts Payable)</td></tr>';


if ($rwv[c_address]!='')
$messagee.=	'<tr><td>'.$rwv[c_address].'</td></tr>';
	
	if (($rwv[c_address2]!='')or($rwv[c_address3]!=''))
$messagee.=	'<tr><td>'.$rwv[c_address2].' '.$rwv[c_address3].'</td></tr>';

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
	<td width="300" height="5px" ><table style="vertical-align:top;"  width="300" border="0">

	
	
	';
	if ($rws1[c_name]!='')
$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address]!='')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
	if (($rws1[c_address2]!='')or($rws1[c_address3]!=''))
$messagee.=	'<tr><td>'.$rws1[c_address2].' '.$rws1[c_address3].'</td></tr>';

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
  

<table width="920px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="125">CUSTOMER PO</td>  
	<td  width="75">SHIP VIA</td>
	<td  width="150" >F.O.B.</td>
	<td  width="100">TERMS</td>
	<td  width="200">CUSTOMER CONTACT</td>
	<td  width="115">DELIVER TO</td>

</tr>
   <tr style="text-align:center"> 
    <td  width="125">'.$rws[po].'</td>  
	<td  width="75">'.$rws[svia].'</td>
	<td  width="150" >'.$rws[city].',&nbsp;'.$rws[state].'</td>
	<td  width="100">'.$rwv[e_payment].'</td>
	<td  width="200">'.$rws[namereq].'</td>
	<td  width="115">'.$rws[delto].'</td>

</tr>
 </table>  <br><br>
  
<table width="920px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="75">ITEM #</td>  
	<td  width="325">DESCRIPTION</td>
	<td  width="125" >TOTAL QTY</td>
	<td  width="100">UNIT PRICE</td>
	<td  width="100">TOTAL</td>
</tr>
'; 
  
  $sqi="select * from citems_tb where pid='".$rws['poid']."'";

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
    <td  width="75">'.$rwi[item].'</td>  
	<td  width="325">'; 
	
	if($j==0)  { 
	$messagee.=	'<strong>P/N </strong>'. $rws[part_no].'   <strong>Rev</strong> '.$rws[rev] ;

	}
	$messagee.='  '.
	$rwi[itemdesc].'</td>
	<td  width="125" >'.$rwi[qty2].'</td>
	<td  width="100">  $'.$rwi[uprice].' </td>
	<td  width="100">  $'.$rwi[tprice].'</td>
</tr>

'; 

 $tottt=str_replace(',', '', $rwi['tprice']);

 
 
 
 $tot=$tot+number_format($tottt,2,'.','');
 
$j++;
  }
  $tot=str_replace(',', '',  $tot);
 $tot=number_format($tot,2,'.','');
 
  $sqi33="select * from mdlitems_tb where pid='".$rws['poid']."'";

  $resi33=mysql_query($sqi33);

  if(!$resi33)

  {

 // die('error in data');

  }
else{
	
	
	
$messagee.='	
	 </table><br><br>  
<table width="920px" border="0">
<tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="150">Scheduled Qty</td>  
	<td  width="150">Dock Date</td>
	
</tr>'
	; 

 
  while($rwi33=mysql_fetch_array($resi33))

  { 
  $messagee.='

<tr style="text-align:center ;font-size: 8pt;"> 
    <td  width="150">'.$rwi33[qty].'</td>  
	<td  width="150">'.$rwi33["date"].'</td>
	</tr>
	 </table>
	<table width="920px" border="0">
	'
	; 




}

 }




//echo $tot;

 $st =number_format($rws['stax'],4 );
//echo '<br>';
 $taxx = $tot*$st;
 $taxx=str_replace(',', '',$taxx);
   // 
  
 
// exit; 
 // $tot2=$tot+ ($tot*number_format($rws['stax'],2) );
 $tot2=number_format($tot2,2);


 $tot2= $taxx + $tot;
 
  $tot2=number_format($tot2,2);


 $taxx=number_format($taxx,2,'.',',');
  $tot=number_format($tot,2,'.',',');

$messagee.='







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
	<td  width="100">Sub Total</td>
	<td  width="100"   align="right" style="text-align:right"> $'.$tot.'</td>
</tr>
<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100">Sale Tax</td>
	<td  width="100"   align="right" style="text-align:right"> $'.$taxx.'</td>
</tr>
<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100">Total</td>
	<td  width="100"   align="right" style="text-align:right"> $'.$tot2.'</td>
</tr>

<tr > 
    <td  width="375" colspan="2" style="font-size: 10pt;" ><br><br>
    <strong>Comments</strong><br>'.$rws[comments]; 
$messagee.='<br>
</td>  
	
	
	<td  width="300" colspan="3"><br><br>If any errors are found in this Order Confirmation, please contact Armando Torres at:<br>(855) 722-7456 x 102 or (714) 553-7047</td>
	
</tr>




 </table> <br><br>  
    <p style="font-size: 14pt">
  
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; THANK YOU FOR YOUR BUSINESS AND TRUST!
  	
	</p>
 
  
  </page>
  ';
  

$filename="confirmationpdf/OC-$po-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
  
$fp = fopen( $filename, 'w');
fwrite($fp, $messagee);
  
  $filename="OC-$po-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
header('Content-disposition: attachment; filename='.$filename);
header('Content-type: application/vnd.ms-word');
echo  $messagee;
fclose($fp);
?>
</body>
</html>