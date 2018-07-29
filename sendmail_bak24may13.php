<?php

/*echo $_POST['changes'];
exit(0);*/

require('../../luke-new/pdfclass/html2fpdf.php');

require_once('../../luke-new/admin/conn.php'); 

$path="/home/pareomic/public_html/pcbsglobal.com/luke-pdf/upload/";

$pdf=new HTML2FPDF();

$pdf->AddPage();



if(isset($_REQUEST['Submit']))

{
	
	if($_POST['nor']!="")

{

$nor=$_POST['nor'];

}


if($_REQUEST['chki1']!="")

{

$ipc_class=$_REQUEST['chki1'];

}

if($_REQUEST['chki2']!="")

{

$ipc_class=$_REQUEST['chki2'];

}

if($_REQUEST['chki3']!="")

{

$ipc_class=$_REQUEST['chki3'];

}

if($_REQUEST['chk1']!="")

{

$no_layer=$_REQUEST['chk1'];

}

if($_REQUEST['chk2']!="")

{

$no_layer=$_REQUEST['chk2'];

}

if($_REQUEST['chk3']!="")

{

$no_layer=$_REQUEST['chk3'];

}

if($_REQUEST['chk4']!="")

{

$no_layer=$_REQUEST['chk4'];

}

if($_REQUEST['chk5']!="")

{

$no_layer=$_REQUEST['chk5'];

}

if($_REQUEST['chk6']!="")

{

$no_layer=$_REQUEST['chk6'];

}

if($_REQUEST['txtother1']!="")

{

$no_layer=$_REQUEST['txtother1'];

}

if($_REQUEST['chk7']!="")

{

$m_require=$_REQUEST['chk7'];

}

if($_REQUEST['chk8']!="")

{

$m_require=$_REQUEST['chk8'];

}

if($_REQUEST['chk9']!="")

{

$m_require=$_REQUEST['chk9'];

}

if($_REQUEST['txtother2']!="")

{

$m_require=$_REQUEST['txtother2'];

}

if($_REQUEST['chk18']!="")

{

$inner_copper=$_REQUEST['chk18'];

}

if($_REQUEST['chk19']!="")

{

$inner_copper=$_REQUEST['chk19'];

}

if($_REQUEST['chk20']!="")

{

$inner_copper=$_REQUEST['chk20'];

}

if($_REQUEST['chk21']!="")

{

$inner_copper=$_REQUEST['chk21'];

}

if($_REQUEST['txtother6']!="")

{

$inner_copper=$_REQUEST['txtother6'];

}

if($_REQUEST['chk13']!="")

{

$thick_ness=$_REQUEST['chk13'];

}

if($_REQUEST['chk14']!="")

{

$thick_ness=$_REQUEST['chk14'];

}

if($_REQUEST['chk15']!="")

{

$thick_ness=$_REQUEST['chk15'];

}

if($_REQUEST['txtother4']!="")

{

$thick_ness=$_REQUEST['txtother4'];

}

if($_REQUEST['chk17']!="")

{

$thick_tole=$_REQUEST['chk17'];

}

if($_REQUEST['txtother5']!="")

{

$thick_tole=$_REQUEST['txtother5'];

}

if($_REQUEST['chk10']!="")

{

$start_cu=$_REQUEST['chk10'];

}

if($_REQUEST['chk11']!="")

{

$start_cu=$_REQUEST['chk11'];

}

if($_REQUEST['chk12']!="")

{

$start_cu=$_REQUEST['chk12'];

}

if($_REQUEST['txtother3']!="")

{

$start_cu=$_REQUEST['txtother3'];

}

if($_REQUEST['chk22']!="")

{

$plated_cu=$_REQUEST['chk22'];

}

if($_REQUEST['chk23']!="")

{

$plated_cu=$_REQUEST['chk23'];

}

if($_REQUEST['chk24']!="")

{

$plated_cu=$_REQUEST['chk24'];

}

if($_REQUEST['txtother7']!="")

{

$plated_cu=$_REQUEST['txtother7'];

}

if($_REQUEST['chk25']!="")

{

$fingers_gold=$_REQUEST['chk25'];

}

if($_REQUEST['chk26']!="")

{

$fingers_gold=$_REQUEST['chk26'];

}

if($_REQUEST['chk27']!="")

{

$trace_min=$_REQUEST['chk27'];

}

if($_REQUEST['chk28']!="")

{

$trace_min=$_REQUEST['chk28'];

}

if($_REQUEST['chk29']!="")

{

$trace_min=$_REQUEST['chk29'];

}

if($_REQUEST['chk30']!="")

{

$trace_min=$_REQUEST['chk30'];

}

if($_REQUEST['chk31']!="")

{

$space_min=$_REQUEST['chk31'];

}

if($_REQUEST['chk32']!="")

{

$space_min=$_REQUEST['chk32'];

}

if($_REQUEST['chk33']!="")

{

$space_min=$_REQUEST['chk33'];

}

if($_REQUEST['chk34']!="")

{

$space_min=$_REQUEST['chk34'];

}

if($_REQUEST['chk35']!="")

{

$con_impe1=$_REQUEST['chk35'];

}

if($_REQUEST['chk36']!="")

{

$con_impe1=$_REQUEST['chk36'];

}

if($_REQUEST['chk109']!="")

{

$con_impe_sing=$_REQUEST['chk109'];

}

if($_REQUEST['chk110']!="")

{

$con_impe_diff=$_REQUEST['chk110'];

}

if($_REQUEST['chk202']!="")

{

$tore_impe=$_REQUEST['chk202'];

}

if($_REQUEST['txtother51']!="")

{

$tore_impe=$_REQUEST['txtother51'];

}

if($_REQUEST['txtother8']!="")

{

$hole_size=$_REQUEST['txtother8'];

}

if($_REQUEST['txtother19']!="")

{

$pad=$_REQUEST['txtother19'];

}

if($_REQUEST['chk37']!="")

{

$blind=$_REQUEST['chk37'];

}

if($_REQUEST['chk38']!="")

{

$blind=$_REQUEST['chk38'];

}

if($_REQUEST['chk39']!="")

{

$buried=$_REQUEST['chk39'];

}

if($_REQUEST['chk40']!="")

{

$buried=$_REQUEST['chk40'];

}

if($_REQUEST['chk41']!="")

{

$bb_both=$_REQUEST['chk41'];

}

if($_REQUEST['chk42']!="")

{

$bb_both=$_REQUEST['chk42'];

}

if($_REQUEST['chk200']!="")

{

$hdi_design=$_REQUEST['chk200'];

}

if($_REQUEST['chk201']!="")

{

$hdi_design=$_REQUEST['chk201'];

}

if($_REQUEST['chk43']!="")

{

$finish=$_REQUEST['chk43'];

}

if($_REQUEST['chk44']!="")

{

$finish=$_REQUEST['chk44'];

}

if($_REQUEST['chk45']!="")

{

$finish=$_REQUEST['chk45'];

}

if($_REQUEST['chk46']!="")

{

$finish=$_REQUEST['chk46'];

}

if($_REQUEST['chk47']!="")

{

$finish=$_REQUEST['chk47'];

}

if($_REQUEST['txtother9']!="")

{

$finish=$_REQUEST['txtother9'];

}

if($_REQUEST['chk48']!="")

{

$mask_size=$_REQUEST['chk48'];

}

if($_REQUEST['chk49']!="")

{

$mask_size=$_REQUEST['chk49'];

}

if($_REQUEST['chk50']!="")

{

$mask_size=$_REQUEST['chk50'];

}

if($_REQUEST['chk51']!="")

{

$color=$_REQUEST['chk51'];

}

if($_REQUEST['chk52']!="")

{

$color=$_REQUEST['chk52'];

}

if($_REQUEST['txtother10']!="")

{

$color=$_REQUEST['txtother10'];

}

if($_REQUEST['chk53']!="")

{

$mask_type=$_REQUEST['chk53'];

}

if($_REQUEST['chk54']!="")

{

$mask_type=$_REQUEST['chk54'];

}

if($_REQUEST['chk55']!="")

{

$ss_side=$_REQUEST['chk55'];

}

if($_REQUEST['chk56']!="")

{

$ss_side=$_REQUEST['chk56'];

}

if($_REQUEST['chk57']!="")

{

$ss_side=$_REQUEST['chk57'];

}

if($_REQUEST['chk58']!="")

{

$ss_color=$_REQUEST['chk58'];

}

if($_REQUEST['chk59']!="")

{

$ss_color=$_REQUEST['chk59'];

}

if($_REQUEST['chk60']!="")

{

$ss_color=$_REQUEST['chk60'];

}

if($_REQUEST['txtother11']!="")

{

$ss_color=$_REQUEST['txtother11'];

}

if($_REQUEST['chk61']!="")

{

$route=$_REQUEST['chk61'];

}

if($_REQUEST['chk62']!="")

{

$route=$_REQUEST['chk62'];

}

if($_REQUEST['txtother12']!="")

{

$b_size1=$_REQUEST['txtother12'];

}

if($_REQUEST['txtother13']!="")

{

$b_size2=$_REQUEST['txtother13'];

}

if($_REQUEST['chk63']!="")

{

$array=$_REQUEST['chk63'];

}

if($_REQUEST['chk64']!="")

{

$array=$_REQUEST['chk64'];

}

if($_REQUEST['txtother14']!="")

{

$b_per_array=$_REQUEST['txtother14'];

}

if($_REQUEST['txtother15']!="")

{

$array_size1=$_REQUEST['txtother15'];

}

if($_REQUEST['txtother16']!="")

{

$array_size2=$_REQUEST['txtother16'];

}

if($_REQUEST['chk204']!="")

{

$route_tole=$_REQUEST['chk204'];

}

if($_REQUEST['txtother52']!="")

{

$route_tole=$_REQUEST['txtother52'];

}

if($_REQUEST['chk65']!="")

{

$array_design=$_REQUEST['chk65'];

}

if($_REQUEST['chk66']!="")

{

$array_design=$_REQUEST['chk66'];

}

if($_REQUEST['chk67']!="")

{

$design_array=$_REQUEST['chk67'];

}

if($_REQUEST['chk68']!="")

{

$design_array=$_REQUEST['chk68'];

}

if($_REQUEST['chk69']!="")

{

$array_type1=$_REQUEST['chk69'];

}

if($_REQUEST['chk70']!="")

{

$array_type2=$_REQUEST['chk70'];

}

if($_REQUEST['chk71']!="")

{

$array_type3=$_REQUEST['chk71'];

}

if($_REQUEST['chk72']!="")

{

$array_require1=$_REQUEST['chk72'];

}

if($_REQUEST['chk73']!="")

{

$array_require2=$_REQUEST['chk73'];

}

if($_REQUEST['chk74']!="")

{

$array_require3=$_REQUEST['chk74'];

}

if($_REQUEST['chk75']!="")

{

$bevel=$_REQUEST['chk75'];

}

if($_REQUEST['chk76']!="")

{

$bevel=$_REQUEST['chk76'];

}

if($_REQUEST['chk77']!="")

{

$counter_sink=$_REQUEST['chk77'];

}

if($_REQUEST['chk78']!="")

{

$counter_sink=$_REQUEST['chk78'];

}

if($_REQUEST['chk79']!="")

{

$cut_outs=$_REQUEST['chk79'];

}

if($_REQUEST['chk80']!="")

{

$cut_outs=$_REQUEST['chk80'];

}

if($_REQUEST['chk81']!="")

{

$slots=$_REQUEST['chk81'];

}

if($_REQUEST['chk82']!="")

{

$slots=$_REQUEST['chk82'];

}

if($_REQUEST['chk83']!="")

{

$logo=$_REQUEST['chk83'];

}

if($_REQUEST['chk84']!="")

{

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="")

{

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="")

{

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="")

{

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk84']!="")

{

$logo=$_REQUEST['chk84'];

}

if($_REQUEST['chk85']!="")

{

$mark=$_REQUEST['chk85'];

}

if($_REQUEST['chk86']!="")

{

$mark=$_REQUEST['chk86'];

}

if($_REQUEST['chk87']!="")

{

$date_code=$_REQUEST['chk87'];

}

if($_REQUEST['chk88']!="")

{

$date_code=$_REQUEST['chk88'];

}

if($_REQUEST['chk89']!="")

{

$date_code=$_REQUEST['chk89'];

}

if($_REQUEST['txtother17']!="")

{

$other_marking=$_REQUEST['txtother17'];

}

if($_REQUEST['chk90']!="")

{

$micro_s=$_REQUEST['chk90'];

}

if($_REQUEST['chk91']!="")

{

$micro_s=$_REQUEST['chk91'];

}

if($_REQUEST['new']!="")

{

$temp=$_REQUEST['new'];

}

if($_REQUEST['rep']!="")

{

$temp=$_REQUEST['rep'];

}









if($_REQUEST['chk92']!="")

{

$test_stamp=$_REQUEST['chk92'];

}

if($_REQUEST['chk93']!="")

{

$test_stamp=$_REQUEST['chk93'];

}

if($_REQUEST['chk94']!="")

{

$in_board=$_REQUEST['chk94'];

}

if($_REQUEST['chk199']!="")

{

$array_rail=$_REQUEST['chk199'];

}

if($_REQUEST['chk95']!="")

{

$xouts=$_REQUEST['chk95'];

}

if($_REQUEST['chk96']!="")

{

$xouts=$_REQUEST['chk96'];

}

if($_REQUEST['textfield28']!="")

{

$xouts1=$_REQUEST['textfield28'];

}

if($_REQUEST['chk97']!="")

{

$rosh=$_REQUEST['chk97'];

}

if($_REQUEST['chk98']!="")

{

$rosh=$_REQUEST['chk98'];

}

////

$bprice=2;

$leadtm=$_REQUEST['txtday1'];

if($leadtm==7)

{

$d1=$bprice;

}

if($leadtm==1)

{

$d1=$bprice+($bprice*(200/100));

}

if($leadtm==2)

{

$d1=$bprice+($bprice*(200/100));

}

if($leadtm==3)

{

$d1=$bprice+($bprice*(100/100));

}

if($leadtm==4)

{

$d1=$bprice+($bprice*(50/100));

}

//=== 2

$leadtm=$_REQUEST['txtday2'];

if($leadtm==7)

{

$d2=$bprice;

}

if($leadtm==1)

{

$d2=$bprice+($bprice*(200/100));

}

if($leadtm==2)

{

$d2=$bprice+($bprice*(200/100));

}

if($leadtm==3)

{

$d2=$bprice+($bprice*(100/100));

}

if($leadtm==4)

{

$d2=$bprice+($bprice*(50/100));

}



//====3 =====

$leadtm=$_REQUEST['txtday3'];

if($leadtm==7)

{

$d3=$bprice;

}

if($leadtm==1)

{

$d3=$bprice+($bprice*(200/100));

}

if($leadtm==2)

{

$d3=$bprice+($bprice*(200/100));

}

if($leadtm==3)

{

$d3=$bprice+($bprice*(100/100));

}

if($leadtm==4)

{

$d3=$bprice+($bprice*(50/100));

}

// 4 



$leadtm=$_REQUEST['txtday4'];

if($leadtm==7)

{

$d4=$bprice;

}

if($leadtm==1)

{

$d4=$bprice+($bprice*(200/100));

}

if($leadtm==2)

{

$d4=$bprice+($bprice*(200/100));

}

if($leadtm==3)

{

$d4=$bprice+($bprice*(100/100));

}

if($leadtm==4)

{

$d4=$bprice+($bprice*(50/100));

}

// end of day



$qnt1=$_REQUEST['txtqty1'];

if($qnt1>=250)

{

$q1=$bprice;

}

if($qnt1==100)

{

$q1=$bprice+($bprice*(5/100));

}

if($qnt1==50)

{

$q1=$bprice+($bprice*(20/100));

}

if($qnt1==10)

{

$q1=$bprice+($bprice*(50/100));

}

// 2

$qnt2=$_REQUEST['txtqty2'];

if($qnt2>=250)

{

$q2=$bprice;

}

if($qnt2==100)

{

$q2=$bprice+($bprice*(5/100));

}

if($qnt2==50)

{

$q2=$bprice+($bprice*(20/100));

}

if($qnt2==10)

{

$q2=$bprice+($bprice*(50/100));

}

//3

$qnt3=$_REQUEST['txtqty3'];

if($qnt3>=250)

{

$q3=$bprice;

}

if($qnt3==100)

{

$q3=$bprice+($bprice*(5/100));

}

if($qnt3==50)

{

$q3=$bprice+($bprice*(20/100));

}

if($qnt2==10)

{

$q3=$bprice+($bprice*(50/100));

}

// 4

$qnt4=$_REQUEST['txtqty4'];

if($qnt4>=250)

{

$q4=$bprice;

}

if($qnt4==100)

{

$q4=$bprice+($bprice*(5/100));

}

if($qnt4==50)

{

$q4=$bprice+($bprice*(20/100));

}

if($qnt4==10)

{

$q4=$bprice+($bprice*(50/100));

}





if($no_layer=='single')

{

$p3=$bprice;

}

if($no_layer=='Double Sided')

{

$p3=$bprice+($bprice*(10/100));

}

if($no_layer=='4Lyr')

{

$p3=$bprice+($bprice*(50/100));

}

if($no_layer=='6Lyr')

{

$p3=$bprice+($bprice*(100/100));

}

if($no_layer=='8Lyr')

{

$p3=$bprice+($bprice*(150/100));

}

if($no_layer=='10Lyr')

{

$p3=$bprice+($bprice*(200/100));

}

if($m_require=='FR-4')

{

$p4=$bprice;

}

if($m_require=='FR-4/170TG Min')

{

$p4=$bprice+($bprice*(10/100));

}

if($m_require=='Rogers 4003')

{

$p4=$bprice+($bprice*(50/100));

}

if($con_impe_sing=='Single')

{

$p5=$bprice+($bprice*(10/100));

}

if($con_impe_diff=='Differential')

{

$p5=$bprice+($bprice*(150/100));

}

if($blind=='yes')

{

$p6=$bprice+($bprice*(15/100));

}

if($buried=='yes')

{

$p7=$bprice+($bprice*(15/100));

}

if($bb_both=='yes')

{

$p8=$bprice+($bprice*(25/100));

}

if($finish!='HASL')

{

$p9=$bprice+($bprice*(5/100));

}

if($finish=='HASL')

{

$p10=$bprice;

}

if($bevel=='yes')

{

$p11=$bprice+($bprice*(2/100));

}

if($countersink=='yes')

{

$p12=$bprice+($bprice*(2/100));

}

if($cut_outs=='yes')

{

$p13=$bprice+($bprice*(2/100));

}

if($slots=='yes')

{

$p14=$bprice+($bprice*(2/100));

}

if($xouts=='yes')

{

$p14=$bprice+($bprice*(20/100));

}

$price=$d1+$d2+$d3+$d4+$q1+$q2+$q3+$q4;



$qty5 = $_REQUEST['txtqty5'];

$qty6 = $_REQUEST['txtqty6'];

$qty7 = $_REQUEST['txtqty7'];

$qty8 = $_REQUEST['txtqty8'];

$qty9 = $_REQUEST['txtqty9'];

$qty10 = $_REQUEST['txtqty10'];



$day5 = $_REQUEST['txtday5'];


$pr11 =  $_REQUEST['pr11'];
$pr12 =  $_REQUEST['pr12'];
$pr13 =  $_REQUEST['pr13'];
$pr14 =  $_REQUEST['pr14'];
$pr15 =  $_REQUEST['pr15'];

$pr21 =  $_REQUEST['pr21'];
$pr22 =  $_REQUEST['pr22'];
$pr23 =  $_REQUEST['pr23'];
$pr24 =  $_REQUEST['pr24'];
$pr25 =  $_REQUEST['pr25'];

$pr31 =  $_REQUEST['pr31'];
$pr32 =  $_REQUEST['pr32'];
$pr33 =  $_REQUEST['pr33'];
$pr34 =  $_REQUEST['pr34'];
$pr35 =  $_REQUEST['pr35'];

$pr41 =  $_REQUEST['pr41'];
$pr42 =  $_REQUEST['pr42'];
$pr43 =  $_REQUEST['pr43'];
$pr44 =  $_REQUEST['pr44'];
$pr45 =  $_REQUEST['pr45'];

$pr51 =  $_REQUEST['pr51'];
$pr52 =  $_REQUEST['pr52'];
$pr53 =  $_REQUEST['pr53'];
$pr54 =  $_REQUEST['pr54'];
$pr55 =  $_REQUEST['pr55'];

$pr61 =  $_REQUEST['pr61'];
$pr62 =  $_REQUEST['pr62'];
$pr63 =  $_REQUEST['pr63'];
$pr64 =  $_REQUEST['pr64'];
$pr65 =  $_REQUEST['pr65'];

$pr71 =  $_REQUEST['pr71'];
$pr72 =  $_REQUEST['pr72'];
$pr73 =  $_REQUEST['pr73'];
$pr74 =  $_REQUEST['pr74'];
$pr75 =  $_REQUEST['pr75'];

$pr81 =  $_REQUEST['pr81'];
$pr82 =  $_REQUEST['pr82'];
$pr83 =  $_REQUEST['pr83'];
$pr84 =  $_REQUEST['pr84'];
$pr85 =  $_REQUEST['pr85'];


$pr91 =  $_REQUEST['pr91'];
$pr92 =  $_REQUEST['pr92'];
$pr93 =  $_REQUEST['pr93'];
$pr94 =  $_REQUEST['pr94'];
$pr95 =  $_REQUEST['pr95'];


$pr101 =  $_REQUEST['pr101'];
$pr102 =  $_REQUEST['pr102'];
$pr103 =  $_REQUEST['pr103'];
$pr104 =  $_REQUEST['pr104'];
$pr105 =  $_REQUEST['pr105'];



$str3 = $_REQUEST['txtcust'];
$arr = explode("+", $str3);
$txtcust = $arr[1];

$str4 = $_REQUEST['txtreq'];
$arr = explode("**", $str4);
$txtreq = $arr[2];




//echo $nor;

///

//$price=$_REQUEST['txtprice1']+$_REQUEST['txtprice2']+$_REQUEST['txtprice3']+$_REQUEST['txtprice4'];

if ($nor=='Repeat With Change'){




$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,necharge,descharge,special_inst,special_instadmin,	is_spinsadmact,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe_sing,con_impe_diff,tore_impe,hole_size,pad,blind,buried,bb_both,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type1,array_type2,array_type3,array_require1,array_require2,array_require3,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4,con_impe1,day5,qty5,qty6,qty7,qty8,qty9,qty10,new_or_rep,changes,
pr11,pr12,pr13,pr14,pr15,pr21,pr22,pr23,pr24,pr25,pr31,pr32,pr33,pr34,pr35,pr41,pr42,pr43,pr44,pr45,pr51,pr52,pr53,pr54,pr55,pr61,pr62,pr63,pr64,pr65,pr71,pr72,pr73,pr74,pr75,pr81,pr82,pr83,pr84,pr85,pr91,pr92,pr93,pr94,pr95,pr101,pr102,pr103,pr104,pr105,descharge1,descharge2) values('".$txtcust."','".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" .$_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','" .$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$bb_both."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_type3."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$_POST['nor']."','".$_POST['changes']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."','".$pr103 ."','".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."','".$_REQUEST['descharge2']."')";

/*echo $sqin;
exit(0);*/
$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data'.mysql_error());

}

 }
