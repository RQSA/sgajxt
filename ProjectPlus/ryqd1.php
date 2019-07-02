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
    <link rel="stylesheet" type="text/css" media="all" href="../css/daterangepicker-bs3.css"/>
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
    					<li ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源管理</a></li>
    							<li class="active" ><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">巡查整改</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $row["用户id"];?>">隐患通知单</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    			<!-- 内容区域 -->
    		<div class="col-md-10">
    			<div class="panel panel-info">
    				<div class="panel-heading">
    					<h3 class="panel-title">人员签到--<?php echo $row["工程名称"];?></h3>
    				</div>
    				 
    				<div class="panel-body">
    					<!-- 表格自定义按钮 -->
    					<div id="toolbar" class="btn-group">
    						<!--<button type="button" class="btn btn-default">
    							<i class="glyphicon glyphicon-plus"> 新建</i>
    						</button>-->
    						
    						<!-- <button type="button" class="btn btn-default">
    							<i class="glyphicon "> 删除</i>
    						</button> -->
    						<button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
     			 data-toggle="dropdown"  method="post" name="dropdownMenu1">
     			人员分类
     				 <span class="caret"></span>
 						  </button>
  						 <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    						  <li role="presentation">
        					 <a role="menuitem" tabindex="-1" href="#"></a>
     						  </li>
	     						 <li role="presentation">
	        					 <a role="menuitem" tabindex="-1" href="ryqd1.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"];?>">施工单位</a>
	     						 </li>
   							    <li role="presentation">
    		  				    <a role="menuitem" tabindex="-1" href="ryqd2.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"];?>">
          				 			 监理单位
	         					</a>
	      						</li>
	      						
	      						<li role="presentation">
	       						  <a role="menuitem" tabindex="-1" href="ryqd3.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"];?>">项目负责人</a>
	      						</li>
	      						<li role="presentation">
	       						  <a role="menuitem" tabindex="-1" href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid=$_GET["yhid"];?>">全部</a>
	      						</li>
	      						<?php
											}
											$conn->close();
									   ?>  
  						</ul>
    				</div>
    					<div class="#">
    						<form method="post">
    						<fieldset>
                  <div class="control-group">
    			  <?php 
			         		$date=date("Y-m-d");
			         		$time=strtotime($date);
								  $firstday=date('m-01-Y',strtotime(date('Y',$time).'-'.(date('m',$time)-1).'-01'));
//												echo $firstday;
									$arr = getdate();
								  if($arr['mon'] == 12){
								   $year = $arr['year'] +1;
								   $month = $arr['mon'] -11;
								   $day = $arr['mday'];
								   if($day < 10){
								    $mday = '0'.$day;
								   }else {
								    $mday = $day;
								   }
								   $firstday1 = $year.'-0'.$month.'-01';
								  
								  }else{
								   $time=strtotime($date);
								   $firstday1=date('m-01-Y',strtotime(date('Y',$time).'-'.(date('m',$time)+1).'-01'));
								  }
//											   echo $firstday1;
								 
         	?>                    
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                       <input type="text" style="width: 400px" name="reservation" id="reservationtime" class="form-control" value="<?php echo $firstday;  ?> 1:00 PM - <?php echo $firstday1;  ?> 1:30 PM"  class="span4"/>
                       <input type="text" style="width: 200px" id="liu" name="liu" class="form-control hidden" value="2017-01-01" >
                       <input type="text" style="width: 200px" id="endtime" name="endtime" class="form-control hidden" value="2017-01-31"/>
                        <input type="submit" class="btn col-sm-offset-1" value="查询">
                     </div>
                    </div>
                  </div>
                 </fieldset>
                 </form>
    					</div>
    					<table id="table_gclb">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>人员</th>
								         <th>签到时间</th>
								         <th>人员分类</th>
								      </tr>
								   </thead>
								   <tbody>
						            <?php
						            	error_reporting(E_ALL ^ E_NOTICE);
										$liu =$_POST['liu'];
										$endtime =$_POST['endtime'];										
						//				echo $_GET["id"];
						//				$id=$_GET["id"];
										require("../conn.php");
						//				$sql = "select * from 人员签到  where id='$id' ";
										$sql = "select * from 人员签到  where 签到时间 between '$liu'and '$endtime' and 工程id='$gcid' and 人员分类='施工单位' ";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()) {
						                         					
						            ?>  
          								   	
								      <tr>
								         <td><?php echo $row["人员"];?></td>
								         <td><?php echo $row["签到时间"];?></td>
								         <td><?php echo $row["人员分类"];?></td>
								      </tr>
						            <?php
										}
										$conn->close();
								    ?>  								     
								   </tbody>
    					</table>
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
   <script type="text/javascript" src="../js/moment.js"></script>
	 <script type="text/javascript" src="../js/daterangepicker.js"></script>  
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
    </script>
     <script type="text/javascript">
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
          	  bianliang.value=start.toISOString();
          	  endtime.value=end.toISOString();          
          });
            });
     </script>
    
     <script>  
        $(function(){  
            function initTableCheckbox() {  
                var $thr = $('table thead tr');  
//              var $checkAllTh = $('<th><input type="checkbox" id="checkAll" name="checkAll" /></th>');  
//              /*将全选/反选复选框添加到表头最前，即增加一列*/  
//              $thr.prepend($checkAllTh);  
//              /*“全选/反选”复选框*/  
                var $checkAll = $thr.find('input');  
                $checkAll.click(function(event){  
                    /*将所有行的选中状态设成全选框的选中状态*/  
                    $tbr.find('input').prop('checked',$(this).prop('checked'));  
                    /*并调整所有选中行的CSS样式*/  
                    if ($(this).prop('checked')) {  
                        $tbr.find('input').parent().parent().addClass('warning');  
                    } else{  
                        $tbr.find('input').parent().parent().removeClass('warning');  
                    }  
                    /*阻止向上冒泡，以防再次触发点击操作*/  
                    event.stopPropagation();  
                });  
                /*点击全选框所在单元格时也触发全选框的点击操作*/  
//              $checkAllTh.click(function(){  
//                  $(this).find('input').click();  
//              });  
                var $tbr = $('table tbody tr');  
                var $checkItemTd = $('<td><input type="checkbox" name="checkItem" /></td>');  
                /*每一行都在最前面插入一个选中复选框的单元格*/  
                $tbr.prepend($checkItemTd);  
                /*点击每一行的选中复选框时*/  
                $tbr.find('input').click(function(event){  
                    /*调整选中行的CSS样式*/  
                    $(this).parent().parent().toggleClass('warning');  
                    /*如果已经被选中行的行数等于表格的数据行数，将全选框设为选中状态，否则设为未选中状态*/  
                    $checkAll.prop('checked',$tbr.find('input:checked').length == $tbr.length ? true : false);  
                    /*阻止向上冒泡，以防再次触发点击操作*/  
                    event.stopPropagation();  
                });  
                /*点击每一行时也触发该行的选中操作*/  
                $tbr.click(function(){  
                    $(this).find('input').click();  
                });  
            }  
            initTableCheckbox();  
        });  
        </script>  
    
  </body>
</html>