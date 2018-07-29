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
<br><br>
  
<table width="1500px" border="0">
<tr>
<td width="25"></td>  
<td width="700">
<table width="700px" border="0">
   <tr style="background-color:#656BBC;color:#FFF;text-align:center;font-size: 16pt;"> 
    <td   align="center"   width="700">CERTIFICATE OF LAMINATE MATERIALS COMPLIANCE</td>  
</tr>
</table>
</td>
</tr>
</table>

  <p style="text-align:center;font-size: 10pt">
We certify that the following base laminate material specified below was used in the manufacture 
of parts indicated on your <br><br>  Purchase Order No.<input type="text" size="20" >, and associated documents. <br><br>
Part Number:<input type="text" > Revision:<input type="text" > <br> <br>    &nbsp;&nbsp;&nbsp; Date Code:<input type="text" > Qty Shipped:<input type="text" >      

</p>
 <hr>
   <p style="text-align:center;font-size: 10pt">

 
 Laminate Materials Manufacturer:<input type="text" >         Type: <input type="text" size="2" >  <br>  <br> 

<strong>Copper Laminate</strong>:<br><br> 

Oz<input type="text" >     Lot No.<input type="text" >    <br>  <br> 

Oz<input type="text" >    Lot No.<input type="text" >    <br>  <br> 

Oz<input type="text" >    Lot No.<input type="text" >     <br> <br> 
Oz<input type="text" >    Lot No.<input type="text" >     <br> <br> 
Oz<input type="text" >    Lot No.<input type="text" >     <br> <br> 




                           	<strong>Prepreg</strong> <br><br> 

Lot No.<input type="text" size="2" >   <br>  <br> 

Lot No.<input type="text" size="2" >   <br>  <br> 
Lot No.<input type="text" size="2" >   <br><br>
Lot No.<input type="text" size="2" >   <br><br>

Lot No.<input type="text" size="2" >   <br><br> <br> 





                                       
Authorized Signature:<input type="text" size="2" > Date:<input type="text" size="2" >    <br><br>  



Note: All copper ounces are before plating.                                                               

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