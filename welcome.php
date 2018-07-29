<?php require_once('chksess.php'); ?>
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
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head><body>
<script type="text/javascript">
$(function() {
    $(document).keypress(function(event) {
        var ch = String.fromCharCode(event.keyCode || event.charCode);
        switch (ch) {
            case 'q': case 'Q':
                window.location.href = 'http://globalpcbs.com/admin/quote.php';
                break;
            case 'm': case 'M':
                window.location.href = 'http://globalpcbs.com/admin/manage_quote.php';
                break;
            case 'p': case 'P':
                window.location.href = 'http://globalpcbs.com/admin/add_purchase.php';
                break;
               case 'o': case 'O':
                window.location.href = 'http://globalpcbs.com/admin/manage_purchase.php';
                break;
                case 'c': case 'C':
                window.location.href = 'http://globalpcbs.com/admin/add_confirmation.php';
                break;
                case 'v': case 'V':
                window.location.href = 'http://globalpcbs.com/admin/manage_confirmation.php';
                break;
                case 's': case 'S':
                window.location.href = 'http://globalpcbs.com/admin/add_packing.php';
                break;
                case 'd': case 'D':
                window.location.href = 'http://globalpcbs.com/admin/manage_packing.php';
                break;
                case 'i': case 'I':
                window.location.href = 'http://globalpcbs.com/admin/add_invoice.php';
                break;
                case 'u': case 'U':
                window.location.href = 'http://globalpcbs.com/admin/manage_invoice.php';
                break;
                case 'r': case 'R':
                window.location.href = 'http://globalpcbs.com/admin/delivery_sch.php';
                break;
                case 't': case 'T':
                window.location.href = 'add_stock.php';
                break;
                 case 'n': case 'N':
                window.location.href = 'manage_stock.php';
                break;
                case '~': 
                window.location.href = 'http://globalpcbs.com/admin/welcome.php';
                break;
        }
    });
});
    </script>        
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="marg">
            <tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="1" width="1300">
                        <tbody>
                       
                            <tr>
                                <td colspan="2" id="header"><!--menu-->
                                 <?php require_once('top-menu.php'); ?>
                                 </td> <!--/menu-->                              
                            </tr>                          
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
  <center>Welcome to Admin Panel. To get quick access, please follow the instructions below: <br/>
  <div style="width:450px;"><ul>  	
  <li style="float: left;">Press <strong>Q</strong> to <a href="http://globalpcbs.com/admin/quote.php">Add new quote</a></li><br/>
  <li style="float: left;">Press <strong>M</strong> to <a href="http://globalpcbs.com/admin/manage_quote.php">Manage Quotes</a></li><br/>
  <li style="float: left;">Press <strong>P</strong> to <a href="http://globalpcbs.com/admin/add_purchase.php">Add Purchase</a></li><br/>
  <li style="float: left;">Press <strong>O</strong> to <a href="http://globalpcbs.com/admin/manage_purchase.php">Manage Purchase</a></li><br/>
  <li style="float: left;">Press <strong>C</strong> to <a href="http://globalpcbs.com/admin/add_confirmation.php">Add Order Confirmation</a></li><br/>
  <li style="float: left;">Press <strong>V</strong> to <a href="http://globalpcbs.com/admin/manage_confirmation.php">Manage Order Confirmation</a></li><br/>
  <li style="float: left;">Press <strong>S</strong> to <a href="http://globalpcbs.com/admin/add_packing.php">Add Packing Slip</a></li><br/>
  <li style="float: left;">Press <strong>D</strong> to <a href="http://globalpcbs.com/admin/manage_packing.php">Manage Packing Slip</a></li><br/>
  <li style="float: left;">Press <strong>I</strong> to <a href="http://globalpcbs.com/admin/add_invoice.php">Add Invoice</a></li><br/>
  <li style="float: left;">Press <strong>U</strong> to <a href="http://globalpcbs.com/admin/manage_invoice.php">Manage Invoice</a></li><br/>
  <li style="float: left;">Press <strong>R</strong> for <a href="http://globalpcbs.com/admin/delivery_sch.php">Status Report</a></li><br/>
  <li style="float: left;">Press <strong>T</strong> for <a href="add_stock.php">Add Stock</a></li><br/>
  <li style="float: left;">Press <strong>N</strong> for <a href="manage_stock.php">Manage Stock</a></li><br/>
  <li style="float: left;">Press <strong style="color: red;">~</strong> or <strong style="color: red;">SHIFT + `</strong> (backtick) to come back to this page</li>
    </ul>
	<br/>
  </div>
  </center>
</body></html>