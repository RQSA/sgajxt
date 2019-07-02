<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="">
	    <title>韶关一建企业有限公司项目质量安全检查管理系统</title>
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
	    <link href="../css/theme.css" rel="stylesheet">
	    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
	    <link href="../css/mycss.css" rel="stylesheet">
	    <script src="../js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<div>
			
		</div>
		<?php
			$bak=$_POST["bak"];
			$userId=$_POST["userId"];
			require 'DbManage.class.php';
			//分别是主机，用户名，密码，数据库名，数据库编码
			$db = new DBManage ( 'localhost', 'root', '123456', 'hxadmin', 'utf8' );
			
			if($bak=="bak"){
				$db->backup ('','','');
				echo "您的数据库备份文件已保存在服务器！"."</br>";
			}else{
				$db->restore ( './backup/'.$userId);
				echo "数据库还原成功"."</br>";	
			}
		?>
		<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();">关闭</button>
	</body>
</html>