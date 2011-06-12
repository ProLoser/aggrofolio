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
	);
	
	var $actions = array(
		'add' => 'Added',
		'delete' => 'Deleted',
		'edit' => 'Updated',
	);

	function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['contain'] = array(
				'Album' => array(
					'MediaItem',
				),
				'Post', 
				'Project' => array(
					'MediaItem' => array('limit' => 4)
				),
			);
			// Used to retain the last item in the group
			$query['joins'][] = array(
				'table' => '(SELECT MAX(id) AS id FROM logs GROUP BY model, model_id)',
				'alias' => 'Ids',
				'type' => 'INNER',
				'conditions' => array('Log.id = Ids.id'),
			);
			$query['conditions'] = array(
				'Log.model' => array('Album', 'Post', 'Project'),
			);
			if (isset($this->belongsTo['User']))
				$query['contain'][] = 'User';
			return $query;
		} elseif ($state == 'after') {
			return $results;
		}
	}
}