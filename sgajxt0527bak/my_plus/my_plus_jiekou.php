<?php
	//接口文件
	//涉及的文件：my_change_list_changan.js && my_project_list.html && my_project_xczg_ryqd.html
    require("../conn.php");
    //拓展变量
	$cangshu1 = $_POST["cangshu1"]; //参数1
	$jzrq = $_POST["cangshu2"]; //截止日期
	$cangshu3 = $_POST["cangshu3"]; //工程id
	$biaozhi = $_POST["biaozhi"];
	$sjc = $_POST["sjc"];
	$flag = $_POST["flag"]; //标志
	
	
	if($flag=="yqsq"){
		/////////////////////////////////////////////////////////////////////延期申请//////////////////////////////////////////////////
		if($sjc){
			$sql = "select * from 通知单 where 时间戳='".$sjc."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$sqli = "update 通知单 set 是否延期='$biaozhi',整改期限='$jzrq' where 时间戳='".$sjc."'";
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
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($flag=="yqhf"){
		/////////////////////////////////////////////////////////////////////延期回复//////////////////////////////////////////////////
		if($sjc){
			$sql = "select * from 通知单 where 时间戳='".$sjc."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$sqli = "update 通知单 set 通知单状态='延期',是否延期='同意延期' where 时间戳='".$sjc."'";
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
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($flag=="bty"){
		/////////////////////////////////////////////////////////////////////延期回复不同意//////////////////////////////////////////////////
		if($sjc){
			$sql = "select * from 通知单 where 时间戳='".$sjc."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$sqli = "update 通知单 set 通知单状态='未完成',是否延期='$biaozhi' where 时间戳='".$sjc."'";
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
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($flag=="renyuanqingdan"){
		/////////////////////////////////////////////////////////////////////延期回复不同意//////////////////////////////////////////////////
		$sql = "select * from 通知单 where 时间戳='".$cangshu3."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 通知单 set 分享人号码='$cangshu1' where 时间戳='".$cangshu3."'";
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
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}else{
		
	}
	
	echo $json;
	mysqli_close($conn);
	
?>