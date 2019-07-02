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
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<!--<li ><a href="Project_in.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">项目登记</a>
    					</li>-->    					
    					<li>
    						<!--<a href="aqxc.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">项目管理</a>
    						<ul class="nav">
    							<li  class="active"><a href="aqxc.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $_GET["id"];?>&yhid=<?php echo $_GET["yhid"];?>">隐患通知单</a></li>
    						</ul>-->
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			<?php
					$id=$_GET["id"];
					require("../conn.php");
					$sql = "select * from 危险源 where id='$id' ";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
		                         					
                ?>
    		
<div  class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">危险源详细填写</h3>
	</div>
	
		<div class="tab-content">
	
			 <div role="tabpanel" class="tab-pane fade in active" >
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    				<!--	<table id="">-->
					<form class="form-horizontal"  role="form" id="aqxcxgform" name="aqxcxgform" action="aqxcxgbc.php" method="post">				
					<div>		  
					<div class="form-group">
						<label for="gcmc" class="col-sm-3 control-label">工程名称：</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>" placeholder="名称" readonly="readonly">
							<input type="text" style="width: 200px" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>" />
						</div>
					
				
					</div>
					</div>
					<div class="form-group">
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sgbw" name="sgbw" value="<?php echo $row["施工部位"];?>" placeholder="">							
						</div>
							<label for="jkmj" class="col-sm-3 control-label">基坑面积：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jkmj" name="jkmj" value="<?php echo $row["基坑面积"];?>" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="tzpass" class="col-sm-3 control-label">是否通过审核：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="tzpass" name="tzpass" value="<?php echo $row["是否通过审核"];?>" placeholder="">
								</div>
						<label for="kwsd" class="col-sm-3 control-label">设计开挖深度：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="kwsd" name="kwsd" value="<?php echo $row["设计开挖深度"];?>" placeholder="">
							
						</div>
					</div>
					<div class="form-group">
						<label for="ks" class="col-sm-3 control-label">预计开始日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="ks" name="ks" value="<?php echo $row["预计开始日期"];?>" placeholder="">
						</div>
						
						<label for="js" class="col-sm-3 control-label">预计结束日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="js" name="js" value="<?php echo $row["预计结束日期"];?>" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危险性较大的分部分项工程：</label>
						<div class="col-sm-3">
							<select id="overpg" name="overpg" class="form-control" value="<?php echo $row["超过一定规模的危险性较大的分部分项工程"];?>">
								<option>是</option>
								<option>否</option>
							</select>
						</div>
						<!--<div class="col-sm-3">
							<input type="text" class="form-control" id="overpg" name="overpg" value="<?php echo $row["超过一定规模的危险性较大的分部分项工程"];?>" placeholder="">
						</div>-->
						<label for="djtime" class="col-sm-3 control-label">登记日期：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="djtime" name="djtime" value="<?php echo $row["登记日期"];?>" placeholder="">
										</div>
						
						
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses"  value="<?php echo $row["使用状态"];?>" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" value="<?php echo $row["管理状态"];?>" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
						<label for="zmmj" class="col-sm-3 control-label">支模面积：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="zmmj" name="zmmj" value="<?php echo $row["支模面积"];?>"  placeholder="">
								</div>
						
						<label for="zmgd" class="col-sm-3 control-label">支模高度：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="zmgd" name="zmgd" value="<?php echo $row["支模高度"];?> " placeholder="" >	
								</div>
					</div>
					
					<div class="form-group">
						<label for="zjlz" class="col-sm-3 control-label">是否专家论证：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="zjlz" name="zjlz" value="<?php echo $row["是否专家论证"];?>"  placeholder="">
								</div>
						
						<label for="tsgd" class="col-sm-3 control-label">搭设高度(m)：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="tsgd" name="tsgd" value="<?php echo $row["塔设高度"];?>"  placeholder=""  >
								</div>
					</div>
					
					<div class="form-group">
						<label for="ejlx" class="col-sm-3 control-label">二级类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="ejlx" name="ejlx" value="<?php echo $row["二级类型"];?>  " placeholder=""  >
								</div>
								
						<label for="wxylx" class="col-sm-3 control-label">危险源类型：</label>
										<div class="col-sm-3">
											<select  id="wxylx" name="wxylx" class="form-control">
												<option><?php echo $row["危险源类型"];?></option>
												<option>基坑支护及降水工程</option>
												<option>土方开挖工程</option>
												<option>模板工程支撑体系</option>
												<option>脚手架工程</option>
												<option>起重吊装及安装拆卸工程</option>
												<option>拆除爆破工程</option>
												<option>其他危险性较大的工程</option>
												
											</select>
										</div>
						
					</div>
					
							
								<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option><?php echo $row["危险源状态"];?></option>
												<option>拆卸</option>
												<option>安装</option>
												
												
											</select>
										</div>
										
								 </div>
								 			
								 
								</div>
								<div class="modal-footer" >
									<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.open('llbb/wxytb.php?sjc=<?php echo $row["时间戳"];?>')">
										危险源填报打印
									</button>
									    <?php
												}
												$conn->close();
																
											?>
									<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();location.reload()">返回
									</button>
									<input type="submit" class="btn btn-primary col-sm-offset-9" name="submit" value="保存">
								</div>
							</div><!-- /.modal-content -->
						  </form>
    				<!--	</table>-->
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
			$("#save11").click(function(){ 
		    $.ajax({ 
		        url:'aqxcxgbc.php', 
		        type:"POST", 
		        data:$('#aqxcxgform').serialize(), 
		        success: function(data) { 
		            $("#result").text(data); 
		        } 
		    }); 
		});  
		</script>

  </body>
</html>
