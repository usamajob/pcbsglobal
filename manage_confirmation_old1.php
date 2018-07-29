<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

if($_REQUEST['delid']!="")

{

$sqdel='delete from corder_tb where poid="'.$_REQUEST['delid'].'"';

$resdel=mysql_query($sqdel);

if(!$resdel)

{

die('error in data');

}

}
if($_REQUEST['dupid']!="")

{


$sqdup1=' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM corder_tb WHERE poid= "'.$_REQUEST['dupid'].'"';

$sqdup2='UPDATE  tmptable_1  SET poid= NULL';
$sqdup3='INSERT INTO corder_tb  SELECT * FROM tmptable_1';
$sqdup4='DROP TEMPORARY TABLE IF EXISTS tmptable_1';

/*$sqdel='insert into order_tb select * from order_tb where ord_id="'.$_REQUEST['dupid'].'"';
*/
$sqdup1=mysql_query($sqdup1);
$sqdup2=mysql_query($sqdup2);

$sqdup3=mysql_query($sqdup3);
///////////New code
$duplicate_corder_id = mysql_insert_id();
//echo "duplicate_corder_id=".$duplicate_corder_id;
$qry_update_duplicate_corder_date="UPDATE corder_tb  set podate='".date('m/d/Y')."' Where poid=".$duplicate_corder_id;
mysql_query($qry_update_duplicate_corder_date);
///////end new-code


$sqdup4=mysql_query($sqdup4);


if(!$sqdup1)

{

die('error in data');

}
$sqsc="select * from citems_tb where pid='".$_REQUEST['dupid']."'";
$resc=mysql_query($sqsc);
if(!$resc)
{
die('error in data');
}
while($rwsc=mysql_fetch_array($resc))
{
$sqin="insert into citems_tb(item,itemdesc,qty2,uprice,tprice,pid) values('".$rwsc['item']."','".$rwsc['itemdesc']."','".$rwsc['qty2']."','".$rwsc['uprice']."','".$rwsc['tprice']."','".$duplicate_corder_id."')";
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in q');
}
}
echo "<script language='javascript'>location.href='manage_confirmation.php'</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Order confirmation</title>
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
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#srch').autocomplete({source:'getordcsrch.php', minLength:1});
			$j('#srchc').autocomplete({source:'getordcsrchc.php', minLength:1});
		});
 
	</script> 
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script language="javascript">



function del(id)



{



var answer = confirm ("Do you want to delete the record");



if(answer)



{



location.href="manage_confirmation.php?delid="+id;



}



else



{



return false;



}



}



</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head><body>

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

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tbody><tr>

                <td align="center">

                    <table  border="0" cellpadding="0" cellspacing="1" width="1300">

                        <tbody>

                                                    <tr style="height:20px; background-color:#FFF;"></tr>
                       

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>


                            <tr>

                                

                                <td id="mainpage" style="width: 750px;">

                                    <div>

                                        <table cellpadding="5" cellspacing="1" width="100%">

                                            

                                            <tbody><tr>

                                                

                                            </tr>

                                            
                                            <tr>

                                                <td>

                                                    <form name="form1" method="get" action="">

												        <table class="manageTop" width="500" border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                          <tr>

                                                            <td height="30" colspan="2"><strong>Search By </strong></td>

                                                          </tr>

                                                          <tr>

                                                            <td width="180" height="30">Search BY Order Part Number</td>

                                                            <td width="300" height="30">  <input type="text" name="srch"  id="srch">
                                                            <input type="submit" value="submit" name="btnpart"></td>

                                                          </tr>
														   <tr>

                                                            <td width="180" height="30">Search BY Customer Name</td>

                                                            <td width="300" height="30">  <input type="text" name="srchc"  id="srchc">
                                                            <input type="submit" value="submit" name="btncus"></td>

                                                          </tr>

                                                        </table>

                                                  </form>

                                                </td>

                                            </tr>
                                            
                                            <!--<tr>

                                                <td>

                                                    <form name="form2" enctype="multipart/form-data" method="POST" action="">

												        <table width="500" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                          <tr>

                                                            <td height="30" colspan="2"><strong>Upload Form </strong></td>

                                                          </tr>

                                                          <tr>

                                                            <td width="180" height="30">Select File</td>

                                                            <td width="300" height="30">
                                                           <input name="uploaded" id="uploaded" type="file" /><br />
 <input type="submit" name="submit11" id="submit11" value="Upload" />
                                                            </td>

                                                          </tr>

                                                        </table>

                                                  </form>

                                                </td>

                                            </tr>-->
                                            
                                            
                                            <tr>

												<td style="line-height: 16px;"><br>

                                                  <?php

