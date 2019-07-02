<?php
	require("../conn.php");
	$jcnr = $_POST["jcnr"];
	$sql = "select * from `质量实测检查内容` where 检查内容 = '".$jcnr."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = '{"测点类型":"'.$row["测点类型"].'","项目":"'.$row["项目"].'","测量标准max":"'.$row["测量标准max"].'","测量标准min":"'.$row["测量标准min"].'"},';
		}
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>