<?php
/* Album Test cases generated on: 2011-02-15 11:34:40 : 1297769680*/
App::import('Model', 'Album');

class AlbumTest extends CakeTestCase {
	var $fixtures = array('app.album', 'app.media_item');

	function startTest() {
		$this->Album =& ClassRegistry::init('Album');
	}

	function endTest() {
		unset($this->Album);
		ClassRegistry::flush();
	}

}
?>