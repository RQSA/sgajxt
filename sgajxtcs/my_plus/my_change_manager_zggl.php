<?php
	require("../conn.php");
	$sjc=$_POST["sjc"]; // 通知单这张表的时间戳
	$div_text=$_POST["div_text"]; //框的颜色值判断，是一串只有 0 和 1 以 || 这个作为分割符号串在一起的字符串。example：0||1||0||……1||
	$fgspf3=$_POST["fgspf3"]; //分公司批复意见
	$zgspf3=$_POST["zgspf3"];
	$pfyj3=$_POST["pfyj3"];
	$pfr3=$_POST["pfr3"];
	$pfrq3=$_POST["pfrq3"];
	//总公司
	$zCompanyyijian=$_POST["zCompanyyijian"]; //总公司批复意见
	$zComnpanypfr=$_POST["zComnpanypfr"];
	$zCompanypfrq=$_POST["zCompanypfrq"];
	$flag=$_POST["flag"]; //这个标志是判断手机是不是总公司的号码，Yes是总公司，No是分公司或者项目部
	$jcCj=$_POST["jcCj"]; //检查层级
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	//判断是否为全1还是不全为1的方法-----方法一是：的要求是通过绿框来判断，全绿表示批复通过，没有全绿表示批复未通过。
//	$str=$div_text;
//	$arr=explode("||",$str);
//	$num=count($arr)-1;
//	$xunhuanZ="";
//	$xunhuan="";
//	for($i=0;$i<$num;$i++){
//		$xunhuanZ.=$arr[$i];
//	}
//	for($i=0;$i<$num;$i++){
//		if($arr[$i]/1==0){
//			
//		}else{
//			$xunhuan.=$arr[$i];
//		}
//	}
//	if($xunhuanZ===$xunhuan){
//		//echo "全为1"."</br>";
//		if($flag=="Yes"){
//			if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){
//				$tzdzt="已完成";
//				$dfzt="已批复";
//			}else{
//				$tzdzt="已完成";
//				$dfzt="已批复";
//			}
//		}else{
//			if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){
//				$tzdzt="整改中";
//				$dfzt="待总公司批复";
//			}else{
//				$tzdzt="已完成";
//				$dfzt="已批复";
//			}
//		}
//		
//	}else{
//		//echo "不全为1"."</br>";
//		if($flag=="Yes"){
//			if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){
//				$tzdzt="未完成";
//				$dfzt="已批复";
//			}else{
//				$tzdzt="未完成";
//				$dfzt="已批复";
//			}
//		}else{
//			if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){
//				$tzdzt="整改中";
//				$dfzt="待总公司批复";
//			}else{
//				$tzdzt="未完成";
//				$dfzt="已批复";
//			}
//		}
//	}
	////////////////         以上是：       
	//////////                方法一  ---通过绿框来判断。
	///////////////
	
	// 需求更换为通过判断批复意见是否为合格和不合格，还是部分合格来判断完成程度。
	if($flag=="Yes"){//先判断手机号码是不是总公司的
		if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){//判断通知单的检查层级
			if($zCompanyyijian=="合格"){//判断总公司的批复意见
				$tzdzt="已完成";
				$dfzt="已批复";
			}else{
				$tzdzt="整改中";
				$dfzt="已批复";
			}
		}else{
			if($zCompanyyijian=="合格"){//判断总公司的批复意见
				$tzdzt="已完成";
				$dfzt="已批复";
			}else{
				$tzdzt="未完成";
				$dfzt="已批复";
			}
		}
	}else{
		if($jcCj=="总部巡查" or $jcCj=="总部季度检查" or $jcCj=="总部专项检查"){
			if($pfyj3=="合格"){
				$tzdzt="整改中";
				$dfzt="总公司需要在此编辑批复内容！";
			}else{
				$tzdzt="整改中";
				$dfzt="总公司不给予该单批复！";
			}
		}else{
			//验证 OK
			if($pfyj3=="合格"){
				$tzdzt="已完成";
				$dfzt="已批复";
			}else{
				$tzdzt="未完成";
				$dfzt="已批复";
			}
		}
	}
	
	if($sjc){
		$sql = "select * from 通知单 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$ceshi="11";
			$sqli = "update 通知单 set 分公司批复='$fgspf3',总公司批复='$zgspf3',答复状态='$dfzt',批复意见='$pfyj3',批复人='$pfr3',批复日期='$pfrq3',总公司批复意见='$zCompanyyijian',总公司批复人='$zComnpanypfr',总公司批复日期='$zCompanypfrq',通知单状态='$tzdzt',违章状态='$tzdzt',状态标志='$div_text' where 时间戳='".$sjc."'";
			//图片附件
			$sqli1 = "update 图片附件 set 批复状态='$div_text' where 时间戳='".$sjc."'";
			if ($conn->query($sqli) === TRUE&&$conn->query($sqli1) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		} else {
			$ceshi="12";
			$jsonresult='1';
		}
		
		$json = '{"result":"'.$jsonresult.'",
					"$ceshi:":"'.$ceshi.'"
				}';
		echo $json;
		$conn->close();
	
	}
?>