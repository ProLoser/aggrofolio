/* Author: Dean Sofer

*/

$(document).ready(function(){
	$('article').hover(function(){
		$('.projects', this).stop(true).animate({
			opacity: 'toggle',
			height: 'toggle'
		}, 400);
	},function(){
		$('.projects', this).stop(true).animate({
			opacity: 'toggle',
			height: 'toggle'
		}, 400, function(){
			$(this).css({
				height: 'auto',
				opacity: 1
			});
		});
	});
	
	$('#categories ul a').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).animate({
			opacity: 1
		}, 600).siblings(':not(' + selector + ')').animate({
			opacity: .4
		}, 600);
		if ($(selector).length)
			$('#categories .reset').fadeIn(600);
		return false;
	});
	$('#categories .reset a').click(function(){
		$('.gallery ul li').animate({
			opacity: 1
		}, 600);
		$(this).closest('.reset').fadeOut(600);
		return false;
	});
});





















