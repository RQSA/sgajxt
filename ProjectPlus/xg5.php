<?php
	//引入连接数据库文件
	require("../conn.php");
	    $id=$_GET["id"];
		$yhid = $_GET["yhid"];
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$xmlb=$_POST["xmlb"];
		$gcwz=$_POST["gcwz"];
		$jwd=$_POST["jwd"];
		$wcfw=$_POST["wcfw"];
		$jzmj=$_POST["jzmj"];
		$cs=$_POST["cs"];
		$gd=$_POST["gd"];
		$jksd=$_POST["jksd"];
		$xmjl=$_POST["xmjl"];
		$aqzg=$_POST["aqzg"];
		$aqy=$_POST["aqy"];
		$jjgly=$_POST["jjgly"];
		$zrrxx=$_POST["zrrxx"];
		$lxfs=$_POST["lxfs"];
		$sgxkzqdqk=$_POST["sgxkzqdqk"];
		$kgbg=$_POST["kgbg"];
		$kgbgfjsc=$_POST["kgbgfjsc"];
		$gcxxjd=$_POST["gcxxjd"];
		  
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
	$sjc=$_POST["sjc"];
	$sql = "select * from 我的工程  where 工程名称='".$gcmc."'";
		$result = $conn->query($sql);
	$sqli = "update 我的工程 set 形象进度='$gcxxjd'where 工程名称='".$gcmc."'";
//	echo $sqli;


if ($conn->query($sqli) === TRUE) {
//  echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
$url="Project_in.php?id=".$id."&yhid=".$yhid."";
//require("Project_in.php"); 
//echo $url;
//exit('<scrīpt type="text/javascript">window.location.href="'.$url.'";</scrīpt>');
//exit('<scrīpt type="text/javascript">window.close();</scrīpt>');
header('location: '.$_SERVER['HTTP_REFERER']);
?>

