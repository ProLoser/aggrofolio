<?php
class Project extends AppModel {
	var $name = 'Project';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url' => array(
			'rule' => 'isUnique',
			'message' => 'This project url already exists',
		)
	);
	var $actsAs = array('Github');

	var $belongsTo = array(
		'Category',
		'User',
		'Account',
	);   
	
}
?>