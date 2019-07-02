<?php
	require("../conn.php");
	$flag=$_POST["flag"];	
	
	$sqldate="";
	
	if($flag=="my_project_message_get_shengFeng"){
		$sql = "select distinct 地区省 from 我的工程 order by 地区省 desc";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"所在省份":"'. $row["地区省"].'"},';
			}
		}else{
			
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="my_project_message_get_chengShi"){
		$sql = "select distinct 地区市 from 我的工程 order by 地区市 desc";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			 	$sqldate= $sqldate.'{"所在城市":"'. $row["地区市"].'"},';
			}
		}else{
			
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="project_message_search"){
		
		$gcmc=$_POST["gcmc"];
		$mobile=$_POST["mobile"];
		
		$sqldate="";
		$sql1 = "select * from (select a.id,a.时间戳,a.工程名称,a.地区,a.项目类别,a.工程状态,a.形象进度,a.审核结果,a.整改,a.停工,a.扣分,a.工程位置,a.经纬度,a.误差范围,a.建筑面积,a.层数,a.高度,a.基坑深度,a.项目经理,a.项目经理手机,a.安全主管,a.安全主管手机,a.安全员,a.安全员手机,a.机械管理员,a.机械管理员手机,a.责任人,a.联系方式,a.部门负责人A,a.部门负责人A手机,a.部门负责人B,a.部门负责人B手机,a.部门负责人C,a.部门负责人C手机,a.总公司负责人A,a.总公司负责人A手机,a.总公司负责人B,a.总公司负责人B手机,a.总公司负责人C,a.总公司负责人C手机,a.施工许可证取得情况,a.开工报告,a.开工报告附件上传,a.用户id,a.开工日期,a.竣工日期,a.栋数,a.所属公司,a.地区省,a.地区市,a.总部巡查员,a.总部巡查员手机,a.生产经理,a.生产经理手机,a.审核,a.质量员,a.质量员手机,质量负责人,质量负责人手机,b.mobileZgs,b.mobileOther,b.时间戳 as 工程动态添加手机工程时间戳 from 我的工程 a left join 工程动态添加手机 b on a.时间戳=b.时间戳) as 工程列表临时表  where (总公司负责人A手机='".$mobile."' or 总公司负责人B手机='".$mobile."' or 总公司负责人C手机='".$mobile."' or 总部巡查员手机='".$mobile."' or 项目经理手机='".$mobile."' or 安全主管手机='".$mobile."' or 安全员手机='".$mobile."' or 机械管理员手机='".$mobile."' or 联系方式='".$mobile."' or 部门负责人A手机='".$mobile."' or 部门负责人B手机='".$mobile."' or 部门负责人C手机='".$mobile."' or 生产经理手机='".$mobile."' or 质量员手机='".$mobile."' or 质量负责人手机='".$mobile."' or (mobileZgs like '%".$mobile."%') or (mobileOther like '%".$mobile."%')) and 工程名称 like '%".$gcmc."%' and 形象进度 !='竣工验收'";
		$result1 = $conn->query($sql1);
		$class = mysqli_num_rows($result1); 
		if ($result1->num_rows > 0) {
			while($row = $result1->fetch_assoc()) {
				$sqldate= $sqldate.'{"id":"'. $row["id"].'","工程名称":"'. $row["工程名称"].'","地区":"'. $row["工程位置"].'","项目类别":"'. $row["项目类别"].'","工程状态":"'. $row["工程状态"].'","地区省":"'. $row["地区省"].'","地区市":"'. $row["地区市"].'"},';
			}
			$jsonresult = 'success';
			$otherdate = '{"result":"'.$jsonresult.'",
							"count":"'.$class.'"
						}';
			$json = '['.$sqldate.$otherdate.']';
		}	
	}else{
		
	}
	
	echo $json;
	$conn->close();	
		
?>