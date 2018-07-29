<?php require_once('conn.php'); ?>
<?php 
//echo $_REQUEST['uid'];
if(isset($_GET['vid'])) {
	$sqv = "select * from vendor_maincont_tb where coustid='".$_GET['vid']."'";
	$resv = mysql_query($sqv) or die('err');
	$i = 1; 	
	while($rwv = mysql_fetch_assoc($resv)) {
	?>
		<input type="checkbox" name="mcont_<?php echo $i;?>" id="maincont[]" value="<?php echo $rwv['enggcont_id']; ?>" />
		<?php 
		echo $rwv['name'].' '.$rwv['lastname'].'<br>'; 
		$i++;
	}
}
else {
	$sqv = "select * from maincont_tb where coustid='".$_REQUEST['uid']."'";
	$resv = mysql_query($sqv) or die('err');
	$i = 1;
	while($rwv = mysql_fetch_assoc($resv)) {
	?>
		<input type="checkbox" name="mcont_<?php echo $i;?>" id="maincont[]" value="<?php echo $rwv['enggcont_id']; ?>" />
		<?php 
		echo $rwv['name'].' '.$rwv['lastname'].'<br>'; 
		$i++;
	}
}
?>