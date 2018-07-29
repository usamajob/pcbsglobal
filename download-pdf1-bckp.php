<?php require_once('conn.php'); 
require('../pdfclass/html2fpdf.php');
?>
<?php 
$sqs="select * from porder_tb where poid='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);
?>
<?php
$path="/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";
$pdf=new HTML2FPDF();
$pdf->AddPage();
$message  ="<style type=text/css>
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {
	color: #8394C9;
	font-weight: bold;
}
-->
</style>
<table width=900  align=center border=1>
  <tr>
    <td height=220 colspan=5><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg width=200 height=220></td>
  </tr>
  <tr>
    <td height=30 colspan=5 align=center bgcolor=#8394C9>Purchase Order</td>
  </tr>
  
  <tr>
    <td width=206 height=30>&nbsp;</td>
    <td width=195>&nbsp;</td>
    <td width=160>&nbsp;</td>
    <td width=161 align=right>Date: </td>
    <td width=156>$rws[podate]&nbsp;</td>
  </tr>
  <tr>
    <td height=30>&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30 align=right>PO #</td>
    <td height=30>$rws[poid]&nbsp;</td>
  </tr>
 <tr>
    <td height=30 colspan=5 align=left><strong>PCBs Global Incorporated</strong>
<br>
2500 E. La Palma Ave.<br>
Anaheim Ca. 92806<br>
Phone: (855) 722-7456<br>
Fax: (855) 262-5305<br>	</td>
  </tr>
    <tr>
    <td height=30 colspan=5>&nbsp;</td>
  </tr>";
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

 $message.="
 <tr>
    <td height=30 colspan=2 bgcolor=#8394C9>Vendor</td>
    <td height=30>&nbsp;</td>
    <td height=30 colspan=2 bgcolor=#8394C9>Ship to </td>
  </tr>
  <tr>
    <td height=30>Vendor : </td>
    <td height=30>$rwv[c_name]&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>Shipper</td>
    <td height=30>$rws1[c_name]&nbsp;</td>
  </tr>
  <tr>
    <td height=30>Street Address</td>
    <td height=30>$rwv[c_address]<br>
    $rwv[c_address2]<br>
    $rwv[c_address3]&nbsp;    &nbsp;      &nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>Street Address</td>
    <td height=30>$rws1[c_address]<br>
$rws1[c_address2]<br>
$rws1[c_address3]&nbsp;    &nbsp;      &nbsp;</td>
  </tr>
  <tr>
    <td height=30>phone</td>
    <td height=30>$rwv[c_phone]&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>Phone</td>
    <td height=30>$rws1[c_phone]&nbsp;</td>
  </tr>
  <tr>
    <td height=30>fax</td>
    <td height=30>$rwv[c_fax]&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>fax</td>
    <td height=30>$rws1[c_fax]&nbsp;</td>
  </tr>
  <tr>
    <td height=30>website</td>
    <td height=30>$rwv[c_website]&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>website</td>
    <td height=30>$rws1[c_website]&nbsp;</td>
  </tr>
  <tr>
    <td height=30 colspan=5>&nbsp;</td>
  </tr>
  <tr>
    <td height=30 colspan=2 align=center bgcolor=#8394C9>REQUISITIONER</td>
    <td height=30 align=center bgcolor=#8394C9>Ship Via</td>
    <td height=30 align=center bgcolor=#8394C9>FOB</td>
    <td height=30 align=center bgcolor=#8394C9>Shipping Terms</td>
  </tr>
  <tr>
    <td height=30 colspan=2 align=center>$rws[namereq]&nbsp;</td>
    <td height=30 align=center>$rws[svia]&nbsp;</td>
    <td height=30 align=center>$rws[city]&nbsp;,$rws[state]&nbsp;</td>
    <td height=30 align=center>$rws[sterms]&nbsp;</td>
  </tr>
  <tr>
    <td height=30 colspan=5>&nbsp;</td>
  </tr>
  <tr>
    <td height=30 align=center bgcolor=#8394C9>ITEM</td>
    <td height=30 align=center bgcolor=#8394C9>Description</td>
    <td height=30 align=center bgcolor=#8394C9> qty</td>
    <td height=30 align=center bgcolor=#8394C9>Unit Price</td>
    <td height=30 align=center bgcolor=#8394C9>Total</td>
  </tr>
  ";
    $sqi="select * from items_tb where pid='".$rws['poid']."'";
  $resi=mysql_query($sqi);
  if(!$resi)
  {
  die('error in data');
  }
  $tot=0;
  while($rwi=mysql_fetch_array($resi))
  {
   $message.="
  <tr>
    <td height=30 align=center>$rwi[item]&nbsp;</td>
    <td height=30 align=center>$rwi[itemdesc]&nbsp;</td>
    <td height=30 align=center>$rwi[qty2]&nbsp;</td>
    <td height=30 align=center>$rwi[uprice]&nbsp;</td>
    <td height=30 align=center>$rwi[tprice]&nbsp;</td>
  </tr>";
  $tot=$tot+number_format($rwi['tprice'],2);
  }
  $message.="
   <tr>
    <td height=30>&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30>&nbsp;</td>
    <td height=30 align=center>Grand Total : </td>
    <td height=30 align=center>$tot&nbsp;</td>
  </tr>
  <tr>
    <td height=30 colspan=5><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>Customer</td>
    <td height=30><span class=style3>$rws[customer]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>PO#</td>
    <td height=30><span class=style3>$rws[po]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>Day of week</td>
    <td height=30><span class=style3>$rws[dweek]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>Date</td>
    <td height=30><span class=style3>$rws[date1]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>Boards to dock in desination on Day ,0000/00/00 </td>
    <td height=30><span class=style3>$rws[date2]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30><span class=style3>ROHS Required : </td>
    <td height=30><span class=style3>$rws[rohs]&nbsp;</td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
    <td height=30><span class=style3></td>
  </tr>
  <tr>
    <td height=30 colspan=5><span class=style3><strong>Other  Comments or Special Instructions</strong>: </td>
  </tr>
  <tr>
    <td height=30 colspan=5><span class=style3>$rws[comments]&nbsp;</td>
  </tr>
   <tr>
    <td height=30 colspan=5 align=left><span class=style3>
 Micro section and cross section report required with shipment.<BR>
Certificate of compliance required<br>
Inspection report required<br>
Test certificate required<br>
Solder sample required<br>
Invoice: <b>armando@pcbsglobal.com and silvia@pcbsglobal.com</b> <br>
Email working data to: <b>armando@pcbsglobal.com and isaac@pcbsglobal.com </b><br>
Please refer any questions to: <b>armando@pcbsglobal.com and isaac@pcbsglobal.com</b></td>
  </tr>
</table>";
$pdf->WriteHTML($message);
//$filename=$path."$rws[cust_name]-$rws[part_no]-$rws[rev] ".date("m-d-Y H:i:s") . ".pdf";
$filename="Purchase-ORDER".date("m-d-Y H:i:s") . ".pdf";
$pdf->Output($filename,'D');
?>

