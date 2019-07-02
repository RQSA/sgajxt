<?php
	require("../conn.php");
	$scid = $_POST["scid"];
	$gcid = $_POST["gcid"];
	$sjc  = $_POST["sjc"];
	$sql = "select 记录表类型 from `质量实测基本信息` where id = '".$scid."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$jlb = $row["记录表类型"];
		}
	}
	$sqldate = "";
	$jlblx = explode(",", $jlb);
	$len = count($jlblx);
	for($i=0;$i<$len;$i++){
		$sqldate = $sqldate.'{"记录表类型":"'.$jlblx[$i].'"},';
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>