<?php
session_start();
 require_once('conn.php'); ?>
<?php require_once('chksess.php'); ?>
<?php 
if(isset($_REQUEST['Submit']))
{
$sqin="insert into admin_tb(uname,pass) values('".$_REQUEST['txtuname']."','".$_REQUEST['txtpass']."')";
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data');
}
header('location:manage_user.php');
}
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">


    <title>Welcome</title>
    <link href="style_Admin.css" rel="stylesheet" type="text/css">
</head><body>

        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                <td align="center">
                    <table bgcolor="#999999" border="0" cellpadding="0" cellspacing="1" width="1000">
                        <tbody>
                            <tr>
                                <td colspan="2" id="header">&nbsp;
                                    </td> 
                            </tr>
                            <tr>
                                <td id="side" style="width: 250px;" width="250">
                                    <?php require_once('leftmenu.php'); ?>
                                </td>
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                                <td>
                                                    <strong>Welcome</strong> | <span class="mailing">Site Administrative Area</span>
                                                </td>
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"><form name="form1" method="post" action="labels2pdf.php">
                                                  <p>&nbsp;</p>
                                                  <table width="550" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                    <tr>
                                                      <td colspan="2"><strong>Labels </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="159">Hana JX Part Number</td>
                                                      <td width="329"><label>
                                                        <input name="cname" type="text" id="cname" size="15">
                                                      </label></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Material Description</td>
                                                      <td><input name="partno" type="text" id="partno" size="15"></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                      <td>Lot #</td>
                                                      <td><input name="dc" type="text" id="dc" size="15"></td>
                                                    </tr>
                                                   
                                                    
                                                    <tr>
                                                      <td>PO #</td>
                                                      <td><input name="po" type="text" id="po" size="15"></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                      <td>QTY</td>
                                                      <td><input name="qty" type="text" id="qty" size="15"></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Lables</td>
                                                      <td>1 Label<input name="lbls" type="radio" value="1" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                      2 Labels<input name="lbls" type="radio" value="2" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                      3 Labels<input name="lbls" type="radio" value="3" id="lbls" size="30"><br>
                                                      4 Labels<input name="lbls" type="radio" value="4" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                       5 Labels<input name="lbls" type="radio" value="5" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                        6 Labels<input name="lbls" type="radio" value="6" id="lbls" size="30">&nbsp;&nbsp;&nbsp;<br>
                                                        
                                                         7 Labels<input name="lbls" type="radio" value="7" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                       8 Labels<input name="lbls" type="radio" value="8" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                        9 Labels<input name="lbls" type="radio" value="9" id="lbls" size="30">&nbsp;&nbsp;&nbsp;<br>
                                                        
                                                         10 Labels<input name="lbls" type="radio" value="10" id="lbls" size="30">&nbsp;&nbsp;&nbsp;
                                                        
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2"><label>
                                                        <input type="submit" name="Submit" id="Submit" value="Generate">
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