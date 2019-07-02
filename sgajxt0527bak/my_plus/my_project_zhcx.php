<?php
	require("../conn.php");
	$qsrqvalue=$_POST["qsrqvalue"]; //起始日期
	$jsrqvalue=$_POST["jsrqvalue"]; //截止日期
	$gcmc=$_POST["gcmc"]; //工程名称
	
	$showtime=date("Y-m-d");
	
	//草稿
	$sql1 = "select count(*) as allnumCg from 通知单 where 通知单状态='草稿' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
		while($row = $result1->fetch_assoc()){
			$countCg = $row["allnumCg"];
		}
	}
	
	//判断是否逾期
	$countYuqi="0";
	$sql2 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$result2 = $conn->query($sql2); 
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			$zgqx=$row["整改期限"];
			//$sql9 = "select count(*) as allnumYuqi from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc' and '$zgqx' between '$qsrqvalue'and '$jsrqvalue'";
			$sql9 = "select count(*) as allnumYuqi from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue'  and 工程名称='$gcmc' and cast(整改期限  as datetime) < '$showtime'";
			$result9 = $conn->query($sql9);
			if($result9->num_rows > 0){
				while($row = $result9->fetch_assoc()){
					$countYuqi = $row["allnumYuqi"];
				}
			}else{
				
			}
		}
	}
	
	
	//整改中
	//$sql2 = "select count(*) as allnumZgz from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$sql2 = "select count(*) as allnumZgz from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc' and cast(整改期限  as datetime) > '$showtime'";
	$result2 = $conn->query($sql2);
	if($result2->num_rows > 0){
		while($row = $result2->fetch_assoc()){
			$countZgz = $row["allnumZgz"];
		}
	}
	
	//延期
	$sql3 = "select count(*) as allnumYanqi from 通知单 where 通知单状态='延期' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$result3 = $conn->query($sql3);
	if($result3->num_rows > 0){
		while($row = $result3->fetch_assoc()){
			$countYanqi = $row["allnumYanqi"];
		}
	}
	
	//逾期
//	$sql4 = "select count(*) as allnumYuqi from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
//	$result4 = $conn->query($sql4);
//	if($result4->num_rows > 0){
//		while($row = $result4->fetch_assoc()){
//			$countYuqi = $row["allnumYuqi"];
//		}
//	}
	
	//未完成
	$sql5 = "select count(*) as allnumWwc from 通知单 where 通知单状态='未完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$result5 = $conn->query($sql5);
	if($result5->num_rows > 0){
		while($row = $result5->fetch_assoc()){
			$countWwc = $row["allnumWwc"];
		}
	}
	
	//已完成
	$sql6 = "select count(*) as allnumYwc from 通知单 where 通知单状态='已完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称='$gcmc'";
	$result6 = $conn->query($sql6);
	if($result6->num_rows > 0){
		while($row = $result6->fetch_assoc()){
			$countYwc = $row["allnumYwc"];
		}
	}
	
	$sqldate="";
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"countCg":"'.$countCg.'",
				"countZgz":"'.$countZgz.'",
				"countYanqi":"'.$countYanqi.'",
				"countYuqi":"'.$countYuqi.'",
				"countWwc":"'.$countWwc.'",
				"countYwc":"'.$countYwc.'"
			}';		
	$json = '['.$sqldate.$otherdate.']';
	
	echo $json;
	$conn->close();
	
?>