// Paging Code Starts

		// how many rows to show per page 

		$rowsPerPage=10; 

		

		// by default we show first page 

		$pageNum = 1; 

		//echo "<br>PageNum :  ".$pageNum ;

		

		// if $_GET['page'] defined, use it as page number 

		if(isset($_GET['page'])) 

		{ 

			$pageNum = $_GET['page']; 

		} 

	

		// counting the offset 

		$offset = ($pageNum - 1) * $rowsPerPage; 

//$sq="select * from user";



//$srch=$_REQUEST['srch'];



$sqs="select * from corder_tb";

$sqs.=" ORDER BY poid desc LIMIT $offset, $rowsPerPage ";



if(isset($_REQUEST['btncus']))
	{
	$srchc =$_REQUEST['srchc'];
	$sqs="select * from corder_tb where customer='".$srchc."'";
	
	}
	else if(isset($_REQUEST['btnpart']))
	{
	
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	$cname = $pieces[2];
	

	$sqs="select * from corder_tb where part_no ='".$pno."'";
	//echo $sqls;
	//$sqs.=" ORDER BY poid desc LIMIT $offset, $rowsPerPage ";
	/*$ponm =$_REQUEST['srch']-9992;
	$sqs="select * from corder_tb where poid ='".$ponm."'";

	$sqs.=" ORDER BY poid desc LIMIT $offset, $rowsPerPage ";*/
	}



if (isset($_POST['submit11'])) {

$target = "confirmationpdf/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }

}

$res1=mysql_query($sqs,$conn) or die("query error".mysql_error());

if(!$res1)

{

die('error in data'.mysql_error());



}

if(mysql_num_rows($res1)>0)

