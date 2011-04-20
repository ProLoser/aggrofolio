<?php
class ResumeSchool extends AppModel {
	var $name = 'ResumeSchool';
	var $displayField = 'name';
	var $validate = array(
		'published' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'deleted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'isUnique' => array(
				'rule' => array('isUnique'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Account',
	);
	
	var $hasMany = array(
		'Project',
		'PostRelationship' => array(
			'foreign_key' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'ResumeSchool'),
		),
	);

	var $hasAndBelongsToMany = array(
		'Resume',
	);

	var $actsAs = array(
		'Log.Logable',
	);
}
?>