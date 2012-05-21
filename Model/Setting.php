<?php
class Setting extends AppModel {
	public $name = 'Setting';
	
	var $belongsTo = array(
		'User',
	);

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct();
		$this->validate = array(
			'key' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('cannot be left empty', true)
				),
			),
			'title' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('cannot be left empty', true)
				),
			),
			'description' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('cannot be left empty', true)
				),
			),
			'input_type' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => __('cannot be left empty', true)
				),
			),
		);
	}
}
?>