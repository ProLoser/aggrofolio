$(document).ready(function(){
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('#import').click(function(e){
		e.preventDefault();
		$('.overlay').addClass('active');
	});
	$('.modal .close').click(function(e){
		e.preventDefault();
		$('.overlay').removeClass('active');
	});
	$('.ajax').click(function(e){
		e.preventDefault();
		$('.modal .target').load($(this).attr('href'), function(response){
			$('.overlay').addClass('active');
		});
	});
});