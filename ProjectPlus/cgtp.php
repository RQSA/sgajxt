<?php
	require("../conn.php");
	$sql = "select * from 通知单 where 通知单编号='".$tzdbh."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//$sqli = "UPDATE 图片附件 set 草稿附件='$filenames' where 通知单编号='".$tzdbh."'' ";
		$sqli = "UPDATE 通知单 set 草稿新增图片附件='$filenames' where 通知单编号='".$tzdbh."'' ";
		
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
	} else {
		$jsonresult='1';
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
?>