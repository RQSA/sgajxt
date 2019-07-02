<?php
	require("../conn.php");
	$flag=$_POST["flag"];	
	
	$sqldate="";
	
	if($flag=="jcnr"){
		$sql = "select * from 开放类型_检查内容 ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"检查内容":"'. $row["检查内容"].'"},';
			}
		}else{
			
		}
	}else if($flag=="otherFlage"){
		
	}else{
		
	}
	
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>