<?php
    require("../conn.php");
	$dh = $_POST["mobile"];
	$sql = "select id from 姓名 where 手机 = '".$mobile."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
			 	$jcry = $row["姓名"];
			 }
		}
	$otherdate = '{"result":"'.$jcry.'"}';
	$json = '['.$otherdate.']';
	echo $json;
	$conn->close();	
?>