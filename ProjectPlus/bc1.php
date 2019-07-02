<?php
	//引入连接数据库文件
		$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
		$sjc=$timestr;
		$sjcc =strtotime(".$sjc.");

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
		$yhid=$_POST["yhid"];
		$ssgs=$_POST["ssgs"];
//  新增联系方式改动
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
//增加地区省和地区市
		$province5=$_POST["province5"];
		$city5=$_POST["city5"];
//增加开工日期和竣工日期
		$kgday=$_POST["kgday"];
		$jgday=$_POST["jgday"];
		$ds=$_POST["ds"];	
//		echo "$gcmc";	
//	$time=getdate();
    
//	echo (strtotime(".$sjcc."));
    if ($ywjsc = "1") 
	{$kgbgfjsc1=(strtotime(".$sjcc."))."1".$_FILES["file"]["name"];}
	else {$kgbgfjsc1=$_FILES["file"]["name"];}
	
$sql = "INSERT INTO 我的工程 (时间戳,工程名称,项目类别,工程位置,经纬度,误差范围,建筑面积,层数,高度,基坑深度,项目经理,安全主管,安全员,机械管理员,施工许可证取得情况,开工报告,开工报告附件上传,形象进度,用户id,所属公司,项目经理手机,安全主管手机,安全员手机,机械管理员手机,部门负责人A,部门负责人B,部门负责人C,部门负责人A手机,部门负责人B手机,部门负责人C手机,总公司负责人A,总公司负责人B,总公司负责人C,总公司负责人A手机,总公司负责人B手机,总公司负责人C手机,责任人,联系方式,地区省,地区市,总部巡查员,总部巡查员手机,生产经理,生产经理手机,质量员,质量员手机,质量负责人,质量负责人手机,开工日期,竣工日期,栋数) values (".strtotime(".$sjcc.").",'$gcmc','$xmlb','$gcwz','$jwd','$wcfw','$jzmj','$cs','$gd','$jksd','$xmjl','$aqzg','$aqy','$jjgly','$sgxkzqdqk','$kgbg','$kgbgfjsc1','$gcxxjd','$yhid','$ssgs','$glcall1','$glcall2','$glcall3','$glcall4','$bmA','$bmB','$bmC','$bmAc','$bmBc','$bmCc','$zgA','$zgB','$zgC','$zgAc','$zgBc','$zgCc','$zrrxx','$lxfs','$province5','$city5','$zcy','$zcysj','$scjl','$scjllxfs','$zlya','$zlyasj','$zlfzr','$zlfzrsj','$kgday','$jgday','$ds')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//		$selectConnectString=$_POST["selectConnectString"];
//		$inputConnectString=$_POST["inputConnectString"];
//		$bumen = explode("//",$selectConnectString);
//		$hsxa = explode("//",$inputConnectString);
//		for($index1=0;$index1<count($bumen)-1;$index1++) 
//		{ 
////		{   $index1=0;
//			$num1=$index1+1;
//			$num2=$index1+2;
//			$sql1 = "INSERT INTO 工程管理人员 (工程时间戳,部门,岗位,姓名,联系方式) values (".strtotime(".$sjcc.").",'$bumen[$index1]','$hsxa[$index1]','$hsxa[$num1]','$hsxa[$num2]')";
//			if ($conn->query($sql1) === TRUE) {
//			    echo "保存成功";
//				
//			} else {
//			    echo "Error: " . $sql . "<br>" . $conn->error;
//			} 
//		}
////for ($i=1;$i<100;$i++){
////$glrybmgs$i=$_POST["glrybmgs1"];
////$glrygw$i=$_POST["glrygw1"];
////$zgC$i=$_POST["zgC1"];
////$zgCc$i=$_POST["zgCc1"];
////$sql1 = "INSERT INTO 工程管理人员 (工程时间戳,部门,岗位,姓名,联系方式) values (".strtotime(".$sjcc.").",'$glrybmgs$i','$glrygw$i','$zgC$i','$zgCc$i')";
////if ($conn->query($sql1) === TRUE) {
////  echo "保存成功";
////} else {
////  echo "Error: " . $sql . "<br>" . $conn->error;
////}
////}

$conn->close();		

?> 	
    <?php 
       require("../conn.php");
	   $yhid=$_POST["yhid"];
       $sql = "select * from 用户信息 where id='$yhid'  ";
       $result = $conn->query($sql);
       while($row = $result->fetch_assoc()) {
             					
    ?>
 <input id="yhzh" name="yhzh" class="form-control"  size="16" type="text" value="<?php echo $row["账号"];?>" />
 	<?php
		}
		$conn->close();
													
	?>
<script type="text/javascript">
  var yhzh=document.getElementById("yhzh").value;	
  window.location.href="../index.php?yhzh="+yhzh;
</script>