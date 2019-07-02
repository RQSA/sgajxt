<?php
header('content-type:text/html;charset=utf-8');
	
	//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
	$PHPWord->setDefaultFontName('仿宋'); 
	$PHPWord->setDefaultFontSize(10);
	$styleTable = array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>15);
	$styleCell = array('textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR,'valign'=>'center', 'align'=>'center');  
	$fontStyle = array('size'=>10 /*,'bold'=>true*/);  
	$section = $PHPWord->createSection();
	//标题
	$section->addText('韶关一建隐患整改通知单', array('size'=>15, 'bold'=>true),$styleCell);
	$section->addText('公司对项目', array('size'=>10, 'bold'=>true),$styleCell);
	//  表格
	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable);
	$table = $section->addTable('myOwnTableStyle');
    $table -> addRow(400);
    $table -> addCell(5000)->addtext('检查单位/部门', array('bold'=>true),$styleCell);
    $table -> addCell(4000)->addtext('', $styleCell);
    $table -> addCell(1000)->addtext('检查日期', array('bold'=>true),$styleCell);
    $table -> addCell(2500)->addtext( '$sjc1' , $styleCell);
    
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'restart'))->addtext('巡                   查                人              员',array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('姓名', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('单位/部门', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('职务',  array('bold'=>true),$styleCell);
	$table -> addCell(4100)->addtext('检查部门',array('bold'=>true), $styleCell);
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('', $styleCell);
	$table -> addCell(1250)->addtext('1', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('1',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('1', array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'restart'))->addtext('1',array('bold'=>true),$styleCell );
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('', array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('2',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('2', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('2',  array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'fusion'))->addtext('2',array('bold'=>true), $styleCell);
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('',  array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('3', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('3', array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('3', array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'fusion'))->addtext('3', array('bold'=>true),$styleCell);
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('',  array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('4',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('4',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('4',  array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'fusion'))->addtext('4',  array('bold'=>true),$styleCell);
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('',  array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('5',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('5',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('5',  array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'fusion'))->addtext('5',  array('bold'=>true),$styleCell);
	$table -> addRow(300);
	$table -> addCell(1250,array('vMerge' => 'fusion'))->addtext('',  array('bold'=>true),$styleCell);
	$table -> addCell(1250)->addtext('6',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('6',  array('bold'=>true),$styleCell);
	$table -> addCell(1700)->addtext('0',  array('bold'=>true),$styleCell);
	$table -> addCell(4100,array('vMerge' => 'fusion'))->addtext('6',  array('bold'=>true),$styleCell);
	 
	$table -> addRow(600);
    $table -> addCell(1250)->addtext('受检查单位/项目',  array('bold'=>true),$styleCell);
    $table -> addCell(2950)->addtext('',  array('bold'=>true),$styleCell);
    $table -> addCell(1700)->addtext('受检查单位/（项目）负责人签名', array('bold'=>true),$styleCell);
    $table -> addCell(4100)->addtext('', array('bold'=>true),$styleCell);
	
	$table -> addRow(5500);
    $table -> addCell(1250)->addtext('检查情况',  array('bold'=>true),$styleCell);
    $table -> addCell(8750)->addtext('', array('bold'=>true),$styleCell);
    
    $table -> addRow(600);
    $table -> addCell(1250)->addtext('整改要求',  array('bold'=>true),$styleCell);
    $table -> addCell(8750)->addtext('',  array('bold'=>true),$styleCell);
    
    $table -> addRow(600);
    $table -> addCell(1250)->addtext('整改情况',  array('bold'=>true),$styleCell);
    $table -> addCell(8750)->addtext('', array('bold'=>true),$styleCell);
    
    $table -> addRow(600);
    $table -> addCell(1250)->addtext('分公司复查意见', array('bold'=>true),$styleCell);
    $table -> addCell(8750)->addtext('', array('bold'=>true),$styleCell);
    
    $table -> addRow(600);
    $table -> addCell(1250)->addtext('分公司总部复查意见', array('bold'=>true),$styleCell);
    $table -> addCell(8750)->addtext('', array('bold'=>true),$styleCell);
    //页脚
//  $footer = $section->createFooter()->addtext('注：复查后将整改资料作为附件，一式三份，安全监管部、分公司、项目部各留一份存档。', array('bold'=>true), array('align'=>'left'));
	
	
	//标题-----表二
	$PHPWord->setDefaultFontSize(10);
    $section = $PHPWord->createSection();
	$section->addText('安全隐患整改回复', array('size'=>22, 'bold'=>true),$styleCell);
	$section->addText('工程名称：', array( 'bold'=>true), array('align'=>'left'));
	//表格
	$styleTable = array('alignMent'=>'center','borderSize'=>8, 'borderColor'=>'000000', 'cellMarginTop'=>60, 'cellMarginLeft'=>60, 'cellMarginRight'=>60, 'cellMarginBottom'=>60);
	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable);
    $table = $section->addTable('myOwnTableStyle');
	$table -> addRow(10000);
    $table -> addCell(10000)->addtext('致：', array('bold'=>true), array('align'=>'left'));
    $table -> addRow(3000);
    $table -> addCell(10000)->addtext('公司复查意见：',array('bold'=>true),  array('align'=>'left'));
    
    //图片
//  $imageStyle = array('width'=>350, 'height'=>350, 'align'=>'left');
//  $section->addImage('H.JPEG', $imageStyle);
	$imag="http://127.0.0.1:8082/hxajxt/phpword/H.JPEG";
    $section->addMemoryImage($imag,array('width'=>275,'height'=>265));
//	
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text.docx');
    
    
    
    
    //下载
//	$file_name = "text.docx"; 
////	$file_dir = "phpword/"; 
//	echo $file_dir;
//  if (!file_exists($file_dir . $file_name)) { //检查文件是否存在 
//         echo "文件找不到"; 
//         exit; 
//   } else { 
//         $file = fopen($file_dir . $file_name,"r"); // 打开文件 
//// 输入文件标签 
//	Header("Content-type: application/octet-stream"); 
//	Header("Accept-Ranges: bytes"); 
//	Header("Accept-Length: ".filesize($file_dir . $file_name)); 
//	Header("Content-Disposition: attachment; filename=" . $file_name); 
//// 输出文件内容 
//  echo fread($file,filesize($file_dir . $file_name)); 
//  fclose($file); 
//exit;} 
?>