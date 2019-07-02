<?php
	require ("../conn.php");
	$flag = $_POST["flag"];
	
	if($flag=="zgxc"){
		$mobile = $_POST["mobile"];
		$sqldate="";
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$ceshi="11";
			$sql2 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
			$result2 = $conn->query($sql2);
			$class = mysqli_num_rows($result2); 
			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
						$sqldate= $sqldate.'{"id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'"},';
					}
			} else { 
			} 
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'"
						}';
			$json = '['.$sqldate.$otherdate.']';
		}else{
			//总公司
			$sql3="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$result3=$conn->query($sql3);
			$class=mysqli_num_rows($result3); 
			if ($result3->num_rows > 0) {
				while($row = $result3->fetch_assoc()) {
					$sql2 = "select * from 我的工程 where 时间戳='".$row["时间戳"]."'";
					$result2 = $conn->query($sql2);
					$class = mysqli_num_rows($result2); 
					if ($result2->num_rows > 0) {
						while($row = $result2->fetch_assoc()) {
								$sqldate= $sqldate.'{"id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'"},';
							}
					} else { 
					}
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}else{
				$ceshi="22";
				$sql2 = "select * from 我的工程 where 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'";
				$result2 = $conn->query($sql2);
				$class = mysqli_num_rows($result2); 
				if ($result2->num_rows > 0) {
					while($row = $result2->fetch_assoc()) {
						$sqldate= $sqldate.'{"id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'"},';
					}
				} else { 
					//分公司
					$sql3="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
					$result3=$conn->query($sql3);
					$class=mysqli_num_rows($result3); 
					if ($result3->num_rows > 0) {
						while($row = $result3->fetch_assoc()) {
							$sql2 = "select * from 我的工程 where 时间戳='".$row["时间戳"]."'";
							$result2 = $conn->query($sql2);
							$class = mysqli_num_rows($result2); 
							if ($result2->num_rows > 0) {
								while($row = $result2->fetch_assoc()) {
									$sqldate= $sqldate.'{"id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'"},';
								}
							} else { 
							}
						}
						$jsonresult = 'success';
						$otherdate = '{"result":"'.$jsonresult.'"
									}';
						$json = '['.$sqldate.$otherdate.']';
					}else{
					}
				} 
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}	
		}
	}else{
		$mobile = $_POST["mobile"];
		$sqldate="";
		$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$ceshi="11";
			$sql2 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."'";
			$result2 = $conn->query($sql2);
			$class = mysqli_num_rows($result2); 
			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
						$sqldate= $sqldate.'{"id":"'. $row["id"].'"},';
					}
			} else { 
			} 
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'"
						}';
			$json = '['.$sqldate.$otherdate.']';
		}else{
			//总公司
			$sql3="select * from 工程动态添加手机 where mobileZgs like '%".$mobile."%'";
			$result3=$conn->query($sql3);
			$class=mysqli_num_rows($result3); 
			if ($result3->num_rows > 0) {
				while($row = $result3->fetch_assoc()) {
					$sql2 = "select * from 我的工程 where 时间戳='".$row["时间戳"]."'";
					$result2 = $conn->query($sql2);
					$class = mysqli_num_rows($result2); 
					if ($result2->num_rows > 0) {
						while($row = $result2->fetch_assoc()) {
								$sqldate= $sqldate.'{"id":"'. $row["id"].'"},';
							}
					} else { 
					}
				} 
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}else{
				$ceshi="22";
				$sql2 = "select * from 我的工程 where 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."'";
				$result2 = $conn->query($sql2);
				$class = mysqli_num_rows($result2); 
				if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
						$sqldate= $sqldate.'{"id":"'. $row["id"].'"},';
					}
				} else { 
					//分公司
					$sql3="select * from 工程动态添加手机 where mobileOther like '%".$mobile."%'";
					$result3=$conn->query($sql3);
					$class=mysqli_num_rows($result3); 
					if ($result3->num_rows > 0) {
						while($row = $result3->fetch_assoc()) {
							$sql2 = "select * from 我的工程 where 时间戳='".$row["时间戳"]."'";
							$result2 = $conn->query($sql2);
							$class = mysqli_num_rows($result2); 
							if ($result2->num_rows > 0) {
								while($row = $result2->fetch_assoc()) {
									$sqldate= $sqldate.'{"id":"'. $row["id"].'","时间戳":"'. $row["时间戳"].'"},';
								}
							} else { 
							}
						}
						$jsonresult = 'success';
						$otherdate = '{"result":"'.$jsonresult.'"
									}';
						$json = '['.$sqldate.$otherdate.']';
					}else{
					}
				} 
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}
		}
	}
	
	echo $json;
	$conn->close();
?>