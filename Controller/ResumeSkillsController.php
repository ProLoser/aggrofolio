<?php
class ResumeSkillsController extends AppController {

	var $name = 'ResumeSkills';
	public $paginate = array();

	function admin_index() {
		if ($this->viewClass === 'Json') {
			$this->viewClass = 'Webservice.Webservice';
			$this->set('skills', $this->ResumeSkill->find('all'));
			return;
		}
		$this->ResumeSkill->recursive = 0;
		$resumeSkills = $this->paginate();
		$resumeSkillCategories = $this->ResumeSkill->ResumeSkillCategory->find('list');
		$this->set(compact('resumeSkills', 'resumeSkillCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume skill'));
			$this->redirect(array('action' => 'index'));
		}
		$this->ResumeSkill->recursive = 1;
		$this->set('resumeSkill', $this->ResumeSkill->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->ResumeSkill->create();
			$this->request->data['ResumeSkill']['user_id'] = $this->Auth->user('id');
			if ($this->ResumeSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The resume skill has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->ResumeSkill->Account->find('list');
		$resumes = $this->ResumeSkill->Resume->find('list');
		$resumeSkillCategories = $this->ResumeSkill->ResumeSkillCategory->find('list');
		$this->set(compact('accounts', 'resumes', 'resumeSkillCategories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid resume skill'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ResumeSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The resume skill has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->ResumeSkill->recursive = 1;
			$this->request->data = $this->ResumeSkill->read(null, $id);
		}
		$accounts = $this->ResumeSkill->Account->find('list');
		$resumes = $this->ResumeSkill->Resume->find('list');
		$resumeSkillCategories = $this->ResumeSkill->ResumeSkillCategory->find('list', array('conditions' => array('ResumeSkillCategory.id !=' => $id)));
		$this->set(compact('accounts', 'resumes', 'resumeSkillCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume skill'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSkill->delete($id)) {
			$this->Session->setFlash(__('Resume skill deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume skill was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>