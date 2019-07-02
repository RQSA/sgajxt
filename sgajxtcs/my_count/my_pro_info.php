<?php
    require("../conn.php");
	$sjc = $_POST["sjc"];
	$sqldate="";
	$sql = "select * from 我的工程 where 时间戳 = '".$sjc."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","项目类别":"'.$row["项目类别"].'","工程名称":"'.$row["工程名称"].'","工程位置":"'.$row["工程位置"].'","开工日期":"'.$row["开工日期"].'","竣工日期":"'.$row["竣工日期"].'","建筑面积":"'.$row["建筑面积"].'","基坑深度":"'.$row["基坑深度"].'","建筑高度":"'.$row["高度"].'","建筑栋数":"'.$row["栋数"].'","建筑层数":"'.$row["层数"].'"},';
		}
	}
	
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
?>