<?php	
	require("../conn.php");	
	$sqli = "select * from 组员职务  ";
	$sqldate="";
	$result = $conn->query($sqli);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","职务类型":"'.$row["职务类型"].'","添加时间":"'.$row["添加时间"].'"},';
		}
		$jsonresult='success';
	} else {
		$jsonresult='数据表无该时间戳';
	}
	$otherdate = '{"result":"'.$jsonresult.'",
			"count":"'.$count.'"
			}';	
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
		
?>