<?php
	require ("../conn.php");
	
	//定义变量获取POST方法的值
	$zt1 = $_POST["zt1"];
	$star = $_POST["star"];
	$end = $_POST["end"];
	$mobile=$_POST["mobile"];
	$belong =$_POST["section"];
	
	$ret_data = '';
	
	$showtime=date("Y-m-d");
	
	$fgs = "";
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
	
	if($zt1=="整改中"){
		//整改中
		$connection="";
		
		
		if($belong=='总公司'){
			$sqldate="";
			$sql2 = "select *  from 通知单 where 通知单状态='整改中' and 检查日期 between '".$star."' and '".$end."'  and cast(整改期限  as datetime) >='$showtime' ";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sqldate="";
			$sql2 = "select * from 我的工程 a,通知单  b where 通知单状态='整改中'  and a.id = b.`工程id` AND a.所属公司='$belong'  and cast(整改期限  as datetime) >= '$showtime'and 检查日期 between '$star'and '$end'";
				$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($count==0&&$fgs==null){
			$sqldate="";
			$sql2 = "select * from 通知单  where 通知单状态='整改中' and 检查日期 between '$star'and '$end' and 工程名称 ='$belong' and 检查层级 = '项目部自检' and cast(整改期限  as datetime) >= '$showtime'";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}
		
		
		}
			
		
		else if($zt1=="逾期"){
		$connection="";
		
		
		if($belong=='总公司'){
			$sqldate="";
			$sql2 = "select *  from 通知单 where 通知单状态='整改中' and 检查日期 between '".$star."' and '".$end."' and  检查层级 like '%总部%' and cast(整改期限  as datetime) < '$showtime'";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sqldate="";
			$sql2 = "select * from 我的工程 a,通知单  b where 通知单状态='整改中'   and a.id = b.`工程id` AND a.所属公司='$belong'  and cast(整改期限  as datetime) < '$showtime'and 检查日期 between '$star'and '$end'";
				$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($count==0&&$fgs==null){
			$sqldate="";
			$sql2 = "select * from 通知单  where 通知单状态='整改中' and 检查日期 between '$star'and '$end' and 工程名称 ='$belong' and 检查层级 = '项目部自检' and cast(整改期限  as datetime) < '$showtime'";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		
		
		
		}
			
	}else{
		$connection="";
		
		if($belong=='总公司'){
			$sqldate="";
			$sql2 = "select *  from 通知单 where 通知单状态='".$zt1."' and 检查日期 between '".$star."' and '".$end."'and  检查层级 like '%总部%'  ";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($belong!='总公司'&&($count!=0||$fgs!=null)){
			$sqldate="";
			$sql2 = "select * from 我的工程 a,通知单  b where 通知单状态='".$zt1."'   and a.id = b.`工程id` AND a.所属公司='$belong'  and 检查日期 between '$star'and '$end'";
				$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}else if($count==0&&$fgs==null){
			$sqldate="";
			$sql2 = "select * from 通知单  where 通知单状态='".$zt1."' and 检查日期 between '$star'and '$end' and 工程名称 ='$belong' and 检查层级 = '项目部自检' ";
			$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$i=0;
			while($row = $result2->fetch_assoc()){
					$ret_data[$i][0]= $row["工程名称"];
					$ret_data[$i][1] = $row["通知单编号"];
					$ret_data[$i][2] = $row["时间戳"];
					$ret_data[$i][3]  = $row["id"];
					$ret_data[$i][4] = $row["工程id"];
					$ret_data[$i][5] = $row["检查日期"];
					$i++;
				}
			}else{
						
			}
//			$connection=$connection.$sqldate;
		}
		
		
		
			
	}
	
	
//	$jsonresult = 'success';
//	$otherdate = '{"result":"'.$jsonresult.'"
//				}';
//	$json = '['.$connection.$otherdate.']';
//	printf($ret_data);
//	echo $belong;
	$json = json_encode($ret_data);
	echo $json;
	$conn->close();
?>