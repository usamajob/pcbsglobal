<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

function MysqlCopyRow($TableName, $IDFieldName, $IDToDuplicate) {
if ($TableName AND $IDFieldName AND $IDToDuplicate > 0) {
$sql = "SELECT * FROM $TableName WHERE $IDFieldName = $IDToDuplicate";
$result = @mysql_query($sql);
if ($result) {
$sql = "INSERT INTO $TableName SET ";
$row = mysql_fetch_array($result);
$RowKeys = array_keys($row);
$RowValues = array_values($row);
for ($i=3;$i<count($RowKeys);$i+=2) {
if ($i!=3) { $sql .= ", "; }

 if ($RowKeys[$i]=='iscancel') {
$sql .= $RowKeys[$i] . " = '" .'yes' . "'";

}
else if ($RowKeys[$i]=='customer') {
$sql .= $RowKeys[$i] . " = '" . $RowValues[$i].'-C' . "'";

}
else if ($RowKeys[$i]=='ccharge') {
$sql .= $RowKeys[$i] . " = '" . $_REQUEST['ccharge'] . "'";

}
else{
$sql .= $RowKeys[$i] . " = '" . $RowValues[$i] . "'";	
	
}
}
$result = @mysql_query($sql);
}
}
}










if(isset($_REQUEST['Submit']))
{$dweek= substr($_REQUEST['date1'], -10);  // abcd



 $rest = substr($_REQUEST['customer'], -2);  

if ($rest!='-C'){
	
 $iscancel='no';


if ($_REQUEST['iscancel']=='yes'){


$ProductID = $_REQUEST['id']; //The id of the product you want to copy
MysqlCopyRow("porder_tb","poid",$ProductID);	
	
	
	$cnid1=mysql_insert_id($conn);
	
	for($i=1;$i<=6;$i++)

{

$item=$_REQUEST['item_'.$i];

$itemdesc=$_REQUEST['desc_'.$i];

$qty=$_REQUEST['qty_'.$i];

$uprice=$_REQUEST['uprice_'.$i];

if($item!="")

{


//$qty=number_format($qty,2);
$uprice=number_format($uprice,2);

$tprice=$qty*$uprice;
$tprice=number_format($tprice,2);

$sqs="insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid1."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}
	}
	
	
	}
	
	
	
	
	else {
		
		for($i=1;$i<=6;$i++)
	//	for($i=6;$i>=1;$i--)

{

$item=$_REQUEST['item_'.$i];

$itemdesc=$_REQUEST['desc_'.$i];

$qty=$_REQUEST['qty_'.$i];

$uprice=$_REQUEST['uprice_'.$i];

if($item!="")

{


//$qty=number_format($qty,2);
$uprice=number_format($uprice,2);

$tprice=$qty*$uprice;
$tprice=number_format($tprice,2);

$sqs="insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}
		 $iscancel='yes';
	}
 

$sqin="update porder_tb set vid='".$_REQUEST['vid']."',sid='".$_REQUEST['sid']."',namereq='".$_REQUEST['namereq']."',namereq1='".$_REQUEST['namereq1']."',svia='".$_REQUEST['svia']."',city='".$_REQUEST['city']."',state='".$_REQUEST['state']."',sterms='".$_REQUEST['sterms']."',rohs='".$_REQUEST['rohs']."',comments='".$_REQUEST['comments']."',customer='".$_REQUEST['customer']."',part_no='".$_REQUEST['part_no']."',rev='".$_REQUEST['rev']."',date1='".$_REQUEST['date1']."',date2='".$_REQUEST['date2']."',dweek='".$dweek."',po='".$_REQUEST['po']."',no_layer='".$_REQUEST['lyrcnt']."' ,ordon='".$_REQUEST['ordon']."',iscancel='".$iscancel."',ccharge='".$_REQUEST['ccharge']."' where poid='".$_REQUEST['id']."'"; /*$sqin="insert into invoice_tb(vid,sid,namereq,svia,fcharge,city,state,sterm,comments,podate,customer,date1,dweek,po,our_ord_num,saletax) values('".$_REQUEST['vid']."','".$_REQUEST['sid']."','".$_REQUEST['namereq']."','".$_REQUEST['svia']."','".$_REQUEST['fcharge']."','".$_REQUEST['city']."','".$_REQUEST['state']."','".$_REQUEST['sterms']."','".$_REQUEST['comments']."','".date('m/d/Y')."','".$_REQUEST['customer']."','".$_REQUEST['date1']."','".$_REQUEST['dweek']."','".$_REQUEST['po']."','".$_REQUEST['oo']."','".$_REQUEST['stax']."')";
*/
$resin=mysql_query($sqin);
$cnid=$_REQUEST['inid'];
if(!$resin)
{
die('error in data');
}

if ($_REQUEST['iscancel']=='no'){

$sqin11="DELETE FROM items_tb WHERE pid=".$cnid;
mysql_query($sqin11);
/*$cnid=mysql_insert_id($conn);
*/
//for($i=1;$i<=6;$i++)
for($i=6;$i>=1;$i--)


{
$item=$_REQUEST['item_'.$i];

$itemdesc=$_REQUEST['desc_'.$i];

$qty=$_REQUEST['qty_'.$i];

$uprice=$_REQUEST['uprice_'.$i];

if($item!="")

{


//$qty=number_format($qty,2);
$uprice=number_format($uprice,2);

$tprice=$qty*$uprice;
$tprice=number_format($tprice,2);

$sqs="insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}
}
else if (($rest=='-C')and(($_REQUEST['iscancel']=='yes'))) {
	$sqin11="DELETE FROM items_tb WHERE pid=".$cnid;
mysql_query($sqin11);
/*$cnid=mysql_insert_id($conn);
*/
for($i=1;$i<=6;$i++)
{
$item=$_REQUEST['item_'.$i];

$itemdesc=$_REQUEST['desc_'.$i];

$qty=$_REQUEST['qty_'.$i];

$uprice=$_REQUEST['uprice_'.$i];

if($item!="")

{


//$qty=number_format($qty,2);
$uprice=number_format($uprice,2);

$tprice=$qty*$uprice;
$tprice=number_format($tprice,2);

$sqs="insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$item."','".$itemdesc."','".$qty."','".$uprice."','".$tprice."','".$cnid."')";

$ress=mysql_query($sqs);

if(!$ress)

{

die('errro');

}

}

}
	
	}
header('location:manage_purchase.php');
}



$sqs="select * from porder_tb where poid ='".$_REQUEST['id']."'";

$res=mysql_query($sqs);

if(!$res)

{

die('error in data');

}

$rws=mysql_fetch_array($res);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Purchase</title>
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

    <link href="style_Admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />


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
$j('#txtshow1').html(geturl('getquotedata22.php?pnorev='+qty1));  
}
	
</script>

<?php
$dweek22= substr($rws['ordon'], -10); 
?>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true , 'defaultDate': '<?php echo $rws['date1'];  ?>', });});
</script>

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleIII', { 'theme': 'default red',  'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true ,
					  'defaultDate': '<?php echo $dweek22;  ?>', 
					  
					  
					  
					  
					  });});
