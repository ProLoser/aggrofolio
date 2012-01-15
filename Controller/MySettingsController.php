<?php
class MySettingsController extends AppController{
	var $name = 'MySettings';
	var $uses = array('Settings.Setting');

	function admin_index() {
		if (!empty($this->request->data)) {
			if ($this->Setting->saveAll($this->request->data['Setting'], array('validate' => 'first'))) {
				$this->Session->setFlash(__('The settings has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The settings could not be saved', true));
			}
		}
		$this->request->data = $this->Setting->find('all');
	}
}
?>