<?php require_once('conn.php'); 

if($_REQUEST['chki1'] != "") {
	$ipc_class = $_REQUEST['chki1'];
}

if($_REQUEST['chki2'] != "") {
	$ipc_class = $_REQUEST['chki2'];
}

if($_REQUEST['chki3'] != "") {
	$ipc_class=$_REQUEST['chki3'];
}

if($_REQUEST['chk1'] != "") {
	$no_layer = $_REQUEST['chk1'];
}

if($_REQUEST['chk2'] != "") {
	$no_layer = $_REQUEST['chk2'];
}

if($_REQUEST['chk3'] != "") {

$no_layer=$_REQUEST['chk3'];

}

if($_REQUEST['chk4'] != "") {

$no_layer=$_REQUEST['chk4'];

}

if($_REQUEST['chk5'] != "") {

$no_layer=$_REQUEST['chk5'];

}

if($_REQUEST['chk6'] != "") {

$no_layer=$_REQUEST['chk6'];

}



if($_REQUEST['txtother1'] != "") {

$no_layer=$_REQUEST['txtother1'];

}

if($_REQUEST['chk1']=="Other") {

 $no_layer=$_REQUEST['txtother1'];

}
else {
	$no_layer=$_REQUEST['chk1'];
}

if($_REQUEST['chk7'] != "") {
$m_require=$_REQUEST['chk7'];

}

if($_REQUEST['chk8'] != "") {
$m_require=$_REQUEST['chk8'];

}

if($_REQUEST['chk9'] != "") {
$m_require=$_REQUEST['chk9'];

}

if($_REQUEST['txtother2'] != "") {
$m_require=$_REQUEST['txtother2'];

}

if($_REQUEST['chk7']=="Other") {

 $m_require=$_REQUEST['txtother2'];

}
else
 {
$m_require=$_REQUEST['chk7'];
}



if($_REQUEST['chk18'] != "") {

$inner_copper=$_REQUEST['chk18'];

}

if($_REQUEST['chk19'] != "") {

$inner_copper=$_REQUEST['chk19'];

}

if($_REQUEST['chk20'] != "") {

$inner_copper=$_REQUEST['chk20'];

}

if($_REQUEST['chk21'] != "") {

$inner_copper=$_REQUEST['chk21'];

}

if($_REQUEST['txtother6'] != "") {

$inner_copper=$_REQUEST['txtother6'];

}

if($_REQUEST['chk18']=="Other") {

 $inner_copper=$_REQUEST['txtother6'];

}
else
 {

$inner_copper=$_REQUEST['chk18'];
}



if($_REQUEST['chk192'] != "") {
//echo 'chk192';
$thick_ness=$_REQUEST['chk192'];

}


else if($_REQUEST['chk14'] != "") {
//echo 'chk14';
$thick_ness=$_REQUEST['chk14'];

}

else if($_REQUEST['chk15'] != "")


{
//echo 'chk15';
$thick_ness=$_REQUEST['chk15'];

}



else  if($_REQUEST['chk108'] != "") {
	//echo 'else';

 $thick_ness=$_REQUEST['txtother44'];

}
/* $thick_ness=$_REQUEST['chk12'];
*/
 if($_REQUEST['chk13']=="Other") {

 $thick_ness=$_REQUEST['txtother44'];

}
else
 {

$thick_ness=$_REQUEST['chk13'];
}




if($_REQUEST['chk17'] != "") {

$thick_tole=$_REQUEST['chk17'];

}

if($_REQUEST['txtother5'] != "") {

$thick_tole=$_REQUEST['txtother5'];

}


 if($_REQUEST['chk17']=="Other") {

 $thick_tole=$_REQUEST['txtother5'];

}
else
 {

$thick_tole=$_REQUEST['chk17'];
}




if($_REQUEST['chk10'] != "") {

$start_cu=$_REQUEST['chk10'];

}

if($_REQUEST['chk11'] != "") {

$start_cu=$_REQUEST['chk11'];

}

if($_REQUEST['chk12'] != "") {

$start_cu=$_REQUEST['chk12'];

}

