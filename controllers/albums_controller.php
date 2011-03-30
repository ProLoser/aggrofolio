<?php
class AlbumsController extends AppController {

	var $name = 'Albums';

	function index() {
		$this->Album->recursive = 0;
		$this->paginate = $this->Filter->paginate;
		$albums = $this->paginate();
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$this->set(compact('albums', 'accounts', 'mediaCategories'));
	}

	function scan($accountId = null) {
		$count = $this->Album->scan($accountId);
		$this->Session->setFlash(__($count . ' Album(s) scanned', true));
		$this->redirect(array('action' => 'index'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('album', $this->Album->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$resumeEmployers = $this->Album->ResumeEmployer->find('list');
		$resumeSchools = $this->Album->ResumeSchool->find('list');
		$this->set(compact('accounts', 'mediaCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$resumeEmployers = $this->Album->ResumeEmployer->find('list');
		$resumeSchools = $this->Album->ResumeSchool->find('list');
		$this->set(compact('accounts', 'mediaCategories', 'resumeEmployers', 'resumeSchools'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->delete($id)) {
			$this->Session->setFlash(__('Album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Album was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>