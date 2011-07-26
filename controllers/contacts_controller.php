<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $components = array('Email');
	
	function index() {
		if (!empty($this->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('Thank you for the email', true));
				$this->helpers[] = 'Text';
				$this->Email->reset();
				$this->Email->to = 'deansofer+aggropholio@gmail.com';
				$this->Email->from = $this->data['Contact']['email'];
				$this->Email->replyTo = $this->data['Contact']['email'];
				$this->Email->subject = 'Aggropholio: ' . $this->data['Contact']['subject'];
				$this->Email->template = 'contact';
				$this->Email->sendAs = 'text';
				$this->set('contact', $this->data);
				$this->Email->send();
			} else {
				$this->Session->setFlash(__('There was an error sending the email. Please, try again.', true));
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
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->recursive = 1;
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>