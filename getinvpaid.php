<?php require_once('conn.php'); 

$invid = $_GET['invid'];
$stat = ($_GET['ispaid'] == 'true' ? '1' : '0');
$paytype = '';
$paydetail = '';
$paydate = '';

//print_r($_GET);

if($stat == '1') {

	$query = "select * from invoice_tb where invoice_id = '".$invid."'";
	$result = mysql_query($query) or die();
	$row = mysql_fetch_assoc($result);

	$paytype = $row['paytype'];
	$paydetail = $row['paydetail'];
	$paydate = $row['paydate'];
	$paynote = $row['paynote'];
	$paydate = $row['paydate'];

?>


	

	<a id='close' class="close" style='color: #c00; float: right; cursor: pointer' >Close [X]</a>

	<br><br>

	<form method="post" >

	<input type="hidden" name="payinv" value="<?php echo $invid; ?>" >

	<strong>Payment Type:</strong>

	<table width="100%">
	<tr>
		<td><input type="radio" name="paytype" value="check" <?php echo ($row['paytype'] == 'check' ? ' CHECKED ' : ''); ?> > Check</td>
		<td><input type="text" name="checkval" value="<?php echo ($paytype == 'check' ? $paydetail : ''); ?>" ></td>
	</tr>
	<tr>
		<td><input type="radio" name="paytype" value="wire" <?php echo ($paytype == 'wire' ? ' CHECKED ' : ''); ?> > Wire</td>
		<td><input type="text" name="wireval" value="<?php echo ($paytype == 'wire' ? $paydetail : ''); ?>" ></td>
	</tr>
	<tr>
		<td><input type="radio" name="paytype" value="transfer" <?php echo ($paytype == 'transfer' ? ' CHECKED ' : ''); ?> > Transfer</td>
		<td><input type="text" name="transferval" value="<?php echo ($paytype == 'transfer' ? $paydetail : ''); ?>" ></td>
	</tr>

	<tr>
		<td><strong>Payment Date:</strong> </td>
		<td><input type="text" name="paydate" id="idpaydate" value="<?php echo $paydate; ?>" ></td>
	</tr>

	<tr>
		<td><strong>Note:</strong> </td>
		<td><input type="text" name="paynote" value="<?php echo $paynote; ?>" ></td>
	</tr>
	</table>	

	<br><br><input type="submit" value="Save" name="paysave" >

	</form>

<?php
} 

$query = "update invoice_tb set ispaid = '".$stat."' where invoice_id = '".$invid."'";
//echo $query;
$result = mysql_query($query) or die();

?>

<script type="text/javascript" src="jquery/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function() {		
	$j('.close').livequery('click', function(e) {
		$j(this).parent().hide();	
	});

	$j('#idpaydate').datepicker({
		dateFormat: 'mm/dd/yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
        defaultDate: "<?php echo paydate ?>"
	});
});
</script> 