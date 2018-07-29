<?php
require_once('chksess.php');
require_once('conn.php'); 

if(getenv("SERVER_NAME") != 'localhost') {
	require($pdfpath);
	$path = "/home/pareomic/public_html/pcbsglobal.com/luke-pdf/upload/";

	$pdf = new HTML2FPDF();
	$pdf->AddPage();
}

if(isset($_REQUEST['Submit'])) {	

	$arr = explode("+", $_POST['txtcust']);

	/*//update alerts with part no and rev for refid
	$asql = "update alerts_tb set customer='".trim($arr[1])."', part_no='".trim($_REQUEST['txtpno'])."', rev='".trim($_REQUEST['txtrev'])."' where refid = '".$_SESSION['refid']."' and refid <> 0";
	//
	$ares = mysql_query($asql);	

	if($ares) unset($_SESSION['refid']);*/

	/***********************************************/
	
	if($_POST['nor'] != "") $nor = $_POST['nor'];

	if($_REQUEST['chki1'] != "") $ipc_class = $_REQUEST['chki1'];

	/*if($_REQUEST['chki2'] != "") 
		$ipc_class = $_REQUEST['chki2'];

	if($_REQUEST['chki3'] != "") 
		$ipc_class=$_REQUEST['chki3'];*/

	if($_REQUEST['chk1'] != "") 
		$no_layer=$_REQUEST['chk1'];
	
	if($_REQUEST['chk2'] != "") 
		$no_layer=$_REQUEST['chk2'];
	
	if($_REQUEST['chk3'] != "") 
		$no_layer=$_REQUEST['chk3'];
	
	if($_REQUEST['chk4'] != "") 
		$no_layer=$_REQUEST['chk4'];

	if($_REQUEST['chk5'] != "") 
		$no_layer=$_REQUEST['chk5'];

	if($_REQUEST['chk6'] != "") 
		$no_layer=$_REQUEST['chk6'];

	if($_REQUEST['txtother1'] != "") 
		$no_layer=$_REQUEST['txtother1'];

	if($_REQUEST['chk7'] != "") 
		$m_require=$_REQUEST['chk7'];

	if($_REQUEST['chk8'] != "") 
		$m_require=$_REQUEST['chk8'];

	if($_REQUEST['chk9'] != "") 
		$m_require=$_REQUEST['chk9'];

	if($_REQUEST['txtother2'] != "") 
		$m_require=$_REQUEST['txtother2'];

	if($_REQUEST['chk18'] != "") 
		$inner_copper=$_REQUEST['chk18'];

	if($_REQUEST['chk19'] != "") 
		$inner_copper=$_REQUEST['chk19'];

	if($_REQUEST['chk20'] != "") 
		$inner_copper=$_REQUEST['chk20'];

	if($_REQUEST['chk21'] != "") 
		$inner_copper=$_REQUEST['chk21'];

	if($_REQUEST['txtother6'] != "") 
		$inner_copper=$_REQUEST['txtother6'];

	if($_REQUEST['chk13'] != "") 
		$thick_ness=$_REQUEST['chk13'];

	if($_REQUEST['chk14'] != "") 
		$thick_ness=$_REQUEST['chk14'];

	if($_REQUEST['chk15'] != "") 
		$thick_ness=$_REQUEST['chk15'];

	if($_REQUEST['txtother4'] != "") 
		$thick_ness=$_REQUEST['txtother4'];

	if($_REQUEST['chk17'] != "") 
		$thick_tole=$_REQUEST['chk17'];

	if($_REQUEST['txtother5'] != "") 
		$thick_tole=$_REQUEST['txtother5'];

	if($_REQUEST['chk10'] != "") 
		$start_cu=$_REQUEST['chk10'];

	if($_REQUEST['chk11'] != "") 
		$start_cu=$_REQUEST['chk11'];

	if($_REQUEST['chk12'] != "") 
		$start_cu=$_REQUEST['chk12'];

	if($_REQUEST['txtother3'] != "") 
		$start_cu=$_REQUEST['txtother3'];

	if($_REQUEST['chk22'] != "") 
		$plated_cu=$_REQUEST['chk22'];

	if($_REQUEST['chk23'] != "") 
		$plated_cu=$_REQUEST['chk23'];

	if($_REQUEST['chk24'] != "") 
		$plated_cu=$_REQUEST['chk24'];

	if($_REQUEST['txtother7'] != "") 
		$plated_cu=$_REQUEST['txtother7'];

	if($_REQUEST['chk25'] == "yes") 
		$fingers_gold = $_REQUEST['chk25'];
	else $fingers_gold = "No";

	if($_REQUEST['chk27'] != "") 
		$trace_min = $_REQUEST['chk27'];

	if($_REQUEST['chk28'] != "") 
		$trace_min = $_REQUEST['chk28'];

	if($_REQUEST['chk29'] != "") 
		$trace_min = $_REQUEST['chk29'];

	if($_REQUEST['chk30'] != "") 
		$trace_min = $_REQUEST['chk30'];

	if(trim($_REQUEST['txtother54']) != "") 
		$trace_min = trim($_REQUEST['txtother54']);

	if($_REQUEST['chk31'] != "") 
		$space_min = $_REQUEST['chk31'];

	if($_REQUEST['chk32'] != "") 
		$space_min = $_REQUEST['chk32'];

	if($_REQUEST['chk33'] != "") 
		$space_min = $_REQUEST['chk33'];

	if($_REQUEST['chk34'] != "") 
		$space_min = $_REQUEST['chk34'];

	if(trim($_REQUEST['txtother55']) != "") 
		$space_min = trim($_REQUEST['txtother55']);


	if($_REQUEST['chk35'] == "Yes") $con_impe1 = "Yes"; 
	else $con_impe1 = "No"; 

	if($_REQUEST['chk109'] != "") 
		$con_impe_sing=$_REQUEST['chk109'];

	if($_REQUEST['chk110'] != "") 
		$con_impe_diff=$_REQUEST['chk110'];

	if($_REQUEST['chk202'] != "") 
		$tore_impe=$_REQUEST['chk202'];

	if($_REQUEST['txtother51'] != "") 
		$tore_impe=$_REQUEST['txtother51'];

	if($_REQUEST['txtother8'] != "") 
		$hole_size=$_REQUEST['txtother8'];

	if($_REQUEST['txtother19'] != "") 
		$pad=$_REQUEST['txtother19'];

	if($_REQUEST['chk37'] == "Yes") $blind = "yes"; 
	else $blind = "No"; 

	if($_REQUEST['chk39'] == "Yes") $buried = "yes"; 
	else $buried = "No"; 

	/*if($_REQUEST['chk41'] != "") {
		$bb_both = $_REQUEST['chk41'];
	}
	if($_REQUEST['chk42'] != "") {
		$bb_both = $_REQUEST['chk42'];
	}*/

	if($_REQUEST['chk200'] == "Yes") $hdi_design = "Yes"; 
	else $hdi_design = "No"; 

	if($_REQUEST['chk210'] == "Yes") $cond_vias = "Yes"; 
	else $cond_vias = "No"; 

	if($_REQUEST['chk215'] == "Yes") $resin_filled = "Yes"; 
	else $resin_filled = "No"; 

	if($_REQUEST['chk43'] != "") { $finish = $_REQUEST['chk43']; }

	if($_REQUEST['chk44'] != "") { $finish = $_REQUEST['chk44']; }

	if($_REQUEST['chk45'] != "") { $finish=$_REQUEST['chk45']; }

	if($_REQUEST['chk46'] != "") { $finish=$_REQUEST['chk46']; }

	if($_REQUEST['chk47'] != "") { $finish=$_REQUEST['chk47']; }

	if($_REQUEST['txtother9'] != "") { $finish=$_REQUEST['txtother9']; }

	if($_REQUEST['chk48'] != "") { $mask_size=$_REQUEST['chk48']; }

	if($_REQUEST['chk49'] != "") { $mask_size=$_REQUEST['chk49']; }

	if($_REQUEST['chk50'] != "") { $mask_size=$_REQUEST['chk50']; }

	if($_REQUEST['chk51'] != "") { $color=$_REQUEST['chk51']; }

	if($_REQUEST['chk52'] != "") { $color=$_REQUEST['chk52']; }

	if($_REQUEST['txtother10'] != "") { $color=$_REQUEST['txtother10']; }

	if($_REQUEST['chk53'] != "") { $mask_type=$_REQUEST['chk53']; }

	if($_REQUEST['chk54'] != "") { $mask_type=$_REQUEST['chk54']; }

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

	$route = "";

	/*if($_REQUEST['chk61'] != "") $route=$_REQUEST['chk61'];
	if($_REQUEST['chk62'] != "") $route=$_REQUEST['chk62'];
	*/

	if($_REQUEST['txtother12'] != "") {
		$b_size1=$_REQUEST['txtother12'];
	}

	if($_REQUEST['txtother13'] != "") 
		$b_size2 = $_REQUEST['txtother13'];

	if($_REQUEST['chk63'] == "YES") $array = "YES"; 
	else $array = "NO"; 	
	
	if($_REQUEST['txtother14'] != "") {
		$b_per_array=$_REQUEST['txtother14'];
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

	if($_REQUEST['chk65'] == "Yes") $array_design = "Yes"; 
	else $array_design = "No"; 	

	if($_REQUEST['chk67'] == "yes") $design_array = "yes"; 
	else $design_array = "No"; 	

	if($_REQUEST['chk69'] != "") {
		$array_type1=$_REQUEST['chk69'];
	}

	if($_REQUEST['chk70'] != "") {
		$array_type2=$_REQUEST['chk70'];
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

	if($_REQUEST['chk75'] == "yes") $bevel = "yes"; 
	else $bevel = "No"; 	

	if($_REQUEST['chk77'] == "yes") $counter_sink = "yes"; 
	else $counter_sink = "No"; 		

	if($_REQUEST['chk79'] == "Yes") $cut_outs = "Yes"; 
	else $cut_outs = "No"; 		

	if($_REQUEST['chk81'] == "Yes") $slots = "Yes"; 
	else $slots = "No"; 	

	if($_REQUEST['chk83'] != "") {
		$logo = $_REQUEST['chk83'];
	}
	if($_REQUEST['chk84'] != "") {
		$logo = $_REQUEST['chk84'];
	}
	if($_REQUEST['txtother56'] != "") {
		$logo = $_REQUEST['txtother56'];
	}

	if($_REQUEST['chk85'] == "Yes") $mark = "Yes"; 
	else $mark = "No"; 	

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

	if($_REQUEST['chk90'] == "YES") $micro_s = "YES"; 
	else $micro_s = "NO"; 	
	
	if($_REQUEST['chk92'] == "Yes") $test_stamp = "Yes"; 
	else $test_stamp = "No"; 		

	if($_REQUEST['new'] != "") {
		$temp=$_REQUEST['new'];
	}

	if($_REQUEST['rep'] != "") {
		$temp=$_REQUEST['rep'];
	}

	if($_REQUEST['chk94'] != "") {
		$in_board=$_REQUEST['chk94'];
	}

	if($_REQUEST['chk199'] != "") {
		$array_rail=$_REQUEST['chk199'];
	}

	if($_REQUEST['chk95'] == "yes") $xouts = "yes"; 
	else $xouts = "no";


	if($_REQUEST['txtother28'] != "") {
		$xouts1 = $_REQUEST['txtother28'];
	}

	if($_REQUEST['chk97'] == "Yes") $rosh = "Yes"; 
	else $rosh = "No";

////

$bprice=2;

$leadtm=$_REQUEST['txtday1'];

if($leadtm==7) {
$d1=$bprice;
}

if($leadtm==1) {
$d1=$bprice+($bprice*(200/100));
}

if($leadtm==2) {
$d1=$bprice+($bprice*(200/100));
}

if($leadtm==3) {
$d1=$bprice+($bprice*(100/100));
}

if($leadtm==4) {
$d1=$bprice+($bprice*(50/100));
}

//=== 2

$leadtm=$_REQUEST['txtday2'];

if($leadtm==7) {
$d2=$bprice;
}

if($leadtm==1) {
$d2=$bprice+($bprice*(200/100));
}

if($leadtm==2) {
$d2=$bprice+($bprice*(200/100));
}

if($leadtm==3) {
$d2=$bprice+($bprice*(100/100));
}

if($leadtm==4) {
$d2=$bprice+($bprice*(50/100));
}

//====3 =====

$leadtm=$_REQUEST['txtday3'];

if($leadtm==7) {
	$d3=$bprice;
}

if($leadtm==1) {
	$d3=$bprice+($bprice*(200/100));
}

if($leadtm==2) {
	$d3=$bprice+($bprice*(200/100));
}

if($leadtm==3) {
	$d3=$bprice+($bprice*(100/100));
}

if($leadtm==4) {
	$d3=$bprice+($bprice*(50/100));
}

// 4 

$leadtm=$_REQUEST['txtday4'];

if($leadtm==7) {
	$d4=$bprice;
}

if($leadtm==1) {
	$d4=$bprice+($bprice*(200/100));
}

if($leadtm==2) {
	$d4=$bprice+($bprice*(200/100));
}

if($leadtm==3) {
	$d4=$bprice+($bprice*(100/100));
}

if($leadtm==4) {
	$d4=$bprice+($bprice*(50/100));
}

// end of day

$qnt1 = $_REQUEST['txtqty1'];

if($qnt1 >= 250) {
	$q1=$bprice;
}

if($qnt1==100) {
	$q1=$bprice+($bprice*(5/100));
}

if($qnt1==50) {
	$q1=$bprice+($bprice*(20/100));
}

if($qnt1==10) {
$q1=$bprice+($bprice*(50/100));
}

// 2

$qnt2=$_REQUEST['txtqty2'];

if($qnt2>=250) {
$q2=$bprice;
}

if($qnt2==100) {
$q2=$bprice+($bprice*(5/100));
}

if($qnt2==50) {
$q2=$bprice+($bprice*(20/100));
}

if($qnt2==10) {
$q2=$bprice+($bprice*(50/100));
}

//3

$qnt3=$_REQUEST['txtqty3'];

if($qnt3>=250) {
$q3=$bprice;
}

if($qnt3==100) {
$q3=$bprice+($bprice*(5/100));
}

if($qnt3==50) {
$q3=$bprice+($bprice*(20/100));
}

if($qnt2==10) {
$q3=$bprice+($bprice*(50/100));
}

// 4

$qnt4=$_REQUEST['txtqty4'];

if($qnt4>=250) {
$q4=$bprice;
}

if($qnt4==100) {
$q4=$bprice+($bprice*(5/100));
}

if($qnt4==50) {
$q4=$bprice+($bprice*(20/100));
}

if($qnt4==10) {
$q4=$bprice+($bprice*(50/100));
}


if($no_layer=='single') {
$p3=$bprice;
}

if($no_layer=='Double Sided') {
$p3=$bprice+($bprice*(10/100));
}

if($no_layer=='4Lyr') {
$p3=$bprice+($bprice*(50/100));
}

if($no_layer=='6Lyr') {
	$p3=$bprice+($bprice*(100/100));
}

if($no_layer=='8Lyr') {
	$p3=$bprice+($bprice*(150/100));
}

if($no_layer=='10Lyr') {
	$p3=$bprice+($bprice*(200/100));
}

if($m_require=='FR-4') {
	$p4=$bprice;
}

if($m_require=='FR-4/170TG Min') {
	$p4=$bprice+($bprice*(10/100));
}

if($m_require=='Rogers 4003') {
	$p4=$bprice+($bprice*(50/100));
}

if($con_impe_sing=='Single') {
	$p5=$bprice+($bprice*(10/100));
}

if($con_impe_diff=='Differential') {
	$p5=$bprice+($bprice*(150/100));
}

if($blind=='yes') {
	$p6=$bprice+($bprice*(15/100));
}

if($buried=='yes') {
	$p7=$bprice+($bprice*(15/100));
}

/*if($bb_both=='yes') {
	$p8=$bprice+($bprice*(25/100));
}*/

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

$price=$d1+$d2+$d3+$d4+$q1+$q2+$q3+$q4;

$qty5 = $_REQUEST['txtqty5'];
$qty6 = $_REQUEST['txtqty6'];
$qty7 = $_REQUEST['txtqty7'];
$qty8 = $_REQUEST['txtqty8'];
$qty9 = $_REQUEST['txtqty9'];
$qty10 = $_REQUEST['txtqty10'];
$day5 = $_REQUEST['txtday5'];

$pr11 =  toNum($_REQUEST['pr11']);
$pr12 =  toNum($_REQUEST['pr12']);
$pr13 =  toNum($_REQUEST['pr13']);
$pr14 =  toNum($_REQUEST['pr14']);
$pr15 =  toNum($_REQUEST['pr15']);

$pr21 =  toNum($_REQUEST['pr21']);
$pr22 =  toNum($_REQUEST['pr22']);
$pr23 =  toNum($_REQUEST['pr23']);
$pr24 =  toNum($_REQUEST['pr24']);
$pr25 =  toNum($_REQUEST['pr25']);

$pr31 =  toNum($_REQUEST['pr31']);
$pr32 =  toNum($_REQUEST['pr32']);
$pr33 =  toNum($_REQUEST['pr33']);
$pr34 =  toNum($_REQUEST['pr34']);
$pr35 =  toNum($_REQUEST['pr35']);

$pr41 =  toNum($_REQUEST['pr41']);
$pr42 =  toNum($_REQUEST['pr42']);
$pr43 =  toNum($_REQUEST['pr43']);
$pr44 =  toNum($_REQUEST['pr44']);
$pr45 =  toNum($_REQUEST['pr45']);

$pr51 =  toNum($_REQUEST['pr51']);
$pr52 =  toNum($_REQUEST['pr52']);
$pr53 =  toNum($_REQUEST['pr53']);
$pr54 =  toNum($_REQUEST['pr54']);
$pr55 =  toNum($_REQUEST['pr55']);

$pr61 =  toNum($_REQUEST['pr61']);
$pr62 =  toNum($_REQUEST['pr62']);
$pr63 =  toNum($_REQUEST['pr63']);
$pr64 =  toNum($_REQUEST['pr64']);
$pr65 =  toNum($_REQUEST['pr65']);

$pr71 =  toNum($_REQUEST['pr71']);
$pr72 =  toNum($_REQUEST['pr72']);
$pr73 =  toNum($_REQUEST['pr73']);
$pr74 =  toNum($_REQUEST['pr74']);
$pr75 =  toNum($_REQUEST['pr75']);

$pr81 =  toNum($_REQUEST['pr81']);
$pr82 =  toNum($_REQUEST['pr82']);
$pr83 =  toNum($_REQUEST['pr83']);
$pr84 =  toNum($_REQUEST['pr84']);
$pr85 =  toNum($_REQUEST['pr85']);

$pr91 =  toNum($_REQUEST['pr91']);
$pr92 =  toNum($_REQUEST['pr92']);
$pr93 =  toNum($_REQUEST['pr93']);
$pr94 =  toNum($_REQUEST['pr94']);
$pr95 =  toNum($_REQUEST['pr95']);

$pr101 =  toNum($_REQUEST['pr101']);
$pr102 =  toNum($_REQUEST['pr102']);
$pr103 =  toNum($_REQUEST['pr103']);
$pr104 =  toNum($_REQUEST['pr104']);
$pr105 =  toNum($_REQUEST['pr105']);

$str3 = $_REQUEST['txtcust'];
$arr = explode("+", $str3);
$txtcust = $arr[1];

$str4 = $_REQUEST['txtreq'];
$arr = explode("**", $str4);
$txtreq = $arr[2];
//echo $nor;

if(!isset($_POST['simplequote']))
	$simplequote = '0';
else
	$simplequote = $_POST['simplequote'];

$sp_req = $_REQUEST['specialreqval'];

if ($nor == 'Repeat With Change') {
	
$sqin = "insert into order_tb (cust_name, part_no, rev, req_by, email, phone, fax,qnt, lead_times, quote_by, necharge, descharge, special_inst,special_instadmin,	is_spinsadmact, ipc_class, no_layer, m_require,thickness, thickness_tole, inner_copper, start_cu, plated_cu, fingers_gold, trace_min, space_min, con_impe_sing,con_impe_diff, tore_impe, hole_size, pad, blind, buried, hdi_design, finish,mask_size, mask_type, color, ss_side, ss_color, route, board_size1, board_size2, array, b_per_array, array_size1, array_size2,route_tole, array_design, design_array, array_type1, array_type2, array_require1, array_require2, array_require3, bevel, counter_sink, cut_outs,slots, logo, mark, date_code, other_marking, micro_section, test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4, con_impe1,day5,qty5, qty6,qty7, qty8,qty9, qty10, new_or_rep, changes, pr11,pr12, pr13, pr14,pr15, pr21,pr22,pr23, pr24,pr25,pr31,pr32, pr33,pr34,pr35,pr41, pr42,pr43,pr44,pr45, pr51,pr52,pr53,pr54, pr55,pr61,pr62,pr63,pr64, pr65,pr71,pr72,pr73,pr74, pr75, pr81, pr82, pr83, pr84, pr85,pr91,pr92,pr93,pr94, pr95, pr101,pr102, pr103,pr104,pr105,descharge1,descharge2, cond_vias, resin_filled, sp_reqs, comments, simplequote, fob_oth, vid, vid_oth)

values('".$txtcust."','".$_REQUEST['txtpno']."', '".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" .$_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','" .$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$_POST['nor']."','".$_POST['changes']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."','".$pr103 ."','".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."','".$_REQUEST['descharge2']."', '".$cond_vias."', '".$resin_filled."', '".$sp_req."', '".$_POST['comments']."', '".$simplequote."', '".$_POST['fob_oth']."', '".$_POST['vid']."', '".trim($_POST['vid_oth'])."')";

/*echo $sqin;
exit(0);*/
$resin = mysql_query($sqin) or die('error in data'.mysql_error());
$quoteid = mysql_insert_id();
 }
else if ($nor=='New Part'){

$sqin="insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,necharge,descharge,special_inst,special_instadmin,	is_spinsadmact,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe_sing,con_impe_diff,tore_impe,hole_size,pad,blind,buried,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type1,array_type2,array_require1,array_require2,array_require3,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4,con_impe1,day5,qty5,qty6,qty7,qty8,qty9,qty10,new_or_rep,
pr11,pr12,pr13,pr14,pr15,pr21,pr22,pr23,pr24,pr25,pr31,pr32,pr33,pr34,pr35,pr41,pr42,pr43,pr44,pr45,pr51,pr52,pr53,pr54,pr55,pr61,pr62,pr63,pr64,pr65,pr71,pr72,pr73,pr74,pr75,pr81,pr82,pr83,pr84,pr85,pr91,pr92,pr93,pr94,pr95,pr101,pr102,pr103,pr104,pr105,descharge1,descharge2, cond_vias, resin_filled, sp_reqs, comments, simplequote, fob_oth, vid, vid_oth)

values('".$txtcust."', '".$_REQUEST['txtpno']."', '".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" . $_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','" .$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$_POST['nor']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."', '".$pr103 ."', '".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."', '".$_REQUEST['descharge2']."', '".$cond_vias."','".$resin_filled."', '".$sp_req."', '".$_POST['comments']."', '".$simplequote."', '".trim($_POST['fob_oth'])."', '".$_POST['vid']."', '".trim($_POST['vid_oth'])."')";

/*echo $sqin;
exit(0);*/
$resin = mysql_query($sqin) or die('error in data'.mysql_error());
$quoteid = mysql_insert_id();
}
else if ($nor=='Repeat Order'){
	$sqin = "update order_tb set cust_name='".$txtcust."', part_no='".$_REQUEST['txtpno']."',rev='".$_REQUEST['txtrev']."', req_by='".$txtreq."',
		email='".$_REQUEST['txtemail']."',phone='".$_REQUEST['txtphone']."',fax='".$_REQUEST['txtfax']."',qnt='".$_REQUEST['txtqnt']."',
		lead_times='".$_REQUEST['txtlead']."',quote_by='".$_REQUEST['txtquote']."',necharge='" . $_REQUEST['necharge'] ."',descharge='". $_REQUEST['descharge'] . "',special_inst='".$_REQUEST['txtinst']."',
		ipc_class='".$ipc_class."',no_layer='".$no_layer."',m_require='".$m_require."',thickness='".$thick_ness."',
		thickness_tole='".$thick_tole."',inner_copper='".$inner_copper."',start_cu='".$start_cu."',plated_cu='".$plated_cu."',
		fingers_gold='".$fingers_gold."',trace_min='".$trace_min."',space_min='".$space_min."',con_impe_sing='".$con_impe_sing."',con_impe_diff='".$con_impe_diff."',
		tore_impe='".$tore_impe."',hole_size='".$hole_size."',pad='".$pad."',blind='".$blind."',buried='".$buried."',

		hdi_design='".$hdi_design."', cond_vias='".$cond_vias."', resin_filled='".$resin_filled."', finish='".$finish."',  mask_size='".$mask_size."', mask_type='".$mask_type."', color='".$color."', ss_side='".$ss_side."',
		ss_color='".$ss_color."',route='".$route."',board_size1='".$b_size1."',board_size2='".$b_size2."',array='".$array."',b_per_array='".$b_per_array."',
		array_size1='".$array_size1."',array_size2='".$array_size2."',route_tole='".$route_tole."',array_design='".$array_design."',
		design_array='".$design_array."',array_type1='".$array_type1."',array_type2='".$array_type2."',array_require1='".$array_require1."',array_require2='".$array_require2."',array_require3='".$array_require3."',bevel='".$bevel."',counter_sink='".$counter_sink."',
		cut_outs='".$cut_outs."',slots='".$slots."',logo='".$logo."',mark='".$mark."',date_code='".$date_code."',other_marking='".$other_marking."',
		micro_section='".$micro_s."',test_stamp='".$test_stamp."',in_board='".$in_board."',array_rail='".$array_rail."',xouts='".$xouts."',
		xouts1='".$xouts1."',rosh_cert='".$rosh."',price='".$price."',per1='".$_REQUEST['per1']."',per2='".$_REQUEST['per2']."',
		per3='".$_REQUEST['per3']."',per4='".$_REQUEST['per4']."',per5='".$_REQUEST['per5']."',per6='".$_REQUEST['per6']."',
		per7='".$_REQUEST['per7']."',per8='".$_REQUEST['per8']."',per9='".$_REQUEST['per9']."',per10='".$_REQUEST['per10']."',
		per11='".$_REQUEST['per11']."',per12='".$_REQUEST['per12']."',per13='".$_REQUEST['per13']."',per14='".$_REQUEST['per14']."',
		qty1='".$_REQUEST['txtqty1']."',qty2='".$_REQUEST['txtqty2']."',qty3='".$_REQUEST['txtqty3']."',qty4='".$_REQUEST['txtqty4']."',qty5='".$_REQUEST['txtqty5']."',
		qty6='".$_REQUEST['txtqty6']."',qty7='".$_REQUEST['txtqty7']."',qty8='".$_REQUEST['txtqty8']."',qty9='".$_REQUEST['txtqty9']."',qty10='".$_REQUEST['txtqty10']."',
		day1='".$_REQUEST['txtday1']."',day2='".$_REQUEST['txtday2']."',day3='".$_REQUEST['txtday3']."',day4='".$_REQUEST['txtday4']."',day5='".$_REQUEST['txtday5']."',

		con_impe1='".$con_impe1. "',new_or_rep='".$_POST['nor']. "',necharge='".$_REQUEST['necharge']. "',descharge='".$_REQUEST['descharge']."',
			pr11='".toNum($_REQUEST['pr11']). "', pr12='".toNum($_REQUEST['pr12']). "', pr13='".toNum($_REQUEST['pr13']). "', pr14='".toNum($_REQUEST['pr14']). "', pr15='".toNum($_REQUEST['pr15']). "', pr21='".toNum($_REQUEST['pr21']). "', pr22='".toNum($_REQUEST['pr22']). "', pr23='".toNum($_REQUEST['pr23']). "', pr24='".toNum($_REQUEST['pr24']). "', pr25='".toNum($_REQUEST['pr25']). "', pr31='".toNum($_REQUEST['pr31']). "', pr32='".toNum($_REQUEST['pr32']). "', pr33='".toNum($_REQUEST['pr33']). "', pr34='".toNum($_REQUEST['pr34']). "', pr35='".toNum($_REQUEST['pr35']). "', pr41='".toNum($_REQUEST['pr41'])."', pr42='".toNum($_REQUEST['pr42']). "', pr43='".toNum($_REQUEST['pr43'])."', pr44='".toNum($_REQUEST['pr44']). "', pr45='".toNum($_REQUEST['pr45']). "', pr51='".toNum($_REQUEST['pr51']). "', pr52='".toNum($_REQUEST['pr52']). "', pr53='".toNum($_REQUEST['pr53']). "', pr54='".toNum($_REQUEST['pr54']). "', pr55='".toNum($_REQUEST['pr55']). "', pr61='".toNum($_REQUEST['pr61']). "', pr62='".toNum($_REQUEST['pr62']). "', pr63='".toNum($_REQUEST['pr63']). "', pr64='".toNum($_REQUEST['pr64']). "', pr65='".toNum($_REQUEST['pr65']). "', pr71='".toNum($_REQUEST['pr71']). "', pr72='".toNum($_REQUEST['pr72']). "', pr73='".toNum($_REQUEST['pr73']). "', pr74='".toNum($_REQUEST['pr74']). "', pr75='".toNum($_REQUEST['pr75']). "', pr81='".toNum($_REQUEST['pr81']). "', pr82='".toNum($_REQUEST['pr82']). "', pr83='".toNum($_REQUEST['pr83']). "', pr84='".toNum($_REQUEST['pr84']). "', pr85='".toNum($_REQUEST['pr85']). "', pr91='".toNum($_REQUEST['pr91']). "', pr92='".toNum($_REQUEST['pr92']). "', pr93='".toNum($_REQUEST['pr93']). "', pr94='".toNum($_REQUEST['pr94']). "', pr95='".toNum($_REQUEST['pr95']). "', pr101='".toNum($_REQUEST['pr101']). "', pr102='".toNum($_REQUEST['pr102']). "', pr103='".toNum($_REQUEST['pr103']). "', pr104='".toNum($_REQUEST['pr104']). "', pr105='".toNum($_REQUEST['pr105']).  "', descharge1='".$_REQUEST['descharge1']."', descharge2='".$_REQUEST['descharge2']."', sp_reqs = '".$sp_req."', comments='".$_POST['comments']."', simplequote = '".$simplequote."', fob_oth = '".trim($_POST['fob_oth'])."', vid='".$_POST['vid']."', 	vid_oth = '".trim($_POST['vid_oth'])."'
		where ord_id='".$_REQUEST['id']."'";

$resin = mysql_query($sqin) or die('error in data'.mysql_error());

$quoteid = $_REQUEST['id'];

}
else  {	
	if($_POST['nor1'] != "") $nor = $_POST['nor1'];

$sqin = "insert into order_tb(cust_name,part_no,rev,req_by,email,phone,fax,qnt,lead_times,quote_by,necharge,descharge,special_inst,special_instadmin,	is_spinsadmact,ipc_class,no_layer,m_require,thickness,thickness_tole,inner_copper,start_cu,plated_cu,fingers_gold,trace_min,space_min,con_impe_sing,con_impe_diff,tore_impe,hole_size,pad,blind,buried,hdi_design,finish,mask_size,mask_type,color,ss_side,ss_color,route,board_size1,board_size2,array,b_per_array,array_size1,array_size2,route_tole,array_design,design_array,array_type1,array_type2,array_require1,array_require2,array_require3,bevel,counter_sink,cut_outs,slots,logo,mark,date_code,other_marking,micro_section,test_stamp,

in_board,array_rail,xouts,xouts1,rosh_cert,ord_date,cancharge,ccharge,fob,orddate1,price,price1,price2,price3,price4,qty1,qty2,qty3,qty4,day1,day2,day3,day4,con_impe1,day5,qty5,qty6,qty7,qty8,qty9,qty10,new_or_rep,cpo,opo,
pr11,pr12,pr13,pr14,pr15,pr21,pr22,pr23,pr24,pr25,pr31,pr32,pr33,pr34,pr35,pr41,pr42,pr43,pr44,pr45,pr51,pr52,pr53,pr54,pr55,pr61,pr62,pr63,pr64,pr65,pr71,pr72,pr73,pr74,pr75,pr81,pr82,pr83,pr84,pr85,pr91,pr92,pr93,pr94,pr95,pr101,pr102,pr103,pr104,pr105,descharge1,descharge2,desdesc,desdesc1,desdesc2, cond_vias, resin_filled, sp_reqs, comments, simplequote, fob_oth, vid, vid_oth)

values('".$txtcust."', '".$_REQUEST['txtpno']."','".$_REQUEST['txtrev']."','".$txtreq."','".$_REQUEST['txtemail']."','".$_REQUEST['txtphone']."','".$_REQUEST['txtfax']."','".$_REQUEST['txtqnt']."','".$_REQUEST['txtlead']."','".$_REQUEST['txtquote']."','" . $_REQUEST['necharge'] . "','" . $_REQUEST['descharge'] . "','".$_REQUEST['txtinst'] . "','" .$_REQUEST['txtinstadmin'] . "','" .$_REQUEST['admcmntstat']."','".$ipc_class."','".$no_layer."','".$m_require."','".$thick_ness."','".$thick_tole."','".$inner_copper."','".$start_cu."','".$plated_cu."','".$fingers_gold."','".$trace_min."','".$space_min."','".$con_impe_sing."','".$con_impe_diff."','".$tore_impe."','".$hole_size."','".$pad."','".$blind."','".$buried."','".$hdi_design."','".$finish."','".$mask_size."','".$mask_type."','".$color."','".$ss_side."','".$ss_color."','".$route."','".$b_size1."','".$b_size2."','".$array."','".$b_per_array."','".$array_size1."','".$array_size2."','".$route_tole."','".$array_design."','".$design_array."','".$array_type1."','".$array_type2."','".$array_require1."','".$array_require2."','".$array_require3."','".$bevel."','".$counter_sink."','".$cut_outs."','".$slots."','".$logo."','".$mark."','".$date_code."','".$other_marking."','".$micro_s."','".$test_stamp."','".$in_board."','".$array_rail."','".$xouts."','".$xouts1."','".$rosh."','".date('m/d/Y')."','".$_REQUEST['cancharge']."','".$_REQUEST['ccharge']."','".$_REQUEST['fob']."','".$_REQUEST['orddate1']."','".$price."','".$price1."','".$price2."','".$price3."','".$price4."','".$_REQUEST['txtqty1']."','".$_REQUEST['txtqty2']."','".$_REQUEST['txtqty3']."','".$_REQUEST['txtqty4']."','".$_REQUEST['txtday1']."','".$_REQUEST['txtday2']."','".$_REQUEST['txtday3']."','".$_REQUEST['txtday4']."','".$con_impe1."','".$day5."','".$qty5."','".$qty6."','".$qty7."','".$qty8."','".$qty9."','".$qty10."','".$nor."','".$_POST['cpo']."','".$_POST['opo']."',
'".$pr11 ."','".$pr12 ."','".$pr13 ."','".$pr14 ."','".$pr15 ."',
'".$pr21 ."','".$pr22 ."','".$pr23 ."','".$pr24 ."','".$pr25 ."',
'".$pr31 ."','".$pr32 ."','".$pr33 ."','".$pr34 ."','".$pr35 ."',
'".$pr41 ."','".$pr42 ."','".$pr43 ."','".$pr44 ."','".$pr45 ."',
'".$pr51 ."','".$pr52 ."','".$pr53 ."','".$pr54 ."','".$pr55 ."',
'".$pr61 ."','".$pr62 ."','".$pr63 ."','".$pr64 ."','".$pr65 ."',
'".$pr71 ."','".$pr72 ."','".$pr73 ."','".$pr74 ."','".$pr75 ."',
'".$pr81 ."','".$pr82 ."','".$pr83 ."','".$pr84 ."','".$pr85 ."',
'".$pr91 ."','".$pr92 ."','".$pr93 ."','".$pr94 ."','".$pr95 ."',
'".$pr101 ."','".$pr102 ."','".$pr103 ."','".$pr104 ."','".$pr105 ."','".$_REQUEST['descharge1']."','".$_REQUEST['descharge2']."','".$_REQUEST['desdesc']."','".$_REQUEST['desdesc1']."','".$_REQUEST['desdesc2']."','".$cond_vias."','".$resin_filled."', '".$sp_req."', '".$_POST['comments']."', '".$simplequote."', '".$_POST['fob_oth']."', '".$_POST['vid']."', '".trim($_POST['vid_oth'])."')";
//echo $sqin;
/*echo $sqin;
exit(0);*/
$resin = mysql_query($sqin) or die('error in data'.mysql_error());

$quoteid = mysql_insert_id();
 
/********** updating reminders ****************/
if(isset($_POST['reminders']) && $_POST['reminders'] == 'yes')
	$reminders = $_POST['reminders'];
else $reminders = 'no';		

$rsql = "select * from reminder_tb where quoteid='".$quoteid."'";
$rres = mysql_query($rsql);
if(mysql_num_rows($rres) > 0) {
	mysql_query("update reminder_tb set enabled='".$reminders."', days='".$_POST['days']."' where quoteid='".$quoteid."'");
}
else {
	if($reminders == 'yes')
		mysql_query("insert into reminder_tb set quoteid='".$quoteid."', enabled='".$reminders."', days='".$_POST['days']."', lastreminder=now()");
} 
/**************************************************************/
	
}
//header('location:thanks.php');
}

