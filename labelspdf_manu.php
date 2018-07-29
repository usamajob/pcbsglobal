<?php require_once('conn.php'); 
require('../pdftest/html2pdf.class.php');

$html2pdf = new HTML2PDF('P','Letter','en');

$cname = $_POST['cname'];
$partno = $_POST['partno'];
$mpn_rev = $_POST['mpn_rev'];

$dc = $_POST['dc'];
$po = $_POST['po']; 

$qty = $_POST['qty']; 
$lbls = $_POST['lbls'];			
$startpos = $_POST['startpos'];			
  
$messagee = '
<page><br>
<table border="0" align="center" cellspacing="0">';

for ($i = 1; $i < $startpos; $i++) {
	$messagee .= '<tr><td colspan="2" style="height: 144px"><br></td></tr>'; 
}

$messagee .= '<tr>'; 	 
	 
for ($i = 1; $i <= $lbls; $i++) {

if ($i % 2 == 1 && $i != 1)
	$messagee .= '</tr><tr>'; 

$messagee .= '
<td style="height: 144px; width: 290px">
<table border="0">
<tr> 
	<td><br><img src="http://pcbsglobal.com/luke-new/admin/logo1.jpg" alt="PCBsGlobal Inc. Logo"></td> 

	<td><br><br>
	<table border="0" style="font-size: 10pt">
  
	<tr> 
		<td><strong style="font-size: 11pt">Customer: </strong>'.$cname.'</td>
	</tr>

	<tr> 
		<td><strong style="font-size: 11pt">P/N / Rev: </strong>'.$partno.'</td>	
    </tr> 

	<tr> 
		<td><strong style="font-size: 11pt">MPN & Rev: </strong>'.$mpn_rev.'</td>	
    </tr> 

	<tr> 
		<td><strong style="font-size: 11pt">Date Code: </strong>'.$dc.'</td>	
    </tr>
			
	<tr> 
		<td><strong style="font-size: 11pt">PO: </strong>'.$po.'</td>	
    </tr> 

	<tr> 
		<td><strong style="font-size: 11pt">Quantity: </strong>'.$qty.'</td>
    </tr> 

	</table><br><br>
</td> 
</tr> 
</table> 	 

</td>';

if ($i % 2 == 1) $messagee .= '<td style="width: 8px"></td>';

}

  
$messagee .= '
 </tr> 
	 </table>
  </page>';
      
$html2pdf->WriteHTML($messagee);
$html2pdf->Output('exemple.pdf');
?>