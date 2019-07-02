<?php
	require ("../conn.php");
	
	//定义变量获取POST方法的值
	$tjfx = $_POST["tjfx"];
	$zt1 = $_POST["zt1"];
	$gcid = $_POST["gcid"];
	
	$sqldate = "";
	if($tjfx == "sbgl"){
		$zt = $_POST["zt"];
		//去掉字符串最后一个字符
		$newstr = substr($gcid,0,strlen($gcid)-1);
		$gcidNew = explode(',',$newstr);
		$connection = "";
		for($index=0;$index<count($gcidNew);$index++){ 
			//echo $gcidNew[$index];
			$sqldate = "";
			$sql = "select * from 设备管理 where 设备类型 ='".$zt."' and 设备状态='".$zt1."' and 工程id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				 $sqldate= $sqldate.'{"安装部位":"'. $row["安装部位"].'","起重机械名称":"'. $row["起重机械名称"].'","登记日期":"'. $row["登记日期"].'","工程名称":"'. $row["工程名称"].'"},';
				}
			} else { 
		
			}
			$connection=$connection.$sqldate;
		} 
		
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'"
					}';
		$json = '['.$connection.$otherdate.']';
	}else if($tjfx == "wxy"){
		$zt = $_POST["zt"];
		
		//去掉字符串最后一个字符
		$newstr = substr($gcid,0,strlen($gcid)-1);
		$gcidNew = explode(',',$newstr);
		$connection = "";
		for($index=0;$index<count($gcidNew);$index++){
			$sqldate = "";
			$sql = "select * from 危险源 where 危险源状态 ='".$zt."' and 危险源类型='".$zt1."' and 工程id='".$gcidNew[$index]."'";
			$result = $conn->query($sql);
			$student = mysqli_num_rows($result); 
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","危险源类型":"'. $row["危险源类型"].'","危险源状态":"'. $row["危险源状态"].'","施工部位":"'. $row["施工部位"].'"},';
				}
			} else { 
		
			}
			$connection=$connection.$sqldate;
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'"
					}'; 
		$json = '['.$connection.$otherdate.']';
	}else { 
	
		}
	
	
	echo $json;
	$conn->close();
?>