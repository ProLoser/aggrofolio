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
		'add' => 'added',
		'delete' => 'deleted',
		'edit' => 'updated',
	);

	function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			$query['contain'] = array(
				'Album' => array(
					'MediaItem' => array('limit' => 2)
				), 
				'MediaItem', 
				'Post', 
				'Project' => array(
					'MediaItem' => array('limit' => 2)
				),
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
