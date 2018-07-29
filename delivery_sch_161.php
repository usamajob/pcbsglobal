<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); 

function frmt_datestr($dd)
{
	$dd_parts = explode('/',$dd);
	return $dd_parts[2].'-'.$dd_parts[0].'-'.$dd_parts[1];
}

$st_date = $en_date = '';
if(isset($_GET['st_date'])&&isset($_GET['en_date'])){
	$st_date = frmt_datestr($_GET['st_date']);
	$en_date = frmt_datestr($_GET['en_date']);
}	
	if(isset($_REQUEST['btncus']))
	{
	$srchc =$_REQUEST['srchc'];
	$sqs="select * from corder_tb where customer='".$srchc."'";
	
	}
	else if(isset($_REQUEST['btnpart']))
	{
	
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	$cname = $pieces[2];
	

	$sqs="select * from corder_tb where part_no ='".$pno."'";
	//echo $sqls;
	//$sqs.=" ORDER BY poid desc LIMIT $offset, $rowsPerPage ";
	/*$ponm =$_REQUEST['srch']-9992;
	$sqs="select * from corder_tb where poid ='".$ponm."'";

	$sqs.=" ORDER BY poid desc LIMIT $offset, $rowsPerPage ";*/
	}



?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Search Orders </title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="sort.js"></script> 
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#srch').autocomplete({source:'getordcsrch.php', minLength:1});
			$j('#srchc').autocomplete({source:'getordcsrchc.php', minLength:1});
		});
 	</script>
<script type="text/javascript">	
		$(function(){
			var dates = $( "#st_date, #en_date" ).datepicker({
				numberOfMonths: 1,
				dateFormat:'mm/dd/yy',			
				beforeShow: function( ) {
					var other = this.id == "st_date" ? "#en_date" : "#st_date";
					var option = this.id == "st_date" ? "maxDate" : "minDate";
					var selectedDate = $(other).datepicker('getDate');
					
					$(this).datepicker( "option", option, selectedDate );
				}
			}).change(function(){
				var other = this.id == "#st_date" ? "#en_date" : "#st_date";
				
				if ( $('#st_date').datepicker('getDate') > $('#en_date').datepicker('getDate') )
					$(other).datepicker('setDate', $(this).datepicker('getDate') );
			});



			$('.ttip_overlay_trig').click(function(){
				$('.ttip_overlay').hide();
				$(this).next().show();

				var ele = $(this).next();
				
			});

			$('.ttip_overlay_close_trig').click(function(){
				$(this).parent().hide();
			});

			$('.ttip_overlay').mouseleave(function(){
				$('.ttip_overlay').hide();
			});

		}); 
 
	</script> 
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<style >
 #olist th,#olist td{text-align: center}
.ttip_overlay{text-align: left !important;}

</style>
</head><body>

        <?php
               $con ='order by del_date';
            if(isset($_REQUEST['type']))
                $con = 'order by b.customer '.$_REQUEST['type'];
         ?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="1" >
                        <tbody>
                           
                                                  <tr style="height:20px; background-color:#FFF;"></tr> 
                          

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>


                            <tr>
                                
                                <td id="mainpage" >
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                
                                            </tr>
                                            
                                            
                                            
                                            <tr>

                                                <td>

                                                    <form name="form1" method="get" action="">

												       <table width="100%" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                          <tr>

                                                            <td height="30" colspan="5" align="center"><strong>Search Orders by Date Range </strong></td>
                                                            <td height="30" colspan="3" align="center"><strong>Search by Order Part Number</strong></td>
                                                            <td height="30" colspan="3" align="center"><strong>Search by Customer/Vendor Name</strong></td>
                                                          </tr>

                                                          <tr>

                                                           

                                                            <td width="41" height="45">
																<b>From</b>
                                                            </td>
                                                            <td width="144"><input type="text" name="st_date"  id="st_date" class="hasDatepicker"></td>
                                                            <td width="18"><b>To</b></td>
                                                            <td width="144"><input type="text" name="en_date"  id="en_date" class="hasDatepicker"></td>
                                                            <td width="140"><input type="submit" value="search"></td>
                                                            <td width="82"><strong> Number</strong></td>
                                                            <td width="152"> <input type="text" name="srch"  id="srch"></td>
                                                            <td width="115"><input type="submit" value="submit" name="btnpart"></td>
                                                            <td width="55"><b> Name</b></td>
                                                            <td width="174"><input type="text" name="srchc"  id="srchc"></td>
                                                            <td width="137"><input type="submit" value="submit" name="btncus"></td>
															 

                                                          </tr>

                                                        </table>

                                                  </form>

                                                </td>

                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"> 
