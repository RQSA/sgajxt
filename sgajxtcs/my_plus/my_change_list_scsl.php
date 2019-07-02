<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$sqldate = "";
	$sql = "select * from 质量实测基本信息 where 工程id='".$gcid."' order by id desc";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"id":"'.$row["id"].'","工程名称":"'.$row["工程名称"].'","部位":"'.$row["分项工程名称"].'","日期":"'.$row["创建时间"].'","检查人员":"'.$row["检查人员"].'","状态":"'.$row["状态"].'","时间戳":"'.$row["时间戳"].'"},';
		}
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
	$json = '['.$sqldate.$otherdate.']';	
	echo $json;
	$conn->close();		
?>