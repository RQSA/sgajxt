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
    <script type="text/javascript" src="../js/jedate.js"></script>
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
    					<li><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">人员签到</a></li>
    							<li  class="active" ><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">隐患通知单</a></li>
									<li ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    	
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    		<div id="xmdj" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">设备管理-<?php echo $row["工程名称"];?></h3>
	</div>	
	
											<?php
													}
													$conn->close();		
												?>
												
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
								<!--<button type="button" class="btn btn-default">删除</button>
								<button type="button" class="btn btn-default">审核</button>-->
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										建筑起重机械
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li class="lii"><a href="#sb8"  tabindex="-1" data-toggle="tab">全部类型</a></li>
										<li class="lii"><a href="#sb0"  tabindex="-1" data-toggle="tab">塔吊</a></li>
										<li class="lii"><a href="#sb1"  tabindex="-1" data-toggle="tab">施工升降机</a></li>
										<li class="lii"><a href="#sb2"  tabindex="-1" data-toggle="tab">物料提升机</a></li>
										<li class="lii"><a href="#sb3"  tabindex="-1" data-toggle="tab">桥（门）式起重机</a></li>
										<li class="lii"><a href="#sb4"  tabindex="-1" data-toggle="tab">架桥机</a></li>
										<li class="lii"><a href="#sb5"  tabindex="-1" data-toggle="tab">起重吊装</a></li>
										<li class="lii"><a href="#sb6"  tabindex="-1" data-toggle="tab">施工机具</a></li>
										<li class="lii"><a href="#sb7"  tabindex="-1" data-toggle="tab">吊篮</a></li>
									</ul>
								
							  </div>
							</div>
							
							<div class="tab-content">
							<div class="tab-pane fade in active">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>工程项目安全监督登记号</th>
								         <th>省网告知流水号</th>
								         <th>工地自编号</th>
								         <th>设备产权备案号</th>
								         <th>登记日期</th>
								         <th>型号</th>
								         <th>制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>产权单位名称</th>
								         <th>设计最大起升高度(m)</th>
								         <th>本工程安装高度</th>
								         <th>最大起重量(KN)</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
                   						<td><?php echo $row["设备类型"];?></td>
                  						<td><?php echo $row["工程项目安全监督登记号"];?></td>
							                <td><?php echo $row["省网告知流水号"];?></td>
							                <td><?php echo $row["工地自编号"];?></td>
							                <td><?php echo $row["设备产权备案号"];?></td>
							                <td><?php echo $row["登记日期"];?></td>
							                <td><?php echo $row["规格型号"];?></td>
							                <td><?php echo $row["生产制造单位"];?></td>
							                <td><?php echo $row["出厂日期"];?></td>
							                <td><?php echo $row["出厂编号"];?></td>
							                <td><?php echo $row["产权单位名称"];?></td>
							                <td><?php echo $row["设计最大起升高度"];?></td>
							                <td><?php echo $row["本工理桩高度"];?></td>
							                <td><?php echo $row["最大起重量"];?></td>
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb0">
    					<table  >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='塔吊'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb1">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='施工升降机'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb2">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='物料提升机'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb3">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='桥（门）式起重机'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb4">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='架桥机'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb5">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='起重吊装'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb6">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='施工机具'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" value="安装中" onclick="dianji(this.id,this.value);" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb7">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'and 设备类型='吊篮'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
										         <?php
															}
															$conn->close();		
														?>
								   </tbody>
    					</table>
    			</div>
    			
    			<div class="tab-pane fade"  id="sb8">
    					<table >
    						<thead>
								      <tr>
								         <th>起重机械名称</th>
								         <th>设备类型</th>
								         <th>产权备案号</th>
								         <th>使用年限</th>
								         <th>型号</th>
								         <th>生产制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>最大起重力矩 (kN*m)</th>
								         <th>设计最大起重高度</th>
								         <th>最大起重量(KN)</th>
								         <th>本工程安装高度</th>
								         <th>附件</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     				
                   						<?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 设备管理   where 工程id='$id'and 设备状态='登记中'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a ><?php echo $row["起重机械名称"];?></a></td>
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
											        <td>
											        	<a href="sbglxg.php?id=<?php echo $row["id"];?>&gcid=<?php echo $row["工程id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
											        	<input id="sbid" value="<?php echo $row["id"];?>" class="hidden" />
											        	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">审核</button>
											        		<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
										        </td>
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
		<!-- 模态框（Modal-1） -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						 <!-- <form class="form-horizontal"  id="sbglform" action="sbglbc.php" method="post">-->
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
						<label for="" class="col-sm-3 control-label">工程名称：</label>
						<div class="col-sm-3">
							      <?php
