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
          <a class="navbar-brand" href="../index.html">韶关一建质安站</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">项目管理</a></li>
            <li><a href="../seclect.html">综合查询</a></li>
            <li><a href="../system.html">系统管理</a></li>
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
    							<li  class="active"><a href="kfxlx.html">开放性类型数据库</a></li>
    							<li><a href="wzsj.php">违章数据库</a></li>
    							<li><a href="wxy.html">危险源</a></li>
    							<li><a href="dtkf.html">动态扣分标准</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a>系统管理</a>
    						<ul class="nav">
    							<li><a>用户管理</a></li>
    							<li><a>短信管理</a></li>
    							<li><a>系统信息与数据库维护</a></li>
    							<li><a>友情链接</a></li>    							
    						</ul>
    					</li>
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    		<div id="xmdj" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">系统管理</h3>
	</div>
	<div class="panel-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#wxy" role="tab" data-toggle="tab">危险源类型</a></li>
			<li role="presentation"><a href="#qzjx" role="tab" data-toggle="tab">起重机械类型</a></li>
			<li role="presentation"><a href="#dq" role="tab" data-toggle="tab">地区类型</a></li>
			<li role="presentation"><a href="#xm" role="tab" data-toggle="tab">项目类型 </a></li>
 			<li role="presentation"><a href="#jg" role="tab" data-toggle="tab">结构类型 </a></li>
		</ul>	
    <!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="wxy">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar1" class="btn-group">
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>

   						</button>
   						
    						
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button>
              <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown">
     			数值
     				 <span class="caret"></span>
 						  </button>
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th >序号</th>
    								
							
    								<th>名称</th>
    					      </thead>
    						<tbody>
    							 <?php
                   require("../conn.php");
                   $sql = "select * from 开放性类型 ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["序号"];?></td>
                   <td><a href=""><?php echo $row["名称"];?></a></td>
                   
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
			
			<div role="tabpanel" class="tab-pane fade" id="qzjx">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar2" class="btn-group">
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>
    						</button>
    						
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button>
    						
    						<button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown">
     			数值
     				 <span class="caret"></span>
 						  </button>
				
    						    						
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th >序号</th>
    							
								
    								<th>名称</th>
    					      </thead>
    						<tbody>
    							  <?php
                   require("../conn.php");
                   $sql = "select * from 开放性类型 ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["序号1"];?></td>
                   <td><a href=""><?php echo $row["名称1"];?></a></td>
                   
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="dq">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar3" class="btn-group">
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>
    						</button>
    						
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button>
    						    						    						
    				 <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown">
     			数值
     				 <span class="caret"></span>
 						  </button>				
    						    						
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th >序号</th>
    								
								
    								<th>名称</th>
    					      </thead>
    						<tbody>
    						  <?php
                   require("../conn.php");
                   $sql = "select * from 开放性类型 ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["序号2"];?></td>
                   <td><a href=""><?php echo $row["名称2"];?></a></td>
                   
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
						<div role="tabpanel" class="tab-pane fade" id="xm">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar4" class="btn-group">
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>
    						</button>
    						
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button>
    						    						    						
    					<button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown">
     			数值
     				 <span class="caret"></span>
 						  </button>		    				
    						    						
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th >序号</th>
    								
								
    								<th>名称</th>
    					      </thead>
    						<tbody>
    						   <?php
                   require("../conn.php");
                   $sql = "select * from 开放性类型 ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["序号3"];?></td>
                   <td><a href=""><?php echo $row["名称3"];?></a></td>
                   
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
									<div role="tabpanel" class="tab-pane fade" id="jg">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar5" class="btn-group">
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>
    						</button>
    						
    						<button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button>
    						    						    						
    						<button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown">
     			数值
     				 <span class="caret"></span>
 						  </button>	    				
    						    						
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th >序号</th>
    								
								
    								<th>细类</th>
    								<th>名称</th>
    					      </thead>
    						<tbody>
    							   <?php
                   require("../conn.php");
                   $sql = "select * from 开放性类型 ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["序号4"];?></td>
                   <td><?php echo $row["细类"];?></td>
                   <td><a href=""><?php echo $row["名称4"];?></a></td>
                   
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
		</div>
	</div>
	
</div> 	
     
    		
    		</div><!-- 内容区域 -->
    	</div>
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
   
    <script src="../js/ProjectPlus/aqxc.js"></script>
    <script type="text/javascript">
    
     $(document).ready(function() {
    	$("footer").load("../footer.html");
   		;
    });
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

  </body>
</html>

