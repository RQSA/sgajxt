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
          <!--<?php
	   						require("../conn.php");
								$yhid=$_GET["yhid"];
	   						$sql = "select * from 用户信息   where id='$yhid'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>-->
          <a class="navbar-brand" href="../index.php?yhzh=<?php echo $row["账号"];?>">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
            <?php
								}
								$conn->close();		
						 ?>-->
          </ul>
        </div>
      </div>
    </nav>
    <div id="container" class="container">
    	<div class="row">
    		<!--左侧导航菜单 -->
    								
    		<!--<?php
//										echo $_GET["id"];
										  $id=$_GET["id"];
										  require("../conn.php");
											$sql = "select * from 我的工程 where id='$id' ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
                         					
                     ?>-->
                    <!--<?php
												}
												$conn->close();		
										 ?>					-->
    		<!--左侧导航菜单 -->
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<!--<li ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">设备管理</a></li>
    							<li class="active" ><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">隐患通知单</a></li>
    						</ul>
    					</li>	   				-->
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->

    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">图片查看</h3>
	</div>
	
		<div class="tab-content">
	
			 <div role="tabpanel" class="tab-pane fade in active" id="cg">
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    				<!--	<table id="">-->
					<form class="form-horizontal" role="form"  id="cghfform" name="cghfform" action="cghfbc.php" method="post">
						<div id="imgCreat" class="col-md-4 col-md-offset-1">
							<img class="img-responsive" src="" alt="Cinque Terre" style="width:150px;height:150px;">
						</div> 
						<input type="text"  id="cgmc" name="cgmc" class="form-control hidden" value=""/>
						<div class="col-md-offset-1" >
							<textarea id="xmbhf" cols="35" rows="10" style="width:150px;height:150px;">项目部回复：</textarea>
							<textarea id="fgspf" cols="35" rows="10" style="width:150px;height:150px;">分公司批复：</textarea>
							<textarea id="zgspf" cols="35" rows="10" style="width:150px;height:150px;">总公司批复：</textarea>
						</div> 
						<!--<div class="col-md-4 col-md-offset-1" >
							<textarea id="wztmTxt" cols="35" rows="10" style="width:150px;height:150px;"></textarea>
						</div>-->
						
						<!--<button id="save7" type="button" class="btn btn-primary col-sm-offset-9">保存</button>-->
						<h1>&nbsp;</h1>
						<!--<input type="submit" class="btn btn-primary col-sm-offset-10" name="submit" value="保存">-->
						<button id="tijiao" type="button" class="btn btn-primary col-sm-offset-9"  onclick="window.history.go(-2);">
							返回
						</button>
						<!--<input id="tijiao" class="btn btn-primary col-sm-offset-10" name="submit" value="保存">	-->
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
    
     <script>
     	var xmbhf=document.getElementById("xmbhf");
     	var fgspf=document.getElementById("fgspf");
     	var zgspf=document.getElementById("zgspf");
     	//js获取URL参数
     	//获取url参数值
		function geturl(name){
			var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if(r!=null)return  unescape(r[2]);
			return null;
		}
		//获取地址栏参数
		var tpmc=geturl("tpmc");
		var cgmc1=geturl("cgmc");
		var num=geturl("num");
		var sjc=geturl("sjc");
		
		//alert(sjc);
		
		var imgClass=document.getElementsByClassName("img-responsive"); //找到class
		var cgmc=document.getElementById("cgmc");
		//alert(imgClass.length);
		imgClass[0].setAttribute("src",tpmc);
		cgmc.value=cgmc1;
//			
//		//保存按钮监听事件
//		var tijiao=document.getElementById("tijiao");
//		tijiao.addEventListener('click',function(){
//			
//		});
//			
		//异步获取回复图片后台数据
		$.ajax({
			url:'my_chang_manage.php',
		    type:'post',
		    dataType:'json',
		    data:{
		    	sjc:sjc,
		    	flag:num,
		      	zggllx:'gspf'
		    },
		    success:function(data){
		      	//alert(data);
		        var length=data.length;
				for (var i=0;i<length-1;i++) {
					xmbhf.value="项目部回复："+data[i].项目部回复;
					fgspf.value="分公司批复："+data[i].分公司批复;
					zgspf.value="总公司批复："+data[i].总公司批复;
				}
			},
		    error:function(xhr,type,errorThrown){
		      	alert('ajax错误'+type+'---'+errorThrown);
		    }
		});
     </script>
  </body>
</html>

