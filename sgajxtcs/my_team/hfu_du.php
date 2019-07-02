<?php
	require("../conn.php");
	$xmid=$_POST["xmid"];
	
	$hfzt="已回复";
	$sqldate="";
	$sql = "select * from 任务 where 项目id='".$xmid."' and 回复状态='".$hfzt."' order by id desc";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'.$row["id"].'","任务名称":"'.$row["任务名称"].'","任务类别":"'.$row["任务类别"].'","任务创建人":"'.$row["任务创建人"].'","任务接收人":"'.$row["任务接收人"].'","回复日期":"'.$row["回复日期"].'","回复创建日期":"'.$row["回复创建日期"].'"},';
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