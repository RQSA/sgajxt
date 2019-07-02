<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
	$tzdbh=$_POST["tzdbh"];
	$gcmc=$_POST["gcmc"];
	$gcid=$_POST["gcid"];
	$sjc=$_POST["sjc"];
//	if($lx=="rwfj"){
//		$lx="任务附件";	
//	}elseif ($lx=="hffj") {
//		$lx="回复附件";	
//	}else {
//		$lx="任务附件";
//	}
	//$sql = "select * from 图片附件 where 通知单编号='".$tzdbh."'";
	$sql = "select * from 通知单 where 时间戳='".$sjc."'";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//$sqli = "UPDATE 图片附件 set 草稿附件='$filenames' where 通知单编号='".$tzdbh."'' ";
		$jsonresult='1';
	} else {
		//$sqli = "UPDATE 通知单 set 草稿新增图片附件='$filenames' where 通知单编号='".$tzdbh."'' ";
		
		$sqli = "insert into 图片附件 (时间戳,工程id,工程名称,通知单编号,草稿附件) values ('$sjc','$gcid','$gcmc','$tzdbh','$filenames')";
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>