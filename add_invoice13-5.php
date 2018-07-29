<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_REQUEST['Submit']))
{
	$dweek= substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1'])); 
$sqin="insert into invoice_tb(vid,sid,namereq,svia,fcharge,city,state,sterm,comments,podate,customer,part_no,rev,delto,ord_by,date1,dweek,po,our_ord_num,saletax,no_layer) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['svia']."','".$_REQUEST['fcharge']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['area1']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['part_no']."','".$_REQUEST['rev']."','".$_REQUEST['delto']."','".$_REQUEST['ord_by']."','".$_REQUEST['date1']."','".$dweek."','".$_REQUEST['po']."','".$_REQUEST['oo']."','".$_REQUEST['stax']."','".$_REQUEST['lyrcnt']."')";

$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data');

}


$cnid=mysql_insert_id($conn);

for($i=1;$i<=6;$i++)

{

$item=$_REQUEST['item_'.$i];

$itemdesc=$_REQUEST['desc_'.$i];

$qty=$_REQUEST['qty_'.$i];

$uprice=$_REQUEST['uprice_'.$i];

if($item!="")

{


//$qty=number_format($qty,2);
$uprice=str_replace(',', '', $uprice);
 

$uprice= number_format($uprice,2,'.','');

$tprice=$qty*$uprice;

$tprice=str_replace(',', '', $tprice);

$tprice=number_format($tprice,2,'.','');



$sqs="insert into invoice_items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}



header('location:manage_invoice.php');

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Invoice</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/IE-7.css"/>
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="css/IE-8.css" />
<![endif]-->
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/IE-9.css" />
<![endif]-->

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();
	jQuery(document).ready(function(){
		$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});	
	}); 
</script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 
<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript">
	function geturl(addr) {  
var r = $j.ajax({  
 type: 'GET',  
 url: addr,  
 async: false  
}).responseText;  
return r;  
}  
  
function test() {
	
qty1=document.getElementById('part_no11').value;
//alert(qty1);
//alert(document.getElementById('part_no').value);
qty1=document.getElementById('part_no11').value;
//alert(qty1);
$j('#txtshow1').html(geturl('getquotedata.php?pnorev='+qty1));  
}
	

</script>
<script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>