else if ($nor=='New Part'){




$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,necharge,descharge,special_inst,special_instadmin,	is_spinsadmact,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe_sing,con_impe_diff,tore_impe,hole_size,pad,blind,buried,bb_both,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type1,array_type2,array_type3,array_require1,array_require2,array_require3,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4,con_impe1,day5,qty5,qty6,qty7,qty8,qty9,qty10,new_or_rep,
pr11,pr12,pr13,pr14,pr15,pr21,pr22,pr23,pr24,pr25,pr31,pr32,pr33,pr34,pr35,pr41,pr42,pr43,pr44,pr45,pr51,pr52,pr53,pr54,pr55,pr61,pr62,pr63,pr64,pr65,pr71,pr72,pr73,pr74,pr75,pr81,pr82,pr83,pr84,pr85,pr91,pr92,pr93,pr94,pr95,pr101,pr102,pr103,pr104,pr105,descharge1,descharge2) values('".$txtcust."','".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" . $_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','" .$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$bb_both."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_type3."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$_POST['nor']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."','".$pr103 ."','".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."','".$_REQUEST['descharge2']."'
)";

/*echo $sqin;
exit(0);*/
$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data'.mysql_error());

}

 }
else if ($nor=='Repeat Order'){

$sqin="update order_tb set cust_name='".$txtcust."',part_no='".$_REQUEST['txtpno']."',rev='".$_REQUEST['txtrev']."',req_by='".$txtreq."',

		email='".$_REQUEST['txtemail']."',phone='".$_REQUEST['txtphone']."',fax='".$_REQUEST['txtfax']."',qnt='".$_REQUEST['txtqnt']."',

		lead_times='".$_REQUEST['txtlead']."',quote_by='".$_REQUEST['txtquote']."',necharge='" . $_REQUEST['necharge'] ."',descharge='". $_REQUEST['descharge'] . "',special_inst='".$_REQUEST['txtinst']."',

		ipc_class='".$ipc_class."',no_layer='".$no_layer."',m_require='".$m_require."',thickness='".$thick_ness."',

		thickness_tole='".$thick_tole."',inner_copper='".$inner_copper."',start_cu='".$start_cu."',plated_cu='".$plated_cu."',

		fingers_gold='".$fingers_gold."',trace_min='".$trace_min."',space_min='".$space_min."',con_impe_sing='".$con_impe_sing."',con_impe_diff='".$con_impe_diff."',

		tore_impe='".$tore_impe."',hole_size='".$hole_size."',pad='".$pad."',blind='".$blind."',buried='".$buried."',bb_both='".$bb_both."',

		hdi_design='".$hdi_design."',finish='".$finish."',mask_size='".$mask_size."',mask_type='".$mask_type."',color='".$color."',ss_side='".$ss_side."',

		ss_color='".$ss_color."',route='".$route."',board_size1='".$b_size1."',board_size2='".$b_size2."',array='".$array."',b_per_array='".$b_per_array."',

		array_size1='".$array_size1."',array_size2='".$array_size2."',route_tole='".$route_tole."',array_design='".$array_design."',

		design_array='".$design_array."',array_type1='".$array_type1."',array_type2='".$array_type2."',array_type3='".$array_type3."',array_require1='".$array_require1."',array_require2='".$array_require2."',array_require3='".$array_require3."',bevel='".$bevel."',counter_sink='".$counter_sink."',

		cut_outs='".$cut_outs."',slots='".$slots."',logo='".$logo."',mark='".$mark."',date_code='".$date_code."',other_marking='".$other_marking."',

		micro_section='".$micro_s."',test_stamp='".$test_stamp."',in_board='".$in_board."',array_rail='".$array_rail."',xouts='".$xouts."',

		xouts1='".$xouts1."',rosh_cert='".$rosh."',price='".$price."',per1='".$_REQUEST['per1']."',per2='".$_REQUEST['per2']."',

		per3='".$_REQUEST['per3']."',per4='".$_REQUEST['per4']."',per5='".$_REQUEST['per5']."',per6='".$_REQUEST['per6']."',

		per7='".$_REQUEST['per7']."',per8='".$_REQUEST['per8']."',per9='".$_REQUEST['per9']."',per10='".$_REQUEST['per10']."',

		per11='".$_REQUEST['per11']."',per12='".$_REQUEST['per12']."',per13='".$_REQUEST['per13']."',per14='".$_REQUEST['per14']."',

		qty1='".$_REQUEST['txtqty1']."',qty2='".$_REQUEST['txtqty2']."',qty3='".$_REQUEST['txtqty3']."',qty4='".$_REQUEST['txtqty4']."',qty5='".$_REQUEST['txtqty5']."',

		qty6='".$_REQUEST['txtqty6']."',qty7='".$_REQUEST['txtqty7']."',qty8='".$_REQUEST['txtqty8']."',qty9='".$_REQUEST['txtqty9']."',qty10='".$_REQUEST['txtqty10']."',

		day1='".$_REQUEST['txtday1']."',day2='".$_REQUEST['txtday2']."',day3='".$_REQUEST['txtday3']."',day4='".$_REQUEST['txtday4']."',day5='".$_REQUEST['txtday5']."',

		con_impe1='".$con_impe1. "',new_or_rep='".$_POST['nor']. "',necharge='".$_REQUEST['necharge']. "',descharge='".$_REQUEST['descharge'].

        "',pr11='".$_REQUEST['pr11']. "',pr12='".$_REQUEST['pr12']. "',pr13='".$_REQUEST['pr13']. "',pr14='".$_REQUEST['pr14']. "',pr15='".$_REQUEST['pr15']

		. "',pr21='".$_REQUEST['pr21']. "',pr22='".$_REQUEST['pr22']. "',pr23='".$_REQUEST['pr23']. "',pr24='".$_REQUEST['pr24']. "',pr25='".$_REQUEST['pr25']

		. "',pr31='".$_REQUEST['pr31']. "',pr32='".$_REQUEST['pr32']. "',pr33='".$_REQUEST['pr33']. "',pr34='".$_REQUEST['pr34']. "',pr35='".$_REQUEST['pr35']

		. "',pr41='".$_REQUEST['pr41']. "',pr42='".$_REQUEST['pr42']. "',pr43='".$_REQUEST['pr43']. "',pr44='".$_REQUEST['pr44']. "',pr45='".$_REQUEST['pr45']

		. "',pr51='".$_REQUEST['pr51']. "',pr52='".$_REQUEST['pr52']. "',pr53='".$_REQUEST['pr53']. "',pr54='".$_REQUEST['pr54']. "',pr55='".$_REQUEST['pr55']

		. "',pr61='".$_REQUEST['pr61']. "',pr62='".$_REQUEST['pr62']. "',pr63='".$_REQUEST['pr63']. "',pr64='".$_REQUEST['pr64']. "',pr65='".$_REQUEST['pr65']

		. "',pr71='".$_REQUEST['pr71']. "',pr72='".$_REQUEST['pr72']. "',pr73='".$_REQUEST['pr73']. "',pr74='".$_REQUEST['pr74']. "',pr75='".$_REQUEST['pr75']

		. "',pr81='".$_REQUEST['pr81']. "',pr82='".$_REQUEST['pr82']. "',pr83='".$_REQUEST['pr83']. "',pr84='".$_REQUEST['pr84']. "',pr85='".$_REQUEST['pr85']

		. "',pr91='".$_REQUEST['pr91']. "',pr92='".$_REQUEST['pr92']. "',pr93='".$_REQUEST['pr93']. "',pr94='".$_REQUEST['pr94']. "',pr95='".$_REQUEST['pr95']

		. "',pr101='".$_REQUEST['pr101']. "',pr102='".$_REQUEST['pr102']. "',pr103='".$_REQUEST['pr103']. "',pr104='".$_REQUEST['pr104']. "',pr105='".$_REQUEST['pr105'] .



        "',descharge1='".$_REQUEST['descharge1']."',descharge2='".$_REQUEST['descharge2']."' where ord_id='".$_REQUEST['id']."'";

//$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,special_inst,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe,tore_impe,hole_size,pad,blind,buried,bb_both,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type,array_require,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,in_board,array_rail,xouts,xouts1,rosh_cert,price,ord_date) values('".$txtcust."','".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','".$_REQUEST['txtinst']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$bb_both."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type."','".$array_require."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".$price."','".date('m/d/Y')."')";

/*echo $sqin;
exit(0);*/
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data'.mysql_error());
}

 }

