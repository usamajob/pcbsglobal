<?php require_once('chksess.php'); ?>
<?php require_once('conn.php');

function frmt_datestr($dd) {
	$dd_parts = explode('/', $dd);
	return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
}

$wherearr = array();
$wherestr = " (p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) ";

$st_date = frmt_datestr(trim($_GET['st_date']));
$en_date = frmt_datestr(trim($_GET['en_date']));
$part_no = trim($_GET['srchpn']);
$customer = trim($_GET['srchc']);
$vendor = trim($_GET['srchv']);

if (strlen($st_date) > 2 && strlen($en_date) > 2) {
	$wherearr[] = "
	( unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')  
	AND unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "')  )";
}

if(strlen($part_no) > 1)
	$wherearr[] = " p.part_no = '".$part_no."'";

if(strlen($customer) > 1)
	$wherearr[] = " p.customer = '".$customer."'";

if(strlen($vendor) > 1)
	$wherearr[] = " v.c_shortname = '".$vendor."'";

if(count($wherearr) > 0) 
	$wherestr .= " AND ".implode(' AND ', $wherearr);

$explode_start_date = explode('/',$_REQUEST['start_date']);
$fixed_start_date = $explode_start_date[2]."-".$explode_start_date[0]."-".$explode_start_date[1];

$explode_end_date = explode('/',$_REQUEST['end_date']);
$fixed_end_date = $explode_end_date[2]."-".$explode_end_date[0]."-".$explode_end_date[1];


if($_REQUEST['start_date']==''){
	$sql = "SELECT * FROM packing_tb WHERE year(real_date) = 2017 order by invoice_id desc";
}
else if($_REQUEST['end_date']==''){
	$sql = "SELECT * FROM packing_tb WHERE year(real_date) = 2017 AND real_date >=  '".$fixed_start_date."' order by invoice_id desc";
}
else{
$sql = "SELECT * FROM packing_tb WHERE year(real_date) = 2017 AND real_date BETWEEN '".$fixed_start_date."' AND '".$fixed_end_date."' order by invoice_id desc";
}



$fname = 'Packing_slip_report';

$sql; //exit;

$result = mysql_query($sql) or die(mysql_error());

require_once 'phpxlsclasses/PHPExcel.php';
$objPHPExcel = new PHPExcel();

 // Set the active Excel worksheet to sheet 0 

$objPHPExcel->setActiveSheetIndex(0);  

// Initialise the Excel row number 

$rowCount = 1;  

//start of printing column names as names of MySQL fields  

$column = 'A';
$objPHPExcel->getDefaultStyle()->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Times New Roman')
    ->setSize(11);

$sheet = $objPHPExcel->getActiveSheet();
$sheet->setTitle('Status Report');

$fieldArr = array(
	"customer" => "30|Customer", //poid
	"part_no" => "10|Part No", //cust name
	"rev" => "20|Rev", //part_no
	"podate" => "20|Po Date", 
	// "vid" => "30|Vendor Name", 
	"poid" => "10|PO#", //po
	"qty" => "15|QTY", //po
	"shiped_qty" => "10|Shipped Qty"
);

$sheet->mergeCells("A1:G1");
$sheet->getStyle('A1')->getFont()->setBold(true);
$sheet->getStyle('A1')->applyFromArray( array(
		'font' => array(
			'name' => 'Arial',
			'color' => array(
				'rgb' => '3333cc'
			),
			'size' => '18',
		),
	));

$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->setCellValue('A1', $_REQUEST['start_date']." to ".$_REQUEST['end_date']." Packing Slip Report");

$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Times New Roman')
    ->setSize(11);

$objPHPExcel->getDefaultStyle()->getFont()->setBold(false);

$rowCount++;

foreach ($fieldArr as $k => $v) {
	$tmp = explode("|", $v);
	$sheet->getStyle($column.$rowCount)
	 ->getFill()->applyFromArray( array (
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => '33ff33'),
    ) );
	//$sheet->getColumnDimension($column)->setWidth($tmp[0]);
	$sheet->getColumnDimension($column)->setAutoSize(true);
    $sheet->setCellValue($column.$rowCount, " ".$tmp[1]." ");
    $column++;
}

//end of adding column names  
//start while loop to get data  

$rowCount++;
$total_qty = 0;
while($row = mysql_fetch_assoc($result))  {  
	$val = "";
    $column = 'A';

	$poid = $row['poid'];

	if ($poid > 0) 
		$poid = $poid + 9933;
	else 
		$poid = '';

	$qty = '';

	
	//echo $sqi; exit;
	
	$column = 'A';
	
		foreach ($fieldArr as $k => $v) { 
			switch($k) {
				case 'customer':
				$sqcc = "select * from data_tb where data_id='".$row['customer']."'";
					$rescc = mysql_query($sqcc) or die('error in data');

					while($rwcc = mysql_fetch_assoc($rescc)) {
					$val = strip_tags($rwcc['c_shortname']);
					} 
					break;
				case 'part_no':
					$val = strip_tags($row['part_no']);
					break;
				case 'rev':
					$val = strip_tags($row['rev']);
					break;
				case 'podate':
					$val = strip_tags($row['podate']);
					break;
				case 'vid':
					$sql_vendor = "SELECT * FROM vendor_tb WHERE data_id = ".$row['vid'];
					$res_vendor = mysql_query($sql_vendor);
					while($row_vendor = mysql_fetch_assoc($res_vendor)){
						$val = strip_tags('hi');
					}
					$val = strip_tags('');
					break;
				case 'poid':
					$val = strip_tags($row['po']);
					break;
				case 'shiped_qty':
					$sqi = "select * from packing_items_tb where pid='".$row['invoice_id']."' order by item LIMIT 1";
				$resi = mysql_query($sqi) or die('error in data');
					while($rwi = mysql_fetch_assoc($resi)) { 
						$qty = $rwi['shipqty'];
					}
					$val = strip_tags($qty);
					break;
				case 'qty':
				$sqi = "select * from packing_items_tb where pid='".$row['invoice_id']."' order by item LIMIT 1";
				$resi = mysql_query($sqi) or die('error in data');
					while($rwi = mysql_fetch_assoc($resi)) { 
						$qty = $rwi['qty2'];
					}
					$val = strip_tags($qty);
					$total_qty = $total_qty+$qty;
					break;
				default:
					$val = "";
					break;
			}
			      
			$sheet->setCellValue($column.$rowCount, $val);
	        $column++;
	    }  
	    $rowCount++;
	    $column = 'A';
		

			


    	
	
} 
$sheet->mergeCells("A".$rowCount.":F".$rowCount);
$sheet->setCellValue('G'.$rowCount, $rowCount-3);
$sheet->setCellValue('A'.$rowCount, 'Number of Orders');
$sheet->getStyle('A'.$rowCount.':G'.$rowCount)->getFont()->setBold(true);
$rowCount++;
$sheet->mergeCells("A".$rowCount.":F".$rowCount);
$sheet->setCellValue('G'.$rowCount, $total_qty);
$sheet->setCellValue('A'.$rowCount, 'Number of pcs');
$sheet->getStyle('A'.$rowCount.':G'.$rowCount)->getFont()->setBold(true);


$styleArray = array(
  'borders' => array(
	  'allborders' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN
	  )
  )
);

$sheet->getStyle('A1:' . 
    $sheet->getHighestColumn() . 
    $sheet->getHighestRow()
)->applyFromArray($styleArray);

// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="'.$fname.'_'.date('m-d-Y').'.xls"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');