</head><body>


        

        <table border="0" cellpadding="0" cellspacing="0" width="100%">

          <tr>

                <td align="center">

                    <table border="0" cellpadding="0" cellspacing="1" width="1300">

                        <tbody>

                                                    <tr style="height:20px; background-color:#FFF;"></tr>
                        

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>

                            </tr>

                            <tr>

                                
                                <td id="mainpage" style="width: 750px;">

                                    <div>

                                        <table cellpadding="5" cellspacing="1" width="100%">

                                            

                                            <tbody><tr>

                                                

                                            </tr>

                                            <tr>
 <td valign="top" style="line-height: 16px;"><a href="welcome.php">
 Welcome To Admin Panel <br />
                                                <br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>
												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>ADD INVOICE FORM</strong></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30" colspan="2"> PCBs Global Incorporated<br>

                                                        2500 E. La Palma Ave.<br>

                                                        Anaheim Ca. 92806<br>

                                                        Phone: (855) 722-7456<br>

                                                      Fax: (855) 262-5305 </td>

                                                    </tr>-->

                                                    <tr>

                                                      <td width="137" height="30">Sold to</td>

                                                      <td width="443" height="30"><label>

                                                        <select name="vid" id="vid">

                                                        <?php 

														$sqv="select * from data_tb ORDER BY c_name";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>

                                                        <option value="<?php echo $rwv['data_id'];

														?>"><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>

                                                      </select>

                                                      </label></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Shipped to</td>

                                                      <td height="30"><select name="sid" id="sid">

                                                       <?php 

														$sqv="select * from data_tb ORDER BY c_name";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>

                                                        <option value="c<?php echo $rwv['data_id'];

														?>"><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>
                                                         <option disabled value=""> --------- Shippers List ------------</option>
                                                         <?php 

														$sqv="select * from shipper_tb";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>

                                                        <option value="s<?php echo $rwv['data_id'];

														?>"><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>


                                                     

                                                                                                            </select></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30"> Sales Rep </td>

                                                      <td height="30"><input name="namereq" type="text" id="namereq" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Ship Via</td>

                                                      <td height="30"><select name="svia" id="svia">

                                                        <option value="Fedex">Fedex</option>

                                                        <option value="UPS"> UPS</option>
                                                        
                                                        <option value="Personal Delivery"> Personal Delivery</option>
                                                        
                                                        <option value="Elecronic Data"> Elecronic Data</option>

                                                      </select></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30"> Freight Charge</td>

                                                      <td height="30"><input name="fcharge" type="text" id="fcharge" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">City </td>

                                                      <td height="30"><input name="city" type="text" id="city" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">State </td>

                                                      <td height="30"><input name="state" type="text" id="state" size="30"></td>

                                                    </tr>
                                                  
                                                  
                                                    <tr>

                                                      <td height="30">Shipping Terms :</td>

                                                      <td height="30"><label>

                                                        <select name="sterms" id="sterms">

                                                        <option value="Prepaid">Prepaid</option>

                                                         <option value="Collect"> Collect</option>

                                                         

                                                      </select>

                                                      </label></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="2"><table width="690" border="0">

                                                        <tr>

                                                          <td width="202" height="30">Item</td>

                                                          <td width="225" height="30">Description</td>

                                                          <td width="140" height="30">QTY</td>

                                                          <td width="105" height="30">Unit Price </td>

                                                        </tr>

                                                        <?php 

														for($i=1;$i<=6;$i++)

														{

														?>

                                                        <tr>

                                                          <td height="30"><label>

                                                            <input name="item_<?php echo $i;?>" type="text" id="itemname[]" size="30">

                                                          </label></td>

                                                          <td height="30"><input name="desc_<?php echo $i;?>" type="text" id="desc[]" size="30"></td>

                                                          <td height="30"><input name="qty_<?php echo $i;?>" type="text" id="qty[]" size="20"></td>

                                                          <td height="30"><input name="uprice_<?php echo $i;?>" type="text" id="uprice[]" size="20"></td>

                                                        </tr>

                                                        <?php 

														}

														?>

                                                      </table></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30"> Lookup ID </td>

                                                      <td height="30">
                                                      
                                                      <input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
                                                      <!--<input name="part_no" type="text" id="part_no" size="30">--></td>

                                                    </tr>
                                                   </table>
                                                    <div id="txtshow1">
                                                     <table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">


                                                    <tr>

                                                      <td height="30">Customer </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" size="30"></td>

                                                    </tr>
 <tr>

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_no" type="text" id="part_no" size="30"></td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev" size="30"></td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30">Our PO#</td>

                                                      <td height="30"><input  name="oo" type="text" id="oo" size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer PO#</td>

                                                      <td height="30"><input  name="po" type="text" id="po" size="30"></td>

                                                    </tr>
                                                      <tr>

                                                      <td height="30">Ordered by</td>

                                                      <td height="30"><input name="ord_by" type="text" id="ord_by" size="30"></td>

                                                    </tr>
                                                    
                                                     <tr>

                                                      <td height="30">Layer Count</td>

                                                      <td height="30"><input name="lyrcnt" id="lyrcnt" /></td>

                                                    </tr>
                                                     </table>
                                                    </div>
                                                     <table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
                                                    
                                                    

                                                  <!--  <tr>

                                                      <td height="30">Date of week</td>

                                                      <td height="30"><input name="dweek" type="text" id="dweek" size="30"></td>

                                                    </tr>-->

                                                    
                                                    <tr>

                                                      <td height="30">Delivered to</td>

                                                      <td height="30"><input name="delto" type="text" id="delto" size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Delievered On</td>

                                                      <td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>

                                                    </tr>

                                                   <!-- <tr>

                                                      <td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 

                                                        <input name="date2" type="text" id="date2" size="30"></td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">Sales Tax</td>

                                                      <td height="30">

                                                        <input name="stax" type="text" id="stax" size="30">

                                                      </td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Comments</td>

                                                      <td height="30">
                                                       <!--<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
//]]>
</script>-->
                                                      <label>

                                                        <textarea name="area1" id="area1" cols="45" rows="5"></textarea>

                                                      </label></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30" colspan="2"> Micro section and cross section report required with shipment.<br>

                                                        Certificate of compliance required<br>

                                                        Inspection report required<br>

                                                        Test certificate required<br>

                                                        Solder sample required<br>

                                                        Invoice:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:silvia@pcbsglobal.com" target="_blank">silvia@pcbsglobal.com</a><br>

                                                        Email working data to:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:isaac@pcbsglobal.com" target="_blank">isaac@pcbsglobal.com</a><br>

                                                      Please refer any questions to:&nbsp;<a href="mailto:armando@pcbsglobal.com" target="_blank">armando@pcbsglobal.com</a>&nbsp;and&nbsp;<a href="mailto:isaac@pcbsglobal.com" target="_blank">isaac@pcbsglobal.com</a> </td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="2">

                                                        <input type="submit" name="Submit" id="Submit" value="Submit">

&nbsp;                                                    <label>

<input type="reset" name="button2" id="button2" value="Reset">

</label><a href="welcome.php">Go back to front page</a></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>

                                                  </table>

                                                  <p>&nbsp;</p>

                                                  <p>&nbsp;</p>

                                                  <p>&nbsp;</p>

                                                  <p>&nbsp;</p>

												</form>

												</td>

											</tr>                                           

                                        </tbody></table>

                                    </div>

                                </td>

                            </tr>

                           

                        </tbody>

                    </table>

                </td>

            </tr>

       </table>

  

</body></html>