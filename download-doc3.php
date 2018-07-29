<?php require_once('conn.php'); 

?>
<?php 
$sqs="select * from packing_tb where invoice_id='".$_REQUEST['id']."'";
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

  
  
  $temp = $rws['sid'];
   $temp1 = substr($temp, 0, 1);
  
  
   $temp2 = substr($temp,1, strlen($temp));
  // $temp2 = intval(temp2);
 // exit();
  
  if ($temp1=='c') {
  
  
  
  
  $rwv=mysql_fetch_array($resv);

    $sqs1="select * from data_tb where data_id='".$temp2."'";

  $res1=mysql_query($sqs1);

  if(!$res1)

  {

  die('error in data');

  }
  
   }
   
    else {
  
   
  $rwv=mysql_fetch_array($resv);

    $sqs1="select * from shipper_tb where data_id='".$temp2."'";

  $res1=mysql_query($sqs1);

  if(!$res1)

  {

  die('error in data');

  }
  
   }

  $rws1=mysql_fetch_array($res1);





  
   

    $sqs11="select * from data_tb where data_id='".$rws['customer']."'";

  $res11=mysql_query($sqs11);

  if(!$res11)

  {

  die('error in data');

  }
  $rws11=mysql_fetch_array($res11);
  
   
$inv= $rws['invoice_id']+9987;

$messagee  ='

<page>


<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="200"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1"   > Packing Slip</h1>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Ordered Date:    </strong> '.$rws[odate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Date:   </strong>'.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Our Order No:  </strong>'.$rws[our_ord_num].'<br>	
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
	<strong>SHIPPED VIA:   </strong>'.$rws[svia].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>Customer contacts:</strong>';
	
	   
	   

														$sqv45="select * from maincont_tb where coustid='".$rws['customer']."'";

														$resv45=mysql_query($sqv45);

														if(!$resv45)

														{

														die('err');

														}

														while($rwv45=mysql_fetch_array($resv45))

														{

														
													   
													  
$messagee  .= '<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;'.$rwv45[name].' '.$rwv45[lastname].' '.$rwv45[phone];
														

														}

														
	
	
	
	
	
	
$messagee  .=
	
	'<br>	
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
  
  <table width="920px" border="0">
   <tr> 
    <td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">BILL TO</td>  
	<td  width="50"></td>
	<td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>

</tr>
	   <tr> 
	<td width="300" ><table style="vertical-align:top;"  width="300" border="0">

	
	
	';
	if ($rwv[c_name]!='')
$messagee.=	'<tr><td>'.$rwv[c_name].'</td></tr>';

$messagee.=	'<tr><td> (Accounts Payable)</td></tr>';

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
    <td width="50"></td>  
	
	<td width="50"></td>
	<td width="300" ><table style="vertical-align:top;"  width="300" border="0">

	
	
	';
	if ($rws1[c_name]!='')
$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address]!='')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
	if (($rws1[c_address2]!='')or($rws1[c_address3]!=''))
$messagee.=	'<tr><td>'.$rws1[c_address2].$rws1[c_address3].'</td></tr>';

if ($rws[delto]!='')
$messagee.=	'<tr><td> <strong>Delivered to</strong>: '.$rws[delto].'</td></tr>';
	
if ($rws[date1]!='')
$messagee.=	'<tr><td> <strong>Delivered On</strong>: '.$rws[date1].'</td></tr>';
	
	
	if ($rws1[c_phone]!='')
$messagee.=	'<tr><td>'.$rws1[c_phone].'</td></tr>';


	if ($rws1[c_fax]!='')
$messagee.=	'<tr><td>'.$rws1[c_fax].'</td></tr>';

	/*if ($rws1[c_website]!='')
$messagee.=	'<tr><td>'.$rws1[c_website].'</td></tr>';
*/
$messagee.=	'</table></td>
	<td width="50"></td>  
	
	<td width="50"></td>

</tr>
	  
  </table>  <br><br>
  


  
<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="125">ITEM #</td>  
	<td  width="250">DESCRIPTION</td>
	<td  width="175" >Qty Ordered</td>
	<td  width="175">Qty Delivered</td>
	
</tr>
'; 
  
  $sqi="select * from packing_items_tb where pid='".$rws['invoice_id']."'";

  $resi=mysql_query($sqi);

  if(!$resi)

  {

  die('error in data');

  }

  $tot=0;
   $qtot=0;
$j=0;
  while($rwi=mysql_fetch_array($resi))

  { 
  



$messagee.='

<tr style="text-align:center ;font-size: 8pt;"> 
    <td  width="125">'.$rwi[item].'</td><td  width="250"> '; 
	
	if($j==0)  { 
	
$messagee.=	$rws[part_no].'   Rev '.$rws[rev] ;
	}
$messagee.='  '.
	$rwi[itemdesc].'</td>
	<td  width="175" >'.$rwi[qty2].'</td>
	<td  width="175">  '.$rwi[uprice].' </td>
	
</tr>
'; 
$qtot=$qtot+number_format($rwi['qty2'],2);
$tot=$tot+number_format($rwi['tprice'],2);
$j++;
  }

//echo $qtot;
 $tot=number_format($tot,2,'.', '');

$st =number_format($rws['saletax'],2 ,'.', '');
$taxx = $tot*$st;
     $taxx=number_format($taxx,2);
  
 
  
  $tot2=number_format($rws['fcharge'],2)+$tot+ ($tot*number_format($rws['saletax'],4) );
  $tot2=number_format($tot2,2);
$messagee.='





<tr > 
    <td  width="375" colspan="2" style="font-size: 10pt;" ><br><br>
	



	
	
	</td>  
	
	<td  width="175" ></td>
	<td  width="175"></td>
	
</tr>

<tr > 
    <td  width="425" colspan="4" >
	<hr > 
	</td>  
	
</tr>
<tr > 
    <td  width="375" colspan="2"  >
	


	
	<br>
	</td>  
	
	<td  width="175" ><strong> Total Qty Ordered &nbsp;</strong>'.$qtot.'</td>
	<td  width="175"><strong> Total Qty Delivered </strong>  '.$qtot.'</td>
	
</tr>

 </table> <br><br>  
 
 <table width="1500px" border="0">
 
 <tr  style="font-size: 10pt;"> 
     
	<td  width="225" colspan="2"><br>

 <br>If you have any issues with your order, please contact: <br>  
	Armando Torres <br>  
	714-553-7047<br> 
	armando@pcbsglobal.com<br> 
	<strong></strong><br>'.$rws[comments]. 

	'<br>
	
	</td>
	<td  width="75" ></td>
	<td  width="200">
	
	
	
	
	</td>
	<td  width="25"> </td>
</tr>






 </table> <br><br>  
 
    <p style="font-size: 16pt">
  
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	

  THANK YOU FOR YOUR BUSINESS AND TRUST!
  	
	</p>
 
  
  </page>
  ';
  
 
 $filename="packingpdf/PS-$inv-$rws11[c_shortname]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
 $fp = fopen( $filename, 'w');
fwrite($fp, $messagee);

 $filename="PS-$inv-$rws11[c_shortname]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";

header('Content-disposition: attachment; filename='.$filename);
header('Content-type: application/vnd.ms-word');
echo  $messagee;
fclose($fp);
?>
</body>
</html>