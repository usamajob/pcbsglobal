<?php require_once('conn.php'); 
//require('../pdfclass/html2fpdf.php');
require('../pdftest/html2pdf.class.php');
?>
<?php 
$sqs = "select * from porder_tb where poid='".$_REQUEST['id']."'";
$ress = mysql_query($sqs) or die('errorn in data');
$rws = mysql_fetch_array($ress);
//Begin:: get specialRequirements from Order_tb
$qry_special_instructions_admin = "SELECT  * FROM  `order_tb` WHERE  `cust_name` =  '".$rws['customer']."'
AND  `part_no` =  '".$rws['part_no']."'";
//echo 'Qry= '.$qry_special_instructions_admin;
$qry_special_instructions_admin_exe = mysql_query($qry_special_instructions_admin);
$rws2 = mysql_fetch_array($qry_special_instructions_admin_exe);
$special_instadmin = $rws2['special_instadmin'];
$blind= $rws2['blind'];
$hdi_design= $rws2['hdi_design'];
$buried= $rws2['buried'];
$bb_both=$rws2['bb_both'];
$color=$rws2['color'];
$innerCopper=$rws2['inner_copper'];
$startCuz=$rws2['start_cu'];
$sscolor=$rws2['ss_color'];
$routeTol=$rws2['route_tole'];
$othermarking=$rws2['other_marking'];
$xoutsallowed=$rws2['xouts'];
$numerxouts=$rws2['xouts1'];
$miling=$rws2['bevel'];
$cDepth=$rws2['cut_outs'];
$ePlating=$rws2['slots'];
$mRequired=$rws2['m_require'];
$impdTol=$rws2['tore_impe'];
$ipcClass=$rws2['ipc_class'];
$finsh=$rws2['finish'];
//echo 'Blind='.$blind.' Buried'.$buried.' bb_both'.$bb_both;
//echo 'Special_Instructions_Admin'.$special_instructions_admin;
//End:: specialRequirements from Order_tb
?>
<?php
/*$path="/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";*/

/*$pdf=new HTML2FPDF();

$pdf->AddPage();
*/
  $html2pdf = new HTML2PDF('P','A4','en');
  
   $sqv="select * from vendor_tb where data_id='".$rws['vid']."'";

  $resv=mysql_query($sqv);

  if(!$resv)

  {

  die('error in data');

  }

  $rwv=mysql_fetch_array($resv);

    $sqs1="select * from shipper_tb where data_id='".$rws['sid']."'";

  $res1=mysql_query($sqs1);

  if(!$res1)

  {

  die('error in data');

  }

  $rws1=mysql_fetch_array($res1);


$po = $rws[poid] + 9933 ;
$messagee  ='

<page>

<table  width="1500px" border="0">
   <tr> 
    <td><img src="http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="100"></td>
	<td> <h1 style="font-size: 40pt;color:#5660B1">Purchase Order</h1>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>Date:</strong> '.$rws[podate].'<br>	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<strong>PO #</strong>'.$po.'
	</td>
    </tr>
  </table> 
  
<table  width="1500px" border="0">
   <tr> 
    <td>
	<strong>PCBs Global Incorporated</strong>	

<br>2500 E. La Palma Ave.<br>
Anaheim Ca. 92806<br>
Phone: (855) 722-7456<br>
Fax: (855) 262-5305<br>	
	</td>  
	<td width="250"></td>
	<td></td>
    </tr>
  </table>   
  
  <table width="1500px" border="0">
   <tr > 
    <td  width="350" style="background-color:#656BBC; color:#FFF;" colspan="2">VENDOR</td>  
	<td  width="50"></td>
	<td  width="320" style="background-color:#656BBC; color:#FFF;" colspan="2">SHIP TO</td>
	<td  width="200"></td>

</tr><tr height="5px" > 
	<td style="margin-top:-20px"  width="100" height="5px" >
	<table style="vertical-align:top;"  width="200" border="0">';
	

	if ($rwv[c_name]!='')
$messagee.=	'<tr><td>'.$rwv[c_name].'</td></tr>';

if ($rwv[c_address]!='')
$messagee.=	'<tr><td>'.$rwv[c_address].'</td></tr>';
	
	if (($rwv[c_address2]!='')or($rwv[c_address3]!=''))
$messagee.=	'<tr><td>'.$rwv[c_address2].$rwv[c_address3].'</td></tr>';

	if ($rwv[c_phone]!='')
