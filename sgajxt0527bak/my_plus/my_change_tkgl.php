<?php
	require ("../conn.php");
	$tzdbh= $_POST["tzdbh"];
	
	$sqldate="";
	$sql = "select * from 处罚条目 where 通知单编号='".$tzdbh."'";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程内容":"'.$row["内容"].'"},';
		}
		$jsonresult = 'success';
	} else {
		$jsonresult = '暂无数据';
	} 
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>