<?php
	require("../conn.php");
	$sjc=$_POST["sjc"];
	$zggllx=$_POST["zggllx"];
		
//	$sjc='1484451130244';
//	$zggllx='chufa';
	$sqldate="";
	if($zggllx=='chufa'){
		$sql = "select id,内容 from 处罚条目  where 时间戳='".$sjc."'";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["内容"].'"},';
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
	}else if($zggllx=='shjMobile'){
		$mobile=$_POST["mobile"];	
	
		$sql = "select * from 我的工程 where 联系方式='".$mobile."' and id='".$sjc."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if($mobile==$row["联系方式"])	{
			$jsonresult='success';
	   		
		}else{
			$jsonresult='error';
//			$jsonresult=$mobile."***".$sjc; 
			
		}	
		$json = '{"result":"'.$jsonresult.'"
				}';
	}else{
		
	}
	echo $json;
	$conn->close();	
		
?>