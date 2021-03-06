<?php
class ResumeEmployersController extends AppController {

	var $name = 'ResumeEmployers';
	public $paginate = array();

	function admin_index() {
		if ($this->viewClass === 'Json') {
			$this->viewClass = 'Webservice.Webservice';
			$this->set('works', $this->ResumeEmployer->find('all'));
			return;
		}
		$this->ResumeEmployer->recursive = 0;
		$resumeEmployers = $this->paginate();
		$accounts = $this->ResumeEmployer->Account->find('list');
		$this->set(compact('resumeEmployers', 'accounts'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume employer'));
			$this->redirect(array('action' => 'index'));
		}
		$this->recursive = 1;
		$this->set('resumeEmployer', $this->ResumeEmployer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ResumeEmployer->create();
			if ($this->ResumeEmployer->save($this->request->data)) {
				$this->Session->setFlash(__('The resume employer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume employer could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->ResumeEmployer->Account->find('list');
		$resumes = $this->ResumeEmployer->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume employer'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ResumeEmployer->save($this->request->data)) {
				$this->Session->setFlash(__('The resume employer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume employer could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->ResumeEmployer->recursive = 1;
			$this->request->data = $this->ResumeEmployer->read(null, $id);
		}
		$accounts = $this->ResumeEmployer->Account->find('list');
		$resumes = $this->ResumeEmployer->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume employer'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeEmployer->delete($id)) {
			$this->Session->setFlash(__('Resume employer deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume employer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_publish($id = null) {
		$this->ResumeEmployer->publish($id);
		$this->redirect(array('controller' => 'accounts', 'action' => 'importer'));
	}
}
?>