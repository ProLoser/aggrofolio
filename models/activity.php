<?php
class Activity extends AppModel {
	var $name = 'Activity';
	var $order = 'Activity.created DESC';
	var $_findMethods = array('dashboard' => true);
	var $validate = array(
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

	var $belongsTo = array(
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
	);
	
	var $actions = array(
		'add' => 'Added',
		'delete' => 'Deleted',
		'edit' => 'Updated',
	);

	function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['conditions'] = array(
				'(SELECT count(*) FROM activities AS l2 WHERE l2.model = Activity.model AND l2.model_id = Activity.model_id AND l2.action = \'delete\') = 0',
				'(SELECT count(*) FROM activities AS l3 WHERE l3.model = Activity.model AND l3.model_id = Activity.model_id AND l3.created > Activity.created) = 0',
				'Activity.model' => array('Album', 'Post', 'Project', 'Resume'),
			);
			$query['contain'] = array(
				'Album' => array(
					'MediaItem',
				),
				'Post', 
				'Project' => array(
					'MediaItem',
				),
				'Resume',
			);
			if (isset($this->belongsTo['User'])) {
				$query['contain'][] = 'User';
			}
			
			if (!empty($query['operation'])) {
				return $this->_findCount($state, $query, $results);
			}
			return $query;
		} elseif ($state == 'after') {
			if (!empty($query['operation'])) {
				return $this->_findCount($state, $query, $results);
			}
			return $results;
		}
	}
}