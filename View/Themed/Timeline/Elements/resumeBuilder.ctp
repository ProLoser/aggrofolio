<div class="span2 sidebar-nav ng-cloak" ng-cloak ng-show="resumeBuilder">
<div class="well">
      <h3>
            Resume Builder
      </h3>
      <ul class="nav nav-list">
            <li ng-hide="empty(resume['ResumeEmployer'])" class="nav-header">Employers</li>
            <li ng-repeat="(id, work) in resume['ResumeEmployer']">
                  <!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeEmployer',id)"></a> -->
                  <a href="#">Link</a>
            </li>
            <li ng-hide="empty(resume['ResumeSchool'])" class="nav-header">Education</li>
            <li ng-repeat="(id, school) in resume['ResumeSchool']">
                  <!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeSchool',id)"></a> -->
                  <a href="#">Link</a>
            </li>
            <li ng-hide="empty(resume['Project'])" class="nav-header">Projects</li>
            <li ng-repeat="(id, project) in resume['Project']">
                  <!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('Project',id)"></a> -->
                  <a href="#">Link</a>
            </li>
            <li ng-hide="empty(resume['Post'])" class="nav-header">Posts</li>
            <li ng-repeat="(id, post) in resume['Post']">
                  <!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('Post',id)"></a> -->
                  <a href="#">Link</a>
            </li>
            <li ng-hide="empty(resume['ResumeSkill'])" class="nav-header">Skills</li>
            <li ng-repeat="(id, skill) in resume['ResumeSkill']">
                  <!-- <a title="Remove from Resume" class="icon-remove" ng-click="toggle('ResumeSkill',id)"></a> -->
                  <a href="#">Link</a>
            </li>
      </ul>

      <a class="btn" ng-click="save()">Save</a>
</div><!--/.well -->
</div><!--/span-->