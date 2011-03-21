<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $components = array(
		'Linkedin.Linkedin' => array(
			'appKey' => '1KqQhz25v7ne60NEPWhdZjIE8ET3cEijT0m0RvgqKqKpFEZHXjwX14Vz-Hp5hMQ6',
			'appSecret' => 'ldmVbU9wn08ea6l9_2EkBQKXnwbjLOf0EfKjptHzc0U-8ldBYE7J1TDIFEt9e9H4',
		),
	);
	
	function linkedin($scan = false) {
		$data = $this->Linkedin->profile(null, array(
			'first-name', 'last-name', 'summary', 'specialties', 'associations', 'honors', 'interests', 'twitter-accounts', 
			'positions' => array('title', 'summary', 'start-date', 'end-date', 'is-current', 'company'), 
			'educations', 
			'certifications',
			'skills' => array('id', 'skill', 'proficiency', 'years'), 
			'recommendations-received'
		));
		if (!$data) {
			$this->Session->setFlash('There was an error: ' . $this->Linkedin->response['error']);
		} elseif ($scan) {
			$this->loadModel('Resume');
			$this->Resume->scanLinkedin($data);
		}
		$this->set('profile', $data);
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
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function logout() {
		if ($this->Linkedin->logout()) {
			$this->Session->setFlash('You logged out');
		} else {
			$this->Session->setFlash('There was an error');
		}
		$this->redirect(array('action' => 'index'));
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