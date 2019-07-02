<?php
	//引入连接数据库文件
	require("../conn.php");
	    $sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$jccj=$_POST["jccj"];
		$xclb=$_POST["xclb"];
		$wzzt=$_POST["wzzt"];
	    $tzdbh=$_POST["tzdbh"];
	    $jcdw=$_POST["jcdw"];
	    $jcdx=$_POST["jcdx"];
	    $jclx=$_POST["jclx"];
	    $wzdl=$_POST["wzdl"];
	    $jcrq=$_POST["jcrq"];
	    $tzdzt=$_POST["tzdzt"];
//		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;

	$sql = "select * from 通知单  where 通知单编号='".$tzdbh."' and 通知单状态='草稿'";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	$sqli ="delete from 通知单  where 通知单编号='".$tzdbh."'";
	
if ($conn->query($sqli) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();		
?>
<script type="text/javascript">
  window.location.href='xczg.php';
</script>