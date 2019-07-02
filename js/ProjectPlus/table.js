
$(document).ready(function() {	
	//表格初始化
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
	$("tbody a").on("click",function(){
		//var $href=$(this).attr("href");
		//$("#container").load($href);
		//return false;
	});
	
	$("#toolbar button").on("click",function(){
		$("#xmbj").removeClass("my_none");
		$("#gclb").addClass("my_none");		
		return false;
	});
	
	
	$(".tab-content").on("click",function(event){
		var targetId=event.target.id;
		//alert(targetId);
		switch(targetId){
			case "save1":
				$('.nav-tabs a[href="#zrr"]').tab('show');
				break;
			case "save2":
				$('.nav-tabs a[href="#glry"]').tab('show');
				break;
			case "save3":
				$('.nav-tabs a[href="#gjzl"]').tab('show');
				break;
			case "save4":
				$('.nav-tabs a[href="#xxjd"]').tab('show');
				break;
			case "save5":
				location.reload();
				break;
			case "save6":
			    self.location='index.php';
			    
			    break;
		}
	});

});