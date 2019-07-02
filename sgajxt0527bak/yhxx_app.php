<?php
	require("conn.php");
	//接收POST方法值
	$mobile=$_POST["mobile"];
	//$mobile='15390915320';
	$flag=$_POST["flag"];
	
	if($flag=="huoqu"){
		$sqldate="";
		$sqli = "select * from 用户信息  where 手机='".$mobile."' and 设备='手机'";
		$result = $conn->query($sqli);
		$count=mysqli_num_rows($result); //返回结果集行数
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","账号":"'.$row["账号"].'","密码":"'.$row["密码"].'","邮箱":"'.$row["邮箱"].'","手机":"'.$row["手机"].'"},';
			}
			$jsonresult='success';
		} else {
			$jsonresult='数据表无该时间戳';
		}
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';	
		$json = '['.$sqldate.$otherdate.']';
		echo $json;
	}else{
		$account=$_POST["account"];
		$passWord=$_POST["passWord"];	
		$email=$_POST["email"];
		$shouji=$_POST["sjj"];
		$sql = "select * from 用户信息 where 手机='".$shouji."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 用户信息 set 账号='$account',密码='$passWord',邮箱='$email',手机='$mobile' where 手机='".$shouji."' and 设备='手机'";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		} else {
			$jsonresult='1';
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
	}
	
	
	$conn->close();
?>