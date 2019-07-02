<?php
	$appid="H5AD8F81E";
	$version="2018.03.05.06";	//app版本号
	$note="韶关一建巡检";	//app描述
	//$appurl="http://192.168.155.1:80/hxajxt/release/hxajxt.apk";	//app下载地址
	$appurl="http://39.108.225.40/sgajxt/sgajxtcs/release/sgyjapp.apk";
	$json = '{"appid":"'.$appid.'",
				"version":"'.$version.'",
				"note":"'.$note.'",
				"appurl":"'.$appurl.'"
			}';
	
	echo $json;

?>