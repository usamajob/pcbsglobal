<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); 

function frmt_datestr($dd) {
    $dd_parts = explode('/', $dd);
    return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
}

$st_date = $en_date = '';
if (isset($_GET['st_date']) && isset($_GET['en_date'])) {
    $st_date = frmt_datestr($_GET['st_date']);
    $en_date = frmt_datestr($_GET['en_date']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Search Orders</title>
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
        <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
        <script type="text/javascript" src="sort.js"></script>
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
        <script type="text/javascript"> 

            jQuery(document).ready(function(){
                $('#srch').autocomplete({source:'getreport.php', minLength:1});
                $('#srchc').autocomplete({source:'getreportc.php', minLength:1});
                $('#srchv').autocomplete({source:'getreportv.php', minLength:1});
            });
 
        </script>
        <link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
        <style type="text/css">
            #olist th, #olist td {
                text-align: center
            }
            .ttip_overlay {
                text-align: left !important;
            }
        </style>

    </head>
    <body>
<script type="text/javascript">
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': 
                window.location.href = 'http://pcbsglobal.com/luke-new/admin/welcome.php';
                break;
        }
    });
});
    </script>
        <?php
        $con = 'order by del_date';
        if (isset($_REQUEST['type']))
            $con = 'order by b.customer ' . $_REQUEST['type'];
        ?>
        <div style="height: 115px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%"  style="background-color: #fff;">
                <tbody>

                    <tr>
                        <td align="left">
                            <table align="left" border="0" cellpadding="0" cellspacing="1" width="100%" >
                                <tbody style="background-color: #fff;">
                                    <tr style="background-color:#FFF;"></tr>
                                    <tr style="background-color: #fff;" style="width:98%">


                                        <td colspan="2" id="header" style="padding-left:20px;"><div style="position: relative; top: -8px;left: -20px;width: 100%;">
                                                <?php require_once('top-menu.php'); ?>
                                            </div></td>
                                    </tr>
                                    <tr style="background-color: #fff;">
                                        <td id="mainpage" >
                                            <div id="table_holder">
                                                <table align="left" cellpadding="5" cellspacing="1" width="100%" style="position: relative; top: -20px; margin-left:0px">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: 0px;">
                                                                <form name="form1" method="get" action="">
                                                                    <table width="98%" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: fixed;
                                                                           top: 27px;
                                                                           left: 0;
                                                                           width: 100%;
                                                                           z-index: 0;
                                                                           background-color: #ffffff;">
                                                                        <tr height="40">
                                                                            <td height="30" colspan="5" align="center"><strong>Search Orders by Date Range </strong></td>
                                                                            <td height="30" colspan="3" align="center"><strong>Search by Order Part Number</strong></td>
                                                                            <td height="30" colspan="6" align="center"><strong>Search by Customer/Vendor Name</strong></td>
                                                                        </tr>
                                                                        <tr height="40">
                                                                            <td width="38"><strong> From</strong></td>
                                                                            <td width="90"><input name="st_date" type="text"  id="st_date" size="12" ></td>
                                                                            <td width="18"><strong>To</strong></td>
                                                                            <td width="90"><input name="en_date" type="text"  id="en_date" size="12"></td>
                                                                            <td width="54"><input type="submit" value="search"></td>
                                                                            <td width="76"><strong> Number</strong></td>
                                                                            <td width="144"><input type="text" name="srch"  id="srch"></td>
                                                                            <td width="54"><input type="submit" value="submit" name="btnpart"></td>
                                                                            <td width="316" align="right"><strong>Customer Name</strong></td>
                                                                            <td width="159"><input type="text" name="srchc"  id="srchc"></td>
                                                                            <td width="37"><input type="submit" value="submit" name="btncus"></td>
                                                                            <td width="37"><strong>Vendor Name</strong></td>
                                                                            <td width="76"><input type="text" name="srchv"  id="srchv"></td>
                                                                            <td width="76"><input type="submit" value="submit" name="btnven" id="btnven"></td>
                                                                        </tr>
                                                                    </table>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        if ($st_date && $en_date) {
                                                            $crit = " and  ( unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')  
			and unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "')  )
			";
                                                        } else {
                                                            $crit = '';
                                                        }
                                                        $sqs = "select  b.poid,b.namereq1, b.customer,b.namereq,b.part_no,b.rev,c.invoice_id,c.ord_by,b.date1,c.delto,c.our_ord_num,b.poid,b.po,b.sid,c.podate,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from   porder_tb b
			  LEFT JOIN  invoice_tb c on b.part_no = c.part_no and b.rev = c.rev and b.po = c.po
			where  1 ".$con." 
		";

                                                        if (isset($_REQUEST['btnpart'])) {

                                                            $pieces = explode("_", $_REQUEST['srch']);
                                                            $pno = $pieces[0]; // piece1
                                                            $cname = $pieces[2];


                                                            //$sqs="select * from corder_tb where part_no ='".$pno."'";
                                                            $sqs = "select  b.poid,b.namereq1, b.customer,b.namereq,b.part_no,b.rev,c.invoice_id,c.ord_by,b.date1,c.delto,c.our_ord_num,c.svia,b.poid,b.po,b.sid,c.podate,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from  porder_tb b
			  LEFT  JOIN invoice_tb c  on b.part_no = c.part_no and b.rev = c.rev and b.po = c.po
			where  b.part_no ='" . $pno . "'$con";
                                                        }
                                                        if (isset($_REQUEST['btncus'])) {

                                                            $customer = $_REQUEST['srchc'];



                                                            //$sqs="select * from corder_tb where part_no ='".$pno."'";
                                                             $sqs = "select  b.poid,b.namereq1, b.customer,b.namereq,b.part_no,b.rev,c.invoice_id,c.ord_by,b.date1,c.delto,c.our_ord_num,c.svia,b.poid,b.po,b.sid,c.podate,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from  porder_tb b
			  LEFT  JOIN invoice_tb c  on b.part_no = c.part_no and b.rev = c.rev and b.po = c.po
			where  b.customer ='" . $customer . "'$con";
                                                        }

                                                        if (isset($_REQUEST['btnven'])) {

                                                            $vendor = $_REQUEST['srchv'];

                                                            //$sqs="select * from corder_tb where part_no ='".$pno."'";
                                                   echo       $sqs = "select  b.poid,b.namereq1, b.customer,b.namereq,b.part_no,b.rev,c.invoice_id,c.ord_by,b.date1,c.delto,c.our_ord_num,c.svia,b.poid,b.po,b.sid,c.podate,c.invoice_id,b.dweek,
				unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) as del_date,b.vid 
				from  porder_tb b 
			  LEFT  JOIN invoice_tb c  on b.part_no = c.part_no and b.rev = c.rev and b.po = c.po
			  LEFT  JOIN vendor_tb v   on  v.data_id = b.vid 
			where  v.c_shortname  ='" . $vendor . "'$con";
                                                        }


                                                        $ress = mysql_query($sqs) or die(mysql_error());
                                                        if (!$ress) {
                                                            die('errorn in data');
                                                        }
                                                        mysql_num_rows($ress);
                                                        if (!mysql_num_rows($ress)) {
                                                            echo "<div align='center'> No Data found</div>";
                                                        } else {
                                                            ?>
                                                            <?php if ($st_date && $en_date) { ?>
                                                            <div style="font-size: 14px;">Search results from <b style="font-size: 14px;"><?php echo date('m-d-Y', strtotime($st_date)) ?></b> to <b style="font-size: 14px;"><?php echo date('m-d-Y', strtotime($en_date)) ?></b> </div>
                                                        <?php } ?>

        <!--<table id="olist" cellpadding=0 cellspacing=0 width="100%"  border=0 style="font-size:11px; align:center; margin-top:28px">
                                                                <tr width="100%" style="color: #FFF; background-color: #369;height: 30px;align: center; top: 117px;left: 5px;width: 100%; ">
                                                                    <th width="6.66%" height="30px">Customer</th>
                                                                    <th width="6.66%" height="30px">Part number</th>
                                                                    <th width="4%">Rev</th>
                                                                    <th width="9.32%">Ordered by</th>
                                                                    <th width="6.66%">Due Date</th>
                                                                    <th width="6.66%">Customer PO</th>
                                                                    <th width="9.32%">Our PO</th>
                                                                    <th width="6.66%">Packing# </th>
                                                                    <th width="6.66%">Invoice# </th>
                                                                    <th width="6.66%">Shipped via</th>
                                                                    <th width="6.66%">Vendor</th>
                                                                    <th width="6.66%">Delivered to</th>
                                                                    <th width="6.66%">Delivered on</th>
                                                                    <th   width="6.66%">Invoiced</th>
                                                                    <th width="6.66%">Price</th>
                                                                    <th width="6.66%">Cost</th>
                                                                    <th width="6.66%">Profit</th>
                                                                </tr>-->

                                                        <tr style="color:#FFF; background-color: #369; display: none;">
                                                            <td colspan="12" style="color:#FFF; text-align:center" width="135px" height="30"><strong>Total</strong></td>
                                                            <td style="color:#FFF; text-align:right" width="80px" height="30"><strong><?php echo $tsfor; ?></strong></td>
                                                            <td style="color:#FFF;text-align:right" width="100px" height="30"><strong><?php echo $tocost; ?></strong></td>
                                                            <td style="color:#FFF;text-align:right" width="100px" height="30"><strong><?php echo number_format((number_format(str_replace(',', '', $tsfor), 2, '.', '') - number_format(str_replace(',', '', $tocost), 2, '.', '')), 2); ?></strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            <?php } ?>
                                            <?php //}  ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width:100%;">
            <div id="main">
                <div id="left"> Customer </div>
                <div style="width:6.5%;" id="left"> Part number </div>
                <div style="width:2.5%;" id="left"> Rev </div>
                <div id="left"> Ordered by </div>
                <div id="left"> Due Date </div>
                <div style="width:7%;" id="left"> Customer PO </div>
                <div style="width:6%;" id="left"> Our PO </div>
                <div id="left"> Packing# </div>
                <div style="width:6%;" id="left"> Invoice# </div>
                <div style="width:7%;" id="left"> Shipped via </div>
                <div id="left"> Vendor </div>
                <div style="width:7%;" id="left"> Delivered to </div>
                <div style="width:7%;" id="left"> Delivered on </div>
                <div id="left"> Invoiced </div>
                <div style="width:5%;" id="left"> Price </div>
                <div style="width:5%;" id="left"> Cost </div>
                <div style="width:5%;" id="left"> Profit </div>
                <div class="clear"> </div>
            </div>
            <br class="clear" />
            <br class="clear" />
            <?php
            $inc = 0;
            $a = 'ASC';
            $img = 'asc.gif';
            if (isset($_REQUEST['type'])) {
                $t = $_REQUEST['type'];
                if ($t == 'ASC') {
                    $a = 'DESC';
                    $img = 'desc.gif';
                }
                if ($t == 'DESC') {
                    $a = 'ASC';
                    $img = 'asc.gif';
                }
            }
            ?>
            <?php
            $tttemp = '';
            $tt = 0;
            while ($rws = mysql_fetch_array($ress)) {

                $invid = $rws['invoice_id'];
				 $po = $rws['po'];

                $sqi = "select * from invoice_items_tb where pid='" . $invid . "'";

                $resi = mysql_query($sqi);

                if (!$resi) {

                    die('error in data');
                }

                $tot = 0;

                while ($rwi = mysql_fetch_array($resi)) {
                    $tottt = str_replace(',', '', $rwi['tprice']);
                    $tot = $tot + number_format($tottt, 2, '.', '');
                }

                $tot = str_replace(',', '', $tot);

                $tot = number_format($tot, 2, '.', '');

                $st = number_format($rws['saletax'], 4);
                $taxx = $tot * $st;
                $taxx = str_replace(',', '', $taxx);
                $taxx = number_format($taxx, 2);
                $fcharg = number_format($rws['fcharge'], 2);


                $tot2 = $fcharg + $tot + $taxx;
                $tsfor = $tsfor + $tot2;
                $tot2 = number_format($tot2, 2);

                $tot = number_format($tot, 2);
                $poid = $rws['poid'];

                $sqi33 = "select * from items_tb where pid='" . $poid . "'";
                //echo  $sqi;

                $resi33 = mysql_query($sqi33);

                if (!$resi33) {
                    die('error in data');
                }
                $tot33 = 0;
                while ($rwi33 = mysql_fetch_array($resi33)) {
                    $tottt33 = str_replace(',', '', $rwi33['tprice']);

                    $tot33 = $tot33 + number_format($tottt33, 2, '.', '');
                    $tocost = $tocost + number_format($tottt33, 2, '.', '');
                }
                $tot33 = number_format($tot33, 2);

                if ($tt % 2 != 0) {
# An odd row
                    $rowColor = "#B0C9E8";
                    $textColor = '#FFF';
                } else { # An even row
                    $textColor = '#000';
                    $rowColor = "#F4F5FD";
                }

                $tttemp2 = $rws['poid'];
                if ($tttemp == $tttemp2)
                    continue;
                $tttemp = $rws['poid'];
                $tt++;


                $pno = $rws['part_no'];
                $rev = $rws['rev'];

                $po = $rws['poid'];

                if ($po > 0) {
                    $po = $po + 9933;
                    //$pending="*";
                } else {
                    $po = '';
                    //$pending='';
                }
                //  $invoice_id = $rws['invoice_id'];
                $poid = $rws['poid'] - 89;


                $sql_pack = "SELECT COUNT(*) as cnt ,date1,svia,delto,po FROM packing_tb WHERE rev='$rev' and part_no='$pno' ";
                $res_pack = mysql_query($sql_pack) or die(mysql_error());
                $row_pack = mysql_fetch_row($res_pack);
//echo $row_pack[0];
                $test = $row_pack[0];
                $shipvia = $res_pack['svia'];
                $delto = $res_pack['delto'];

                if ($test != '0') {

                    //$pending = ''.$row_pack[0].$poid;
                    $pending = '';

                    $del_date = explode("-", $row_pack[1]);
                    $delivered_on = $del_date[1] . "-" . $del_date[2] . "-" . $del_date[3];


                    $shipvia = $row_pack[2];
                    $delto = $row_pack[3];
                    $ypo = $row_pack[4];


                    //$delivered_on =$row_pack[1];
                }
                if ($test == '0') {
                    //$pending = '*'.$row_pack[0].$poid;
                    $pending = '*';
                    $delivered_on = '';
                    $shipvia = $rws['svia'];
                    $delto = $rws['delto'];
                    $ypo = $rws['po'];
                }

                $temp = $rws['sid'];
                $temp1 = substr($temp, 0, 1);
                $temp2 = substr($temp, 1, strlen($temp));

                // $del_date=explode("-",$rws['date1']);
                //    $delivered_on = $del_date[1] . "-" . $del_date[2] . "-" . $del_date[3];

                $ord_by = $rws['namereq1'];
                if ($ord_by <> '') {
                    $query = "select * from order_tb where ( req_by='$ord_by') limit 1";
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
                  } */

                $sqs1 = "select * from data_tb where c_name='" . $rws['customer'] . "'";
                $res1 = mysql_query($sqs1);
                if (!$res1) {
                    die('error in data');
                }


                $rws1 = mysql_fetch_array($res1);




                //$rws['customer'] . "//" . 		 
                $inc++;
                ?>
                <div id="main2" <?php echo ($inc % 2 == 0) ? 'style="background:#ffffff;"':'#ffffff;'; ?> >
                    <div id="left2">
                        <?php // echo  $tttemp.$tttemp2; ?>
                        <a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo ($rws1['c_shortname'] != '') ? $rws1['c_shortname'] : '&nbsp;'; ?></a>
                        <div class="ttip_overlay" style="position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999"> <a href="javascript:void(0)" class="ttip_overlay_close_trig" style="color:#cd0000;float:right">Close</a>
                            <div>
                                <h3><?php echo $rws1['c_name']; ?></h3>
                                <p>
                                    <?php
                                    if ($rws1[c_address] != '') {
                                        echo $rws1[c_address] . '<br>';
                                    }
                                    if (($rws1[c_address2] != '') or ($rws1[c_address3] != '')) {
                                        echo $rws1[c_address2] . ' ' . $rws1[c_address3] . '<br>';
                                    }
                                    if ($rws1[c_phone] != '') {
                                        echo 'Phone : ' . $rws1[c_phone] . '<br>';
                                    }
                                    if ($rws1[c_fax] != '') {
                                        echo 'Fax : ' . $rws1[c_fax] . '<br>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="left4"><?php echo ($rws['part_no'] != '') ? $rws['part_no'] : '&nbsp;'; ?></div>
                    <div id="left5"><?php echo ($rws['rev'] != '') ? $rws['rev'] : '&nbsp;'; ?></div>
                    <div id="left2"><a class="ttip_overlay_trig" href="javascript:void(0)"><?php echo ($rws['namereq1'] != '') ? $rws['namereq1'] : '&nbsp;'; ?></a>
                        <div class="ttip_overlay" style="position:absolute;margin-top:-10px;background:#eee;padding:5px;width:300px;display:none;z-index: 99999"> <a href="javascript:void(0)" class="ttip_overlay_close_trig" style="color:#cd0000;float:right">Close</a>
                            <div>
                                <p>
                                    <?php
                                    if ($name != '') {
                                        echo $name . '<br>';
                                    }
                                    if ($phone != '') {
                                        echo 'Phone : ' . $phone . '<br>';
                                    }
                                    if ($email != '') {
                                        echo 'Email : ' . $email . '<br>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="left2">
                        <?php
                        $duedate1 = $rws['date1'];
                        $duedate = substr($duedate1, -10, 10);

                        echo ($duedate != '') ? $duedate : '&nbsp;';
                        ?>
                    </div>
                    <div id="left6"><?php echo ($ypo != '') ? $ypo : '&nbsp;'; ?></div>
                    <div id="left7"> <?php echo ($po != '') ? $po : '&nbsp;'; ?> 
                        <a href="download-pdf1.php?id=<?php echo $rws['poid']; ?>&oper=view">V</a>
                        <a href="edit_purchase.php?id=<?php echo $rws['poid']; ?>">E</a> 
                        <a href="download-pdf1.php?id=<?php echo $rws['poid']; ?>">D</a>
                    </div>
                    <div id="left2">
						<?php //echo $rws['invoice_id'] + 9987; ?>
						<?php echo ($res_pack['invoice_id'] != '') ? ($res_pack['invoice_id']+9987) : '&nbsp;'; ?>
						<?php if($res_pack['invoice_id'] != '') { ?>
                    	<a href="download-pdf3.php?id=<?php echo $res_pack['invoice_id']; ?>&oper=view">V</a>
                        <a href="edit_packing.php?id=<?php echo $res_pack['invoice_id']; ?>">E</a> 
                        <a href="download-pdf3.php?id=<?php echo $res_pack['invoice_id']; ?>">D</a>
                        <?php } ?>
                    </div>
                    <div id="left8">
						<?php echo ($res_pack['invoice_id'] != '') ? ($res_pack['invoice_id']+9976) : '&nbsp;'; ?>
                        <?php if($res_pack['invoice_id'] != '') { ?>
                    	<a href="download-pdf2.php?id=<?php echo $res_pack['invoice_id']; ?>&oper=view">V</a>
                        <a href="edit_invoice.php?id=<?php echo $res_pack['invoice_id']; ?>">E</a> 
                        <a href="download-pdf2.php?id=<?php echo $res_pack['invoice_id']; ?>">D</a>
                        <?php } ?>
                    </div>
                    <div id="left6"><?php
					if($res_pack['invoice_id'] != '') { 
					
					echo ($shipvia != '') ? $shipvia : '&nbsp;'; 
					
					}
					
					
					?></div>
                    <div id="left2"><?php echo ($vendor_shortname != '') ? $vendor_shortname : '&nbsp;'; ?></div>
                    
                    
                    
                    <div id="left6"><?php
					
										if($res_pack['invoice_id'] != '') { 

					echo ($delto != '') ? $delto : '&nbsp;';
										}
					
					?></div>
                    
                    
                    
                    
                    
                    <div id="left6"><?php
					
										if($res_pack['invoice_id'] != '') { 

					echo ($delivered_on != '') ? $delivered_on : '&nbsp;'; 
					}                    
                    
					
					?></div>
                    
                    
                    <div id="left2"><?php echo ($rws['podate'] != '') ? $rws['podate'] : '&nbsp;'; ?></div>
                    <div id="left9"><?php echo ($tot2 != '') ? $tot : '&nbsp;'; ?></div>
                    <div id="left9"><?php echo ($tot33 != '') ? $tot33 : '&nbsp;'; ?></div>
                    <div id="left9">
                        <?php
                        $subValue = number_format((number_format(str_replace(',', '', $tot2), 2, '.', '') - number_format(str_replace(',', '', $tot33), 2, '.', '')), 2);
                        echo ($subValue != '') ? $subValue : '&nbsp;';
                        ?>
                    </div>
                </div>
				<div id="main2" style="height: 18px; background: #c0c0c0;"></div>
                <br class="clear" />
                <?php
            }
            $tsfor = number_format($tsfor, 2);
            $tocost = number_format($tocost, 2);
            ?>
			
            <div id="main3">
                <div id="left3" style="width:85%;"><strong>Total</strong></div>
                <div id="left3"><strong><?php echo $tsfor; ?></strong></div>
                <div id="left3"><strong><?php echo $tocost; ?></strong></div>
                <div id="left3"><strong><?php echo number_format((number_format(str_replace(',', '', $tsfor), 2, '.', '') - number_format(str_replace(',', '', $tocost), 2, '.', '')), 2); ?></strong></div>
            </div>
        </div>
    </body>
</html>