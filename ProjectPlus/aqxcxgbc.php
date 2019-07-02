<?php
	//引入连接数据库文件
	require("../conn.php");
	    $id=$_POST["id"];
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$gcid=$_POST["gcid"];
		$sgbw=$_POST["sgbw"];
		$jkmj=$_POST["jkmj"];
		$wxylx=$_POST["wxylx"];
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
	    
		echo $id;
			
	
	$sql ="select * from 危险源 where id ='$id' ";
	//$result = $conn->query($sql);
	//$sql = "update 通知单 set 工程名称='$gcmc',检查层级='$jccj',巡查类别='$xclb',通知单编号='$tzdbh',检查单位='$jcdw',检查对象='$jcdx',检查类型='$jclx',违章大类='$wzdl',检查日期='$jcrq',违章状态='$wzzt'";

	//$sql = "select * from 组员信息 where 时间戳 = '".$timestamp."'";
	$result = $conn->query($sql);					
	if($result->num_rows > 0){
		$sqli = "update 危险源 set 工程名称='$gcmc',施工部位='$sgbw',基坑面积='$jkmj',危险源类型='$wxylx',设计开挖深度='$kwsd',预计开始日期='$ks',预计结束日期='$js',超过一定规模的危险性较大的分部分项工程='$overpg',是否通过审核='$tzpass',登记日期='$djtime',使用状态='$uses',管理状态='$orgs',支模面积='$zmmj',支模高度='$zmgd',是否专家论证='$zjlz',塔设高度='$tsgd',二级类型='$ejlx',危险源状态='$wxyzt',危险源大类='$wxydl' where id='$id' ";
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