<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	var $name = 'User';
	var $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Your custom message here',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
	);
	
	var $hasMany = array(
		'Account',
		'Activity',
		'Album',
		'Bookmark',
		'BookmarkCategory',
		'Contact',
		'MediaItem',
		'MediaCategory',
		'Post',
		'PostCategory',
		'Project',
		'ProjectCategory',
		'Resume',
		'ResumeSkillCategory',
		'ResumeSkill',
		'ResumeSchool',
		'ResumeEmployer',
	);
	
	var $hasOne = array(
		'Setting',
	);
	
	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

}
?>