<?php
	require("../conn.php");
	$lx=$_POST["lx"];
	$sjc=$_POST["sjc"];
	
	$fgspf3=$_POST["fgspf3"];
	$zgspf3=$_POST["zgspf3"];
	$pfyj3=$_POST["pfyj3"];
	$pfr3=$_POST["pfr3"];
	$pfrq3=$_POST["pfrq3"];
	
	$time=getdate();
	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
	
	$sql = "select * from 通知单 a,图片附件 b where a.时间戳=b.时间戳 and a.时间戳='".$sjc."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$sqli = "update 通知单 a,图片附件 b set a.分公司批复='$fgspf3',a.总公司批复='$zgspf3',a.答复状态='已批复',a.批复意见='$pfyj3',a.批复人='$pfr3',a.批复日期='$pfrq3',b.批复附件='$filenames',b.批复新建日期='$timestr' where a.时间戳=b.时间戳 and a.时间戳='".$sjc."'";
		
		if ($conn->query($sqli) === TRUE) {
				$jsonresult='success';
			} else {
				$jsonresult='error';
			}
		//$jsonresult='1';
	} else {
		$jsonresult='1'; //换了这里
	}
		
	$json = '{"result":"'.$jsonresult.'"		
			}';
	echo $json;
	$conn->close();
	
?>