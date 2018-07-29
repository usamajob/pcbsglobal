<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<table width="690" border="0">

	<tr>

	  <td width="202" height="30">Item</td>

	  <td width="225" height="30">Description</td>

	  <td width="140" height="30">QTY shipped</td>

	  <td width="105" height="30">Unit Price </td>
	</tr>
 <?php
 $sqgt="select * from packing_tb where po='".$_REQUEST['po']."'";
 $resgt=mysql_query($sqgt);
 if(!$resgt)
 {
 die('error in data');
 }
 $rwgt=mysql_fetch_array($resgt);
                                                        $sqi="select * from packing_items_tb where pid='".$rwgt['invoice_id']."'";

  $resi=mysql_query($sqi);

  if(!$resi)

  {

  die('error in data');

  }

  $tot=0;
  $i=1;
if(mysql_num_rows($resi)>0)
{
  while($rwi=mysql_fetch_array($resi))

  { ?>
  

                                                       
     
                                                        <tr>

                                                          <td height="30"><label>

                                                            <input name="item_<?php echo $i;?>" type="text" value="<?php echo $rwi[item];?>"  id="itemname[]" size="30">

                                                          </label></td>

                                                          <td height="30"><input name="desc_<?php echo $i;?>" value="<?php echo $rwi[itemdesc];?>" type="text" id="desc[]" size="30"></td>

                                                          <td height="30"><input name="qty_<?php echo $i;?>" value="<?php echo $rwi[uprice];?>" type="text" id="qty[]" size="20"></td>

                                                          <td height="30"><input name="uprice_<?php echo $i;?>" type="text" id="uprice[]" size="20"></td>
                                                        </tr>
                                                  
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
     <?php 
$i++;
														
														
														}
														}

														?>                                                    
                                                       
                                                       
                                                       <?php
													if(mysql_num_rows($resi)<6 && mysql_num_rows($resi)>0) 
													{
													   $rm=mysql_num_rows($resi)+1;
													   //echo $rm;
													   //if($rm!=6)
													   
													   	for($j=$rm;$j<=6;$j++)

														{

														?>
    

                                                        <tr>

                                                          <td height="30"><label>

                                                            <input name="item_<?php echo $j;?>" type="text" id="itemname[]" size="30">

                                                          </label></td>

                                                          <td height="30"><input name="desc_<?php echo $j;?>" type="text" id="desc[]" size="30"></td>

                                                          <td height="30"><input name="qty_<?php echo $j;?>" type="text" id="qty[]" size="20"></td>

                                                          <td height="30"><input name="uprice_<?php echo $j;?>" type="text" id="uprice[]" size="20"></td>

                                                        </tr>

                                                        <?php 

														}

														?>

                                                        <?php 

													}

														?>
                                                       
                                                       
                                                       
                                                        <?php 
if(mysql_num_rows($resi)==0)
{
														for($j=1;$j<=6;$j++)

														{

														?>
    <?php 


														?>

                                                        <tr>

                                                          <td height="30"><label>

                                                            <input name="item_<?php echo $j;?>" type="text" id="itemname[]" size="30">

                                                          </label></td>

                                                          <td height="30"><input name="desc_<?php echo $j;?>" type="text" id="desc[]" size="30"></td>

                                                          <td height="30"><input name="qty_<?php echo $j;?>" type="text" id="qty[]" size="20"></td>

                                                          <td height="30"><input name="uprice_<?php echo $j;?>" type="text" id="uprice[]" size="20"></td>

                                                        </tr>

                                                        <?php 

														}

														?>

                                                        <?php 

													}

														?>
                                                      </table>
