<?php
	require("../conn.php");
	$xmid=$_POST["xmid"];	
	$rwmc=$_POST["rwmc"];
	
	$sqldate="";
	$sql = "select * from 任务 where 项目id='".$xmid."' and 任务名称='".$rwmc."' ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"时间戳":"'.$row["时间戳"].'","任务类别":"'.$row["任务类别"].'","任务描述":"'.$row["任务描述"].'","任务创建人":"'.$row["任务创建人"].'","任务接收人":"'.$row["任务接收人"].'","截止日期":"'.$row["截止日期"].'","新建日期":"'.$row["新建日期"].'"},';
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