</script>

<script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
	
	function cleartable () {
	//alert('asdf');

document.getElementsByName('item_1').item(0).value='';
document.getElementsByName('item_2').item(0).value='';
document.getElementsByName('item_3').item(0).value='';
document.getElementsByName('item_4').item(0).value='';
document.getElementsByName('item_5').item(0).value='';
document.getElementsByName('item_6').item(0).value='';

document.getElementsByName('desc_1').item(0).value='';
document.getElementsByName('desc_2').item(0).value='';
document.getElementsByName('desc_3').item(0).value='';
document.getElementsByName('desc_4').item(0).value='';
document.getElementsByName('desc_5').item(0).value='';
document.getElementsByName('desc_6').item(0).value='';

document.getElementsByName('qty_1').item(0).value='';
document.getElementsByName('qty_2').item(0).value='';
document.getElementsByName('qty_3').item(0).value='';
document.getElementsByName('qty_4').item(0).value='';
document.getElementsByName('qty_5').item(0).value='';
document.getElementsByName('qty_6').item(0).value='';

document.getElementsByName('uprice_1').item(0).value='';
document.getElementsByName('uprice_2').item(0).value='';
document.getElementsByName('uprice_3').item(0).value='';
document.getElementsByName('uprice_4').item(0).value='';
document.getElementsByName('uprice_5').item(0).value='';
document.getElementsByName('uprice_6').item(0).value='';

}
</script>
</head><body>



        

        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr>

                <td align="center">

                    <table border="0" cellpadding="0" cellspacing="1" width="1300">

                        <tbody>

                           
                                                    <tr style="height:20px; background-color:#FFF;"></tr>
                        <tr>
                                <td colspan="2" id="header" style="height:50px;"><!--menu-->
                        &nbsp; &nbsp;<strong class="titleWelcome">Welcome to Admin Panel</strong>
                                
                               
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
                                              <td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php"><br />
                                              <br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

												<td style="line-height: 16px;"><form name="form1" method="post" action="">
