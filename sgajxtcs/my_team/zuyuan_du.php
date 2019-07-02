<?php
	require("../conn.php");
	$xmid=$_POST["xmid"];	
	
	$sqldate="";
	$sql = "select * from 组员信息   where 项目id='".$xmid. "'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"时间戳":"'. $row["时间戳"].'","姓名":"'. $row["姓名"].'","职务":"'. $row["职务"].'","手机":"'. $row["手机"].'","邮箱":"'.$row["邮箱"].'"},';
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