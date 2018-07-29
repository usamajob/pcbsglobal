<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<html><head>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#part_no11').autocomplete({source:'getpno.php', minLength:1});
		});
 
	</script> 
	<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
<script type="text/javascript">
	function geturl(addr) {  
var r = $j.ajax({  
 type: 'GET',  
 url: addr,  
 async: false  
}).responseText;  
return r;  
}  
  
function test() {
	
qty1=document.getElementById('part_no11').value;
//alert(qty1);
//alert(document.getElementById('part_no').value);
qty1=document.getElementById('part_no11').value;
//alert(qty1);
$j('#txtshow1').html(geturl('getreportdata.php?pnorev='+qty1));  
}
	

</script>


<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />





<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>



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

												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table width="700" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6">

                                                    <tr>

                                                      <td height="30" colspan="2"><strong>Financial Records</strong></td>

                                                    </tr>

                                                   

                                                  

                                                    

                                                   

                                                    <tr>

                                                      <td height="30"> Lookup ID </td>

                                                      <td height="30">
                                                      
                                                      <input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" />
                                                     </td>

                                                    </tr>
                                                   </table>
                                                    <div id="txtshow1">
                                                     
                                                    </div>
                                                     

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