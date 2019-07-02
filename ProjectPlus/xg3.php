<?php
	//引入连接数据库文件
	require("../conn.php");
	require("upload_file.php");
		$sjc=$_POST["sjc"];
		$gcmc=$_POST["gcmc"];
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
		
//新增联系方式
		$glcall1=$_POST["glcall1"];
		$glcall2=$_POST["glcall2"];
		$glcall3=$_POST["glcall3"];
		$glcall4=$_POST["glcall4"];
		$bmA=$_POST["bmA"];
		$bmAc=$_POST["bmAc"];
		$bmB=$_POST["bmB"];
		$bmBc=$_POST["bmBc"];
		$bmC=$_POST["bmC"];
		$bmCc=$_POST["bmCc"];
		$zgA=$_POST["zgA"];
		$zgAc=$_POST["zgAc"];
		$zgB=$_POST["zgB"];
		$zgBc=$_POST["zgBc"];
		$zgC=$_POST["zgC"];
		$zgCc=$_POST["zgCc"];
		$zcy=$_POST["zcy"];//总部巡查员
		$zcysj=$_POST["zcysj"];//总部巡查员手机
		$scjl=$_POST["scjl"];//生产经理
		$scjllxfs=$_POST["scjllxfs"];//生产经理手机		
		$zlya=$_POST["zlya"];//质量员
		$zlyasj=$_POST["zlyasj"];//质量员手机
		$zlfzr=$_POST["zlfzr"];//质量负责人
		$zlfzrsj=$_POST["zlfzrsj"];//质量负责人手机
		
		$gcdsjc=$_POST["gcdsjc"];
		$bMen=$_POST["bMen"];
		$gWei=$_POST["gWei"];
		$gLry=$_POST["gLry"];
		$lXi=$_POST["lXi"];
//		echo $lXi;
//		echo $gcdsjc;
//		echo $bMen;
//		echo $gWei;
//		echo $gLry;
		
		    if ($ywjsc = "1") 
			{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
			else {$kgbgfjsc1=$_FILES["file"]["name"];}
//		echo "$gcmc";	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
	$sjc=$_POST["sjc"];
	$sql = "select * from 我的工程  where 工程名称='".$gcmc."'";
		$result = $conn->query($sql);
	$sqli = "update 我的工程 set 项目经理='$xmjl',安全主管='$aqzg',安全员='$aqy',机械管理员='$jjgly',项目经理手机='$glcall1',安全主管手机='$glcall2',质量负责人='$zlfzr',质量负责人手机='$zlfzrsj',安全员手机='$glcall3',机械管理员手机='$glcall4',部门负责人A='$bmA',部门负责人B='$bmB',部门负责人C='$bmC',部门负责人A手机='$bmAc',部门负责人B手机='$bmBc',部门负责人C手机='$bmCc',总公司负责人A='$zgA',总公司负责人B='$zgB',总公司负责人C='$zgC',总公司负责人A手机='$zgAc',总公司负责人B手机='$zgBc',总公司负责人C手机='$zgCc',总部巡查员='$zcy',总部巡查员手机='$zcysj',生产经理='$scjl',生产经理手机='$scjllxfs',质量员='$zlya',质量员手机='$zlyasj' where 工程名称='".$gcmc."'";


if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
?>
<script type="text/javascript">
  self.location=document.referrer;
</script>