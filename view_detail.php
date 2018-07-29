<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
$sqs="select * from order_tb where ord_id='".$_REQUEST['id']."'";
$ress=mysql_query($sqs);
if(!$ress)
{
die('errorn in data');
}
$rws=mysql_fetch_array($ress);
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Welcome</title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
</head><body>

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table bgcolor="#999999" border="0" cellpadding="0" cellspacing="1" width="1000">
                        <tbody>
                            <tr>
                                <td colspan="2" id="header">&nbsp;
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 250px;" width="250">
                                    <?php require_once('leftmenu.php'); ?>
                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                <td>
                                                    <strong>Welcome</strong> | <span class="mailing">Site Administrative Area</span>
                                                </td>
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"><form id="form1" name="form1" method="post" action="">
  <table width="870" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6">
    <tr>
      <td height="30" bgcolor=#336699 colspan="3" align="center">
      <font color="white"><span class="style1"><strong>Online Request For Quote Form</strong></font></span></td>
    </tr>
    <tr>
      <td width="352" height="30"><strong>Customer :</strong> 
        <label><?php echo $rws['cust_name'];?></label></td>
      <td width="310"><strong>Part Number :</strong><?php echo $rws['part_no'];?></td>
      <td width="240"><strong>Rev : </strong><?php echo $rws['rev'];?></td>
    </tr>
    <tr>
      <td height="30"><strong>Requested By :</strong><?php echo $rws['req_by'];?></td>
      <td height="30"><strong>Email : </strong><?php echo $rws['email'];?></td>
      <td><strong>Phone :</strong> <?php echo $rws['phone'];?></td>
    </tr>
    <tr>
    <td width=246 height=30><strong>FAX :</strong><?php echo $rws['fax'];?> </td>
    <td width=238 height=30><strong>Quantities : </strong>
      <?php 
      echo $rws['qty1'].",";
      if($rws['qty2'] > 0)
      echo $rws['qty2'].",";
    if($rws['qty3'] > 0)
      echo $rws['qty3'].",";
    if($rws['qty4'] > 0)
      echo $rws['qty4'].",";
    if($rws['qty5'] > 0)
      echo $rws['qty5'].",";
    if($rws['qty6'] > 0)
      echo $rws['qty6'].",";
    if($rws['qty7'] > 0)
      echo $rws['qty7'].",";
    if($rws['qty8'] > 0)
      echo $rws['qty8'].",";
    if($rws['qty9'] > 0)
      echo $rws['qty9'].",";
    if($rws['qty10'] > 0)
      echo $rws['qty10'];


      ?><?php /*, <?php echo $rws['qty2'];?>, <?php echo $rws['qty3'];?>, <?php echo $rws['qty4'];?></td>?> */ ?>
    <td width=238 height=30><strong>Lead Times : </strong>
      <?php 
        echo $rws['day1'].",";
      if($rws['day2'] > 0)
        echo $rws['day2'].",";
      if($rws['day3'] > 0)
        echo $rws['day3'].",";
      if($rws['day4'] > 0)
        echo $rws['day4'].",";
      if($rws['day5'] > 0)
        echo $rws['day5'];
    ?><?php /*, <?php echo $rws['day2'];?>, <?php echo $rws['day3'];?>, <?php echo $rws['day4'];?></td>?> */ ?>

    
    
    
    
      <?php /*<td height="30" colspan="3"><strong>FAX : </strong><?php echo $rws['fax'];?><strong> Quote Needed by:      </strong><?php echo $rws['quote_by'];?></td>*/ ?>
    </tr>
    
    <tr>
      <?php /*<td height="30" colspan="3"><strong>Quantity 1 :</strong> <?php echo $rws['qty1'];?> <strong>LEAD TIMES 1:</strong> <?php echo $rws['day1'];?></td>
    </tr>
    <tr>
      <td height="30" colspan="3"><strong>Quantity 2 :</strong> <?php echo $rws['qty2'];?> <strong>LEAD TIMES 2:</strong> <?php echo $rws['day2'];?></td>
    </tr>
    <tr>
      <td height="30" colspan="3"><strong>Quantity 3 :</strong> <?php echo $rws['qty3'];?> <strong>LEAD TIMES 3:</strong> <?php echo $rws['day3'];?></td>
    </tr>
    <tr>
      <td height="30" colspan="3"><strong>Quantity 4 :</strong> <?php echo $rws['qty4'];?> <strong>LEAD TIMES 4:</strong> <?php echo $rws['day4'];?></td>
    </tr>*/ ?>
    <tr>
      <td height="30" bgcolor=#336699 colspan="3" align="Left">
      <font color="white"><strong>SPECIAL INSTRUCTIONS: </strong></font></span></td>
    </tr>
    <tr>
      <td height="30" colspan="3"><label><?php echo $rws['special_inst'];?></label></td>
    </tr>
    
    <tr>
      <td height="30"bgcolor=#336699><font color="white"><strong>Number of Layers : </strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Material Required : </strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>IPC Class:</strong> <?php echo $rws['ipc_class'];?></td>
    </tr>
    <tr>
      <td height="30"><?php echo $rws['no_layer'];?>
      <label><br />        
      </label></td>
      <td height="30"><?php echo $rws['m_require'];?><br />
        <br />
        <strong>Inner Copper Oz: </strong><?php echo $rws['inner_copper'];?><br /></td>
      <td height="30" valign="top"><strong>Thickness: </strong><?php echo $rws['thickness'];?><br />
        <br />
      <strong>Thickness Tolerance: </strong>
      
      <?php echo $rws['thickness_tole'];?><br />
      <br /></td>
    </tr>
    <tr>
      <td height="30"bgcolor=#336699><font color="white"><strong>Plate : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Design Type/Requirements : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Design Technology : </font></strong></td>
    </tr>
    <tr>
      <td height="30"><strong>Start Cu Oz: </strong><?php echo $rws['start_cu'];?><br />
