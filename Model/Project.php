<?php
class Project extends AppModel {
	public $name = 'Project';
	public $order = 'Project.name ASC';
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name must not be left empty',
				'required' => 'create',
			),
		),
		'uuid' => array(
			'rule' => 'isUnique',
			'message' => 'This project url already exists',
			'allowEmpty' => true,
		),
	);
	public $findMethods = array('full' => true);
	public $belongsTo = array(
		'Account',
		'ProjectCategory',
		'ResumeEmployer',
		'ResumeSchool',
		'PrimaryMediaItem' => array(
			'className' => 'MediaItem',
		),
		'User',
	);

	public $hasMany = array(
		'Album',
		'MediaItem',
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Project'),
		),
	);

	public $actsAs = array(
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
	public function _findFull($state, $query, $results = array()) {
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
			$this->setDbConfig($results['Account']['type']);
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
			}
			$this->setDbConfig();
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
	public function full($id, $cache = true) {
		if ($cache) {
			$data = $this->cache('full', array('id' => $id));
		} else {
			$data = $this->find('full', array('id' => $id));
		}
		return $data;
	}

	public function scanGithub($account) {
		$this->setDbConfig('github');
		$projects = $this->find('all', array(
			'fields' => 'repos'
		));
		$this->setDbConfig();
		if (empty($projects)) {
			return $account;
		}
		$account['Project'] = array();
		foreach ($projects as $project) {
			$this->create();
			if (strpos($project['homepage'], '://') === false) {
				$project['homepage'] = 'http://' . $project['homepage'];
			}
			$data = array('Project' => array(
				'cvs_url' => $project['html_url'],
				'account_id' => $account['Account']['id'],
				'name' => $project['name'],
				'description' => $project['description'],
				'owner' => $project['owner']['login'],
				'url' => $project['homepage'],
				'published' => $account['Account']['published'],
				'uuid' => $project['id'],
			));
			if ($this->save($data)) {
				$data['Project']['id'] = $this->id;
				$account['Project'][] = $data['Project'];
			} else {
				$data = $this->find('first', array('conditions' => array('uuid' => $project['id'])));
				if ($data)
					$account['Project'][] = $data['Project'];
			}
			// Add new skills while I'm here
			$this->Account->ResumeSkill->save(array('ResumeSkill' => array('name' => $project['language'])));
		}
		return $account;
	}

	public function refreshNav() {
		$navProjects = $this->find('count', array('conditions' => array('Project.published' => true)));
		Cache::write('navProjects', $navProjects);
	}

}