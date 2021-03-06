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

	var $hasMany = array(
		'Bookmark',
	);

	var $belongsTo = array(
		'User',
	);

}