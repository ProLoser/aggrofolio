$(document).ready(function(){ 
	// Tabs
	$("article.tabs > header li:first").addClass("active");
	$("article.tabs > ul li:gt(0)").hide();
	$("article.tabs > header li").click(function(e) {
		$link = $(this);
		$target = $(">ul li:eq("+$link.index()+")", $link.closest('article.tabs'));
		$link.addClass("active").siblings().removeClass("active");
		$target.siblings().fadeOut(500, function(){
			$target.fadeIn(500);
		});
		e.preventDefault();
	});

    $('body, #sidebar, #main').equalHeight();

	$('textarea').markItUp(mySettings);
});