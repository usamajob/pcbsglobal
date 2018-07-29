<?php require_once('conn.php'); ?>
<?php 
$sqs="select * from order_tb where ord_id='".$_REQUEST['inid']."'";

$ress=mysql_query($sqs);

if(!$ress)

{

die('error in data');

}

$rws=mysql_fetch_array($ress);




$ppu= 0.8;
$xdim=  $_REQUEST['txtother12']  ;
$ydim=  $_REQUEST['txtother13'] ;

 $txtqty1=  $_REQUEST['txtqty1'] ;
  $txtqty2=  $_REQUEST['txtqty2'] ;
//echo '<br>';



 $totalarea =$xdim * $ydim;
//echo '<br>';
 $totalprice =$totalarea * $ppu;
//echo '<br>';

 $price1=  $txtqty1 * $totalprice;
  $price2=  $txtqty2 * $totalprice;



$bprice=2;
$leadtm=$_REQUEST['txtday1'];
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
$leadtm=$_REQUEST['txtday2'];
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
$leadtm=$_REQUEST['txtday3'];
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

$leadtm=$_REQUEST['txtday4'];
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


$leadtm=$_REQUEST['txtday5'];
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

$qnt1=$_REQUEST['txtqty1'];
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
$qnt2=$_REQUEST['txtqty2'];
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
$qnt3=$_REQUEST['txtqty3'];
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
$qnt4=$_REQUEST['txtqty4'];
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

$qnt5=$_REQUEST['txtqty5'];
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

$qnt6=$_REQUEST['txtqty6'];
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

$qnt7=$_REQUEST['txtqty7'];
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

$qnt8=$_REQUEST['txtqty8'];
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

$qnt9=$_REQUEST['txtqty9'];
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

$qnt10=$_REQUEST['txtqty10'];
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



$baseprice = $_REQUEST['bprice'];

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
}*/

if($_REQUEST['chk1']=='Double Sided')
{
if(isset($_REQUEST['per1']) && $_REQUEST['per1'] != 0)
$baseprice=$baseprice+($baseprice*($_REQUEST['per1']/100));
}

if($_REQUEST['chk1']=='4Lyrs')
{
$baseprice = $baseprice + ($baseprice*(10/100));
}
if($_REQUEST['chk1']=='6Lyrs')
{
$baseprice = $baseprice + ($baseprice*(20/100));
}
if($_REQUEST['chk1']=='8Lyrs')
{
$baseprice = $baseprice + ($baseprice*(30/100));
}
if($_REQUEST['chk1']=='10Lyrs')
{
$baseprice = $baseprice + ($baseprice*(40/100));
}






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


//$pr1=round($pr1, 2);


$pr1=round($price1, 2);

$pr2=round($price2, 2);

//$pr2=round($price1, 2);


//$pr2=round($pr3, 2);

$pr3=round($pr3, 2);
$pr4=round($pr4, 2);
$pr5=round($pr5, 2);



$pr6=round($price2, 2);


//$pr6=round($pr6, 2);
$pr7=round($pr7, 2);
$pr8=round($pr8, 2);
$pr9=round($pr9, 2);
$pr10=round($pr10, 2);


//$pr11=round($pr11, 2);


$pr11=round($price2, 2);



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

?>

  <table width="650px" >
      	<tr>
      		<th>&nbsp;</th>
      	 <?php if($rws['day1'] > 0):?>	<th><?php echo $_REQUEST['txtday1']; ?> Days</th> <?php endif;?>
      	 <?php if($rws['day2'] > 0):?>	<th><?php echo $_REQUEST['txtday2']; ?> Days</th> <?php endif;?>
      	 <?php if($rws['day3'] > 0):?>	<th><?php echo $_REQUEST['txtday3']; ?> Days</th> <?php endif;?>
      	 <?php if($rws['day4'] > 0):?>	<th><?php echo $_REQUEST['txtday4']; ?> Days</th> <?php endif;?>
           <?php if($rws['day5'] > 0):?>        <th><?php echo $_REQUEST['txtday5']; ?> Days</th> <?php endif;?>
      	</tr>
            <?php if($rws['qty1'] > 0):?>
      	<tr>
      		<th><?php echo $rws['qty1']; ?> pieces</th>
            
            
     <?php if($rws['day1'] > 0):?> 		<td align="center" >$<?php echo $rws['pr11'];?></td> <?php endif;?>
        <?php if($rws['day2'] > 0):?> 		<td align="center">$<?php echo $rws['pr12'];?></td><?php endif;?>
        <?php if($rws['day3'] > 0):?> 		<td align="center">$<?php echo $rws['pr13'];?></td><?php endif;?>
          	 <?php if($rws['day4'] > 0):?>  		<td align="center">$<?php echo $rws['pr14'];?></td> <?php endif;?>     
        <?php if($rws['day5'] > 0):?>       <td align="center">$<?php echo $rws['pr15'];?></td> <?php endif;?>		
      	</tr>
      <?php endif;?>
      <?php if($rws['qty2'] > 0):?>
      	<tr>
      		<th><?php echo $rws['qty2']; ?> pieces</th>
      		
       <?php if($rws['day1'] > 0):?> 	  		<td align="center">$<?php echo $rws['pr21'];?></td><?php endif;?>
      	  <?php if($rws['day2'] > 0):?>	<td align="center">$<?php echo $rws['pr22'];?></td><?php endif;?>
      	  <?php if($rws['day3'] > 0):?> 	  	<td align="center">$<?php echo $rws['pr23'];?></td>  <?php endif;?>
              <?php if($rws['day4'] > 0):?>        <td align="center">$<?php echo $rws['pr24'];?></td> <?php endif;?> 
                <?php if($rws['day5'] > 0):?>    <td align="center">$<?php echo $rws['pr25'];?></td> <?php endif;?>    		
      	</tr>
            <?php endif;?>
