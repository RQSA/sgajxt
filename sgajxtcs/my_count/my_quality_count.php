<?php
require("../conn.php");
$star_time = $_POST["star_time"];
$end_time = $_POST["end_time"];
$jcxm = $_POST["jcxm"];

$sqldata = " ";
$sqli = "select * from 实测实量数据 where 状态='1' and 记录表类型='".$jcxm."' and 测量时间 between'".$star_time."' and '".$end_time."'";
$result = $conn->query($sqli);
$count = mysqli_num_rows($result);
//$count = $conn->num_rows;
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
	$sqldata = $sqldata.'{"检查项目":"'. $row["记录表类型"].'","检查内容":"'. $row["检查内容"].'","状态1":"'. $row["状态1"].'","状态2":"'. $row["状态2"].'","状态3":"'. $row["状态3"].'","状态4":"'. $row["状态4"].'","状态5":"'. $row["状态5"].'","状态6":"'. $row["状态6"].'","状态7":"'. $row["状态7"].'","状态8":"'. $row["状态8"].'","状态9":"'. $row["状态9"].'","状态10":"'. $row["状态10"].'"},';
	}
}
	$jsonresult=$jcxm;
	$jsondata = '{"检查项目":"'.$jsonresult.'"}';
    $json = '['.$sqldata.$jsondata.']';
//$json = $star_time.'||'.$end_time.'||'.$jcxm;
echo $json;
$conn->close();
?>