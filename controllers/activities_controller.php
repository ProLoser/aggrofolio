<?php
class ActivitiesController extends AppController {
	var $name = 'Activities';
	var $helpers = array('Time');
	var $paginate = array('dashboard');

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