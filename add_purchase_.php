<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_REQUEST['Submit']))
{
	
	 $dweek= substr($_REQUEST['date1'], 11, strlen($_REQUEST['date1']));  // abcd
	
	/*date1
	$dweek=;*/
	
$sqin="insert into porder_tb(vid,sid,namereq,namereq1,svia,city,state,sterms,rohs,comments,podate,customer,part_no,rev,date1,date2,po,dweek,no_layer,cancharge,ordon,iscancel,ccharge) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['namereq1']."','".$_REQUEST['svia']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['rohs']."','".$_REQUEST['area1']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['part_no']."','".$_REQUEST['rev']."','".$_REQUEST['date1']."','".$_REQUEST['date2']."','".$_REQUEST['po']."','".$dweek."','".$_REQUEST['lyrcnt']."','".$_REQUEST['cancharge']."','".$_REQUEST['ordon']."','".$_REQUEST['iscancel']."','".$_REQUEST['ccharge']."')";

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



 /*
 $tottt=str_replace(',', '', $rwi['tprice']);
 $tot=$tot+number_format($tottt,2,'.','');

*/



//$uprice=number_format($uprice,2);

$tott1=str_replace(',', '', $uprice);
 $up=number_format($tott1,2,'.','');


//$tprice=$qty*$uprice;
$tprice=$qty*$up;
$tprice=number_format($tprice,2);
$uprice=number_format($uprice,2);
//$tprice=number_format($tprice,2,'.','');

$sqs="insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}

header('location:manage_purchase.php');

}

?>

<html><head>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">



<!--
 <script type="text/javascript" src="jquery.js"></script>
	<script type='text/javascript' src='jquery.autocomplete.js'></script>
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />-->
	 
     



<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});
		});
 
	</script> 
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
$j('#txtshow1').html(geturl('getquotedata22.php?pnorev='+qty1));  
}
	

</script>
<script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />





<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>


    <title>Welcome</title>

    <link href="style_Admin.css" rel="stylesheet" type="text/css">

</head><body>



        

        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr>

                <td align="center">

                    <table  border="0" cellpadding="0" cellspacing="1" width="1300">

                        <tbody>

                                                    <tr style="height:20px; background-color:#FFF;"></tr>
                        <tr>
                                <td colspan="2" id="header" style="height:50px;"><!--menu-->
                        &nbsp; &nbsp;<strong>Welcome to Admin Panel</strong>
                                
                               
                                    </td> <!--/menu-->
                            </tr>

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>


                            <tr>

                                

                                <td id="mainpage" style="width: 750px;">

                                    <div>

                                        <table cellpadding="5" cellspacing="1" width="100%">

                                            

                                            <tbody><tr>

                                                

                                            </tr>

                                            <tr>

												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table width="700" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>ADD PURCHASE ORDER FORM</strong></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30" colspan="2"> PCBs Global Incorporated<br>

                                                        2500 E. La Palma Ave.<br>

                                                        Anaheim Ca. 92806<br>

                                                        Phone: (855) 722-7456<br>

                                                      Fax: (855) 262-5305 </td>

                                                    </tr>-->

                                                    
                                                     
     
                                                      
         
          
                
                                                   
                                                    <tr>

                                                      <td width="137" height="30"><strong>Cancellation</strong></td>
                                                       <td width="443" height="30"> <input type="radio" name="iscancel" id="radio12" value="yes">

                                                      Yes
 
                                                      <input type="radio" name="iscancel" id="radio122" checked value="no"> 

                                                      No</td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                    <!-- <tr>

                                                      <td width="137" height="30"> <strong>Charge</strong></td>
                                                       <td width="443" height="30"> <input name="ccharge" type="text" id="ccharge" size="8" /> </td>
                                                    </tr>-->
                                                    
                                                    
                                                    
                                                    <tr>

                                                      <td width="137" height="30">Select Vendor</td>

                                                      <td width="443" height="30"><label>

                                                        <select name="vid" id="vid">

                                                        <?php 

														$sqv="select * from vendor_tb";

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

                                                      <td height="30">Select Shipper</td>

                                                      <td height="30"><select name="sid" id="sid">

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

                                                        <option value="<?php echo $rwv['data_id'];

														?>"><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>

                                                     

                                                                                                            </select></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30"> Name of Requisitioner </td>

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

                                                      <td height="30">City </td>

                                                      <td height="30"><input name="city" type="text" id="city" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">State </td>

                                                      <td height="30"><input name="state" type="text" id="state" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">&nbsp;Shipping Terms :</td>

                                                      <td height="30"><label>

                                                        <select name="sterms" id="sterms">
                                                        
                                                        <option value="Prepaid">Prepaid</option>

                                                        <option value="priority">priority</option>

                                                         <option value="ground"> ground</option>

                                                          <option value="2nd Day">2nd Day</option>

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
                                                     <table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                   <tr>

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_no" type="text" id="part_no" size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" size="30"></td>

                                                    </tr>
                                                     
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev" size="30"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Customer PO#</td>

                                                      <td height="30"><input  name="po" type="text" id="po" size="30"></td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30">Layer Count</td>

                                                      <td height="30"><input name="lyrcnt" id="lyrcnt" /></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30"> Name of Requestor </td>

                                                      <td height="30"><input name="namereq1" type="text" id="namereq1" size="30"></td>

                                                    </tr>

                                                    </table>
                                                    </div>
                                                     <table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
<tr>

                                                      <td height="30">Ordered On</td>

                                                      <td height="30"><input name="ordon" type="text" id="exampleIII" size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Required Dock Date</td>

                                                      <td height="30"><input name="date1" type="text" id="exampleII" size="30"></td>

                                                    </tr>

                                                   <!-- <tr>

                                                      <td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 

                                                        <input name="date2" type="text" id="date2" size="30"></td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">ROHS Cerificate Required</td>

                                                      <td height="30">

                                                        <input type="radio" name="rohs" id="radio" value="yes">

                                                      Yes

                                                      <input type="radio" name="rohs" id="radio2" value="no"> 

                                                      No</td>

                                                    </tr>
                                                     <!--<tr>

                                                      <td height="30">Cancellation charge</td>

                                                      <td height="30">

                                                        <input type="radio" name="cancharge" id="radio12" value="yes">

                                                      Yes

                                                      <input type="radio" name="cancharge" id="radio122" value="no"> 

                                                      No</td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">Comments</td>

                                                      <td height="30">
                                                      
                                                      
                                                      

                                                      
                                                      
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

</label></td>

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

        </tbody></table>

  

</body></html>