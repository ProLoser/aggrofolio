<?php
class ResumeSchoolsController extends AppController {

	var $name = 'ResumeSchools';

	function index() {
		$this->ResumeSchool->recursive = 0;
		$this->set('resumeSchools', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume school', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumeSchool', $this->ResumeSchool->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ResumeSchool->create();
			if ($this->ResumeSchool->save($this->data)) {
				$this->Session->setFlash(__('The resume school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume school could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->ResumeSchool->Account->find('list');
		$resumes = $this->ResumeSchool->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume school', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumeSchool->save($this->data)) {
				$this->Session->setFlash(__('The resume school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume school could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumeSchool->read(null, $id);
		}
		$accounts = $this->ResumeSchool->Account->find('list');
		$resumes = $this->ResumeSchool->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume school', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSchool->delete($id)) {
			$this->Session->setFlash(__('Resume school deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume school was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>