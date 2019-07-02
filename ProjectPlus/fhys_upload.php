<?php
	require("conn.php");
//	$lx=$_POST["lx"];
	$kgbgfjsc=$_POST["kgbgfjsc"];
//	if($lx=="yszp"){
//		$lx="验收照片";
//	}elseif ($lx=="hxpmt") {
//		$lx="户型平面图";
//	}elseif ($lx=="ysjl") {
//		$lx="验收记录";
//	}elseif ($lx=="bcjl") {
//		$lx="补充记录";
//	}else {
//		$lx="验收照片";
//	}
	$sql = "select * from 我的工程 where 开工报告附件上传='".$kgbgfjsc."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$sqli = "UPDATE 我的工程 set $lx='$filenames' where 开工报告附件上传='".$kgbgfjsc."' ";
		
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='123';
			} else {
				$jsonresult='321';
			}
	} else {
		$jsonresult='1';
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>