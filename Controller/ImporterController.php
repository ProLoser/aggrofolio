<?php
class ImporterController extends AppController {

	var $name = 'Importer';
	var $components = array(
		'Apis.Oauth' => array(			
			'linkedin',
			'github',
			'flickr',
			'twitter',
		),
	);
	public $useModel = 'User';
	
	public function admin_index() {
		$projects = $this->User->Project->find('list');
		$works = $this->User->ResumeEmployer->find('list');
		$schools = $this->User->ResumeSchool->find('list');
		$mediaItems = $this->User->MediaItem->find('list');
		$posts = $this->User->Post->find('list');
		$accounts = $this->User->Account->find('list');
		$this->set(compact('projects','works','schools','mediaItems','posts', 'accounts'));
	}
}
?>