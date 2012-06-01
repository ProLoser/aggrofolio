<?php
class ResumeEmployer extends AppModel {
	var $name = 'ResumeEmployer';
	var $displayField = 'label';
	var $virtualFields = array(
		'label' => 'CONCAT(ResumeEmployer.name, ": ", ResumeEmployer.title)'
	);
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a valid name',
			'required' => 'create',
		),
		'uuid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a numeric uuid',
				'allowEmpty' => true,
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Uuid must be unique',
				'allowEmpty' => true,
			),
		),
	);

	var $belongsTo = array(
		'Account',
		'User',
	);

	var $hasMany = array(
		'Project',
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'ResumeEmployer'),
		),
	);

	var $hasAndBelongsToMany = array(
		'Resume',
	);
}
?>