if($_REQUEST['txtother3'] != "") {

$start_cu=$_REQUEST['txtother3'];

}


 if($_REQUEST['chk10']=="Other") {

 $start_cu=$_REQUEST['txtother3'];

}
else
 {

$start_cu=$_REQUEST['chk10'];
}

if($_REQUEST['chk22'] != "") {

$plated_cu=$_REQUEST['chk22'];

}

if($_REQUEST['chk23'] != "") {

$plated_cu=$_REQUEST['chk23'];

}

if($_REQUEST['chk24'] != "") {

$plated_cu=$_REQUEST['chk24'];

}

if($_REQUEST['txtother7'] != "") {

$plated_cu=$_REQUEST['txtother7'];

}

 if($_REQUEST['chk22']=="Other") {

 $plated_cu=$_REQUEST['txtother7'];

}
else
 {

$plated_cu=$_REQUEST['chk22'];
}

if($_REQUEST['chk25'] != "") {

$fingers_gold=$_REQUEST['chk25'];

}

if($_REQUEST['chk26'] != "") {

$fingers_gold=$_REQUEST['chk26'];

}

if($_REQUEST['chk27'] != "") {

$trace_min=$_REQUEST['chk27'];

}

if($_REQUEST['chk28'] != "") {

$trace_min=$_REQUEST['chk28'];

}

if($_REQUEST['chk29'] != "") {

$trace_min=$_REQUEST['chk29'];

}

if($_REQUEST['chk30'] != "") {

$trace_min=$_REQUEST['chk30'];

}

if($_REQUEST['chk31'] != "") {

$space_min=$_REQUEST['chk31'];

}

if($_REQUEST['chk32'] != "") {

$space_min=$_REQUEST['chk32'];

}

if($_REQUEST['chk33'] != "") {

$space_min=$_REQUEST['chk33'];

}

if($_REQUEST['chk34'] != "") {

$space_min=$_REQUEST['chk34'];

}

if($_REQUEST['chk35'] != "") {

$con_impe1=$_REQUEST['chk35'];

}

if($_REQUEST['chk36'] != "") {

$con_impe1=$_REQUEST['chk36'];

}

if($_REQUEST['chk109'] != "") {

$con_impe_sing=$_REQUEST['chk109'];

}

if($_REQUEST['chk110'] != "") {

$con_impe_diff=$_REQUEST['chk110'];

}

if($_REQUEST['chk202'] != "") {

$tore_impe=$_REQUEST['chk202'];

}

if($_REQUEST['txtother51'] != "") {

$tore_impe=$_REQUEST['txtother51'];

}
 if($_REQUEST['chk202']=="Other") {

 $tore_impe=$_REQUEST['txtother51'];

}
else
 {

$tore_impe=$_REQUEST['chk202'];
}




if($_REQUEST['txtother8'] != "") {

$hole_size=$_REQUEST['txtother8'];

}

if($_REQUEST['txtother14'] != "") {

$pad=$_REQUEST['txtother14'];

}
if($_REQUEST['txtother191'] != "") {

$pad1=$_REQUEST['txtother191'];

}
/*echo $pad;
exit();*/

if($_REQUEST['chk37'] != "") {

$blind=$_REQUEST['chk37'];

}

if($_REQUEST['chk38'] != "") {

$blind=$_REQUEST['chk38'];

}

if($_REQUEST['chk39'] != "") {

$buried=$_REQUEST['chk39'];

}

if($_REQUEST['chk40'] != "") {

$buried=$_REQUEST['chk40'];

}

if($_REQUEST['chk41'] != "") {

$bb_both=$_REQUEST['chk41'];

}

if($_REQUEST['chk42'] != "") {

$bb_both=$_REQUEST['chk42'];

}

if($_REQUEST['chk200'] != "") {

$hdi_design=$_REQUEST['chk200'];

}

if($_REQUEST['chk201'] != "") {

$hdi_design=$_REQUEST['chk201'];

}

if($_REQUEST['chk43'] != "") {

$finish=$_REQUEST['chk43'];

}

if($_REQUEST['chk44'] != "") {



$finish=$_REQUEST['chk44'];

}

