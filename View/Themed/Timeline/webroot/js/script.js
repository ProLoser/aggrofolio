$(document).ready(function(){
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('.ajax').click(function(e){
		e.preventDefault();
		$('.modal').load($(this).attr('href'), function(response){
			$('.modal').modal();
			$('.modal [rel=tooltip]').tooltip({placement:'bottom'});
		});
	});
});