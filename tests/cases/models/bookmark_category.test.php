<?php
/* BookmarkCategory Test cases generated on: 2011-03-19 06:02:41 : 1300514561*/
App::import('Model', 'BookmarkCategory');

class BookmarkCategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.bookmark_category', 'app.bookmark', 'app.account', 'app.project', 'app.project_category');

	function startTest() {
		$this->BookmarkCategory =& ClassRegistry::init('BookmarkCategory');
	}

	function endTest() {
		unset($this->BookmarkCategory);
		ClassRegistry::flush();
	}

}
?>