<?php 
$misccharge =	0;
$nre		=	0;
require_once('conn.php');
/*require('../pdfclass/html2fpdf.php'); */
require('../pdftest/html2pdf.class.php');
session_start();
?>
<?php 
$sqs = "select * from order_tb where ord_id='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');
$rws = mysql_fetch_array($ress);

/* Special requirement list array */
$option_arr = array();
$optcount = 0;

//$newdate = '09/23/2013';//Date for deciding new quotes

$innerCopper	= $rws['inner_copper'];
$startCuz		= $rws['start_cu'];
$fingers_gold	= $rws['fingers_gold'];

if($innerCopper != '') {
	$optcount++;
	$option_arr[$optcount] = $innerCopper.' Oz. Cu Internal';
}

if($startCuz != '') {
	$optcount++;
	$option_arr[$optcount] = $startCuz.' Oz. Cu External';
}

//($innerCopper != '' || $startCuz != '') && 
if( $fingers_gold  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = 'Nickel/Hard Gold Fingers';
}

$plated_cu	= trim($rws['plated_cu']);
$trace_min	= trim($rws['trace_min']);
$space_min	= trim($rws['space_min']);

if($plated_cu != "") {
	$optcount++;
	$option_arr[$optcount] = $plated_cu." Plated Cu in Holes (Min.)";
}

if($trace_min != "" && $trace_min != "Other") {
	$optcount++;
	$option_arr[$optcount] = "Trace Min. = ".$trace_min;
}

if($space_min != "" && $space_min != "Other") {
	$optcount++;
	$option_arr[$optcount] = "Space Min. = ".$space_min;
}

$hole_size	= trim($rws['hole_size']);
$small_pad	= trim($rws['pad']);
$hdi_design = trim($rws['hdi_design']);
$blind		= trim($rws['blind']);
$buried		= trim($rws['buried']);
$bb_both	= trim($rws['bb_both']);
$cond_vias	= trim($rws['cond_vias']);
$resin_filled	= trim($rws['resin_filled']);

if($hole_size != "") {
	$optcount++;
	$option_arr[$optcount] = "Smallest Hole Size = ".$hole_size;
}

if($small_pad != "") {
	$optcount++;
	$option_arr[$optcount] = "Smallest Pad = ".$small_pad;
}

if($hdi_design  ==  'Yes') {
	$optcount++;
	$option_arr[$optcount] = 'HDI Design Required';
}

if($bb_both  ==  'Yes' || ($blind  ==  'yes' && $buried  ==  'yes')) {
	$optcount++;
	$option_arr[$optcount] = 'Blind and Buried Vias Required';
} elseif($blind  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = 'Blind Vias Required';
} elseif($buried  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = 'Buried Vias Required'; 
}
if(strtolower($resin_filled)  ==  "yes") {
	$optcount++;
	$option_arr[$optcount] = 'Non-Conductive Filled/Plated Over';
}

if(strtolower($cond_vias)  ==  "yes") {
	$optcount++;
	$option_arr[$optcount] = 'Conductive Filled Vias Required';
}

$mask_size	= trim($rws['mask_size']);
$mask_type	= trim($rws['mask_type']);
$color		= $rws['color'];
$sscolor	= trim($rws['ss_color']);
$ss_side	= trim($rws['ss_side']);
$colorcnt = 0;

if($mask_size != "" && $mask_size  ==  "Both") {
	$optcount++;
	$option_arr[$optcount] = "Mask Both Sides";
	$colorcnt = $optcount;
} else if($mask_size != "" && $mask_size  ==  '1') {
	$optcount++;
	$option_arr[$optcount] = "Mask 1 Side";
	$colorcnt = $optcount;
} else if($mask_size  ==  "N/A") {
	$optcount++;
	$option_arr[$optcount] = "No Mask Required";
}

if($color != '' && $mask_size != "N/A") {
	if($colorcnt == 0) $colorcnt = $optcount + 1;
	$option_arr[$colorcnt] = $color.' '.(isset($option_arr[$colorcnt]) ? $option_arr[$colorcnt] : ' Mask');
}

if($mask_size != "" && $mask_size != "N/A" && $mask_type != "") {
	$optcount++;
	$option_arr[$optcount] = $mask_type." Mask Type";
}

if($ss_side != "" && $ss_side != "N/A") {
	$optcount++;
	if($sscolor != '') {
		$option_arr[$optcount] = $sscolor.' Silkscreen, ';
	}	
	$option_arr[$optcount] .= $ss_side." Side".($ss_side > 1 ? "s" : "");
}

$route		= trim($rws['route']);
$route_tole	= trim($rws['route_tole']);

/*if($route  ==  'Yes' && $route != "") {
	$optcount++;
	$option_arr[$optcount] = "Individual Route 1-up";
}*/

if($route_tole != "+/-.005" && $route_tole != "") {
	$optcount++;
	$option_arr[$optcount] = $route_tole." Overall Dimensions Tolerance";
}

