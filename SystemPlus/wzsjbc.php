<?php
	//引入连接数据库文件
	require("../conn.php");
	$sjc=$_POST["sjc"];
		$wzdl=$_POST["wzdl"];
		$jcxm=$_POST["jcxm"];
		$nr=$_POST["nr"];
		$dx=$_POST["dx"];
	    $lx=$_POST["lx"];
	    $kfz=$_POST["kfz"];
	    $wzzt=$_POST["wzzt"];
	    
//		echo "$gcmc";	
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
$sql = "INSERT INTO 违章数据库  (违章大类,检查项目,内容,对象,类型,扣分值,违章状态) values ('$wzdl','$jcxm','$nr','$dx','$lx','$kfz','$wzzt')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>