<?php
/* ResumeItem Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/fixture.ctp on line 24
2011-06-01 19:51:24 : 1306983084 */
class ResumeItemFixture extends CakeTestFixture {
	var $name = 'ResumeItem';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'resume_item_type_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'comment' => 'Where they came from'),
		'resume_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'created' => '2011-06-01 19:51:24',
			'modified' => '2011-06-01 19:51:24',
			'resume_item_type_id' => 1,
			'account_id' => 1,
			'resume_id' => 1
		),
	);
}
