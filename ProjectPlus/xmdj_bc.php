<?php	
	require("../conn.php");	
	$sqlflag=$_POST["sqlflag"];	
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	if($sqlflag=="insert"){	
		////////////////////////插入一条记录/////////////////////////////
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
//		$sql = "select * from 我的工程  where 时间戳='".$sjc."'";
		$sql = "select * from 我的工程  ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$jsonresult='数据表有重复的时间戳';
		} else {
			$sqli = "insert into 我的工程 (时间戳,工程名称,项目类别,工程位置,经纬度,误差范围,建筑面积,层数,高度,基坑深度,项目经理,安全主管,安全员，机械管理员，责任人，联系方式，施工许可证取得情况，开工报告，开工报告附件上传，形象进度) values ('$sjc','$gcmc',
		'$xmlb','$gcwz','$jwd','$wcfw','$jzmj','$cs','$gd','$jksd','$xmjl','$aqzg','$aqy','$jjgly','$zrrxx','$lxfs','$sgxkzqdqk','$kgbg','$kgbgfjsc','$gcxxjd')";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='insert失败';
			}
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';			
		////////////////////////插入一条记录/////////////////////////////
	}elseif ($sqlflag=="update") {	
		////////////////////////更新一条记录/////////////////////////////
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
		
		$sql = "select * from 我的工程  where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 我的工程  set 工程名称='$gcmc',项目类别='$xmlb',工程位置='$gcwz',经纬度='$jwd',误差范围='$wcfw',建筑面积='$jzmj',层数='$cs',高度='$gd',
			基坑深度='$jksd',项目经理='$xmjl',安全主管='$aqzg',安全员='$aqy'，机械管理员='$jjgly'，责任人='$zrrxx'，联系方式='$lxfs'，施工许可证取得情况='$sgxkzqdqk'，
			开工报告='$kgbg'，开工报告附件上传='$kgbgfjsc'，形象进度='$gcxxjd'    where 时间戳='".$sjc."'";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='update失败';
			}
		} else {
			$jsonresult='数据表无该时间戳';
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';		
		////////////////////////更新一条记录/////////////////////////////
	}elseif ($sqlflag=="select") {
		////////////////////////查询一条记录/////////////////////////////
		$sjc=$_POST["sjc"];
		
		$sqldate="";
		$sqli = "select * from 我的工程  where 时间戳='".$sjc."'";
		$result = $conn->query($sqli);
		$count=mysqli_num_rows($result);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程名称":"'.$row["工程名称"].'","项目类别":"'.$row["项目类别"].'",
				"工程位置":"'.$row["工程位置"].'","经纬度":"'.$row["经纬度"].'","误差范围":"'.$row["误差范围"].'","建筑面积":"'.$row["建筑面积"].'",
				"层数":"'.$row["层数"].'","高度":"'.$row["高度"].'","基坑深度":"'.$row["基坑深度"].'","项目经理":"'.$row["项目经理"].'",
				"安全主管":"'.$row["安全主管"].'","安全员":"'.$row["安全员"].'","机械管理员":"'.$row["机械管理员"].'","责任人":"'.$row["责任人"].'",
				"联系方式":"'.$row["联系方式"].'",},"施工许可证取得情况":"'.$row["施工许可证取得情况"].'","开工报告":"'.$row["开工报告"].'",
				"开工报告附件上传":"'.$row["开工报告附件上传"].'","形象进度":"'.$row["形象进度"].'"';
			}
			$jsonresult='success';
		} else {
			$jsonresult='数据表无该时间戳';
		}
		
		$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';	
		$json = '['.$sqldate.$otherdate.']';
		////////////////////////查询一条记录/////////////////////////////
		
	}elseif ($sqlflag=="delete") {
		//////////////////////// 删除一条记录/////////////////////////////
		$sjc=$_POST["sjc"];
		$sqli ="delete from 我的工程  where 时间戳='".$sjc."'";
		if ($conn->query($sqli) === TRUE) {
			$jsonresult='success';
		} else {
			$jsonresult='delete失败';
		}
		$json = '{"result":"'.$jsonresult.'"		
				}';
		//////////////////////// 删除一条记录/////////////////////////////
	}elseif ($sqlflag=="app_select_two") {
		$qd=$_POST["qd"];
		
		$sqldate="";
		$sqli = "select * from 我的工程  where 推送地区='".$qd."' order by id desc ";
		$result = $conn->query($sqli);
		$count=mysqli_num_rows($result);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程名称":"'.$row["工程名称"].'","项目类别":"'.$row["项目类别"].'",
				"工程位置":"'.$row["工程位置"].'","经纬度":"'.$row["经纬度"].'","误差范围":"'.$row["误差范围"].'","建筑面积":"'.$row["建筑面积"].'",
				"层数":"'.$row["层数"].'","高度":"'.$row["高度"].'","基坑深度":"'.$row["基坑深度"].'","项目经理":"'.$row["项目经理"].'",
				"安全主管":"'.$row["安全主管"].'","安全员":"'.$row["安全员"].'","机械管理员":"'.$row["机械管理员"].'","责任人":"'.$row["责任人"].'",
				"联系方式":"'.$row["联系方式"].'",},"施工许可证取得情况":"'.$row["施工许可证取得情况"].'","开工报告":"'.$row["开工报告"].'",
				"开工报告附件上传":"'.$row["开工报告附件上传"].'","形象进度":"'.$row["形象进度"].'"';
			}
			$jsonresult='success';
		} else {
			$jsonresult='该地区无活动';
		}
		
		$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';	
		$json = '['.$sqldate.$otherdate.']';
		
	
	}else {
		//////////////////////// 查询所有记录/////////////////////////////
		$sqli = "select * from 我的工程  ";
		$sqldate="";
		$result = $conn->query($sqli);
		$count=mysqli_num_rows($result);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= $sqldate.'{"id":"'.$row["id"].'","时间戳":"'.$row["时间戳"].'","工程名称":"'.$row["工程名称"].'","项目类别":"'.$row["项目类别"].'",
				"工程位置":"'.$row["工程位置"].'","经纬度":"'.$row["经纬度"].'","误差范围":"'.$row["误差范围"].'","建筑面积":"'.$row["建筑面积"].'",
				"层数":"'.$row["层数"].'","高度":"'.$row["高度"].'","基坑深度":"'.$row["基坑深度"].'","项目经理":"'.$row["项目经理"].'",
				"安全主管":"'.$row["安全主管"].'","安全员":"'.$row["安全员"].'","机械管理员":"'.$row["机械管理员"].'","责任人":"'.$row["责任人"].'",
				"联系方式":"'.$row["联系方式"].'",},"施工许可证取得情况":"'.$row["施工许可证取得情况"].'","开工报告":"'.$row["开工报告"].'",
				"开工报告附件上传":"'.$row["开工报告附件上传"].'","形象进度":"'.$row["形象进度"].'"';
			}
			$jsonresult='success';
		} else {
			$jsonresult='数据表无该时间戳';
		}
		
		$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';	
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////// 查询所有记录/////////////////////////////
	}	
	echo $json;
	$conn->close();
		
?>