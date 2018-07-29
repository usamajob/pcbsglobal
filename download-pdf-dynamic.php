<?php require_once('conn.php');
/*require('../pdfclass/html2fpdf.php');
*/
require('../pdftest/html2pdf.class.php');



 session_start();
   /* foreach ($_SESSION as $key=>$val)
    echo $key." ".$val;
	exit(0);
*/

?>
<?php 
$sqs="select * from order_tb where ord_id='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);




$sqs2="select * from data_tb where c_name='".$rws['cust_name']."'";

/*echo $sqs2;
exit(0);*/
$ress2=mysql_query($sqs2);
if(!$ress2)
{
die('errorn in data');
}
$rws2=mysql_fetch_array($ress2);





?>
<?php
$path="/home/pareomic/public_html/pcbsglobal.com/luke-pdf/upload/";

  $html2pdf = new HTML2PDF('P','A4','en');

/*$pdf=new HTML2FPDF();
*/
/*$pdf->AddPage();




*/



/*calcu prices*/


$bprice=2;
$leadtm=$rws['day1'];
//echo $leadtm;
if($leadtm==7)
{
$d1=$bprice;
}
if($leadtm==1)
{
$d1=$bprice+($bprice*(250/100));
}
if($leadtm==2)
{
$d1=$bprice+($bprice*(200/100));
}
if($leadtm==3)
{
$d1=$bprice+($bprice*(150/100));
}
if($leadtm==4)
{
$d1=$bprice+($bprice*(100/100));
}
//echo $d1;
//=== 2
$leadtm=$rws['day2'];
if($leadtm==7)
{
$d2=$bprice;
}
if($leadtm==1)
{
$d2=$bprice+($bprice*(250/100));
}
if($leadtm==2)
{
$d2=$bprice+($bprice*(200/100));
}
if($leadtm==3)
{
$d2=$bprice+($bprice*(150/100));
}
if($leadtm==4)
{
$d2=$bprice+($bprice*(100/100));
}

//====3 =====
$leadtm=$rws['day3'];
if($leadtm==7)
{
$d3=$bprice;
}
if($leadtm==1)
{
$d3=$bprice+($bprice*(250/100));
}
if($leadtm==2)
{
$d3=$bprice+($bprice*(200/100));
}
if($leadtm==3)
{
$d3=$bprice+($bprice*(150/100));
}
if($leadtm==4)
{
$d3=$bprice+($bprice*(100/100));
}
// 4 

$leadtm=$rws['day4'];
if($leadtm==7)
{
$d4=$bprice;
}
if($leadtm==1)
{
$d4=$bprice+($bprice*(250/100));
}
if($leadtm==2)
{
$d4=$bprice+($bprice*(200/100));
}
if($leadtm==3)
{
$d4=$bprice+($bprice*(150/100));
}
if($leadtm==4)
{
$d4=$bprice+($bprice*(100/100));
}


$leadtm=$rws['day5'];
if($leadtm==7)
{
$d5=$bprice;
}
if($leadtm==1)
{
$d5=$bprice+($bprice*(250/100));
}
if($leadtm==2)
{
$d5=$bprice+($bprice*(200/100));
}
if($leadtm==3)
{
$d5=$bprice+($bprice*(150/100));
}
if($leadtm==4)
{
$d5=$bprice+($bprice*(100/100));
}

// end of day

