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
          <a class="navbar-brand" href="../index.php">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">项目管理</a></li>
            <li><a href="../seclect.php">综合查询</a></li>
            <li><a href="../system.php">系统管理</a></li>
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
    						<a>集团公司</a>
    						<ul class="nav">
    							<!--<li><a>分公司1</a></li>
    							<li><a>分公司2</a></li>
    							<li><a>分公司3</a></li>
    							<li><a>分公司4</a></li>-->
    						</ul>
    					</li>    				 				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
				 <div id="xmdj" class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title ">项目信息</h3>
					</div>
					<div class="panel-body">
					
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="jbxx">
								<p></p>
<!--								<form id="xmdjform" action="bc1.php" method="post" enctype="multipart/form-data" class="form-horizontal cmxform" role="form">-->
									<form id="xmdjform" action="bc1.php" method="post" enctype="multipart/form-data" class="form-horizontal cmxform" role="form">
									<div class="form-group hidden">
				                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
				                        <div class="col-lg-6">
				                           <input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
				                        </div>
				                    </div>
				                    <div class="form-group hidden">
				                      <label for="sqlflag" class="control-label col-lg-2">sqlflag：</label>
				                        <div class="col-lg-6">
				                          <input id="sqlflag" name="sqlflag" class="form-control"  size="16" type="text" value="insert" />
				                        </div>
				                    </div>
				          <div class="panel-heading">
										<h3 class="panel-title label label-info">基本信息</h3>
									</div>
									<div class="form-group">
										<label for="gcmc" class="col-sm-2 control-label">工程名称：</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="gcmc"  name="gcmc" value="" placeholder="工程名称">
											<input type="text" class="form-control hidden" id="yhid"  name="yhid" value="<?php $yhid=$_GET["yhid"]; echo $yhid;?>" >
										</div>
									</div>
									<div class="form-group">
										<label for="xmlb" class="col-sm-2 control-label">工程类别：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="xmlb"  name="xmlb" value=""  placeholder="项目类别">
										</div>
										<label for="ssgs" class="col-sm-2 control-label">所属公司：</label>
										<div class="col-sm-3">
											<!--<input type="text" class="form-control" id="ssgs"  name="ssgs" value=""  placeholder="所属公司">-->
										
											<select id="ssgs" name="ssgs" class="form-control">
													<?php
						                   require("../conn.php");
						                   $sql = "select * from 公司部门  ";
						                   $result = $conn->query($sql);
						                   while($row = $result->fetch_assoc()) {    					
						               ?>
													<option><?php echo $row["部门"];?></option>
													 <?php
														}
														$conn->close();	
													 ?>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label for="gcwz" class="col-sm-2 control-label">工程位置：</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="gcwz" name="gcwz" value="" placeholder="工程位置">							
										</div>
									</div>
									<div class="form-group">
										<label for="jwd" class="col-sm-2 control-label">经纬度：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jwd" name="jwd" value="" placeholder="点击下方地图获取" readonly="readonly">
											<p class="help-block">注：本数据作为签到区域圆心</p>
										</div>
										
										<label for="wcfw" class="col-sm-2 control-label">误差范围(km)：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="wcfw" name="wcfw" value="" placeholder="误差范围">
											<p class="help-block">注：本数据作为签到区域半径</p>
										</div>
									</div>
									<div class="form-group">
										<label for="jzmj" class="col-sm-2 control-label">建筑面积：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jzmj" name="jzmj" value="" placeholder="建筑面积">
										</div>
										
										<label for="cs" class="col-sm-2 control-label">层数(层)：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="cs" name="cs" value="" placeholder="层数">
										</div>
									</div>
									<div class="form-group">
										<label for="gd" class="col-sm-2 control-label">高度(m)：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="gd" name="gd" value="" placeholder="高度">
										</div>
										
										<label for="jksd" class="col-sm-2 control-label">基坑深度(m)：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jksd" name="jksd" value=""  placeholder="基坑深度">
										</div>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">管理人员</h3>
									</div>
									<div class="form-group">
										<label for="xmjl" class="col-sm-2 control-label">项目经理：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="xmjl" name="xmjl" placeholder="项目经理">
										</div>
										<label for="aqzg" class="col-sm-2 control-label">安全总监：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="aqzg" name="aqzg" placeholder="安全总监">
										</div>
									</div>
									<div class="form-group">
										<label for="aqy" class="col-sm-2 control-label">安全员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="aqy" name="aqy" placeholder="安全员">
										</div>
										<label for="jjgly" class="col-sm-2 control-label">机械管理员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jjgly" name="jjgly" placeholder="机械管理员">
										</div>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">责任人</h3>
									</div>
									<div class="form-group">
										<label for="zrrxx" class="col-sm-2 control-label">责任人：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zrrxx" name="zrrxx" placeholder="责任人名字">
										</div>
										<label for="lxfs" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="lxfs" name="lxfs" placeholder="手机">
										</div>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">备案资料与形象进度</h3>
									</div>
										<div class="form-group">
										<label for="sgxkzqdqk" class="col-sm-3 control-label">施工许可证取得情况：</label>
										<div class="col-sm-2">
											<select id="sgxkzqdqk" name="sgxkzqdqk" class="form-control">
												<option>已取得</option>
												<option>备案中</option>
												<option>未备案</option>								
											</select>
										</div>

										<label for="gcxxjd" class="col-sm-2 control-label">形象进度：</label>
										<div class="col-sm-3">
											<select id="gcxxjd" name="gcxxjd" class="form-control">
												<option>在建</option>
												<option>竣工</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="kgbg" class="col-sm-3 control-label">开工报告：</label>
										<div class="col-sm-7">
											<textarea class="form-control" rows="5" id="kgbg" name="kgbg"></textarea>
										</div>
									</div>
									<div class="form-group">						
										<div class="col-sm-offset-3 col-sm-7">							
											<p class="help-block col-xs-12 col-md-6">开工报告附件上传</p>
											<!--<input type="file" id="kgbgfjsc" name="kgbgfjsc" class=" col-xs-12 col-md-6">-->
											<input type="file" name="file" id="file" value=""><br>
										</div>
									</div>
									<!--<button id="save5" type="button" onclick="window.history.back(-1);" class="btn btn-primary col-sm-offset-9">保存</button>-->
									<input type="submit" id="save5" onclick="" class="btn btn-primary col-sm-offset-9" name="submit" value="保存">
								</form>
								<div id="allmap"></div>
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
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p5qT2V6OajYx5sTtmqco3kARG2wQeuo8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    	$("footer").load("../footer.html");
    
    });
    </script>
    
<script src="../js/ProjectPlus/table.js"></script>
<script src="../js/Other/baiduMap.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var mytime = function() {
					var myDate=new Date();
					var mytime=myDate.getTime();
					$("#sjc").val(mytime);
				};
				});
</script>
<!--<script type="text/javascript">
$("#save5").click(function(){ 
    $.ajax({ 
        url:'bc1.php', 
        type:"POST", 
        data:$('#xmdjform').serialize(),
        success: function(data) { 
            $("#result").text(data); 
        } 
         
    }); 
});  
</script>-->
  </body>
</html>