<?php require_once('chksess.php'); ?>
<?php require_once('conn.php');

function frmt_datestr($dd) {
	$dd_parts = explode('/', $dd);
	return $dd_parts[2] . '-' . $dd_parts[0] . '-' . $dd_parts[1];
}

$wherearr = array();
$wherestr = " (p.status <> 'hide' AND ( i.status <> 'hide' OR i.status is null ) ) "; //i.invoice_id is null AND 
//
if(isset($_GET['srchv']) && trim($_GET['srchv']) != "") {

	$st_date = frmt_datestr(trim($_GET['st_date']));
	$en_date = frmt_datestr(trim($_GET['en_date']));
	$part_no = trim($_GET['srchpn']);
	$customer = trim($_GET['srchc']);
	$vendor = trim($_GET['srchv']);

	if (strlen($st_date) > 2 && strlen($en_date) > 2) {
		$wherearr[] = "
		( unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) >=  unix_timestamp('" . $st_date . "')  
		AND unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) <=  unix_timestamp('" . $en_date . "'))";
	}

	if(strlen($part_no) > 1)
		$wherearr[] = " p.part_no = '".$part_no."'";

	if(strlen($customer) > 1)
		$wherearr[] = " p.customer = '".$customer."'";

	if(strlen($vendor) > 1)
		$wherearr[] = " v.c_shortname = '".$vendor."'";

	if(count($wherearr) > 0) 
		$wherestr .= " AND ".implode(' AND ', $wherearr);

	$sql = "select p.allow,p.po, p.poid, p.customer, p.part_no, p.rev, p.date1, i.invoice_id, unix_timestamp(str_to_date(substr(p.date1, locate('-', p.date1)+1), '%m-%d-%Y')) as del_date 
	from porder_tb p
	LEFT JOIN invoice_tb i on
	(p.customer = i.customer AND p.part_no = i.part_no AND p.rev = i.rev AND p.po = i.po)
	LEFT JOIN vendor_tb v on v.data_id = p.vid
	where ".$wherestr." AND cancel = 0 group by p.poid
	order by del_date";
	
	/*from porder_tb b
	LEFT JOIN vendor_tb v on  v.data_id = b.vid 
	LEFT JOIN packing_tb p on (p.rev = b.rev and p.po = b.po and p.part_no = b.part_no)
	where*/

	$fname = $vendor;
}

//echo $sql; //exit;

/*if ($_REQUEST['stdate'] != ""  && $_REQUEST['endate'] != "") {
	$sql = "select distinct b.po, b.poid, b.customer, b.part_no, b.rev, b.date1, c.invoice_id, b.allow, c.ord_by, unix_timestamp(str_to_date(substr(b.date1, locate('-', b.date1)+1), '%m-%d-%Y')) as del_date 
	from porder_tb b
	LEFT OUTER JOIN invoice_tb c on (b.part_no = c.part_no and b.po = c.po)
	where ( unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) >=  unix_timestamp('" . $_REQUEST['stdate'] . "')  
	and unix_timestamp(str_to_date(substr(b.date1,locate('-',b.date1)+1),'%m-%d-%Y')) <=  unix_timestamp('" . $_REQUEST['endate'] . "')  ) order by del_date";

	$fname = $_REQUEST['stdate']."to".$_REQUEST['endate'];
}*/

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
$sheet->setTitle('WIP');

$fieldArr = array(
	"po" => "10|PO#", //po
	"custpo" => "10|Cust. PO",
	"custname" => "30|Customer Name", 
	"custpn" => "25|Cust. P/N", //part_no
	"rev" => "15|Rev", 
	"dockdate" => "20|Dock Date", 
	"ship_date" => "10|Ship Date", 
	"qty" => "15|Order Qty", 
	"wip" => "8|     WIP     ", 
	"shipto" => "20| Ship To ", 
	"shipvia" => "15|Ship Via", 
	"sppn" => "15|Ship Qty",
	"working_tools" => "20|Working Tool",  
	"note" => "10|           Note         ", 
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
$sheet->setCellValue('A1', " ".$fname ." WIP");

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

$prev_dockdate = "";

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
	while($rwi = mysql_fetch_assoc($resi)) { 
		$qty = $rwi['qty2'];
	}

	if($prev_dockdate != $row['date1'] && $rowCount > 3) {		

		for($j = 1; $j <= count($fieldArr); $j++)  {  
			$sheet->getStyle($column.$rowCount)
			->getFill()->applyFromArray( array (
				'type'       => PHPExcel_Style_Fill::FILL_SOLID,
				'startcolor' => array('rgb' => '99CCFF'),
			) ); 
			$column++;
		}
		$rowCount++;
	}

	/*$sqs1 = "select * from data_tb where c_name='" . $row['customer'] . "'";
	$res1 = mysql_query($sqs1) or die('error in data');
	$rws1 = mysql_fetch_assoc($res1);
	//$rws1['c_shortname'] //cust name

	$sql_pack = "SELECT p.po FROM packing_tb p WHERE  p.rev='".$row['rev']."' and p.part_no='".$row['part_no']."' and p.po='".$row['po']."'";
	$res_pack = mysql_query($sql_pack) or die(mysql_error());
	$row_pack = mysql_fetch_assoc($res_pack);
	$ypo = $row_pack['po']; // cust po*/

	//$row['date1'] dock date

	$column = 'A';
	foreach ($fieldArr as $k => $v) { 
		switch($k) {
			case 'po':
				$val = strip_tags($poid);
				break;
			case 'custpo':
				$val = strip_tags($row['po']);
				break;
			case 'custname':
				$val = strip_tags($row['customer']);
				break;
			case 'custpn':
				$val = strip_tags($row['part_no']);
				break;
			case 'rev':
				$val = strip_tags($row['rev']);
				break;
			case 'dockdate':
				$val = strip_tags($row['date1']);
				break;
			case 'qty':
				$val = strip_tags($qty);
				break;
			case 'working_tools':
				if($row['allow']=='false' || $row['allow']==''){
					$val = "Provide ASAP";
				}
				

				break;
			default:
				$val = "";
				break;
		}
		      
		$sheet->setCellValue($column.$rowCount, $val);
        $column++;
    }  

    $rowCount++;	
	
	$prev_dockdate = $row['date1'];
} 

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
header('Content-Disposition: attachment;filename="'.$fname.'_'.date('m-d-Y').'_wip.xls"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');