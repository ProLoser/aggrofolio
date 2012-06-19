<?php
class MediaItemsController extends AppController {

	var $name = 'MediaItems';
	public $paginate = array();
	public $components = array(
		'Apis.Oauth' => array(
			'flickr',
			'vimeo',
		),
	);

	function album($albumId = null) {
		if (!$albumId) {
			$this->Session->setFlash(__('Invalid album'));
			$this->redirect('/');
		}
		$this->MediaItem->recursive = 0;
		$this->paginate['conditions']['album_id'] = $albumId;
		$this->paginate['limit'] = 12;
		$items = $this->paginate();
		$album = $this->MediaItem->Album->read(null, $albumId);
		$this->set(compact('items', 'album'));
	}

	function admin_index() {
		if ($this->viewClass === 'Json') {
			$this->viewClass = 'Webservice.Webservice';
			$this->set('mediaItems', $this->MediaItem->find('all'));
			return;
		}
		$this->MediaItem->recursive = 0;
		$this->set('mediaItems', $this->paginate());
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}

	function admin_scan($albumId = null) {
		if ($albumId) {
			$this->request->params['named']['album'] = $albumId;
		}
		if (empty($this->request->params['named']['account']) && empty($this->request->params['named']['album'])) {
			$this->Session->setFlash(__('Invalid album'));
			$this->redirect(array('action' => 'index'));
		}
		$album = $this->MediaItem->scan($this->request->params['named']);
		$this->Session->setFlash(__('Media Item(s) Scanned'));
		$this->redirect(array('controller' => 'accounts', 'action' => 'importer', $album['Account']['id']));
	}

	function admin_view($id = null) {
		$this->MediaItem->recursive = 1;
		if (!$id) {
			$this->Session->setFlash(__('Invalid media item'));
			$this->redirect(array('action' => 'index'));
		}
		$this->MediaItem->recursive = 1;
		$this->set('mediaItem', $this->MediaItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->MediaItem->create();
			$this->request->data['MediaItem']['user_id'] = $this->Auth->user('id');
			if ($this->MediaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The media item has been saved'));
				$this->redirect(array('action' => 'view', $this->MediaItem->id));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.'));
			}
		} elseif (isset($this->request->params['named']['project'])) {
			$this->request->data['MediaItem']['project_id'] = $this->request->params['named']['project'];
		}
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}

	function admin_batch() {
		if (!empty($this->request->data)) {
			foreach ($this->request->data['MediaItem']['attachment'] as $i => $item) {
				$this->request->data['MediaItem'][$i]['published'] = $this->request->data['MediaItem']['published'];
				$this->request->data['MediaItem'][$i]['album_id'] = $this->request->data['MediaItem']['album_id'];
				$this->request->data['MediaItem'][$i]['project_id'] = $this->request->data['MediaItem']['project_id'];
				$this->request->data['MediaItem'][$i]['attachment'] = $item;
			}
			unset($this->request->data['MediaItem']['published']);
			unset($this->request->data['MediaItem']['album_id']);
			unset($this->request->data['MediaItem']['project_id']);
			unset($this->request->data['MediaItem']['attachment']);
			if ($this->MediaItem->saveMany($this->request->data['MediaItem'])) {
				$this->Session->setFlash(__('The media item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.'));
				$this->request->data['MediaItem']['published']  = $this->request->data['MediaItem'][0]['published'];
				$this->request->data['MediaItem']['album_id']   = $this->request->data['MediaItem'][0]['album_id'];
				$this->request->data['MediaItem']['project_id'] = $this->request->data['MediaItem'][0]['project_id'];
			}
		} elseif (isset($this->request->params['named']['project'])) {
			$this->request->data['MediaItem']['project_id'] = $this->request->params['named']['project'];
		}
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects', 'count'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid media item'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->MediaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The media item has been saved'));
				$this->redirect(array('action' => 'view', $this->MediaItem->id));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->MediaItem->recursive = 1;
			$this->request->data = $this->MediaItem->read(null, $id);
		}
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for media item'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MediaItem->delete($id)) {
			$this->Session->setFlash(__('Media item deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Media item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_publish($id = null) {
		$this->MediaItem->publish($id);
		$this->redirect(array('controller' => 'accounts', 'action' => 'importer'));
	}
}
?>