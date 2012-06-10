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
		'PrimaryMediaItem' => array(
			'className' => 'MediaItem',
		),
		'User',
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
		$this->setDbConfig('flickr');
		$albums = $this->find('all', array('fields' => 'sets'));
		$this->setDbConfig();
		if (!empty($albums)) {
			foreach ($albums['photosets']['photoset'] as $photoset) {
				$data['Album'] = array(
					'uuid' => $photoset['id'],
					'name' => $photoset['title']['_content'],
					'description' => $photoset['description']['_content'],
					'account_id' => $account['Account']['id'],
					'url' => sprintf('http://www.flickr.com/photos/%s/sets/%s', $account['Account']['username'], $photoset['id']),
				);
				$this->create();
				if ($this->save($data)) {
					$data['Album']['id'] = $this->id;
					$account['Album'][] = $data['Album'];
				} else {
					$data = $this->find('first', array('conditions' => array('uuid' => $data['Album']['uuid'])));
					if ($data)
						$account['Album'][] = $data['Album'];
				}
			}
		}
		return $account;
	}

	public function scanVimeo($account) {
		$this->setDbConfig('vimeo');
		$albums = $this->find('all', array('fields' => 'albums'));
		$this->setDbConfig();
		if (!empty($albums['albums']['album'])) {
			foreach ($albums['albums']['album'] as $album) {
				$data['Album'] = array(
					'uuid' => $album['id'],
					'name' => $album['name'],
					'description' => $album['description'],
					'account_id' => $account['Account']['id'],
					// 'url' => sprintf('http://www.flickr.com/photos/%s/sets/%s', $account['Account']['username'], $album['id']),
				);
				$this->create();
				if ($this->save($data)) {
					$data['Album']['id'] = $this->id;
					$account['Album'][] = $data['Album'];
				} else {
					$data = $this->find('first', array('conditions' => array('uuid' => $data['Album']['uuid'])));
					if ($data)
						$account['Album'][] = $data['Album'];
				}
			}
		}
		return $account;
	}

	public function refreshNav() {
		$navGallery = $this->find('count', array('conditions' => array('Album.published' => true)));
		$navGallery += $this->MediaItem->find('count', array('conditions' => array('MediaItem.published' => true)));
		Cache::write('navGallery', $navGallery);
	}

	/**
	 * Updates all related media items if the company changed
	 *
	 * @param string $created
	 * @return void
	 * @author Dean Sofer
	 */
	public function afterSave($created) {
		parent::afterSave($created);
		if (!$created && isset($this->data['Album']['project_id'])) {
			$pid = (empty($this->data['Album']['project_id'])) ? null : $this->data['Album']['project_id'];
			$this->MediaItem->updateAll(
				array('project_id' => $pid),
				array('MediaItem.album_id' => $this->id)
			);
		}
	}

}