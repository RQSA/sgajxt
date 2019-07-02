<?php error_reporting( E_ALL&~E_NOTICE );?>
<?php
	
	require("../conn.php");
	$sjc1=$_GET["sjc1"];
	$sjc = array();
	$sjc = explode(',', $sjc1);
	
header('content-type:text/html;charset=utf-8');
//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
//	$styleTable = array('borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12);
//	array('valign'=>'center', 'align'=>'center') = array('valign'=>'center', 'align'=>'center');  
//	$fontStyle = array('size'=>10 /*,'bold'=>true*/); 
	for($j=0;$j<count($sjc);$j++){
	$sql = "SELECT * FROM `实测实量数据` WHERE `时间戳` = '".$sjc[$j]."' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
			$gcmc=$row["工程名称"]; 
        	$fxgc=$row["分项工程名称"];
        }
           
//标题
	$section->addText("现浇混凝土结构观感质量及尺寸偏差检验批验收记录表", array	('size'=>18, 	'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(1);

//表格
	$table = $section->addTable();
	
//	表格第一行
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF','cellMargin'=>12))->addtext('单位（子单位）', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($gcmc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	$table -> addRow(300);
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($fxgc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));

//	表格第二行
	$table -> addRow(300);
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('分项工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($fxgc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	

//	表格第三行
	 
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 记录表类型='现浇混凝土结构观感质量及尺寸偏差' and 检查内容='现浇混凝土-垂直度'";					                   
			    $result = $conn->query($sql);
				$d=array();
				$d1=array();
				 while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$d[0]=$row['D1'];
					                   		$d[1]=$row['D2'];
					                   		$d[2]=$row['D3'];
					                   		$d[3]=$row['D4'];
					                   		$d[4]=$row['D5'];
					                   		$d[5]=$row['D6'];
					                   		$d[6]=$row['D7'];
					                   		$d[7]=$row['D8'];
					                   		$d[8]=$row['D9'];
					                   		$d[9]=$row['D10'];
					                   		$d1[0]=$row['状态1'];
					                   		$d1[1]=$row['状态2'];
					                   		$d1[2]=$row['状态3'];
					                   		$d1[3]=$row['状态4'];
					                   		$d1[4]=$row['状态5'];
					                   		$d1[5]=$row['状态6'];
					                   		$d1[6]=$row['状态7'];
					                   		$d1[7]=$row['状态8'];
					                   		$d1[8]=$row['状态9'];
					                   		$d1[9]=$row['状态10'];
					                   		
					                   		
					                   }
	
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart', 'valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF','cellMargin'=>12))->addtext('垂直', array('size'=>15, 'bold'=>false),array( 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('层', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≦6m', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('10mm', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	if($d1[0]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($d1[1]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[2]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[3]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[4]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[5]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[6]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[7]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[8]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[9]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('度', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('高', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
//	表格第四行

			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 检查内容='现浇混凝土-表面平整度'";					                   
			    $result = $conn->query($sql);
				$d=array();
				 while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$d[]=$row['D1'];
					                   		$d[]=$row['D2'];
					                   		$d[]=$row['D3'];
					                   		$d[]=$row['D4'];
					                   		$d[]=$row['D5'];
					                   		$d[]=$row['D6'];
					                   		$d[]=$row['D7'];
					                   		$d[]=$row['D8'];
					                   		$d[]=$row['D9'];
					                   		$d[]=$row['D10'];
					                   		$d1[0]=$row['状态1'];
					                   		$d1[1]=$row['状态2'];
					                   		$d1[2]=$row['状态3'];
					                   		$d1[3]=$row['状态4'];
					                   		$d1[4]=$row['状态5'];
					                   		$d1[5]=$row['状态6'];
					                   		$d1[6]=$row['状态7'];
					                   		$d1[7]=$row['状态8'];
					                   		$d1[8]=$row['状态9'];
					                   		$d1[9]=$row['状态10'];
					                   }
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart', 'valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF','cellMargin'=>12))->addtext('表面平', array('size'=>15, 'bold'=>false),array( 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('允许偏', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('8mm', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	if($d1[0]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($d1[1]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[2]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[3]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[4]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[5]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[6]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[7]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[8]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[9]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('整度', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('差', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
//	表格第五行

			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and 检查内容='现浇混凝土-截面尺寸'";				                   
			    $result = $conn->query($sql);
				$d=array();
				 while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$d[]=$row['D1'];
					                   		$d[]=$row['D2'];
					                   		$d[]=$row['D3'];
					                   		$d[]=$row['D4'];
					                   		$d[]=$row['D5'];
					                   		$d[]=$row['D6'];
					                   		$d[]=$row['D7'];
					                   		$d[]=$row['D8'];
					                   		$d[]=$row['D9'];
					                   		$d[]=$row['D10'];
					                   		$d1[0]=$row['状态1'];
					                   		$d1[1]=$row['状态2'];
					                   		$d1[2]=$row['状态3'];
					                   		$d1[3]=$row['状态4'];
					                   		$d1[4]=$row['状态5'];
					                   		$d1[5]=$row['状态6'];
					                   		$d1[6]=$row['状态7'];
					                   		$d1[7]=$row['状态8'];
					                   		$d1[8]=$row['状态9'];
					                   		$d1[9]=$row['状态10'];
					                   }
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart', 'valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF','cellMargin'=>12))->addtext('截面尺', array('size'=>15, 'bold'=>false),array( 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('允许偏', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('+10，-5', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	if($d1[0]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($d1[1]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[2]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[3]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[4]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[5]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[6]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[7]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[8]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],  array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}if($d1[9]==0)
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(500,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9], array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	$table -> addRow(500);
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('寸', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>12))->addtext('差', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(8);
	}
	
	//
	
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text3.docx');
     //下载
	$file_name = "text3.docx"; 
//	$file_dir = "phpword/"; 
	echo $file_dir;
    if (!file_exists($file_dir . $file_name)) { //检查文件是否存在 
           echo "文件找不到"; 
           exit; 
     } else { 
           $file = fopen($file_dir . $file_name,"r"); // 打开文件 
// 输入文件标签 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($file_dir . $file_name)); 
	Header("Content-Disposition: attachment; filename=" . $file_name); 
// 输出文件内容 
    echo fread($file,filesize($file_dir . $file_name)); 
    fclose($file); 
exit;} 	
	
	
	
	$conn->close();	
	
	

	
?>
