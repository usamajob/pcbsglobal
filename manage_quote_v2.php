<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

if($_REQUEST['delid']!="")

{

$sqdel='delete from order_tb where ord_id="'.$_REQUEST['delid'].'"';

$resdel=mysql_query($sqdel);

if(!$resdel)

{

die('error in data');

}

}



if($_REQUEST['dupid']!="")

{


$sqdup1=' CREATE TEMPORARY TABLE tmptable_1 SELECT * FROM order_tb WHERE ord_id= "'.$_REQUEST['dupid'].'"';

$sqdup2='UPDATE  tmptable_1  SET ord_id= NULL';
$sqdup3='INSERT INTO order_tb  SELECT * FROM tmptable_1';
$sqdup4='DROP TEMPORARY TABLE IF EXISTS tmptable_1';
/*$sqdel='insert into order_tb select * from order_tb where ord_id="'.$_REQUEST['dupid'].'"';
*/
$sqdup1=mysql_query($sqdup1);
$sqdup2=mysql_query($sqdup2);

$sqdup3=mysql_query($sqdup3);

///////////New code
$duplicate_order_id = mysql_insert_id();
echo "duplicate_order_id=".$duplicate_order_id;
echo $qry_update_duplicate_order_date="UPDATE order_tb  set ord_date='".date('m/d/Y')."' Where ord_id=".$duplicate_order_id;
mysql_query($qry_update_duplicate_order_date);
///////end new-code

$sqdup4=mysql_query($sqdup4);


if(!$sqdup1)

{

die('error in data');

}

}
?>

<html><head>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">





    <title>Welcome</title>

    <link href="style_Admin.css" rel="stylesheet" type="text/css">

       
       <script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#srch').autocomplete({source:'getqtsrch.php', minLength:1});
			$j('#srchc').autocomplete({source:'getqtsrchc.php', minLength:1});
		});
 
	</script> 
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
       
        <script language="javascript">



function del(id)

{

var answer = confirm ("Do you want to delete the record");

if(answer)

{

location.href="manage_quote.php?delid="+id;

}

else

{

return false;

}

}

</script>

</head><body>



        

        <table width="100%" border="0" cellpadding="0" cellspacing="0">

            <tbody><tr>

                <td align="center">

                    <table width="1300" border="0" cellpadding="0" cellspacing="1" height="20px">

                        <tbody>
                        <tr style="height:20px; background-color:#FFF;"></tr>
                        

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>

                            <tr>

                                

                  <td id="mainpage" style="width: 750px;">

                                    <div>

                                        <table width="100%" cellpadding="5" cellspacing="1">

                                            

                                            <tbody><tr>

                                                
                                            </tr>

                                            
                                            <tr>

                                                <td>

                                                    <form name="form1" method="get" action="">

												        <table width="500" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                          <tr>

                                                            <td height="30" colspan="2"><strong>Search By </strong></td>

                                                          </tr>

                                                          <tr>

                                                            <td width="180" height="30">Search BY Part Number </td>

                                                            <td width="300" height="30">
                                                            
                                                            <input type="text" name="srch"  id="srch">
                                                            
                                                             <!--<input type="text" name="srch2"  id="srch2">-->
                                                            
                                                            <input type="submit" value="submit" name="btnpart">
                                                            <!--<select name="txtcname" id="txtcname" onChange="this.form.submit();">

                                                              <option value="">--select Part Number--</option>

                                                              <?php 

														/*$sqc="select DISTINCT part_no from order_tb";

														$resc=mysql_query($sqc);

														if(!$resc)

														{

														die('error in data');

														}

														while($rwc=mysql_fetch_array($resc))

														{*/

														?>

                                                              <option value="<?php // echo $rwc['part_no'];?>" <?php // if($rwc['part_no']==$_REQUEST['txtcname']){?> selected <?php // } ?>><?php // echo $rwc['part_no'];?></option>

                                                              <?php 

													//	}

														?>

                                                            </select>--></td>

                                                          </tr>
														  
														  <tr>

                                                            <td width="180" height="30">Search BY Customer Name </td>

                                                            <td width="300" height="30">
                                                            
                                                            <input type="text" name="srchc"  id="srchc">
                                                            
                                                            <input type="submit" value="submit" name="btncus"></td>

                                                          </tr>

                                                        </table>

                                                  </form>

                                                </td>

                                            </tr>
                                            
                                           <!-- <tr>

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

												<td style="line-height: 16px;"><?php

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



$sqs="select * from order_tb";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";




/*$ponm =$_REQUEST['srch']-10000;

$sqs="select * from order_tb where ord_id ='".$ponm."'";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";
*/



	
	
	if(isset($_REQUEST['btncus']))
	{
	$srchc =$_REQUEST['srchc'];
	$sqs="select * from order_tb where cust_name='".$srchc."'";
	$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";
	}
	else if(isset($_REQUEST['btnpart']))
	{
	
	$srch =$_REQUEST['srch'];
	$pieces = explode("_", $_REQUEST['srch']);
	$pno = $pieces[0]; // piece1
	$cname = $pieces[2];
	

	$sqs="select * from order_tb where part_no ='".$pno."'";

	$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

/*echo $sqs;
exit;*/
	}













