<?php require_once('conn.php'); ?>

<select name="txtreq" id="txtreq"  onChange="test2();">
<?php 
//echo $_REQUEST['uid'];

$sqv="select * from maincont_tb where coustid='".$_REQUEST['uid']."' order by name, lastname";

	$resv=mysql_query($sqv) or die('err');

	$i=1;

	while($rwv=mysql_fetch_array($resv)){?>
	<option value="m**<?php echo $rwv['enggcont_id'];
	?>**<?php echo $rwv['name'].' '.$rwv['lastname'];    
	?>"><?php echo $rwv['name'].' '.$rwv['lastname'];
	?></option>

<?php                                                    
$i++;
	}
?>

<?php 
//echo $_REQUEST['uid'];

$sqv="select * from enggcont_tb where coustid='".$_REQUEST['uid']."' order by name, lastname";

	$resv=mysql_query($sqv) or die('err');

	$i=1;

	while($rwv=mysql_fetch_array($resv)){
?>
   <option value="e**<?php echo $rwv['enggcont_id'];

	?>**<?php echo $rwv['name'].' '.$rwv['lastname'];  

	?>"><?php echo $rwv['name'].' '.$rwv['lastname'];

	?></option>
	
<?php                                                    
$i++;
	}
?>
</select>