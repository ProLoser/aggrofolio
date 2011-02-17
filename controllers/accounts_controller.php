<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $components = array('Linkedin.Linkedin');
	
	function test() {
		$this->loadModel('Resource');
		$projects = array_merge(
			$this->Resource->find('all', array('conditions' => array('username' => 'proloser'), 'fields' => 'projects')),
			$this->Resource->find('all', array('conditions' => array('username' => 'proloser'), 'fields' => 'collaborations'))
		);
		debug($projects);
	}
	
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
	
	function scan($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid type', true));
			$this->redirect(array('action' => 'index'));
		}
		$account = $this->Account->read(null, $id);
		if (empty($account)) {
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Account->Project->{'scan' . Inflector::classify($type)}($account)) {
			$this->Session->setFlash(__('The projects have been saved', true));
		} else {
			$this->Session->setFlash(__('There was an error saving the projects', true));
		}
		$this->redirect(array('action' => 'index'));
	}
	

	function index() {
		$this->Account->recursive = 0;
		$accounts = $this->paginate();
		$types = $this->Account->types;
		$this->set(compact('accounts', 'types'));
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