$qnt1=$rws['qty1'];
if($qnt1>=250)
{
$q1=$bprice;
}
if($qnt1<=100)
{
$q1=$bprice+($bprice*(150/100));
}
if($qnt1<=50)
{
$q1=$bprice+($bprice*(200/100));
}
if($qnt1<=10)
{
$q1=$bprice+($bprice*(250/100));
}
// 2
$qnt2=$rws['qty2'];
if($qnt2>=250)
{
$q2=$bprice;
}
if($qnt2<=100)
{
$q2=$bprice+($bprice*(150/100));
}
if($qnt2<=50)
{
$q2=$bprice+($bprice*(200/100));
}
if($qnt2<=10)
{
$q2=$bprice+($bprice*(250/100));
}
//3
$qnt3=$rws['qty3'];
if($qnt3>=250)
{
$q3=$bprice;
}
if($qnt3<=100)
{
$q3=$bprice+($bprice*(150/100));
}
if($qnt3<=50)
{
$q3=$bprice+($bprice*(200/100));
}
if($qnt2<=10)
{
$q3=$bprice+($bprice*(250/100));
}
// 4
$qnt4=$rws['qty4'];
if($qnt4>=250)
{
$q4=$bprice;
}
if($qnt4<=100)
{
$q4=$bprice+($bprice*(150/100));
}
if($qnt4<=50)
{
$q4=$bprice+($bprice*(200/100));
}
if($qnt4<=10)
{
$q4=$bprice+($bprice*(250/100));
}

$qnt5=$rws['qty5'];
if($qnt5>=250)
{
$q5=$bprice;
}
if($qnt5<=100)
{
$q5=$bprice+($bprice*(150/100));
}
if($qnt5<=50)
{
$q5=$bprice+($bprice*(200/100));
}
if($qnt5<=10)
{
$q5=$bprice+($bprice*(250/100));
}

$qnt6=$rws['qty6'];
if($qnt6>=250)
{
$q6=$bprice;
}
if($qnt6<=100)
{
$q6=$bprice+($bprice*(150/100));
}
if($qnt6<=50)
{
$q6=$bprice+($bprice*(200/100));
}
if($qnt6<=10)
{
$q6=$bprice+($bprice*(250/100));
}

$qnt7=$rws['qty7'];
if($qnt7>=250)
{
$q7=$bprice;
}
if($qnt7<=100)
{
$q7=$bprice+($bprice*(150/100));
}
if($qnt7<=50)
{
$q7=$bprice+($bprice*(200/100));
}
if($qnt7<=10)
{
$q7=$bprice+($bprice*(250/100));
}

$qnt8=$rws['qty8'];
if($qnt8>=250)
{
$q8=$bprice;
}
if($qnt8<=100)
{
$q8=$bprice+($bprice*(150/100));
}
if($qnt8<=50)
{
$q8=$bprice+($bprice*(200/100));
}
if($qnt8<=10)
{
$q8=$bprice+($bprice*(250/100));
}

$qnt9=$rws['qty9'];
if($qnt9>=250)
{
$q9=$bprice;
}
if($qnt9<=100)
{
$q9=$bprice+($bprice*(150/100));
}
if($qnt9<=50)
{
$q9=$bprice+($bprice*(200/100));
}
if($qnt9<=10)
{
$q9=$bprice+($bprice*(250/100));
}

$qnt10=$rws['qty10'];
if($qnt10>=250)
{
$q10=$bprice;
}
if($qnt10<=100)
{
$q10=$bprice+($bprice*(150/100));
}
if($qnt10<=50)
{
$q10=$bprice+($bprice*(200/100));
}
if($qnt10<=10)
{
$q10=$bprice+($bprice*(250/100));
}



$baseprice = $rws['price'];

/*
if($_REQUEST['chk2']=='Double Sided')
{
if(isset($_REQUEST['per1']) && $_REQUEST['per1'] != 0)
$baseprice=$baseprice+($baseprice*($_REQUEST['per1']/100));
}

if($_REQUEST['chk3']=='4Lyrs')
{
$baseprice = $baseprice + ($baseprice*(10/100));
}
if($_REQUEST['chk4']=='6Lyrs')
{
$baseprice = $baseprice + ($baseprice*(20/100));
}
if($_REQUEST['chk5']=='8Lyrs')
{
$baseprice = $baseprice + ($baseprice*(30/100));
}
if($_REQUEST['chk6']=='10Lyrs')
{
$baseprice = $baseprice + ($baseprice*(40/100));
}


*/



$pr1=$d1+$q1+$baseprice;  	$pr2=$d2+$q1+$baseprice;	$pr3=$d3+$q1+$baseprice;	$pr4=$d4+$q1+$baseprice;    $pr5=$d5+$q1+$baseprice;

