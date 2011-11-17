<?php
/* Comments Test cases generated on: 2011-02-15 11:41:50 : 1297770110*/
App::import('Controller', 'Comments');

class TestCommentsController extends CommentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CommentsControllerTest extends CakeTestCase {
	var $fixtures = array('app.comment');

	function startTest() {
		$this->Comments =& new TestCommentsController();
		$this->Comments->constructClasses();
	}

	function endTest() {
		unset($this->Comments);
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