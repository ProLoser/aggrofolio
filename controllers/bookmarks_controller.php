<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';

	function index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}
	
	function scan($accountId) {
		$count = $this->Bookmark->scan($accountId);
		$this->Session->setFlash(__($count . ' bookmarks scanned', true));
		$this->redirect(array('action' => 'index'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bookmark', $this->Bookmark->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->data)) {
				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bookmark', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bookmark->save($this->data)) {
				$this->Session->setFlash(__('The bookmark has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bookmark->read(null, $id);
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bookmark->delete($id)) {
			$this->Session->setFlash(__('Bookmark deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>