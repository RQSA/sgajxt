
$(document).ready(function() {
	$(".tab-content").on("click",function(event){
		var targetId=event.target.id;
		//alert(targetId);
		switch(targetId){
			case "save1":
				$('.nav-tabs a[href="#sbdj"]').tab('show');
				break;
			case "save2":
				$('.nav-tabs a[href="#azgz"]').tab('show');
			case "save3":
				$('.nav-tabs a[href="#sydj"]').tab('show');
				break;
			case "save4":
				$('.nav-tabs a[href="#cxgz"]').tab('show');
				break;
			case "save5":
				$('.nav-tabs a[href="#cg"]').tab('show');
				break;
			case "save6":
				$('.nav-tabs a[href="#zgz"]').tab('show');
			case "save7":
				$('.nav-tabs a[href="#yq"]').tab('show');
				break;
			case "save8":
				location.reload();
				break;
		}
	});

});