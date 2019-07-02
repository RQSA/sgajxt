<?php
/*
*	php读写Excel。
*	2016-10-27。
*	王卡
*/
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
//date_default_timezone_set('Europe/London');

/** Include PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

if (!file_exists("Write.xlsx")) {
	exit("请先运行 Write.php" . EOL);
}

echo date('H:i:s') , " 加载  Excel2007 格式文件" , EOL;
$callStartTime = microtime(true);

$objPHPExcel = PHPExcel_IOFactory::load("Write.xlsx");

$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo date('H:i:s') ,' 读工作簿时间是 ' , sprintf('%.4f',$callTime) , " 秒" , EOL;

// 当前内存使用情况
echo date('H:i:s') , ' 当前内存使用情况: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;

echo date('H:i:s') , " 写  Excel 2007 格式(.xlsx)" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " 新文件名 " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo date('H:i:s') , ' 写入工作簿时间是 ' , sprintf('%.4f',$callTime) , " 秒" , EOL;
// 当前内存使用情况
echo date('H:i:s') , ' 当前内存使用情况: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// 内存使用峰值
echo date('H:i:s') , " 内存使用峰值: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " 文件写入成功" , EOL;
echo '文件创建路径 ' , getcwd() , EOL;
?>