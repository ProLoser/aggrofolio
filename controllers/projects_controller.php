<?php
class ProjectsController extends AppController {

	var $name = 'Projects';
	var $helpers = array('Time');
	var $components = array(
		'Apis.Oauth' => array(	
			'codaset',
			'github',
		),
	);
	
	function index() {
		$this->paginate['limit'] = 12;
		$this->paginate['conditions']['Project.published'] = true;
		if (isset($this->params['named']['category']))
			$this->paginate['conditions']['Project.project_category_id'] = $this->params['named']['category'];
		$this->paginate['contain'] = array('ProjectCategory', 'MediaItem' => array('limit' => 1));
		$projects = $this->paginate();
		$categories = $this->Project->ProjectCategory->find('threaded');
		$this->set(compact('projects', 'categories'));
	}

	function view($id = null) {
		if (!$id || !($project = $this->Project->full($id))) {
			$this->Session->setFlash(__('Invalid project', true));
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
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->Project->Account->find('list');
		$projectCategories = $this->Project->ProjectCategory->generatetreelist(null, null, null, '- ');
		$resumeEmployers = $this->Project->ResumeEmployer->find('list');
		$resumeSchools = $this->Project->ResumeSchool->find('list');
		$this->set(compact('accounts', 'projectCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$accounts = $this->Project->Account->find('list');
		$projectCategories = $this->Project->ProjectCategory->find('list');
		$resumeEmployers = $this->Project->ResumeEmployer->find('list');
		$resumeSchools = $this->Project->ResumeSchool->find('list');
		$this->set(compact('accounts', 'projectCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>