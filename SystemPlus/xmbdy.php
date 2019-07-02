<?php
require("../conn.php");
$numm=$_POST["numm"];
 if($numm){
 	$xmbname=$_POST["xmbname"];
 	$xmbpas=$_POST["xmbpas"];
 	$xmbbm=$_POST["xmbbm"];
 	$sqli="select * from 项目部打印账号 where 账号 ='".$xmbname."'";
 	$result=$conn->query($sqli);	
		if(!$result->num_rows > 0){
				$sql = "INSERT INTO 项目部打印账号 (账号,密码,所属公司) values ('".$xmbname."','".$xmbpas."','".$xmbbm."')";
					if ($conn->query($sql) === TRUE) {
						$jsonresult = "success";
				    echo "修改成功";
				 	} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
			    		
			}	
		}

	}
	 else{
		    $gcid1=$_POST["gcid1"];
			$sql = "delete from 项目部打印账号  where id = '$gcid1';";
			
			if ($conn->query($sql) === TRUE) {
			    echo "删除成功";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

	}
 

$conn->close();		
?>