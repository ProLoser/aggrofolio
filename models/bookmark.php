<?php
class Bookmark extends AppModel {
	var $name = 'Bookmark';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
			),
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
			),
		),
		'account_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			),
		),
	);

	var $belongsTo = array(
		'Account',
		'BookmarkCategory',
	);
	
	var $hasMany = array(
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Bookmark'),
		),
	);

	var $actsAs = array(
		'Log.Logable',
	);
	
	function scan($accountId) {
		$account = $this->Account->read(null, $accountId);
		return $this->scanXmarks($account);
	}
	
	function scanXmarks($account) {
		$this->useDbConfig = 'rss';
		$this->feedUrl = $account['Account']['username'];
		$bookmarks = $this->find('all');
		$this->useDbConfig = 'default';
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
}
?>