//										echo $_GET["id"];
										  $id=$_GET["id"];
										  require("../conn.php");
											$sql = "select id,工程名称 from 我的工程 where id='$id' ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
                         					
                     ?>
							<input type="text" class="form-control" readonly="readonly"  id="" name="" placeholder="<?php echo $row["工程名称"];?>">
								
								
							<input type="text" style="width: 200px" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>"/>
							
								<?php
									}
									$conn->close();		
								?>
							
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
									
									<!--<label for="jzqzlb" class="col-sm-3 control-label">建筑起重机械类别：</label>
									<!--<div class="col-sm-3">
										<input type="text" class="form-control" id="jxlb" name="jxlb" value="">							
									</div>-->
									
										<!--<select id="jzqzlb" >
									    <option value="物料提升机" selected>物料提升机</option>
									    <option value="塔吊">塔吊</option>
									    <option value="施工升降机">施工升降机</option>
									    <option value="架桥机">架桥机</option>
									    <option value="桥（门）式起重机">桥（门）式起重机</option>
									    <option value="起重吊装">起重吊装</option>
									    <option value="施工机具">施工机具</option>
										</select>-->
									
							 <!--</div>	-->			
							 <div class="btn-group">
									<button type="button  " class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										建筑起重机械选择
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li class="lii lii0 "><a href="#xmxz0" tabindex="-1" data-toggle="tab">物料提升机</a></li>
										<li class="lii lii1  " ><a href="#xmxz1" tabindex="-1" data-toggle="tab">塔吊</a></li>
										<li class="lii lii2 "><a href="#xmxz2" tabindex="-1" data-toggle="tab">施工升降机</a></li>
										<li class="lii lii3 "><a href="#xmxz3" tabindex="-1" data-toggle="tab">架桥机</a></li>
										<li class="lii lii4"><a href="#xmxz4" tabindex="-1" data-toggle="tab">桥（门）式起重机</a></li>
										<li class="lii lii5" ><a href="#xmxz5" tabindex="-1" data-toggle="tab">起重吊装</a></li>
										<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">施工机具</a></li>
										<li class="lii lii7"><a href="#xmxz7" tabindex="-1" data-toggle="tab">吊篮</a></li>
									</ul>
							  </div>
							 
					</div>
					</div>
					<div class="form-group tab-pane fade my_none  "  id="xmxz0">
				<form id="sbglform0" name="sbglform0" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="物料提升机" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save0" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz1">
				<form id="sbglform1" name="sbglform1" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="塔吊" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs1" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs1" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save1" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz2">
				<form id="sbglform2" name="sbglform2" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="施工升降机" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs2" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs2" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save2" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz3">
				<form id="sbglform3" name="sbglform3" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="架桥机" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs3" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs3" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save3" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz4">
				<form id="sbglform4" name="sbglform4" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="桥（门）式起重机" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs4" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs4" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save4" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz5">
				<form id="sbglform5" name="sbglform5" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="起重吊装" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs5" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs5" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save5" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz7">
				<form id="sbglform7" name="sbglform7" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="cqbah" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="吊篮" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="">							
						</div>
							<label for="cs6" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs6" name="cs" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save7" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
					
					<div class="form-group tab-pane fade my_none  "  id="xmxz6">
				<form id="sbglform6" name="sbglform6" action="sbglbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group">
						<label for="jzqzlb" class="col-sm-3 control-label">建筑起重类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jzqzlb" name="jzqzlb" placeholder="" value="施工机具" readonly="readonly" >							
						</div>
							<label for="jddj" class="col-sm-3 control-label">工程项目安全监督登记号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jddj" name="jddj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="qzname" class="col-sm-3 control-label">起重机械名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="qzname" name="qzname" placeholder=""  >							
						</div>
						<label for="azbw" class="col-sm-3 control-label">安装部位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="azbw" name="azbw" placeholder="" >							
						</div>
					</div>
					<div class="form-group">
						<label for="swgz" class="col-sm-3 control-label">省网告知流水号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="swgz" name="swgz" placeholder="">							
						</div>
							<label for="gdzb" class="col-sm-3 control-label">工地自编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gdzb" name="gdzb" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sbcqbah" class="col-sm-3 control-label">设备产权备案号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sbcqbah" name="sbcqbah" placeholder="备案号">							
						</div>
							<label for="cs7" class="col-sm-3 control-label">首次登记日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cs7" name="cs" placeholder="2016/01/01">
						</div>
					</div>
					<div class="form-group">
						<label for="xh" class="col-sm-3 control-label">型号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xh" name="xh" placeholder="">
						</div>
						
						<label for="zzdw" class="col-sm-3 control-label">制造单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zzdw" name="zzdw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="jwd" class="col-sm-3 control-label">出厂日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jwd" name="jwd" placeholder="">
						</div>
						
						<label for="wcfw" class="col-sm-3 control-label">出厂编号：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wcfw" name="wcfw" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="cqdw" class="col-sm-3 control-label">产权单位名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="cqdw" name="cqdw" placeholder="">
						</div>
						
						<label for="zdqzj" class="col-sm-3 control-label">最大起重力矩 (kN*m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqzj" name="zdqzj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sjzd" class="col-sm-3 control-label">设计最大起升高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="sjzd" name="sjzd" placeholder="">							
						</div>
						<label for="bglz" class="col-sm-3 control-label">本工程最大使用高度(m)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="bglz" name="bglz" placeholder="">							
						</div>
					</div>
					<div class="form-group">
						<label for="zdqz" class="col-sm-3 control-label">最大起重量(KN)：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="zdqz" name="zdqz" placeholder="">							
						</div>
						<label for="gd" class="col-sm-3 control-label">状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" readonly="readonly" id="gd" name="gd" value="登记中">
						</div>
						<div>
								 
								<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							
							<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
							<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
								<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
											<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
								<?php
													}
													$conn->close();		
												?>
						</div>
					</div>
					
					<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				     </div>
					
					<div class="modal-footer" >
									<button type="button" class="btn btn-default " data-dismiss="modal">关闭
									</button>
									<button id="save6" type="button" onclick="window.location.reload()" class="btn btn-primary ">
										提交保存
									</button>
									<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
								</div>
					</form>
								</div>
							</div><!-- /.modal-content -->
						 
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
								         <th>起重机械名称</th>
								         <th>省网告知流水号</th>
								         <th>规格型号</th>
								         <th>制造单位</th>
								         <th>出厂日期</th>
								         <th>出厂编号</th>
								         <th>设备产权备案号</th>
								         <th>登记日期</th>
								         <th>状态</th>
								         <th  class="text-center col-lg-6">操作</th>
								      </tr>
								   </thead>
								   <tbody>
								     <?php
                   						require("../conn.php");
                   						$sql = "select * from 设备管理 where 设备状态='安装中'and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
                  						<td><?php echo $row["起重机械名称"];?></td>
						                <td><?php echo $row["省网告知流水号"];?></td>
						                <td><?php echo $row["规格型号"];?></td>
						                <td><?php echo $row["生产制造单位"];?></td>
						                <td><?php echo $row["出厂日期"];?></td>
						                <td><?php echo $row["出厂编号"];?></td>
						                <td><?php echo $row["设备产权备案号"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["设备状态"];?></td>
										        <td>
								         			<div class="row">
								         				<a href="sbglxg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>"><button type="button" class="btn btn-primary">修改</button></a>            
								         				<input id="sbid1" value="<?php echo $row["id"];?>" class="hidden" />
								         				<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="使用中" class="btn btn-primary">审核</button>
								         	  		<button id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="登记中" type="button" class="btn btn-primary">撤销</button>
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
								         				<input id="sbid2" value="<?php echo $row["id"];?>" class="hidden" />
								         				<button id="<?php echo $row["id"];?>" value="已拆卸" onclick="dianji(this.id,this.value);" class="btn btn-primary">审核</button>
								         	  		<button type="button" id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="安装中" class="btn btn-primary">撤销</button>
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
                   						$sql = "select * from 设备管理 where 设备状态='已拆卸' and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   		?>
                   						<tr class="">
                   						<td><a href="../ProjectPlus/Project_in.html"><?php echo $row["工程名称"];?></a></td>
						                <td><?php echo $row["起重机械名称"];?></td>
						                <td><?php echo $row["省网告知流水号"];?></td>
						                <td><?php echo $row["工地自编号"];?></td>
						                <td><?php echo $row["设备产权备案号"];?></td>
						                <td><?php echo $row["规格型号"];?></td>
						                <td><?php echo $row["生产制造单位"];?></td>
						                <td><?php echo $row["出厂日期"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["设备状态"];?></td>
										        <td>
								         			<div class="row">
								         				<a href="sbglxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
								         				<input id="sbid3" value="<?php echo $row["id"];?>" class="hidden" />
								         	  		<button type="button" id="<?php echo $row["id"];?>" onclick="dianji(this.id,this.value);" value="使用中" class="btn btn-primary">撤销</button>
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
			
		$("#save0").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform0').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
			
			$("#save1").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform1').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
			
			$("#save2").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform2').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
			
			$("#save3").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform3').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
			
			$("#save4").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform4').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
			
			$("#save5").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform5').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  

		$("#save6").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform6').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
				$("#save7").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'sbglbc.php',
			                data:$('#sbglform7').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert("保存成功");
			                }
			            });
			});  
		</script>
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    
		<script type="text/javascript">		
								function dianji(sbid,sbzt){
									
							$.ajax({
			        	url:'sbglsh.php',
			        	type:'post',
			        	dataType:'json',
			        	data:{
			        		sbzt:sbzt,
							    sbid:sbid
			        	},
			        	success:function(data){
			        		if (data.result=='success') {
			        			window.location.reload();
			            }
			         },
			         error:function(xhr,type,errorThrown){
			         	alert('ajax错误'+type);
			         }
        });
						};		
			$("#shenhe").bind("click",function(){					
					var sbzt=document.getElementById("shenhe"); 
					var sbid=document.getElementById("sbid"); 
//					alert (sbzt.getAttribute("value"));
//					
			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt.getAttribute("value"),
				    sbid:sbid.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
      });
				$("#shenhe1").bind("click",function(){					
					var sbzt1=document.getElementById("shenhe1"); 
					var sbid1=document.getElementById("sbid1"); 
					//alert (sbid1.getAttribute("value"));

			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt1.getAttribute("value"),
				    sbid:sbid1.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
			 });
			 
			 $("#shenhe2").bind("click",function(){					
					var sbzt2=document.getElementById("shenhe2"); 
					var sbid2=document.getElementById("sbid2"); 
					//alert (sbid1.getAttribute("value"));

			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt2.getAttribute("value"),
				    sbid:sbid2.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
			 });
			 $("#chexiao1").bind("click",function(){					
					var sbzt1=document.getElementById("chexiao1"); 
					var sbid1=document.getElementById("sbid1"); 
					//alert (sbid1.getAttribute("value"));

			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt1.getAttribute("value"),
				    sbid:sbid1.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
			 });
			  $("#chexiao2").bind("click",function(){					
					var sbzt2=document.getElementById("chexiao2"); 
					var sbid2=document.getElementById("sbid2"); 
					//alert (sbid1.getAttribute("value"));

			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt2.getAttribute("value"),
				    sbid:sbid2.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
			 });
			 $("#chexiao3").bind("click",function(){					
					var sbzt3=document.getElementById("chexiao3"); 
					var sbid3=document.getElementById("sbid3"); 
					//alert (sbid1.getAttribute("value"));

			     $.ajax({
        	url:'sbglsh.php',
        	type:'post',
        	dataType:'json',
        	data:{
        		sbzt:sbzt3.getAttribute("value"),
				    sbid:sbid3.value
        	},
        	success:function(data){
        		if (data.result=='success') {
        			window.location.reload();
            }
         },
         error:function(xhr,type,errorThrown){
         	alert('ajax错误'+type);
         }
        });
			 });
		</script>
		<script type="text/javascript">
			
	
			 function goback(){
			 		window.location.href="sbgl.php";
			}
		</script>
