<?php
	require("../conn.php");
	
	$rwid=$_POST["rwid"];
	
	$hfrq=$_POST["hfrq"];	
	$hfms=$_POST["hfms"];	
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($rwid){
		$sql = "select * from 任务  where id='".$rwid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {			
			$sqli = "update 任务 set 回复日期='$hfrq',回复描述='$hfms',回复创建日期='$timestr' where id='".$rwid."'";
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