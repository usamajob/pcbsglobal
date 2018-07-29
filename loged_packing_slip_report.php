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




	$sql = "SELECT * FROM packing_tb_loged ORDER BY id DESC";


//echo $sql;

$fname = 'Receiving Log';

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
	"customer" => "25|  Customer  ", //poid
	"part_no" => "30|  Part No  ", //cust name
	"rev" => "5|Rev", //part_no
	"supplier" => "15|Supplier", //part_no
	"RecdOn" => "11|Rec'd On", //po
	"OTD" => "7|OTD", 
	"CustomerPO" => "15|Customer PO", 
	"CustDueDate" => "11|Cus D/D", //po
	"QTYOrdered" => "10|Qty Ord", //po
	"QTYRec" => "10|Qty Rec", //po
	"QTYDue" => "10|Qty Due", //po
	"qty_shipped" => "10|Ship Qty", //po
	"Shippedon" => "11|Shipped on", //po
	"QTYInsp" => "10|Qty Insp", //po
	"QTYPassed" => "10|Pass Qty", //po
	"InspectedBy" => "10|Insp By", //po
	"SolderSample" => "7|S/S", //po
	"NCR" => "7|NCR", //po
	"Comment" => "50|Comment", //po
);

$sheet->mergeCells("A1:S1");
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
$sheet->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

// $sheet->setCellValue('A1', "Receiving Log ".date("m-d-Y"));
$sheet->getRowDimension('1')->setRowHeight(80);



$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('header_logo');
$objDrawing->setDescription('Header_Logo');
$objDrawing->setPath('img/updated_header_logo.png');
$objDrawing->setCoordinates('A1');                      
//setOffsetX works properly
$objDrawing->setOffsetX(0); 
$objDrawing->setOffsetY(0);                
//set width, height
$objDrawing->setWidth(200); 
$objDrawing->setHeight(100); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// $sheet->setCellValue('A1', "Receiving Log ");


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
	 $sheet->getColumnDimensionByColumn($column)->setAutoSize(false);
	$sheet->getColumnDimension($column)->setWidth($tmp[0]);
	// $sheet->getColumnDimension($column)->setAutoSize(true);
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

	$sqi = "select * from items_tb where pid='".$row['poid']."' order by item LIMIT 1";
	//echo $sqi; exit;
	
	$column = 'A';
	$resi = mysql_query($sqi) or die('error in data');
	while($rwi = mysql_fetch_assoc($resi)) { 
		$qty = $rwi['qty2'];
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
				case 'supplier':
					$sql_vendor = "SELECT * FROM vendor_tb WHERE data_id = ".$row['supplier'];
					$res_vendor = mysql_query($sql_vendor);
					$vendor = '';
					while($row_vendro = mysql_fetch_assoc($res_vendor)){
						$vendor = $row_vendro['c_shortname'];
					}
					$val = strip_tags($vendor);
					break;
				case 'rev':
					$val = strip_tags($row['rev']);
					break;
				case 'RecdOn':
					$val = strip_tags($row['rec_on']);
					break;
				case 'OTD':
					$val = strip_tags($row['otd']);
					break;
				case 'CustomerPO':
					$val = strip_tags($row['customer_po']);
					break;
				case 'CustDueDate':
					$a = explode("-", $row['cus_due_date']);
    				$rec_on = $a[1]."/".$a[2]."/".$a[0];
					$val = strip_tags($rec_on);
					break;
				case 'QTYOrdered':
					$val = strip_tags($row['qty_ordered']);
					break;
				case 'QTYRec':
					$val = strip_tags($row['qty_rec']);
					break;
				case 'QTYDue':
					$val = strip_tags($row['qty_due']);
					break;
				case 'qty_shipped':
					$val = strip_tags($row['qty_shipped']);
					break;
				case 'Shippedon':
					$a = explode("-", $row['shipped_on']);
    				$rec_on = $a[1]."/".$a[2]."/".$a[0];
					$val = strip_tags($rec_on);
					break;
				case 'QTYInsp':
					$val = strip_tags($row['qty_insp']);
					break;
				case 'QTYPassed':
					$val = strip_tags($row['qty_passed']);
					break;
				case 'InspectedBy':
					$val = strip_tags($row['inspected_by']);
					break;
				case 'SolderSample':
					$val = strip_tags($row['solder_sample']);
					break;
				case 'NCR':
					$val = strip_tags($row['ncr']);
					break;
				case 'Rev_level':
					$val = strip_tags($row['rev_level']);
					break;
				case 'Comment':
					$val = strip_tags($row['comment']);
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

} 
$rowCount++;
$sheet->mergeCells("A".$rowCount.":S".$rowCount);
$sheet->getStyle("A".$rowCount)
->getFill()->applyFromArray( array (
	'type'       => PHPExcel_Style_Fill::FILL_SOLID,
	// 'startcolor' => array('rgb' => '99CCFF'),
) );

$sheet->getStyle('A'.$rowCount)->getFont()->setBold(true);
$sheet->setCellValue('A'.$rowCount, 'FM 8.4.2 Rev 1.0 Receiving Log');



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