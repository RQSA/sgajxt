<?php
    require("../conn.php");
    $sjc = $_POST["sjc"];
	
	$sqldate="";
	$sql = "select * from 设备管理  where 时间戳 = '".$sjc."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程id":"'.$row["工程id"].'","工程名称":"'.$row["工程名称"].'","设备类型":"'.$row["设备类型"].'","安装部位":"'.$row["安装部位"].'","设备产权备案号":"'.$row["设备产权备案号"].'","型号":"'.$row["规格型号"].'","生产制造单位":"'.$row["生产制造单位"].'","出厂日期":"'.$row["出厂日期"].'","出厂编号":"'.$row["出厂编号"].'","最大起重力矩":"'.$row["最大起重力矩"].'","设计最大起升高度":"'.$row["设计最大起升高度"].'","最大起重量":"'.$row["最大起重量"].'","本工理桩高度":"'.$row["本工理桩高度"].'","设备状态":"'.$row["设备状态"].'","起重机械名称":"'.$row["起重机械名称"].'","制造单位":"'.$row["制造单位"].'","工地自编号":"'.$row["工地自编号"].'","登记日期":"'.$row["登记日期"].'","省网告知流水号":"'.$row["省网告知流水号"].'","产权单位名称":"'.$row["产权单位名称"].'","工程项目安全监督登记号":"'.$row["工程项目安全监督登记号"].'","设备状态":"'.$row["设备状态"].'"},';
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