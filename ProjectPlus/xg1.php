<?php
	//引入连接数据库文件
	require("../conn.php");
	require("upload_file.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
		$gcmc1=$_POST["gcmc1"];
		$xmlb=$_POST["xmlb"];
		$gcwz=$_POST["gcwz"];
		$jwd=$_POST["jwd"];
		$wcfw=$_POST["wcfw"];
		$jzmj=$_POST["jzmj"];
		$cs=$_POST["cs"];
		$gd=$_POST["gd"];
		$jksd=$_POST["jksd"];
		$xmjl=$_POST["xmjl"];
		$aqzg=$_POST["aqzg"];
		$aqy=$_POST["aqy"];
		$jjgly=$_POST["jjgly"];
		$zrrxx=$_POST["zrrxx"];
		$lxfs=$_POST["lxfs"];
		$sgxkzqdqk=$_POST["sgxkzqdqk"];
		$kgbg=$_POST["kgbg"];
		$kgbgfjsc=$_POST["kgbgfjsc"];
		$gcxxjd=$_POST["gcxxjd"];
		$ssgs=$_POST["ssgs"];
//增加省市
		$province5=$_POST["province5"];
		$city5=$_POST["city5"];
		    if ($ywjsc = "1") 
			{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
			else {$kgbgfjsc1=$_FILES["file"]["name"];}
//增加开工日期和竣工日期和栋数
		$kgday=$_POST["kgday"];
		$jgday=$_POST["jgday"];
		$ds=$_POST["ds"];
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
	$sjc=$_POST["sjc"];
	$sql = "select * from 我的工程  where 工程名称='".$gcmc."'";
		$result = $conn->query($sql);
//	$sqli = "update 我的工程 set 工程名称='$gcmc',项目类别='$xmlb',工程位置='$gcwz',经纬度='$jwd',误差范围='$wcfw',
//	建筑面积='$jzmj',层数='$cs',高度='$gd',基坑深度='$jksd',项目经理='$xmjl',安全主管='$aqzg',安全员='$aqy',机械管理员='$jjgly',
//	责任人='$zrrxx',联系方式='$lxfs',施工许可证取得情况='$sgxkzqdqk',开工报告='$kgbg',开工报告附件上传='$kgbgfjsc1',形象进度='$gcxxjd'where 工程名称='".$gcmc."'";
	$sqli = "update 我的工程 set 工程名称='$gcmc1',项目类别='$xmlb',工程位置='$gcwz',经纬度='$jwd',误差范围='$wcfw',
	建筑面积='$jzmj',层数='$cs',高度='$gd',基坑深度='$jksd',所属公司='$ssgs',地区省='$province5',地区市='$city5',开工日期='$kgday',竣工日期='$jgday',栋数='$ds' where 工程名称='".$gcmc."'";

if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.history.go(-1);
</script>
<!--<script type="text/javascript">
	window.history.go(-1);
	$(document).ready(function() {
	$(".btn-primary").on("click",function(event){
		var targetId=event.target.id;
//		alert(targetId);
		switch(targetId){
			case "save1":
				$('.nav-tabs a[href="#zrr"]').tab('show');
				break;
			case "save2":
				$('.nav-tabs a[href="#glry"]').tab('show');
				break;
			case "save3":
				$('.nav-tabs a[href="#gjzl"]').tab('show');
				break;
			case "save4":
				$('.nav-tabs a[href="#xxjd"]').tab('show');
				break;
			case "save5":
				location.reload();
				break;
		}
	});

});
</script>-->