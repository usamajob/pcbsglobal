<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

if($_REQUEST['act']!="")

{

$sqa="update sub_cast set allow='".$_REQUEST['act']."' where member_id='".$_REQUEST['uid']."'";

//echo $sqa;

$resa=mysql_query($sqa);

if(!$resa)

{

die('error in data');

}

}

if($_REQUEST['delid']!="")

{

$sqdel='delete from admin_tb where id="'.$_REQUEST['delid'].'"';

$resdel=mysql_query($sqdel);

if(!$resdel)

{

die('error in data');

}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manage Users</title>
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

    <script language="javascript">



function del(id)



{



var answer = confirm ("Do you want to delete the record");



if(answer)



{



location.href="manage_user.php?delid="+id;



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

                    <table width="1300" border="0" cellpadding="0" cellspacing="1">

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



$sqs="select * from admin_tb";

$sqs.=" ORDER BY id desc LIMIT $offset, $rowsPerPage ";







$res1=mysql_query($sqs,$conn);

if(!$res1)

{

die('error in data'.mysql_error());



}

if(mysql_num_rows($res1)>0)

{

//$rw=mysql_fetch_array($res);



$query="select * from admin_tb";



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

												  <table class="manage" style="left:300px;" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                  <tr>

                                                    <td height="30" colspan="4"><strong>MANAGE USER </strong></td>

                                                  </tr>

                                                  <tr>

                                                    <td height="30" colspan="4" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>

                                                  </tr>

                                                  <tr>

                                                    <td width="56" height="30" align="center"><strong>ID</strong></td>

                                                    <td width="247" height="30" align="center"><strong>UserName</strong></td>

                                                    <td width="107" height="30" align="center"><strong>Edit</strong></td>

                                                    <td width="76" height="30" align="center"><strong>Delete</strong></td>

                                                  </tr>

                                                  <?php 

												  while($rwc=mysql_fetch_array($res1))

												  {

												  ?>

                                                  <tr>

                                                    <td height="30" align="center"><?php echo $rwc['id'];?>&nbsp;</td>

                                                    <td height="30" align="center"><?php echo $rwc['uname'];?></td>

                                                    <td height="30" align="center"><a href="edit_user.php?id=<?php echo $rwc['id'];?>">Edit</a></td>

                                                    <td height="30" align="center"><a href="#" onClick="del('<?php echo $rwc['id'];?>');">Delete</a></td>

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

                                                      <td height="50"><strong>No Users </strong></td>

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