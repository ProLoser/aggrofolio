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
	function d(s) { 
		return new Date(s.replace(" ", "T") + "Z"); 
	}
	function datePercent(middleDate, lowDate, highDate) {
		return 100 * (d(middleDate) - lowDate) / (highDate - lowDate);
	}
	$scope.resume = {
		'ResumeSchool' : [],
		'ResumeEmployer' : [],
		'Project' : [],
		'Post' : [],
		'Album' : [],
		'MediaItem' : [],
		'ResumeSkill' : []
	};
	$scope.resumeNext = function() {
		$scope.$root.modal = '/admin/resumes/add';
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
	$scope.high = new Date(2012,12,30);
	$scope.low = new Date(2008,1,1);
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
		angular.forEach(data.works, function(work, i){
			work.ResumeEmployer.percent_start = datePercent(work.ResumeEmployer.date_started, $scope.low, $scope.high);
			if (work.ResumeEmployer.percent_start < 0) {
				work.ResumeEmployer.percent_start = 0;
			}
			if (work.ResumeEmployer.date_ended) {
				work.ResumeEmployer.percent_end = datePercent(work.ResumeEmployer.date_ended, $scope.low, $scope.high);
			} else {
				work.ResumeEmployer.percent_end = 100;
			}
		});
		angular.extend($scope.data, data);
	});
	$http({ url: '/admin/resume_schools.json' }).success(function(data){
		angular.forEach(data.schools, function(school, i){
			school.ResumeSchool.percent_start = datePercent(school.ResumeSchool.date_started, $scope.low, $scope.high);
			if (school.ResumeSchool.percent_start < 0) {
				school.ResumeSchool.percent_start = 0;
			}
			if (school.ResumeSchool.date_ended) {
				school.ResumeSchool.percent_end = datePercent(school.ResumeSchool.date_ended, $scope.low, $scope.high);
			} else {
				school.ResumeSchool.percent_end = 100;
			}
		});
		angular.extend($scope.data, data);
	});
	$http({ url: '/admin/posts.json' }).success(function(data){
		angular.extend($scope.data, data);
	});
}