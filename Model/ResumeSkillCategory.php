<?php
class ResumeSkillCategory extends AppModel {
	var $name = 'ResumeSkillCategory';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid name',
			),
		),
	);

	var $hasMany = array(
		'ResumeSkill',
	);
	
	var $actsAs = array(
		'Tree',
	);
	
	var $belongsTo = array(
		'User',
	);

}