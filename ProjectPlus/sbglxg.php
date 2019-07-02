<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
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
            <li class="active"><a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
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
    		<?php
//										echo $_GET["id"];
										  $id=$_GET["id"];
										  require("../conn.php");
											$sql = "select * from 我的工程 where id='$id' ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
                         					
                     ?>
    		<!--左侧导航菜单 -->
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li  class="active" ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">隐患通知单</a></li>
									<li ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    										<?php
													}
													$conn->close();		
												?>
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			<?php
					$id=$_GET["id"];
					require("../conn.php");
					$sql = "select * from 设备管理 where id='$id' ";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
		                         					
                ?>
    		
<div  class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $row["工程名称"];?>-<?php echo $row["设备状态"];?>-修改</h3>
	</div>
	
		<div class="tab-content">
	
			 <div role="tabpanel" class="tab-pane fade in active" >
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    				<!--	<table id="">-->
					<form class="form-horizontal"  role="form" id="sbglxgform" name="sbglxgform" action="sbglxgbc.php" method="post">				
						  
					<div class="form-group">
						<label for="gcmc" class="col-sm-3 control-label">工程名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>" placeholder="" readonly="readonly">
							<input type="text" style="width: 200px" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>"/>
							
						</div>
						 
					
					<label for="jzqzlb" class="col-sm-3 control-label">建筑起重机械类别：</label>
										<div class="col-sm-3">
											<select id="jzqzlb" name="jzqzlb" class="form-control">
												<option><?php echo $row["设备类型"];?></option>
												<option>物料提升机</option>
												<option>塔吊</option>
												<option>施工升降机</option>
												<option>架桥机</option>
												<option>桥（门）式起重机</option>
												<option>施工机具</option>
												<option>起重吊装">起重吊装</option>
												<option>吊篮</option>
												
											</select>
										</div>
					</div>
					
													
						
							
					
					<div class="form-group">
						<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" value="<?php echo $row["工程项目安全监督登记号"];?>" >
						</div>
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" value="<?php echo $row["起重机械名称"];?>"  >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" value="<?php echo $row["省网告知流水号"];?>">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" value="<?php echo $row["工地自编号"];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" value="<?php echo $row["设备产权备案号"];?>">							
						</div>
							<label for="cs" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs" name="cs" value="<?php echo $row["登记日期"];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" value="<?php echo $row["规格型号"];?>">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" value="<?php echo $row["生产制造单位"];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" value="<?php echo $row["出厂日期"];?>">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" value="<?php echo $row["出厂编号"];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" value="<?php echo $row["产权单位名称"];?>">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" value="<?php echo $row["最大起重力矩"];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" value="<?php echo $row["设计最大起升高度"];?>">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" value="<?php echo $row["本工理桩高度"];?>">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" value="<?php echo $row["最大起重量"];?>">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="<?php echo $row["设备状态"];?>">
						</div>
					</div>

								 			<?php
												}
												$conn->close();
																
											?>
								 
								<div class="modal-footer" >
									<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.open('llbb/sbtb.php?tzdid=<?php echo $id=$_GET["id"]; ?>')">
										设备填报打印
									</button>
									<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();location.reload()">关闭
									</button>
									<input type="submit" class="btn btn-primary col-sm-offset-9" name="submit" value="保存">
								</div>
								<!-- /.modal-content -->
						  </form>
    				<!--	</table>-->
    				</div>
    				</div>
				
			 </div>		 
		</div>
		
				
	</div>
</div> 	
    		
    		</div><!-- 内容区域 -->
    
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
			$("#save9").click(function(){ 
		    $.ajax({ 
		        url:'sbglxgbc.php', 
		        type:"POST", 
		        data:$('#sbglxgform').serialize(), 
		        success: function(data) { 
		            $("#result").text(data); 
		        } 
		    }); 
		});  
		</script>

<script type="text/javascript">
			
	
			 function goback(){
			 		window.location.href="sbgl.php";
			}
		</script>

  </body>
</html>
