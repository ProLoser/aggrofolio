<?php
/* Project Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/Los_Angeles' for 'PDT/-7.0/DST' instead in /Users/Dean/Sites/cakephp/cake/console/templates/default/classes/fixture.ctp on line 24
2011-06-01 19:51:24 : 1306983084 */
class ProjectFixture extends CakeTestFixture {
	var $name = 'Project';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'hash_tag' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cvs_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'project_category_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'If deleted from api'),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'owner' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'resume_employer_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'resume_school_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'created' => '2011-06-01 19:51:24',
			'modified' => '2011-06-01 19:51:24',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'hash_tag' => 'Lorem ipsum dolor sit amet',
			'cvs_url' => 'Lorem ipsum dolor sit amet',
			'project_category_id' => 1,
			'published' => 1,
			'deleted' => 1,
			'account_id' => 1,
			'owner' => 'Lorem ipsum dolor sit amet',
			'resume_employer_id' => 1,
			'resume_school_id' => 1,
			'url' => 'Lorem ipsum dolor sit amet'
		),
	);
}
