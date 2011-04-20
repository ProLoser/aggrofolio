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
		),
		'uuid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a numeric uuid',
				'allowEmpty' => true
			),
		),
	);

	var $belongsTo = array(
		'Account',
	);
	
	var $hasMany = array(
		'Project',
		'PostRelationship' => array(
			'foreign_key' => 'foreign_key',
			'conditions' => array('PostRelationship.model' => 'ResumeEmployer'),
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