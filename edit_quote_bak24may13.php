<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_REQUEST['Submit'])) {
 
if($_REQUEST['chki1']!="") {

	$ipc_class=$_REQUEST['chki1'];
}

if($_REQUEST['chki2']!="") {

$ipc_class=$_REQUEST['chki2'];

}

if($_REQUEST['chki3']!="") {

$ipc_class=$_REQUEST['chki3'];

}

if($_REQUEST['chk1']!="") {

$no_layer=$_REQUEST['chk1'];

}

if($_REQUEST['chk2']!="") {

$no_layer=$_REQUEST['chk2'];

}

if($_REQUEST['chk3']!="") {

$no_layer=$_REQUEST['chk3'];

}

if($_REQUEST['chk4']!="") {

$no_layer=$_REQUEST['chk4'];

}

if($_REQUEST['chk5']!="") {

$no_layer=$_REQUEST['chk5'];

}

if($_REQUEST['chk6']!="") {

$no_layer=$_REQUEST['chk6'];

}

if($_REQUEST['txtother1']!="") {

$no_layer=$_REQUEST['txtother1'];

}

if($_POST['chk1']=="Other") {

 $no_layer=$_POST['txtother1'];

}
else {

$no_layer=$_POST['chk1'];
}

/*echo $no_layer;
exit();*/


if($_REQUEST['chk7']!="") {

$m_require=$_REQUEST['chk7'];

}

if($_REQUEST['chk8']!="") {

$m_require=$_REQUEST['chk8'];

}

if($_REQUEST['chk9']!="") {

$m_require=$_REQUEST['chk9'];

}

if($_REQUEST['txtother2']!="") {

$m_require=$_REQUEST['txtother2'];

}

if($_POST['chk7']=="Other") {

 $m_require=$_POST['txtother2'];

}
else
 {

$m_require=$_POST['chk7'];
}



if($_REQUEST['chk18']!="") {

$inner_copper=$_REQUEST['chk18'];

}

if($_REQUEST['chk19']!="") {

$inner_copper=$_REQUEST['chk19'];

}

if($_REQUEST['chk20']!="") {

$inner_copper=$_REQUEST['chk20'];

}

if($_REQUEST['chk21']!="") {

$inner_copper=$_REQUEST['chk21'];

}

if($_REQUEST['txtother6']!="") {

$inner_copper=$_REQUEST['txtother6'];

}

if($_POST['chk18']=="Other") {

 $inner_copper=$_POST['txtother6'];

}
else
 {

$inner_copper=$_POST['chk18'];
}



if($_POST['chk192']!="") {
//echo 'chk192';
$thick_ness=$_POST['chk192'];

}


else if($_POST['chk14']!="") {
//echo 'chk14';
$thick_ness=$_POST['chk14'];

}

else if($_POST['chk15']!="")
 {
//echo 'chk15';
$thick_ness=$_POST['chk15'];

}



else  if($_POST['chk108']!="") {
	//echo 'else';

 $thick_ness=$_POST['txtother44'];

}
/* $thick_ness=$_POST['chk12'];
*/
 if($_POST['chk13']=="Other") {

 $thick_ness=$_POST['txtother44'];

}
else
 {

$thick_ness=$_POST['chk13'];
}




if($_REQUEST['chk17']!="") {

$thick_tole=$_REQUEST['chk17'];

}

if($_REQUEST['txtother5']!="") {

$thick_tole=$_REQUEST['txtother5'];

}


 if($_POST['chk17']=="Other") {

 $thick_tole=$_POST['txtother5'];

}
else
 {

$thick_tole=$_POST['chk17'];
}




if($_REQUEST['chk10']!="") {

$start_cu=$_REQUEST['chk10'];

}

if($_REQUEST['chk11']!="") {

$start_cu=$_REQUEST['chk11'];

}

if($_REQUEST['chk12']!="") {

$start_cu=$_REQUEST['chk12'];

}

if($_REQUEST['txtother3']!="") {

$start_cu=$_REQUEST['txtother3'];

}


 if($_POST['chk10']=="Other") {

 $start_cu=$_POST['txtother3'];

}
else
 {

$start_cu=$_POST['chk10'];
}

if($_REQUEST['chk22']!="") {

$plated_cu=$_REQUEST['chk22'];

}

if($_REQUEST['chk23']!="") {

$plated_cu=$_REQUEST['chk23'];

}

if($_REQUEST['chk24']!="") {

$plated_cu=$_REQUEST['chk24'];

}

if($_REQUEST['txtother7']!="") {

$plated_cu=$_REQUEST['txtother7'];

}

 if($_POST['chk22']=="Other") {

 $plated_cu=$_POST['txtother7'];

}
else
 {

$plated_cu=$_POST['chk22'];
}

if($_REQUEST['chk25']!="") {

$fingers_gold=$_REQUEST['chk25'];

}

if($_REQUEST['chk26']!="") {

$fingers_gold=$_REQUEST['chk26'];

}

if($_REQUEST['chk27']!="") {

$trace_min=$_REQUEST['chk27'];

}

if($_REQUEST['chk28']!="") {

$trace_min=$_REQUEST['chk28'];

}

if($_REQUEST['chk29']!="") {

$trace_min=$_REQUEST['chk29'];

}

if($_REQUEST['chk30']!="") {

$trace_min=$_REQUEST['chk30'];

}

if($_REQUEST['chk31']!="") {

$space_min=$_REQUEST['chk31'];

}

if($_REQUEST['chk32']!="") {

$space_min=$_REQUEST['chk32'];

}

if($_REQUEST['chk33']!="") {

$space_min=$_REQUEST['chk33'];

}

if($_REQUEST['chk34']!="") {

$space_min=$_REQUEST['chk34'];

}

if($_REQUEST['chk35']!="") {

$con_impe1=$_REQUEST['chk35'];

}

if($_REQUEST['chk36']!="") {

$con_impe1=$_REQUEST['chk36'];

}

if($_REQUEST['chk109']!="") {

$con_impe_sing=$_REQUEST['chk109'];

}

if($_REQUEST['chk110']!="") {

$con_impe_diff=$_REQUEST['chk110'];

}

if($_REQUEST['chk202']!="") {

$tore_impe=$_REQUEST['chk202'];

}

if($_REQUEST['txtother51']!="") {

$tore_impe=$_REQUEST['txtother51'];

}
 if($_POST['chk202']=="Other") {

 $tore_impe=$_POST['txtother51'];

}
else
 {

$tore_impe=$_POST['chk202'];
}




if($_REQUEST['txtother8']!="") {

$hole_size=$_REQUEST['txtother8'];

}

if($_REQUEST['txtother14']!="") {

$pad=$_REQUEST['txtother14'];

}
if($_REQUEST['txtother191']!="") {

$pad1=$_REQUEST['txtother191'];

}
/*echo $pad;
exit();*/

if($_REQUEST['chk37']!="") {

$blind=$_REQUEST['chk37'];

}

if($_REQUEST['chk38']!="") {

$blind=$_REQUEST['chk38'];

}

if($_REQUEST['chk39']!="") {

$buried=$_REQUEST['chk39'];

}

if($_REQUEST['chk40']!="") {

$buried=$_REQUEST['chk40'];

}

if($_REQUEST['chk41']!="") {

$bb_both=$_REQUEST['chk41'];

}

if($_REQUEST['chk42']!="") {

$bb_both=$_REQUEST['chk42'];

}

if($_REQUEST['chk200']!="") {

$hdi_design=$_REQUEST['chk200'];

}

if($_REQUEST['chk201']!="") {

$hdi_design=$_REQUEST['chk201'];

}

if($_REQUEST['chk43']!="") {

$finish=$_REQUEST['chk43'];

}

if($_REQUEST['chk44']!="") {



$finish=$_REQUEST['chk44'];

}

if($_REQUEST['chk45']!="") {

$finish=$_REQUEST['chk45'];

}

if($_REQUEST['chk46']!="") {

$finish=$_REQUEST['chk46'];

}

if($_REQUEST['chk47']!="") {

$finish=$_REQUEST['chk47'];

}

if($_REQUEST['txtother9']!="") {

$finish=$_REQUEST['txtother9'];

}
 if($_POST['chk43']=="Other") {

 $finish=$_POST['txtother9'];

}
else
 {

$finish=$_POST['chk43'];
}


if($_REQUEST['chk48']!="") {

$mask_size=$_REQUEST['chk48'];

}

if($_REQUEST['chk49']!="") {

$mask_size=$_REQUEST['chk49'];

}

if($_REQUEST['chk50']!="") {

$mask_size=$_REQUEST['chk50'];

}

if($_REQUEST['chk51']!="") {

$color=$_REQUEST['chk51'];

}

if($_REQUEST['chk52']!="") {

$color=$_REQUEST['chk52'];

}

if($_REQUEST['txtother10']!="") {

$color=$_REQUEST['txtother10'];

}
 if($_POST['chk51']=="Other") {

 $color=$_POST['txtother10'];

}
else
 {

$color=$_POST['chk51'];
}

if($_REQUEST['chk53']!="") {

$mask_type=$_REQUEST['chk53'];

}

if($_REQUEST['chk54']!="") {

$mask_type=$_REQUEST['chk54'];

}

if($_REQUEST['chk55']!="") {

$ss_side=$_REQUEST['chk55'];

}

if($_REQUEST['chk56']!="") {

$ss_side=$_REQUEST['chk56'];

}

if($_REQUEST['chk57']!="") {

$ss_side=$_REQUEST['chk57'];

}

if($_REQUEST['chk58']!="") {

$ss_color=$_REQUEST['chk58'];

}

if($_REQUEST['chk59']!="") {

$ss_color=$_REQUEST['chk59'];

}

if($_REQUEST['chk60']!="") {

$ss_color=$_REQUEST['chk60'];

}

if($_REQUEST['txtother11']!="") {

$ss_color=$_REQUEST['txtother11'];

}

if($_POST['chk58']=="Other") {

 $ss_color=$_POST['txtother11'];

}
else
 {

$ss_color=$_POST['chk58'];
}

if($_REQUEST['chk61']!="") {

$route=$_REQUEST['chk61'];

}

if($_REQUEST['chk62']!="") {

$route=$_REQUEST['chk62'];

}

if($_REQUEST['txtother12']!="") {

$b_size1=$_REQUEST['txtother12'];

}

if($_REQUEST['txtother13']!="") {

$b_size2=$_REQUEST['txtother13'];

}

if($_REQUEST['chk63']!="") {

$array=$_REQUEST['chk63'];

}

if($_REQUEST['chk64']!="") {

$array=$_REQUEST['chk64'];

}

if($_REQUEST['txtother26']!="") {

$b_per_array=$_REQUEST['txtother26'];

}

if($_REQUEST['txtother15']!="") {

$array_size1=$_REQUEST['txtother15'];

}

if($_REQUEST['txtother16']!="") {

$array_size2=$_REQUEST['txtother16'];

}

if($_REQUEST['chk204']!="") {

$route_tole=$_REQUEST['chk204'];

}

if($_REQUEST['txtother52']!="") {

$route_tole=$_REQUEST['txtother52'];

}
if($_POST['chk204']=="Other") {

 $route_tole=$_POST['txtother52'];

}
else
 {

$route_tole=$_POST['chk204'];
}

if($_REQUEST['chk65']!="") {

$array_design=$_REQUEST['chk65'];

}

if($_REQUEST['chk66']!="") {

$array_design=$_REQUEST['chk66'];

}

if($_REQUEST['chk67']!="") {

$design_array=$_REQUEST['chk67'];

}

if($_REQUEST['chk68']!="") {

$design_array=$_REQUEST['chk68'];

}

if($_REQUEST['chk69']!="") {

$array_type1=$_REQUEST['chk69'];

}

if($_REQUEST['chk70']!="") {

$array_type2=$_REQUEST['chk70'];

}

if($_REQUEST['chk71']!="") {

$array_type3=$_REQUEST['chk71'];

}

if($_REQUEST['chk72']!="") {

$array_require1=$_REQUEST['chk72'];

}

if($_REQUEST['chk73']!="") {

$array_require2=$_REQUEST['chk73'];

}

if($_REQUEST['chk74']!="") {

$array_require3=$_REQUEST['chk74'];

}

if($_REQUEST['chk75']!="") {

$bevel=$_REQUEST['chk75'];

}

if($_REQUEST['chk76']!="") {

$bevel=$_REQUEST['chk76'];

}

if($_REQUEST['chk77']!="") {

$counter_sink=$_REQUEST['chk77'];

}

if($_REQUEST['chk78']!="") {

$counter_sink=$_REQUEST['chk78'];

}

if($_REQUEST['chk79']!="") {

$cut_outs=$_REQUEST['chk79'];

}

if($_REQUEST['chk80']!="") {

$cut_outs=$_REQUEST['chk80'];

}

if($_REQUEST['chk81']!="") {

$slots=$_REQUEST['chk81'];

}

if($_REQUEST['chk82']!="") {

$slots=$_REQUEST['chk82'];

}

if($_REQUEST['chk83']!="") {

$logo=$_REQUEST['chk83'];

}

if($_REQUEST['chk84']!="") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk85']!="") {

$mark=$_REQUEST['chk85'];

}

if($_REQUEST['chk86']!="") {

$mark=$_REQUEST['chk86'];

}

if($_REQUEST['chk87']!="") {

$date_code=$_REQUEST['chk87'];

}

if($_REQUEST['chk88']!="") {

$date_code=$_REQUEST['chk88'];

}

if($_REQUEST['chk89']!="") {

$date_code=$_REQUEST['chk89'];

}