if($_REQUEST['srch2']!="")

{
/*$ponm =$_REQUEST['srch']-10000;

$sqs="select * from order_tb where ord_id ='".$ponm."'";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";
*/

$srch =$_REQUEST['srch2'];






$sqs="select * from order_tb where part_no ='".$srch."'  or cust_name='".$srch."'";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

/*echo $sqs;
exit;*/


}



if (isset($_POST['submit11'])) {

$target = "quotationpdf/"; 
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


/*if($_REQUEST['txtcname']!="")

{

$sqs="select * from order_tb where part_no ='".$_REQUEST['txtcname']."'";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";

}
*/




$res1=mysql_query($sqs,$conn);

if(!$res1)

{

die('error in data'.mysql_error());



}

if(mysql_num_rows($res1)>0)

{

//$rw=mysql_fetch_array($res);



$query="select * from order_tb";



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

								$nav .= " <a href=\"$self?page=$page\">$page</a> "; 

							}         

						} 

						

						// creating previous and next link 

						// plus the link to go straight to 

						// the first and last page 

						

						if ($pageNum > 1) 

						{ 

							$page = $pageNum - 1; 

							$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 

							 

							$first = " <a href=\"$self?page=1\">[First Page]</a> "; 

						}  

						else 

						{ 

							$prev  = '&nbsp;'; // we're on page one, don't print previous link 

							$first = '&nbsp;'; // nor the first page link 

						} 

						

						if ($pageNum < $maxPage) 

						{ 

							$page = $pageNum + 1; 

							$next = " <a href=\"$self?page=$page\">[Next]</a> "; 

							 

							$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 

						}  

						else 

						{ 

							$next = '&nbsp;'; // we're on the last page, don't print next link 

							$last = '&nbsp;'; // nor the last page link 

						} 

						

						// print the navigation link 

						




?>

												  <table width="950" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                  <tr>

                                                    <td height="30" colspan="7"><font size=3><strong>MANAGE QUOTE</strong></font></td>

                                                  </tr>

                                                  <tr>

                                                    <td height="30" colspan="7" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>

                                                  </tr>

                                                  <tr>

                                                    <td width="56" height="30" align="center"><strong>ID</strong></td>
                                                     <td width="70" height="30" align="center"><strong>Quote #</strong></td>

                                                    <td width="207" height="30" align="center"><strong>Customer Name</strong></td>

                                                    <td width="150" align="center"><strong>Part No </strong></td>

                                                    <td width="40" align="center"><strong>Rev </strong></td>

                                                    <td width="107" align="center"><strong>Added Date</strong></td>

                                                    <td width="107" align="center"><strong>EDIT</strong> </td>

                                                    <td width="107" align="center"><strong>Download PDF</strong></td>
                                                      <td width="107" align="center"><strong>VIEW PDF</strong></td>
                                                    <td width="135" align="center"><strong>Download DOC</strong></td>

                                                  <!--  <td width="107" height="30" align="center"><strong>View Details</strong></td>-->

                                                    <td width="76" height="30" align="center"><strong>Delete</strong></td>
                                                    <td width="76" height="30" align="center"><strong>Duplicate</strong></td>

                                                  </tr>

                                                  <?php 

												  while($rwc=mysql_fetch_array($res1))

												  {

												  ?>

                                                  <tr>

                                                    <td height="30" align="center"><?php echo $rwc['ord_id'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo $rwc['ord_id']+10000;?>&nbsp;</td>

                                                    <td height="30" align="center"><?php echo $rwc['cust_name'];?></td>

                                                    <td align="center"><?php echo $rwc['part_no'];?></td>

                                                    <td align="center"><?php echo $rwc['rev'];?></td>

                                                    <td align="center"><?php echo $rwc['ord_date'];?></td>

                                                    <td align="center"><a href="edit_quote.php?id=<?php echo $rwc['ord_id'];?>">EDIT</a></td>

                                                    <td align="center"><a href="download-pdf.php?id=<?php echo $rwc['ord_id'];?>">Download PDF</a></td>
                                                      <td align="center"><a target="_blank" href="download-pdf.php?id=<?php echo $rwc['ord_id'];?>&oper=view">VIEW PDF</a></td>
                                                     <td align="center"><a href="download-doc.php?id=<?php echo $rwc['ord_id'];?>">Download DOC</a></td>

                                                   <!-- <td height="30" align="center"><a href="view_detail.php?id=<?php // echo $rwc['ord_id'];?>">View</a></td>-->

                                                    <td height="30" align="center"><a href="#" onClick="del('<?php echo $rwc['ord_id'];?>');">Delete</a></td>
                                                    
                                                    <td height="30" align="center"><a href="manage_quote.php?dupid=<?php echo $rwc['ord_id'];?>">Duplicate</a></td>

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

                                                      <td height="50"><strong>No Quote NUMBER Found</strong></td>

                                                    </tr>

                                                  </table>

											      <p>

                                                    <?php 

}

?>

                                                  </p>

										      <br></td>

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