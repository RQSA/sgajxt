<?php
	//引入连接数据库文件
	require("../conn.php");
		$gcwz=$_POST["gcwz"];
		$xmlb=$_POST["xmlb"];
		$jwd=$_POST["jwd"];
		$jzmj=$_POST["jzmj"];
		$cs=$_POST["cs"];
		$gd=$_POST["gd"];
	
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "INSERT INTO 危险源 (制造单位,规格型号,出产日期,设备产权备案,登记日期,状态) values ('$gcwz','$xmlb','$jwd','$jzmj','$cs''$gd')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>