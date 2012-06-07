$(document).ready(function(){
	var suggest = true;
	$('#UserSubdomain').on('focus', function(e){
		suggest = false;
	});
	$('#UserRegisterForm #UserName').on('keyup', function(e){
		if (suggest) {
			var newVal = $(this).val();
			newVal = newVal.toLowerCase().replace(/\s/g,'');
			$('#UserSubdomain').val(newVal);
			$('#subdomainExample').html(newVal);
		}
	});
	$('#UserRegisterForm #UserSubdomain').on('keyup', function(e){
		$('#subdomainExample').html($(this).val());
	});
});