else 
{
	
if($_POST['nor1']!="")
{
$nor=$_POST['nor1'];
}




$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,necharge,descharge,special_inst,special_instadmin,	is_spinsadmact,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe_sing,con_impe_diff,tore_impe,hole_size,pad,blind,buried,bb_both,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type1,array_type2,array_type3,array_require1,array_require2,array_require3,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4,con_impe1,day5,qty5,qty6,qty7,qty8,qty9,qty10,new_or_rep,cpo,opo,
pr11,pr12,pr13,pr14,pr15,pr21,pr22,pr23,pr24,pr25,pr31,pr32,pr33,pr34,pr35,pr41,pr42,pr43,pr44,pr45,pr51,pr52,pr53,pr54,pr55,pr61,pr62,pr63,pr64,pr65,pr71,pr72,pr73,pr74,pr75,pr81,pr82,pr83,pr84,pr85,pr91,pr92,pr93,pr94,pr95,pr101,pr102,pr103,pr104,pr105,descharge1,descharge2,desdesc,desdesc1,desdesc2) values('".$txtcust."','".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" . $_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','".$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$bb_both."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_type3."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$nor."','".$_POST['cpo']."','".$_POST['opo']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."','".$pr103 ."','".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."','".$_REQUEST['descharge2']."','".$_REQUEST['desdesc']."','".$_REQUEST['desdesc1']."','".$_REQUEST['desdesc2']."')";
//echo $sqin;
/*echo $sqin;
exit(0);*/
$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data'.mysql_error());

}

 
	
	
	
