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
          <?php
	   						require("../conn.php");
								$yhid=$_GET["yhid"];
	   						$sql = "select * from 用户信息   where id='$yhid'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
          <a class="navbar-brand" href="../index.php?yhzh=<?php echo $row["账号"];?>">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li class="active"><a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
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
    						<a>数据维护</a>
    						<ul class="nav">
    							  <?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql1 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%工程信息维护%'";
										$result = $conn->query($sql1);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
			   					 	<li><a href="gcxx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">工程信息维护</a></li>
			   					 <?php
										}
									 ?>
    							<?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql2 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%整改通知单编号维护%'";
										$result = $conn->query($sql2);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
											
	   					    ?>
    							<li ><a href="bianhao.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">整改通知书编号维护</a></li>
    							<?php
										}
									 ?>
    							<!--<li><a href="sbcq.html">设备产权单位</a></li>
    							<li><a href="xmjbxx.html">基本信息</a></li>
    							<li><a href="lygs.html">联营公司数据库</a></li>
    							<li><a href="fbgs.html">分包公司数据库</a></li>-->
    							<?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
//										echo $yhid;
			   						$sql3 = "select * from 用户信息   where id='".$yhid."' and 权限 LIKE '%用户管理维护%'";
										$result = $conn->query($sql3);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
    							<li  class="active"><a href="yhgl.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">用户管理维护</a></li>
    							<?php
										}
									 ?>
									 <?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql4 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%违章数据库维护%'";
										$result = $conn->query($sql4);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
										
	   					    ?>
    							<li ><a href="wzsj.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">违章数据库维护</a></li>
    							<?php
										}
									 ?>
									 <?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql5 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%危险源类型维护%'";
										$result = $conn->query($sql5);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
    							<li><a href="wxy.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">危险源类型维护</a></li>
    							<?php
										}
									 ?>
									 <?php
//			   						require("../conn.php");
//										$yhid=$_GET["yhid"];
//			   						$sql6 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%数据库备份与恢复%'";
//										$result = $conn->query($sql6);
//	                  $count=mysqli_num_rows($result);	
//										if ($result->num_rows > 0) {
	   					    ?>
										<!--<li ><a href="sjk.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">数据库备份与恢复</a></li>-->
									<?php