$array_design	= trim($rws['array_design']);
$design_array	= trim($rws['design_array']);
$array_type1	= trim($rws['array_type1']);
$array_type2	= trim($rws['array_type2']);
$array_type3	= trim($rws['array_type3']);
$array_require1	= trim($rws['array_require1']);
$array_require2	= trim($rws['array_require2']);
$array_require3	= trim($rws['array_require3']);

if(strtolower($array_design)  ==  'yes' && $array_design != "") {
	$optcount++;
	$option_arr[$optcount] = "Array Design Provided";
}

if(strtolower($design_array)  ==  'yes' && $design_array != "") {
	$optcount++;
	$option_arr[$optcount] = "Factory to Design Array";
}

if($array_type1 != "" || $array_type2 != "" || $array_type3 != "") {
	$array_type = array();
	if($array_type1 != "" )
		$array_type[] = $array_type1;
	if($array_type2 != "" )
		$array_type[] = $array_type2;
	if($array_type3 != "" )
		$array_type[] = $array_type3;

	$optcount++;
	$option_arr[$optcount] = implode(", ", $array_type)." Array Type";
}

if($array_require1 != "" || $array_require2 != "" || $array_require3 != "") {
	$array_require = array();
	if($array_require1 != "" )
		$array_require[] = $array_require1;
	if($array_require2 != "" )
		$array_require[] = $array_require2;
	if($array_require3 != "" )
		$array_require[] = $array_require3;

	$optcount++;
	$option_arr[$optcount] = "Array Requires ".implode(", ", $array_require);
}

$miling		= trim($rws['bevel']);
$cDepth		= trim($rws['cut_outs']);
$ePlating	= trim($rws['slots']);

if($miling  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = 'Miling Required';
}
	
if($cDepth  ==  'Yes') {
	$optcount++;
	$option_arr[$optcount] = 'Control Depth Required';
}

if($ePlating  ==  'Yes') {
	$optcount++;
	$option_arr[$optcount] = 'Edge Plating Required';
}

$logo			= trim($rws['logo']);
$mark			= trim($rws['mark']);
$date_code		= trim($rws['date_code']);
$other_marking	= trim($rws['other_marking']);

if($logo != '' && $logo != 'None' && $logo != "Other")  {
	$optcount++;
	$option_arr[$optcount] = $logo." Logo";
}

if(strtolower($mark)  ==  'yes')  {
	$optcount++;
	$option_arr[$optcount] = "94V-0 Mark";
}

if($date_code != '' && $date_code != 'None'  && $date_code != 'Other Marking') {
	$optcount++;
	$option_arr[$optcount] = $date_code." Date Code Format";
} else if($date_code  ==  'Other Marking' && $other_marking != '') {
	$optcount++;
	$option_arr[$optcount] = $other_marking;
}

$micro_section	= trim($rws['micro_section']);
$test_stamp		= trim($rws['test_stamp']);
$in_board		= trim($rws['in_board']);
$array_rail		= trim($rws['array_rail']);

if(strtolower($micro_section)  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = "Microsection Required";
}

if(strtolower($test_stamp)  ==  'yes')  {
	$optcount++;
	if($in_board != "") {
		$option_arr[$optcount] = $in_board." Electrical Test Stamp";
		if($array_rail != "")
			$option_arr[$optcount] = $in_board.' and '.$array_rail.' Electrical Test Stamp';
	}
	else {
		if($array_rail != "")
			$option_arr[$optcount] = $array_rail.' Electrical Test Stamp';
		else $option_arr[$optcount] = "Electrical Test Stamp";
	}
}

$xoutsallowed	= $rws['xouts'];
$numerxouts		= $rws['xouts1'];
$rosh_cert		= trim($rws['rosh_cert']);

if($xoutsallowed !='' && $xoutsallowed != 'yes') {
	$optcount++;
	$option_arr[$optcount] = ucfirst($xoutsallowed).' X-Outs Allowed';
} else if($xoutsallowed != '' && $xoutsallowed  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = $numerxouts.' X-Outs Allowed per Array';
} 

if(strtolower($rosh_cert)  ==  'yes') {
	$optcount++;
	$option_arr[$optcount] = "RoHS Cert";
}

if(strlen(trim(strip_tags($rws['special_instadmin']))) > 5) {
	$sp_intadmin_arr = explode('<br />', $rws['special_instadmin']);
	if(count($sp_intadmin_arr) > 1) {
		foreach ($sp_intadmin_arr as $sk => $sv) {
			if(trim(strip_tags($sv)) != "") {
				//echo trim(strip_tags($sv))."<br>";
				$optcount++;
				$option_arr[$optcount] = trim(strip_tags($sv));
			}
		}
	}
	else {
		$sp_intadmin_arr otal</b></td><td width="100">: $'.$tot_misc.'</td></tr>';
		}
			
		if($rws['descharge'] != 0.00 || $rws['descharge1'] != "" || $rws['descharge2'] != "" || $rws['necharge'] != 0.00)
			$message  = $message.'</table><br>';	
	}
}

