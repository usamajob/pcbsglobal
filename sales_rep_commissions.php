<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
$repid = isset($_GET['repid']) ? $_GET['repid'] : '';

if( $repid != '' ) {

// Paging Code Starts
// how many rows to show per page 
$rowsPerPage = 15; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) { 
	$pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 
$sqlr = "select r_name from rep_tb where repid='".escpe($_GET['repid'])."'";
$rres  = mysql_query($sqlr) or die('Error, query failed'); 
if(mysql_num_rows($rres) < 1) die('There are no invoices for chosen repid');

$rrow = mysql_fetch_assoc($rres);

$title = " - ".$rrow['r_name'];

$sqls = "select * from  invoice_tb where salesrep like '".escpe($rrow['r_name'])."' ORDER BY podate desc ";

$ires  = mysql_query($sqls) or die('Error, query failed'); 
$numrows = mysql_num_rows($ires);

// how many pages we have when using paging? 
$maxPage = ceil($numrows/$rowsPerPage); 

// print the link to access each page
$self = $_SERVER['PHP_SELF']; 

$nav = ''; 

for($page = 1; $page <= $maxPage; $page++) { 

	if ($page == $pageNum) { 
		$nav .= " $page ";   // no need to create a link to current page 
	} 
	else  { 
		if($page == 1)
		$nav .= " <a href=\"$self\">$page </a> "; 
		else
			$nav .= " <a href=\"$self?page=$page \">$page</a> "; 
	}
} 


// creating previous and next link 
// plus the link to go straight to 
// the first and last page 

if ($pageNum > 1) { 
	$page = $pageNum - 1; 
	$prev = " <a href=\"$self?page=$page \">[Prev]</a> "; 
	$first = " <a href=\"$self \">[First Page]</a> "; 
}
else { 
	$prev  = '&nbsp;'; // we're on page one, don't print previous link
	$first = '&nbsp;'; // nor the first page link 
} 						

if ($pageNum < $maxPage) { 
	$page = $pageNum + 1; 
	$next = " <a href=\"$self?page=$page \">[Next]</a> ";
	$last = " <a href=\"$self?page=$maxPage \">[Last Page]</a> "; 
}  
else  { 
	$next = '&nbsp;'; // we're on the last page, don't print next link 
	$last = '&nbsp;'; // nor the last page link 
}

//Final query 
$sqls .= " LIMIT $offset, $rowsPerPage ";

$ress = mysql_query($sqls);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<script type="text/javascript" src="js/gotowelcome.js"></script> 
<script type="text/javascript">
var $j = jQuery.noConflict();
var invlist = '';

function genpdf(oper) {
	$j(':checkbox:checked').each(function() {
		invlist = invlist + $j(this).val() + '|';
	});
	var repid = "<?php echo $_GET['repid'] ?>";
	if(invlist == '') alert('Please select invoices to generate pdf');
	else {  window.open('genpdf_salesrep.php?repid='+repid+'&inv='+invlist+'&oper='+oper); }
}

function invedit(flag, invid) {
	$j('#invid').val(invid);
	$j('#dateblk'+flag).show();
}

function closeblk(flag) { $j('#dateblk'+flag).hide(); }

function savedate(flag) {
	var inv = $j('#invid').val();
	if(flag == 0) var dt = $j('#due_date').val();
	else var dt = $j('#com_date').val();
	$j.post('saveComDate.php', {invid: inv, comdate: dt, flag: flag}, function(txt) {	if(txt) $j('#dt'+flag+inv).html(dt);
		$j('#dateblk'+flag).hide();
	});
}

jQuery(document).ready(function(){
	$j('#selrep').change(function(){
		location.href = "sales_rep_commissions.php?repid="+$j(this).val();
	});
});
</script>
<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>

<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('com_date', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%m/%d/%Y', 'draggable': true , });});

window.addEvent('domready', function() {
new CalendarEightysix('due_date', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%m/%d/%Y', 'draggable': true , });});
</script>

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />

<title>Admin Panel - Invoice list for Sales Rep <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">
<style>
.dateblk { display: none; position: absolute; padding: 20px; 
width: 200px; z-index: 99; border: 1px solid #333; background: #fff; 
left: -100px; }
</style>
</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>
</table><!-- Header Ends -->

<table border="0" cellpadding="0" cellspacing="0" width="99%">
<tr>
	<td align="center" valign="top" style="line-height: 16px; width: 200px"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'> <!-- Sales Rep Invoice List -->
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="4"><strong>Invoice list for Sales Rep<?php echo $title; ?></strong></td>	

		<td colspan="2">
		Select Rep: <select id="selrep">
		<option value="" >Select</option>
		<?php 
			$sqc = "select DISTINCT repid, r_name from rep_tb order by r_name";
			$resc = mysql_query($sqc) or die('error in data');
			while($rwc = mysql_fetch_assoc($resc)) {
			?>
			<option value="<?php echo $rwc['repid'] ?>" <?php if($repid == $rwc['repid']) { ?> selected <?php } ?> ><?php echo $rwc['r_name'] ?></option>
			<?php 
			}
			?>
		</select></td>	

		<td colspan="2"><?php if( $repid != '' ) echo '<a href="#" onclick="genpdf(\'view\')">VIEW Pdf</a> &nbsp; &nbsp; &nbsp;<a href="#" onclick="genpdf(\'download\')">Download Pdf</a>'; ?></td>
	</tr>

	<tr>
	  <td height="30" colspan="8" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td class="hdrow">Invoice #</td>
		<td class="hdrow">Customer</td>
		<td class="hdrow">Part No</td>
		<td class="hdrow">Invoice DATE</td>
		<td class="hdrow">Commission%</td>
		<td class="hdrow" style="position: relative;">Commission Due by<div id='dateblk0' class='dateblk'><div style="text-align: right; margin-bottom: 10px"><a href='#' onclick="closeblk('0')">Close[X]</a></div>
		Commission due by Date:<br><br><input type="text" name="due_date" id="due_date"> <a href='#' onclick="savedate('0')">Save</a></div></td>
		<td class="hdrow" style="position: relative;">Commission Paid On<div id='dateblk1' class='dateblk'><div style="text-align: right; margin-bottom: 10px"><a href='#' onclick="closeblk('1')">Close[X]</a></div>
		Commission paid on Date:<br><br><input type="text" name="com_date" id="com_date"><input type="hidden" id="invid"> <a href='#' onclick="savedate('1')">Save</a></div></td>
		<td class="hdrow">Include in pdf</td>
	</tr>

	<?php

	if($ires) {
		while($rwc = mysql_fetch_assoc($ires)) {

			echo "<tr><td height='25' class='ctr'><a href='edit_invoice.php?id=". $rwc['invoice_id']."' target='new'>".($rwc['invoice_id']+9976)."</td>
				<td class='ctr'>";
				$csql = "select c_shortname from data_tb where c_name='".$rwc['customer']."'";
				$cres = mysql_query($csql);
				$crow = mysql_fetch_assoc($cres);

				echo $crow['c_shortname'];
				
				echo "</td>	
				<td class='ctr'>".$rwc['part_no']."</td>
				<td class='ctr'>".$rwc['podate']."</td>
				<td class='ctr'>".$rwc['commision']."</td>
				<td class='ctr'><span id='dt0".$rwc['invoice_id']."'>".($rwc['due_date'] == '' ? 'Pending' : $rwc['due_date'])."</span> <a href='#' onclick=\"invedit(0, '".$rwc['invoice_id']."')\">Edit</a></td>
				<td class='ctr'><span id='dt1".$rwc['invoice_id']."'>".($rwc['com_date'] == '' ? 'Pending' : $rwc['com_date'])."</span> <a href='#' onclick=\"invedit(1, '".$rwc['invoice_id']."')\">Edit</a></td>
				<td class='ctr'><input type='checkbox' name='invlist[]' value='".$rwc['invoice_id']."'></td>
				
			</tr>";
		}
	}
	?>

	</table>

	</td>
</tr>
</table>

</body>
</html>