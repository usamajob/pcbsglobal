<?php 

$misccharge =	0;
		
	$nre =		0;

require_once('conn.php');
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
$innerCopper=$rws['inner_copper'];
$color=$rws['color'];
$startCuz=$rws['start_cu'];
$sscolor=$rws['ss_color'];
$routeTol=$rws['route_tole'];
$othermarking=$rws['other_marking'];
$xoutsallowed=$rws['xouts'];
$numerxouts=$rws['xouts1'];
$miling=$rws['bevel'];
$cDepth=$rws['cut_outs'];
$ePlating=$rws['slots'];
$mRequired=$rws['m_require'];
$impdTol=$rws['tore_impe'];
$ipcClass=$rws['ipc_class'];
$finsh=$rws['finish'];

$rest = substr($rws['cust_name'], -2);  

if ($rest=='-C'){

$rest1 = substr($rws['cust_name'], 0, -2);  // returns "abcde"
$sqs2="select * from data_tb where c_name='".$rest1."'";

}
else {
$sqs2="select * from data_tb where c_name='".$rws['cust_name']."'";
}
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
$pr1=number_format($pr1,2);


$pr2=number_format($pr2, 2);
$pr3=number_format($pr3, 2);
$pr4=number_format($pr4, 2);
$pr5=number_format($pr5, 2);
$pr6=number_format($pr6, 2);
$pr7=number_format($pr7, 2);
$pr8=number_format($pr8, 2);
$pr9=number_format($pr9, 2);
$pr10=number_format($pr10, 2);


$pr11=number_format($pr11, 2);
$pr12=number_format($pr12, 2);
$pr13=number_format($pr13, 2);
$pr14=number_format($pr14, 2);
$pr15=number_format($pr15, 2);
$pr16=number_format($pr16, 2);
$pr17=number_format($pr17, 2);
$pr18=number_format($pr18, 2);
$pr19=number_format($pr19, 2);
$pr20=number_format($pr20, 2);


$pr21=number_format($pr21, 2);
$pr22=number_format($pr22, 2);
$pr23=number_format($pr23, 2);
$pr24=number_format($pr24, 2);
$pr25=number_format($pr25, 2);
$pr26=number_format($pr26, 2);
$pr27=number_format($pr27, 2);
$pr28=number_format($pr28, 2);
$pr29=number_format($pr29, 2);
$pr30=number_format($pr30, 2);

$pr31=number_format($pr31, 2);
$pr32=number_format($pr32, 2);
$pr33=number_format($pr33, 2);
$pr34=number_format($pr34, 2);
$pr35=number_format($pr35, 2);
$pr36=number_format($pr36, 2);
$pr37=number_format($pr37, 2);
$pr38=number_format($pr38, 2);
$pr39=number_format($pr39, 2);
$pr40=number_format($pr40, 2);

$pr41=number_format($pr41, 2);
$pr42=number_format($pr42, 2);
$pr43=number_format($pr43, 2);
$pr44=number_format($pr44, 2);
$pr45=number_format($pr45, 2);
$pr46=number_format($pr46, 2);
$pr47=number_format($pr47, 2);
$pr48=number_format($pr48, 2);
$pr49=number_format($pr49, 2);
$pr50=number_format($pr50, 2);

$qno=intval($_REQUEST['id'])+10000;


if ($rws[no_layer]=='single')
$nol = '1';
else if ($rws[no_layer]=='Double Sided')
$nol = '2';
else if ($rws[no_layer]=='4Lyrs')
$nol = '4';
else if ($rws[no_layer]=='6Lyrs')
$nol = '6';
else if ($rws[no_layer]=='8Lyrs')
$nol = '8';
else if ($rws[no_layer]=='10Lyrs')	
$nol = '10';

else 
$nol=$rws[no_layer]. '';

$message  ='

<page>


