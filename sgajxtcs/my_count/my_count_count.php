<?php
	require("../conn.php");
	$qsrqvalue=$_POST["star"]; //起始日期
	$jsrqvalue=$_POST["end"]; //截止日期
	$mobile = $_POST["mobile"];//手机
	$belong = $_POST["section"];//部门
	
	$fgs ="";
	
	
	$showtime=date("Y-m-d");
	
	
	//去掉字符串最后一个字符
	
	
	
	$mysql = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='分公司' AND 联系方式 = '".$mobile."' ) OR (部门负责人A手机 = '".$mobile."' OR 部门负责人B手机 = '".$mobile."' OR 部门负责人C手机 = '".$mobile."') ORDER  BY  时间戳 DESC LIMIT 1";
	$mysql1 = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='总公司' AND 联系方式 = '".$mobile."' ) OR (总公司负责人A手机 = '".$mobile."' OR 总公司负责人B手机 = '".$mobile."' OR 总公司负责人C手机 = '".$mobile."'OR 总部巡查员手机 = '".$mobile."') ";
	$res = $conn->query($mysql);
	$res1 = $conn->query($mysql1);
	$count = mysqli_num_rows($res1);
	if($res->num_rows>0){
		while($myrow =$res->fetch_assoc()){
			$fgs = $myrow["所属公司"];
		}
	}
	
	
		//草稿
		if($belong=='总公司'){
			$sql1 = "select * from 通知单  where 通知单状态='草稿' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 检查层级 like '%总部%'  ";
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sql1 = "select * from 我的工程 a,通知单  b where 通知单状态='草稿'   and a.id = b.`工程id` AND a.所属公司='$belong'and 检查日期 between '$qsrqvalue'and '$jsrqvalue'";
		}else if($count==0&&$fgs==null){
			$sql1 = "select * from 通知单  where 通知单状态='草稿' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检' ";
		}
		
		$result1 = $conn->query($sql1);
		$cgCount= mysqli_num_rows($result1);
	
	
	//判断是否逾期
	
//		$sql2 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程id='".$gcidNew[$index]."'";
//		$result2 = $conn->query($sql2); 
//		if ($result2->num_rows > 0) {
//			while($row = $result2->fetch_assoc()) {
	if($belong=='总公司'){
		$sql9 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 检查层级 like '%总部%' and cast(整改期限  as datetime) < '$showtime'";
	}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
		$sql9 = "select * from 我的工程 a,通知单  b where 通知单状态='整改中'   and a.id = b.`工程id` AND a.所属公司='$belong' and cast(整改期限  as datetime) < '$showtime'and 检查日期 between '$qsrqvalue'and '$jsrqvalue' ";
	}else if($count==0&&$fgs==null){
		$sql9 = "select * from 通知单  where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检' and cast(整改期限  as datetime) < '$showtime' ";
	}
				
				$result9 = $conn->query($sql9);
				$yuqiCount=mysqli_num_rows($result9);
	
	
	//整改中
	
	
		if($belong=='总公司'){
			$sql2 = "select *  from 通知单 where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and  检查层级 like '%总部%' and cast(整改期限  as datetime) > '$showtime'";
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sql2 = "select * from 我的工程 a,通知单  b where 通知单状态='整改中'   and a.id = b.`工程id` AND a.所属公司='$belong'  and cast(整改期限  as datetime) >= '$showtime'and 检查日期 between '$qsrqvalue'and '$jsrqvalue'";
		}else if($count==0&&$fgs==null){
			$sql2 = "select * from 通知单  where 通知单状态='整改中' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检' and cast(整改期限  as datetime) > '$showtime' ";
		}
		
		$result2 = $conn->query($sql2);
		$zgzCount=mysqli_num_rows($result2);

	
	//延期

		if($belong=='总公司'){
			$sql3 = "select * from 通知单 where 通知单状态='延期' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and  检查层级 like '%总部%'";
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sql3 = "select * from 我的工程 a,通知单  b where 通知单状态='延期'   and a.id = b.`工程id` AND a.所属公司='$belong' and 检查日期 between '$qsrqvalue'and '$jsrqvalue'";
		}else if($count==0&&$fgs==null){
			$sql3 = "select * from 通知单  where 通知单状态='延期' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检' ";
		}
		
		$result3 = $conn->query($sql3);
		$yanqiCount=mysqli_num_rows($result3);


	//未完成


		if($belong=='总公司'){
			$sql5 = "select * from 通知单 where 通知单状态='未完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and  检查层级 like '%总部%'";
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sql5 = "select * from 我的工程 a,通知单  b where 通知单状态='未完成'   and a.id = b.`工程id` AND a.所属公司='$belong' and 检查日期 between '$qsrqvalue'and '$jsrqvalue'";
		}else if($count==0&&$fgs==null){
			$sql5 = "select * from 通知单  where 通知单状态='未完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检'";
		}
		$result5 = $conn->query($sql5);
		$wwcCount=mysqli_num_rows($result5);

	
	//已完成


		if($belong=='总公司'){
			$sql6 = "select * from 通知单 where 通知单状态='已完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 检查层级 like '%总部%'";
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sql6 = "select * from 我的工程 a,通知单  b where 通知单状态='已完成'   and a.id = b.`工程id` AND a.所属公司='$belong' and 检查日期 between '$qsrqvalue'and '$jsrqvalue'";
		}else if($count==0&&$fgs==null){
			$sql6 = "select * from 通知单  where 通知单状态='已完成' and 检查日期 between '$qsrqvalue'and '$jsrqvalue' and 工程名称 ='$belong' and 检查层级 = '项目部自检'";
		}
		$result6 = $conn->query($sql6);
		$ywcCount=mysqli_num_rows($result6);

	
	$sqldate="";
	$jsonresult='success';
//	$otherdate = '{"result":"'.$jsonresult.'",
//				"countCg":"'.$countCg.'",
//				"countZgz":"'.$countZgz.'",
//				"countYanqi":"'.$countYanqi.'",
//				"countYuqi":"'.$countYuqi.'",
//				"countWwc":"'.$countWwc.'",
//				"countYwc":"'.$countYwc.'"
//			}';
	$otherdate = '{"result":"'.$jsonresult.'",
				"countCg":"'.$cgCount.'",
				"countZgz":"'.$zgzCount.'",
				"countYanqi":"'.$yanqiCount.'",
				"countYuqi":"'.$yuqiCount.'",
				"countWwc":"'.$wwcCount.'",
				"countYwc":"'.$ywcCount.'"
			}';	
	$json = '['.$sqldate.$otherdate.']';
	
	echo $json;
	$conn->close();
	
?>