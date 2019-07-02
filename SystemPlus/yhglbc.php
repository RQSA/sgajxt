<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
	    $account=$_POST["account"];
	    $password=$_POST["password"];
	    $name=$_POST["name"];
	    $email=$_POST["email"];
	    $call=$_POST["call"];
	    $dept=$_POST["dept"];
	    $sb=$_POST["sb"];
	    
	    
//		echo "$gcmc";	
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
$sql = "INSERT INTO 用户信息 (账号,密码,姓名,手机,部门,邮箱,设备) values ('$account','$password','$name','$call','$dept','$email','$sb')";

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