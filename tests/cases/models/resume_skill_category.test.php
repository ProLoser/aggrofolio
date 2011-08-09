<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/test.ctp on line 22
/* ResumeSkillCategory Test cases generated on: 2011-08-08 23:38:15 : 1312871895*/
App::import('Model', 'ResumeSkillCategory');

class ResumeSkillCategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_skill_category', 'app.resume_skill', 'app.account', 'app.project', 'app.project_category', 'app.resume_employer', 'app.post_relationship', 'app.album', 'app.media_category', 'app.media_item', 'app.bookmark', 'app.bookmark_category', 'app.resume', 'app.resume_item', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skills_resume', 'app.resume_employers_resume', 'app.post', 'app.post_category', 'app.comment');

	function startTest() {
		$this->ResumeSkillCategory =& ClassRegistry::init('ResumeSkillCategory');
	}

	function endTest() {
		unset($this->ResumeSkillCategory);
		ClassRegistry::flush();
	}

}
