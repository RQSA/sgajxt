<?php
	require("../conn.php");		
	$xmid=$_POST["xmid"];
	$hfzt="未回复";
	$sqldate="";
	$sql = "select * from 任务 where 项目id='".$xmid."' and 回复状态='".$hfzt."' ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"任务名称":"'. $row["任务名称"].'"},';
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