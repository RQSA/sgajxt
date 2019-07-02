<?php
	require ("../conn.php");
	
	//定义变量获取POST方法的值
	$tjfx = $_POST["tjfx"];
	$zt1 = $_POST["zt1"];
	$sqldate = "";
	if($tjfx == "xczg"){
		$star = $_POST["star"];
		$end = $_POST["end"];
		$sql = "select * from 通知单 where 通知单状态 = '".$zt1."' and 检查日期 between '".$star."' and '".$end."'";
		$result = $conn->query($sql);
		$student = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'"},';
			}
		} else { 
	
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"student":"'.$student.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else if($tjfx == "sbgl"){
		$zt = $_POST["zt"];
		$sql = "select 工程名称,起重机械名称,安装部位,实际安装日期 from 设备管理 where 设备类型 = '".$zt."'";
		$result = $conn->query($sql);
		$student = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","起重机械名称":"'. $row["起重机械名称"].'","安装部位":"'. $row["安装部位"].'","实际安装日期":"'. $row["实际安装日期"].'"},';
			}
		} else { 
	
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"student":"'.$student.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else if($tjfx == "wxy"){
		$zt = $_POST["zt"];
		$sql = "select * from 危险源 where 危险源类型 = '".$zt1."' and 危险源状态 = '".$zt."'";
		$result = $conn->query($sql);
		$student = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","危险源类型":"'. $row["危险源类型"].'","危险源状态":"'. $row["危险源状态"].'","施工部位":"'. $row["施工部位"].'"},';
			}
		} else { 
	
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"student":"'.$student.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else { 
	
		}
	
	
	echo $json;
	$conn->close();
?>