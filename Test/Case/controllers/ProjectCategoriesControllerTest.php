<?php
/* ProjectCategories Test cases generated on: 2011-02-28 08:31:18 : 1298881878*/
App::import('Controller', 'ProjectCategories');

class TestProjectCategoriesController extends ProjectCategoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProjectCategoriesControllerTest extends CakeTestCase {
	var $fixtures = array('app.project_category');

	function startTest() {
		$this->ProjectCategories =& new TestProjectCategoriesController();
		$this->ProjectCategories->constructClasses();
	}

	function endTest() {
		unset($this->ProjectCategories);
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