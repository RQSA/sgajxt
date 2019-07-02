<?php
	//引入连接数据库文件
	require("../conn.php");
	$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$gcid=$_POST["gcid"];
		$jccj=$_POST["jccj"];
		$xclb=$_POST["xclb"];
		$wzzt=$_POST["wzzt"];
	    $tzdbh=$_POST["tzdbh"];
	    $jcdw=$_POST["jcdw"];
	    $jcdx=$_POST["jcdx"];
	    $jclx=$_POST["jclx"];
	    $wzdl=$_POST["wzdl"];
	    $jcrq=$_POST["jcrq"];
	    
//		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "INSERT INTO 通知单 (工程名称,工程id,检查层级,巡查类别,通知单状态,通知单编号,检查单位,检查对象,检查类型,违章大类,检查日期,草稿新建日期) values ('$gcmc','$gcid','$jccj','$xclb','$wzzt','$tzdbh','$jcdw','$jcdx','$jclx','$wzdl','$jcrq','$timestr')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.location.href='xczg.php';
</script>