<?php
	require("conn.php");
	$flag = $_POST["flag"];
	if($flag=='f0'){
//		$wzdl = $_POST["wzdl"];
		$sql = "SELECT  DISTINCT 违章大类 FROM 违章数据库  GROUP BY 违章大类";
		$res = $conn->query($sql);
		if($res->num_rows>0){
			$i=0;
			while($row = $res->fetch_assoc()){
				$ret_data[$i]['wzdl'] = $row["违章大类"];
				$i++;
			}
		}
	}else if($flag=='f1'){
		$sql = "SELECT  DISTINCT `部门` FROM 公司部门  GROUP BY 部门";
		$res = $conn->query($sql);
		if($res->num_rows>0){
			$i=0;
			while($row = $res->fetch_assoc()){
				$ret_data[$i]['section'] = $row["部门"];
				$i++;
			}
		}
	}else if($flag=='f2'){
		$wzdl = $_POST["wzdl"];
		$section = $_POST["section"];
		$end = $_POST["end"];
		$star = $_POST["star"];
		//违章大类总查询
		if($wzdl=='全部'){
			$mysql ="select DISTINCT 违章大类 from 违章数据库";
			$myres = $conn->query($mysql);
			$wzcount = mysqli_num_rows($myres);
			if($myres->num_rows>0){
				$i=0;
				while($myrow=$myres->fetch_assoc()){
					$ret_data[$i]['违章大类']=$myrow["违章大类"];
					$i++;
				}
			}
			for($x=0;$x<$wzcount;$x++){
				$cftm="";
				if($section =='全部'){
					$sql ="SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期  between '".$star."' and '".$end."' and a.违章大类 like '%".$ret_data[$x]['违章大类']."%' AND a.`工程id` =b.`工程id`";
				}else if($section=='总公司'){
					$sql ="SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号 and a.违章大类 like '%".$ret_data[$x]['违章大类']."%' and 检查日期 between '".$star."' and '".$end."' and 检查层级 like '%总部%'AND a.工程id=b.`工程id`";
				}else if($section!='总公司'&&$section !='全部'){
					$sql = "select c.内容  from 我的工程 a,通知单  b,处罚条目 c where   (检查单位='$section' or 检查层级='项目部自检') and a.id = b.`工程id` AND a.所属公司='$section'and 违章大类 like '%".$ret_data[$x]['违章大类']."%' and 检查日期 between '".$star."' and '".$end."'and b.通知单编号 = c.通知单编号 AND b.工程id=c.工程id";
				}
				$sql_1="select 内容  from 违章数据库  where 违章大类 like '%".$ret_data[$x]['违章大类']."%' GROUP BY 内容";
				$res_1=$conn->query($sql_1);
				$cftm_num = mysqli_num_rows($res_1);
				if($res_1->num_rows>0){
					while($row_1=$res_1->fetch_assoc()){
						$cftm[] = $row_1["内容"];
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
            //总计
			if($section=='全部'){
				$sql_2 = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期 between '".$star."' and '".$end."' AND a.`工程id` =b.`工程id`";
			}else if($section=='总公司'){
				$sql_2 = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号  and 检查日期 between '".$star."' and '".$end."' and 检查层级 like '%总部%' AND a.`工程id` =b.`工程id`";
			}else if($section!='总公司'&&$section!='全部'){
				$sql_2 = "select c.内容  from 我的工程 a,通知单  b,处罚条目 c where   (检查单位='$section' or 检查层级='项目部自检') and a.id = b.`工程id` AND a.所属公司='$section' and 检查日期 between '".$star."' and '".$end."'and b.通知单编号 = c.通知单编号 AND b.`工程id` =c.`工程id`";
			}
			$allcount = 0;
			$result1 = $conn->query($sql_2);
			if ($result1->num_rows > 0) { 
				while($allrow = $result1->fetch_assoc()) {
					$allarray = explode('||', $allrow["内容"]);
					$allnum = count($allarray)-1;
					$allcount =$allcount+$allnum;
				}
			} 
			$ret_data[0]['allcount']=$allcount;
		}else{
			$mysql3 = "select DISTINCT 检查项目 from 违章数据库 where 违章大类 ='$wzdl'";
			$res3 = $conn->query($mysql3);
			if($res3->num_rows>0){
				$wzcount = mysqli_num_rows($res3);
		//		$data[0]['count'] = $wzcount;
				$i=0;
				while($row3=$res3->fetch_assoc()){
					//此处与下面的违章大类是为了方便前端的调用，其本身的意义是检查项目
					$ret_data[$i]['违章大类']=$row3["检查项目"];
		//			$jcxm[$i] = $row3["检查项目"];
					$i++;
				}
			}
			//判断大类总体违章条数
			if($section=='全部'){
				$sql = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号 and a.违章大类 like '%".$wzdl."%' and 检查日期 between '".$star."' and '".$end."' AND a.工程id=b.`工程id` ";
			}
			else if($section=='总公司'){
				$sql = "SELECT 内容 from 通知单 a,处罚条目 b WHERE a.通知单编号 = b.通知单编号 and a.违章大类 like '%".$wzdl."%' and 检查日期 between '".$star."' and '".$end."' and 检查层级 like '%总部%'AND a.工程id=b.`工程id` ";
			}else if($section!='总公司'&&$section!='全部'){
				$sql = "select c.内容  from 我的工程 a,通知单  b,处罚条目 c where   (检查单位='$section' or 检查层级='项目部自检') and a.id = b.`工程id` AND a.所属公司='$section'and 违章大类 like '%".$wzdl."%' and 检查日期 between '".$star."' and '".$end."'and b.通知单编号 = c.通知单编号 AND b.工程id=c.工程id";	
			}
			$mysql = "select 内容  from 违章数据库  where 违章大类 like '%".$wzdl."%' GROUP BY 内容 ";
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
								$wztm_num ++;
							}
						}
					}
					$wzdlcount =$wzdlcount+$wztm;
				}
			}
			$ret_data[0]['allcount']=$wzdlcount;
			//判断目标违章大类中检查项目的条数
			for($x=0;$x<$wzcount;$x++){
				$xmnr = "";
				$sql_1 ="select 内容 from 违章数据库  where 检查项目 ='".$ret_data[$x]['违章大类']."' and 违章大类='$wzdl' GROUP BY 内容 ";
				$res_1 = $conn->query($sql_1);
				$xmnr_num= mysqli_num_rows($res_1);
				if($res_1->num_rows>0){
				while($myrow_1 = $res_1->fetch_assoc()) {
					$xmnr[] = $myrow_1["内容"];
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
							for($y=0;$y<$xmnr_num;$y++){
								if($array[$i]==$xmnr[$y]){
									$wztm_num ++;
								}
							}
						}
						$wzdlcount =$wzdlcount+$wztm;
					}
				}
				$ret_data[$x]['wzcount']=$wzdlcount;
			}
		}
	}
	$json=json_encode($ret_data);
	echo $json;
	$conn->close();
?>