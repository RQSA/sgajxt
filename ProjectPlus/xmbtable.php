
<div id="gclb" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">工程列表</h3>
	</div>
	<div class="panel-body">
		<!-- 表格自定义按钮 -->
		<div id="toolbar" class="btn-group">
			<!--<button id="buttonxmbj" type="button" class="btn btn-default">
				<i class="glyphicon glyphicon-plus"> 项目登记</i>
			</button>-->
								
			<input type="text" class="form-control hidden" id="yhid"  name="yhid" value="<?php $yhid=$_GET["yhid"]; echo $yhid;?>" placeholder="">
			
             	
						 
		</div>
		<table id="table_gclb">
			<thead>
				<tr>
					<th data-sortable="true" data-field="ID">ID</th>
					<th data-sortable="true" data-field="工程名称">工程名称</th>
					<th data-field="项目类别">项目类别</th>
					<th data-field="形象进度">形象进度</th>
					
					<!--<th data-field="审核结果">审核结果</th>
					<th data-sortable="true" data-field="整改">整改</th>
					<th data-sortable="true" data-field="扣分">扣分</th>
					<th data-sortable="true" data-field="停工">停工</th>-->
				</tr>
			</thead>
			<tbody>
				<?php
                   require("../conn.php");
				   $gsjb=$_GET["gsjb"];
//				   echo $gsjb;
				   if($gsjb=='全部'){
				   	$sql = "select * from 我的工程  ";
				   }
				   else {
				   	$sql = "select * from 我的工程   where 所属公司='$gsjb'";
				   };
//				   $sql = "select * from 我的工程  ";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_assoc()) {
                         					
                   ?>
                   <tr class="">
                   <td><?php echo $row["id"];?></td>
                   <!--<td><a href="ProjectPlus/Project_in.php？id='+<?php echo $row["工程名称"];?>+'"><?php echo $row["工程名称"];?></a></td>-->
                   <td><a href="ProjectPlus/xmbxczg.php?id=<?php echo $row["id"];?>&<?php $yhid=$_GET["yhid"]; echo $yhid;?>"><?php echo $row["工程名称"];?></a></td>
                   <td><?php echo $row["项目类别"];?></td>
                   <td><?php echo $row["形象进度"];?></td>
                  
                   <!--<td><?php echo $row["审核结果"];?></td>
                   <td><?php echo $row["整改"];?></td>
                   <td><?php echo $row["扣分"];?></td>
                   <td><?php echo $row["停工"];?></td>-->
                   <!--<td><a class="xxi" sjc="<?php echo $row["时间戳"];?>">详细</a></td>
                   <td><a class="schu" sjc="<?php echo $row["时间戳"];?>">删除</a></td>
                   <td class="hidden"><a id="<?php echo $row["时间戳"];?>" class="delete" href="javascript:;" >Delete</a></td>
                   <td><a class="QrCode" sjc="<?php echo $row["时间戳"];?>">操作</a></td>
                     
                   </tr>-->
                   <?php
						}
						$conn->close();
																	
					?>
			</tbody>
		</table>
	</div>
</div>

 <!-- <script src="../js/ProjectPlus/table.js"></script> -->
 <!-- <script src="../js/Other/baiduMap.js"></script> -->
<script src="js/ProjectPlus/table.js"></script>

<script type="text/javascript">
$("#save1").click(function(){ 
    $.ajax({ 
        url:'bc1.php', 
        type:"POST", 
        data:$('#xmdjform').serialize(),
        success: function(data) { 
            $("#result").text(data); 
        } 
    }); 
});  
</script>



