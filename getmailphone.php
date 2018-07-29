<?php require_once('conn.php'); ?>
<?php 
//echo $_REQUEST['uid'];

 $pizza=$_REQUEST['uid'];

$pieces = explode("**", $pizza);
$tab = $pieces[0]; // piece1
$cuid =$pieces[1]; // piece2

if ($tab== 'm')
$table = 'maincont_tb';
if ($tab== 'e')
$table = 'enggcont_tb';


$sqv="select * from  ".$table."  where enggcont_id='".$cuid."'  LIMIT 1";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}
														
														$i=1;

														while($rwv=mysql_fetch_array($resv)){
?>

                                                      
                                                         <td colspan="2" id="content2" height="30"><strong>Email :</strong> 

      <input type="text" name="txtemail" id="txtemail" value="<?php echo $rwv['email']; ?>" />

     <strong>Phone :</strong> 

      <input type="text" name="txtphone" id="txtphone" value="<?php echo $rwv['phone']; ?>" /></td>
                                                      
                                                      
                                                      
                                                       
                                                        <?php 
														
														}
?>