$(document).ready(function(){
	$('a[title]').tooltip();
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('.ajax').click(function(e){
		e.preventDefault();
		$('.modal').load($(this).attr('href'), function(response){
			$('.modal').modal();
			$('.modal a[title]').tooltip({placement:'bottom'});
		});
	});
});