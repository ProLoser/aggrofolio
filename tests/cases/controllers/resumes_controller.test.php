<?php
/* Resumes Test cases generated on: 2011-02-15 12:22:58 : 1297772578*/
App::import('Controller', 'Resumes');

class TestResumesController extends ResumesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.resume', 'app.user', 'app.account', 'app.album', 'app.media_item', 'app.project', 'app.category');

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