$messagee.=	'<tr><td>Phone '.$rwv[c_phone].'</td></tr>';
	
	if ($rwv[c_fax]!='')
$messagee.=	'<tr><td>Fax '.$rwv[c_fax].'</td></tr>';

	if ($rwv[c_website]!='')
$messagee.=	'<tr><td>Fax '.$rwv[c_website].'</td></tr>';

$messagee.=	'</table>	
	</td>
    <td width="5"></td>  
	<td width="50"></td>
	<td width="100" height="5px" ><table style="vertical-align:top;"  width="200" border="0">';

if ($rws1[c_name] != '')
$messagee.=	'<tr><td>'.$rws1[c_name].'</td></tr>';

if ($rws1[c_address] != '')
$messagee.=	'<tr><td>'.$rws1[c_address].'</td></tr>';
	
if ($rws1[c_address2] != '')
$messagee.=	'<tr><td>'.$rws1[c_address2].'</td></tr>';

if ($rws1[c_address3] != '')
$messagee.=	'<tr><td>'.$rws1[c_address3].'</td></tr>';

if ($rws1[c_phone] != '')
$messagee.=	'<tr><td>Phone '.$rws1[c_phone].'</td></tr>';

if ($rws1[c_fax] != '')
$messagee.=	'<tr><td>Fax '.$rws1[c_fax].'</td></tr>';

if ($rws1[c_website] != '')
$messagee.=	'<tr><td>'.$rws1[c_website].'</td></tr>';

$messagee.=	'</table>	</td>
	<td width="0"></td>  	
	<td width="0"></td>
</tr>	  
</table>  

<table width="1500px" border="0">
<tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="250">REQUISITIONER</td>  
	<td width="75">SHIP VIA</td>
	<td width="150" >F.O.B.</td>
	<td width="125">SHIPPING TERMS</td>
</tr>
<tr style="text-align:center"> 
    <td width="250">'.$rws[namereq].'</td>  
	<td width="75">'.$rws[svia].'</td>
	<td width="150" >'.$rws[city].'&nbsp;,'.$rws[state].'</td>
	<td width="125">'.$rws[sterms].'</td>
</tr>
</table><br>
  
<table width="1500px" border="0">
<tr style="background-color:#656BBC;color:#FFF;text-align:center"> 
    <td width="50">ITEM #</td> 
	<td width="125">PART NUMBER</td>
	<td width="40">REV</td>
	<td width="30">LYRS</td>
	<td width="225">DESCRIPTION</td>
	<td width="50" >QTY</td>
	<td width="100">UNIT PRICE</td>
	<td width="90">TOTAL</td>
</tr>'; 
  
$sqi = "select * from items_tb where pid='".$rws['poid']."' order by item";
$resi = mysql_query($sqi) or die('error in data');

$tot = 0;
$j = 0;

while($rwi = mysql_fetch_array($resi)) { 

$messagee .= '

<tr style="text-align:center ;font-size: 10pt;"> 
    <td  width="50">'.$rwi[item].'</td>  
	<td  width="125">';
	
if($j==0)  { 
	
$messagee .=	$rws[part_no] ;
	}	
	
$messagee .= '</td><td  width="40">';	
if($j==0)  { 
	
$messagee .=	$rws[rev] ;
	}
$messagee .= '</td><td  width="30">';	


$pieces = explode("Lyrs", $rws[no_layer]);
$pno = $pieces[0]; // piece1


if($j==0)  { 
$messagee .= $pno ;
}
$messagee .= '</td>';

$messagee .= '		
	
	<td  width="225">'; 
	
	if($j == 0)  { 
	
//$messagee.=	$rws[part_no].'   Rev '.$rws[rev] ;
	}
	$messagee.='  '.
	$rwi[itemdesc].'</td>
	<td  width="50" >'.$rwi[qty2].'</td>
	<td  width="100">  $'.number_format(str_replace(',', '', $rwi[uprice]),2).' </td>
	<td  width="90">  $'.number_format(str_replace(',', '', $rwi[tprice]),2).'</td>
</tr>
'; 

 $tottt = str_replace(',', '', $rwi['tprice']); 
 $tot = $tot + number_format($tottt,2,'.','');

//$tot=$tot+number_format($rwi['tprice'],2);
$j++;
  }

  

$tot = number_format($tot,2);
  
$messagee.='
</table>  

<table width="1500px" border="0">
<tr>
 <td style="font-size: 10pt;" >';


