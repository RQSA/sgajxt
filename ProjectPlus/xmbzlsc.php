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
//	   							$tag=$row["部门"];
   					?>
          <a class="navbar-brand" href="../xmbindex.php?yhzh=<?php echo $row["账号"];?>">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../xmbindex.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
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
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">		
    					<li>
    						<a href="xmbxczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">项目管理</a>
    						<ul class="nav">
    							<li class=""><a href="xmbxczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">巡查整改</a></li>
    							<li class="active"><a href="zlsc1.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">质量实测</a></li>
    						</ul>
    					</li>    									
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		
			<!-- 内容区域 -->
    		<div class="col-md-10">
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">项目信息-<?php echo $row["工程名称"];?></h3>
	</div>
	    		              <?php
													}
													$conn->close();		
												?>
	<div class="panel-body">
		<div class="btn-group">
				<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				记录表类型
				<span class="caret"></span>
				</button>
		<ul class="dropdown-menu" >
			<li class="lii"><a href="#xjhnt"  tabindex="-1" data-toggle="tab">现浇混凝土结构观感质量及尺寸偏差</a></li>
			<li class="lii"><a href="#tcq"  tabindex="-1" data-toggle="tab">填充墙砌体工程</a></li>
			<li class="lii"><a href="#ybmh"  tabindex="-1" data-toggle="tab">一般抹灰工程</a></li>
			<li class="lii"><a href="#smznt"  tabindex="-1" data-toggle="tab">饰面砖粘贴</a></li>
			<li class="lii"><a href="#dlscm"  tabindex="-1" data-toggle="tab">大理石层面和花岗石层面</a></li>
		</ul>
								
		</div>
	</div>	
	
	<div class="tab-content">
			<div class="tab-pane fade in active" >
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
									   				$nr_xj= array( );
														$nr_tc= array( );
														$nr_mh= array( );
														$nr_sm= array( );
														$nr_mc= array( );
									           $id=$_GET["id"];
					                   $sql = "select  * from 质量实测基本信息  where 状态='1'  and 工程id='".$id."' order by  id desc";
					                   $result = $conn->query($sql);
									           $count = mysqli_num_rows($result);
											       $j=0;
					                   while($row = $result->fetch_assoc()) {    					
																		$data1[$j]=$row["记录表类型"];
																		$data2[$j]=$row["检查内容"];
																		$data3[$j]=$row["分项工程名称"];
																		$data4[$j]=$row["检查人员"];
																		$data5[$j]=$row["创建时间"];
																		$sjc[$j] = $row["时间戳"];
//																		echo $sjc[$j];
																		$j++;
									             }