//extract($_POST);

$message  = "<table width=820 border=1 align=center cellpadding=1 cellspacing=1 bordercolor=#e6e6e6>

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
    <td height=30 bgcolor=#0099CC><p><strong>IPC Class: </strong> $ipc_class </td>
  </tr>

  <tr>

    <td height=30>

      $_REQUEST[chk1]  $_REQUEST[chk2]
    <strong><br />
        &nbsp;$_REQUEST[chk4] &nbsp;$_REQUEST[chk5]       

        $_REQUEST[chk6] <br /> <br />
        $_REQUEST[chk99]
        $_REQUEST[txtother1]    </td>

    <td height=30> $_REQUEST[chk7]   $_REQUEST[chk8]
      <br />

      $_REQUEST[chk9] $_REQUEST[txtother2] <br />

      <strong>Inner Copper Oz: </strong>$_REQUEST[chk18]
        $_REQUEST[chk19] $_REQUEST[chk20] <br /></td>

    <td height=30 valign=top><strong>Thickness:</strong> 

      $_REQUEST[chk13]
      $_REQUEST[chk14] 
      $_REQUEST[chk15]<br>
      $_REQUEST[chk108] $_REQUEST[txtother4]
      <br />

      <strong>Thickness Tolerance :</strong> 

      $_REQUEST[chk17] $_REQUEST[chk102]
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
        $_REQUEST[chk23]<br> $_REQUEST[chk24]<br>
        $_REQUEST[chk106] $_REQUEST[txtother7]       

        <strong>Fingers Nickel/Hard Gold: </strong> $fingers_gold
        <br> <br />

      </p>    </td>

    <td height=30 valign=top><strong>Trace Min. </strong>

      $_REQUEST[chk27] $_REQUEST[chk28]
      $_REQUEST[chk29] $_REQUEST[chk30]
		<br />
		<br />
      <strong>Space Min. </strong>

      $_REQUEST[chk31] $_REQUEST[chk32] $_REQUEST[chk33]
      $_REQUEST[chk34] <br /> <br />

      <strong>Controlled Impedance:</strong>

      $con_impe1      <br />
	$_REQUEST[chk109] <br />
	$_REQUEST[chk110] <br />

	<strong>Impedance Tolerance :</strong> 
      $_REQUEST[chk202]     $_REQUEST[chk203]
      $_REQUEST[txtother51]      <br /></td>

    <td height=30 valign=top><strong>Smallest  Hole Size: </strong> 
	  $_REQUEST[txtother8]

	<br /><br />
	<strong>Smallest Pad :</strong>
	  $_REQUEST[txtother19] 
	<br /><br />

    <strong>Blind Vias:</strong> $blind
    <br /><br />

	<strong>Buried Vias: </strong> $buried 

	<br /><br />
      <strong>HDI Design:</strong> $hdi_design
	  
	  <br /><br />
      <strong>Conductive Filled Vias:</strong> $cond_vias
	  
	  </td>
  </tr>

  <tr>
    <td height=30 bgcolor=#0099CC><strong>Finish : </strong></td>
    <td height=30 bgcolor=#0099CC><strong>Solder Resist : </strong></td>
    <td height=30 bgcolor=#0099CC><strong>Nomenclature : </strong></td>
  </tr>

  <tr>
    <td height=30><strong>Finish:</strong>

      $_REQUEST[chk43] $_REQUEST[chk44] $_REQUEST[chk45]
      <br>

      $_REQUEST[chk46] $_REQUEST[chk47]      

      <br /><br />      $_REQUEST[chk103]
      $_REQUEST[txtother9]      </td>

    <td height=30><strong>Mask Sides:</strong> 

      $_REQUEST[chk48]
      $_REQUEST[chk49]
      $_REQUEST[chk50]
      <br />   <br />

      <strong>Color:</strong> $_REQUEST[chk51]
      $_REQUEST[chk52] <br />

      $_REQUEST[chk104] $_REQUEST[txtother10]

      <br />

      <strong>Mask Type:</strong>

      $_REQUEST[chk53] $_REQUEST[chk54]      </td>

    <td height=30><strong>S/S Sides:</strong>
      $_REQUEST[chk55] $_REQUEST[chk56] $_REQUEST[chk57]
      <br /><br />

      <strong>S/S Color:</strong>

      $_REQUEST[chk58] $_REQUEST[chk59] $_REQUEST[chk60]

      <br /> <br />

      $_REQUEST[chk105] $_REQUEST[txtother11] </td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Fabrication : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Array Requirements : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Special Call-Outs : </strong></td>

  </tr>

  <tr>

    <td height=30><strong>Individual Route 1-up: </strong>

      $_REQUEST[chk61] $_REQUEST[chk62]

      <br />
      <br />

      <strong>Board Size (in.)</strong>

      $_REQUEST[txtother12] X $_REQUEST[txtother13]
      <br />

      <strong>Array:</strong> $array <br /> <br />

      <strong>Bds Per Array :</strong> $_REQUEST[txtother14] <br />

      <br />
      <strong>Array Size: </strong>

      $_REQUEST[txtother15] X $_REQUEST[txtother16]<br />      

