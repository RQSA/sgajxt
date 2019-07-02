<?php
		require("../conn.php");
		$sbzt=$_POST["sbzt"];
		$sbid=$_POST["sbid"];
//		
		$sql = "select * from 设备管理 where id='".$sbid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 设备管理 set 设备状态='$sbzt'  where id='".$sbid."'";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='update失败';
			}
		} else {
			$jsonresult='数据表无该时间戳';
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';	
		
		echo $json;
		$conn->close();		
?>