<?php
header('content-type:text/html;charset=utf-8');

           require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='".$sjc1."' and 工程id='".$gcid1."' and 通知单编号='".$tzdbh1."' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
           	$CheckDay=explode(" ",$row["检查日期"]);
//		   echo $CheckDay[0];
		    $Xmjl=$row["项目经理"];
		    $Jcdw=$row["检查单位"];
		    $Gcname=$row["工程名称"];
			$xclb=$row["巡查类别"];
		    $Jcnr=$row["检查内容"];
		   }
			
			
			$Name="";
			$NameAlle="";
			$Gcsjc="";
			$NameAll="";
			$NLL="";
			$NL="";
			 $ssgs="";
			$time=getdate();
			$ntimestr=$CheckDay[0]."%";
			$sqla="select * from 人员签到  where 工程名称='".$Gcname."' and 签到时间  LIKE '".$ntimestr."' and 人员<>'' GROUP BY 人员";
			$result = $conn->query($sqla);
		    while($row = $result->fetch_assoc()) {
		   $Name.=$row["人员"]."*|";
		   }
		   $NameLit=explode("*|",$Name);
		   $NameLitL=count($NameLit)-1;
		   if($NameLitL<=6){
		   	for($i=0;$i<6;$i++){
			   	if($NameLitL-$i>=1)
			   	{$NLL[$i]=$NameLit[$i];
			   	}
			   	else{$NLL[$i]="||";}
		    	}
		   }
		   else{
		   		for($i=0;$i<$NameLitL;$i++){
		   	$NLL[$i]=$NameLit[$i];
		   	
		   		}
		   }
//		   签到人员数组↑
//       项目人员数组↓
            $sqlb = "select * from 我的工程  where 工程名称='".$Gcname."' and id='".$gcid1."'";
		  $result = $conn->query($sqlb);
		    while($row = $result->fetch_assoc()) {
		    $Gcsjc=$row["时间戳"];
		    $NameAll[0]=$row["总公司负责人A"]."|总公司|安全监管部部长";
		    $NameAll[1]=$row["总公司负责人B"]."|总公司|安全主管";
		    $NameAll[2]=$row["总公司负责人C"]."|总公司|设备管理员";
		    $NameAll[3]=$row["总部巡查员"]."|总公司|巡查员";
		    $ssgs=$row["所属公司"];
		    }
		  	
		    $sqlc = "select * from 工程管理人员  where 工程时间戳='".$Gcsjc."' and 部门='总公司' ";
		  $result = $conn->query($sqlc);
		    while($row = $result->fetch_assoc()) {
		    $NameAlle.=$row["姓名"]."|总公司|".$row["岗位"]."(*)";
		    }
		    
		   $conn->close();
		   $NameAllex=explode("(*)",$NameAlle);
		   $NameAllex_L=count($NameAllex)-1;
		   for($b=4;$b-4<$NameAllex_L;$b++){
		   	$NameAll[$b]=$NameAllex[$b-4];
		   }
//		   判断人员
           if($NameLitL<=6){
           	$L=6;
           }
           else{$L=$NameLitL;}
           $e=0;
           for($c=0;$c<$L;$c++){
           	for($d=0;$d<$NameAllex_L+4;$d++){
           		$match=explode("|",$NameAll[$d]);
           		if($match[0]==$NLL[$c])
           		{
           		$NL[$e]=$NameAll[$d];
           		$e++;

           		}
           		else{
           			if($d==$NameAllex_L+3){
           				if($e<6){
           					for($f=0;$f<6-$e;$f++){
           						$NL[$e+$f]="||";
           					}
           					
           				}
           			}
           		}
           	 }
           }
 $NLone=explode("|",$NL[0]);
//		   echo $NLone[0];
 $NLtwo=explode("|",$NL[1]);
//		   echo $NLtwo[0];
 $NLthree=explode("|",$NL[2]);
