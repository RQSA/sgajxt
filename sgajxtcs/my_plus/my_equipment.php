<?php
	require("../conn.php");
	$sbzt = $_POST["sbzt"];
	$gcmc = $_POST["gcmc"];
	$gcid = $_POST["gcid"];
	
	$sqldate="";
	if($sbzt=='全部' or $sbzt=='quanbu' ){
		$sql = "select * from 设备管理 where 工程id='".$gcid."'  order by 设备状态  desc";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程id":"'.$row["工程id"].'","工程名称":"'.$row["工程名称"].'","设备类型":"'.$row["设备类型"].'","安装单位":"'.$row["安装单位名称"].'","规格型号":"'.$row["规格型号"].'","安装部位":"'.$row["安装部位"].'","计划安装日期":"'.$row["计划安装日期"].'","实际安装日期":"'.$row["实际安装日期"].'","安装验收日期":"'.$row["安装验收日期"].'","设备状态":"'.$row["设备状态"].'","设备类别":"'.$row["设备类别"].'","起重机械名称":"'.$row["起重机械名称"].'","类型":"'.$row["类型"].'","自编号":"'.$row["工地自编号"].'"},';
			}
		}
	
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
	} else if($sbzt!='全部' and $sbzt!='quanbu'){
		$sql = "select * from 设备管理 where 设备状态='".$sbzt."' and 工程id='".$gcid."'  ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程id":"'.$row["工程id"].'","工程名称":"'.$row["工程名称"].'","设备类型":"'.$row["设备类型"].'","安装单位":"'.$row["安装单位名称"].'","规格型号":"'.$row["规格型号"].'","安装部位":"'.$row["安装部位"].'","计划安装日期":"'.$row["计划安装日期"].'","实际安装日期":"'.$row["实际安装日期"].'","安装验收日期":"'.$row["安装验收日期"].'","设备状态":"'.$row["设备状态"].'","设备类别":"'.$row["设备类别"].'","起重机械名称":"'.$row["起重机械名称"].'","类型":"'.$row["类型"].'","自编号":"'.$row["工地自编号"].'"},';
			}
		}
	
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
	}
	echo $json;
	$conn->close();	
?>