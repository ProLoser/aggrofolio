<?php
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array('Text');
	public $paginate = array();

	function index() {
		if (isset($this->request->params['named']['category']))
			$this->paginate['conditions']['Post.post_category_id'] = $this->request->params['named']['category'];
		$this->paginate['contain'] = array('PostCategory');
		$posts = $this->paginate();
		$categories = $this->Post->PostCategory->find('threaded');
		$this->set(compact('posts', 'categories'));
	}

	function view($id = null, $slug = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post'));
			$this->redirect(array('action' => 'index'));
		}
		$post = $this->Post->find('first', array('conditions' => array('Post.id' => $id), 'contain' => array(
			'PostRelationship' => array(
				'order' => 'PostRelationship.foreign_model',
				'Project' => array('ProjectCategory'),
				'Album' => array('MediaCategory'),
				'MediaItem',
				'Bookmark' => array('BookmarkCategory'),
				'Resume',
				'ResumeEmployer',
				'ResumeSchool',
			),
			'Comment',
			'PostCategory',
			'Account',
		)));
		if ($slug != $post['Post']['slug']) {
			$this->redirect(array($id, $post['Post']['slug']));
		}
		$this->set('post', $post);

		$this->Comment;
		$this->request->data['Comment'] = array(
			'foreign_model' => 'Post',
			'foreign_key' => $post['Post']['id'],
			'name' => $this->Session->read('Auth.User.name'),
			'email' => $this->Session->read('Auth.User.email'),
			'user_id' => $this->Session->read('Auth.User.id'),
		);
	}

	function admin_index() {
		if ($this->viewClass === 'Json') {
			$this->viewClass = 'Webservice.Webservice';
			$this->set('posts', $this->Post->find('all'));
			return;
		}
		$this->Post->recursive = 0;
		$posts = $this->paginate();
		$postCategories = $this->Post->PostCategory->find('list');
		$this->set(compact('posts', 'postCategories'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Post->recursive = 1;
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
		$this->viewClass = 'Webservice.Webservice';
		$this->set('items', $this->Post->PostRelationship->{$model}->find('list', array(
			'conditions' => array('published' => true),
			'order' => 'name',
		)));

	}

	function admin_delete_related($id = null, $postId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post relationship'));
			$this->redirect(array('action'=>'edit', $postId));
		}
		if ($this->Post->PostRelationship->delete($id)) {
			$this->Session->setFlash(__('Post Relationship deleted'));
			$this->redirect(array('action'=>'edit', $postId));
		}
		$this->Session->setFlash(__('Post Relationship was not deleted'));
		$this->redirect(array('action' => 'edit', $postId));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Post->create();
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Post->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'view', $this->Post->id));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$this->_setRelated();
		$this->set('postCategories', $this->Post->PostCategory->find('list'));

	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid post'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Post->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'view', $this->Post->id));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->Post->recursive = 1;
			$this->request->data = $this->Post->read(null, $id);
		}
		$this->_setRelated();
		$this->set('postCategories', $this->Post->PostCategory->find('list'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_publish($id = null) {
		$this->Post->publish($id);
		$this->redirect(array('controller' => 'accounts', 'action' => 'importer'));
	}
}