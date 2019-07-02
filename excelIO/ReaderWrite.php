<?php
/*
*	php读Excel文件，生成新文件。
*	2016-10-28
*	王卡
*/
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once '../Classes/PHPExcel.php';
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

//加载Excel文件
$objReader1 = PHPExcel_IOFactory::load("tt.xlsx");
//把内容放到多维数组中
$sheetData1 = $objReader1->getActiveSheet()->toArray(null,true,true,true);

$row1=count($sheetData1);
$col1=count($sheetData1['1']);
//var_dump($sheetData1);

//实例化对象
$objPHPExcel = new PHPExcel();
//设置生成文件的属性
$objPHPExcel->getProperties()->setCreator("PHPExcel")
							 ->setLastModifiedBy("PHPExcel")
							 ->setTitle("PHPExcel Document")
							 ->setSubject("PHPExcel Document")
							 ->setDescription("Document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
//生成文件的内容
$wrtrow=0;
$wrtcol=0;
for ($i=1; $i <= $row1; $i++) {
	$wrtrow++;
	for ($j=1; $j <= $col1; $j++) {		
		$colname=chr(ord($j)+16);
		$wrtcol++;
		$charwrtcol=chr(ord($wrtcol)+16);
		$cellvalue=$charwrtcol.$wrtrow;
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue($cellvalue, $sheetData1[$i][$colname]);
	}
	$wrtcol=0;//列数归零
}

//创建工作簿
$objPHPExcel->getActiveSheet()->setTitle('PHPExcel1');
//设置默认工作簿
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('outDate.xlsx');

?>