<?php
	require("conn.php");

	$flag=$_POST["flag"];
	
	if ($flag==='account') {
		$account=$_POST["account"];
	 	$sql = "select * from 用户信息 where 账号='".$account."'";
	 	$result = $conn->query($sql);
	 	if ($result->num_rows > 0) { //返回结果集中的行数
			$jsonresult='error';
		} else {		
			$jsonresult='success';
		}
		$json = '{"result":"'.$jsonresult.'"		
			}';
	} else if ($flag==='shji') {
		$shji=$_POST["shji"];
		
		$sql = "select * from 用户信息 where 手机='".$shji."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) { //返回结果集中的行数
			$jsonresult='error';
		} else {		
			$jsonresult='success';
		}	
		$json = '{"result":"'.$jsonresult.'"		
			}';	
	} else if ($flag==='email') {
		$email=$_POST["email"];
		
		$sql = "select * from 用户信息 where 邮箱='".$email."'";
			$result = $conn->query($sql);
		if ($result->num_rows > 0) { //返回结果集中的行数
			$jsonresult='error';
		} else {		
			$jsonresult='success';
		}
		$json = '{"result":"'.$jsonresult.'"		
			}';
	} else {
		
	}
	echo $json;
	$conn->close();	
		
?>