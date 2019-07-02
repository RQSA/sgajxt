<?php
		require("../conn.php");
		$aaid=$_POST["aaid"];
		$shjgaa=$_POST["shjgaa"];
		$sql = "select * from 我的工程  where id='".$aaid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 我的工程 set 审核='".$shjgaa."'  where id='".$aaid."'";
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