//		   echo $NLthree[0];
$NLfour=explode("|",$NL[3]);
//		   echo $NLfour[0];	
$NLfive=explode("|",$NL[4]);
//		   echo $NLfive[0];
$NLsix=explode("|",$NL[5]);
//		   echo $NLsix[0];
	
	//  创建word表
	require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $section = $PHPWord->createSection();
	$styleTable = array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>12);
	$styleCell = array('valign'=>'middle', 'align'=>'center');  
//	$fontStyle = array('size'=>10 /*,'bold'=>true*/);  
	
	//标题
	$section->addText('韶关市第一建筑工程公司隐患整改通知', array('size'=>20, 'bold'=>true),$styleCell);
	$section->addText('公司对项目', array('size'=>10, 'bold'=>false),$styleCell);
	
	//  表格
	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable);
	$table = $section->addTable('myOwnTableStyle');
    $table -> addRow(400);
    $table -> addCell(2800, array('cellMerge'=>'restart', 'valign'=>'center'))->addtext('检查单位/部门',array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(4200, array('cellMerge'=>'restart', 'valign'=>'center'))->addtext('韶关市第一建筑工程公司'.$xclb.'监管部', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext('检查日期', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext( $CheckDay[0] , array('size'=>10,'bold'=>false),$styleCell);
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart', 'valign'=>'center'))->addtext('巡查人员',array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext('姓名', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext('单位/部门', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext('职务', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(3900,array('cellMerge'=>'restart', 'valign'=>'center'))->addtext('安全检（巡）查内容', array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext( '' , $styleCell);
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart', 'rowMerge'=>'continue','valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLone[0], array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLone[1], array('size'=>10,'bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLone[2], array('size'=>10,'bold'=>false),$styleCell);
    $cell_1 = $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'restart'));
    $cell_1->addtext('安全巡查内容：'.$Jcnr,array('size'=>10));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('');
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('');
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart', 'rowMerge'=>'continue','valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLtwo[0], array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLtwo[1], array('bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLtwo[2], array('bold'=>false),$styleCell);
    $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'continue'))->addtext( array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('');
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('');
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'continue', 'valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLthree[0], array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLthree[1], array('bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLthree[2], array('bold'=>false),$styleCell);
    $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext( '' , $styleCell);
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'continue', 'valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLfour[0], array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLfour[1], array('bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLfour[2], array('bold'=>false),$styleCell);
    $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext( '' , $styleCell);
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart', 'rowMerge'=>'continue','valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLfive[0], array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLfive[1], array('bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLfive[2], array('bold'=>false),$styleCell);
    $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext( '' , $styleCell);
    
    $table -> addRow(300);
    $table -> addCell(1400, array('cellMerge'=>'restart', 'rowMerge'=>'continue','valign'=>'center'))->addtext('',array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLsix[0], array('bold'=>false),$styleCell);
    $table -> addCell(1400)->addtext($NLsix[1], array('bold'=>false),$styleCell);
    $table -> addCell(1700)->addtext($NLsix[2], array('bold'=>false),$styleCell);
    $table -> addCell(3900, array('cellMerge'=>'restart','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'continue'))->addtext( '' , $styleCell);
    
    $n=strlen($Gcname);
    
    $table -> addRow(600);
    $table -> addCell(1400)->addtext('受检查单位/项目',array('bold'=>false),$styleCell);
    $cell_9=$table -> addCell(1400, array('cellMerge'=>'restart','valign'=>'center'));   
    if($n<32){
    	$cell_9->addtext($Gcname, array('size'=>10,'bold'=>false),$styleCell);
    }else{
    	$cell_9->addtext($Gcname, array('size'=>8,'bold'=>false),$styleCell);
    }
    
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'restart','valign'=>'center'))->addtext('受检查单位/(项目)负责人签名', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext('', array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'restart','valign'=>'center'))->addtext($Xmjl, array('bold'=>false),$styleCell);
    $table -> addCell(1400, array('cellMerge'=>'continue'))->addtext( '' , $styleCell);
    
    require("../conn.php");
           $jcqknr=array();
		    $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
		   $text="";
		   $part="";
		   $table_two_waring="";
		   $table_two_ask="";
           $sql = "select * from 处罚条目 where 时间戳='".$sjc1."' and 工程id='".$gcid1."' and 通知单编号='".$tzdbh1."'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
        	$text=$row["内容"];
        	$part=$row["对象"];
        }
        	

			$sql="select * from 预览数据表 where 通知单时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1'";
           $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
