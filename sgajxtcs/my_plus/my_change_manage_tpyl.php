<?php
	require("../conn.php");
	$sjc=$_POST["sjc"]; //这个就是通知单时间戳
	$flag=$_POST["flag"]; //工程id
	$panduan=$_POST["panduan"]; 
	$wztm=$_POST["wzxxZggl"]; //违章条目
	$wzbw=$_POST["wzbwZggl"]; //违章部位
	$wzzt=$_POST["wzztZggl"]; //违章状态
	$sjcYl=$_POST["sjcYlZggl"]; //时间戳
	$sjcTzd=$_POST["sjcTzdZggl"]; //通知单时间戳
	$tzdbhFw=$_POST["tzdbhFwZggl"];	//通知单编号
	$gcid=$_POST["gcidZggl"]; //工程id
	$gcmc=$_POST["gcmcZggl"]; //工程名称
	$liid=$_POST["liidZggl"]; //li的ID
	$textareaBianji=$_POST["textareaBianjiZggl"]; //项目部回复、总公司批复
	$zgshf=$_POST["zgshfZggl"]; //总公司批复
	$fgshf=$_POST["fgshfZggl"]; //分公司批复
	
	//echo $flag."    ||".$gcid."    ||".$gcmc."    ||".$wztm."    ||".$wzbw."    ||".$wzzt."    ||".$sjcYl."    ||".$sjcTzd."    ||".$tzdbhFw."    ||".$liid."    ||".$textareaBianji."    ||".$zgshf."    ||".$fgshf."    ||"$panduan;
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$liIdhf="tzh".$flag;
	if($panduan=="huifu"){
		$dfzt="已回复";
		$Li_id=$liid;
	}else if($panduan=="tongguo"){
		$dfzt="批复通过";
		$Li_id=$liIdhf;
	}else if($panduan=="butongguo"){
		$dfzt="批复不通过";
		$Li_id=$liIdhf;
	}else{
		
	}
	
	if($gcid){
		$sql = "select * from 预览数据表 where Li的ID='".$Li_id."' and 通知单时间戳='".$sjcTzd."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			//$ceshi="11";
			if($panduan=="huifu"){
				$sqli = "update 预览数据表 set 违章现象='$wztm',项目部回复='$textareaBianji',违章状态='$wzzt',违章部位='$wzbw' where Li的ID='".$liid."' and 通知单时间戳='".$sjcTzd."'";
				//$ceshi="12";
			}else{
				$sqli = "update 预览数据表 set 违章现象='$wztm',项目部回复='$textareaBianji',违章状态='$wzzt',违章部位='$wzbw',分公司批复='$fgshf',总公司批复='$zgshf' where Li的ID='".$liIdhf."' and 通知单时间戳='".$sjcTzd."'";
				//$ceshi="13";
			}
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
			
    		//////////////////////////////////预览数据表未分割
			$sqlWfg = "select * from 预览数据表未分割 where 通知单时间戳='".$sjcTzd."'";
			$resultWfg = $conn->query($sqlWfg);
			if ($resultWfg->num_rows > 0) {
				//$ceshi="17";
				$resultWfg = $conn->query($sqlWfg);
				while($row = $resultWfg->fetch_assoc()) {
			      	$sqliWfg= "update 预览数据表未分割 set 分公司批复='".$row["分公司批复"].'||'.$fgshf."',总公司批复='".$row["总公司批复"].'||'.$zgshf."',违章部位='".$row["违章部位"].'||'.$wzbw."' where 通知单时间戳='".$sjcTzd."'";
			      	if ($conn->query($sqliWfg) === TRUE) {
						$jsonWfg='1';
					} else {
						$jsonWfg='0';
					}
	    		}
    		}else{
    			//$ceshi="18";
				
    		}
			////////////////////////////////
			
			
			
			
		} else {
			//$ceshi="14";
			$sqli = "insert into 预览数据表 (工程id,工程名称,通知单时间戳,时间戳,通知单编号,Li的ID,违章现象,项目部回复,记录录入日期,违章状态,违章部位,flag) 
values ('$gcid','$gcmc','$sjcTzd','$sjcYl','$tzdbhFw','$liid','$wztm','$textareaBianji','$timestr','$wzzt','$wzbw','$flag')";
			if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
			
			//////////////////////////////////预览数据表未分割
			$sqlWfg = "select * from 预览数据表未分割 where 通知单时间戳='".$sjcTzd."'";
			$resultWfg = $conn->query($sqlWfg);
			if ($resultWfg->num_rows > 0) {
				//$ceshi="16";
				$resultWfg = $conn->query($sqlWfg);
				while($row = $resultWfg->fetch_assoc()) {
			      	$sqliWfg= "update 预览数据表未分割 set 项目部回复='".$row["项目部回复"].'||'.$textareaBianji."',违章状态='".$row["违章状态"].'||'.$wzzt."',违章部位='".$row["违章部位"].'||'.$wzbw."' where 通知单时间戳='".$sjcTzd."'";
			      	if ($conn->query($sqliWfg) === TRUE) {
						$jsonWfg='1';
					} else {
						$jsonWfg='0';
					}
	    		}
    		}else{
    			//$ceshi="15";
				$sqliWfg = "insert into 预览数据表未分割 (工程id,工程名称,通知单时间戳,通知单编号,违章现象,项目部回复,违章状态,违章部位) values ('$gcid','$gcmc','$sjcTzd','$tzdbhFw','$wztm','$textareaBianji','$wzzt','$wzbw')";
			      if ($conn->query($sqliWfg) === TRUE) {
					$jsonWfg='1';
				} else {
					$jsonWfg='0';
				}
    		}
			////////////////////////////////
			
		}
		
		$json = '{"result":"'.$jsonresult.'"		
				}';
		echo $json;
		$conn->close();
	
	}
?>