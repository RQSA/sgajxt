<?php
require("../conn.php");

$zd = $_POST["zd"];
$sqldate=" ";
$sql = "select distinct 内容 from 违章数据库 where `内容` LIKE '%".$zd."%'";
$result = $conn->query($sql);
$count=mysqli_num_rows($result);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"内容":"'.$row["内容"].'"},';
		 }
	 } else {
	
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
		echo $json;
		$conn->close();

?>