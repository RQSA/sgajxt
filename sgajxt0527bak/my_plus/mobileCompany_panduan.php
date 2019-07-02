<?php
	require("../conn.php");
	$mobile=$_POST["mobile"];	
	$gcid=$_POST["gcid"];
	
	$sql = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' and id='".$gcid."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$jsonresult='success';
		$panduanResult='Yes';
	} else {
		//判断总公司
		$sql3="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
		$result3=$conn->query($sql3); 
		if ($result3->num_rows > 0) {
			while($row = $result3->fetch_assoc()) {
				$sql = "select * from 我的工程 where 时间戳='".$row["时间戳"]."' and id='".$gcid."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$jsonresult='success';
					$panduanResult='Yes';
				}else{
					$jsonresult='1';
					$panduanResult='No';
				}
			}
		}else{
//			//判断分公司
//			$sql3="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
//			$result3=$conn->query($sql3);
//			if ($result3->num_rows > 0) {
//				while($row = $result3->fetch_assoc()) {
//					$sql = "select * from 我的工程 where 时间戳='".$row["时间戳"]."' and id='".$gcid."'";
//					$result = $conn->query($sql);
//					if ($result->num_rows > 0) {
//						$jsonresult='success';
//						$panduanResult='Yes';
//					}else{
//						$jsonresult='1';
//						$panduanResult='No';
//					}		
//				}
//			}
			$jsonresult='1';
			$panduanResult='No';
		}
	}
		
	$json = '{"result":"'.$jsonresult.'",
			"panduanResult":"'.$panduanResult.'"		
			}';
	echo $json;
	$conn->close();
?>