<?php
	require("../conn.php");	
	$xclb=$_POST["xclb"];
	
	$sqldate="";
	//判断巡查类别的值
	if($xclb=="综合"){
		$sql = "select distinct 编号注释 from 违章数据库";
	}else{
		$sql = "select distinct 编号注释 from 违章数据库 where 违章状态='".$xclb."'";
	}
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"编号注释":"'.$row["编号注释"].'"},';
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
	echo $json;
	$conn->close();	
		
?>