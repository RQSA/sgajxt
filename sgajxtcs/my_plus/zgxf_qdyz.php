<?php
require("../conn.php");
$sjc = $_POST["sjc"];
$gcid = $_POST["gcid"];
$mobile = $_POST["mobile"];
//$jsonresult=$sjc.'|'.$gcid.'|'.$mobile;
//人员签到验证
$nowtime =date("Y-m-d");
$sql = "select * from 人员签到 where  工程id ='".$gcid."' and 联系方式='".$mobile."' ORDER BY 签到时间";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);
if($result->num_rows>0){
	while($myrow = $result->fetch_assoc()){
		$QDtime =  $myrow["签到时间"];
	}
}else{
	    $QDtime = " ";
}
$qdtime = explode(" ",$QDtime);
		if($qdtime[0]==$nowtime){
			$jsonresult = 'ok';
		}else if($qdtime[0]!=$nowtime||$qdtime[0]==null){
			$jsonresult = 'no';
		}
//人员身份验证
$sqli = "SELECT * FROM `我的工程` where id='".$gcid."' AND (`项目经理手机`='".$mobile."' or `安全主管手机`='".$mobile."' or `安全员手机`='".$mobile."' OR `机械管理员手机`='".$mobile."' or `生产经理手机`='".$mobile."' or `质量员手机`='".$mobile."'  or `质量负责人手机`='".$mobile."' or 时间戳=(select 工程时间戳 from 工程管理人员 where 部门='项目部' and 联系方式='".$mobile."'))";
$result1 = $conn->query($sqli);
$count1 = mysqli_num_rows($result1);
if($count1>0){
	$iden = 'xmb';
}else{
	$iden = 'gs';
}
//echo $count1; 
$json = '{ "result":"'.$jsonresult.'",
				"identity":"'.$iden.'"}';
		echo  $json;		
$conn->close();
?>