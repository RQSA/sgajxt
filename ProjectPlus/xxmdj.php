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
											<select id="xmlb" name="xmlb" class="form-control">
												<option>建筑工程</option>
												<option>市政工程</option>
												<option>装修工程</option>
												<option>维修加固工程</option>
											</select>
										</div>
										<label for="ssgs" class="col-sm-2 control-label">所属公司：</label>
										<div class="col-sm-3">
											<!--<input type="text" class="form-control" id="ssgs"  name="ssgs" value=""  placeholder="所属公司">-->
										
											<select id="ssgs" name="ssgs" class="form-control" required="required">
												<option selected="selected" disabled="disabled"></option>
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
											<fieldset style="padding:7px;" >
											<select id="province5" name="province5"></select><select id="city5" name="city5"></select>
											</fieldset>
											<input type="text" class="form-control " id="gcwz" name="gcwz" value="" placeholder="工程位置">							
										</div>
									</div>
									<div class="form-group">
										<label for="jwd" class="col-sm-2 control-label">经纬度：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jwd" name="jwd" value="" placeholder="手动输入或点击下方地图获取">
											<p class="help-block">注：本数据作为签到区域圆心</p>
										</div>
										
										<label for="wcfw" class="col-sm-2 control-label">误差范围(km)：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="wcfw" name="wcfw" value="" placeholder="误差范围">
											<p class="help-block">注：本数据作为签到区域半径</p>
										</div>
									</div>
									<div class="form-group">
										<label for="jzmj" class="col-sm-2 control-label">建筑面积(㎡)：</label>
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
									<div class="form-group">
										<label for="kgday" class="col-sm-2 control-label">开工日期：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="kgday" name="kgday" value="" placeholder="xxxx/xx/xx">
										</div>
										
										<label for="jgday" class="col-sm-2 control-label">竣工日期：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jgday" name="jgday" value=""  placeholder="xxxx/xx/xx">
										</div>
									</div>
									<div class="form-group">
										<label for="ds" class="col-sm-2 control-label">栋数：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="ds" name="ds" value="" placeholder="栋数">
										</div>

									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">责任人</h3>
									</div>
									<div class="form-group">
										<label for="zrrxx" class="col-sm-2 control-label">责任人：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zrrxx" name="zrrxx" placeholder="责任人">
										</div>
										<label for="lxfs" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="lxfs" name="lxfs" placeholder="责任人手机">
										</div>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">项目部</h3>
									</div>
									<div class="form-group">
										<label for="xmjl" class="col-sm-2 control-label">项目经理：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="xmjl" name="xmjl" placeholder="项目经理">
										</div>
										<label for="glcall1" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="glcall1" name="glcall1" placeholder="项目经理手机">
										</div>
									</div>
									<div class="form-group">
										<label for="aqzg" class="col-sm-2 control-label">安全总监：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="aqzg" name="aqzg" placeholder="安全总监">
										</div>
										<label for="glcall2" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="glcall2" name="glcall2" placeholder="安全总监手机">
										</div>
									</div>
									<div class="form-group">
										<label for="aqy" class="col-sm-2 control-label">安全员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="aqy" name="aqy" placeholder="安全员">
										</div>
										<label for="glcall3" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="glcall3" name="glcall3" placeholder="安全员手机">
										</div>
									</div>
									<div class="form-group">
										<label for="jjgly" class="col-sm-2 control-label">机械管理员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="jjgly" name="jjgly" placeholder="机械管理员">
										</div>
										<label for="glcall4" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="glcall4" name="glcall4" placeholder="机械管理员手机">
										</div>
									</div>
									<div class="form-group">
										<label for="scjl" class="col-sm-2 control-label">生产经理：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="scjl" name="scjl" placeholder="生产经理">
										</div>
										<label for="scjllxfs" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="scjllxfs" name="scjllxfs" placeholder="生产经理手机">
										</div>
									</div>
									<div class="form-group">
													<label for="zlfzr" class="col-sm-2 control-label">质量负责人：</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="zlfzr" name="zlfzr" placeholder="质量负责人">
													</div>
													<label for="scjllxfs" class="col-sm-2 control-label">联系方式：</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="zlfzrsj" name="zlfzrsj" placeholder="质量负责人手机">
													</div>
												</div>
									<div class="form-group">
										<label for="zlya" class="col-sm-2 control-label">质量员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zlya" name="zlya" placeholder="质量员">
										</div>
										<label for="scjllxfs" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zlyasj" name="zlyasj" placeholder="质量员手机">
										</div>
									</div>
									<!--<div class="panel-heading">
										<h3 class="panel-title label label-info">分公司</h3>
									</div>
									<div class="form-group">
										<label for="bmA" class="col-sm-2 control-label">分管领导：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmA" name="bmA" placeholder="分管领导">
										</div>
										<label for="bmAc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmAc" name="bmAc" placeholder="分管领导手机">
										</div>
									</div>
									<div class="form-group">
										<label for="bmB" class="col-sm-2 control-label">工程部部长：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmB" name="bmB" placeholder="工程部部长">
										</div>
										<label for="bmBc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmBc" name="bmBc" placeholder="工程部部长手机">
										</div>
									</div>
									<div class="form-group">
										<label for="bmC" class="col-sm-2 control-label">巡查员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmC" name="bmC" placeholder="巡查员">
										</div>
										<label for="bmCc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="bmCc" name="bmCc" placeholder="巡查员手机">
										</div>
									</div>-->
									<div class="panel-heading">
										<h3 class="panel-title label label-info">分公司</h3>
									</div>
									<div class="form-group">
										<label for="bmA" class="col-sm-2 control-label">分管领导：</label>
										<div class="col-sm-3">
											<select id="bmA" name="bmA" class="form-control">
												<option></option>
											</select>
										</div>
										<label for="bmAc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<select id="bmAc" name="bmAc" class="form-control">
												<option></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="bmB" class="col-sm-2 control-label">工程部部长：</label>
										<div class="col-sm-3">
											<select id="bmB" name="bmB" class="form-control">
												<option></option>
											</select>
										</div>
										<label for="bmBc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<select id="bmBc" name="bmBc" class="form-control">
												<option></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="bmC" class="col-sm-2 control-label">巡查员：</label>
										<div class="col-sm-3">
											<select id="bmC" name="bmC" class="form-control">
												<option></option>
											</select>
										</div>
										<label for="bmCc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<select id="bmCc" name="bmCc" class="form-control">
												<option></option>
											</select>
										</div>
									</div>
									<div class="panel-heading">
										<h3 class="panel-title label label-info">总公司</h3>
									</div>
									<div class="form-group">
										<label for="zgA" class="col-sm-2 control-label">安全监管部部长：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgA" name="zgA" placeholder="安全监管部部长">
										</div>
										<label for="zgAc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgAc" name="zgAc" placeholder="安全监管部部长手机">
										</div>
									</div>
									<div class="form-group">
										<label for="zgB" class="col-sm-2 control-label">安全主管：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgB" name="zgB" placeholder="安全主管">
										</div>
										<label for="zgBc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgBc" name="zgBc" placeholder="安全主管手机">
										</div>
									</div>
									<div class="form-group" >
										<label for="zcy" class="col-sm-2 control-label">巡查员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zcy" name="zcy" placeholder="巡查员">
										</div>
										<label for="zcysj" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zcysj" name="zcysj" placeholder="巡查员手机">
										</div>
									</div>
									<div  id="dtcja">
									<div class="form-group" >
										<label for="zgC" class="col-sm-2 control-label">设备管理员：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgC" name="zgC" placeholder="设备管理员">
										</div>
										<label for="zgCc" class="col-sm-2 control-label">联系方式：</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="zgCc" name="zgCc" placeholder="设备管理员手机">
										</div>
									</div>
									<div id="ziDong"></div><!-- 动态添加的放在这里 -->
									</div>
									<a href="#" id="AddMoreFileBox" class="btn btn-primary col-sm-offset-2">增加管理人员</a></span></p>
									<!--<a href="#" id="ceshi" class="btn btn-primary col-sm-offset-2">测试</a></span></p>-->
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
												<option>基础施工</option>
												<option>主体施工</option>
												<option>装饰装修</option>
												<option>收尾阶段</option>
												<option>竣工验收</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="kgbg" class="col-sm-4 control-label">施工许可证办理情况及进度说明：</label>
										<div class="col-sm-6">
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
									<input type="submit" id="save5"  class="btn btn-primary col-sm-offset-9" name="submit" value="保存">
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
   <script language="javascript" src="../js/PCASClass.js"></script>
   
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
<script language="javascript" defer>     
				new PCAS("province5","city5","请选择省份","请选择市区");
