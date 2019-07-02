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
										  $gcid=$_GET["gcid"];
										  require("../conn.php");
											$sql = "select id,工程名称 from 我的工程 where id='$gcid' ";
//											$sql = "select id,工程名称 from 我的工程 ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {					
                     ?>
											<?php
												}
												$conn->close();									
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
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>">设备管理</a></li>
    							<li class="active" ><a href="xczg.php?id=<?php echo $row["id"];?>">巡查整改</a></li>
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
    									
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			<?php
//				echo $_GET["id"];
				  $id=$_GET["id"];
//				  $sjc=$_GET["sjc"];
	//			$tzdbh=$_GET["tzdbh"];
				  require("../conn.php");
					$sql = "select * from 通知单 where id='$id' ";
									$result = $conn->query($sql);
									while($row = $result->fetch_assoc()) {
	             					
	 				?>
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">巡查整改-<?php echo $row["违章状态"];?>-<?php echo $row["工程名称"];?></h3>
	</div>
	
		<div class="tab-content">
	
			 <div role="tabpanel" class="tab-pane fade in active" id="cg">
				
			<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					
    				<!--	<table id="">-->
					<form class="form-horizontal" role="form"  id="cgbhform" name="cgbhform" action="cgbhbc.php" method="post">
					<div class="form-group">

						<label for="tzdbh" class="col-sm-2 control-label">通知单编号：</label>
						<div class="col-sm-3">
							 <input type="text" class="form-control" id="tzdbh" name="tzdbh" value="<?php echo $row["通知单编号"];?>" placeholder="6032564">
							 	<input type="text" class="form-control hidden" id="sjc" name="sjc" value="<?php echo $row["时间戳"];?>" >
							 <input type="text" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>"/>
						</div>
							
						<label for="gcmc" class="col-sm-2 control-label"  >工程名称：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="gcmc" name="gcmc"  value="<?php echo $row["工程名称"];?>" placeholder="6032564">
						</div>
					</div>
					<div class="form-group">
						<label for="jccj" class="col-sm-2 control-label"  >检查层级：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jccj" name="jccj" value="<?php echo $row["检查层级"];?>" placeholder="韶关一建">
						</div>
						<label for="xclb" class="col-sm-2 control-label">巡查类别：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="xclb" name="xclb" value="<?php echo $row["巡查类别"];?>" placeholder="韶关一建">
						</div>
					</div>
					<div class="form-group">
						<label for="wzzt" class="col-sm-2 control-label">违章状态：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wzzt" name="wzzt" value="<?php echo $row["违章状态"];?>" placeholder="705">
						</div>
						<label for="jcdw" class="col-sm-2 control-label">检查单位：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jcdw" name="jcdw" value="<?php echo $row["检查单位"];?>" placeholder="质量">
						</div>
					</div>
					<div class="form-group">
						<label for="jcdx" class="col-sm-2 control-label">检查对象：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jcdx" name="jcdx" value="<?php echo $row["检查对象"];?>" placeholder="质量">
						</div>
						<label for="jclx" class="col-sm-2 control-label">检查类型：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jclx" name="jclx" value="<?php echo $row["检查类型"];?>" placeholder="2016/12/02">
						</div>
					</div>
					<div class="form-group">
						<label for="wzdl" class="col-sm-2 control-label">违章大类：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="wzdl" name="wzdl" value="<?php echo $row["违章大类"];?>" placeholder="质量">
						</div>
						<label for="jcrq" class="col-sm-2 control-label">检查日期：</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" id="jcrq" name="jcrq" value="<?php echo $row["检查日期"];?>" placeholder="2016/12/02">
						</div>
					</div>
					<div class="form-group">
						<!--<h3><span class="label label-info col-sm-2 col-md-offset-1">图片附件</span></h2>
						<h3><span class="label label-info col-md-2 ">违章条目</span></h2>
						<h3><span class="label label-info col-md-2 col-sm-offset-1">回复附件</span></h2>	
						<h3><span class="label label-info col-md-2 col-sm-offset-1">回复</span></h2>-->
						<button type="button" class="btn btn-info btn-lg col-sm-offset-1" disabled="disabled">图片附件</button>
						<button type="button" class="btn btn-info btn-lg col-sm-offset-1" disabled="disabled">违章条目</button>
						<button type="button" class="btn btn-info btn-lg col-sm-offset-2" disabled="disabled">回复附件</button>
						<button type="button" class="btn btn-info btn-lg col-sm-offset-2" disabled="disabled">&nbsp;回复&nbsp;</button>						
					</div>
					<div class="form-group">
						
						<div id="imgCreat" class="col-md-3 ">
							<!--<img class="img-responsive" src="upload/<?php echo $row["图片附件"];?>"  class="img-responsive" alt="Cinque Terre">-->
						</div>
						<div class="col-md-3" id="wztmcreat"></div>
						<div class="col-md-3" id="hffjcreat"></div>
						<div class="col-md-3" id="hfcreat"></div>
					</div>
					
					
					<!--<div class="form-group">						
						<div class="col-sm-offset-1 col-sm-7">							
							<p class="help-block col-xs-12 col-md-2">违章附件上传</p>
							<input type="file" id="kgbgfjsc" name="kgbgfjsc" class=" col-xs-12 col-md-6">
						</div>-->
						          
					<!--<button id="save7" type="button" class="btn btn-primary col-sm-offset-9">保存</button>-->
					<h1>&nbsp;</h1>
					<input type="submit" class="btn btn-primary col-sm-offset-10" name="submit" value="保存">
				</form>
				<?php
					}
					$conn->close();
									
				?>
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
    
    <script src="../js/service.js"></script>
    
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
    	//var imgCreat=document.getElementById("imgCreat");
    	//动态创建整改管理中的整改中的图片
			var createimg=function(tpmc,wztm,i) {	
				var wztm=wztm; 
				var tpmc=tpmc;				
				var num=i;
				if(tpmc!=""){
				var mysrc=url+"upload/"+tpmc;
			}else{
				var mysrc="../img/noimage.png";
			}
			//alert(wztm);
					
			var imgCreat=document.getElementById("imgCreat");
			var img=document.createElement('img');
			img.id="fw"+num;
			img.className="img-responsive img-rounded ";
			img.src=mysrc;
			imgCreat.appendChild(img);
					
			var wztmcreat=document.getElementById("wztmcreat");
			var input=document.createElement('textarea');
			input.className="form-control ";
			input.rows="7";
			input.value=wztm;
			wztmcreat.appendChild(input);
			
	};	
    	
    	var sjc=document.getElementById("sjc");
    	$.ajax({
        url:'my_chang_manage.php',
        type:'post',
          dataType:'json',
        data:{
          sjc:sjc.value,
          zggllx:'chufa'
        },
        success:function(data){
//        alert(data);
          var length=data.length;
					for (var i=0;i<length-1;i++) {
						id=data[i].id;
						wztmnr=data[i].内容.split("||");
						cgfj=data[i].草稿附件.length;
						if(cgfj!=0){
							cgfj=data[i].草稿附件.split("~*^*~");
							for (var i=0;i<cgfj.length-1;i++) {
								i+=0;
								createimg(cgfj[i],wztmnr[i],i);
							}
						}else{
							for (var i=0;i<wztmnr.length-1;i++) {
								createimg('','',i);
							}
						}
					}
        },
        error:function(xhr,type,errorThrown){
          alert('ajax错误'+type+'---'+errorThrown);
        }
            		
     });
     var createimg1=function(hffj,hf,i) {	
				var hffj=hffj; 
				var hf=hf;
				var num=i;
				if(hffj!=""){
				var mysrc=url+"upload/"+hffj;
			}else{
				var mysrc="../img/noimage.png";
			}
			//alert(wztm);
					
					
			var hffjcreat=document.getElementById("hffjcreat");
			var img=document.createElement('img');
			img.id="fw"+num;
			img.className="img-responsive img-rounded ";
			img.src=mysrc;
			hffjcreat.appendChild(img);
						
			var hfcreat=document.getElementById("hfcreat");
			var input=document.createElement('textarea');
			input.className="form-control ";
			input.rows="7";
			input.value=hf;
			hfcreat.appendChild(input);
	};
     $.ajax({
        url:'hfnrht.php',
        type:'post',
          dataType:'json',
        data:{
          sjc:sjc.value,
          zggllx:'zhenggai'
        },
        success:function(data){
//        alert(data);
           var length=data.length;
					for (var i=0;i<length-1;i++) {
						id=data[i].id;
						hf=data[i].项目部回复.split("||");
						hffj=data[i].回复附件.length;
						if(hffj!=0){
							hffj=data[i].回复附件.split("~*^*~");
							for (var i=0;i<hffj.length-1;i++) {
								i+=0;
								createimg1(hffj[i],hf[i],i);
							}
						}else{
							for (var i=0;i<hf.length-1;i++) {
								createimg1('','',i);
							}
						}
					}
        },
        error:function(xhr,type,errorThrown){
          alert('ajax错误'+type+'---'+errorThrown);
        }
            		
     });
		</script>
  </body>
</html>

