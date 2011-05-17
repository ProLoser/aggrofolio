
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) console.log( Array.prototype.slice.call(arguments) );
};

// place any jQuery/helper plugins in here, instead of separate, slower script files.
$(document).ready(function(){
	$("#radial_container").radmenu({
		listClass: 'list', // the list class to look within for items
		itemClass: 'item', // the items - NOTE: the HTML inside the item is copied into the menu item
		radius: 1, // radius in pixels
		rotateAnimOpts: {
			duration: 300,
			easing: "linear"
		},
		centerX: 350, // the center x axis offset
		centerY: 0, // the center y axis offset
		angleOffset: 145 // in radians the angle that the elements are offset at
	}).radmenu("scale", 250).radmenu("show").radmenu("scale", 1).hover(function(){
		$(this).radmenu('scale', 250).find('.radial_div').animate({
			opacity: 1
		}, 200);
	},function(){
		$(this).radmenu('scale', 1).find('.radial_div').animate({
			opacity: .4
		}, 200);
	}).mousewheel(function(event, delta){
		if (delta > 0) {
			$(this).radmenu('prev');
		} else {			
			$(this).radmenu('next');
		}
		return false;
	});
	$('#radleft').click(function(){
		$('#radial_container').radmenu('prev');
	});
	
	$('#radright').click(function(){
		$('#radial_container').radmenu('next');
	});
	$('.media a:not(.arrow)').fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	400, 
		'speedOut'		:	200
	});
	$('#categories a').qtip({
		style: 'ui-tooltip-dark ui-tooltip-rounded',
		position: {
			my: 'left middle',
			at: 'right middle',
			adjust: {
				x: 10
			}
		}
	});
	$('#commits a').qtip({
		style: 'ui-tooltip-dark ui-tooltip-rounded',
		position: {
			my: 'bottom left',
			at: 'top left',
			adjust: {
				x: 50
			}
		}
	});
	$('#stats a, #stats p').qtip({
		style: 'ui-tooltip-dark ui-tooltip-rounded',
		position: {
			my: 'bottom left',
			at: 'top left',
			adjust: {
				x: 50,
				y: 10
			}
		}
	});
	$('.log li').qtip({
		position: {
			my: 'top left',
			at: 'bottom left',
			adjust: {
				x: 120,
				y: 4
			}
		},
		style: 'ui-tooltip-dark ui-tooltip-rounded',
		content: {
			text: function(){ 
				content = $('div', this).html();
				if (content.length > 0)
					return content;
			}
		}
	});
	$('.projects li').qtip({
		position: {
			my: 'top center',
			at: 'bottom center',
			adjust: {
				y: 4
			}
		},
		style: 'ui-tooltip-dark ui-tooltip-rounded',
		content: {
			text: function(){ 
				content = $('div', this).html();
				if (content.length > 0)
					return content;
			}
		}
	});
});