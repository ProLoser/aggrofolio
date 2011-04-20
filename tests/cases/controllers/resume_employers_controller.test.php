<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/test.ctp on line 22
/* ResumeEmployers Test cases generated on: 2011-04-19 04:13:15 : 1303211595*/
App::import('Controller', 'ResumeEmployers');

class TestResumeEmployersController extends ResumeEmployersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumeEmployersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_employer', 'app.account', 'app.project', 'app.project_category', 'app.resume_school', 'app.post_relationship', 'app.album', 'app.media_category', 'app.media_item', 'app.bookmark', 'app.bookmark_category', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employers_resume', 'app.post');

	function startTest() {
		$this->ResumeEmployers =& new TestResumeEmployersController();
		$this->ResumeEmployers->constructClasses();
	}

	function endTest() {
		unset($this->ResumeEmployers);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>