<br>
<table  width="1500px" border="0"  >
   <tr> 
    <td style="width:200px"><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="50px" height="40px" style="width:160px; height:180px; " alt="PCBsGlobal Inc. Logo"></td>  
	<td style="width:950px" style="vertical-align:top">
	
	<h1 style="font-size: 40pt;color:#5660B1"   >  Quotation &nbsp;&nbsp;</h1>
	
	 <strong>PCBs Global Incorporated.</strong><br>
	
	
	
Phone             (855) 722-7456<br> 
Fax: (855) 262-5305 <br>
 sales@pcbsglobal.com <br>
	Quote Prepared By: '.$_SESSION['uname'].'
	</td>
		
	
    <td style="vertical-align:top">
	
	
	
	<b>Quote No : </b>'.$qno.' <br>
<b>Quotation Date: </b>  '.$rws[ord_date] .' <br>
<b>Quote Valid for : </b> 30 Days <br><br><br><br>
	<strong>Quote To:</strong><br>'.$rws2['c_name'].'<br>'.$rws['req_by'].'<br>'.$rws['phone'].'<br> 
	'.$rws['email'].' 
	
	
	</td>
	
    </tr>
  </table>
   <table width="1000" border="0" >
  <tr  style="background-color:#656BBC; color:#FFF; text-align: center; font-size: 18pt;">
    <td colspan="4" width="750" height="25" ><b>Order Information</b></td>
   </tr>
   <tr>
    <td colspan="4" width="750" height="3px" ></td>
   </tr>
    <tr>
    <td align=center><b>Part Number: </b>'.$rws[part_no].' </td>
	 <td align=center><b>Revision: </b>'.$rws[rev].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  '.$rws[new_or_rep].' </b></td>';
	 	
		
		
		
		if ($rws[cancharge]!='yes'){
		
		
		
	$misccharge =	$rws[necharge];
		
	$nre =		$rws[descharge];
		
		
	   
	   if($rws[descharge]==0.00 && $rws[necharge]==0.00)
	   {
			$message  =$message.'<td><b> </b>  </td>
							 <td><b>NRE: </b> </td>';
	   }  	  
	     else if($rws[descharge]!=0.00 && $rws[necharge]!=0.00 && $rws[descharge1]!="" && $rws[descharge2]!="")
	   {
		$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp;$'.$rws[descharge].'&nbsp; &nbsp;'.$rws[desdesc1].': &nbsp; $'.$rws[descharge1].'&nbsp;&nbsp; '.$rws[desdesc2].': &nbsp; $'.$rws[descharge2].'  </b></td>
							  <td><b>NRE: </b> $ '.$rws[necharge].'</td>';
	   }
	    else if($rws[descharge]!=0.00 && $rws[necharge]==0.00 && $rws[descharge1]!="")
	   {
			$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp;$'.$rws[descharge].'&nbsp;&nbsp;'.$rws[desdesc1].': &nbsp; $'.$rws[descharge1].'  </b></td>
							 <td><b>NRE: </b>  </td>';
	   }
	   	    else if($rws[descharge]!=0.00 && $rws[necharge]!=0.00 && $rws[descharge1]!="")
	   {
			$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp; $'.$rws[descharge].'&nbsp;&nbsp; '.$rws[desdesc1].': &nbsp; $'.$rws[descharge1].'  </b></td>
							  <td><b>NRE: </b> $ '.$rws[necharge].'</td>';
	   }
	    
	  else if($rws[descharge]==0.00 && $rws[necharge]!=0.00)
	   {
			$message  =$message.'<td><b> </b>  </td>
							 <td><b>NRE: </b> $ '.$rws[necharge].'</td>';
	   }
	   else if($rws[descharge]!=0.00 && $rws[necharge]==0.00)
	   {
			$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp; $ '.$rws[descharge].'  </b></td>
							 <td><b>NRE: </b>  </td>';
	   }
	   
	   else if($rws[descharge]!="" && $rws[necharge]!="" && $rws[descharge1]=="" && $rws[descharge2]=="")
	   {
			$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp; $ '.$rws[descharge].'  </b></td>
							 <td><b>NRE: </b> $ '.$rws[necharge].'</td>';
	   }
	   

	    else
	   {
		//	$message  =$message.'<td><b>Misc Charge: </b> $ '.$rws[descharge].'  </td>
		$message  =$message.'<td><b>'.$rws[desdesc].': &nbsp; $'.$rws[descharge].'&nbsp;&nbsp; '.$rws[desdesc1].': &nbsp; $'.$rws[descharge1].' &nbsp;&nbsp;'.$rws[desdesc2].': &nbsp; $'.$rws[descharge2].'  </b></td>
							 <td><b>NRE: </b> $ '.$rws[necharge].' </td>';
	   }
	   
	   
	   	  }
		  else{
		$message  =$message.'
	  
	  
	  
	  <td><b>Cancellation Charge: </b> $ '.$rws[ccharge].'  </td>
	   <td></td>';
	   	  }
		
