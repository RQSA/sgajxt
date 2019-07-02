<?php
	require("../conn.php");
	
	$sjc=$_POST["sjc"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	//清空回复的时候要先清空 upload文件夹里的回复图片
	//先查询图片附件这张表中有哪些图片
	$sqltpfj = "select * from 图片附件 where 时间戳='".$sjc."'";
	$resulttpfj = $conn->query($sqltpfj);
	$rowtpfj = $resulttpfj->fetch_assoc();
	if ($resulttpfj->num_rows > 0) {
		//图片存放的路径
		$picturePath="../upload/";
		$draftPicture = $rowtpfj["回复附件"];
		if($draftPicture==""){
			//没有图片的话就直接删除
			//删除数据库中的记录
			$sqlTpfj = "select * from 图片附件  where 时间戳='".$sjc."'";
			$resultTpfj = $conn->query($sqlTpfj);
			if ($resultTpfj->num_rows > 0) {			
				$sqli = "update 图片附件 set 回复附件='',回复新建日期='',图片附件上传方式='' where 时间戳='".$sjc."'";
				if ($conn->query($sqli) === TRUE) {
					$jsonresultTf='success';
				} else {
					$jsonresultTf='error';
				}
			}else{
				$jsonresultTf='0';			
			}
		}else{
			$pictureArray = explode("~*^*~",$draftPicture);
			$length = count($pictureArray);
			for($i=0;$i<$length-1;$i++){
				$pathPanduan=intval(file_exists($picturePath.$pictureArray[$i]));
				if($pathPanduan==1){
					if($pictureArray[$i]=="add.jpg"){
										
					}else{
						//存在除了 add.jpg 的文件就删除
						unlink($picturePath.$pictureArray[$i]);
					}
				}
			}
			//删除图片附件的回复数据
			$sqlTpfj = "select * from 图片附件  where 时间戳='".$sjc."'";
			$resultTpfj = $conn->query($sqlTpfj);
			if ($resultTpfj->num_rows > 0) {			
				$sqli = "update 图片附件 set 回复附件='',回复新建日期='',图片附件上传方式='' where 时间戳='".$sjc."'";
				if ($conn->query($sqli) === TRUE) {
					$jsonresultTf='success';
				} else {
					$jsonresultTf='error';
				}
			}else{
				$jsonresultTf='0';			
			}
		}
	}else{
		$jsonresultTf='0';
	}
	
	
	
	//删除“预览数据表未分割”中相关数据
	$sqlYlsjbWfg = "select * from 预览数据表未分割  where 通知单时间戳='".$sjc."'";
	$resultYlsjbWfg = $conn->query($sqlYlsjbWfg);
	if ($resultYlsjbWfg->num_rows > 0) {			
		$sqli = "delete from 预览数据表未分割  where 通知单时间戳='".$sjc."'";
		if ($conn->query($sqli) === TRUE) {
			$jsonresultYw='success';
		} else {
			$jsonresultYw='error';
		}
	}else{
		$jsonresultYw='0';			
	}
	
	//删除“预览数据表”中相关数据
	$sqlYlsjb = "select * from 预览数据表  where 通知单时间戳='".$sjc."'";
	$resultYlsjb = $conn->query($sqlYlsjb);
	if ($resultYlsjb->num_rows > 0) {			
		$sqli = "delete from 预览数据表  where 通知单时间戳='".$sjc."'";
		if ($conn->query($sqli) === TRUE) {
			$jsonresultY='success';
		} else {
			$jsonresultY='error';
		}
	}else{
		$jsonresultY='0';			
	}
	
	//删除“通知单”中相关数据
	$sqlTzd = "select * from 通知单  where 时间戳='".$sjc."'";
	$resultTzd= $conn->query($sqlTzd);
	if ($resultTzd->num_rows > 0) {			
		$sqli = "update 通知单 set 答复状态='',回复人='',回复日期='' where 时间戳='".$sjc."'";
		if ($conn->query($sqli) === TRUE) {
			$jsonresultTzd='success';
		} else {
			$jsonresultTzd='error';
		}
	}else{
		$jsonresultTzd='0';			
	}
	
	//$sqldate="";
	$jsonresult='success';
	$json = '{"result":"'.$jsonresult.'",
				"jsonresultYw":"'.$jsonresultYw.'",
				"jsonresultY":"'.$jsonresultY.'",
				"jsonresultTf":"'.$jsonresultTf.'",
				"jsonresultTd":"'.$jsonresultTzd.'"	
		}';
	echo $json;
	$conn->close();
?>