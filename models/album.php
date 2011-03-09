<?php
class Album extends AppModel {
	var $name = 'Album';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'visible' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Your custom message here',
			),
		),
	);

	var $belongsTo = array(
		//'User',
		'Account',
		'MediaCategory',
	);

	var $hasMany = array(
		'MediaItem',
	);
	
	
	public function scanDevArtFolders($user) {
		$user = strtolower($user);
		$page = sprintf('http://%s.deviantart.com/gallery/', $user);
		$link = array('tag' => 'a', 'class' => 'tv150-cover');
		$title = array('tag' => 'div', 'class' => 'tv150-tag');
		$links = $titles = array();
		
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->validateOnParse = true;
		$doc->loadHTMLFile($page);
		$xpath = new DOMXPath($doc);
		foreach($xpath->query("//{$link['tag']}[@class='{$link['class']}']") as $node) {
		    $links[] = str_replace("http://{$user}.deviantart.com/gallery/", '', $node->getAttribute('href'));
		}
		foreach($xpath->query("//{$title['tag']}[@class='{$title['class']}']") as $node) {
		    $titles[] = $node->textContent;
		}
		if (is_array($links) && is_array($titles) && !empty($links) && !empty($titles)) {
			return array_combine($links, $titles);
		} else {
			return null;
		}
	}
	
	
	public function scanDeviantart($accountId) {
		$username = $this->Account->field('username', array('id' => $accountId));
		$folders = $this->scanDevArtFolders($username);
		$username = strtolower($username);
		foreach ($folders as $uuid => $name) {
			$data['Album'] = array(
				'uuid' => $uuid,
				'name' => $name,
				'account_id' => $accountId,
				'url' => sprintf('http://%s.deviantart.com/gallery/%s', $username, $uuid),
			);
			$this->create();
			$this->save($data);
		}
	}

}
?>