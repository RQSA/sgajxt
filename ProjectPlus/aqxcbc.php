<?php
	//引入连接数据库文件
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");	
		
	
	require("../conn.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$gcid=$_POST["gcid"];
		$sgbw=$_POST["sgbw"];
		$jkmj=$_POST["jkmj"];
		$wxlx=$_POST["wxlx"];
	    $kwsd=$_POST["kwsd"];
	    $ks=$_POST["ks"];
	    $js=$_POST["js"];
	    $overpg=$_POST["overpg"];
		$tzpass=$_POST["tzpass"];
	    $djtime=$_POST["djtime"];
	    $uses=$_POST["uses"];
	    $orgs=$_POST["orgs"];
	    $zmmj=$_POST["zmmj"];
	    $zmgd=$_POST["zmgd"];
	    $zjlz=$_POST["zjlz"];
	    $tsgd=$_POST["tsgd"];
	    $ejlx=$_POST["ejlx"];
	    $wxydl=$_POST["wxydl"];
	    $wxyzt=$_POST["wxyzt"];
	    $dqs=$_POST["dqs"];
	    $dqs1=$_POST["dqs1"];
	    

		
//		echo "$gcmc";	
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");

	
$sql = "INSERT INTO 危险源 (工程名称,工程id,施工部位,基坑面积,危险源类型,设计开挖深度,预计开始日期,预计结束日期,超过一定规模的危险性较大的分部分项工程,时间戳,是否通过审核,登记日期,使用状态,管理状态,支模面积,支模高度,是否专家论证,塔设高度,二级类型,危险源状态,危险源大类,地区省,地区市) values ('$gcmc','$gcid','$sgbw','$jkmj','$wxlx','$kwsd','$ks','$js','$overpg',".strtotime(".$sjcc.").",'$tzpass','$djtime','$uses','$orgs','$zmmj','$zmgd','$zjlz','$tsgd','$ejlx','$wxyzt','$wxydl','$dqs','$dqs1')";

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