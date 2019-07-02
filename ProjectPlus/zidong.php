<?php
	//引入连接数据库文件
		require("../conn.php");
		$gcid2=$_POST["gcid2"];
		$gc = explode("*|",$gcid2);
$sqli = "update 工程动态添加手机 set mobileOther = replace(mobileOther,'".$gc[2]."','') where 时间戳 = '".$gc[1]."'";
if ($conn->query($sqli) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sqli . "<br>" . $conn->error;
}

$sql = "delete from 工程管理人员  where id = '".$gc[0]."'";

if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();		
?>