//										}
									 ?>
									 <?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql7 = "select * from 用户信息   where id='".$yhid."' and 权限 LIKE '%手机设置维护%'";
										$result = $conn->query($sql7);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
    							<li ><a href="sjszwh.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">手机设置维护</a></li>
    							<?php
										}
									 ?>
									 <?php
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql7 = "select * from 用户信息   where id='".$yhid."' and 权限 LIKE '%错误数据删除%'";
										$result = $conn->query($sql7);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
    							<li ><a href="cwsjsc.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">错误数据删除</a></li>
    							<?php
										}
									 ?> 
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
	
							<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#pcd" role="tab" data-toggle="tab">PC端</a></li>
			<li role="presentation"><a href="#sjd" role="tab" data-toggle="tab">手机端</a></li>
			<li role="presentation"><a href="#xmb" role="tab" data-toggle="tab">项目部账号</a></li>
			<li role="presentation" class="dropdown"> </li>
   
		</ul>	
							<!-- Tab panes -->
							
		
    <!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="pcd">
				<p></p>
			
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar1" class="btn-group">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal5" >
								<i class="glyphicon glyphicon-plus"> 新建帐号</i>
							</button>
    					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal51">
    							<i class="glyphicon "> 新建部门</i>
    					</button>
    					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal61">
    							<i class="glyphicon ">部门权限分配</i>
    					</button>
    					</div>
    					<table id="table_gclb">
    						<thead>
    							<tr>
    								<th  >序号</th>
    								<th>部门</th>
							      <th>姓名</th>
							      <th>手机</th>
							      <th>邮箱</th>
    								<th>账号</th>
    								<th>密码</th>
    								<th>设备</th>
    								
    								<th>权限管理</th>
    								<th>部门修改</th>
    					      </thead>
    						<tbody>
    							 <?php
                   require("../conn.php");
                   
                   $sql = "select * from  用户信息  where 设备='电脑' ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["id"];?></td>
                   <td><?php echo $row["部门"];?></a></td>
                   <td><?php echo $row["姓名"];?></a></td>
                   <td><?php echo $row["手机"];?></a></td>
                   <td><?php echo $row["邮箱"];?></a></td>
                   <td><?php echo $row["账号"];?></a></td>
                   <td><?php echo $row["密码"];?></a></td>
                   <td><?php echo $row["设备"];?></a></td>
                   
                   <td>
                   		<a href="#">
                   			<button id="<?php echo $row["id"];?>" name="<?php echo $row["部门"];?>||<?php echo $row["权限"];?>" onclick="dianji(this.id);cbm(this.name);" type="button" data-toggle="modal" data-target="#myModal6"  class="btn btn-default">
                   				权限分配
                   			</button>
                   			
                   			<!--<button id="11" type="button" onclick="dianji(this.id)" class="btn btn-default">权限分配</button>-->
                   			<!--<input type="button" value="权限分配" class="btn" onclick="dianji(<?php echo $row["id"];?>);"  data-toggle="modal" data-target="#myModal6"/>-->
                   		</a> 
                   		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
                   		
									 </td>
									 <td>
										<a href="bmxg.php?id=<?php echo $row["id"];?>yhid="><button type="button"   class="btn btn-default">
                   				修改
                   	</button></a>
                   	</td>
                   
           	<?php
						}
						$conn->close();
																	
					?>        
          
								      
    						</tbody>
    					</table>
    				</div>
				
			</div>
			
		
		
				
				
		<!-- 模态框（Modal） -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<!--<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post">-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										账号新建填写
									</h4>
								</div>
								<div class="modal-body">
						<form id="yhglform" name="yhglform" action="yhglbc.php" method="post" class="form-horizontal" role="form" >
							<div class="form-group ">
								<label for="account" class="col-sm-2 control-label">账号：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="account" name="account" placeholder="">							
								</div>
									<label for="password" class="col-sm-2 control-label">密码：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="password" name="password" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">姓名：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="name" name="name" placeholder="" >
								</div>
								<!--<label for="dept" class="col-sm-2 control-label">部门：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="dept" name="dept" placeholder="123456" >
								</div>-->
								<label for="wzzt" class="col-sm-2 control-label">部门：</label>
								<div class="col-sm-3">
									<select id="dept" name="dept" class="form-control">
										<?php
			                   require("../conn.php");
			                   $sql = "select * from 公司部门  ";
			                   $result = $conn->query($sql);
			                   while($row = $result->fetch_assoc()) {    					
			               ?>
										<option><?php echo $row["部门"];?></option>
										 <?php
											}
											$conn->close();	
										 ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="email" name="email" placeholder="">
								</div>
								
								<label for="call" class="col-sm-2 control-label">手机：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="call" name="call" placeholder="">
								</div>
							
								<div class="col-sm-3">
									<input type="text" class="form-control hidden " id="sb" name="sb" placeholder="" value="电脑" >
								</div>
							</div>
				
							<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<button id="save13" type="button" onclick="window.location.reload()" class="btn btn-primary ">
												提交保存
											</button>
											<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
							</div>
						</form>
					
		        </div>
							</div><!-- /.modal-content -->
					<!--	</form>-->
						</div><!-- /.modal -->
					</div>
				<!-- 模态框（Modal） -->
			<div class="modal fade" id="myModal51" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										新建部门
									</h4>
								</div>
								<div class="modal-body">
						<form id="bmglform" name="bmglform"  method="post" class="form-horizontal" role="form" >
							<div class="form-group ">
								<label for="dept" class="col-sm-2 control-label">部门：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" style="width: 400px;" id="bmfp" name="bmfp" placeholder="总公司或者分公司" >
								</div>
							</div>
							<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<button id="save131" type="button" onclick="window.location.reload()" class="btn btn-primary ">
												提交保存
											</button>
							</div>
						</form>
						<from>
						<table class="table table-bordered">
							<caption>部门删除</caption>
							<thead>
								<tr>
								<th>部门</th>
								<th>操作</th>
								</tr>
							</thead>
							<tbody>
									<?php
                   require("../conn.php");
                   $sql = "select * from  公司部门";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {     					
                   ?>
								<tr>
								<td>
									<?php  echo $row["部门"] ?>
								</td>	
								<td>
										<button id="<?php echo $row["id"];?>" onclick="dianji3(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
								</td>	
								</tr>
								 <?php
													}
													$conn->close();	
												 ?>
							</tbody>
						</table>
		       </div>
							</div>
						</div>
					</div>
				
				<!-- 模态框（Modal） -->
			<!--<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
			<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<!--<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post">-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">
								权限分配
							</h4>
						</div>
						<div class="modal-body">
							<form id="yhglform1" name="yhglform1"  method="post" class="form-horizontal" role="form" >
								<table class="table table-bordered">
								  <caption>
								  <!--	权限选择-->
								  	<label for="ssbm" class="col-sm-2 control-label">部门：</label>
								  	<div class="col-sm-4">
								  	<input name="ssbm" type="text" class=" form-control" id="ssbm" value="部门" />
								  	</div>
								  	<!--<label for="qxxs1" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs1" type="text" class=" form-control" id="qxxs1" value="权限" />
								  	</div>
								  	<label for="qxxs2" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs2" type="text" class="form-control" id="qxxs2" value="权限" />
								  	</div>
								  	<label for="qxxs3" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs3" type="text" class="form-control" id="qxxs3" value="权限" />
								  	</div>
								  	<label for="qxxs4" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs4" type="text" class="form-control" id="qxxs4" value="权限" />
								  	</div>
								  	<label for="qxxs5" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs5" type="text" class="form-control" id="qxxs5" value="权限" />
								  	</div>
								  	<label for="qxxs6" class="col-sm-2 control-label">权限：</label>
								  	<div class="col-sm-4">
								  	<input name="qxxs6" type="text" class="form-control" id="qxxs6" value="权限" />
								  	</div>		-->
								  </caption>
									  <thead>
									    <tr>
									      <th>选择</th>
									      <th>分配权限项目</th>
									        <input name="chuanzhi" type="text" class="hidden" id="chuanzhi" value="分配权限项目" />
										      <input name="qxbc" class="hidden" type="text" id="qxbc" value="权限" />
									    </tr>
									  </thead>
									  <tbody id="grqxxs">
									    <tr>
									      <td><input name="checkbox" class="" type="checkbox" id="xmgl" value="工程信息维护"></td>
									      <td>工程信息维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="sbgl" value="整改通知单编号维护"></td>
									      <td>整改通知单编号维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="wxygl" value="用户管理维护"></td>
									      <td>用户管理维护</td>
									    </tr>
									     <tr>
									      <td><input name="checkbox" type="checkbox" id="sbgl" value="违章数据库维护"></td>
									      <td>违章数据库维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="wxygl" value="危险源类型维护"></td>
									      <td>危险源类型维护</td>
									    </tr>
									     <tr>
									      <td><input name="checkbox" type="checkbox" id="wxygl" value="数据库备份与恢复"></td>
									      <td>数据库备份与恢复</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="tqsjsz" value="手机设置维护"></td>
									      <td>手机设置维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="cwsjsc" value="错误数据删除"></td>
									      <td>错误数据删除</td>
									    </tr>
									  </tbody>
								</table>
								<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<!--<button id="save14" type="button" onclick="window.location.reload()" class="btn btn-primary ">-->
											<button id="save14" type="button" onclick="save()" class="btn btn-primary ">
												提交保存
											</button>
											<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
							</div>
						</form>
								</div>
							</div><!-- /.modal-content -->
					<!--	</form>-->
						</div><!-- /.modal -->
					</div><!--模态框-->
					<!-- 模态框（Modal） -->
			<!--<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
			<div class="modal fade" id="myModal61" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<!--<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post">-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">
								部门权限分配
							</h4>
						</div>
						<div class="modal-body">
							<form id="bmqxform1" name="bmqxform1"  method="post" class="form-horizontal" role="form" >
								<table class="table table-bordered">
								  <caption>权限选择</caption>
								  <label for="wzzt" class="col-sm-2 control-label">部门：</label>
										<div class="col-sm-3">
											<!--<select id="dept1" name="dept1" class="form-control" onchange="gradeChange()">-->
											<select id="dept1" name="dept1" class="form-control">
												<option grade="" value="" selected="selected"></option>
												<?php
					                   require("../conn.php");
					                   $sql = "select * from 公司部门  ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					               ?>
												<option grade="<?php echo $row["部门"];?>" value="<?php echo $row["部门"];?>"><?php echo $row["部门"];?></option>
												 <?php
													}
													$conn->close();	
												 ?>
											</select>
										</div>
									  <thead>
									    <tr>
									      <th>选择</th>
									      <th>分配权限项目</th>
									      <input name="qxbc11" class="hidden" type="text" id="qxbc11" value="权限" />
									    </tr>
									  </thead>
									  <tbody id="quxnain1">
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="gcxxwh" value="工程信息维护"></td>
									      <td>工程信息维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="zgtzdbhwh" value="整改通知单编号维护"></td>
									      <td>整改通知单编号维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="yhglwh" value="用户管理维护"></td>
									      <td>用户管理维护</td>
									    </tr>
									     <tr>
									      <td><input name="checkbox" type="checkbox" id="wzsjkwh" value="违章数据库维护"></td>
									      <td>违章数据库维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="wxylxwh" value="危险源类型维护"></td>
									      <td>危险源类型维护</td>
									    </tr>
									     <tr>
									      <td><input name="checkbox" type="checkbox" id="sjkbfyhf" value="数据库备份与恢复"></td>
									      <td>数据库备份与恢复</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="sjszwhh" value="手机设置维护"></td>
									      <td>手机设置维护</td>
									    </tr>
									    <tr>
									      <td><input name="checkbox" type="checkbox" id="cwsjsch" value="错误数据删除"></td>
									      <td>错误数据删除</td>
									    </tr>
									  </tbody>
								</table>
								<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<!--<button id="save14" type="button" onclick="window.location.reload()" class="btn btn-primary ">-->
											<button id="save21" type="button" onclick="save1()" class="btn btn-primary ">
												提交保存
											</button>
											<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
							</div>
						</form>
								</div>
							</div><!-- /.modal-content -->
					<!--	</form>-->
						</div><!-- /.modal -->
					</div>
					
					
					<!-- 手机端 -->
		<div role="tabpanel" class="tab-pane " id="sjd">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    					<table id="table_gclb1">
    						<thead>
    							<tr>
    								<th>序号</th>
    								<th>部门</th>
							      <th>姓名</th>
							      <th>手机</th>
							      <th>邮箱</th>
    								<th>账号</th>
    								<th>密码</th>
    								<th>设备</th>
    								<th>操作</th>
    					      </thead>
    						<tbody>
    							 <?php
                   require("../conn.php");
                   $sql = "select * from  用户信息 where 设备='手机'";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["id"];?></td>
                   <td><?php echo $row["部门"];?></a></td>
                   <td><?php echo $row["姓名"];?></a></td>
                   <td><?php echo $row["手机"];?></a></td>
                   <td><?php echo $row["邮箱"];?></a></td>
                   <td><?php echo $row["账号"];?></a></td>
                   <td><?php echo $row["密码"];?></a></td>
                   <td><?php echo $row["设备"];?></a></td>
                  <!-- <td><a class="delete" dataTel="<?php echo $row["手机"];?>">删除</a></td>-->
                   <td><button id="<?php echo $row["手机"];?>" onclick="deleteAppaccount(this.id);" type="button" class="btn btn-default">删除</button></td>
                   <!--<td>
                   		<a href="#">
                   			<?php if($row["审核"]){
                   			?>
                   			<?php 
							  echo "已审核";
							}
							else{
							?>
							<button id="<?php echo $row["id"];?>" name="1" onclick="dianji1(this.id)" type="button" class="btn btn-default" >
                   				审核
                   			</button>
							<?php } ?>
                   			
                   		
                   		</a> 
									 </td>-->
                   
                   
                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
				<!-- 手机端 -->
				<!-- 项目部账号 -->
		<div role="tabpanel" class="tab-pane " id="xmb">
				<p></p>
				<form class="form-horizontal" role="form">
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar1" class="btn-group">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal10" >
								<i class="glyphicon glyphicon-plus"> 新建帐号</i>
							</button>
    					</button>
    					</div>
    					<table id="table_gclb3">
    						<thead>
    							<tr>
    								<th>序号</th>
    								<th>账号</th>
							      <th>密码</th>
							      <th>部门</th>
    								<th>操作</th>
    					      </thead>
    						<tbody>
    							 <?php
                   require("../conn.php");
                   $sql = "select * from  项目部打印账号  ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   <tr class="">
                   <td><?php echo $row["id"];?></td>
                   <td><?php echo $row["账号"];?></a></td>
                   <td><?php echo $row["密码"];?></a></td>
                   <td><?php echo $row["所属公司"];?></a></td>
                   <td><button id="<?php echo $row["id"];?>" onclick="dianji4(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button></td>

                   <?php
						}
						$conn->close();
																	
					?>
								      
    						</tbody>
    					</table>
    				</div>
				</form>
			</div>
			
				<!-- 项目部账号 -->
				
			<!--模态框-->
			<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">项目部账号添加</h4>
								</div>
								<form id="xmbdy" name="xmbdy" action="xmbdy.php"  method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="xmbname" class=" control-label">项目部账号：</label>
											<div>
												<input type="text" class="form-control" id="xmbname" name="xmbname"  placeholder="项目部账号">
											</div>
										</div>
										<div class="form-group ">
											<label for="xmbpas" class=" control-label">项目部密码：</label>
											<div>
												<input type="text" class="form-control" id="xmbpas" name="xmbpas" placeholder="项目部密码">
												<input type="text" class="form-control hidden" id="numm" name="numm" value="1" >
											
											</div>
										</div>
										<div class="form-group ">
											<label for="xmbbm" class=" control-label">部门：</label>
											<select id="xmbbm" name="xmbbm" class="form-control">
												<option grade="" value="" selected="selected"></option>
												<?php
					                   require("../conn.php");
					                   $sql = "select * from 公司部门  ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					               ?>
												<option grade="<?php echo $row["部门"];?>" value="<?php echo $row["部门"];?>"><?php echo $row["部门"];?></option>
												 <?php
													}
													$conn->close();	
												 ?>
											</select>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save30" name="save30" type="button" class="btn btn-primary">
												添加
											</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!--模态框-->
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
    $('#table_gclb').bootstrapTable({		
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
	  
	    $('#table_gclb2').bootstrapTable({		
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
	  
	  
	  $('#table_gclb1').bootstrapTable({		
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
	  
	  $('#table_gclb3').bootstrapTable({		
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
			$("#save13").click(function(){ 
					$.ajax({
	                cache: true,
	                type: "POST",
	                url:'yhglbc.php',
	                data:$('#yhglform').serialize(),// 你的formid
	                async: false,
	                error: function(request) {
	                    alert("Connection error");
	                },
	                success: function(data) {
	                    alert("保存成功");
	                }
			            });
			});  
			function dianji(id){
//				alert(id);
				var chuanzhi=document.getElementById("chuanzhi");
				chuanzhi.value=id;					
			};
			var creatDom1=function(){
				//alert("测试");
				var grqxxs=document.getElementById("grqxxs");
				grqxxs.innerHTML='<tr><td><input name="checkbox" class="" type="checkbox" id="xmgl" value="工程信息维护"></td><td>工程信息维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="sbgl" value="整改通知单编号维护"></td><td>整改通知单编号维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="wxygl" value="用户管理维护"></td><td>用户管理维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="sbgl" value="违章数据库维护"></td><td>违章数据库维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="wxygl" value="危险源类型维护"></td><td>危险源类型维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="wxygl" value="数据库备份与恢复"></td><td>数据库备份与恢复</td></tr><tr><td><input name="checkbox" type="checkbox" id="sjszwh" value="手机设置维护"></td><td>手机设置维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="cwsjsc" value="错误数据删除"></td><td>错误数据删除</td></tr>';
			};
//			var suoding11=function(quanxian,num){
//						var grqxxs=document.getElementById("grqxxs");
//						var quxnain1Shuzu=grqxxs.getElementsByTagName("input");
//						quxnain1Shuzu[num].setAttribute("checked","checked");
//					};
					//此函数是onchange属性触发
			var suoding12=function(quanxian1,num){
//						alert (quanxian1);
						var strIng1=new Array();
							strIng1=quanxian1.split(",");
							var num1=strIng1[1];
//						alert(num1);
//						var number11=num1+1;
						var grqxxs=document.getElementById("grqxxs");
						var quxnain11Shuzu=grqxxs.getElementsByTagName("input");
						//alert(quxnain11Shuzu.length);
						quxnain11Shuzu[num1].setAttribute("checked","checked");
					};
			function cbm(bm){
//				alert(bm);
				var grqxxs=document.getElementById("grqxxs");
				//将之的DOM节点删除
				grqxxs.innerHTML="";
				//重新创建没有check
				creatDom1();
					var strs= new Array();
					strs=bm.split("||"); //字符分割
					for(var i=1;i<strs.length-1;i++){
//							alert(strs[i]);
							suoding12(strs[i],i);
						}
						
//							alert(strs.length);
					
					var ssbm1=document.getElementById("ssbm");
					ssbm1.value=strs[0];
			};
			//点击提交按钮
			function save(){
				var check=document.getElementsByName("checkbox");
				var s = "";
 				var xixi = ' ';//初始化部位
 				var hehe = '';
				for(var i=0;i<check.length;i++){
   				if(check[i].checked){
   					s+=check[i].value+','+i+'||'; //如果未选中，将value添加到变量s中
							
   				} 
   				else{
   								
   				}
   			}
   			if(s==''){    							
   				alert("请选择权限");    					
   			}else{    			
   				var qxbc=document.getElementById("qxbc");
					qxbc.value=s;	
//					alert (qxbc.value);			    						
// 				alert(s);	
   			}
   			 
			};
    </script>
    <script type="text/javascript">
		    $("#save14").click(function(){ 
				   var chuanzhi=document.getElementById("chuanzhi").value;
				   var qxbc=document.getElementById("qxbc").value;
							$.ajax({
					                cache: true,
					                type: "POST",
					                url:'qxgl.php',
					                data:$('#yhglform1').serialize(),// 你的formid
//					                data:{
//					                	ryid:chuanzhi,
//					                	qxbc:qxbc
//					                }
					                async: false,
					                error: function(request) {
					                    alert("Connection error");
					                },
					                success: function(data) {
					                    alert("保存成功");
//					                    alert(s);
//					                    alert(qxbc);
					                }
					            });
					}); 
    </script>
    
    <script type="text/javascript">
    function dianji2(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'bmsc.php',
				                data:{
				                	gcid1:id
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
				                    window.location.reload();
				                }
				            }); 
						};		
						
						//删除APP注册的账号
						function deleteAppaccount(mobile){
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'bmsc1.php',
				                data:{
				                	mobile:mobile,
				                	flag:"appAccountDelete"
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
				                    window.location.reload();
				                }
				            });
						}
						
						
						function dianji3(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'bmsc1.php',
				                data:{
				                	gcid1:id,
				                	flag:"bumenDelete"
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
				                    window.location.reload();
				                }
				            }); 
						};		
						
						
     </script>
     
    <script type="text/javascript">
			function save1(){
//				var quxnain1=document.getElementById("quxnain1");
//				var quxnain1Input=document.getElementsByTagName("input");
				var check=document.getElementsByName("checkbox");  //这个获取的是这个界面中含有check属性的input
				var s = "";
 				var xixi = ' ';//初始化部位
 				var hehe = '';
				for(var i=0;i<check.length;i++){
   				if(check[i].checked){
   					s+=check[i].value+','+i+'||'; //如果未选中，将value添加到变量s中
							
   				} 
   				else{
   								
   				}
   			}
   			if(s==''){    							
   				alert("请选择权限");    					
   			}else{    			
   				var qxbc=document.getElementById("qxbc11");
					qxbc11.value=s;	
//					alert (qxbc.value);			    						
// 				alert(s);	
   			}
   			 
			};
    </script>
    <script type="text/javascript">
		    $("#save21").click(function(){ 
				   var qxbc11=document.getElementById("qxbc11").value;
							$.ajax({
					                cache: true,
					                type: "POST",
					                url:'bmqxfp.php',
					                data:$('#bmqxform1').serialize(),// 你的formid
					                async: false,
					                error: function(request) {
					                    alert("Connection error");
					                },
					                success: function(data) {
					                    alert("保存成功");
//					                    alert(s);
//					                    alert(qxbc);
					                }
					            });
					}); 
    </script>
    <script type="text/javascript">
//  	function gradeChange(){
////  		var objS = document.getElementById("dept1");
////      var grade = objS.options[objS.selectedIndex].grade;
//      var objS11 = document.getElementById("dept1").value;
//
//  	};
//部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示部门权限显示
			var creatDom=function(){
				//alert("测试");
				var quxnain1=document.getElementById("quxnain1");
				quxnain1.innerHTML='<tr><td><input name="checkbox" type="checkbox" id="gcxxwh" value="工程信息维护"></td><td>工程信息维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="zgtzdbhwh" value="整改通知单编号维护"></td><td>整改通知单编号维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="yhglwh" value="用户管理维护"></td><td>用户管理维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="wzsjkwh" value="违章数据库维护"></td><td>违章数据库维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="wxylxwh" value="危险源类型维护"></td><td>危险源类型维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="sjkbfyhf" value="数据库备份与恢复"></td><td>数据库备份与恢复</td></tr><tr><td><input name="checkbox" type="checkbox" id="sjszwhh" value="手机设置维护"></td><td>手机设置维护</td></tr><tr><td><input name="checkbox" type="checkbox" id="cwsjsch" value="错误数据删除"></td><td>错误数据删除</td></tr>';
			};
	
			var dept1=document.getElementById("dept1");
			dept1.addEventListener('change',function getData(){
				//alert(dept1.value);
				var quxnain1=document.getElementById("quxnain1");
				quxnain1.innerHTML="";
				creatDom();
				$.ajax({
						 url:'bmqxdq.php',
						data:{
							dept1:dept1.value
						},
						dataType:'json',
						type:'post',
						timeout:10000,
						success:function(data){
							//alert(data);
							var length=data.length;
							for (var i=0;i<length-1;i++) {
								var quanxian=data[i].权限;
							fenge(quanxian);
							}
						},
						error:function(xhr,type,errorThrown){
							//异常处理；
							//alert('ajax错误'+type);
							return callback('ajax错误'+type+errorThrown);
						}
					});
					
					var fenge=function(quanxian){
						var strs=new Array();
						strs=quanxian.split("||");
						for(var i=0;i<strs.length-1;i++){
							//alert();
							
								suoding(strs[i],i);
						}
					};
					
					var suoding=function(quanxian,num){
						
						var strIng=new Array();
							strIng=quanxian.split(",");
							var num1=strIng[1];
						//alert(num1);
						var number1=num1-6;
						var quxnain1=document.getElementById("quxnain1");
						var quxnain1Shuzu=quxnain1.getElementsByTagName("input");
						quxnain1Shuzu[number1].setAttribute("checked","checked");
					};
			});

    </script>	   

    <script type="text/javascript">
    	$("#save131").click(function(){ 
					$.ajax({
	                cache: true,
	                type: "POST",
	                url:'bmglbc.php',
	                data:$('#bmglform').serialize(),// 你的formid
	                async: false,
	                error: function(request) {
	                    alert("Connection error");
	                },
	                success: function(data) {
	                    alert("保存成功");
	                }
			            });
			}); 
		function dianji1(sbid11){
					$.ajax({
			        	url:'sjyhsh.php',
			        	type:'post',
			        	dataType:'json',
			        	data:{
			        		sbid11:sbid11
			        	},
			        	success:function(data){
			        		if (data.result=='success') {
//			        			window.location.reload();
							alert ('审核成功');
			            }
			         },
			         error:function(xhr,type,errorThrown){
			         	alert('ajax错误'+type);
			         }
            });
		};			
		 </script>	 
		 
		 <script type="text/javascript">
			function dianji4(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'xmbdy.php',
				                data:{
				                	gcid1:id
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("删除成功");
				                    window.location.reload();
				                }
				            }); 
						};		

				
			$("#save30").click(function() {
				//				alert($('#bdhyform1').serialize())

					$.ajax({
					cache: true,
					type: "POST",
					url: 'xmbdy.php',
					data: $('#xmbdy').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("添加成功");
						window.location.reload();
					}
				});
		});
</script>
		 
  </body>
</html>

