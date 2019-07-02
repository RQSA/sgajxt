<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$flag = $_POST["flag"];
	$sqldate="";
	if($flag=="renyuan"){
		$sql = "select * from 工程信息_人员信息 where 工程id = '".$gcid."'";
		//$sql = "select * from 我的工程 where id = '".$gcid."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程id":"'.$row["工程id"].'","工程名称":"'.$row["工程名称"].'","姓名":"'.$row["姓名"].'","性别":"'.$row["性别"].'","管理层次":"'.$row["管理层次"].'","职务类别":"'.$row["职务类别"].'","身份证号":"'.$row["身份证号"].'","手机号码":"'.$row["手机号码"].'"},';
				//$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程名称":"'.$row["工程名称"].'","项目经理":"'.$row["项目经理"].'","安全主管":"'.$row["安全主管"].'","安全员":"'.$row["安全员"].'","机械管理员":"'.$row["机械管理员"].'","责任人":"'.$row["责任人"].'"},';
			}
		}
		
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';	
	}else if($flag=="beian"){
		$sql = "select * from 我的工程 where id = '".$gcid."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"施工许可证取得情况":"'.$row["施工许可证取得情况"].'","开工报告":"'.$row["开工报告"].'","开工报告附件上传":"'.$row["开工报告附件上传"].'"},';
			}
		}
		
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="xxjd"){
		$sql = "select * from 我的工程 where id = '".$gcid."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"形象进度":"'.$row["形象进度"].'"},';
			}
		}
		
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else{
		
	}
	echo $json;
	$conn->close();	
?>