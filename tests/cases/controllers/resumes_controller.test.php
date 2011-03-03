<?php
/* Resumes Test cases generated on: 2011-02-28 08:43:15 : 1298882595*/
App::import('Controller', 'Resumes');

class TestResumesController extends ResumesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.resume', 'app.resume_recommendation', 'app.resumes_resume_recommendation');

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