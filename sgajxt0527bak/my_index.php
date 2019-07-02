<?php
    require("conn.php");
	$mode=$_POST["mode"];
	$mobile=$_POST["mobile"]; 
	
	if($mode=="wdgc"){
		$jsonresult='';
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$sql2 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
			$result2 = $conn->query($sql2);
			$class = mysqli_num_rows($result2); 
			if ($result2->num_rows > 0) {
				$jsonresult='1';
			} else {
				 $jsonresult='0';
			}
		}else{
			//查看手机号码是否是新增的
			$sql3="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$result3=$conn->query($sql3);
			$class=mysqli_num_rows($result3); 
			if ($result3->num_rows > 0) {
				$jsonresult='1';
			}else {
				$sql5 = "select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
				$result5 = $conn->query($sql5);
				$class = mysqli_num_rows($result5); 
				if ($result5->num_rows > 0) {
					$jsonresult='1';
				}else {
					$sql2 = "select * from 我的工程 where 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'";
					$result2 = $conn->query($sql2);
					$class = mysqli_num_rows($result2); 
					if ($result2->num_rows > 0) {
						$jsonresult='1';
					}else {
						$jsonresult='0';
					}
				}
			}
		}
		$json = '{
			"result":"'.$jsonresult.'",
			"count":"'.$class.'"
		}';
	}else if($mode=="dbzg"){
		$sqldate='';
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and (总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
			$result = $conn->query($sql);
			$class = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'"},';
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
			$sqlzg="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$resultzg=$conn->query($sqlzg);
			$class=mysqli_num_rows($resultzg); 
			//$row = $resultzg->fetch_assoc();
			if ($resultzg->num_rows > 0) {
				$count=0;
				while($row = $resultzg->fetch_assoc()) {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
					$result = $conn->query($sql);
					$class = mysqli_num_rows($result); 
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
						 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'"},';
						}
					} else { 
					}
					$count=$count+$class;
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}else{
				$sql2 = "select * from 我的工程 where 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'";
				$result2 = $conn->query($sql2);
				$class = mysqli_num_rows($result2); 
				if ($result2->num_rows > 0) {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and (项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."') and a.工程名称=b.工程名称 order by a.工程名称,b.通知单状态 desc";
					$result = $conn->query($sql);
					$class = mysqli_num_rows($result); 
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'"},';
						}
					} else { 
					} 
					$jsonresult = 'success';
					$otherdate = '{"result":"'.$jsonresult.'",
									"count":"'.$class.'"
								}';
					$json = '['.$sqldate.$otherdate.']';
				}else{
					$sql5 = "select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
					$result5 = $conn->query($sql5);
					$class = mysqli_num_rows($result5); 
					if ($result5->num_rows > 0) {
						$count=0;
						while($row = $resultzg->fetch_assoc()) {
							$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
							$result = $conn->query($sql);
							$class = mysqli_num_rows($result); 
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'"},';
								}
							} else { 
							}
							$count=$count+$class;
						}
						$jsonresult = 'success';
						$otherdate = '{"result":"'.$jsonresult.'",
										"count":"'.$count.'"
									}';
						$json = '['.$sqldate.$otherdate.']';
					}else {
						
						$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and 分享人号码  like '%".$mobile."%' order by a.工程名称,b.通知单状态 desc";
						$result = $conn->query($sql);
						$class = mysqli_num_rows($result); 
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								 $sqldate= $sqldate.'{"id":"'.$row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'"},';
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
			
		}
	}else if($mode=="tjfx"){
		$sqldate='';
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and (总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
			$result = $conn->query($sql);
			$count = mysqli_num_rows($result);
			if($result->num_rows > 0){
				$jsonresult='1';
			}else{
				$jsonresult='0';					
			}
			
			$json = '{
				"result":"'.$jsonresult.'",
				"count":"'.$count.'"
			}';
		}else{
			$sqltjfx="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$resulttjfx=$conn->query($sqltjfx);
			$class=mysqli_num_rows($resulttjfx);
			//$row = $resulttjfx->fetch_assoc(); 
			if ($resulttjfx->num_rows > 0) {
				$count1=0;
				while($row = $resulttjfx->fetch_assoc()) {
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and a.时间戳='".$row["时间戳"]."'  order by a.工程名称,b.通知单状态 desc";
					$result = $conn->query($sql);
					$count = mysqli_num_rows($result);
					if($result->num_rows > 0){
						$jsonresult='1';
					}else{
						$jsonresult='0';					
					}
					$count1=$count1+$count;
				}
				$json = '{
					"result":"'.$jsonresult.'",
					"count":"'.$count1.'"
				}';
			}else{
				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and  (a.项目经理手机='$mobile' or a.安全主管手机='$mobile' or 安全员手机='$mobile' or 机械管理员手机='$mobile' or 联系方式='$mobile' or 部门负责人A手机='$mobile' or 部门负责人B手机='$mobile' or 部门负责人C手机='$mobile' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
				$result = $conn->query($sql);
				$count = mysqli_num_rows($result);
				if($result->num_rows > 0){
					$jsonresult='1';
				}else{
					$sqltjfx1="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
					$resulttjfx1=$conn->query($sqltjfx1);
					$class=mysqli_num_rows($resulttjfx1);
					//$row = $resulttjfx1->fetch_assoc(); 
					if ($resulttjfx1->num_rows > 0) {
						$jsonresult='1';
					}else{
						$count1=0;
						while($row = $resultzg->fetch_assoc()) {
							$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and 时间戳='".$row["时间戳"]."' order by a.工程名称,b.通知单状态 desc";
							$result = $conn->query($sql);
							$count = mysqli_num_rows($result);
							if($result->num_rows > 0){
								$jsonresult='1';
							}else{
								$jsonresult='0';
							}
							$count1=$count1+$count;
						}
					}
					$json = '{
						"result":"'.$jsonresult.'",
						"count":"'.$count1.'"
					}';			
				}
				
				$json = '{
					"result":"'.$jsonresult.'",
					"count":"'.$count.'"
				}';
			}
			
		}
	}else{
		
	}
	echo $json;
	mysqli_close($conn);
	
?>