/*echo '$sqin#';
exit(0);*/
}
//header('location:thanks.php');

}




//extract($_POST);

$message  ="<table width=820 border=1 align=center cellpadding=1 cellspacing=1 bordercolor=#e6e6e6>

  <tr>

    <td height=30 bgcolor=#0099CC colspan=3 align=center><span class=style1>Online Request For Quote Form</span></td>

  </tr>

  <tr>

    <td width=296 height=30><strong>Customer: </strong>

        <label>

    $_REQUEST[txtcust]    </label></td>

    <td width=288><strong>Part Number: </strong>$_REQUEST[txtpno] </td>

    <td width=218><strong>Rev: </strong>$_REQUEST[txtrev] ".$nor."   </td>

  </tr>

  <tr>

    <td height=30><strong>Requested By: </strong>$_REQUEST[txtreq] </td>

    <td height=30><strong>Email: </strong>$_REQUEST[txtemail]    </td>

    <td><strong>Phone: </strong>$_REQUEST[txtphone]    </td>

  </tr>

  <tr>

    <td width=296 height=30 colspan=3><strong>FAX: </strong>$_REQUEST[txtfax]

	<strong>Quote By: </strong>$_REQUEST[txtquote]</td>

  </tr>

  

  <tr>

    <td height=30 colspan=3><strong>Quantities:   </strong>$_REQUEST[txtqty1],    &nbsp;$_REQUEST[txtqty2],    &nbsp;$_REQUEST[txtqty3],    &nbsp;$_REQUEST[txtqty4],    &nbsp;$_REQUEST[txtqty5],    &nbsp;$_REQUEST[txtqty6],    &nbsp;$_REQUEST[txtqty7],    &nbsp;$_REQUEST[txtqty8],    &nbsp;$_REQUEST[txtqty9],    &nbsp;$_REQUEST[txtqty10]<strong><br>

        <br>

    Lead Times:   </strong>$_REQUEST[txtday1],    &nbsp;$_REQUEST[txtday2],    &nbsp;$_REQUEST[txtday3],    &nbsp;$_REQUEST[txtday4],    &nbsp;$_REQUEST[txtday5]</td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC colspan=3><strong>SPECIAL INSTRUCTIONS: </strong></td>

  </tr>

  <tr>

    <td height=30 colspan=3><label>$_REQUEST[txtinst] </label></td>

  </tr>

  

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Layer Count: </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Material: </strong></td>

    <td height=30 bgcolor=#0099CC><p><strong>IPC Class: </strong> $_REQUEST[chki1]

      $_REQUEST[chki2]

      

  $_REQUEST[chki3] </td>

  </tr>

  <tr>

    <td height=30>

      $_REQUEST[chk1]

        

        $_REQUEST[chk2]

   

    <strong><br />



        &nbsp;$_REQUEST[chk4]

          

        &nbsp;$_REQUEST[chk5]

        

        $_REQUEST[chk6]

        <br />

        <br />

        $_REQUEST[chk99]

        $_REQUEST[txtother1]    </td>

    <td height=30> $_REQUEST[chk7]

      

      $_REQUEST[chk8]

      <br />

      $_REQUEST[chk9]



        $_REQUEST[txtother2]

        

      <br />

      <strong>Inner Copper Oz: </strong>$_REQUEST[chk18]

        

        

        

        $_REQUEST[chk19]

        

        

        

        $_REQUEST[chk20] <br /></td>

    <td height=30 valign=top><strong>Thickness:</strong> 

      $_REQUEST[chk13]

        

      

      $_REQUEST[chk14] 

      

      $_REQUEST[chk15]<br>

      $_REQUEST[chk108] $_REQUEST[txtother4]

        

      <br />

      <strong>Thickness Tolerance :</strong> 

      $_REQUEST[chk17]

        

      

      $_REQUEST[chk102]

      

        $_REQUEST[txtother5]      <br />

        <br /></td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Plate : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Design Type/Requirements : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Design Technology : </strong></td>

  </tr>

  <tr>

    <td height=30><p><strong>Start Cu Oz:</strong> $_REQUEST[chk10]

        

      $_REQUEST[chk11]

        

      

       

      $_REQUEST[chk12]

        

   

      $_REQUEST[chk100]$_REQUEST[txtother3]<br />

      <br />

        $_REQUEST[chk21]

        

        

        $_REQUEST[chk102] $_REQUEST[txtother6]

        

        <br />

        <strong>Plated Cu in Holes (Min.):</strong> $_REQUEST[chk22]

        

        

        <br>

        $_REQUEST[chk23]<br>

        $_REQUEST[chk24]<br>

        $_REQUEST[chk106]

        

        

        $_REQUEST[txtother7]

        

        <strong>Fingers Nickel/Hard Gold: </strong>$_REQUEST[chk25]

        

        

        <br>

        $_REQUEST[chk26]

        

        

        <br />

      </p>    </td>

    <td height=30 valign=top><strong>Trace Min. </strong>

      $_REQUEST[chk27]

        

      

      $_REQUEST[chk28]

        

      

        

      $_REQUEST[chk29]

        

      

    

      $_REQUEST[chk30]

        

      

    <br />

      <br />

      <strong>Space Min. </strong>

      $_REQUEST[chk31]

      $_REQUEST[chk32]



        

    

      $_REQUEST[chk33]

        

      

      $_REQUEST[chk34]

        

      

      <br />

      <br />

      <strong>Controlled Impedance:</strong>

      $_REQUEST[chk35]

        

      

      $_REQUEST[chk36]      <br />

