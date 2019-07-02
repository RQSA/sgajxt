<?php
	require ("../conn.php");
	$q = $_POST["q"];
	$s = $_POST["s"];
	$tzdbh = $_POST["tzdbh"];
	$sjc = $_POST["sjc"];
	$wztmtjnew = $_POST["wztmtjnew"];
	$mobile = $_POST["mobile"];
	
//	$s = '312521421';
//	$tzdbh = '1326861';
//	$sjc = '1484446924640';

	//录入时间
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($s){
		if($wztmtjnew=="wztmtjnew"){
			$sql = "select * from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				$sqli = "update 草稿条目新增临时保存表 set 违章条目 ='$s',对象='$q' where 通知单时间戳 = '$sjc'";
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='2';
				}
			} else {
				$sqli = "insert into 草稿条目新增临时保存表 (通知单时间戳,违章条目,对象,插入时间,手机) values ('$sjc','$s','$q','$timestr','$mobile')";
				if ($conn->query($sqli) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='1';
				}
			}
		}else{
			$sql = "select * from 处罚条目 where 时间戳='".$sjc."'";
			$result = $conn->query($sql);
			if ($result->num_rows < 0) {
				$jsonresult='1';
			} else {
				$sqli = "update 处罚条目 set 内容 = '$s',对象='$q' where 时间戳 = '$sjc'";
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