</script>
<script>  
			$(document).ready(function() {  
			 var save5=document.getElementById("save5"); 
			 
			 //	未选所属公司提醒
			 save5.onclick = function (){
						var set = document.getElementById("ssgs");
						if(set.options[set.selectedIndex].text==""){
								alert("请选择所属公司")
						}
			 }
			 
			var MaxInputs       = 8; //maximum input boxes allowed  
			var dtcja   = $("#dtcja"); //Input boxes wrapper ID 
			var ziDong   = $("#ziDong"); //Input boxes wrapper ID  
			var AddButton       = $("#AddMoreFileBox"); //Add button ID  
			  
//			var x = dtcja.length; //initlal text box count
			var x = ziDong.length; //initlal text box count  
			var FieldCount=1; //to keep track of text box added  
			  
			$(AddButton).click(function (e)  //on add input button click  
			{  
			        if(x <= MaxInputs) //max input box allowed  
			        {  
			            FieldCount++; //text box added increment  
			            //add input box  
			            $(ziDong).append('<div><div class="form-group"><label for="glrybmgs" class="col-sm-2 control-label">部门归属：</label><div class="col-sm-2"><select id="glrybmgs'+ FieldCount +'" name="glrybmgs[]" class="form-control"><option>项目部</option><option>分公司</option><option>总公司</option><option>企业构架人员</option></select></div><div class="col-sm-2"><input type="text" class="form-control" id="glrygw'+ FieldCount +'" name="glrygw[]" placeholder="岗位"></div><div class="col-sm-2"><input type="text" class="form-control" id="zgc'+ FieldCount +'" name="zgc[]" placeholder="管理人员"></div><div class="col-sm-3"><input type="text" class="form-control" id="zgcc'+ FieldCount +'" name="zgcc[]" placeholder="联系方式"></div></div><a href="#"class="removeclass">×</a></div>');  
			            x++; //text box increment  
			        }  
			return false;  
			});  
			  
			$("body").on("click",".removeclass", function(e){ //user click on remove text  
			        if( x > 1 ) {  
			                $(this).parent('div').remove(); //remove text box  
			                x--; //decrement textbox  
			        }  
			return false;  
			})   
			  
			  
			  save5.addEventListener('click',function(){
			  	//alert("测试");
			  	var ziDong=document.getElementById("ziDong");
			  	var inputArray=ziDong.getElementsByTagName("input");
			  	var selectArray=ziDong.getElementsByTagName("select");
			  	//alert(selectArray.length);
			  	var selectConnectString=""; //初始化存放存放结合元素字符串
			  	var inputConnectString="";
			  	
			  	for(var i=0;i<inputArray.length;i++){
			  		var strs1=inputArray[i].value;
			  		inputConnectString+=strs1+"//";
			  	}
			  	for(var j=0;j<selectArray.length;j++){
			  		var strs2=selectArray[j].value;
			  		selectConnectString+=strs2+"//";
			  	}
			  	//alert(selectConnectString);
			  	$.ajax({
			        	url:'bc4.php',
			        	type:'post',
			        	dataType:'json',
			        	data:{
			        		selectConnectString:selectConnectString,
							    inputConnectString:inputConnectString
			        	},
			        	success:function(data){
			        		if (data.result=='success') {
//			        			alert ('保存成功');
			            }
			         },
			         error:function(xhr,type,errorThrown){
//			         	alert('ajax错误'+type);
			         }
	        });
			  	//将  inputConnectString  和   selectConnectString
			  });
			});  
