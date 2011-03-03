<?php
class ResumesController extends AppController {

	var $name = 'Resumes';

	function index() {
		$this->Resume->recursive = 0;
		$this->set('resumes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resume', $this->Resume->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Resume->create();
			if ($this->Resume->save($this->data)) {
				$this->Session->setFlash(__('The resume has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.', true));
			}
		}
		$resumeRecommendations = $this->Resume->ResumeRecommendation->find('list');
		$this->set(compact('resumeRecommendations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Resume->save($this->data)) {
				$this->Session->setFlash(__('The resume has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Resume->read(null, $id);
		}
		$resumeRecommendations = $this->Resume->ResumeRecommendation->find('list');
		$this->set(compact('resumeRecommendations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resume->delete($id)) {
			$this->Session->setFlash(__('Resume deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>