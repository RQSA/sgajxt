<?php
	/*
	*	php读取Excel内容，把内容json格式化。
	*	2016-10-2。
	*	王卡
	*/
	// 关闭错误报告
	error_reporting(0);
	// 报告所有错误
	//error_reporting(E_ALL);
	set_time_limit(0);
	//date_default_timezone_set('Europe/London');
	/** Include path **/
	set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');
	//IOFactory类
	include '../Classes/PHPExcel/IOFactory.php';
	
	//路径+文件名称
	$inputFileName = '../excelFile/xxb.xls';
	//echo '加载文件 ：',pathinfo($inputFileName,PATHINFO_BASENAME);
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	//echo '<hr />';
	//把excel里面内容存入数组$sheetData中
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//var_dump($sheetData);
	$row=count($sheetData);	//行数
	$col=count($sheetData['1']);	//列数
	//echo "行：".$row."列".$col;
	//echo '<hr />';
	$date='{';
	//$head='{';
	for ($i=2; $i <= $row; $i++) { 
		for ($j=1; $j <= $col; $j++) { 
			$colname=chr(ord($j)+16);	//列数"1,2,3..."转化为字母"A,B,C..."
			//echo $sheetData[$i][$colname];
			$date=$date.'"'.$sheetData[1][$colname].'":"'.$sheetData[$i][$colname].'",';
		}
		$date=$date.'"行":"'.$i.'"},{';
		//$head=$head.'"'.$i.'":"'.$sheetData[][A].'"'.;
	}
	$date=$date.'"FileName":"'.$inputFileName.'"}';
	//数据json格式化
	$json = '['.$date.']';
	echo $json;

?>