if($rws[iscancel]=='no'){ 
$messagee.='
<br>
	Customer:  ' .$rws[customer].'
	 PO  #: ' .$rws[po].'<br>
	
	Boards to dock at destination  '.$rws[date1].'<br>'; 
	
	if($rws[rohs]=='yes')
$messagee.='	RoHS Certs required <br>'; 
	
	
$messagee .= '

Certificate of compliance required <br>
Inspection report required <br>
Test certificate required <br>
Solder sample required <br>
Ship coupons along with impedance reports when applicable<br>
Boards must be individually bagged and <br> packages 
vacuum sealed with dessicants <br>
Labels on packages must only include P/N, D/C and Qty <br> 
Do not add suppliers information <br><br>
Add the following product description: <br>
Bare rigid printed circuit boards (PCBS); <br>
Harmonize Code 8534.00.0020 <br>
Please mark boxes with our customer PO# <br><br>';
}
//special-instructions-code
$flag_special_instructions = 0; 

if(trim($rws['sp_reqs']) != "") {
	$temp_sp_reqs = explode('|', trim($rws['sp_reqs']));
	if(count($temp_sp_reqs) > 0) {
		$optcount = 0;
		foreach($temp_sp_reqs as $ks => $vs) {
			$optcount++;
			$option_arr[$optcount] = trim($vs);
		}		
	}
	$messagee .= '<strong>Special Requirements</strong>:<div style="width: 750px; font-size: 9pt; padding-top: 5px; padding-bottom: 10px">';

	$col_count = 3;
	if(count($option_arr) > 0) {
		while ($col_count > count($option_arr) ) $col_count--;
		$per_col_items = ceil(count($option_arr) / $col_count);
		$lpad = 5;
		$tdwidth = floor((740-($lpad*$col_count*2))/$col_count);

		$spr  = '<table border="0" cellspacing="0" cellpadding="0" border="0" style="width:740px">
		<tr>
			<td style="vertical-align: top; padding-right:'.$lpad.'px;">
			';

		$cntr = 0;

		foreach ($option_arr as $k => $v) {
			if($cntr == $per_col_items) {
				$spr  .= '
				</td>
				<td style="vertical-align: top; width:'.($tdwidth-5).'px">
				';
				$cntr = 0;
			}
			$spr  .= '<table cellpadding="0" cellspacing="0" border="0" style="width: 100%" >
			<tr>
				<td style="vertical-align: top; width:12px; color:#646bbb">'.$k.'.)&nbsp;</td>
				<td style="width:'.($tdwidth-20).'px; vertical-align: top; text-wrap: normal; padding-left: '.$lpad.'px;">'.$v.'</td>
			</tr></table>
			';
			$cntr++;
		}

		$spr  .= '
		</td></tr>
		</table>';
	}

	$messagee  .= $spr.'</div><br><br>';
}


//$messagee.='<strong>Special Requirements</strong><br>'.'Blind='.$blind.' Buried='.$buried.' bb_both='.$bb_both;

