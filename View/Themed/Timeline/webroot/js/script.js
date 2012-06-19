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
	$scope.data = {};
	$http({ url: '/admin/projects.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/albums.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/media_items.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/accounts.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/resume_employers.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/resume_schools.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
	$http({ url: '/admin/posts.json' }).success(function(data){
	  angular.extend($scope.data, data);
	});
}