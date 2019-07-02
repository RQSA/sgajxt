<?php
	$appid="H5B37764A";
	$version="2017.02.1213";	//app版本号
	$note="韶关一建安检";	//app描述
	//$appurl="http://192.168.155.1:80/hxajxt/release/hxajxt.apk";	//app下载地址
	$appurl="http://service.jsjdw.org.cn:8080/hxadmin/hxajxt/release/hxajxt.apk";
	$json = '{"appid":"'.$appid.'",
				"version":"'.$version.'",
				"note":"'.$note.'",
				"appurl":"'.$appurl.'"
			}';
	
	echo $json;

?>