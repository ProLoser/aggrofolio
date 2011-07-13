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
		$('ul.gallery li, .posts article').animate({
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
	
	$('#mainNav li:not(.freset, .resume, .contact) a, #filters a:not(.freset)').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).show().removeClass('faded', 1000).siblings(':not(' + selector + ')').addClass('faded', 1000, function(){
			$(this).hide();
		});
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
	$('#mainNav a.freset, #filters a.freset').click(function(){
		$('.log > li').show().removeClass('faded', 1000);
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
});