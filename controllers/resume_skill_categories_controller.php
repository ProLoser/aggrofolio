<?php
class ResumeSkillCategoriesController extends AppController {

	var $name = 'ResumeSkillCategories';

	function admin_index() {
		$this->ResumeSkillCategory->recursive = 0;
		$resumeSkillCategories = $this->paginate();
		$this->set(compact('resumeSkillCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume skill category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->ResumeSkillCategory->recursive = 1;
		$this->set('resumeSkillCategory', $this->ResumeSkillCategory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ResumeSkillCategory->create();
			if ($this->ResumeSkillCategory->save($this->data)) {
				$this->Session->setFlash(__('The resume skill category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill category could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->ResumeSkillCategory->generatetreelist(array(), null, null, '» ');
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume skill category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumeSkillCategory->save($this->data)) {
				$this->Session->setFlash(__('The resume skill category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->ResumeSkillCategory->recursive = 1;
			$this->data = $this->ResumeSkillCategory->read(null, $id);
		}
		$parents = $this->ResumeSkillCategory->generatetreelist(array('ResumeSkillCategory.id !=' => $this->data['ResumeSkillCategory']['id']), null, null, '» ');
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume skill category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSkillCategory->delete($id)) {
			$this->Session->setFlash(__('Resume skill category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume skill category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
