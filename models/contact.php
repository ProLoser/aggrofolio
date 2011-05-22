<?php
class Contact extends AppModel {
	var $name = 'Contact';
	var $validate = array(
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid subject',
				'required' => true,
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid message',
				'required' => true,
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email',
				'required' => true,
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid name',
				'required' => true,
			),
		),
		'phone' => array(
			'phone' => array(
				'rule' => array('phone'),
				'message' => 'Please enter a valid phone number',
				'allowEmpty' => true,
			)
		),
		'human' => array(
			'rule' => array('equalTo', '1'),
			'message' => 'Nope, guess again',
			'required' => true,
		)
	);
}