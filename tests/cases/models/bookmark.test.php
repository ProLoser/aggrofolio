<?php
/* Bookmark Test cases generated on: 2011-03-19 06:02:28 : 1300514548*/
App::import('Model', 'Bookmark');

class BookmarkTestCase extends CakeTestCase {
	var $fixtures = array('app.bookmark', 'app.account', 'app.project', 'app.project_category', 'app.bookmark_category');

	function startTest() {
		$this->Bookmark =& ClassRegistry::init('Bookmark');
	}

	function endTest() {
		unset($this->Bookmark);
		ClassRegistry::flush();
	}

}
?>