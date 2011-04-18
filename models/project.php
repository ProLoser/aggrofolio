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
		//'User',
		'Account',
		'ProjectCategory',
	);
	
	function read($fields = null, $id) {
		$this->recursive = 1;
		$project = parent::read($fields, $id);
		$default = $this->useDbConfig;
		if ($project['Account']['type'] == 'github') {
			$this->useDbConfig = 'github';
			$commits = $this->find('all', array(
				'conditions' => array(
					'owner' => $project['Project']['owner'], 
					'repo' => $project['Project']['name'],
					'branch' => 'master',
				),
				'fields' => 'commits'
			));
			$data = $this->find('all', array(
				'conditions' => array(
					'owner' => $project['Project']['owner'], 
					'repo' => $project['Project']['name'],
				),
				'fields' => 'repos'
			));
			$project = array_merge($project, $data, $commits);
		} elseif ($project['Account']['type'] == 'codaset') {
			$this->useDbConfig = 'codaset';
			$name = str_replace(' ', '-', $project['Project']['name']);
			$project['codaset'] = $this->find('all', array(
				'conditions' => array(
					'username' => $project['Project']['owner'], 
					'project' => $name,
				),
			));
			$project['blog'] = $this->find('all', array(
				'conditions' => array(
					'username' => $project['Project']['owner'], 
					'project' => $name,
				),
				'fields' => 'blog'
			));
		}
		$this->useDbConfig = $default;
		return $project;
	}
	
/**
 * Delegates scanning to respective account type
 *
 * @param string $account 
 * @return void
 */
	function scan($account) {
		return $this->{'scan' . Inflector::classify($account['Account']['type'])}($account);
	}
	
	function scanGithub($account) {
		$default = $this->useDbConfig;
		$this->useDbConfig = 'github';
		$projects = $this->find('all', array(
			'conditions' => array('owner' => $account['Account']['username']), 
			'fields' => 'repos'
		));
		$this->useDbConfig = $default;
		foreach ($projects['repositories'] as $project) {
			$this->create();
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['name'],
				'description' => $project['description'],
				'owner' => $project['owner'],
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
			$this->create();
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['title'],
				'description' => $project['description'],
				'owner' => $project['owner']['login'],
			)));
		}
	}
	
}