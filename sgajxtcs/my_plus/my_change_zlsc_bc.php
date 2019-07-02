<?php
	require("../conn.php");
	$t=time();
	$time = date('Y-m-d',$t);
	$sjc = $_POST["sjc"];
	$zzt = array();
	$i=0;
	$sql = "select * from 实测实量数据 where 时间戳='".$sjc."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			if($row["D1"]===null||$row["D2"]===null||$row["D3"]===null||$row["D4"]===null||$row["D5"]===null||$row["D6"]===null||$row["D7"]===null||$row["D8"]===null||$row["D9"]===null||$row["D10"]===null){
				$sql1 = "update 实测实量数据 set 状态 = '0',测量时间='".$time."' where id = '".$row["id"]."'";
				$result1 = $conn->query($sql1);
			}else{
				$sql1 = "update 实测实量数据 set 状态 = '1',测量时间='".$time."' where id = '".$row["id"]."'";
				$result1 = $conn->query($sql1);
			}
			$zzt[$i]=$row["状态"];
			$i++;
		}
	}
	$count = count($zzt);
	$n=0;
	for($j=0;$j<$count;$j++){
		if($zzt[$j]==1){
			$n++;
		}
	}
	if($n==$count){
		$sql2 = "update 质量实测基本信息 set 状态 = '1' where 时间戳 = '".$sjc."'";
		$result2 = $conn->query($sql2);
	}else{
		$sql2 = "update 质量实测基本信息 set 状态 = '0' where 时间戳 = '".$sjc."'";
		$result2 = $conn->query($sql2);
	}
	$conn->close();
?>