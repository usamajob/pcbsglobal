<?php require_once('conn.php'); ?>
<?php 
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

?>

  <table width="650px" >
      	<tr>
      		<th>&nbsp;</th>
      		<th><?php echo $_REQUEST['txtday1']; ?> Days</th>
      		<th><?php echo $_REQUEST['txtday2']; ?> Days</th>
      		<th><?php echo $_REQUEST['txtday3']; ?> Days</th>
      		<th><?php echo $_REQUEST['txtday4']; ?> Days</th>
                  <th><?php echo $_REQUEST['txtday5']; ?> Days</th>
      	</tr>
            <?php if($_REQUEST['txtqty1'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty1']; ?> pieces</th>
      		<td align="center" >$<?php echo $pr1;?></td>
      		<td align="center">$<?php echo $pr2;?></td>
      		<td align="center">$<?php echo $pr3;?></td>
      		<td align="center">$<?php echo $pr4;?></td>      
                  <td align="center">$<?php echo $pr5;?></td> 		
      	</tr>
      <?php endif;?>
      <?php if($_REQUEST['txtqty2'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty2']; ?> pieces</th>
      		
      		<td align="center">$<?php echo $pr6;?></td>
      		<td align="center">$<?php echo $pr7;?></td>
      		<td align="center">$<?php echo $pr8;?></td>  
                  <td align="center">$<?php echo $pr9;?></td>  
                  <td align="center">$<?php echo $pr10;?></td>     		
      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty3'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty3']; ?> pieces</th>      		
      		<td align="center">$<?php echo $pr11;?></td>
      		<td align="center">$<?php echo $pr12;?></td>    
                  <td align="center">$<?php echo $pr13;?></td>
                  <td align="center">$<?php echo $pr14;?></td>  		
                  <td align="center">$<?php echo $pr15;?></td>
                  
      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty4'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty4'] ?> pieces</th>      		
      		<td align="center">$<?php echo $pr16;?></td>   
                  <td align="center">$<?php echo $pr17;?></td>
                  <td align="center">$<?php echo $pr18;?></td>
                  <td align="center">$<?php echo $pr19;?></td>
                  <td align="center">$<?php echo $pr20;?></td>            

      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty5'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty5'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr21;?></td>   
                  <td align="center">$<?php echo $pr22;?></td>
                  <td align="center">$<?php echo $pr23;?></td>
                  <td align="center">$<?php echo $pr24;?></td>
                  <td align="center">$<?php echo $pr25;?></td>            

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty6'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty6'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr26;?></td>   
                  <td align="center">$<?php echo $pr27;?></td>
                  <td align="center">$<?php echo $pr28;?></td>
                  <td align="center">$<?php echo $pr29;?></td>
                  <td align="center">$<?php echo $pr30;?></td>            

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty7'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty7'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr31;?></td>   
                  <td align="center">$<?php echo $pr32;?></td>
                  <td align="center">$<?php echo $pr33;?></td>
                  <td align="center">$<?php echo $pr34;?></td>
                  <td align="center">$<?php echo $pr35;?></td>            

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty8'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty8'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr36;?></td>   
                  <td align="center">$<?php echo $pr37;?></td>
                  <td align="center">$<?php echo $pr38;?></td>
                  <td align="center">$<?php echo $pr39;?></td>
                  <td align="center">$<?php echo $pr40;?></td>            

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty9'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty9'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr41;?></td>   
                  <td align="center">$<?php echo $pr42;?></td>
                  <td align="center">$<?php echo $pr43;?></td>
                  <td align="center">$<?php echo $pr44;?></td>
                  <td align="center">$<?php echo $pr45;?></td>            

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty10'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty10'] ?> pieces</th>             
                  <td align="center">$<?php echo $pr46;?></td>   
                  <td align="center">$<?php echo $pr47;?></td>
                  <td align="center">$<?php echo $pr48;?></td>
                  <td align="center">$<?php echo $pr49;?></td>
                  <td align="center">$<?php echo $pr50;?></td>            

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