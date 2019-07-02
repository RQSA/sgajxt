<?php
	require ("conn.php");
	$flag=$_POST["flag"];
	$mobile=$_POST["mobile"];
	
	if($flag=="zhneggai"){
		$sqldate="";
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and (总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
			$result = $conn->query($sql);
			$class = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
				}
			} else { 
			} 
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'",
							"count":"'.$class.'"
						}';
			$json = '['.$sqldate.$otherdate.']';
		}else{
			//总公司
			$sql3="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$result3=$conn->query($sql3);
			$class=mysqli_num_rows($result3); 
			if ($result3->num_rows > 0) {
				while($row = $result3->fetch_assoc()) {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
					$result = $conn->query($sql);
					$class = mysqli_num_rows($result); 
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
						}
					} else { 
					} 
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$class.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}else{
				$sql3="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
				$result3=$conn->query($sql3);
				$class=mysqli_num_rows($result3); 
				if ($result3->num_rows > 0) {
					while($row = $result3->fetch_assoc()) {
						$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
						$result = $conn->query($sql);
						$class = mysqli_num_rows($result); 
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
						 		$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
							}
						} else { 
						} 
					}
					$jsonresult = 'success';
					$otherdate = '{"result":"'.$jsonresult.'",
									"count":"'.$class.'"
								}';
					$json = '['.$sqldate.$otherdate.']';
				}else{
					$sql2 = "select * from 我的工程 where 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'";
					$result2 = $conn->query($sql2);
					$class = mysqli_num_rows($result2); 
					if ($result2->num_rows > 0) {
						$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and (项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
						$result = $conn->query($sql);
						$class = mysqli_num_rows($result); 
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
							 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
							}
						} else { 
							$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and 分享人号码  like '%".$mobile."%' order by a.工程名称,b.通知单状态 desc";
							$result = $conn->query($sql);
							$class = mysqli_num_rows($result); 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
									}
							} else { 
							} 
							$jsonresult = 'success';
							$otherdate = '{"result":"'.$jsonresult.'",
											"count":"'.$class.'"
										}';
							$json = '['.$sqldate.$otherdate.']';
							
						} 
						$jsonresult = 'success';
						$otherdate = '{"result":"'.$jsonresult.'",
										"count":"'.$class.'"
									}';
						$json = '['.$sqldate.$otherdate.']';
					}
				}
				
			}
			
		}
		//////////////////////////////////////////////////////////////////////////////////////////////
	}else if($flag=="renwu"){
		$sqldate="";
		$sql = "select 项目id,项目名称,任务名称, 施工单位,截止日期 from 任务 where 回复状态='未回复' order by 项目名称 desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			 $sqldate= $sqldate.'{"项目id":"'. $row["项目id"].'","工程名称":"'. $row["项目名称"].'","任务名称":"'. $row["任务名称"].'","施工单位":"'. $row["施工单位"].'","截止日期":"'. $row["截止日期"].'"},';
			}
		} else { 
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}else{
		
	}
	
	echo $json;
	$conn->close();
?>