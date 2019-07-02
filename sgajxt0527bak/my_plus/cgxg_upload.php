<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$mchen=$_POST["mchen"];
	$tzdbh=$_POST["tzdbh"];
	$gcmc=$_POST["gcmc"];
	$gcid=$_POST["gcid"];
	$sjc=$_POST["sjc"];
	$wztmXz=$_POST["wztmXz"];
	$mobile=$_POST["mobile"];
	
	$tmXz=$_POST["tmXz"];
	$wzbwXz=$_POST["wzbwXz"];
	
	//录入时间
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$sql = "select * from 通知单 where 时间戳='".$sjc."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//判断图片附件是否存在照片
		$sqli1 = "select * from 图片附件 where 时间戳='".$sjc."'";
		//$sqli4 = "select * from 草稿条目附件临时保存表 where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
		$sqli4 = "select * from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
		if($wztmXz=="wztmtjnew"){
			$result = $conn->query($sqli4);
		}else{
			$result = $conn->query($sqli1);
		}
		if ($result->num_rows > 0) {
			//照片存在，直接更新照片名称
			if($wztmXz=="wztmtjnew"){
				//$sqli2 = "update 草稿条目附件临时保存表 set 草稿附件='$filenames' where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
				$sqli2 = "update 草稿条目新增临时保存表 set 草稿附件='$filenames',违章条目='$tmXz',对象='$wzbwXz' where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
			}else{
				$sqli2 = "update 图片附件 set 草稿附件='$filenames' where 时间戳='".$sjc."'";
			}
			if ($conn->query($sqli2) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}	
		}else{
			//照片不存在，插入一条记录
			if($wztmXz=="wztmtjnew"){
				//$sqli3 = "insert into 草稿条目附件临时保存表 (通知单时间戳,草稿附件,录入时间,手机) values ('$sjc','$filenames','$timestr','$mobile')";
				$sqli3 = "insert into 草稿条目新增临时保存表 (通知单时间戳,违章条目,对象,草稿附件,插入时间,手机) values ('$sjc','$tmXz','$wzbwXz','$filenames','$timestr','$mobile')";
			}else{
				$sqli3 = "insert into 图片附件 (时间戳,工程id,工程名称,通知单编号,草稿附件) values ('$sjc','$gcid','$gcmc','$tzdbh','$filenames')";
			}
			if ($conn->query($sqli3) === TRUE) {
				$jsonresult='success';
				//echo $sqli;
			} else {
				$jsonresult='error';
			}
		}
		
	} else {
		$jsonresult='1';
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>