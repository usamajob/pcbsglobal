<?php require_once('conn.php'); ?>
<?php 
$sqs = "select * from order_tb where ord_id='".$_REQUEST['inid']."'";
$ress = mysql_query($sqs) or die('error in data');
$rws = mysql_fetch_assoc($ress);

?>
<input type="hidden" name="manual" id="manual" value="manual" />
<table width="650px" >
	<tr>
		<th>&nbsp;</th>
	 <?php if($_REQUEST['txtday1'] > 0):?>	<th><?php echo $_REQUEST['txtday1']; ?> Days</th> <?php endif;?>
	 <?php if($_REQUEST['txtday2'] > 0):?>	<th><?php echo $_REQUEST['txtday2']; ?> Days</th> <?php endif;?>
	 <?php if($_REQUEST['txtday3'] > 0):?>	<th><?php echo $_REQUEST['txtday3']; ?> Days</th> <?php endif;?>
	 <?php if($_REQUEST['txtday4'] > 0):?>	<th><?php echo $_REQUEST['txtday4']; ?> Days</th> <?php endif;?>
	   <?php if($_REQUEST['txtday5'] > 0):?>   <th><?php echo $_REQUEST['txtday5']; ?> Days</th> <?php endif;?>
	</tr>
		<?php if($_REQUEST['txtqty1'] > 0):?>
	<tr>
		<th><?php echo $_REQUEST['txtqty1']; ?> pieces</th>
		
		
 <?php if($_REQUEST['txtday1'] > 0):?>  		<td align="center" > <input name="pr11" type="text" id="pr11" size="5" value="<?php echo format_num($rws['pr11']); ?>"   /> </td> <?php endif;?>
	<?php if($_REQUEST['txtday2'] > 0):?>  		<td align="center"><input name="pr12" type="text" id="pr12" size="5" value="<?php echo format_num($rws['pr12']); ?>"  /></td><?php endif;?>
	<?php if($_REQUEST['txtday3'] > 0):?>  		<td align="center"><input name="pr13" type="text" id="pr13" size="5" value="<?php echo format_num($rws['pr13']); ?>"  /></td><?php endif;?>
	<?php if($_REQUEST['txtday4'] > 0):?>  		<td align="center"><input name="pr14" type="text" id="pr14" size="5" value="<?php echo format_num($rws['pr14']); ?>" " /></td> <?php endif;?>     
	 <?php if($_REQUEST['txtday5'] > 0):?>       <td align="center"><input name="pr15" type="text" id="pr15" size="5" value="<?php echo format_num($rws['pr15']); ?>"  /></td> <?php endif;?>		
	</tr>
  <?php endif;?>
  <?php if($_REQUEST['txtqty2'] > 0):?>
	<tr>
		<th><?php echo $_REQUEST['txtqty2']; ?> pieces</th>
		
   <?php if($_REQUEST['txtday1'] > 0):?>   		<td align="center"><input name="pr21" type="text" id="pr21" size="5" value="<?php echo format_num($rws['pr21']); ?>"  /></td><?php endif;?>
	  <?php if($_REQUEST['txtday2'] > 0):?>  	<td align="center"><input name="pr22" type="text" id="pr22" size="5" value="<?php echo format_num($rws['pr22']); ?>"  /></td><?php endif;?>
	  <?php if($_REQUEST['txtday3'] > 0):?>  	<td align="center"><input name="pr23" type="text" id="pr23" size="5" value="<?php echo format_num($rws['pr23']); ?>"  /></td>  <?php endif;?>
		  <?php if($_REQUEST['txtday4'] > 0):?>       <td align="center"><input name="pr24" type="text" id="pr24" size="5" value="<?php echo format_num($rws['pr24']); ?>"  /></td> <?php endif;?> 
			<?php if($_REQUEST['txtday5'] > 0):?>      <td align="center"><input name="pr25" type="text" id="pr25" size="5"  value="<?php echo format_num($rws['pr25']); ?>" /></td> <?php endif;?>    		
	</tr>
		<?php endif;?>
