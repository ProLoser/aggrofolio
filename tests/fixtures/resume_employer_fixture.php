<?php
/* ResumeEmployer Fixture generated on: 2011-02-28 09:35:59 : 1298885759 */
class ResumeEmployerFixture extends CakeTestFixture {
	var $name = 'ResumeEmployer';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'uuid' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date_started' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'date_ended' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'currently_employed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'created' => '2011-02-28 09:35:59',
			'modified' => '2011-02-28 09:35:59',
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 1,
			'uuid' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'date_started' => '2011-02-28',
			'date_ended' => '2011-02-28',
			'currently_employed' => 1,
			'published' => 1,
			'deleted' => 1
		),
	);
}
?>