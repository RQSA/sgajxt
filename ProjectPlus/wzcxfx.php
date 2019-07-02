<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>韶关一建企业有限公司项目质量安全检查管理系统</title> 
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    	
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="../css/daterangepicker-bs3.css"/>
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
            <li ><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
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
//											$sql = "select id,工程名称 from 我的工程 ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {					
                     ?>
											         
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">巡查整改</a></li>
    							<li ><a href="zlsc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">质量实测</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源</a></li>
									<li ><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">隐患通知单</a></li>
									<li  class="active" ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
			  <div id="xmdj" class="panel panel-info">
				<div class="panel-heading">
				<h3 class="panel-title">查询分析</h3>
				</div>
											
				<div class="panel-body">
				
    			<div>
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
							  <div class="well">
               <form method="post" class="form-horizontal" id="sjdxz">
                 <fieldset>
                  <div class="control-group">
                  	<div>
						<input id="button" type="button" class="btn col-sm-offset-0 btn btn-primary" value="点击打印" onclick="preview()">
							 
						</div>
						
                    <label class="control-label" for="reservationtime">检查日期选择</label><!--startprint-->
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                       <input type="text" style="width: 400px" name="reservation" id="reservationtime" class="form-control" value="<?php echo $firstday;  ?> 1:00 PM - <?php echo $firstday1;  ?> 1:30 PM" class="span4"/>
                       <input type="text" style="width: 200px" id="liu" name="liu" class="form-control hidden" value="2016-08-12" >
                       <input type="text" style="width: 200px" id="endtime" name="endtime" class="form-control hidden" value="2017-08-12"/>
                       <input type="submit" class="btn col-sm-offset-1" value="查询">
                        
                       <fieldset style="padding:7px;">



省 市 区选择：<select name="province6"></select><select name="city6"></select>


</fieldset>
                     
                     </div><?php
							 }
							 $conn->close();
																							
						?>
                     
                     <!--<div class="btn-group ">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										项目选择
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="wxycxfx.php">危险源</a></li>
										<li><a href="cxfx.php">隐患通知单</a></li>
									<script>
//								 var a=document.getElementById("reservationtime").value;    
//    	         alert(a); 
									</script>	
									</ul>
							  </div>-->
                    </div>
                  </div>
                 </fieldset>
                   <div>
							  	


</div>

              <?php
							require("../conn.php");
							error_reporting(E_ALL ^ E_NOTICE);
							$sql = "select * from 通知单 ";
							$gcid=$_GET["id"];
							$liu =$_POST['liu'];
							$showtime=date("Y-m-d");
							$province6 =$_POST['province6'];
							$city6 =$_POST['city6'];
							$endtime =$_POST['endtime'];	
//							$Query = "Select count(*) as AllNum from 通知单 where 通知单状态='草稿' and 检查日期 between 'left(".$liu.",10)' and 'left(".$endtime.",10)'"; 
							$Query = "Select count(*) as AllNum from 通知单 where 违章大类     LIKE '%安全管理%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
///							echo $Query;
							$a     = mysqli_query( $conn, $Query ); 
							$b     = mysqli_fetch_assoc( $a ); 
