<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

//Reminders List
$title = "Manage Reminders";

if($_GET['delid'] != "") {
	$sqdel = 'delete from reminder_tb where id="'.$_GET['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}

// Paging Code Starts
// how many rows to show per page 
$rowsPerPage = 100; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) { 
	$pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 

$sqls = "select rt.*, ot.cust_name, ot.part_no, ot.rev 
from reminder_tb rt inner join order_tb ot
on rt.quoteid = ot.ord_id ORDER BY quoteid desc ";

if(isset($_REQUEST['btncus'])) {
	$srchc = trim($_REQUEST['srchc']);
	$sqls = "select rt.*, ot.cust_name, ot.part_no, ot.rev 
	from reminder_tb rt inner join order_tb ot
	on rt.quoteid = ot.ord_id  where ot.cust_name='".$srchc."'";
	$sqls .= " ORDER BY quoteid desc ";
}
else if(isset($_REQUEST['btnpart'])) {

	$srch = trim($_REQUEST['srch']);
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	$cname = $pieces[2];

	$sqls = "select rt.*, ot.cust_name, ot.part_no, ot.rev 
	from reminder_tb rt inner join order_tb ot
	on rt.quoteid = ot.ord_id  where ot.part_no ='".$pno."'";
	$sqls .= " ORDER BY quoteid desc ";
}

$cres  = mysql_query($sqls) or die('Error, query failed'); 
$numrows = mysql_num_rows($cres);

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
		$nav .= " <a href=\"$self?page=$page\">$page</a> "; 
	}
} 

// creating previous and next link 
// plus the link to go straight to 
// the first and last page 

if ($pageNum > 1) { 
	$page = $pageNum - 1; 
	$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 
	$first = " <a href=\"$self\">[First Page]</a> "; 
}
else { 
	$prev  = '&nbsp;'; // we're on page one, don't print previous link
	$first = '&nbsp;'; // nor the first page link 
} 						

if ($pageNum < $maxPage) { 
	$page = $pageNum + 1; 
	$next = " <a href=\"$self?page=$page\">[Next]</a> ";
	$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 
}  
else  { 
	$next = '&nbsp;'; // we're on the last page, don't print next link 
	$last = '&nbsp;'; // nor the last page link 
}

//Final query 
$sqls .= " LIMIT $offset, $rowsPerPage ";

$ress = mysql_query($sqls);
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

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />

<script type="text/javascript">
$j(document).ready(function() {
	$j('#srch').autocomplete({source:'getqtsrch.php', minLength:1});
	$j('#srchc').autocomplete({source:'getqtsrchc.php', minLength:1});

	$j('.statuschange').click(function() {
		var sid = $j(this).attr('id');
		$j.get('changeReminderStatus.php', { id: $j(this).attr('id'), status: $j(this).text()}, function(txt) { 
			if(txt.length > 0) {
				var parts = txt.split('|');
				$j('#s'+sid).html(parts[0]);
				$j('#'+sid).text(parts[1]);
			}
		} );
	});
});

function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href = "manage_reminders.php?delid=" + id;
	}
	else {
		return false;
	}
}
</script> 
<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

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

	<td valign='top'> 
	
	<!-- Search Form -->
	<form name="form1" method="get" action="">
	<table bordercolor="#e6e6e6" width="500" border="1"  cellpadding="2" cellspacing="2" align="center">
	<tr>
		<td height="30" colspan="2"><strong>Search By </strong></td>
	</tr>

	<tr>
		<td width="180" height="30">Search BY Part Number </td>
		<td width="300" height="30">
		<input type="text" name="srch"  id="srch">
		<input type="submit" value="submit" name="btnpart">
		</td>
	</tr>

	<tr>
		<td width="180" height="30">Search BY Customer Name </td>
		<td width="300" height="30">
		<input type="text" name="srchc"  id="srchc">
		<input type="submit" value="submit" name="btncus"></td>
	</tr>
	</table>
	</form>
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="9"><strong><?php echo $title; ?></strong></td>	
	</tr>
	<tr>
		<td height="30" colspan="9" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<!-- Reminders List -->
	<tr>
		<td height="30" class="hdrow">Quote#</td>
		<td class="hdrow">Customer</td>
		<td class="hdrow">Part No</td>
		<td class="hdrow">Rev</td>
		<td class="hdrow" width='70'>Enabled</td>
		<td class="hdrow">Last Reminder</td>
		<td class="hdrow">Period<br><small>(days)</small></td>
		<td class="hdrow"></td>
		<td class="hdrow"></td>
	</tr>

	<?php
	if($ress) {
		while($rows = mysql_fetch_assoc($ress)) {
			echo "<tr>
				<td height='30' width='8%' class='ctr'>".$rows['quoteid']."</td>
				<td class='ctr' width='25%'>".$rows['cust_name']."</td>
				<td class='ctr' width='16%'>".$rows['part_no']."</td>
				<td class='ctr' width='8%'>".$rows['rev']."</td>
				<td class='ctr' id='s".$rows['id']."'>".ucfirst($rows['enabled'])."</td>
				<td class='ctr' width='15%'>".$rows['lastreminder']."</td>
				<td class='ctr' width='8%'>".$rows['days']."</td>
				<td class='ctr'><a class='statuschange' id='".$rows['id']."' style='cursor:pointer'>".($rows['enabled'] == 'yes' ? 'Disable' : 'Enable')."</a></td>
				<td align='center'><a href='#' onclick=\"del('".$rows['id']."')\">Delete</a></td>
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