<?php
	require ("../conn.php");
	$flag=$_POST["flag"];
	$mobile=$_POST["mobile"];
	$company=$_POST["company"];
	$section = $_POST["section"];
	$fgs = "";
	
	$mysql = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='分公司' AND 联系方式 = '".$mobile."' ) OR (部门负责人A手机 = '".$mobile."' OR 部门负责人B手机 = '".$mobile."' OR 部门负责人C手机 = '".$mobile."') ORDER  BY  时间戳 DESC LIMIT 1";
	$res = $conn->query($mysql);
	if($res->num_rows>0){
		while($myrow =$res->fetch_assoc()){
			$fgs = $myrow["所属公司"];
		}
	}
	$mysql1 = "SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='总公司' AND 联系方式 = '".$mobile."' ) OR (总公司负责人A手机 = '".$mobile."' OR 总公司负责人B手机 = '".$mobile."' OR 总公司负责人C手机 = '".$mobile."' OR 总部巡查员手机 = '".$mobile."')";
	$res1 = $conn->query($mysql1);
	$count = mysqli_num_rows($res1);
	
	if($flag=="zhneggai"){
		
			if($company=="总部"){
				$sqldate="";
				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查层级 like '%".$company."%' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限 AND a.id=b.工程id and 总公司批复意见 ='' order by a.工程名称,b.通知单状态 desc";
				$result = $conn->query($sql);
				$class = mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
				}
				}else{
					
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$class.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
				
			}else if($company=="分公司"){
				$sqldate="";
//				if($count>0){
//					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查层级 in  ('分公司月度检查','分公司巡查','分公司专项检查') and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<整改期限 AND a.id=b.工程id and 分公司批复 ='' order by a.工程名称,b.通知单状态 desc";
//				}else{
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查单位 = '".$section."' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限 AND a.id=b.工程id and 分公司批复 ='' order by a.工程名称,b.通知单状态 desc";
//				}
				
				$result = $conn->query($sql);
				$class = mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
				}
				}else{
					
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$class.'"
							}';
				$json = '['.$sqldate.$otherdate.']';
			}else if($company=="项目部"){
				$sqldate="";
				if($count>0){
//				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查层级 ='项目部自检'  order by a.工程名称,b.通知单状态 desc";
				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称    and b.检查层级 ='项目部自检' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限 AND a.id=b.工程id  order by a.工程名称,b.通知单状态 desc ";
				}else if($count==0&&$fgs!=null){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.所属公司='".$fgs."' and b.`检查层级` = '项目部自检' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限 AND a.id=b.工程id  order by a.工程名称,b.通知单状态 desc";
				}else if($count==0&&$fgs==null){
					$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and (a.时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='项目部' AND 联系方式 = '".$mobile."' ) OR (a.联系方式='".$mobile."' OR a.项目经理手机='".$mobile."' OR a.安全主管手机='".$mobile."' OR a.`安全员手机`='".$mobile."'OR a.生产经理手机='".$mobile."' OR a.机械管理员手机='".$mobile."'OR a.质量员手机='".$mobile."'OR a.质量负责人手机='".$mobile."')) and b.`检查层级` = '项目部自检' and DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')<=整改期限   AND a.id=b.工程id order by a.工程名称,b.通知单状态 desc";
				}
				
				$result = $conn->query($sql);
				$class = mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					 $sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","通知单状态":"'. $row["通知单状态"].'","截止日期":"'. $row["整改期限"].'","时间戳":"'. $row["时间戳"].'","工程id":"'. $row["工程id"].'"},';
				}
				}else{
					
				}
				$jsonresult = 'success';
				$otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$class.'"
								
							}';
				$json = '['.$sqldate.$otherdate.']';
			}
			
		
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