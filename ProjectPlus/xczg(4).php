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
    					<li class="active" >
    						<a href="aqxc.php?id=<?php echo $row["id"];?>">项目管理</a>
    						<ul class="nav">
    							<li><a href="aqxc.php?id=<?php echo $row["id"];?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>">人员签到</a></li>
    							<li ><a href="sbgl.php?id=<?php echo $row["id"];?>">设备管理</a></li>
    							<li class="active"><a href="xczg.php?id=<?php echo $row["id"];?>">巡查整改</a></li>
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
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">项目信息</h3>
	</div>
	<div class="panel-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#cg" role="tab" data-toggle="tab">草稿</a></li>
			<li role="presentation"><a href="#zgz" role="tab" data-toggle="tab">整改中</a></li>
			<li role="presentation"><a href="#yq" role="tab" data-toggle="tab">延期</a></li>
			<li role="presentation"><a href="#yzx" role="tab" data-toggle="tab">逾期</a></li>
			<li role="presentation"><a href="#yanq" role="tab" data-toggle="tab">未完成</a></li>
			<li role="presentation"><a href="#ywc" role="tab" data-toggle="tab">已完成</a></li>
		</ul>	
    <!-- Tab panes -->
		<div class="tab-content">
			  					
	
			 <div role="tabpanel" class="tab-pane fade in active" id="cg">
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
  <!--<div class="btn-group">-->

								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" ><i class="glyphicon glyphicon-plus"> 新建</i></button>
								
					  <!--  </div>		-->	
    					
    					<table id="">
    						
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>检查单位</th>
								         <th>检查日期</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								           <?php
					                   require("../conn.php");
									   				 $id=$_GET["id"];
					                   $sql = "select * from 通知单 where 通知单状态='草稿' and 工程id='$id' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                 <td><a href="cgbh.php?id=<?php echo $row["id"];?>&sjc=<?php echo $row["时间戳"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <td>
					                   	<button type="button" class="btn btn-default"  onclick="javascript:window.open ('bbdy11.php?tzdbh1=<?php echo $row["通知单编号"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印
					                   	</button>
					                   </td>
					                   <!--<td>
					                   	<form  action="pfcl.php" class="form-horizontal" role="form"  method="post">
					                   		<input id="save2" type="submit" name="save2" value="批复" class="btn btn-default">
					                   		<input type="text" class="form-control hidden" id="tzdbh"  name="tzdbh" value="<?php echo $row["通知单编号"];?>">
					                   		<input type="text" class="form-control hidden" id="tzdzt"  name="tzdzt" value="整改中">
					                   	</form>
					                   	<form  action="sccl.php" class="form-horizontal" role="form"  method="post">
					                   		<input id="sccl" type="submit" name="sccl" value="删除" class="btn btn-default">
					                   		<input type="text" class="form-control hidden" id="tzdbh"  name="tzdbh" value="<?php echo $row["通知单编号"];?>">
					                   	</form>
					                   </td>-->
					          <?php
											}
											$conn->close();
																						
										?>
								   </tbody>
    					</table>
    				</div>
    				
    				<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<form id="cgform" action="xczgbc.php" method="post">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										草稿登记
									</h4>
								</div>
								
								<div class="modal-body">
					<div class="form-group">
						 <?php
					                   require("../conn.php");
									   				 $id=$_GET["id"];
					                   $sql = "select * from 我的工程  where id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                  
						<label for="gcmc" class="col-sm-3 control-label">工程名称：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="gcmc" name="gcmc" placeholder="<?php echo $row["工程名称"];?>" value="<?php echo $row["工程名称"];?>">
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">
						</div>
						  <?php
											}
											$conn->close();
																						
										?>
						</div>
					<div class="form-group">
						<label for="jccj" class="col-sm-3 control-label">检查层级：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jccj" name="jccj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xclb" class="col-sm-3 control-label">巡查类别：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="xclb" name="xclb" placeholder="">							
						</div>
					</div>
					
					<div class="form-group">
						<label for="tzdbh" class="col-sm-3 control-label">通知单编号：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="tzdbh" name="tzdbh" placeholder="">
						</div>
					</div>
					
						<div class="form-group">
						<label for="jcdw" class="col-sm-3 control-label">检查单位：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jcdw" name="jcdw" placeholder="">
						</div>
					</div>
					
						<div class="form-group">
						<label for="jcdx" class="col-sm-3 control-label">检查对象：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jcdx" name="jcdx" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jclx" class="col-sm-3 control-label">检查类型：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jclx" name="jclx" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="wzdl" class="col-sm-3 control-label">违章大类：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="wzdl" name="wzdl" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jcrq" class="col-sm-3 control-label">检查日期：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="jcrq" name="jcrq" placeholder="">
						</div>
					</div>
					
					
						
					<div class="form-group">
										<label for="wzzt" class="col-sm-3 control-label">违章状态：</label>
										<div class="col-sm-3">
											<select id="wzzt" name="wzzt" class="form-control">
												<option>草稿</option>
																		
											</select>
										</div>
										</div>
				
				
								 
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭
									</button>
									<button id="save6" type="button"  onclick="window.location.reload()"  class="btn btn-primary col-sm-offset-9">保存</button>
								</div>
								
							</div><!-- /.modal-content -->
							</form>
						</div><!-- /.modal -->
					</div>
    				
				
			 </div>

			 <div role="" class="tab-pane fade" id="zgz">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
			
    					<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类型</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								         <!--<th>操作</th>-->
								      </tr>
								   </thead>
								   <tbody>
								      <?php
					                   require("../conn.php");
					                   $sql = "select * from 通知单 where 通知单状态='整改中'  and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh2.php?id=<?php echo $row["id"];?>&sjc=<?php echo $row["时间戳"];?>&gcid=<?php echo $row["通知单编号"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <!--<td>
					                   		<form  action="pfcl.php" class="form-horizontal" role="form"  method="post">
						                   		<input id="save2" type="submit" name="save2" value="批复" class="btn btn-default">
						                   		<input type="text" class="form-control hidden" id="tzdbh"  name="tzdbh" value="<?php echo $row["通知单编号"];?>">
						                   		<input type="text" class="form-control hidden" id="tzdzt"  name="tzdzt" value="已完成">
						                   	</form>
						                   	<form  action="pfcl.php" class="form-horizontal" role="form"  method="post">
						                   		<input id="save2" type="submit" name="save2" value="延期" class="btn btn-default">
						                   		<input type="text" class="form-control hidden" id="tzdbh"  name="tzdbh" value="<?php echo $row["通知单编号"];?>">
						                   		<input type="text" class="form-control hidden" id="tzdzt"  name="tzdzt" value="延期">
						                   	</form>
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
			 
			 
			 <div role="" class="tab-pane fade" id="yq">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
			    
           
    					<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
								      			 $id=$_GET["id"];	
					                   require("../conn.php");
					                   $riqi=date("Y-m-d");
					                   $sql = "select * from 通知单 where 通知单状态='整改中'  and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh2.php?id=<?php echo $row["id"];?>&sjc=<?php echo $row["时间戳"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
											}
											$conn->close();
																						
										?>
								   
								     
								   </tbody>
    					</table>
    				</div>
				</form>
			 </div>
			  <div role="" class="tab-pane fade" id="yzx">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
			
    					<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
					                   require("../conn.php");
					                   $sql = "select * from 通知单 where 通知单状态='逾期'  and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh2.php?id=<?php echo $row["id"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
															}
															$conn->close();
																										
														?>
								   
								     
								   </tbody>
    					</table>
    				</div>
				</form>
			 </div>
			 
			  <div role="" class="tab-pane fade" id="yanq">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
			
    					<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
					                   require("../conn.php");
					                   $sql = "select * from  通知单 where 通知单状态='未完成'  and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh2.php?id=<?php echo $row["id"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
											}
											$conn->close();
																						
										?>
								   
								     
								   </tbody>
    					</table>
    				</div>
				</form>
			 </div>
			
			 <div role="" class="tab-pane fade" id="ywc">
				<form class="form-horizontal" role="form">
					<div class="panel-body">
			
    					<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
					                   require("../conn.php");
					                   $sql = "select * from 通知单 where 通知单状态='已完成'  and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh2.php?id=<?php echo $row["id"];?>"><?php echo $row["通知单编号"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
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
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
$("#save6").click(function(){ 
    $.ajax({ 
        url:'xczgbc.php', 
        type:"POST", 
        data:$('#cgform').serialize(),
    
    }); 
});  
</script>
<script>
 function goback(){
 window.location.href="xczg.php";
}
</script>
<script>  
    $(function(){  
        function initTableCheckbox() {  
            var $thr = $('table thead tr');  
//              var $checkAllTh = $('<th><input type="checkbox" id="checkAll" name="checkAll" /></th>');  
//              /*将全选/反选复选框添加到表头最前，即增加一列*/  
//              $thr.prepend($checkAllTh);  
//              /*“全选/反选”复选框*/  
            var $checkAll = $thr.find('input');  
            $checkAll.click(function(event){  
                /*将所有行的选中状态设成全选框的选中状态*/  
                $tbr.find('input').prop('checked',$(this).prop('checked'));  
                /*并调整所有选中行的CSS样式*/  
                if ($(this).prop('checked')) {  
                    $tbr.find('input').parent().parent().addClass('warning');  
                } else{  
                    $tbr.find('input').parent().parent().removeClass('warning');  
                }  
                /*阻止向上冒泡，以防再次触发点击操作*/  
                event.stopPropagation();  
            });  
            /*点击全选框所在单元格时也触发全选框的点击操作*/  
//              $checkAllTh.click(function(){  
//                  $(this).find('input').click();  
//              });  
            var $tbr = $('table tbody tr');  
            var $checkItemTd = $('<td><input type="checkbox" name="checkItem" /></td>');  
            /*每一行都在最前面插入一个选中复选框的单元格*/  
            $tbr.prepend($checkItemTd);  
            /*点击每一行的选中复选框时*/  
            $tbr.find('input').click(function(event){  
                /*调整选中行的CSS样式*/  
                $(this).parent().parent().toggleClass('warning');  
                /*如果已经被选中行的行数等于表格的数据行数，将全选框设为选中状态，否则设为未选中状态*/  
                $checkAll.prop('checked',$tbr.find('input:checked').length == $tbr.length ? true : false);  
                /*阻止向上冒泡，以防再次触发点击操作*/  
                event.stopPropagation();  
            });  
            /*点击每一行时也触发该行的选中操作*/  
            $tbr.click(function(){  
                $(this).find('input').click();  
            });  
        }  
        initTableCheckbox();  
    });  
</script>    
  </body>
</html>


