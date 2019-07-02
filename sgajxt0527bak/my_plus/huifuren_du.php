<?php
	require("../conn.php");
	$gcid=$_POST["gcid"];	
	$panduan=$_POST["panduan"];
	
	$sqldate="";
	
	if($panduan=="account_number_name"){
		$mobile=$_POST["mobile"];
		$sql = "select * from 用户信息 where 手机='".$mobile."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"姓名":"'. $row["姓名"].'","账号":"'. $row["账号"].'"},';
			}
		}else{
			
		}
	}else if($panduan=="project_related_people_name"){
		$sql = "select * from 我的工程 where id='".$gcid. "'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"生产经理":"'. $row["生产经理"].'","责任人":"'. $row["责任人"].'","安全总监":"'. $row["安全主管"].'","项目经理":"'. $row["项目经理"].'","安全员":"'. $row["安全员"].'"},';
			}
		}else{
			
		}
	}else{
		$sql = "select * from 我的工程 where id='".$gcid. "'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"时间戳":"'. $row["时间戳"].'","项目经理":"'. $row["项目经理"].'","安全主管":"'. $row["安全主管"].'","安全员":"'. $row["安全员"].'","机械管理员":"'.$row["机械管理员"].'","责任人":"'.$row["责任人"].'","部门负责人A":"'.$row["部门负责人A"].'","部门负责人B":"'.$row["部门负责人B"].'","部门负责人C":"'.$row["部门负责人C"].'","总公司负责人A":"'.$row["总公司负责人A"].'","总公司负责人B":"'.$row["总公司负责人B"].'","总公司负责人C":"'.$row["总公司负责人C"].'","生产经理":"'.$row["生产经理"].'","质量员":"'.$row["质量员"].'","总部巡查员":"'.$row["总部巡查员"].'","项目经理手机":"'. $row["项目经理手机"].'","安全主管手机":"'. $row["安全主管手机"].'","安全员手机":"'. $row["安全员手机"].'","机械管理员手机":"'. $row["机械管理员手机"].'","联系方式":"'. $row["联系方式"].'"},';
			 }
		} else {
			//echo "0 results";
		}
	}
	
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>