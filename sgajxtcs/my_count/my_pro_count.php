<?php
	require ("../conn.php");
	
	//定义变量获取POST方法的值
	$dqsheng = $_POST["dqsheng"]; //地区（省）
	$dqshi = $_POST["dqshi"]; //地区（市）
	$jd = $_POST["jd"]; //进度
	$lb = $_POST["lb"]; //类别
	$gcid = $_POST["gcid"]; //工程id
	
	//去掉字符串最后一个字符
	$newstr = substr($gcid,0,strlen($gcid)-1);
	$gcidNew = explode(',',$newstr);
	$connection = "";
	if($dqsheng!=''&&$dqshi==''&&$jd==''&&$lb==''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi!=''&&$jd==''&&$lb==''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and 地区市= '".$dqshi."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi!=''&&$jd!=''&&$lb==''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and 地区市 = '".$dqshi."' and 形象进度 = '".$jd."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi!=''&&$jd!=''&&$lb!=''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 形象进度 = '".$jd."' and 地区省 = '".$dqsheng."' and 地区市 = '".$dqshi."' and 项目类别 = '".$lb."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi==''&&$jd!=''&&$lb==''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and 形象进度 = '".$jd."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi==''&&$jd!=''&&$lb!=''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and 形象进度 = '".$jd."' and 项目类别 = '".$lb."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng!=''&&$dqshi==''&&$jd==''&&$lb!=''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 地区省 = '".$dqsheng."' and  项目类别 = '".$lb."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng==''&&$dqshi==''&&$lb==''&&$jd!=''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 形象进度 = '".$jd."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng==''&&$dqshi==''&&$jd!=''&&$lb!=''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 形象进度 = '".$jd."' and 项目类别 = '".$lb."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}else if($dqsheng==''&&$jd==''&&$lb!=''&&$dqshi==''){
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 我的工程 where 项目类别 = '".$lb."' and id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","时间戳":"'. $row["时间戳"].'"},';
				}
			} else{
		
			}
			$connection=$connection.$sqldate;
		} 
	}
	
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
	$json = '['.$connection.$otherdate.']';
	echo $json;
	$conn->close();
?>