<?php
	//引入连接数据库文件
	require("../conn.php");
		$sjc=$_POST["sjc"];
	    $bhzt=$_POST["bhzt"];
	    $bhnr=$_POST["bhnr"];

	    
	    
		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
$sql = "INSERT INTO 整改通知书编号维护 (编号主体,编号内容) values ('$bhzt','$bhnr')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.history.go(-1);
</script>