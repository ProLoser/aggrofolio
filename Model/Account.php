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
		'Project',
		'Resume',
		'ResumeEmployer',
		'ResumeSchool',
		'ResumeRecommendation',
		'ResumeSkill',
		'Album',
		'Bookmark',
		'Post',
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
	
	public function afterSave() {
		$this->refreshNav();
	}
	public function afterDelete() {
		$this->refreshNav();
	}
	public function refreshNav() {
		$navAccounts = $this->find('all', array('conditions' => array('Account.published' => true)));
		Cache::write('navAccounts', $navAccounts);
	}
}
?>