<?php require_once('conn.php'); 
//require('../pdfclass/html2fpdf.php');
require('../pdftest/html2pdf.class.php');
?>
<?php
/*$path="/home/ktvegas1/public_html/mywebzone.biz/luke-pdf/upload/";*/

/*$pdf=new HTML2FPDF();

$pdf->AddPage();
*/
  $html2pdf = new HTML2PDF('P','A4','en');
$messagee  ='

<page>


<br>
<table width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="100"></td>
	<td> 
	</td>
    </tr>
  </table> 
  
<table  width="1500px" border="0">
   <tr> 
    <td>
	<strong>PCBs Global Incorporated</strong> 
	

<br>

2500 E. La Palma Ave.<br>

Anaheim Ca. 92806<br>

Phone: (855) 722-7456<br>

Fax: (855) 262-5305<br>	
	</td>  
	<td width="250"></td>
	<td> 
	
	</td>
    </tr>
  </table>  

  
<table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="400">CERTIFICATE OF COMPLIANCE</td>  
</tr>
</table>
</td>
</tr>
</table>

<p style="font-size: 10pt">
We certify that the parts shipped herewith, have been manufactured using materials and processes that conform to specifications as called out on your Purchase Order and associated documents.  Furthermore, the chemical, physical, and electrical properties of materials and processes used in the manufacture these parts are UL approved. UL certificates are available for examination, upon request.</p>
<table cellspacing="8" border="0">
<tr>
	<td>Customer: <input type="text" size="2" ></td>
	<td>Part Number: <input type="text" size="2" ></td>
	<td>Rev: <input type="text" size="2" ></td>
</tr>
<tr>
	<td>Date Code: <input type="text" size="2" ></td>
	<td>Customer P.O: <input type="text" size="2" ></td>
	<td>Ship Qty: <input type="text" size="2" ></td>
</tr>
<tr>
	<td></td><td colspan="2">Other Control Docs: <input type="text" style="width: 340px"></td>
</tr>
</table>	

<br>
<table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="400">RoHS COMPLIANCE CERTIFICATE</td>  
</tr>
</table>
</td>
</tr>
</table>
 
 
  
    <p style="font-size: 10pt">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  

  Authorized Signature for <br> <br> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	 C of C, RoHS Compliance and Certificate of E/T:<input type="text" size="2" >   Date:<input type="text" size="2" ><br><br>
  The signature above certifies that the printed circuit boards indicated in this certificate have been manufactured in compliance with the European Union’s Restriction of Hazardous Substances directive, 2002/95/EC(RoHs). Specifically, these parts do not contain the following restricted substances above the threshold limits as specified in the following list:	
	</p>
  <table width="1500px" border="0">
<tr>
<td width="150"></td>  
<td width="500">
<table width="500px" border="1">
   <tr style="text-align:center"> 
    <td   align="center"   width="250">Restricted Substance</td>  
	 <td   align="center"   width="250">Maximum Limit</td> 
</tr>
 <tr style="text-align:center"> 
    <td   align="center"   width="250">Lead (Pb)</td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>
 <tr style="text-align:center"> 
    <td   align="center"   width="250">Mercury (Hg)</td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>
<tr style="text-align:center"> 
    <td   align="center"   width="250">Hexavalent Chromium (Cr VI) </td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>
<tr style="text-align:center"> 
    <td   align="center"   width="250">Cadmium (Cd)</td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>
<tr style="text-align:center"> 
    <td   align="center"   width="250">Polybrominated biphenyls (PBB)</td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>
<tr style="text-align:center"> 
    <td   align="center"   width="250">Polybrominated diphenylethers (PBDE)</td>  
	 <td   align="center"   width="250">0.1% w/w concentration</td> 
</tr>


</table>
</td>
</tr>
</table>


<br>

 <table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="400">CERTIFICATE OF ELECTRICAL TEST</td>  
</tr>
</table>
</td>
</tr>
</table>



  <p style="font-size: 10pt">
This is to certify that all parts shipped herewith have passed electrical testing at the parameters indicated below (excluding solder samples and X-out boards). Boards that pass electrical test are marked as such, on the individual board or array, unless otherwise specified by the customer or prohibited by part size or density.<br><br>


	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Qty Tested:<input type="text" size="2" >Qty Passed:<input type="text" size="2" > Tested By:<input type="text" size="2" > <br><br> Date:<input type="text" size="2" >

Test Voltage (V)<input type="text" size="2" > Test Current (ma)<input type="text" size="2" > <br><br> Resistance :<input type="text" size="2" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Isolation Resistance (MegaOhms):<input type="text" size="2" ></p>

  </page>
  ';
  
 $html2pdf->WriteHTML($messagee);
 $html2pdf->Output('exemple.pdf');
  
 
  
  
/*$filename="qa.pdf";
$html2pdf->Output($filename,'F');
$filename="qa.pdf";

$html2pdf->Output($filename,'D');*/
  



?>