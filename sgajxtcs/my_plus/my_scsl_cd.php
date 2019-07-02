<?php
	require("../conn.php");
	$sjc = $_POST["sjc"];
	$jlblx = $_POST["jlblx"];
	$sqldate = "";
	$sql = "select * from 实测实量数据  where 时间戳 = '".$sjc."' and 记录表类型 = '".$jlblx."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"id":"'.$row["id"].'","测点类型":"'.$row["检查内容"].'","D1":"'.$row["D1"].'","D2":"'.$row["D2"].'","D3":"'.$row["D3"].'","D4":"'.$row["D4"].'","D5":"'.$row["D5"].'","D6":"'.$row["D6"].'","D7":"'.$row["D7"].'","D8":"'.$row["D8"].'","D9":"'.$row["D9"].'","D10":"'.$row["D10"].'","状态1":"'.$row["状态1"].'","状态2":"'.$row["状态2"].'","状态3":"'.$row["状态3"].'","状态4":"'.$row["状态4"].'","状态5":"'.$row["状态5"].'","状态6":"'.$row["状态6"].'","状态7":"'.$row["状态7"].'","状态8":"'.$row["状态8"].'","状态9":"'.$row["状态9"].'","状态10":"'.$row["状态10"].'"},';
		}
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>