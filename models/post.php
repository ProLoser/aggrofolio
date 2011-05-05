<?php
class Post extends AppModel {
	var $name = 'Post';
	var $displayField = 'subject';
	var $validate = array(
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid subject',
			),
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => '/^[a-zA-Z0-9-\s_]+$/i',
				'message' => 'Slugs must be letters, numbers, dashes and underscores only',
			),
		),
	);
	
	var $hasMany = array(
		'PostRelationship',
		'Comment' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array(
				'Comment.foreign_model' => 'Post',
			)
		)
	);
	
	var $actsAs = array(
		'Log.Logable',
	);
	
	public function beforeValidate() {
		if (isset($this->data['Post']['slug']) && empty($this->data['Post']['slug']))
			$this->data['Post']['slug'] = Inflector::slug($this->data['Post']['subject']);
		return true;
	}
}