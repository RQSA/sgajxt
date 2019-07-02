<?php
/*
*	php写Excel。
*	2016-10-27。
*	王卡
*/

//错误报告
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
//包含文件
require_once '../Classes/PHPExcel.php';

//创建 PHPExcel对象
echo date('H:i:s') , " 创建 PHPExcel对象" , EOL;
$objPHPExcel = new PHPExcel();

//创建文档属性
echo date('H:i:s') , " 创建文档属性" , EOL;
$objPHPExcel->getProperties()->setCreator("PHPExcel")
							 ->setLastModifiedBy("PHPExcel")
							 ->setTitle("PHPExcel Document")
							 ->setSubject("PHPExcel Document")
							 ->setDescription("Document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");

//添加数据
echo date('H:i:s') , " 添加数据" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '1')
			->setCellValue('B1', '2')           
            ->setCellValue('C1', '3')
			
			->setCellValue('A2', '小王')
			->setCellValue('B2', '小张')           
            ->setCellValue('C2', '小李');           

//创建工作簿
echo date('H:i:s') , " 创建工作簿" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('PHPExcel1');

//设置默认工作簿
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
echo date('H:i:s') , " 保存  Excel 2007 格式(.xlsx)" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " 文件名 " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo date('H:i:s') ,' 写入工作簿时间是 ' , sprintf('%.4f',$callTime) , " 秒" , EOL;
// Echo memory usage
echo date('H:i:s') , ' 当前内存使用情况: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

// Save Excel5 file
echo date('H:i:s') , " 保存 Excel5 格式(.xls)" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " 文件名 " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo date('H:i:s') ,' 写如工作簿时间是 ' , sprintf('%.4f',$callTime) , " 秒" , EOL;
// Echo memory usage
echo date('H:i:s') , ' 当前内存使用情况: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo memory peak usage
echo date('H:i:s') , " 内存使用峰值: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " 文件写入成功" , EOL;
echo '文件创建路径： ' , getcwd() , EOL;

?>