$_REQUEST[chk109] <br />

$_REQUEST[chk110] <br />

<strong>Impedance Tolerance :</strong> 

      $_REQUEST[chk202]

      $_REQUEST[chk203]

      $_REQUEST[txtother51]      <br /></td>



    <td height=30 valign=top><strong>Smallest  Hole Size: </strong> 

	  $_REQUEST[txtother8]

	

	<br />

	<br />

	<strong>Smallest Pad :</strong>

	  $_REQUEST[txtother19] 

	

	<br />

	<br />

    <strong>Blind Vias:</strong>

      $_REQUEST[chk37]

      $_REQUEST[chk38]

        

    <br />

    <br />

	<strong>Buried Vias: </strong>

	  $_REQUEST[chk39]

      $_REQUEST[chk40]

        

      <br />

	  <br />

      <strong>Blind/Buried Vias:</strong> 

	  $_REQUEST[chk41]

      $_REQUEST[chk42]



	<br />

	<br />

      <strong>HDI Design:</strong> 

	  $_REQUEST[chk200]

      $_REQUEST[chk201]      </td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Finish : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Solder Resist : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Nomenclature : </strong></td>

  </tr>

  <tr>

    <td height=30><strong>Finish:</strong>

      $_REQUEST[chk43]

        

      

      

      $_REQUEST[chk44]

        

      

     

      $_REQUEST[chk45]

        

      

      <br>

      $_REQUEST[chk46]

        

      

      

      $_REQUEST[chk47]

        

      

      <br />

      <br />

      $_REQUEST[chk103]

      

      $_REQUEST[txtother9]      </td>

    <td height=30><strong>Mask Sides:</strong> 

      $_REQUEST[chk48]

        

      

        

      $_REQUEST[chk49]

        

      

    

      $_REQUEST[chk50]

        

      

      <br />

      <br />

      <strong>Color:</strong> $_REQUEST[chk51]

        

      

      $_REQUEST[chk52]

        

      

      <br />

      $_REQUEST[chk104]

      

        

      

        $_REQUEST[txtother10]

        

      <br />

      <strong>Mask Type:</strong>

      $_REQUEST[chk53]

        

      

  

      $_REQUEST[chk54]      </td>

    <td height=30><strong>S/S Sides:</strong>

      $_REQUEST[chk55]

        

      

      $_REQUEST[chk56]

        

      

      $_REQUEST[chk57]

        

      

      <br />

      <br />

      <strong>S/S Color:</strong>

      $_REQUEST[chk58]

      $_REQUEST[chk59]

        

      

      $_REQUEST[chk60]

        

      

      <br />

      <br />

      $_REQUEST[chk105]

      $_REQUEST[txtother11] </td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Fabrication : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Array Requirements : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Special Call-Outs : </strong></td>

  </tr>

  <tr>

    <td height=30><strong>Individual Route 1-up: </strong>

      $_REQUEST[chk61]

      $_REQUEST[chk62]

        

      

      <br />

      <br />

      <strong>Board Size (in.)</strong>

      

      $_REQUEST[txtother12]

        

    X

      

        $_REQUEST[txtother13]

        

      <br />

      <strong>Array:</strong> $_REQUEST[chk63]

        

      

      $_REQUEST[chk64]

        

      

      <br />

      <br />

      <strong>Bds Per Array :</strong> $_REQUEST[txtother14] <br />

      <br />

      <strong>Array Size: </strong>

      

      $_REQUEST[txtother15]

        

    X

      

        $_REQUEST[txtother16]<br />      

