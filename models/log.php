<?php
class Log extends AppModel {
	var $name = 'Log';
	var $order = 'Log.created DESC';
	var $_findMethods = array('dashboard' => true);
	
	var $belongsTo = array(
		'Album' => array(
			'conditions' => array('model' => 'Album'),
			'foreignKey' => 'model_id',
		),
		'MediaItem' => array(
			'conditions' => array('model' => 'MediaItem'),
			'foreignKey' => 'model_id',
		),
		'Post' => array(
			'conditions' => array('model' => 'Post'),
			'foreignKey' => 'model_id',
		),
		'Project' => array(
			'conditions' => array('model' => 'Project'),
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
			$query['contain'] = array('Album', 'MediaItem', 'Post', 'Project');
			if (isset($this->belongsTo['User']))
				$query['contain'][] = 'User';
			#$query['limit'] = 30;
			return $query;
		} elseif ($state == 'after') {
			return $results;
		}
	}

}
