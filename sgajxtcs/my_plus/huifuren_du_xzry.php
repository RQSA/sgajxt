<?php
	require("../conn.php");
	$gcid=$_POST["gcid"];	
	
	$sqldate="";
	$sql = "select * from 我的工程 where id='".$gcid. "'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$gcSjc=$row["时间戳"];
			$sql1 = "select * from 工程管理人员 where 工程时间戳='".$gcSjc. "'";
			$result1 = $conn->query($sql1);
			$count1=mysqli_num_rows($result1);	
			if ($result1->num_rows > 0) {
				 while($row = $result1->fetch_assoc()) {
						$sqldate= $sqldate.'{"工程时间戳":"'. $row["工程时间戳"].'","岗位":"'. $row["岗位"].'","姓名":"'. $row["姓名"].'","联系方式":"'. $row["联系方式"].'"},';
					 }
			} else {
				//echo "0 results";
			}

		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count1.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>