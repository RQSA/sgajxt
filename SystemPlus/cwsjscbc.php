<?php

require("../conn.php");
//说明一下，本后台负责错误数据删除，但是以后应该会有更多类型的数据要删除，但是这样添加新的php文件实在是太麻烦，所以打算
//把他们弄在一起，因此，每个功能，都隐藏赋值num，通过num来判定使用的是哪个删除功能，这样就能节省很多时间。因此以后维护的师弟，
//尽量就不要再新建别的php文件了。(注意分清好概念，id必须不相同，但是name是可以相同的)。
$num=$_POST["num"];
switch ($num)
{
	case 1:
	      $cwtzdnum=$_POST["cwtzdnum"];
	      $sql1 = "select * from 通知单 where 通知单编号 = '".$cwtzdnum."'";
	      $result = $conn->query($sql1);
          while($row = $result->fetch_assoc()) {
          	$sjcc=$row["时间戳"];
          }
		  $sql2 = "delete from 通知单  where 时间戳 = '".$sjcc."'";
		  $sql3= "delete from 处罚条目  where 时间戳= '".$sjcc."'";
	        if ($conn->query($sql2)&&$conn->query($sql3) === TRUE){
						$jsonresult = "success";
				    echo "修改成功";
				 	} else {
				 		$jsonresult = "error";
			    	echo "Error: " . $sql . "<br>" . $conn->error;
		        }
			    		
				
		
	break;
	case 2:
	echo "暂时未开通的服务，你怎么跳转到这里的？";
	break;
	default:
	echo "未知错误？";
}
$conn->close();		
?>