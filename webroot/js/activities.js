$(document).ready(function(){
	// $('.type-Album section').jScrollPane({
	// 		autoReinitialise: true
	// 	});
	
	$('#mainNav li:not(.freset, .resume, .contact) a').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).show().removeClass('faded', 1000).siblings(':not(' + selector + ')').addClass('faded', 1000, function(){
			$(this).hide();
		});
		return false;
	});
	$('aside#navigation h1 a').click(function(){
		$('.activity > li').show().removeClass('faded', 1000);
		return false;
	});
});