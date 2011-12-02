<?php
class BookmarksController extends AppController {

	var $name = 'Bookmarks';
	public $paginate = array();
	
	public function index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}
	
	function admin_index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
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
		$this->set('bookmark', $this->Bookmark->read(null, $id));
	}

	function admin_add($bookmarklet = false) {
		//javascript:var a=document.title,b=document.location.href,c=document.getElementsByTagName('meta'),d='',x,y;for(x=0,y=c.length;x<y;x++){if(c[x].name.toLowerCase()=="description"){d=c[x];}}window.open("http://localhost/aggropholio/admin/bookmarks/add/bookmarklet/name:"+a+"/url:"+encodeURIComponent(b)+"/description:"+d,"New Bookmark",'width=400,height=370,location=no,directories=no,status=no,menubar=no,copyhistory=no,');
		if ($bookmarklet) {
			$this->layout = 'bookmarklet';
		}
		if (!empty($this->request->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data['Bookmark'] = $this->request->params['named'];
			unset($this->request->data['Bookmark']['id']);
		}
		$accounts = $this->Bookmark->Account->find('list');
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->generateTreeList(null, null, null, '- ');
		$this->set(compact('accounts', 'bookmarkCategories'));
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
		$bookmarkCategories = $this->Bookmark->BookmarkCategory->generateTreeList(null, null, null, '- ');
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