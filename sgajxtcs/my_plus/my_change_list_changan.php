<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$gcmc=$_POST["gcmc"]; //工程名称
//	$gcmc1=$_POST["gcmc1"]; //工程名称
	$qdlx=$_POST["qdlx"]; //清单类型
	$tzdid=$_POST["tzdid"]; //通知单id
	$sjc=$_POST["sjc"];

//	$gcid=''; //工程id
//	$gcmc2="22222222"; //工程名称
//	$gcmc="1111111111"; //工程名称
//	$qdlx="tpfjGx"; //清单类型
//	$tzdid=''; //通知单id
//	$sjc=1488357449478;
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	
	
	if($qdlx=="caogao"){
		//////////////////////////////// 草稿  ////////////////////////////////////////////////////////// 
		$wzzt="整改中";
		
		$sql = "select * from 通知单  where id='".$tzdid."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$sqli = "update 通知单 set 违章状态='$wzzt',通知单状态='$wzzt',下发整改时间='$timestr'  where id='".$tzdid."'";
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
		//////////////////////////////// 草稿  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="sccg"){
		//////////////////////////////// 删除草稿  ////////////////////////////////////////////////////////// 
		//DELETE FROM table_name WHERE column_name = some_value
		if($sjc){
			$sql = "select * from 通知单 where id='".$tzdid."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$sqli = "delete from 通知单 where id='".$tzdid."'";
				if ($conn->query($sqli) === TRUE) {
					//先查询图片附件这张表中有哪些图片
					$sqltpfj = "select * from 图片附件 where 时间戳='".$sjc."'";
					$resulttpfj = $conn->query($sqltpfj);
					$rowtpfj = $resulttpfj->fetch_assoc();
					if ($resulttpfj->num_rows > 0) {
						//图片存放的路径
						$picturePath="../upload/";
						$draftPicture = $rowtpfj["草稿附件"];
						if($draftPicture==""){
							//没有图片的话就直接删除
							//删除数据库中的记录
							$sqli = "delete from 图片附件 where 时间戳='".$sjc."'";
							if($conn->query($sqli) === TRUE){
								$sqli = "delete from 处罚条目 where 时间戳='".$sjc."'";
								if($conn->query($sqli) === TRUE){
									$scjg="通知单、图片附件和处罚条目删除成功！";
									$jsonresult='success';
								}else{
									$scjg="通知单和图片附件删除成功！";
									$jsonresult='success';
								}
							}else{
								$scjg="通知单删除成功！";
								$jsonresult='success';
							}
						}else{
							$pictureArray = explode("~*^*~",$draftPicture);
							$length = count($pictureArray);
							for($i=0;$i<$length-1;$i++){
								$pathPanduan=intval(file_exists($picturePath.$pictureArray[$i]));
								if($pathPanduan==1){
									if($pictureArray[$i]=="add.jpg"){
										
									}else{
										//存在除了 add.jpg 的文件就删除
										unlink($picturePath.$pictureArray[$i]);
									}
								}
							}
						}
						//删除数据库中的记录
						$sqli = "delete from 图片附件 where 时间戳='".$sjc."'";
						if($conn->query($sqli) === TRUE){
							$sqli = "delete from 处罚条目 where 时间戳='".$sjc."'";
							if($conn->query($sqli) === TRUE){
								$scjg="通知单、图片附件和处罚条目删除成功！";
								$jsonresult='success';
							}else{
								$scjg="通知单和图片附件删除成功！";
								$jsonresult='success';
							}
						}else{
							$scjg="通知单删除成功！";
							$jsonresult='success';
						}
						
					}else{
						$scjg="";
						$jsonresult='error';
					}
				} else {
					$scjg="";
					$jsonresult='error';
				}
			} else {
				$scjg="";
				$jsonresult='1';
			}
			$json = '{"result":"'.$jsonresult.'",
					"scjg":"'.$scjg.'"		
						}';
		}
		//////////////////////////////// 删除草稿  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="yq"){
		/////////////////////////////// 延期  ////////////////////////////////////////////////////////////
		
		/////////////////////////////// 延期  ////////////////////////////////////////////////////////////
	}else if($qdlx=="yuqi"){
		/////////////////////////////// 逾期  ////////////////////////////////////////////////////////////
		
		/////////////////////////////// 逾期  ////////////////////////////////////////////////////////////
	}else if($qdlx=="wwc"){
		/////////////////////////////// 未完成  ////////////////////////////////////////////////////////////
		
		/////////////////////////////// 未完成  ////////////////////////////////////////////////////////////
	}else if($qdlx=="ywc"){
		/////////////////////////////// 已完成  ////////////////////////////////////////////////////////////
		
		/////////////////////////////// 已完成  ////////////////////////////////////////////////////////////
	}else if($qdlx=="scwztm"){
		//my_js_cgwztmck.js文件
		//查询违章条目和对应照片
		if($sjc){
			$sqldate="";
			$sql = "select * from 通知单 where 时间戳='".$sjc."'";
			$result = $conn->query($sql);
			$count=mysqli_num_rows($result);
			if ($result->num_rows > 0) {
				$sql1 = "select * from 图片附件 where 时间戳='".$sjc."'";
				$result1 = $conn->query($sql1);
				if ($result1->num_rows > 0) {
					while($row = $result1->fetch_assoc()) {
						$sqldate= $sqldate.'{"草稿附件":"'.$row["草稿附件"].'","时间戳":"'.$row["时间戳"].'"},';
					}
				}
			}
			$jsonresult='success';
			$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$count.'"
						}';
			$json = '['.$sqldate.$otherdate.']';
		}
		
	}else if($qdlx=="tpfjGx"){
		//my_js_cgwztmck.js文件
		//通过删除的方法实现图片附件的更新
		//$gcmc在此类型判断条件下实质上是草稿附件名称，因为这个php文件是个接口文件
		$sql = "select * from 通知单 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			//判断图片附件是否存在照片
			$sqli1 = "select * from 图片附件 where 时间戳='".$sjc."'";
			$result = $conn->query($sqli1);
			if ($result->num_rows > 0) {
				//照片存在，直接更新照片名称
				$sqli2 = "update 图片附件 set 草稿附件='$gcmc' where 时间戳='".$sjc."'";
				if ($conn->query($sqli2) === TRUE) {
					$jsonresult='success';
				} else {
					$jsonresult='error';
				}	
			}else{
				
			}
			
		} else {
			$jsonresult='1';
		}
			
		$json = '{"result":"'.$jsonresult.'"		
				}';
	}else if($qdlx=="tpfjhq"){
		//my_js_cgwztmck.js文件
		//通过删除的方法实现图片附件的更新
		//$gcmc在此类型判断条件下实质上是草稿附件名称，因为这个php文件是个接口文件
		$sqldate='';
		$sql = "select * from 通知单 where 时间戳='".$sjc."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			//判断图片附件是否存在照片
			$sqli1 = "select * from 图片附件 where 时间戳='".$sjc."'";
			$result = $conn->query($sqli1);
			$count=mysqli_num_rows($result);
			if ($result->num_rows > 0) {
				//照片存在，直接更新照片名称
				while($row = $result->fetch_assoc()) {
				 	$sqldate= $sqldate.'{"草稿附件":"'. $row["草稿附件"].'"},';
				 }	
			}else{
				
			}
		} else {
			$jsonresult='1';
		}
			
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
		$json = '['.$sqldate.$otherdate.']';
	}else{
		
	}
	echo $json;
	$conn->close();
?>