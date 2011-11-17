<?php
class ResumesController extends AppController {

	var $name = 'Resumes';
	public $paginate = array();
	
	function index() {
		$this->set('resume', $this->Resume->render());
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resume', $this->Resume->render($id));
		$this->render('index');
	}

	function admin_index() {
		$this->Resume->recursive = 0;
		$this->set('resumes', $this->paginate());
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Resume->recursive = 1;
		$this->set('resume', $this->Resume->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Resume->create();
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash(__('The resume has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		}
		$resumeRecommendations = $this->Resume->ResumeRecommendation->find('list');
		$resumeSchools = $this->Resume->ResumeSchool->find('list');
		$resumeSkills = $this->Resume->ResumeSkill->find('list');
		$resumeEmployers = $this->Resume->ResumeEmployer->find('list');
		$this->set(compact('resumeRecommendations', 'resumeSchools', 'resumeSkills', 'resumeEmployers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash(__('The resume has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->Resume->recursive = 1;
			$this->request->data = $this->Resume->read(null, $id);
		}
		$resumeRecommendations = $this->Resume->ResumeRecommendation->find('list');
		$resumeSchools = $this->Resume->ResumeSchool->find('list');
		$resumeSkills = $this->Resume->ResumeSkill->find('list');
		$resumeEmployers = $this->Resume->ResumeEmployer->find('list');
		$this->set(compact('resumeRecommendations', 'resumeSchools', 'resumeSkills', 'resumeEmployers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resume->delete($id)) {
			$this->Session->setFlash(__('Resume deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>