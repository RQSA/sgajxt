<?php
require ("../conn.php");
//$fgs = "";
$flage = $_POST['fgs_flag'];
$fgs = $_POST['fgs'];
//echo $flage.$fgs;

if($flage=='car'){
	if($fgs!='总公司'){
	  $sqldate ='';
      $sqli = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市  from 我的工程 a where a.`形象进度` !='竣工验收' and a.所属公司='$fgs' ";
$result1 = $conn->query($sqli);
	if ($result1->num_rows > 0) {
		$i=0;
		while($row = $result1->fetch_assoc()) {
				$ret_data[$i]['id']=$row['id'];
				$ret_data[$i]['工程名称']=$row['工程名称'];
				$ret_data[$i]['工程位置']=$row['工程位置'];
				$ret_data[$i]['项目类别']=$row['项目类别'];
				$ret_data[$i]['工程状态']=$row['工程状态'];
				$ret_data[$i]['地区省']=$row['地区省'];
				$ret_data[$i]['地区市']=$row['地区市'];
				$i++;
		}
		
	}
	}else{
		    $sqldate ='';
            $sqli = "select a.id,a.工程名称,a.工程位置,a.项目类别,a.工程状态,a.地区省,a.地区市  from 我的工程 a where a.`形象进度` !='竣工验收' ";
            $result1 = $conn->query($sqli);
	          if ($result1->num_rows > 0) {
		            $i=0;
		             while($row = $result1->fetch_assoc()) {
				           $ret_data[$i]['id']=$row['id'];
				           $ret_data[$i]['工程名称']=$row['工程名称'];
				           $ret_data[$i]['工程位置']=$row['工程位置'];
				           $ret_data[$i]['项目类别']=$row['项目类别'];
				           $ret_data[$i]['工程状态']=$row['工程状态'];
				           $ret_data[$i]['地区省']=$row['地区省'];
				           $ret_data[$i]['地区市']=$row['地区市'];
				           $i++;
		}
		
	}
	}
//	$jsonresult = 'success';
//	$otherdate = '{"result":"'.$jsonresult.'",
//					"count":"'.$class.'"
//				}';
//	$json = '['.$sqldate.$otherdate.']';
	$json = json_encode($ret_data);
	echo $json;
}else if($flage=='list'){
$data = "";
$sql = "select * from 公司部门 where 部门<>'总公司'";
$str = "";
$result = $conn->query($sql);
$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data[] = $row['部门'];
			$str .= $row['部门'].",";
		}
	}else{
		 $class = 0; 
	}
	$json2 = json_encode($data);
//	echo $json2;
	$str = substr($str,0,strlen($str)-1);
	echo $str;
}
	
	
	$conn->close();
	
	
?>