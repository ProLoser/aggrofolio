$(document).ready(function(){
	// $('.type-Album section').jScrollPane({
	// 		autoReinitialise: true
	// 	});
	
	$('#mainNav li:not(.freset, .resume, .contact) a').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).show().removeClass('faded', 1000).siblings(':not(' + selector + ')').addClass('faded', 1000, function(){
			$(this).hide();
		});
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
	$('#mainNav a.freset').click(function(){
		$('.log > li').show().removeClass('faded', 1000);
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
});