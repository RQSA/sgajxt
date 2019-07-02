<?php
	require("../conn.php");
	$qsrqvalue=$_POST["star"]; //起始日期
	$jsrqvalue=$_POST["end"]; //截止日期
	$gcid=$_POST["gcid"]; //工程名称
	
	$showtime=date("Y-m-d");
	
	//去掉字符串最后一个字符
	$newstr = substr($gcid,0,strlen($gcid)-1);
	$gcidNew = explode(',',$newstr);
	
	$cgCount=0;
	for($index=0;$index<count($gcidNew);$index++){
		//草稿
		$sql1 = "select count(*) as allnumCg from 通知单 where 通知单状态='草稿' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
		$result1 = $conn->query($sql1);
		if($result1->num_rows > 0){
			while($row = $result1->fetch_assoc()){
				$countCg = $row["allnumCg"];
			}
		}
		$cgCount=$cgCount+$countCg;
	} 
	
	//判断是否逾期
	$countYuqi="0";
	$yuqiCount=0;
	for($index=0;$index<count($gcidNew);$index++){
//		$sql2 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
//		$result2 = $conn->query($sql2); 
//		if ($result2->num_rows > 0) {
//			while($row = $result2->fetch_assoc()) {
				$sql9 = "select count(*) as allnumYuqi from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."' and cast(整改期限  as datetime) < '$showtime'";
				$result9 = $conn->query($sql9);
				if($result9->num_rows > 0){
					while($row = $result9->fetch_assoc()){
						$countYuqi = $row["allnumYuqi"];
					}
				}else{
					
				}
//			}
//		}
		$yuqiCount=$yuqiCount+$countYuqi;
	} 
	
	
	//整改中
	$zgzCount=0;
	for($index=0;$index<count($gcidNew);$index++){
		$sql2 = "select count(*) as allnumZgz from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."' and cast(整改期限  as datetime) > '$showtime'";
		$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			while($row = $result2->fetch_assoc()){
				$countZgz = $row["allnumZgz"];
			}
		}
		$zgzCount=$zgzCount+$countZgz;
	}
	
	//延期
	$yanqiCount=0;
	for($index=0;$index<count($gcidNew);$index++){
		$sql3 = "select count(*) as allnumYanqi from 通知单 where 通知单状态='延期' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
		$result3 = $conn->query($sql3);
		if($result3->num_rows > 0){
			while($row = $result3->fetch_assoc()){
				$countYanqi = $row["allnumYanqi"];
			}
		}
		$yanqiCount=$yanqiCount+$countYanqi;
	}

	//未完成
	$wwcCount=0;
	for($index=0;$index<count($gcidNew);$index++){
		$sql5 = "select count(*) as allnumWwc from 通知单 where 通知单状态='未完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
		$result5 = $conn->query($sql5);
		if($result5->num_rows > 0){
			while($row = $result5->fetch_assoc()){
				$countWwc = $row["allnumWwc"];
			}
		}
		$wwcCount=$wwcCount+$countWwc;
	}
	
	//已完成
	$ywcCount=0;
	for($index=0;$index<count($gcidNew);$index++){
		$sql6 = "select count(*) as allnumYwc from 通知单 where 通知单状态='已完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
		$result6 = $conn->query($sql6);
		if($result6->num_rows > 0){
			while($row = $result6->fetch_assoc()){
				$countYwc = $row["allnumYwc"];
			}
		}
		$ywcCount=$ywcCount+$countYwc;
	}
	
	$sqldate="";
	$jsonresult='success';
//	$otherdate = '{"result":"'.$jsonresult.'",
//				"countCg":"'.$countCg.'",
//				"countZgz":"'.$countZgz.'",
//				"countYanqi":"'.$countYanqi.'",
//				"countYuqi":"'.$countYuqi.'",
//				"countWwc":"'.$countWwc.'",
//				"countYwc":"'.$countYwc.'"
//			}';
	$otherdate = '{"result":"'.$jsonresult.'",
				"countCg":"'.$cgCount.'",
				"countZgz":"'.$zgzCount.'",
				"countYanqi":"'.$yanqiCount.'",
				"countYuqi":"'.$yuqiCount.'",
				"countWwc":"'.$wwcCount.'",
				"countYwc":"'.$ywcCount.'"
			}';	
	$json = '['.$sqldate.$otherdate.']';
	
	echo $json;
	$conn->close();
	
?>