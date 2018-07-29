<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from project_tb where pid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel) or die('error in data');
}

if($_REQUEST['dupid'] != "") {

	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM project_tb WHERE pid= "'.$_REQUEST['dupid'].'"';

	$sqdup2 = 'UPDATE  tmptable_1 SET pid= NULL';
	$sqdup3 = 'INSERT INTO project_tb  SELECT * FROM tmptable_1';

	$sqdup1 = mysql_query($sqdup1) or die(mysql_error());
	$sqdup2 = mysql_query($sqdup2) or die(mysql_error());
	$sqdup3 = mysql_query($sqdup3) or die(mysql_error());

	///////////New code
	$duplicate_pid = mysql_insert_id();

	$qry_update_date = "UPDATE project_tb set create_dt=now() where pid=".$duplicate_pid;
	mysql_query($qry_update_date) or die(mysql_error());
	///////end new-code

	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';
	$sqdup4 = mysql_query($sqdup4) or die('error in data');

	$qry_ins = "INSERT INTO project_quotes (pid, quote_id) SELECT '".$duplicate_pid."', p.quote_id FROM project_quotes p where p.pid='".$_REQUEST['dupid']."'";
	mysql_query($qry_ins) or die(mysql_error());

	echo "<script type='text/javascript'>location.href='manage_project.php'</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Projects</title>
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
<script type="text/javascript" src="jquery/js/jquery.livequery.js"></script>

<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script type="text/javascript">
function del(id) {
	var answer = confirm ("Do you want to delete the record");
	if(answer) {
		location.href = "manage_project.php?delid=" + id;
	}
	else {
		return false;
	}
}
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
		<form name="form1" method="get" action="">

		<table align='center' border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >
		<tr>
			<td height="30" colspan="2"><strong>Search By </strong></td>
		</tr>

		<tr>
			<td width="180" height="30">Search BY Project Name </td>
			<td width="300" height="30">
			<input type="text" name="srchp" id="srchp">
			<input type="submit" value="submit" name="btnproj"></td>
		</tr>
		</table>
		</form>

		<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">
		<tr>
			<td height="30" colspan="4"><font size="3"><strong>MANAGE PROJECT</strong></font></td>
			<td height="30" colspan="4" align="center"><a href="add_project.php">ADD PROJECT</a></td>
		</tr>
								
		<?php		
		/**********************************/

		// Paging Code Starts
		// how many rows to show per page 
		$rowsPerPage = 100; 

		// by default we show first page 
		$pageNum = 1; 

		//echo "<br>PageNum :  ".$pageNum ;
		// if $_GET['page'] defined, use it as page number 

		if(isset($_GET['page'])) { 
			$pageNum = $_GET['page']; 
		} 
		// counting the offset 
		$offset = ($pageNum - 1) * $rowsPerPage; 

		$sqs = "select * from project_tb";
		$sqs .= " ORDER BY project_name LIMIT $offset, $rowsPerPage ";

		if(isset($_REQUEST['btnproj'])) {
			$srchc = $_REQUEST['srchp'];
			$sqs = "select * from project_tb where project_name like '%".$srchc."%'";
			$sqs .= " ORDER BY project_name LIMIT $offset, $rowsPerPage ";
		}

		$res1 = mysql_query($sqs, $conn) or die('error in data'.mysql_error());

		if(mysql_num_rows($res1) > 0) {

			$query = "select * from project_tb";
			$result  = mysql_query($query) or die('Error, query failed');
			$numrows = mysql_num_rows($result);

			// No of rows u need to assign

			// how many pages we have when using paging? 
			$maxPage = ceil($numrows/$rowsPerPage); 

			//echo "<br>Maximum Pages : ".$maxPage;

			// print the link to access each page 
			$self = $_SERVER['PHP_SELF']; 

			$nav = ''; 

			for($page = 1; $page <= $maxPage; $page++) { 

				if ($page == $pageNum) { 
					$nav .= " $page ";   // no need to create a link to current page 
				} 
				else { 
					$nav .= " <a href=\"$self?page=$page\">$page</a> "; 
				} 
			} 			

			// creating previous and next link 
			// plus the link to go straight to 
			// the first and last page 			

			if ($pageNum > 1) { 
				$page = $pageNum - 1; 
				$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 
				$first = " <a href=\"$self?page=1\">[First Page]</a> ";
			}  
			else  { 
				$prev  = '&nbsp;'; // we're on page one, don't print previous link 
				$first = '&nbsp;'; // nor the first page link 
			} 			

			if ($pageNum < $maxPage)  {
				$page = $pageNum + 1; 
				$next = " <a href=\"$self?page=$page\">[Next]</a> "; 
				$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 
			}  
			else  { 
				$next = '&nbsp;'; // we're on the last page, don't print next link 
				$last = '&nbsp;'; // nor the last page link
			} 		

			// print the navigation link 

?>		
		<tr>
			<td height="30" colspan="8" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
		</tr>

		<tr>
			<td width="56" height="30" align="center"><strong>ID</strong></td>
			<td width="207" height="30" align="center"><strong>Project Name</strong></td>
			<td width="107" align="center"><strong>Added Date</strong></td>
			<td width="107" align="center"><strong>EDIT</strong> </td>
			<td width="107" align="center"><strong>Download PDF</strong></td>
			<td width="107" align="center"><strong>VIEW PDF</strong></td>
			<td width="76" height="30" align="center"><strong>Delete</strong></td>
			<td width="76" height="30" align="center"><strong>Duplicate</strong></td>
		</tr>
		<?php 

		while($rwc = mysql_fetch_assoc($res1)) {
		?>
		<tr>
			<td height="30" align="center"><?php echo $rwc['pid']; ?>&nbsp;</td>
			<td height="30" align="center"><?php 
			echo $rwc['project_name'];
			?></td>
			<td align="center"><?php echo $rwc['create_dt']; ?></td>
			<td align="center"><a href="add_project.php?pid=<?php echo $rwc['pid']; ?>">EDIT</a></td>
			<td align="center"><a href="project-pdf.php?id=<?php echo $rwc['pid'];?>">Download PDF</a></td>
			<td align="center"><a target="_blank" href="project-pdf.php?id=<?php echo $rwc['pid'];?>&amp;oper=view">VIEW PDF</a></td>
			<td height="30" align="center"><a href="#" onclick="del('<?php echo $rwc['pid'];?>');">Delete</a></td>
			<td height="30" align="center"><a href="manage_project.php?dupid=<?php echo $rwc['pid'];?>">Duplicate</a></td>
		</tr>
	<?php 
	  }
	?>
	<tr>
		<td height="30" colspan="8" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>
<?php 
}// end of if
else {
?>
	<tr>
		<td height="50" colspan="8"><strong>No Project Found</strong></td>
	</tr>
<?php 
}
?>
	</table>
	</td>
</tr>
</table>

</body>
</html>