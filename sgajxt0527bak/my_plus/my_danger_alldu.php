<?php
	require("../conn.php");	
	$sjc=$_POST["sjc"];
	
	$sqldate="";
	$sql = "select * from 危险源  where 时间戳='".$sjc."'  ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'.$row["id"].'","危险源类型":"'.$row["危险源类型"].'","施工部位":"'.$row["施工部位"].'","基坑面积":"'.$row["基坑面积"].'","设计开挖深度":"'.$row["设计开挖深度"].'","危险源状态":"'.$row["危险源状态"].'","塔设高度":"'.$row["塔设高度"].'","登记日期":"'.$row["登记日期"].'","超过一定规模的危险性较大的分部分项工程":"'.$row["超过一定规模的危险性较大的分部分项工程"].'","是否通过审核":"'.$row["是否通过审核"].'","使用状态":"'.$row["使用状态"].'","管理状态":"'.$row["管理状态"].'","支模面积":"'.$row["支模面积"].'","支模高度":"'.$row["支模高度"].'","是否专家论证":"'.$row["是否专家论证"].'","其他超过一定规模的危险性较大的分部分项工程":"'.$row["超过一定规模的危险性较大的分部分项工程"].'","二级类型":"'.$row["二级类型"].'"},';
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