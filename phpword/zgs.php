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
	
	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable);
	$table = $section->addTable('myOwnTableStyle');
    $table -> addRow(400);
    $table -> addCell(5000)->addtext('检查单位/部门', array('bold'=>true),$styleCell);
    $table -> addCell(4000)->addtext('', $styleCell);
    $table -> addCell(1000)->addtext('检查日期', array('bold'=>true),$styleCell);
    $table -> addCell(2500)->addtext( '$sjc1' , $styleCell);
    $table = $section->addTable('myOwnTableStyle');
    $table -> addRow(400);
    $table -> addCell(2500)->addtext('检查单位/部门', array('bold'=>true),$styleCell);
    $table -> addCell(2500)->addtext('', $styleCell);
    $table -> addCell(1250)->addtext('检查日期', array('bold'=>true),$styleCell);
    $table -> addCell(1250)->addtext( '$sjc1' , $styleCell);
     $table -> addCell(5000)->addtext( '$sjc1' , $styleCell);
	
	
	
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text2.docx');
?>