<?php
/* Resume Test cases generated on: 2011-02-15 12:22:57 : 1297772577*/
App::import('Model', 'Resume');

class ResumeTest extends CakeTestCase {
	var $fixtures = array('app.resume', 'app.user', 'app.account', 'app.album', 'app.media_item', 'app.project', 'app.category');

	function startTest() {
		$this->Resume =& ClassRegistry::init('Resume');
	}

	function endTest() {
		unset($this->Resume);
		ClassRegistry::flush();
	}

}
?>