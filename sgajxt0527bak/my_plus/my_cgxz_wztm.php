<?php
	require("../conn.php");
	$jcxm=$_POST["jcxm"];
	
	$a = explode(',',$jcxm); //分割违章条目
	$b = '';
	for($i=0;$i<count($a)-1;$i++) {
		if($i<count($a)-2){
			$wztm=" 检查项目= '".$a[$i]."' or";
		}else{
			$wztm=" 检查项目= '".$a[$i]."'";
		}
		$b .= $wztm;
	}	
	
	$sqldate="";
	//判断检查项目是否为空，为空默认全部内容
	if($b==""){
		$sql = "select distinct 内容 from 违章数据库";
	}else{
		$sql = "select distinct 内容 from 违章数据库 where ".$b."";
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
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();		
?>