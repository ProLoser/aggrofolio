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
	$('#categories a.reset').hide().click(function(){
		$('.gallery ul li, .posts article').animate({
			opacity: 1
		}, 600);
		$(this).fadeOut(600);
		return false;
	});
	$('.projects .names li').bind('mouseover', function(){
		target = '.' + $('a', this).attr('rel');
		$siblings = $('.projects .thumbs li:not(' + target + ')');
		$siblings.slideUp(400, function() {
			$siblings.siblings(target).slideDown(600);
		});
	});
});





















