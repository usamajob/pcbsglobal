<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_REQUEST['Submit']))
{
$sqin="insert into data_tb(c_name,c_shortname,c_email,c_address,c_address2,c_address3,c_phone,c_fax,c_website,c_bcontact,e_name,e_lname,e_phone,e_email,e_payment,e_comments,e_other,e_cid) values('".$_REQUEST['txtcname']."','".$_REQUEST['txtcsname']."','".$_REQUEST['txtemail']."','".$_REQUEST['txtaddress']."','".$_REQUEST['txtaddress2']."','".$_REQUEST['txtaddress3']."','".$_REQUEST['txtphone2']."','".$_REQUEST['txtfax2']."','".$_REQUEST['txtweb']."','".$_REQUEST['txtbuyer2']."','".$_REQUEST['txtename']."','".$_REQUEST['txtelname']."','".$_REQUEST['txtephone']."','".$_REQUEST['txteemail']."','".$_REQUEST['txtepay']."','".$_REQUEST['txtecomments']."','".$_REQUEST['txteother']."','".$_REQUEST['txtecid']."')";
$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data'.mysql_error());

}

header('location:manage_data.php');

}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Customer</title>
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

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case '~': 
                window.location.href = 'http://pcbsglobal.com/luke-new/admin/welcome.php';
                break;
        }
    });
});
</script>
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

												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table class="manageTop" width="500" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>ADD CUSTOMER</strong></td>

                                                    </tr>

                                                    <tr>

                                                      <td width="153" height="30">Customer Name</td>

                                                      <td width="327" height="30"><label>
                                                       <input type="text" name="txtcname" id="txtcname" size="35"  />

                                                        <!--<select name="txtcname" id="txtcname" onChange="getdata();">

                                                        <option value="">--select Customer--</option>

                                                        <?php 
/*
														$sqc="select DISTINCT cust_name from order_tb";

														$resc=mysql_query($sqc);

														if(!$resc)

														{

														die('error in data');

														}

														while($rwc=mysql_fetch_array($resc))

														{*/

														?>

                                                        <option value="<?php // echo $rwc['cust_name'];?>"><?php // echo $rwc['cust_name'];?></option>

                                                        <?php 

														//}

														?>

                                                      </select>-->

                                                      </label></td>

                                                    </tr>
                                                    
<tr>

                                                      <td height="30">Customer Short Name</td>

                                                      <td height="30"><label>

                                                      <input type="text" name="txtcsname" id="txtcsname" size="35"  />
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

                                                      <td width="146" height="30">Phone</td>

<td width="292" height="30"><label>

<input name="txtphone2" type="text" id="txtphone2" size="35" >

</label></td>

  </tr>

                                                    <tr>

                                                      <td height="30">Fax</td>

                                                      <td height="30"><input name="txtfax2" type="text" id="txtfax2"  size="35"></td>

                                                    </tr>
                                                   

                                                  <!--  <tr>

                                                      <td height="30" colspan="2"><div id="txtshow1"></div></td>

                                                      </tr>-->
<!-- <tr>

                                                      <td height="30">Buyer Contact</td>

                                                      <td height="30"><input name="txtbuyer2" type="text" id="txtbuyer2"  size="35"></td>

                                                    </tr>-->
                                                 <!-- <tr>

                                                      <td height="30">Email</td>

                                                      <td height="30"><input name="txtemail" type="text" id="txtemail" size="35"></td>

                                                    </tr>
-->
                                                   
                                                   
                                                  

                                                   <!-- <tr>

                                                      <td height="30">Main Contact</td>

                                                      <td height="30"><input name="txtbuyer2" type="text" id="txtbuyer2"  size="35"></td>

                                                    </tr>-->
                                                   
                                                   
                                                    <tr>

                                                      <td height="30">Website</td>

                                                      <td height="30"><input name="txtweb" type="text" id="txtweb" size="35"></td>

                                                    </tr>
                                                    
                                                    
                                                    

                                                 <!--   <tr>

                                                      <td height="30" colspan="2"><strong>Engineering Contact</strong></td>

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

                                                      <td height="30">Account No</td>

                                                      <td height="30"><input name="txteother" type="text" id="txteother" size="35"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer ID</td>

                                                      <td height="30"><input name="txtecid" type="text" id="txtecid" size="35"></td>

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