<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if($_REQUEST['delid']!="")
{
$sqdel='delete from shipper_tb where data_id="'.$_REQUEST['delid'].'"';
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
<title>Manage Shippers</title>
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

location.href="manage_shipper.php?delid="+id;

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
                                
                                    <div>
                                        <table width="100%" cellpadding="5" cellspacing="1">
                                            
                                            <tbody><tr>
                                               
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"><br>
												      <form name="form1" method="get" action="">
												        <table class="manageTop" width="500" border="1"  cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                          <tr>
                                                            <td height="30" colspan="2"><strong>Search By </strong></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="180" height="30">Search BY Shipper Name</td>
                                                            <td width="300" height="30"><select name="txtcname" id="txtcname" onChange="this.form.submit();">
                                                              <option value="">--select Shipper--</option>
                                                              <?php 
														$sqc="select DISTINCT c_name from shipper_tb order by c_name";
														$resc=mysql_query($sqc);
														if(!$resc)
														{
														die('error in data');
														}
														while($rwc=mysql_fetch_array($resc))
														{
														?>
                                                              <option value="<?php echo $rwc['c_name'];?>" <?php if($rwc['c_name']==$_REQUEST['txtcname']){?> selected <?php } ?>><?php echo $rwc['c_name'];?></option>
                                                              <?php 
														}
														?>
                                                            </select></td>
                                                          </tr>
                                                        </table>
                                                  </form>
											        <br>
											        <br>
										            <br>
									                <br>
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

$sqs="select * from shipper_tb";
$sqs.=" ORDER BY data_id desc LIMIT $offset, $rowsPerPage ";
if($_REQUEST['txtcname']!="")
{
$sqs="select * from shipper_tb where c_name='".$_REQUEST['txtcname']."'";
$sqs.=" ORDER BY data_id desc LIMIT $offset, $rowsPerPage ";
}


$res1=mysql_query($sqs,$conn);
if(!$res1)
{
die('error in data'.mysql_error());

}
if(mysql_num_rows($res1)>0)
{
//$rw=mysql_fetch_array($res);

$query="select * from shipper_tb";
if($_REQUEST['txtcname']!="")
{
$query="select * from shipper_tb where c_name='".$_REQUEST['txtcname']."'";
}


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
												  <table class="manage" style="left:310px;" width="700" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                  <tr>
                                                    <td height="30" colspan="5"><strong>MANAGE shipper </strong></td>
                                                  </tr>
                                                  <tr>
                                                    <td height="30" colspan="5" align="center"><?php echo $first . $prev . $nav . $next . $last; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td width="56" height="30" align="center"><strong>ID</strong></td>
                                                    <td width="247" height="30" align="center"><strong>Shipper Name</strong></td>
                                                    <td width="107" align="center"><strong>Shipper Contact Name</strong></td>
                                                    <td width="107" height="30" align="center"><strong>Edit</strong></td>
                                                    <td width="76" height="30" align="center"><strong>Delete</strong></td>
                                                  </tr>
                                                  <?php 
												  while($rwc=mysql_fetch_array($res1))
												  {
												  ?>
                                                  <tr>
                                                    <td height="30" align="center"><?php echo $rwc['data_id'];?>&nbsp;</td>
                                                    <td height="30" align="center"><?php echo $rwc['c_name'];?></td>
                                                    <td align="center"><?php echo $rwc['e_name'];?></td>
                                                    <td height="30" align="center"><a href="edit_shipper.php?id=<?php echo $rwc['data_id'];?>">Edit</a></td>
                                                    <td height="30" align="center"><a href="#" onClick="del('<?php echo $rwc['data_id'];?>');">Delete</a></td>
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
                                                      <td height="50"><strong>No shipper Available </strong></td>
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