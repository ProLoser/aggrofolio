$(document).ready(function(){
	$('a[title]').tooltip();
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('.ajax').live('click', function(e){
		e.preventDefault();
		$('.modal').load($(this).attr('href'), function(response){
			$('.modal').modal();
			// $('.modal .select select').select2({ width: '250px', allowClear: true});
			$('.modal a[title]').tooltip({placement:'bottom'});
		});
	});
});

function Importer ($scope, $http) {
	$scope.resume = {
		'ResumeSchool' : {},
		'ResumeEmployer' : {},
		'Project' : {},
		'Post' : {},
		'Album' : {},
		'MediaItem' : {},
		'ResumeSkill' : {}
	};
	$scope.toggle = function(model, id) {
		if ($scope.resume[model][id]) {
			delete $scope.resume[model][id];
		} else {
			$scope.resume[model][id] = true;
		}
	};
	$scope.empty = $.isEmptyObject;
	$http({ url: 'importer.json' }).success(function(data){
		$scope.data = data;
	});
}