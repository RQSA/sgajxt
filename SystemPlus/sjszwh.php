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
		<link rel="stylesheet" type="text/css" href="../css/docs.css" />
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
						<li>
							<a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a>
						</li>
						<li>
							<a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a>
						</li>
						<li class="active">
							<a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a>
						</li>
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
										<li>
											<a href="gcxx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">工程信息维护</a>
										</li>
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
												<li>
													<a href="bianhao.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">整改通知书编号维护</a>
												</li>
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
														<li>
															<a href="yhgl.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">用户管理维护</a>
														</li>
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
																<li>
																	<a href="wzsj.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">违章数据库维护</a>
																</li>
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
    							<li class="active"><a href="sjszwh.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">手机设置维护</a></li>
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
				</div>
				<!--左侧导航菜单 -->

				<!-- 内容区域 -->
				<div class="col-md-10">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">手机设置维护</h3>
						</div>
			<ul class="nav nav-tabs" role="tablist">
			     <!--<li role="presentation"><a href="#tqsjsz" role="tab" data-toggle="tab">特权手机设置</a></li>-->
			     <li role="presentation"><a href="#djsjqx" role="tab" data-toggle="tab">冻结手机权限</a></li>
			     <li role="presentation"><a href="#pldrxm" role="tab" data-toggle="tab">手机批量导入项目</a></li>
			      <li role="presentation"><a href="#zwbg" role="tab" data-toggle="tab">职位变更</a></li>
		    </ul>	
		    <div class="tab-content">
						<div role="tabpanel" class="tab-pane fade" id="tqsjsz">
							<!--内容-->
							<div class="panel-body">
							<p></p>
							<div class="jumbotron btn-group-lg">
								<form id="xmdjform" action="dateajax.php" method="post" enctype="multipart/form-data" class="form-inline" role="form">
									<div class="form-group col-md-6">
										<input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal" value="特权手机添加">
									</div>
									<div class="form-group  col-md-6">
										<input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal1" value="特权手机删除">
									</div>
								</form>
							</div>
							<p></p>
						</div>
					</div>
					<!-- 内容区域 -->
					<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">特权手机添加</h4>
								</div>
								<form id="addP" name="addP" action="tqsjszbc.php"  method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="addnum" class=" control-label">特权手机号码：</label>
											<div>
												<input type="text" class="form-control" id="addnum" name="addnum"  placeholder="请输入需要添加的特权手机号码">
											</div>
										</div>
										<div class="form-group ">
											<label for="raddnum" class=" control-label">确认特权手机号码：</label>
											<div>
												<input type="text" class="form-control" id="raddnum" name="raddnum" placeholder="再次确认需要添加特权手机的号码">
													<input type="text" class="form-control hidden" id="num1" name="num" value="1" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save1" name="save1" type="button" class="btn btn-primary">
												添加
											</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!--第二个模态框-->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">特权手机删除</h4>
								</div>
								<form id="delP" name="delP" action="tqsjszbc.php" method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="delnum" class=" control-label">特权手机号码：</label>
											<div class="">
												<input type="text" class="form-control" id="delnum" name="delnum" placeholder="请输入需要删除的特权手机号码">
											</div>
										</div>
										<div class="form-group ">
											<label for="rdelnum" class=" control-label">确认特权手机号码：</label>
											<div class="">
												<input type="text" class="form-control" id="rdelnum" name="rdelnum" placeholder="再次确认需要删除的特权手机号码">
												<input type="text" class="form-control hidden" id="num2" name="num" value="2" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save2" type="button" class="btn btn-primary">
												删除
											</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!--手机冻结↓-->
					<div role="tabpanel" class="tab-pane fade in active  " id="djsjqx">
							<!--内容-->
							<div class="panel-body">
							<p></p>
							<div class="jumbotron btn-group-lg">
								<form   action="dateajax.php" method="post" enctype="multipart/form-data" class="form-inline" role="form">
									<div class="form-group col-md-6">
										<input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal2" value="冻结手机">
									</div>
									<div class="form-group  col-md-6">
										<input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal3" value="解除冻结">
									</div>
								</form>
							</div>
							<p></p>
						</div>
					</div>
					<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">冻结手机权限</h4>
								</div>
								<form id="djsj" name="djsj" action="tqsjszbc.php"  method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="adddj" class=" control-label">冻结手机号码：</label>
											<div>
												<input type="text" class="form-control" id="adddj" name="adddj"  placeholder="请输入需要冻结的手机号码">
											</div>
										</div>
										<div class="form-group ">
											<label for="raddnum" class=" control-label">确认冻结手机号码：</label>
											<div>
												<input type="text" class="form-control" id="radddj" name="radddj" placeholder="再次确认需要冻结的手机号码">
													<input type="text" class="form-control hidden" id="num3" name="num" value="3" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save3" name="save3" type="button" class="btn btn-primary">
												添加
											</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!--第二个模态框-->
					<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">解除手机冻结</h4>
								</div>
								<form id="jcdjsj" name="jcdjsj" action="tqsjszbc.php" method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="jcdj" class=" control-label">解除冻结手机号码：</label>
											<div class="">
												<input type="text" class="form-control" id="jcdj" name="jcdj" placeholder="请输入需要解除的冻结手机号码">
											</div>
										</div>
										<div class="form-group ">
											<label for="rjcdj" class=" control-label">确认解除冻结的手机号码：</label>
											<div class="">
												<input type="text" class="form-control" id="rjcdj" name="rjcdj" placeholder="再次确认需要解除的冻结手机号码">
												<input type="text" class="form-control hidden" id="num4" name="num" value="4" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save4" type="button" class="btn btn-primary">
												解除
										</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<!--批量手机项目导入↓-->
					<div role="tabpanel" class="tab-pane fade  " id="pldrxm">
							<!--内容-->
							<div class="panel-body">
								<div id="toolbar1" class="btn-group">