$message  =$message.'
</tr><tr><td colspan="4" width="750" height="3px" ></td></tr>
</table>
';
	   if ($rws[is_spinsadmact]=='no'){
	
$message  =$message.'
<table  border="1">
  <tr>
    <td style="width:250px" >PCB Type: <strong>'.$nol.'</strong> Lyr <strong>'.$rws[m_require].'</strong> Mat.</td>
    <td style="width:130px">Thick: <strong>'.$rws[thickness].'</strong>';
	
	
	if($rws['thickness_tole']!='')
	$message  =$message.' '.$rws['thickness_tole'];
	
	
	
	
$pieces = explode("/", $rws[start_cu] );



	
$pieces2 = explode("/", $rws[inner_copper] );

	
	/*$message  =$message.'
	</td>
    
	
	
	<td style="width:180px">&nbsp;Cu: '.$pieces[0].'&nbsp;Oz O/Ls&nbsp;&nbsp;&nbsp;';
	
	
	
	if (($nol=='1')or($nol=='2'))
	$message  =$message;
	else 
	$message  =$message. $pieces2[0].'&nbsp;Oz I/Ls ';
	*/
$message  =$message.'
	</td>
    
	
	
	<td style="width:180px">FOB:  <strong>'.$rws[fob].'</strong>&nbsp;';	
	
$message  =$message.'	
	</td>
   <td style="width:140px">IPC Class:  <strong>'.$rws[ipc_class].'</strong></td>
  </tr>
  <tr>
    <td>Array Info: ';
	
	
	if($rws['array']=='YES')
$message  =$message.'	<strong>'.$rws[array_size1].' X '.$rws[array_size2].' ('.$rws[b_per_array].') Up</strong> ';


	
	
	$message  =$message.'
	
	</td>
    <td>Bd size: <strong>'.$rws[board_size1].' X '.$rws[board_size2].'</strong>&nbsp;</td>
    <td>Imp: <strong>';
	
	
	if ( ($rws[con_impe_sing]=='')and ($rws[con_impe_diff]==''))
	$message  =$message.'';
	else if ( ($rws[con_impe_sing]!='')and ($rws[con_impe_diff]!=''))
	$message  =$message.'&nbsp;SE/Diff&nbsp;&nbsp;&nbsp;&nbsp;Tol:&nbsp;'.$rws[tore_impe];
	else if ($rws[con_impe_sing]!='')
	$message  =$message.'&nbsp;SE&nbsp;&nbsp;&nbsp;&nbsp;Tol:&nbsp;'.$rws[tore_impe];
	else if ($rws[con_impe_diff]!='')
	$message  =$message.'&nbsp;Diff&nbsp;&nbsp;&nbsp;&nbsp;Tol:&nbsp;'.$rws[tore_impe];
	
	
	
	$message  =$message.' </strong>	
	</td>
	<td>Finish: <strong>'.$rws[finish].'</strong></td>
  </tr>
 
  <tr>
    <td  colspan="4" style="padding-top:5px;"><strong><span style="padding-top:15px;">Special Requirements / Notes</span></strong>:<br/>';  
	
	
	
	
	if(($innerCopper == $innerCopper)and($innerCopper != '')) {
		$message  =$message.'' .$innerCopper.' Oz. Cu Internal';
	}

	if (($innerCopper != '')and($startCuz != '')){
		$message  =$message.' | ';
		}
	if(($startCuz == $startCuz)and($startCuz != '')) {
		$message  =$message.'' .$startCuz.' Oz. Cu External';
	}
$fingers_gold = $rws['fingers_gold'];

	if             (  (($innerCopper != '')or($startCuz != ''))and ($fingers_gold == 'yes')){
		$message  =$message.' | ';
		}
	
	
	
	if(($fingers_gold == $fingers_gold)and($fingers_gold == 'yes')) {
		$message  =$message.'' .' Nickel/Hard Gold Fingers';
	}
	
	if (($innerCopper != '')||($startCuz != '')||($fingers_gold != '')){
		$message  =$message.'<br clear="all" />';
		}




$hdi_design= $rws['hdi_design'];


	if($hdi_design=='Yes')
	$message  =$message.'HDI Design';
	
	
	
	
	if($hdi_design=='Yes' && $rws['blind'] =='yes')
	$message  =$message.' / Blind Vias';

	
	
	
	else if($rws['blind']=='yes')
	$message  =$message.'Blind Vias ';
	
	
	
	if( ($hdi_design=='Yes' ||   $rws['blind']=='yes') && $rws['buried']=='yes')
	$message  =$message.' / Buried Vias ';
	
	else if($rws['buried']=='yes')
	$message  =$message.'Buried Vias '; 
	
	
	if(($hdi_design=='Yes' ||$rws['blind']=='yes' || $rws['buried']=='yes') && $rws['bb_both']=='Yes')
	$message  =$message.' / Blind and Buried Vias ';
	
	else if($rws['bb_both']=='Yes')
	$message =$message.'Blind and Buried Vias ';
	
	
	if (($rws['blind']=='yes' || $rws['buried']=='yes' || $rws['bb_both']=='Yes')and($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
		
		$message =$message.'Design';
		}
	
	
	if (($hdi_design=='Yes' || $rws['blind']=='yes' || $rws['buried']=='yes' || $rws['bb_both']=='Yes')and($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
		
		$message =$message.'<font style="margin-left: 6px;"> | </font>';
		}
	
	
	
	

	
	
	if($miling=='yes') {
	$message =$message.'<font >Miling</font>';
	}
	
	if($miling=='yes' && $cDepth=='Yes') {
	$message =$message.' / Control Depth';
	}
	else if($cDepth=='Yes'){
	$message =$message.'<font >Control Depth</font>';
	}
	
	if(($miling=='yes' || $cDepth=='Yes') && $ePlating=='Yes') {
	$message =$message.' / Edge Plating Required';
	}
	else if($ePlating=='Yes'){
	$message =$message.'<font >Edge Plating Required</font>';
	}
	
	$blind = $rws['blind'];
	$buried = $rws['buried'];
	$bb_both = $rws['bb_both'];
		
		/*if (  ($blind != '')  || ($buried != '') ||($bb_both != '')  ||($miling != '')  ||($cDepth != '') ||($ePlating != '')){
		$message  =$message.'123<br clear="all" />';
		}*/
		
		if (($hdi_design=='Yes' ||$rws['blind']=='yes' || $rws['buried']=='yes' || $rws['bb_both']=='Yes')||($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
		
		$message  =$message.'<br clear="all" />';
		}

	
	
	
	
	$seprneed = 0;
	
	
    if(($color == $color)and($color != '')) {
    $message =$message.''.$color .' Soldermask ';
	$seprneed = 1;
}

		
		
		
		
		
		if(($sscolor == $sscolor)and($sscolor != '')) {
			if ($seprneed == 1 ){
		$message =$message.' | ';
		}
			$message =$message.''.$sscolor.' Silkscreen ';
			$seprneed = 1;
		}
		
		
		
	if(($othermarking == $othermarking)and($othermarking != '')) {
		if ($seprneed == 1 ){
		$message =$message.' | ';
		}
		
		$message =$message.' '.$othermarking.'';
		$seprneed = 1;
	}
	
	
	if($routeTol !='' && $routeTol !='+/-.005') {
		
		if ($seprneed == 1 ){
		$message =$message.' | ';
		}
		
	$message =$message.'' .$routeTol.' Overall Dimensions Tolerance ';
	$seprneed = 1;
	}
	
	
	
	if($xoutsallowed !='' && $xoutsallowed !='yes') {
		
		if ($seprneed == 1 ){
		$message =$message.' | ';
		}
		
		$message =$message.'' .ucfirst($xoutsallowed).' X-Outs Allowed';
		$seprneed = 1;
	}
	else if($xoutsallowed !='' && $xoutsallowed =='yes') {
		if ($seprneed == 1 ){
		$message =$message.' | ';
		}
		
		$message =$message.'' .$numerxouts.' X-Outs Allowed per Array';
		$seprneed = 1;
	}	

	
	
	
		
	
	
	
	
	$message  = $message. '<br/>'.$rws[special_instadmin].'';
	
	$message  = $message.'</td>
  </tr>
</table>
<br>
';


  if ($rws[cancharge]!='yes'){
  
  $message  =$message.'
    <table style=" text-align: center;" width="1000" border="1">
  <tr >
    <td width="95"></td>
	<td width="95"></td>  ';
   
    if($rws[day1] > 0)
  $message  =$message.'
   <td width="95">'.$rws[day1].' Days</td>';
   
    if($rws[day2] > 0)
  $message  =$message.'
    <td width="95">'.$rws[day2].' Days</td>';
	
	 if($rws[day3] > 0)
  $message  =$message.'
    <td width="95">'.$rws[day3].' Days</td>';
	
	 if($rws[day4] > 0)
  $message  =$message.'
    <td width="95">'.$rws[day4].' Days</td>';
	
	 if($rws[day5] > 0)
  $message  =$message.'
    <td width="95">'.$rws[day5].' Days</td>';
   
  
  
  
    $message  =$message.'

  </tr>';
 
   if($rws['qty1'] > 0){
 
$message  =$message.'
 <tr>
    <td>Option 1</td>
    <td>'.$rws[qty1].' Pcs</td> ';
   
  
  if($rws[day1] > 0)
  {
     if($pr1==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr1.' ea</td>';
	  }
  }
  if($rws[day2] > 0)
  {
  if($pr2==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr2.' ea</td>';
	  }
  }
  
 
  if($rws[day3] > 0)
  {
   if($pr3==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr3.' ea</td>';
	  } 
  }
 

   
   if($rws[day4] > 0)
   {
     if($pr4==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr4.' ea</td>';
	  }
   }
 
 
   if($rws[day5] > 0)
   {
     if($pr5==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr5.' ea</td>';
	  }
   }
 



$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>
    ';
   
  
 
  if($rws[day1] > 0){
  
   if($pr1==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty1] * $pr1 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
   if($pr2==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty1] * $pr2 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
    if($pr3==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty1] * $pr3 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
    if($pr4==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty1] * $pr4 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
    if($pr5==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty1] * $pr5 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 }
  if($rws['qty2'] > 0){ 
 $message  =$message.' 
  <tr>
    <td>Option 2</td>
    <td>'.$rws[qty2].' Pcs</td>';
 if($rws[day1] > 0)
 {
   if($pr6==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr6.' ea</td>';
	  }
 }
   
 if($rws[day2] > 0)
 {
   if($pr7==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr7.' ea</td>';
	  }
 }
 
   
if($rws[day3] > 0)
{
	if($pr8==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr8.' ea</td>';
	  }
}

   
if($rws[day4] > 0)
{
  if($pr9==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr9.' ea</td>';
	  }
}
   
if($rws[day5] > 0)
{
 if($pr10==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr10.' ea</td>';
	  }
}

 
 
 
 
$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
     if($pr6==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty2] * $pr6 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
 
  
    }
  if($rws[day2] > 0){
     if($pr7==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty2] * $pr7 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
      if($pr8==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty2] * $pr8 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
     if($pr9==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty2] * $pr9 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
     if($pr10==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty2] * $pr10 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';
    }
	
	
	
	
	
	
	
	
   if($rws['qty3'] > 0){
   $message  =$message.' 
   <tr>
    <td>Option 3</td>
    <td>'.$rws[qty3].' Pcs</td>';
   
   
  if($rws[day1] > 0)
  {
	  if($pr11==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr11.' ea</td>';
	  }
  }
 
  
   
   
   
  if($rws[day2] > 0)
  {
	  if($pr12==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr12.' ea</td>';
	  }
}
 
   
  if($rws[day3] > 0)
  {
	  if($pr13==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr13.' ea</td>';
	  }
  }
 

   
   
  if($rws[day4] > 0)
  {
	if($pr14==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr14.' ea</td>';
	  }
  }
 

   
   
 if($rws[day5] > 0)
 {
	if($pr15==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr15.' ea</td>';
	  }
 }
   
   
   
   
 
$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
   if($pr11==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty3] * $pr11 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
  
  if($pr12==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$total = ($rws[qty3] * $pr12 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
  
  
   
 }
  if($rws[day3] > 0){
 
 if($pr13==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty3] * $pr13 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 
 if($pr14==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty3] * $pr14 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 if($pr15==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty3] * $pr15 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';  }
    
	
	
	if($rws['qty4'] > 0){
    $message  =$message.' 
	<tr>
    <td>Option 4</td> 
	
	 <td>'.$rws[qty4].' Pcs</td>
	';
   
   
   
 
   
   
  if($rws[day1] > 0)
  {
  if($pr16==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr16.' ea</td>';
	  }
  }
   
   
   
   if($rws[day2] > 0)
   {
   if($pr17==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr17.' ea</td>';
	  }
   }
   
   
   if($rws[day3] > 0)
   {
   if($pr18==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr18.' ea</td>';
	  }
   }
 

   
   
  if($rws[day4] > 0)
  {
  if($pr19==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr19.' ea</td>';
	  }
  }
 

   
   
   if($rws[day5] > 0)
   {
   if($pr20==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr20.' ea</td>';
	  }
   }
 

   
   
   
   
 
$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  
  if($pr16==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty4] * $pr16 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
 
  
    }
  if($rws[day2] > 0){
  if($pr17==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty4] * $pr17 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
  if($pr18==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty4] * $pr18 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
  if($pr19==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty4] * $pr19 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 
   if($pr20==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty4] * $pr20 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';   }
   
   
   
   
   
   
   
  if($rws['qty5'] > 0){
  $message  =$message.' 
 <tr>
  
  
    <td>Option 5</td>
    <td>'.$rws[qty5].' Pcs</td> ';
   
   
   
   
    if($rws[day1] > 0)
	{
	if($pr21==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr21.' ea</td>';
	  }
	}
   
   
   
   if($rws[day2] > 0)
   {
   if($pr22==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr22.' ea</td>';
	  }
   }
   
   
   
   
    if($rws[day3] > 0)
	{
	if($pr23==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr23.' ea</td>';
	  }
	}
   
   
   
    if($rws[day4] > 0)
	{
	if($pr24==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr24.' ea</td>';
	  }
	}
   
   
    if($rws[day5] > 0)
	{
	if($pr25==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr25.' ea</td>';
	  }
	}
   
   
   
   
    
$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  
    if($pr21==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty5] * $pr21 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
    }
  if($rws[day2] > 0){
    if($pr22==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty5] * $pr22 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
   if($pr23==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty5] * $pr23 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 
  if($pr24==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty5] * $pr24 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
   if($pr25==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty5] * $pr25 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';
   
   
   
   }
  
   if($rws['qty6'] > 0){
  $message  =$message.' 
  
  <tr>
    <td>Option 6</td>
   
   <td>'.$rws[qty6].' Pcs</td>';
   
   
   
   
    if($rws[day1] > 0)
	{
	if($pr26==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr26.' ea</td>';
	  }
	}
   
   
   
   
   
    if($rws[day2] > 0)
	{
	if($pr27==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr27.' ea</td>';
	  }
	}
   
   
   
   
   
    if($rws[day3] > 0)
	{
	if($pr28==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr28.' ea</td>';
	  }
	}
   
   
   
   
   
   
    if($rws[day4] > 0)
	{
	if($pr29==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr29.' ea</td>';
	  }
	}
   
   
   
    if($rws[day5] > 0)
	{
	if($pr30==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr30.' ea</td>';
	  }
	}
   
   
       
$message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
    if($pr26==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		     $total = ($rws[qty6] * $pr26 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
   if($pr27==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		     $total = ($rws[qty6] * $pr27 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
  if($pr28==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		     $total = ($rws[qty6] * $pr28 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 if($pr29==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		     $total = ($rws[qty6] * $pr29 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
  if($pr30==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		     $total = ($rws[qty6] * $pr30 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';  }
  
   if($rws['qty7'] > 0){
   $message  =$message.' 
  <tr>
    <td>Option 7</td>
    <td>'.$rws[qty7].' Pcs</td>';
	
	
	 if($rws[day1] > 0)
	 {
	 if($pr31==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr31.' ea</td>';
	  }
	 }
   
   
   
    if($rws[day2] > 0)
	{
	if($pr32==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr32.' ea</td>';
	  }
	}
   
   
    if($rws[day3] > 0)
	{
	if($pr33==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr33.' ea</td>';
	  }
	}
   
   
    if($rws[day4] > 0)
	{
	if($pr34==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr34.' ea</td>';
	  }
	}
   
   
   
    if($rws[day5] > 0)
	{
	if($pr35==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr35.' ea</td>';
	  }
	}
   
   
   
       $message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  if($pr31==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		      $total = ($rws[qty7] * $pr31 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
if($pr32==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		      $total = ($rws[qty7] * $pr32 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
 if($pr33==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		      $total = ($rws[qty7] * $pr33 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 if($pr34==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		      $total = ($rws[qty7] * $pr34 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 if($pr35==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		      $total = ($rws[qty7] * $pr35 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
			  $total = number_format($total,2);
			  $message  =$message.'
			 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';   }
 
 
  if($rws['qty8'] > 0){
 $message  =$message.' 
 <tr>
    <td>Option 8</td>
    <td>'.$rws[qty8].' Pcs</td>';
	
if($rws[day1] > 0)
{
if($pr36==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr36.' ea</td>';
	  }
}
   
   
 if($rws[day2] > 0)
 {
 if($pr37==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr37.' ea</td>';
	  }
 }
   
  if($rws[day3] > 0)
  {
  if($pr38==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr38.' ea</td>';
	  }
  }
   
   
  if($rws[day4] > 0)
  {
  if($pr39==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr39.' ea</td>';
	  }
  }
   
 if($rws[day5] > 0)
 {
 if($pr40==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr40.' ea</td>';
	  }
 }
   
   
           $message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  if($pr36==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty8] * $pr36 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
	if($pr37==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty8] * $pr37 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
 if($pr38==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty8] * $pr38 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 
 if($pr39==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty8] * $pr39 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 
 if($pr40==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		   $total = ($rws[qty8] * $pr40 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>';  }
 

 if($rws['qty9'] > 0){
$message  =$message.' 
 <tr>
    <td>Option 9</td>
    <td>'.$rws[qty9].' Pcs</td>';  
   
   
   if($rws[day1] > 0)
   {
   if($pr41==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr41.' ea</td>';
	  }
   }
   
   
  if($rws[day2] > 0)
  {
  if($pr42==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr42.' ea</td>';
	  }
  }
   
   if($rws[day3] > 0)
   {
   if($pr43==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr43.' ea</td>';
	  }
   }
   
   if($rws[day4] > 0) 
   {
   if($pr44==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr44.' ea</td>';
	  }
   }
   
   if($rws[day5] > 0) 
   {
   if($pr45==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr45.' ea</td>';
	  }
   }
   
                      $message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  if($pr41==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty9] * $pr41 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0){
  
if($pr42==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty9] * $pr42 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
 if($pr43==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty9] * $pr43 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
 
if($pr44==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty9] * $pr44 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 if($pr45==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		  $total = ($rws[qty9] * $pr45 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>'; }
 
  if($rws['qty10'] > 0){
  $message  =$message.' 
 <tr>
    <td>Option 10</td>
    <td>'.$rws[qty10].' Pcs</td>'; 
	
	
	
    
	if($rws[day1] > 0)
	{
	if($pr46==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr46.' ea</td>';
	  }
	}
   
   
  if($rws[day2] > 0)
  {
  if($pr47==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr47.' ea</td>';
	  }
  }
   
   
   if($rws[day3] > 0)
   {
   if($pr48==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr48.' ea</td>';
	  }
   }
   
   
 if($rws[day4] > 0)
 {
 if($pr49==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr49.' ea</td>';
	  }
 }
   
   if($rws[day5] > 0)
   {
   if($pr50==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		$message  =$message.'<td style="text-align:left">&nbsp;$'.$pr50.' ea</td>';
	  }
   }
   
   
                      $message  =$message.'
  
  </tr>
 
 
 <tr>
    <td colspan="2" style="text-align:right"><strong>Order Total&nbsp;</strong></td>

    ';
   
  
 
  if($rws[day1] > 0){
  if($pr46==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty10] * $pr46 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
  
  
    }
  if($rws[day2] > 0){
   if($pr47==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty10] * $pr47 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0){
  if($pr48==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty10] * $pr48 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0){
  if($pr49==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty10] * $pr49 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0){
 
  if($pr50==0.00)
	  {
		 $message  =$message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else
	  {
		 $total = ($rws[qty10] * $pr50 ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  =$message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  =$message.'
  
  </tr>'; }
   
   
  $message  =$message.'   
</table>'; 


 }
 }/*else
 {*/
 
 //$message  =$message. '<br>'.$rws[special_instadmin];
 // }
 
/* $message  =$message.'

 <table width="1000px" border="0">
   
   <tr   style=" text-align: center;">
    <td  width="750">
	  <p >'.$rws[special_instadmin].'</p></td></tr>
</table>

';*/
 
 
 
 
 $message  =$message.'  
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

Price and delivery are subject to change pending final review of complete data package, including but not limited to, artwork, drawings, and applicable<br> specifications. Unless otherwise stated in the RFQ, price is based on a 20% X-out allowance on jobs being built in an array form.<br><br>
Please visit www.pcbsglobal.com/PCBsGlobal_Inc_Terms_of_Sale.pdf for our Terms of Sale
  	</p>
 	
 </page>
  ';
  $po = $rws[ord_id] + 10000 ;

   $html2pdf->WriteHTML($message);

if ($_REQUEST['oper']=='view'){
	$html2pdf->Output('exemple.pdf');
}else{

if ($rws[cancharge]!='yes'){
		
		$filename="quotationpdf/Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'F');
$filename="Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'D');
		}

else{

	$filename="quotationpdf/Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev]-Cancellation_".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'F');
$filename="Quotation-$po-$rws[cust_name]-$rws[part_no]-$rws[rev]-Cancellation_".date("m-d-Y") . ".pdf";
$html2pdf->Output($filename,'D');
}


}

//$html2pdf->Output('exemple.pdf');



?>