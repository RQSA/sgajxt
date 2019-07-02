<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	//$mchen=$_POST["mchen"];
	$sjc=$_POST["sjc"];
	$hfr=$_POST["hfr"];
	$hfrq=$_POST["hfrq"];
	$fjscfs=$_POST["fjscfs"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$sql = "select * from 通知单 a,图片附件 b where a.时间戳=b.时间戳 and a.时间戳='".$sjc."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$sqli = "update 通知单 a,图片附件 b set a.回复人='$hfr',a.回复日期='$hfrq',a.答复状态='已回复',b.回复附件='$filenames',b.回复新建日期='$timestr',b.图片附件上传方式='$fjscfs' where a.时间戳=b.时间戳 and a.时间戳='".$sjc."'";
		
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
				//echo $sqli;
			} else {
				$jsonresult='error';
			}
		
		
		$jsonresult='1';
	} else {
		
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>