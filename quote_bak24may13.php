<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php

if($_REQUEST['delid']!="")

{

$sqdel='delete from order_tb where ord_id="'.$_REQUEST['delid'].'"';

$resdel=mysql_query($sqdel);

if(!$resdel)

{

die('error in data');

}

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add new quote</title>
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
function del(id)

{

var answer = confirm ("Do you want to delete the record");

if(answer)

{

location.href="manage_quote.php?delid="+id;

}

else

{

return false;

}

}

</script>


  <!--<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> -->
 <script type="text/javascript">

function xoutsnot () {
	//alert('asdf');
document.getElementById('textfield28').value='';


}
function getprice()

{

//id=document.form1.txtcid.value;

qty1=document.form1.txtqty1.value;

qty2=document.form1.txtqty2.value;

qty3=document.form1.txtqty3.value;

qty4=document.form1.txtqty4.value;

day1=document.form1.txtday1.value;

day2=document.form1.txtday2.value;

day3=document.form1.txtday3.value;

day4=document.form1.txtday4.value;



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

  url="getprice.php?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4;

//  alert(url);

xmlhttp.open("GET","getprice.php?qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4,true);

xmlhttp.send();

}

</script>

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />
    <script type="text/javascript" src="/luke-new/admin/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>





<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>


<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
--><!--<script src="http://code.jquery.com/jquery-latest.js"></script>
-->
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script>
 <script type="text/javascript">
var $j = jQuery.noConflict();
function getprice2()
{
     for (index=0; index < document.form1.chk1.length; index++) {
				if (document.form1.chk1[index].checked) {
					var radioValue = document.form1.chk1[index].value;
					break;
				}
			}

//alert(radioValue);
chk1 = radioValue;

//chk1=document.form1.chk1.value;

//id=document.form1.txtcid.value;

qty1=document.form1.txtqty1.value;

qty2=document.form1.txtqty2.value;

qty3=document.form1.txtqty3.value;

qty4=document.form1.txtqty4.value;

day1=document.form1.txtday1.value;

day2=document.form1.txtday2.value;

day3=document.form1.txtday3.value;

day4=document.form1.txtday4.value;

per1=document.form1.txtday4.value;

per2=document.form1.txtday4.value;



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
  var data =$j("#form1").serialize();

  url="getprice.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice=1";

 // alert(url);

xmlhttp.open("GET","getprice.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice=1&inid=1",true);

xmlhttp.send();


}


function showmanual()
{



for (index=0; index < document.form1.chk1.length; index++) {
				if (document.form1.chk1[index].checked) {
					var radioValue = document.form1.chk1[index].value;
					break;
				}
			}

//alert(radioValue);
chk1 = radioValue;

//chk1=document.form1.chk1.value;

//id=document.form1.txtcid.value;

qty1=document.form1.txtqty1.value;


qty2=document.form1.txtqty2.value;

qty3=document.form1.txtqty3.value;

qty4=document.form1.txtqty4.value;

day1=document.form1.txtday1.value;

day2=document.form1.txtday2.value;

day3=document.form1.txtday3.value;

day4=document.form1.txtday4.value;

per1=document.form1.txtday4.value;

per2=document.form1.txtday4.value;



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

  var data = $j("#form1").serialize();

  url="getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice=1";
  //url="getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1="+per1+"&per2="+per2+"&chk1="+chk1+"&bprice="+<?php echo $baseprice?>;

 // alert(url);

xmlhttp.open("GET","getprice2.php?"+data+"&qty1="+qty1+"&qty2="+qty2+"&qty3="+qty3+"&qty4="+qty4+"&day1="+day1+"&day2="+day2+"&day3="+day3+"&day4="+day4+"&per1_raj="+per1+"&per2_raj="+per2+"&chk1="+chk1+"&bprice=1&inid=1",true);

xmlhttp.send();



	}



function test123(){
uid=document.form1.txtcust.value;


var uid2 = uid.split("+");
var uid3 = uid2[0];

var xmlhttp;
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmainenggcontact.php?uid="+uid3,true);
xmlhttp.send();


	}
	
</script>

        <script language="javascript">
		function geturl(addr) {  
var r = $j.ajax({  
 type: 'GET',  
 url: addr,  
 async: false  
}).responseText;  
return r;  
}  
  
function test() {



var uid = '';
var uid2 = '';
var uid3 = '';


 uid= document.getElementById("txtcust").value;

 uid2 = uid.split("+");
 uid3 = uid2[0];
$j('#content').html(geturl("getmainenggcontact.php?uid="+uid3));  
test2();
}

function test2() {



var uid = '';



 uid= document.getElementById("txtreq").value;
//alert(uid);

$j('#content2').html(geturl("getmailphone.php?uid="+uid));  
}


</script>
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
</head><body onload="misc1();">

		<table width="100%" border="0" cellpadding="0" cellspacing="0">

            <tbody><tr>

                <td align="center">

                    <table width="1300" border="0" cellpadding="0" cellspacing="1">

                        <tbody>

                        <tr style="height:20px; background-color:#FFF;"></tr>
                      

                            <tr>
                            

                              <td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>

                          </tr>


                            <tr>

                                

                  <td id="mainpage" style="width: 750px;">

                                   
                                       <div>

                                        <table width="100%" cellpadding="5" cellspacing="1">

                                            

                                            <tbody><tr>

                                                

                                            </tr>

                                            <tr>
                                              <td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br />
                                                  <br />
                                                  <img src="logo-pcb.png" width="189" height="198" border="0" /></a><br /></td>

												<td style="line-height: 16px;"><?php

// Paging Code Starts

		// how many rows to show per page 

		$rowsPerPage=10; 

		

		// by default we show first page 

		$pageNum = 1; 

		//echo "<br>PageNum :  ".$pageNum ;

		

		// if $_GET['page'] defined, use it as page number 

		if(isset($_GET['page'])) 

		{ 

			$pageNum = $_GET['page']; 

		} 

	

		// counting the offset 

		$offset = ($pageNum - 1) * $rowsPerPage; 

//$sq="select * from user";



//$srch=$_REQUEST['srch'];



$sqs="select * from order_tb";

$sqs.=" ORDER BY ord_id desc LIMIT $offset, $rowsPerPage ";







$res1=mysql_query($sqs,$conn);

if(!$res1)

{

die('error in data'.mysql_error());



}

if(mysql_num_rows($res1)>0)

{

//$rw=mysql_fetch_array($res);



$query="select * from order_tb";



					//print $query;

						$result  = mysql_query($query) or die('Error, query failed'); 

						$row     = mysql_fetch_array($result, MYSQL_ASSOC); 

						//$numrows = $row['numrows'];

						$numrows = mysql_num_rows($result);

						

						// No of rows u need to assign

						//$numrows = 3; 

						//echo "<br>Numrows : ".$numrows ;

						

						// how many pages we have when using paging? 

						$maxPage = ceil($numrows/$rowsPerPage); 

						//echo "<br>Maximum Pages : ".$maxPage;

						

						// print the link to access each page 

						

						$self = $_SERVER['PHP_SELF']; 

						$nav = ''; 

						for($page = 1; $page <= $maxPage; $page++) 

						{ 

							if ($page == $pageNum) 

							{ 

								$nav .= " $page ";   // no need to create a link to current page 

							} 

							else 

							{ 

								$nav .= " <a href=\"$self?page=$page\">$page</a> "; 

							}         

						} 

						

						// creating previous and next link 

						// plus the link to go straight to 

						// the first and last page 

						

						if ($pageNum > 1) 

						{ 

							$page = $pageNum - 1; 

							$prev = " <a href=\"$self?page=$page\">[Prev]</a> "; 

							 

							$first = " <a href=\"$self?page=1\">[First Page]</a> "; 

						}  

						else 

						{ 

							$prev  = '&nbsp;'; // we're on page one, don't print previous link 

							$first = '&nbsp;'; // nor the first page link 

						} 

						

						if ($pageNum < $maxPage) 

						{ 

							$page = $pageNum + 1; 

							$next = " <a href=\"$self?page=$page\">[Next]</a> "; 

							 

							$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> "; 

						}  

						else 

						{ 

							$next = '&nbsp;'; // we're on the last page, don't print next link 

							$last = '&nbsp;'; // nor the last page link 

						} 

						

						// print the navigation link 

						





?>

												<form id="form1" name="form1" method="post" action="sendmail.php">

  <table width="880" border="1" cellpadding="1" cellspacing="1" bordercolor="#e6e6e6" class="up" style="left:35px;">

    <tr>

      <td height="30" bgcolor=#336699 colspan="3" align="center">

      <font color="white"><span class="style1">Online Request For Quote Form</font></span></td>
    </tr>

    <tr>

      <td width="312" height="30">
      
      <strong>Customer :</strong> 

       <!-- <label>

        <input type="text" name="txtcust" id="txtcust" />

      </label>-->
      
<label>

                                                        <select name="txtcust" id="txtcust"  onChange="test();">

                                                        <?php 

														$sqv="select * from data_tb ORDER BY c_name";

														$resv=mysql_query($sqv);

														if(!$resv)

														{

														die('err');

														}

														while($rwv=mysql_fetch_array($resv))

														{

														?>

                                                        <option value="<?php echo $rwv['data_id'].'+'.$rwv['c_name'];

														?>"><?php echo $rwv['c_name'];

														?></option>

                                                        <?php 

														}

														?>
                                                      </select>
                                                      </label>      </td>

      <td width="252"><strong>Part Number :</strong> 

      <input type="text" name="txtpno" id="txtpno" /></td>

      <td width="238"><strong>Rev :</strong> 

      <input name="txtrev" type="text" id="txtrev" size="2" />
      <label for="new"><strong> New</strong></label>
  <input type="radio" name="nor1"  value="New Part" id="new" />
 &nbsp;&nbsp;&nbsp;
  <label for="rep"><strong> Repeat</strong></label>
  <input type="radio" name="nor1"  value="Repeat Order" id="rep" /></td>
    </tr>

    <tr>

      <td height="30"><strong>Requested By :</strong> 

<!--      <input type="text" name="txtreq" id="txtreq" />
-->      
      <span id="content"></span>      </td>

      <td colspan="2" id="content2" height="30"><strong>Email :</strong> 

      <input type="text" name="txtemail" id="txtemail" /> <strong>Phone :</strong> 

      <input type="text" name="txtphone" id="txtphone" /></td>

     <!-- <td><strong>Phone :</strong> 

      <input type="text" name="txtphone" id="txtphone" /></td>-->
    </tr>

    <tr>

      <td height="30" colspan="3"><strong>FAX :</strong> 

      <input name="txtfax" type="text" id="txtfax" size="14" /> 

      <strong>Quote Needed by:      </strong>

      <input name="txtquote" type="text" id="txtquote" size="10" />
      <strong> NRE Charge:</strong> <input size="3" type="text" value="" name="necharge" id="necharge"  onfocus="call6();">

      Select Misc :
      <select name="txtmisc" id="txtmisc" onchange="getmisc();">
      <option value="">--select MISC--</option>
      <option value="m1">Misc 1</option>
      <option value="m2">Misc 2</option>
      <option value="m3">Misc 3</option>
      </select>
      <br />      <script language="javascript">
     function getmisc()
{
//alert('hi');
if(document.form1.txtmisc.value=='m1')
{
document.getElementById('misc1').style.visibility = 'visible';
}
if(document.form1.txtmisc.value=='m2')
{
document.getElementById('misc2').style.visibility = 'visible';
}
if(document.form1.txtmisc.value=='m3')
{
document.getElementById('misc3').style.visibility = 'visible';
}
}
</script>

      <br />
     <div id="misc1" style="visibility:hidden;"><strong>Misc Charge1:</strong> <input size="3" type="text" name="descharge"  id="descharge"> 
       &nbsp;Name of Misc1 :
       <input type="text" name="desdesc" id="desdesc" />
     </div>
      <div id="misc2" style="visibility:hidden;">  <strong>Misc Charge2:</strong> <input size="3" type="text" name="descharge1"  id="descharge1"> 
       &nbsp;Name of Misc2 :
       <input type="text" name="desdesc1" id="desdesc1" />
      </div>
       <div id="misc3" style="visibility:hidden;"> <strong>Misc Charge3:</strong> <input size="3" type="text" name="descharge2" id="descharge2"> 
       &nbsp;Name of Misc3 :
       <input type="text" name="desdesc2" id="desdesc2" />
       </div>
       <!--<strong>Customer PO:      </strong>

      <input name="cpo" type="text" id="cpo" size="8" />-->
      
     <!-- <strong>Our PO:      </strong>

      <input name="opo" type="text" id="opo" size="8" />
	  -->
      <br>
      <strong><br />
      Cancellation</strong>
<input type="radio" name="cancharge" id="radio12" value="yes">

                                                      Yes

                                                      <input type="radio" name="cancharge" id="radio122" value="no"> 

                                                      No
                                                      
          <strong>Charge</strong>
          
               <input name="ccharge" type="text" id="ccharge" size="8" />  
                <!--<strong>Order Date</strong>
          
               <input name="orddate1" type="text" id="exampleII" size="18" />    -->    
               
               
                 <strong>FOB:</strong> <select name="fob" id="fob">

                                                        <option value="Anaheim">Anaheim</option>

                                                        <option value="Customer Dock">  Customer Dock</option>
                                                        
                                                         <option value="Factory">Factory</option>

                                                      </select>               </td>                                   
    <tr>

      <td height="30" colspan="3"><strong>Qty(s) : 

      </strong>

        <input name="txtqty1" type="text" id="txtqty1" size="1" />

        , 

        <input name="txtqty2" type="text" id="txtqty2" size="2" /> 

        , 

        <input name="txtqty3" type="text" id="txtqty3" size="3" /> 

        ,

        <input name="txtqty4" type="text" id="txtqty4" size="4" /> 

                ,

        <input name="txtqty5" type="text" id="txtqty5" size="4" /> 

                ,

        <input name="txtqty6" type="text" id="txtqty6" size="4" /> 

                ,

        <input name="txtqty7" type="text" id="txtqty7" size="4" /> 

              ,

        <input name="txtqty8" type="text" id="txtqty8" size="4" /> 

                ,

        <input name="txtqty9" type="text" id="txtqty9" size="4" /> 

                ,

        <input name="txtqty10" type="text" id="txtqty10" size="4" /> 
<br><br>
       <strong>Lead Times (In Days) :</strong> 

        <input name="txtday1" type="text" id="txtday1" size="1" /> 

        ,

        <input name="txtday2" type="text" id="txtday2" size="1" />

        ,

        <input name="txtday3" type="text" id="txtday3" size="1" />

        ,

        <input name="txtday4" type="text" id="txtday4" size="1" />

        ,

        <input name="txtday5" type="text" id="txtday5" size="1" />

        <input name="txtprice1" type="hidden" id="txtprice1" value="$12" size="15" />

        <input name="txtprice2" type="hidden" id="txtprice2" value="$10" size="15" />

        <input name="txtprice3" type="hidden" id="txtprice3" value="$5" size="15" />

        <input name="txtprice4" type="hidden" id="txtprice4" value="$4.40" size="15" /></td>
    </tr>

    <tr>

       <td height="30" colspan="4" >

         <input type="button" name="button" id="button" value="Calculate Price" onClick="getprice2();">
         &nbsp;&nbsp;&nbsp;
           <input type="button" name="button" id="button" value="Manual Price" onClick="showmanual();">

         <br>

         <br><div id="txtshow1"></div>

         <br>       </td>
     </tr>

    <tr>
<td colspan="3">

<table>
<tr>
      <!--<td height="30" bgcolor=#336699  align="Left">

      <font color="white"><strong>SPECIAL INSTRUCTIONS: </strong></font></span>
      
      </td>-->

      
      <td height="30" bgcolor=#336699  align="Left">

      <font color="white"><strong>ADMIN INSTRUCTIONS: </strong></font></span>      </td>
 <td height="30" bgcolor=#336699  align="Left">     </td>
    </tr>

    <tr>

     <!-- <td height="30" ><label>

        <textarea name="txtinst" id="txtinst" cols="45" rows="5"></textarea>

      </label></td>-->
     
      <td height="30" ><label>

        <textarea name="txtinstadmin" id="txtinstadmin" cols="45" rows="5"></textarea>

      </label></td>
      
       <td  height="30" >
       <strong>Replace with Comments</strong> <br>
       Yes 
        <input name="admcmntstat" type="radio" id="admcmntstat1" value="yes" />
	<br>
        No &nbsp;&nbsp;<input name="admcmntstat" type="radio" id="admcmntstat2" checked value="no" /></td>
 </tr>
    </table></td>
    </tr>
    </table>
  <table class="upTT" width="880" border="1" style="border-color: 
#336699; left:35px;" cellpadding="1" cellspacing="0" bordercolor="#e6e6e6">

    

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Number of Layers : </font></strong></td>
      <td height="30"bgcolor=#336699><font color="white"><strong>Material Required : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>IPC Class:</strong> 1 

      <input name="chki1" type="checkbox" id="chki1" value="1" /> 

      2

      <input name="chki2" type="checkbox" id="chki2" value="2" /> 

      3 

      <input name="chki3" type="checkbox" id="chki3" value="3" /></font></td>
    </tr>

    <tr>

      <td height="30"> Single Sided

        <label>

        <input name="chk1" type="radio" id="chk1" value="single" />

      Double Sided

      <input name="chk1" type="radio" id="chk2" value="Double Sided" />

      <br />

      <br />

      <strong>Multilayer: </strong>4Lyr 

      <input name="chk1" type="radio" id="chk3" value="4Lyrs" />

      6Lyr 

      <input name="chk1" type="radio" id="chk4" value="6Lyrs" />

8Lyr 

      <input name="chk1" type="radio" id="chk5" value="8Lyrs" />

10Lyr 

      <input name="chk1" type="radio" id="chk6" value="10Lyrs" />

      <br />

      <br />

      Other :

      <input name="chk1" type="radio" id="chk99" value="Other" />  

      <input type="text" name="txtother1" id="txtother1" />

      <br />
      </label></td>

      <td height="30"> FR-4 
        <input name="chk7" type="radio" id="chk7" value="FR-4" />
		&nbsp;
        FR-4/170TG Min
         <input name="chk7" type="radio" id="chk8" value="FR-4/170TG Min" />
        <br />
        <br />
        Rogers 4003 
        <input name="chk7" type="radio" id="chk9" value="Rogers 4003" />
        &nbsp;		
        Other: 
        <input name="chk7" type="radio" id="chk107" value="Other" />
        <input name="txtother2" type="text" id="txtother2" size="12" />
        <br />
        <br />


        <strong>Inner Copper Oz: </strong>N/A
        <input name="chk18" type="radio" id="chk18" value="N/A" />
		&nbsp;
.5
<input name="chk18" type="radio" id="chk19" value=".5" />
&nbsp;
1
<input name="chk18" type="radio" id="chk20" value="1" />
&nbsp;
2
<input name="chk18" type="radio" id="chk21" value="2" />
<br />
Other
<input name="chk18" type="radio" id="chk102" value="Other" />
<input name="txtother6" type="text" id="txtother6" size="10" />
<br /></td>

      <td height="30" valign="top"><strong>Thickness:</strong> 0.031&quot;
        <input name="chk13" type="radio" id="chk13" value="0.031" />
        &nbsp;		
        0.062&quot;
        <input name="chk13" type="radio" id="chk14" value="0.062" />
        <br />
        <br />
        0.093&quot; 
        <input name="chk13" type="radio" id="chk15" value="0.093" />
		&nbsp;
        Other: 
        <input name="chk13" type="radio" id="chk108" value="Other" />
        <input name="txtother4" type="text" id="txtother4" size="5" />
        <br />
        <br />
      <strong>Thickness Tolerance:</strong>
      <br />
      <br />
       +-10% 
       <input name="chk17" type="radio" id="chk17" value="+/- 10%" /> 
	   &nbsp;
      Other 
      <input name="chk17" type="radio" id="chk101" value="Other" />
      <input name="txtother5" type="text" id="txtother5" size="5" />
      <br />
      <br /></td>
    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Plate : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Design Type/Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Design Technology : </font></strong></td>
    </tr>

    <tr>

      <td height="30" width="307px"><strong>External Cu Oz:</strong> 0.5
        <input name="chk10" type="radio" id="chk10" value="0.5" />
		&nbsp;
1
<input name="chk10" type="radio" id="chk11" value="1" />
&nbsp;
2
<input name="chk10" type="radio" id="chk12" value="2" />
<br />
<br />
Other :
<input name="chk10" type="radio" id="chk100" value="Other" />
<input type="text" name="txtother3" id="txtother3" />
<br />
<br />
        <br />
        <strong>Plated Cu in Holes (Min.):</strong> .0010 
        <input name="chk22" type="radio" id="chk22" value=".0010" />
		&nbsp;
        .0014 
        <input name="chk22" type="radio" id="chk23" value=".0014 " />
        &nbsp;&nbsp;&nbsp;&nbsp;1oz 
        <input name="chk22" type="radio" id="chk24" value="1oz " />
		&nbsp;
        Other 
        <input name="chk22" type="radio" id="chk106" value="Other" /> 
        <input name="txtother7" type="text" id="txtother7" size="5" />
        <br />
        <br />
        <strong>Fingers Nickel/Hard Gold: </strong>Yes <input name="chk25" type="radio" id="chk25" value="yes" />
		&nbsp;
         NO 
         <input name="chk25" type="radio" id="chk26" checked value="No" />
         <br />
        <br /></td>

      <td height="30" width="330px" valign="top"><strong>Trace Min. = </strong>.006 
        <input name="chk27" type="radio" id="chk27" value=".006" />
        .005 
        <input name="chk27" type="radio" id="chk28" value=".005" />
        .004 
        <input name="chk27" type="radio" id="chk29" value=".004" />
        .003
         <input name="chk27" type="radio" id="chk30" value=".003" />
        <br />
        <br />

        <strong>Space Min. =</strong>.006
        <input name="chk31" type="radio" id="chk31" value=".006" /> 
		
        .005 
        <input name="chk31" type="radio" id="chk32" value=".005" />
		
        .004 
        <input name="chk31" type="radio" id="chk33" value=".004" />
		
        .003 
        <input name="chk31" type="radio" id="chk34" value=".003" />
        <br />
        <br />
        <strong>Controlled Impedance:</strong> Yes 
        <input name="chk35" type="radio" id="chk35" value="Yes" />
		
      No 
      <input name="chk35" type="radio" id="chk36" checked value="No" />
      <br />
      <br />
      
      
      <!--<div id="yes_box" style="display: block; "  >-->
       Single Ended 
      <input name="chk109" type="checkbox" id="chk109" value="Single Ended" />
	 
      Differential
<input name="chk110" type="checkbox" id="chk110" value="Differential" />
      <br />
      <br />
      <strong>Impedance Tolerance:</strong>
      <br />
      <br />
       +-10% 
       <input name="chk202" type="radio" id="chk202" value="+/- 10%" /> 
	   
      Other 
      <input name="chk202" type="radio" id="chk203" value="Other" />
      <input name="txtother51" type="text" id="txtother51" size="10" />
      
     <!-- </div>-->
      
      
      <br />
      <td height="30" valign="top"><strong>Smallest  Hole Size:</strong>
        <input name="txtother8" type="text" id="txtother8" size="8" />
        <br /><br /><strong>Smallest Pad:</strong>
        <input name="txtother19" type="text" id="txtother14" size="10" />
        <br />
        <br />
        <strong>Blind Vias:</strong> Yes 
        <input name="chk37" type="radio" id="chk37" value="yes" />
		&nbsp;
        No <input name="chk37" type="radio" id="chk38" value="No" />
        <br />
        <br />
        <strong>Buried Vias: </strong>Yes 
        <input name="chk39" type="radio" id="chk39" value="yes" />
		&nbsp;
        No <input name="chk39" type="radio" id="chk40" value="No" />
         <br />
         <br />
        <strong>Blind/Buried Vias:</strong> Yes 
        <input name="chk41" type="radio" id="chk41" value="Yes" />
		&nbsp;
      No 
      <input name="chk41" type="radio" id="chk42" value="No" />
	   <br />
	   <br />
<strong>HDI Design:</strong> Yes 
        <input name="chk200" type="radio" id="chk200" value="Yes" />
		&nbsp;
      No 
      <input name="chk200" type="radio" id="chk201" value="No" /></td>
    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Finish : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Solder Resist : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Nomenclature : </font></strong></td>
    </tr>

    <tr>

      <td height="30"><strong>Finish:</strong> HASL 
        <input name="chk43" type="radio" id="chk43" value="HASL" />
		&nbsp;
        Lead-Free HASL
        <input name="chk43" type="radio" id="chk44" value="Lead-Free HASL" />
        <br />
        <br />
        ENIG
        <input name="chk43" type="radio" id="chk45" value="ENIG" />
&nbsp;		
        Imm.Silver
        <input name="chk43" type="radio" id="chk46" value="Imm.Silver" /> 
		&nbsp;
        Imm.Tin
        <input name="chk43" type="radio" id="chk47" value="Imm.Tin" />
        <br />
        <br />
      Other :
      <input name="chk43" type="radio" id="chk103" value="Other" />
      <input name="txtother9" type="text" id="txtother9" size="15" /></td>

      <td height="30"><strong>Mask Sides:</strong> N/A
        <input name="chk48" type="radio" id="chk48" value="N/A" /> 
		&nbsp;
        1 
        <input name="chk48" type="radio" id="chk49" value="1" />
		&nbsp;
        Both <input name="chk48" type="radio" id="chk50" value="Both" />
        <br />
        <br />
        <strong>Color:</strong> Green 
        <input name="chk51" type="radio" id="chk51" value="Green" />
		&nbsp;
        Blue <input name="chk51" type="radio" id="chk52" value="Blue" />
        <br />
        <br />
        Other 
        :
        <input name="chk51" type="radio" id="chk104" value="Other" />
        <input name="txtother10" type="text" id="txtother10" size="15" />
        <br />
        <br />
        <strong>Mask Type:</strong> Glossy 
        <input name="chk53" type="radio" id="chk53" value="Glossy" />
		&nbsp;
      Matte 
      <input name="chk53" type="radio" id="chk54" value="Matte " />    </td>

      <td height="30" width="273px"><strong>S/S Sides: </strong>N/A 
        <input name="chk55" type="radio" id="chk55" value="N/A" />
		&nbsp;
        1 
        <input name="chk55" type="radio" id="chk56" value="1" />
		&nbsp;
        2 <input name="chk55" type="radio" id="chk57" value="2" />
        <br />
        <br />


        <strong>S/S Color: </strong>White 
        <input name="chk58" type="radio" id="chk58" value="White" />
		&nbsp;
        Black 
        <input name="chk58" type="radio" id="chk59" value="Black" />
		&nbsp;
        Yellow <input name="chk58" type="radio" id="chk60" value="Yellow" />
        <br />
        <br />
        <strong>Other:
        <input name="chk58" type="radio" id="chk105" value="Other" />
        </strong>
      <input name="txtother11" type="text" id="txtother11" size="15" /></td>
    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Fabrication : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Array Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Special Call-Outs : </font></strong></td>
    </tr>

    <tr>

      <td height="30"><strong>Individual Route 1-up: </strong>Yes 
        <input name="chk61" type="radio" id="chk61" value="Yes" />
		&nbsp;
        No
        <input name="chk61" type="radio" id="chk62" value="No" />
        <br />
        <br />
        <strong>Board Size (in.)</strong> 
        <input name="txtother12" type="text" id="txtother12" size="5" />
        X
        <input name="txtother13" type="text" id="txtother13" size="5" />
        <br />
        <br />
        <strong>Array:</strong> Yes 
        <input name="chk63" type="radio" id="chk63" value="YES" />
		&nbsp;
        No <input name="chk63" type="radio" id="chk64" value="NO" />
        <br /><br />
        
        
       
        <div id="yes_box2" style="display: block; "  >
       
        <strong>Bds Per Array:</strong> 
        <input name="txtother14" type="text" id="textfield26" size="4" />
        <br /><br />
        <strong>Array Size:        </strong>
        <input name="txtother15" type="text" id="txtother15" size="5" />
X
<input name="txtother16" type="text" id="textfield25" size="5" />
</div>


	<br /><br />
	<strong>Rout Tolerance:</strong>
       +/-.005 
       <input name="chk204" type="radio" id="chk204" value="+/-.005" /> 
	   &nbsp;
      Other 
      <input name="chk204" type="radio" id="chk205" value="Other" />
      <input name="txtother52" type="text" id="txtother53" size="5" />    </td>

      <td height="30"><strong>Array Design Provided:</strong> Yes
        <input name="chk65" type="radio" id="chk65" value="Yes" /> 
		&nbsp;
        No
        <input name="chk65" type="radio" id="chk66" value="No" />
        <br />
        <strong><br />
        Factory to Design Array: </strong>Yes 
        <input name="chk67" type="radio" id="chk67" value="yes" />
		&nbsp;
        No
        <input name="chk67" type="radio" id="chk68" value="No" />
        <br /><br />
        <strong>Array Type:</strong> Tab Route
        <input name="chk69" type="checkbox" id="chk69" value="Tab Route" /> 
		&nbsp;
        V Score
        <input name="chk70" type="checkbox" id="chk70" value="V Score" />
        <br /><br />
        Tab and V Score
        <input name="chk71" type="checkbox" id="chk71" value="Tab and V Score" />
        <br />
        <br />
        <strong>Array Requires: </strong>Tooling Holes <input name="chk72" type="checkbox" id="chk72" value="Tooling Holes" />
        <br /><br />
      Fiducials
      <input name="chk73" type="checkbox" id="chk73" value="Fiducials" /> 
	  &nbsp;
      Mousebites
      <input name="chk74" type="checkbox" id="chk74" value="Mousebites" /></td>

      <td height="30"><strong>Milling: </strong>Yes 
        <input name="chk75" type="radio" id="chk75" value="yes" />
		&nbsp;
        No
        <input name="chk75" type="radio" id="chk76" value="No" />
        <br />
        <br />
        <strong>Countersink:</strong> Yes
        <input name="chk77" type="radio" id="chk77" value="yes" /> 
		&nbsp;
        No
        <input name="chk77" type="radio" id="chk78" value="No" />
        <br />
        <br />
        <strong>Control Depth:</strong> Yes
        <input name="chk79" type="radio" id="chk79" value="Yes" /> 
		&nbsp;
        No
        <input name="chk79" type="radio" id="chk80" value="No" />
        <br />
        <br />
        <strong>Edge Plating:</strong> Yes
      <input name="chk81" type="radio" id="chk81" value="Yes" /> 
	  &nbsp;
      No
      <input name="chk81" type="radio" id="chk82" value="No" /></td>
    </tr>

    <tr>

      <td height="30"bgcolor=#336699><font color="white"><strong>Markings : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>QA Requirements : </font></strong></td>

      <td height="30"bgcolor=#336699><font color="white"><strong>Miscellaneous : </font></strong></td>
    </tr>

    <tr>

      <td height="30" width="307px"><strong>Logo:</strong> None 
        <input name="chk83" type="radio" id="chk83" value="None " />
		&nbsp;
        Factory <input name="chk83" type="radio" id="chk84" value="Factory" />
        <br />
        <br />
        <strong>94V-0 Mark: </strong>Yes 
        <input name="chk85" type="radio" id="chk85" value="Yes" />
		&nbsp;
        No <input name="chk85" type="radio" id="chk86" value="No" />
        <br />
        <br />
        <strong>Date Code Format:</strong> None 
        <input name="chk87" type="radio" id="chk87" value="None" /> 
		&nbsp;
        WWYY 
        <input name="chk87" type="radio" id="chk88" value="WWYY" />
        <br />
        <br />
        YYWW 
        <input name="chk87" type="radio" id="chk89" value="YYWW" />
		&nbsp;
       <strong>Other Marking: 
       <input  name="chk87" type="radio" id="chk111" value="Other Marking " />
       </strong>
       <input name="txtother17" type="text" id="textfield27" size="10" />
      <br /></td>
      <td height="30"><strong>Microsection Required:</strong> Yes 
        <input name="chk90" type="radio" id="chk90" value="YES" />
		&nbsp;
        No <input name="chk90" type="radio" id="chk91" value="NO" />
        <br />
        <br />
          <strong>Electrical Test Stamp: </strong>Yes
        <input name="chk92" type="radio" id="chk92" value="Yes" />
		&nbsp;
        No 
        <input name="chk92" type="radio" id="chk93" value="No" />
        <br />
          <br />
      In Board
      <input name="chk94" type="radio" id="chk94" value="In Board" /> 
	  &nbsp;
      In Array Rail
      <input name="chk94" type="radio" id="chk199" value="In Array Rail " />    </td>

      <td height="30"><strong>X-Outs Allowed:</strong> Yes
        <input name="chk95" type="radio" id="chk95" value="yes" />
&nbsp;		
        No <input onSelect="xoutsnot();" onChange="xoutsnot();" name="chk95" type="radio" id="chk96" value="no" />
        <br />
        <br />
        <strong># of X-outs per Array:</strong> 
        <input name="txtother28" type="text" id="textfield28" size="4" />
        <br /><br />
        <strong>RoHS Cert:</strong> Yes 
      <input name="chk97" type="radio" id="chk97" value="Yes" />
	  &nbsp;
      No 
      <input name="chk97" type="radio" id="chk98" value="No" /></td>
    </tr>

    <tr>

      <td height="30" colspan="3">&nbsp;</td>
    </tr>

    <tr>

      <td height="30" colspan="3">

        <input type="submit" name="Submit" id="Submit" value="Submit" />

     &nbsp;

     <label>

     <input type="reset" name="button2" id="button2" value="Reset" />
     </label></td>
    </tr>

    <tr>

      <td height="30" colspan="3">&nbsp;</td>
    </tr>
  </table>

  <p>&nbsp;</p>

  <p>&nbsp;</p>
</form>

											      <p>

                                                    <?php 

}// end of if

else

{

?>
                                                  </p>

											      <table width="600" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="50"><strong>No Quote Details Found</strong></td>
                                                    </tr>
                                                  </table>

											      <p>

                                                    <?php 

}

?>
                                                  </p>

										      <br></td>
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