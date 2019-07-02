<?php
	require ("../conn.php");
	$wxylx=$_POST["wxylx"];
	$gcid=$_POST["gcid"];
	$gcmc=$_POST["gcmc"];
//	
	$sqldate="";
	if($wxylx=='quanbu' or $wxylx=='全部' ){
		$sql = "select * from 危险源  where 工程id='".$gcid."'   order by 超过一定规模的危险性较大的分部分项工程  desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","gcid":"'.$row["工程id"].'","危险源大类":"'.$row["危险源大类"].'","危险源类型":"'.$row["危险源类型"].'","施工部位":"'.$row["施工部位"].'","超过一定规模的危险性较大的分部分项工程":"'.$row["超过一定规模的危险性较大的分部分项工程"].'","危险源状态":"'.$row["危险源状态"].'"},';
			}
		} else {  
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		
	}else {
		$sql = "select * from 危险源  where 危险源类型='".$wxylx."' and 工程id='".$gcid."'  order by 超过一定规模的危险性较大的分部分项工程  desc ";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","gcid":"'.$row["工程id"].'","危险源大类":"'.$row["危险源大类"].'","危险源类型":"'.$row["危险源类型"].'","施工部位":"'.$row["施工部位"].'","超过一定规模的危险性较大的分部分项工程":"'.$row["超过一定规模的危险性较大的分部分项工程"].'","危险源状态":"'.$row["危险源状态"].'"},';
			}
		} else {  
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}
	
	echo $json;
	$conn->close();


?>	

