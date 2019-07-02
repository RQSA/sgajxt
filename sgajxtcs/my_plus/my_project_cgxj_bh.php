<?php
	require("../conn.php");	
	$flag=$_POST["flag"];
	
	$sqldate="";
	
	if($flag=="ziDingYi"){
		//用于自定义编号使用
		$gcmc=$_POST["gcmc"];
		//从整改通知单编号维护中查找编号的主体和内容部分    example：主体-内容-数字(后面生成)
		$sql = "select * from 整改通知书编号维护 order by id desc limit 1";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				//查找通知单表-取出最后一条记录
				$sql1 = "select * from 通知单 where 工程名称='".$gcmc."' order by 通知单编号 desc limit 1";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
					while($row1 = $result1->fetch_assoc()) {
						//判断编号的主体和内容是不是最新的主体和内容
						$serialNumber=explode("-",$row1["通知单编号"]);
						$arrayElementOneValue=$serialNumber[0]; //主体
						$arrayElementTwoValue=$serialNumber[1]; //内容
						$arrayElementThreeValue=$serialNumber[2]; //数字内容
						
						//数据类型的判断
						$judge="判断结果：".is_string($arrayElementThreeValue);
						
						//判断第一个值和第二个值是否等于编号的主体和内容
						if($arrayElementOneValue==$row["编号主体"]){ //第一个值的判断
							if($arrayElementTwoValue==$row["编号内容"]){ //第二个值的判断
								//将 0008 转换成数字 8（0008在调试中是最后一张通知单，那么现在下张新的通知单应该是0009）
								$figure=intval($arrayElementThreeValue);
								$figureNext=$figure+1;
								//判断 $figureNext 是不是一个数字还是两个或多个数字
								$figureNextSwitchString=strval($figureNext); //将数字类型的值转换成字符串类型的值
								$switchStringLength=strlen($figureNextSwitchString); //数字长度
								//使用 switch 语句来判断更为合适 1/2/3/4是数字的位数
								switch ($switchStringLength){
									case 1:
										$bianha='000'.$figureNext;
										break;
									case 2:
										$bianha='00'.$figureNext;
										break;
									case 3:
										$bianha='0'.$figureNext;
										break;
									default:
										$bianha=$figureNext;	
								}
							}else{
								//只满足第一个值符合的情况，就重新引用新的主体和内容
								$bianha="0001";
							}
						}else{
							//都不满足的情况，就重新引用新的主体和内容
							$bianha="0001";
						}
						//拼接编号
					 	$number=$row["编号主体"].'-'.$row["编号内容"].'-'.$bianha;
					}
					
				}else{
					//没有记录的情况下 编号从 0001开始
					$number=$row["编号主体"].'-'.$row["编号内容"].'-0001';
				}
			} 
		} else {
			
		}
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"bianhao":"'.$number.'",
					"count":"'.$count.'"
					}';		
		$json = '['.$sqldate.$otherdate.']';
	}else if($flag=="liuShuiHao"){
		//按照韶关一建要求 编号体系应该为 部门+日期(8位数字)+流水号(3位数字)
		$gcmc=$_POST["gcmc"];
		$chineseTzd=$_POST["chineseTzd"];
		$presentTime=$_POST["presentTime"];
		
		//查找通知单表-取出最后一条记录
		$sql1 = "select * from 通知单 where 工程名称='".$gcmc."' and 通知单编号 like '%".$chineseTzd."%' order by 时间戳 desc limit 1";
		$result1 = $conn->query($sql1);
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()) {
				//判断编号的主体和内容是不是最新的主体和内容
				$serialNumber=explode("-",$row1["通知单编号"]);
				$arrayElementOneValue=$serialNumber[0]; //主体
				$arrayElementTwoValue=$serialNumber[1]; //内容
				$arrayElementThreeValue=$serialNumber[2]; //数字内容
						
				//数据类型的判断
				$judge="判断结果：".is_string($arrayElementThreeValue);
						
				//判断第一个值和第二个值是否等于编号的主体和内容
				if($arrayElementOneValue==$chineseTzd){ //第一个值的判断
					if($arrayElementTwoValue==$presentTime){ //第二个值的判断
						//将 0008 转换成数字 8（0008在调试中是最后一张通知单，那么现在下张新的通知单应该是0009）
						$figure=intval($arrayElementThreeValue);
						$figureNext=$figure+1;
						//判断 $figureNext 是不是一个数字还是两个或多个数字
						$figureNextSwitchString=strval($figureNext); //将数字类型的值转换成字符串类型的值
						$switchStringLength=strlen($figureNextSwitchString); //数字长度
						//使用 switch 语句来判断更为合适 1/2/3/4是数字的位数
						switch ($switchStringLength){
							case 1:
								$bianha='00'.$figureNext;
								break;
							case 2:
								$bianha='0'.$figureNext;
								break;
							default:
								$bianha=$figureNext;	
						}
					}else{
						//只满足第一个值符合的情况，就重新引用新的主体和内容
						$bianha="001";
					}
				}else{
					//都不满足的情况，就重新引用新的主体和内容
					$bianha="001";
				}
				//拼接编号
				$number=$bianha;
			}
					
		}else{
			//没有记录的情况下 编号从 0001开始
			$number='001';
		}
		
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"bianhao":"'.$number.'"
					}';		
		$json = '['.$sqldate.$otherdate.']';
	}
	
	echo $json;
	$conn->close();	
		
?>