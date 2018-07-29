<?php  require_once('conn.php'); error_reporting(-1); 

if( isset($_GET['invoice']) && $_GET['invoice'] == '1' ) {

	$sqlr = " select pt.date1, dt.e_payment, it.invoice_id, it.customer, it.part_no, it.rev, it.po from invoice_tb it inner join packing_tb pt on it.invoice_id = pt.invoice_id inner join data_tb dt on dt.data_id = it.vid where it.ispaid=0 and it.mailstop <> 1 and ( it.lastmail = '0000-00-00' OR ((to_days(now()) - to_days(it.lastmail)) >= 7) ) and length(dt.e_payment) > 5 and length(pt.date1) > 10 ";
	//
	$rres  = mysql_query($sqlr) or die($sqlr); 

	if(mysql_num_rows($rres) < 1)  die();

	$message1 = '
	Hello Admin,
	
	Need to follow up with customer with pending invoices:	
';

$i = 1;

	while($rows = mysql_fetch_assoc($rres)) {
		$ddate = explode('-',$rows['date1']);
		if(time() - strtotime($ddate[3].'/'.$ddate[1].'/'.$ddate[2].' +'.$rows['e_payment']) > 0) {
			//echo "<p>D date: ".$rows['date1']."<br>Term: ".$rows['e_payment']." newdate = ".	date('Y-m-d', strtotime($ddate[3].'/'.$ddate[1].'/'.$ddate[2].' +'.$rows['e_payment']))." - ".date('Y-m-d')."<br><hr>";

			$message1 .= '
		'.($i++).'. Customer PO# '.$rows['po'].'
		Customer: '.$rows['customer'].'
		Part no.: '.$rows['part_no'].'
		Revision: '.$rows['rev'].'
		Delivered on: '.$rows['date1'].'
		-------------------------------------------------
			';

			$id_arr[] = $rows['invoice_id'];
		}
	}

	$to1 = 'isaac@pcbsglobal.com, mani1078@gmail.com'; 
	// silvia@pcbsglobal.com
	$subject1 = 'Pending Invoice Reminders - '.date('d M Y');

	//echo "<pre>"; echo $message1;

if(mail($to1, $subject1, $message1, 'From: admin@pcbsglobal.com')) {
	
	$sqls = "update invoice_tb set lastmail = now() where invoice_id in ('".implode("', '", $id_arr)."')";
	echo $sqls;
	echo "<br>mail sent";
	mysql_query($sqls) or die(); 
} //*/
	
}
else {

$sqlr = "select rt.*, ot.cust_name, ot.part_no, ot.rev, ot.ord_date 
from reminder_tb rt inner join order_tb ot
on rt.quoteid = ot.ord_id where DATE_ADD(lastreminder, INTERVAL `days` DAY) >= CURDATE() and rt.enabled='yes' ORDER BY quoteid desc";
//
$rres  = mysql_query($sqlr) or die(); 

if(mysql_num_rows($rres) < 1)  die();

$message = '
	Hello Admin,
	
	Need to follow up with customer regarding quotation submitted.	
';

$i = 1;

while($rows = mysql_fetch_assoc($rres)) {

	$message .= '
	'.($i++).'. Quote# '.$rows['quoteid'].'
	Customer: '.$rows['cust_name'].'
	Part no.: '.$rows['part_no'].'
	Revision: '.$rows['rev'].'
	Order Date: '.$rows['ord_date'].'
	-------------------------------------------------
	';

	$id_arr[] = $rows['id'];
}

$to = 'isaac@pcbsglobal.com'; 
//, mani1078@gmail.com, armando@pcbsglobal.com
$subject = 'Quote Reminders - '.date('d M Y');

//echo "<pre>"; echo $message;

if(mail($to, $subject, $message, 'From: admin@pcbsglobal.com')) {
	
	$sqls = "update reminder_tb set lastreminder = now() where id in ('".implode("', '", $id_arr)."')";
	//echo $sqls;
	//echo "<br>mail sent";
	mysql_query($sqls) or die(); 
}
//wget -q --delete-after http://pcbsglobal.com/luke-new/admin/testmail.php
}
?>