<script type="text/javascript">
    $(function() {
        $(".lii").click(function() {
            //          第一种方法
             $(".lii").removeClass("active");//删除指定的 class 属性
             $(this).addClass("active");//向被选元素添加一个或多个类
             $(this).toggleClass("active");//该函数会对被选元素进行添加/删除类的切换操作
            var text = $(this).text();//获取当前选中的文本
            //或者使用第二种方法
//          $(this).addClass("active").siblings().removeClass("active");
        });
        
        
        $(".lii0").click(function() {
             
             $("#xmxz0").removeClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
             $("#xmxz7").addClass("my_none")

        })
        $(".lii1").click(function() {
        	
              $("#xmxz1").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            $("#xmxz7").addClass("my_none")
              
        });
        $(".lii2").click(function() {
        	
              $("#xmxz2").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz1").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            $("#xmxz7").addClass("my_none")
        });
        $(".lii3").click(function() {

               $("#xmxz3").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            $("#xmxz7").addClass("my_none")
        });
        $(".lii4").click(function() {          
             $("#xmxz4").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            $("#xmxz7").addClass("my_none")
             
        });
         $(".lii5").click(function() {          
             $("#xmxz5").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz6").addClass("my_none");
             $("#xmxz7").addClass("my_none")
             
        });
         $(".lii6").click(function() {          
             $("#xmxz6").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz4").addClass("my_none")
             $("#xmxz7").addClass("my_none");
           
        });
          $(".lii7").click(function() {          
             $("#xmxz7").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz4").addClass("my_none")
             $("#xmxz6").addClass("my_none");
           
        });
	
    })
</script>

<script type="text/javascript">
    function dianji2(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'sbglsc.php',
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
     </script>

<script type="text/javascript">
   
    jeDate({
		dateCell:"#cs",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})

    jeDate({
		dateCell:"#cs1",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	
	 jeDate({
		dateCell:"#cs2",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#cs3",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#cs4",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#cs5",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#cs6",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	jeDate({
		dateCell:"#cs7",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
</script>
  </body>
</html>
