<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if(isset($_REQUEST['Submit']))
{
//$sqin="insert into admin_tb(uname,pass) values('".$_REQUEST['txtuname']."','".$_REQUEST['txtpass']."')";
$sqin="update admin_tb set uname='".$_REQUEST['txtuname']."',pass='".$_REQUEST['txtpass']."' where id='".$_REQUEST['id']."'";
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data');
}
header('location:manage_user.php');
}
$sqin="select * from admin_tb where id='".$_REQUEST['id']."'";
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data');
}
$rwin=mysql_fetch_array($resin);

$title = "Edit User";
include_once('header.php');

?>
</head><body>

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table  border="0" cellpadding="0" cellspacing="1" width="1300">
                        <tbody>
                                
			          <tr style="height:20px; background-color:#FFF;"></tr>
                        <tr>
                                <td colspan="2" id="header" style="height:50px;"><!--menu-->
                        &nbsp; &nbsp;<strong class="titleWelcome">Welcome to Admin Panel</strong>
                                
                               
                                    </td> <!--/menu-->
                            </tr>

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
												<td style="line-height: 16px;"><form name="form1" method="post" action="">
                                                  <p>&nbsp;</p>
                                                  <table class="manageTop" style="left:350px;" width="550" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                    <tr>
                                                      <td colspan="2"><strong>EDIT USER </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="159">USER NAME</td>
                                                      <td width="329"><label>
                                                        <input name="txtuname" type="text" id="txtuname" size="30" value="<?php echo $rwin['uname'];?>">
                                                      </label></td>
                                                    </tr>
                                                    <tr>
                                                      <td>PASSWORD</td>
                                                      <td><input name="txtpass" type="text" id="txtpass" value="<?php echo $rwin['pass'];?>" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2"><label>
                                                        <input type="submit" name="Submit" id="Submit" value="Save">
                                                      </label></td>
                                                    </tr>
                                                  </table>
                                                  <p>&nbsp;</p>
                                                  <p>&nbsp;</p>
                                                  <p>&nbsp;</p>
                                                  <p>&nbsp;</p>
												</form>
												</td>
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