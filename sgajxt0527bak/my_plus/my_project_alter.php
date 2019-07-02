<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$gcmc1 = $_POST["gcmc1"];
	$xmlb1 = $_POST["xmlb1"];
	$gcwz = $_POST["gcwz"];
	$kgrq = $_POST["kgrq"];
	$jgrq = $_POST["jgrq"];
	$jzmj = $_POST["jzmj"];
	$jksd = $_POST["jksd"];
	$jzgd = $_POST["jzgd"];
	$jzds = $_POST["jzds"];
	$jzcs = $_POST["jzcs"];
	$jbxxsjc = $_POST["jbxxsjc"];

	
	if($gcid){
		$sql = "select * from 我的工程 where id = '".$gcid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {			
			$sqli = "update 我的工程 set 时间戳='$jbxxsjc',项目类别='$xmlb1',工程名称='$gcmc1',工程位置='$gcwz',开工日期='$kgrq',竣工日期='$jgrq',建筑面积='$jzmj',基坑深度='$jksd',高度='$jzgd',栋数='$jzds',层数='$jzcs' where id='".$gcid."'";
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