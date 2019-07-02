<?php
	//引入连接数据库文件
		require("../conn.php");
		$tpid1=$_POST["tpid1"];
$sql = "delete  from 通知单  where id = '$tpid1';";

if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>