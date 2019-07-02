<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$sqldate="";
		$sql = "select * from 人员签到 where 工程id = '".$gcid."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","姓名":"'.$row["人员"].'","签到时间":"'.$row["签到时间"].'","签到状态":"'.$row["签到状态"].'"},';
			}
		}
		
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';	
	echo $json;
	$conn->close();	
?>