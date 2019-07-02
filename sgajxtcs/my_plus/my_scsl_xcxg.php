<?php
	require("../conn.php");
	$flag = $_POST["flag"];
	if($flag=='sc'){
		$id = $_POST["id"];
		$sql = "select 时间戳 from 质量实测基本信息 where id='".$id."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sjc = $row["时间戳"];
			}
		}
		$sql1 = "delete from 质量实测基本信息 where 时间戳 = '".$sjc."'";
		$result1 = $conn->query($sql1);
		$sql2 = "delete from 实测实量数据 where 时间戳 = '".$sjc."'";
		$result2 = $conn->query($sql2);
		$conn->close();
	}elseif($flag=='hqsj'){
		$id = $_POST["id"];
		$sql = "select * from 质量实测基本信息 where id = '".$id."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sqldate = '{"时间戳":"'.$row["时间戳"].'","分项工程名称":"'.$row["分项工程名称"].'","记录表类型":"'.$row["记录表类型"].'","检查内容":"'.$row["检查内容"].'","检查人员":"'.$row["检查人员"].'","创建时间":"'.$row["创建时间"].'"},';
			}
		}
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'"}';
		$json = '['.$sqldate.$otherdate.']';
		echo $json;
		$conn->close();
	}elseif($flag='xg'){
		$id=$_POST["ulId"];
		$sql = "select 时间戳 from 质量实测基本信息 where id='".$id."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$sjc = $row["时间戳"];
			}
		}
		$sql1 = "delete from 质量实测基本信息 where 时间戳 = '".$sjc."'";
		$result1 = $conn->query($sql1);
		$sql2 = "delete from 实测实量数据 where 时间戳 = '".$sjc."'";
		$result2 = $conn->query($sql2);
		$gcid = $_POST["gcid"];
	$sjc = $_POST["sjc"];
	$jcbw = $_POST["jcbw"];
	$jcrq = $_POST["jcday"];
	$jcry = $_POST["jcry"];
	$mobile = $_POST["mobile"];
	$addnr = $_POST["addnr"];
	$addxm = $_POST["addjcxm"];
//	echo $sjc.$jcbw.$jcrq.$jcry.$addnr.$addxm.$jcry;
    $sql = "select id from 用户信息 where 手机 = '".$mobile."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$jcryid = $row["id"];
			 }
		}
	$sql1 = "select 工程名称 from 我的工程 where id='".$gcid."'";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
			 while($row1 = $result1->fetch_assoc()) {
			 	$gcmc = $row1["工程名称"];
			 }
		}
	$sql2 = "insert into 质量实测基本信息(时间戳,工程id,工程名称,分项工程名称,记录表类型,检查内容,操作人id,检查人员,创建时间,状态) values('".$sjc."','".$gcid."','".$gcmc."','".$jcbw."','".$addxm."','".$addnr."','".$jcryid."','".$jcry."','".$jcrq."','0')";
	$result2 = $conn->query($sql2);
	
	
//	根据检查内容个数创建实测数据表
    $jcnr = explode(',', $addnr);
	$max = count($jcnr);
	for($i=0;$i<$max;$i++){
		$sql4 = "select * from 质量实测检查内容 where 检查内容='".$jcnr[$i]."'";
		$result4 = $conn->query($sql4);
		if ($result4->num_rows > 0) {
			 while($row4 = $result4->fetch_assoc()) {
			 	$jlblx = $row4["检查项目"];
				 $bz = $row4["内容"];
			 }
		}
		$sql3 = "insert into 实测实量数据(时间戳,工程名称,分项工程名称,记录表类型,检查内容,测量标准) values('".$sjc."','".$gcmc."','".$jcbw."','".$jlblx."','".$jcnr[$i]."','".$bz."')";
        $result3 = $conn->query($sql3);
	}
	
	
//	echo $sql2;
$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
				
	$json = '['.$otherdate.']';
	echo $json;
	$conn->close();	
	}
?>