<?php
/* ProjectCategory Test cases generated on: 2011-02-28 08:31:15 : 1298881875*/
App::import('Model', 'ProjectCategory');

class ProjectCategoryTestCase extends CakeTestCase {
	var $fixtures = array('app.project_category');

	function startTest() {
		$this->ProjectCategory =& ClassRegistry::init('ProjectCategory');
	}

	function endTest() {
		unset($this->ProjectCategory);
		ClassRegistry::flush();
	}

}
?>