/*
$messagee.='<strong>Special Requirements</strong><br>';

$fingers_gold = $rws2['fingers_gold'];
$linebreak = 0;

if (($mRequired != 'FR-4')and ($mRequired != '')) {
	$messagee .=''.$mRequired.' Mat';
	$linebreak = 1;
}

if($mRequired != 'FR-4' && $innerCopper == $innerCopper && $innerCopper != '') {
		$messagee .='<font style="margin-left: 6px;">|</font> ' .$innerCopper.'<font style="margin-left: 6px;">Oz. Cu Internal</font>';
		$linebreak = 1;
	}else if($innerCopper == $innerCopper && $innerCopper != ''){
		$messagee .='' .$innerCopper.' Oz. Cu Internal';
		$linebreak = 1;
	}

if($startCuz == $startCuz && $startCuz != '') {
	$messagee .='<font style="margin-left: 6px;">| ' .$startCuz.'</font> Oz. Cu External';
	$linebreak = 1;
}	
	
if   (  (($startCuz != '')or($innerCopper != '')or($mRequired != ''))and ($fingers_gold == 'yes')){
	$messagee  =$messagee.' | ';
	}
	
	if(($fingers_gold == $fingers_gold)and($fingers_gold == 'yes')) {
	$messagee  =$messagee.'' .' Nickel/Hard Gold Fingers';
	$linebreak = 1;
}		

if ($linebreak == 1){
	$messagee.= '<br clear="all" />';
}

/*
if($blind=='yes'){
	$messagee.= 'Blind Vias Design'; 
	$flag_special_instructions = 1; 
}else if($blind != 'yes'){
	$messagee.= '<br clear="all" />'; 
}

if($blind=='yes' && $buried=='yes'){
	$messagee.= ' / Buried Vias Design'; 
	$flag_special_instructions = 1; 
} else if($buried=='yes'){
	$messagee.= 'Buried Vias Design'; 
	$flag_special_instructions = 1; 
}

if(($blind=='yes' || $buried=='yes') && $bb_both=='Yes'){
	$messagee= $messagee.' / Blind and Buried Vias Design';
	$flag_special_instructions = 1; 
} else if($bb_both=='Yes') {
	$messagee= $messagee.'Blind and Buried Vias Design';
	$flag_special_instructions = 1;
}

if($miling=='yes') {
	$messagee.='<font style="margin-left: 6px;">|</font><font style="margin-left: 6px;">Miling</font>';
}
if($miling=='yes' && $cDepth=='Yes') {
	$messagee.=' / Control Depth';
} else if($cDepth=='Yes') {
	$messagee.='<font style="margin-left: 6px;">|</font><font style="margin-left: 6px;">Control Depth</font>';
}

if(($miling=='yes' || $cDepth=='Yes') && $ePlating=='Yes') {
	$messagee.=' / Edge Plating Required';
} else if($ePlating=='Yes') {
	$messagee.='<font style="margin-left: 6px;">|</font><font style="margin-left: 6px;">Edge Plating Required</font>';
}
//
	
	if($hdi_design=='Yes')
	$messagee  =$messagee.'HDI Design';
	
	if($hdi_design=='Yes' && $blind=='yes')
	$messagee  =$messagee.' / Blind Vias';
	
	
	else if($blind=='yes')
	$messagee  =$messagee.'Blind Vias ';	
	
	
	if( ( $hdi_design=='Yes' ||   $blind=='yes') && $buried=='yes')
	$messagee  =$messagee.' / Buried Vias ';
	
	else if($buried=='yes')
	$messagee  =$messagee.'Buried Vias '; 	
	
	if(( $hdi_design=='Yes' || $blind=='yes' || $buried=='yes') && $bb_both=='Yes')
	$messagee  =$messagee.' / Blind and Buried Vias ';
	
	else if($bb_both=='Yes')
	$messagee =$messagee.'Blind and Buried Vias ';	
	
	if (($blind=='yes' || $buried=='yes' || $bb_both=='Yes')and($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
		
		$messagee =$messagee.'Design';
		}
	
	if (($hdi_design=='Yes' || $blind=='yes' || $buried=='yes' || $bb_both=='Yes')and($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
		
		$messagee =$messagee.'<font style="margin-left: 6px;">| </font>';
		}
	
	if($miling=='yes') {
	$messagee =$messagee.'<font >Miling</font>';
	}
	
	if($miling=='yes' && $cDepth=='Yes') {
	$messagee =$messagee.' / Control Depth';
	}
	else if($cDepth=='Yes'){
	$messagee =$messagee.'<font >Control Depth</font>';
	}
	
	if(($miling=='yes' || $cDepth=='Yes') && $ePlating=='Yes') {
	$messagee =$messagee.' / Edge Plating Required';
	}
	else if($ePlating=='Yes'){
	$messagee =$messagee.'<font >Edge Plating Required</font>';
	}
	
	$blind = $blind;
	$buried = $buried;
	$bb_both = $bb_both;	
	
	if (($hdi_design=='Yes' ||$blind=='yes' || $buried=='yes' || $bb_both=='Yes')||($miling=='yes' || $cDepth=='Yes' || $ePlating=='Yes')){
	
	$messagee  =$messagee.'<br clear="all" />';
	}

//*3rd line
$sepneed =0 ;

if($color == $color && $color != '') {
    $messagee.=''.$color .' Soldermask';
	$sepneed =1 ;		
}

if($sscolor == $sscolor && $sscolor != '') {
	
	if ($sepneed == 1 ){
		 $messagee.=' | ';
		
		}	
	
	$messagee .=$sscolor.' Silkscreen';
		$sepneed =1 ;	
}
	
	if($othermarking == $othermarking && $othermarking != '') {
		if ($sepneed == 1 ){
				 $messagee.=' | ';				}
				
		$messagee .='' .$othermarking;		
		$sepneed =1 ;
	}
		
	
	if($finsh != 'HASL' && $finsh != 'ENIG' && $finsh != 'Imm.Silver' && $finsh != 'Imm.Tin' && $finsh != '') {
		if ($sepneed == 1 ){
				 $messagee.=' | '; 	}	
		
		$messagee .='' .$finsh.'';
	}	
	
	if (($color != '' ||$sscolor != '' || $othermarking != '' || $finsh != '' )){
	
	$messagee  =$messagee.'<br clear="all" />';
	}
	

	//4th line
	$sepneed =0 ;	
	
	if($ipcClass != '1' && $ipcClass != '2') {
	$messagee.='IPC Class ' .$ipcClass;
	$sepneed =1 ;
	}
	
	if($impdTol != '+/- 10%'  && $impdTol != '') {
		if ($sepneed == 1 ){
				 $messagee.=' | ';
				
				}
	$messagee.='' .$impdTol.' Impedance Tolerance';
	$sepneed =1 ;
	}
	
	if($routeTol !='' && $routeTol !='+/-.005' ) {
		if ($sepneed == 1 ){
				 $messagee.=' | ';
				
				}
	$messagee.='' .$routeTol.' Overall Dimensions Tolerance';
	$sepneed =1 ;
	}
	if($xoutsallowed !='' && $xoutsallowed !='yes') {
		if ($sepneed == 1 ){
				 $messagee.=' | ';
				
				}
		$messagee.='' .ucfirst($xoutsallowed).' X-Outs Allowed';
		$sepneed =1 ;
	}
	else if($xoutsallowed !='' && $xoutsallowed =='yes') {
		if ($sepneed == 1 ){
				 $messagee.=' | ';
				
				}
		$messagee.='' .$numerxouts.' X-Outs Allowed per Array';
		$sepneed =1 ;
	}	
	
	
if($special_instadmin!=''){
	$messagee.= '<br />'.$special_instadmin.'<br />'; 
	$flag_special_instructions = 1; 
}

if( $flag_special_instructions == 0 ){
	$messagee.='None<br/><br />'; 
} else {
	$messagee.='<br/>';
}//end-if-else-special-instadmin

//end-specialrequirements.

*/
if($rws['comments'] != "") {
$messagee .= '
<strong>Additional Requirements</strong>'.$rws[comments].""; 
}