//									   echo $data1[0];
									   for($i=0;$i<$count;$i++){
									   	 $table = explode(',',$data1[$i]);
										   $table_num = count($table);
										   $nr = explode(',',$data2[$i]);
										   $nr_num = count($nr);
										   $jcbw = $data3[$i];
										   $jcry = $data4[$i];
										   $qkday = $data5[$i];
//										   $sjc = $sjc[$i];
										   	$x=0;$y=0;$z=0;$n=0;$m=0;
										   for($l=0;$l<$nr_num;$l++){
										   	$nr_title = explode('-',$nr[$l]);
										   	if($nr_title[0]=="现浇混凝土"){
										   		$nr_xj[$x]=$nr_title[1];
												$x++;
										   	}else if($nr_title[0]=="填充墙砌体"){
										   		$nr_tc[$y]=$nr_title[1];
												$y++;
										   	}else if($nr_title[0]=="一般抹灰"){
										   		$nr_mh[$z]=$nr_title[1].'-'.$nr_title[2];
												$z++;
										   	}else if($nr_title[0]=="饰面砖粘贴"){
										   		$nr_sm[$n]=$nr_title[1].'-'.$nr_title[2];
												$n++;
												}else if($nr_title[0]=="大理石面层和花岗石面层"){
										   		$nr_mc[$m]=$nr_title[1];
												$m++;
												}							
										   }
										   $xjnr=implode("||",$nr_xj);
										   $tcnr=implode("||",$nr_tc);
										   $mhnr=implode("||",$nr_mh);
										   $smnr=implode("||",$nr_sm);
										   $mcnr=implode("||",$nr_mc);
										   for($ii=0;$ii<$table_num;$ii++){
//										   	echo $sjc;
										   	if($table[$ii]=="现浇混凝土结构观感质量及尺寸偏差"){
										   	?>
										   	<tr class="">
										   		<td><input type="checkbox"></td>
								         <td><?php echo$table[$ii]; ?></td>
								         <td><?php echo $jcbw; ?></td>
								         <td><?php echo $qkday;?></td>
								         <td><?php echo $jcry;?></td>
								         <td><?php echo $xjnr;?></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?table=<?php echo $table[$ii];?>&sjc1=<?php echo $sjc[$i];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                 </button>
												</td>								      
								      </tr>
										<?php   
											}else if($table[$ii]=="填充墙砌体工程"){
										   	?>
										   	<tr class="">
										   		<td><input type="checkbox"></td>
								         <td><?php echo$table[$ii]; ?></td>
								         <td><?php echo $jcbw; ?></td>
								         <td><?php echo $qkday;?></td>
								         <td><?php echo $jcry;?></td>
								         <td><?php echo $tcnr;?></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?table=<?php echo $table[$ii];?>&sjc1=<?php echo $sjc[$i];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                 </button>
												</td>								      
								      </tr>
										<?php   
											}else if($table[$ii]=="一般抹灰工程"){
//												echo $table[0];
										   	?>
										   	<tr class="">
										   		<td><input type="checkbox"></td>
								         <td><?php echo  $table[$ii]; ?></td>
								         <td><?php echo $jcbw; ?></td>
								         <td><?php echo $qkday;?></td>
								         <td><?php echo $jcry;?></td>
								         <td><?php echo $mhnr;?></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?table=<?php echo $table[$ii];?>&sjc1=<?php echo $sjc[$i];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                 </button>
												</td>								      
								      </tr>
										<?php   
											}else if($table[$ii]=="饰面砖粘贴"){
										   	?>
										   	<tr class="">
										   		<td><input type="checkbox"></td>
								         <td><?php echo$table[$ii]; ?></td>
								         <td><?php echo $jcbw; ?></td>
								         <td><?php echo $qkday;?></td>
								         <td><?php echo $jcry;?></td>
								         <td><?php echo $smnr;?></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?table=<?php echo $table[$ii];?>&sjc1=<?php echo $sjc[$i];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                 </button>
												</td>								      
								      </tr>
										<?php   
											}else if($table[$ii]=="大理石面层和花岗石面层"){
										   	?>
										   	<tr class="">
										   		<td><input type="checkbox"></td>
								         <td><?php echo$table[$ii]; ?></td>
								         <td><?php echo $jcbw; ?></td>
								         <td><?php echo $qkday;?></td>
								         <td><?php echo $jcry;?></td>
								         <td><?php echo $mcnr;?></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?table=<?php echo $table[$ii];?>&sjc1=<?php echo $sjc[$i];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                 </button>
												</td>								      
								      </tr>
										<?php   
											}

										   }
									   }
								    ?>  
												
											
								      
								   </tbody>
    					</table>
	
		</div>
		
		<div class="tab-pane fade"  id="xjhnt">
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								         
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
//									           $id=$_GET["id"];
//					                   $sql = "select * from 实测实量数据  where 状态='1' and 工程id='$id'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   
								      <tr class="">
								      	<td><input type="checkbox"></td>
								         <td><?php echo $row["记录表类型"]; ?></td>
								         <td><?php echo $row["分项工程名称"]; ?></td>
								         <td><?php echo $row["工程id"];?></td>
								         <td><?php echo $row["时间戳"];?></td>
								         <td></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?id1=<?php echo $id;?>&sjc1=<?php echo $row["时间戳"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                   	</button>
								        <!--<form>
												<input type="button"  value="打印和导出word" onclick="window.open('bbym.php?id1=<?php echo $id;?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">  
												</form>-->
												</td>
												
												<?php
												}
													?>								      </tr>
								     
								   </tbody>
    					</table>
	
		</div>
		
		<div class="tab-pane fade" id="tcq">
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								         
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
									   $id=$_GET["id"];
					                   $sql = "select * from 质量实测基本信息  where 状态='1' and 工程id='$id'and 记录表类型='填充墙砌体工程'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   
								      <tr class="">
								      	<td><input type="checkbox"></td>
								         <td><?php echo $yhid; ?></td>
								         <td><?php echo $id; ?></td>
								         <td><?php echo $row["工程id"];?></td>
								         <td><?php echo $row["时间戳"];?></td>
								         <td></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?id1=<?php echo $id;?>&sjc1=<?php echo $row["时间戳"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                   	</button>
								        <!--<form>
												<input type="button"  value="打印和导出word" onclick="window.open('bbym.php?id1=<?php echo $id;?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">  
												</form>-->
												</td>
												
												<?php
												}
													?>								      </tr>
								     
								   </tbody>
    					</table>
	
		</div>
		
		<div class="tab-pane fade" id="ybmh">
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								         
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
									   $id=$_GET["id"];
					                   $sql = "select * from 质量实测基本信息  where 状态='1' and 工程id='$id' and 记录表类型='一般抹灰工程' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   
								      <tr class="">
								      	<td><input type="checkbox"></td>
								         <td><?php echo $yhid; ?></td>
								         <td><?php echo $id; ?></td>
								         <td><?php echo $row["工程id"];?></td>
								         <td><?php echo $row["时间戳"];?></td>
								         <td></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?id1=<?php echo $id;?>&sjc1=<?php echo $row["时间戳"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                   	</button>
								        <!--<form>
												<input type="button"  value="打印和导出word" onclick="window.open('bbym.php?id1=<?php echo $id;?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">  
												</form>-->
												</td>
												
												<?php
												}
													?>								      </tr>
								     
								   </tbody>
    					</table>
	
		</div>
		
		<div class="tab-pane fade" id="smznt">
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								         
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
									   $id=$_GET["id"];
					                   $sql = "select * from 质量实测基本信息  where 状态='1' and 工程id='$id' and 记录表类型='饰面砖粘贴' ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   
								      <tr class="">
								      <td><input type="checkbox"></td>
								         <td><?php echo $yhid; ?></td>
								         <td><?php echo $id; ?></td>
								         <td><?php echo $row["工程id"];?></td>
								         <td><?php echo $row["时间戳"];?></td>
								         <td></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?id1=<?php echo $id;?>&sjc1=<?php echo $row["时间戳"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                   	</button>
								        <!--<form>
												<input type="button"  value="打印和导出word" onclick="window.open('bbym.php?id1=<?php echo $id;?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">  
												</form>-->
												</td>
												
												<?php
												}
													?>								      </tr>
								     
								   </tbody>
    					</table>
	
		</div>
		
		<div class="tab-pane fade" id="dlscm">
				<table>
    						<thead>
								      <tr>
								      	 <th><input type="checkbox"></th>
								         <th>检查项目</th>
								         <th>检查部位</th>
								         <th>检查日期</th>
								         <th>检查人员</th>
								         <th>检查内容</th>
								         <th>操作</th>
								         
								      </tr>
								   </thead>
								   <tbody>
								   	<?php
					                   require("../conn.php");
									   $id=$_GET["id"];
					                   $sql = "select * from 质量实测基本信息  where 状态='1' and 工程id='$id' and 记录表类型='大理石层面和花岗石层面'";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                   ?>
					                   
								      <tr class="">
								      	<td><input type="checkbox"></td>
								         <td><?php echo $yhid; ?></td>
								         <td><?php echo $id; ?></td>
								         <td><?php echo $row["工程id"];?></td>
								         <td><?php echo $row["时间戳"];?></td>
								         <td></td>
								         <td>
								         	<button type="button" class="btn btn-default"  onclick="window.open('bbym.php?id1=<?php echo $id;?>&sjc1=<?php echo $row["时间戳"];?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">
					                   		打印和导出Word
					                   	</button>
								        <!--<form>
												<input type="button"  value="打印和导出word" onclick="window.open('bbym.php?id1=<?php echo $id;?>', 'newwindow2', 'height=300, width=300, top=100, left=100,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no') ">  
												</form>-->
												</td>
												
												<?php
												}
													?>								      </tr>
								     
								   </tbody>
    					</table>
	
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
        $(document).ready(function() {
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          format: 'MM/DD/YYYY h:mm A'
          }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
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
                var $tbr  = $('table tbody tr');  
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
//          initTableCheckbox();  
        });  
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
 						alert{text};
        });
        </script>

 </body>
</html>