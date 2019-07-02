<?php
	require("conn.php");
	$account=$_POST["account"];
	$password=$_POST["password"];	
	
	$sql = "select * from 用户信息 where 账号='".$account."' and 设备='手机'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($password==$row["密码"])	{
		$jsonresult='success';
   		$shji=$row["手机"];
		$userid=$row["id"];
		$bumen=$row["部门"];
	}else{
		$jsonresult='error'; 
		$shji="";
		$userid="";
		$bumen="";
	}	
	$json = '{"result":"'.$jsonresult.'",
			"userid":"'.$userid.'",
			"bumen":"'.$bumen.'",
			"shji":"'.$shji.'"
			}';
	echo $json;
	$conn->close();
?>