
$(document).ready(function() {
	$(".tab-content").on("click",function(event){
		var targetId=event.target.id;
//		alert(targetId);
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
		}
	});

});