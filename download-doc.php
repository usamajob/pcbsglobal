<?php
require_once('conn.php');

$sqs = "select * from order_tb where ord_id='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');

$rws = mysql_fetch_assoc($ress);
$sqs2="select * from data_tb where c_name='".$rws['cust_name']."'";
/*echo $sqs2;
exit(0);*/
$ress2=mysql_query($sqs2) or die('errorn in data');

$rws2 = mysql_fetch_assoc($ress2);
$pr1=$rws['pr11'];
$pr2=$rws['pr12'];
$pr3=$rws['pr13'];
$pr4=$rws['pr14'];
$pr5=$rws['pr15'];

$pr6=$rws['pr21'];
$pr7=$rws['pr22'];
$pr8=$rws['pr23'];
$pr9=$rws['pr24'];
$pr10=$rws['pr25'];


$pr11=$rws['pr31'];
$pr12=$rws['pr32'];
$pr13=$rws['pr33'];
$pr14=$rws['pr34'];
$pr15=$rws['pr35'];


$pr16=$rws['pr41'];
$pr17=$rws['pr42'];
$pr18=$rws['pr43'];
$pr19=$rws['pr44'];
$pr20=$rws['pr45'];


$pr21=$rws['pr51'];
$pr22=$rws['pr52'];
$pr23=$rws['pr53'];
$pr24=$rws['pr54'];
$pr25=$rws['pr55'];


$pr26=$rws['pr61'];
$pr27=$rws['pr62'];
$pr28=$rws['pr63'];
$pr29=$rws['pr64'];
$pr30=$rws['pr65'];

$pr31=$rws['pr71'];
$pr32=$rws['pr72'];
$pr33=$rws['pr73'];
$pr34=$rws['pr74'];
$pr35=$rws['pr75'];


$pr36=$rws['pr81'];
$pr37=$rws['pr82'];
$pr38=$rws['pr83'];
$pr39=$rws['pr84'];
$pr40=$rws['pr85'];

$pr41=$rws['pr91'];
$pr42=$rws['pr92'];
$pr43=$rws['pr93'];
$pr44=$rws['pr94'];
$pr45=$rws['pr95'];


$pr46=$rws['pr101'];
$pr47=$rws['pr102'];
$pr48=$rws['pr103'];
$pr49=$rws['pr104'];
$pr50=$rws['pr105'];

for($m = 1; $m <= 50; $m++) {
	$var = 'pr'.$m;
	if($$var != "") {
		$$var = format_num($$var);
	}
}

$qno=intval($_REQUEST['id'])+10000;
if ($rws[no_layer]=='single')
$nol = 'Single Sided';
else if ($rws[no_layer]=='Double Sided')
$nol = 'Double Sided';
else if ($rws[no_layer]=='4Lyrs')
$nol = '4 Layers';
else if ($rws[no_layer]=='6Lyrs')
$nol = '6 Layers';
else if ($rws[no_layer]=='8Lyrs')
$nol = '8 Layers';
else if ($rws[no_layer]=='10Lyrs')
$nol = '10 Layers';

else 
$nol=$rws[no_layer]. ' Layers';


$message  ='
<table  width="650px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="50px" height="40px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="125"></td>
		<td> 
	
	</td>
	
    <td>
	<h1 style="font-size: 40pt;color:#5660B1"   >  Quotation</h1><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp; 
	
	<b>Quote No : </b>'.$qno.' <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;  
<b>Quotation Date: </b>  '.date("m-d-Y") .' <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;  
<b>Quote Valid for : </b> 30 Days 
	
	</td>
    </tr>
  </table>
  
   <table width="650px" border="0">
   <tr>
    <td width="104"></td>
   <td width="279"><br> <br> 
PCBsGlobal Incorporated.<br>
2500 E. La Palma Ave.<br>
Anaheim Ca. 92806 <br>
Phone             (855) 722-7456    <br>   
Fax: (855) 262-5305 <br>
Email: sales@pcbsglobal.com <br>	
	
	Quote Prepared By: '.$_SESSION['uname'].'  </td>
	
	<td width="95"></td>
    <td width="324">
	<h4>Quote To: </h4>'.$rws2['c_name'].'<br>'.$rws2['c_address'].'<br>'.$rws2['c_address2'].'<br>'.$rws2['c_address3'].'<br>'.$rws['req_by'].'<br>'.$rws['phone'].'<br> 
	<b> </b>'.$rws['email'].' <br> 
	</td>
    </tr>
  </table>
  
  <br><br>
  
