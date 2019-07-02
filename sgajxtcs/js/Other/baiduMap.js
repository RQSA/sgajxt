$(document).ready(function() {
	
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(114.034434,22.539582);
	map.centerAndZoom(point,12);
	
	 // 添加带有定位的导航控件
	 var navigationControl = new BMap.NavigationControl({
	 	// 靠左上角位置
	 	anchor: BMAP_ANCHOR_TOP_LEFT,
	 	// LARGE类型
	 	type: BMAP_NAVIGATION_CONTROL_LARGE,
	 	// 启用显示定位
	 	enableGeolocation: true
	 });
	 map.addControl(navigationControl);
	
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放	
	
	//单击获取点击的经纬度
	map.addEventListener("click",function(e){
		map.clearOverlays();
		var jwd=document.getElementById("jwd");
		jwd.value=e.point.lng + "," + e.point.lat;
		
		var clickpoint = new BMap.Point(e.point.lng,e.point.lat);
		var marker = new BMap.Marker(clickpoint);  // 创建标注
		map.addOverlay(marker);               // 将标注添加到地图中
		marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
		return false;
	});
});