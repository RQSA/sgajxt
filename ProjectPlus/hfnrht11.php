<?php	
	require("../conn.php");	
	$sjc=$_POST["sjc"];
	$num=$_POST["num"];
	
	$sqldate="";
	//$sqli = "select * from 预览数据表未分割  where 通知单时间戳='".$sjc."'";
	$sqli = "select * from 预览数据表  where 通知单时间戳='".$sjc."' and flag='".$num."'";
		
	$result = $conn->query($sqli);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"分公司批复":"'.$row["分公司批复"].'","总公司批复":"'.$row["总公司批复"].'"},';
		}
		$jsonresult='success';
	} else {
		$jsonresult='该地区无通告';
	}
		
	$otherdate = '{"result":"'.$jsonresult.'",
			"count":"'.$count.'"
			}';	
	$json = '['.$sqldate.$otherdate.']';
		
	echo $json;
	$conn->close();
	
?>