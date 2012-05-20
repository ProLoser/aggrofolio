<?php
class PostCategory extends AppModel {
	var $name = 'PostCategory';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a valid name',
			),
		),
	);

	var $hasMany = array(
		'Post',
	);
	
	var $belongsTo = array(
		'User',
	);
	
	public function quickMatch() {
		$data = Cache::read('quickmatch');
		if (!$data) {
			$data = $this->find('list');
			$data = array_flip(array_map('strtoupper', $data));
			Cache::write('quickmatch', $data);
		}
		return $data;
	}
}