<?php
class Album extends AppModel {
	var $name = 'Album';
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
		'visible' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Account',
	);

	var $hasMany = array(
		'MediaItem' => array(
			'className' => 'MediaItem',
			'foreignKey' => 'album_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function scanDevArtFolders($user) {
		$page = sprintf('http://%s.deviantart.com/gallery/', $user);
		$link = array('tag' => 'a', 'class' => 'tv150-cover');
		$title = array('tag' => 'div', 'class' => 'tv150-tag');
		
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->validateOnParse = true;
		$doc->loadHTMLFile($page);
		$xpath = new DOMXPath($doc);
		foreach($xpath->query("//{$link['tag']}[@class='{$link['class']}']") as $node) {
		    $data[] = str_replace("http://{$user}.deviantart.com/gallery/", '', $node->getAttribute('href'));
		}
		foreach($xpath->query("//{$title['tag']}[@class='{$title['class']}']") as $node) {
		    $data[] = $node->textContent;
		}
		return array_combine($links, $titles);
	}
	
	public function scanDeviantart($accountId) {
		$username = $this->Account->field('username', array('id' => $accountId));
		$folders = $this->scanDevArtFolders($username);
		foreach ($folders as $uuid => $name) {
			$data['Album'] = array(
				'uuid' => $uuid,
				'name' => $name,
				'account_id' => $accountId,
				'url' => sprintf('http://%s.deviantart.com/gallery/%s', $username, $uuid),
			);
			$this->save($data);
		}
	}

}
?>