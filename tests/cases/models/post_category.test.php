<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/test.ctp on line 22
/* PostCategory Test cases generated on: 2011-05-16 20:35:37 : 1305603337*/
App::import('Model', 'PostCategory');

class PostCategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.post_category', 'app.post', 'app.comment', 'app.post_relationship', 'app.project', 'app.account', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.resume_employers_resume', 'app.project_category', 'app.album', 'app.media_category', 'app.media_item', 'app.bookmark', 'app.bookmark_category');

	function startTest() {
		$this->PostCategory =& ClassRegistry::init('PostCategory');
	}

	function endTest() {
		unset($this->PostCategory);
		ClassRegistry::flush();
	}

}
?>