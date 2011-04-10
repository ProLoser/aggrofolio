<?php
class ResumeRecommendationsController extends AppController {

	var $name = 'ResumeRecommendations';

	function admin_index() {
		$this->ResumeRecommendation->recursive = 0;
		$this->set('resumeRecommendations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume recommendation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumeRecommendation', $this->ResumeRecommendation->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ResumeRecommendation->create();
			if ($this->ResumeRecommendation->save($this->data)) {
				$this->Session->setFlash(__('The resume recommendation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume recommendation could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->ResumeRecommendation->Account->find('list');
		$resumes = $this->ResumeRecommendation->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume recommendation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumeRecommendation->save($this->data)) {
				$this->Session->setFlash(__('The resume recommendation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume recommendation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumeRecommendation->read(null, $id);
		}
		$accounts = $this->ResumeRecommendation->Account->find('list');
		$resumes = $this->ResumeRecommendation->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume recommendation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeRecommendation->delete($id)) {
			$this->Session->setFlash(__('Resume recommendation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume recommendation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>