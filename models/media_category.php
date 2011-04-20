<?php
class MediaCategory extends AppModel {
	var $name = 'MediaCategory';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
	);
	
	var $behaviors = array(
		'Tree',
	);

	var $hasMany = array(
		'Album',
	);

}
?>