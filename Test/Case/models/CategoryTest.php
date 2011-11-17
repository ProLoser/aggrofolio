<?php
/* Category Test cases generated on: 2011-02-15 11:33:46 : 1297769626*/
App::import('Model', 'Category');

class CategoryTest extends CakeTestCase {
	var $fixtures = array('app.category', 'app.project');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}

}
?>