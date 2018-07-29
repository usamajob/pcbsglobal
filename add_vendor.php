<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_REQUEST['Submit']))
{
$sqin="insert into vendor_tb(c_name,c_shortname,c_address,c_address2,c_address3,c_phone,c_fax,c_website,c_bcontact,e_name,e_lname,e_phone,e_email,e_payment,e_comments,e_other) values('".$_REQUEST['txtcname']."','".$_REQUEST['c_shortname']."','".$_REQUEST['txtaddress']."','".$_REQUEST['txtaddress2']."','".$_REQUEST['txtaddress3']."','".$_REQUEST['txtphone2']."','".$_REQUEST['txtfax2']."','".$_REQUEST['txtweb']."','".$_REQUEST['txtbuyer2']."','".$_REQUEST['txtename']."','".$_REQUEST['txtelname']."','".$_REQUEST['txtephone']."','".$_REQUEST['txteemail']."','".$_REQUEST['txtepay']."','".$_REQUEST['txtecomments']."','".$_REQUEST['txteother']."')";

$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data'.mysql_error());

}

header('location:manage_vendor.php');

}

$title = "Add Vendor";
include_once('header.php');

?>

<script type="text/javascript">

function getvendor()

{

//id=document.form1.txtcid.value;

cust=document.form1.txtcname.value;



//alert(pid);

//alert(pid);

//alert(uname);

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtshow1").innerHTML=xmlhttp.responseText;

    }

  }

//  url="getprice.php?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4;

//  alert(url);

xmlhttp.open("GET","getvendor.php?cust="+cust,true);

xmlhttp.send();

}

</script>

</head><body>



        

        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr>

                <td align="center">

                    <table border="0" cellpadding="0" cellspacing="1" width="1300">

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

												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table class="manageTop" width="500" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>ADD VENDOR</strong></td>

                                                    </tr>

                                                    <tr>

                                                      <td width="153" height="30">Vendor Name</td>

                                                      <td width="327" height="30"><label>

                                                       <input type="text" name="txtcname" id="txtcname" size="35"  />

                                                      </label></td>

                                                    </tr>
                                                     <tr>

                                                      <td width="153" height="30">Vendor Short Name</td>

                                                      <td width="327" height="30"><label>

                                                       <input type="text" name="c_shortname" id="c_shortname" size="35"  />

                                                      </label></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Address 1</td>

                                                      <td height="30"><label>

                                                      <input type="text" name="txtaddress" id="txtaddress" size="35"  />
                                                      </label></td>

                                                    </tr>
                                                    
                                                      <tr>

                                                      <td height="30">Address 2</td>

                                                      <td height="30"><label>

                                                      <input type="text" name="txtaddress2" id="txtaddress2" size="35"  />
                                                      </label></td>

                                                    </tr>
                                                    
                                                      <tr>

                                                      <td height="30">Address 3</td>

                                                      <td height="30"><label>

                                                      <input type="text" name="txtaddress3" id="txtaddress3" size="35"  />
                                                      </label></td>

                                                    </tr>
<tr>

                                                      <td height="30" colspan="2"><div id="txtshow1"><table width="450">

<tr>

                                                      <td width="146" height="30">Phone</td>

<td width="292" height="30"><label>

<input name="txtphone2" type="text" id="txtphone2" size="35" >

</label></td>

  </tr>

                                                    <tr>

                                                      <td height="30">Fax</td>

                                                      <td height="30"><input name="txtfax2" type="text" id="txtfax2"  size="35"></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30">Main Contact</td>

                                                      <td height="30"><input name="txtbuyer2" type="text" id="txtbuyer2"  size="35"></td>

                                                    </tr>-->

                                                    </table></div></td>

                                                      </tr>
                                                   

                                                    <tr>

                                                      <td height="30" colspan="2"><div id="txtshow1"></div></td>

                                                      </tr>

                                                 

                                                    <tr>

                                                      <td height="30">Website</td>

                                                      <td height="30"><input name="txtweb" type="text" id="txtweb" size="35"></td>

                                                    </tr>

                                                   <!-- <tr>

                                                      <td height="30" colspan="2"><strong>Vendor's Main Contact</strong></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Name</td>

                                                      <td height="30"><input name="txtename" type="text" id="txtename" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Last Name</td>

                                                      <td height="30"><input name="txtelname" type="text" id="txtelname" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Phone</td>

                                                      <td height="30"><input name="txtephone" type="text" id="txtephone" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Email</td>

                                                      <td height="30"><input name="txteemail" type="text" id="txteemail" size="35"></td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">Payment Terms</td>

                                                      <td height="30"><input name="txtepay" type="text" id="txtepay" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Comments</td>

                                                      <td height="30"><textarea name="txtecomments" id="txtecomments" cols="35" rows="5"></textarea></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Other</td>

                                                      <td height="30"><textarea name="txteother" id="txteother" cols="35" rows="5"></textarea></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="2">

                                                        <input type="submit" name="Submit" id="Submit" value="Add">

&nbsp;                                                      <label></label></td>

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