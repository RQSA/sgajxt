<?php
	require("../conn.php");
	$sjc=$_POST["sjc"];
	$sqldate = "";
	$sql = "select distinct 内容 from 处罚条目 where 时间戳 = '".$sjc."'";
	
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
	 		$sqldate= $sqldate.'{"内容":"'.$row["内容"].'"},';
		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
			
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>