<input type="button" id="plbd" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal5" value="绑定">
			    					<button id="cancel" type="button" class="btn btn-default" data-toggle="modal" ><i class="glyphicon "> 注销 </i>		
			    					</button>
    							</div>
							<table id="table_gclb">
								<thead>
									<tr>
										<th data-sortable="true" data-field="ID">ID</th>
										<th data-sortable="true" data-field="工程名称">工程名称</th>
										<th data-field="项目类别">项目类别</th>
										<th data-field="形象进度">形象进度</th>
										<th data-field="操作">操作</th>
									</tr>
								</thead>
							<tbody>
				<?php
                   require("../conn.php");
                   $sql = "select * from 我的工程  ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {				
                   ?>
                   <tr >
                   <td><?php echo $row["id"];?></td>
                   <td><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"]; ?>"><?php echo $row["工程名称"];?></a></td>
                   <td><?php echo $row["项目类别"];?></td>
                   <td><?php echo $row["形象进度"];?></td>
                   <td>
                   	 	<button id="<?php echo $row["时间戳"];?>" onclick="join(this.id)" type="button" class="btn  btn-primary">
                   	 		加入
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
					 <!--绑定内容框↑-->	
					<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										手机批量导入项目绑定
									</h4>
								</div>
								<div class="modal-body">
							<div class="row ">
								<label for="account" class="col-sm-2 control-label">姓名：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="xm" name="xm" placeholder="">							
								</div>
									<label for="password" class="col-sm-2 control-label">联系方式：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="lxfs" name="lxfs" placeholder="">
								</div>
							</div>
							<div class="row">
								<label for="name" class="col-sm-2 control-label">岗位：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="gangwei" name="gangwei" placeholder="" >
								</div>
								<label for="wzzt" class="col-sm-2 control-label">部门：</label>
								<div class="col-sm-3">
									<select id="bumen" name="bumen" class="form-control">
										<option>总公司</option>
										<option>分公司</option>
										<option>项目部</option>
									</select>
								</div>
							</div>
							<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<button id="save5" type="button"  class="btn btn-primary "  data-dismiss="">
												绑定
											</button>
							</div>
		        				</div>
							</div>

						</div>
					</div>
					<!--模态框↑-->
					
					<!--职位变更↓-->
					<div role="tabpanel" class="tab-pane fade  " id="zwbg">
							<!--内容-->
							<div class="panel-body">
							<p></p>
							<div class="jumbotron btn-group-lg">
								<form   action="dateajax.php" method="post" enctype="multipart/form-data" class="form-inline" role="form">
									<div class="form-group col-md-6">
										<input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal6" value="职位变更">
									</div>
								</form>
							</div>
							<p></p>
						</div>
					</div>
					<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">职位变更</h4>
								</div>
								<form id="zwbghm" name="zwbghm" action="tqsjszbc.php"  method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="bgnum" class=" control-label">职位变更人号码：</label>
											<div>
												<input type="text" class="form-control" id="bgnum" name="bgnum"  placeholder="请输入职位变更人号码">
											</div>
										</div>
										<div class="form-group ">
											<label for="rbgnum" class=" control-label">确认职位变更人号码：</label>
											<div>
												<input type="text" class="form-control" id="rbgnum" name="rbgnum" placeholder="再次确认职位变更人的号码">
													<input type="text" class="form-control hidden" id="num5" name="num" value="5" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save6" name="save6" type="button" class="btn btn-primary">
												确认变更
											</button>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
			<script type="text/javascript">
				$(document).ready(function() {
					$("footer").load("../footer.html");;
				});
				$('table').bootstrapTable({
					striped: true, //会有隔行变色效果
					pagination: true, //表格底部显示分页条
					pageSize: 10, //页面数据条数
					search: true, //搜索框
					showRefresh: true, //刷新按钮
					showToggle: true, //切换试图（table/card）按钮
					showPaginationSwitch: true, //数据条数选择框
					showColumns: true, //内容列下拉框
					toolbar: "#toolbar", //指明自定义的菜单
					showExport: true //导出按钮

				});
				//获取url参数
				//获取url参数值
