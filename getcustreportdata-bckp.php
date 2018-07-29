<?php require_once('conn.php'); 
$cname=$_REQUEST['pnorev'];
//$queryorder="select * from order_tb where cust_name='$cname'";
$queryorder="select * from porder_tb where customer='$cname'";
 
 
 
 $resorder=mysql_query($queryorder);
  if(!$resorder)
  {
  die('error in data');
  }
 
 
 
 

 
 // geting customer id 
$query2="select * from data_tb where c_name='$cname' limit 1";
$result2 = mysql_query($query2) or die();
$row2 = mysql_fetch_object($result2);
$custid = $row2->data_id; 
$cussname = $row2->c_name; 
 
  ?>

  
                                                
                                                
                                                							 
			<table  border="1" width="950px" align="center"   bordercolor="#e6e6e6" style="color:#FFF; border-spacing:0px;">
                                                    
                                                    <tr style="color:#FFF; background-color: #369;">
                                                      <td style="color:#FFF; text-align:center" width="135px" height="30"><strong>Part #</strong> </td>
                                                       <td style="color:#FFF; text-align:center" width="35px" height="30"><strong>REV</strong></td>
                                                       <td style="color:#FFF; text-align:center" width="120px" height="30"><strong>Due date</strong></td>
                                                        <td style="color:#FFF; text-align:center" width="80px" height="30"><strong>SOLD FOR</strong>	 </td>
                                                         <td style="color:#FFF;text-align:center" width="100px" height="30"> <strong>OUR COST</strong>	 </td>
                                                          <td style="color:#FFF; text-align:center" width="100px" height="30"><strong>Delivered</strong> </td>
                                                          
                                                           <td style="color:#FFF;text-align:center" width="180px" height="30"><strong>Delivered To</strong></td>
                                                        <td style="color:#FFF;text-align:center" width="150px" height="30"> <strong>Ordered By</strong>	 </td>
                                                         <td style="color:#FFF;text-align:center" width="100px" height="30"> <strong>Cust PO</strong>	 </td>
                                                          <td style="color:#FFF;text-align:center" width="100px" height="30"><strong>Our PO</strong> </td>

                                                    

                                                    </tr>
                                                    
                                                   
                                                    					 
								 
 <?php
 $tt=0;
 while($rworder=mysql_fetch_array($resorder))
  { 
  
  if ($tt % 2 != 0) # An odd row
    $rowColor = "#3282DA";
  else # An even row
    $rowColor = "#F4F5FD"; 
  
  
// echo $rworder['ord_id'].'<br>';
$rev =  $rworder['rev'];
$cust_name =  $rworder['cust_name'];
$pno =  $rworder['part_no'];
$cpo =  $rworder['cpo'];
$opo =  $rworder['opo'];

$req_by=  $rworder['req_by'];
$ord_id=  $rworder['ord_id'];




$query3="select * from invoice_tb where (( part_no='$pno') and (rev='$rev')  and (customer='$cussname')   ) limit 1";
$result3 = mysql_query($query3) or die();
$row3= mysql_fetch_object($result3);
$invid = $row3->invoice_id; 
$date1 = $row3->date1;
$delto = $row3->delto;





  $sqi="select * from invoice_items_tb where pid='".$invid."'";

  $resi=mysql_query($sqi);

  if(!$resi)

  {

  die('error in data');

  }

  $tot=0;

 while($rwi=mysql_fetch_array($resi))

  {  $tottt=str_replace(',', '', $rwi['tprice']);
 $tot=$tot+number_format($tottt,2,'.','');

  }

 $tot=str_replace(',', '',  $tot);

 $tot=number_format($tot,2,'.', '');

$st =number_format($rws['saletax'],4 );
$taxx = $tot*$st;
$taxx=str_replace(',', '',$taxx);
     $taxx=number_format($taxx,2);
	  $fcharg=number_format($rws['fcharge'],2);
	 
	 
 $tot2=   $fcharg+$tot+$taxx ;
  $tot2=number_format($tot2,2);
   $tot=number_format($tot,2);



?>


 <?php
												   $query33="select * from porder_tb where (( part_no='$pno') and (rev='$rev')  and (customer='$cussname')   ) limit 1";
$result33 = mysql_query($query33) or die();
$row33= mysql_fetch_object($result33);
$poid = $row33->poid; 
$po = $row33->po; 
$date11 = $row33->date1;
$ponum = $poid + 9933 ;

												    $sqi33="select * from items_tb where pid='".$poid."'";
													//echo  $sqi;

  $resi33=mysql_query($sqi33);

  if(!$resi33)

  {

  die('error in data');

  }

  $tot33=0;

 
 
 
 
 while($rwi33=mysql_fetch_array($resi33))

  { 
$tottt33=str_replace(',', '', $rwi33['tprice']);
 
 $tot33=$tot33+number_format($tottt33,2,'.','');

  }




$tot33=number_format($tot33,2);
  
												   
												   ?>
                                                    <tr bgcolor="<?php echo  $rowColor  ?>">

                                                      <td height="30"><?php echo $pno; ?> </td>
                                                      <td style="text-align:center" height="30"><?php echo $rev; ?></td>
                                                       <td style="text-align:center" height="30"><?php echo substr($date11, -10);  ?></td>
                                                        <td style="text-align:right" height="30"><?php echo  $tot2; ?>	 </td>
                                                         <td style="text-align:right" height="30"> <?php echo $tot33; ?></td>
                                                          <td style="text-align:center" height="30"><?php echo substr($date1, -10); ?> </td>
                                                          
                                                           <td height="30"><?php echo $delto; ?></td>
                                                        <td height="30">
														
														
														<a href="" onclick="return popitup('reqbyinfo.php?id=<?php echo  $ord_id; ?>')"
	><?php echo  $req_by; ?>	</a>
														
														 </td>
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         <td height="30"> <?php echo $po ?> </td>
                                                          <td height="30"><?php echo $ponum; ?> </td>

                                                    

                                                    </tr>
                                                    

                                                    
                                                  
                                                    
                                                  
                                                   
                                                    <?php
 
 $tt++;
}
   ?>  </table>
