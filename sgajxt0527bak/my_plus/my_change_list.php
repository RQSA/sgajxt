<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$qdlx=$_POST["qdlx"]; //清单类型
	
	if($qdlx=="caogao"){
		//////////////////////////////// 草稿  ////////////////////////////////////////////////////////// 
		$sqldate="";
		$cg="草稿";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$cg."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// 草稿  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="zgz"){
		//////////////////////////////// 整改中  ////////////////////////////////////////////////////////// 
		$zgz="整改中";
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$zgz."'  order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","是否延期":"'. $row["是否延期"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// 整改中  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="yq"){
		/////////////////////////////// 延期  ////////////////////////////////////////////////////////////
		$yanqi="延期";
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$yanqi."'  order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 延期  ////////////////////////////////////////////////////////////
	}else if($qdlx=="yuqi"){
		/////////////////////////////// 逾期  ////////////////////////////////////////////////////////////
		$yuqi="逾期";
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$yuqi."'  order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 逾期  ////////////////////////////////////////////////////////////
	}else if($qdlx=="wwc"){
		/////////////////////////////// 未完成  ////////////////////////////////////////////////////////////
		$wwc="未完成";
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$wwc."'  order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 未完成  ////////////////////////////////////////////////////////////
	}else if($qdlx=="ywc"){
		/////////////////////////////// 已完成  ////////////////////////////////////////////////////////////
		$ywc="已完成";
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 通知单状态='".$ywc."'  order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 已完成  ////////////////////////////////////////////////////////////
	}else if($qdlx=="sfyz"){
		/////////////////////////////// 判断该工程是否存在值  //////////////////////////////////////////////////	
		$sqldate="";
		$sql = "select * from 通知单   where 工程id='".$gcid. "'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 
		} else {
			
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 判断该工程是否存在值  //////////////////////////////////////////////////
	}else{}
	echo $json;
	$conn->close();
?>