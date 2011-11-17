<?php
/* MediaItems Test cases generated on: 2011-02-15 11:34:27 : 1297769667*/
App::import('Controller', 'MediaItems');

class TestMediaItemsController extends MediaItemsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MediaItemsControllerTest extends CakeTestCase {
	var $fixtures = array('app.media_item', 'app.album');

	function startTest() {
		$this->MediaItems =& new TestMediaItemsController();
		$this->MediaItems->constructClasses();
	}

	function endTest() {
		unset($this->MediaItems);
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