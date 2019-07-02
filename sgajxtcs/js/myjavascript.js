	$(document).ready(function() {
		//头部导航事件监听
		$(".navbar-nav > li").click(function(){			
			$(this).siblings().removeClass("active");
			$(this).addClass("active");
		});
		
    	//一级导航事件监听
    	$(".bs-docs-sidenav > li").mouseenter(function(){
    		if ($(this).children("ul").length>0) {
    			$(this).click();
    		}
    		return false;
    	});
    	$(".bs-docs-sidenav > li").click(function(){
    		//一级导航，本元素加active，其他同辈元素去掉active    	
    		$(this).siblings().removeClass("active");
    		
    		//本导航若无二级导航，则去掉所以二级导航的active
    		if ($(this).children("ul").length==0) {
    			$(".bs-docs-sidenav .nav > li").removeClass("active");
    		}
    		
    		//$(".bs-docs-sidenav .nav > li").removeClass("active");
    		$(this).addClass("active");
    	});
    	//二级导航事件监听
    	$(".bs-docs-sidenav .nav > li").click(function(){    		
    		$(".bs-docs-sidenav .nav > li").removeClass("active");    		
    		$(this).addClass("active");
    		
    	});
    	
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
    
    });