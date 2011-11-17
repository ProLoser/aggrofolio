<?php
/* Resumes Test cases generated on: 2011-03-21 08:58:20 : 1300697900*/
App::import('Controller', 'Resumes');

class TestResumesController extends ResumesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumesControllerTest extends CakeTestCase {
	var $fixtures = array('app.resume', 'app.resume_recommendation', 'app.account', 'app.project', 'app.project_category', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.album', 'app.media_category', 'app.media_item', 'app.albums_resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->Resumes =& new TestResumesController();
		$this->Resumes->constructClasses();
	}

	function endTest() {
		unset($this->Resumes);
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