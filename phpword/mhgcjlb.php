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
	
	for($j=0;$j<count($sjc);$j++){
	$sql = "SELECT * FROM `实测实量数据` WHERE `时间戳` = '$sjc[$j]' and 记录表类型='一般抹灰工程'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
			$gcmc=$row["工程名称"]; 
        	$fxgc=$row["分项工程名称"];
			$nr = $row["检查内容"];
        }
	$leixin = explode('-',$nr);
	
	
	

//标题
	   $section->addText("一般抹灰工程检验批质量验收记录表", array('size'=>20, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	   $table = $section->addTable();
	
	
	$table -> addRow(800);//第一行
	
	$table -> addCell(5600,array('cellMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('单位（子单位）工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	$table -> addCell(4200,array('cellMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($gcmc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	
	
	
	
	
	$table -> addRow(800);//第二行
	
	$table -> addCell(5600,array('cellMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('分项工程名称', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	$table -> addCell(4200,array('cellMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($fxgc, array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(280,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	
	
//第三行1	
	$table -> addRow(800);
	$table -> addCell(600,array('rowMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('项次', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(800,array('rowMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('项目', array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	
	$table -> addCell(2800,array('cellMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('允许偏差(mm)', array('size'=>14, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	$table -> addCell(4200,array('cellMerge'=>'restart', 'rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('实测值',array('size'=>16, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'restart','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
   	
	
//第三行2	
	$table -> addRow(800);
	$table -> addCell(600,array('rowMerge'=>'continue', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(800,array('rowMerge'=>'continue', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	if($leixin[2]=='普通')
	{
		$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('☑ 普通',array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('□ 普通', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	
	if($leixin[2]=='高级')
	{
		$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('☑  高级',array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('□ 高级', array('size'=>12, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	
	$table -> addCell(4200, array('cellMerge'=>'restart','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    
    
//第三行3	
	$table -> addRow(800);
	$table -> addCell(600,array('rowMerge'=>'continue', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(800,array('rowMerge'=>'continue', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('抹灰', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('抹灰', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	$table -> addCell(4200, array('cellMerge'=>'restart','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    $table -> addCell(280, array('cellMerge'=>'continue','rowMerge'=>'continue','valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000','cellMargin'=>12))->addtext('');
    

//第四行

			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and `记录表类型`='一般抹灰工程' and (检查内容='一般抹灰-立面垂直度-普通' or 检查内容='一般抹灰-立面垂直度-高级')";				                   
			    $result = $conn->query($sql);
				$c=array();//获取表格数据
				$c1=array();//获取十个状态
				 while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$c[0]=$row['D1'];
					                   		$c[1]=$row['D2'];
					                   		$c[2]=$row['D3'];
					                   		$c[3]=$row['D4'];
					                   		$c[4]=$row['D5'];
					                   		$c[5]=$row['D6'];
					                   		$c[6]=$row['D7'];
					                   		$c[7]=$row['D8'];
					                   		$c[8]=$row['D9'];
					                   		$c[9]=$row['D10'];
					                   		$c1[0]=$row['状态1'];
					                   		$c1[1]=$row['状态2'];
					                   		$c1[2]=$row['状态3'];
					                   		$c1[3]=$row['状态4'];
					                   		$c1[4]=$row['状态5'];
					                   		$c1[5]=$row['状态6'];
					                   		$c1[6]=$row['状态7'];
					                   		$c1[7]=$row['状态8'];
					                   		$c1[8]=$row['状态9'];
					                   		$c1[9]=$row['状态10'];
					                   		
					                   		
					                   }
	$table -> addRow(800);
	$table -> addCell(600,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('1',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(800,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('立面垂直度', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('4',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('3',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	
	if($c1[0]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[1]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[2]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[3]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[4]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[5]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[6]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[7]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[8]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[9]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
//第五行	
			    $sql = "select * from 实测实量数据  where 状态='1' and 时间戳='$sjc[$j]' and `记录表类型`='一般抹灰工程' and (检查内容='一般抹灰-表面平整度-普通' or 检查内容='一般抹灰-表面平整度-高级')";					                   
			    $result = $conn->query($sql);
				$c=array();
				$c1=array();
				 while($row = $result->fetch_assoc()) {    					
					                   		
					                   		$c[0]=$row['D1'];
					                   		$c[1]=$row['D2'];
					                   		$c[2]=$row['D3'];
					                   		$c[3]=$row['D4'];
					                   		$c[4]=$row['D5'];
					                   		$c[5]=$row['D6'];
					                   		$c[6]=$row['D7'];
					                   		$c[7]=$row['D8'];
					                   		$c[8]=$row['D9'];
					                   		$c[9]=$row['D10'];
					                   		$c1[0]=$row['状态1'];
					                   		$c1[1]=$row['状态2'];
					                   		$c1[2]=$row['状态3'];
					                   		$c1[3]=$row['状态4'];
					                   		$c1[4]=$row['状态5'];
					                   		$c1[5]=$row['状态6'];
					                   		$c1[6]=$row['状态7'];
					                   		$c1[7]=$row['状态8'];
					                   		$c1[8]=$row['状态9'];
					                   		$c1[9]=$row['状态10'];
					                   		
					                   }
	$table -> addRow(800);
	$table -> addCell(600,array( 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('2',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(800,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('表面平整度', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('4',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(2100,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('3',array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	
	if($c1[0]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[0],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[0],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[1]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[1],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[1],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[2]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[2],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[2],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[3]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[3],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[3],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[4]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[4],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[4],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[5]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[5],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[5],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[6]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[6],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[6],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[7]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[7],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[7],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[8]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[8],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[8],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	
	if($c1[9]==0)
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[9],array('size'=>15, 'bold'=>false,'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE),array('valign'=>'center', 'align'=>'center'));
	}
	else
	{
		$table -> addCell(700,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($c[9],array('size'=>15, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	}
	$section->addTextBreak(3);
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