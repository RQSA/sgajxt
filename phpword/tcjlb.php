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

	
	for($n=0;$n<count($sjc);$n++){
	$sql = "SELECT * FROM `实测实量数据` WHERE `时间戳` = '$sjc[$n]'and 记录表类型='填充墙砌体工程'";
	$result = $conn->query($sql);
	$nr = array();
	$j=0;
	while($row = $result->fetch_assoc()) {
			$gcmc=$row["工程名称"]; 
        	$fxgc=$row["分项工程名称"];
			$nr[$j] = $row["检查内容"];
			$j++;
        }
	$leixin1 = explode("-", $nr[0]);
	$leixin2 = explode("-", $nr[1]);

//标题
  
	$section->addText("填充墙砌体工程检验批质量验收记录表".$leixin[1], array('size'=>20, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$section->addText('');
	
//  表格

//表格第一行
	$table = $section->addTable();
	$table -> addRow(1500);
	$table -> addCell(1400,array('cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('单位（子单位）工程名称', array('size'=>15, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($gcmc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
//表格第二行
	$table -> addRow(1000);
	$table -> addCell(1400,array('cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('分项工程名称', array('size'=>15, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($fxgc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
//表格第三行
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$n]' and 检查内容='填充墙砌体-墙面垂直度≤3m、≤5mm' ";					                   
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
											$c1=$row['状态1'];
					                   		$c2=$row['状态2'];
					                   		$c3=$row['状态3'];
					                   		$c4=$row['状态4'];
					                   		$c5=$row['状态5'];
					                   		$c6=$row['状态6'];
					                   		$c7=$row['状态7'];
					                   		$c8=$row['状态8'];
					                   		$c9=$row['状态9'];
					                   		$c10=$row['状态10'];
					                   }
	$table -> addRow(900);
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('一   般   项   目', array('size'=>12, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('墙面垂直度', array('size'=>12, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	if($leixin1[1]=="墙面垂直度≤3m、≤5mm"||$leixin2[1]=="墙面垂直度≤3m、≤5mm"){
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('☑≤3m', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≤5mm', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}else{
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('□≤3m', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≤5mm', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($c1==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c2==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c3==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c4==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c5==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c6==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c7==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c8==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c9==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c10==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
//表格第四行
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$n]' and 检查内容='填充墙砌体-墙面垂直度>3m、≤10mm'";				                   
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
					                   		$c1=$row['状态1'];
					                   		$c2=$row['状态2'];
					                   		$c3=$row['状态3'];
					                   		$c4=$row['状态4'];
					                   		$c5=$row['状态5'];
					                   		$c6=$row['状态6'];
					                   		$c7=$row['状态7'];
					                   		$c8=$row['状态8'];
					                   		$c9=$row['状态9'];
					                   		$c10=$row['状态10'];
					                   }
	$table -> addRow(900);
	$table -> addCell(1400,array('rowMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('rowMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	if($leixin1[1]=="墙面垂直度>3m、≤10mm"||$leixin2[1]=="墙面垂直度>3m、≤10mm"){
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('☑＞3m', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≤10mm', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}else{
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('□＞3m', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≤10mm', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($c1==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c2==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c3==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c4==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c5==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c6==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c7==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c8==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c9==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c10==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
//第五行	
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$n]' and 检查内容='填充墙砌体-表面平整度'";				                   
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
					                   		$c1=$row['状态1'];
					                   		$c2=$row['状态2'];
					                   		$c3=$row['状态3'];
					                   		$c4=$row['状态4'];
					                   		$c5=$row['状态5'];
					                   		$c6=$row['状态6'];
					                   		$c7=$row['状态7'];
					                   		$c8=$row['状态8'];
					                   		$c9=$row['状态9'];
					                   		$c10=$row['状态10'];
					                   }
	$table -> addRow(900);
	$table -> addCell(1400,array('rowMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('表面平整度', array('size'=>12, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('≤ 8 mm', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	if($c1==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c2==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c3==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c4==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c5==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c6==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c7==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c8==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c9==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c10==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	$section->addTextBreak(4);
	}

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text4.docx');
     //下载
	$file_name = "text4.docx"; 
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