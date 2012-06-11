<?php
class Account extends AppModel {
	public $name = 'Account';
	public $displayField = 'label';
	public $findMethods = array('timeline' => true);
	public $virtualFields = array(
	    'label' => 'CONCAT(Account.type, " - ", Account.username)'
	);
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid username',
				//'allowEmpty' => false,
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please specify a valid type',
				'required' => 'create',
			),
		),
	);

	public $hasMany = array(
		'Album',
		'Bookmark',
		'MediaItem',
		'Post',
		'Project',
		'Resume',
		'ResumeEmployer',
		'ResumeSchool',
		'ResumeRecommendation',
		'ResumeSkill',
	);

	public $belongsTo = array(
		'User',
	);

	public $types = array(
		'github'		=> 'Github',
		'codaset'		=> 'Codaset (Disabled)',
		// 'xmarks'		=> 'XMarks',
		'linkedin'		=> 'LinkedIn',
		'deviantart'	=> 'DeviantArt',
		'flickr'		=> 'Flickr',
		'twitter'		=> 'Twitter',
		'jsfiddle'		=> 'JsFiddle',
		'blog'			=> 'Blog',
		'Coming Soon' => array(
			'goodreads'		=> 'GoodReads',
			'lastfm'		=> 'LastFm',
			'grooveshark'	=> 'Grooveshark',
			'pandora'		=> 'Pandora',
			'facebook'		=> 'Facebook',
			'behance'		=> 'Behance',
			'photobucket'	=> 'Photobucket',
		),
	);

	/**
	 * Prepares an account record for further scanning
	 *
	 * @param string $provider
	 * @param string $tokens
	 * @return void
	 * @author Dean Sofer
	 */
	public function setup($provider, $tokens = null) {
		switch ($provider) {
			case 'github':
				$this->setDbConfig($provider);
				$user = $this->find('all', array('fields' => 'users'));
				$this->setDbConfig();
				$data = $this->find('first', array('conditions' => array('type' => $provider, 'username' => $user['login'])));
				if (!$data) {
					$data['Account'] = array();
				}
				$data['Account']['username'] = $user['login'];
				if (isset($user['email']))
					$data['Account']['email'] = $user['email'];
			break;
			case 'linkedin';
				$this->setDbConfig($provider);
				$user = $this->find('all', array('path' => 'people/~', 'fields' => array('id')));
				$this->setDbConfig();
				$data = $this->find('first', array('conditions' => array('type' => $provider, 'username' => $user['id'])));
				if (!$data) {
					$data['Account'] = array();
				}
				$data['Account']['username'] = $user['id'];
			break;
			case 'flickr':
				$data = $this->find('first', array('conditions' => array('type' => $provider, 'username' => $tokens['user_nsid'])));
				if (!$data) {
					$data['Account'] = array();
				}
				$data['Account']['username'] = $tokens['user_nsid'];
			break;
			case 'jsfiddle':
				$this->setDbConfig($provider);
				$user = $this->find('all', array('fields' => 'user'));
				$this->setDbConfig();
				if ($user) {
					$data = $this->find('first', array('conditions' => array('type' => $provider, 'username' => $user)));
					if (!$data) {
						$data['Account'] = array();
					}
					$data['Account']['username'] = $user;
				} else {
					return false;
				}
			break;
			case 'vimeo':
				$this->setDbConfig($provider);
				$user = $this->find('all', array('fields' => 'test'));
				$this->setDbConfig();
				$data = $this->find('first', array('conditions' => array('type' => $provider, 'username' => $user['user']['username'])));
				if (!$data) {
					$data['Account'] = array();
				}
				$data['Account']['username'] = $user['user']['username'];
			break;
		}
		if (!empty($tokens))
			$data['Account']['api_key'] = $tokens;
		$data['Account']['type'] = $provider;
		$data['Account']['user_id'] = Configure::read('owner');
		return $this->save($data);
	}

	/**
	 * Delegates scanning of content for the specific account
	 *
	 * @param string $id
	 * @return boolean $success
	 */
	public function scan($id) {
		$account = $this->read(null, $id);
		if (empty($account)) {
			return false;
		}
		switch ($account['Account']['type']) {
			case 'linkedin':
				return $this->Resume->scanLinkedin($account);
			break;
			case 'github':
				return $this->Project->scanGithub($account);
			break;
			case 'flickr':
				return $this->Album->scanFlickr($account);
			break;
			case 'deviantart':
				$account['Account']['username'] = strtolower($account['Account']['username']);
				return $this->Album->scanDeviantart($account);
			break;
			case 'jsfiddle':
				return $this->Bookmark->scanJsfiddle($account);
			break;
			case 'blog':
				return $this->Post->scanBlog($account);
			break;
			case 'vimeo':
				return $this->Album->scanVimeo($account);
			break;
		}
	}

	public function scanAll() {
		$accounts = $this->find('list', array('conditions' => array('Account.published' => true)));
		foreach ($accounts as $id => $username) {
			$this->scan($id);
		}
	}

	public function beforeSave($options = array()) {
		if (isset($this->data['Account']['api_key'])) {
			$this->data['Account']['api_key'] = serialize($this->data['Account']['api_key']);
		}
		return true;
	}

	public function afterFind($results, $primary = false) {
		if (!empty($results['Account']['api_key'])) {
			$results['Account']['api_key'] = unserialize($results['Account']['api_key']);
		}
		return $results;
	}

	public function afterSave($created) {
		parent::afterSave($created);
		$this->refreshNav();
	}
	public function afterDelete() {
		parent::afterDelete();
		$this->refreshNav();
	}

	public function refreshNav() {
		$navAccounts = $this->find('all', array('conditions' => array('Account.published' => true)));
		Cache::write('navAccounts', $navAccounts);
	}

	public function getFollowers() {
		// Auto Tweet Bookmarks
		$this->setDbConfig('twitter');
		$followers = $this->find('all', array(
			'fields' => 'followers',
		));
		$chunks = array_chunk($followers['ids'], 100);
		$followers = array();
		foreach ($chunks as $chunk) {
			$followers = array_merge($followers, $this->find('all', array(
				'fields' => 'users',
				'conditions' => array(
					'user_id' => implode(',', $chunk),
				),
			)));
		}
		$this->setDbConfig();
		return $followers;
	}

	protected function _findTimeline($state, $query, $results = array()) {
		if ($state == 'before') {
			$id = $query['conditions'];
			$query['conditions'] = array();
			$query['limit'] = 1;
			$query['conditions']['Account.id'] = $id;
			$query['contain'] = array(
				'Album',
				'MediaItem',
				'Post' => array('order' => 'Post.modified DESC'),
				'Project' => array('order' => 'Project.modified DESC'),
				'ResumeEmployer' => array('order' => array('ResumeEmployer.currently_employed DESC', 'ResumeEmployer.date_ended DESC', 'ResumeEmployer.date_started DESC')),
				'ResumeSchool' => array('order' => array('ResumeSchool.date_ended DESC', 'ResumeSchool.date_started DESC')),
				'Bookmark',
			);

			if (!empty($query['operation'])) {
				return $this->_findCount($state, $query, $results);
			}
			return $query;
		} elseif (empty($query['operation']) && !empty($results)) {
			switch ($results[0]['Account']['type']) {
				case 'github':
					unset($results[0]['Album']);
					unset($results[0]['Post']);
					unset($results[0]['ResumeEmployer']);
					unset($results[0]['ResumeSchool']);
					unset($results[0]['Bookmark']);
					break;
				case 'linkedin':
					unset($results[0]['Album']);
					unset($results[0]['Post']);
					unset($results[0]['Project']);
					unset($results[0]['Bookmark']);
					break;
				case 'flickr':
				case 'vimeo':
					unset($results[0]['Post']);
					unset($results[0]['ResumeEmployer']);
					unset($results[0]['ResumeSchool']);
					unset($results[0]['Bookmark']);
					unset($results[0]['Project']);
					break;
			}
			$results = $results[0];
		}
		if (!empty($query['operation'])) {
			return $this->_findCount($state, $query, $results);
		}
		return $results;
	}
}
?>
