<?php
	require("../conn.php");
	$gid=$_POST["id"];	
	
	$sqldate="";
	$sql = "select * from 通知单 where id='".$gid."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"检查层级":"'.$row["检查层级"].'","巡查类别":"'.$row["巡查类别"].'","通知单编号":"'.$row["通知单编号"].'","检查单位":"'.$row["检查单位"].'","检查对象":"'.$row["检查对象"].'","检查类型":"'.$row["检查类型"].'","违章大类":"'.$row["违章大类"].'","检查日期":"'.$row["检查日期"].'","时间戳":"'.$row["时间戳"].'","违章状态":"'.$row["违章状态"].'","整改期限":"'.$row["整改期限"].'"},';
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