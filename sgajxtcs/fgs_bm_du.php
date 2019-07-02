<?php
	require("../conn.php");
	$flag=$_POST["flag"];
	$fgsxz=$_POST["fgsxz"];
	//$canshu2=$_POST["canshu1"];
	//$canshu3=$_POST["canshu2"];
	
	$sqldate="";
	if($flag=="fgs"){
		$sql = "select distinct 部门  from 公司部门";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"部门":"'. $row["部门"].'"},';
			 }
		} else {
			//echo "0 results";
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="bumen"){
		$sql = "select * from 公司部门 where 公司级别='".$fgsxz."'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"公司级别":"'. $row["公司级别"].'","部门":"'. $row["部门"].'"},';
			 }
		} else {
			//echo "0 results";
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="xzcg"){
		//$sql = "select distinct 公司级别  from 公司部门";
		$sql = "select distinct 部门  from 公司部门";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"公司级别":"'. $row["部门"].'"},';
			 }
		} else {
			//echo "0 results";
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else{
		
	}
	echo $json;
	$conn->close();	
		
?>