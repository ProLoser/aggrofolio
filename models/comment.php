<?php
class Comment extends AppModel {
	var $name = 'Comment';
	var $validate = array(
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a subject',
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify your name',
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('email'),
				'message' => 'Please specify a valid email',
			),
		),
		'website' => array(
			'notempty' => array(
				'rule' => array('url'),
				'message' => 'This is an invalid url',
				'allowEmpty' => true,
			),
		),
		'body' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'human' => array(
			'rule' => array('equalTo', '1'),
			'message' => 'Nope, guess again'
		)
	);
}
?>