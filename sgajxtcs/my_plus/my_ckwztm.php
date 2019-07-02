<?php
	require("../conn.php");
	$sjc=$_POST["sjc"];
	$zggllx=$_POST["zggllx"];
	$liid=$_POST["liid"];
	$flag=$_POST["flag"];
	
	$sqldate="";
	
	//日期
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($zggllx=='chufa'){
		$sql = "select a.id,a.内容,a.对象,b.草稿附件 from 处罚条目 a,图片附件 b where a.时间戳=b.时间戳 and a.时间戳='".$sjc."' ";
			
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["内容"].'","对象":"'.$row["对象"].'","草稿附件":"'.$row["草稿附件"].'"},';
			}
			$jsonresult='success';
			$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
			$json = '['.$sqldate.$otherdate.']'; 
		} else {
			//echo "0 results";
			$sql1 = "select * from 处罚条目 where 时间戳='".$sjc."' ";
			$result = $conn->query($sql1);
			$count=mysqli_num_rows($result);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		 			$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["内容"].'","对象":"'.$row["对象"].'","草稿附件":"'.$row["编号"].'"},';
				}
			} else {
			
			}
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
	}else if($zggllx=='chufaXz'){
		$mobile=$_POST["mobile"];
		$shjPanduan=$_POST["shjPanduan"];
		
		if($shjPanduan=="Yes"){
			$sql1 = "select * from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."'";
			$result = $conn->query($sql1);
			$count=mysqli_num_rows($result);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
			 		$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["违章条目"].'","对象":"'.$row["对象"].'","草稿附件":"'.$row["草稿附件"].'"},';
				}
			} else {
				
			}
		}else{
			//echo "0 results";
			$sql1 = "select * from 草稿条目新增临时保存表 where 通知单时间戳='".$sjc."' and 手机='".$mobile."'";
			$result = $conn->query($sql1);
			$count=mysqli_num_rows($result);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
			 		$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["违章条目"].'","对象":"'.$row["对象"].'","草稿附件":"'.$row["草稿附件"].'"},';
				}
			} else {
				
			}
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