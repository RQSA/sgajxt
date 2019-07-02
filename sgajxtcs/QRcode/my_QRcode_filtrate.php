<?php
	require ("../conn.php");
	$flag = $_POST["flag"];
	if($flag == 'allgc'){
		$sqldate="";
		$sql="select 工程名称 from 我的工程";
		$result=$conn->query($sql);
		$count=mysqli_num_rows($result);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$sqldate=$sqldate.'{"工程名称":"'.$row["工程名称"].'"},';
			}
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	}elseif($flag == 'bgxx'){
		$jcxm = $_POST["jcxm"];
		$gcmc = $_POST["gcmc"];
		$startime = $_POST["starTime"];
		$sqldate = "";
		$sjc = array();
		$i=0;
		$sql = "SELECT DISTINCT `时间戳` FROM `实测实量数据` WHERE 记录表类型='".$jcxm."' AND `工程名称`='".$gcmc."' AND `测量时间`='".$startime."'";
		$result=$conn->query($sql);
		$count=mysqli_num_rows($result);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$sjc[$i]=$row["时间戳"];
				$i++;
			}
		}
		for($j=0;$j<$i;$j++){
			$sql1 = "select 时间戳,工程名称,分项工程名称 from 质量实测基本信息 where 时间戳='".$sjc[$j]."' and 状态='1'";
			$result1 = $conn->query($sql1);
			if($result1->num_rows>0){
				while($row1=$result1->fetch_assoc()){
					$sqldate = $sqldate.'{"时间戳":"'.$row1["时间戳"].'","工程名称":"'.$row1["工程名称"].'","部位":"'.$row1["分项工程名称"].'"},';
				}
			}
		}
		
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
					}';
		$json = '['.$sqldate.$otherdate.']';			
	}
	
	echo $json;
	$conn->close();
?>