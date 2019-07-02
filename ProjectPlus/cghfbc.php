<?php
	//引入连接数据库文件
	require("../conn.php");
//	$lx=$_POST["lx"];
	//$mchen=$_POST["mchen"];
	$sjc=$_POST["sjc"];
	$num=$_POST["num"];
	$cghfValue=$_POST["cghfValue"];
//	$hfr=$_POST["hfr"];
//	$hfrq=$_POST["hfrq"];
//	$fjscfs=$_POST["fjscfs"];
//	$cgmc=$_POST["cgmc"];
//	$cghf=$_POST["cghf"];

	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$sql = "select * from 预览数据表  where 通知单时间戳='".$sjc."' and flag='".$num."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$sqli = "update 预览数据表 set 项目部回复='$cghfValue' where 通知单时间戳='".$sjc."' and flag='".$num."'";
		
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
				//echo $sqli;
			} else {
				$jsonresult='error';
			}
		
		
		$jsonresult='1';
	} else {
		
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
?>