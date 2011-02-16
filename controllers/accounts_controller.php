<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $components = array('Linkedin.Linkedin');
	
	function linkedin() {
		$this->set('profile', $this->Linkedin->profile(null, array(
			'first-name', 'last-name', 'positions' => 'company', 'educations', 'certifications', 'skills', 'recommendations-received'
		)));
	}
	
	function login($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Linkedin->login()) {
			$this->Account->id = $id;
			$this->Account->saveField('api_key', json_encode($this->Linkedin->response['linkedin']));
			$this->Session->setFlash('You logged in');
			$this->redirect(array('action' => 'linkedin'));
		} else {
			$this->Account->id = $id;
			$this->Account->saveField('api_key', '');
			$this->Session->setFlash('There was an error');
		}
	}
	
	function logout() {
		if ($this->Linkedin->logout()) {
			$this->Session->setFlash('You logged out');
		} else {
			$this->Session->setFlash('There was an error');
		}
	}
	
	function deviantart() {
		
	}
	
	function github() {
		$account = $this->Account->find('first', array('conditions' => array(
			'type' => 'github',
		)));
		$projects = $this->Account->Project->findRepos($account['Account']['username']);
		$this->set(compact('account', 'projects'));
		$data = $projects['Repositories']['Repository'];
		foreach ($data as $i => $project) {
			$data[$i]['cvs_url'] = $project['url'];
			$data[$i]['account_id'] = $account['Account']['id'];
		}
		if ($this->Account->Project->saveAll($data)) {
			$this->Session->setFlash(__('The projects have been saved', true));
		} else {
			$this->Session->setFlash(__('There was an error saving the projects', true));
		}
	}
	

	function index() {
		$this->Account->recursive = 0;
		$this->set('accounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('account', $this->Account->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Account->create();
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'login', $this->id));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		$types = $this->Account->types;
		$this->set(compact('types'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		$types = $this->Account->types;
		$this->set(compact('types'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Account->delete($id)) {
			$this->Session->setFlash(__('Account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>