<?php
class ResumeSchoolsController extends AppController {

	var $name = 'ResumeSchools';
	public $paginate = array();

	function admin_index() {
		$this->ResumeSchool->recursive = 0;
		$resumeSchools = $this->paginate();
		$accounts = $this->ResumeSchool->Account->find('list');
		$this->set(compact('resumeSchools', 'accounts'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume school'));
			$this->redirect(array('action' => 'index'));
		}
		$this->ResumeSchool->recursive = 1;
		$this->set('resumeSchool', $this->ResumeSchool->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ResumeSchool->create();
			if ($this->ResumeSchool->save($this->request->data)) {
				$this->Session->setFlash(__('The resume school has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume school could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->ResumeSchool->Account->find('list');
		$resumes = $this->ResumeSchool->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume school'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ResumeSchool->save($this->request->data)) {
				$this->Session->setFlash(__('The resume school has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume school could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->ResumeSchool->recursive = 1;
			$this->request->data = $this->ResumeSchool->read(null, $id);
		}
		$accounts = $this->ResumeSchool->Account->find('list');
		$resumes = $this->ResumeSchool->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume school'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSchool->delete($id)) {
			$this->Session->setFlash(__('Resume school deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume school was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>