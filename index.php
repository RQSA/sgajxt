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
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="css/bootstrap-table.min.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>

  <body>
  	<!-- 头部导航条 -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
	   						require("conn.php");
								$yhzh=$_GET["yhzh"];
	   						$sql = "select * from 用户信息   where 账号='$yhzh'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
          <a class="navbar-brand" href="index.php?yhzh=<?php echo $row["账号"];?>">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	
            <li class="active"><a href="index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
             <?php
								}
								$conn->close();		
						 ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="container" class="container">
    	<div class="row">
    		<!--左侧导航菜单 -->
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li class="active">
    						<a>集团公司</a>
    						<ul class="nav">
    							<!--<li><a>分公司1</a></li>
    							<li><a>分公司2</a></li>
    							<li><a>分公司3</a></li>
    							<li><a>分公司4</a></li>-->
    							<!--<li onclick='show(this.id)'><a>分公司4</a></li>	-->				
    							<?php
				   						require("conn.php");
											$yhzh=$_GET["yhzh"];
				   						$sql = "select b.账号,b.部门,a.部门  as 部门啊 from 公司部门 a,用户信息 b where b.账号='$yhzh' and (b.部门=a.部门  or b.部门='总公司') ";
				   						$result = $conn->query($sql);
				   						while($row = $result->fetch_assoc()) {
			   					?>
    							<li  onclick='show(this.id)' id="<?php echo $row["部门啊"];?>"><a><?php echo $row["部门啊"];?></a></li>	
    							<input value="<?php echo $row["部门"];?>" class="hidden" id="bmaa">
    							<?php
											}
											$conn->close();		
									?>
									<li><a><input value="123" class="hidden" id="cfdf"></a></li>
    						</ul>
    					</li>    				 				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			请稍等，数据加载中...
    			<?php
	   						require("conn.php");
								$yhzh=$_GET["yhzh"];
	   						$sql = "select * from 用户信息   where 账号='$yhzh'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
						<input type="text" class="form-control hidden" id="yhid"  name="yhid" value="yhid=<?php echo $row["id"];?>" placeholder="">	
             <?php
								}
								$conn->close();		
						 ?>
    		</div><!-- 内容区域 -->
    		
    	</div>
    </div>
    
    <footer class="bs-docs-footer" role="contentinfo"></footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   <!--js of bootstrap-table -->
   <script src="js/bootstrap-table.min.js"></script>
   <!--js of bootstrap-table—export -->
   <script src="js/export/tableExport.js"></script>
   <script src="js/export/bootstrap-table-export.js"></script>
   <script src="js/bootstrap-table-zh-CN.min.js"></script>
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p5qT2V6OajYx5sTtmqco3kARG2wQeuo8"></script>
    <script type="text/javascript">
    			var yhid=document.getElementById("yhid").value;
//  	alert (yhid);
					var bmaa=document.getElementById("bmaa").value;
//					alert (bmaa);
					if (bmaa=='总公司'||bmaa=='韶关一建公司'){
					$(document).ready(function() {
		    	$("footer").load("footer.html");
		    	$(".col-md-10").load("projectPlus/table.php?yhid="+yhid+"&gsjb="+'全部');
		    	});
		    	}
		    	else {
		    		$(document).ready(function() {
			    	$("footer").load("footer.html");
			    	$(".col-md-10").load("projectPlus/table.php?yhid="+yhid+"&gsjb="+bmaa);
			    	});
		    	}
//      var gsjb='全部';
			function show(obj){
//				var gsjb=obj.parentNode.getElementsByTagName('li');
					var gsjb=obj;
					var cfdf=document.getElementById("cfdf");
					cfdf.value=gsjb;
//				alert (gsjb);
//					window.location.reload();
					$(document).ready(function() {
		    	$("footer").load("footer.html");
		    	$(".col-md-10").load("projectPlus/table.php?yhid="+yhid+"&gsjb="+gsjb);
		    	});
			};
//					var cfdf1=document.getElementById("cfdf").value;
//					gsjb=cfdf1;
			//var bianliang="projectPlus/table.php?yhid="+yhid+"&gsjb="+gsjb;
//		      $(document).ready(function() {
//		    	$("footer").load("footer.html");
//		    	$(".col-md-10").load("projectPlus/table.php?yhid="+yhid+"&gsjb="+gsjb);
		      
//		    });
    </script>

<script type="text/javascript">
					function dianji(id){
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'SystemPlus/gcxxsc.php',
				                data:{
				                	gcid1:id
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    //alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
				                    window.location.reload();
				                }
				            }); 
						};		
		</script>
  </body>
</html>
