<?php
class Log extends AppModel {
	var $name = 'Log';
	var $order = 'Log.created DESC';
	var $_findMethods = array('dashboard' => true);
	
	var $belongsTo = array(
		'Album' => array(
			'foreignKey' => 'model_id',
		),
		'MediaItem' => array(
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
	);
	
	var $actions = array(
		'add' => 'Added',
		'delete' => 'Deleted',
		'edit' => 'Updated',
	);

	function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['conditions'] = array(
				'(SELECT count(*) FROM logs AS l2 WHERE l2.model = Log.model AND l2.model_id = Log.model_id AND l2.action = \'delete\') = 0',
				'(SELECT count(*) FROM logs AS l3 WHERE l3.model = Log.model AND l3.model_id = Log.model_id AND l3.created > Log.created) = 0',
				'Log.model' => array('Album', 'Post', 'Project', 'Resume'),
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