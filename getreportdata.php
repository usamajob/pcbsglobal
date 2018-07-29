<?php require_once('conn.php'); 


$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];
$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2





$query="select * from order_tb where (( part_no='$pno') and (rev='$rev')) limit 1";
/*echo $query;
exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 
$req_by = $row->req_by;



$query2="select * from data_tb where c_name='$name' limit 1";
$result2 = mysql_query($query2) or die();
$row2 = mysql_fetch_object($result2);
 $custid = $row2->data_id; 
 $cussname = $row2->c_name; 




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
$date11 = $row33->date1;
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

<table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                    
                                                    <tr>

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_noooo" type="text" id="part_no" value="<?php echo $pno; ?>"  size="30"></td>

                                                    </tr>
                                                    
                                                    <tr>

                                                      <td height="30">Customer </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $name; ?>"   size="30"></td>
                                                       <td height="30">Due Date: </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $date11; ?>"   size="30"></td>

                                                    </tr>
                                                     
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>
                                                       <td height="30">Ordered By: </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $req_by; ?>"   size="30"></td>

                                                    </tr>

                                                    
                                                     <tr>

                                                      <td height="30">Our Order#</td>

                                                      <td height="30"><input name="oo" type="text" id="oo" value="<?php echo $opo; ?>" size="30"></td>
                                                       <td height="30">Delivered On: </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $date1; ?>"   size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Your Order#</td>

                                                      <td height="30"><input name="po" type="text" id="po" value="<?php echo $cpo; ?>" size="30"></td>
                                                       <td height="30">Delivered To: </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $delto; ?>"   size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Sold For</td>

                                                      <td height="30"><input name="sfo" type="text" id="sfo" value="<?php echo  $tot2; ?>" size="30"></td>

                                                    </tr>
                                                  
                                                   
                                                   
                                                   
                                                   
                                                   
                                                    <tr>

                                                      <td height="30">Our Cost</td>

                                                      <td height="30"><input name="oct" type="text" id="oct" value="<?php echo $tot33; ?>" size="30"></td>

                                                    </tr>
                                                    
                                                    </table>
                                                    
                                                    <table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                     <tr>

                                                   
                                                    <td  colspan="4" align="center"><strong>Main Contacts</strong></td>

                                                   
                                                

                                                  </tr>
 <tr>

                                                   
                                                    <td width="247" height="30" align="center"><strong> Name</strong></td>

                                                    <td width="107" align="center"><strong>Last Name</strong></td>
                                                    <td width="107" align="center"><strong>Phone</strong></td>
                                                            
                                                            <td width="107" align="center"><strong>Email</strong></td>


                                                

                                                  </tr>
                                                    
                                 <?php                   
								 $sqs="select * from maincont_tb where coustid='".$custid."'";
								 
								 $res1=mysql_query($sqs,$conn);

if(!$res1)

{

//die('error in data'.mysql_error());



}
  while($rwc=mysql_fetch_array($res1))

												  {

	?>
                                                 
                                                 
                                                 
                                                  <tr>

                                                  
                                                    <td height="30" align="center"><?php echo $rwc['name'];?></td>

                                                    <td align="center"><?php echo $rwc['lastname'];?></td>
                                                    <td align="center"><?php echo $rwc['phone'];?></td>
                                                     <td align="center"><?php echo $rwc['email'];?></td>

                                                  

                                                  </tr>

                                                  <?php 
 }
												  

												  ?>

                                                </table>
                                                <table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                     <tr>

                                                   
                                                    <td  colspan="4" align="center"><strong>Engg Contacts</strong></td>

                                                   
                                                

                                                  </tr>
 <tr>

                                                   
                                                            <td width="247" height="30" align="center"><strong> Name</strong></td>
                                                            <td width="107" align="center"><strong>Last Name</strong></td>
                                                            <td width="107" align="center"><strong>Phone</strong></td>
                                                            
                                                            <td width="107" align="center"><strong>Email</strong></td>


                                                   

                                                

                                                  </tr>
                                                    
                                 <?php                   
								 $sqs="select * from enggcont_tb where coustid='".$custid."'";
								 
								 $res1=mysql_query($sqs,$conn);

if(!$res1)

{

//die('error in data'.mysql_error());



}
  while($rwc=mysql_fetch_array($res1))

												  {

	?>
                                                 
                                                 
                                                 
                                                  <tr>

                                                  
                                                    <td height="30" align="center"><?php echo $rwc['name'];?></td>
<td align="center"><?php echo $rwc['lastname'];?></td>
                                                    <td align="center"><?php echo $rwc['phone'];?></td>
                                                     <td align="center"><?php echo $rwc['email'];?></td>
                                                      

                                                  

                                                  </tr>

                                                  <?php 
 }
												  

												  ?>

                                                </table>
                                                							 
								 
								 
