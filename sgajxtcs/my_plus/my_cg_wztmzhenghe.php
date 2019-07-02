<?php
    require("../conn.php");
	$sjc=$_POST["sjcTzd"];
	//组员的违章照片
	$pictureName=$_POST["pictureName"];
	//组长的违章照片-后来补上的
	$pictureNameNewFirst=$_POST["pictureNameNewFirst"];
	$wztmNew=$_POST["wztmNew"];
	$wzbwNew=$_POST["wzbwNew"];
	
	$sqldate="";
	$sql = "select * from 通知单 where 时间戳='".$sjc."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//添加图片附件
		$sql1 = "select * from 图片附件 where 时间戳='".$sjc."'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				//一开始组长的全部上传图片的
			 	//$pictureNameTj=$row["草稿附件"].$pictureName;
			 	//组长上传一张图片
			 	$pictureNameTj=$pictureNameNewFirst.$pictureName;
				$sqli = "update 图片附件 set 草稿附件='$pictureNameTj' where 时间戳='".$sjc."'";
				if ($conn->query($sqli) === TRUE) {
					$sqldate="success";
				} else {
					$sqldate="error";
				}
			}
		}
		
		
		//添加到违章条目
		$sql1 = "select * from 处罚条目 where 时间戳='".$sjc."'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$wztmNewTj=$row["内容"].$wztmNew;
			 	$wzbwNewTj=$row["对象"].$wzbwNew;
				$sqli = "update 处罚条目 set 内容='$wztmNewTj',对象='$wzbwNewTj' where 时间戳='".$sjc."'";
				if ($conn->query($sqli) === TRUE) {
					$sqldate="success";
				} else {
					$sqldate="error";
				}
			}
		}
		
		//删除新增草稿相关信息
		$sql1 = "select * from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
			$sqli = "delete from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."'";
			if ($conn->query($sqli) === TRUE) {
				$sqldate="success";
			} else {
				$sqldate="error";
			} 
		}
		
	}else{
		
	}
	
	$json='{
		"result":"'.$sqldate.'"
	}';
	echo $json;
	mysqli_close($conn);
	
?>