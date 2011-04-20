<?php
class Log extends AppModel {
	var $name = 'Log';
	var $order = 'Log.created DESC';
	var $_findMethods = array('dashboard' => true);
	
	var $actions = array(
		'add' => 'added',
		'delete' => 'deleted',
		'edit' => 'updated',
	);

	function _findDashboard($state, $query, $results = array()) {
		if ($state == 'before') {
			if (isset($this->belongsTo['User']))
				$query['contain'] = array('User');
			#$query['limit'] = 30;
			return $query;
		} elseif ($state == 'after') {
			return $results;
		}
	}

}
