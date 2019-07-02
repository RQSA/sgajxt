<?php
	require("conn.php");
	
	$account=$_POST["account"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$shji=$_POST["shji"];
	$fgsxz=$_POST["fgsxz"];
	$name=$_POST["name"];
	//$bmxz=$_POST["bmxz"];
	
	//$zhuhe=$fgsxz.'-'.$bmxz;
	
	if($account){
	$sql = "select * from 用户信息 where 账号='".$account."' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$jsonresult='1';
	} else {
		$sql = "select * from 用户信息 where 手机='".$shji."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='0';
		} else{
			$sql = "select * from 用户信息 where 邮箱='".$email."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			$jsonresult='2';
			} else{
				$sqli = "insert into 用户信息 (账号,密码,邮箱,手机,部门,姓名,设备) values ('$account', '$password', '$email', '$shji','$fgsxz','$name','手机')";
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
				$jsonresult='error';
				}
			}
		}
	}	
	$json = '{"result":"'.$jsonresult.'"		
				}';
	echo $json;
	$conn->close();

	}
?>