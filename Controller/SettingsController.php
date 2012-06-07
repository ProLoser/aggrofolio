<?php
class SettingsController extends AppController{
	var $name = 'Settings';

	function admin_index() {
		if (!empty($this->request->data)) {
			if ($this->Setting->saveAssociated($this->request->data, array('validate' => 'first'))) {
				$this->Session->setFlash(__('The settings has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The settings could not be saved', true));
			}
		}
		$this->request->data = $this->Setting->find('first', array(
			'contain' => array('User')
		));
	}

	function asset($key) {
		$this->layout = 'ajax';
		$setting = $this->Setting->cache('first', array('conditions' => array('Setting.user_id' => Configure::read('owner'))));
		if (!$setting) {
			throw new NotFoundException();
		}
		$this->RequestHandler->respondAs($key);
		$this->set('setting', $setting['Setting'][$key]);
	}
}
?>