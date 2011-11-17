<?php
/* Post Test cases generated on: 2011-02-15 11:34:48 : 1297769688*/
App::import('Model', 'Post');

class PostTest extends CakeTestCase {
	var $fixtures = array('app.post');

	function startTest() {
		$this->Post =& ClassRegistry::init('Post');
	}

	function endTest() {
		unset($this->Post);
		ClassRegistry::flush();
	}

}
?>