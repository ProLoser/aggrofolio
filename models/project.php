<?php
class Project extends AppModel {
	var $name = 'Project';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name must not be left empty',
			),
		),
		'cvs_url' => array(
			'rule' => 'isUnique',
			'message' => 'This project url already exists',
		)
	);

	var $belongsTo = array(
		'Category',
		'User',
		'Account',
	);   
	
	function scanGithub($account) {
		$default = $this->useDbConfig;
		$this->useDbConfig = 'github';
		$projects = $this->find('all', array(
			'conditions' => array('username' => $account['Account']['username']), 
			'fields' => 'repos'
		));
		$this->useDbConfig = $default;
		cd 
		foreach ($data as $project) {
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['name'],
				'description' => $project['description'],
			)));
		}
	}
	
	function scanCodaset($account) {
		$default = $this->useDbConfig;
		$this->useDbConfig = 'codaset';
		$projects = array_merge(
			$this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'projects')),
			$this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'collaborations'))
		);
		$this->useDbConfig = $default;
		
		foreach ($projects as $project) {
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['title'],
				'description' => $project['description'],
			)));
		}
	}
	
}