$pr6=$d1+$q2+$baseprice;  	$pr7=$d2+$q2+$baseprice;	$pr8=$d3+$q2+$baseprice;	$pr9=$d4+$q2+$baseprice;    $pr10 = $d5+$q2+$baseprice;

$pr11=$d1+$q3+$baseprice;  	$pr12=$d2+$q3+$baseprice;	$pr13=$d3+$q3+$baseprice;	$pr14=$d4+$q3+$baseprice;    $pr15=$d5+$q3+$baseprice;

$pr16=$d1+$q4+$baseprice;  	$pr17=$d2+$q4+$baseprice;	$pr18=$d3+$q4+$baseprice;	$pr19=$d4+$q4+$baseprice;    $pr20=$d5+$q4+$baseprice;

$pr21=$d1+$q5+$baseprice;     $pr22=$d2+$q5+$baseprice;     $pr23=$d3+$q5+$baseprice;     $pr24=$d4+$q5+$baseprice;    $pr25=$d5+$q5+$baseprice;

$pr26=$d1+$q6+$baseprice;     $pr27=$d2+$q6+$baseprice;     $pr28=$d3+$q6+$baseprice;     $pr29=$d4+$q6+$baseprice;    $pr30=$d5+$q6+$baseprice;

$pr31=$d1+$q7+$baseprice;     $pr32=$d2+$q7+$baseprice;     $pr33=$d3+$q7+$baseprice;     $pr34=$d4+$q7+$baseprice;    $pr35=$d5+$q7+$baseprice;

$pr36=$d1+$q8+$baseprice;     $pr37=$d2+$q8+$baseprice;     $pr38=$d3+$q8+$baseprice;     $pr39=$d4+$q8+$baseprice;    $pr40=$d5+$q8+$baseprice;

$pr41=$d1+$q9+$baseprice;     $pr42=$d2+$q9+$baseprice;     $pr43=$d3+$q9+$baseprice;     $pr44=$d4+$q9+$baseprice;    $pr45=$d5+$q9+$baseprice;

$pr46=$d1+$q10+$baseprice;     $pr47=$d2+$q10+$baseprice;     $pr48=$d3+$q10+$baseprice;     $pr49=$d4+$q10+$baseprice;    $pr50=$d5+$q10+$baseprice;

$baseprice = round($baseprice, 2);

$pr1=round($pr1, 2);
$pr2=round($pr2, 2);
$pr3=round($pr3, 2);
$pr4=round($pr4, 2);
$pr5=round($pr5, 2);
$pr6=round($pr6, 2);
$pr7=round($pr7, 2);
$pr8=round($pr8, 2);
$pr9=round($pr9, 2);
$pr10=round($pr10, 2);


$pr11=round($pr11, 2);
$pr12=round($pr12, 2);
$pr13=round($pr13, 2);
$pr14=round($pr14, 2);
$pr15=round($pr15, 2);
$pr16=round($pr16, 2);
$pr17=round($pr17, 2);
$pr18=round($pr18, 2);
$pr19=round($pr19, 2);
$pr20=round($pr20, 2);


$pr21=round($pr21, 2);
$pr22=round($pr22, 2);
$pr23=round($pr23, 2);
$pr24=round($pr24, 2);
$pr25=round($pr25, 2);
$pr26=round($pr26, 2);
$pr27=round($pr27, 2);
$pr28=round($pr28, 2);
$pr29=round($pr29, 2);
$pr30=round($pr30, 2);

$pr31=round($pr31, 2);
$pr32=round($pr32, 2);
$pr33=round($pr33, 2);
$pr34=round($pr34, 2);
$pr35=round($pr35, 2);
$pr36=round($pr36, 2);
$pr37=round($pr37, 2);
$pr38=round($pr38, 2);
$pr39=round($pr39, 2);
$pr40=round($pr40, 2);

$pr41=round($pr41, 2);
$pr42=round($pr42, 2);
$pr43=round($pr43, 2);
$pr44=round($pr44, 2);
$pr45=round($pr45, 2);
$pr46=round($pr46, 2);
$pr47=round($pr47, 2);
$pr48=round($pr48, 2);
$pr49=round($pr49, 2);
$pr50=round($pr50, 2);