if($_REQUEST['txtother17']!="") {

$other_marking=$_REQUEST['txtother17'];

}

if($_REQUEST['chk90']!="") {

$micro_s=$_REQUEST['chk90'];

}

if($_REQUEST['chk91']!="") {

$micro_s=$_REQUEST['chk91'];

}

if($_REQUEST['chk92']!="") {

$test_stamp=$_REQUEST['chk92'];

}

if($_REQUEST['chk93']!="") {

$test_stamp=$_REQUEST['chk93'];

}

if($_REQUEST['chk94']!="") {

$in_board=$_REQUEST['chk94'];

}

if($_REQUEST['chk199']!="") {

$array_rail=$_REQUEST['chk199'];

}

if($_REQUEST['chk95']!="") {

$xouts=$_REQUEST['chk95'];

}

if($_REQUEST['chk96']!="") {

$xouts=$_REQUEST['chk96'];

}

if($_REQUEST['textfield28']!="") {

$xouts1=$_REQUEST['textfield28'];

}

if($_REQUEST['chk97']!="") {

$rosh=$_REQUEST['chk97'];

}

if($_REQUEST['chk98']!="") {

$rosh=$_REQUEST['chk98'];

}

////

$bprice=2;

//

$leadtm=$_REQUEST['txtday1'];

if($leadtm==7) {

$d1=$bprice;

}

if($leadtm==1) {

$d1=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d1=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d1=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d1=$bprice+($bprice*(100/100));

}

//=== 2

$leadtm=$_REQUEST['txtday2'];

if($leadtm==7) {

$d2=$bprice;

}

if($leadtm==1) {

$d2=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d2=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d2=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d2=$bprice+($bprice*(100/100));

}



//====3 =====

$leadtm=$_REQUEST['txtday3'];

if($leadtm==7) {

$d3=$bprice;

}

if($leadtm==1) {

$d3=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d3=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d3=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d3=$bprice+($bprice*(100/100));

}

// 4



$leadtm=$_REQUEST['txtday4'];

if($leadtm==7) {

$d4=$bprice;

}

if($leadtm==1) {

$d4=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d4=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d4=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d4=$bprice+($bprice*(100/100));

}



// 5



$leadtm=$_REQUEST['txtday5'];

if($leadtm==7) {

$d5=$bprice;

}

if($leadtm==1) {

$d5=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d5=$bprice+($bprice*(200/100));

}if($leadtm==3) {

$d5=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d5=$bprice+($bprice*(100/100));

}

// end of day



$qnt1=$_REQUEST['txtqty1'];

if($qnt1>=250) {

$q1=$bprice;

}

if($qnt1<=100) {

$q1=$bprice+($bprice*(150/100));

}

if($qnt1<=50) {

$q1=$bprice+($bprice*(200/100));

}

if($qnt1<=10) {

$q1=$bprice+($bprice*(250/100));

}

// 2

$qnt2=$_REQUEST['txtqty2'];

if($qnt2>=250) {

$q2=$bprice;

}

if($qnt2<=100) {

$q2=$bprice+($bprice*(150/100));

}

if($qnt2<=50) {

$q2=$bprice+($bprice*(200/100));

}

if($qnt2<=10) {

$q2=$bprice+($bprice*(250/100));

}

//3

$qnt3=$_REQUEST['txtqty3'];

if($qnt3>=250) {

$q3=$bprice;

}

if($qnt3<=100) {

$q3=$bprice+($bprice*(150/100));

}

if($qnt3<=50) {

$q3=$bprice+($bprice*(200/100));

}

if($qnt2<=10) {

$q3=$bprice+($bprice*(250/100));

}

// 4

$qnt4=$_REQUEST['txtqty4'];

if($qnt4>=250) {

$q4=$bprice;

}

if($qnt4<=100) {

$q4=$bprice+($bprice*(150/100));

}

if($qnt4<=50) {

$q4=$bprice+($bprice*(200/100));

}

if($qnt4<=10) {

$q4=$bprice+($bprice*(250/100));

}



// 5

$qnt5=$_REQUEST['txtqty5'];

if($qnt5>=250) {

$q5=$bprice;

}

if($qnt5<=100) {

$q5=$bprice+($bprice*(150/100));

}

if($qnt5<=50) {

$q5=$bprice+($bprice*(200/100));

}

if($qnt5<=10) {

$q5=$bprice+($bprice*(250/100));

}

// 6

$qnt6=$_REQUEST['txtqty6'];

if($qnt6>=250) {

$q6=$bprice;

}

if($qnt6<=100) {

$q6=$bprice+($bprice*(150/100));

}

if($qnt6<=50) {

$q6=$bprice+($bprice*(200/100));

}

if($qnt6<=10) {

$q6=$bprice+($bprice*(250/100));

}

// 7

$qnt7=$_REQUEST['txtqty7'];

if($qnt7>=250) {

$q7=$bprice;

}

if($qnt7<=100) {

$q7=$bprice+($bprice*(150/100));

}

if($qnt7<=50) {

$q7=$bprice+($bprice*(200/100));

}

if($qnt7<=10) {

$q7=$bprice+($bprice*(250/100));

}

// 8

$qnt8=$_REQUEST['txtqty8'];

if($qnt8>=250) {

$q8=$bprice;

}

if($qnt8<=100) {

$q8=$bprice+($bprice*(150/100));

}

if($qnt8<=50) {

$q8=$bprice+($bprice*(200/100));

}

if($qnt8<=10) {

$q8=$bprice+($bprice*(250/100));

}

// 9

$qnt9=$_REQUEST['txtqty9'];

if($qnt9>=250) {

$q9=$bprice;

}

if($qnt9<=100) {

$q9=$bprice+($bprice*(150/100));

}

if($qnt9<=50) {

$q9=$bprice+($bprice*(200/100));

}

if($qnt9<=10) {

$q9=$bprice+($bprice*(250/100));

}

// 10

$qnt10=$_REQUEST['txtqty10'];

if($qnt10>=250) {

$q10=$bprice;

}

if($qnt10<=100) {

$q10=$bprice+($bprice*(150/100));

}

if($qnt10<=50) {

$q10=$bprice+($bprice*(200/100));

}

if($qnt10<=10) {

$q10=$bprice+($bprice*(250/100));

}



//end of quantity

if($_REQUEST['chki1']!="") {

$p17=$brice;

}

if($_REQUEST['chki2']!="") {

$p17=$bprice+($bprice*(100/100));

}

if($_REQUEST['chki3']!="") {

$p17=$bprice+($bprice*(200/100));

}

if($_REQUEST['chk18']!="") {

$p31=0;

}

if($_REQUEST['chk19']!="") {

$p31=$bprice+($bprice*(100/100));

}

if($_REQUEST['chk20']!="") {

$p31=$bprice+($bprice*(150/100));

}

if($_REQUEST['chk21']!="") {

$p31=$bprice+($bprice*(200/100));

}

if($_REQUEST['txtother6']!="") {

$p31=$bprice+($bprice*(250/100));

}

if($xouts=='yes') {

$p32=$bprice+($bprice*(20/100));

}

if($xouts=='No') {

$p32=$bprice+($bprice*(10/100));

}

if($bevel=='yes') {

$p33=$bprice+($bprice*(2/100))+1;

}

if($bevel=='No') {

$p33=$bprice-1;

}

if($counter_sink=='yes') {

$p34=$bprice+($bprice*(2/100))+1;

}

if($bevel=='No') {

$p34=$bprice-1;

}

if($cut_outs=='Yes') {

$p35=$bprice+($bprice*(2/100))+1;

}

if($cut_outs=='No') {

$p35=$bprice-1;

}

if($slots=='Yes') {

$p36=$bprice+($bprice*(2/100))+1;

}

if($slots=='No') {

$p36=$bprice-1;

}

if($finish!='HASL') {

$p37=$bprice+($bprice*(5/100));

}

if($finish=='HASL') {

$p37=$bprice;

}

if($con_impe_sing=='Single') {

$p38=$bprice+($bprice*(20/100));

}

if($con_impe_diff=='Differential') {

$p38=$bprice+($bprice*(20/100));

}

if($_REQUEST['chk109']!='' and $_REQUEST['chk110']!='') {

$p38=$bprice+($bprice*(30/100));

}

if($trace_min=='.006') {

$p39=$bprice+($bprice*(10/100));

}

if($trace_min=='.005') {

$p39=$bprice+($bprice*(20/100));

}

if($trace_min=='.004') {

$p39=$bprice+($bprice*(50/100));

}

if($trace_min=='.003') {

$p39=$bprice+($bprice*(100/100));

}

if($space_min=='.006') {

$p40=$bprice+($bprice*(10/100));

}

if($space_min=='.005') {

$p40=$bprice+($bprice*(20/100));

}

if($space_min=='.004') {

$p40=$bprice+($bprice*(50/100));

}

if($space_min=='.003') {

$p40=$bprice+($bprice*(100/100));

}

if($start_cu=='1/1') {

$p41=$bprice+($bprice*(50/100));

}

if($start_cu=='2/2') {

$p41=$bprice+($bprice*(100/100))+3;

}

if($start_cu!='2/2' and $start_cu!='1/1' and $start_cu!='.5/.5') {

$p41=$bprice+($bprice*(150/100))+3;

}

if($_REQUEST['txtother12']!="") {

$p42=$bprice+($bprice*(100/100));

}

if($thick_tole!="") {

if($thick_tole!="+-0.004") {

$p43=$bprice+($bprice*(150/100));

}

if($thick_tole=="+-0.004") {

$p43=0;

}

}

/*

$leadtm=$_REQUEST['txtlead'];

if($leadtm==7) {

$p1=$bprice;

}

if($leadtm==1) {

$p1=$bprice+($bprice*(200/100));

}

if($leadtm==2) {

$p1=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$p1=$bprice+($bprice*(100/100));

}

if($leadtm==4) {

$p1=$bprice+($bprice*(50/100));

}

$p1=$_REQUEST['price1'];

$qnt=$_REQUEST['txtqnt'];

if($qnt>=250) {

$p2=$bprice;

}

if($qnt==100) {

$p2=$bprice+($bprice*(5/100));

}

if($qnt==50) {

$p2=$bprice+($bprice*(20/100));

}

if($qnt==10) {

$p2=$bprice+($bprice*(50/100));

}

$p2=$_REQUEST['txtprice2'];

$p15=$_REQUEST['txtprice3'];

$p16=$_REQUEST['txtprice4'];

*/

if($_REQUEST['per1']!="") {

if($no_layer=='single') {

$p3=$bprice;

}

if($no_layer=='Double Sided') {

$p3=$bprice+($bprice*($_REQUEST['per1']/100));



}

if($no_layer=='4Lyrs') {

$p3=$bprice+($bprice*($_REQUEST['per1']/100))+4;

$p3 = $p3 + ($p3*(10/100));

}

if($no_layer=='6Lyrs') {

$p3=$bprice+($bprice*($_REQUEST['per1']/100))+6;

$p3 = $p3 + ($p3*(20/100));

}

if($no_layer=='8Lyrs') {

$p3=$bprice+($bprice*($_REQUEST['per1']/100))+8;

$p3 = $p3 + ($p3*(30/100));

}

if($no_layer=='10Lyrs') {

$p3=$bprice+($bprice*($_REQUEST['per1']/100))+10;

$p3 = $p3 + ($p3*(40/100));

}



//$p3=$bprice+($bprice*($_REQUEST['per1']/100));

}

if($_REQUEST['per1']=="") {

if($no_layer=='single') {

$p3=$bprice;

}

if($no_layer=='Double Sided') {

$p3=$bprice+($bprice*(50/100))+2;

}

if($no_layer=='4Lyrs') {

$p3=$bprice+($bprice*(100/100))+4;

}

if($no_layer=='6Lyrs') {

$p3=$bprice+($bprice*(150/100))+6;

}

if($no_layer=='8Lyrs') {

$p3=$bprice+($bprice*(200/100))+8;

}

if($no_layer=='10Lyrs') {

$p3=$bprice+($bprice*(250/100))+10;

}



//$p3=$bprice+($bprice*($_REQUEST['per1']/100));

}

if($_REQUEST['txtother1']!="") {

$p3=$bprice+($bprice*(275/100))+$_REQUEST['txtother1'];

}



if($m_require=='FR-4') {

$p4=$bprice;

}

if($m_require=='FR-4/170TG Min.') {

$p4=$bprice+($bprice*(10/100));

}

if($m_require=='Rogers 4003') {

$p4=$bprice+($bprice*(50/100));

}

if($_REQUEST['per2']!="") {

$p4=$bprice+($bprice*($_REQUEST['per2']/100));

}

if($_REQUEST['per3']!="") {

$p18=$bprice+($bprice*($_REQUEST['per3']/100));

}

if($_REQUEST['per4']!="") {

$p19=$bprice+($bprice*($_REQUEST['per4']/100));

}

if($_REQUEST['per5']!="") {

$p20=$bprice+($bprice*($_REQUEST['per4']/100));

}

if($_REQUEST['per6']!="") {

$p21=$bprice+($bprice*($_REQUEST['per6']/100));

}

if($_REQUEST['per7']!="") {

$p22=$bprice+($bprice*($_REQUEST['per7']/100));

}

if($_REQUEST['per8']!="") {

$p23=$bprice+($bprice*($_REQUEST['per8']/100));

}

if($_REQUEST['txtother12']!="" and $_REQUEST['txtother13']!="") {

$bp=$bprice+($_REQUEST['txtother12']*$_REQUEST['txtother13']);

$p24=$bp+($bprice*($_REQUEST['per9']/100));

}

