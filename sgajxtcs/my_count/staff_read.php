<?php
	require("../conn.php");
	$sqli = "select 手机 from 用户权限冻结表 ";
	$res= $conn->query($sqli); 
	$count1 = mysqli_num_rows($res);
	$i=0;
	while($row = $res->fetch_assoc()) {
			  $date[$i]=$row['手机'];
		$i++;
		  }
//	  echo  $date[0]."||". $date[1]; 
	$string=implode("' and 联系方式 != '",$date);
//	echo $string;
	$section = $_POST["section"];
	$sqldate = '';
	if($section == ''){
	  $sql = "select distinct 部门 from 人员签到 where 部门 like '%公司' ";
	  $result = $conn->query($sql);
	  if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
			  $sqldate= $sqldate.'{"section":"'.$row["部门"].'"},';
		  }
	  } else {

	  }
	} else if($section) {
	  $sql = "select distinct 人员,联系方式 from 人员签到 where 部门 = '".$section."' and 联系方式 != "."'".$string."'";
	  $result = $conn->query($sql);
	  if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"staff":"'. $row["人员"].'","mobile":"'. $row["联系方式"].'"},';
		 }
	  } else {

	  }
	}

	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
						}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>