if($rws[iscancel] == 'no'){ 
$messagee .= '
Invoice: armando@pcbsglobal.com and silvia@pcbsglobal.com <br>
Email working data to: armando@pcbsglobal.com and  isaac@pcbsglobal.com <br>'; 
}

$messagee.='
Please refer any questions to: armando@pcbsglobal.com and  isaac@pcbsglobal.com <br>
</td>
	
</tr>
</table>  

<table width="1500px" border="0">
<tr> 
    <td width="725"  ><hr> </td>  
	
</tr>
</table>  

<table width="1500px" border="0">
<tr> 
    <td  width="125" style="font-size: 10pt;" ></td>  
	<td  width="250"></td>
	<td  width="175" ></td>
	<td  width="100">TOTAL</td>
	<td  width="100"> $'.$tot.'</td>
</tr>

</table> 
<p style="font-size: 8pt"></p>

  
</page>';

//echo "<pre>".$messagee;


 $html2pdf->WriteHTML($messagee);
//echo "test3";
//exit;

 
if ($_REQUEST['oper'] == 'view') {
//	$html2pdf->Output('exemple.pdf');
	$html2pdf->Output('purchaseForm.pdf');

} else {
  
 
	if ($rws[iscancel] != 'yes') {
	 
	$filename="porderpdf/PO-$po-$rws[customer]-$rws[part_no]-$rws[rev]-$rwv[c_shortname] ".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename,'F');
	$filename="PO-$po-$rws[customer]-$rws[part_no]-$rws[rev]-$rwv[c_shortname] ".date("m-d-Y") . ".pdf";
	$dir="/home/pareomic/public_html/pcbsglobal.com/luke-new/upload1/";;
	$html2pdf->Output($filename,'D');
	  
	}
	else {
	 
	$filename="porderpdf/PO-$po-$rws[customer]-$rws[part_no]-$rws[rev]-$rwv[c_shortname]-Cancellation_ ".date("m-d-Y") . ".pdf";
	$html2pdf->Output($filename,'F');
	$filename="PO-$po-$rws[customer]-$rws[part_no]-$rws[rev]-$rwv[c_shortname]-Cancellation_ ".date("m-d-Y") . ".pdf";
	$dir="/home/pareomic/public_html/pcbsglobal.com/luke-new/upload1/";;
	$html2pdf->Output($filename,'D'); 
	  
	}
 
}

?>