if($_REQUEST['per9']!="") {

$p25=$bprice+($bprice*($_REQUEST['per9']/100));

}

if($_REQUEST['per10']!="") {

$p26=$bprice+($bprice*($_REQUEST['per10']/100));

}

if($_REQUEST['per11']!="") {

$p27=$bprice+($bprice*($_REQUEST['per11']/100));

}

if($_REQUEST['per12']!="") {

$p28=$bprice+($bprice*($_REQUEST['per12']/100));

}

if($_REQUEST['per13']!="") {

$p29=$bprice+($bprice*($_REQUEST['per13']/100));

}

if($_REQUEST['per14']!="") {

$p30=$bprice+($bprice*($_REQUEST['per14']/100));

}

/*

if($con_impe=='Single') {

$p5=$bprice+($bprice*(10/100));

}

if($con_impe=='Differential') {

$p5=$bprice+($bprice*(150/100));

}

if($blind=='yes') {

$p6=$bprice+($bprice*(15/100));

}

if($buried=='yes') {

$p7=$bprice+($bprice*(15/100));

}

if($bb_both=='yes') {

$p8=$bprice+($bprice*(25/100));

}

if($finish!='HASL') {

$p9=$bprice+($bprice*(5/100));

}

if($finish=='HASL') {

$p10=$bprice;

}

if($bevel=='yes') {

$p11=$bprice+($bprice*(2/100));

}

if($countersink=='yes') {

$p12=$bprice+($bprice*(2/100));

}

if($cut_outs=='yes') {

$p13=$bprice+($bprice*(2/100));

}

if($slots=='yes') {

$p14=$bprice+($bprice*(2/100));

}

if($xouts=='yes') {

$p14=$bprice+($bprice*(20/100));

}

*/

//$price=$p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8+$p9+$p10+$p11+$p12+$p13+$p14+$p15+$p16+$p17;

///

$price=$p3+$p4+$p18+$p19+$p20+$p21+$p22+$p23+$p24+$p25+$p26+$p27+$p28+$p29+$p30+$p17+$p31+$p32+$p33+$p34+$p35+$p36+$p37+$p38+$p39+$p40+$p41+$p42+$p43;
function MysqlCopyRow($TableName, $IDFieldName, $IDToDuplicate) {
if ($TableName AND $IDFieldName AND $IDToDuplicate > 0) {
$sql = "SELECT * FROM $TableName WHERE $IDFieldName = $IDToDuplicate";
$result = @mysql_query($sql);
if ($result) {
$sql = "INSERT INTO $TableName SET ";
$row = mysql_fetch_array($result);
$RowKeys = array_keys($row);
$RowValues = array_values($row);
for ($i=3;$i<count($RowKeys);$i+=2) {
if ($i!=3) { $sql .= ", "; }

 if ($RowKeys[$i]=='cancharge') {
$sql .= $RowKeys[$i] . " = '" .'yes' . "'";

}
else if ($RowKeys[$i]=='cust_name') {
$sql .= $RowKeys[$i] . " = '" . $RowValues[$i].'-C' . "'";

}
else if ($RowKeys[$i]=='ccharge') {
$sql .= $RowKeys[$i] . " = '" . $_REQUEST['ccharge'] . "'";

}
else{
$sql .= $RowKeys[$i] . " = '" . $RowValues[$i] . "'";	
	
}
}
$result = @mysql_query($sql);
}
}
}

 
 $str3 = $_REQUEST['txtcust'];
$arr = explode("+", $str3);
$txtcust = $arr[1];
 
 
 $rest = substr($txtcust, -2);  

if ($rest!='-C'){
	
 $iscan='no';


if ($_REQUEST['cancharge']=='yes'){


$ProductID = $_REQUEST['id']; //The id of the product you want to copy
MysqlCopyRow("order_tb","ord_id",$ProductID);	
	}
	
	
	}
	else {
		 $iscan='yes';
	}
	/*echo $iscan;
	exit();*/
	
if ($_REQUEST['manual']=='manual'){
/*echo	'asdf'.$_REQUEST['pr111'];
exit();*/

 $str3 = $_REQUEST['txtcust'];
$arr = explode("+", $str3);
$txtcust = $arr[1];



$str4 = $_REQUEST['txtreq'];
$arr = explode("**", $str4);
$txtreq = $arr[2];


$sqin="update order_tb set cust_name='".$txtcust."',part_no='".$_REQUEST['txtpno']."',rev='".$_REQUEST['txtrev']."',req_by='".$txtreq."',

		email='".$_REQUEST['txtemail']."',phone='".$_REQUEST['txtphone']."',fax='".$_REQUEST['txtfax']."',qnt='".$_REQUEST['txtqnt']."',

		lead_times='".$_REQUEST['txtlead']."',quote_by='".$_REQUEST['txtquote']."',special_inst='".$_REQUEST['txtinst']."',special_instadmin='".$_REQUEST['txtinstadmin']."',is_spinsadmact='".$_REQUEST['admcmntstat']."',

		ipc_class='".$ipc_class."',no_layer='".$no_layer."',m_require='".$m_require."',thickness='".$thick_ness."',

		thickness_tole='".$thick_tole."',inner_copper='".$inner_copper."',start_cu='".$start_cu."',plated_cu='".$plated_cu."',

		fingers_gold='".$fingers_gold."',trace_min='".$trace_min."',space_min='".$space_min."',con_impe_sing='".$con_impe_sing."',con_impe_diff='".$con_impe_diff."',

		tore_impe='".$tore_impe."',hole_size='".$hole_size."',pad='".$pad."',pad1='".$pad1."',blind='".$blind."',buried='".$buried."',bb_both='".$bb_both."',

		hdi_design='".$hdi_design."',finish='".$finish."',mask_size='".$mask_size."',mask_type='".$mask_type."',color='".$color."',ss_side='".$ss_side."',

		ss_color='".$ss_color."',route='".$route."',board_size1='".$b_size1."',board_size2='".$b_size2."',array='".$array."',b_per_array='".$b_per_array."',

		array_size1='".$array_size1."',array_size2='".$array_size2."',route_tole='".$route_tole."',array_design='".$array_design."',

		design_array='".$design_array."',array_type1='".$array_type1."',array_type2='".$array_type2."',array_type3='".$array_type3."',array_require1='".$array_require1."',array_require2='".$array_require2."',array_require3='".$array_require3."',bevel='".$bevel."',counter_sink='".$counter_sink."',

		cut_outs='".$cut_outs."',slots='".$slots."',logo='".$logo."',mark='".$mark."',date_code='".$date_code."',other_marking='".$other_marking."',

		micro_section='".$micro_s."',test_stamp='".$test_stamp."',in_board='".$in_board."',array_rail='".$array_rail."',xouts='".$xouts."',

		xouts1='".$xouts1."',rosh_cert='".$rosh."',cancharge='".$iscan."',ccharge='".$_REQUEST['ccharge']."',fob='".$_REQUEST['fob']."',orddate1='".$_REQUEST['orddate1']."',price='".$price."',per1='".$_REQUEST['per1']."',per2='".$_REQUEST['per2']."',

		per3='".$_REQUEST['per3']."',per4='".$_REQUEST['per4']."',per5='".$_REQUEST['per5']."',per6='".$_REQUEST['per6']."',

		per7='".$_REQUEST['per7']."',per8='".$_REQUEST['per8']."',per9='".$_REQUEST['per9']."',per10='".$_REQUEST['per10']."',

		per11='".$_REQUEST['per11']."',per12='".$_REQUEST['per12']."',per13='".$_REQUEST['per13']."',per14='".$_REQUEST['per14']."',

		qty1='".$_REQUEST['txtqty1']."',qty2='".$_REQUEST['txtqty2']."',qty3='".$_REQUEST['txtqty3']."',qty4='".$_REQUEST['txtqty4']."',qty5='".$_REQUEST['txtqty5']."',

		qty6='".$_REQUEST['txtqty6']."',qty7='".$_REQUEST['txtqty7']."',qty8='".$_REQUEST['txtqty8']."',qty9='".$_REQUEST['txtqty9']."',qty10='".$_REQUEST['txtqty10']."',

		day1='".$_REQUEST['txtday1']."',day2='".$_REQUEST['txtday2']."',day3='".$_REQUEST['txtday3']."',day4='".$_REQUEST['txtday4']."',day5='".$_REQUEST['txtday5']."',

		con_impe1='".$con_impe1. "',new_or_rep='".$_REQUEST['nor']. "',necharge='".$_REQUEST['necharge']. "',descharge='".$_REQUEST['descharge']. "',cpo='".$_REQUEST['cpo']. "',opo='".$_REQUEST['opo']




		. "',pr11='".$_REQUEST['pr11']. "',pr12='".$_REQUEST['pr12']. "',pr13='".$_REQUEST['pr13']. "',pr14='".$_REQUEST['pr14']. "',pr15='".$_REQUEST['pr15']

				. "',pr21='".$_REQUEST['pr21']. "',pr22='".$_REQUEST['pr22']. "',pr23='".$_REQUEST['pr23']. "',pr24='".$_REQUEST['pr24']. "',pr25='".$_REQUEST['pr25']

		. "',pr31='".$_REQUEST['pr31']. "',pr32='".$_REQUEST['pr32']. "',pr33='".$_REQUEST['pr33']. "',pr34='".$_REQUEST['pr34']. "',pr35='".$_REQUEST['pr35']

		. "',pr41='".$_REQUEST['pr41']. "',pr42='".$_REQUEST['pr42']. "',pr43='".$_REQUEST['pr43']. "',pr44='".$_REQUEST['pr44']. "',pr45='".$_REQUEST['pr45']

		. "',pr51='".$_REQUEST['pr51']. "',pr52='".$_REQUEST['pr52']. "',pr53='".$_REQUEST['pr53']. "',pr54='".$_REQUEST['pr54']. "',pr55='".$_REQUEST['pr55']

		. "',pr61='".$_REQUEST['pr61']. "',pr62='".$_REQUEST['pr62']. "',pr63='".$_REQUEST['pr63']. "',pr64='".$_REQUEST['pr64']. "',pr65='".$_REQUEST['pr65']

		. "',pr71='".$_REQUEST['pr71']. "',pr72='".$_REQUEST['pr72']. "',pr73='".$_REQUEST['pr73']. "',pr74='".$_REQUEST['pr74']. "',pr75='".$_REQUEST['pr75']

		. "',pr81='".$_REQUEST['pr81']. "',pr82='".$_REQUEST['pr82']. "',pr83='".$_REQUEST['pr83']. "',pr84='".$_REQUEST['pr84']. "',pr85='".$_REQUEST['pr85']

		. "',pr91='".$_REQUEST['pr91']. "',pr92='".$_REQUEST['pr92']. "',pr93='".$_REQUEST['pr93']. "',pr94='".$_REQUEST['pr94']. "',pr95='".$_REQUEST['pr95']

		. "',pr101='".$_REQUEST['pr101']. "',pr102='".$_REQUEST['pr102']. "',pr103='".$_REQUEST['pr103']. "',pr104='".$_REQUEST['pr104']. "',pr105='".$_REQUEST['pr105']




		.  "' where ord_id='".$_REQUEST['id']."'";


}else
{

 $str3 = $_REQUEST['txtcust'];
$arr = explode("+", $str3);
$txtcust = $arr[1];


$str4 = $_REQUEST['txtreq'];
$arr = explode("**", $str4);
$txtreq = $arr[2];

$sqin="update order_tb set cust_name='".$txtcust."',part_no='".$_REQUEST['txtpno']."',rev='".$_REQUEST['txtrev']."',req_by='".$txtreq."',

		email='".$_REQUEST['txtemail']."',phone='".$_REQUEST['txtphone']."',fax='".$_REQUEST['txtfax']."',qnt='".$_REQUEST['txtqnt']."',

		lead_times='".$_REQUEST['txtlead']."',quote_by='".$_REQUEST['txtquote']."',special_inst='".$_REQUEST['txtinst']."',special_instadmin='".$_REQUEST['txtinstadmin']."',is_spinsadmact='".$_REQUEST['admcmntstat']."',

		ipc_class='".$ipc_class."',no_layer='".$no_layer."',m_require='".$m_require."',thickness='".$thick_ness."',

		thickness_tole='".$thick_tole."',inner_copper='".$inner_copper."',start_cu='".$start_cu."',plated_cu='".$plated_cu."',

		fingers_gold='".$fingers_gold."',trace_min='".$trace_min."',space_min='".$space_min."',con_impe_sing='".$con_impe_sing."',con_impe_diff='".$con_impe_diff."',

		tore_impe='".$tore_impe."',hole_size='".$hole_size."',pad='".$pad."',pad1='".$pad1."',blind='".$blind."',buried='".$buried."',bb_both='".$bb_both."',

		hdi_design='".$hdi_design."',finish='".$finish."',mask_size='".$mask_size."',mask_type='".$mask_type."',color='".$color."',ss_side='".$ss_side."',

		ss_color='".$ss_color."',route='".$route."',board_size1='".$b_size1."',board_size2='".$b_size2."',array='".$array."',b_per_array='".$b_per_array."',

		array_size1='".$array_size1."',array_size2='".$array_size2."',route_tole='".$route_tole."',array_design='".$array_design."',

		design_array='".$design_array."',array_type1='".$array_type1."',array_type2='".$array_type2."',array_type3='".$array_type3."',array_require1='".$array_require1."',array_require2='".$array_require2."',array_require3='".$array_require3."',bevel='".$bevel."',counter_sink='".$counter_sink."',

		cut_outs='".$cut_outs."',slots='".$slots."',logo='".$logo."',mark='".$mark."',date_code='".$date_code."',other_marking='".$other_marking."',

		micro_section='".$micro_s."',test_stamp='".$test_stamp."',in_board='".$in_board."',array_rail='".$array_rail."',xouts='".$xouts."',

		xouts1='".$xouts1."',rosh_cert='".$rosh."',cancharge='".$iscan."',ccharge='".$_REQUEST['ccharge']."',fob='".$_REQUEST['fob']."',orddate1='".$_REQUEST['orddate1']."',price='".$price."',per1='".$_REQUEST['per1']."',per2='".$_REQUEST['per2']."',

		per3='".$_REQUEST['per3']."',per4='".$_REQUEST['per4']."',per5='".$_REQUEST['per5']."',per6='".$_REQUEST['per6']."',

		per7='".$_REQUEST['per7']."',per8='".$_REQUEST['per8']."',per9='".$_REQUEST['per9']."',per10='".$_REQUEST['per10']."',

		per11='".$_REQUEST['per11']."',per12='".$_REQUEST['per12']."',per13='".$_REQUEST['per13']."',per14='".$_REQUEST['per14']."',

		qty1='".$_REQUEST['txtqty1']."',qty2='".$_REQUEST['txtqty2']."',qty3='".$_REQUEST['txtqty3']."',qty4='".$_REQUEST['txtqty4']."',qty5='".$_REQUEST['txtqty5']."',

		qty6='".$_REQUEST['txtqty6']."',qty7='".$_REQUEST['txtqty7']."',qty8='".$_REQUEST['txtqty8']."',qty9='".$_REQUEST['txtqty9']."',qty10='".$_REQUEST['txtqty10']."',

		day1='".$_REQUEST['txtday1']."',day2='".$_REQUEST['txtday2']."',day3='".$_REQUEST['txtday3']."',day4='".$_REQUEST['txtday4']."',day5='".$_REQUEST['txtday5']."',

		con_impe1='".$con_impe1. "',new_or_rep='".$_REQUEST['nor']. "',necharge='".$_REQUEST['necharge']. "',descharge='".$_REQUEST['descharge']. "',descharge1='".$_REQUEST['descharge1']. "',descharge2='".$_REQUEST['descharge2']. "',desdesc='".$_REQUEST['desdesc']. "',desdesc1='".$_REQUEST['desdesc1']. "',desdesc2='".$_REQUEST['desdesc2']. "',cpo='".$_REQUEST['cpo']. "',opo='".$_REQUEST['opo']



		.  "' where ord_id='".$_REQUEST['id']."'";





}


