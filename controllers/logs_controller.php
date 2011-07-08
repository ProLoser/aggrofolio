<?php
class LogsController extends AppController {
	var $name = 'Logs';
	var $helpers = array('Time');
	var $paginate = array('dashboard');

	function index() {
		$logs = $this->Log->find('dashboard');
		$actions = $this->Log->actions;
		$this->set(compact('logs', 'actions'));
	}
	
	function paginated() {
		$logs = $this->paginate();
		$actions = $this->Log->actions;
		$paginate = true;
		$this->set(compact('logs', 'actions', 'paginate'));
		$this->render('index');
	}
}
?>