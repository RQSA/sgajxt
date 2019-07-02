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
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
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
			   					 	<li class="active"><a href="gcxx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">工程信息维护</a></li>
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
    							<li><a href="yhgl.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">用户管理维护</a></li>
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
    					<li>
    						<!--<a>系统管理</a>
   						 <ul class="nav">
    							<li><a href="yhgl.html">用户管理</a></li>
    							<li><a href="dxgl.html">短信管理</a></li>
    							<li><a href="xtxx.html">系统信息与数据库维护</a></li>
    							<li><a href="../ProjectPlus/youqinglianjie.html">友情链接</a></li>    							
    						</ul>-->
    					</li>
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    			<!-- 内容区域 -->
    		<div class="col-md-10">
    		<div id="gclb" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">工程列表</h3>
	</div>
	<div class="panel-body">
		<!-- 表格自定义按钮 -->
		<!--<div id="toolbar" class="btn-group">
			  <button id="buttonxmbj" type="button" class="btn btn-default">
				<i class="glyphicon glyphicon-plus"> 项目登记</i>
			</button>
			<a class='btn btn-default' href="xxmdj.php"><i class="glyphicon glyphicon-plus"> 项目登记</i></a>
		</div>-->
		<table id="table_gclb">
			<thead>
				<tr>
					<th data-sortable="true" data-field="ID">ID</th>
					<th data-sortable="true" data-field="工程名称">工程名称</th>
					<th data-field="项目类别">项目类别</th>
					<th data-field="形象进度">形象进度</th>
					<!--<th data-field="审核结果">审核结果</th>
					<th data-sortable="true" data-field="整改">整改</th>
					<th data-sortable="true" data-field="扣分">扣分</th>
					<th data-sortable="true" data-field="停工">停工</th>-->
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
                   <tr class="">
                   <td><?php echo $row["id"];?></td>
                   <!--<td><a href="ProjectPlus/Project_in.php？id='+<?php echo $row["工程名称"];?>+'"><?php echo $row["工程名称"];?></a></td>-->
                   <td><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"]; ?>"><?php echo $row["工程名称"];?></a></td>
                   <td><?php echo $row["项目类别"];?></td>
                   <td><?php echo $row["形象进度"];?></td>
                   <!--<td><input type="button" id="<?php echo $row["id"];?>" class="btn btn-default" onclick="shanchu(this.id);" value="删除"></td>-->
                   <td>
                   	 	<button id="<?php echo $row["id"];?>" onclick="dianji(this.id);" type="button" class="btn btn-default">
                   	 		删除
                   	 	</button>
                   </td>
                   <!--<td><?php echo $row["审核结果"];?></td>
                   <td><?php echo $row["整改"];?></td>
                   <td><?php echo $row["扣分"];?></td>
                   <td><?php echo $row["停工"];?></td>-->
                   
                     
                   </tr>
                   <?php
											}
											$conn->close();
																						
										?>
			</tbody>
		</table>
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
    <script src="../js/ProjectPlus/table.js"></script>
   <!--js of bootstrap-table -->
   <script src="../js/bootstrap-table.min.js"></script>
   <!--js of bootstrap-table—export -->
   <script src="../js/export/tableExport.js"></script>
   <script src="../js/export/bootstrap-table-export.js"></script>
   <script src="../js/bootstrap-table-zh-CN.min.js"></script>
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p5qT2V6OajYx5sTtmqco3kARG2wQeuo8"></script>
    <script type="text/javascript">
	    $(document).ready(function() {
	    	$("footer").load("../footer.html");
	    	
	    
	    });
    </script>
    <script type="text/javascript">
				$("#scgcxx").click(function(){ 
									$.ajax({
							                cache: true,
							                type: "POST",
							                url:'gcxxsc.php',
							                data:$('#scbd').serialize(),// 你的formid
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
//							alert(id);
							$.ajax({
				                cache: true,
				                type: "POST",
				                url:'gcxxsc.php',
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
//			  $("#scgcxx").click(function(){ 
//			    $.ajax({ 
//			        url:'gcxxsc.php', 
//			        type:"POST", 
//			        data:$('#scbd').serialize(),
//			    
//			    }); 
//			});  
		</script>
    
  </body>
</html>