//$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,special_inst,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe,tore_impe,hole_size,pad,blind,buried,bb_both,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type,array_require,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,in_board,array_rail,xouts,xouts1,rosh_cert,price,ord_date) values('".$_REQUEST['txtcust']."','".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$_REQUEST['txtreq']."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','".$_REQUEST['txtinst']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$bb_both."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type."','".$array_require."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".$price."','".date('Y-m-d')."')";

/*echo $sqin;
exit();*/

$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data'.mysql_error());
}
header('location:manage_quote.php');
}

$sqs="select * from order_tb where ord_id='".$_REQUEST['id']."'";

$ress=mysql_query($sqs);

if(!$ress) {

die('error in data');

}

$rws=mysql_fetch_array($ress);



$bprice=2;

//

$leadtm1=$rws['day1'];

$leadtm = $leadtm1;

if($leadtm==7) {

$d1=$bprice;

}

if($leadtm==1) {

$d1=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d1=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d1=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d1=$bprice+($bprice*(100/100));

}

//=== 2

$leadtm2=$rws['day2'];

$leadtm = $leadtm2;

if($leadtm==7) {

$d2=$bprice;

}

if($leadtm==1) {

$d2=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d2=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d2=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d2=$bprice+($bprice*(100/100));

}



//====3 =====

$leadtm3=$rws['day3'];

$leadtm = $leadtm3;

if($leadtm==7) {

$d3=$bprice;

}

if($leadtm==1) {

$d3=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d3=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d3=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d3=$bprice+($bprice*(100/100));

}

// 4



$leadtm4=$rws['day4'];

$leadtm = $leadtm4;

if($leadtm==7) {

$d4=$bprice;

}

if($leadtm==1) {

$d4=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d4=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d4=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d4=$bprice+($bprice*(100/100));

}





$leadtm5=$rws['day5'];

$leadtm = $leadtm5;

if($leadtm==7) {

$d5=$bprice;

}

if($leadtm==1) {

$d5=$bprice+($bprice*(250/100));

}

if($leadtm==2) {

$d5=$bprice+($bprice*(200/100));

}

if($leadtm==3) {

$d5=$bprice+($bprice*(150/100));

}

if($leadtm==4) {

$d5=$bprice+($bprice*(100/100));

}



// end of day



$qnt1=$rws['qty1'];

if($qnt1>=250) {

$q1=$bprice;

}

if($qnt1<=100) {

$q1=$bprice+($bprice*(150/100));

}

if($qnt1<=50) {

$q1=$bprice+($bprice*(200/100));

}

if($qnt1<=10) {

$q1=$bprice+($bprice*(250/100));

}

// 2

$qnt2=$rws['qty2'];

if($qnt2>=250) {

$q2=$bprice;

}

if($qnt2<=100) {

$q2=$bprice+($bprice*(150/100));

}

if($qnt2<=50) {

$q2=$bprice+($bprice*(200/100));

}

if($qnt2<=10) {

$q2=$bprice+($bprice*(250/100));

}

//3

$qnt3=$rws['qty3'];

if($qnt3>=250) {

$q3=$bprice;

}

if($qnt3<=100) {

$q3=$bprice+($bprice*(150/100));

}

if($qnt3<=50) {

$q3=$bprice+($bprice*(200/100));

}

if($qnt2<=10) {

$q3=$bprice+($bprice*(250/100));

}

// 4

$qnt4=$rws['qty4'];

if($qnt4>=250) {

$q4=$bprice;

}

if($qnt4<=100) {

$q4=$bprice+($bprice*(150/100));

}

if($qnt4<=50) {

$q4=$bprice+($bprice*(200/100));

}

if($qnt4<=10) {

$q4=$bprice+($bprice*(250/100));

}





$qnt5=$rws['qty5'];

if($qnt5>=250) {

$q5=$bprice;

}

if($qnt5<=100) {

$q5=$bprice+($bprice*(150/100));

}

if($qnt5<=50) {

$q5=$bprice+($bprice*(200/100));

}

if($qnt5<=10) {

$q5=$bprice+($bprice*(250/100));

}



$qnt6=$rws['qty6'];

if($qnt6>=250) {

$q6=$bprice;

}

if($qnt6<=100) {

$q6=$bprice+($bprice*(150/100));

}

if($qnt6<=50) {

$q6=$bprice+($bprice*(200/100));

}

if($qnt6<=10) {

$q6=$bprice+($bprice*(250/100));

}



$qnt7=$rws['qty7'];

if($qnt1>=250) {

$q7=$bprice;

}

if($qnt7<=100) {

$q7=$bprice+($bprice*(150/100));

}

if($qnt7<=50) {

$q7=$bprice+($bprice*(200/100));

}

if($qnt7<=10) {

$q7=$bprice+($bprice*(250/100));

}



$qnt8=$rws['qty8'];

if($qnt8>=250) {

$q8=$bprice;

}

if($qnt8<=100) {

$q8 = $bprice+($bprice*(150/100));

}

if($qnt8<=50) {

$q8=$bprice+($bprice*(200/100));

}

if($qnt8<=10) {

$q8=$bprice+($bprice*(250/100));

}





$qnt9=$rws['qty9'];

if($qnt9>=250) {

$q9=$bprice;

}

if($qnt9<=100) {

$q9=$bprice+($bprice*(150/100));

}

if($qnt9<=50) {

$q9=$bprice+($bprice*(200/100));

}

if($qnt9<=10) {

$q9=$bprice+($bprice*(250/100));

}



$qnt10=$rws['qty10'];

if($qnt10>=250) {

$q10=$bprice;

}

if($qnt10<=100) {

$q10=$bprice+($bprice*(150/100));

}

if($qnt10<=50) {

$q10=$bprice+($bprice*(200/100));

}

if($qnt10<=10) {

$q10=$bprice+($bprice*(250/100));

}



//q1

if($qnt1 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q1 + $d1;}else{$price1 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q1 + $d2;}else{$price2 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q1 + $d3;}else{$price3 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q1 + $d4;}else{$price4 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q1 + $d5;}else{$price5 = "";}

endif;



//q2

if($qnt2 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q2 + $d1;}else{$price6 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q2 + $d2;}else{$price7 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q2 + $d3;}else{$price8 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q2 + $d4;}else{$price9 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q2 + $d5;}else{$price10 = "";}

endif;



//q3

if($qnt3 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q3 + $d1;}else{$price11 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q3 + $d2;}else{$price12 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q3 + $d3;}else{$price13 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q3 + $d4;}else{$price14 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q3 + $d5;}else{$price15 = "";}

endif;



//q2

if($qnt4 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q4 + $d1;}else{$price16 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q4 + $d2;}else{$price17 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q4 + $d3;}else{$price18 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q4 + $d4;}else{$price19 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q4 + $d5;}else{$price20 = "";}

endif;



//q2

if($qnt5 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q5 + $d1;}else{$price21 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q5 + $d2;}else{$price22 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q5 + $d3;}else{$price23 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q5 + $d4;}else{$price24 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q5 + $d5;}else{$price25 = "";}

endif;



//q2

if($qnt6 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q6 + $d1;}else{$price26 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q6 + $d2;}else{$price27 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q6 + $d3;}else{$price28 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q6 + $d4;}else{$price29 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q6 + $d5;}else{$price30 = "";}

endif;



//q2

if($qnt7 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q7 + $d1;}else{$price31 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q7 + $d2;}else{$price32 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q7 + $d3;}else{$price33 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q7 + $d4;}else{$price34 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q7 + $d5;}else{$price35 = "";}

endif;



//q2

if($qnt8 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q8 + $d1;}else{$price36 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q8 + $d2;}else{$price37 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q8 + $d3;}else{$price38 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q8 + $d4;}else{$price39 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q8 + $d5;}else{$price40 = "";}

endif;



//q2

if($qnt9 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q9 + $d1;}else{$price41 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q9 + $d2;}else{$price42 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q9 + $d3;}else{$price43 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q9 + $d4;}else{$price44 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q9 + $d5;}else{$price45 = "";}

endif;



//q2

if($qnt10 > 0):

if($leadtm1 > 0){$price1 = $rws['price'] + $q10 + $d1;}else{$price46 = "";}

if($leadtm2 > 0){$price2 = $rws['price'] + $q10 + $d2;}else{$price47 = "";}

if($leadtm3 > 0){$price3 = $rws['price'] + $q10 + $d3;}else{$price48 = "";}

if($leadtm4 > 0){$price4 = $rws['price'] + $q10 + $d4;}else{$price49 = "";}

if($leadtm5 > 0){$price4 = $rws['price'] + $q10 + $d5;}else{$price50 = "";}

endif;



$baseprice = $rws['price'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/IE-7.css"/>
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="css/IE-8.css" />
<![endif]-->
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/IE-9.css" />
<![endif]-->

    <link href="style_Admin.css" rel="stylesheet" type="text/css">



    <style type="text/css">

<!--

.style1 {font-weight: bold}

-->

    </style>
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true , 'defaultDate': '<?php
					  
					 
					  
					  echo substr($rws['orddate1'], -10);  ?>',});});
</script>
<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
--><!--<script src="http://code.jquery.com/jquery-latest.js"></script>
-->  
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/gotowelcome.js"></script>
<script type="text/javascript">
	
function getprice2() {


for (index=0; index < document.form1.chk1.length; index++) {
	if (document.form1.chk1[index].checked) {
		var radioValue = document.form1.chk1[index].value;
		break;
	}
}

//alert(radioValue);
chk1 = radioValue;

//chk1=document.form1.chk1.value;

//id=document.form1.txtcid.value;

qty1=document.form1.txtqty1.value;

qty2=document.form1.txtqty2.value;

qty3=document.form1.txtqty3.value;

qty4=document.form1.txtqty4.value;

day1=document.form1.txtday1.value;

day2=document.form1.txtday2.value;

day3=document.form1.txtday3.value;

day4=document.form1.txtday4.value;

per1=document.form1.txtday4.value;

per2=document.form1.txtday4.value;



//alert(pid);

//alert(pid);

//alert(uname);

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtshow1").innerHTML=xmlhttp.responseText;

    }

  }
  var data =$j("#form1").serialize();

  url="getprice.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice?>;

 // alert(url);

xmlhttp.open("GET","getprice.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice ?>+"&inid="+<?php echo $_REQUEST['id'] ?>,true);

xmlhttp.send();

}




</script>
  

<script type="text/javascript">
function msidenot () {
	//alert('asdf');
$j('input[name=chk51]').attr('checked',false);
$j('input[name=chk53]').attr('checked',false);
document.getElementById('txtother10').value='';

}
function nomennot () {
	//alert('asdf');
$j('input[name=chk58]').attr('checked',false);
document.getElementById('txtother11').value='';


}

