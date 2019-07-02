<?php
	require("../conn.php"); 
	$bhzs=$_POST["sel"]; //获取一连串违章条目
//	$bhzs="文明施工,扣件式钢管脚手架,";
	$a = explode(',',$bhzs); //分割违章条目
	$b = '';
	for($i=0;$i<count($a)-1;$i++) {
		if($i<count($a)-2){
			$wztm=" 编号注释= '".$a[$i]."' or";
		}else{
			$wztm=" 编号注释= '".$a[$i]."'";
		}
		$b .= $wztm;
	}
	$sqldate="";
	if($bhzs=='quanbu'){
		$sql = "select distinct 检查项目 from 违章数据库";
	}else{
		$sql = "select distinct 检查项目 from 违章数据库  where ".$b."";
	}
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"检查项目":"'.$row["检查项目"].'"},';
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