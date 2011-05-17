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


	var $actsAs = array(
		'Tree',
	);
}