function xoutsnot () {
	//alert('asdf');
document.getElementById('textfield28').value='';


}
function clrother17 () {
	//alert('asdf');
document.getElementById('textfield27').value='';


}
function clrmlayerother () {
	//alert('asdf');
document.getElementById('txtother1').value='';


}
function clrinrcprother () {
	//alert('asdf');
document.getElementById('txtother6').value='';


}
function thktolclr () {
	//alert('asdf');
document.getElementById('txtother5').value='';


}
function pltdcuhole () {
	//alert('asdf');
document.getElementById('txtother7').value='';


}
function imptolclr () {
	//alert('asdf');
document.getElementById('txtother51').value='';


}
function finishother () {
	//alert('asdf');
document.getElementById('txtother9').value='';


}
function routtol () {
	//alert('asdf');
document.getElementById('txtother53').value='';


}
function strtcu () {
	//alert('asdf');
document.getElementById('txtother3').value='';


}


function showmanual() {



for (index=0; index < document.form1.chk1.length; index++) {
				if (document.form1.chk1[index].checked) {
					var radioValue = document.form1.chk1[index].value;
					break;
				}
			}

//alert(radioValue);
chk1 = radioValue;

//chk1=document.form1.chk1.value;

//id=document.form1.txtcid.value;

qty1=document.form1.txtqty1.value;


qty2=document.form1.txtqty2.value;

qty3=document.form1.txtqty3.value;

qty4=document.form1.txtqty4.value;

day1=document.form1.txtday1.value;

day2=document.form1.txtday2.value;

day3=document.form1.txtday3.value;

day4=document.form1.txtday4.value;

per1=document.form1.txtday4.value;

per2=document.form1.txtday4.value;



//alert(pid);

//alert(pid);

//alert(uname);

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtshow1").innerHTML=xmlhttp.responseText;

    }

  }

  var data = $j("#form1").serialize();

  url="getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice?>;
  //url="getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1="+per1+"&per2="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice?>;

 // alert(url);

xmlhttp.open("GET","getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice ?>+"&inid="+<?php echo $_REQUEST['id'] ?>,true);

xmlhttp.send();



	}
 </script>
   <script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

  <script language="javascript">
		function geturl(addr) {  
var r = $j.ajax({  
 type: 'GET',  
 url: addr,  
 async: false  
}).responseText;  
return r;  
}  
function testsaved(reqbysaved) {
	//alert(reqbysaved);
	
	uid= document.getElementById("txtcust").value;

 uid2 = uid.split("+");
 uid3 = uid2[0];
	
	$j('#content').html(geturl("getreqbysaved.php?reqbysaved="+reqbysaved+"&uid="+uid3));  

	
	}
	
function test() {



var uid = '';
var uid2 = '';
var uid3 = '';


 uid= document.getElementById("txtcust").value;

 uid2 = uid.split("+");
 uid3 = uid2[0];
$j('#content').html(geturl("getmainenggcontact.php?uid="+uid3));  
test2();
}

function test2() {



var uid = '';



 uid= document.getElementById("txtreq").value;
//alert(uid);

$j('#content2').html(geturl("getmailphone.php?uid="+uid));  
}


</script>
<script language="javascript">
function getmisc()
{
if(document.form1.txtmisc.value==1)
{
 document.getElementById("misc1").innerHTML="<strong>Misc Charge1:</strong> <input size=3 type=text name=descharge value= id=descharge> 
       &nbsp;Name of Misc1 :
       <input type=text name=desdesc id=desdesc />";
}
if(document.form1.txtmisc.value==2)
{
 document.getElementById("misc2").innerHTML="<strong>Misc Charge2:</strong> <input size=3 type=text name=descharge1 value= id=descharge1> 
       &nbsp;Name of Misc2 :
       <input type=text name=desdesc1 id=desdesc1 />";
}
if(document.form1.txtmisc.value==3)
{
 document.getElementById("misc3").innerHTML="<strong>Misc Charge3:</strong> <input size=3 type=text name=descharge2 value= id=descharge2> 
       &nbsp;Name of Misc3 :
       <input type=text name=desdesc2 id=desdesc2 />";
}
}
</script>

  </head><body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr>

                <td align="center">

                    <table border="0" cellpadding="0" cellspacing="1" width="1300">

                        <tbody>

                        <tr>
                                <td colspan="2" id="header" style="height:50px;"><!--menu-->
                        &nbsp; &nbsp;<strong class="titleWelcome">Welcome to Admin Panel</strong>
                                
                               
                                    </td> <!--/menu-->
                            </tr>

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>

                            
                                    <div>

                                        <table cellpadding="5" cellspacing="1" width="100%">



                                            <tbody><tr>

                                                

                                            </tr>

                                            <tr>
                                             <td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br />
                                                  <br />
                                                  <img src="logo-pcb.png" width="189" height="198" border="0" /></a><br /></td>

												<td style="line-height: 16px;"><form id="form1" name="form1" method="post" action="">

  <table width="920" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6" style="left:35px;">

    <tr>

      <td height="30" bgcolor=#336699 colspan="3" align="center">

      <font color="white"><span class="style1">Online Request For Quote Form</font></span></td>

    </tr>

    <tr>

      <td height="30" colspan="3"><!--<strong>LEAD TIMES : 7 DAYS : $2 (base price) || <br>

        LEAD TIMES : 1 DAYS : $2 (base price)+200% added of bprice ||<br>

        LEAD TIMES : 3 DAYS : $2 (base price)+100% added of bprice || <br>

        LEAD TIMES : 3 DAYS : $2 (base price)+100% added of bprice || <br>

        LEAD TIMES : 4 DAYS : $2 (base price)+50% added of bprice</strong> --></td>

      </tr>

    <tr>

      <td height="30">

      <!--

      <p><strong>QNT : &gt;=250 : $2 BASE PRICE<br>

            <br>

        QNT : 100 : $2 + 200 %<br>

        <br>

        QNT : 50 : $2 + 100 %</strong></p>

        <p><strong>QNT : 20 : $2 + 50 %</strong></p>

        <p><strong>QNT : 10 : $2 + 20%</strong></p> --></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td width="352" height="30"><strong>Customer :</strong>

       <!-- <label>

        <input type="text" name="txtcust" id="txtcust"  value="<?php // echo $rws['cust_name'];?>"/>

      </label>-->
      
      
      <label>

                                                        <select name="txtcust" id="txtcust" onChange="test();">

                                                        <?php 

														$sqv="select * from data_tb ORDER BY c_name";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>
                                                        <option value="<?php echo $rwv['data_id'].'+'.$rwv['c_name'];

														?>" <?php if($rwv['c_name']==$rws['cust_name']){?> selected <?php } ?>><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>

                                                      </select>

                                                      </label>
      
      </td>

      <td width="252"><strong>Part Number :</strong>

      <input name="txtpno" type="text" id="txtpno" value="<?php echo $rws['part_no'];?>" /></td>

      <td width="238"><strong>Rev :</strong>

      <input name="txtrev" type="text" size="1" id="txtrev" value="<?php echo $rws['rev'];?>" />



       &nbsp;&nbsp;&nbsp;


        <label for="new"><strong>New</strong></label>
  <input type="radio" name="nor"  <?php if ($rws['new_or_rep']=='New Part') echo 'checked';?> value="New Part" id="new" />
 &nbsp;&nbsp;&nbsp;
  <label for="rep"><strong> Repeat</strong></label>
  <input type="radio" name="nor"  <?php if ($rws['new_or_rep']=='Repeat Order') echo 'checked';?> value="Repeat Order" id="rep" />
       



      </td>

    </tr>

    <tr>

      <td height="30"><strong>Requested By :</strong>

      
        <span id="content"><!--<input name="txtreq" type="text" id="txtreq" value="<?php //  echo $rws['req_by'];?>" />--></span>
<!--      <input name="txtreq" type="text" id="txtreq" value="<?php // echo $rws['req_by'];?>" />
-->
    </td> 
     <script type="text/javascript">
	 var reqbysaved = '<?php  echo $rws['req_by'];?>';
testsaved(reqbysaved);
</script>
      <td height="30" colspan="2" id="content2"><strong>Email :</strong>

      <input name="txtemail" type="text" id="txtemail" value="<?php echo $rws['email'];?>" /> &nbsp;&nbsp; <strong>Phone :</strong>

      <input name="txtphone" type="text" id="txtphone" value="<?php echo $rws['phone'];?>" /></td>

     <!-- <td><strong>Phone :</strong>

      <input name="txtphone" type="text" id="txtphone" value="<?php // echo $rws['phone'];?>" /></td>
-->
    </tr>

    <tr>

      <td height="30" colspan="3"><strong>FAX :</strong>

      <input name="txtfax" type="text" id="txtfax" value="<?php echo $rws['fax'];?>" size="15" />

     <!-- <strong>Quntity :</strong>

      <input name="txtqnt" type="text" id="txtqnt" value="<?php echo $rws['qnt'];?>" size="15" />

      <strong>Lead Times :</strong>

      <input name="txtlead" type="text" id="txtlead" value="<?php echo $rws['lead_times'];?>" size="15" />--> <strong>Quote Needed by:      </strong>

      <input name="txtquote" type="text" id="txtquote" value="<?php echo $rws['quote_by'];?>" size="7" />



      
      <strong> NRE Charge:</strong> <input size="3" type="text" value="<?php echo $rws['necharge'];?>" name="necharge" id="necharge">
      Select Misc :
      <select name="txtmisc" id="txtmisc" onchange="getmisc();">
      <option value="">--select MISC--</option>
      <option value="m1">Misc 1</option>
      <option value="m2">Misc 2</option>
      <option value="m3">Misc 3</option>
      </select>
      <br />
      <script language="javascript">
     function getmisc()
{
//alert('hi');
if(document.form1.txtmisc.value=='m1')
{
document.getElementById('misc1').style.visibility = 'visible';
}
if(document.form1.txtmisc.value=='m2')
{
document.getElementById('misc2').style.visibility = 'visible';
}
if(document.form1.txtmisc.value=='m3')
{
document.getElementById('misc3').style.visibility = 'visible';
}
}
</script>
    <!--  <strong>Cust PO:</strong> <input size="7" type="text" name="cpo" value="<?php // echo $rws['cpo'];?>" id="descharge">--><!--<input size="7" type="text" name="opo" value="<?php // echo $rws['opo'];?>" id="descharge">-->
    
     <div id="misc1" <?php 	 if($rws['descharge']=="")
	 {
?> style="visibility:hidden" <?php } ?>>
     
      <strong>Misc Charge1:</strong> <input size="3" type="text" name="descharge" value="<?php echo $rws['descharge'];?>"  id="descharge"> 
       &nbsp;Name of Misc1 :
       <input type="text" name="desdesc" id="desdesc"  value="<?php echo $rws['desdesc'];?>"/>
     </div>
      <div id="misc2" <?php 	 if($rws['descharge1']=="")
	 {
?> style="visibility:hidden" <?php } ?>>  
   
      <strong>Misc Charge2:</strong> <input size="3" type="text" name="descharge1" value="<?php echo $rws['descharge1'];?>"  id="descharge1"> 
      &nbsp;Name of Misc2 : 
       <input type="text" name="desdesc1" id="desdesc1" value="<?php echo $rws['desdesc1'];?>" />
     
      </div>
       <div id="misc3" <?php if($rws['descharge2']=="")
	 { ?> style="visibility:hidden" <?php } ?>>
      
	
        <strong>Misc Charge3:</strong> <input size="3" type="text" name="descharge2"  value="<?php echo $rws['descharge2'];?>" id="descharge2"> 
       &nbsp;Name of Misc3 :
       <input type="text" name="desdesc2" id="desdesc2" value="<?php echo $rws['desdesc2'];?>"  />
    
       </div>



 <strong>Cancellation:</strong>  <input type="radio" name="cancharge" id="radio12" <?php  if ($rws['cancharge']=='yes') echo 'checked';?>  value="yes">

                                                      Yes

                                                      <input type="radio" name="cancharge" id="radio122" <?php  if ($rws['cancharge']=='no') echo 'checked';?> value="no"> 

                                                      No
                                                      
                                                       <strong>Charge:</strong>  <input name="ccharge" type="text" id="ccharge"  value="<?php
													   
													   if ($rws['cancharge']=='yes')
													   
													   echo $rws['ccharge'];
													   
													   
													   
													   ?>" size="8" /> 
                                                       <!-- <strong>Order Date:</strong>  <input name="orddate1" type="text" id="exampleII"  value="<?php echo $rws['orddate1'];?>" size="18" />   -->
                                                       
                                                       
                                                          <strong>FOB:</strong>
                                                       <select name="fob" id="fob">
                                                      
                                                        <option <?php if($rws['fob']=='Anaheim'){?> selected <?php } ?> value="Anaheim">Anaheim</option>

                                                        <option <?php if($rws['fob']=='Customer Dock'){?> selected <?php } ?> value="Customer Dock"> Customer Dock</option>
                                                        
                                                          <option <?php if($rws['fob']=='Factory'){?> selected <?php } ?> value="Factory">Factory</option>
                                                        
                                                       

                                                      </select>
                                                       
                                                       
                                                      </td>

      </td>

    </tr>



     <tr>

      <td height="30" colspan="3"><strong>Qty(s) :

      </strong>

        <input name="txtqty1" type="text" id="txtqty1" size="5"  value="<?php echo $rws['qty1'];?>"/>

        -

        <input name="txtqty2" type="text" id="txtqty2" size="5"   value="<?php echo $rws['qty2'];?>"/>

        -

        <input name="txtqty3" type="text" id="txtqty3" size="5"  value="<?php echo $rws['qty3'];?>" />

        -

        <input name="txtqty4" type="text" id="txtqty4" size="5"  value="<?php echo $rws['qty4'];?>" />



        <input name="txtqty5" type="text" id="txtqty5" size="5"  value="<?php echo $rws['qty5'];?>" />



        <input name="txtqty6" type="text" id="txtqty6" size="5"  value="<?php echo $rws['qty6'];?>" />



        <input name="txtqty7" type="text" id="txtqty7" size="5"  value="<?php echo $rws['qty7'];?>" />



        <input name="txtqty8" type="text" id="txtqty8" size="5"  value="<?php echo $rws['qty8'];?>" />



        <input name="txtqty9" type="text" id="txtqty9" size="5"  value="<?php echo $rws['qty9'];?>" />



        <input name="txtqty10" type="text" id="txtqty10" size="5"  value="<?php echo $rws['qty10'];?>" />

