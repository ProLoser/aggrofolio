$(document).ready(function(){
	var suggest = true;
	$('#UserRegisterForm #UserName').on('keyup', function(e){
		if (suggest) {
			var newVal = $(this).val();
			newVal = newVal.toLowerCase().replace(/\s/g,'');
			$('#UserSubdomain').val(newVal);
			$('#subdomainExample span').html(newVal);
		}
	});
	$('#UserRegisterForm #UserSubdomain').on('keyup', function(e){
		suggest = false;
		$('#subdomainExample span').html($(this).val());
	});
});