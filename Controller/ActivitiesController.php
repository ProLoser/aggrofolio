<?php
class ActivitiesController extends AppController {
	public $name = 'Activities';
	public $helpers = array('Time', 'Text');
	public $paginate = array('dashboard');
	
	function index() {
		$this->paginate['conditions']['user_id'] = $this->Activity->userId();
		if (!isset($this->paginate['limit']))
			$this->paginate['limit'] = '40';
		$activities = $this->paginate();
		$actions = $this->Activity->actions;
		$paginate = true;
		$this->set(compact('activities', 'actions', 'paginate'));
		$this->render('index');
	}

	function full() {
		$activities = $this->Activity->find('dashboard');
		$actions = $this->Activity->actions;
		$this->set(compact('activities', 'actions'));
	}
}
?>