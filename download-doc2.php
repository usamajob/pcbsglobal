<?php require_once('conn.php'); 
$sqs = "select * from invoice_tb where invoice_id='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');
$rws = mysql_fetch_assoc($ress);

$sqv = "select * from data_tb where data_id='".$rws['vid']."'";
$resv = mysql_query($sqv) or die('error in data');
$rwv = mysql_fetch_assoc($resv);

$sqs1 = "select * from data_tb where data_id='".$rws['sid']."'";
$res1 = mysql_query($sqs1) or die('error in data');
$rws1 = mysql_fetch_assoc($res1);

$inv = $rws['invoice_id'] + 9976;
  
$messagee  = '

<page>
<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="200"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1"   >Invoice</h1>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>INVOICE NUMBER:    </strong> '.$rws[invoice_id].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>INVOICE DATE:   </strong>'.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>OUR ORDER NO:  </strong>'.$rws[our_ord_num].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp; 
	<strong>YOUR ORDER NO:  </strong>'.$rws[po].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>TERMS:   </strong>'.$rwv[e_payment].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>SALES REP:    </strong>'.$rws[namereq].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>SHIPPED VIA:   </strong>'.$rws[svia].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<strong>F.O.B:   </strong>'.$rws[city].'&nbsp;'.$rws[state].'<br>	
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
  
  <table width="920px" border="0">
   <tr> 
    <td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">SOLD TO</td>  
	<td  width="50"></td>
	<td  width="300" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIPPED TO</td>
	<td  width="200"></td>

</tr>
	   <tr> 
	<td width="300" ><table style="vertical-align:top;"  width="300" border="0">';

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
    <td width="50"></td>  
	
	<td width="50"></td>
	<td width="300" ><table style="vertical-align:top;"  width="300" border="0">';

	if ($rws1[c_name]!='')
		$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address]!='')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
	if (($rws1[c_address2]!='')or($rws1[c_address3]!=''))
$messagee.=	'<tr><td>'.$rws1[c_address2].$rws1[c_address3].'</td></tr>';
if ($rws[ord_by]!='')
$messagee.=	'<tr><td> <strong>Ordered by</strong>: '.$rws[ord_by].'</td></tr>';
if ($rws[delto]!='')
$messagee.=	'<tr><td> <strong>Delivered to</strong>: '.$rws[delto].'</td></tr>';
	
if ($rws[date1]!='')
$messagee.=	'<tr><td> <strong>Delivered On</strong>: '.$rws[date1].'</td></tr>';	
	
	if ($rws1[c_phone] != '')
$messagee.=	'<tr><td>'.$rws1[c_phone].'</td></tr>';

	if ($rws1[c_fax]!='')
$messagee.=	'<tr><td>'.$rws1[c_fax].'</td></tr>';

$messagee.=	'</table></td>
	<td width="50"></td>  	
	<td width="50"></td>
</tr>	  
</table>  <br><br>
  
<table width="1500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td  width="125">ITEM #</td>  
	<td  width="250">DESCRIPTION</td>
	<td  width="75" >QTY</td>
	<td  width="100">UNIT PRICE</td>
	<td  width="125">TOTAL</td>
</tr>'; 
  
$sqi = "select * from invoice_items_tb where pid='".$rws['invoice_id']."'";

$resi = mysql_query($sqi) or die('error in data');

$tot = 0;
$j = 0;
while($rwi = mysql_fetch_assoc($resi)) { 

$messagee .= '<tr style="text-align:center ;font-size: 8pt;"> 
    <td  width="125">'.$rwi['item'].'</td><td width="250"> '; 
	
if($j == 0)  { 	
	$messagee.=	'<strong>P/N </strong>'.$rws['part_no'].'   <strong>Rev</strong> '.$rws['rev'] ;
}
$messagee .= '  '.	$rwi['itemdesc'].'</td>
	<td  width="75" >'.round_num($rwi[qty2]).'</td>
	<td  width="100">  $'.format_num($rwi['uprice']).' </td>
	<td  width="125">  $'.format_num($rwi['tprice']).'</td>
</tr>'; 

	$tottt = str_replace(',', '', $rwi['tprice']);
	$tot = $tot + $tottt;
	$j++;
}

$tot = str_replace(',', '',  $tot);
$st = $rws['saletax']*1;
$taxx = $tot * $st;
$taxx = str_replace(',', '', $taxx);
$tot2 =   $rws['fcharge'] + $tot + $taxx ;

$messagee .= '
<tr > 
    <td  width="375" colspan="2" style="font-size: 10pt;" ><br><br>	
	</td>	
	<td  width="75" ></td>
	<td  width="100"></td>
	<td  width="125"></td>
</tr>

<tr > 
    <td  width="425" colspan="5" > <hr > 	</td>  	
</tr>

<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100">SUB TOTAL</td>
	<td  width="125"> $'.format_num($tot).'</td>
</tr>

<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100">TAX</td>
	<td  width="125"> $'.format_num($taxx).'</td>
</tr>
<tr > 
    <td  width="125" style="font-size: 10pt;" >
	</td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100"> FREIGHT</td>
	<td  width="125"> $'.format_num($rws['fcharge']).'</td>
</tr>

<tr > 
    <td  width="125" style="font-size: 10pt;" ></td>  
	<td  width="250"></td>
	<td  width="75" ></td>
	<td  width="100"><strong>TOTAL</strong></td>
	<td  width="125"> $'.format_num($tot2).'</td>
</tr>

 </table> <br><br>  
 
 <table width="1500px" border="0">
 
 <tr  style="font-size: 10pt;"> 
    <td  width="50" >
	</td>  
	<td  width="175"><br>

<strong>Comments</strong><br>'.$rws[comments]. 

	'<br> <br>Direct All Inquiries To <br>  
	Armando Torres <br>  
	714-553-7047<br> 
	armando@pcbsglobal.com<br> 	
	
	</td>
	<td  width="75" ></td>
	<td  width="200">
	MAKE ALL CHECKS PAYABLE TO: <br>  
	Torres Developments  <br>  
	2500 E. La Palma Ave. <br> 
	Anaheim CA 92806<br> 
	
	</td>
	<td  width="25"> </td>
</tr>

 </table> <br><br>  
 
    <p style="font-size: 12pt">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
  THANK YOU FOR YOUR BUSINESS AND TRUST!
  	
	</p></page>';
  
$filename = "invoicepdf/Invoice-$inv-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
$fp = fopen( $filename, 'w');
fwrite($fp, $messagee);
	
$filename="Invoice-$inv-$rws[customer]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
header('Content-disposition: attachment; filename='.$filename);
header('Content-type: application/vnd.ms-word');
echo  $messagee;
fclose($fp);
?>
</body>
</html>