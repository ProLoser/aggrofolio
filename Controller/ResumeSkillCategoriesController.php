<?php
class ResumeSkillCategoriesController extends AppController {

	var $name = 'ResumeSkillCategories';
	public $paginate = array();

	function admin_index() {
		$this->ResumeSkillCategory->recursive = 0;
		$resumeSkillCategories = $this->paginate();
		$this->set(compact('resumeSkillCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume skill category'));
			$this->redirect(array('action' => 'index'));
		}
		$this->ResumeSkillCategory->recursive = 1;
		$this->set('resumeSkillCategory', $this->ResumeSkillCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ResumeSkillCategory->create();
			if ($this->ResumeSkillCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The resume skill category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->ResumeSkillCategory->generatetreelist(array(), null, null, '» ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume skill category'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ResumeSkillCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The resume skill category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill category could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->ResumeSkillCategory->recursive = 1;
			$this->request->data = $this->ResumeSkillCategory->read(null, $id);
		}
		$parents = $this->ResumeSkillCategory->generatetreelist(array('ResumeSkillCategory.id !=' => $this->request->data['ResumeSkillCategory']['id']), null, null, '» ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume skill category'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSkillCategory->delete($id)) {
			$this->Session->setFlash(__('Resume skill category deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume skill category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
