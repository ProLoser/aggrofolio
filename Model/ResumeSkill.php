<?php
class ResumeSkill extends AppModel {
	var $name = 'ResumeSkill';
	var $displayField = 'name';
	var $order = array('proficiency ASC', 'years DESC');
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name field must not be empty',
				'required' => 'create',
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Must be a unique skill',
			),
		),
	);

	var $belongsTo = array(
		'Account',
		'ResumeSkillCategory',
		'User',
	);

	var $hasAndBelongsToMany = array(
		'Resume',
		'Project',
	);

	var $proficiencies = array(
		'expert'		=> 'Expert',
		'advanced'		=> 'Advanced',
		'intermediate'	=> 'Intermediate',
		'beginner'		=> 'Beginner',
	);

}
?>