<?php
	require("../conn.php");
	$gcid=$_POST["gcid"];	
	$sqldate="";
	$sql = "select * from 我的工程 where id='".$gcid. "'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sjc = $row["时间戳"];
		 }
	}
	$sql1="select * from 工程管理人员 where 工程时间戳='".$sjc."'";
	$result1=$conn->query($sql1);
	if($result1->num_rows>0){
		while($row1 = $result1->fetch_assoc()){
			$sqldate = $sqldate.'{"部门":"'.$row1["部门"].'","岗位":"'.$row1["岗位"].'","姓名":"'.$row1["姓名"].'"}';
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