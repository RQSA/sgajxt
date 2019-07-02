<?php
require("conn.php");
$data=array();
$sql="select * from 处罚条目 ";
$result = $conn->query($sql);
$count=mysqli_num_rows($result);
while($row = $result->fetch_assoc()) {
	$data[]=$row["id"];
			 }
//echo $data[0];
for($i=0;$i<$count;$i++){
	$sqldate=array();
	$sqli="select * from 处罚条目  where id='".$data[$i]."'";
	$result1 = $conn->query($sqli);
	$count1=mysqli_num_rows($result1);
	while($row = $result1->fetch_assoc()) {
	$sqldate=$row["内容"];
			 }
     echo $sqldate;
$tiaomu=explode('||', $sqldate);
$len=count($tiaomu);
for($j=0;$j<$len;$j++){
//	echo$tiaomu[$j];
$str[$j] = str_replace(" ","",$tiaomu[$j]);
}
$text=implode("||", $str);
//echo $text;
$sql2="update 处罚条目  set 内容='".$text."'"."where id='".$data[$i]."'";
$result2 = $conn->query($sql2);
}
?>