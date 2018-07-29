<?php require_once('chksess.php'); ?>
<?php require_once('conn.php');

ini_set('memory_limit', '400M');

function frmt_datestr($dd) {
	$dd_parts = explode('/', $dd);
	return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
}

$wherearr = array();
// $wherestr = " (p.cancel <> 1 AND p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) ";
$wherestr = " (p.cancel <> 1 AND p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) ";

$st_date = frmt_datestr(trim($_GET['st_date']));
$en_date = frmt_datestr(trim($_GET['en_date']));
$part_no = trim($_GET['srchpn']);
$customer = trim($_GET['srchc']);
$vendor = trim($_GET['srchv']);


if (strlen($st_date) > 2 && strlen($en_date) > 2) {
	/*$wherearr[] = "
	( unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')
	AND unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "')  )
	AND (i.podate is null or i.podate='')";*/

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


if( isset($_GET['withinv']) ) {
	if( $_GET['withinv'] == 'yes' ){
		$wherearr[] = " i.invoice_id is not null ";
	}
	if( $_GET['withinv'] == 'no' ) {
		$wherearr[] = " i.invoice_id is null ";
	}
}

if( isset($_GET['tbd']) && $_GET['tbd'] == '1') {
	$wherearr[] = " p.po like 'TBD' ";
}

if(count($wherearr) > 0)
	$wherestr .= " AND ".implode(' AND ', $wherearr);

$sql = "select p.allow,p.po, p.poid, p.customer, p.part_no, p.rev, p.date1,p.dweek,p.note,p.cus_due,p.supli_due, i.invoice_id,v.c_shortname vc
	from porder_tb p
	LEFT JOIN invoice_tb i on
	(p.customer = i.customer AND p.part_no = i.part_no AND p.rev = i.rev AND p.po = i.po)
	LEFT JOIN vendor_tb v on v.data_id = p.vid
	where ".$wherestr." AND cancel = 0 group by p.poid
	";

$fname = 'Status_Report';

//echo $sql; exit;

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
$sheet->setTitle(date('m-d-Y ').'Status Report');

$fieldArr = array(
	//"poid" => "10|Ord#", //poid
	"Rec#"=>"5|Rec#",
	"custname" => "5|Customer", //cust name
	"pn" => "10|Part Number", //part_no
	"rev" => "15|Rev",
	// "dweek" => "15|Due Date",
	"qty" => "15|Qty",
	"custpo" => "10|Cust. PO",
	"po" => "10|Our PO", //po
	"vendor" => "15|Vendor", //po
	"working_tools" => "20|Working Tool",
	"cus_due"=>"10|Cust D/D",
	"sup_due"=>"10|Exp Dock",
	"note" => "60|                                 Notes                                 ",
);

$sheet->mergeCells("A1:H1");
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
$sheet->setCellValue('A1', date('m-d-Y')." Status Report ");

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

$prevrow = '';
$dweek = '';
$numrows = 0;
$venderName = '';


while($row = mysql_fetch_assoc($result))  {
	$val = "";
    $column = 'A';

	$poid = $row['poid'];

	if ($poid > 0)
		$poid = $poid + 9933;
	else
		$poid = '';

	$qty = '';

	$sqi = "select * from items_tb where pid='".$row['poid']."' order by item limit 1";
	//echo $sqi; exit;
	$resi = mysql_query($sqi) or die('error in data');
	$noROW = mysql_num_rows($resi);



	$sqlcustomer = "select * from data_tb where c_name='".$row['customer'] . "' LIMIT 1";
			$rescustomer = mysql_query($sqlcustomer) or die('error in data');
			$rowcustomer = mysql_fetch_assoc($rescustomer);



	while($rwi = mysql_fetch_assoc($resi)) {
		$qty = $rwi['qty2'];
	}



	if($venderName != $row['vc'] && $rowCount > 3) {

		$sheet->mergeCells("A".$rowCount.":K".$rowCount);
		$sheet->getStyle("A".$rowCount)
		->getFill()->applyFromArray( array (
			'type'       => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array('rgb' => '99CCFF'),
		) );
		$rowCount++;

	}

	$column = 'A';

	$currrow = strip_tags($row['poid']).strip_tags($row['po']).strip_tags($poid).strip_tags($row['customer']).strip_tags($row['vc']).strip_tags($row['part_no']).strip_tags($row['rev'])
	.strip_tags($row['dweek']).strip_tags($qty).strip_tags($row['note']);

	if($currrow != $prevrow) {
		$rowNumber = 1;
		$formula = "IF(B26<>'',MAX(INDIRECT('A1:A'&ROW()-1))+1,'')";
		foreach ($fieldArr as $k => $v) {
			switch($k) {
				/*case 'poid':
					$val = strip_tags($row['poid']);
					break;*/
				case 'Rec#':
					if($row['po']!= null){

					}
					break;
				case 'custpo':
					$val = strip_tags($row['po']);
					break;
				case 'po':
					$val = strip_tags($poid);
					break;
				case 'custname':
					$val = strip_tags($rowcustomer['c_shortname']);
					break;
				case 'vendor':
					$val = strip_tags($row['vc']);
					break;
				case 'pn':
					$val = strip_tags($row['part_no']);
					break;
				case 'rev':
					$val = strip_tags($row['rev']);
					break;
				/*case 'dweek':
					$val = strip_tags($row['dweek']);
					break;*/
				case 'qty':
					$val = strip_tags($qty);
					break;
				case 'note':
					$val = strip_tags($row['note']);
					break;
				case 'working_tools':
					if($row['allow']=='false' || $row['allow']==''){
						$val = "Pending";
					}else{
						$val = "Received";
					}
					break;
				case 'cus_due':
					$val = strip_tags($row['cus_due']);
					break;
				case 'sup_due':
					$val = strip_tags($row['supli_due']);
					break;
				default:
					$val = "";
					break;

			}
			$rowNumber++;
			$sheet->setCellValue($column.$rowCount, $val);

			$column++;
		}
		$rowCount++;

		$numrows++;
	}

	$prevrow = $currrow;

	$venderName = $row['vc'];
}
$sheet->mergeCells("A".$rowCount.":K".$rowCount);
$sheet->getStyle("A".$rowCount)
->getFill()->applyFromArray( array (
	'type'       => PHPExcel_Style_Fill::FILL_SOLID,
	'startcolor' => array('rgb' => '99CCFF'),
) );
$rowCount++;
$sheet->getStyle('K'.$rowCount)->getFont()->setBold(true);
$sheet->setCellValue('K'.$rowCount, $numrows.' Records');

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

// Redirect output to a client�s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$fname.'_'.date('m-d-Y').'.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
