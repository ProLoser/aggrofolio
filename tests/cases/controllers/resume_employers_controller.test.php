<?php
/* ResumeEmployers Test cases generated on: 2011-02-28 09:36:00 : 1298885760*/
App::import('Controller', 'ResumeEmployers');

class TestResumeEmployersController extends ResumeEmployersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumeEmployersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_employer', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employers_resume', 'app.albums_resume_employer');

	function startTest() {
		$this->ResumeEmployers =& new TestResumeEmployersController();
		$this->ResumeEmployers->constructClasses();
	}

	function endTest() {
		unset($this->ResumeEmployers);
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