//							echo $b['AllNum']; //条数  	
							$Query1 = "Select count(*) as AllNum1 from 通知单 where 违章大类 LIKE '%文明施工%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a1     = mysqli_query( $conn, $Query1 ); 
							$b1     = mysqli_fetch_assoc( $a1 );
							$Query2 = "Select count(*) as AllNum2 from 通知单  where 违章大类 LIKE '%扣件式钢管脚手架%' and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a2     = mysqli_query( $conn, $Query2 ); 
							$b2     = mysqli_fetch_assoc( $a2 );
							$Query3 = "Select count(*) as AllNum3 from 通知单 where 违章大类 LIKE '%门式钢管脚手架%' and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'";  
							$a3     = mysqli_query( $conn, $Query3 ); 
							$b3     = mysqli_fetch_assoc( $a3 );
							$Query4 = "Select count(*) as AllNum4 from 通知单 where 违章大类 LIKE '%承插型盘扣式钢管脚手架%' and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'";  
							$a4     = mysqli_query( $conn, $Query4 ); 
							$b4     = mysqli_fetch_assoc( $a4 );
							$Query5 = "Select count(*) as AllNum5 from 通知单 where 违章大类 LIKE '%悬挑式脚手架%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a5     = mysqli_query( $conn, $Query5 ); 
							$b5     = mysqli_fetch_assoc( $a5 );	
							$Query6 = "Select count(*) as AllNum6 from 通知单 where 违章大类 LIKE '%高处作业吊篮%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a6     = mysqli_query( $conn, $Query6 ); 
							$b6     = mysqli_fetch_assoc( $a6 );	
							$Query7 = "Select count(*) as AllNum7 from 通知单 where 违章大类 LIKE '%附着式升降脚手架%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a7     = mysqli_query( $conn, $Query7 ); 
							$b7     = mysqli_fetch_assoc( $a7 );
							$Query8 = "Select count(*) as AllNum8 from 通知单 where 违章大类 LIKE '%其他%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a8     = mysqli_query( $conn, $Query8 ); 
							$b8     = mysqli_fetch_assoc( $a8 );
							$Query9 = "Select count(*) as AllNum9 from 通知单 where 违章大类 LIKE '%基坑工程'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a9     = mysqli_query( $conn, $Query9 ); 
							$b9     = mysqli_fetch_assoc( $a9 );
							$Query10 = "Select count(*) as AllNum10 from 通知单 where 违章大类 LIKE '%模板支架%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a10     = mysqli_query( $conn, $Query10 ); 
							$b10     = mysqli_fetch_assoc( $a10 );
							$Query11 = "Select count(*) as AllNum11 from 通知单 where 违章大类 LIKE '%高处作业%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a11     = mysqli_query( $conn, $Query11 ); 
							$b11     = mysqli_fetch_assoc( $a11 );
							$Query12 = "Select count(*) as AllNum12 from 通知单 where 违章大类 LIKE '%施工用电%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a12     = mysqli_query( $conn, $Query12); 
							$b12     = mysqli_fetch_assoc( $a12 );
							$Query13 = "Select count(*) as AllNum13 from 通知单 where 违章大类 LIKE '%物料提升机%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a13     = mysqli_query( $conn, $Query13 ); 
							$b13     = mysqli_fetch_assoc( $a13 );
							$Query14 = "Select count(*) as AllNum14 from 通知单 where 违章大类 LIKE '%施工升降机%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a14     = mysqli_query( $conn, $Query14 ); 
							$b14     = mysqli_fetch_assoc( $a14 );
							$Query15 = "Select count(*) as AllNum15 from 通知单 where 违章大类 LIKE '%塔式起重机%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a15    = mysqli_query( $conn, $Query15 ); 
							$b15     = mysqli_fetch_assoc( $a15 );
							$Query16 = "Select count(*) as AllNum16 from 通知单 where 违章大类 LIKE '%起重吊装%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a16     = mysqli_query( $conn, $Query16 ); 
							$b16     = mysqli_fetch_assoc( $a16 );	
							$Query17 = "Select count(*) as AllNum17 from 通知单 where 违章大类 LIKE '%施工机具%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a17     = mysqli_query( $conn, $Query17 ); 
							$b17     = mysqli_fetch_assoc( $a17 );
							$Query19 = "Select count(*) as AllNum19 from 通知单 where 违章大类 LIKE '%碗扣式钢管脚手架%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a19     = mysqli_query( $conn, $Query19 ); 
							$b19     = mysqli_fetch_assoc( $a19);
							$Query20 = "Select count(*) as AllNum20 from 通知单 where 违章大类 LIKE '%满堂脚手架%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a20     = mysqli_query( $conn, $Query20 ); 
							$b20    = mysqli_fetch_assoc( $a20 );
							$Query21 = "Select count(*) as AllNum21 from 通知单 where 违章大类 LIKE '%质量行为%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a21    = mysqli_query( $conn, $Query21 ); 
							$b21     = mysqli_fetch_assoc( $a21 );
							$Query22 = "Select count(*) as AllNum22 from 通知单 where 违章大类 LIKE '%实体质量%'and 地区省='$province6' and 地区市='$city6' and 检查日期 between '$liu'and '$endtime'and 工程id='$gcid'"; 
							$a22    = mysqli_query( $conn, $Query22 ); 
							$b22     = mysqli_fetch_assoc( $a22 );										
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()) {
                         					
             ?>
						<?php
							 }
							 $conn->close();
																							
						?>
                 <div  style="display:inline">
                 
							  </div>
               </form>
            </div> 
    			</div>
    			
    			<div class="row">
    				
    				<div class="col-lg-3">
    					<div style="text-align: center;">明细表</div>
	    			<table class="table  table-bordered">
							<tr class="">
							  <td class="col-xs-4">通知</td>
							  <td class="col-xs-4">份</td>
							</tr>
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal">安全管理</a></td>
							  <td ><?php echo $b['AllNum'];?></td>
							</tr>			
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal1">文明施工</a></td>
							  <td><?php echo $b1['AllNum1'];?></td>
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal2">扣件式钢管脚手架</td></a>
							  <td><?php echo $b2['AllNum2'];?></td>
							</tr>	
							<tr>
							  <td ><a href="#" data-toggle="modal" data-target="#myModal3">门式钢管脚手架</td></a>
							  <td><?php echo $b3['AllNum3'];?></td>
							</tr>
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal4">承插型盘扣式钢管脚手架</td></a>
							  <td ><?php echo $b4['AllNum4'];?></td>
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal5">悬挑式脚手架</td></a>
							  <td><?php echo $b5['AllNum5'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal6">高处作业吊篮</td></a>
							  <td><?php echo $b6['AllNum6'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal7">附着式升降脚手架</td></a>
							  <td><?php echo $b7['AllNum7'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal8">其他</td></a>
							  <td><?php echo $b8['AllNum8'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal9">基坑工程</td></a>
							  <td><?php echo $b9['AllNum9'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal10">模板支架</td></a>
							  <td><?php echo $b10['AllNum10'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal11">高处作业</td></a>
							  <td><?php echo $b11['AllNum11'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal12">施工用电</td></a>
							  <td><?php echo $b12['AllNum12'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal13">物料提升机</td></a>
							  <td><?php echo $b13['AllNum13'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal14">施工升降机</td></a>
							  <td><?php echo $b14['AllNum14'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal15">塔式起重机</td></a>
							  <td><?php echo $b15['AllNum15'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal16">起重吊装</td></a>
							  <td><?php echo $b16['AllNum16'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal17">施工机具</td></a>
							  <td><?php echo $b17['AllNum17'];?></td>
							  
							</tr>	
							
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal19">碗扣式钢管脚手架</td></a>
							  <td><?php echo $b19['AllNum19'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal20">满堂脚手架</td></a>
							  <td><?php echo $b20['AllNum20'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal21">质量行为</td></a>
							  <td><?php echo $b21['AllNum21'];?></td>
							  
							</tr>	
							<tr>
							  <td><a href="#" data-toggle="modal" data-target="#myModal22">实体质量</td></a>
							  <td><?php echo $b22['AllNum22'];?></td>
							  
							</tr>	
								
						</table>
						</div>
						<div id="container1" class="col-lg-8 col-md-offset-8" style="width:650px; height: 400px; margin: 0 auto" ></div>
    				</div>
    				
    				
    				<div>
		    				<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel">
											通知
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered table-condensed">
			    						<thead>
											      <tr>
											         <th>工程名称</th>
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												<tbody>
									      <?php
						                   require("../conn.php");
						                   $gcid=$_GET["id"];
						                   $sql = "select * from 通知单 where 违章大类     LIKE '%安全管理%'";
						                   $result = $conn->query($sql);
						                   while($row = $result->fetch_assoc()) {    					
						                   ?>
						                   <tr class="">
						                 <td><a href="cgbh.php?id=<?php echo $row["id"];?>&tzdbh=<?php echo $row["通知单编号"];?>"><?php echo $row["工程名称"];?></a></td>
						                   <td><?php echo $row["检查层级"];?></td>
						                   <td><?php echo $row["巡查类别"];?></td>
						                   <td><?php echo $row["通知单编号"];?></td>
						                   <td><?php echo $row["检查单位"];?></td>
						                   <td><?php echo $row["检查对象"];?></td>
						                   <td><?php echo $row["检查类型"];?></td>
						                   <td><?php echo $row["违章大类"];?></td>
						                   <td><?php echo $row["检查日期"];?></td>
						                   <?php
													}
													$conn->close();
																								
												?>
										   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel1">
											回复
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
		    						<thead>
										      <tr>
										         <th>工程名称</th>
										         <th>检查层级</th>
										         <th>巡查类别</th>
										         <th>通知单编号</th>
										         <th>检查单位</th>
										         <th>检查对象</th>
										         <th>检查类别</th>
										         <th>违章大类</th>
										         <th>检查日期</th>
										      </tr>
										   </thead>
											 <tbody>
										      <?php
							                   require("../conn.php");
							                   $gcid=$_GET["id"];
							                   $sql = "select * from 通知单 where 违章大类     LIKE '%文明施工%'and 工程id='$gcid'";
							                   $result = $conn->query($sql);
							                   while($row = $result->fetch_assoc()) {    					
							                   ?>
							                   <tr class="">
							                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
							                   <td><?php echo $row["检查层级"];?></td>
							                   <td><?php echo $row["巡查类别"];?></td>
							                   <td><?php echo $row["通知单编号"];?></td>
							                   <td><?php echo $row["检查单位"];?></td>
							                   <td><?php echo $row["检查对象"];?></td>
							                   <td><?php echo $row["检查类型"];?></td>
							                   <td><?php echo $row["违章大类"];?></td>
							                   <td><?php echo $row["检查日期"];?></td>
							                   <?php
													}
													$conn->close();
																								
												?>
										   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel2">
											延期
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
			    						 <thead>
											      <tr>
											         <!--<th>工程名称</th>-->
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												 <tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%扣件式钢管脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <!--<td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>-->
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
											}
											$conn->close();
																						
										?>
								   
								     
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel3">
											逾期
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
			    						<thead>
											      <tr>
											         <th>工程名称</th>
											         <th>检查层级</th>
											         <th>巡查类别</th>
											         <th>通知单编号</th>
											         <th>检查单位</th>
											         <th>检查对象</th>
											         <th>检查类别</th>
											         <th>违章大类</th>
											         <th>检查日期</th>
											      </tr>
											   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%门式钢管脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
											}
											$conn->close();
																						
										?>
								   
								     
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel4">
											已完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
				    						<thead>
												      <tr>
												         <th>工程名称</th>
												         <th>检查层级</th>
												         <th>巡查类别</th>
												         <th>通知单编号</th>
												         <th>检查单位</th>
												         <th>检查对象</th>
												         <th>检查类别</th>
												         <th>违章大类</th>
												         <th>检查日期</th>
												      </tr>
												   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%承插型盘扣式钢管脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
											}
											$conn->close();
																						
										?>
								   
								     
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
										
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%悬挑式脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%高处作业吊篮%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel7" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%附着式升降脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%其他%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel5">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%基坑工程%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel10">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%模板支架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel11">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%高处作业%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel12">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%施工用电%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel13" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel13">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%物料提升机%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel14">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%施工升降机%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel15" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel15">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%塔式起重机%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal16" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel10">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%起重吊装%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel17">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%施工机具%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel19">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%碗扣式钢管脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel20">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
								      	
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%满堂脚手架%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
								<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel21" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel21">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%质量行为%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							<div>	<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel22" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
											&times;
										</button>
										<h4 class="modal-title" id="myModalLabel22">
											未完成
										</h4>
									</div>
									<div class="modal-body">
										  <table class="table table-bordered">
    						<thead>
								      <tr>
								         <th>工程名称</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>通知单编号</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>检查类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								      </tr>
								   </thead>
												<tbody>
								      <?php
					                   require("../conn.php");
					                   $gcid=$_GET["id"];
					                   $sql = "select * from 通知单 where 违章大类     LIKE '%实体质量%'and 工程id='$gcid'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   <tr class="">
					                   <td><a href="cgbh.php?id=<?php echo $row["id"];?>"><?php echo $row["工程名称"];?></a></td>
					                   <td><?php echo $row["检查层级"];?></td>
					                   <td><?php echo $row["巡查类别"];?></td>
					                   <td><?php echo $row["通知单编号"];?></td>
					                   <td><?php echo $row["检查单位"];?></td>
					                   <td><?php echo $row["检查对象"];?></td>
					                   <td><?php echo $row["检查类型"];?></td>
					                   <td><?php echo $row["违章大类"];?></td>
					                   <td><?php echo $row["检查日期"];?></td>
					                   <?php
													}
													$conn->close();											
												?>
								   </tbody>
											</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭
										</button>
							
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
							</div>
							</div>
							
							
    					
    				<!-- 内容区域 -->

    
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
   <script src="../js/highcharts.js"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
   
   <script language="javascript" src="../js/PCASClass.js"></script>

	 <script type="text/javascript" src="../js/daterangepicker.js"></script>  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
    <script language="JavaScript"> 
    	//获取
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
        	  //alert(start.toISOString()); 
          	  bianliang.value=start.toISOString();
          	  endtime.value=end.toISOString();
        	  //alert(bianliang.getAttribute("value"));
//    	   bianliang.value=start.toISOString();
          });//时间段的
			   var chart = {
			       plotBackgroundColor: null,
			       plotBorderWidth: null,
			       plotShadow: false
			   };
			   var title = {
			      text: '分析图'   
			   };      
			   var tooltip = {
			      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			   };
			   var plotOptions = {
			      pie: {
			         allowPointSelect: true,
			         cursor: 'pointer',
			         dataLabels: {
			            enabled: true,
			            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
			            style: {
			               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			            }
			         }
			      }
			   };

			   var series= [{
			      type: 'pie',
			      name: '所占比例',
			      data: [
			         ['安全管理',   <?php echo $b['AllNum'];?>],
			         ['扣件式钢管脚手架',      <?php echo $b2['AllNum2'];?>],
			         {
			            name: '承插型盘扣式钢管脚手架',
			            y: <?php echo $b4['AllNum4'];?>,
			            sliced: true,
			            selected: true
			         }, 
			         ['门式钢管脚手架',   <?php echo $b3['AllNum3'];?>],
			         ['文明施工',     <?php echo $b1['AllNum1'];?>],
			         ['悬挑式脚手架',   <?php echo $b5['AllNum5'];?>],
			         ['高处作业吊篮',   <?php echo $b6['AllNum6'];?>],
			          ['附着式升降脚手架',   <?php echo $b7['AllNum7'];?>],
			         ['其他',   <?php echo $b8['AllNum8'];?>],
			          ['基坑工程',   <?php echo $b9['AllNum9'];?>],
			         ['模板支架',   <?php echo $b10['AllNum10'];?>],
			         ['高处作业',   <?php echo $b11['AllNum11'];?>],
			         ['施工用电',   <?php echo $b12['AllNum12'];?>],
			          ['物料提升机',   <?php echo $b13['AllNum13'];?>],
			         ['施工升降机',   <?php echo $b14['AllNum14'];?>],
			          ['塔式起重机',   <?php echo $b15['AllNum15'];?>],
			         ['起重吊装',   <?php echo $b16['AllNum16'];?>],
			         ['施工机具',   <?php echo $b17['AllNum17'];?>],
			        
			          ['碗扣式钢管脚手架',   <?php echo $b19['AllNum19'];?>],
			         ['满堂脚手架',   <?php echo $b20['AllNum20'];?>],
			          ['质量行为',   <?php echo $b21['AllNum21'];?>],
			         ['实体质量',   <?php echo $b22['AllNum22'];?>],
			      ]
			   }];     
			      
			   var json = {};   
			   json.chart = chart; 
			   json.title = title;     
			   json.tooltip = tooltip;  
			   json.series = series;
			   json.plotOptions = plotOptions;
			   $('#container1').highcharts(json);  
			});
</script><!--endprint-->
<!--<script>
		window.onload= function(){document.getElementById('sjdxz').submit();}
</script>-->
		 <!--<script type="text/javascript">
        $(document).ready(function() {
						        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          format: 'MM/DD/YYYY h:mm A'
          }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          });
            });
     </script>-->
     	<!--<script type="text/javascript" src="../js/jquery.min.js">
			</script>-->
			<!--<script type="text/javascript" src="../js/bootstrap.min.js">
			</script>-->
			<script type="text/javascript" src="../js/moment.js">
			</script>
			<script type="text/javascript" src="../js/daterangepicker.js">
			</script>
			 <script type="text/javascript" src="../js/jquery.print.js"></script>
	 <script language="javascript">
			
			function preview() { 
			bdhtml=window.document.body.innerHTML; 
			sprnstr="<!--startprint-->"; 
			eprnstr="<!--endprint-->"; 
			prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
			prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
			window.document.body.innerHTML=prnhtml; 
			window.print(); 
			window.document.body.innerHTML=bdhtml; 
			}
		</script>
			<script type="text/javascript">
			    $('table').bootstrapTable({		
					striped : true,	//会有隔行变色效果
				  });
      </script>
        <script language="javascript" defer>

				     
				new PCAS("province6","city6","请选择省份","请选择市区");

			
				
				</script>

  </body>
</html>
