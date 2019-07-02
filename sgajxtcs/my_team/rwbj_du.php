<?php
	require("../conn.php");
	$rwid=$_POST["rwid"];	
	
	$sqldate="";
	$sql = "select * from 任务 where id='".$rwid."' ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"任务名称":"'.$row["任务名称"].'","任务类别":"'.$row["任务类别"].'","任务描述":"'.$row["任务描述"].'","任务创建人":"'.$row["任务创建人"].'","任务接收人":"'.$row["任务接收人"].'","任务接收人号码":"'.$row["任务接收人号码"].'","截止日期":"'.$row["截止日期"].'","时间戳":"'.$row["时间戳"].'","任务附件":"'.$row["任务附件"].'","回复日期":"'.$row["回复日期"].'","回复描述":"'.$row["回复描述"].'","回复附件":"'.$row["回复附件"].'"},';
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