<?php
class ResumeEmployersController extends AppController {

	var $name = 'ResumeEmployers';

	function admin_index() {
		$this->ResumeEmployer->recursive = 0;
		$this->set('resumeEmployers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume employer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumeEmployer', $this->ResumeEmployer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ResumeEmployer->create();
			if ($this->ResumeEmployer->save($this->data)) {
				$this->Session->setFlash(__('The resume employer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume employer could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->ResumeEmployer->Account->find('list');
		$albums = $this->ResumeEmployer->Album->find('list');
		$resumes = $this->ResumeEmployer->Resume->find('list');
		$this->set(compact('accounts', 'albums', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume employer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumeEmployer->save($this->data)) {
				$this->Session->setFlash(__('The resume employer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume employer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumeEmployer->read(null, $id);
		}
		$accounts = $this->ResumeEmployer->Account->find('list');
		$albums = $this->ResumeEmployer->Album->find('list');
		$resumes = $this->ResumeEmployer->Resume->find('list');
		$this->set(compact('accounts', 'albums', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume employer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeEmployer->delete($id)) {
			$this->Session->setFlash(__('Resume employer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume employer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>