<?php
class Project extends AppModel {
	var $name = 'Project';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cvs_url' => array(
			'rule' => 'isUnique',
			'message' => 'This project url already exists',
		)
	);
	var $actsAs = array(
		'Github.Github'
	);

	var $belongsTo = array(
		'Category',
		'User',
		'Account',
	);   
	
	function scanGithub($account) {
		$projects = $this->findRepos($account['Account']['username']);
		$data = $projects['Repositories']['Repository'];
		foreach ($data as $i => $project) {
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
		
		foreach ($projects as $i => $project) {
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['title'],
				'description' => $project['description'],
			)));
		}
	}
	
}