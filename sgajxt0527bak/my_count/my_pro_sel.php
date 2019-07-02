<?php
    require("../conn.php");
	$sqldate="";
	$dqsheng = $_POST["dqsheng"];
	$flag = $_POST["flag"];
	
	if($flag){
		$sql = "select distinct 地区市 from 我的工程 where 地区省 = '".$dqsheng."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"地区市":"'.$row["地区市"].'"},';
			}
		}
	}else{
		$sql = "select distinct 地区省 from 我的工程";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate= $sqldate.'{"地区省":"'.$row["地区省"].'"},';
			}
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