<table width="650" border="0">
  <tr  style="background-color:#656BBC; color:#FFF; text-align: center; font-size: 18pt;">
    <td colspan="4" width="750" height="25" ><b>Order Information</b></td>
   </tr>
    <tr>
    <td><b>Part Number: </b>'.$rws[part_no].' </td>
	 <td><b>Revision: </b>'.$rws[rev].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  '.$rws[new_or_rep].' </b></td>
	  <td><b>Misc Charge: </b> $ '.$rws[descharge].'  </td>
	   <td><b>NRE: </b> $ '.$rws[necharge].' </td>
   </tr>
    <tr   style=" text-align: center;">
    <td colspan="4"><br>
	  <span style="font-size: 12pt">Quotation is based on the following:</span><br>'.$nol.' , '.$rws[board_size1].' X '.$rws[board_size2].' Board size with '.$rws[m_require].' Material and '.$rws[finish].' Finish <br>
	
	'.$rws[thickness].' Thick ';
	
	
	if($rws['thickness_tole']!='')
	$message  =$message.' '.$rws['thickness_tole'];
	
	if ( ($rws[con_impe_sing]=='')and ($rws[con_impe_diff]==''))
	$message  =$message.'
	without Impedence <br> ';
	else if ( ($rws[con_impe_sing]!='')and ($rws[con_impe_diff]!=''))
	$message  =$message.'
	with  '.$rws[con_impe_sing].'/'.$rws[con_impe_diff].' impedance and a tolerance of  '.$rws[tore_impe].' .<br> ';
	else if ($rws[con_impe_sing]!='')
	$message  =$message.'
	with  '.$rws[con_impe_sing].' impedance and a tolerance of  '.$rws[tore_impe].' .<br> ';
	else if ($rws[con_impe_diff]!='')
	$message  =$message.'
	with  '.$rws[con_impe_diff].' impedance and a tolerance of  '.$rws[tore_impe].' .<br> ';
	
	if($rws['blind']=='yes')
	$message  =$message.'
	Blind vias';
	
	if($rws['buried']=='yes')
	$message  =$message.' / Buried';
	
	if($rws['bb_both']=='Yes')
	$message  =$message.'/ Blind and Buried Vias';


//$message  =$message.'<br>	Material Required: '.$rws[m_require];