<?php
	if($st_date && $en_date){
		$crit = " and  ( unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) >=  unix_timestamp('".$st_date."')  
			and unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) <=  unix_timestamp('".$en_date."')  )
			";
	}
	else
	{
		$crit='';		
	}
/*	$sqs="select a.customer,a.part_no,a.rev,a.ord_by,a.date1,a.delto,a.our_ord_num,a.svia,b.poid,b.po,a.sid,a.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(a.date1,locate('-',a.date1)+1),'%m-%d-%Y')) as del_date,a.vid 
				from invoice_tb a 
			 join porder_tb b on a.part_no = b.part_no
			where  1 and a.rev = b.rev  and a.customer = b.customer" . $crit . "  
			order by del_date 
			  
		";*/
	

	
	
		
	$sqs="select  b.poid,b.namereq1, b.customer,b.namereq,b.part_no,b.rev,c.invoice_id,c.ord_by,b.date1,c.delto,c.our_ord_num,c.svia,b.poid,b.po,b.sid,c.podate,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from  porder_tb b
			  LEFT  JOIN invoice_tb c  on b.part_no = c.part_no and b.rev = c.rev
			where  1 " . $crit . "  
			$con 
		";
		
		 
$ress=mysql_query($sqs) or die(mysql_error());
if(!$ress)
{
	die('errorn in data'); 
}
  mysql_num_rows($ress);
 if(!mysql_num_rows($ress)){
	echo "<div align='center'> No Data found</div>";
 }else{

 

 
 
?>
				<?php if($st_date && $en_date){ ?>
				<div style="font-size: 14px;">Search results from <b style="font-size: 14px;"><?php echo date('m-d-Y',strtotime($st_date)) ?></b> to <b style="font-size: 14px;"><?php echo date('m-d-Y',strtotime($en_date)) ?></b> </div>
				<?php } ?>
				
													<div >
														<table id="olist" cellpadding=5 cellspacing=0 width="100%" border=1 style="font-size:11px;">
															<tr  style="color:#FFF; background-color: #369; height:25px;">

<?php
$a = 'ASC';
$img = 'asc.gif';
if(isset($_REQUEST['type'])){
   $t = $_REQUEST['type'];
  if($t=='ASC')
    {
    $a = 'DESC';
    $img = 'desc.gif';
    }
  if($t=='DESC')
   {
    $a = 'ASC';
    $img = 'asc.gif';
   }
}
?>
<th id="sortables" width="80" style="background-image:url(images/<?=$img;?>);background-repeat: no-repeat;
background-position: 50% 18%;cursor: pointer;";><a style="cursor: pointer;text-decoration: none;" href="delivery_sch.php?type=<?=$a;?>"><font style="color:white;font-weight:bold;">Customer</font></a></th>
																<th width="150">Part number</th>
																<th width="20">Rev</th>
																<th width="120">Ordered by</th>
																<th width="80">Due Date</th>
																
																<th width="120">Customer PO</th>
																<th width="80">Our PO</th>
																<th width="120">Shipped via</th>
																<th width="100">Vendor</th>
                                                                <th width="200">Delivered to</th>
                                                                <th width="100">Delivered on</th>
																<th   width="100">Invoiced</th>
                                                                <th width="80">Price</th>
                                                                <th width="80">Cost</th>
                                                                <th width="80">Profit</th>
                                                                
                                                                
                                                                
                                                                
															</tr>
															<?php
																$tttemp =	 '';
																 $tt=0;
																while($rws = mysql_fetch_array($ress)){
																	
	$invid = $rws['invoice_id']; 
																
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
  $tsfor=$tsfor+ $tot2;
  $tot2=number_format($tot2,2);
  
   $tot=number_format($tot,2);
																	
																	
																	
		$poid = $rws['poid'];




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
 $tocost=	$tocost+number_format($tottt33,2,'.','') ;
  }


$tot33=number_format($tot33,2);															
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
if ($tt % 2 != 0) {
# An odd row
    $rowColor = "#B0C9E8";
	$textColor = '#FFF';
	  }
  else { # An even row
   $textColor = '#000';
    $rowColor = "#F4F5FD"; 
  }
																	
																	$tttemp2 =	 $rws['poid']; 
																if ($tttemp == $tttemp2)
																continue;
																$tttemp =	 $rws['poid'];
																$tt++;	 
																	 
 
																	$pno=$rws['part_no'];
																	$rev=$rws['rev'];

																	$po = $rws['poid'];
																
																	if ($po>0)
																	{
																	$po=$po+9933;
																	//$pending="*";
																	}
																	else
																	{ 
																	$po='';
																	//$pending='';
																    }
																  //  $invoice_id = $rws['invoice_id'];
																	   $poid = $rws['poid']-89;
																   
																   
																   $sql_pack = "SELECT COUNT(*) as cnt ,date1,svia,delto,po FROM packing_tb WHERE rev='$rev' and part_no='$pno'";
																    $res_pack = mysql_query($sql_pack) or die(mysql_error());
																   $row_pack = mysql_fetch_row($res_pack);
//echo $row_pack[0];
																   $test = $row_pack[0];
																  $shipvia= $rws['svia'];
																   $delto= $rws['delto'];
																  
																  if($test != '0')
																    {
																    	
																		//$pending = ''.$row_pack[0].$poid;
																		$pending = '';
																		
																		  $del_date=explode("-",$row_pack[1]);
 																 $delivered_on = $del_date[1] . "-" . $del_date[2] . "-" . $del_date[3];
																 
																 
																$shipvia= $row_pack[2];
																$delto= $row_pack[3];
																$ypo= $row_pack[4];

																		
																		//$delivered_on =$row_pack[1];
																    }
																    if($test == '0')
																    {
																    	//$pending = '*'.$row_pack[0].$poid;
																			$pending = '*';
																			$delivered_on= '';
																			$shipvia= $rws['svia'];
																			 $delto= $rws['delto'];
																			 	$ypo = $rws['po'];
																    }

																	$temp = $rws['sid'];
																    $temp1 = substr($temp, 0, 1);
 																    $temp2 = substr($temp,1, strlen($temp));

 																   // $del_date=explode("-",$rws['date1']);
 																//    $delivered_on = $del_date[1] . "-" . $del_date[2] . "-" . $del_date[3];

																  	$ord_by = $rws['namereq1'];
																  	if($ord_by<>'')
																  	{
																	$query="select * from order_tb where ( req_by='$ord_by') limit 1";
//$query="select * from order_tb where ( req_by  LIKE '$ord_by') limit 1";

																		
																		$result = mysql_query($query) or die();
																		$row = mysql_fetch_object($result);

																		$name = $row->req_by; 
																		$phone = $row->phone; 
																		$email = $row->email; 
																  	}

																  	$vid = $rws['vid'];
																  	$sql_vid = "select * from vendor_tb where ( data_id='$vid') limit 1";
																  	$result_vid = mysql_query($sql_vid) or die();
																	$row_vid = mysql_fetch_object($result_vid);

																	$vendor_shortname = $row_vid->c_shortname; 
																  
																 /* if ($temp1=='c') {
																	$sqs1="select * from data_tb where data_id='".$temp2."'";
																	$res1=mysql_query($sqs1);
																	  if(!$res1)
																	  {
																		  die('error in data');
																	  }
																  }
																  else
																  {
																	$sqs1="select * from shipper_tb where data_id='".$temp2."'";
																    $res1=mysql_query($sqs1);
																	  if(!$res1)
																	  {
																		die('error in data');
																	  }
																	}*/

																	$sqs1="select * from data_tb where c_name='".$rws['customer']."'";
																	$res1=mysql_query($sqs1);
																	  if(!$res1)
																	  {
																		  die('error in data');
																	  }
																	
																	
																	$rws1=mysql_fetch_array($res1);


																	

															 //$rws['customer'] . "//" . 		 
															?>
																<tr style="height:25px;" bgcolor="<?php echo  $rowColor ; ?>"  >
																	<td ><?php // echo  $tttemp.$tttemp2;?><a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo  $rws1['c_shortname'];?></a>
																		<div class="ttip_overlay" style="position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999">
																			<a href="javascript:void(0)" class="ttip_overlay_close_trig" style="color:#cd0000;float:right">Close</a>
																			<div>
																				<h3><?php echo $rws1['c_name'];?></h3>
																				<p>
																					<?php 
																						if ($rws1[c_address]!=''){
																							echo $rws1[c_address].'<br>';
																						} 
																						if (($rws1[c_address2]!='')or($rws1[c_address3]!='')){
																							echo $rws1[c_address2].' '.$rws1[c_address3].'<br>';
																						}
																						if ($rws1[c_phone]!=''){
																							echo 'Phone : '.$rws1[c_phone].'<br>';
																						}
																						if ($rws1[c_fax]!=''){
																							echo 'Fax : '.$rws1[c_fax].'<br>';
																						}
																					?>
																				</p>
																			</div> 
																		</div>
																	</td>
																	<td><?php echo $rws['part_no'];?></td>
																	<td><?php echo $rws['rev'];?></td>
																	<td>
																		<a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo $rws['namereq1'];?></a>
																		<div class="ttip_overlay" style="position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999">
																			<a href="javascript:void(0)" class="ttip_overlay_close_trig" style="color:#cd0000;float:right">Close</a>
																			<div>																				
																				<p>
																					<?php 
																						if ($name!=''){
																							echo $name.'<br>';
																						}																						
																						if ($phone!=''){
																							echo 'Phone : '.$phone.'<br>';
																						}
																						if ($email!=''){
																							echo 'Email : '. $email .'<br>';
																						}
																					?>
																				</p>
																			</div> 
																		</div>
																	</td>
																	<td><?php
																	
																	$duedate1=$rws['date1'];
																$duedate =	substr($duedate1, -10, 10);
																	
																	echo $duedate;
																	
																	
																	
																	?></td>
																
																	<td><?php echo $ypo;?></td>
																	<td><?php echo $po;?></td>
																	<td><?php echo $shipvia; ?></td>
																	<td><?php echo $vendor_shortname; ?></td>
                                                                    	<td><?php echo $delto;?></td>
                                                                    <td><?php echo $delivered_on; ?></td>
																	<td><?php echo $rws['podate'];?></td>
                                                                    
                                                                     <td style="text-align:right" height="30"><?php echo  $tot2; ?>	 </td>
                                                         <td style="text-align:right" height="30"> <?php echo $tot33; ?></td>
                                                         <td style="text-align:right" height="30"> <?php echo number_format((number_format(str_replace(',', '',$tot2),2,'.','')-number_format(str_replace(',', '',$tot33),2,'.','')),2); ?></td>
																</tr>
															<?php
																} $tsfor=number_format($tsfor,2);
  $tocost=number_format($tocost,2);
															?>


 <tr style="color:#FFF; background-color: #369;">
                                                      <td colspan="12" style="color:#FFF; text-align:center" width="135px" height="30"><strong>Total</strong> </td>
                                                      
                                                        <td style="color:#FFF; text-align:right" width="80px" height="30"><strong><?php echo $tsfor; ?></strong>	 </td>
                                                         <td style="color:#FFF;text-align:right" width="100px" height="30"> <strong><?php echo $tocost; ?></strong>	 </td>
                                                         <td style="color:#FFF;text-align:right" width="100px" height="30"> <strong><?php echo number_format((number_format(str_replace(',', '',$tsfor),2,'.','')-number_format(str_replace(',', '',$tocost),2,'.','')),2); ?></strong>	 </td>

                                                    </tr>


														</table>
													</div>

<?php } ?>        
<?php //} ?>    
												</td>
											</tr>
                           
										</tbody>
									</table>
								</tr>
                           
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody></table>
  
</body></html>