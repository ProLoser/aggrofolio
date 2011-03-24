<?php
/* Albums Test cases generated on: 2011-03-23 11:01:28 : 1300878088*/
App::import('Controller', 'Albums');

class TestAlbumsController extends AlbumsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AlbumsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.album', 'app.account', 'app.project', 'app.project_category', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.albums_resume_employer', 'app.resume_employers_resume', 'app.media_category', 'app.media_item', 'app.albums_resume_school');

	function startTest() {
		$this->Albums =& new TestAlbumsController();
		$this->Albums->constructClasses();
	}

	function endTest() {
		unset($this->Albums);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>