if($_REQUEST['chk45'] != "") {

$finish=$_REQUEST['chk45'];

}

if($_REQUEST['chk46'] != "") {

$finish=$_REQUEST['chk46'];

}

if($_REQUEST['chk47'] != "") {

$finish=$_REQUEST['chk47'];

}

if($_REQUEST['txtother9'] != "") {

$finish=$_REQUEST['txtother9'];

}
 if($_REQUEST['chk43']=="Other") {

 $finish=$_REQUEST['txtother9'];

}
else
 {

$finish=$_REQUEST['chk43'];
}


if($_REQUEST['chk48'] != "") {
$mask_size=$_REQUEST['chk48'];

}

if($_REQUEST['chk49'] != "") {
$mask_size=$_REQUEST['chk49'];

}

if($_REQUEST['chk50'] != "") {
$mask_size=$_REQUEST['chk50'];

}

if($_REQUEST['chk51'] != "") {

$color=$_REQUEST['chk51'];

}

if($_REQUEST['chk52'] != "") {

$color=$_REQUEST['chk52'];

}

if($_REQUEST['txtother10'] != "") {

$color=$_REQUEST['txtother10'];

}
 if($_REQUEST['chk51']=="Other") {

 $color=$_REQUEST['txtother10'];

}
else
 {

$color=$_REQUEST['chk51'];
}

if($_REQUEST['chk53'] != "") {
$mask_type=$_REQUEST['chk53'];

}

if($_REQUEST['chk54'] != "") {
$mask_type=$_REQUEST['chk54'];

}

if($_REQUEST['chk55'] != "") {

$ss_side=$_REQUEST['chk55'];

}

if($_REQUEST['chk56'] != "") {

$ss_side=$_REQUEST['chk56'];

}

if($_REQUEST['chk57'] != "") {

$ss_side=$_REQUEST['chk57'];

}

if($_REQUEST['chk58'] != "") {

$ss_color=$_REQUEST['chk58'];

}

if($_REQUEST['chk59'] != "") {

$ss_color=$_REQUEST['chk59'];

}

if($_REQUEST['chk60'] != "") {

$ss_color=$_REQUEST['chk60'];

}

if($_REQUEST['txtother11'] != "") {

$ss_color=$_REQUEST['txtother11'];

}

if($_REQUEST['chk58']=="Other") {

 $ss_color=$_REQUEST['txtother11'];

}
else
 {

$ss_color=$_REQUEST['chk58'];
}

if($_REQUEST['chk61'] != "") {

$route=$_REQUEST['chk61'];

}

if($_REQUEST['chk62'] != "") {

$route=$_REQUEST['chk62'];

}

if($_REQUEST['txtother12'] != "") {

$b_size1=$_REQUEST['txtother12'];

}

if($_REQUEST['txtother13'] != "") {

$b_size2=$_REQUEST['txtother13'];

}

if($_REQUEST['chk63'] != "") {

$array=$_REQUEST['chk63'];

}

if($_REQUEST['chk64'] != "") {

$array=$_REQUEST['chk64'];

}

if($_REQUEST['txtother26'] != "") {

$b_per_array=$_REQUEST['txtother26'];

}

if($_REQUEST['txtother15'] != "") {

$array_size1=$_REQUEST['txtother15'];

}

if($_REQUEST['txtother16'] != "") {

$array_size2=$_REQUEST['txtother16'];

}

if($_REQUEST['chk204'] != "") {

$route_tole=$_REQUEST['chk204'];

}

if($_REQUEST['txtother52'] != "") {

$route_tole=$_REQUEST['txtother52'];

}
if($_REQUEST['chk204']=="Other") {

 $route_tole=$_REQUEST['txtother52'];

}
else
 {

$route_tole=$_REQUEST['chk204'];
}

if($_REQUEST['chk65'] != "") {

$array_design=$_REQUEST['chk65'];

}

if($_REQUEST['chk66'] != "") {

$array_design=$_REQUEST['chk66'];

}

if($_REQUEST['chk67'] != "") {

$design_array=$_REQUEST['chk67'];

}

if($_REQUEST['chk68'] != "") {

$design_array=$_REQUEST['chk68'];

}

