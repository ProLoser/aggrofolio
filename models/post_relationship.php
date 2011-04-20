<?php
class PostRelationship extends AppModel {
	var $name = 'PostRelationship';
	var $validate = array(
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid post id',
				//'allowEmpty' => true,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_model' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid foreign model',
				//'allowEmpty' => true,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid foreign key',
				//'allowEmpty' => true,
				//'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	var $belongsTo = array(
		'Post',
		'Project' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'Project'),
		),
		'Album' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'Album'),
		),
		'MediaItem' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'MediaItem'),
		),
		'Bookmark' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'Bookmark'),
		),
		'Resume' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'Resume'),
		),
		'ResumeEmployer' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'ResumeEmployer'),
		),
		'ResumeSchool' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'ResumeSchool'),
		),
	);
	
	
}