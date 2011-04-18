<?php
class ProjectCategoriesController extends AppController {

	var $name = 'ProjectCategories';

	function admin_index() {
		$this->ProjectCategory->recursive = 0;
		$this->set('projectCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectCategory', $this->ProjectCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ProjectCategory->create();
			if ($this->ProjectCategory->save($this->data)) {
				$this->Session->setFlash(__('The project category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project category could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->ProjectCategory->find('list');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectCategory->save($this->data)) {
				$this->Session->setFlash(__('The project category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectCategory->read(null, $id);
		}
		$parents = $this->ProjectCategory->find('list');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectCategory->delete($id)) {
			$this->Session->setFlash(__('Project category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>