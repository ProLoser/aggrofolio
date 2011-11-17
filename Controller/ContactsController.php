<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $components = array('Email');
	public $paginate = array();
	
	function index() {
		if (!empty($this->request->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('Thank you for the email'));
				$this->helpers[] = 'Text';
				$this->Email->reset();
				$this->Email->to = 'deansofer+aggropholio@gmail.com';
				$this->Email->from = $this->request->data['Contact']['email'];
				$this->Email->replyTo = $this->request->data['Contact']['email'];
				$this->Email->subject = 'Aggropholio: ' . $this->request->data['Contact']['subject'];
				$this->Email->template = 'contact';
				$this->Email->sendAs = 'text';
				$this->set('contact', $this->request->data);
				$this->Email->send();
			} else {
				$this->Session->setFlash(__('There was an error sending the email. Please, try again.'));
			}
		}
	}

	function admin_index() {
		$this->Contact->recursive = 0;
		$contacts = $this->paginate();
		$this->set(compact('contacts'));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contact'));
			$this->redirect(array('action' => 'index'));
		}
		$this->recursive = 1;
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid contact'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Contact->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>