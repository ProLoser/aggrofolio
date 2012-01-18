<?php
class Bookmark extends AppModel {
	public $name = 'Bookmark';
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name must not be empty',
			),
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('url'),
				'message' => 'Please enter a valid Url',
			),
		),
		'bookmark_category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid Bookmark Category',
			),
		),
	);

	public $belongsTo = array(
		'Account',
		'BookmarkCategory',
	);
	
	public $hasMany = array(
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Bookmark'),
		),
	);

	public $actsAs = array(
		'Activity',
	);
	
	public function scan($accountId) {
		$account = $this->Account->read(null, $accountId);
		return $this->scanXmarks($account);
	}
	
	public function scanXmarks($account) {
		$this->setDataSource('rss');
		$this->feedUrl = $account['Account']['username'];
		$bookmarks = $this->find('all');
		$this->setDataSource('default');
		$count = 0;
		if (!empty($bookmarks)) {
			foreach ($bookmarks as $bookmark) {
				$data['Bookmark'] = array(
					'name' => $bookmark['Bookmark']['title'],
					'url' => $bookmark['Bookmark']['link'],
					'account_id' => $account['Account']['id'],
				);
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}

	public function scanJsfiddle($account) {
		$this->getDataSource('jsfiddle');
		$bookmarks = $this->find('all', array(
			'fields' => 'fiddles',
			'conditions' => array(
				'user' => $account['Account']['username']
			)
		));
		$this->setDataSource('default');
		$count = 0;
		if (!empty($bookmarks)) {
			foreach ($bookmarks as $bookmark) {
				$data['Bookmark'] = array(
					'name' => $bookmark['title'],
					'url' => $bookmark['url'],
					'description' => $bookmark['description'],
					'account_id' => $account['Account']['id'],
				);
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['Bookmark']['domain_only'])) {
			$url = parse_url($this->data['Bookmark']['url']);
			$this->data['Bookmark']['url'] = $url['scheme'] . '://' . $url['host'];
		}
		if (!empty($this->data['Bookmark']['url'])) {
			$this->data['Bookmark']['url'] = str_replace(' ', '%20', $this->data['Bookmark']['url']);
		}
		return true;
	}

	/*public function afterSave($created) {
		if ($created) {
			// Auto Tweet Bookmarks
			$this->setDataSource('twitter');
			$data = array(
				'section' => 'tweets',
				'status' => $this->data['Bookmark']['name'] . ' ' . $this->data['Bookmark']['url']
			);
			$this->create();
			$this->save($data);
			$this->setDataSource('default');
		}
	}*/
}
?>