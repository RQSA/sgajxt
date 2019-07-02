<?php
	require("../conn.php");
	$tzdbh = $_POST["tzdbh"];
	$sqldate="";
		$sql = "select * from 通知单  where  通知单编号='".$tzdbh."' and  检查层级 like '总部%' and 批复意见  in ('不合格','部分合格')";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"批复意见":"'.$row["批复意见"].'"},';
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