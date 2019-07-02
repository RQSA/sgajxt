<?php
require_once 'PHPWord.php';
ini_set('date.timezone','Asia/Shanghai');
$PHPWord = new PHPWord();

require("../conn.php");
	$sjc2=$_GET["sjc1"];
		   $a = explode("/",$sjc2);
		   $sjc1=$a[0];
		   $gcid1=$a[1];
		   $tzdbh1=$a[2];
           $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
           	$CheckDay=explode(" ",$row["检查日期"]);
		    $Xmjl=$row["项目经理"];
		    $Jcdw=$row["检查单位"];
		    $Gcname=$row["工程名称"];
		    $Jcnr=$row["检查内容"];
		   }
			
			
			$Name="";
			$NameAlle="";
			$Gcsjc="";
			$NameAll="";
			$NLL="";
			$NL="";
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
$NLtwo=explode("|",$NL[1]);
$NLthree=explode("|",$NL[2]);
$NLfour=explode("|",$NL[3]);
$NLfive=explode("|",$NL[4]);
$NLsix=explode("|",$NL[5]);		
	
$document = $PHPWord->loadTemplate('Temple/temple.docx');//导入模板



$document->setValue('rq',iconv('utf-8', 'GB2312//IGNORE', $CheckDay[0]));
$document->setValue('sjr',iconv('utf-8', 'GB2312//IGNORE', $Xmjl));
$document->setValue('sjdw',iconv('utf-8', 'GB2312//IGNORE', $Gcname));
$document->setValue('nr',iconv('utf-8', 'GB2312//IGNORE', $Jcnr));
$document->setValue('n1',iconv('utf-8', 'GB2312//IGNORE', $NLone[0]));
$document->setValue('b1',iconv('utf-8', 'GB2312//IGNORE', $NLone[1]));
$document->setValue('z1',iconv('utf-8', 'GB2312//IGNORE', $NLone[2]));
$document->setValue('n2',iconv('utf-8', 'GB2312//IGNORE', $NLtwo[0]));
$document->setValue('b2',iconv('utf-8', 'GB2312//IGNORE', $NLtwo[1]));
$document->setValue('z2',iconv('utf-8', 'GB2312//IGNORE', $NLtwo[2]));
$document->setValue('n3',iconv('utf-8', 'GB2312//IGNORE', $NLthree[0]));
$document->setValue('b3',iconv('utf-8', 'GB2312//IGNORE', $NLthree[1]));
$document->setValue('z3',iconv('utf-8', 'GB2312//IGNORE', $NLthree[2]));
$document->setValue('n4',iconv('utf-8', 'GB2312//IGNORE', $NLfour[0]));
$document->setValue('b4',iconv('utf-8', 'GB2312//IGNORE', $NLfour[1]));
$document->setValue('z4',iconv('utf-8', 'GB2312//IGNORE', $NLfour[2]));
$document->setValue('n5',iconv('utf-8', 'GB2312//IGNORE', $NLfive[0]));
$document->setValue('b5',iconv('utf-8', 'GB2312//IGNORE', $NLfive[1]));
$document->setValue('z5',iconv('utf-8', 'GB2312//IGNORE', $NLfive[2]));
$document->setValue('n6',iconv('utf-8', 'GB2312//IGNORE', $NLsix[0]));
$document->setValue('b6',iconv('utf-8', 'GB2312//IGNORE', $NLsix[1]));
$document->setValue('z6',iconv('utf-8', 'GB2312//IGNORE', $NLsix[2]));


 require("../conn.php");
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
        	
