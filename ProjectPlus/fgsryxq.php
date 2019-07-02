<?php
	require("../conn.php");
	 $ssgs=$_POST["ssgs"];
	 
	 $sqldate="";
	$sql = "select * from 用户信息 where 部门='".$ssgs."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"姓名":"'.$row["姓名"].'","手机":"'.$row["手机"].'"},';
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