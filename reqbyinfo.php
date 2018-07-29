<?php require_once('conn.php'); 


$ord_id = $_REQUEST['id']; // piece2





$query="select * from order_tb where ( ord_id='$ord_id') limit 1";

$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->req_by; 
$phone = $row->phone; 
$email = $row->email; 



?>


<table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                    
                                                    
                                                      
                                                     <tr>

                                                      <td height="30">Name </td>

                                                      <td height="30"><?php echo $name; ?></td>

                                                    </tr>
                                                 
                                                     
                                                     <tr>

                                                      <td height="30">Phone </td>

                                                      <td height="30"><?php echo $phone; ?></td>

                                                    </tr>

                                                    
                                                     <tr>

                                                      <td height="30">Email
                                                      </td>

                                                      <td height="30">
													  <a href="<?php echo $email; ?>">
<?php echo $email; ?></a>
													  
													  </td>

                                                    </tr>
                                                   
                                                    
                                                    
                                                    </table>