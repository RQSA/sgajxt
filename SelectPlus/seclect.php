<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>韶关一建企业有限公司项目质量安全检查管理系统</title> 
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker-bs3.css"/>
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
          <a class="navbar-brand" href="index.php">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">项目管理</a></li>
            <li class="active"><a href="seclect.php">综合查询</a></li>
            <li><a href="system.php">系统管理</a></li>
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
    					<li><a href="SelectPlus/wxycx.php">危险源查询</a></li>    					
    					<li><a href="SelectPlus/jxsbcx.html">机械设备查询</a></li>    					
    					<li  class="active"><a href="seclect.php">巡查整改查询</a></li>
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
			  <div id="xmdj" class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">查询分析</h3>
				</div>
											
				<div class="panel-body">
    			<div>
    			  
							  <div class="well">
               <form method="post" class="form-horizontal" id="sjdxz">
                 <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="reservationtime">检查日期选择</label>
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                       <input type="text" style="width: 400px" name="reservation" id="reservationtime" class="form-control" value="08/12/2016 1:00 PM - 08/01/2017 1:30 PM"  class="span4"/>
                       <input type="text" style="width: 200px" id="liu" name="liu" class="form-control hidden" value="2016-08-12" >
                       <input type="text" style="width: 200px" id="endtime" name="endtime" class="form-control hidden" value="2017-08-12"/>
                       <input type="submit" class="btn col-sm-offset-1" value="查询">
                     </div>
                     <!--<div class="btn-group ">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										项目选择
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="wxycxfx.php">危险源</a></li>
										<li><a href="cxfx.php">隐患通知单</a></li>
									<script>
//								 var a=document.getElementById("reservationtime").value;    
//    	         alert(a); 
									</script>	
									</ul>
							  </div>-->
                    </div>
                  </div>
                 </fieldset>
                   <div>
							  	<fieldset style="padding:7px;">



省 市 区选择：<select name="province6"></select><select name="city6"></select><select name="area6"></select><br>


</fieldset>


</div>
              <?php
							require("conn.php");
							error_reporting(E_ALL ^ E_NOTICE);
							$sql = "select * from 通知单 ";
							$liu =$_POST['liu'];
							$endtime =$_POST['endtime'];	
//							$Query = "Select count(*) as AllNum from 通知单 where 通知单状态='草稿' and 检查日期 between 'left(".$liu.",10)' and 'left(".$endtime.",10)'"; 
							$Query = "Select count(*) as AllNum from 通知单 where 通知单状态='草稿' and 检查日期 between '$liu'and '$endtime'"; 
///							echo $Query;
							$a     = mysqli_query( $conn, $Query ); 
							$b     = mysqli_fetch_assoc( $a ); 
