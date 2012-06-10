<?php
class SettingsController extends AppController{
	var $name = 'Settings';

	/**
	 * Serves up the db-driven CSS and JS assets for a website
	 */
	function asset($key = null) {
		$setting = $this->Setting->cache('first', array('conditions' => array('Setting.user_id' => Configure::read('owner'))));
		if (!$setting || !isset($setting['Setting'][$key])) {
			throw new NotFoundException();
		}
		$this->layout = 'ajax';
		$this->RequestHandler->respondAs($key);
		$this->set('setting', $setting['Setting'][$key]);
	}

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
}
?>