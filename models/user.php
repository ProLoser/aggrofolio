<?php
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Your custom message here',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
	);
	
	var $hasMany = array(
		'Account',
		'Album',
		'Project',
		'Resume',
	);

}
?>