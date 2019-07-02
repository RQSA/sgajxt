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
		
		$urlid = $_POST['urlid'];
		$urlyhid = $_POST['urlyhid'];
		
		
		    if ($ywjsc = "1") 
			{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
			else {$kgbgfjsc1=$_FILES["file"]["name"];}
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
	$sjc=$_POST["sjc"];
	$sql = "select * from 我的工程  where 工程名称='".$gcmc."'";
		$result = $conn->query($sql);
	$sqli = "update 我的工程 set 施工许可证取得情况='$sgxkzqdqk',开工报告='$kgbg',开工报告附件上传='$kgbgfjsc1' where 工程名称='".$gcmc."'";
if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
header("refresh:0;url=Project_in.php?id=$urlid&yhid=$urlyhid");	
?>

<script type="text/javascript">
//window.history.go(-1);
//history.back();
//window.history.forward();
//window.open("Project_in.php?id=".$urlid."&yhid=".$urlyhid);

</script>