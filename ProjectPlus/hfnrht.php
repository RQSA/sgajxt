<?php
	require("../conn.php");
	$sjc=$_POST["sjc"];
	$zggllx=$_POST["zggllx"];
	$liid="";
	$flag="";
	
	$sqldate="";
	$liIdhf="fwhf".$flag;
	
	//日期
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($zggllx=='zhenggai'){
		////////////////////////////////////////////// 整改 ////////////////////////////////////////////
//		$sql = "select * from 通知单 a,图片附件 b where a.时间戳=b.时间戳 and 时间戳='".$sjc."' ";
		$sql = "select c.项目部回复,b.回复附件 from 图片附件 b,预览数据表 c where b.时间戳=c.通知单时间戳  and b.时间戳='".$sjc."' ";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"项目部回复":"'.$row["项目部回复"].'","回复附件":"'.$row["回复附件"].'"},';
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
		///////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($zggllx=='chufa'){
		/////////////////////////////////////////////////////// 处罚 //////////////////////////////////////////
		$sql = "select a.id,a.内容,b.草稿附件 from 处罚条目 a,图片附件 b where a.时间戳=b.时间戳 and a.时间戳='".$sjc."' ";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["内容"].'","草稿附件":"'.$row["草稿附件"].'"},';
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
		 			$sqldate= $sqldate.'{"id":"'.$row["id"].'","内容":"'.$row["内容"].'","草稿附件":"'.$row["编号"].'"},';
				}
			} else {
			
			}
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'",
					"sjc":"'.$sjc.'"
					}';
				
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($zggllx=='yulan'){
		/////////////////////////////////////////////////////// 预览 //////////////////////////////////////////
		$sql = "select a.违章状态,a.工程id,a.工程名称,a.通知单编号,b.内容 from 通知单 a,处罚条目 b where a.时间戳=b.时间戳 and a.时间戳='".$sjc."' ";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"违章状态":"'.$row["违章状态"].'","工程id":"'.$row["工程id"].'","工程名称":"'.$row["工程名称"].'","通知单编号":"'.$row["通知单编号"].'","违章现象":"'.$row["内容"].'"},';
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
		//echo "我叫李德戈景";
		//////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($zggllx=='xmbhf'){
		/////////////////////////////////////////////////////// 项目部回复 //////////////////////////////////////////
		$sql = "select 项目部回复,违章部位 from 预览数据表 where 通知单时间戳='".$sjc."' and Li的ID='".$liid."' ";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"项目部回复":"'.$row["项目部回复"].'","违章部位":"'.$row["违章部位"].'"},';
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
		//////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if($zggllx=='gspf'){
		/////////////////////////////////////////////////////// 公司批复 //////////////////////////////////////////
		$sql = "select 项目部回复,违章部位,分公司批复,总公司批复 from 预览数据表 where 通知单时间戳='".$sjc."' and Li的ID='".$liIdhf."' ";
		
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
		 		$sqldate= $sqldate.'{"项目部回复":"'.$row["项目部回复"].'","违章部位":"'.$row["违章部位"].'","分公司批复":"'.$row["分公司批复"].'","总公司批复":"'.$row["总公司批复"].'"},';
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
		//////////////////////////////////////////////////////////////////////////////////////////////////////
	}else{
		
	}
	echo $json;
	$conn->close();	
		
?>