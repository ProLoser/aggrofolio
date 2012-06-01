<?php
class Activity extends AppModel {
	public $name = 'Activity';
	public $order = 'Activity.created DESC';
	public $findMethods = array('dashboard' => true);
	public $validate = array(
		'action' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid action',
			),
		),
		'model' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid model',
			),
		),
		'model_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter a valid model id',
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid title',
			),
		),
	);

	public $belongsTo = array(
		'Album' => array(
			'foreignKey' => 'model_id',
		),
		'Post' => array(
			'foreignKey' => 'model_id',
		),
		'Project' => array(
			'foreignKey' => 'model_id',
		),
		'Resume' => array(
			'foreignKey' => 'model_id',
		),
		'Bookmark' => array(
			'foreignKey' => 'model_id',
		),
		'MediaItem' => array(
			'foreignKey' => 'related_model_id',
		),
		'ResumeEmployer' => array(
			'foreignKey' => 'related_model_id',
		),
		'ResumeRecommendation' => array(
			'foreignKey' => 'related_model_id',
		),
		'ResumeSkill' => array(
			'foreignKey' => 'related_model_id',
		),
		'ResumeSchool' => array(
			'foreignKey' => 'related_model_id',
		),
		'User',
	);

	public $actions = array(
		'add' => 'Added',
		'delete' => 'Deleted',
		'edit' => 'Updated',
	);

	protected function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['conditions'] = array_merge($query['conditions'], $query['conditions'] = array(
					'Activity.user_id' => Configure::read('owner'),
					'(SELECT count(*) FROM activities AS l2 WHERE l2.model = Activity.model AND l2.model_id = Activity.model_id AND l2.action = \'delete\') = 0',
					'(SELECT count(*) FROM activities AS l3 WHERE l3.model = Activity.model AND l3.model_id = Activity.model_id AND l3.created > Activity.created) = 0',
					'Activity.model' => array('Album', 'Post', 'Project', 'Resume', 'Bookmark'),
			));
			$query['link'] = array(
				'Album' => array(
					'AlbumAccount' => array(
						'class' => 'Account',
					),
				),
				'Post' => array(
					'PostAccount' => array(
						'class' => 'Account',
					),
					'PostCategory' => array(
						'fields' => array('name'),
					),
				),
				'Project' => array(
					'ProjectAccount' => array(
						'class' => 'Account',
					),
					'ProjectCategory' => array(
						'fields' => array('name'),
					),
				),
				'Resume' => array(
					'ResumeAccount' => array(
						'class' => 'Account',
					),
				),
				'Bookmark' => array(
					'BookmarkAccount' => array(
						'class' => 'Account',
					),
					'BookmarkCategory' => array(
						'fields' => array('name'),
					),
				),
			);

			if (!empty($query['operation'])) {
				return $this->_findCount($state, $query, $results);
			}
			return $query;
		} elseif (empty($query['operation'])) {
			foreach ($results as $i => $result) {
				if ($result['Activity']['model'] === 'Album') {
					$results[$i]['Album']['MediaItem'] = $this->Project->MediaItem->findAllByAlbumId($result['Activity']['model_id'], array(), array('MediaItem.created DESC'));
				} elseif ($result['Activity']['model'] === 'Project') {
					$results[$i]['Project']['MediaItem'] = $this->Project->MediaItem->findAllByProjectId($result['Activity']['model_id'], array(), array('MediaItem.created DESC'));
				}
			}
		}
		if (!empty($query['operation'])) {
			return $this->_findCount($state, $query, $results);
		}
		return $results;
	}
}