<br />
        <br />
        <strong>Plated Cu in Holes (Min.): </strong><?php echo $rws['plated_cu'];?><br />
        <br />
        <strong>Fingers Nickel/Hard Gold: </strong><?php echo $rws['fingers_gold'];?><br />
        <br /></td>
      <td height="30" valign="top"><strong>Trace Min. </strong><?php echo $rws['trace_min'];?>
        <br />
        <br />
        <strong>Space Min. </strong><?php echo $rws['space_min'];?><br />
        <br />
        <strong>Controlled Impedance: </strong><?php echo $rws['con_impe'];?><br />
      <br />
      <br />
      <br />
      <strong>Impedance Tolerance: </strong>
      <br />
      <br />
      <?php echo $rws['tole_impe'];?><br />
      <td height="30" valign="top"><strong>Smallest  Hole Size: </strong><?php echo $rws['hole_size'];?><br /><br /><strong>
        Smallest Pad: </strong><?php echo $rws['pad'];?><br />
        <br />
        <strong>Blind Vias: </strong><?php echo $rws['blind'];?><br />
        <br />
        <strong>Buried Vias: </strong><?php echo $rws['buried'];?><br />
         <br />
        <strong>Blind/Buried Vias: </strong><?php echo $rws['bb_both'];?><br />
	   <br />
<strong>HDI Design: </strong><?php echo $rws['hdi_design'];?></td>
    </tr>
    <tr>
      <td height="30"bgcolor=#336699><font color="white"><strong>Finish : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Solder Resist : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Nomenclature : </font></strong></td>
    </tr>
    <tr>
      <td height="30"><strong>Finish: </strong><?php echo $rws['finish'];?></td>
      <td height="30"><strong>Mask Sides:</strong> <?php echo $rws['mask_side'];?><br />
        <br />
        <strong>Color:</strong> <?php echo $rws['color'];?><br />
        <br />
        <strong>Mask Type:</strong> <?php echo $rws['mask_type'];?></td>
      <td height="30"><strong>S/S Sides:</strong> <?php echo $rws['ss_side'];?><br />
        <br />
        <strong>S/S Color: </strong> <?php echo $rws['ss_color'];?><br />
        <br /></td>
    </tr>
    <tr>
      <td height="30"bgcolor=#336699><font color="white"><strong>Fabrication : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Array Requirements : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Special Call-Outs : </font></strong></td>
    </tr>
    <tr>
      <td height="30"><strong>Individual Route 1-up: </strong><?php echo $rws['route'];?><br />
        <br />
        <strong>Board Size (in.)</strong> 
        <?php echo $rws['board_size1'];?>
        X
        <?php echo $rws['board_size2'];?>        <br />
        <br />
        <strong>Array: </strong> <?php echo $rws['array'];?><br /><br />
        <strong>Bds Per Array: </strong><?php echo $rws['b_per_array'];?><br /><br />
        <strong>Array Size: </strong><?php echo $rws['array_size1'];?> X <?php echo $rws['array_size2'];?><br /><br />
	<strong>Rout Tolerance: </strong><?php echo $rws['route_tole'];?></td>
      <td height="30"><strong>Array Design Provided: </strong><?php echo $rws['array_design'];?><br />
        <strong><br />
        Factory to Design Array: </strong><?php echo $rws['design_array'];?><br /><br />
        <strong>Array Type: </strong><?php echo $rws['array_type'];?><br />
        <br />
        <strong>Array Requires: </strong><?php echo $rws['array_require'];?></td>
      <td height="30"><strong>Bevel: </strong><?php echo $rws['bevel'];?><br />
        <br />
        <strong>Countersink: </strong><?php echo $rws['countersink'];?><br />
        <br />
        <strong>Cut Outs: </strong><?php echo $rws['cut_outs'];?><br />
        <br />
        <strong>Slots: </strong><?php echo $rws['slots'];?></td>
    </tr>
    <tr>
      <td height="30"bgcolor=#336699><font color="white"><strong>Markings : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>QA Requirements : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Miscellaneous : </font></strong></td>
    </tr>
    <tr>
      <td height="30"><strong>Logo: </strong><?php echo $rws['logo'];?><br />
        <br />
        <strong>94V-0 Mark: </strong><?php echo $rws['mark'];?><br />
        <br />
        <strong>Date Code Format: </strong><?php echo $rws['date_code'];?><br>
        <br />
        <strong>Other Marking: </strong><?php echo $rws['other_marking'];?>
      <br /></td>
      <td height="30"><strong>Microsection Required: </strong> <?php echo $rws['m_require'];?><br />
        <br />
          <strong>Electrical Test Stamp: </strong><?php echo $rws['test_stamp'];?><br />
          <br />
          <?php echo $rws['in_board'];?> <?php echo $rws['array_rail'];?></td>
      <td height="30"><strong>X-Outs Allowed: </strong><?php echo $rws['xouts'];?><br />
        <br />
        <strong># of X-outs per Array: </strong><?php echo $rws['xouts1'];?><br /><br />
        <strong>RoHS Cert: </strong> <?php echo $rws['rohs'];?></td>
    </tr>
    <tr>
      <td height="30" colspan="3"><strong>Total Price : </strong><?php echo $rws['price'];?> USD</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</form>&nbsp;</td>
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