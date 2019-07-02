<?php
	require("conn.php");

	$email=$_POST["email"];

	 $sql = "select * from 用户信息 where 邮箱='".$email."'";
	 $result = $conn->query($sql);
	 $sqldate="";
	 if ($result->num_rows > 0) { //返回结果集中的行数
	 	$jsonresult='success';
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"密码":"'.$row["密码"].'","账号":"'.$row["账号"].'"},';
		 }
	} else {		
		$jsonresult='error';
	}
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>