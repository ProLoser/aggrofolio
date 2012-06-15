<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $helpers = array('Time');
	var $components = array(
		'Apis.Oauth' => array(
			//'codaset',
			'github',
		),
	);
	public $paginate = array();

	function index() {
		$this->paginate['limit'] = 50;
		$this->paginate['conditions']['Project.published'] = true;
		if (isset($this->request->params['named']['category']))
			$this->paginate['conditions']['Project.project_category_id'] = $this->request->params['named']['category'];
		$this->paginate['contain'] = array('ProjectCategory', 'MediaItem' => array('limit' => 1));
		$projects = $this->paginate();
		$categories = $this->Project->ProjectCategory->find('threaded');
		$this->set(compact('projects', 'categories'));
	}

	function view($id = null) {
		if (!$id || !($project = $this->Project->full($id))) {
			$this->Session->setFlash(__('Invalid project'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('project'));
	}

	function admin_index() {
		$this->Project->recursive = 0;
		$projects = $this->paginate();
		$accounts = $this->Project->Account->find('list');
		$projectCategories = $this->Project->ProjectCategory->find('list');
		$this->set(compact('projects', 'accounts', 'projectCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Project->recursive = 1;
		$this->set('project', $this->Project->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Project->create();
			$this->request->data['Project']['user_id'] = $this->Auth->user('id');
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'));
				$this->redirect(array('action' => 'view', $this->Project->id));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->Project->Account->find('list');
		$projectCategories = $this->Project->ProjectCategory->find('list');
		$resumeEmployers = $this->Project->ResumeEmployer->find('list');
		$resumeSchools = $this->Project->ResumeSchool->find('list');
		$this->set(compact('accounts', 'projectCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid project'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'));
				$this->redirect(array('action' => 'view', $this->Project->id));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Project->read(null, $id);
		}
		$accounts = $this->Project->Account->find('list');
		$projectCategories = $this->Project->ProjectCategory->find('list');
		$resumeEmployers = $this->Project->ResumeEmployer->find('list');
		$resumeSchools = $this->Project->ResumeSchool->find('list');
		$this->set(compact('accounts', 'projectCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(__('Project deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_publish($id = null) {
		$this->Project->publish($id);
		$this->redirect(array('controller' => 'accounts', 'action' => 'importer'));
	}
}
?>