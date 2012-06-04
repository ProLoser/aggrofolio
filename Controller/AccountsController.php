<?php
class AccountsController extends AppController {

	public $name = 'Accounts';
	public $components = array(
		'Apis.Oauth' => array(
			'linkedin',
			'github',
			'flickr',
			'twitter',
		),
	);
	public $paginate = array();

	protected function _setTheme() {
		parent::_setTheme();
		if ($this->action === 'admin_importer') {
			$this->theme = 'Timeline';
		}
	}

	public function admin_reset() {
		$this->Session->delete('OAuth');
		$this->Plate->flash('OAuth Session Reset');
	}

	public function admin_connect($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Account'));
			$this->redirect(array('action' => 'index'));
		}
		if (is_numeric($id)) {
			$type = $this->Account->field('type', array('Account.id' => $id));
		} else {
			$type = $id;
		}

		$this->Oauth->useDbConfig = $type;

		$this->Oauth->connect(array('action' => 'index'), array('action' => 'callback', $type));
	}

	public function admin_test()
	{
		$this->Account->setDbConfig('flickr');
		$data = $this->Account->find('all', array('fields' => 'people'));
		diebug($data);
	}

	public function admin_callback($useDbConfig = null) {
		$this->Oauth->useDbConfig = $useDbConfig;
		$tokens = $this->Oauth->callback();
		if ($this->Account->setup($useDbConfig, $tokens)) {
			$this->redirect(array('action' => 'scan', $this->Account->id));
		} else {
			$this->Session->setFlash('There was an error');
			$this->redirect(array('action' => 'importer'));
		}
	}

	public function admin_scan($id = null) {
		if ($this->Account->scan($id)) {
			$this->Session->setFlash('Account was imported properly');
		} else {
			$this->Session->setFlash('There was an error importing the account. Please try again.');
		}
		$this->redirect(array('action' => 'importer', $id));
	}

	public function admin_importer($id = null) {
		$projects = $this->Account->Project->find('list');
		$works = $this->Account->ResumeEmployer->find('list');
		$schools = $this->Account->ResumeSchool->find('list');
		$mediaItems = $this->Account->MediaItem->find('list');
		$albums = $this->Account->Album->find('list');
		$posts = $this->Account->Post->find('list');
		$accounts = $this->Account->find('all');
		$accountTypes = $this->Account->types;
		$account = array();
		if (!empty($this->request->data)) {
			if ($this->Account->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The changes has been saved'));
			} else {
				$this->Session->setFlash(__('Changes could not be saved. Please, try again.'));
			}
		} elseif ($id) {
			$this->request->data = $this->Account->find('timeline', array('conditions' => $id));
		}
		$this->set(compact('projects', 'works', 'schools', 'mediaItems', 'albums', 'posts', 'account', 'accounts', 'accountTypes'));
	}

	public function admin_index() {
		$this->Account->recursive = 0;
		$accounts = $this->paginate();
		$types = $this->Account->types;
		$this->set(compact('accounts', 'types'));
	}

	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid account'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Account->recursive = 1;
		$this->set('account', $this->Account->read(null, $id));
	}

	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->Account->create();
			$this->request->data['Account']['user_id'] = $this->Auth->user('id');
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

	public function admin_edit($id = null) {
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

	public function admin_delete($id = null) {
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