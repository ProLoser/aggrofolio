<?php
class MediaItemsController extends AppController {

	var $name = 'MediaItems';

	function album($albumId = null) {
		if (!$albumId) {
			$this->Session->setFlash(__('Invalid album', true));
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
		$this->MediaItem->recursive = 0;
		$this->set('mediaItems', $this->paginate());
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}
	
	function admin_scan($albumId = null) {
		if (!$albumId) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		$count = $this->MediaItem->scan($albumId);
		$this->Session->setFlash(__($count . ' Media Item(s) Scanned', true));
		$this->redirect(array('action' => 'index'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid media item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mediaItem', $this->MediaItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->MediaItem->create();
			if ($this->MediaItem->save($this->data)) {
				$this->Session->setFlash(__('The media item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.', true));
			}
		} elseif (isset($this->params['named']['project'])) {
			$this->data['MediaItem']['project_id'] = $this->params['named']['project'];
		}
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid media item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MediaItem->save($this->data)) {
				$this->Session->setFlash(__('The media item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->MediaItem->recursive = 1;
			$this->data = $this->MediaItem->read(null, $id);
		}
		$albums = $this->MediaItem->Album->find('list');
		$projects = $this->MediaItem->Project->find('list');
		$this->set(compact('albums', 'projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for media item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MediaItem->delete($id)) {
			$this->Session->setFlash(__('Media item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Media item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>