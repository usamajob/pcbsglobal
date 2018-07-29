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



<table  width="1500px" border="0">
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
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 14pt;"> 
    <td   align="center"   width="400">Microsection Analysis</td>  
</tr>
</table>
</td>
</tr>
</table>

  <table width="1500px" border="0">
<tr>
<td width="100"></td>  
<td width="500">
<table style="font-size: 10pt;" width="500px" border="1">
   <tr style="text-align:center"> 
    <td   align="center"   width="125"><strong>Customer:</strong></td> 
	<td   align="center"   width="125"><input type="text" ></td> 
	 <td   align="center"   width="125"><strong>Part Number:</strong></td> 
	<td   align="center"   width="125"><input type="text" ></td> 

</tr>
 <tr style="text-align:center"> 
    <td   align="center"   width="125"><strong>Rev:</strong></td>  
	<td   align="center"   width="125"><input type="text" ></td> 

<td   align="center"   width="125"><strong>Date Code:</strong></td> 
	<td   align="center"   width="125"><input type="text" ></td> 

</tr>
 <tr style="text-align:center"> 
    <td   align="center"   width="125"></td>  
	<td   align="center"   width="125">(all dims. are in inches)</td> 

<td   align="center"   width="125"><strong>IPC Class:</strong></td> 
	<td   align="center"   width="125"><input type="text" ></td> 

</tr>



</table>
</td>
</tr>
</table>
 
 
 <table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 14pt;"> 
    <td   align="center"   width="400">External Copper Thickness</td>  
</tr>
</table>
</td>
</tr>
</table>

  <table width="1500px" border="0">
<tr>
<td width="100"></td>  
<td width="500">
<table style="font-size:8pt;" width="500px" border="1">
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>(Check One)</strong></td> 
<td   align="center"   width="125"><strong>Starting Foil</strong></td> 
<td   align="center"   width="125"><strong>Minmum Requirement</strong></td> 
<td   align="center"   width="125"><strong>Actual Measurement</strong></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">1/2 oz</td> 
<td   align="center"   width="125">0,0006</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">1.0 oz</td> 
<td   align="center"   width="125">0,0012</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">2.0 oz</td> 
<td   align="center"   width="125">0,0024</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">1/4 oz</td> 
<td   align="center"   width="125">0,0003</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">Other:</td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>



</table>
</td>
</tr>
</table>

 
 <table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 14pt;"> 
    <td   align="center"   width="400">Plated Copper in Holes</td>  
</tr>
</table>
</td>
</tr>
</table>

  <table width="1500px" border="0">
<tr>
<td width="100"></td>  
<td width="500">
<table style="font-size:8pt;" width="500px" border="1">
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>(Check One)</strong></td> 
<td   align="center"   width="125"><strong>Specification</strong></td> 
<td   align="center"   width="125"><strong>Minimum Thickness</strong></td> 
<td   align="center"   width="125"><strong>Actual Measurement</strong></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">IPC Minimum
</td> 
<td   align="center"   width="125">.000787</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">1.0 oz</td> 
<td   align="center"   width="125">.001217</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">.0010</td> 
<td   align="center"   width="125">.0010</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>

<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">.0014</td> 
<td   align="center"   width="125">.0014</td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><input type="checkbox" ></td> 
<td   align="center"   width="125">Other:</td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>



</table>
</td>
</tr>
</table>

<table width="1500px" border="0">
<tr>
<td width="125"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 14pt;"> 
    <td   align="center"   width="500">Innerlayer Thicknesses Including Copper</td>  
</tr>
</table>
</td>
</tr>
</table>

  <table width="1500px" border="0">
<tr>
<td width="100"></td>  
<td width="500">
<table style="font-size:8pt;" width="500px" border="1">
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>Core #1</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><strong>Core #5</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>Core #2</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><strong>Core #6</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>Core #3</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><strong>Core #7</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="125"><strong>Core #4</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
<td   align="center"   width="125"><strong>Core #8</strong></td> 
<td   align="center"   width="125"><input type="text" ></td> 
</tr>



</table>
</td>
</tr>
</table>

 <table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="400">Notes</td>  
</tr>
</table>
</td>
</tr>
</table>
 
 
  
    <span style="font-size: 10pt">
This microsection has been inspected and passed for the above conditions, as well as: 			
Subsurface Imperfections, such as <br> <br> delamination, laminate voids/cracks.			
Plated -through hole anomalies, including annular ring, plating voids/cracks/nodules, resin			
smear, etchback, wicking and innerlayer separation.			
Internal conductor anonmalies, such as over/under etch, conductor cracks/voids, inadequate			
oxide treatment, and foil thickness.			

	</span>
 




 <table width="1500px" border="0">
<tr>
<td width="175"></td>  
<td width="500">
<table width="500px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="400">Authorization</td>  
</tr>
</table>
</td>
</tr>
</table>



  <p style="font-size: 10pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Date:<input type="text" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Analysis By:<input type="text" >

</p>

  </page>
  ';
  
 $html2pdf->WriteHTML($messagee);
 $html2pdf->Output('exemple.pdf');
  
 
  
  
/*$filename="qa.pdf";
$html2pdf->Output($filename,'F');
$filename="qa.pdf";

$html2pdf->Output($filename,'D');*/
  



?>