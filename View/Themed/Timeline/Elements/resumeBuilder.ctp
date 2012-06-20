<div class="span2 sidebar-nav ng-cloak" ng-cloak ng-show="resumeBuilder">
	<div class="well">
		<h3>
			Resume Builder
		</h3>
		<ul ng-show="resumeList" class="nav nav-list">
			<li ng-repeat="(id, resume) in data.resumes">
				<?php echo $this->Html->link('{{resume}}', array('controller' => 'resumes', 'action' => 'edit', '{{id}}')); ?>
			</li>
		</ul>
		<ul ng-hide="resumeList" class="nav nav-list">
			<li ng-hide="empty(resume['ResumeEmployer'])" class="nav-header">Employers</li>
			<li ng-repeat="work in resume['ResumeEmployer']">
				<!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeEmployer',id)"></a> -->
				<a href="#{{work.ResumeEmployer.id}}">{{work.ResumeEmployer.name}}</a>
			</li>
			<li ng-hide="empty(resume['ResumeSchool'])" class="nav-header">Education</li>
			<li ng-repeat="school in resume['ResumeSchool']">
				<!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeSchool',id)"></a> -->
				<a href="#{{school.ResumeSchool.id}}">{{school.ResumeSchool.name}}</a>
			</li>
			<li ng-hide="empty(resume['Project'])" class="nav-header">Projects</li>
			<li ng-repeat="project in resume['Project']">
				<!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('Project',id)"></a> -->
				<a href="#{{project.Project.id}}">{{project.Project.name}}</a>
			</li>
			<li ng-hide="empty(resume['Post'])" class="nav-header">Posts</li>
			<li ng-repeat="post in resume['Post']">
				<!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('Post',id)"></a> -->
				<a href="#{{post.Post.id}}">{{post.Post.subject}}</a>
			</li>
			<li ng-hide="empty(resume['ResumeSkill'])" class="nav-header">Skills</li>
			<li ng-repeat="skill in resume['ResumeSkill']">
				<!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeSkill',id)"></a> -->
				<a href="#{{skill.id}}">{{skill.name}}</a>
			</li>
		</ul>
		<a ng-hide="empty(data.resumes)||resumeList" class="btn" ng-click="resumeList=true">Load</a>
		<a ng-hide="empty(data.resumes)||!resumeList" class="btn" ng-click="resumeList=false">Cancel</a>
		<a class="btn" ng-click="reset()">Reset</a>
		<a class="btn btn-primary" ng-click="resumeNext()">Next</a>
	</div><!--/.well -->
</div><!--/span-->