/*calcu prices end*/

$qno=intval($_REQUEST['id'])+10000;

$message  ='

<page>


<br>
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="50px" height="40px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="125"></td>
	<td> <h1>Quotation</h1></td>
	<td width="100"></td>
    <td><b>Quote No : </b>'.$qno.' <br> 
<b>Quotation Date: </b>  '.date("m-d-Y") .' <br> 
<b>Quote Valid for : </b> 30 Days <br> 
	</td>
    </tr>
  </table>
  
   <table width="800px" border="0">
   <tr>
    <td width="104"></td>
   <td width="279"><br> <br> 
  <!-- <b style="text-decoration:underline">Connecting the world</b><br> <br> -->
	 PCBsGlobal Incorporated.<br>
	
	
	2500 E. La Palma Ave.<br>
Anaheim Ca. 92806 <br>
Phone             (855) 722-7456    <br>   
Fax: (855) 262-5305 <br>
Email: sales@pcbsglobal.com <br>
	
	
	
	Quote Prepared By: '.$_SESSION['uname'].' <br> </td>
	
	
	<td width="95"></td>
    <td width="324">
	<h4>Quote To: </h4>'.$rws2['c_name'].'<br>'.$rws2['c_address'].'<br>'.$rws2['c_address2'].'<br>'.$rws2['c_address3'].'<br>'.$rws['phone'].'<br> 
	<b> </b>'.$rws['email'].' <br> 
	</td>
    </tr>
  </table>
  
  <br><br>
  
   <table width="1000" border="0">
  <tr  style="background-color:#CCC; text-align: center;">
    <td colspan="4" width="750" height="25" ><b>Job Information</b></td>
   </tr>
    <tr>
    <td><b>Part Number: </b>'.$rws[part_no].' </td>
	 <td><b>Revision: </b>'.$rws[rev].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  '.$rws[new_or_rep].' </b></td>
	  <td><b>Misc Charge: </b> $ '.$rws[descharge].'  </td>
	   <td><b>NRE: </b> $ '.$rws[necharge].' </td>
   </tr>
    <tr   style=" text-align: center;">
    <td colspan="4"><br>
	<p style="font-size: 12pt">Quotation is based on the following:</p>A '.$rws[no_layer].' job. Board size: '.$rws[board_size1].' X '.$rws[board_size2].' with '.$rws[finish].' finish . <br> 
	'.$rws[thickness].' Thick ';
	
	
	if ( ($rws[con_impe_sing]=='')and ($rws[con_impe_diff]==''))
	$message  =$message.'
	without Impedence <br> ';
	else if ( ($rws[con_impe_sing]!='')and ($rws[con_impe_diff]!=''))
	$message  =$message.'
	with  '.$rws[con_impe_sing].'/ '.$rws[con_impe_diff].' impedance and a tolerance of  '.$rws[tore_impe].' .<br> ';
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


$message  =$message.'<br>	Material Required: '.$rws[m_require];




if($rws['fingers_gold']=='No')

$message  =$message.'<br>	Without Fingers Nickel/Hard Gold ';
else
$message  =$message.'<br>	With Fingers Nickel/Hard Gold ';
if($rws['array']=='YES')
$message  =$message.'<br>	In Array Form ';
else
$message  =$message.'<br>	Not In Array Form ';
	
	
	
	
	$message  =$message.'.
	</td>
   </tr>
   </table>
    <br><br>
  
  
    <table style=" text-align: center;" width="1000" border="1">
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
 <td>'.$pr1.'</td>';
  if($rws[day2] > 0)
  $message  =$message.'
<td>'.$pr2.'</td>';
   
 
  if($rws[day3] > 0)
 
 $message  =$message.'
 <td>'.$pr3.'</td>';
   
   if($rws[day4] > 0)
 
 $message  =$message.'
  
   <td>'.$pr4.'</td>';
   if($rws[day5] > 0)
 
 $message  =$message.'
  
   <td>'.$pr5.'</td>';


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
   
   <td>'.$pr6.'</td>';
   
 if($rws[day2] > 0)
 
 $message  =$message.'     
   <td>'.$pr7.'</td>';
   