if ($rws['cancharge'] != 'yes' && $rws['simplequote'] != '1') {
  
  $message  = $message.'
    <table style=" text-align: center;" width="1000" border="1">
	<tr>
    <td width="95"></td>
	<td width="95"></td>';
   
    if($rws[day1] > 0)
	$message  = $message.'<td width="95">'.$rws[day1].' Days</td>';
   
    if($rws[day2] > 0)
	$message  = $message.'
    <td width="95">'.$rws[day2].' Days</td>';
	
	if($rws[day3] > 0)
	$message  = $message.'
    <td width="95">'.$rws[day3].' Days</td>';
	
	if($rws[day4] > 0)
	$message  = $message.'
    <td width="95">'.$rws[day4].' Days</td>';
	
	if($rws[day5] > 0)
	$message  = $message.'
    <td width="95">'.$rws[day5].' Days</td>';   
    
    $message  = $message.'</tr>';
 
   if($rws['qty1'] > 0) {
 
$message  = $message.'
 <tr>
    <td>Option 1</td>
    <td>'.$rws[qty1].' Pcs</td> ';
   
    if($rws[day1] > 0) {
     if($pr1 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr1.' ea</td>';
	  }
  }
  if($rws[day2] > 0) {
  if($pr2 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr2.' ea</td>';
	  }
  }
  
 
  if($rws[day3] > 0) {
   if($pr3 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr3.' ea</td>';
	  } 
  }
 

   
   if($rws[day4] > 0) {
     if($pr4 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr4.' ea</td>';
	  }
   }
 
 
   if($rws[day5] > 0) {
     if($pr5 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr5.' ea</td>';
	  }
   }
 $message  = $message.'</tr>
 
<tr>
    <td colspan="2" style="text-align:right"><strong>'.($rws[new_or_rep] == 'New Part' ? 'NRE/' : '').'Shipping to FOB Included&nbsp;</strong></td>';

	/*'.($rws[ord_date] > $newdate ? ($rws[new_or_rep] == 'New Part' ? 'NRE/' : '').'Shipping to FOB Included' : 'Order Total').'*/
   
  if($rws[day1] > 0) {
  
   if($pr1 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		  $total = ($rws[qty1] * str_replace(",","",$pr1) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }

  
    }
  if($rws[day2] > 0) {
   if($pr2 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		  $total = ($rws[qty1] * str_replace(",","",$pr2) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0) {
    if($pr3 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		  $total = ($rws[qty1] * str_replace(",","",$pr3) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0) {
    if($pr4 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		  $total = ($rws[qty1] * str_replace(",","",$pr4) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0) {
    if($pr5 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		  $total = ($rws[qty1] * str_replace(",","",$pr5) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  = $message.'</tr>';
  
 }


  if($rws['qty2'] > 0) { 
 $message  = $message.' 
  <tr>
    <td>Option 2</td>
    <td>'.$rws[qty2].' Pcs</td>';
 if($rws[day1] > 0)  {
   if($pr6 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else   {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr6.' ea</td>';
	  }
 }
   
 if($rws[day2] > 0)  {
   if($pr7 == 0.00) 	  {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else 	  {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr7.' ea</td>';
	  }
 }
 
   
if($rws[day3] > 0 ) {
	if($pr8 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr8.' ea</td>';
	  }
}

   
if($rws[day4] > 0 ) {
  if($pr9 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr9.' ea</td>';
	  }
}
   
if($rws[day5] > 0 ) {
 if($pr10 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		$message  = $message.'<td style="text-align:left">&nbsp;$'.$pr10.' ea</td>';
	  }
}
 
$message  = $message.'</tr>
 
<tr>
    <td colspan="2" style="text-align:right"><strong>'.($rws[new_or_rep] == 'New Part' ? 'NRE/' : '').'Shipping to FOB Included&nbsp;</strong></td>';

 
  if($rws[day1] > 0) {
     if($pr6 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		 $total = ($rws[qty2] * str_replace(",","",$pr6) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
 
  
    }
  if($rws[day2] > 0) {
     if($pr7 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		 $total = ($rws[qty2] * str_replace(",","",$pr7) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   
 }
  if($rws[day3] > 0) {
      if($pr8 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		 $total = ($rws[qty2] * str_replace(",","",$pr8) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day4] > 0) {
     if($pr9 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		 $total = ($rws[qty2] * str_replace(",","",$pr9) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
   }
   if($rws[day5] > 0) {
     if($pr10 == 0.00) {
		 $message  = $message.'<td style="text-align:left">&nbsp;</td>';
	  }
	  else {
		 $total = ($rws[qty2] * str_replace(",","",$pr10) ) +  $misccharge+ $nre+$rws['descharge1']+$rws['descharge2'];
		  $total = number_format($total,2);
		  $message  = $message.'
		 <td style="text-align:left">&nbsp;<strong>$'.$total.'</strong> </td>';
	  }
}

$message  = $message.'</tr>';
    }
	
	
   if($rws['qty3'] > 0) {
