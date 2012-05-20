<?php
class ResumeRecommendationsController extends AppController {

	var $name = 'ResumeRecommendations';
	public $paginate = array();

	function admin_index() {
		$this->ResumeRecommendation->recursive = 0;
		$this->set('resumeRecommendations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume recommendation'));
			$this->redirect(array('action' => 'index'));
		}
		$this->ResumeRecommendation->recursive = 1;
		$this->set('resumeRecommendation', $this->ResumeRecommendation->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ResumeRecommendation->create();
			$this->request->data['ResumeRecommendation']['user_id'] = $this->Auth->user('id');
			if ($this->ResumeRecommendation->save($this->request->data)) {
				$this->Session->setFlash(__('The resume recommendation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume recommendation could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->ResumeRecommendation->Account->find('list');
		$resumes = $this->ResumeRecommendation->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume recommendation'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ResumeRecommendation->save($this->request->data)) {
				$this->Session->setFlash(__('The resume recommendation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume recommendation could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->ResumeRecommendation->read(null, $id);
		}
		$accounts = $this->ResumeRecommendation->Account->find('list');
		$resumes = $this->ResumeRecommendation->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume recommendation'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeRecommendation->delete($id)) {
			$this->Session->setFlash(__('Resume recommendation deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume recommendation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>