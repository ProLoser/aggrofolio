<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/test.ctp on line 22
/* PostCategories Test cases generated on: 2011-05-16 20:44:25 : 1305603865*/
App::import('Controller', 'PostCategories');

class TestPostCategoriesController extends PostCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PostCategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.post_category', 'app.post', 'app.comment', 'app.post_relationship', 'app.project', 'app.account', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.resume_employers_resume', 'app.project_category', 'app.album', 'app.media_category', 'app.media_item', 'app.bookmark', 'app.bookmark_category');

	function startTest() {
		$this->PostCategories =& new TestPostCategoriesController();
		$this->PostCategories->constructClasses();
	}

	function endTest() {
		unset($this->PostCategories);
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