//  //       $sql="SELECT a.工程id,a.内容,b.违章部位 FROM 处罚条目  a,预览数据表  b WHERE a.工程id=b.工程id AND a.通知单编号=b.通知单编号 AND a.通知单编号='".$tzdbh1."' AND a.工程id='$gcid1'";
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
			if($d<10){
			for($b=0;$b<$d;$b++){
					$e=$b+1;
					$x=$e.".".$c[$b]."。"."(部位：".$part[$b].")";
$document->setValue($e,iconv('utf-8', 'GB2312//IGNORE', $x));
			
				}
			}
			if ($d<10){
			 $y=10-$d;
			 $n=$d+1;
            	for($z=0;$z<$y;$z++){
            		$null= "\r" ;
$document->setValue($n,iconv('utf-8', 'GB2312//IGNORE', $null));
                    $n++;
            }
		  }
	$sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $a = explode("/",$row["下发整改时间"]);
		   $b = explode("-",$a[0]);
		   $c = count($b);
		   $year = $b[0] ;
		   $month=$b[1];
		   $day=$b[2];
		   $sj=$year.'年'.$month.'月'.$day.'日';
		   }
		   if($c<3){
		   	$b=array(" "," "," ");
		   }
		   $t1=$b[1].'月'.$b[2].'日';	
	 $sql = "select * from 通知单 where 时间戳='$sjc1' and 工程id='$gcid1' and 通知单编号='$tzdbh1' ";
           $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) { 
		   $a = explode(" ",$row["整改期限"]);
		   $b = explode("-",$a[0]);
		   $c = count($b);
		   }
		   if($c<3){
		   	$b=array(" "," "," ");
		   }	
          $t2=$b[1].'月'.$b[2].'日';
$t=$t1."--".$t2;
$document->setValue('time1',iconv('utf-8', 'GB2312//IGNORE', $t));

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
            $zgqk=$row["总公司批复意见"];
            $fgsyj=$row["批复意见"];
            $zgsyj=$row["总公司批复"];
           }
$document->setValue('qk',iconv('utf-8', 'GB2312//IGNORE', $zgqk));
$document->setValue('yj1',iconv('utf-8', 'GB2312//IGNORE', $fgsyj));
$document->setValue('yj2',iconv('utf-8', 'GB2312//IGNORE', $zgsyj));
$document->setValue('gcm',iconv('utf-8', 'GB2312//IGNORE', $Gcname));
$document->setValue('gs',iconv('utf-8', 'GB2312//IGNORE', $ssgs));
$document->setValue('time2',iconv('utf-8', 'GB2312//IGNORE', $sj));

//表二数据↑ 
$section = $PHPWord->createSection();
		
			$waring="";
			$ask="";
			$waring=explode("|*|",$table_two_waring);
			$waring_length=count($waring)-1;

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
					$E='a'.$e;
					$U='A'.$e;
					$Text=$e."."."整改内容：".$waring[$b]."。";
					$Text2="整改措施：".$ask[$b]."。";
		$document->setValue($E,iconv('utf-8', 'GB2312//IGNORE', $Text));
		$document->setValue($U,iconv('utf-8', 'GB2312//IGNORE', $Text2));
				}
			}
			if ($waring_length<12){
			 $y=24-$waring_length*2;
			 $m=$waring_length+1;			 
            	for($z=0;$z<$y;$z++){
			 $M='a'.$m;
			 $N='A'.$m;
    $document->setValue($M,iconv('utf-8', 'GB2312//IGNORE', $null));
    $document->setValue($N,iconv('utf-8', 'GB2312//IGNORE', $null));
    $m++;        		
            }
		  }


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
		    if($hello1[0]==""){
		   	$numbhello=count($hello);
		   	$hello1="";
		   	for($i=0;$i<$numbhello;$i++){
		   		$hello1.="add.jpg~*^*~";
		   		if($i==$numbhello-1){
		   		 $hello1 = explode("~*^*~",$hello1);
		   		}
		   	}
		   }
		   $hello2=explode("||",$row["内容"]);
           if($huifuNeirong==""){
           	for($h=1;$h<count($hello);$h++){
           		$huifuNeirong=$huifuNeirong."//";
           	}
           	$huifuNeirongArray=explode("//",$huifuNeirong);
           }
			for($index=0;$index<count($hello)-1;$index++) 
			{
//				  $imag="../hxajxt/upload/ ".$hello[$index];				
//				  $section->addMemoryImage($imag,array('width'=>275,'height'=>265));
				
			}	
			}
	$imageStyle = array('width'=>350, 'height'=>350, 'align'=>'left');
    $section->addImage('H.JPEG', $imageStyle);

//$imag="http://127.0.0.1:8082/hxajxt/phpword/H.JPEG";				
//$section->addMemoryImage($imag,array('width'=>275,'height'=>265));
$document->save('word/huaxi.docx');

//下载
	$file_name = "huaxi.docx"; 
	$file_dir = "word/"; 
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