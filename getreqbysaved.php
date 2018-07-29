<?php require_once('conn.php'); ?>


<select name="txtreq" id="txtreq"  onChange="test2();">
<?php 
$reqbysaved = $_REQUEST['reqbysaved'];

$reqbysaved = trim($reqbysaved);

$sqv="select * from maincont_tb where coustid='".$_REQUEST['uid']."'";

$resv=mysql_query($sqv);

if(!$resv)

{

die('err');

}

$i=1;

while($rwv=mysql_fetch_array($resv)){	
	 
	 $fullname =  $rwv['name'].' '.$rwv['lastname'];	 
	 $fullname = trim($fullname);	 
?>

<option <?php if ($fullname == $reqbysaved) echo 'selected'; ?> value="m**<?php echo $rwv['enggcont_id'];

?>**<?php echo $fullname;    

?>"><?php echo $rwv['name'];

?></option>
<?php                                                    
$i++;
}
?>

<?php 
//echo $_REQUEST['uid'];
$sqv="select * from enggcont_tb where coustid='".$_REQUEST['uid']."'";

$resv=mysql_query($sqv);

if(!$resv) {

die('err');

}

$i=1;

while($rwv=mysql_fetch_array($resv)){
	
	 $fullname =  $rwv['name'].' '.$rwv['lastname']; 
	 
	 $fullname = trim($fullname);
	
?>
<option <?php if ($fullname == $reqbysaved) echo 'selected'; ?> value="e**<?php echo $rwv['enggcont_id'];

?>**<?php echo  $fullname;  

?>"><?php echo $rwv['name'];

?></option>

<?php                                                    
$i++;
}
?>

</select>