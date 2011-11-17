<?php
class ProjectCategoriesController extends AppController {

	var $name = 'ProjectCategories';
	public $paginate = array();

	function admin_index() {
		$this->ProjectCategory->recursive = 0;
		$this->set('projectCategories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectCategory', $this->ProjectCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ProjectCategory->create();
			if ($this->ProjectCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The project category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->ProjectCategory->generateTreeList(null, null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid project category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ProjectCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The project category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->ProjectCategory->read(null, $id);
		}
		$parents = $this->ProjectCategory->generateTreeList(array('ProjectCategory.id !=' => $id), null, null, '- ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectCategory->delete($id)) {
			$this->Session->setFlash(__('Project category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>