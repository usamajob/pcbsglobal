<?php require_once('chksess.php');?>
<?php require_once('conn.php'); ?>
<?php
if($_REQUEST['delid'] != "") {
	$sqdel = 'delete from stock_tb where stkid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	$sqdel = 'delete from stock_ret where stkid="'.$_REQUEST['delid'].'"';
	$resdel = mysql_query($sqdel);	
	header("location: manage_stock.php");
	exit;
}
?>
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
 var $j = jQuery.noConflict();
	jQuery(document).ready(function(){
		$j('#srch').autocomplete({source:'getpursrch.php', minLength:1});
		$j('#srchc').autocomplete({source:'getpursrchc.php', minLength:1});
		$j('#srchv').autocomplete({source:'getpursrchv.php', minLength:1});

		$j('.dalerts').hover(function(e) {
			var aid = $j(this).attr('id').substring(1);
			$j('#div_'+aid).show();
		});

		$j('.dalerts').mouseleave(function(){
			var aid = $j(this).attr('id').substring(1);
			$j('#div_'+aid).hide();
		});

		$j('.allocations').hover(function(e) {
			var aid = $j(this).attr('id').substring(1);
			$j('#aldiv_'+aid).show();
		});

		$j('.allocations').mouseleave(function(){
			var aid = $j(this).attr('id').substring(1);
			$j('#aldiv_'+aid).hide();
		});
	}); 
</script>
<?php
if($_REQUEST['dupid'] != "") {
	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM stock_tb WHERE stkid= "'.$_REQUEST['dupid'].'"';
	$sqdup2 = 'UPDATE  tmptable_1 SET stkid = NULL';
	$sqdup3 = 'INSERT INTO stock_tb  SELECT * FROM tmptable_1';
	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_1';
	$sqdup1 = mysql_query($sqdup1);
	$sqdup2 = mysql_query($sqdup2);
	$sqdup3 = mysql_query($sqdup3);
	$sqdup4 = mysql_query($sqdup4);
	 echo '<script>window.location.href = "manage_stock.php";</script>';
	exit;
}

//Stock List
$title = "Manage Stock";
$sqls = "select st.*, (select sum(qty) from stock_ret str where str.stkid=st.stkid) rqty from stock_tb st ORDER BY stkid";

