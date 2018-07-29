<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
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
$title = "Labels";
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
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>
                            <tr>
                                
                                <td id="mainpage" style="width: 750px;">
                                    <div>
                                        <table cellpadding="5" cellspacing="1" width="100%">
                                            
                                            <tbody><tr>
                                               
                                            </tr>
                                            <tr>
												<td style="line-height: 16px;"><form name="form1" method="post" action="labelspdf.php">
                                                  <p>&nbsp;</p>
                                                  <table class="manageTop" style="left:350px;" width="550" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">
                                                    <tr>
                                                      <td colspan="2"><strong>Labels </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="159">Customer Name</td>
                                                      <td width="329"><label>
                                                        <input name="cname" type="text" id="cname" size="30">
                                                      </label></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Part #</td>
                                                      <td><input name="partno" type="text" id="partno" size="30"></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                      <td>D/C</td>
                                                      <td><input name="dc" type="text" id="dc" size="30"></td>
                                                    </tr>
                                                   
                                                    
                                                    <tr>
                                                      <td>PO #</td>
                                                      <td><input name="po" type="text" id="po" size="30"></td>
                                                    </tr>
                                                   
                                                    <tr>
                                                      <td>QTY</td>
                                                      <td><input name="qty" type="text" id="qty" size="30"></td>
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