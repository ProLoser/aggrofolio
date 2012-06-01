$(document).ready(function(){
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('#import').click(function(e){
		e.preventDefault();
		$('.modal').fadeIn();
	});
	$('.modal .close').click(function(e){
		e.preventDefault();
		$('.modal').fadeOut();
	});
});