//				function geturl(name) {
//					var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
//					var r = window.location.search.substr(1).match(reg);
//					if(r != null) return unescape(r[2]);
//					return null;
//				}
//
//				var userId = document.getElementById("userId");
//				var userIdR = document.getElementById("userIdR");
//				(function() {
//					//获取url参数
//					var yhId = geturl("yhid");
//					userId.value = yhId;
//					//userIdR.value=yhId;	
//				}());

			
			</script>

<script type="text/javascript">
			$("#save1").click(function(){
				
				//				alert($('#bdhyform1').serialize())
				var tel=document.getElementById("addnum");
				var rtel=document.getElementById("raddnum");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'tqsjszbc.php',
					data: $('#addP').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("添加成功");
						window.location.reload();
					}
				});
			}
			else{
					alert("号码不同，请确定号码是否一致。");
				}
			});

				
			$("#save2").click(function() {
				//				alert($('#bdhyform1').serialize())
				var tel=document.getElementById("delnum");
				var rtel=document.getElementById("rdelnum");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'tqsjszbc.php',
					data: $('#delP').serialize(), // 你的formid
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
				else{
					alert("号码不同，请确定号码是否一致。");
				}
		});
</script>

<script type="text/javascript">
			$("#save3").click(function(){
			
				var tel=document.getElementById("adddj");
				var rtel=document.getElementById("radddj");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'tqsjszbc.php',
					data: $('#djsj').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("添加冻结成功");
						window.location.reload();
					}
				});
			}
			else{
					alert("号码不同，请确定号码是否一致。");
				}
			});

				
			$("#save4").click(function() {
				//				alert($('#bdhyform1').serialize())
				var tel=document.getElementById("jcdj");
				var rtel=document.getElementById("rjcdj");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'tqsjszbc.php',
					data: $('#jcdjsj').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("解除冻结成功");
						window.location.reload();
					}
				});
				}
				else{
					alert("号码不同，请确定号码是否一致。");
				}
			});
			$("#save5").click(function(){
				var save5 = document.getElementById("save5");
				var xm = document.getElementById("xm");
				var lxfs = document.getElementById("lxfs");
				var gangwei = document.getElementById("gangwei");
				var bumen = document.getElementById("bumen");
				if(xm.value.length<=0){
					alert("请输入姓名");
				}else if(lxfs.value.length<=0){
					alert("请输入联系方式");
				}else if(gangwei.value.length<=0){
					alert("请输入岗位");
				}else if(bumen.value.length<=0){
					alert("请输入部门");
				}else{
					save5.setAttribute("data-dismiss","modal");
					alert("绑定成功");
				}
			});
			function join(id){	
				var xm = document.getElementById("xm");
				var lxfs = document.getElementById("lxfs");
				var gangwei = document.getElementById("gangwei");
				var bumen = document.getElementById("bumen");
				if(xm.value.length<=0){
					alert("请先进行绑定");
				}else if(lxfs.value.length<=0){
					alert("请输入联系方式");
				}else if(gangwei.value.length<=0){
					alert("请输入岗位");
				}else if(bumen.value.length<=0){
					alert("请输入部门");
				}else{
					$.ajax({
	                cache: true,
	                type: "POST",
	                url:'sjbdxm.php',
	                data:{
	                	gcsjc:id,
	                	xm:xm.value,
	                	lxfs:lxfs.value,
	                	gangwei:gangwei.value,
	                	bumen:bumen.value
	                },
	                async: false,
	                error: function(request) {
	                    alert("Connection error");
	                },
	                success: function(data) {
	                    alert("加入成功");
	                }
	           	 }); 
				}
			}
			$("#cancel").click(function(){
			alert("注销成功");
			window.location.reload();
			});
				
</script>
<script type="text/javascript">
	$("#save6").click(function() {
				//				alert($('#bdhyform1').serialize())
				var tel=document.getElementById("bgnum");
				var rtel=document.getElementById("rbgnum");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'tqsjszbc.php',
					data: $('#zwbghm').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("变更成功");
						window.location.reload();
					}
				});
				}
				else{
					alert("号码不同，请确定号码是否一致。");
				}
	});

	
</script>
		

	</body>

</html>