</script>
<script type="text/javascript">
			var ssgs=document.getElementById("ssgs");
			ssgs.addEventListener('change',function getData(){
				$.ajax({
						 url:'fgsryxq.php',
						data:{
							ssgs:ssgs.value
						},
						dataType:'json',
						type:'post',
						timeout:10000,
						success:function(data){
//							alert(data);
							var length=data.length;
							for (var i=0;i<length-1;i++) {
								var xingm=data[i].姓名;
								var shouji=data[i].手机;
							  fenge(xingm,shouji);
							}
						},
						error:function(xhr,type,errorThrown){
							//异常处理；
							//alert('ajax错误'+type);
							return callback('ajax错误'+type+errorThrown);
						}
					});
					
//					alert (ssgs.value);
					function fenge(xingm,shouji){
//						alert(xingm);
//						alert(shouji);
						var bmA = document.getElementById("bmA");
//						bmA.value = xingm;
						$('<option value="'+xingm+'">'+xingm+'</option>').appendTo("#bmA");
						$('<option value="'+shouji+'">'+shouji+'</option>').appendTo("#bmAc");
						$('<option value="'+xingm+'">'+xingm+'</option>').appendTo("#bmB");
						$('<option value="'+shouji+'">'+shouji+'</option>').appendTo("#bmBc");
						$('<option value="'+xingm+'">'+xingm+'</option>').appendTo("#bmC");
						$('<option value="'+shouji+'">'+shouji+'</option>').appendTo("#bmCc");						
					};
			});
</script>
  </body>
</html>