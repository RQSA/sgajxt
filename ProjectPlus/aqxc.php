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
    		    				<?php
//										echo $_GET["id"];
										  $id=$_GET["id"];
										  require("../conn.php");
											$sql = "select * from 我的工程 where id='$id' ";
//											$sql = "select id,工程名称 from 我的工程 ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {					
                     ?>
											                    
    		<!--左侧导航菜单 -->
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目管理</a>
    						<ul class="nav">
    							<li  class="active"><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">巡查整改</a></li>
    							<li ><a href="zlsc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">质量实测</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">查询分析</a>
    						<ul class="nav">
									<li ><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">隐患通知单</a></li>
									<li ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    		<div id="xmdj" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">危险源详细填写-<?php echo $row["工程名称"];?></h3>
	</div>	<?php
												}
												$conn->close();									
											?> 
	<div class="panel-body">

		<div class="tab-content">
			
			
			<div role="tabpanel" class="tab-pane fade in active" id="wxyxx">
			
					<div class="panel-body">
							<div class="btn-group">
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1" ><i class="glyphicon glyphicon-plus"> 新建</i></button>
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										危险源类别
										<span class="caret"></span>
									</button>
									<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
										<li class="lii"><a href="#aqx7"  tabindex="-1" data-toggle="tab">全部类型</a></li>
										<li class=" lii"><a href="#aqx0" tabindex="-1" data-toggle="tab" >基坑支护及降水工程</a></li>
										<li class="lii"><a href="#aqx1"  tabindex="-1" tabindex="-1" data-toggle="tab" >土方开挖工程</a></li>
										<li class="lii"><a href="#aqx2"  tabindex="-1" data-toggle="tab">模板工程支撑体系</a></li>
										<li class="lii"><a href="#aqx3"  tabindex="-1" data-toggle="tab">脚手架工程</a></li>
										<li class="lii"><a href="#aqx4"  tabindex="-1" data-toggle="tab">起重吊装及安装拆卸工程</a></li>
										<li class="lii"><a href="#aqx5"  tabindex="-1" data-toggle="tab">拆除爆破工程</a></li>
										<li class="lii"><a href="#aqx6"  tabindex="-1" data-toggle="tab">其他危险性较大的工程</a></li>
									</ul>
							  </div>
							</div>
							<div class="tab-content">
								
								<div class="tab-pane fade in active" >
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>基坑面积</th>
								         <th>设计开挖深度</th>
								         <th>是否通过审核</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源   where 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["基坑面积"];?></td>
						                <td><?php echo $row["设计开挖深度"];?></td>
						                <td><?php echo $row["是否通过审核"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>&yhid=<?php $yhid=$_GET["yhid"];echo $yhid;?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
								
						<!--基坑支护及降水工程-->
							<div class="tab-pane fade"  id="aqx0">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>基坑面积</th>
								         <th>设计开挖深度</th>
								         <th>是否通过审核</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='基坑支护及降水工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["基坑面积"];?></td>
						                <td><?php echo $row["设计开挖深度"];?></td>
						                <td><?php echo $row["是否通过审核"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    			<!--土方开挖工程-->
    					<div class="tab-pane fade" id="aqx1">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源大类</th>
								         <th>施工部位</th>
								         <th>基坑面积</th>
								         <th>设计开挖深度</th>
								         <th>是否通过审核</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='土方开挖工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["基坑面积"];?></td>
						                <td><?php echo $row["设计开挖深度"];?></td>
						                <td><?php echo $row["是否通过审核"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<!--模板工程支撑体系-->
							<div class="tab-pane fade " id="aqx2">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>支模面积</th>
								         <th>支模高度</th>
								         <th>是否专家论证</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='模板工程支撑体系'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["支模面积"];?></td>
						                <td><?php echo $row["支模高度"];?></td>
						                <td><?php echo $row["是否专家论证"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<!--脚手架工程-->
							<div class="tab-pane fade"  id="aqx3">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>搭设高度</th>
								         <th>是否专家论证</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='脚手架工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["塔设高度"];?></td>
						                <td><?php echo $row["是否专家论证"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<!--起重吊装及安装拆卸工程-->
							<div class="tab-pane fade " id="aqx4">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>搭设高度</th>
								         <th>是否专家论证</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='起重吊装及安装拆卸工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["塔设高度"];?></td>
						                <td><?php echo $row["是否专家论证"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<!--拆卸爆破工程-->
							<div class="tab-pane fade " id="aqx5">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>二级类型</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='拆除爆破工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["二级类型"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<!--其他危险性较大的工程-->
							<div class="tab-pane fade " id="aqx6">
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>二级类型</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源 where 危险源类型='其他危险性较大的工程'  and 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">
                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["二级类型"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
    					<div class="tab-pane fade" id="aqx7" >
    					<table>
    						<thead>
								      <tr>
								         <!--<th>序号</th>
								         <th><input type="checkbox">选择</th>-->
								         <th>危险源类型</th>
								         <th>施工部位</th>
								         <th>基坑面积</th>
								         <th>设计开挖深度</th>
								         <th>是否通过审核</th>
								         <th>超过一定规模的危险性较大的分部分项工程</th>
								         <th>登记日期</th>
								         <th>使用状态</th>
								         <th>管理状态</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								      <?php
                   						require("../conn.php");
															$id=$_GET["id"];
                   						$sql = "select * from 危险源   where 工程id='$id'";
                   						$result = $conn->query($sql);
                   						while($row = $result->fetch_assoc()) {
                        					
                   						?>
                   						<tr class="">

                   						<!--<td><?php echo $row["工程id"];?></td>
                  						<td><input type="checkbox"></td>-->
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["施工部位"];?></td>
						                <td><?php echo $row["基坑面积"];?></td>
						                <td><?php echo $row["设计开挖深度"];?></td>
						                <td><?php echo $row["是否通过审核"];?></td>
						                <td><?php echo $row["超过一定规模的危险性较大的分部分项工程"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["使用状态"];?></td>
						                <td><?php echo $row["管理状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	
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
		<!-- 模态框（Modal） -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						
						<div class="modal-dialog">
							
							
							<!--<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post">-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										危险源详细填写
									</h4>
								</div>
								<div class="modal-body">
								
					<div>		  
					<div class="form-group">
						
						<div class="col-sm-8">
							<?php
       						require("../conn.php");
									 $id=$_GET["id"];
       						$sql = "select * from 我的工程 where  id='$id'";
       						$result = $conn->query($sql);
       						while($row = $result->fetch_assoc()) {
            					
   						?>
							<input type="text" class="form-control" id="" name="" placeholder="<?php echo $row["工程名称"];?>" value="工程名称：<?php echo $row["工程名称"];?>" readonly="readonly">
							
							
								<?php
													}
													$conn->close();		
												?>
						</div>
						<div class="btn-group">
									<button type="button  " class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										选择
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li class="lii lii0 "><a href="#xmxz0" tabindex="-1" data-toggle="tab">基坑支护及降水工程</a></li>
										<li class="lii lii1  " ><a href="#xmxz1" tabindex="-1" data-toggle="tab">土方开挖工程</a></li>
										<li class="lii lii2 "><a href="#xmxz2" tabindex="-1" data-toggle="tab">模板工程支撑体系</a></li>
										<li class="lii lii3 "><a href="#xmxz3" tabindex="-1" data-toggle="tab">脚手架工程</a></li>
										<li class="lii lii4"><a href="#xmxz4" tabindex="-1" data-toggle="tab">起重吊装及安装拆卸工程</a></li>
										<li class="lii lii5" ><a href="#xmxz5" tabindex="-1" data-toggle="tab">拆除爆破工程</a></li>
										<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">其他危险性较大的工程</a></li>
									</ul>
							  </div>
				
					</div>
					</div>
					<div class="form-group tab-pane fade my_none "  id="xmxz0">
						<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
							<div class="form-group ">
								
								<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="基坑支护及降水工程" readonly="readonly" >
									
								</div>
								
									<label for="jkmj" class="col-sm-3 control-label">基坑面积（㎡）：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="jkmj" name="jkmj" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>

								
							</div>
							<div class="form-group">
								
								
								<label for="overpg" class="col-sm-3 control-label">超过一定规模的危大工程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>
											</select>
										</div>
										
							<label for="kwsd" class="col-sm-3 control-label">设计开挖深度（m）：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="kwsd" name="kwsd" placeholder="" >
									
								</div>
								
										
							</div>
							<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="djtime" class="col-sm-3 control-label">登记日期：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="djtime" name="djtime" placeholder="">
										</div>
											<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
											</select>
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
											<button id="save10" type="button" onclick="window.location.reload()" class="btn btn-primary ">
												提交保存
											</button>
											<!--<input type="submit" id="save10"  onclick="goback()" class="btn btn-primary" value="提交保存">-->
							</div>
						</form>
					</div>
								
								
								<div class="form-group tab-pane fade my_none  "  id="xmxz1">
				<form id="aqxcform1" name="aqxcform" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="土方开挖工程" readonly="readonly" >
							
						</div>
						
							<label for="jkmj" class="col-sm-3 control-label">基坑面积（㎡）：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jkmj" name="jkmj" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
						</div>
						
						
							
						
					</div>
					<div class="form-group">
						<label for="tzpass" class="col-sm-3 control-label">是否通过审核：</label>
						<div class="col-sm-3">
								<select id="tzpass" name="tzpass" class="form-control">
												<option>是</option>
												<option>否</option>
                 
											</select>
							</div>
						
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危大工程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
										</div>
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						<label for="djtime1" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime1" name="djtime" placeholder="2016/12/5">
								</div>
								
								<label for="kwsd" class="col-sm-3 control-label">设计开挖深度（m）：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="kwsd" name="kwsd" placeholder="" >
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
					
										<div class="form-group">	
						
						
								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
				<form id="aqxcform2" name="aqxcform" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="模板工程支撑体系" readonly="readonly" >
								</div>
								
								<label for="djtime2" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime2" name="djtime" placeholder="2016/12/5">
								</div>
					</div>
					<div class="form-group ">
					<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>
						</div>		
					<div class="form-group">
						<label for="zmmj" class="col-sm-3 control-label">支模面积：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="zmmj" name="zmmj" placeholder="">
								</div>
						
						<label for="zmgd" class="col-sm-3 control-label">支模高度：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="zmgd" name="zmgd" placeholder="123456" >	
								</div>
					</div>
					<div class="form-group">
						<label for="zjlz" class="col-sm-3 control-label">是否专家论证：</label>
								<div class="col-sm-3">
											<select id="zjlz" name="zjlz" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
						</div>
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危大程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
										</div>
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						
							

								
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
					
										<div class="form-group">	
						
						
								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
				<form id="aqxcform3" name="aqxcform3" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="脚手架工程" readonly="readonly" >	
								</div>
								
								<label for="tsgd" class="col-sm-3 control-label">搭设高度(m)：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="tsgd" name="tsgd" placeholder=""  >
								</div>

					</div>
					<div class="form-group">
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>
												
						
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						<label for="zjlz" class="col-sm-3 control-label">是否专家论证：</label>
								<div class="col-sm-3">
											<select id="zjlz" name="zjlz" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
											</div>
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危大工程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
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
				     
					<div class="form-group">	
							<label for="djtime3" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime3" name="djtime" placeholder="2016/12/5">
								</div>
						
					

								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
				<form id="aqxcform4" name="aqxcform4" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="起重吊装及安装拆卸工程" readonly="readonly" >	
								</div>
								
								<label for="tsgd" class="col-sm-3 control-label">搭设高度(m)：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="tsgd" name="tsgd" placeholder=""   >
								</div>
					</div>
					<div class="form-group">
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>
						
						
						
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						<label for="zjlz" class="col-sm-3 control-label">是否专家论证：</label>
								<div class="col-sm-3">
											<select id="zjlz" name="zjlz" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
										</div>
						
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危险性较大的分部分项工程：</label>
						<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
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
					
					<div class="form-group">	
						
					<label for="djtime4" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime4" name="djtime" placeholder="2016/12/5">
								</div>
						
								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
				<form id="aqxcform5" name="aqxcform5" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="拆除爆破工程" readonly="readonly" >	
								</div>
								
								<label for="ejlx" class="col-sm-3 control-label">二级类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="ejlx" name="ejlx" placeholder=""  >
								</div>
					</div>
					<div class="form-group">
						
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>
						
						
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危险性较大的分部分项工程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
										</div>
						<label for="djtime5" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime5" name="djtime" placeholder="2016/12/5">
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
					
					<div class="form-group">	
						
						
								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
								
							
								
								
							<div class="form-group tab-pane fade my_none  "  id="xmxz6">
				<form id="aqxcform6" name="aqxcform6" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
					<div class="form-group ">
						
						<label for="wxlx" class="col-sm-3 control-label">危险源类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="wxlx" name="wxlx" placeholder="" value="其他危险性较大的工程" readonly="readonly" >	
								</div>
								
								<label for="ejlx" class="col-sm-3 control-label">二级类型：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="ejlx" name="ejlx" placeholder=""  >
								</div>
					</div>
					<div class="form-group">
						
						<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="sgbw" name="sgbw" placeholder="">							
								</div>
						
						
					</div>
					<div class="form-group">
								<label for="uses" class="col-sm-3 control-label">使用状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="uses" name="uses" placeholder="">
								</div>
								
								<label for="orgs" class="col-sm-3 control-label">管理状态：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="orgs" name="orgs" placeholder="">
								</div>
					</div>
					<div class="form-group">
						<label for="overpg" class="col-sm-3 control-label">超过一定规模的危险性较大的分部分项工程：</label>
										<div class="col-sm-3">
											<select id="overpg" name="overpg" class="form-control">
												<option>是</option>
												<option>否</option>

											</select>
										</div>
						<label for="djtime6" class="col-sm-3 control-label">登记日期：</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="djtime6" name="djtime" placeholder="">
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
					
						<div class="form-group">	
						
						
								
						<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
										<div class="col-sm-3">
											<select id="wxyzt" name="wxyzt" class="form-control">
												<option>使用中</option>
												<option>已关闭</option>
												
												
											</select>
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
					<!--	</form>-->
						</div><!-- /.modal -->
					</div>
				
				
			 </div>
			 
			
             
             
        
		
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

    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
			$("#save10").click(function(){ 
			//  $.ajax({ 
			//      url:'aqxcbc.php', 
			//      type:"POST", 
			//      data:$('#aqxcform').serialize(),
			//  
			//  }); 
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'aqxcbc.php',
			                data:$('#aqxcform').serialize(),// 你的formid
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
        <script type="text/javascript">
			$("#save1").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'aqxcbc.php',
			                data:$('#aqxcform1').serialize(),// 你的formid
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
			                url:'aqxcbc.php',
			                data:$('#aqxcform2').serialize(),// 你的formid
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
			                url:'aqxcbc.php',
			                data:$('#aqxcform3').serialize(),// 你的formid
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
			                url:'aqxcbc.php',
			                data:$('#aqxcform4').serialize(),// 你的formid
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
			                url:'aqxcbc.php',
			                data:$('#aqxcform5').serialize(),// 你的formid
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
			                url:'aqxcbc.php',
			                data:$('#aqxcform6').serialize(),// 你的formid
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
               
<script>
 function goback(){
 window.location.href="aqxc.php";
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
            

        })
        $(".lii1").click(function() {
        	
              $("#xmxz1").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            
              
        });
        $(".lii2").click(function() {
        	
              $("#xmxz2").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz1").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            
        });
        $(".lii3").click(function() {

               $("#xmxz3").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            
        });
        $(".lii4").click(function() {          
             $("#xmxz4").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz6").addClass("my_none");
            
             
        });
         $(".lii5").click(function() {          
             $("#xmxz5").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz4").addClass("my_none");
             $("#xmxz6").addClass("my_none");
             
             
        });
         $(".lii6").click(function() {          
             $("#xmxz6").removeClass("my_none");
              $("#xmxz0").addClass("my_none");
              $("#xmxz2").addClass("my_none");
             $("#xmxz3").addClass("my_none");
             $("#xmxz1").addClass("my_none");
             $("#xmxz5").addClass("my_none");
             $("#xmxz4").addClass("my_none");
           
        });
         
	
    })
</script>


<script type="text/javascript">
    function dianji2(id){
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'wxysc.php',
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
		dateCell:"#djtime",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})

    jeDate({
		dateCell:"#djtime1",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	
	 jeDate({
		dateCell:"#djtime2",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#djtime3",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#djtime4",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#djtime5",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	 jeDate({
		dateCell:"#djtime6",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
</script>




  </body>
</html>
