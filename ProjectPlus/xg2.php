<?php
	//引入连接数据库文件
	require("../conn.php");

		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$zrrxx=$_POST["zrrxx"];
		$lxfs=$_POST["lxfs"];
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
	$sjc=$_POST["sjc"];
	$sql = "select * from 我的工程  where 工程名称='".$gcmc."'";
		$result = $conn->query($sql);
	$sqli = "update 我的工程 set 责任人='$zrrxx',联系方式='$lxfs' where 工程名称='".$gcmc."'";


if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.history.go(-1);
</script>