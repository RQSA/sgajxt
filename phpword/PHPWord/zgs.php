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
	
	
	
	
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text2.docx');
?>