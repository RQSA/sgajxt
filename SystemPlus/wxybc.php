<?php
	//引入连接数据库文件
	require("../conn.php");
	$sjc=$_POST["sjc"];
	$wxylx=$_POST["wxylx"];

	    
//		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "INSERT INTO 选择类型(危险源类型) values ('$wxylx')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
