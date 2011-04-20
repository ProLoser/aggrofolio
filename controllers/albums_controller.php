<?php
class AlbumsController extends AppController {

	var $name = 'Albums';

	function index() {
		$albums = $this->Album->find('all');
		$categories_for_layout = $this->Album->MediaCategory->find('list');
		$catType_for_layout = 'Media';
		$this->set(compact('albums', 'categories_for_layout', 'catType_for_layout'));
	}

	function admin_index() {
		$this->Album->recursive = 0;
		$albums = $this->paginate();
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$this->set(compact('albums', 'accounts', 'mediaCategories'));
	}

	function admin_scan($accountId = null) {
		$count = $this->Album->scan($accountId);
		$this->Session->setFlash(__($count . ' Album(s) scanned', true));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Album->recursive = 1;
		$this->set('album', $this->Album->read(null, $id));
	}

	function admin_add() {
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

	function admin_edit($id = null) {
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

	function admin_delete($id = null) {
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