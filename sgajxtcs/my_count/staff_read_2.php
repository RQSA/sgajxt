<?php
require("../conn.php");
$gcmc = $_POST["section"];
$sql = "select distinct 人员 from 人员签到 where 工程名称='".$gcmc."'";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
if($result->num_rows>0){
	while($row =$result->fetch_assoc()){
			$name = $name.'{"staff":"'.$row["人员"].'"},';
	}
}
$jsonresult = 'success';
$otherdate = '{"result":"'.$jsonresult.'"
						}';
$json = '['.$name.$otherdate.']';
echo $json;
?>