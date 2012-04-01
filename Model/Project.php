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
	public $findMethods = array('full' => true);
	var $belongsTo = array(
		'Account',
		'ProjectCategory',
		'ResumeEmployer',
		'ResumeSchool',
		'PrimaryMediaItem' => array(
			'className' => 'MediaItem',
		),
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
		'Activity',
	);
	
	/**
	 * Retrieves a display-oriented record of a project full with api information
	 *
	 * @param string $state 
	 * @param string $query 
	 * @param string $results 
	 * @return array $query | $results
	 * @author Dean Sofer
	 */
	function _findFull($state, $query, $results = array()) {
	    if ($state == 'before') {
			if (isset($query['id'])) {
				$query['conditions']['Project.id'] = $query['id'];
				unset($query['id']);
			}
			$query['limit'] = 1;
			$query['contain'] = array(
				'Account',
				'ProjectCategory',
				'ResumeEmployer' => array('name'),
				'ResumeSchool' => array('name'),
				'MediaItem',
				'PostRelationship' => array(
					'Post' => array('PostCategory')
				),
			);
	        return $query;
	    } elseif ($state == 'after') {
			if (empty($results)) {
				return $results;
			} else {
				$results = $results[0];
			}
			$this->setDataSource($results['Account']['type']);
			$name = array_pop(explode('/', $results['Project']['cvs_url']));
			switch ($results['Account']['type']) {
				case 'github':
					$results['commits'] = $this->find('all', array(
						'conditions' => array(
							'user' => $results['Project']['owner'],
							'repo' => $name,
							'branch' => 'master',
						),
						'fields' => 'commits'
					));
					$results['github'] = $this->find('all', array(
						'conditions' => array(
							'user' => $results['Project']['owner'], 
							'repo' => $name,
						),
						'fields' => 'repos'
					));
					break;
				/* Farewell Codaset... It was good while it lasted
				case 'codaset':
					$results['codaset'] = $this->find('all', array(
						'conditions' => array(
							'username' => $results['Project']['owner'], 
							'project' => $name,
						),
						'fields' => 'projects',
					));
					$results['blog'] = null;
					/* DISABLING BECAUSE CODASET SUCKS $this->find('all', array(
						'conditions' => array(
							'username' => $results['Project']['owner'], 
							'project' => $name,
						),
						'fields' => 'blog'
					));*/
			}
			$this->setDataSource('default');
	        return $results;
	    }
	}
	
	/**
	 * Convenience wrapper for full find type
	 *
	 * @param string $id 
	 * @param string $cache 
	 * @return void
	 * @author Dean Sofer
	 */
	function full($id, $cache = true) {
		if ($cache) {
			$data = $this->cache('full', array('id' => $id));
		} else {
			$data = $this->find('full', array('id' => $id));
		}
		return $data;
	}
	
	function scanGithub($account) {
		$this->setDataSource('github');
		$projects = $this->find('all', array(
			'fields' => 'repos'
		));
		if (empty($projects)) {
			return false;
		}
		$this->setDataSource('default');
		$count = 0;
		foreach ($projects as $project) {
			$this->create();
			$this->save(array('Project' => array(
				'cvs_url' => $project['html_url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['name'],
				'description' => $project['description'],
				'owner' => $project['owner']['login'],
				'url' => $project['homepage'],
			)));
			$count++;
		}
		return $count;
	}
	
	function scanCodaset($account) {
		$this->setDataSource('codaset');
		$projects = $this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'projects'));
		$collabs = $this->find('all', array('conditions' => array('username' => $account['Account']['username']), 'fields' => 'collaborations'));
		$projects = array_merge($projects, $collabs);
		$this->setDataSource('default');
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