<?php if($rws['qty3'] > 0):?>
      	<tr>
      		<th><?php echo $rws['qty3']; ?> pieces</th>      		
      	  <?php if($rws['day1'] > 0):?> 		<td align="center">$<?php echo $rws['pr31'];?></td><?php endif;?>
      	  <?php if($rws['day2'] > 0):?> 	<td align="center">$<?php echo $rws['pr32'];?></td>  <?php endif;?>  
              <?php if($rws['day3'] > 0):?> 	       <td align="center">$<?php echo $rws['pr33'];?></td><?php endif;?>
               <?php if($rws['day4'] > 0):?>      <td align="center">$<?php echo $rws['pr34'];?></td> <?php endif;?> 		
                <?php if($rws['day5'] > 0):?>     <td align="center">$<?php echo $rws['pr35'];?></td><?php endif;?>
                  
      	</tr>
            <?php endif;?>
<?php if($rws['qty4'] > 0):?>
      	<tr>
      		<th><?php echo $rws['qty4'] ?> pieces</th>      		
      		  <?php if($rws['day1'] > 0):?> 	 <td align="center">$<?php echo $rws['pr41'];?></td>   <?php endif;?>
                <?php if($rws['day2'] > 0):?>    <td align="center">$<?php echo $rws['pr42'];?></td><?php endif;?>
                <?php if($rws['day3'] > 0):?> 	     <td align="center">$<?php echo $rws['pr43'];?></td><?php endif;?>
                 <?php if($rws['day4'] > 0):?>     <td align="center">$<?php echo$rws['pr44'];?></td><?php endif;?>
                  <?php if($rws['day5'] > 0):?>   <td align="center">$<?php echo $rws['pr45'];?></td>  <?php endif;?>          

      	</tr>
            <?php endif;?>
