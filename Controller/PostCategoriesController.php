<?php
class PostCategoriesController extends AppController {

	var $name = 'PostCategories';
	public $paginate = array();

	function admin_index() {
		$this->PostCategory->recursive = 0;
		$postCategories = $this->paginate();
		$this->set(compact('postCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->recursive = 1;
		$this->set('postCategory', $this->PostCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->PostCategory->create();
			$this->request->data['PostCategory']['user_id'] = $this->Auth->user('id');
			if ($this->PostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The post category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->PostCategory->generateTreeList(array('user_id' => $this->PostCategory->userId()), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid post category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->PostCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The post category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->PostCategory->read(null, $id);
		}
		$parents = $this->PostCategory->generateTreeList(array('id !=' => $id, 'user_id' => $this->PostCategory->userId()), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PostCategory->delete($id)) {
			$this->Session->setFlash(__('Post category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>