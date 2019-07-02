<?php
    require("../conn.php");
	$name = $_POST["xming"];
	$job = $_POST["zwu"];
	$phoneNumber = $_POST["sji"];
	$email = $_POST["yxiang"];
	$projectID = $_POST["xmid"];
    $projectName = $_POST["xmmc"];
	$timestamp = $_POST["zysjc"]; //当前时间戳
	
	$time = getdate();
	$addTime = $time['year']."-".$time['mon']."-".$time['mday']." ".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	
	$sql = "select * from 组员信息 where 时间戳 = '".$timestamp."'";
	$result = $conn->query($sql);					
	if($result->num_rows > 0){
		$jsonresult='1';
	}else{
		$sqli = "insert into 组员信息(时间戳,姓名,职务,手机,邮箱,项目id,项目名称,添加时间)
		values ('$timestamp','$name','$job','$phoneNumber','$email','$projectID','$projectName','$addTime')";
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}					
	}
	
	$json = '{
		"result":"'.$jsonresult.'"
	}';
	echo $json;
	mysqli_close($conn);
		
		
?>
