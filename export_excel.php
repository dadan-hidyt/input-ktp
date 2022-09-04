<?php
include 'inc/init.php';

require 'vendor/autoload.php';
if(!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

if (isset($_GET['by'])) {
    switch ($_GET['by']) {
        case 'kecamatan':
        $data = get_data_by_kecamatan(strtoupper(urldecode($_GET['kec'] ?? '')));
            break;
        case 'desa':
        $data = get_data_by_desa(strtoupper(urldecode($_GET['desa'] ?? '')));
            break;
        default:
        // $data = get_data_ktp()['data'];
            break;
    }
    # code...
} else {
    $data = get_data_ktp();
}
// $i = 0;
// foreach ($data as $value) {
// 	echo $data[$i][1];
// $i++;
// }
// echo '<pre>';
// var_dump($data);exit;
$data = $data['data'];
$objPHPExcel = new Spreadsheet();
$objPHPExcel->getDefaultStyle()
    ->getNumberFormat()
    ->setFormatCode(
        NumberFormat::FORMAT_TEXT
    );
for ($col = 'A'; $col != 'L'; $col++) {
       $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setWidth(10);

                }

                $objPHPExcel->getProperties()->setCreator("HOO")
                                                        ->setLastModifiedBy("dadan")
                                                        ->setTitle("DATA KTP")
                                                        ->setSubject("Data ktp print excel")
                                                        ->setDescription("data ktp.")
                                                        ->setKeywords("ktp export")
                                                        ->setCategory("tes");

                $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:J1');
                $objPHPExcel->getActiveSheet()->setCellValue('A1', 'DATA KTP')->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
;
                $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
                $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(23);

                $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->setFillType(Fill::FILL_SOLID);
                $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->getStartColor()->setARGB('fcba03');
                // Add some data
                $objPHPExcel->getActiveSheet()->getStyle("A2:K2")->getFont()->setBold(true);
                $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);


                //echo date('H:i:s') , " Add some data" , EOL;
                $objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A2', 'ID')
                            ->setCellValue('B2', 'NAMA LENGKAP')
                            ->setCellValue('C2', 'NIK')
                            ->setCellValue('D2', 'JK')
                            ->setCellValue('E2', 'TTL')
                            ->setCellValue('F2', 'ALAMAT')
                            ->setCellValue('G2','AGAMA')
                            ->setCellValue('H2','STATUS PERKAWINAN')
                            ->setCellValue('I2', 'PEKERJAAN')
                            ->setCellValue('J2', 'KEWARGANEGARAAN')
							->setCellValue('K2', 'TANGAAL INPUT');
                $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);
                $n = 0;
                $i =3;
                foreach($data AS $item)
                {
                    $objPHPExcel->getActiveSheet()->getStyle('A'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('B'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('C'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('D'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('E'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('F'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('G'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('H'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    $objPHPExcel->getActiveSheet()->getStyle('I'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
					$objPHPExcel->getActiveSheet()->getStyle('J'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                        $objPHPExcel->getActiveSheet()->getStyle('K'.$i.'')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                    // Miscellaneous glyphs, UTF-8
                    $objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$i, $data[$n][0])
                            ->setCellValue('B'.$i, $data[$n][1])
                            ->setCellValue('C'.$i, "\t".$data[$n][2])
                            ->setCellValue('D'.$i, $data[$n][3])
                            ->setCellValue('E'.$i, $data[$n][4])
                            ->setCellValue('F'.$i, $data[$n][5])
                            ->setCellValue('G'.$i, $data[$n][6])
                            ->setCellValue('H'.$i, $data[$n][7])
                            ->setCellValue('I'.$i, $data[$n][8])
                            ->setCellValue('J'.$i, $data[$n][9])
                            ->setCellValue('K'.$i, $data[$n][10]);
                    $i++;
					$n++;
                }

$writer = new Xlsx($objPHPExcel);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header ('Content-Disposition: attachment; filename="'.'printout-'.date('y-m-d-h:i:s').'.xlsx"');
$writer->save('php://output');
?>