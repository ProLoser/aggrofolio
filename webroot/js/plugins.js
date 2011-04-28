
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
		radius: 200, // radius in pixels
		animSpeed:400, // animation speed in millis
		centerX: 500, // the center x axis offset
		centerY: -60, // the center y axis offset
		selectEvent: "click", // the select event (click)
		onSelect: function($selected){ // show what is returned 
			alert("you clicked on .. " + $selected.index());
		},
		angleOffset: Math.PI // in radians
	}).radmenu("show");
	
});