<input name="inid" id="inid" type="hidden" value="<?php echo $rws['poid'];?>" >
                                                  <p>&nbsp;</p>

                                                  <table class="purchase" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>EDIT PURCHASE ORDER FORM</strong></td>
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
                                                       <td width="443" height="30"> <input onSelect="cleartable();" onChange="cleartable();" <?php if($rws['iscancel']=='yes'){?> checked <?php } ?> type="radio" name="iscancel" id="radio12" value="yes">

                                                      Yes

                                                      <input type="radio" <?php if($rws['iscancel']=='no'){?> checked <?php } ?> name="iscancel" id="radio122" value="no"> 

                                                      No</td>
                                                    </tr>
                                                    
                                                    
                                                    
                                                   <!--  <tr>

                                                      <td width="137" height="30"> <strong>Charge</strong></td>
                                                       <td width="443" height="30"> <input value="<?php // echo $rws['ccharge'];?>" name="ccharge" type="text" id="ccharge" size="8" /> </td>
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

														?>" <?php if($rwv['data_id']==$rws['vid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

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

														?>" <?php if($rwv['data_id']==$rws['sid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>

                                                     

                                                                                                            </select></td>
                                                    </tr>

                                                    <tr>

                                                      <td height="30"> Name of Requisitioner  </td>

                                                      <td height="30"><input name="namereq" type="text" id="namereq" value="<?php echo $rws['namereq'];?>" size="30"></td>
                                                    </tr>
                                                     


                                                    <tr>

                                                      <td height="30">Ship Via</td>

                                                      <td height="30"><select name="svia" id="svia">

                                                        <option <?php if($rws['svia']=='Fedex'){?> selected <?php } ?> value="Fedex">Fedex</option>

                                                        <option <?php if($rws['svia']=='UPS'){?> selected <?php } ?> value="UPS"> UPS</option>
                                                        
                                                        <option <?php if($rws['svia']=='Personal Delivery'){?> selected <?php } ?> value="Personal Delivery"> Personal Delivery</option>
                                                        
                                                        <option <?php if($rws['svia']=='Elecronic Data'){?> selected <?php } ?> value="Elecronic Data"> Elecronic Data</option>

                                                      </select></td>
                                                    </tr>

                                                    

                                                    <tr>

                                                      <td height="30">City </td>

                                                      <td height="30"><input name="city" type="text" id="city" value="<?php echo $rws['city'];?>" size="30"></td>
                                                    </tr>

                                                    <tr>

                                                      <td height="30">State </td>

                                                      <td height="30"><input name="state" type="text" id="state" value="<?php echo $rws['state'];?>" size="30"></td>
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
                                                        $sqi="select * from items_tb where pid='".$rws['poid']."'";

  $resi=mysql_query($sqi);

  if(!$resi)

  {

  die('error in data');

  }

  $tot=0;
  $i=1;

  while($rwi=mysql_fetch_array($resi))

  { ?>
  

                                                       
     
                                                        <tr>

                                                          <td height="30"><label>

                                                            <input name="item_<?php echo $i;?>" type="text" value="<?php echo $rwi[item];?>"  id="itemname[]" size="30">

                                                          </label></td>

                                                          <td height="30"><input name="desc_<?php echo $i;?>" value="<?php echo $rwi[itemdesc];?>" type="text" id="desc[]" size="30"></td>

                                                          <td height="30"><input name="qty_<?php echo $i;?>" value="<?php echo $rwi[qty2];?>" type="text" id="qty[]" size="20"></td>

                                                          <td height="30"><input name="uprice_<?php echo $i;?>" value="<?php echo $rwi[uprice];?>" type="text" id="uprice[]" size="20"></td>
                                                        </tr>
                                                  
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
     <?php 
$i++;
														
														
														}

														?>                                                    
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                        <?php 

														for(;$i<=6;$i++)

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

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_no" type="text" id="part_no"  value="<?php echo $rws['part_no'];?>" size="30"></td>
                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer </td>

                                                      <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $rws['customer'];?>" size="30"></td>
                                                    </tr>
                                                   
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev"  value="<?php echo $rws['rev'];?>" size="30"></td>
                                                    </tr>


                                                    <tr>

                                                      <td height="30">Customer PO#</td>

                                                      <td height="30"><input name="po" type="text" id="po" value="<?php echo $rws['po'];?>" size="30"></td>
                                                    </tr>
                                                     <tr>

                                                      <td height="30">Layer Count</td>

                                                      <td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $rws['no_layer']; ?>" /></td>
                                                    </tr>
                                                    <tr>

                                                      <td height="30"> Name of Requestor  </td>

                                                      <td height="30"><input name="namereq1" type="text" id="namereq1" value="<?php echo $rws['namereq1'];?>" size="30"></td>
                                                    </tr>
                                                    </table>
                                                    </div>
                                                     <table class="purchase" width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:30px;">
                                                    <!--<tr>

                                                      <td height="30">Date of week</td>

                                                      <td height="30"><input name="dweek" type="text" id="dweek" value="<?php // echo $rws['dweek'];?>" size="30"></td>

                                                    </tr>-->
