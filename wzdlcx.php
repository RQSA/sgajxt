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
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    	
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker-bs3.css"/>
    <!-- Custom styles for bootstrap-table -->
    <link href="css/bootstrap-table.min.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

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
	   						require("conn.php");
								$yhid=$_GET["yhid"];
	   						$sql = "select * from 用户信息   where id='$yhid'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
          <a class="navbar-brand" href="index.php?yhzh=<?php echo $row["账号"];?>">韶关一建</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	
            <li><a href="index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li class="active"><a href="seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
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
    					<li><a href="SelectPlus/wxycx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">危险源查询</a></li>    					
    					<li><a href="SelectPlus/jxsbcx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">机械设备查询</a></li>    					
    					<li  ><a href="seclect.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">巡查整改查询</a>
    					<ul class="nav">
    						<li  ><a href="seclect.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">巡查整改查询</a></li>
    						<li class="active" ><a href="wzdlcx.php?yhid=<?php echo $yhid=$_GET["yhid"]; ?>">违章大类查询</a></li>
    						
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
                       <input id="mxcx" type="button" class="btn col-sm-offset-1" value="查询" >
                        
                       <fieldset style="padding:7px;">



违章大类 部门选择： <select id="allwzdl"><option></option><option value="全部">全部</option></select>
									<select id="section"><option></option><option value="全部">全部</option></select>


</fieldset>
                     
                     </div>
                     
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

             
                 <div  style="display:inline">
                 
							  </div>
               </form>
            </div> 
    			</div>
    			
    			<div class="row">
    				
    				<div class="col-lg-3">
    					<div style="text-align: center;">明细表</div>
	    			<table id="list" class="table  table-bordered">
							<!--<tr class="">
							  <td class="col-xs-4">通知</td>
							  <td class="col-xs-4">条</td>
							</tr>
							<tr>
							  <td>安全管理</td>
							  <td ><?php echo $b['AllNum'];?></td>
							</tr>			
							<tr>
							  <td>文明施工</td>
							  <td><?php echo $b1['AllNum1'];?></td>
							</tr>	-->
							
								
						</table>
						</div>
						<div id="container1" class="col-lg-8 col-md-offset-8" style="width:650px; height: 400px; margin: 0 auto" ></div>
    				</div>
    				
    				
    				

							
							
							
							
						
							
							
    					
    				<!-- 内容区域 -->

    
    <footer class="bs-docs-footer" role="contentinfo"></footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   <!--js of bootstrap-table -->
   <script src="js/bootstrap-table.min.js"></script>
   <!--js of bootstrap-table—export -->
   <script src="js/export/tableExport.js"></script>
   <script src="js/export/bootstrap-table-export.js"></script>
   <script src="js/bootstrap-table-zh-CN.min.js"></script>
   <script src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
   <script src="js/jquery.form.js"></script>
   <script language="javascript" src="js/PCASClass.js"></script>

	 <script type="text/javascript" src="js/daterangepicker.js"></script>  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
    <script language="JavaScript"> 
    	//获取
    	var bianliang=document.getElementById("liu");
    	var endtime=document.getElementById("endtime");
    	var allwzdl =document.getElementById("allwzdl");
    	var section = document.getElementById("section");
    	var list = document.getElementById("list");
    	
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
          //ajax异步查询违章大类
          $.ajax({
          	type:"post",//使用post方法访问后台
          	url:"wzdlmx.php",
          	data:{
          		flag:'f0',
//        		wzdl:"123"
          	},
          	dataType:"json",
          	success:function(data){
          		var length = data.length;
          		for(var i=0;i<length;i++){
          			var wzdl = data[i].wzdl;
          			creatwzdl(wzdl);
          		}
          			
          	}
          });
           //ajax异步查询部门
          $.ajax({
          	type:"post",//使用post方法访问后台
          	url:"wzdlmx.php",
          	data:{
          		flag:'f1'
          	},
          	dataType:"json",
          	success:function(data){
          		var length = data.length;
          		for(var i=0;i<length;i++){
          			var bumen = data[i].section;
          			creatsection(bumen);
          		}	
//        	alert(data[0].section);	
          		
          	}
          });
           //ajax异步传值输出明细表内容
