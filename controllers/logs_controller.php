<?php
class LogsController extends AppController {
	var $name = 'Logs';
	var $helpers = array('Log.Log', 'Time');

	function index() {
		$logs = $this->Log->find('dashboard');
		$actions = $this->Log->actions;
		$this->set(compact('logs', 'actions'));
	}
}
?>