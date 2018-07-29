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
  
  $cname = $_REQUEST['cname'];
    $partno = $_REQUEST['partno'];
	
	    $dc = $_REQUEST['dc'];
		    $po = $_REQUEST['po']; 
			
			$qty = $_REQUEST['qty']; 
			$lbls = $_REQUEST['lbls'];
			
			
  
$messagee  ='

<page>


<br>
<table border="0">
   <tr> 
    
 ';
	
	
	  
 
	 
	 
	 for ($i=1; $i<=$lbls; $i++){

 if (($i==3)or($i==5)or($i==7)or($i==9))
$messagee  .='
 </tr><tr>
'; 
$messagee  .='
<td>
 <table border="0">
   <tr> 
   
   <td ><br><br><img align="middle" src=http://pcbsglobal.com/luke-new/admin/logo1.jpg" width="40px" height="30px" alt="PCBsGlobal Inc. Logo"></td> 
   
   <td ><br><br><br><br>
<table style="font-size: 10pt"  width="1000" border="0">
  
 
  
  <tr> 
    <td   style="font-size: 10pt"><strong>Customer</strong></td>
	<td style="font-size: 10pt" width="30"></td> 
	<td   style="font-size: 10pt" ><input size="3" maxlength="3" type="text" size="3" value="'.$cname.'" ></td>
	
    </tr>

<tr> 
    <td style="font-size: 10pt"><strong>Part #</strong></td>  
		<td style="font-size: 10pt" width="30"></td> 

	<td style="font-size: 10pt"><input type="text" size="2" value="'.$partno.'" ></td>
	
    </tr> 
	<tr> 
    <td style="font-size: 10pt"><strong>D/C</strong></td>  
		<td style="font-size: 10pt" width="30"></td> 

	<td style="font-size: 10pt" ><input type="text" size="2" value="'.$dc.'" ></td>
	
    </tr> 
	<tr> 
    <td style="font-size: 10pt"><strong>PO #</strong></td>  
		<td style="font-size: 10pt" width="30"></td> 

	<td  style="font-size: 10pt"><input type="text" size="2" value="'.$po.'" ></td>
	
    </tr> 
	<tr> 
    <td style="font-size: 10pt"><strong>QTY</strong></td> 
		<td style="font-size: 10pt" width="30"></td> 

	<td style="font-size: 10pt" ><input type="text" size="2" value="'.$qty.'" ></td>
	
    </tr> 
	 </table><br>
	 </td> 
	 </tr> 
	 </table> 
	 
	 
	 
	 </td> ';
	 
	
}
  
$messagee .='
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