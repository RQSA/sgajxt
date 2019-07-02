<?php
	require ("../conn.php");
	$jccj=$_POST["jccj"];
	$xclb=$_POST["xclb"];
	$tzdbh=$_POST["tzdbh"];
	$jcdw=$_POST["jcdw"];
	$jcdx=$_POST["jcdx"];
	$jcrq=$_POST["jcrq"];
	$wzzt=$_POST["wzzt"];	
	$czgqx=$_POST["czgqx"];
	$sjc=$_POST["sjc"];

	//录入时间
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$sql = "select * from 处罚条目 where 通知单编号='".$tzdbh."'";
	$result = $conn->query($sql);
	if ($result->num_rows < 0) {
		$jsonresult='1';
	} else {
		$sqli = "update 通知单 SET 检查层级='$jccj',巡查类别='$xclb',时间戳='$sjc',检查单位='$jcdw',检查对象='$jcdx',检查日期='$jcrq',违章状态='$wzzt',整改期限='$czgqx' WHERE 通知单编号 = '$tzdbh'";
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