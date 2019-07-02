<?php
	//引入连接数据库文件
		$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");

	require("../conn.php");
	require("upload_file.php");
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
//	$time=getdate();

//	echo (strtotime(".$sjcc."));
    if ($ywjsc = "1") 
	{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
	else {$kgbgfjsc1=$_FILES["file"]["name"];}
	
$sql = "INSERT INTO 我的工程 (时间戳,工程名称,项目类别,工程位置,经纬度,误差范围,建筑面积,层数,高度,基坑深度,项目经理,安全主管,安全员,机械管理员,责任人,联系方式,施工许可证取得情况,开工报告,开工报告附件上传,形象进度) values (".strtotime(".$sjcc.").",'$gcmc','$xmlb','$gcwz','$jwd','$wcfw','$jzmj','$cs','$gd','$jksd','$xmjl','$aqzg','$aqy','$jjgly','$zrrxx','$lxfs','$sgxkzqdqk','$kgbg','$kgbgfjsc1','$gcxxjd')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		

?>
<script type="text/javascript">
  window.location.href='gcxx.php';
</script>