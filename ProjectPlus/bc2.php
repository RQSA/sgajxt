<?php
	//引入连接数据库文件
	require("../conn.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$xmlb=$_POST["xmlb"];
		$gcwz=$_POST["gcwz"];
		$jwd=$_POST["jwd"];
		$wcfw=$_POST["wcfw"];
		$jzmj=$_POST["jzmj"];
		$cs=$_POST["cs"];
		$gd=$_POST["gd"];
		$jksd=$_POST["jksd"];
		$xmjl=$_POST["xmjl"];
		$aqzg=$_POST["aqzg"];
		$aqy=$_POST["aqy"];
		$jjgly=$_POST["jjgly"];
		$zrrxx=$_POST["zrrxx"];
		$lxfs=$_POST["lxfs"];
		$sgxkzqdqk=$_POST["sgxkzqdqk"];
		$kgbg=$_POST["kgbg"];
		$kgbgfjsc=$_POST["kgbgfjsc"];
		$gcxxjd=$_POST["gcxxjd"];
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "update 我的工程 set 时间戳='$sjc',工程名称='$gcmc',项目类别='$xmlb',工程位置='$gcwz',经纬度='$jwd',误差范围='$wcfw',
建筑面积='$jzmj',层数='$cs',高度='$gd',基坑深度='$jksd',项目经理='$xmjl',安全主管='$aqzg',安全员='$aqy',机械管理员='$jjgly',
责任人='$zrrxx',联系方式='$lxfs',施工许可证取得情况='$sgxkzqdqk',开工报告='$kgbg',开工报告附件上传='$kgbgfjsc',形象进度='$gcxxjd'";


if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>