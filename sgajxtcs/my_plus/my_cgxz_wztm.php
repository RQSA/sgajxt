<?php
	require("../conn.php");
	$jcxm=$_POST["jcxm"];
	$flag=$_POST["flag"];
	
	$a = explode(',',$jcxm); //分割违章条目
	$wztm=array();
	for($i=0;$i<count($a)-1;$i++) {
		if($i<count($a)-2){
			$wztm[$i]=$a[$i];
		}else{
			$wztm[$i]=$a[$i];
		}
	}	
	$jc_xm=implode("','", $wztm);
	$jcxm_L="('".$jc_xm."')";
	$sqldate="";
	//判断检查项目是否为空，为空默认全部内容
	if($jcxm!=""){
		if($flag==0){
				if($jcxm_L==""){
					$sql = "select distinct 内容 from 违章数据库 where 状态='0'";
				}else{
					$sql = "select distinct 内容 from 违章数据库 where 检查项目 in ".$jcxm_L." and 状态='0'";
				}
				$result = $conn->query($sql);
				$count=mysqli_num_rows($result);	
				if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
					 	$sqldate= $sqldate.'{"内容":"'.$row["内容"].'"},';
					 }
				} else {
			
				}
				$jsonresult='success';
				$otherdate = '{"result":"'.$jsonresult.'",
							"count":"'.$count.'"
							}';
		}else{
						if($jcxm_L==""){
							$sql = "select distinct 内容 from 违章数据库 where 状态='1'";
						}else{
							$sql = "select distinct 内容 from 违章数据库 where 检查项目 in ".$jcxm_L." and 状态='1'";
						}
						$result = $conn->query($sql);
						$count=mysqli_num_rows($result);	
						if ($result->num_rows > 0) {
							 while($row = $result->fetch_assoc()) {
							 	$sqldate= $sqldate.'{"内容":"'.$row["内容"].'"},';
							 }
						} else {
					
						}
						$jsonresult='success';
						$otherdate = '{"result":"'.$jsonresult.'",
									"count":"'.$count.'"
									}';
	}
}else{
				$sql = "select distinct 内容 from 违章数据库 where 状态='0'";
				$result = $conn->query($sql);
				$count=mysqli_num_rows($result);	
				if ($result->num_rows > 0) {
					 while($row = $result->fetch_assoc()) {
					 	$sqldate= $sqldate.'{"内容":"'.$row["内容"].'"},';
					 }
				} else {
			
				}
				$jsonresult='success';
				$otherdate = '{"result":"'.$jsonresult.'",
							"count":"'.$count.'"
							}';
}			
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();		
?>