{

//$rw=mysql_fetch_array($res);



$query="select * from corder_tb";





					//print $query;

						$result  = mysql_query($query) or die('Error, query failed'); 

						$row     = mysql_fetch_array($result, MYSQL_ASSOC); 

						//$numrows = $row['numrows'];

						$numrows = mysql_num_rows($result);

						

						// No of rows u need to assign

						//$numrows = 3; 

						//echo "<br>Numrows : ".$numrows ;

						

						// how many pages we have when using paging? 

						$maxPage = ceil($numrows/$rowsPerPage); 

						//echo "<br>Maximum Pages : ".$maxPage;

						

						// print the link to access each page 

						$txtcname=$_REQUEST['txtcname'];

						$self = $_SERVER['PHP_SELF']; 

						$nav = ''; 

						for($page = 1; $page <= $maxPage; $page++) 

						{ 

							if ($page == $pageNum) 

							{ 

								$nav .= " $page ";   // no need to create a link to current page 

							} 

							else 

							{ 

								$nav .= " <a href=\"$self?page=$page&txtcname=$txtcname\">$page</a> "; 

							}         

						} 

						

						// creating previous and next link 

						// plus the link to go straight to 

						// the first and last page 

						

						if ($pageNum > 1) 

						{ 

							$page = $pageNum - 1; 

							$prev = " <a href=\"$self?page=$page&txtcname=$txtcname\">[Prev]</a> "; 

							 

							$first = " <a href=\"$self?page=1&txtcname=$txtcname\">[First Page]</a> "; 

						}  

						else 

						{ 

							$prev  = '&nbsp;'; // we're on page one, don't print previous link 

							$first = '&nbsp;'; // nor the first page link 

						} 

						

						if ($pageNum < $maxPage) 

						{ 

							$page = $pageNum + 1; 

							$next = " <a href=\"$self?page=$page&txtcname=$txtcname\">[Next]</a> "; 

							 

							$last = " <a href=\"$self?page=$maxPage&txtcname=$txtcname\">[Last Page]</a> "; 

						}  

						else 

						{ 

							$next = '&nbsp;'; // we're on the last page, don't print next link 

							$last = '&nbsp;'; // nor the last page link 

						} 

						

						// print the navigation link 

						





?>

                                                  <table class="manage" width="900" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="6"><font size=3><strong>MANAGE ORDER CONFIRMATION</strong></font></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="6" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>

                                                    </tr>

                                                    <tr>

                                                      <td width="56" height="30" align="center"><strong>poid </strong></td>
                                                       <td width="56" height="30" align="center"><strong>Order Conf# </strong></td>


                                                      <td width="247" height="30" align="center"><strong>Customer</strong></td>
                                                       <td width="200" align="center"><strong>Part No </strong></td>

                                                    <td width="40" align="center"><strong>Rev </strong></td>

                                                      <td width="107" align="center"><strong>CO DATE</strong></td>
                                                      <td width="107" height="30" align="center"><strong>Edit</strong></td>

                                                      <td width="107" height="30" align="center"><strong>Download PDF</strong></td>
                                                        <td width="107" align="center"><strong>VIEW PDF</strong></td>
                                                        <td width="107" height="30" align="center"><strong>Download DOC</strong></td>

                                                      <td width="76" height="30" align="center"><strong>Delete</strong></td>
                                                         <td width="76" height="30" align="center"><strong>Duplicate</strong></td>

                                                    </tr>

                                                    <?php 

												  while($rwc=mysql_fetch_array($res1))

												  {

												  ?>

                                                    <tr>

                                                      <td height="30" align="center"><?php echo $rwc['poid'];?>&nbsp;</td>
                                                       <td height="30" align="center"><?php echo $rwc['poid']+9992;?>&nbsp;</td>

                                                      <td height="30" align="center"><?php echo $rwc['customer'];?></td>
                                                      <td align="center"><?php echo $rwc['part_no'];?></td>

                                                    <td align="center"><?php echo $rwc['rev'];?></td>

                                                      <td align="center"><?php echo $rwc['podate'];?></td>
                                                         <td height="30" align="center"><a href="edit_confirmation.php?id=<?php echo $rwc['poid'];?>">Edit</a></td>

                                                      <td height="30" align="center"><a href="download-pdf4.php?id=<?php echo $rwc['poid'];?>">Download Pdf</a></td>
                                                      <td height="30" align="center"><a target="_blank" href="download-pdf4.php?id=<?php echo $rwc['poid'];?>&oper=view">VIEW PDF</a></td>
                                                      
                                                      <td height="30" align="center"><a href="download-doc4.php?id=<?php echo $rwc['poid'];?>">Download doc</a></td>

                                                      <td height="30" align="center"><a href="#" onClick="del('<?php echo $rwc['poid'];?>');">Delete</a></td>
                                                            <td height="30" align="center"><a href="manage_confirmation.php?dupid=<?php echo $rwc['poid'];?>">Duplicate</a></td>

                                                    </tr>

                                                    <?php 

												  }

												  ?>

                                                  </table>

                                                  <p>

                                                    <?php 

}// end of if

else

{

?>

                                                  </p>

                                                  <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="50"><strong>Confirmation is not found </strong></td>

                                                    </tr>

                                                  </table>

                                                  <p>

                                                    <?php 

}

?>

                                                  </p></td>

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