<?php
	header('content-type:text/html;charset=utf-8');
	require("../conn.php");
	$splx = '1、教学；2、辅导（培训）；3、组织教育或娱乐竞赛；4、安排和组织学术讨论会；5、安排和组织音乐会6、教育信息；7、教育考核；8、实际培训（示范）；9、娱乐信息；10、书法服务。';
	$year = '2017';
	$sql = "select * from 商标_详情  where id = 3";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqrlx = $row["商标类型"];
		}
	}
	$menth = 8;
	$day = '25';
	$ayr = '曾宪楠';
	$dlr = '陈涌';
	$time = date("y-m-d");
//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
//  页眉
    $header = $section->createHeader();
    $header->addText('案卷号：'.$time, array('size'=>10), array('align'=>'right'));
//  内容
    $fontStyle = array('size' => 10.5);
    $section->addText('案源人：'.$ayr, $fontStyle);
    $section->addText('代理人：'.$dlr, $fontStyle);
    $section->addTextBreak();
    $section->addText('网报商标申请书', array('size'=>22, 'bold'=>true), array('align'=>'center'));
    $section->addtextBreak();
//  表格
    $table = $section->addTable();
    $table -> addRow(400);
    $table -> addCell(3000)->addtext('申请人类型：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText($sqrlx, array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('申请人名称：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('罗星', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('证明文件编号：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('441602199009182218', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('申请人地址：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('广东省河源市源城区永和路218号万隆花园E栋602房', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('邮政编码：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('528400', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('联系人：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('杜海江', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('电话（含地区号）：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('0760-88886258', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('传真（含地区号）：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('0760-88886171', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('代理组织名称：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('中山市中亿星诚知识产权服务有限公司', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('商标说明：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('朝优教育', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('类别：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('41', array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('商品/服务项目：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText($splx, array('size'=>14));
    $table -> addRow(400);
    $table -> addcell(3000)->addtext('是否颜色商标：', array('size'=>14), array('align'=>'right'));
    $table->addCell(5000)->addText('是', array('size'=>14));
    $section->addtext('商标图样：');
    $section->addImage('sm-img-3.jpg', array('width'=>300, 'height'=>300, 'align'=>'center'));
    $section->addText('委托人章戳（签字）', array('size'=>14), array('align'=>'right'));
    $section->addText($year."年".$menth."月".$day."日", array('size'=>14), array('align'=>'right'));
    
//    shuchu
    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text.docx');
?>