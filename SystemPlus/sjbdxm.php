<?php
require("../conn.php");
$gcsjc = $_POST["gcsjc"];
$xm = $_POST["xm"];
$lxfs = $_POST["lxfs"];
$gangwei = $_POST["gangwei"];
$bumen = $_POST["bumen"];
$sql = "insert into 工程管理人员 (工程时间戳,部门,岗位,姓名,联系方式)  values ('".$gcsjc."','".$bumen."','".$gangwei."','".$xm."','".$lxfs."')";
if ($conn->query($sql) === TRUE) {
	echo "加入成功";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>