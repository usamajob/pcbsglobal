<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_REQUEST['Submit']))
{
$sqin="update data_tb set c_name='".$_REQUEST['txtcname']."',c_shortname='".$_REQUEST['txtcsname']."',c_email='".$_REQUEST['txtemail']."',c_address='".$_REQUEST['txtaddress']."',c_address2='".$_REQUEST['txtaddress2']."',c_address3='".$_REQUEST['txtaddress3']."',c_phone='".$_REQUEST['txtphone2']."',c_fax='".$_REQUEST['txtfax2']."',c_website='".$_REQUEST['txtweb']."',c_bcontact='".$_REQUEST['txtbuyer2']."',e_name='".$_REQUEST['txtename']."',e_lname='".$_REQUEST['txtelname']."',e_email='".$_REQUEST['txteemail']."',e_payment='".$_REQUEST['txtepay']."',e_comments='".$_REQUEST['txtecomments']."',e_other='".$_REQUEST['txteother']."',e_cid='".$_REQUEST['txtecid']."',e_phone='".$_REQUEST['txtephone']."' where data_id='".$_REQUEST['id']."'";
$resin=mysql_query($sqin);
if(!$resin)
{
die('error in data');
}
header('location:manage_data.php');
}
$sqs="select * from data_tb where data_id='".$_REQUEST['id']."'";
$res=mysql_query($sqs);
if(!$res)
{
die('error in data');
}
$rws=mysql_fetch_array($res);

$title = "Edit Customer";
include_once('header.php');
?>

<script type="text/javascript">

function getdata() {

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

xmlhttp.open("GET","getdata.php?cust="+cust,true);

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

                                                  <table class="manageTop" width="500" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>EDIT  CUSTOMER</strong></td>

                                                    </tr>

                                                    <tr>

                                                      <td width="153" height="30">Customer Name</td>

                                                      <td width="327" height="30"><label>

                                                       <input type="text" name="txtcname" id="txtcname" value="<?php echo $rws['c_name'];?>" size="35"  />

                                                      </label></td>

                                                    </tr>
                                                    
                                                    <tr>

                                                      <td width="153" height="30">Customer Short Name</td>

                                                      <td width="327" height="30"><label>

                                                       <input type="text" name="txtcsname" id="txtcsname" value="<?php echo $rws['c_shortname'];?>" size="35"  />

                                                      </label></td>

                                                    </tr>

                                                   
                                                   
                                                   
                                                    <tr>

                                                      <td height="30">Address 1</td>

                                                      <td height="30"><label>

                                                       <!-- <textarea name="txtaddress" id="txtaddress" cols="35" rows="5"><?php// echo $rws['c_address'];?></textarea>-->


<input type="text" name="txtaddress" id="txtaddress" size="35" value="<?php echo $rws['c_address'];?>" />

                                                      </label></td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30">Address 2</td>

                                                      <td height="30"><label>

                                                       
<input type="text" size="35" name="txtaddress2" id="txtaddress2" value="<?php echo $rws['c_address2'];?>" />
                                                      </label></td>

                                                    </tr>
                                                     <tr>

                                                      <td height="30">Address 3 </td>

                                                      <td height="30"><label>

                                                      <input type="text" name="txtaddress3" id="txtaddress3" size="35" value="<?php echo $rws['c_address3'];?>" />


                                                      </label></td>

                                                    </tr>

                                                    

                                                   

<tr>

                                                      <td width="146" height="30">Phone</td>

<td width="292" height="30"><label>

<input name="txtphone2" type="text" id="txtphone2" size="35" value="<?php echo $rws['c_phone'];?>">

</label></td>

  </tr>

                                                    <tr>

                                                      <td height="30">Fax</td>

                                                      <td height="30"><input name="txtfax2" type="text" id="txtfax2" value="<?php echo $rws['c_fax'];?>" size="35"></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30">Buyer Contact</td>

                                                      <td height="30"><input name="txtbuyer2" type="text" id="txtbuyer2" value="<?php // echo $rws['c_bcontact'];?>" size="35"></td>

                                                    </tr>-->
                                                     <!--<tr>

                                                      <td height="30">Email</td>

                                                      <td height="30"><input name="txtemail" type="text" id="txtemail" value="<?php //echo $rws['c_email'];?>" size="35"></td>

                                                    </tr> -->

                                                    </td>

                                                      </tr>

                                                    

                                                    <tr>

                                                      <td height="30">Website</td>

                                                      <td height="30"><input name="txtweb" type="text" id="txtweb" value="<?php echo $rws['c_website'];?>" size="35"></td>

                                                    </tr>

                                                    <!--<tr>

                                                      <td height="30" colspan="2"><strong>Engineering Contact</strong></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Name</td>

                                                      <td height="30"><input name="txtename" type="text" id="txtename" value="<?php // echo $rws['e_name'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Last Name</td>

                                                      <td height="30"><input name="txtelname" type="text" id="txtelname" value="<?php // echo $rws['e_lname'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Phone</td>

                                                      <td height="30"><input name="txtephone" type="text" id="txtephone" value="<?php //echo $rws['e_phone'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Email</td>

                                                      <td height="30"><input name="txteemail" type="text" id="txteemail" value="<?php // echo $rws['e_email'];?>" size="35"></td>

                                                    </tr>-->

                                                    <tr>

                                                      <td height="30">Payment Terms</td>

                                                      <td height="30"><input name="txtepay" type="text" id="txtepay" value="<?php echo $rws['e_payment'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Comments</td>

                                                      <td height="30"><textarea name="txtecomments" id="txtecomments" cols="35" rows="5"><?php echo $rws['e_comments'];?></textarea></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Account No</td>

                                                      <td height="30"><input name="txteother" type="text" id="txteother" value="<?php echo $rws['e_other'];?>" size="35">
                                                      
                                                    </td>

                                                    </tr>


<tr>

                                                      <td height="30">customer ID</td>

                                                      <td height="30"><input name="txtecid" type="text" id="txtecid" value="<?php echo $rws['e_cid'];?>" size="35"></td>

                                                    </tr>



                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="2">

                                                        <input type="submit" name="Submit" id="Submit" value="Save Changes">

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