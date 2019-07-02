<?php
    require("conn.php");
	$mode=$_POST["mode"];
	$mobile=$_POST["mobile"]; 
	
	
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
	$zgscount = mysqli_num_rows($res1);
	
	if($zgscount ==0&&$fgs==null){
			$xmb=array();
			$i=0;
			$mysql2 = "SELECT 时间戳,工程名称 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='项目部' AND 联系方式='".$mobile."' ) OR (项目经理手机='".$mobile."' OR 安全主管手机='".$mobile."' OR `安全员手机`='".$mobile."'OR 生产经理手机='".$mobile."' OR 机械管理员手机='".$mobile."'OR 质量员手机='".$mobile."'OR 质量负责人手机='".$mobile."' ) ORDER  BY  时间戳 DESC";
			$res2 = $conn->query($mysql2);
			if($res2->num_rows>0){
			while($row1 =$res2->fetch_assoc()){
				$xmb[$i] = $row1["工程名称"];
				$i++;
			}
		}
		$string=implode("','",$xmb);
	}
	
	if($mode=="wdgc"){
		$jsonresult='';
		if ($mobile=="13603070333"||$mobile=="13826467128"||$mobile=="13632665565"||$mobile=="13510881338"){
			$sql1 = "select * from (select a.id,a.时间戳,a.工程名称,a.地区,a.项目类别,a.工程状态,a.形象进度,a.审核结果,a.整改,a.停工,a.扣分,a.工程位置,a.经纬度,a.误差范围,a.建筑面积,a.层数,a.高度,a.基坑深度,a.项目经理,a.项目经理手机,a.安全主管,a.安全主管手机,a.安全员,a.安全员手机,a.机械管理员,a.机械管理员手机,a.责任人,a.联系方式,a.部门负责人A,a.部门负责人A手机,a.部门负责人B,a.部门负责人B手机,a.部门负责人C,a.部门负责人C手机,a.总公司负责人A,a.总公司负责人A手机,a.总公司负责人B,a.总公司负责人B手机,a.总公司负责人C,a.总公司负责人C手机,a.施工许可证取得情况,a.开工报告,a.开工报告附件上传,a.用户id,a.开工日期,a.竣工日期,a.栋数,a.所属公司,a.地区省,a.地区市,a.总部巡查员,a.总部巡查员手机,a.生产经理,a.生产经理手机,a.审核,a.质量员,a.质量员手机,质量负责人,质量负责人手机,b.mobileZgs,b.mobileOther,b.时间戳 as 工程动态添加手机工程时间戳 from 我的工程 a left join 工程动态添加手机 b on a.时间戳=b.时间戳) as 工程列表临时表 ";
		} else {
			if($zgscount!=0){
				$sql1 = "select * from 我的工程 where 形象进度!='竣工验收' ";
			}else if($zgscount==0&&$fgs!=null){
				$sql1 = "select * from 我的工程 where 形象进度!='竣工验收' and 所属公司='$fgs' ";
								
			}else if($zgscount ==0&&$fgs==null){
				$sql1 = "select * from 我的工程  where 形象进度!='竣工验收' and 工程名称 in ('".$string."') ";
			}
		}
		
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			$jsonresult='1';
		}else{
			$jsonresult='0';
		}
		$json = '{
			"result":"'.$jsonresult.'",
			"count":"'.$class.'"
		}';
	}else if($mode=="dbzg"){
		if ($mobile=="13603070333"||$mobile=="13826467128"||$mobile=="13632665565"||$mobile=="13510881338"){
			$sqldate="";
			$sql1 = "select * from 我的工程 ";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限,b.时间戳,b.工程id from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称     order by a.工程名称,b.通知单状态 desc";
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
		}else{
			$sqldate='';
			$sql1 = "select * from 我的工程 where 总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' or 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."' or 质量负责人手机='".$mobile."'";
			$result1 = $conn->query($sql1);
			$class = mysqli_num_rows($result1); 
			if ($result1->num_rows > 0) {
				$sql = "select a.id,a.工程名称,b.通知单状态,b.通知单编号,b.整改期限 from 我的工程 a,通知单 b where b.通知单状态 in ('延期','整改中') and a.工程名称=b.工程名称 and (a.总公司负责人A手机='".$mobile."' or a.总公司负责人B手机='".$mobile."' or a.总公司负责人C手机='".$mobile."' or a.总部巡查员手机='".$mobile."' or a.项目经理手机='".$mobile."' or a.安全主管手机='".$mobile."' or a.安全员手机='".$mobile."' or a.机械管理员手机='".$mobile."' or a.联系方式='".$mobile."' or a.部门负责人A手机='".$mobile."' or a.部门负责人B手机='".$mobile."' or a.部门负责人C手机='".$mobile."' or a.生产经理手机='".$mobile."' or a.质量员手机='".$mobile."' or a.质量负责人手机='".$mobile."') order by a.工程名称,b.通知单状态 desc";
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
		
			if($zgscount!=0){
				$sql = "select * from 我的工程 a,通知单 b where  a.id=b.`工程id` AND a.`形象进度` !='竣工验收'  order by a.工程名称,b.通知单状态 desc ";
			}else if($zgscount==0&&$fgs!=null){
				$sql = "select * from 我的工程 a,通知单 b where  a.id=b.`工程id` AND a.`形象进度` !='竣工验收' and  a.所属公司='$fgs' order by a.工程名称,b.通知单状态 desc ";
								
			}else if($zgscount ==0&&$fgs==null){
				$sql = "select * from 我的工程 a,通知单 b where  a.id=b.`工程id` AND a.`形象进度` !='竣工验收' and a.工程名称 = '$xmb'  order by a.工程名称,b.通知单状态 desc ";
			}
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
		
	}
	echo $json;
	mysqli_close($conn);
	
?>