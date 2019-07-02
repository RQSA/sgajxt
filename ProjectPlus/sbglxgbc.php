<?php
	//引入连接数据库文件
	require("../conn.php");
		$id=$_POST["id"];
		$gcmc=$_POST["gcmc"];
		$jzqzlb=$_POST["jzqzlb"];
		$sbcqbah=$_POST["sbcqbah"];
	    $zzdw=$_POST["zzdw"];
	    $xh=$_POST["xh"];
	    $jwd=$_POST["jwd"];
	    $wcfw=$_POST["wcfw"];
	    $zdqzj=$_POST["zdqzj"];
	    $sjzd=$_POST["sjzd"];
	    $zdqz=$_POST["zdqz"]; 
	    $bglz=$_POST["bglz"]; 
	    $cs=$_POST["cs"];
	    $gd=$_POST["gd"];
	    $jddj=$_POST["jddj"];
	    $swgz=$_POST["swgz"];
	    $gdzb=$_POST["gdzb"];
	    $cqdw=$_POST["cqdw"];
	    $qzname=$_POST["qzname"];       
	    
		echo $id;
			
   $sql ="select * from  设备管理  where id ='$id' ";
	
	//$result = $conn->query($sql);
	//$sql = "update 通知单 set 工程名称='$gcmc',检查层级='$jccj',巡查类别='$xclb',通知单编号='$tzdbh',检查单位='$jcdw',检查对象='$jcdx',检查类型='$jclx',违章大类='$wzdl',检查日期='$jcrq',违章状态='$wzzt'";

	//$sql = "select * from 组员信息 where 时间戳 = '".$timestamp."'";
	$result = $conn->query($sql);					
	if($result->num_rows > 0){
		$sqli = "update 设备管理 set 工程名称='$gcmc',设备类型='$jzqzlb',设备产权备案号='$sbcqbah',生产制造单位='$zzdw',规格型号='$xh',出厂日期='$jwd',出厂编号='$wcfw',最大起重力矩='$zdqzj',设计最大起升高度='$sjzd',最大起重量='$zdqz',本工理桩高度='$bglz',登记日期='$cs',设备状态='$gd',工程项目安全监督登记号='$jddj',省网告知流水号='$swgz',工地自编号='$gdzb',产权单位名称='$cqdw',起重机械名称='$qzname' where id ='$id' ";
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}	
	}else{
		$jsonresult='1';				
	}




if ($conn->query($sql) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.history.go(-1);
</script>