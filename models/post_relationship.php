<?php
class PostRelationship extends AppModel {
	var $name = 'PostRelationship';

	var $belongsTo = array(
		'Post',
		'Project' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Project'),
		),
		'Album' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Album'),
		),
		'MediaItem' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'MediaItem'),
		),
		'Bookmark' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Bookmark'),
		),
		'Resume' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Resume'),
		),
		'ResumeEmployer' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'ResumeEmployer'),
		),
		'ResumeSchool' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'ResumeSchool'),
		),
	);
	
	
}