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
	);
	
	var $types = array(
		'github'		=> 'Github',
		// 'codaset'		=> 'Codaset',
		'linkedin'		=> 'LinkedIn',
		'deviantart'	=> 'DeviantArt',
		'flickr'		=> 'Flickr',
		'goodreads'		=> 'GoodReads',
		'twitter'		=> 'Twitter',
		'lastfm'		=> 'LastFm',
		'grooveshark'	=> 'Grooveshark',
		'pandora'		=> 'Pandora',
		'facebook'		=> 'Facebook',
		'xmarks'		=> 'XMarks',
		'behance'		=> 'Behance',
		'photobucket'	=> 'Photobucket',
		'jsfiddle'		=> 'JsFiddle',
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
			breat;
			case 'jsfiddle':
				return $this->Bookmark->scanJsfiddle($account);
			break;
		}
	}
	
	function scanAll() {
		$accounts = $this->find('list', array('conditions' => array('Account.published' => true)));
		foreach ($accounts as $id => $username) {
			$this->scan($id);
		}
	}
}
?>