
$(document).ready(function() {
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
    		if ($(this).children("ul").length==0) {
    			//$(".col-md-10").load("ProjectPlus/table.html?flag=1");
    		}
    	});
    	
    	//二级导航事件监听
    	$(".bs-docs-sidenav .nav > li").click(function(){
    		$(".bs-docs-sidenav .nav > li").removeClass("active");
    		$(this).addClass("active");
    		//ajax刷新表格内容
    		//$("tbody").load("../../ProjectPlus/table.html");
    		//$(".col-md-10").load("ProjectPlus/table.html?flag=2");
    	});
	
});