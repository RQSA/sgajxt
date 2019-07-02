<?php
	require("../conn.php");
	$liText =$_POST["liText"];
	$wztm = $_POST["wztm"];
	$zt =$_POST["zt"];
	$sql = "SELECT * FROM 违章数据库 WHERE `内容`='$liText' LIMIT 1";
	$res = $conn->query($sql);
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			$wzdl= $row["违章大类"];
			$jcxm= $row["检查项目"];
			$dx  = $row["对象"];
			$lx  = $row["类型"];
			$kfz = $row["扣分值"];
			$bhzs= $row["编号注释"];
			$wzzt= $row["违章状态"];
		}
	}
	$sql_1 = "SELECT * FROM 违章数据库 WHERE `内容`='$wztm' LIMIT 1";
	$res_1 = $conn->query($sql_1);
	$count = mysqli_num_rows($res_1);
	if($count==0){
		$mysql ="INSERT INTO 违章数据库(违章大类,检查项目,内容,对象,类型,扣分值,编号注释,违章状态,状态) VALUES('$wzdl','$jcxm','$wztm','$dx','$lx','$kfz','$bhzs','$wzzt','$zt')";
		$result = $conn->query($mysql);
	}else{
		
	}
	$data[]=$count;	
	$data[]=$result;
	$data[]=$liText;
	$data[]=$wztm;
 	$json =json_encode($data);
 	echo $json;
?>