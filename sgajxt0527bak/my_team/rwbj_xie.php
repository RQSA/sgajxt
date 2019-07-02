<?php
	require("../conn.php");
	
	$rwid=$_POST["rwid"];
	
	$rwmc=$_POST["rwmc"];	
	$rwlb=$_POST["rwlb"];
	$rwms=$_POST["rwms"];
	$rwcjr=$_POST["rwcjr"];
	$rwjsr=$_POST["rwjsr"];
	$rwjsr=$_POST["rwjsr"];
	$rwjsrhm=$_POST["rwjsrhm"];
	//$bwei=$_POST["bwei"];	
	$jzrq=$_POST["jzrq"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($rwid){
		$sql = "select * from 任务  where id='".$rwid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {			
			$sqli = "update 任务 set 任务名称='$rwmc',任务类别='$rwlb',任务描述='$rwms', 任务创建人='$rwcjr',任务接收人='$rwjsr',任务接收人号码='$rwjsrhm',截止日期='$jzrq',新建日期='$timestr' where id='".$rwid."'";
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