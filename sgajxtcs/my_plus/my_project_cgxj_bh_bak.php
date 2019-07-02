<?php
	require("../conn.php");	
	$gcmc=$_POST["gcmc"];
	
	$sqldate="";
	$sql = "select * from 整改通知书编号维护 order by id desc limit 1";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$ceshi='001';
		 	//查找通知单表中个数
			$sql1 = "select count(*) as 总记录 from 通知单 where 工程名称='".$gcmc."'";
			$result = $conn->query($sql1);
			if ($result->num_rows > 0) {
				$ceshi='002';
				while($row1 = $result->fetch_assoc()) {
					$length=strlen($row1["总记录"]); //计算字符串的长度
					if($length==1){
						$jiayi=$row1["总记录"]+1;
						if($jiayi==10){
							$bianha='00'.$jiayi;
						}else{
							$bianha='000'.$jiayi;
						}
					}else if($length==2){
						$jiayi=$row1["总记录"]+1;
						if($jiayi==100){
							$bianha='0'.$jiayi;
						}else{
							$bianha='00'.$jiayi;
						}
					}else if($length==3){
						$jiayi=$row1["总记录"]+1;
						if($jiayi==1000){
							$bianha=$row1["总记录"];
						}else{
							$bianha='0'.$jiayi;
						}
					}else if($length==4){
						$bianha=$row1["总记录"]+1;
					}else{
						$bianha=substr($row1["总记录"],-4);
					}
					
				 	$number=$row["编号主体"].'-'.$row["编号内容"].'-'.$bianha;
				}
			}else{
				
			}
		} 
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"bianhao":"'.$number.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>