<?php
	require("../conn.php");
	
	$lat=$_POST["lat"]; //纬度
	$longt=$_POST["longt"]; //经度
	$phone=$_POST["phone"];
	$gcid=$_POST["gcid"];
	$name=$_POST["name"];
	$bumen=$_POST["bumen"];
	$sjc=$_POST["sjc"];

	$jingweidu=$longt.",".$lat;

	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	$timestr1=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	//已知两地间的经纬度求距离函数
	function getDistance($lat1, $lng1, $lat2, $lng2){  
		$earthRadius = 6367000;  
		$lat1 = ($lat1 * pi() ) / 180;  
		$lng1 = ($lng1 * pi() ) / 180;    
		$lat2 = ($lat2 * pi() ) / 180;  
		$lng2 = ($lng2 * pi() ) / 180; 
		$calcLongitude = $lng2 - $lng1;  
		$calcLatitude = $lat2 - $lat1;  
		$stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  
		$stepTwo = 2 * asin(min(1, sqrt($stepOne)));  
		$calculatedDistance = $earthRadius * $stepTwo;    
		return round($calculatedDistance);  
	} 
	
	if($gcid){
		$sql = "select * from 我的工程 where id='".$gcid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$ceshi="11";
			$gcmc=""; //工程名称
			$mobile=""; //手机
			$lngLat=""; //经纬度
			$error_range=""; //误差范围
			$jingdu=""; //经度
			$weidu=""; //纬度
			$wucha=""; //误差
			while($row = $result->fetch_assoc()) {
				$gcmc=$row["工程名称"];
				$mobile=$row["联系方式"];
				$lngLat=$row["经纬度"];
				$error_range=$row["误差范围"]*1000;
				//分割经纬度
				$str=$lngLat;
				$var=explode(",",$str);
				$jingdu=$var[0];
				$weidu=$var[1];
				//经纬度比较算是不是在误差范围内
				$wucha=getDistance($weidu,$jingdu,$lat,$longt);
				if($wucha>=$error_range){
					$jsonresult='success';
					$jl=abs($wucha-$error_range);
					$resultWc="您现在所在的位置不允许签到！离签到范围还差：".$jl." m";
				}else{
					//if ($mobile==$phone) {
				      	$ceshi="13";
						//在用户信息表中找到与手机号对应的名字
						$sqlWfg1 = "select * from 用户信息 where 手机='".$phone."'";
						$resultWfg = $conn->query($sqlWfg1);
						if ($resultWfg->num_rows > 0) {
							$ceshi="14".$phone;
							//将值存在人员签到表里
							$sql = "select * from 人员签到 where 时间戳='".$sjc."'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$ceshi="15";
								$jsonresult='1';
							} else {
								//判断是否签到两次晚点做
								$ceshi="16";
								//$sqli = "insert into 人员签到 (工程id,工程名称,人员,签到时间,经纬度,联系方式,记录插入时间,时间戳) values ('$gcid','$gcmc','".$row["责任人"]."','$timestr','$jingweidu','$phone','$timestr','$sjc')";
								$sqli = "insert into 人员签到 (工程id,工程名称,人员,签到时间,经纬度,联系方式,记录插入时间,时间戳,部门,签到状态) values ('$gcid','$gcmc','$name','$timestr1','$jingweidu','$phone','$timestr','$sjc','$bumen','已签到')";
								if ($conn->query($sqli) === TRUE) {
									$jsonresult='success';
									$resultWc="签到成功！";
								} else {
									$jsonresult='error';
								}
							}
				    	}else{
				    		$jsonresult='success';
							$resultWc="此手机号未注册！";
						}	
//					}else{
//						$jsonresult='success';
//						$resultWc="您在此工程不用签到！";
//					}
				} 
	    	}
		} else {
			$jsonresult='success';
			$resultWc="无此工程！";
		}
		
		$json = '{"result":"'.$jsonresult.'",
					"resultWc":"'.$resultWc.'"
				}';
		echo $json;
		$conn->close();
	
	}
?>