<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");
	require("upload_file.php");
		$id=$_POST["id"];
		$dept=$_POST["dept"];
		$xm=$_POST["xm"];
		$zh=$_POST["zh"];
		$mm=$_POST["mm"];
		$sj=$_POST["sj"];
		$yx=$_POST["yx"];

		
//		
//		    if ($ywjsc = "1") 
//			{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
//			else {$kgbgfjsc1=$_FILES["file"]["name"];}
//		echo "$gcmc";	
	
//	$time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
////	$sjc=$timestr;
//	$sjc=$_POST["sjc"];
	$sql = "select * from 用户信息  where id='$id'";
	$result = $conn->query($sql);
	$sqli = "update 用户信息 set 部门='$dept',姓名='$xm',账号='$zh',密码='$mm',手机='$sj',邮箱='$yx' where id ='$id'";

if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">

  window.history.go(-2);location.reload();
</script>
