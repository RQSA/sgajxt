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
    							<li class="active"><a href="cwsjsc.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">错误数据删除</a></li>
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
							<h3 class="panel-title">错误数据删除</h3>
						</div>
						<div>
							<!--内容-->
							<p></p>
							<div class="jumbotron btn-group-lg">
								<form id="xmdjform" action="dateajax.php" method="post" enctype="multipart/form-data" class="form-inline" role="form">
									<div class="form-group col-md-6">
										<input type="button" id="" class="btn btn-primary col-sm-offset-4" name="recover" data-toggle="modal" data-target="#myModal" value="错误通知单删除">
									</div>
									<div class="form-group  col-md-6">
										<input type="button" id="" class="btn btn-primary col-sm-offset-4 disabled" name="recover" data-toggle="modal" data-target="" value="预留待加功能">
									</div>
									<!--<input type="submit" id="saveSave" onclick="" class="btn btn-primary col-sm-offset-4" name="submit" value="数据库还原">
										<input type="submit" id="saveSave" onclick="" class="btn btn-primary col-sm-offset-6" name="submit" value="数据库备份">-->
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
									<h4 class="modal-title" id="myModalLabel">错误通知单删除</h4>
								</div>
								<form id="cwtzd" name="cwtzd" action="cwsjscbc.php"  method="post" enctype="multipart/form-data" role="form">
									<div class="modal-body">

										<div class="form-group ">
											<label for="cwtzdnum" class=" control-label">通知单编号：(一旦删除无法再恢复，请慎用！)</label>
											<div>
												<input type="text" class="form-control" id="cwtzdnum" name="cwtzdnum"  placeholder="请输入需要删除的通知单编号">
											</div>
										</div>
										<div class="form-group ">
											<label for="rcwtzdnum" class=" control-label">确认通知单编号：</label>
											<div>
												<input type="text" class="form-control" id="rcwtzdnum" name="rcwtzdnum" placeholder="再次确认需要删除的通知单编号">
												<input type="text" class="form-control hidden" id="num1" name="num" value="1" >
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
										<button id="save1" name="save1" type="button" class="btn btn-primary">
												删除
											</button>
									</div>
								</form>

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
				var tel=document.getElementById("cwtzdnum");
				var rtel=document.getElementById("rcwtzdnum");
				if(tel.value==rtel.value){
					$.ajax({
					cache: true,
					type: "POST",
					url: 'cwsjscbc.php',
					data: $('#cwtzd').serialize(), // 你的formid
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
					alert("输入的通知单编号不一致不同，请检查。");
				}
			});

				
			
</script>
		

	</body>

</html>