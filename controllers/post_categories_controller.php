<?php
class PostCategoriesController extends AppController {

	var $name = 'PostCategories';

	function admin_index() {
		$this->PostCategory->recursive = 0;
		$postCategories = $this->paginate();
		$this->set(compact('postCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->recursive = 1;
		$this->set('postCategory', $this->PostCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PostCategory->create();
			if ($this->PostCategory->save($this->data)) {
				$this->Session->setFlash(__('The post category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post category could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->PostCategory->generateTreeList(null, null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PostCategory->save($this->data)) {
				$this->Session->setFlash(__('The post category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PostCategory->read(null, $id);
		}
		$parents = $this->PostCategory->generateTreeList(array('PostCategory.id !=' => $id), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PostCategory->delete($id)) {
			$this->Session->setFlash(__('Post category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>