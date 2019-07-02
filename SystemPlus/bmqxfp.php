<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
	    $qxbc11=$_POST["qxbc11"];
	    $dept1=$_POST["dept1"];
$sql = "update 用户信息 set  权限='$qxbc11' where 部门='$dept1' ";

$sql1 = "select * from 部门权限保存表  where 部门='$dept1'";
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
			$sql2 = "update 部门权限保存表 set  权限='$qxbc11' where 部门='$dept1' ";
			echo '123';
		if ($conn->query($sql2) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		}
		else 
			{
				$sql3 = "INSERT INTO 部门权限保存表 (部门,权限) values ('$dept1','$qxbc11')";
//				echo '321';
				if ($conn->query($sql3) === TRUE) {
				$jsonresult='success';
				} else {
					$jsonresult='error';
				}
			}	
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
