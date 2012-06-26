$(document).ready(function(){
	$('a[title]').tooltip();
	$('#AccountPublished').change(function(e){
		$('input:checkbox').attr('checked', $(this).is(':checked'));
	});
	$('.ajax').live('click', function(e){
		e.preventDefault();
		$('.modal').load($(this).attr('href'), function(response){
			$('.modal').modal();
			$('.modal-footer .btn-primary').click(function(e){
				e.preventDefault();
				$(this).closest('div').prev('form').submit();
			});
			$('.modal .select select').select2({ width: '250px', allowClear: true});
			$('.modal a[title]').tooltip({placement:'bottom'});
		});
	});
});

function Importer ($scope, $http) {
	$scope.resume = {
		'ResumeSchool' : [],
		'ResumeEmployer' : [],
		'Project' : [],
		'Post' : [],
		'Album' : [],
		'MediaItem' : [],
		'ResumeSkill' : []
	};
	$scope.reset = function() {
		angular.forEach($scope.resume, function(value, key){
			$scope.resume[key] = [];
		});
	};
	$scope.reset();
	$scope.toggle = function(model, record) {
		var index = $.inArray(record, $scope.resume[model]);
		if (index === -1) {
			$scope.resume[model].push(record);
			if (model === 'Project') {
				angular.forEach(record.ResumeSkill, function(value){
					$scope.resume.ResumeSkill.push(value);
				});
			}
		} else {
			$scope.resume[model].splice(index, 1);
		}
	};
	$scope.empty = $.isEmptyObject;
	$scope.data = {};
	$http({ url: '/admin/projects.json' }).success(function(data){
		angular.extend($scope.data, data);
	});
	$http({ url: '/admin/resumes.json' }).success(function(data){
		angular.extend($scope.data, data);
	});
	$http({ url: '/admin/resume_skills.json' }).success(function(data){
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