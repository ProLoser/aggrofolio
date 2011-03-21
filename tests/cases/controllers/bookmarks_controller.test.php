<?php
/* Bookmarks Test cases generated on: 2011-03-19 06:02:29 : 1300514549*/
App::import('Controller', 'Bookmarks');

class TestBookmarksController extends BookmarksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BookmarksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.bookmark', 'app.account', 'app.project', 'app.project_category', 'app.bookmark_category');

	function startTest() {
		$this->Bookmarks =& new TestBookmarksController();
		$this->Bookmarks->constructClasses();
	}

	function endTest() {
		unset($this->Bookmarks);
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