//      	表二数据↓
        	$table_two_waring.=$row["违章现象"]."|*|";
        	$table_two_ask.=$row["项目部回复"]."|*|";
//      	表二数据↑ 		
}
			$c=explode("||",$text);
			$d=count($c)-1;

			if($part!==""){
				$part=explode("||",$part);
			}
			else{
				for($add=0;$add<$d;$add++){
				  $part.=$part."|*|";
				}
				$part=explode("|*|",$part);
			}
			
			if($d<20){
			for($b=0;$b<$d;$b++){
					$e=$b+1;
					
					$jcqknr[$b]=$e.".".$c[$b]."。(部位：".$part[$b].")";
				}
			}
			else {
				for($b=0;$b<$d;$b++){
					$e=$b+1;
					$jcqknr[$b]= $e.".".$c[$b]."。&nbsp;&nbsp;";
				}
			}
			if ($d<20){
			 $y=20-$d;
            	for($z=0;$z<$y;$z++){
            }
		  }
		
    
     $table -> addRow(5800);//1
    $table -> addCell(1400, array('rowMerge'=>'restart','valign'=>'center'))->addtext('检查情况',array('bold'=>false),$styleCell);    
    $cell_0 = $table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart'));
    for($b=0;$b<$d;$b++){
    $cell_0->addtext($jcqknr[$b], array('bold'=>false));
      }
    
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext( '' );

    require("../conn.php");
		  $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $a = explode("/",$row["下发整改时间"]);
		   $b = explode("-",$a[0]);
		   $c = count($b);
		   if($c<3){
		   	$b=array(" "," "," ");
		   }
		   $year = $b[0] ;
		   $month=$b[1];
		   $day=$b[2];
//		   echo $b[1];

