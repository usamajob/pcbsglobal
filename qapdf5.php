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
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo_.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
	<td width="100"></td>
	<td></td>
	<td> 
	
		<strong>PCBs Global Incorporated</strong> 
	

<br>

2500 E. La Palma Ave.<br>

Anaheim Ca. 92806<br>

Phone: (855) 722-7456<br>

Fax: (855) 262-5305<br>	
	</td>
    </tr>
  </table> 
  
<table  width="1500px" border="0">
   <tr> 
    <td>

	</td>  
	<td width="250"></td>
	<td> 
	
	</td>
    </tr>
  </table>  
 <span style="text-align:center;font-size: 11pt">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Customer:</strong>____________________ <strong>Part No:</strong>____________________   <strong>Rev:</strong>_______ <strong>Date:</strong>____________ <br>
</span>
<table width="1500px" border="0">
<tr>
<td width="25"></td>  
<td width="675">
<table width="675" border="0">
   <tr style="background-color:#506BBC;color:#FFF;text-align:center;font-size: 12pt;"> 
    <td   align="center"   width="675">SINGLE ENDED IMPEDANCE DATA REPORT</td>  
</tr>
</table>
</td>
</tr>
</table>

 
  <table width="1500px" border="0">
<tr>
<td width="25"></td> 
<td width="1400px">
<table width="1400px" border="1">

<tr style="text-align:center"> 

<td colspan="11"   align="center"  >Measurements are in Ohms</td> 
</tr>
<tr style="text-align:center; height:1px; font-size: 9pt;"> 
<td   align="center"   width="75">Layer No:</td>  
<td   align="center"   width="50">&nbsp;</td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 

</tr>
<tr style="text-align:center; height:1px; font-size: 9pt;"> 
<td   align="center"   width="75">Specs/Tol:</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px; font-size: 9pt;"> 
<td   align="center"   width="75">Test No. 1</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px; font-size: 9pt;"> 
<td   align="center"   width="75">2</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">3</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">4</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">5</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">6</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">7</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">8</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">9</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">10</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">11</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">12</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">13</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">14</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">15</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">Average</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
</table>
</td>
</tr>
</table>

<table width="1500px" border="0">
<tr>
<td width="25"></td>  
<td width="650">
<table width="650" border="0">
<tr > 
    <td   align="center"   width="675">
	<br>
	</td>  
</tr>
   <tr style="background-color:#506BBC;color:#FFF;text-align:center;font-size: 12pt;"> 
    <td   align="center"   width="675">DIFFERENTIAL IMPEDANCE DATA REPORT</td>  
</tr>
</table>
</td>
</tr>
</table>
 
  
  <table width="1500px" border="0">
<tr>
<td width="25"></td> 
<td width="1400px">
<table width="1400px" border="1">

<tr style="text-align:center"> 

<td colspan="11"   align="center"  >

Measurements are in Ohms</td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">Layer No:</td>  
<td   align="center"   width="50">&nbsp;</td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 

</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">Specs/Tol:</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">Test No. 1</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">2</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">3</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">4</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">5</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">6</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">7</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">8</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">9</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">10</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">11</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">12</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">13</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td>
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">14</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">15</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
<tr style="text-align:center; height:1px;font-size: 9pt;"> 
<td   align="center"   width="75">Average</td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td>  
<td   align="center"   width="50"></td> 
<td   align="center"   width="50"></td> 
</tr>
</table>
</td>
</tr>
</table>
  </page>
  ';
  
 $html2pdf->WriteHTML($messagee);
 $html2pdf->Output('exemple.pdf');
  
 
  
  
/*$filename="qa.pdf";
$html2pdf->Output($filename,'F');
$filename="qa.pdf";

$html2pdf->Output($filename,'D');*/
  



?>