<?php if($_REQUEST['txtqty3'] > 0):?>
	<tr>
		<th><?php echo $_REQUEST['txtqty3']; ?> pieces</th>      		
	  <?php if($_REQUEST['txtday1'] > 0):?>  	<td align="center"><input name="pr31" type="text" id="pr31" size="5"  value="<?php echo format_num($rws['pr31']); ?>"  /></td><?php endif;?>
	  <?php if($_REQUEST['txtday2'] > 0):?>  	<td align="center"><input name="pr32" type="text" id="pr32" size="5" value="<?php echo format_num($rws['pr32']); ?>"  /></td>  <?php endif;?>  
		   <?php if($_REQUEST['txtday3'] > 0):?>       <td align="center"><input name="pr33" type="text" id="pr33" size="5" value="<?php echo format_num($rws['pr33']); ?>"  /></td><?php endif;?>
		   <?php if($_REQUEST['txtday4'] > 0):?>       <td align="center"><input name="pr34" type="text" id="pr34" size="5" value="<?php echo format_num($rws['pr34']); ?>"   /></td> <?php endif;?> 		
		   <?php if($_REQUEST['txtday5'] > 0):?>       <td align="center"><input name="pr35" type="text" id="pr35" size="5" value="<?php echo format_num($rws['pr35']); ?>"  /></td><?php endif;?>
			  
	</tr>
		<?php endif;?>
<?php if($_REQUEST['txtqty4'] > 0):?>
	<tr>
		<th><?php echo $_REQUEST['txtqty4'] ?> pieces</th>      		
		  <?php if($_REQUEST['txtday1'] > 0):?>  <td align="center"><input name="pr41" type="text" id="pr41" size="5" value="<?php echo format_num($rws['pr41']); ?>"  /></td>   <?php endif;?>
			<?php if($_REQUEST['txtday2'] > 0):?>      <td align="center"><input name="pr42" type="text" id="pr42" size="5" value="<?php echo format_num($rws['pr42']); ?>"  /></td><?php endif;?>
			 <?php if($_REQUEST['txtday3'] > 0):?>     <td align="center"><input name="pr43" type="text" id="pr43" size="5" value="<?php echo format_num($rws['pr43']); ?>"  /></td><?php endif;?>
			 <?php if($_REQUEST['txtday4'] > 0):?>     <td align="center"><input name="pr44" type="text" id="pr44" size="5" value="<?php echo format_num($rws['pr44']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr45" type="text" id="pr45" size="5" value="<?php echo format_num($rws['pr45']); ?>"  /></td>  <?php endif;?>          

	</tr>
		<?php endif;?>
