<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $components = array(
		'Apis.Oauth' => array(			
			'linkedin',
			'github',
			'flickr',
			'twitter',
		),
	);
	public $paginate = array();
	
	public function admin_test() {
		$followers = $this->Account->getFollowers();
		diebug($followers);
	}
	
	function admin_reset() {
		$this->Session->delete('OAuth');
		$this->Plate->flash('OAuth Session Reset');
	}
	
	function admin_connect($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Account'));
			$this->redirect(array('action' => 'index'));
		}
		$type = $this->Account->field('type', array('Account.id' => $id));
		
		$this->Oauth->useDbConfig = $type;

		$this->Oauth->connect(array('action' => 'index'), array('action' => 'callback', $type));
	}
	
	function admin_callback($useDbConfig = null) {
		$this->Oauth->useDbConfig = $useDbConfig;
		$this->Oauth->callback(array('action' => 'index'));
	}
	
	function admin_scan($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid type'));
		} elseif ($this->Account->scan($id)) {
			$this->Session->setFlash(__('The account has been scanned'));
		} else {
			$this->Session->setFlash(__('There was an error scanning the account. Try logging in again.'));
		}
		$this->redirect(array('action' => 'index'));
	}

	function admin_index() {
		$this->Account->recursive = 0;
		$accounts = $this->paginate();
		$types = $this->Account->types;
		$this->set(compact('accounts', 'types'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Account->recursive = 1;
		$this->set('account', $this->Account->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Account->create();
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been saved'));
				if (in_array($this->request->data['Account']['type'], array('jsfiddle', 'deviantart', 'blog'))) {
					$this->redirect(array('action' => 'index'));
				} else {
					$this->redirect(array('action' => 'connect', $this->Account->id));
				}
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		}
		$types = $this->Account->types;
		$this->set(compact('types'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid account'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Account->save($this->request->data)) {
				$this->Session->setFlash(__('The account has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Account->read(null, $id);
		}
		$types = $this->Account->types;
		$this->set(compact('types'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for account'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Account->delete($id)) {
			$this->Session->setFlash(__('Account deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Account was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>