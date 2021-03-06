<?php
class BookmarkCategoriesController extends AppController {

	var $name = 'BookmarkCategories';
	public $paginate = array();
	
	function admin_index() {
		$this->BookmarkCategory->recursive = 0;
		$bookmarkCategories = $this->paginate();
		$parents = $this->BookmarkCategory->find('list');
		$this->set(compact('bookmarkCategories', 'parents'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->BookmarkCategory->recursive = 1;
		$this->set('bookmarkCategory', $this->BookmarkCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->BookmarkCategory->create();
			if ($this->BookmarkCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->BookmarkCategory->find('list');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid bookmark category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->BookmarkCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->BookmarkCategory->read(null, $id);
		}
		$parents = $this->BookmarkCategory->find('list', array('conditions' => array('id !=' => $id)));
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BookmarkCategory->delete($id)) {
			$this->Session->setFlash(__('Bookmark category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>