<?php if($_REQUEST['txtqty5'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty5'] ?> pieces</th>             
			  <?php if($_REQUEST['txtday1'] > 0):?>    <td align="center"><input name="pr51" type="text" id="pr51" size="5" value="<?php echo format_num($rws['pr51']); ?>"  /></td> <?php endif;?>  
			  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr52" type="text" id="pr52" size="5" value="<?php echo format_num($rws['pr52']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr53" type="text" id="pr53" size="5" value="<?php echo format_num($rws['pr53']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr54" type="text" id="pr54" size="5" value="<?php echo format_num($rws['pr54']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday5'] > 0):?>   <td align="center"><input name="pr55" type="text" id="pr55" size="5" value="<?php echo format_num($rws['pr55']); ?>"  /></td>  <?php endif;?>          

		</tr>
		<?php endif;?>
		<?php if($_REQUEST['txtqty6'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty6'] ?> pieces</th>             
			  <?php if($_REQUEST['txtday1'] > 0):?>    <td align="center"><input name="pr61" type="text" id="pr61" size="5" value="<?php echo format_num($rws['pr61']); ?>"  /></td> <?php endif;?>  
			   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr62" type="text" id="pr62" size="5"  value="<?php echo format_num($rws['pr62']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr63" type="text" id="pr63" size="5" value="<?php echo format_num($rws['pr63']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr64" type="text" id="pr64" size="5" value="<?php echo format_num($rws['pr64']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr65" type="text" id="pr65" size="5" value="<?php echo format_num($rws['pr65']); ?>"  /></td> <?php endif;?>           

		</tr>
		<?php endif;?>
		<?php if($_REQUEST['txtqty7'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty7'] ?> pieces</th>             
			   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr71" type="text" id="pr71" size="5" value="<?php echo format_num($rws['pr71']); ?>"  /></td>  <?php endif;?> 
			  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr72" type="text" id="pr72" size="5" value="<?php echo format_num($rws['pr72']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr73" type="text" id="pr73" size="5" value="<?php echo format_num($rws['pr73']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr74" type="text" id="pr74" size="5" value="<?php echo format_num($rws['pr74']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr75" type="text" id="pr75" size="5" value="<?php echo format_num($rws['pr75']); ?>"  /></td>  <?php endif;?>          

		</tr>
		<?php endif;?>
		<?php if($_REQUEST['txtqty8'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty8'] ?> pieces</th>             
			   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr81" type="text" id="pr81" size="5" value="<?php echo format_num($rws['pr81']); ?>"  /></td>  <?php endif;?> 
			   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr82" type="text" id="pr82" size="5" value="<?php echo format_num($rws['pr82']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr83" type="text" id="pr83" size="5" value="<?php echo format_num($rws['pr83']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr84" type="text" id="pr84" size="5" value="<?php echo format_num($rws['pr84']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr85" type="text" id="pr85" size="5" value="<?php echo format_num($rws['pr85']); ?>"  /></td> <?php endif;?>           

		</tr>
		<?php endif;?>
		<?php if($_REQUEST['txtqty9'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty9'] ?> pieces</th>             
			   <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr91" type="text" id="pr91" size="5"  value="<?php echo format_num($rws['pr91']); ?>"    /></td> <?php endif;?>  
			  <?php if($_REQUEST['txtday2'] > 0):?>    <td align="center"><input name="pr92" type="text" id="pr92" size="5"   value="<?php echo format_num($rws['pr92']); ?>"  /></td><?php endif;?>
			  <?php if($_REQUEST['txtday3'] > 0):?>    <td align="center"><input name="pr93" type="text" id="pr93" size="5"  value="<?php echo format_num($rws['pr93']); ?>"    /></td><?php endif;?>
			  <?php if($_REQUEST['txtday4'] > 0):?>    <td align="center"><input name="pr94" type="text" id="pr94" size="5"  value="<?php echo format_num($rws['pr94']); ?>"    /></td><?php endif;?>
			  <?php if($_REQUEST['txtday5'] > 0):?>    <td align="center"><input name="pr95" type="text" id="pr95" size="5"   value="<?php echo format_num($rws['pr95']); ?>"  /></td>  <?php endif;?>          

		</tr>
		<?php endif;?>
		<?php if($_REQUEST['txtqty10'] > 0):?>
		<tr>
			  <th><?php echo $_REQUEST['txtqty10'] ?> pieces</th>             
			  <?php if($_REQUEST['txtday1'] > 0):?>   <td align="center"><input name="pr101" type="text" id="pr101" size="5"  value="<?php echo format_num($rws['pr101']); ?>"   /></td> <?php endif;?>  
			   <?php if($_REQUEST['txtday2'] > 0):?>   <td align="center"><input name="pr102" type="text" id="pr102" size="5"  value="<?php echo format_num($rws['pr102']); ?>"   /></td><?php endif;?>
			   <?php if($_REQUEST['txtday3'] > 0):?>   <td align="center"><input name="pr103" type="text" id="pr103" size="5"  value="<?php echo format_num($rws['pr103']); ?>"   /></td><?php endif;?>
			   <?php if($_REQUEST['txtday4'] > 0):?>   <td align="center"><input name="pr104" type="text" id="pr104" size="5"   value="<?php echo format_num($rws['pr104']); ?>"  /></td><?php endif;?>
			   <?php if($_REQUEST['txtday5'] > 0):?>   <td align="center"><input name="pr105" type="text" id="pr105" size="5"  value="<?php echo format_num($rws['pr105']); ?>"    /></td> <?php endif;?>           

		</tr>
		<?php endif;?>
  </table>
     