<?php
/* User Test cases generated on: 2011-02-15 12:22:51 : 1297772571*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.account', 'app.album', 'app.media_item', 'app.project', 'app.category', 'app.resume');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

}
?>