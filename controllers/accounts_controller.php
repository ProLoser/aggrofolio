<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $components = array(
		'Apis.Oauth' => array(			
			'linkedin',
			'codaset',
			'github',
			'flickr',
		),
	);
	
	function admin_reset() {
		$this->Session->delete('OAuth');
		$this->Plate->flash('OAuth Session Reset');
	}
	
	function admin_connect($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Account', true));
			$this->redirect(array('action' => 'index'));
		}
		$type = $this->Account->field('type', array('Account.id' => $id));
		if ($type == 'deviantart') {
			$this->Plate->flash('Deviantart doesn\'t require authentication', array('action' => 'index'));
		}
		$this->Oauth->useDbConfig = $type;
		$callback = array('action' => 'callback', $type);
		if ($type == 'github') {
			$key = $this->Session->read("OAuth.{$type}.oauth_consumer_key");
			$callback = urlencode(Router::url($callback, true));
			$this->redirect("https://github.com/login/oauth/authorize?client_id={$key}&redirect_uri={$callback}");
		} else {
			$this->Oauth->connect(array('action' => 'index'), $callback);
		}
	}
	
	function admin_callback($useDbConfig = null) {
		$this->Oauth->useDbConfig = $useDbConfig;
		$this->Oauth->callback(array('action' => 'index'));
	}
	
	function admin_scan($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid type', true));
		} elseif ($this->Account->scan($id)) {
			$this->Session->setFlash(__('The account has been scanned', true));
		} else {
			$this->Session->setFlash(__('There was an error scanning the account. Try logging in again.', true));
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
			$this->Session->setFlash(__('Invalid account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('account', $this->Account->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Account->create();
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash(__('The account has been saved', true));
				$this->redirect(array('action' => 'connect', $this->Account->id));
			} else {
				$this->Session->setFlash(__('The account could not be saved. Please, try again.', true));
			}
		}
		$types = $this->Account->types;
		$this->set(compact('types'));
	}

	function admin_edit($id = null) {
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

	function admin_delete($id = null) {
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