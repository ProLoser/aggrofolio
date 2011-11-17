<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';
	public $paginate = array();
	
	function admin_index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}
	
	function admin_scan($accountId) {
		$count = $this->Bookmark->scan($accountId);
		$this->Session->setFlash(__($count . ' bookmarks scanned'));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bookmark', $this->Bookmark->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid bookmark'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Bookmark->read(null, $id);
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bookmark->delete($id)) {
			$this->Session->setFlash(__('Bookmark deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>