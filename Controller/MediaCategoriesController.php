<?php
class MediaCategoriesController extends AppController {

	var $name = 'MediaCategories';
	public $paginate = array();

	function admin_index() {
		$this->MediaCategory->recursive = 0;
		$this->set('mediaCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid media category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->MediaCategory->recursive = 1;
		$this->set('mediaCategory', $this->MediaCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->MediaCategory->create();
			$this->request->data['MediaCategory']['user_id'] = $this->Auth->user('id');
			if ($this->MediaCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->MediaCategory->generateTreeList(array('user_id' => $this->MediaCategory->userId()), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid media category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->MediaCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The media category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->MediaCategory->read(null, $id);
		}
		$parents = $this->MediaCategory->generateTreeList(array('id !=' => $id, 'user_id' => $this->MediaCategory->userId()), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for media category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MediaCategory->delete($id)) {
			$this->Session->setFlash(__('Media category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Media category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>