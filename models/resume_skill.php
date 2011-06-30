<?php
class ResumeSkill extends AppModel {
	var $name = 'ResumeSkill';
	var $displayField = 'name';
	var $order = array('proficiency ASC', 'years DESC');
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
	);
	
	var $belongsTo = array(
		'Account',
	);

	var $hasAndBelongsToMany = array(
		'Resume',
	);
	
	var $proficiencies = array(
		'expert'		=> 'Expert',
		'advanced'		=> 'Advanced',
		'intermediate'	=> 'Intermediate',
		'beginner'		=> 'Beginner',
	);

}
?>