if($_REQUEST['chk69'] != "") {

$array_type1=$_REQUEST['chk69'];

}

if($_REQUEST['chk70'] != "") {

$array_type2=$_REQUEST['chk70'];

}

if($_REQUEST['chk71'] != "") {

$array_type3=$_REQUEST['chk71'];

}

if($_REQUEST['chk72'] != "") {

$array_require1=$_REQUEST['chk72'];

}

if($_REQUEST['chk73'] != "") {

$array_require2=$_REQUEST['chk73'];

}

if($_REQUEST['chk74'] != "") {

$array_require3=$_REQUEST['chk74'];

}

if($_REQUEST['chk75'] != "") {

$bevel=$_REQUEST['chk75'];

}

if($_REQUEST['chk76'] != "") {

$bevel=$_REQUEST['chk76'];

}

if($_REQUEST['chk77'] != "") {

$counter_sink=$_REQUEST['chk77'];

}

if($_REQUEST['chk78'] != "") {

$counter_sink=$_REQUEST['chk78'];

}

if($_REQUEST['chk79'] != "") {

$cut_outs=$_REQUEST['chk79'];

}

if($_REQUEST['chk80'] != "") {

$cut_outs=$_REQUEST['chk80'];

}

if($_REQUEST['chk81'] != "") {

$slots=$_REQUEST['chk81'];

}

if($_REQUEST['chk82'] != "") {

$slots=$_REQUEST['chk82'];

}

if($_REQUEST['chk83'] != "") {

$logo=$_REQUEST['chk83'];

}

if($_REQUEST['chk84'] != "") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84'] != "") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84'] != "") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84'] != "") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84'] != "") {

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk85'] != "") {
$mark=$_REQUEST['chk85'];

}

if($_REQUEST['chk86'] != "") {
$mark=$_REQUEST['chk86'];

}

if($_REQUEST['chk87'] != "") {

$date_code=$_REQUEST['chk87'];

}

if($_REQUEST['chk88'] != "") {

$date_code=$_REQUEST['chk88'];

}

if($_REQUEST['chk89'] != "") {

$date_code=$_REQUEST['chk89'];

}

if($_REQUEST['txtother17'] != "") {

$other_marking=$_REQUEST['txtother17'];

}

if($_REQUEST['chk90'] != "") {
$micro_s=$_REQUEST['chk90'];

}

if($_REQUEST['chk91'] != "") {
$micro_s=$_REQUEST['chk91'];

}

if($_REQUEST['chk92'] != "") {

$test_stamp=$_REQUEST['chk92'];

}

if($_REQUEST['chk93'] != "") {

$test_stamp=$_REQUEST['chk93'];

}

if($_REQUEST['chk94'] != "") {

$in_board=$_REQUEST['chk94'];

}

if($_REQUEST['chk199'] != "") {

$array_rail=$_REQUEST['chk199'];

}

if($_REQUEST['chk95'] != "") {

$xouts=$_REQUEST['chk95'];

}

if($_REQUEST['chk96'] != "") {

$xouts=$_REQUEST['chk96'];

}

if($_REQUEST['txtother18'] != "") {

$xouts1=$_REQUEST['txtother18'];

}

if($_REQUEST['chk97'] != "") {

$rosh=$_REQUEST['chk97'];

}

