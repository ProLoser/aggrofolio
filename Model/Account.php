<?php
class Account extends AppModel {
	var $name = 'Account';
	var $displayField = 'label';
	public $virtualFields = array(
	    'label' => 'CONCAT(Account.type, " - ", Account.username)'
	);
	var $validate = array(
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
			),
		),
	);

	var $hasMany = array(
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

	var $belongsTo = array(
		'User',
	);

	var $types = array(
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
	public function setup($provider, $tokens) {
		$data['Account'] = array(
			'api_key' => $tokens,
			'type' => $provider,
		);
		$this->setDbConfig($provider);
		switch ($provider) {
			case 'github':
				$user = $this->find('all', array('fields' => 'user'));
				$data['Account']['username'] = $user['login'];
				$data['Account']['email'] = $user['email'];
			break;
			case 'linkedin';
				$user = $this->find('all', array('path' => 'people/~', 'fields' => array('id')));
				$data['Account']['username'] = $user['id'];
			break;
			case 'jsfiddle':
			break;
			case 'vimeo':
			break;
		}
		$this->setDbConfig();

		$this->save($data);
	}

	/**
	 * Delegates scanning of content for the specific account
	 *
	 * @param string $id
	 * @return boolean $success
	 */
	function scan($id) {
		$account = $this->read(null, $id);
		switch ($account['Account']['type']) {
			case 'linkedin':
				return $this->Resume->scanLinkedin($account);
			break;
			case 'github':
				return $this->Project->scanGithub($account);
			break;
			case 'codaset':
				return $this->Project->scanCodaset($account);
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
		}
	}

	function scanAll() {
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
}
?>