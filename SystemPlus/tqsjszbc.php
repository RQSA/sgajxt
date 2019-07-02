<?php
require("../conn.php");
$num=$_POST["num"];

switch($num)
{
	case 1:
	$addnum=$_POST["addnum"];
 	$sqli="select * from 特权手机 where 特权手机 ='".$addnum."'";
 	$result=$conn->query($sqli);	
		if(!$result->num_rows > 0){
				$sql = "INSERT INTO 特权手机 (特权手机) values ('".$addnum."')";
					if ($conn->query($sql) === TRUE) {
						$jsonresult = "success";
				    echo "修改成功";
				 	} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
			    		
			}	
		}
    break;
    case 2:
        $delnum=$_POST["delnum"];
		$sql = "delete from 特权手机  where 特权手机 = '".$delnum."'";
	    if ($conn->query($sql) === TRUE) {
				$jsonresult = "success";
				 echo "修改成功";
		} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	break;
	case 3:
	$adddj=$_POST["adddj"];
 	$sqli="select * from 用户权限冻结表 where 手机 ='".$adddj."'";
 	$result=$conn->query($sqli);	
		if(!$result->num_rows > 0){
				$sql = "INSERT INTO 用户权限冻结表 (手机) values ('".$adddj."')";
					if ($conn->query($sql) === TRUE) {
						$jsonresult = "success";
				    echo "修改成功";
				 	} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
			    		
			}	
		}
    break;
    case 4:
        $jcdj=$_POST["jcdj"];
		$sql = "delete from 用户权限冻结表  where 手机 = '".$jcdj."'";
	    if ($conn->query($sql) === TRUE) {
				$jsonresult = "success";
				 echo "修改成功";
		} else {
				 $jsonresult = "error";
			    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	break;
	case 5:
	$bgnum=$_POST["bgnum"];
// 	$sqli="select * from 我的工程  where 手机 ='".$bgnum."'";
// 	$result=$conn->query($sqli);
//		if($result->num_rows > 0){
//				$sqli="UPDATE (我的工程 SET `项目经理`= '', `项目经理手机`= '' WHERE `项目经理手机`='".$bgnum."') OR (我的工程 SET `安全主管`= '', `安全主管手机`= '' WHERE `安全主管手机`='".$bgnum."') OR (我的工程 SET `安全员`= '', `安全员手机`= '' WHERE `安全主管手机`='".$bgnum."') OR ( 我的工程 SET `机械管理员`= '', `机械管理员手机`= '' WHERE `机械管理员手机`='".$bgnum."') OR (我的工程 SET `负责人`= '', `联系方式`= '' WHERE `联系方式`='".$bgnum."') OR (我的工程 SET `部门负责人A`= '', `部门负责人A手机`= '' WHERE `部门负责人A手机`='".$bgnum."') OR ( 我的工程 SET `部门负责人B`= '', `部门负责人B手机`= '' WHERE `部门负责人B手机`='".$bgnum."') OR (我的工程 SET `部门负责人C`= '', `部门负责人C手机`= '' WHERE `部门负责人C手机`='".$bgnum."') OR (我的工程 SET `总公司负责人A`= '', `总公司负责人A手机`= '' WHERE `总公司负责人A手机`='".$bgnum."') OR (我的工程 SET `总公司负责人B`= '', `总公司负责人B手机`= '' WHERE `总公司负责人B手机`='".$bgnum."') OR(我的工程 SET `总公司负责人C`= '', `总公司负责人C手机`= '' WHERE `总公司负责人C手机`='".$bgnum."') OR (我的工程 SET `总部巡查员`= '', `总部巡查员手机`= '' WHERE `总部巡查员手机`='".$bgnum."') OR (我的工程 SET `生产经理`= '', `生产经理手机`= '' WHERE `生产经理手机`='".$bgnum."') OR (我的工程 SET `质量员`= '', `质量员手机`= '' WHERE `质量员手机`='".$bgnum."')";
							
				$sqli1="UPDATE 我的工程 SET `项目经理`= '', `项目经理手机`= ''WHERE `项目经理手机`='".$bgnum."'";
				$result1=$conn->query($sqli1);
				
				$sqli2="UPDATE 我的工程 SET `安全主管`= '', `安全主管手机`= ''WHERE `安全主管手机`='".$bgnum."'";
				$result2=$conn->query($sqli2);
				
				$sqli3="UPDATE 我的工程 SET `安全员`= '', `安全员手机`= ''WHERE `安全员手机`='".$bgnum."'";
				$result3=$conn->query($sqli3);
				
				$sqli4="UPDATE 我的工程 SET `机械管理员`= '', `机械管理员手机`= ''WHERE `机械管理员手机`='".$bgnum."'";
				$result4=$conn->query($sqli4);
				
				$sqli5="UPDATE 我的工程 SET `责任人`= '', `联系方式`= '' WHERE `联系方式`='".$bgnum."'";
				$result5=$conn->query($sqli5);
				
				$sqli6="UPDATE 我的工程 SET `部门负责人A`= '', `部门负责人A手机`= ''WHERE `部门负责人A手机`='".$bgnum."'";
				$result6=$conn->query($sqli6);
				
				$sqli7="UPDATE 我的工程 SET `部门负责人B`= '', `部门负责人B手机`= ''WHERE `部门负责人B手机`='".$bgnum."'";
				$result7=$conn->query($sqli7);
				
				$sqli8="UPDATE 我的工程 SET `部门负责人C`= '', `部门负责人C手机`= ''WHERE `部门负责人C手机`='".$bgnum."'";
				$result8=$conn->query($sqli8);
				
				$sqli9="UPDATE 我的工程 SET `总公司负责人A`= '', `总公司负责人A手机`= ''WHERE `总公司负责人A手机`='".$bgnum."'";
				$result9=$conn->query($sqli9);
				
				$sqli10="UPDATE 我的工程 SET `总公司负责人B`= '', `总公司负责人B手机`= ''WHERE `总公司负责人B手机`='".$bgnum."'";
				$result10=$conn->query($sqli10);
				
				$sqli11="UPDATE 我的工程 SET `总公司负责人C`= '', `总公司负责人C手机`= ''WHERE `总公司负责人C手机`='".$bgnum."'";
				$result11=$conn->query($sqli11);
				
				$sqli12="UPDATE 我的工程 SET `总部巡查员`= '', `总部巡查员手机`= ''WHERE `总部巡查员手机`='".$bgnum."'";
				$result12=$conn->query($sqli12);
				
				$sqli13="UPDATE 我的工程 SET `生产经理`= '', `生产经理手机`= ''WHERE `生产经理手机`='".$bgnum."'";
				$result13=$conn->query($sqli13);
				
				$sqli14="UPDATE 我的工程 SET `质量员`= '', `质量员手机`= ''WHERE `质量员手机`='".$bgnum."'";
				$result14=$conn->query($sqli14);
				
				$sqli15="delete from 工程管理人员 where 联系方式= '".$bgnum."'";
				$result15=$conn->query($sqli15);
				
				$sqli16="UPDATE 我的工程 SET `质量负责人`= '', `质量负责人手机`= ''WHERE `质量负责人手机`='".$bgnum."'";
				$result16=$conn->query($sqli16);
				
					if ($result1||$result2||$result3||$result4||$result5||$result6||$result7||$result8||$result9||$result10||$result11||$result12||$result13||$result14||$result15||$result16)
//					||$result1||$result1||$result1||$result1||$result1||$result1||$result1||$result1||$result1||$result1) 
					{
						$jsonresult = "success";
				    echo "修改成功";
				    break;
				 	} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
			    		
			}	
//			}
		
    break;
	default:
	echo "未知错误";
}




$conn->close();		
?>