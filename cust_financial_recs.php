<?php
//session_start();
require_once('conn.php'); ?>
<?php require_once('chksess.php');?>
<html><head>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
	<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
    <script type="text/javascript" src="jquery.simpletip-1.3.1.js"></script> 
    
	<script type="text/javascript"> 
 var $j = jQuery.noConflict();
		jQuery(document).ready(function(){
			$j('#part_no11').autocomplete({source:'getcust.php', minLength:1});
		
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
$j('#txtshow1').html(geturl('getcustreportdata.php?pnorev='+qty1));  
}
	

</script>
<script>
$j("JQUERY SELECTOR").simpletip({ fixed: true });   /* (function($){
       $j(document).ready(function(){
           $j("[title]").style_my_tooltips({ 
    tip_follows_cursor:false,
    tip_delay_time:700,
	fixed: true,
    tip_fade_speed:300
});
        });
    })(jQuery);*/
</script>

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />





<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });});
</script>



<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=120,width=400');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>

<style type="text/css">
.tooltip{ position: absolute; top: 0; left: 0; z-index: 3; display: none; } 
</style>
    <title>Welcome</title>

    <link href="style_Admin.css" rel="stylesheet" type="text/css">
<!--<link href="http://3nhanced.com/examples/tooltip/style.css" rel="stylesheet">
-->
<link href="style-my-tooltips.css" rel="stylesheet" type="text/css" />
</head><body onLoad="setTimeout(function() {test();},250);">




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

                                   <!--<p><span class="toolTip" title="This is a tooltip. :)">What is this?</span></p>-->
                                 <!--  <span title="This is a simple tooltip made with jQuery"  style="">adsfasdf&nbsp;</span>-->
                             <!--    <a>Hover over me<div class="tooltip" style="display: none; left: 481.5px; top: 534px;">A simple tooltip</div></a>-->
                                        <table cellpadding="5" cellspacing="1" width="100%">

                                            

                                            <tbody><tr>

                                                <td>

                                                    <strong>Welcome</strong> | <span class="mailing">Site Administrative Area</span>

                                                </td>

                                            </tr>

                                            <tr>

												<td style="line-height: 16px;"><form name="form1" method="post" action="">

                                                  <p>&nbsp;</p>

                                                  <table width="700" border="1" align="center"  bordercolor="#e6e6e6">

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