//        alert(allwzdl.value);
//        alert(section.value);
           $("#mxcx").click(function(){
//         	alert('hh');
							var zxlist=function(allcount,zxcount,wzdl){
									var zxbl = [((zxcount/allcount) * 100).toFixed(2) + "%"];
									var list = document.getElementById("list");
									var mytr=document.createElement("tr");
		//					mytr.value = sectionOption;
									mytr.innerHTML = '<td>'+wzdl+'</td><td>'+zxcount+'</td><td>'+zxbl+'</td>';
									list.appendChild(mytr);
						}
								var bianliang=document.getElementById("liu");
					    	var endtime=document.getElementById("endtime");
					    	var allwzdl =document.getElementById("allwzdl");
					    	var section = document.getElementById("section");
					    	var list = document.getElementById("list");
	           	$.ajax({
		          	type:"post",//使用post方法访问后台
		          	url:"wzdlmx.php",
		          	data:{
		          		flag:'f2',
		          		wzdl:allwzdl.value,
		          		section:section.value,
		          		star:bianliang.value,
		          		end:endtime.value
		          	},
		        	dataType:"json",
		          	success:function(data){
		          		alert(data[0].allcount);
		          		if(data[0].allcount!=0){
		          		list.innerHTML="<tr><th>类别</th><th>条数</th><th>比例</th></tr>";
		          		var length = data.length;
//		          		alert(data);
									qtcount= data[0].allcount;
//									alert(data);
									var arr_num =new Array();
		          		for(var i=0;i<length;i++){
		          			
			          		if(data[i].违章大类=='其他'){
												
											}
											else{
//												alert(data[i].wzcount+''+data[i].违章大类);
												zxlist(data[0].allcount,data[i].wzcount,data[i].违章大类);
												qtcount =  qtcount-data[i].wzcount;
//												var o = data[i].违章大类+"|"+data[i].wzcount;
//												var n = o.split("|");
												arr_num[i] = [data[i].违章大类,data[i].wzcount];
											}
			//								alert(data[i].wzcount);
										}
										var qtdl ='其他';
										var zjdl ='总计';
			//							alert(data[0].allcount);
										
										zxlist(data[0].allcount,qtcount,qtdl);
										zxlist(data[0].allcount,data[0].allcount,zjdl);

//		//        	alert(data[0].section);	
		          		
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
//			   alert(data);
//			     var arr_num1 = [data[0].违章大类,data[0].wzcount];
//			     var arr_num1 = [[data[1].违章大类,data[1].wzcount];
//			     alert(arr_num);
//			     alert(typeof(arr_num));
//			   for(var i=0;i<)
				 	var series= [{
			      type: 'pie',
			      name: '所占比例',
			      data: arr_num
			      
			   }];  
			      
			      
			   var json = {};   
			   json.chart = chart; 
			   json.title = title;     
			   json.tooltip = tooltip;  
			   json.series = series;
			   json.plotOptions = plotOptions;
			   $('#container1').highcharts(json); 
			   }else{
			   	location.reload(this);
			   	alert("暂无数据！");   
			   }
			   }
		          });
		         
          });
	           
	        
         
//        if(allwzdl.value!=null&&section.value!=null){
//	          $.ajax({
//	          	type:"post",//使用post方法访问后台
//	          	url:"wzdlmx.   
//	          	},
//	          	dataType:"json",
//	          	success:function(data){
//	          		
//	          	alert(data[0].wzdl);	
//	          		
//	          	}
//	          });	
//        }
          
				//违章大类下拉option
				var creatwzdl=function(wzdl){
					var opt=document.createElement("option");
					opt.value=wzdl;
					opt.innerHTML=wzdl;
					allwzdl.appendChild(opt);
				} 
				//部门下拉option
				var creatsection=function(bumen){
					var opt=document.createElement("option");
							opt.innerHTML= bumen;
							opt.value=bumen;
							section.appendChild(opt);
								}
								
								
								
			  
			  
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
			<script type="text/javascript" src="js/moment.js">
			</script>
			<script type="text/javascript" src="js/daterangepicker.js">
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

				     
				

			
				
				</script>

  </body>
</html>