<?php if($rws['qty5'] > 0):?>
            <tr>
                  <th><?php echo $rws['qty5'] ?> pieces</th>             
                 <?php if($rws['day1'] > 0):?> 	    <td align="center">$<?php echo $rws['pr51'];?></td> <?php endif;?>  
                  <?php if($rws['day2'] > 0):?>  <td align="center">$<?php echo $rws['pr52'];?></td><?php endif;?>
                  <?php if($rws['day3'] > 0):?> 	   <td align="center">$<?php echo $rws['pr53'];?></td><?php endif;?>
                  <?php if($rws['day4'] > 0):?>    <td align="center">$<?php echo $rws['pr54'];?></td><?php endif;?>
                   <?php if($rws['day5'] > 0):?>  <td align="center">$<?php echo $rws['pr55'];?></td>  <?php endif;?>          

            </tr>
            <?php endif;?>
            <?php if($rws['qty6'] > 0):?>
            <tr>
                  <th><?php echo $rws['qty6'] ?> pieces</th>             
                  <?php if($rws['day1'] > 0):?> 	 <td align="center">$<?php echo $rws['pr61'];?></td> <?php endif;?>  
                  <?php if($rws['day2'] > 0):?>  <td align="center">$<?php echo $rws['pr62'];?></td><?php endif;?>
                   <?php if($rws['day3'] > 0):?> 	  <td align="center">$<?php echo $rws['pr63'];?></td><?php endif;?>
                  <?php if($rws['day4'] > 0):?>     <td align="center">$<?php echo $rws['pr64'];?></td><?php endif;?>
                  <?php if($rws['day5'] > 0):?>    <td align="center">$<?php echo $rws['pr65'];?></td> <?php endif;?>           

            </tr>
            <?php endif;?>
            <?php if($rws['qty7'] > 0):?>
            <tr>
                  <th><?php echo$rws['qty7'] ?> pieces</th>             
                  <?php if($rws['day1'] > 0):?> 	   <td align="center">$<?php echo $rws['pr71'];?></td>  <?php endif;?> 
                  <?php if($rws['day2'] > 0):?>   <td align="center">$<?php echo $rws['pr72'];?></td><?php endif;?>
                  <?php if($rws['day3'] > 0):?> 	  <td align="center">$<?php echo $rws['pr73'];?></td><?php endif;?>
                   <?php if($rws['day4'] > 0):?>    <td align="center">$<?php echo $rws['pr74'];?></td><?php endif;?>
                  <?php if($rws['day5'] > 0):?>  <td align="center">$<?php echo $rws['pr75'];?></td>  <?php endif;?>          

            </tr>
            <?php endif;?>
            <?php if($rws['qty8'] > 0):?>
            <tr>
                  <th><?php echo $rws['qty8'] ?> pieces</th>             
                   <?php if($rws['day1'] > 0):?> 	  <td align="center">$<?php echo $rws['pr81'];?></td>  <?php endif;?> 
                   <?php if($rws['day2'] > 0):?> <td align="center">$<?php echo $rws['pr82'];?></td><?php endif;?>
                   <?php if($rws['day3'] > 0):?> 	   <td align="center">$<?php echo $rws['pr83'];?></td><?php endif;?>
                 <?php if($rws['day4'] > 0):?>    <td align="center">$<?php echo $rws['pr84'];?></td><?php endif;?>
                  <?php if($rws['day5'] > 0):?> <td align="center">$<?php echo $rws['pr85'];?></td> <?php endif;?>           

            </tr>
            <?php endif;?>
            <?php if($rws['qty9'] > 0):?>
            <tr>
                  <th><?php echo $rws['qty9'] ?> pieces</th>             
                   <?php if($rws['day1'] > 0):?> 	 <td align="center">$<?php echo $rws['pr91'];?></td> <?php endif;?>  
                  <?php if($rws['day2'] > 0):?>   <td align="center">$<?php echo $rws['pr92'];?></td><?php endif;?>
                  <?php if($rws['day3'] > 0):?> 	   <td align="center">$<?php echo $rws['pr93'];?></td><?php endif;?>
                 <?php if($rws['day4'] > 0):?>     <td align="center">$<?php echo $rws['pr94'];?></td><?php endif;?>
                  <?php if($rws['day5'] > 0):?> <td align="center">$<?php echo $rws['pr95'];?></td>  <?php endif;?>          

            </tr>
            <?php endif;?>
            <?php if($rws['qty10'] > 0):?>
            <tr>
                  <th><?php echo $rws['qty10'] ?> pieces</th>             
                  <?php if($rws['day1'] > 0):?> 	 <td align="center">$<?php echo $rws['pr101'];?></td> <?php endif;?>  
                   <?php if($rws['day2'] > 0):?>   <td align="center">$<?php echo $rws['pr102'];?></td><?php endif;?>
                  <?php if($rws['day3'] > 0):?> 	  <td align="center">$<?php echo $rws['pr103'];?></td><?php endif;?>
                  <?php if($rws['day4'] > 0):?>    <td align="center">$<?php echo $rws['pr104'];?></td><?php endif;?>
                   <?php if($rws['day5'] > 0):?> <td align="center">$<?php echo $rws['pr105'];?></td> <?php endif;?>           

            </tr>
            <?php endif;?>
      </table>
      <!--
Price per board for <?php echo $_REQUEST['qty1'];?> pieces on a <?php echo $_REQUEST['day1'];?> day lead time is $<?php echo $pr1;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty1'];?> pieces on a <?php echo $_REQUEST['day2'];?> day lead time is $<?php echo $pr2;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty1'];?> pieces on a <?php echo $_REQUEST['day3'];?> day lead time is $<?php echo $pr3;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty1'];?> pieces on a <?php echo $_REQUEST['day4'];?> day lead time is $<?php echo $pr4;?><br><br><br>

Price per board for <?php echo $_REQUEST['qty2'];?> pieces on a <?php echo $_REQUEST['day1'];?> day lead time is $<?php echo $pr1;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty2'];?> pieces on a <?php echo $_REQUEST['day2'];?> day lead time is $<?php echo $pr2;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty2'];?> pieces on a <?php echo $_REQUEST['day3'];?> day lead time is $<?php echo $pr3;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty2'];?> pieces on a <?php echo $_REQUEST['day4'];?> day lead time is $<?php echo $pr4;?><br><br><br>


Price per board for <?php echo $_REQUEST['qty3'];?> pieces on a <?php echo $_REQUEST['day1'];?> day lead time is $<?php echo $pr1;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty3'];?> pieces on a <?php echo $_REQUEST['day2'];?> day lead time is $<?php echo $pr2;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty3'];?> pieces on a <?php echo $_REQUEST['day3'];?> day lead time is $<?php echo $pr3;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty3'];?> pieces on a <?php echo $_REQUEST['day4'];?> day lead time is $<?php echo $pr4;?><br><br><br>

Price per board for <?php echo $_REQUEST['qty4'];?> pieces on a <?php echo $_REQUEST['day1'];?> day lead time is $<?php echo $pr1;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty4'];?> pieces on a <?php echo $_REQUEST['day2'];?> day lead time is $<?php echo $pr2;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty4'];?> pieces on a <?php echo $_REQUEST['day3'];?> day lead time is $<?php echo $pr3;?><br>
<br>
Price per board for <?php echo $_REQUEST['qty4'];?> pieces on a <?php echo $_REQUEST['day4'];?> day lead time is $<?php echo $pr4;?><br><br><br>

-->