<?php
/* BookmarkCategories Test cases generated on: 2011-03-19 06:02:42 : 1300514562*/
App::import('Controller', 'BookmarkCategories');

class TestBookmarkCategoriesController extends BookmarkCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BookmarkCategoriesControllerTest extends CakeTestCase {
	var $fixtures = array('app.bookmark_category', 'app.bookmark', 'app.account', 'app.project', 'app.project_category');

	function startTest() {
		$this->BookmarkCategories =& new TestBookmarkCategoriesController();
		$this->BookmarkCategories->constructClasses();
	}

	function endTest() {
		unset($this->BookmarkCategories);
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