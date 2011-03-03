<?php
class Resume extends AppModel {
	var $name = 'Resume';
	var $validate = array(
		'purpose' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'visible' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'ResumeRecommendation',
		'ResumeSchool',
		'ResumeSkill',
		'ResumeEmployer',
	);
	
	public function scanLinkedin($data, $accountId = null) {
		foreach ($data['skills']['values'] as $i => $skill) {
			$skills[$i]['uuid'] = $skill['id'];
			$skills[$i]['skill'] = $skill['skill']['name'];
		}
		if (!empty($skills)) {
			$this->ResumeSkill->saveAll($skills);
		}
		foreach ($data['positions']['values'] as $i => $employer) {
			if (isset($employer['company']['id'])) $employers[$i]['uuid'] = $employer['company']['id'];
			$employers[$i]['name'] = $employer['company']['name'];
		}
		if (!empty($employers)) {
			$this->ResumeEmployer->saveAll($employers);
		}
		foreach ($data['educations']['values'] as $i => $school) {
			if (isset($school['id'])) $schools[$i]['uuid'] = $school['id'];
			$schools[$i]['field_of_study'] = $school['fieldOfStudy'];
			$schools[$i]['name'] = $school['schoolName'];
			$schools[$i]['activities'] = $school['activities'];
			$schools[$i]['notes'] = $school['notes'];
			$schools[$i]['degree'] = $school['degree'];
		}
		if (!empty($schools)) {
			$this->ResumeSchool->saveAll($schools);
		}
		foreach ($data['recommendationsReceived']['values'] as $i => $recommendation) {
			$recommendations[$i]['uuid'] = $recommendation['id'];
			$recommendations[$i]['type'] = $recommendation['recommendationType']['code'];
			$recommendations[$i]['first_name'] = $recommendation['recommender']['firstName'];
			$recommendations[$i]['last_name'] = $recommendation['recommender']['lastName'];
			$recommendations[$i]['recommendor_uuid'] = $recommendation['recommender']['id'];
			$recommendations[$i]['text'] = $recommendation['recommendationText'];
		}
		if (!empty($recommendations)) {
			$this->ResumeRecommendation->saveAll($recommendations);
		}
		$resume['summary'] = $data['summary'];
		$resume['specialties'] = $data['specialties'];
		$resume['associations'] = $data['associations'];
		$resume['honors'] = $data['honors'];
		$resume['interests'] = $data['interests'];
		$resume['first_name'] = $data['first-name'];
		$resume['last_name'] = $data['last-name'];
		if (!empty($resume)) {
			$this->save(array('Resume' => $resume));
		}
	}

}
?>