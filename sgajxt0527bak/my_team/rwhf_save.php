<?php
	require("../conn.php");
	
	$sjc=$_POST["sjc"];	
	$hfrq=$_POST["hfrq"];
	$hfms=$_POST["hfms"];	
	
	$hfzt='已回复';
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($sjc){
		$sql = "select * from 任务 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {			
			$sqli = "update 任务 set 回复状态='$hfzt',回复日期='$hfrq', 回复描述='$hfms',回复创建日期='$timestr' where 时间戳='".$sjc."'";
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
		$conn->close();
	
	}
?>