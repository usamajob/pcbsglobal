<?php require_once('conn.php'); 


$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];

$cname = $pieces[2];

$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2



/*echo $pieces1[1];
exit;*/
$query="select * from order_tb where (( part_no='$pno') and (rev='$rev')and (cust_name='$cname')) limit 1";
/*echo $query;
exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 
$lyrcnt= $row->no_layer; 
$orddate1= $row->orddate1;





$query11="select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11;
exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);
$ordon = $row11->ordon; 
$po = $row11->poid; 
$ypo = $row11->po; 
if ($po>0)
$po=$po+9933;
else 
$po='';
/*echo $po;
exit;*/

?>

<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleIII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true, 'defaultDate': '<?php echo $ordon;  ?>', });});


</script>
<table width="750" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;">
                                                    
                                                    <tr>

                                                      <td height="30">Part # </td>

                                                      <td height="30"><input name="part_no" type="text" id="part_no" value="<?php echo $pno; ?>"  size="30"></td>

                                                    </tr>
                                                    
                                                    
                                                     
                                                     <tr>

                                                      <td height="30">Rev </td>

                                                      <td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>

                                                    </tr>

                                                    
                                                     <tr>

                                                      <td height="30">Our PO#</td>

                                                      <td height="30"><input name="oo"  type="text" id="oo" value="<?php echo $po; ?>" size="30"></td>

                                                    </tr>
                                                    <tr>

                                                      <td height="30">Customer PO#</td>

                                                      <td height="30">
                                                      
                                                      <input  name="po" type="text" id="po" value="<?php echo $ypo; ?>" size="30"></td>

                                                    </tr>
                                                    
                                                    <tr>

                                                      <td height="30">Ordered Date</td>

                                                      <td height="30"><input name="odate"  id="exampleIII"    type="text"     size="30"></td>

                                                    </tr>
                                                      <tr>

                                                      <td height="30">Layer Count</td>

                                                      <td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $lyrcnt; ?>" /></td>

                                                    </tr>
                                                    </table>
