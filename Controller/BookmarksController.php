<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';

	var $components = array(
		'Apis.Oauth' => array(	
			'twitter',
		),
	);
	public $paginate = array();
	
	public function index() {
		$bookmarks = $this->Bookmark->BookmarkCategory->find('threaded', array(
			'contain' => array('Bookmark'),
		));
		$this->set(compact('bookmarks'));
	}
	
	function admin_index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('bookmarkCategories'));
	}
	
	function admin_scan($accountId) {
		$count = $this->Bookmark->scan($accountId);
		$this->Session->setFlash(__($count . ' bookmarks scanned'));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bookmark'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Bookmark->recursive = 1;
		$this->set('bookmark', $this->Bookmark->read(null, $id));
	}

	function admin_add() {
		// http://localhost/aggropholio/admin/bookmarks/add/testing/thisis%20awesome/http://example.com
		
		if (!empty($this->request->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->request->data)) {
				if (isset($this->request->params['named']['url'])) {
					die('<center><h1>Bookmark Saved</h1></center><script>self.resizeTo(400,100);setTimeout(self.close, 2000)</script>');
				} else {
					$this->Session->setFlash(__('The bookmark has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		} elseif (isset($this->request->params['named']['url']) && empty($this->request->data)) {
			// If Bookmarklet
			$this->request->data['Bookmark'] = $this->request->params['named'];
			$this->request->data['Bookmark']['url'] = str_replace(array('@s@','@c@','@h@','@q@'), array('/',':','#','?'), $this->request->data['Bookmark']['url']);
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
		if (isset($this->request->params['named']['url'])) {
			$this->set('title_for_layout', 'Add Bookmark');
			$this->layout = 'bookmarklet';
			$this->render('bookmarklet');
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid bookmark'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Bookmark->read(null, $id);
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->find('list');
		$this->set(compact('accounts', 'bookmarkCategories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bookmark'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bookmark->delete($id)) {
			$this->Session->setFlash(__('Bookmark deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>