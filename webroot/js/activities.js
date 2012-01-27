$(document).ready(function(){
	// $('.type-Album section').jScrollPane({
	// 		autoReinitialise: true
	// 	});
	$activities = $('.activity > li');
	$('#mainNav li:not(.resume, .contact) a').click(function(e){
		selector = '.' + $(this).attr('id');
		$(this).closest('li').addClass('active').prepend('<a class="reset">Reset</a>').siblings().removeClass('active').find('a.reset').remove();
		$(selector).show().removeClass('faded', 1000).siblings(':not(' + selector + ')').addClass('faded', 1000, function(){
			$(this).hide();
		});
		e.preventDefault();
	});
	$('#mainNav').delegate('a.reset', 'click', function(e){
		e.preventDefault();
		$activities.show().removeClass('faded', 1000);
		$(this).closest('li').removeClass('active');
		$(this).remove();
	});
	$('aside#navigation h1 a').click(function(e){
		$activities.show().removeClass('faded', 1000);
		e.preventDefault();
	});
});