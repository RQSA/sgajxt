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
          <a class="navbar-brand" href="../index.php">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">项目管理</a></li>
            <li><a href="../seclect.php">综合查询</a></li>
            <li><a href="../system.html">系统管理</a></li>
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
											$sql = "select id,工程名称 from 我的工程 where id='$id' ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
                         					
                     ?>
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li ><a href="Project_in.php?id=<?php echo $row["id"];?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>">人员签到</a></li>
    							<li class="active" ><a href="sbgl.php?id=<?php echo $row["id"];?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>">隐患通知单</a></li>
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
    		<div id="xmdj" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">项目信息-韶关一建企业总部大厦</h3>
	</div>
	<div class="panel-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#sbdj" role="tab" data-toggle="tab">设备登记</a></li>
			<li role="presentation"><a href="#azgz" role="tab" data-toggle="tab">安装告知</a></li>
			<li role="presentation"><a href="#sydj" role="tab" data-toggle="tab">使用登记</a></li>
			<li role="presentation"><a href="#cxgz" role="tab" data-toggle="tab">拆卸告知</a></li>
			<li role="presentation" class="dropdown"> </li>
   
		</ul>	
    <!-- Tab panes -->
		<div class="tab-content">
			<!--设备登记-->
			<div role="tabpanel" class="tab-pane fade in active" id="sbdj">
				
					<div class="panel-body">
							<div class="btn-group">
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" ><i class="glyphicon glyphicon-plus"> 新建</i></button>
								<button type="button" class="btn btn-default">删除</button>
								<button type="button" class="btn btn-default">审核</button>
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										建筑起重机械
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">塔吊</a></li>
										<li><a href="#">施工升降机</a></li>
										<li><a href="#">物料提升机</a></li>
										<li><a href="#">桥（门）式起重机</a></li>
										<li><a href="#">架桥机</a></li>
										<li><a href="#">起重吊装</a></li>
										<li><a href="#">施工机具</a></li>
									</ul>
							  </div>
							</div>
    					<table id="">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量</th>
								         <th>本工理桩高度</th>
								         <th>附件</th>
								         <th>修改</th>
								      </tr>
								   </thead>
								   <tbody>
								     				<?php
                   						require("../conn.php");
                   						$sql = "select * from 设备管理 where 设备状态='登记中' and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                   						?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
                  						<td><?php echo $row["设备类型"];?></td>
							                <td><?php echo $row["产权备案号"];?></td>
							                <td><?php echo $row["使用年限"];?></td>
							                <td><?php echo $row["规格型号"];?></td>
							                <td><?php echo $row["生产制造单位"];?></td>
							                <td><?php echo $row["出厂日期"];?></td>
							                <td><?php echo $row["出厂编号"];?></td>
							                <td><?php echo $row["最大起重力矩"];?></td>
							                <td><?php echo $row["设计最大起升高度"];?></td>
							                <td><?php echo $row["最大起重量"];?></td>
							                <td><?php echo $row["本工理桩高度"];?></td>
							                <td><?php echo $row["附件"];?></td>
											        <td><a href="sbglxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        </td>
										         <?php
															}
															$conn->close();		
														 ?>
								   </tbody>
    					</table>
    			</div>
		<!-- 模态框（Modal-1） -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						  <form class="form-horizontal"  id="sbglform" action="sbglbc.php" method="post">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										设备登记
									</h4>
								</div>
								<div class="modal-body">
									
					<div>		  
					<div class="form-group">
						<label for="gcmc" class="col-sm-3 control-label">工程名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gcmc" name="gcmc" placeholder="名称">
						</div>
						 <!--<div class="btn-group">-->
									<!--<button type="button" id="jzqzlb" class="btn btn-default dropdown-toggle "   data-toggle="dropdown">
										建筑起重机械类别
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" id="jzqzlb">
										<li><a href="#">塔吊</a></li>
										<li><a href="#">施工升降机</a></li>
										<li><a href="#">物料提升机</a></li>
										<li><a href="#">桥（门）式起重机</a></li>
										<li><a href="#">架桥机</a></li>
										<li><a href="#">起重吊装</a></li>
										<li><a href="#">施工机具</a></li>
									</ul>-->
									<label for="gcwz" class="col-sm-3 control-label">建筑起重机械类别：</label>
									<!--<div class="col-sm-3">
										<input type="text" class="form-control" id="jxlb" name="jxlb" value="">							
									</div>-->
									<select id="jzqzlb">
									    <option value="物料提升机" selected>物料提升机</option>
									    <option value="塔吊">塔吊</option>
									    <option value="施工升降机">施工升降机</option>
									    <option value="架桥机">架桥机</option>
									    <option value="桥（门）式起重机">桥（门）式起重机</option>
									    <option value="起重吊装">起重吊装</option>
									    <option value="施工机具">施工机具</option>
									</select>
							 <!--</div>	-->			
					</div>
					</div>
					<div class="form-group">
						<label for="gcwz" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gcwz" name="gcwz" placeholder="单位">							
						</div>
							<label for="xmlb" class="col-sm-3 control-label">规格型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xmlb" name="xmlb" placeholder="型号">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="2016/12/5" >
							
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="123456">
							
						</div>
					</div>
					<div class="form-group">
						<label for="jzmj" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzmj" name="jzmj" placeholder="786">
						</div>
						
						<label for="cs" class="col-sm-3 control-label">登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs" name="cs" placeholder="2016/12/5">
						</div>
					</div>
					<div class="form-group">
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
					</div>
								 
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭
									</button>
									<button id="save8" type="button"  onclick="goback()" class="btn btn-primary">
										提交保存
									</button>
								</div>
							</div><!-- /.modal-content -->
						  </form>
						</div><!-- /.modal -->
					</div>
					
					
				
			 </div>
			 
			 	
			 <!--设备登记-->
			 
			<!--安装告知-->
			
			<div role="tabpanel" class="tab-pane fade" id="azgz">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
    					<table id="">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>设备类别</th>
								         <th>安装单位名称</th>
								         <th>安装部位</th>
								         <th>计划安装日期</th>
								         <th>实际安装日期</th>
								         <th>安装验收日期</th>
								         <th>设备状态</th>
								         <th>起重机械名称</th>
								         <th>设备产权备案号</th>
								         <th>登记日期</th>
								         <th>类型</th>
								         <th  class="text-center col-lg-6">操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     <?php
                   						require("../conn.php");
                   						$sql = "select * from 设备管理 where 设备状态='安装中' and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
                  						<td><?php echo $row["设备类别"];?></td>
						                <td><?php echo $row["安装单位名称"];?></td>
						                <td><?php echo $row["安装部位"];?></td>
						                <td><?php echo $row["计划安装日期"];?></td>
						                <td><?php echo $row["实际安装日期"];?></td>
						                <td><?php echo $row["安装验收日期"];?></td>
						                <td><?php echo $row["设备状态"];?></td>
						                <td><?php echo $row["起重机械名称"];?></td>
						                <td><?php echo $row["设备产权备案号"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["类型"];?></td>
										        <td>
								         			<div class="row">
								         				<a href="sbglxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a>
								         	  		<button type="button" class="btn btn-primary">撤销</button>
								           		</div>
								         		</td>
										         <?php
															}
															$conn->close();											
														?>
								   </tbody>
    					</table>
    			</div>
				</form>
			 </div>
			 <!--安装告知-->
			 
			 
			 <!--使用登记-->
			 <div role="tabpanel" class="tab-pane fade" id="sydj">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
    					<table id="">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>设备类型</th>
								         <th>起重机械名称</th>
								         
								         <th>工地自编号</th>
								         <th>检验单位名称</th>
								         <th>检验评定报告编号</th>
								         <th>使用单位评审时间</th>
								         <th>验收时间</th>
								         <th>登记日期</th>
								         <th>告知受理号</th>
								         <th  class="text-center col-lg-6">操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
                   						$sql = "select * from 设备管理 where 设备状态='使用中' and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
                  						<td><?php echo $row["设备类型"];?></td>
						                <td><?php echo $row["起重机械名称"];?></td>
						                <td><?php echo $row["工地自编号"];?></td>
						                <td><?php echo $row["检验单位名称"];?></td>
						                <td><?php echo $row["检验评定报告编号"];?></td>
						                <td><?php echo $row["使用单位审批时间"];?></td>
						                <td><?php echo $row["验收时间"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["告知受理号"];?></td>
										        <td>
								         			<div class="row">
								         				<a href="sbglxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
								         	  		<button type="button" class="btn btn-primary">撤销</button>
								           		</div>
								         		</td>
										         <?php
															}
															$conn->close();											
														?>
								   </tbody>
    					</table>
    			</div>
				</form>
			 </div>
			 
			 <!--设备拆卸 -->
             <div role="tabpanel" class="tab-pane fade" id="cxgz">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
    					<table id="">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>设备类型</th>
								         <th>起重机械名称</th>
								         
								         <th>省网告知流水号</th>
								         <th>工地自编号</th>
								         <th>设备产权备案号</th>
								         <th>规格型号</th>
								         <th>制造单位</th>
								         <th>出厂日期</th>
								         <th>登记日期</th>
								         <th>状态</th>
								         <th  class="text-center col-lg-6">操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
                   						$sql = "select * from 设备管理 where 设备状态='拆卸中' and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
                  						<td><?php echo $row["设备类型"];?></td>
						                <td><?php echo $row["起重机械名称"];?></td>
						                <td><?php echo $row["省网告知流水号"];?></td>
						                <td><?php echo $row["工地自编号"];?></td>
						                <td><?php echo $row["设备产权备案号"];?></td>
						                <td><?php echo $row["规格型号"];?></td>
						                <td><?php echo $row["制造单位"];?></td>
						                <td><?php echo $row["出厂日期"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["设备状态"];?></td>
										        <td>
								         			<div class="row">
								         				<a href="sbglxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
								         	  		<button type="button" class="btn btn-primary">撤销</button>
								           		</div>
								         		</td>
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
//			var jzqzlb = $("#jzqzlb").val();
//			$("#jxlb").val(jzqzlb);
				var jzqzlb=document.getElementById("jzqzlb");
				var gcmc=document.getElementById("gcmc");
				var gcwz=document.getElementById("gcwz");
				var xmlb=document.getElementById("xmlb");
				var jwd=document.getElementById("jwd");
				var wcfw=document.getElementById("wcfw");
				var jzmj=document.getElementById("jzmj");
				var gd=document.getElementById("gd");
				var cs=document.getElementById("cs");	
//				var jzqzlb=$("#test option:selected"); 
//				var jzqzlb=document.getElementById("jzqzlb");
//				var index=myselect.selectedIndex ; 
//							alert(jzqzlb.value);					
				$("#save8").click(function(){ 
//					alert 
			    $.ajax({ 
			        url:'sbglbc.php', 
			        type:"POST", 
			       data:{
					          gcmc:gcmc.value,
					          jzqzlb:jzqzlb.value,
//										jzqzlb:myselect.options[index].text,
					          gcwz:gcwz.value,
					          xmlb:xmlb.value,
					          jwd:jwd.value,
					          wcfw:wcfw.value,
					          jzmj:jzmj.value,
					          gd:gd.value,
					          cs:cs.value
					        },
			    
			    }); 
			});  
		</script>
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    <!--<script type="text/javascript">
			$("#save8").click(function(){ 
//					alert 
			    $.ajax({ 
			        url:'sbglbc.php', 
			        type:"POST", 
			        data:$('#sbglform').serialize(),
			    
			    }); 
			});  
		</script>-->
		<script>
			 function goback(){
			 		window.location.href="sbgl.php";
			}
		</script>

  </body>
</html>
