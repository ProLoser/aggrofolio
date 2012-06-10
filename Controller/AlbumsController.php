<?php
class AlbumsController extends AppController {

	public $name = 'Albums';
	public $paginate = array();
	public $components = array(
		'Apis.Oauth' => array(
			'flickr',
			'vimeo',
		),
	);

	function index() {
		$this->paginate['conditions']['Album.published'] = true;
		$this->paginate['contain']['MediaItem']['limit'] = 1;
		$this->paginate['limit'] = 50;
		$albums = $this->paginate();
		$categories = $this->Album->MediaCategory->find('threaded');
		$this->set(compact('albums', 'categories'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Album->recursive = 1;
		$this->set('album', $this->Album->read(null, $id));
	}

	function admin_index() {
		$this->Album->recursive = 0;
		$albums = $this->paginate();
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$this->set(compact('albums', 'accounts', 'mediaCategories'));
	}

	function admin_scan($accountId = null) {
		$count = $this->Album->scan($accountId);
		$this->Session->setFlash(__($count . ' Album(s) scanned'));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Album->recursive = 1;
		$this->set('album', $this->Album->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Album->create();
			$this->request->data['Album']['user_id'] = $this->Auth->user('id');
			if ($this->Album->save($this->request->data)) {
				$this->Session->setFlash(__('The album has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$projects = $this->Album->Project->find('list');
		$this->set(compact('accounts', 'mediaCategories', 'projects'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid album'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Album->save($this->request->data)) {
				$this->Session->setFlash(__('The album has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Album->read(null, $id);
		}
		$accounts = $this->Album->Account->find('list');
		$mediaCategories = $this->Album->MediaCategory->find('list');
		$projects = $this->Album->Project->find('list');
		$this->set(compact('accounts', 'mediaCategories', 'projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for album'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->delete($id)) {
			$this->Session->setFlash(__('Album deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Album was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>