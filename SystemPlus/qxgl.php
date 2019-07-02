<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
	    $qxbc=$_POST["qxbc"];
	    $ryid=$_POST["chuanzhi"];
$sql = "update 用户信息 set  权限='$qxbc' where id='$ryid' ";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
