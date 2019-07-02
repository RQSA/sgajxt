<?php
	//引入连接数据库文件
		require("../conn.php");
		$bianhaoo=$_POST["bianhaoo"];
$sql = "delete from 整改通知书编号维护  where id in ($bianhaoo);";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>