//							echo $b['AllNum']; //条数  	
							$Query1 = "Select count(*) as AllNum1 from 通知单 where 通知单状态='整改中' and 检查日期 between '$liu'and '$endtime'"; 
							$a1     = mysqli_query( $conn, $Query1 ); 
							$b1     = mysqli_fetch_assoc( $a1 );
							$Query2 = "Select count(*) as AllNum2 from 通知单 where 通知单状态='延期' and 检查日期 between '$liu'and '$endtime'"; 
							$a2     = mysqli_query( $conn, $Query2 ); 
							$b2     = mysqli_fetch_assoc( $a2 );
							$Query3 = "Select count(*) as AllNum3 from 通知单 where 通知单状态='逾期' and 检查日期 between '$liu'and '$endtime'"; 
							$a3     = mysqli_query( $conn, $Query3 ); 
							$b3     = mysqli_fetch_assoc( $a3 );
							$Query4 = "Select count(*) as AllNum4 from 通知单 where 通知单状态='未完成' and 检查日期 between '$liu'and '$endtime'"; 
							$a4     = mysqli_query( $conn, $Query4 ); 
							$b4     = mysqli_fetch_assoc( $a4 );
							$Query5 = "Select count(*) as AllNum5 from 通知单 where 通知单状态='已完成' and 检查日期 between '$liu'and '$endtime'"; 
							$a5     = mysqli_query( $conn, $Query5 ); 
							$b5     = mysqli_fetch_assoc( $a5 );													
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()) {
                         					
             ?>
						<?php
							 }
							 $conn->close();
																							
						?>
                 <div  style="display:inline">
                 
							  </div>
               </form>
            </div> 
    			</div>
    			<div class="row">
    				<div class="col-lg-3">
	    			<table class="table  table-bordered">
							<tr class="">
							  <td class="col-xs-4">通知</td>
							  <td class="col-xs-4">份</td>
							</tr>
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal">草稿</a></td>
							  <td ><?php echo $b['AllNum'];?></td>
							</tr>			
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal1">整改中</a></td>
							  <td><?php echo $b1['AllNum1'];?></td>
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal2">延期</td></a>
							  <td><?php echo $b2['AllNum2'];?></td>
							</tr>	
							<tr>
							  <td ><a href="#" data-toggle="modal" data-target="#myModal3">逾期</td></a>
							  <td><?php echo $b3['AllNum3'];?></td>
							  <tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal4">已完成</td></a>
							  <td ><?php echo $b5['AllNum5'];?></td>
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal5">未完成</td></a>
							  <td><?php echo $b4['AllNum4'];?></td>
							</tr>	
							</tr>	
						</table></div>
						<div id="container1" class="col-lg-8 col-md-offset-8" style="width:650px; height: 400px; margin: 0 auto" ></div>
    				</div>
    				
    				
    				<div>
		    				<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel">
											通知
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered table-condensed">
			    						<thead>
											      <tr>
											         <th>工程名称</th>
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												<tbody>
									      <?php
						                   require("conn.php");
						                   $sql = "select * from 通知单 where 违章状态='草稿'  ";
						                   $result = $conn->query($sql);
						                   while($row = $result->fetch_assoc()) {    					
						                   ?>
						                   <tr class="">
						                 <td><a href="cgbh.php?id=<?php echo $row["id"];?>&tzdbh=<?php echo $row["通知单编号"];?>"><?php echo $row["工程名称"];?></a></td>
						                   <td><?php echo $row["检查层级"];?></td>
						                   <td><?php echo $row["巡查类别"];?></td>
						                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							
							
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel1">
											回复
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
		    						<thead>
										      <tr>
										         <th>工程名称</th>
										         <th>检查层级</th>
										         <th>巡查类别</th>
										         <th>通知单编号</th>
										         <th>检查单位</th>
										         <th>检查对象</th>
										         <th>检查类别</th>
										         <th>违章大类</th>
										         <th>检查日期</th>
										      </tr>
										   </thead>
											 <tbody>
										      <?php
							                   require("conn.php");
							                   $sql = "select * from 通知单 where 违章状态='整改中' ";
							                   $result = $conn->query($sql);
							                   while($row = $result->fetch_assoc()) {    					
							                   ?>
							                   <tr class="">
							                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
							                   <td><?php echo $row["检查层级"];?></td>
							                   <td><?php echo $row["巡查类别"];?></td>
							                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel2">
											延期
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
			    						 <thead>
											      <tr>
											         <th>工程名称</th>
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												 <tbody>
								      <?php
					                   require("conn.php");
					                   $sql = "select * from 通知单 where 违章状态='延期' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel3">
											逾期
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
			    						<thead>
											      <tr>
											         <th>工程名称</th>
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												<tbody>
								      <?php
					                   require("conn.php");
					                   $sql = "select * from 通知单 where 违章状态='逾期' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel4">
											已完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
				    						<thead>
												      <tr>
												         <th>工程名称</th>
												         <th>检查层级</th>
												         <th>巡查类别</th>
												         <th>通知单编号</th>
												         <th>检查单位</th>
												         <th>检查对象</th>
												         <th>检查类别</th>
												         <th>违章大类</th>
												         <th>检查日期</th>
												      </tr>
												   </thead>
												<tbody>
								      <?php
					                   require("conn.php");
					                   $sql = "select * from 通知单 where 违章状态='已完成' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("conn.php");
					                   $sql = "select * from  通知单 where 违章状态='未完成' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							</div>
							</div>
							
    					
    				<!-- 内容区域 -->

    
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
   <script src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
   
   <script language="javascript" src="js/PCASClass.js"></script>

	 <script type="text/javascript" src="js/daterangepicker.js"></script>  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
    <script language="JavaScript"> 
    	//获取
    	var bianliang=document.getElementById("liu");
    	var endtime=document.getElementById("endtime");
     			        	
			$(document).ready(function() {   
				  $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          format: 'MM/DD/YYYY h:mm A'
          }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          var a=document.getElementById("reservationtime").value;    
        	  //alert(start.toISOString()); 
          	  bianliang.value=start.toISOString();
          	  endtime.value=end.toISOString();
        	  //alert(bianliang.getAttribute("value"));
//    	   bianliang.value=start.toISOString();
          });//时间段的
			   var chart = {
			       plotBackgroundColor: null,
			       plotBorderWidth: null,
			       plotShadow: false
			   };
			   var title = {
			      text: '韶关一建通知比例'   
			   };      
			   var tooltip = {
			      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			   };
			   var plotOptions = {
			      pie: {
			         allowPointSelect: true,
			         cursor: 'pointer',
			         dataLabels: {
			            enabled: true,
			            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
			            style: {
			               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			            }
			         }
			      }
			   };

			   var series= [{
			      type: 'pie',
			      name: '所占比例',
			      data: [
			         ['草稿',   <?php echo $b['AllNum'];?>],
			         ['延期',      <?php echo $b2['AllNum2'];?>],
			         {
			            name: '未完成',
			            y: <?php echo $b4['AllNum4'];?>,
			            sliced: true,
			            selected: true
			         }, 
			         ['逾期',   <?php echo $b3['AllNum3'];?>],
			         ['整改中',     <?php echo $b1['AllNum1'];?>],
			         ['已完成',   <?php echo $b5['AllNum5'];?>]
			      ]
			   }];     
			      
			   var json = {};   
			   json.chart = chart; 
			   json.title = title;     
			   json.tooltip = tooltip;  
			   json.series = series;
			   json.plotOptions = plotOptions;
			   $('#container1').highcharts(json);  
			});
</script>
<!--<script>
		window.onload= function(){document.getElementById('sjdxz').submit();}
</script>-->
		 <!--<script type="text/javascript">
        $(document).ready(function() {
						        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          format: 'MM/DD/YYYY h:mm A'
          }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          });
            });
     </script>-->
     	<!--<script type="text/javascript" src="../js/jquery.min.js">
			</script>-->
			<!--<script type="text/javascript" src="../js/bootstrap.min.js">
			</script>-->
			<script type="text/javascript" src="js/moment.js">
			</script>
			<script type="text/javascript" src="js/daterangepicker.js">
			</script>
			<script type="text/javascript">
			    $('table').bootstrapTable({		
					striped : true,	//会有隔行变色效果
				  });
      </script>
        <script language="javascript" defer>

				     
				new PCAS("province6","city6","area6","请选择省份","请选择市区","请选择地区");

			
				
				</script>

  </body>
</html>
