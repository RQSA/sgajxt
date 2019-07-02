<?php
	require("../conn.php");
	$sji=$_POST["sji"];
	$gcid=$_POST["gcid"];
	$gcmc=$_POST["gcmc"];
	$sjc=$_POST["sjc"];
	$xm=$_POST["xm"];
	$bumen=$_POST["bumen"];
	$flag=$_POST["flag"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($flag=="xxpp"){
		//信息匹配
		$sqldate="";
		$sql = "select * from 人员签到 where 时间戳='".$sjc."' and 联系方式='".$sji."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"姓名":"'.$row["人员"].'","联系方式":"'.$row["联系方式"].'","签到状态":"'.$row["签到状态"].'"},';
			 }
		} else {
			
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="wqd"){
		//未签到信息匹配
		$sqldate="";
		$sql = "select * from 用户信息 where 手机='".$sji."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"姓名":"'.$row["姓名"].'","手机":"'.$row["手机"].'"},';
			 }
		} else {
			
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="select"){
		$qdTime=$_POST["qdTime"];
		//签到状态信息验证
		$sql = "select * from 人员签到 where 签到时间 like '".$qdTime."%' and 工程id='".$gcid."' and 联系方式='".$sji."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='OK';
		} else {
			$jsonresult='NO';
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
	}else if($flag=="update"){
		$qdTime=$_POST["qdTime"];
		//签到信息录入
		$qdzt="已签到";
		$sql = "select * from 人员签到 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			$sqli = "insert into 人员签到 (工程id,工程名称,人员,签到时间, 时间戳,联系方式,记录插入时间, 签到状态,部门) values ('$gcid','$gcmc','$xm','$qdTime','$sjc','$sji','$timestr','$qdzt','$bumen')";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
	}else{
		
	}
	
	echo $json;
	$conn->close();	
		
?>