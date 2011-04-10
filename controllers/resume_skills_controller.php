<?php
class ResumeSkillsController extends AppController {

	var $name = 'ResumeSkills';

	function admin_index() {
		$this->ResumeSkill->recursive = 0;
		$this->set('resumeSkills', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resume skill', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumeSkill', $this->ResumeSkill->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ResumeSkill->create();
			if ($this->ResumeSkill->save($this->data)) {
				$this->Session->setFlash(__('The resume skill has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill could not be saved. Please, try again.', true));
			}
		}
		$accounts = $this->ResumeSkill->Account->find('list');
		$resumes = $this->ResumeSkill->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resume skill', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumeSkill->save($this->data)) {
				$this->Session->setFlash(__('The resume skill has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume skill could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumeSkill->read(null, $id);
		}
		$accounts = $this->ResumeSkill->Account->find('list');
		$resumes = $this->ResumeSkill->Resume->find('list');
		$this->set(compact('accounts', 'resumes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resume skill', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumeSkill->delete($id)) {
			$this->Session->setFlash(__('Resume skill deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resume skill was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>