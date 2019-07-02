<?php
//引入连接数据库文件
		require("../conn.php");
		$id=$_POST["id"];
		$sql = "delete from 选择类型  where id = '$id';";
		
		if ($conn->query($sql) === TRUE) {
		    echo "删除成功";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();		
?>