<strong>Rout Tolerance :</strong> 

      $_REQUEST[chk204]

      $_REQUEST[chk205]

      $_REQUEST[txtother52]      <br /></td>

    <td height=30><strong>Array Design Provided:</strong> $_REQUEST[chk65]

      $_REQUEST[chk66]

        

      

      <br />

      <strong><br />

        Factory to Design Array: </strong>$_REQUEST[chk67]

        

      

        <br>

        $_REQUEST[chk68]

        

      

      <br />

      <strong>Array Type:</strong> 

      $_REQUEST[chk69]

        

      <br />

      

      $_REQUEST[chk70]

        

      

      <br />

      

      $_REQUEST[chk71]

        

      

      <br />

      <br />

      <strong>Array Requires:      </strong>$_REQUEST[chk72]

        

 <br />

      

      $_REQUEST[chk73]

	  <br />

      $_REQUEST[chk74]      </td>

    <td height=30><strong>Bevel: </strong>

      $_REQUEST[chk75]

        

      

      $_REQUEST[chk76]

        

      



      <br />

      <br />

      <strong>Countersink:</strong> $_REQUEST[chk77]

        

      

      $_REQUEST[chk78]

        

      

      <br />

      <br />

      <strong>Cut Outs:</strong> $_REQUEST[chk79]

        

      

      $_REQUEST[chk80]

        

      

      <br />

      <br />

      <strong>Slots:</strong>

      $_REQUEST[chk81]

        

      

      $_REQUEST[chk82]      </td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Markings : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>QA Requirements : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Miscellaneous : </strong></td>

  </tr>

  <tr>

    <td height=30><strong>Logo:</strong> 

      $_REQUEST[chk83]

        

      

  

      $_REQUEST[chk84]

        

      <br />

      <strong>94V-0 Mark: </strong>

      $_REQUEST[chk85]<br>

      $_REQUEST[chk86]

        

     

      <strong><br />

      Date Code Format:</strong> 

      $_REQUEST[chk87]

        

      

      $_REQUEST[chk88]

      $_REQUEST[chk89]

        

      <br>

    $_REQUEST[chk111]$_REQUEST[txtother17]</td>

    <td height=30><strong>Microsection Required:</strong>

      $_REQUEST[chk90]

        

      

      $_REQUEST[chk91]

        

      

      <br />

      <br />

      <strong>Electrical Test Stamp: </strong>

      $_REQUEST[chk92]$_REQUEST[chk93]

        

      <br />

      $_REQUEST[chk94]      

	 $_REQUEST[chk199]	</td>

    <td height=30><strong>X-Outs Allowed:</strong> 

      $_REQUEST[chk95]

        

      

      

      $_REQUEST[chk96]

        

      

      <br />

      <br />

      <strong># of X-outs per Array :</strong> $_REQUEST[txtother18] 

      <br />

      <br />

      <strong>RoHS Cert:</strong>

      $_REQUEST[chk97]

      $_REQUEST[chk98]      </td>

  </tr>

  <tr>

    

