<?php
class Project extends AppModel {
	var $name = 'Project';
	var $order = 'Project.name ASC';
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
			'allowEmpty' => true,
		),
	);

	var $belongsTo = array(
		'Account',
		'ProjectCategory',
		'ResumeEmployer',
		'ResumeSchool',
	);
	
	var $hasMany = array(
		'Album',
		'MediaItem',
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Project'),
		),
	);

	var $actsAs = array(
		'Log.Logable',
	);
	
	function full($id) {
		$project = $this->find('first', array(
			'conditions' => array('Project.id' => $id),
			'contain' => array(
				'Account',
				'ProjectCategory',
				'ResumeEmployer' => array('name'),
				'ResumeSchool' => array('name'),
				'MediaItem',
				'PostRelationship' => 'Post',
			),
		));
		$default = $this->useDbConfig;
		$name = array_pop(explode('/', $project['Project']['cvs_url']));
		if ($project['Account']['type'] == 'github') {
			$this->useDbConfig = 'github';
			$commits = $this->find('all', array(
				'conditions' => array(
					'owner' => $project['Project']['owner'],
					'repo' => $name,
					'branch' => 'master',
				),
				'fields' => 'commits'
			));
			$data = $this->find('all', array(
				'conditions' => array(
					'owner' => $project['Project']['owner'], 
					'repo' => $name,
				),
				'fields' => 'repos'
			));
			$project = array_merge((array)$project, (array)$data, (array)$commits);
		} elseif ($project['Account']['type'] == 'codaset') {
			$this->useDbConfig = 'codaset';
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
	
	function scanGithub($account) {
		$default = $this->useDbConfig;
		$this->useDbConfig = 'github';
		$projects = $this->find('all', array(
			'fields' => 'repos'
		));
		if (empty($projects)) {
			return false;
		}
		$this->useDbConfig = $default;
		$count = 0;
		foreach ($projects as $project) {
			$this->create();
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['name'],
				'description' => $project['description'],
				'owner' => $project['owner']['login'],
			)));
			$count++;
		}
		return $count;
	}
	
	function scanCodaset($account) {
		$default = $this->useDbConfig;
		$this->useDbConfig = 'codaset';
		$projects = array_merge(
			$this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'projects')),
			$this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'collaborations'))
		);
		$this->useDbConfig = $default;
		$i = 0;
		foreach ($projects as $project) {
			$this->create();
			$this->save(array('Project' => array(
				'cvs_url' => $project['url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['title'],
				'description' => $project['description'],
				'owner' => $project['owner']['login'],
			)));
			$i++;
		}
		return $i;
	}
	
}