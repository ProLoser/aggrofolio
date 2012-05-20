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
		),
		'inhuman' => array(
			'rule' => array('equalTo', ''),
			'message' => "I can't let you do that Dave.",
		),
	);
	
	var $belongsTo = array(
		'User',
	);

/**
 * Strips garbage before saving. I could do it on display but I decided to just reduce overhead in exchange for later versatility
 *
 * @param string $value 
 * @return true
 */
	public function beforeSave($options = array()) {
		if (!parent::beforeSave($options)) {
			return false;
		}
		if (isset($this->data['Contact']['body'])) {
			App::uses('Sanitize', 'Utility');
			$this->data['Contact']['body'] = Sanitize::html($this->data['Contact']['body']);
		}
		return true;
	}
}