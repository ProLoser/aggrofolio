<?php
class UsersController extends AppController {

	var $name = 'Users';
	public $paginate = array();
	public $main = array('register');
	public $both = array('login', 'logout');
	
	function register() {
		if (!empty($this->request->data)) {
			$this->User->create();
			if ($this->User->saveAssociated($this->request->data)) {
				$this->request->data['User']['id'] = $this->User->id;
				$this->Auth->login($this->request->data);
				$this->Session->setFlash(__('Registration Was a Success!'));
				$redirect = Router::url(array('admin' => true, 'controller' => 'importer', 'action' => 'index'), true);
				$redirect = str_replace($_SERVER['HTTP_HOST'], $this->request->data['User']['subdomain'] . '.' . $_SERVER['HTTP_HOST'], $redirect);
				$this->redirect($redirect);
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		
	}
	
	function login() {
		if (!empty($this->request->data)) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash($this->Auth->loginError);
			}
		}
	}    
	
	function logout() {        
		$this->redirect($this->Auth->logout());    
	}

	function manager_index() {
		$this->User->recursive = 0;
		$users = $this->paginate();
		$roles = $this->User->roles;
		$this->set(compact('users', 'roles'));
	}

	function manager_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user'));
			$this->redirect(array('action' => 'index'));
		}
		$this->User->recursive = 1;
		$this->set('user', $this->User->read(null, $id));
	}

	function manager_add() {
		if (!empty($this->request->data)) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	function manager_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid user'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	function manager_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>