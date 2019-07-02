<?php
	require("conn.php");
	$account=$_POST["account"];
	$password=$_POST["password"];	
	$flag = "";
	$sql = "select * from 用户信息 where 账号='".$account."' and 设备='手机'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($password==$row["密码"])	{
		$mysql = "select * from 用户权限冻结表 where 手机 ='".$row["手机"]."'  ";
		$myresult = $conn->query($mysql);
		$count = mysqli_num_rows($myresult); 
		if ($myresult->num_rows > 0) {
			$jsonresult='error'; 
			$shji="";
			$userid="";
			$bumen="";
			$flag = "error";
		} else {
			$jsonresult='success';
	   		$shji=$row["手机"];
			$userid=$row["id"];
			$bumen=$row["部门"];
		}
//		$jsonresult='success';
// 		$shji=$row["手机"];
//		$userid=$row["id"];
//		$bumen=$row["部门"];
	}else{
		$jsonresult='error'; 
		$shji="";
		$userid="";
		$bumen="";
	}	
	$json = '{"result":"'.$jsonresult.'",
			"userid":"'.$userid.'",
			"bumen":"'.$bumen.'",
			"shji":"'.$shji.'",
			"myflag":"'.$flag.'"
			}';
	echo $json;
	$conn->close();
?>