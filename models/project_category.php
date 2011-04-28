<?php
class ProjectCategory extends AppModel {
	var $name = 'ProjectCategory';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
			),
		),
	);

	var $hasMany = array(
		'Project',
	);
	
	var $actsAs = array(
		'Tree',
	);

}
?>