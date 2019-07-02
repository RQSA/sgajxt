<?php
	require("../conn.php");
	
	$gcid=$_POST["gcid"];
	$gcmc=$_POST["gcmc"];
	$jccj=$_POST["jccj"];
	$xclb=$_POST["xclb"];
	$tzdbh=$_POST["tzdbh"];
	$jcdw=$_POST["jcdw"];
	$jcdx=$_POST["jcdx"];
	$jcxm_jc=$_POST["jcxm_jc"];	
	$wzdl=$_POST["wzdl"];
	$jcrq=$_POST["jcrq"];
	$wzzt=$_POST["wzzt"];	
	$czgqx=$_POST["czgqx"];
	$okwetm=$_POST["okwetm"]; //违章条目
	$wzzpdjpd=$_POST["wzzpdjpd"]; //违章照片按钮返回的值
	$sjc=$_POST["sjc"];
	$sheng=$_POST["sheng"];
	$shi=$_POST["shi"];
	//项目相关人员
	$xmjl=$_POST["xmjl"];
	$scjl=$_POST["scjl"];
	$aqzj=$_POST["aqzj"];
	$aqy=$_POST["aqy"];
	$gz=$_POST["gz"];
	$zrr=$_POST["zrr"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($gcid){
		$sql = "select * from 通知单 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			if($wzzpdjpd==""){
				$sqli = "insert into 通知单 (工程id,工程名称,检查层级,时间戳, 巡查类别,通知单编号,检查单位, 检查对象,检查类型,违章大类,检查日期,违章状态,整改期限,草稿新建日期,通知单状态,地区省,地区市,项目经理,生产经理,安全总监,安全员,工长,责任人) values ('$gcid','$gcmc','$jccj','$sjc','$xclb','$tzdbh','$jcdw','$jcdx','$jcxm_jc','$wzdl','$jcrq','$wzzt','$czgqx','$timestr','草稿','$sheng','$shi','$xmjl','$scjl','$aqzj','$aqy','$gz','$zrr')";
				
				//保存违章条目
				$sqli1 = "insert into 处罚条目 (内容,工程id,工程名称,通知单编号,录入时间,时间戳) values ('$okwetm','$gcid','$gcmc','$tzdbh','$timestr','$sjc')";
				
				$sqli2 = "insert into 图片附件 (工程id,工程名称,通知单编号,时间戳) values ('$gcid','$gcmc','$tzdbh','$sjc')";
				
				if ($conn->query($sqli1) === TRUE&&$conn->query($sqli) === TRUE&&$conn->query($sqli2) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			
			}else{
				$sqli = "insert into 通知单 (工程id,工程名称,检查层级,时间戳, 巡查类别,通知单编号,检查单位, 检查对象,检查类型,违章大类,检查日期,违章状态,整改期限,草稿新建日期,通知单状态,地区省,地区市,项目经理,生产经理,安全总监,安全员,工长,责任人) values ('$gcid','$gcmc','$jccj','$sjc','$xclb','$tzdbh','$jcdw','$jcdx','$jcxm_jc','$wzdl','$jcrq','$wzzt','$czgqx','$timestr','草稿','$sheng','$shi','$xmjl','$scjl','$aqzj','$aqy','$gz','$zrr')";
				
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>