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
			   					 	<li><a href="gcxx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">工程信息维护</a></li>
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
    							<li><a href="bianhao.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">整改通知书编号维护</a></li>
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
    							<li ><a href="yhgl.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">用户管理维护</a></li>
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
			   						require("../conn.php");
										$yhid=$_GET["yhid"];
			   						$sql6 = "select * from 用户信息   where id='$yhid' and 权限 LIKE '%数据库备份与恢复%'";
										$result = $conn->query($sql6);
	                  $count=mysqli_num_rows($result);	
										if ($result->num_rows > 0) {
	   					    ?>
    							
    							<li class="active"><a href="sjk.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">数据库备份与恢复</a></li>
									<?php
										}
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
    					
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			<div class="panel panel-info">
    				<div class="panel-heading">
    					<h3 class="panel-title">数据库备份与恢复</h3>
    				</div>
    				<div>
    							<!--<p></p>
    							<div class="jumbotron btn-group-lg" >
    							<p>数据库备份:</p>
    							<p>右键数据库（hxadmin）,点击转储SQL文件→结构和数据→选择存放位置→完成备份</p>
									<p>&nbsp;</p>
									<p>数据库还原:</p>
    							<p>右键数据库（hxadmin）,点击运行SQL文件→选择导入位置→完成导入</p>
									<img src="../img/sjk.jpg">
									</div>
    							<p></p>
								</div>-->
							<p></p>
    					<div class="jumbotron btn-group-lg" >
								<form id="xmdjform" action="dateajax.php" method="post" enctype="multipart/form-data" class="form-inline" role="form">
									<div class="form-group col-md-6">
										<input name="bak" id="bak" value="bak" hidden="hidden"/>
										<input name="userId" id="userId" value="" hidden="hidden"/>
								    <input type="submit" id="bakDatebase" onclick="" class="btn btn-primary col-sm-offset-4" name="submit" value="数据库备份">
								  </div>
								  <div class="form-group  col-md-6">
								    <input type="button" id="recoverDatebase" class="btn btn-primary col-sm-offset-4" name="recover"  data-toggle="modal" data-target="#myModal" value="数据库还原">
								  </div>
										<!--<input type="submit" id="saveSave" onclick="" class="btn btn-primary col-sm-offset-4" name="submit" value="数据库还原">
										<input type="submit" id="saveSave" onclick="" class="btn btn-primary col-sm-offset-6" name="submit" value="数据库备份">-->
					      </form>
							</div>
    					<p></p>
    			</div>
    		</div><!-- 内容区域 -->
    		<!-- 模态框（Modal） -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">数据库还原</h4>
								</div>
								<div class="modal-body">
									<form id="formID" action="dateajax.php" method="post" enctype="multipart/form-data" role="form">
										<div class="form-group ">
											<label for="dept" class="col-sm-4 control-label">文件名称：</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="dateSelect" name="dateSelect" placeholder="请选择要还原的数据库文件" >
											</div>
										</div>
										<div class="form-group hidden">
												<input name="bak" id="recover" value="recover"/>
												<input name="userId" id="userIdR" value=""/>
										</div>
										<?php 
												$dir = "backup/"; // 文件夹的名称
												if (is_dir($dir)){
												  if ($dh = opendir($dir)){
												    while (($file = readdir($dh)) !== false){
												      echo "<input type='radio' name='sex' value='".$file."' />文件名: ".$file."<br/>";
												    }
												    closedir($dh);
												  }
												}
										?>
										<div class="modal-footer" >
											<button type="button" class="btn btn-default " data-dismiss="modal">关闭
											</button>
											<button id="present" type="button"  class="btn btn-primary">
												选择此文件
											</button>
											<input type="submit" id="readllyRecoverDatebase" onclick="" class="btn btn-primary col-sm-offset-4 hidden" name="submit" value="还原数据库">
										</div>
									</form>
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
	    	$("footer").load("../footer.html");
	   		;
	    });
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
			//获取url参数
			//获取url参数值
			function geturl(name){
				var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
				var r = window.location.search.substr(1).match(reg);
				if(r!=null)return  unescape(r[2]);
				return null;
			}
			
			var userId=document.getElementById("userId");
			var userIdR=document.getElementById("userIdR");
			(function(){
				//获取url参数
				var yhId=geturl("yhid");	
				userId.value=yhId;	
				//userIdR.value=yhId;	
			}()); 
			
			
			//还原数据库
			var present=document.getElementById("present");
			var readllyRecoverDatebase=document.getElementById("readllyRecoverDatebase");
			var dateSelect=document.getElementById("dateSelect");
			present.addEventListener("click",function(){
				 var msg = "您真的确定选择此数据库文件吗？";  
         if (confirm(msg)==true){  
            //获取单选框中的值
						var obj = document.getElementsByTagName("input");
						for(var i=0; i<obj.length; i ++){
							if(obj[i].checked){
								//alert(obj[i].value);
								dateSelect.value=obj[i].value;
								userIdR.value=obj[i].value;
								//window.location.reload()
		        	}
		       	}
		        readllyRecoverDatebase.classList.remove("hidden");
		        present.classList.add("hidden");
         }else{  
          	alert("false");  
         } 
			});
    </script>

    
  </body>
</html>