if(isset($_GET['btncus'])) {
	$srchc = $_GET['srchc'];
	$sqls = "select st.*, (select sum(qty) from stock_ret str where str.stkid=st.stkid) rqty from stock_tb st where st.customer like '%".$srchc."%' ORDER BY stkid";
}
else if(isset($_GET['btnpart'])) {	
	$pno = $_GET['srch'];
	$sqls = "select st.*, (select sum(qty) from stock_ret str where str.stkid=st.stkid) rqty from stock_tb st where st.part_no like '%".$pno."%' ORDER BY stkid";
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

function del(id) {
	var answer = confirm ("Do you want to delete the record");

	if(answer) 
		location.href = "manage_stock.php?delid="+id;
	else 
		return false;
}
</script>
<script type="text/javascript"> 
var $j = jQuery.noConflict();
jQuery(document).ready(function(){
	$j('#srch').autocomplete({source:'getstocksrch.php?s=1', minLength:1});
	$j('#srchc').autocomplete({source:'getstocksrch.php?s=2', minLength:1});

	$j('.overlay_close_trig').click(function(){
		$j(this).parent().hide();
	});

	$j('.ttip_overlay_trig').click(function(){
		$j('.ttip_overlay').hide();
		$j(this).next().show();
		var ele = $j(this).next();
	});

	$j('.ttip_overlay_close_trig').click(function(){
		$j(this).parent().hide();
	});

	$j('.ttip_overlay').mouseleave(function(){
		$j('.ttip_overlay').hide();
	});
});
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

	<td valign='top'> <!-- Stock List -->

	<form name="form1" method="get" action="">

		<table align='center' border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" >

		  <tr>
			<td height="30" colspan="2"><strong>Search By </strong></td>
		  </tr>

		  <tr>
			<td width="180" height="30">Search By Part Number</td>
			<td width="300" height="30">
			<input type="text" name="srch" id="srch">
			<input type="submit" value="submit" name="btnpart"></td>
		  </tr>

		  <tr>
			<td width="180" height="30">Search By Customer Name</td>
			<td width="300" height="30">
			<input type="text" name="srchc"  id="srchc">
			<input type="submit" value="submit" name="btncus"></td>
		  </tr>

		</table>
	</form>
	
	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">

	<tr>
		<td height="30" colspan="7"><strong><?php echo $title; ?></strong></td>	
		<td colspan="7"><a href="add_stock.php">Add Stock</a></td>	
	</tr>

	<tr>
	  <td height="30" colspan="14" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
	</tr>

	<tr>
		<td height="30" class="hdrow">Stk#</td>
		<td class="hdrow">Customer</td>
		<td class="hdrow">Part No</td>
		<td class="hdrow">Rev</td>
		<td class="hdrow">Supplier</td>
		<td class="hdrow">Date Add.</td>
		<td class="hdrow">D/C</td>
		<td class="hdrow">Finish</td>
		<td class="hdrow">Mfg Date</td>
		<td class="hdrow">Docs<br>Ready</td>
		<td class="hdrow" width="40">Stock Qty</td>
		<td class="hdrow" width="40">Remaining Qty</td>
		<td class="hdrow">Edit</td>
		<td class="hdrow">Delete</td>
		<td class="hdrow">Duplicate</td>
	</tr>

	<?php

	if($ress) {
		while($rows = mysql_fetch_assoc($ress)) {

			$rowbg = '';

			if($rows['manuf_dt'] != '') {
				$mdt = explode('-', $rows['manuf_dt']);
				$mdate = $mdt[0]."-".$mdt[2];
				$timestamp = strtotime($mdt[2].'-'.$mdt[0].'-'.$mdt[1]);

				if( ($rows['finish'] == 'HASL' && (time() - $timestamp)/(3600*24) > 170) || (($rows['finish'] == 'ENIG' || $rows['finish'] == 'ENEPIG') && (time() - $timestamp)/(3600*24) > 350) ) {
					$rowbg = "style='background: #fcc'";				 
				}
			}
			else $mdate = '';

				
			echo "<tr $rowbg >
				<td height='25' class='ctr'>".$rows['stkid']."</td>
				<td class='ctr'>";

			$csql = "select c_shortname from data_tb where c_name='".$rows['customer']."'";
			$cres = mysql_query($csql);
			$crow = mysql_fetch_assoc($cres);

			echo $crow['c_shortname'];
		
			echo "</td>
				<td class='ctr'>";

			$comment= $rows['comments'];
			$aflag = strlen($comment);
			if($comment != '') {					
				echo "<div style='position: relative; clear: both'>"."<div class='ttip_overlay' id='div_".$rows['stkid']."' style='z-index: 1000;
padding: 0px 10px 10px;
background: rgb(255, 238, 238) none repeat scroll 0% 0%;
border: 1px solid rgb(51, 102, 153);
position: absolute;
top: -10px;
left: 150px;
text-align: left;
width: 200px;
margin-top: -50px;
display: none;'><h3>Comment</h3>".$comment;
echo "</div></div>";
			}

			if($aflag >1){
				echo "<a href='javascript:void(0)' class='dalerts' id='p".$rows['stkid']."'>";
				echo $rows['part_no'];
				echo "</a>";
				 }else{
				 echo $rows['part_no'];
				 }
				echo "</td>
				<td class='ctr'>".$rows['rev']."</td>
				<td class='ctr'>";

			$sqv = "select * from vendor_tb where data_id='".$rows['supplier']."'";
			$resv = mysql_query($sqv) or die('error in data');
			$rwv = mysql_fetch_assoc($resv);
			echo $rwv['c_shortname']; 			

			echo "</td>
				<td class='ctr'>".substr($rows['dtadded'], -10)."</td>
				<td class='ctr'>".$rows['dc']."</td>
				<td class='ctr'>".$rows['finish']."</td>
				<td class='ctr'>".$mdate."</td>
				<td class='ctr'>".(1 == $rows['docsready'] ? "yes" : "no")."</td>
				<td class='ctr'>";				
			
			$psql = "select qty, note from posa_tb where customer='".$rows['customer']."' and  part_no='".$rows['part_no']."' and rev='".$rows['rev']."'";
			$pres = mysql_query($psql) or die(mysql_error());	

			if(mysql_num_rows($pres) > 0) {
				$prow = mysql_fetch_assoc($pres);

				echo "<a class='ttip_overlay_trig' href=\"javascript:void(0)\" style='font-weight: bold; font-size: 12px'>".($rows['qty'])."</a>
				<div class='ttip_overlay' style='width:250px;  margin-left: -30px; text-align: left'>
				<a href=\"javascript:void(0)\" class='ttip_overlay_close_trig' style='color:#c00; float:right'>Close</a>

				<p>Quantity Allocated: ".($prow['qty'] == '' ? '0' : $prow['qty'])."<br>".($prow['note'] != '' ? 'Note: '.$prow['note'] : '')."</p></div>";				
			}
			else echo $rows['qty'];	

			$sql_remain = "SELECT SUM(qut) AS qut FROM stock_allocation WHERE stock_id = ".$rows['stkid']." AND delivered_on = 00-00-0000" ;
			$remain_res = mysql_query($sql_remain);

			while ($remain_row = mysql_fetch_assoc($remain_res) ) {
				$remaining_qut = $remain_row['qut'];
			}
			$remaining_qut = $rows['qty'] - $remaining_qut;

			$sql_allocation_qut = "SELECT * FROM stock_allocation WHERE stock_id =".$rows['stkid']." AND delivered_on = 00-00-0000 ";
			$res_allocation_qut = mysql_query($sql_allocation_qut);

			echo "</div></div>";

			echo "</td>
				<td>";
				if(mysql_num_rows($res_allocation_qut)>0){

				echo "<div style='position: relative; clear: both'>"."<div class='ttip_overlay' id='aldiv_".$rows['stkid']."' style='z-index: 1000;
padding: 0px 10px 10px;
background: rgb(255, 238, 238) none repeat scroll 0% 0%;
border: 1px solid rgb(51, 102, 153);
position: absolute;
top: -50px;
left: -290px;
text-align: left;
width: 270px;
margin-top: -40px;
display: none;'><h3>Stock Allocation</h3><table class='al_tb'>
<tr>
	<th>Customer</th>
	<th>PO#</th>
	<th>Qty</th>
	<th>Due Date</th>
</tr>

";
while($row_allocation_qut = mysql_fetch_assoc($res_allocation_qut)){
				?>
				<tr>
					<td><?php echo $row_allocation_qut['customer'] ?></td>
					<td><?php echo $row_allocation_qut['pono'] ?></td>
					<td><?php echo $row_allocation_qut['qut'] ?></td>
					<td><?php echo date('m-d-Y',strtotime($row_allocation_qut['due_date'])) ?></td>
				</tr>
				<?php
			}
			echo" </table>
		
<h3>Comment</h3>
".$rows['comments']."

			</div>
			";
		}
		if($rows['qty']>$remaining_qut){

		echo"<a href='javascript:void(0)' class='allocations' id='p".$rows['stkid']."' style='color:red;'>$remaining_qut</a>";
		}else{
			echo "$remaining_qut";
		}
		echo"
				</td>
				<td class='ctr'><a href='add_stock.php?stkid=".$rows['stkid']."'>Edit</a></td>
				<td class='ctr'><a href='#' onclick=\"del(".$rows['stkid'].");\">Delete</a></td>
				<td class='ctr'><a href='manage_stock.php?dupid=".$rows['stkid']."'>Duplicate</a></td>
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