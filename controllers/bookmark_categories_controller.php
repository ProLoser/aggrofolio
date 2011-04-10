<?php
class BookmarkCategoriesController extends AppController {

	var $name = 'BookmarkCategories';

	function admin_index() {
		$this->BookmarkCategory->recursive = 0;
		$this->set('bookmarkCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bookmarkCategory', $this->BookmarkCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BookmarkCategory->create();
			if ($this->BookmarkCategory->save($this->data)) {
				$this->Session->setFlash(__('The bookmark category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark category could not be saved. Please, try again.', true));
			}
		}
		$parentBookmarkCategories = $this->BookmarkCategory->ParentBookmarkCategory->find('list');
		$this->set(compact('parentBookmarkCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bookmark category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BookmarkCategory->save($this->data)) {
				$this->Session->setFlash(__('The bookmark category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BookmarkCategory->read(null, $id);
		}
		$parentBookmarkCategories = $this->BookmarkCategory->ParentBookmarkCategory->find('list');
		$this->set(compact('parentBookmarkCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BookmarkCategory->delete($id)) {
			$this->Session->setFlash(__('Bookmark category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>