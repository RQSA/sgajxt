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
		 	//获取当前时间，以后会用到
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
$sqli = "insert into 我的工程 (时间戳,工程名称,项目类别,工程位置,经纬度,误差范围,建筑面积,层数,高度,基坑深度,项目经理,安全主管,安全员，机械管理员，责任人，联系方式，施工许可证取得情况，开工报告，开工报告附件上传，形象进度) values ('$sjc','$gcmc',
		'$xmlb','$gcwz','$jwd','$wcfw','$jzmj','$cs','$gd','$jksd','$xmjl','$aqzg','$aqy','$jjgly','$zrrxx','$lxfs','$sgxkzqdqk','$kgbg','$kgbgfjsc','$gcxxjd','

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>