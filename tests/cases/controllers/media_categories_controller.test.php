<?php
/* MediaCategories Test cases generated on: 2011-02-28 08:32:58 : 1298881978*/
App::import('Controller', 'MediaCategories');

class TestMediaCategoriesController extends MediaCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MediaCategoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.media_category', 'app.album', 'app.user', 'app.account', 'app.project', 'app.resume', 'app.media_item');

	function startTest() {
		$this->MediaCategories =& new TestMediaCategoriesController();
		$this->MediaCategories->constructClasses();
	}

	function endTest() {
		unset($this->MediaCategories);
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