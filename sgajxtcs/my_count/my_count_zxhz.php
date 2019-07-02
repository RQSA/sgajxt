<?php
	require("../conn.php");
	$sqldate = "";
	$sql = "select DISTINCT 违章大类 from 违章数据库 ";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"违章大类":"'. $row["违章大类"].'"},';
		}
	} else { 
	
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
						}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>