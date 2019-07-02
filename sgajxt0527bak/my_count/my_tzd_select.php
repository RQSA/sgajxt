<?php
	require ("../conn.php");
	
	//定义变量获取POST方法的值
	$gcid = $_POST["gcid"];
	$zt1 = $_POST["zt1"];
	$star = $_POST["star"];
	$end = $_POST["end"];
	
	$newstr = substr($gcid,0,strlen($gcid)-1);
	$gcidNew = explode(',',$newstr);
	
	$showtime=date("Y-m-d");
	
	if($zt1=="整改中"){
		//整改中
		$connection="";
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate="";
			$sql2 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '".$star."' and '".$end."' and 工程id='".$gcidNew[$index]."' and cast(整改期限  as datetime) > '$showtime'";
			$result2 = $conn->query($sql2);
			if($result2->num_rows > 0){
				while($row = $result2->fetch_assoc()){
					$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","时间戳":"'. $row["时间戳"].'","id":"'. $row["id"].'","工程id":"'. $row["工程id"].'","检查日期":"'. $row["检查日期"].'"},';
				}
			}
			$connection=$connection.$sqldate;
		}
	}else if($zt1=="逾期"){
		$connection="";
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate="";
			$sql9 = "select * from 通知单 where 通知单状态='整改中' and 检查日期 between '".$star."' and '".$end."' and 工程id='".$gcidNew[$index]."' and cast(整改期限  as datetime) < '$showtime'";
			$result9 = $conn->query($sql9);
			if($result9->num_rows > 0){
				while($row = $result9->fetch_assoc()){
					$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","时间戳":"'. $row["时间戳"].'","id":"'. $row["id"].'","工程id":"'. $row["工程id"].'","检查日期":"'. $row["检查日期"].'"},';
				}
			}else{
						
			}
			$connection=$connection.$sqldate;
		} 
	}else{
		$connection = "";
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 通知单 where 通知单状态 = '".$zt1."' and 检查日期 between '".$star."' and '".$end."' and 工程id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","通知单编号":"'. $row["通知单编号"].'","时间戳":"'. $row["时间戳"].'","id":"'. $row["id"].'","工程id":"'. $row["工程id"].'","检查日期":"'. $row["检查日期"].'"},';
				}
			} else { 
			
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