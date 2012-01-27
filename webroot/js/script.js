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
	
	$('#categories ul a:not(.reset)').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).animate({
			opacity: 1
		}, 600).siblings(':not(' + selector + ')').animate({
			opacity: .4
		}, 600);
		if ($(selector).length) {
			$('#categories .reset').fadeOut(200);
			$(this).prev().fadeIn(600);
		}
		return false;
	});
	$('#categories a.reset').click(function(){
		$(this).fadeOut(600, function() {
			$(this).remove();
		});
		$('ul.gallery li, .posts article').animate({
			opacity: 1
		}, 600);
		return false;
	});
	
	$('.projects .names li').bind('mouseover', function(){
		target = '.' + $('a', this).attr('rel');
		$siblings = $('.projects .thumbs li:not(' + target + ')');
		$siblings.slideUp(400, function() {
			$siblings.siblings(target).slideDown(600);
		});
	});
	
	$('#filters a:not(.freset)').click(function(){
		selector = '.' + $(this).attr('id');
		$(selector).show().removeClass('faded', 1000).siblings(':not(' + selector + ')').addClass('faded', 1000, function(){
			$(this).hide();
		});
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
	$('#filters a.freset').click(function(){
		$('.log > li').show().removeClass('faded', 1000);
		$(this).addClass('current').siblings().removeClass('current');
		return false;
	});
	
	/**
	 * Fixed Static position Navigation menu. When the page is scrolled down the menu sticks to the top of the screen.
	 *
	 * Website: http://www.bennadel.com/blog/1810-Creating-A-Sometimes-Fixed-Position-Element-With-jQuery.htm
	 */
	// Bind to the window scroll and resize events. Remember, resizing can also change the scroll of the page.
	// $(window).bind("scroll resize", function(){	
	// 		$header = $('#main > header');
	// 		// Get the current scroll of the window.
	// 		var viewTop = $(this).scrollTop();
	// 		// Check to see if the view had scroll down past the top of the placeholder AND that the message is not yet fixed.
	// 		if ((viewTop > 0) && !$header.is(".hover")) {
	// 			$header.addClass("hover"); 
	// 		// Check to see if the view has scroll back up above the message AND that the message is currently fixed.
	// 		} else if ((viewTop <= 0) && $header.is(".hover")){
	// 			$header.removeClass("hover");
	// 		}
	// 	});
});