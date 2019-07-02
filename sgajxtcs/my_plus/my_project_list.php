<?php
	require ("../conn.php");
	$mobile=$_POST["mobile"];
	$bumen=$_POST["bumen"];
	$time = "";
	$time = $_POST["time"];
	//项目部，分公司，总公司判断
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
	
	if($zgscount==0&&$fgs==null){
			$mysql2 = "SELECT 时间戳,工程名称 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='项目部' AND 联系方式='".$mobile."' ) OR (项目经理手机='".$mobile."' OR 安全主管手机='".$mobile."' OR `安全员手机`='".$mobile."'OR 生产经理手机='".$mobile."' OR 机械管理员手机='".$mobile."'OR 质量员手机='".$mobile."'OR 质量负责人手机='".$mobile."' ) ORDER  BY  时间戳 DESC LIMIT 1";
			$res2 = $conn->query($mysql2);
			if($res2->num_rows>0){
			while($row1 =$res2->fetch_assoc()){
				$xmb = $row1["工程名称"];
			}
		}
		
	}
	
	
	$sqldate="";
	if($time=='all'||$time==null){
		if($zgscount!=0){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市  from 我的工程 a where  a.`形象进度` !='竣工验收'";	
			}else if($zgscount==0&&$fgs!=null){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市  from 我的工程 a where a.`形象进度` !='竣工验收' and a.所属公司='$fgs' ";	
								
			}else if($zgscount ==0&&$fgs==null){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市  from 我的工程 a where a.`形象进度` !='竣工验收' and a.工程名称='$xmb' ";	
			}
	  }else if($time=='week'){
	  	if($zgscount!=0){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市 from 我的工程 a,通知单 b where   a.id = b.`工程id` and  DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(b.检查日期) and a.`形象进度` !='竣工验收'  GROUP BY 工程名称";		
			}else if($zgscount==0&&$fgs!=null){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市 from 我的工程 a,通知单 b where   a.id = b.`工程id` and  DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(b.检查日期) and a.`形象进度` !='竣工验收' and a.所属公司='$fgs'  GROUP BY 工程名称";	
								
			}else if($zgscount ==0&&$fgs==null){
				$sql1 = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市 from 我的工程 a,通知单 b where   a.id = b.`工程id` and  DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(b.检查日期) and a.`形象进度` !='竣工验收' and a.工程名称='$xmb' GROUP BY 工程名称";	
			}
	  	
	  }
	
	$result1 = $conn->query($sql1);
	$class = mysqli_num_rows($result1); 
	if ($result1->num_rows > 0) {
		while($row = $result1->fetch_assoc()) {
			$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","地区":"'. $row["工程位置"].'","项目类别":"'. $row["项目类别"].'","工程状态":"'. $row["工程状态"].'","地区省":"'. $row["地区省"].'","地区市":"'. $row["地区市"].'"},';
		}
	}else{
		$class=0;
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
	//  $sqldate=$mobile.$bumen.$time;
//	$json = '['.$sqldate.']';
	echo $json;
	$conn->close();
?>