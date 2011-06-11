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
			$query['group'] = array('Log.model', 'Log.model_id');
			$query['conditions'] = array(
				'Log.model' => array('Album', 'Post', 'Project'),
			);
			if (isset($this->belongsTo['User']))
				$query['contain'][] = 'User';
			#$query['limit'] = 30;
			return $query;
		} elseif ($state == 'after') {
			return $results;
		}
	}

}