<strong>Rout Tolerance :</strong> 

      $_REQUEST[chk204] $_REQUEST[chk205]

      $_REQUEST[txtother52]      <br /></td>

    <td height=30><strong>Array Design Provided:</strong> $array_design
      <br />

      <strong><br />

        Factory to Design Array: </strong> $design_array <br />

      <strong>Array Type:</strong> 
      $_REQUEST[chk69] <br />
      $_REQUEST[chk70] <br /> <br />

      <strong>Array Requires:      </strong>$_REQUEST[chk72]
 <br />   

      $_REQUEST[chk73] <br />

      $_REQUEST[chk74] </td>

    <td height=30><strong>Bevel: </strong> $bevel

      <br /><br />

      <strong>Countersink:</strong> $counter_sink <br />
      <br />
      <strong>Cut Outs:</strong> $cut_outs

      <br /><br />
      <strong>Slots:</strong> $slots   </td>

  </tr>

  <tr>

    <td height=30 bgcolor=#0099CC><strong>Markings : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>QA Requirements : </strong></td>

    <td height=30 bgcolor=#0099CC><strong>Miscellaneous : </strong></td>

  </tr>

  <tr>

    <td height=30><strong>Logo:</strong> 

      $_REQUEST[chk83] $_REQUEST[chk84]          <br />

      <strong>94V-0 Mark: </strong>

      $mark <strong><br />

      Date Code Format:</strong> 

      $_REQUEST[chk87] $_REQUEST[chk88] $_REQUEST[chk89]
      <br>

    $_REQUEST[chk111]$_REQUEST[txtother17]</td>

    <td height=30><strong>Microsection Required:</strong>

      $micro_s      <br /><br />

      <strong>Electrical Test Stamp: </strong>

      $test_stamp <br />

      $_REQUEST[chk94] $_REQUEST[chk199]	</td>

    <td height=30><strong>X-Outs Allowed:</strong> 
      $xouts       <br />      <br />

      <strong># of X-outs per Array :</strong> $_REQUEST[txtother28] 

      <br />      <br />

      <strong>RoHS Cert:</strong>     $rosh      </td>

  </tr>

  <tr>
</table>";
/*echo $message;
exit (0);//*/

if(getenv("SERVER_NAME") != 'localhost') {

	$pdf->WriteHTML($message);
	$filename=$path."$_REQUEST[txtcust]-$_REQUEST[txtpno]-$_REQUEST[txtrev] ".date("m-d-Y H:i:s") . ".pdf";

	$pdf->Output($filename,'F');

	//include("../../class.phpmailer.php");
}

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
if($mail->Send()) {
	header("Location: manage_quote.php?act=done"); 
}
else  {
	echo "<br> <b>Mail sent failed to : ".$sender."</b><br>";

	?>

	<a href="javascript:history.go();">Go Back</a>

	<?php 	

}*/

header("Location: manage_quote.php?act=done"); 
//echo $_REQUEST['descharge1'];
//echo "<br>";
//echo $_REQUEST['descharge2']
?>



