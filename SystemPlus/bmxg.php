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
    <!--拖曳的样式 t-->
    <link rel="stylesheet" type="text/css" href="../css/style3.css" />
    <!--拖曳的样式 t-->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/drag.js"></script>
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
        
      
      </div>
    </nav>
    <div id="container" class="container">
    	<div class="row">
    		
    		
    		<!-- 内容区域 -->
    		<div class="col-md-12">
    		<div id="xmdj" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">用户信息修改</h3>
	</div>
	
	<div class="panel-body">
		<!-- Nav tabs -->
	
							<!-- Nav tabs -->
								
							<!-- Tab panes -->
							
		
    <!-- Tab panes -->
		<div class="tab-content">
			
			
			<form id="bmxg" name="bmxgform" action="bmxgbc.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			 
                   
                   <div class="form-group">
                   	
												<label for="dept" class="col-sm-2 control-label">部门：</label>
								<div class="col-sm-3">
									<select id="dept" name="dept" class="form-control">
										<?php
			                   require("../conn.php");
			                   
			                   $sql = "select * from 公司部门    ";
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
													
													<?php
                   require("../conn.php");
                   $id=$_GET["id"];
                   $sql = "select * from  用户信息  where 设备='电脑'and id=' $id' ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                        					
                   ?>
                   
													<label for="xm" class="col-sm-2 control-label">姓名：</label>
													<div class="col-sm-3">
														<input type="text" class="form-control" id="xm" name="xm" value="<?php echo $row["姓名"];?>" placeholder="姓名">
													</div>
												</div>
												
												<div class="form-group">
												<label for="zh" class="col-sm-2 control-label">账号：</label>
												<div class="col-sm-3">
													<input type="text" class="form-control" id="zh" name="zh" value="<?php echo $row["账号"];?>" >
												</div>
												<label for="mm" class="col-sm-2 control-label">密码：</label>
												<div class="col-sm-3">
													<input type="text" class="form-control" id="mm" name="mm" value="<?php echo $row["密码"];?>" >
												</div>
											</div>
											
											
											<div class="form-group">
												<label for="sj" class="col-sm-2 control-label">手机：</label>
												<div class="col-sm-3">
													<input type="text" class="form-control" id="sj" name="sj" value="<?php echo $row["手机"];?>" >
												</div>
												<label for="yx" class="col-sm-2 control-label">邮箱：</label>
												<div class="col-sm-3">
													<input type="text" class="form-control" id="yx" name="yx" value="<?php echo $row["邮箱"];?>" >
												</div>
											</div>
												
				<input type="text" style="width: 200px" id="id" name="id" class="form-control hidden" value="<?php echo $row["id"];?>"/>
				
				<div class="modal-footer" >
						<!--<button type="button" class="btn btn-default " data-dismiss="modal">		<a href="scsl.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">返回上一层
						</a></button>-->
								
									<input type="submit" class="btn btn-primary col-sm-offset-9" name="submit" value="保存">
	
					</div>
					
				 <?php
											}
											$conn->close();	
										 ?>
										 
			</from>
			
			
			
	


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
    
     $(document).ready(function() {
    	$("footer").load("../footer.html");
   		;
    });
    $('#table_gclb').bootstrapTable({		
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
	  $('#table_gclb1').bootstrapTable({		
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
        $("#save3").click(function(){ 
		
					$.ajax({
			                cache: true,
			                type: "POST",
			                url:'xjcdbc.php',
			                data:$('#xjcdform').serialize(),// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                    alert('保存成功');
			                }
			            });
			});
		 $("#cdbc").click(function(){ 
					var cdsl1=document.getElementsByName("cdsl1");
					var cdsl2=document.getElementsByName("cdsl2");
//				$("#ceshila input[type='text']").each(function(){
////			    alert($(this).val());
//			  });
				var s = "";
				var sasa = "";
				for(var i=0;i<cdsl1.length;i++){
// 				if(cdsl1[i].value){
   					s+=cdsl1[i].value+'||'; //如果未选中，将value添加到变量s中
						sasa+=cdsl2[i].value+'||';
// 				} 
// 				else{
// 								alert ("出错");
// 				}
   		}
   			if(s==''){    							
   				alert("请填写实测值");    					
   			}else{    			 						
// 				alert(sasa);	
						$.ajax({
						 url:'cdbcaa.php',
						data:{
							s:s,
							sasa:sasa
						},
						dataType:'json',
						type:'post',
						timeout:10000,
						success:function(data){
//							alert(data);
						},
						error:function(xhr,type,errorThrown){
							//异常处理；
//							alert('ajax错误'+type);
//							return callback('ajax错误'+type+errorThrown);
								alert ("保存成功");
						}
					});
   			}
			});
//			function cdaniu(cddida){ 
//				alert (cddida);
////				var cddida2=document.getElementById("cddida");
//////				alert (cddida2);
//				var ceshikank=document.getElementsByClassName("btn-xs btn-default");
////				var ceshiyongde=document.getElementById("ceshiyongde").innerHTML;
//////				cddida.className='btn-xs btn-default hidden';
//////				cddida.setAttribute("class","btn-xs btn-default hidden");
//////				cddida.addClass("hidden");
//////				anniu.setAttribute("className","btn-xs btn-default hidden");
//////      alert(ceshikank[0].id);	
//				for (var i=0;i<ceshikank.length;i++){
//					var bhDid = ceshikank[i].id;
////					alert(cddida);
//					if(bhDid == cddida){
////					alert(bhDid);
//					ceshikank[i].setAttribute("class","btn-xs btn-default hidden");
////				bhDid.addEventListener("click", function(){
////				});
//					}
//				}
//			}
			var ceshikan=document.getElementsByClassName("btn-xs btn-default");
			function cdaniu(cddida){
			for (var i=0;i<ceshikan.length;i++){
//			document.getElementById("mydiv").onclick=function(ev){
			ceshikan[i].onclick=function(ev){
				var oEvent=ev||event;
				var oLeft=oEvent.clientX+'px';
				var oTop=oEvent.clientY+'px'
				alert(oLeft+','+oTop)
			}}}
</script>

  </body>
</html>

