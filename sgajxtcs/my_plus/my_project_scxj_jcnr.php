<?php
	require("../conn.php");	
	$flag=$_POST["flag"];
	$sqldate="";
	if($flag=='jcry'){
		$dh = $_POST["mobile"];
		$sql = "select 姓名 from 用户信息 where 手机 = '".$dh."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {
				 	$sqldate= $sqldate.'{"姓名":"'.$row["姓名"].'"},';
				 }
			}
//      $sqldate=$dh;
	}elseif($flag=='jcnr'){
	
		$jcxm=$_POST["jcxm"];
		$xm=explode(',',$jcxm);
		$y=count($xm)-1;
	    if($y==1){
	    	$sql = "select distinct 检查内容  from 质量实测检查内容  where 检查项目='".$xm[0]."'";
		}else if($y==2){
			$sql = "select distinct 检查内容  from 质量实测检查内容  where 检查项目='".$xm[0]."' or 检查项目='".$xm[1]."'";
		}else if($y==3){
			$sql = "select distinct 检查内容  from 质量实测检查内容  where 检查项目='".$xm[0]."' or 检查项目='".$xm[1]."' or 检查项目='".$xm[2]."'";
		}else if($y==4){
			$sql = "select distinct 检查内容  from 质量实测检查内容  where 检查项目='".$xm[0]."' or 检查项目='".$xm[1]."' or 检查项目='".$xm[2]."' or 检查项目='".$xm[3]."'";
		}else{
			$sql = "select distinct 检查内容  from 质量实测检查内容  where 检查项目='".$xm[0]."' or 检查项目='".$xm[1]."' or 检查项目='".$xm[2]."' or 检查项目='".$xm[3]."' or 检查项目='".$xm[4]."'";
		}
			$result = $conn->query($sql);
	//		$count=mysqli_num_rows($result);	
			if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {
				 	$sqldate= $sqldate.'{"检查内容":"'.$row["检查内容"].'"},';
				 }
			} else {
				//echo "0 results";
			}
		}
//}
//echo $x;
//	echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
		
?>