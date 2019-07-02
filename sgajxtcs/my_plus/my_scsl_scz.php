<?php
 	require('../conn.php');
	$idd = $_POST["id"];
	$sjc = $_POST["sjc"];
	$zhi = $_POST["zhi"];
	$zt  = $_POST["zt"];
//	echo $idd.$sjc.$zhi.$zt;
	$di = explode("|",$idd);
	$id = $di[0];
	$d  = 'D'.$di[1];
	$z  = '状态'.$di[1];
	$sql = "update 实测实量数据 set ".$d." = '".$zhi."',".$z." = '".$zt."' where id='".$id."'";
	$result = $conn->query($sql);
	
	$otherdate = '{"result":"success"}';
	$json = '['.$otherdate.']';
	echo $json;
	$conn->close();
?>