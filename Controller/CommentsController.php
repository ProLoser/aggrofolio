<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	public $paginate = array();

	function add($model = null, $id = null) {
		if ((!$id || !$model) && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid item'));
			$this->redirect('/');
		}
		if (!empty($this->request->data)) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));
				$this->redirect(array('controller' => Inflector::tableize($this->request->data['Comment']['foreign_model']), 'action' => 'view', $this->request->data['Comment']['foreign_key']));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data['Comment'] = array(
				'foreign_model' => $model,
				'foreign_key' => $id,
				'name' => $this->Session->read('Auth.User.name'),
				'email' => $this->Session->read('Auth.User.email'),
				'user_id' => $this->Session->read('Auth.User.id'),
			);
		}
		$data = $this->Comment->{$this->request->data['Comment']['foreign_model']}->read(null, $this->request->data['Comment']['foreign_key']);
	}

	function admin_index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid comment'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Comment->recursive = 1;
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid comment'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Comment->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for comment'));
			$this->redirect($this->referer(array('action'=>'index'), true));
		}
		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('Comment deleted'));
			$this->redirect($this->referer(array('action'=>'index'), true));
		}
		$this->Session->setFlash(__('Comment was not deleted'));
		$this->redirect($this->referer(array('action'=>'index'), true));
	}
}
?>