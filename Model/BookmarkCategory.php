<?php
class BookmarkCategory extends AppModel {
	var $name = 'BookmarkCategory';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
	);
	
	var $actsAs = array(
		'Tree',
	);

	var $hasMany = array(
		'Bookmark',
	);

}