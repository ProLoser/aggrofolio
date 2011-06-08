<?php
class MediaCategoriesController extends AppController {

	var $name = 'MediaCategories';

	function admin_index() {
		$this->MediaCategory->recursive = 0;
		$this->set('mediaCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid media category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mediaCategory', $this->MediaCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->MediaCategory->create();
			if ($this->MediaCategory->save($this->data)) {
				$this->Session->setFlash(__('The media category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->MediaCategory->generateTreeList(null, null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid media category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MediaCategory->save($this->data)) {
				$this->Session->setFlash(__('The media category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MediaCategory->read(null, $id);
		}
		$parents = $this->MediaCategory->generateTreeList(array('MediaCategory.id !=' => $id), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for media category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MediaCategory->delete($id)) {
			$this->Session->setFlash(__('Media category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Media category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>