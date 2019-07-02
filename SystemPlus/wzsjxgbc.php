<?php
	//引入连接数据库文件
	require("../conn.php");
        $id=$_POST["id"];
		$wzdl=$_POST["wzdl"];
		$jcxm=$_POST["jcxm"];
		$nr=$_POST["nr"];
		$dx=$_POST["dx"];
	    $lx=$_POST["lx"];
	    $kfz=$_POST["kfz"];
	    $wzzt=$_POST["wzzt"];
	    
	    
		echo $id;
//   	echo $tzdbh;	
//	$time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//	$sjc=$_POST["sjc"];
	$sql = "select * from 违章数据库  where id='$id'  ";
	//$result = $conn->query($sql);
	//$sql = "update 通知单 set 工程名称='$gcmc',检查层级='$jccj',巡查类别='$xclb',通知单编号='$tzdbh',检查单位='$jcdw',检查对象='$jcdx',检查类型='$jclx',违章大类='$wzdl',检查日期='$jcrq',违章状态='$wzzt'";

	//$sql = "select * from 组员信息 where 时间戳 = '".$timestamp."'";
	$result = $conn->query($sql);					
	if($result->num_rows > 0){
		$sqli = "update 违章数据库 set 违章大类='$wzdl',检查项目='$jcxm',内容='$nr',对象='$dx',类型='$lx',扣分值='$kfz',违章状态='$wzzt' where id='$id'";
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}	
	}else{
		$jsonresult='1';				
	}




if ($conn->query($sql) === TRUE) {
    echo "修改成功";
} //else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//}

$conn->close();		
?>