if($rws['fingers_gold']=='No')
//$message  =$message.'<br>	Without Fingers Nickel/Hard Gold ';
$message  =$message.'';
else
$message  =$message.'<br>	With Fingers Nickel/Hard Gold ';
if($rws['array']=='YES')
$message  =$message.'<br>	'.$rws[array_size1].' X '.$rws[array_size2].' ('.$rws[b_per_array].') Up Array';
//else
//$message  =$message.'<br>	Not In Array Form ';	
	
	$message  =$message.'.
	</td>
   </tr>
   </table>
  
  
    <table style=" text-align: center;" width="650" border="1">
  <tr >
    <td width="75"></td>
	<td width="75"></td>  ';
   
    if($rws[day1] > 0)
  $message  =$message.'
   <td width="75">'.$rws[day1].' Days</td>';
   
    if($rws[day2] > 0)
  $message  =$message.'
    <td width="75">'.$rws[day2].' Days</td>';
	
	 if($rws[day3] > 0)
  $message  =$message.'
    <td width="75">'.$rws[day3].' Days</td>';
	
	 if($rws[day4] > 0)
  $message  =$message.'
    <td width="75">'.$rws[day4].' Days</td>';
	
	 if($rws[day5] > 0)
  $message  =$message.'
    <td width="75">'.$rws[day5].' Days</td>';
   
  
  
  
    $message  =$message.'

  </tr>';
 
   if($rws['qty1'] > 0){
 
$message  =$message.'
 <tr>
    <td>Option 1</td>
    <td>'.$rws[qty1].' Pcs</td> ';
   
  
  if($rws[day1] > 0)
  $message  =$message.'
 <td>$'.$pr1.'</td>';
  if($rws[day2] > 0)
  $message  =$message.'
<td>$'.$pr2.'</td>';
   
 
  if($rws[day3] > 0)
 
 $message  =$message.'
 <td>$'.$pr3.'</td>';
   
   if($rws[day4] > 0)
 
 $message  =$message.'
  
   <td>$'.$pr4.'</td>';
   if($rws[day5] > 0)
 
 $message  =$message.'
  
   <td>$'.$pr5.'</td>';


$message  =$message.'
  
  </tr>';
  }
  if($rws['qty2'] > 0){ 
 $message  =$message.' 
  <tr>
    <td>Option 2</td>
    <td>'.$rws[qty2].' Pcs</td>';
 if($rws[day1] > 0)
 
 $message  =$message.'     
   
   <td>$'.$pr6.'</td>';
   
 if($rws[day2] > 0)
 
 $message  =$message.'     
   <td>$'.$pr7.'</td>';
   
if($rws[day3] > 0)
 
 $message  =$message.'      
   <td>$'.$pr8.'</td>';
   
if($rws[day4] > 0)
 
 $message  =$message.'      
   <td>$'.$pr9.'</td>';
   
   
if($rws[day5] > 0)
 
 $message  =$message.'   
   <td>$'.$pr10.'</td>';
 
$message  =$message.'
 
 </tr>';
    }	
	
	
   if($rws['qty3'] > 0){
   $message  =$message.' 
   <tr>
    <td>Option 3</td>
    <td>'.$rws[qty3].' Pcs</td>';
   
   
  if($rws[day1] > 0)
 
 $message  =$message.'  
   <td>$'.$pr11.'</td>';  
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'  
   <td>$'.$pr12.'</td>';
   
   
   
  if($rws[day3] > 0)
 
 $message  =$message.'     <td>$'.$pr13.'</td>';
   
   
  if($rws[day4] > 0)
 
 $message  =$message.'     <td>$'.$pr14.'</td>';
   
   
 if($rws[day5] > 0) 
 $message  =$message.'     <td>$'.$pr15.'</td> ';
   
   
   
   
 $message  =$message.'   </tr>   ';
   }
    
		
	if($rws['qty4'] > 0){
    $message  =$message.' 
	<tr>
    <td>Option 4</td> 
	
	 <td>'.$rws[qty4].' Pcs</td>
	';
      
  if($rws[day1] > 0)
 
 $message  =$message.'   
   
   <td>$'.$pr16.'</td> ';
     
   
   if($rws[day2] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr17.'</td> ';
   
   
   if($rws[day3] > 0)
 
 $message  =$message.'  
   
   
   <td>$'.$pr18.'</td> ';
   
   
  if($rws[day4] > 0) 
 $message  =$message.'      
   
   <td>$'.$pr19.'</td> ';
   
   
   if($rws[day5] > 0) 
 $message  =$message.'  
   <td>$'.$pr20.'</td>  ';  
   
   $message  =$message.'</tr>';
   }
     
   
  if($rws['qty5'] > 0){
  $message  =$message.' 
 <tr>  
    <td>Option 5</td>
    <td>'.$rws[qty5].' Pcs</td> ';     
   
   
    if($rws[day1] > 0) 
 $message  =$message.'    
   <td>$'.$pr21.'</td> ';   
   
   
   if($rws[day2] > 0) 
 $message  =$message.'   
   <td>$'.$pr22.'</td> ';  
   
   
    if($rws[day3] > 0) 
 $message  =$message.'    
   <td>$'.$pr23.'</td> ';   
   
   
    if($rws[day4] > 0) 
 $message  =$message.'    
   <td>$'.$pr24.'</td> ';
   
   
    if($rws[day5] > 0) 
 $message  =$message.'    
   <td>$'.$pr25.'</td>   ';   
   
   
    $message  =$message.'   </tr>'; 
 
   
   }
  
   if($rws['qty6'] > 0) {
  $message  =$message.' 
  
  <tr>
    <td>Option 6</td>
   
   <td>'.$rws[qty6].' Pcs</td>';   
   
    if($rws[day1] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr26.'</td>';
   
    if($rws[day2] > 0)
 
 $message  =$message.'
   
   
   <td>$'.$pr27.'</td>';
   
    if($rws[day3] > 0)
 
 $message  =$message.'
   
   
   <td>$'.$pr28.'</td>';
 
   
    if($rws[day4] > 0)
 
 $message  =$message.'
  
   
   
   <td>$'.$pr29.'</td>';
   
   
   
    if($rws[day5] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr30.'</td> ';
   
   
   
      $message  =$message.'
 
   </tr>';  }
  
   if($rws['qty7'] > 0){
   $message  =$message.' 
  <tr>
    <td>Option 7</td>
    <td>'.$rws[qty7].' Pcs</td>';
	
	
	 if($rws[day1] > 0)
 
 $message  =$message.'
   <td>$'.$pr31.'</td>';
   
   
   
    if($rws[day2] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr32.'</td>';
   
   
    if($rws[day3] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr33.'</td>';
   
   
    if($rws[day4] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr34.'</td>';
   
   
   
    if($rws[day5] > 0)
 
 $message  =$message.'
   
   <td>$'.$pr35.'</td> ';
   
   
   
         $message  =$message.'

   </tr>';  }
 
 
  if($rws['qty8'] > 0){
 $message  =$message.' 
 <tr>
    <td>Option 8</td>
    <td>'.$rws[qty8].' Pcs</td>';
	
if($rws[day1] > 0)
 
 $message  =$message.'	
	
   <td>$'.$pr36.'</td>';
   
   
 if($rws[day2] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr37.'</td>';
   
   
  if($rws[day3] > 0)
 
 $message  =$message.' 
   
   <td>$'.$pr38.'</td>';
   
   
  if($rws[day4] > 0)
 
 $message  =$message.' 
   
   <td>$'.$pr39.'</td>';
   
 if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr40.'</td> ';
   
   
          $message  =$message.'
  
   </tr>';  }
 

 if($rws['qty9'] > 0){
$message  =$message.' 
 <tr>
    <td>Option 9</td>
    <td>'.$rws[qty9].' Pcs</td>';  
   
   
   if($rws[day1] > 0)
 
 $message  =$message.'  
   <td>$'.$pr41.'</td>';  
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'   
   
   <td>$'.$pr42.'</td>';  
   
   if($rws[day3] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr43.'</td>';  
   
   if($rws[day4] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr44.'</td>';  
   
   if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>$'.$pr45.'</td>';   
   
           $message  =$message.'
  
   </tr>';  }
 
  if($rws['qty10'] > 0){
  $message  =$message.' 
 <tr>
    <td>Option 10</td>
    <td>'.$rws[qty10].' Pcs</td>'; 
	
	
	
    
	if($rws[day1] > 0)
 
 $message  =$message.' 
	
	<td>$'.$pr46.'</td>'; 
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'  
   <td>$'.$pr47.'</td>'; 
   
   
   if($rws[day3] > 0)
 
 $message  =$message.' 
   <td>$'.$pr48.'</td>'; 
   
   
 if($rws[day4] > 0)
 
 $message  =$message.'   
   <td>$'.$pr49.'</td>'; 
   
   if($rws[day5] > 0)
 
 $message  =$message.' 
   
   <td>$'.$pr50.'</td>';  
   
   
    $message  =$message.'
  
   </tr>'; 
   }
   
   
  $message  =$message.'   
</table>
  <br>
 When placing your purchase order, please refer to the Quote Number listed at the top of this page. <br>
Please feel free to call us should any requirements change.<br>
Thank you for the opportunity to quote your printed circuit board requirements.<br>
Sincerely,<br>
PCBsGlobal Inc. Sales Team.
  
<hr>
  <p style="font-size: 8pt">
	Quoted Lead times are based on material availability and shop capacity at time of order placement.  Quoted Lead Times are based on business days<br>  (Monday through Friday) not calendar days.  Holiday or Plant closures affecting lead-time will be noted during time of quote.
<br>
Quoted Lead times five business days or less are valid for 24 hours from time of issuance of quote.<br>

Price and delivery are subject to change pending final review of complete data package, including but not limited to, artwork, drawings, and applicable<br> specifications. Unless otherwise stated in the RFQ, price is based on a 20% X-out allowance on jobs being built in an array form.
  	</p>
  ';
$po = $rws[ord_id] + 10000 ;
$filename="quotationpdf/Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
?>
<?php
$fp = fopen( $filename, 'w');
fwrite($fp, $message);
$filename="Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".doc";
header('Content-disposition: attachment; filename='.$filename);
header('Content-type: application/vnd.ms-word');
echo  $message;
fclose($fp);
?>
</body>
</html>