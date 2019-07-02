<?php
	//引入连接数据库文件
	require("../conn.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$gcwc=$_POST["gcwc"];
		$xmlb=$_POST["xmlb"];
		$jwd=$_POST["jwd"];
	    $wcfw=$_POST["wcfw"];
	    $jzmj=$_POST["jzmj"];
	    $cs=$_POST["cs"];
	    $gd=$_POST["gd"];
		$jzqzlb=$_POST["jzqzlb"];
	    
	    
//		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "INSERT INTO 设备管理 (工程名称,制造单位,规格型号,出厂日期,出厂编号,设备产权备案号,登记日期,设备状态,设备类型) values ('$gcmc','$gcwc','$xmlb','$jwd','$wcfw','$jzmj','$cs','$gd','$jzqzlb')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>