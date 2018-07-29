<?php require_once('conn.php'); ?>
<?php 

	$stockid = $_POST['stockid'];
    $customer = $_POST['customer'];
    $pono = $_POST['pono'];
    $duedate = $_POST['duedate'];
    $allocationdate = $_POST['allocationdate'];
    $qut = $_POST['qut'];
    $allocate_by = $_POST['allocate_by'];
    $deliveredon = $_POST['deliveredon'];

    $newduedate = explode('-',$duedate);
    $newduedate_after = $newduedate['2'].'-'.$newduedate['0'].'-'.$newduedate['1'];

	$newallocationdate = explode('-',$allocationdate);
    $newallocationdate_after = $newallocationdate['2'].'-'.$newallocationdate['0'].'-'.$newallocationdate['1'];

    if($deliveredon != null){	
    $newdeliveredon = explode('-',$deliveredon);
    $newdeliveredon_after = $newdeliveredon['2'].'-'.$newdeliveredon['0'].'-'.$newdeliveredon['1'];
    }else{
    	$newdeliveredon_after='00-00-0000';
    }


    $sql = "INSERT INTO stock_allocation (stock_id,customer,pono,due_date,allocationdate,qut,allocate_by_id,delivered_on) values(
    '".$stockid."',
    '".$customer."',
    '".$pono."',
    '".$newduedate_after."',
    '".$newallocationdate_after."',
    ".$qut.",
    ".$allocate_by.",
    '".$newdeliveredon_after."'
	)";

	mysql_query($sql);

	if($deliveredon != null){
        $sql_get_current_stock = "SELECT qty FROM stock_tb WHERE stkid =".$stockid;
        $res_get_current_stock = mysql_query($sql_get_current_stock);
        while ($row_get_current_stock = mysql_fetch_assoc($res_get_current_stock)) {
            $current_stock = $row_get_current_stock['qty'];
        }

        // do the math
        $updated_stock = $current_stock - $qut;

        $sql_stock_update = "UPDATE  stock_tb SET qty ='".$updated_stock."' WHERE stkid = ".$stockid;
        $res_stock_update = mysql_query($sql_stock_update);
    }

	header('location:add_stock.php?stkid='.$stockid);


 ?>