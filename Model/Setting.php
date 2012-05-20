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
	
	public function afterSave() {
		$this->refreshCache('site_name');
		$this->refreshCache('google_analytics');
	}
	public function afterDelete() {
		$this->refreshCache('site_name');
		$this->refreshCache('google_analytics');
	}
	public function refreshCache($key) {
		$setting = $this->field($key, array('user_id' => $this->userId()));
		Cache::write($key, $setting);
	}
}
?>