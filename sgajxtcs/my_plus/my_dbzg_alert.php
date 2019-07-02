<?php
	require ("../conn.php");
	$flag=$_POST["flag"];
	$mobile=$_POST["mobile"];
	$company=$_POST["company"];
	
	
	if($flag=="huifu"){
		if($mobile=="13603070333"||$mobile=="13826467128"||$mobile=="13632665565"||$mobile=="13510881338"){
			$sqldate="";
			$sql1 = "select * from 我的工程 ";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				if($company == "分公司"){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称  and b.回复日期 = ''   and b.检查层级  in ('项目部自检','分公司月度检查','分公司巡查','分公司专项检查')   order by a.工程名称,b.通知单状态 desc";
	
				} else {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称  and b.回复日期 = ''   and b.检查层级 like '%".$company."%'  order by a.工程名称,b.通知单状态 desc";
				}
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
				
			}
		} else {
			$sqldate="";
			$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' or 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."' or 质量负责人手机='".$mobile."'";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				if($company == "分公司"){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查层级  in ('项目部自检','分公司月度检查','分公司巡查','分公司专项检查') and b. 回复日期 = ''  and (a.总公司负责人A手机='".$mobile."' or a.总公司负责人B手机='".$mobile."' or a.总公司负责人C手机='".$mobile."' or a.总部巡查员手机='".$mobile."' or a.项目经理手机='".$mobile."' or a.安全主管手机='".$mobile."' or a.安全员手机='".$mobile."' or a.机械管理员手机='".$mobile."' or a.联系方式='".$mobile."' or a.部门负责人A手机='".$mobile."' or a.部门负责人B手机='".$mobile."' or a.部门负责人C手机='".$mobile."' or a.生产经理手机='".$mobile."' or a.质量员手机='".$mobile."' or a.质量负责人手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
	
				} else {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称  and b. 回复日期 = ''  and b.检查层级 like '%".$company."%'  and (a.总公司负责人A手机='".$mobile."' or a.总公司负责人B手机='".$mobile."' or a.总公司负责人C手机='".$mobile."' or a.总部巡查员手机='".$mobile."' or a.项目经理手机='".$mobile."' or a.安全主管手机='".$mobile."' or a.安全员手机='".$mobile."' or a.机械管理员手机='".$mobile."' or a.联系方式='".$mobile."' or a.部门负责人A手机='".$mobile."' or a.部门负责人B手机='".$mobile."' or a.部门负责人C手机='".$mobile."' or a.生产经理手机='".$mobile."' or a.质量员手机='".$mobile."' or a.质量负责人手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
				}
				
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
						$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and b.回复日期 = '' and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
						$result = $conn->query($sql);
						$class = mysqli_num_rows($result); 
						
					}
					$jsonresult = 'success';
					$otherdate = '{"result":"'.$jsonresult.'",
									"count":"'.$class.'"
								}';
					$json = $otherdate;
				}else{
					$sql3="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
					$result3=$conn->query($sql3);
					$class=mysqli_num_rows($result3); 
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
			}
		}
	}else {
		if($mobile=="13603070333"||$mobile=="13826467128"||$mobile=="13632665565"||$mobile=="13510881338"){
			$sqldate="";
			$sql1 = "select * from 我的工程 ";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				if($company == "分公司"){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称   and   b.回复日期  !=''    and b.检查层级  in ('项目部自检','分公司月度检查','分公司巡查','分公司专项检查')   order by a.工程名称,b.通知单状态 desc";
	
				} else {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称  and   b.回复日期  !='' and b.批复意见 = '合格'    and b.检查层级 like '%".$company."%'  order by a.工程名称,b.通知单状态 desc";
				}
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
				
			}
		} else {
			$sqldate="";
			$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' or 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'or 质量负责人手机='".$mobile."'";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				if($company == "分公司"){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称  and   b.回复日期  !='' and b.批复日期 = ''  and b.检查层级  in ('项目部自检','分公司月度检查','分公司巡查','分公司专项检查')   and (a.总公司负责人A手机='".$mobile."' or a.总公司负责人B手机='".$mobile."' or a.总公司负责人C手机='".$mobile."' or a.总部巡查员手机='".$mobile."' or a.项目经理手机='".$mobile."' or a.安全主管手机='".$mobile."' or a.安全员手机='".$mobile."' or a.机械管理员手机='".$mobile."' or a.联系方式='".$mobile."' or a.部门负责人A手机='".$mobile."' or a.部门负责人B手机='".$mobile."' or a.部门负责人C手机='".$mobile."' or a.生产经理手机='".$mobile."' or a.质量员手机='".$mobile."' or a.质量负责人手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
	
				} else {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称   and   b.回复日期  !='' and b.批复日期 = ''  and b.检查层级 like '%".$company."%'  and (a.总公司负责人A手机='".$mobile."' or a.总公司负责人B手机='".$mobile."' or a.总公司负责人C手机='".$mobile."' or a.总部巡查员手机='".$mobile."' or a.项目经理手机='".$mobile."' or a.安全主管手机='".$mobile."' or a.安全员手机='".$mobile."' or a.机械管理员手机='".$mobile."' or a.联系方式='".$mobile."' or a.部门负责人A手机='".$mobile."' or a.部门负责人B手机='".$mobile."' or a.部门负责人C手机='".$mobile."' or a.生产经理手机='".$mobile."' or a.质量员手机='".$mobile."' or a.质量负责人手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
				}
				
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
						$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and   b.回复日期  !='' and b.批复意见 = '合格'  and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
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
							$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and  b.回复日期  !='' and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
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
						
					}
				}
			}
		}
	
	}
	
	echo $json;
	$conn->close();
?>