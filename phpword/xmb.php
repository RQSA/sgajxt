<?php
header('content-type:text/html;charset=utf-8');

//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
//	$styleTable = array('borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12);
//	array('valign'=>'center', 'align'=>'center') = array('valign'=>'center', 'align'=>'center');  
//	$fontStyle = array('size'=>10 /*,'bold'=>true*/); 

           require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
		   $table_two_waring="";
		    $table_two_ask="";
           $sql = "select * from 通知单 a,我的工程 b where a.时间戳='$sjc1' and a.工程id='$gcid1' and a.通知单编号='$tzdbh1' and a.工程id=b.id ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $Gcname=$row["工程名称"];
		   $fgsyj=$row["批复意见"];
		   $zgsyj=$row["总公司批复"];
		   $tzdbh=$row["通知单编号"];
		   $xmjl=$row["项目经理"];
		   $scjl=$row["生产经理"];
		   $aqzj=$row["安全总监"];
		   $aqy=$row["安全员"];
		   $gz=$row["机械管理员"];
		   $jcdw=$row["检查单位"];
		   $t="韶关一建";
		   $T=$t.$row["所属公司"];
		   }
		   
		   $n=strlen($Gcname);
		   


//标题
    if($n<65){
	$section->addText('项目部安全检查及隐患整改记录表', array('size'=>20, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(1);
	$section->addText('工程名称：'.$Gcname.'      '.'       编号：'.$tzdbh, array('size'=>10, 'bold'=>false));
	$section->addText('施工单位：'.$T, array('size'=>10, 'bold'=>false));
	}else{
	$section->addText('项目部安全检查及隐患整改记录表', array('size'=>20, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
	$section->addTextBreak(1);
	$section->addText('工程名称：'.$Gcname, array('size'=>10, 'bold'=>false));
	$section->addText('施工单位：'.$T.'       编号：'.$tzdbh, array('size'=>10, 'bold'=>false));	
		
	}

//  表格
//	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable,$fontStyle);	
	$table = $section->addTable();
	
	$table -> addRow(500);
	$table -> addCell(1400,array('rowMerge'=>'restart', 'valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('检查人签名', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('姓名', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($xmjl, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($scjl, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($aqzj, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($aqy, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($gz, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addRow(500);
	$table -> addCell(1400,array('rowMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('部门', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($jcdw, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($jcdw, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($jcdw, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($jcdw, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($jcdw, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));	
	$table -> addRow(500);
	$table -> addCell(1400,array('rowMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('职务（职称）', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('项目经理', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('生产经理', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('安全总监', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('安全员', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('机械管理员', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	require("../conn.php");
		    $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
		   $text="";
		   $part="";
           $sql = "select * from 处罚条目 where 时间戳='".$sjc1."' and 工程id='".$gcid1."' and 通知单编号='".$tzdbh1."'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        	$text=$row["内容"];
        	$part=$row["对象"];
        }
        	
//         $sql="SELECT a.工程id,a.内容,b.违章部位 FROM 处罚条目  a,预览数据表  b WHERE a.工程id=b.工程id AND a.通知单编号=b.通知单编号 AND a.通知单编号='".$tzdbh1."' AND a.工程id='$gcid1'";
			$sql="select * from 预览数据表 where 通知单时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 		
	  		//      	表二数据↓
        	$table_two_waring.=$row["违章现象"]."|*|";
        	$table_two_ask.=$row["项目部回复"]."|*|";
//      	表二数据↑ 	
}
			$c=explode("||",$text);
			$sume=count($c)-1;
			for($i=0;$i<$waring_length;$i++){
				$ne=strlen($waring[$i]);
				$Ne=intval($ne/102);
				$Me=$n%102;
				if($Me!=0){
					$se=$Ne+1;
				}else if($Me==0){
					$se=$Ne;
				}
				$sume=$sume+$se;
			}

			if($part!==""){
				$part=explode("||",$part);
			}
			else{
				for($add=0;$add<$sume;$add++){
				  $part.=$part."|*|";
				}
				$part=explode("|*|",$part);
			}
			if($sume<16){
			for($b=0;$b<$sume;$b++){
					$e=$b+1;
				$nr[$b]=$e.".".$c[$b]."。(部位：".$part[$b].")";
//					echo $e.".".$c[$b]."。(部位：".$part[$b].")</br>";
				}
			}
			else {
				for($b=0;$b<$sume;$b++){
					$e=$b+1;
//					echo $e.".".$c[$b]."。&nbsp;&nbsp;";
				}
			}
			if ($sume<16){
			 $y=16-$sume;
            	for($z=0;$z<$y;$z++){
//          		echo '<p class=MsoNormal  align=center  style="text-align:center;margin:0px;" >&nbsp;</p>';
            }
		  }
		
		$conn->close();			
	
	$table -> addRow(5000);
	$cell_1=$table -> addCell(1400,array('cellMerge'=>'restart','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12));
	$cell_1->addtext('检查情况及存在的隐患：', array('size'=>10, 'bold'=>false));
	for($b=0;$b<$sume;$b++){
    $cell_1->addtext($nr[$b], array('bold'=>false));
      }
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	
	require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 预览数据表 where 通知单时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           $huifuNeirong="";
           while($row = $result->fetch_assoc()) { 
//			echo str_replace("||","。</br>",$row["内容"]);
            //echo $row["项目部回复"];
            $huifuNeirong.=$row["项目部回复"]."//";
           }
           $huifuNeirongArray=explode("//",$huifuNeirong);
           for($i=0;$i<count($huifuNeirongArray)-1;$i++){
           	$zgyq[$i]=($i+1).".".$huifuNeirongArray[$i];
//         	  echo ($i+1).".".$huifuNeirongArray[$i]."&nbsp;&nbsp;&nbsp;&nbsp;";
           }
		   $conn->close();
		   
		   require("../conn.php");
		  $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
           	$zrr=$row["责任人"]; 
			$aqy=$row["安全员"];
		   $a = explode(" ",$row["整改期限"]);
		   $b = explode("-",$a[0]);
		   }
	$table -> addRow(2500);
	$cell_2=$table -> addCell(1400,array('cellMerge'=>'restart','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12));
	$cell_2->addtext('整改要求：', array('size'=>10, 'bold'=>false));
	for($i=0;$i<count($huifuNeirongArray)-1;$i++){
    $cell_2->addtext($zgyq[$i], array('bold'=>false));
      }
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderBottomColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addRow(500);
	$cell_3=$table -> addCell(1400,array('cellMerge'=>'restart','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12));
	$cell_3->addtext($b[0].'年'.$b[1].'月'.$b[2].'日'.'前完成整改', array('size'=>10, 'bold'=>false), array('align'=>'right'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderTopColor'=>'FFFFFF', 'cellMargin'=>12))->addtext('');
	
	$table -> addRow(700);
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('整改日期', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($a[0], array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('整改班组（部门）', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addRow(700);
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('整改责任人', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($zrr, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('安全员', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext($aqy, array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
           	$pfyj=$row["批复意见"];
       
		}
	
	$table -> addRow(1500);
	$cell_2=$table -> addCell(1400,array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12));
	$cell_2->addtext('复查意见', array('size'=>10, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$cell_3=$table -> addCell(1400,array('cellMerge'=>'restart','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12));
	$cell_3->addTextBreak(1);
	$cell_3->addtext($pfyj);
	$cell_3->addTextBreak(1);
	$cell_3->addTextBreak(1);
	$cell_3->addTextBreak(1);
	$cell_3->addtext('复查人（签名）：             '.'                '.'       '.'复查日期：'.'   年'.'  月'.'  日');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$table -> addCell(1400,array('cellMerge'=>'continue','borderSize'=>8,'borderColor'=>'000000', 'cellMargin'=>12))->addtext('');
	$section->addText('注：本表一式二份，项目部、受检班组（部门）各一份', array('size'=>8, 'bold'=>false),array('valign'=>'center', 'align'=>'center'));
	
	 require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 图片附件 a ,处罚条目 b  where a.时间戳='$sjc1' and a.工程id='$gcid1' and a.通知单编号='$tzdbh1' and a.时间戳=b.时间戳 and a.工程id=b.工程id and a.通知单编号=b.通知单编号 " ;
            
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $hello = explode("~*^*~",$row["草稿附件"]);
		   $hello1 = explode("~*^*~",$row["回复附件"]);
		   $hello2=explode("||",$row["内容"]);
		    if($hello1[0]==""){
		   	$numbhello=count($hello2)-1;
		   	$hello1="";
		   	for($i=0;$i<$numbhello;$i++){
		   		$hello1.="add.jpg~*^*~";
		   		if($i==$numbhello-1){
		   		 $hello1 = explode("~*^*~",$hello1);
		   		}
		   	}
		   }
			if($hello[0]==""){
		   	$numbhello1=count($hello2)-1;
		   	$hello="";
		   	for($i=0;$i<$numbhello1;$i++){
		   		$hello.="add.jpg~*^*~";
		   		if($i==$numbhello1-1){
		   		 $hello = explode("~*^*~",$hello);
		   		}
		   	}
		   }
if($huifuNeirong==""){
           	for($h=1;$h<count($hello);$h++){
           		$huifuNeirong=$huifuNeirong."//";
           	}
           	$huifuNeirongArray=explode("//",$huifuNeirong);
           }
	for($index=0;$index<count($hello)-1;$index++) 
			{
				if($index==0||$index%3==0){
					$section->addText('安全隐患图片', array('size'=>20, 'bold'=>true),array('valign'=>'center', 'align'=>'center'));
				}
   			    $table = $section->addTable();
   			    $table->addRow(248);
   			    $cell_8=$table->addcell(275);
   			    $cell_8->addImage("../sgajxtcs/upload/".$hello[$index],array("width"=>275,"height"=>248,"align"=>left));			    
   			    $table->addcell(9250);
   			    $cell_10=$table->addcell(275);
   			    $cell_10->addImage("../sgajxtcs/upload/".$hello1[$index],array("width"=>275,"height"=>248,"align"=>right));
   			    
   			    $table->addRow(700);
   			    $cell_88=$table->addcell(275,array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>12));
   			    $cell_88->addtext($hello2[$index],array('bold'=>false),  array('align'=>'left'));
   			    $table->addcell(9250);
				$cell_99=$table->addcell(275,array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>12));
				$cell_99->addtext($huifuNeirongArray[$index],array('bold'=>false),  array('align'=>'left'));
				
			}
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
	
	
	
	
	
	
?>