<tr>

                                                      <td height="30">Ordered On</td>

                                                      <td height="30"><input name="ordon" type="text" id="exampleIII" size="30"></td>
                                                    </tr>
                                                    <tr>

                                                      <td height="30"> Required Dock Date</td>

                                                      <td height="30"><input  name="date1" type="text" value="<?php echo $rws['date1'];?>" id="exampleII"  size="30"></td>
                                                    </tr>

                                                   
                                                     <tr>

                                                      <td height="30">ROHS Cerificate Required</td>

                                                      <td height="30">

                                                        <input type="radio" name="rohs" id="radio" <?php  if ($rws['rohs']=='yes') echo 'checked';?>  value="yes">

                                                      Yes

                                                      <input type="radio" name="rohs" id="radio2" <?php  if ($rws['rohs']=='no') echo 'checked';?> value="no"> 

                                                      No</td>
                                                    </tr>
                                                     <!--<tr>

                                                      <td height="30">Cancellation charge</td>

                                                      <td height="30">

                                                        <input type="radio" name="cancharge" id="radio12" <?php //  if ($rws['cancharge']=='yes') echo 'checked';?>  value="yes">

                                                      Yes

                                                      <input type="radio" name="cancharge" id="radio122" <?php //  if ($rws['cancharge']=='no') echo 'checked';?> value="no"> 

                                                      No</td>

                                                    </tr>-->

                                                   <!-- <tr>

                                                      <td height="30" colspan="2">Boards to dock in desinationon Day , 0000/00/00 

                                                        <input name="date2" type="text" id="date2" size="30"></td>

                                                    </tr>-->

                                                    

                                                    <tr>

                                                      <td height="30">Comments</td>

                                                      <td height="30"><label>

                                                        <textarea name="comments" id="comments" cols="45" rows="5"><?php echo $rws['comments'];?></textarea>

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

												</form>												</td>
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