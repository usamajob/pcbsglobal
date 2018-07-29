<?php require_once('conn.php'); 


$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];
$cname = $pieces[2];
$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2





$query="select * from order_tb where (( part_no='$pno') and (rev='$rev')and (cust_name='$cname')) limit 1";
/*echo $query;
exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 
$req_by = $row->req_by;

$lyrcnt= $row->no_layer; 
$cancharge= $row->cancharge; 



$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$po = $row11->poid; 
//$ypo = $row11->po; 
if ($po>0)
$po=$po+9933;
else 
$po='';
/*echo $po;
exit;*/
$query223="select * from data_tb where c_name='$cname' limit 1";
$result223 = mysql_query($query223) or die();
$row223= mysql_fetch_object($result223);

 
$data_id = $row223->data_id; 


$query22="select * from packing_tb where (( part_no='$pno') and (rev='$rev')and (customer='$data_id')) limit 1";
$result22 = mysql_query($query22) or die();
$row22 = mysql_fetch_object($result22);

 
$ypo = $row22->po; 


?>


<table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;">
                                                    
                                                    <tr>

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_no" type="text" id="part_no" value="<?php echo $pno; ?>"  size="30"></td>
                                                    </tr>
                                                    
                                                    <tr>

                                                      <td height="30">Customer </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $name; ?>"   size="30"></td>
                                                    </tr>
                                                     
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>
                                                    </tr>

                                                    
                                                     <tr>

                                                      <td height="30">Our PO#</td>

                                                      <td height="30"><input name="oo"  type="text" id="oo" value="<?php echo $po; ?>" size="30"></td>
                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer PO#</td>

                                                      <td height="30"><input  name="po" type="text" id="po" value="<?php echo $ypo; ?>" size="30">
                                                      
                                                      
                                                       <input type="hidden" name="cancharge" id="cancharge" value="<?php echo $cancharge; ?>" />                                                      </td>
                                                    </tr>
                                                     <tr>

                                                      <td height="30">Ordered by</td>

                                                      <td height="30"><input name="ord_by" type="text" id="ord_by" value="<?php echo $req_by; ?>"  size="30"></td>
                                                    </tr>
                                                     <tr>

                                                      <td height="30">Layer Count</td>

                                                      <td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $lyrcnt; ?>" /></td>
                                                    </tr>
                                                     <tr>
                                                       <td height="30">Inv Id</td>
                                                       <td height="30"><select name="invid" id="invid">
                                                       <?php 
													   $sqi="select * from invoice_tb where (part_no='".$pno."' and rev='".$rev."')";
													   $resi=mysql_query($sqi);
													   if(!$resi)
													   {
													   die('error in data');
													   }
													   while($rwi=mysql_fetch_array($resi))
													   {
													   ?>
                                                       <option value="<?php echo $rwi['invoice_id']+9976; ?>"><?php echo $rwi['invoice_id']+9976; ?></option>
                                                       <?php 
													   }
													   ?>
                                                       </select>
                                                       </td>
                                                     </tr>
                                                    </table>
