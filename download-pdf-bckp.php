<?php require_once('conn.php');
require('../pdfclass/html2fpdf.php');
?>
<?php 
$sqs="select * from order_tb where ord_id='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);
?>
<?php
$path="/home/pareomic/public_html/pcbsglobal.com/luke-pdf/upload/";
$pdf=new HTML2FPDF();
$pdf->AddPage();
$message  ="<table width=920 border=1 align=center cellpadding=1 cellspacing=1 bordercolor=#e6e6e6>
    <tr>
      <td height=30 colspan=3 align=center><strong>Online Request For Quote Form</strong></td>
    </tr>
    <tr>
      <td width=352 height=30><strong>Customer :</strong> 
        <label> $rws[cust_name]</label></td>
      <td width=310><strong>Part Number :</strong> $rws[part_no]</td>
      <td width=240><strong>Rev : </strong> $rws[rev]</td>
    </tr>
    <tr>
      <td height=30><strong>Requested By :</strong> $rws[req_by]</td>
      <td height=30><strong>Email : </strong> $rws[email]</td>
      <td><strong>Phone :</strong>  $rws[phone]</td>
    </tr>
    <tr>
      <td height=30 colspan=3><strong>FAX : </strong> $rws[fax] <strong>Quntity :</strong> $rws[fax]<strong> Lead Times :</strong> 
         $rws[lead_times]      <strong> Quote Needed by:      </strong> $rws[quote_by]</td>
    </tr>
    
    <tr>
      <td height=30 colspan=3><strong>Quntity :</strong> $rws[qty1], $rws[qty2],$rws[qty3],$rws[qty4]</td>
    </tr>
    <tr>
      <td height=30 colspan=3><strong> Lead Times :</strong> $rws[day1], $rws[day2],$rws[day3],$rws[day4]</td>
    </tr>
    <tr>
      <td height=30 colspan=3><strong>SPECIAL INSTRUCTION : </strong></td>
    </tr>
    <tr>
      <td height=30 colspan=3><label> $rws[special_inst]</label></td>
    </tr>
    
    <tr>
      <td height=30><strong>Number of Layers : </strong></td>
      <td height=30><strong>Material Required : </strong></td>
      <td height=30><strong>IPC Class:</strong>  $rws[ipc_class]</td>
    </tr>
    <tr>
      <td height=30> $rws[no_layer]
        <label><br />
      </label></td>
      <td height=30> $rws[m_require]<br />
        <br />
        <strong>Inner Copper Oz: </strong> $rws[inner_copper]<br /></td>
      <td height=30 valign=top><strong>Thickness: </strong> $rws[thickness]<br />
        <br />
      <strong>Thickness Tolerance :</strong>
      <br />
       $rws[thickness_tole]<br />
      <br /></td>
    </tr>
    <tr>
      <td height=30><strong>Plate : </strong></td>
      <td height=30>&nbsp;</td>
      <td height=30><strong>Design Technology : </strong></td>
    </tr>
    <tr>
      <td height=30><strong>Start Cu Oz:</strong> . $rws[start_cu]<br />
<br />
        <br />
        <strong>Plated Cu in Holes (Min.):</strong> . $rws[plated_cu]<br />
        <br />
        <strong>Fingers Nickel/Hard Gold: </strong> $rws[fingers_gold]<br />
        <br /></td>
      <td height=30 valign=top><strong>Trace Min. </strong> $rws[trace_min]
        <br />
        <br />
        <strong>Space Min. </strong> $rws[space_min]<br />
        <br />
        <strong>Controlled Impedance:</strong> $rws[con_impe]<br />
      <br />
      <br />
      <br />
      <strong>Impedance Tolerance :</strong>
      <br />
      <br />
       $rws[tole_impe]<br />
      <td height=30 valign=top><strong>Smallest  Hole Size:</strong> $rws[hole_size]<br /><strong>
        Smallest Pad :</strong> $rws[pad]<br />
        <br />
        <strong>Blind Vias:</strong> $rws[blind]<br />
        <br />
        <strong>Buried Vias: </strong> $rws[buried]<br />
         <br />
        <strong>Blind/Buried Vias:</strong> $rws[bb_both]<br />
	   <br />
<strong>HDI Design:</strong> $rws[hdi_design]</td>
    </tr>
    <tr>
      <td height=30><strong>Finish : </strong></td>
      <td height=30>&nbsp;</td>
      <td height=30>&nbsp;</td>
    </tr>
    <tr>
      <td height=30><strong>Finish: </strong> $rws[finish]</td>
      <td height=30><strong>Mask Sides:</strong>  $rws[mask_side]<br />
        <br />
        <strong>Color:</strong>  $rws[color]<br />
        <br />
        <strong>Mask Type:</strong>  $rws[mask_type]</td>
      <td height=30><strong>S/S Sides:</strong>  $rws[ss_side]<br />
        <br />
        <strong>S/S Color :</strong>  $rws[ss_color]<br />
        <br /></td>
    </tr>
    <tr>
      <td height=30><strong>Fab : </strong></td>
      <td height=30>&nbsp;</td>
      <td height=30>&nbsp;</td>
    </tr>
    <tr>
      <td height=30><strong>Individual Route 1-up: $rws[route]</strong><br />
        <br />
        <strong>Board Size (in.)</strong> 
         $rws[board_size1]
        X
         $rws[board_size2]        <br />
        <br />
        <strong>Array:</strong>  $rws[array]<br />
        <strong>Bds Per Array :</strong> $rws[b_per_array]<br />
        <strong>Array Size:        </strong>
         $rws[array_size1]
X
 $rws[array_size2]	<br />
	<strong>Rout Tolerance :</strong> $rws[route_tole]</td>
      <td height=30><strong>Array Design Provided:</strong> $rws[array_design]<br />
        <strong><br />
        Factory to Design Array: </strong> $rws[design_array]<br />
        <strong>Array Type : </strong> $rws[array_type]<br />
        <br />
        <strong>Array Requires: </strong> $rws[array_require]</td>
      <td height=30><strong>Bevel: </strong> $rws[bevel]<br />
        <br />
        <strong>Countersink:</strong> $rws[countersink]<br />
        <br />
        <strong>Cut Outs:</strong> $rws[cut_outs]<br />
        <br />
        <strong>Slots:</strong> $rws[slots]</td>
    </tr>
    <tr>
      <td height=30><strong>OTHER : </strong></td>
      <td height=30>&nbsp;</td>
      <td height=30>&nbsp;</td>
    </tr>
    <tr>
      <td height=30><strong>Logo:</strong> $rws[logo]<br />
        <br />
        <strong>94V-0 Mark: </strong> $rws[mark]<br />
        <br />
        <strong>Date Code Format:</strong> $rws[date_code]<br>
        <br />
        <strong>Other Marking:       </strong> $rws[other_marking]
      <br /></td>
      <td height=30><strong>Microsection Required :</strong>  $rws[m_require]<br />
        <br />
          <strong>Electrical Test Stamp: </strong> $rws[test_stamp]<br />
          <br />
           $rws[in_board]  $rws[array_rail]</td>
      <td height=30><strong>X-Outs Allowed:</strong> $rws[xouts]<br />
        <br />
        <strong># of X-outs per Array :</strong> $rws[xouts1]<br />
        <strong>RoHS Cert:</strong>  $rws[rohs]</td>
    </tr>
    <tr>
      <td height=30 colspan=3><strong>Total Price : </strong> $rws[price] USD</td>
    </tr>
  </table>";
$pdf->WriteHTML($message);
//$filename=$path."$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
$filename="$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
$pdf->Output($filename,'D');
?>