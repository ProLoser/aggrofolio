<?php
class ActivitiesController extends AppController {
	public $name = 'Activities';
	public $helpers = array('Time');
	public $paginate = array('dashboard');

	function index() {
		$activities = $this->Activity->find('dashboard');
		$actions = $this->Activity->actions;
		$this->set(compact('activities', 'actions'));
	}
	
	function paginated() {
		$activities = $this->paginate();
		$actions = $this->Activity->actions;
		$paginate = true;
		$this->set(compact('activities', 'actions', 'paginate'));
		$this->render('index');
	}
}
?>