</td></tr><tr ><td colspan="3">

        &nbsp;&nbsp;&nbsp;<strong>Lead Times (In Days) :</strong>

        <input name="txtday1" type="text" id="txtday1" size="5"   value="<?php echo $rws['day1'];?>"/>

        -

        <input name="txtday2" type="text" id="txtday2" size="5" value="<?php echo $rws['day2'];?>" />

        -

        <input name="txtday3" type="text" id="txtday3" size="5" value="<?php echo $rws['day3'];?>" />

        -

        <input name="txtday4" type="text" id="txtday4" size="5" value="<?php echo $rws['day4'];?>" />



        <input name="txtday5" type="text" id="txtday5" size="5" value="<?php echo $rws['day5'];?>" />





        <input name="txtprice1" type="hidden" id="txtprice1" value="$12" size="15" /><input name="txtprice2" type="hidden" id="txtprice2" value="$10" size="15" /><input name="txtprice3" type="hidden" id="txtprice3" value="$5" size="15" /><input name="txtprice4" type="hidden" id="txtprice4" value="$4.40" size="15" /></td>

    </tr>

     <tr>

       <td height="30" colspan="4" >

         <input type="button" name="button" id="button" value="Calculate Price" onClick="getprice2();">
         &nbsp;&nbsp;&nbsp;
           <input type="button" name="button" id="button" value="Manual Price" onClick="showmanual();">

         <br>

         <br><div id="txtshow1"></div>

         <br>

       </td>

     </tr>

     <tr>

     <td colspan="3">

<table>
<tr>
     
     
     
     
     <!-- <td height="30" bgcolor=#336699 align="Left">

      <font color="white"><strong>SPECIAL INSTRUCTIONS: </strong></font></span></td>-->
       <td height="30" bgcolor=#336699 align="Left">

      <font color="white"><strong>ADMIN INSTRUCTIONS: </strong></font></span></td>
       <td height="30" bgcolor=#336699  align="Left">
     </td>

    </tr>

    <tr>

     <!-- <td height="30" >
      <label>

        <textarea name="txtinst" id="txtinst" cols="45" rows="5"><?php // echo $rws['special_inst'];?></textarea>

      </label>
</td>-->
   <td height="30" >
      <label>

        <textarea name="txtinstadmin" id="txtinstadmin" cols="45" rows="5"><?php echo $rws['special_instadmin'];?></textarea>

      </label>
</td>
    <td height="30" bgcolor=#336699  align="Left">
      <strong>Replace with Comments</strong> <br>
       Yes 
        <input name="admcmntstat" type="radio" id="admcmntstat1" value="yes" <?php if($rws['is_spinsadmact']=='yes'){ ?> checked <?php } ?> />
	<br>
        No &nbsp;&nbsp;<input name="admcmntstat" type="radio" id="admcmntstat2" value="no"  value="yes" <?php if($rws['is_spinsadmact']=='no'){ ?> checked <?php } ?> />
     </td>
 </tr>
    </table>

    
          
      </td>
</tr>

   </table>
     <table width="920" border="1" align="center" cellpadding="1" cellspacing="0" style="border-color: 
#336699; left:35px;" bordercolor="#336699">

 

    <tr>

      <td width="345px" height="30"bgcolor=#336699><font color="white"><strong>Number of Layers : </strong></td>

      <td width="314px" height="30"bgcolor=#336699><font color="white"><strong>Material Required : </strong></td>

      <td width="254px"  height="30"bgcolor=#336699><font color="white"><strong>IPC Class:</strong> 1

      <input name="chki1" type="checkbox" id="chki1" value="1"  <?php if($rws['ipc_class']=='1'){ ?> checked <?PHP }?> />

      2

      <input name="chki2" type="checkbox" id="chki2" value="2" <?php if($rws['ipc_class']=='2'){ ?> checked <?PHP }?> />

      3

      <input name="chki3" type="checkbox" id="chki3" value="3" <?php if($rws['ipc_class']=='3'){ ?> checked <?PHP }?> /></td>

    </tr>

    <tr>

      <td height="30"> Single Sided



        <input name="chk1" type="radio" id="chk1" value="single" <?php if($rws['no_layer']=='single'){ ?> checked <?PHP }?> />

      Double Sided

      <input name="chk1" type="radio" id="chk2" value="Double Sided" <?php if($rws['no_layer']=='Double Sided'){ ?> checked <?PHP }?> />

      <br />

      <br />

      <strong>Multilayer: </strong>4Lyr

      <input  onChange="clrmlayerother()" onSelect="clrmlayerother()" name="chk1" type="radio" id="chk3" value="4Lyrs"  <?php if($rws['no_layer']=='4Lyrs'){ ?> checked <?PHP }?>  />

      6Lyr

      <input  onChange="clrmlayerother()" onSelect="clrmlayerother()" name="chk1" type="radio" id="chk4" value="6Lyrs"  <?php if($rws['no_layer']=='6Lyrs'){ ?> checked <?PHP }?>/>

8Lyr

      <input  onChange="clrmlayerother()" onSelect="clrmlayerother()" name="chk1" type="radio" id="chk5" value="8Lyrs" <?php if($rws['no_layer']=='8Lyrs'){ ?> checked <?PHP }?> />

10Lyr

      <input onChange="clrmlayerother()" onSelect="clrmlayerother()" name="chk1" type="radio" id="chk6" value="10Lyrs" <?php if($rws['no_layer']=='10Lyrs'){ ?> checked <?PHP }?> />

      <br />

      <br />

      Other :

      <input name="chk1" type="radio" id="chk99" value="Other" <?php if( ($rws['no_layer']!='single')and ($rws['no_layer']!='Double Sided') and ($rws['no_layer']!='4Lyrs')and ($rws['no_layer']!='6Lyrs')and ($rws['no_layer']!='8Lyrs')and ($rws['no_layer']!='10Lyrs')){ ?> checked <?PHP }?> />

      <input type="text" name="txtother1" id="txtother1" <?php if( ($rws['no_layer']!='single')and ($rws['no_layer']!='Double Sided') and ($rws['no_layer']!='4Lyrs')and ($rws['no_layer']!='6Lyrs')and ($rws['no_layer']!='8Lyrs')and ($rws['no_layer']!='10Lyrs')){ ?> value="<?php echo $rws['no_layer']; ?>" <?PHP }?> />

      Lyr<br>

      <br>

      Adder % :

      <input type="text" name="per1" id="txtother16" value="<?php echo $rws['per1']; ?>"/>

      <br />     </td>

      <td height="30"> FR-4

        <input name="chk7" type="radio" id="chk7" value="FR-4"   <?php if($rws['m_require']=='FR-4'){ ?> checked <?PHP }?>/>

        FR-4/170TG Min

        <input name="chk7" type="radio" id="chk8" value="FR-4/170TG Min"  <?php if($rws['m_require']=='FR-4/170TG Min'){ ?> checked <?PHP }?>/>

        <br />

        <br />

        Rogers 4003

        <input name="chk7" type="radio" id="chk9" value="Rogers 4003"   <?php if($rws['m_require']=='Rogers 4003'){ ?> checked <?PHP }?> />

        Other:

        <input name="chk7" type="radio" id="chk107" value="Other" <?php if( ($rws['m_require']!='FR-4')and ($rws['m_require']!='FR-4/170TG Min') and ($rws['m_require']!='Rogers 4003')){ ?> checked <?PHP }?> />




        <input name="txtother2" type="text" id="txtother2" size="15" <?php if( ($rws['m_require']!='FR-4')and ($rws['m_require']!='FR-4/170TG Min') and ($rws['m_require']!='Rogers 4003')){ ?> value="<?php echo $rws['m_require']; ?>"  <?PHP }?> />

        <br />

        <br />



        <strong>Inner Copper Oz: </strong>N/A

        <input onChange="clrinrcprother()" onSelect="clrinrcprother()" name="chk18" type="radio" id="chk18" value="N/A"   <?php if($rws['inner_copper']=='N/A'){ ?> checked <?PHP }?> />

.5

<input onChange="clrinrcprother()" onSelect="clrinrcprother()" name="chk18" type="radio" id="chk19" value=".5"  <?php if($rws['inner_copper']=='.5'){ ?> checked <?PHP }?> />

1

<input onChange="clrinrcprother()" onSelect="clrinrcprother()" name="chk18" type="radio" id="chk20" value="1"  <?php if($rws['inner_copper']=='1'){ ?> checked <?PHP }?> />

2

<input onChange="clrinrcprother()" onSelect="clrinrcprother()" name="chk18" type="radio" id="chk21" value="2"  <?php if($rws['inner_copper']=='2'){ ?> checked <?PHP }?> />

<br />

Other

<input name="chk18" type="radio" id="chk102" value="Other" <?php if( ($rws['inner_copper']!='N/A')and ($rws['inner_copper']!='.5') and ($rws['inner_copper']!='1')and ($rws['inner_copper']!='2')){ ?> checked <?PHP }?>/>

<input name="txtother6" type="text" id="txtother6" size="10" <?php if( ($rws['inner_copper']!='N/A')and ($rws['inner_copper']!='.5') and ($rws['inner_copper']!='1')and ($rws['inner_copper']!='2')){ ?> value="<?php echo $rws['inner_copper']; ?>"  <?PHP }?> />



<br>

<br>



Adder % :

<input name="per2" type="text" id="txtother17" value="<?php echo $rws['per2']; ?>" />

<br /></td>

      <td height="30" valign="top"><strong>Thickness:</strong> 0.031&quot;

        <input name="chk13" type="radio" id="chk192" value="0.031" <?php if($rws['thickness']=='0.031'){ ?> checked <?PHP }?>  />

        0.062&quot;

        <input name="chk13" type="radio" id="chk14" value="0.062"  <?php if($rws['thickness']=='0.062'){ ?> checked <?PHP }?>  />

        <br />

        <br />

        0.093&quot;

        <input name="chk13" type="radio" id="chk15" value="0.093" <?php if($rws['thickness']=='0.093'){ ?> checked <?PHP }?>  />

        Other:

        <input name="chk13" type="radio" id="chk108" value="Other" <?php if( ($rws['thickness']!='0.031')and ($rws['thickness']!='0.062') and ($rws['thickness']!='0.093')){ ?> checked <?PHP }?> />

        <input name="txtother44" type="text" id="txtother44" size="10" <?php if( ($rws['thickness']!='0.031')and ($rws['thickness']!='0.062') and ($rws['thickness']!='0.093')){ ?>     value="<?php echo $rws['thickness']; ?>" <?PHP }?> />

        <br />

        <br />

      <strong>Thickness Tolerance :</strong>

      <br />

      <br />

       +-10%

       <input onChange="thktolclr()" onSelect="thktolclr()" name="chk17" type="radio" id="chk17" value="+/- 10%"  <?php if($rws['thickness_tole']=='+/- 10%'){ ?> checked <?PHP }?> />

      Other
 
      <input name="chk17" type="radio" id="chk101" value="Other" <?php if($rws['thickness_tole']!='+/- 10%'){ ?> checked <?PHP }?> />

      <input name="txtother5" type="text" id="txtother5" size="10" <?php if($rws['thickness_tole']!='+/- 10%'){ ?> value="<?php echo $rws['thickness_tole']; ?>" <?PHP }?>  />

      <br />

      <br />

      Adder %:

      <input name="per3" type="text" id="txtother18" value="<?php echo $rws['per3']; ?>" /></td>

    </tr>



    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Plate : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Design Type/Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Design Technology : </font></strong></td>

    </tr>



    <tr>

      <td height="30"><strong>External Cu Oz:</strong> 0.5

        <input onChange="strtcu()" onSelect="strtcu()" name="chk10" type="radio" id="chk10" value="0.5"  <?php if($rws['start_cu']=='0.5'){ ?> checked <?PHP }?>   />

1

<input onChange="strtcu()" onSelect="strtcu()" name="chk10" type="radio" id="chk11" value="1"  <?php if($rws['start_cu']=='1'){ ?> checked <?PHP }?> />

2

<input onChange="strtcu()" onSelect="strtcu()" name="chk10" type="radio" id="chk12" value="2"   <?php if($rws['start_cu']=='2'){ ?> checked <?PHP }?>/>

<br />

<br />

Other :

<input name="chk10" type="radio" id="chk100" value="Other" <?php if(($rws['start_cu']!='0.5')and($rws['start_cu']!='1')and($rws['start_cu']!='2')){ ?> checked <?PHP }?> />

<input type="text" name="txtother3" id="txtother3" <?php if(($rws['start_cu']!='0.5')and($rws['start_cu']!='1')and($rws['start_cu']!='2')){ ?> value="<?php echo $rws['start_cu']; ?>" <?PHP }?> />

<br />

