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
<table  width="1500px" border="0">
   <tr> 
    <td><img src=http://pcbsglobal.com/luke-new/admin/images/logo.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td>  
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
  
<table width="1500px" border="0">
<tr>
<td width="25"></td>  
<td width="700">
<table width="700px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="700">INSPECTION REPORT</td>  
</tr>
</table>
</td>
</tr>
</table>

  <span style="text-align:center;font-size: 10pt">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customer:______________ Part No:____________________   Rev:_______ Date:________ Inspector:____________<br><br>

UL Mark:_____________ Date Code:___________ Specifications:_______________  Class: ___________<br><br>
Material Type:____________________	Oz:_______ 
Mat Thick Spec:____________ Actual Thick:____________<br><br>
Solder Mask Color:_________	S/S Color:_________	S/S Comp Side: <input type="checkbox"> Yes	<input type="checkbox">No &nbsp;&nbsp; S/S Solder Side:	<input type="checkbox">Yes	<input type="checkbox">No <br><br>

Final Finish Type:____________________	Final Finish Thick:_________<span style="font-size: 8pt;"> Note: Unless otherwise required, HASL thickness is N/A</span> <br><br>

Gold Fingers (Tips) Thickness Au:_____  µin	&nbsp;&nbsp;&nbsp;&nbsp;Ni:_____µin   &nbsp;&nbsp;Bevel(°):_____ &nbsp;&nbsp;&nbsp;&nbsp;V-score Angle(°):_____ 	&nbsp;&nbsp;Web:______ <br><br> Flatness per IPC-TM-650 Result:_________________ <br><br>

</span>
  <table width="1500px" border="0">
<tr>

<td width="1400px">
<table width="1400px" border="1">
 <tr style="text-align:center"> 
    <td   align="center" colspan="5"   ><strong>HOLE SIZES</strong></td>  
	 <td   align="center" colspan="5"   ><strong>DIMENSIONS</strong></td> 
	  
</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">Symbol</td>  
<td   align="center"   width="65">Size</td> 
<td   align="center"   width="65">Tolerance</td> 
<td   align="center"   width="65">Actual</td> 
<td   align="center"   width="65">Acc/Rej</td> 
<td   align="center"   width="65">Item</td>  
<td   align="center"   width="65">Size</td> 
<td   align="center"   width="65">Tolerance</td> 
<td   align="center"   width="65">Actual</td> 
<td   align="center"   width="65">Acc/Rej</td> 
</tr>
<tr style="text-align:center; height:1px;"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>

<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

</tr>
<tr style="text-align:center"> 
<td   align="center"   width="65">&nbsp;</td>  
<td   align="center"   width="65">&nbsp;</td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 
<td   align="center"   width="65"></td>  
<td   align="center"   width="65"></td> 

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