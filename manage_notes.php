<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

//Notes List
$title = "Manage Generic Notes";
$sqls = "select * from notes_tb order by nid";

// Paging Code Starts
// how many rows to show per page 
$rowsPerPage = 50; 

// by default we show first page 
$pageNum = 1; 

// if $_GET['page'] defined, use it as page number 
if(isset($_GET['page'])) { 
	$pageNum = $_GET['page']; 
} 

// counting the offset 
$offset = ($pageNum - 1) * $rowsPerPage; 

$cres  = mysql_query($sqls) or die('Error, query failed'); 
$numrows = mysql_num_rows($cres);

// how many pages we have when using paging? 
$maxPage = ceil($numrows / $rowsPerPage); 

// print the link to access each page
$self = $_SERVER['PHP_SELF']; 

$nav = ''; 

for($page = 1; $page <= $maxPage; $page++) { 

	if ($page == $pageNum) { 
		$nav .= " $page ";   // no need to create a link to current page 
	} 
	else $nav .= " <a href=\"$self?page=$page\">$page</a> "; 
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

	<td valign='top'> <!-- Notes List -->
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="3"><strong><?php echo $title; ?></strong></td>	
	</tr>

	<tr>
	  <td height="30" colspan="3" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td height="30" class="hdrow">Note type</td>
		<td class="hdrow" width='70%'>Note</td>
		<td class="hdrow">Edit</td>
	</tr>

	<?php

	if($ress) {
		while($nrow = mysql_fetch_assoc($ress)) {

			echo "
			<tr>
				<td height='30' class='ctr'>".$nrow['ntitle']."</td>
				<td>".nl2br($nrow['ntext'])."</td>
				<td class='ctr'><a href='edit_note.php?ntype=".$nrow['ntype']."'>Edit</a></td>
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