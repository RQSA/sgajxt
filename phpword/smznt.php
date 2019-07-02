<?php error_reporting( E_ALL&~E_NOTICE );?>
<?php
	
	require("../conn.php");
	$sjc1=$_GET["sjc1"];
	$sjc = array();
	$sjc = explode(',', $sjc1);
	
		
header('content-type:text/html;charset=utf-14');

//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
    
	for($j=0;$j<count($sjc);$j++){
	$sql = "SELECT * FROM `实测实量数据` WHERE `时间戳` = '$sjc[$j]' and 记录表类型='饰面砖粘贴' and 状态='1' ";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
			$gcmc=$row["工程名称"]; 
        	$fxgc=$row["分项工程名称"];
			$nr = $row["检查内容"];
        }
	$leixin = explode('-',$nr);
	
//标题
	$section->addText("饰面砖粘贴检验批质量验收记录表", array	('size'=>20,'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(1);

//表格
	$table = $section->addTable();

//第一行
	$table -> addRow(300);
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>14,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF','cellMargin'=>14))->addtext('单位（子单位）工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($gcmc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));

//第二行
	$table -> addRow(300);
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>14,'borderColor'=>'000000','cellMargin'=>14))->addtext('分项工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1000,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($fxgc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
//第三行1
	$table -> addRow(300);
	$table -> addCell(600,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','borderSize'=>14,'borderColor'=>'000000','cellMargin'=>14))->addtext('项次', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1200,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('项目', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('允许偏差(mm)', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('实测值', array('size'=>18, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
//第三行2	
	$table -> addRow(200);
	$table -> addCell(600,array('rowMerge'=>'continue', 'valign'=>'center','borderSize'=>14,'borderColor'=>'000000','cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array( 'align'=>'center'));
	$table -> addCell(1200,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderBottomColor'=>'FFFFFF','cellMargin'=>14))->addtext('外墙面砖', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderBottomColor'=>'FFFFFF','cellMargin'=>14))->addtext('内墙面砖', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
//第三行3	
	$table -> addRow(200);
	$table -> addCell(1200,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	if($leixin[2]=='外墙面砖'){
		$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('☑', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	else{
		$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('□', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	if($leixin[2]=='内墙面砖'){
		$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('☑', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	else{
		$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('□', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));

//第四行1	
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and `记录表类型`='饰面砖粘贴' and (检查内容='饰面砖粘贴-立面垂直度-外墙面砖' or 检查内容='饰面砖粘贴-立面垂直度-内墙面砖')";							                   
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
				 
	$table -> addRow(200);
	$table -> addCell(600,array('rowMerge'=>'restart', 'valign'=>'center','borderSize'=>14,'borderColor'=>'000000','cellMargin'=>14))->addtext('1', array('size'=>14, 'bold'=>false),array( 'align'=>'center'));
	$table -> addCell(1200,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF', 'cellMargin'=>14))->addtext('立面', array('size'=>13, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('3', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('2', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	if($d1[0]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[1]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[2]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[3]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[4]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($d[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[5]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[6]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[7]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[8]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[9]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
//第四行2	
	$table -> addRow(200);
	$table -> addCell(1200,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(600,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('垂直度', array('size'=>13, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));

//第五行1

			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and `记录表类型`='饰面砖粘贴' and (检查内容='饰面砖粘贴-表面平整度-外墙面砖' or 检查内容='饰面砖粘贴-表面平整度-内墙面砖')";						                   
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
	$table -> addRow(200);
	$table -> addCell(600,array('rowMerge'=>'restart', 'valign'=>'center','borderSize'=>14,'borderColor'=>'000000','cellMargin'=>14))->addtext('2', array('size'=>14, 'bold'=>false),array( 'align'=>'center'));
	$table->addCell(1200,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000','borderBottomColor'=>'FFFFFF', 'cellMargin'=>14))->addtext('表面', array('size'=>13, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('4', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('3', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	if($d1[0]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[1]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[2]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[3]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[4]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[5]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[6]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[7]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[8]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($d1[9]==0)
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('rowMerge'=>'restart','cellMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext($d[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
//第五行2	
	$table -> addRow(200);
	$table -> addCell(600,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1200,array('rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'borderTopColor'=>'FFFFFF','cellMargin'=>14))->addtext('平整度', array('size'=>13, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1100,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(500,array('rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>14,'borderColor'=>'000000', 'cellMargin'=>14))->addtext('', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(9);
	}
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