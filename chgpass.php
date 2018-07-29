<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

$flag=1;

if(isset($_REQUEST['Submit']))

{

$sq='update admin_tb set pass="'.$_REQUEST['txtnewpass'].'" where id="'.$_SESSION['uid'].'"';

$resq=mysql_query($sq);

if(!$resq)

{

die('error in query');

}

else

{

$flag=0;

}

}

$sqc='select * from admin_tb where id="'.$_SESSION['uid'].'"';

$reqc=mysql_query($sqc);

if(!$reqc)

{

die('error in query');

}

$rwc=mysql_fetch_array($reqc);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome</title>
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

function valid()

{

if(document.frm1.txtnewpass.value=="")

{

alert('Enter New Password');

document.frm1.txtnewpass.focus();

return false;

}

if(document.frm1.txtrenewpass.value=="")

{

alert('Enter ReNew-Password');

document.frm1.txtrenewpass.focus();

return false;

}

if(document.frm1.txtnewpass.value!=document.frm1.txtrenewpass.value)

{

alert('Enter Valid ReNew-Password');

document.frm1.txtrenewpass.focus();

return false;



}

}

</script>

</head><body>



        

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

												<td align="center" style="line-height: 16px;">

                                                <form  method="post" name="frm1" onSubmit="return valid();">

                                                <table width="100%" border="0" cellspacing="1" cellpadding="5">

                                                  <tr>

                                                    <td><table width="100%" border="0" cellpadding="5" cellspacing="1">

                                                      <tr>

                                                        <td colspan="2" bgcolor="#f2f2f2"><strong>Change Password</strong></td>

                                                      </tr>

                                                      <tr>

                                                        <td width="180">&nbsp;</td>

                                                        <td width="214">&nbsp;</td>

                                                      </tr>

                                                      <tr>

                                                        <td>Current Password</td>

                                                        <td><label>

                                                          <input name="txtoldpass" type="password" class="form_text" id="txtoldpass" value="<?php echo $rwc['pass'];?>">

                                                        </label></td>

                                                      </tr>

                                                      <tr>

                                                        <td>New Password</td>

                                                        <td><input name="txtnewpass" type="password" class="form_text" id="txtnewpass"></td>

                                                      </tr>

                                                      <tr>

                                                        <td>Conform Password</td>

                                                        <td><input name="txtrenewpass" type="password" class="form_text" id="txtrenewpass"></td>

                                                      </tr>

                                                      <tr>

                                                        <td colspan="2" align="center"><label>

                                                          <input name="Submit" type="submit" class="buttons" id="Submit" value="Submit">

                                                          &nbsp;

                                                          <input name="bt" type="reset" class="buttons" id="bt" value="Reset">

                                                        </label></td>

                                                      </tr>

                                                    </table></td>

                                                  </tr>

                                                </table>

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