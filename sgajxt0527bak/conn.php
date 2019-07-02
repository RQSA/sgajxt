<?php
	$servername = "localhost:3305";
	$username = "root";
	$password = "";
	$dbname = "韶关一建app测试";	
	$conn = new mysqli($servername, $username, $password, $dbname);	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected successfully";
	}

	//检查是否为乱码，是乱码就更换php开发环境
	//echo "哈哈";
?>