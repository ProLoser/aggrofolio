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
	
	$('.message').click(function(){
		$(this).fadeOut();
	});
	
	// choose text for the show/hide link - can contain HTML (e.g. an image)
	var showText='Show';
	var hideText='Hide';
	// initialise the visibility check
	var is_visible = false;
	// append show/hide links to the element directly preceding the element with a class of "toggle"
	$('.toggle').prev().append(' <a href="#" class="toggleLink">'+hideText+'</a>');
	// hide all of the elements with a class of 'toggle'
	$('.toggle').show();
	// capture clicks on the toggle links
	$('a.toggleLink').click(function() {
		// switch visibility
		is_visible = !is_visible;
		// change the link text depending on whether the element is shown or hidden
		if ($(this).text()==showText) {
			$(this).text(hideText);
			$(this).parent().next('.toggle').slideDown('slow');
		}
		else {
			$(this).text(showText);
			$(this).parent().next('.toggle').slideUp('slow');
		}
		// return false so any link destination is not followed
		return false;
	});
});