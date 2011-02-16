<?php
class MediaItemsController extends AppController {

	var $name = 'MediaItems';

	function index() {
		$this->MediaItem->recursive = 0;
		$this->set('mediaItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid media item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mediaItem', $this->MediaItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MediaItem->create();
			if ($this->MediaItem->save($this->data)) {
				$this->Session->setFlash(__('The media item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media item could not be saved. Please, try again.', true));
			}
		}
		$albums = $this->MediaItem->Album->find('list');
		$this->set(compact('albums'));
	}

	function edit($id = null) {
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
			$this->data = $this->MediaItem->read(null, $id);
		}
		$albums = $this->MediaItem->Album->find('list');
		$this->set(compact('albums'));
	}

	function delete($id = null) {
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