</table>";
/*echo $message;
exit (0);*/

$pdf->WriteHTML($message);

$filename=$path."$_REQUEST[txtcust]-$_REQUEST[txtpno]-$_REQUEST[txtrev] ".date("m-d-Y H:i:s") . ".pdf";

$pdf->Output($filename,'F');

include("../../class.phpmailer.php");

/*$mess="Please See Attached RFQ ";

$sender = 'isaac@pcbsglobal.com';

$subject = "Online Request For Quote Form";

$from = $_REQUEST['txtemail'];

$mail = new PHPMailer();						

$mail->From = $_REQUEST['txtemail'];

$mail->FromName = $_REQUEST['txlcust'];

$mail->Subject = $subject;

$mail->Body    = $mess;		

$mail->AddAddress($sender);

$mail->AddAttachment($filename); 

$mail->IsHTML(true);			

if($mail->Send())

{

	header("Location: manage_quote.php?act=done"); 

}

else 

{

	echo "<br> <b>Mail sent failed to : ".$sender."</b><br>";

	?>

	<a href="javascript:history.go();">Go Back</a>

	<? 	

}*/

header("Location: manage_quote.php?act=done"); 
//echo $_REQUEST['descharge1'];
//echo "<br>";
//echo $_REQUEST['descharge2']
?>



