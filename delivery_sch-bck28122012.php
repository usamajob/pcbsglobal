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

?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Search Orders </title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
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

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table bgcolor="#999999" border="0" cellpadding="0" cellspacing="1" >
                        <tbody>
                            <tr>
                                <td colspan="2" id="header">&nbsp;
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 212px" width="250">
                                    <?php require_once('leftmenu.php'); ?>
                                </td>
                                <td id="mainpage" >
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                <td>
                                                    <strong>Welcome</strong> | <span class="mailing">Site Administrative Area</span>
                                                </td>
                                            </tr>
                                            
                                            
                                            
                                            <tr>

                                                <td>

                                                    <form name="form1" method="get" action="">

												        <table width="500" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#e6e6e6">

                                                          <tr>

                                                            <td height="30" colspan="1" align="center"><strong>Search Orders by Date Range </strong></td>

                                                          </tr>

                                                          <tr>

                                                           

                                                            <td width="300" height="30">
																<b>From</b>
																<input type="text" name="st_date"  id="st_date">
																<b>To</b>
																<input type="text" name="en_date"  id="en_date">
																<input type="submit" value="search">
                                                            </td>
															 

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
		
		
	$sqs="select b.customer,b.namereq,b.part_no,b.rev,c.ord_by,b.date1,c.delto,c.our_ord_num,c.svia,b.poid,b.po,b.sid,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from  porder_tb b
			  LEFT  JOIN invoice_tb c  on b.part_no = c.part_no
			where  1 " . $crit . "  
			order by del_date 
			  
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
															<tr>
																<th width="80">Customer</th>
																<th width="150">Part number</th>
																<th width="20">Rev</th>
																<th width="120">Ordered by</th>
																<th width="80">Delivered on</th>
																<th width="200">Delivered to</th>
																<th width="120">Customer PO</th>
																<th width="80">Our PO</th>
																<th width="80">Shipped via</th>
																<th width="100">Vendor</th>
																<th width="100">Pending</th>
															</tr>
															<?php
																while($rws = mysql_fetch_array($ress)){
																	 
 
																	$pno=$rws['part_no'];

																	$po = $rws['poid'];
																	$ypo = $rws['po'];
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
																    $sql_pack = "SELECT COUNT(*) as cnt FROM packing_tb WHERE invoice_id='$poid'";
																    $res_pack = mysql_query($sql_pack) or die(mysql_error());
																   $row_pack = mysql_fetch_row($res_pack);
//echo $row_pack[0];
																   $test = $row_pack[0];
																   if($test != '0')
																    {
																    	
																		//$pending = ''.$row_pack[0].$poid;
																		$pending = '';
																    }
																    if($test == '0')
																    {
																    	//$pending = '*'.$row_pack[0].$poid;
																			$pending = '*';
																    }

																	$temp = $rws['sid'];
																    $temp1 = substr($temp, 0, 1);
 																    $temp2 = substr($temp,1, strlen($temp));

 																    $del_date=explode("-",$rws['date1']);
 																    $delivered_on = $del_date[1] . "-" . $del_date[2] . "-" . $del_date[3];

																  	$ord_by = $rws['customer'];
																  	if($ord_by<>'')
																  	{
																  		//$query="select * from order_tb where ( req_by='$ord_by') limit 1";
$query="select * from order_tb where ( req_by  LIKE '$ord_by') limit 1";

																		
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
																  
																  if ($temp1=='c') {
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
																	}

																	$rws1=mysql_fetch_array($res1);


																	

															 //$rws['customer'] . "//" . 		 
															?>
																<tr>
																	<td><a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo  $rws['customer'];?></a>
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
																		<a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo $rws['ord_by'];?></a>
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
																	<td><?php echo $delivered_on;?></td>
																	<td><?php echo $rws['delto'];?></td>
																	<td><?php echo $ypo;?></td>
																	<td><?php echo $po;?></td>
																	<td><?php echo $rws['svia']; ?></td>
																	<td><?php echo $vendor_shortname; ?></td>
																	<td><?php echo $pending; ?></td>
																</tr>
															<?php
																}
															?>

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