<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/test.ctp on line 22
/* PostRelationship Test cases generated on: 2011-04-19 03:34:11 : 1303209251*/
App::import('Model', 'PostRelationship');

class PostRelationshipTest extends CakeTestCase {
	var $fixtures = array('app.post_relationship', 'app.post');

	function startTest() {
		$this->PostRelationship =& ClassRegistry::init('PostRelationship');
	}

	function endTest() {
		unset($this->PostRelationship);
		ClassRegistry::flush();
	}

}
?>