<?php

require_once 'db_config.php';

$user=100000581649396;
if ($user==$_REQUEST['userId']) {

?>
<br/>
<div>	
	<?php
    
	global $db;
	$count = 0;
	$sql = "SELECT * FROM `db_error` order by date desc LIMIT 20";
	$result=$db->select($sql);
	$count=count($result);
	
	if($count > 0 ){
	?>
    	<table width="100%" cellpadding="2" cellspacing="2" style="color:#000; background-color:#FFF";>
        	<thead>
                <tr>
                    <th valign="top" align="center">Error #</th>
                    <th valign="top" align="center">Error</th>
                    <th valign="top" align="center">Table Name</th>
                    <th valign="top" align="center">Page</th>
                    <th valign="top" align="center">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<$count;$i++){ ?>
            	<tr>
                    <td><?php echo $result[$i]['error_num'];?></td>
                    <td><?php echo $result[$i]['error'];?></td>
                    <td><?php echo $result[$i]['table_name'];?></td>
                    <td><?php echo $result[$i]['page'];?></td>
                    <td><?php echo $result[$i]['date'];?></td>
                </tr>
                <tr>
                	<td colspan="5"><hr/></td>
                </tr>
             <?php }?>
            </tbody>
        </table>
    <?php }else{
		echo "No database error found!";
	}
	?>
	<div class="clear"></div>
</div>
<br/>
<?php
}
else {?>
	<H1>You are not allowed to view this page....</H1>
    <?php
}
?>


