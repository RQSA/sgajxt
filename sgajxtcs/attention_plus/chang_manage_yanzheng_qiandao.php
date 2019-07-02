<?php
	require("../conn.php");
	$gcid=$_POST["gcid"];
	$mobile=$_POST["mobile"];
	
	
	$qdTime=date("Y-m-d");
	
	//总公司的不用签到就能批复
	$sqlSelect = "select * from (select a.id,a.工程名称,a.总公司负责人A,a.总公司负责人A手机,a.总公司负责人B,a.总公司负责人B手机,a.总公司负责人C,a.总公司负责人C手机,a.总部巡查员,a.总部巡查员手机,b.mobileZgs from 我的工程 a left join 工程动态添加手机 b on a.时间戳=b.时间戳) as 工程列表临时表  where (总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' or (mobileZgs like '%".$mobile."%')) and (id='".$gcid."')";
	$resultSelect = $conn->query($sqlSelect);
	if ($resultSelect->num_rows > 0) {
		$jsonresult='LinJingHeng';
	} else {
		$sql = "select * from 人员签到 where 签到时间 like '".$qdTime."%' and 工程id='".$gcid."' and 联系方式='".$mobile."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='OK';
		} else {
			$jsonresult='NO';
		}
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
			
	echo $json;
	$conn->close();	
		
?>