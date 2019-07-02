<?php
	//引入连接数据库文件
	
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");
	require("../conn.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$jzqzlb=$_POST["jzqzlb"];
		$sbcqbah=$_POST["sbcqbah"];
		$nx=$_POST["nx"];
	    $zzdw=$_POST["zzdw"];
	    $xh=$_POST["xh"];
	    $jwd=$_POST["jwd"];
	    $wcfw=$_POST["wcfw"];
	    $zdqzj=$_POST["zdqzj"];
	    $sjzd=$_POST["sjzd"];
	    $zdqz=$_POST["zdqz"]; 
	    $bglz=$_POST["bglz"]; 
	    $fj=$_POST["fj"]; 
	    $cs=$_POST["cs"];
	    $gd=$_POST["gd"];        
	    $id=$_POST["gcid"];
	    $jddj=$_POST["jddj"];
	    $swgz=$_POST["swgz"];
	    $gdzb=$_POST["gdzb"];
	    $cqdw=$_POST["cqdw"];
	    $qzname=$_POST["qzname"];
	    $azbw=$_POST["azbw"];
	    $dqs=$_POST["dqs"];
	    $dqs1=$_POST["dqs1"];
	    
	    echo (strtotime(".$sjcc."));
//		echo "$gcmc";	
    $time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$sjc=$timestr;
	$sql="INSERT INTO 设备管理 (时间戳,工程名称,设备类型,设备产权备案号,使用年限,生产制造单位,规格型号,出厂日期,出厂编号,最大起重力矩,设计最大起升高度,最大起重量,本工理桩高度,附件,登记日期,设备状态,工程id,工程项目安全监督登记号,省网告知流水号,工地自编号,产权单位名称,起重机械名称,安装部位,地区省,地区市) values (".strtotime(".$sjcc.").",'$gcmc','$jzqzlb','$sbcqbah','$nx','$zzdw','$xh','$jwd','$wcfw','$zdqzj','$sjzd','$zdqz','$bglz','$fj','$cs','$gd','$id','$jddj','$swgz','$gdzb','$cqdw','$qzname','$azbw','$dqs','$dqs1')";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>