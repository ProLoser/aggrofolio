<?php
class PostRelationship extends AppModel {
	var $name = 'PostRelationship';

	var $belongsTo = array(
		'Post',
		'Project' => array(
			'foreignKey' => 'foreign_key',
		),
		'Album' => array(
			'foreignKey' => 'foreign_key',
		),
		'MediaItem' => array(
			'foreignKey' => 'foreign_key',
		),
		'Bookmark' => array(
			'foreignKey' => 'foreign_key',
		),
		'Resume' => array(
			'foreignKey' => 'foreign_key',
		),
		'ResumeEmployer' => array(
			'foreignKey' => 'foreign_key',
		),
		'ResumeSchool' => array(
			'foreignKey' => 'foreign_key',
		),
	);
	
}