//         
//		   echo $b[2];
           $A = explode(" ",$row["整改期限"]);
		   $B = explode("-",$A[0]);
		   $C = count($B);
		   if($C<3){
		   	$B=array(" "," "," ");
		   }
			}
    
    
    
     $table -> addRow(1000);
    $table -> addCell(1400, array('rowMerge'=>'restart','valign'=>'center'))->addtext('整改要求',array('bold'=>false),$styleCell);
    $cell_2=$table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart'));
    $cell_2->addtext('整改要求：请项目部按规范要求，定时，定人，定措施进行整改，并及时回复。', array('bold'=>false));
    $cell_2->addtext(' '     , array('bold'=>false));
    $cell_2->addTextBreak(1);
    $cell_2->addtext('检查人（签名）：                 '.'              整改时间:'.$month.'月 '.$day.'日 --'.$B[1].'月 '.$B[2].'日', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext( '' );
   
    
    require("../conn.php");
		   //$sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 预览数据表 where 通知单时间戳='".$sjc1."' and 工程id='$gcid1' and 通知单编号='".$tzdbh1."' ";
           $result = $conn->query($sql);
           $huifuNeirong="";
           while($row = $result->fetch_assoc()) { 
            $huifuNeirong.=$row["项目部回复"]."//";
            
           }
           $huifuNeirongArray=explode("//",$huifuNeirong);
//         for($i=0;$i<count($huifuNeirongArray)-1;$i++){
//         	  echo ($i+1).".".$huifuNeirongArray[$i]."&nbsp;&nbsp;&nbsp;&nbsp;";
//         }
			$sql = "select * from 通知单 where 时间戳='".$sjc1."' and 工程id='$gcid1' and 通知单编号='".$tzdbh1."' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
//          echo $row["总公司批复意见"];
            $fgsyj=$row["批复意见"];
            $zgsyj=$row["总公司批复"];
             $hfA= explode("-",$row["回复日期"]);
		   $B = count($hfA);
		   if($B<3){
		   	$hfA=array(" "," "," ");
		   }
		    $CC= explode("-",$row["总公司批复日期"]);
		   $D = count($CC);
		   
		   if(!array_key_exists("1", $CC)){
		   	$CC[1] = "";
		   }
		   if(!array_key_exists("2", $CC)){
		   	$CC[2] = "";
		   }
		   
		   if($D<3){
		   	$C=array(" "," "," ");
		   }
		   $E= explode("-",$row["批复日期"]);
		   $F = count($E);
		   if($F<3){
		   	$E=array(" "," "," ");
		   }
           }
     $table -> addRow(900);
    $table -> addCell(1400, array('rowMerge'=>'restart','valign'=>'center'))->addtext('整改情况',array('bold'=>false),$styleCell);
    $cell_3=$table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center'));
    $cell_3->addtext($row["总公司批复意见"], array('bold'=>false));
    $cell_3->addTextBreak(1);
    $cell_3->addtext('专职安全员（签名）：          '.'项目负责人（签名）：        '.$hfA[0].'年'.$hfA[1].'月'.$hfA[2].'日', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext( '');

    
    $table -> addRow(900);
    $table -> addCell(1400, array('rowMerge'=>'restart','valign'=>'center'))->addtext('分公司复查意见',array('bold'=>false),$styleCell);
    $cell_4=$table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center'));
    $cell_4->addtext($fgsyj, array('bold'=>false));
    $cell_4->addtext('复查人（签名）：            '.'             '.'            '.'             '.'            '.'     '.'              '.$E[0].'年'.$E[1].'月'.$E[2].'日', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext( '' );
   
    
     $table -> addRow(900);
    $table -> addCell(1400, array('rowMerge'=>'restart','valign'=>'center'))->addtext('公司总部复查意见',array('bold'=>false),$styleCell);
    $cell_5=$table -> addCell(1400, array('cellMerge'=>'restart','rowMerge'=>'restart','valign'=>'center'));
    $cell_5->addtext($zgsyj, array('bold'=>false));
    $cell_5->addtext('复查人（签名）：            '.'             '.'            '.'             '.'            '.'     '.'              '.$CC[0].'年'.$CC[1].'月'.$CC[2].'日', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext('', array('bold'=>false));
    $table -> addCell(1400, array('cellMerge'=>'continue','rowMerge'=>'restart'))->addtext( '' );
    
    $section->addText('注：复查后将整改资料作为附件，一式三份，安全监管部、分公司、项目部各留一份存档。', array('size'=>8, 'bold'=>false),$styleCell);
    
//  $table -> addRow(300);
//  $table -> addCell(1400)->addtext('',array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext('', array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext('', array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext('', array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext('', array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext('', array('bold'=>false),$styleCell);
//  $table -> addCell(1400)->addtext( '' , $styleCell);
	
    //页脚
//  $footer = $section->createFooter()->addtext('注：复查后将整改资料作为附件，一式三份，安全监管部、分公司、项目部各留一份存档。', array('bold'=>true), array('align'=>'left'));
	
	
	//标题-----表二
	        $waring="";
	        $sum1="";
			$ask="";
			$b="";
			$zgnr=array();
			$zgcs=array();
			$sum2=0;
			$waring_length="";
			$waringing_length="";
			$waring=explode("|*|",$table_two_waring);
			$waring_length=count($waring)-1;
			$waringing=explode("|*|",$table_two_ask);
			$waringing_length=count($waringing)-1;
			for($i=0;$i<$waring_length;$i++){
				$n=strlen($waring[$i]);
				$N=intval($n/135);
				$M=$n%135;
				if($M!=0){
					$s=$N+1;
				}else if($M==0){
					$s=$N;
				}
				$sum1=$sum1+$s;
			}
			for($i=0;$i<$waringing_length;$i++){
				$nn=strlen($waringing[$i]);
				$NN=intval($nn/135);
				$MM=$nn%135;
				if($MM!=0){
					$ss=$NN+1;
				}else if($MM==0){
					$ss=$NN;
				}
				$sum2=$sum2+$ss;
			}
		$sum=$sum1+$waring_length;

			if($table_two_ask!==""){
				$ask=explode("|*|",$table_two_ask);
			}
			else{
				for($add=0;$add<$waring_length;$add++){
				  $ask.=$ask."|*|";
				}
				$ask=explode("|*|",$ask);
			}
			if($waring_length<12){
			for($b=0;$b<$waring_length;$b++){
					$e=$b+1;
				$zgnr[$b]=$e.".整改内容：".$waring[$b].'。';
				$zgcs[$b]="整改措施：".$ask[$b].'。';	
//					echo '<p class=MsoNormal  style="margin: 0px;padding-left:2em;mso-char-indent-count:1.5000;font-size: 8.5000pt;" ><span style="text-align: left">'.$e.".整改内容：".$waring[$b]."。</br>&nbsp;&nbsp;&nbsp;&nbsp;整改措施：".$ask[$b]."。</span></p>";
				}
			}
			else {
				for($b=0;$b<$waring_length;$b++){
					$e=$b+1;
//					echo $e.".".$c[$b]."。&nbsp;&nbsp;";
				}
			}
			if ($waring_length<12){
			 $y=20-$waring_length*2;
            	for($z=0;$z<$y;$z++){
//          		echo '<p class=MsoNormal  align=center  style="font-family: Calibri;font-size: 10.5000pt;text-align:center;margin:0px;" >&nbsp;</p>';
            }
		 }
		 require("../conn.php");
		   $sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
//			echo str_replace("||","。</br>",$row["内容"]);
//          echo $row["批复意见"];
            for($z=0;$z<4;$z++){
//          	echo '<p class=MsoNormal  align=center  style="text-align:center;" >&nbsp;</p>';
            }
			$A = explode(" ",$row["整改期限"]);
		   $B = explode("-",$A[0]);
		   $C = count($B);
		   if($C<3){
		   	$B=array(" "," "," ");
		   }
		    $CC= explode("-",$row["总公司批复日期"]);
			if(!array_key_exists("1", $CC)){
		   	$CC[1] = "";
		   }
		   if(!array_key_exists("2", $CC)){
		   	$CC[2] = "";
		   }
		   $D = count($CC);
		   if($D<3){
		   	$C=array(" "," "," ");
		   }
		    $a = explode("/",$row["下发整改时间"]);
		   $b = explode("-",$a[0]);
		   $c = count($b);
		   if($c<3){
		   	$b=array(" "," "," ");
		   }
		   $year = $b[0] ;
		   $month=$b[1];
		   $day=$b[2];
//		   echo $b[1];
		  
		  }
    $section = $PHPWord->createSection();
	$section->addText('安全隐患整改回复', array('size'=>22, 'bold'=>true),$styleCell);
	$section->addText('工程名称：'.$Gcname, array( 'bold'=>false), array('align'=>'left'));
	//表格
	$styleTable = array('alignMent'=>'center','borderSize'=>8, 'borderColor'=>'000000', 'cellMarginTop'=>60, 'cellMarginLeft'=>60, 'cellMarginRight'=>60, 'cellMarginBottom'=>60);
	$PHPWord->addTableStyle('myOwnTableStyle', $styleTable);
    $table = $section->addTable('myOwnTableStyle');
	$table -> addRow(10000);
    $cell_6=$table -> addCell(10000);
    $cell_6->addtext('致：'.$ssgs, array('bold'=>false,"size"=>12), array('align'=>'left'));
    $cell_6->addtext('    我项目部收接到公司安全监管部'.$year.'年'.$month.'月'.$day.'日'.'下发的安全隐患整改通知单，项目部在规定时间内进行了整改，现己整改完毕，请复查。', array('bold'=>false,"size"=>12), array('align'=>'left'));
	if(count($zgcs)<count($waring_length)){
		$zgcs=array(" "," "," "," "," "," "," "," "," ");
	}
    for($b=0;$b<$waring_length;$b++){
    $cell_6->addtext("   ".$zgnr[$b], array('bold'=>false), array('align'=>'left'));
    $cell_6->addtext("      ".$zgcs[$b], array('bold'=>false), array('align'=>'left'));	
    }
    for($i=0;$i<25-$sum;$i++){
    echo $cell_6->addTextBreak(1);
    }
    $cell_6->addtext("后附：整改照片", array('bold'=>false,"size"=>12), array('align'=>'left'));
    $cell_6->addTextBreak(2);
    $cell_6->addTextBreak(2);
    $cell_6->addtext("项目名称（项目章）______________", array('bold'=>false,"size"=>12), array('align'=>'right'));
    $cell_6->addTextBreak(2);
    $cell_6->addTextBreak(2);
    $cell_6->addtext("项目负责人（签名）______________", array('bold'=>false,"size"=>12), array('align'=>'right'));
    $cell_6->addTextBreak(2);
    $cell_6->addTextBreak(2);
    $cell_6->addtext($hfA[0]."年".$hfA[1]."月".$hfA[2]."日", array('bold'=>false,"size"=>12), array('align'=>'right'));
    $table -> addRow(3000);
    $cell_7=$table -> addCell(10000);
    $cell_7->addtext('公司复查意见：',array('bold'=>false,"size"=>12),  array('align'=>'left'));
    $cell_7->addTextBreak(1);
    $cell_7->addtext($row["批复意见"],array('bold'=>false),  array('align'=>'left'));
    for($i=0;$i<5;$i++){
    echo $cell_7->addTextBreak(1);
    }
    $cell_7->addtext("复查人签名：______________ ", array('bold'=>false,"size"=>12), array('align'=>'right'));
    $cell_7->addTextBreak(2);
    $cell_7->addtext($CC[0]."年".$CC[1]."月".$CC[2]."日  ", array('bold'=>false,"size"=>12), array('align'=>'right'));
    $cell_7->addTextBreak(2);    
    
    //图片
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
					$section->addText('安全隐患图片', array('size'=>20, 'bold'=>true),$styleCell);
				}
   			    $table = $section->addTable();
   			    $table->addRow(248);
   			    $cell_8=$table->addcell(275);
   			    $cell_8->addImage("../sgajxtcs/upload/".$hello[$index],array("width"=>275,"height"=>248,"align"=>'left'));			    
   			    $table->addcell(9250);
   			    $cell_10=$table->addcell(275);
   			    $cell_10->addImage("../sgajxtcs/upload/".$hello1[$index],array("width"=>275,"height"=>248,"align"=>'right'));
   			    
   			    $table->addRow(700);
   			    $cell_88=$table->addcell(275,array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>12));
   			    $cell_88->addtext($hello2[$index],array('bold'=>false),  array('align'=>'left'));
   			    $table->addcell(9250);
				$cell_99=$table->addcell(275,array('borderSize'=>8, 'borderColor'=>'000000', 'cellMargin'=>12));
				$cell_99->addtext($huifuNeirongArray[$index],array('bold'=>false),  array('align'=>'left'));
				
			}
			}
    
    
    
//  $imageStyle = array('width'=>350, 'height'=>350, 'align'=>'left');
//  $section->addImage('H.JPEG', $imageStyle);
//	$imag="http://127.0.0.1:8082/hxajxt/phpword/H.JPEG";
//  $section->addMemoryImage($imag,array('width'=>275,'height'=>265));
//	
	$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
    $objWriter->save('text.docx');
    
    
    
   
    //下载
	$file_name = "text.docx"; 
//	$file_dir = "phpword/"; 
//	echo $file_dir;
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