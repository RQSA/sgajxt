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
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

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
          <a class="navbar-brand" href="">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">项目管理</a></li>
            <li><a href="../seclect.html">综合查询</a></li>
            <li class="active"><a href="../system.html">系统管理</a></li>
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
    						<a>数据维护</a>
    						<ul class="nav">
    							<li><a href="sbac.html">设备安拆单位</a></li>
    							<li><a href="bianhao.html">编号</a></li>
    							<li><a href="sbcq.html">设备产权单位</a></li>
    							<li><a href="xmjbxx.html">基本信息</a></li>
    							<li><a href="lygs.html">联营公司数据库</a></li>
    							<li><a href="fbgs.html">分包公司数据库</a></li>
    							<li><a href="kfxlx.html">开放性类型数据库</a></li>
    							<li class="active"><a href="wzsj.php">违章数据库</a></li>
    							<li><a href="wxy.html">危险源</a></li>
    							<li><a href="dtkf.html">动态扣分标准</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a>系统管理</a>
    						<ul class="nav">
    							<li><a href="yhgl.html">用户管理</a></li>
    							<li><a href="dxgl.html">短信管理</a></li>
    							<li><a href="xtxx.html">系统信息与数据库维护</a></li>
    							<li><a href="../ProjectPlus/youqinglianjie.html">友情链接</a></li>    							
    						</ul>
    					</li>
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">违章数据修改</h3>
	</div>
	
		<div class="tab-content">
	
			 <div role="tabpanel" class="tab-pane fade in active" id="cg">
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    				<!--	<table id="">-->
    						<?php
		//										echo $_GET["id"];
												  $id=$_GET["id"];
												  
												  require("../conn.php");
													$sql = "select * from 违章数据库  where id='$id' ";
													$result = $conn->query($sql);
													while($row = $result->fetch_assoc()) {
		                         					
                     ?>
					<form class="form-horizontal" role="form"  id="wzsjform" name="wzsjform" action="wzsjformbc.php" method="post">
					<div class="form-group">
									
						<label for="wzdl" class="col-sm-2 control-label">违章大类：</label>
						<div class="col-sm-3">
							 <input type="text" class="form-control" id="wzdl" name="wzdl" value="<?php echo $row["违章大类"];?>" placeholder="6032564">
						</div>
						<div>
							 <input type="text" style="width: 200px" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>"/>
						</div>
						<label for="jcxm" class="col-sm-2 control-label"  >检查项目：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jcxm" name="jcxm"  value="<?php echo $row["检查项目"];?>" placeholder="6032564">
						</div>
					</div>
					<div class="form-group">
						<label for="nr" class="col-sm-2 control-label"  >内容：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="nr" name="nr" value="<?php echo $row["内容"];?>" placeholder="韶关一建">
						</div>
						<label for="dx" class="col-sm-2 control-label">对象：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="dx" name="dx" value="<?php echo $row["对象"];?>" placeholder="韶关一建">
						</div>
					</div>
					<div class="form-group">
						<label for="lx" class="col-sm-2 control-label">类型：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="lx" name="lx" value="<?php echo $row["类型"];?>" placeholder="705">
						</div>
						<label for="kfz" class="col-sm-2 control-label">扣分值：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="kfz" name="kfz" value="<?php echo $row["扣分值"];?>" placeholder="质量">
						</div>
					</div>
				<div class="form-group">
										<label for="wzzt" class="col-sm-3 control-label">违章状态：</label>
										<div class="col-sm-3">
											<select id="wzzt" name="wzzt" class="form-control">
												<option>安全</option>
												<option>质量</option>
																		
											</select>
										</div>
										</div>
					
						          <?php
												}
												$conn->close();
																
											?>

					<button id="save7" type="button" class="btn btn-primary col-sm-offset-9"  onclick="goback()">保存</button>
				<form>
    				
    				</div>
				
			 </div>		 
		</div>
		
				
	</div>
</div> 	
    		
    		</div><!-- 内容区域 -->
    	</div>
    
    <footer class="bs-docs-footer" role="contentinfo"></footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
   <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script src="../js/ProjectPlus/aqxc.js"></script>
    <script type="text/javascript">
    $('table').bootstrapTable({		
		striped : true,	//会有隔行变色效果
		pagination : true,	//表格底部显示分页条
		pageSize : 10,	//页面数据条数
		search : true,	//搜索框
		showRefresh : true,	//刷新按钮
		showToggle : true,	//切换试图（table/card）按钮
		showPaginationSwitch : true,	//数据条数选择框
		showColumns : true,	//内容列下拉框
		toolbar : "#toolbar",	//指明自定义的菜单
		showExport : true	//导出按钮
		
	  });
    </script>
    <script type="text/javascript">
			$("#save7").click(function(){ 
		    $.ajax({ 
		        url:'wzsjxgbc.php', 
		        type:"POST", 
		        data:$('#wzsjform').serialize(), 
		        success: function(data) { 
		            $("#result").text(data); 
		        } 
		    }); 
		});  
		</script>
<script>
 function goback(){
 window.location.href="wzsj.php";
}
</script>
  </body>
</html>

