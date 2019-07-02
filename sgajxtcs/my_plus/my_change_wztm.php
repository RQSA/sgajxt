<?php
	require ("../conn.php");
	$p = $_POST["q"];
	$s = $_POST["s"];
	$gcid = $_POST["gcid"];
	$gcmc = $_POST["gcmc"];
	$tzdbh = $_POST["tzdbh"];
	$sjc = $_POST["sjc"];
	$flagPicture = $_POST["flagPicture"];
	
//	$p = 'dsadsa';
//	$s = 'fdsfds';
//	$gcid = 'fdsfds';
//	$gcmc = 'fdsfsdfds';
//	$tzdbh = 'fdsfds';
//	$sjc = 'fdsfdsfd';
//	
	//录入时间
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($s){
		$sql = "select * from 处罚条目 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='1';
		} else {
			$sqli="insert into 处罚条目 (内容,工程id,工程名称,通知单编号,录入时间,时间戳,对象) values ('$s','$gcid','$gcmc','$tzdbh','$timestr','$sjc','$p')";
			//没有选择上传的照片
			$sqli1="insert into 图片附件 (时间戳,工程id,工程名称,通知单编号) values ('$sjc','$gcid','$gcmc','$tzdbh')";
			if($flagPicture=="wuPicture"){
				if ($conn->query($sqli) === TRUE and $conn->query($sqli1) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}else{
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}
			
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>