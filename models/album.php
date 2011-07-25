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
		'uuid' => array(
			'rule' => 'isUnique',
			'message' => 'UUID already used',
			'allowEmpty' => true,
		),
	);

	var $belongsTo = array(
		'Account',
		'MediaCategory',
		'Project',
	);

	var $hasMany = array(
		'MediaItem',
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Album'),
		),
	);
	
	var $actsAs = array(
		'Activity',
	);
	
	public function scanDeviantart($account) {
		$page = sprintf('http://%s.deviantart.com/gallery/', $account['Account']['username']);
		$link = array('tag' => 'a', 'class' => 'tv150-cover');
		$title = array('tag' => 'div', 'class' => 'tv150-tag');
		$links = $titles = array();
		
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->validateOnParse = true;
		$doc->loadHTMLFile($page);
		$xpath = new DOMXPath($doc);
		foreach($xpath->query("//{$link['tag']}[@class='{$link['class']}']") as $node) {
		    $links[] = str_replace($page, '', $node->getAttribute('href'));
		}
		foreach($xpath->query("//{$title['tag']}[@class='{$title['class']}']") as $node) {
		    $titles[] = $node->textContent;
		}
		if (is_array($links) && is_array($titles) && !empty($links) && !empty($titles)) {
			$folders = array_combine($links, $titles);
			$count = 0;
			foreach ($folders as $uuid => $name) {
				$data['Album'] = array(
					'uuid' => $uuid,
					'name' => $name,
					'account_id' => $account['Account']['id'],
					'url' => sprintf('http://%s.deviantart.com/gallery/%s', $account['Account']['username'], $uuid),
				);
				$this->create();
				$this->save($data);
				$count++;
			}
			return $count;
		} else {
			return false;
		}
	}
	
	public function scanFlickr($account) {
		$this->useDbConfig = 'flickr';
		$username = $this->find('all', array(
			'fields' => 'people', 
			'conditions' => array('username' => $account['Account']['username'])
		));
		if (!isset($username['user'])) {
			return false;
		}
		$result = $this->find('all', array(
			'fields' => 'sets', 
			'conditions' => array('user_id' => $username['user']['nsid'])
		));
		$this->useDbConfig = 'default';
		$count = 0;
		if (!empty($result)) {
			foreach ($result['photosets']['photoset'] as $photoset) {
				$data['Album'] = array(
					'uuid' => $photoset['id'],
					'name' => $photoset['title']['_content'],
					'description' => $photoset['description']['_content'],
					'account_id' => $account['Account']['id'],
					'url' => sprintf('http://www.flickr.com/photos/%s/sets/%s', $account['Account']['username'], $photoset['id']),
				);
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}
}
?>