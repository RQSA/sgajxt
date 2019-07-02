<?php
	//引入连接数据库文件
	require("../conn.php");
		 $gcmc=$_POST["gcmc"];
		 $xmlb=$_POST["xmlb"];
//		 $gcwz=$_POST["gcwz"];
//		 $jwd=$_POST["jwd"]; 
//		 $wcfw=$_POST["wcfw"];  
//		 $jzmj=$_POST["jzmj"];   
//		 $cs=$_POST["cs"];   
//		 $gd=$_POST["gd"];   
//		 $jksd=$_POST["jksd"]; 
		 	//获取当前时间，以后会用到
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
$sql = "INSERT INTO 我的工程 (工程名称, 项目类别) 
values ('$gcmc', '$xmlb')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>