if($_REQUEST['chk98'] != "") {

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

if($_REQUEST['chki1'] != "") {

$p17=$brice;

}

if($_REQUEST['chki2'] != "") {

$p17=$bprice+($bprice*(100/100));

}

if($_REQUEST['chki3'] != "") {

$p17=$bprice+($bprice*(200/100));

}

if($_REQUEST['chk18'] != "") {

$p31=0;

}

if($_REQUEST['chk19'] != "") {

$p31=$bprice+($bprice*(100/100));

}

if($_REQUEST['chk20'] != "") {

$p31=$bprice+($bprice*(150/100));

}

if($_REQUEST['chk21'] != "") {

$p31=$bprice+($bprice*(200/100));

}

if($_REQUEST['txtother6'] != "") {

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

if($_REQUEST['txtother12'] != "") {

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

if($_REQUEST['per1'] != "") {

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

if($_REQUEST['txtother1'] != "") {

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

if($_REQUEST['per2'] != "") {

$p4=$bprice+($bprice*($_REQUEST['per2']/100));

}

if($_REQUEST['per3'] != "") {

$p18=$bprice+($bprice*($_REQUEST['per3']/100));

}

if($_REQUEST['per4'] != "") {

$p19=$bprice+($bprice*($_REQUEST['per4']/100));

}

if($_REQUEST['per5'] != "") {

$p20=$bprice+($bprice*($_REQUEST['per4']/100));

}

if($_REQUEST['per6'] != "") {

$p21=$bprice+($bprice*($_REQUEST['per6']/100));

}

if($_REQUEST['per7'] != "") {

$p22=$bprice+($bprice*($_REQUEST['per7']/100));

}

if($_REQUEST['per8'] != "") {

$p23=$bprice+($bprice*($_REQUEST['per8']/100));

}

if($_REQUEST['txtother12']!="" and $_REQUEST['txtother13'] != "") {

$bp=$bprice+($_REQUEST['txtother12']*$_REQUEST['txtother13']);

$p24=$bp+($bprice*($_REQUEST['per9']/100));

}

if($_REQUEST['per9'] != "") {

$p25=$bprice+($bprice*($_REQUEST['per9']/100));

}

if($_REQUEST['per10'] != "") {

$p26=$bprice+($bprice*($_REQUEST['per10']/100));

}

if($_REQUEST['per11'] != "") {

$p27=$bprice+($bprice*($_REQUEST['per11']/100));

}

if($_REQUEST['per12'] != "") {

$p28=$bprice+($bprice*($_REQUEST['per12']/100));

}

if($_REQUEST['per13'] != "") {

$p29=$bprice+($bprice*($_REQUEST['per13']/100));

}

if($_REQUEST['per14'] != "") {

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

$qnt7=$_REQUEST['txtqty7'];
if($qnt7>=250)
{
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

$baseprice = $price;

//$baseprice = $_REQUEST['bprice'];
//echo "<xmp>baseprice :" . __LINE__ . "\r\n"; var_dump($baseprice ); echo "</xmp>";


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
<input type="hidden" name="manual" id="manual" value="manual" />

    <table width="650px" >
      	<tr>
      		<th>&nbsp;</th>
      	 <?php if($_REQUEST['txtday1'] > 0):?>	<th><?php echo $_REQUEST['txtday1']; ?> Days</th> <?php endif;?>
      	 <?php if($_REQUEST['txtday2'] > 0):?>	<th><?php echo $_REQUEST['txtday2']; ?> Days</th> <?php endif;?>
      	 <?php if($_REQUEST['txtday3'] > 0):?>	<th><?php echo $_REQUEST['txtday3']; ?> Days</th> <?php endif;?>
      	 <?php if($_REQUEST['txtday4'] > 0):?>	<th><?php echo $_REQUEST['txtday4']; ?> Days</th> <?php endif;?>
           <?php if($_REQUEST['txtday5'] > 0):?>        <th><?php echo $_REQUEST['txtday5']; ?> Days</th> <?php endif;?>
      	</tr>
            <?php if($_REQUEST['txtqty1'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty1']; ?> pieces</th>


     <?php if($_REQUEST['txtday1'] > 0):?>  		<td align="center" > <input name="pr11" type="text"  id="pr11" size="5" value="<?php echo format_num($pr1); ?>"  /> </td> <?php endif;?>
        <?php if($_REQUEST['txtday2'] > 0):?>  		<td align="center"><input name="pr12" type="text"  id="pr12" size="5" value="<?php  echo format_num($pr2); ?>"  /></td><?php endif;?>
        <?php if($_REQUEST['txtday3'] > 0):?>  		<td align="center"><input name="pr13" type="text"  id="pr13" size="5" value="<?php echo format_num($pr3); ?>"  /></td><?php endif;?>
        <?php if($_REQUEST['txtday4'] > 0):?>  		<td align="center"><input name="pr14" type="text"  id="pr14" size="5" value="<?php  echo format_num($pr4); ?>" /></td> <?php endif;?>
         <?php if($_REQUEST['txtday5'] > 0):?>       <td align="center"><input name="pr15" type="text"  id="pr15" size="5" value="<?php  echo format_num($pr5); ?>"  /></td> <?php endif;?>
      	</tr>
      <?php endif;?>
      <?php if($_REQUEST['txtqty2'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty2']; ?> pieces</th>

       <?php if($_REQUEST['txtday1'] > 0):?>   		<td align="center"><input name="pr21" type="text"  id="pr21" size="5" value="<?php echo format_num($pr6); ?>"  /></td><?php endif;?>
      	  <?php if($_REQUEST['txtday2'] > 0):?>  	<td align="center"><input name="pr22" type="text"  id="pr22" size="5" value="<?php echo format_num($pr7); ?>"  /></td><?php endif;?>
      	  <?php if($_REQUEST['txtday3'] > 0):?>  	<td align="center"><input name="pr23" type="text"  id="pr23" size="5" value="<?php echo format_num($pr8); ?>"  /></td>  <?php endif;?>
              <?php if($_REQUEST['txtday4'] > 0):?>       <td align="center"><input name="pr24" type="text"  id="pr24" size="5" value="<?php  echo format_num($pr9); ?>"  /></td> <?php endif;?>
                <?php if($_REQUEST['txtday5'] > 0):?>      <td align="center"><input name="pr25" type="text"  id="pr25" size="5"  value="<?php  echo format_num($pr10); ?>" /></td> <?php endif;?>
      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty3'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty3']; ?> pieces</th>
      	  <?php if($_REQUEST['txtday1'] > 0):?>  	<td align="center"><input name="pr31" type="text"  id="pr31" size="5"  value="<?php echo format_num($pr11); ?>" /></td><?php endif;?>
      	  <?php if($_REQUEST['txtday2'] > 0):?>  	<td align="center"><input name="pr32" type="text"  id="pr32" size="5" value="<?php echo format_num($pr12); ?>"  /></td>  <?php endif;?>
               <?php if($_REQUEST['txtday3'] > 0):?>       <td align="center"><input name="pr33" type="text"  id="pr33" size="5" value="<?php echo format_num($pr13); ?>"  /></td><?php endif;?>
               <?php if($_REQUEST['txtday4'] > 0):?>       <td align="center"><input name="pr34" type="text"  id="pr34" size="5" value="<?php echo format_num($pr14); ?>" /></td> <?php endif;?>
               <?php if($_REQUEST['txtday5'] > 0):?>       <td align="center"><input name="pr35" type="text"  id="pr35" size="5" value="<?php echo format_num($pr15); ?>" /></td><?php endif;?>

      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty4'] > 0):?>
      	<tr>
      		<th><?php echo $_REQUEST['txtqty4'] ?> pieces</th>
      		  <?php if($_REQUEST['txtday1'] > 0):?>  <td align="center"><input name="pr41" type="text"  id="pr41" size="5" value="<?php echo format_num($pr16); ?>" /></td>   <?php endif;?>
                <?php if($_REQUEST['txtday2'] > 0):?>      <td align="center"><input name="pr42" type="text"  id="pr42" size="5" value="<?php echo format_num($pr17); ?>" /></td><?php endif;?>
                 <?php if($_REQUEST['txtday3'] > 0):?>     <td align="center"><input name="pr43" type="text"  id="pr43" size="5" value="<?php echo format_num($pr18); ?>" /></td><?php endif;?>
                 <?php if($_REQUEST['txtday4'] > 0):?>     <td align="center"><input name="pr44" type="text"  id="pr44" size="5" value="<?php echo format_num($pr19); ?>" /></td><?php endif;?>
                  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr45" type="text"  id="pr45" size="5" value="<?php echo format_num($pr20); ?>" /></td>  <?php endif;?>

      	</tr>
            <?php endif;?>
<?php if($_REQUEST['txtqty5'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty5'] ?> pieces</th>
                  <?php if($_REQUEST['txtday1'] > 0):?>    <td align="center"><input name="pr51" type="text"  id="pr51" size="5" value="<?php echo format_num($pr21); ?>" /></td> <?php endif;?>
                  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr52" type="text"  id="pr52" size="5" value="<?php echo format_num($pr22); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr53" type="text"  id="pr53" size="5" value="<?php echo format_num($pr23); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr54" type="text"  id="pr54" size="5" value="<?php echo format_num($pr24); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday5'] > 0):?>   <td align="center"><input name="pr55" type="text"  id="pr55" size="5" value="<?php echo format_num($pr25); ?>"  /></td>  <?php endif;?>

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty6'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty6'] ?> pieces</th>
                  <?php if($_REQUEST['txtday1'] > 0):?>    <td align="center"><input name="pr61" type="text"  id="pr61" size="5" value="<?php echo format_num($pr26); ?>"  /></td> <?php endif;?>
                   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr62" type="text"  id="pr62" size="5"  value="<?php echo format_num($pr27); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr63" type="text"  id="pr63" size="5" value="<?php echo format_num($pr28); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr64" type="text"  id="pr64" size="5" value="<?php echo format_num($pr29); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr65" type="text"  id="pr65" size="5" value="<?php echo format_num($pr30); ?>"  /></td> <?php endif;?>

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty7'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty7'] ?> pieces</th>
                   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr71" type="text"  id="pr71" size="5" value="<?php echo format_num($pr31); ?>"  /></td>  <?php endif;?>
                  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr72" type="text"  id="pr72" size="5" value="<?php echo format_num($pr32); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr73" type="text"  id="pr73" size="5" value="<?php echo format_num($pr33); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr74" type="text"  id="pr74" size="5" value="<?php echo format_num($pr34); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr75" type="text"  id="pr75" size="5" value="<?php echo format_num($pr35); ?>"  /></td>  <?php endif;?>

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty8'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty8'] ?> pieces</th>
                   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr81" type="text"  id="pr81" size="5" value="<?php echo format_num($pr36); ?>"  /></td>  <?php endif;?>
                   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr82" type="text"  id="pr82" size="5" value="<?php echo format_num($pr37); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr83" type="text"  id="pr83" size="5" value="<?php echo format_num($pr38); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr84" type="text"  id="pr84" size="5" value="<?php echo format_num($pr39); ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr85" type="text"  id="pr85" size="5" value="<?php echo format_num($pr40); ?>"  /></td> <?php endif;?>

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty9'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty9'] ?> pieces</th>
                   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr91" type="text"  id="pr91" size="5"  value="<?php echo format_num($pr41);  ?>"  /></td> <?php endif;?>
                  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr92" type="text"  id="pr92" size="5"   value="<?php echo format_num($pr42);  ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr93" type="text"  id="pr93" size="5"  value="<?php echo format_num($pr43);  ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr94" type="text"  id="pr94" size="5"  value="<?php echo format_num($pr44);  ?>"  /></td><?php endif;?>
                  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr95" type="text"  id="pr95" size="5"   value="<?php echo format_num($pr45);  ?>"  /></td>  <?php endif;?>

            </tr>
            <?php endif;?>
            <?php if($_REQUEST['txtqty10'] > 0):?>
            <tr>
                  <th><?php echo $_REQUEST['txtqty10'] ?> pieces</th>
                  <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr101" type="text"  id="pr101" size="5"  value="<?php echo format_num($pr46);  ?>"  /></td> <?php endif;?>
                   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr102" type="text"  id="pr102" size="5"  value="<?php echo format_num($pr47);  ?>"   /></td><?php endif;?>
                   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr103" type="text"  id="pr103" size="5"  value="<?php echo format_num($pr48);  ?>"   /></td><?php endif;?>
                   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr104" type="text"  id="pr104" size="5"   value="<?php echo format_num($pr49); ?>"  /></td><?php endif;?>
                   <?php if($_REQUEST['txtday5'] > 0):?>   <td align="center"><input name="pr105" type="text"  id="pr105" size="5"  value="<?php echo format_num($pr50);  ?>"   /></td> <?php endif;?>

            </tr>
            <?php endif;?>
      </table>