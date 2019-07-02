<?php
	require("../conn.php");
	$mobile=$_POST["mobile"];	
	$gcid=$_POST["gcid"];
	$fgs="";
	
		$mysql = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='分公司' AND 联系方式 = '".$mobile."' ) OR (部门负责人A手机 = '".$mobile."' OR 部门负责人B手机 = '".$mobile."' OR 部门负责人C手机 = '".$mobile."') ORDER  BY  时间戳 DESC LIMIT 1";
	$mysql1 = " SELECT 时间戳,所属公司 from `我的工程` where 时间戳 in(SELECT 工程时间戳 FROM `工程管理人员` WHERE 部门='总公司' AND 联系方式 = '".$mobile."' ) OR (总公司负责人A手机 = '".$mobile."' OR 总公司负责人B手机 = '".$mobile."' OR 总公司负责人C手机 = '".$mobile."'OR 总部巡查员手机 = '".$mobile."') ";
	$res = $conn->query($mysql);
	$res1 = $conn->query($mysql1);
	$count = mysqli_num_rows($res1);
	if($res->num_rows>0){
		while($myrow =$res->fetch_assoc()){
			$fgs = $myrow["所属公司"];
		}
	}

	if ($count==0&&$fgs==null) {
		$jsonresult='success';
		$panduanResult='Yes';
	} else {
		
	}
		
	$json = '{"result":"'.$jsonresult.'",
			"panduanResult":"'.$panduanResult.'"		
			}';
	echo $json;
	$conn->close();
?>