if($rws[day3] > 0)
 
 $message  =$message.'      
   <td>'.$pr8.'</td>';
   
if($rws[day4] > 0)
 
 $message  =$message.'      
   <td>'.$pr9.'</td>';
   
   
if($rws[day5] > 0)
 
 $message  =$message.'   
   <td>'.$pr10.'</td>';

 
 
 
 
 
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
   <td>'.$pr11.'</td>';
   
   
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'  
   <td>'.$pr12.'</td>';
   
   
   
  if($rws[day3] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr13.'</td>';
   
   
  if($rws[day4] > 0)
 
 $message  =$message.'  
   
   
   <td>'.$pr14.'</td>';
   
   
 if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr15.'</td> ';
   
   
   
   
 $message  =$message.'
  
   </tr>
   
   ';  }
    
	
	
	if($rws['qty4'] > 0){
    $message  =$message.' 
	<tr>
    <td>Option 4</td> 
	
	 <td>'.$rws[qty4].' Pcs</td>
	';
   
   
   
 
   
   
  if($rws[day1] > 0)
 
 $message  =$message.'   
   
   <td>'.$pr16.'</td> ';
   
   
   
   if($rws[day2] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr17.'</td> ';
   
   
   if($rws[day3] > 0)
 
 $message  =$message.'  
   
   
   <td>'.$pr18.'</td> ';
   
   
  if($rws[day4] > 0)
 
 $message  =$message.'   
   
   
   <td>'.$pr19.'</td> ';
   
   
   if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr20.'</td>  ';
   
   
   
   
   
   $message  =$message.'
 
   
   </tr>';  }
   
   
   
   
   
   
   
  if($rws['qty5'] > 0){
  $message  =$message.' 
 <tr>
  
  
    <td>Option 5</td>
    <td>'.$rws[qty5].' Pcs</td> ';
   
   
   
   
    if($rws[day1] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr21.'</td> ';
   
   
   
   if($rws[day2] > 0)
 
 $message  =$message.'  
   
   
   
   <td>'.$pr22.'</td> ';
   
   
   
   
    if($rws[day3] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr23.'</td> ';
   
   
   
    if($rws[day4] > 0)
 
 $message  =$message.' 
   
   
   <td>'.$pr24.'</td> ';
   
   
    if($rws[day5] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr25.'</td>   ';
   
   
   
   
    $message  =$message.'
  
   </tr>'; 
   
   
   
   }
  
   if($rws['qty6'] > 0){
  $message  =$message.' 
  
  <tr>
    <td>Option 6</td>
   
   <td>'.$rws[qty6].' Pcs</td>';
   
   
   
   
    if($rws[day1] > 0)
 
 $message  =$message.'
   
   <td>'.$pr26.'</td>';
   
   
   
   
   
    if($rws[day2] > 0)
 
 $message  =$message.'
   
   
   
   
   <td>'.$pr27.'</td>';
   
   
   
   
   
    if($rws[day3] > 0)
 
 $message  =$message.'
   
   
   
   <td>'.$pr28.'</td>';
   
   
   
   
   
   
    if($rws[day4] > 0)
 
 $message  =$message.'
   
   
   
   <td>'.$pr29.'</td>';
   
   
   
    if($rws[day5] > 0)
 
 $message  =$message.'
   
   <td>'.$pr30.'</td> ';
   
   
   
      $message  =$message.'
 
   $</tr>';  }
  
   if($rws['qty7'] > 0){
   $message  =$message.' 
  <tr>
    <td>Option 7</td>
    <td>'.$rws[qty7].' Pcs</td>';
	
	
	 if($rws[day1] > 0)
 
 $message  =$message.'
   <td>'.$pr31.'</td>';
   
   
   
    if($rws[day2] > 0)
 
 $message  =$message.'
   
   <td>'.$pr32.'</td>';
   
   
    if($rws[day3] > 0)
 
 $message  =$message.'
   
   <td>'.$pr33.'</td>';
   
   
    if($rws[day4] > 0)
 
 $message  =$message.'
   
   <td>'.$pr34.'</td>';
   
   
   
    if($rws[day5] > 0)
 
 $message  =$message.'
   
   <td>'.$pr35.'</td> ';
   
   
   
         $message  =$message.'

   </tr>';  }
 
 
  if($rws['qty8'] > 0){
 $message  =$message.' 
 <tr>
    <td>Option 8</td>
    <td>'.$rws[qty8].' Pcs</td>';
	
if($rws[day1] > 0)
 
 $message  =$message.'	
	
   <td>'.$pr36.'</td>';
   
   
 if($rws[day2] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr37.'</td>';
   
   
  if($rws[day3] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr38.'</td>';
   
   
  if($rws[day4] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr39.'</td>';
   
 if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr40.'</td> ';
   
   
          $message  =$message.'
  
   </tr>';  }
 

 if($rws['qty9'] > 0){
$message  =$message.' 
 <tr>
    <td>Option 9</td>
    <td>'.$rws[qty9].' Pcs</td>';  
   
   
   if($rws[day1] > 0)
 
 $message  =$message.'  
   <td>'.$pr41.'</td>';  
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'   
   
   <td>'.$pr42.'</td>';  
   
   if($rws[day3] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr43.'</td>';  
   
   if($rws[day4] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr44.'</td>';  
   
   if($rws[day5] > 0)
 
 $message  =$message.'  
   
   <td>'.$pr45.'</td>';   
   
           $message  =$message.'
  
   </tr>';  }
 
  if($rws['qty10'] > 0){
  $message  =$message.' 
 <tr>
    <td>Option 10</td>
    <td>'.$rws[qty10].' Pcs</td>'; 
	
	
	
    
	if($rws[day1] > 0)
 
 $message  =$message.' 
	
	<td>'.$pr46.'</td>'; 
   
   
  if($rws[day2] > 0)
 
 $message  =$message.'  
   <td>'.$pr47.'</td>'; 
   
   
   if($rws[day3] > 0)
 
 $message  =$message.' 
   <td>'.$pr48.'</td>'; 
   
   
 if($rws[day4] > 0)
 
 $message  =$message.'   
   <td>'.$pr49.'</td>'; 
   
   if($rws[day5] > 0)
 
 $message  =$message.' 
   
   <td>'.$pr50.'</td>';  
   
   
            $message  =$message.'
  
   </tr>';  }
   
   
  $message  =$message.'   
</table>
  
  <p> 
 When placing your purchase order, please refer to the Quote Number listed at the top of this page. <br>
Please feel free to call us should any requirements change.<br>

Thank you for the opportunity to quote your printed circuit board requirements.<br><br>

Sincerely,<br>
 PCBsGlobal Inc. Sales Team.<br>
  
  
  
  </p>
  <hr>
  
    <p style="font-size: 8pt">
	Quoted Lead times are based on material availability and shop capacity at time of order placement.  Quoted Lead Times are based on business days<br>  (Monday through Friday) not calendar days.  Holiday or Plant closures affecting lead-time will be noted during time of quote.
<br>
Quoted Lead times five business days or less are valid for 24 hours from time of issuance of quote.<br>

Price and delivery are subject to change pending final review of complete data package, including but not limited to, artwork, drawings, and applicable<br> specifications. Unless otherwise stated in the RFQ, price is based on a 20% X-out allowance on jobs being built in an array form.<br>
  
	
	
	</p>
  
  
  </page>
  
  
  
  ';
  
   $html2pdf->WriteHTML($message);

  $filename="quotationpdf/$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
  $html2pdf->Output($filename,'F');

$html2pdf->Output($filename,'D');
  $html2pdf->Output('exemple.pdf');

     // $html2pdf->Output('exemple.pdf');
//$pdf->WriteHTML($message);
//$filename=$path."$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
/*$filename="$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
$pdf->Output($filename,'D');*/
?>