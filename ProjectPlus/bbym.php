<!DOCTYPE html>
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
   
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
		<script type="text/javascript" src="../js/jedate.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
  
  </head>
	<body>
		<div class="modal-header">
				<?php
           require("../conn.php");
           $table=$_GET["table"];
           $sjc1=$_GET["sjc1"];
		?>

		    
										<div>
				<button id="buttDY" type="button"  class="btn btn-default col-sm-offset-3" onclick="save1();window.close()" name="<?php echo $table.'/*/'.$sjc1;?>">报表打印预览</button></div>
				<div>
				<button id="bbdy" type="button" class="btn btn-default col-sm-offset-3 " onclick="save2();window.close()" name="<?php echo $table.'/*/'.$sjc1;?>">导出word</button></div>
		</div>
		
		<script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   <!--js of bootstrap-table -->
   <script src="../js/bootstrap-table.min.js"></script>
   <!--js of bootstrap-table—export -->
   <script src="../js/export/tableExport.js"></script>
   <script src="../js/export/bootstrap-table-export.js"></script>
   <script src="../js/bootstrap-table-zh-CN.min.js"></script>
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
   
    <script src="../js/ProjectPlus/aqxc.js"></script>
		<script type="text/javascript">
			function save1(){
				var buttDYid=document.getElementById("buttDY");
				var DYName=buttDYid.name;
				var DYValue=DYName.split("/*/");
				var zt1 = 1;
				var zt2 = 2;
//				alert(DYValue[0]);
//				alert(DYValue[1]);
				var x=DYValue[0].slice(0,1);
//				alert(x);
				switch(x)
   				 {
   				 	case "现":
   				 		window.open("llbb/xjhnt.php?sjc1="+DYValue[1]);
   				 	break;
   				 	
   				 	case "填":
   				 		window.open("llbb/tcqt.php?sjc1="+DYValue[1]);
   				 	break;
   				 	
   				 	case "一":
   				 		window.open("llbb/ybmh.php?sjc1="+DYValue[1]);
   				 	break;
   				 	
   				 	case "饰":
   				 		window.open("llbb/smz.php?sjc1="+DYValue[1]);
   				 	break;
   				 	
   				 	case "大":
   				 		window.open("llbb/dls.php?sjc1="+DYValue[1]);
   				 	break;
   				 	
   				 	default:
   				 	alert("该查找记录表类型不存在");
   				 }  	
			};
			
			function save2(){
				var buttWord=document.getElementById("bbdy");
				var WordName=buttWord.name;
				var WordValue=WordName.split("/*/");
//				alert(WordValue[0]);
//				alert(WordValue[1]);
				var x=WordValue[0].slice(0,1);
				switch(x)
   				 {
   				 	case "现":
   				 	window.open("../phpword/xjhnt.php?sjc1="+WordValue[1]);
   				 	break;
   				 	
   				 	case "填":
   				 	window.open("../phpword/tcjlb.php?sjc1="+WordValue[1]);
   				 	break;
   				 	
   				 	case "一":
   				 	window.open("../phpword/mhgcjlb.php?sjc1="+WordValue[1]);
   				 	break;
   				 	
   				 	case "饰":
   				 	window.open("../phpword/smznt.php?sjc1="+WordValue[1]);
   				 	break;
   				 	
   				 	case "大":
   				 	window.open("../phpword/dlsmc.php?sjc1="+WordValue[1]);
   				 	break;
   				 	
   				 	default:
   				 	alert("该查找记录表类型不存在");
   				 }  	
			};
		</script>
	</body>
</html>