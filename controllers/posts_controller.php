<?php
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array('Time');
	
	function index() {
		if (isset($this->params['named']['category']))
			$this->paginate['conditions']['Post.post_category_id'] = $this->params['named']['category'];
		$this->paginate['contain'] = array('PostCategory');
		$posts = $this->paginate();
		$categories = $this->Post->PostCategory->find('threaded');
		$this->set(compact('posts', 'categories'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Post->recursive = 1;
		$this->set('post', $this->Post->read(null, $id));
	}

	function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}
	
	function _setRelated() {
		$models = $this->Post->PostRelationship->belongsTo;
		unset($models['Post']);
		$models = array_keys($models);
		
		foreach ($models as $model) {
			$data = $this->Post->PostRelationship->{$model}->find('list');
			$this->set(Inflector::variable(Inflector::tableize($model)), $data);
			$foreignModels[$model] = Inflector::humanize(Inflector::underscore($model));
		}
		$this->set(compact('foreignModels'));
	}
	
	function admin_related($model = null) {
		if (empty($model))
			die;
		$this->view = 'Webservice.Webservice';
		$this->set('items', $this->Post->PostRelationship->{$model}->find('list'));
	}
	
	function admin_delete_related($id = null, $postId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post relationship', true));
			$this->redirect(array('action'=>'edit', $postId));
		}
		if ($this->Post->PostRelationship->delete($id)) {
			$this->Session->setFlash(__('Post Relationship deleted', true));
			$this->redirect(array('action'=>'edit', $postId));
		}
		$this->Session->setFlash(__('Post Relationship was not deleted', true));
		$this->redirect(array('action' => 'edit', $postId));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->saveAll($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		$this->_setRelated();
		$this->set('postCategories', $this->Post->PostCategory->generateTreeList(null, null, null, '- '));
		
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->saveAll($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->Post->recursive = 1;
			$this->data = $this->Post->read(null, $id);
		}
		$this->_setRelated();
		$this->set('postCategories', $this->Post->PostCategory->generateTreeList(null, null, null, '- '));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>