<br />

        Adder % :

        <input type="text"  id="txtother191" name="txtother191" value="<?php echo $rws['pad1']; ?>"   />

        <br />

        <strong>Plated Cu in Holes (Min.):</strong> .0010

        <input onChange="pltdcuhole()" onSelect="pltdcuhole()" name="chk22" type="radio" id="chk22" value=".0010"  <?php if($rws['plated_cu']=='.0010'){ ?> checked <?PHP }?>  />

        .0014

        <input onChange="pltdcuhole()" onSelect="pltdcuhole()" name="chk22" type="radio" id="chk23" value=".0014"  <?php if($rws['plated_cu']=='.0014'){ ?> checked <?PHP }?>  />

        1oz

        <input onChange="pltdcuhole()" onSelect="pltdcuhole()" name="chk22" type="radio" id="chk24" value="1oz"  <?php if($rws['plated_cu']=='1oz'){ ?> checked <?PHP }?>  />

        Other

        <input  name="chk22" type="radio" id="chk106" value="Other" <?php if(($rws['plated_cu']!='.0010')and($rws['plated_cu']!='.0014')and($rws['plated_cu']!='1oz')){ ?> checked <?PHP }?> />

        <input name="txtother7" type="text" id="txtother7" size="20" <?php if(($rws['plated_cu']!='.0010')and($rws['plated_cu']!='.0014')and($rws['plated_cu']!='1oz')){ ?> value="<?php echo $rws['plated_cu']; ?>" <?PHP }?> />

        <br />

        <br />

        <strong>Fingers Nickel/Hard Gold: </strong>Yes <input name="chk25" type="radio" id="chk25" value="yes" <?php if($rws['fingers_gold']=='yes'){ ?> checked <?php } ?> />

         NO

         <input name="chk25" type="radio" id="chk26" value="No" <?php if($rws['fingers_gold']=='No'){ ?> checked <?php } ?> />

         <br>

         <br />

         Adder % :

         <input name="per14" type="text" id="per14" value="<?php echo $rws['per14']; ?>" />

         <br /></td>

      <td height="30" valign="top"><strong>Trace Min. = </strong>.006

        <input name="chk27" type="radio" id="chk27" value=".006" <?php if($rws['trace_min']=='.006'){ ?> checked <?PHP }?> />

        .005

        <input name="chk27" type="radio" id="chk28" value=".005" <?php if($rws['trace_min']=='.005'){ ?> checked <?PHP }?> />

        .004

        <input name="chk27" type="radio" id="chk29" value=".004" <?php if($rws['trace_min']=='.004'){ ?> checked <?PHP }?> />

        .003 <input name="chk27" type="radio" id="chk30" value=".003" <?php if($rws['trace_min']=='.003'){ ?> checked <?PHP }?> />

        <br />

        <br />



        <strong>Space Min. =</strong>.006

        <input name="chk31" type="radio" id="chk31" value=".006"  <?php if($rws['space_min']=='.006'){ ?> checked <?PHP }?>/>

        .005

        <input name="chk31" type="radio" id="chk32" value=".005" <?php if($rws['space_min']=='.005'){ ?> checked <?PHP }?> />

        .004

        <input name="chk31" type="radio" id="chk33" value=".004"  <?php if($rws['space_min']=='.004'){ ?> checked <?PHP }?>/>

        .003 <input name="chk31" type="radio" id="chk34" value=".003" <?php if($rws['space_min']=='.003'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong>Controlled Impedance:</strong> Yes

        <input name="chk35" type="radio" id="chk35" value="Yes"  <?php if($rws['con_impe1']=='Yes'){ ?> checked <?PHP }?>/>

      No

      <input name="chk35" type="radio" id="chk36" value="No"  <?php if($rws['con_impe1']=='No'){ ?> checked <?PHP }?> />

      <br />

      <br />

      Single Ended

      <input name="chk109" type="checkbox" id="chk109" value="Single Ended"  <?php if($rws['con_impe_sing']=='Single Ended'){ ?> checked <?PHP }?> />

      Differential

<input name="chk110" type="checkbox" id="chk110" value="Differential"   <?php if($rws['con_impe_diff']=='Differential'){ ?> checked <?PHP }?>/>

      <br>

      <br>

      Adder %:

      <input name="per5" type="text" id="per5" value="<?php echo $rws['per5']; ?>" />

      <br />

      <br />

      <strong>Impedance Tolerance :</strong>

      <br />

      <br />

       +-10%

       <input  onChange="imptolclr()" onSelect="imptolclr()" name="chk202" type="radio" id="chk202" value="+/- 10%" <?php if($rws['tore_impe']=='+/- 10%'){ ?> checked <?PHP }?> />

      Other

      <input name="chk202" type="radio" id="chk203" value="Other"   <?php if($rws['tore_impe']!='+/- 10%'){ ?> checked <?PHP }?> />

      <input name="txtother51" type="text" id="txtother51" size="10" <?php if($rws['tore_impe']!='+/- 10%'){ ?> value="<?php echo $rws['tore_impe']; ?>" <?PHP }?> />






      <br>

      <br>

      Adder % :

      <input name="per6" type="text" id="per6" value="<?php echo $rws['per6']; ?>" />

      <br />

      <td height="30" valign="top"><strong>Smallest  Hole Size:</strong>

        <input name="txtother8" type="text" id="txtother8" size="8"   value="<?php echo $rws['hole_size'];?>"/>

        <br /><strong>

        Smallest Pad :</strong>

        <input name="txtother14" type="text" id="txtother14" size="10"  value="<?php echo $rws['pad'];?>"/>

        <br />

        <br />

        <strong>Blind Vias:</strong> Yes

        <input name="chk37" type="radio" id="chk37" value="yes" <?php if($rws['blind']=='yes'){ ?> checked <?PHP }?>  />

        No <input name="chk37" type="radio" id="chk38" value="No"  <?php if($rws['blind']=='No'){ ?> checked <?PHP }?>/>

        <br />

        Adder :

        <input name="per7" type="text" id="per7" value="<?php echo $rws['per7']; ?>" />

        <br />

        <strong>Buried Vias: </strong>Yes

        <input name="chk39" type="radio" id="chk39" value="yes"  <?php if($rws['buried']=='yes'){ ?> checked <?PHP }?>/>

        No <input name="chk39" type="radio" id="chk40" value="No" <?php if($rws['buried']=='No'){ ?> checked <?PHP }?> />

         <br />

         <br />

        <strong>Blind/Buried Vias:</strong> Yes

        <input name="chk41" type="radio" id="chk41" value="Yes" <?php if($rws['bb_both']=='Yes'){ ?> checked <?PHP }?> />

      No

      <input name="chk41" type="radio" id="chk42" value="No" <?php if($rws['bb_both']=='No'){ ?> checked <?PHP }?> />

	   <br />

	   <br />

<strong>HDI Design:</strong> Yes

        <input name="chk200" type="radio" id="chk200" value="Yes"  <?php if($rws['hdi_design']=='Yes'){ ?> checked <?PHP }?>/>

      No

      <input name="chk200" type="radio" id="chk201" value="No" <?php if($rws['hdi_design']=='No'){ ?> checked <?PHP }?> />

      <br>

      <br>

      Adder % :

      <input name="per8" type="text" id="per" value="<?php echo $rws['per8']; ?>" /></td>

    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Finish : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Solder Resist : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Nomenclature : </font></strong></td>

    </tr>

    <tr>

      <td height="30"><strong>Finish:</strong> HASL

        <input  onChange="finishother()" onSelect="finishother()" name="chk43" type="radio" id="chk43" value="HASL" <?php if($rws['finish']=='HASL'){ ?> checked <?PHP }?> />
 
        Lead-Free HASL

        <input  onChange="finishother()" onSelect="finishother()" name="chk43" type="radio" id="chk44" value="Lead-Free HASL" <?php if($rws['finish']=='Lead-Free HASL'){ ?> checked <?PHP }?> />

        <br />

        <br />

        ENIG

        <input  onChange="finishother()" onSelect="finishother()" name="chk43" type="radio" id="chk45" value="ENIG"  <?php if($rws['finish']=='ENIG'){ ?> checked <?PHP }?> />

        Imm.Silver

        <input  onChange="finishother()" onSelect="finishother()" name="chk43" type="radio" id="chk46" value="Imm.Silver"  <?php if($rws['finish']=='Imm.Silver'){ ?> checked <?PHP }?>/>

        Imm.Tin



        <input onChange="finishother()" onSelect="finishother()" name="chk43" type="radio" id="chk47" value="Imm.Tin" <?php if($rws['finish']=='Imm.Tin'){ ?> checked <?PHP }?> />

        <br />

        <br />

      Other :

      <input name="chk43" type="radio" id="chk103" value="Other" <?php if (($rws['finish']!='HASL')and($rws['finish']!='Imm.Silver')and($rws['finish']!='Lead-Free HASL')and($rws['finish']!='ENIG')and($rws['finish']!='Imm.Tin')){ ?> checked <?PHP }?>  />

      <input name="txtother9" type="text" id="txtother9" size="15" <?php if(($rws['finish']!='HASL')and($rws['finish']!='Imm.Silver')and($rws['finish']!='Lead-Free HASL')and($rws['finish']!='ENIG')and($rws['finish']!='Imm.Tin')){ ?> value="<?php echo $rws['finish']; ?>" <?PHP }?> /></td>





      <td height="30"><strong>Mask Sides:</strong> N/A

        <input onSelect="msidenot();" onChange="msidenot();" name="chk48" type="radio" id="chk48" value="N/A"  <?php if($rws['mask_size']=='N/A'){ ?> checked <?PHP }?>  />

        1

        <input name="chk48" type="radio" id="chk49" value="1"  <?php if($rws['mask_size']=='1'){ ?> checked <?PHP }?>  />

        Both <input name="chk48" type="radio" id="chk50" value="Both"  <?php if($rws['mask_size']=='Both'){ ?> checked <?PHP }?>  />

        <br />

        <br />

        <strong>Color:</strong> Green

        <input name="chk51" type="radio" id="chk51" value="Green"   <?php if($rws['color']=='Green'){ ?> checked <?PHP }?> />

        Blue <input name="chk51" type="radio" id="chk52" value="Blue" <?php if($rws['color']=='Blue'){ ?> checked <?PHP }?>  />

        <br />

        <br />

        Other

        :

        <input name="chk51" type="radio" id="chk104" value="Other" <?php  if(($rws['color']!='Green')and($rws['color']!='Blue')){ ?>  checked <?PHP }?> />

        <input name="txtother10" type="text" id="txtother10" size="15" <?php if(($rws['color']!='Green')and($rws['color']!='Blue')){ ?> value="<?php echo $rws['color']; ?>" <?PHP }?> />

        <br />

        <br />

        <strong>Mask Type:</strong>

      Glossy

        <input name="chk53" type="radio" id="chk53" value="Glossy"  <?php if($rws['mask_type']=='Glossy'){ ?> checked <?PHP }?> />

      Matte

        <input name="chk53" type="radio" id="chk54" value="Matte" <?php if($rws['mask_type']=='Matte'){ ?> checked <?PHP }?> /></td>



      <td height="30"><strong>S/S Sides:</strong>N/A

        <input name="chk55" onChange="nomennot();" onSelect="nomennot();" type="radio" id="chk55" value="N/A"  <?php if($rws['ss_side']=='N/A'){ ?> checked <?PHP }?>/>

        1

        <input name="chk55" type="radio" id="chk56" value="1"  <?php if($rws['ss_side']=='1'){ ?> checked <?PHP }?>/>

        2 <input name="chk55" type="radio" id="chk57" value="2"  <?php if($rws['ss_side']=='2'){ ?> checked <?PHP }?>/>

        <br />

        <br />





        <strong>S/S Color:</strong>White

        <input name="chk58" type="radio" id="chk58" value="White" <?php if($rws['ss_color']=='White'){ ?> checked <?PHP }?> />

        Black

        <input name="chk58" type="radio" id="chk59" value="Black" <?php if($rws['ss_color']=='Black'){ ?> checked <?PHP }?>  />

        Yellow <input name="chk58" type="radio" id="chk60" value="Yellow" <?php if($rws['ss_color']=='Yellow'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong>Other :

        <input name="chk58" type="radio" id="chk105" value="Other" <?php  if(($rws['ss_color']!='White')and($rws['ss_color']!='Black')and($rws['ss_color']!='Yellow')){ ?>  checked <?PHP }?>  />

        </strong>

      <input name="txtother11" type="text" id="txtother11" size="15" <?php   if(($rws['ss_color']!='White')and($rws['ss_color']!='Black')and($rws['ss_color']!='Yellow')){ ?>  value="<?php echo $rws['ss_color']; ?>" <?PHP }?>  /></td>

    </tr>





    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Fabrication : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Array Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Special Call-Outs : </font></strong></td>

    </tr>

    <tr>

      <td height="30"><strong>Individual Route 1-up: </strong>Yes

        <input name="chk61" type="radio" id="chk61" value="Yes" <?php if($rws['route']=='Yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk61" type="radio" id="chk62" value="No"  <?php if($rws['route']=='No'){ ?> checked <?PHP }?>/>

        <br />

        <br />

        <strong>Board Size (in.)</strong>

        <input name="txtother12" type="text" id="txtother12" size="5"  value="<?php echo $rws['board_size1'];?>" />

        X

        <input name="txtother13" type="text" id="txtother13" value="<?php echo $rws['board_size2'];?>" size="5" />

        <br />

        <br />

        <strong>Array:</strong>

         Yes

        <input name="chk63" type="radio" id="chk63" value="YES"   <?php if($rws['array']=='YES'){ ?> checked <?PHP }?> />

        No <input name="chk63" type="radio" id="chk64" value="NO"  <?php if($rws['array']=='NO'){ ?> checked <?PHP }?> />

        <br />

        <strong>Bds Per Array :</strong>

        <input name="txtother26" type="text" id="textfield26" size="4"    value="<?php echo $rws['b_per_array'];?>"/>

        <br />

        <strong>Array Size:        </strong>

        <input name="txtother15" type="text" id="txtother15" size="5" value="<?php echo $rws['array_size1'];?>" />

X

<input name="txtother16" type="text" id="textfield25" value="<?php echo $rws['array_size2'];?>" size="5" />

	<br />

	<strong>Rout Tolerance :</strong>

       +-.005

       <input onChange="routtol()" onSelect="routtol()"  name="chk204" type="radio" id="chk204" value="+/-.005" <?php if($rws['route_tole']=='+/-.005') {?> checked <?php }?> />

      Other

      <input name="chk204" type="radio" id="chk205" value="Other" <?php  if($rws['route_tole']!='+/-.005'){ ?>  checked <?PHP }?>  />

      <input name="txtother52" type="text" id="txtother53" size="10" <?php  if($rws['route_tole']!='+/-.005'){?>  value="<?php echo $rws['route_tole']; ?>" <?PHP }?>  />

      <br>

      <br>

      Adder %:

      <input name="per9" type="text" id="per4" value="<?php echo $rws['per9']; ?>" /></td>



      <td height="30"><strong>Array Design Provided:</strong> Yes

        <input name="chk65" type="radio" id="chk65" value="Yes"   <?php if($rws['array_design']=='Yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk65" type="radio" id="chk66" value="No" <?php if($rws['array_design']=='No'){ ?> checked <?PHP }?> />

        <br />

        <strong><br />



        Factory to Design Array: </strong>Yes

        <input name="chk67" type="radio" id="chk67" value="yes"  <?php if($rws['design_array']=='yes'){ ?> checked <?PHP }?>/>

        No

        <input name="chk67" type="radio" id="chk68" value="No" <?php if($rws['design_array']=='No'){ ?> checked <?PHP }?> />

        <br />

        <strong>Array Type:</strong> Tab Route

        <input name="chk69" type="checkbox" id="chk69" value="Tab Route" <?php if($rws['array_type1']=='Tab Route'){ ?> checked <?PHP }?> />

        V Score

        <input name="chk70" type="checkbox" id="chk70" value="V Score" <?php if($rws['array_type2']=='V Score'){ ?> checked <?PHP }?> />

        <br />

        Tab and V Score

        <input name="chk71" type="checkbox" id="chk71" value="Tab and V Score" <?php if($rws['array_type3']=='Tab and V Score'){ ?> checked <?PHP }?>/>

        <br />

        <br />

        <strong>Array Requires: </strong>Tooling Holes

        <input name="chk72" type="checkbox" id="chk72" value="Tooling Holes"  <?php if($rws['array_require1']=='Tooling Holes'){ ?> checked <?PHP }?>/>

        <br />

      Fiducials

      <input name="chk73" type="checkbox" id="chk73" value="Fiducials"  <?php if($rws['array_require2']=='Fiducials'){ ?> checked <?PHP }?>/>

      Mousebites

      <input name="chk74" type="checkbox" id="chk74" value="Mousebites" <?php if($rws['array_require3']=='Mousebites'){ ?> checked <?PHP }?>/>

      <br>

      <br>

      Adder % :

      <input name="per10" type="text" id="per3" value="<?php echo $rws['per10']; ?>" /></td>

      <td height="30"><strong>Milling: </strong>Yes

        <input name="chk75" type="radio" id="chk75" value="yes" <?php if($rws['bevel']=='yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk75" type="radio" id="chk76" value="No" <?php if($rws['bevel']=='No'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong>Countersink:</strong> Yes

        <input name="chk77" type="radio" id="chk77" value="yes" <?php if($rws['counter_sink']=='yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk77" type="radio" id="chk78" value="No"  <?php if($rws['counter_sink']=='No'){ ?> checked <?PHP }?>/>

        <br />

        <br />

        <strong>Control Depth:</strong> Yes

        <input name="chk79" type="radio" id="chk79" value="Yes" <?php if($rws['cut_outs']=='Yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk79" type="radio" id="chk80" value="No"   <?php if($rws['cut_outs']=='No'){ ?> checked <?PHP }?>/>

        <br />

        <br />

        <strong>Edge Plating:</strong> Yes

      <input name="chk81" type="radio" id="chk81" value="Yes"   <?php if($rws['slots']=='Yes'){ ?> checked <?PHP }?>/>

      No

      <input name="chk81" type="radio" id="chk82" value="No"  <?php if($rws['slots']=='No'){ ?> checked <?PHP }?> />

      <br>

      <br>

      Adder % :

      <input name="per11" type="text" id="per2" value="<?php echo $rws['per11']; ?>" /></td>

    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Markings : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>QA Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Miscellaneous : </font></strong></td>

    </tr>

    <tr>

      <td height="30"><strong>Logo:</strong> None

        <input name="chk83" type="radio" id="chk83" value="None"  <?php if($rws['logo']=='None'){ ?> checked <?PHP }?> />

        Factory <input name="chk83" type="radio" id="chk84" value="Factory"  <?php if($rws['logo']=='Factory'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong>94V-0 Mark: </strong>Yes

        <input name="chk85" type="radio" id="chk85" value="Yes"  <?php if($rws['mark']=='Yes'){ ?> checked <?PHP }?> />

        No <input name="chk85" type="radio" id="chk86" value="No"  <?php if($rws['mark']=='No'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong>Date Code Format:</strong> None

        <input onChange="clrother17()" onSelect="clrother17()" name="chk87" type="radio" id="chk87" value="None"  <?php if($rws['date_code']=='None'){ ?> checked <?PHP }?> />

        WWYY

        <input onChange="clrother17()" onSelect="clrother17()" name="chk87" type="radio" id="chk88" value="WWYY"  <?php if($rws['date_code']=='WWYY'){ ?> checked <?PHP }?> />

        <br />

        <br />

        YYWW

        <input onChange="clrother17()" onSelect="clrother17()" name="chk87" type="radio" id="chk89" value="YYWW"   <?php if($rws['date_code']=='YYWW'){ ?> checked <?PHP }?>/>

       <strong>Other Marking:

       <input name="chk87" type="radio" id="chk111" value="Other Marking" <?php if(($rws['date_code']!='None')and($rws['date_code']!='WWYY')and($rws['date_code']!='YYWW')){ ?> checked <?PHP }?>  />

       </strong>

       <input name="txtother17" type="text" id="textfield27" size="10" value="<?php echo $rws['other_marking'];?>" />

      <br /></td>





      <td height="30"><strong>Microsection Required: </strong>Yes

        <input name="chk90" type="radio" id="chk90" value="YES"   <?php if($rws['micro_section']=='YES'){ ?> checked <?PHP }?>/>

        No <input name="chk90" type="radio" id="chk91" value="NO"  <?php if($rws['micro_section']=='NO'){ ?> checked <?PHP }?> />

        <br />

        <br />

          <strong>Electrical Test Stamp: </strong>Yes

        <input name="chk92" type="radio" id="chk92" value="Yes"  <?php if($rws['test_stamp']=='Yes'){ ?> checked <?PHP }?> />

        No

        <input name="chk92" type="radio" id="chk93" value="No"  <?php if($rws['test_stamp']=='No'){ ?> checked <?PHP }?>  />

        <br />

          <br />

      In Board

      <input name="chk94" type="radio" id="chk94" value="In Board"   <?php if(strtolower(trim($rws['in_board']))==strtolower(trim('In Board'))){ ?> checked <?PHP }?>/>

      In Array Rail

      <input name="chk94" type="radio" id="chk199" value="In Array Rail" <?php if(strtolower(trim($rws['in_board']))==strtolower(trim('In Array Rail'))){ ?> checked <?PHP }?> />

      <br>

      <br>

      Adder % :

      <input name="per12" type="text" id="per8" value="<?php echo $rws['per12']; ?>" /></td>

      <td height="30"><strong>X-Outs Allowed:</strong> Yes

        <input name="chk95" type="radio" id="chk95" value="yes"   <?php if($rws['xouts']=='yes'){ ?> checked <?PHP }?> />

        No <input onSelect="xoutsnot();" onChange="xoutsnot();" name="chk95" type="radio" id="chk96" value="no" <?php if($rws['xouts']=='no'){ ?> checked <?PHP }?> />

        <br />

        <br />

        <strong># of X-outs per Array :</strong>

        <input name="textfield28" type="text" id="textfield28" size="4"   value="<?php echo $rws['xouts1'];?> "/>

        <br />

        <strong>RoHS Cert: </strong>Yes

      <input name="chk97" type="radio" id="chk97" value="Yes" <?php if(strtolower($rws['rosh_cert'])==strtolower('Yes')){ ?> checked <?PHP }?> />

      No

      <input name="chk97" type="radio" id="chk98" value="No" <?php if(strtolower($rws['rosh_cert'])==strtolower('No')){ ?> checked <?PHP }?> />

      <br>

      <br>

      Adder % :

      <input name="per13" type="text" id="per9" value="<?php echo $rws['per13']; ?>" /></td>

    </tr>

    <tr>

      <?php /* <table>

      	<tr>

      		<th>&nbsp;</th>

      		<th>Day[1]</th>

      		<th>Day[2]</th>

      		<th>Day[3]</th>

      		<th>Day[4]</th>

      	</tr>

      	<tr>

      		<th>Qty[1]</th>

      		<td><?php echo $price1;?></td>

      		<td><?php echo $price2;?></td>

      		<td><?php echo $price3;?></td>

      		<td><?php echo $price4;?></td>

      	</tr>



      	<tr>

      		<th>Qty[2]</th>

      		<td><?php echo $price5;?></td>

      		<td><?php echo $price6;?></td>

      		<td><?php echo $price7;?></td>

      		<td><?php echo $price8;?></td>

      	</tr>



      	<tr>

      		<th>Qty[3]</th>

      		<td><?php echo $price9;?></td>

      		<td><?php echo $price10;?></td>

      		<td><?php echo $price11;?></td>

      		<td><?php echo $price12;?></td>

      	</tr>



      	<tr>

      		<th>Qty[4]</th>

      		<td><?php echo $price13;?></td>

      		<td><?php echo $price14;?></td>

      		<td><?php echo $price15;?></td>

      		<td><?php echo $price16;?></td>

      	</tr>

      </table>

	<td>   <br><br>   Price per board for <?php echo $rws['qty1'];?> pieces on a <?php echo $rws['day1'];?> day lead time is $<?php echo $price1;?><br>

<br>

Price per board for <?php echo $rws['qty1'];?> pieces on a <?php echo $rws['day2'];?> day lead time is $<?php echo $price2;?><br>

<br>

Price per board for <?php echo $rws['qty1'];?> pieces on a <?php echo $rws['day3'];?> day lead time is $<?php echo $price3;?><br>

<br>

Price per board for <?php echo $rws['qty1'];?> pieces on a <?php echo $rws['day4'];?> day lead time is $<?php echo $price4;?><br><br><br>



Price per board for <?php echo $rws['qty2'];?> pieces on a <?php echo $rws['day1'];?> day lead time is $<?php echo $price5;?><br>

<br>

Price per board for <?php echo $rws['qty2'];?> pieces on a <?php echo $rws['day2'];?> day lead time is $<?php echo $price6;?><br>

<br>

Price per board for <?php echo $rws['qty2'];?> pieces on a <?php echo $rws['day3'];?> day lead time is $<?php echo $price7;?><br>

<br>

Price per board for <?php echo $rws['qty2'];?> pieces on a <?php echo $rws['day4'];?> day lead time is $<?php echo $price8;?><br><br><br>





Price per board for <?php echo $rws['qty3'];?> pieces on a <?php echo $rws['day1'];?> day lead time is $<?php echo $price9;?><br>

<br>

Price per board for <?php echo $rws['qty3'];?> pieces on a <?php echo $rws['day2'];?> day lead time is $<?php echo $price10;?><br>

<br>

Price per board for <?php echo $rws['qty3'];?> pieces on a <?php echo $rws['day3'];?> day lead time is $<?php echo $price11;?><br>

<br>

Price per board for <?php echo $rws['qty3'];?> pieces on a <?php echo $rws['day4'];?> day lead time is $<?php echo $price12;?><br><br><br>



Price per board for <?php echo $rws['qty4'];?> pieces on a <?php echo $rws['day1'];?> day lead time is $<?php echo $price13;?><br>

<br>

Price per board for <?php echo $rws['qty4'];?> pieces on a <?php echo $rws['day2'];?> day lead time is $<?php echo $price14;?><br>

<br>

Price per board for <?php echo $rws['qty4'];?> pieces on a <?php echo $rws['day3'];?> day lead time is $<?php echo $price15;?><br>

<br>

Price per board for <?php echo $rws['qty4'];?> pieces on a <?php echo $rws['day4'];?> day lead time is $<?php echo $price16;?><br><br><br>

*/?>

</td>



    </tr>

    <tr>

      <td height="30" colspan="3">

        <input type="submit" name="Submit" id="Submit" value="Submit" />

     &nbsp;

     <label>

     <input type="reset" name="button2" id="button2" value="Reset" />

     </label></td>

    </tr>

    <tr>

      <td height="30" colspan="3">&nbsp;</td>

    </tr>

  </table>

    </tr>

    <tr>

      <td height="30" colspan="3">&nbsp;</td>

    </tr>

  </table>

  <p>&nbsp;</p>

  <p>&nbsp;</p>



</form></td>

											</tr>

                                        </tbody></table>

                                    </div>

                                </td>

                            </tr>



                        </tbody>

                    </table>

                </td>

            </tr>

        </tbody></table>



</body></html>