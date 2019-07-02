<?php
require("../conn.php");
$zt1 = $_POST["zt1"];
$zt2 = $_POST["zt2"];
$fgs = $_POST["fgs"];

if($zt1 == "yuqi"){
	$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态='整改中' and a.工程名称=b.工程名称    and b.检查单位 = '".$fgs."' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')>整改期限 AND a.id=b.工程id and 分公司批复 ='' order by a.工程名称,b.通知单状态 desc";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result);
//	echo $class ;
}
if($zt2 == "zhenggai"){
	$sqli = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查单位 = '".$fgs."' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限 AND a.id=b.工程id and 分公司批复 ='' order by a.工程名称,b.通知单状态 desc";
	$result1 = $conn->query($sqli);
	$count = mysqli_num_rows($result1);
//	echo $count ;
}

$jsondata = '{"逾期":"'.$class.'","整改":"'.$count.'"}';
$json = '['.$jsondata.']';
echo $json;
?>