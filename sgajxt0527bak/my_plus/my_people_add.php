<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$gcmc = $_POST["gcmc"];
	$xming = $_POST["xming"];
	$gender = $_POST["gender"];
	$glcc = $_POST["glcc"];
	$zwlb = $_POST["zwlb"];
	$sfzh = $_POST["sfzh"];
	$sji = $_POST["sji"];
	$zysjc = $_POST["zysjc"];
	$sql = "select * from 工程信息_人员信息 where 时间戳='".$zysjc."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$jsonresult='1';
	}else{
		$sqli = "insert into 工程信息_人员信息(时间戳,工程id,工程名称,姓名,性别,管理层次,职务类别,身份证号,手机号码)
		values ('$zysjc','$gcid','$gcmc','$xming','$gender','$glcc','$zwlb','$sfzh','$sji')";
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