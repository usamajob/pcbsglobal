<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php
if(isset($_POST['Submit']))
{


 $sqin="update maincont_tb set name='".$_POST['txtename']."',lastname='".$_POST['txtelname']."',email='".$_POST['txteemail']."',phone='".$_POST['txtephone']."',mobile='".$_POST['txteemob']."',coustid='".$_POST['cid']."' where enggcont_id ='".$_POST['cousid']."'";

$resin=mysql_query($sqin);

if(!$resin)

{

die('error in data');

}

header('location:manage_maincontact.php');

}

$sqs="select * from maincont_tb where enggcont_id='".$_REQUEST['id']."'";

$res=mysql_query($sqs);

if(!$res)

{

die('error in data');

}

$rws=mysql_fetch_array($res);

$title = "Edit Customer Main Contact";
include_once('header.php');

 ?>

<script type="text/javascript">

function getdata()

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
<input type="hidden" value="<?php echo $_REQUEST['id'];?>" name="cousid" id="cousid">
                                                  <p>&nbsp;</p>

                                                  <table class="manageTop" width="500" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>EDIT MAIN CONTACT</strong></td>

                                                    </tr>

                                                   <tr>

                                                      <td height="30">Coustomer Name</td>

                                                      <td height="30">
                                                    
                                                    
                                                    <select name="cid" id="cid">

                                                       <?php 

														$sqv="select * from data_tb";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>

                                                        <option value="<?php echo $rwv['data_id'];

														?>" <?php if($rwv['data_id']==$rws['coustid']){?> selected <?php } ?>><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>

                                                     

                                                                                                            </select>
                                                    
                                                    </td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Name</td>

                                                      <td height="30"><input name="txtename" type="text" id="txtename" value="<?php echo $rws['name'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Last Name</td>

                                                      <td height="30"><input name="txtelname" type="text" id="txtelname" value="<?php echo $rws['lastname'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Phone</td>

                                                      <td height="30"><input name="txtephone" type="text" id="txtephone" value="<?php echo $rws['phone'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Email</td>

                                                      <td height="30"><input name="txteemail" type="text" id="txteemail" value="<?php echo $rws['email'];?>" size="35"></td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30">Mobile</td>

                                                      <td height="30"><input name="txteemob" type="text" id="txteemob" value="<?php echo $rws['mobile'];?>" size="35"></td>

                                                    </tr>

                                                   

                                                    <tr>

                                                      <td height="30">&nbsp;</td>

                                                      <td height="30">&nbsp;</td>

                                                    </tr>

                                                    <tr>

                                                      <td height="30" colspan="2">

                                                        <input type="submit" name="Submit" id="Submit" value="Save">

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