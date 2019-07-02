<?php
/*
<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="upfile" /><br> 
<input type="submit" value="上传" /></form> 
 */

$nub=$_POST["nub"]; //上传的数量
$zgGl=$_POST["zgGl"]; //判断是回复的还是批复的
$files =$_POST['files1'];  //获取base64数据流
$sjc=time();
$strsShuzu = explode('︴',$files);
$length=count($strsShuzu)-1;
for ($i= 0;$i< $length; $i++){
	$fengeOk=substr($strsShuzu[$i],1);
	$files1 = substr($fengeOk,22);  //百度一下就可以知道base64前面一段需要清除掉才能用。
	$tmp  = base64_decode($files1);  //解码
	$sjc=time().$i;
	$s=dirname(dirname(__FILE__)); //获的服务器路劲
	$fp=$s."/upload/".$sjc.".jpg";  //确定图片文件位置及名称
	$filenames=$filenames.$sjc.".jpg"."~*^*~";
	//写文件
	file_put_contents( $fp, $tmp);     
}
if($zgGl=="hf"){
	require("zggl_hf_upload.php");
}else{
	require("zggl_pf_upload.php");
}
?> 