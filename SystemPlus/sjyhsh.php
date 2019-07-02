<?php
		require("../conn.php");
		$sbid11=$_POST["sbid11"];
//		
		$sql = "select * from 用户信息  where id='".$sbid11."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 用户信息 set 审核='1'  where id='".$sbid11."'";
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