<?php
	require("../conn.php");
	$wzdl = $_POST["wzdl"];
	$star = $_POST["star"];
	$end = $_POST["end"];
	$mobile = $_POST["mob"];
	$belong = $_POST["belong"];
	$section = $belong;
	$sqldate = "";
	$fgs = "";
	
	if($belong==''){
		$belong='secall';
	}
	//总公司，分公司，项目部判断
	$mysql1 = "SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='总公司' AND 联系方式 = '".$mobile."' ) OR (总公司负责人A手机 = '".$mobile."' OR 总公司负责人B手机 = '".$mobile."' OR 总公司负责人C手机 = '".$mobile."' OR 总部巡查员手机 = '".$mobile."')";
	$res1 = $conn->query($mysql1);
	$count = mysqli_num_rows($res1);
	
	$mysql2 = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='分公司' AND 联系方式 = '".$mobile."' ) OR (部门负责人A手机 = '".$mobile."' OR 部门负责人B手机 = '".$mobile."' OR 部门负责人C手机 = '".$mobile."') ORDER  BY  时间戳 DESC LIMIT 1";
	
	$res1 = $conn->query($mysql1);
	$res2 = $conn->query($mysql2);
	
	if($res2->num_rows>0){
		while($row =$res2->fetch_assoc()){
			$fgs = $row["所属公司"];
		}
	}
	$mysql3 = "select DISTINCT 违章大类 from 违章数据库 ";
	$res3 = $conn->query($mysql3);
	if($res3->num_rows>0){
		$wzcount = mysqli_num_rows($res3);
//		$data[0]['count'] = $wzcount;
		$i=0;
		while($row3=$res3->fetch_assoc()){
			$ret_data[$i]['违章大类']=$row3["违章大类"];
			$i++;
		}
	}
	for($x=0;$x<$wzcount;$x++){
		$cftm = "";
		if($belong== 'secall'){
		$sql = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期  between '".$star."' and '".$end."' and a.违章大类 like '%".$ret_data[$x]['违章大类']."%' AND a.`工程id` =b.`工程id`";
	}else if($belong=='总公司'){
		$sql = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号 and a.违章大类 like '%".$ret_data[$x]['违章大类']."%' and 检查日期 between '".$star."' and '".$end."' and 检查层级 like '%总部%'AND a.工程id=b.`工程id` ";
	}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
		$sql = "select c.内容  from 我的工程 a,通知单  b,处罚条目 c where   (检查单位='$belong' or 检查层级='项目部自检') and a.id = b.`工程id` AND a.所属公司='$belong'and 违章大类 like '%".$ret_data[$x]['违章大类']."%' and 检查日期 between '".$star."' and '".$end."'and b.通知单编号 = c.通知单编号 AND b.工程id=c.工程id";	
	}else if($count==0&&$fgs==null){
		$sql = "select 内容  from 通知单 a,处罚条目 b where 违章大类 like '%".$ret_data[$x]['违章大类']."%' and 检查日期 between '".$star."' and '".$end."'and  a.工程名称 ='$belong' and 检查层级 = '项目部自检' and a.通知单编号 = b.通知单编号 AND a.工程id=b.工程id";
	}
	$mysql = "select 内容  from 违章数据库  where 违章大类 like '%".$ret_data[$x]['违章大类']."%' GROUP BY 内容 ";
	$myres =$conn->query($mysql);
	$cftm_num = mysqli_num_rows($myres);
	if($myres->num_rows>0){
		while($myrow = $myres->fetch_assoc()) {
			$cftm[] = $myrow["内容"];
		}
	}
	
	$wztm_num=0;
	$wztm = 0;
	$wzdlcount= 0;
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			$array = explode('||', $row["内容"]);
			$num = count($array)-1;
			$wztm = 0;
			for($i=0;$i<$num;$i++){
				$wztm = $wztm+$wztm_num;
				$wztm_num =0;
				for($y=0;$y<$cftm_num;$y++){
					if($array[$i]==$cftm[$y]){
						$wztm_num++;
					}
				}
			}
			$wzdlcount =$wzdlcount+$wztm;
		}
	}
	$ret_data[$x]['wzcount']=$wzdlcount;
	}
	
	if($belong=='secall'){
		$sql1 = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期 between '".$star."' and '".$end."' AND a.`工程id` =b.`工程id`";
	}else if($belong=='总公司'){
		$sql1 = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期 between '".$star."' and '".$end."' and 检查层级 like '%总部%' AND a.`工程id` =b.`工程id`";
	}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
		$sql1 = "select c.内容  from 我的工程 a,通知单  b,处罚条目 c where   (检查单位='$belong' or 检查层级='项目部自检') and a.id = b.`工程id` AND a.所属公司='$belong' and 检查日期 between '".$star."' and '".$end."'and b.通知单编号 = c.通知单编号 AND b.`工程id` =c.`工程id`";
	}else if($count==0&&$fgs==null){
		$sql1 = "select 内容  from 通知单 a,处罚条目 b where  检查日期 between '".$star."' and '".$end."'and  a.工程名称 ='$belong' and 检查层级 = '项目部自检' and a.通知单编号 = b.通知单编号 AND a.`工程id` =b.`工程id`";
	}
	$allcount = 0;
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) { 
		while($allrow = $result1->fetch_assoc()) {
			$allarray = explode('||', $allrow["内容"]);
			$allnum = count($allarray)-1;
			$allcount =$allcount+$allnum;
		}
	} 
	$ret_data[0]['allcount']=$allcount;
	
//	$count=mysqli_num_rows($result1);
//	$jsonresult = 'success';
//	$otherdate = '{"result":"'.$jsonresult.'",
//					"count":"'.$count.'"
//						}';
//	$json = '['.$sqldate.$otherdate.']';
	$json = json_encode($ret_data);
	echo $json;
	$conn->close();
?>