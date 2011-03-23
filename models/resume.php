<?php
class Resume extends AppModel {
	var $name = 'Resume';
	var $validate = array(
		'purpose' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
			),
		),
		'visible' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Your custom message here',
			),
		),
	);

	var $belongsTo = array(
		'Account',
	);

	var $hasAndBelongsToMany = array(
		'ResumeRecommendation',
		'ResumeSchool',
		'ResumeSkill',
		'ResumeEmployer',
	);
	
	public function scanLinkedin($data, $accountId = null) {
		$date = array('day' => 1, 'month' => 1, 'year' => null);
		
		foreach ($data['skills']['values'] as $i => $skill) {
			$skills[$i]['uuid'] = $skill['id'];
			$skills[$i]['name'] = $skill['skill']['name'];
			$skills[$i]['years'] = $skill['years']['name'];
			$skills[$i]['proficiency'] = $skill['proficiency']['name'];
			$skills[$i]['account_id'] = $accountId;
		}
		if (!empty($skills)) {
			$this->ResumeSkill->saveAll($skills);
		}
		
		foreach ($data['positions']['values'] as $i => $employer) {
			if (isset($employer['company']['id'])) 
				$employers[$i]['uuid'] = $employer['company']['id'];
			$employers[$i]['name'] = $employer['company']['name'];
			$employers[$i]['title'] = $employer['title'];
			$employers[$i]['summary'] = $employer['summary'];
			$employers[$i]['currently_employed'] = $employer['isCurrent'];
			if (isset($employer['startDate']))
				$employers[$i]['date_started'] = array_merge($date, $employer['startDate']);
			if (isset($employer['endDate']))
				$employers[$i]['date_ended'] = array_merge($date, $employer['endDate']);
			$employers[$i]['account_id'] = $accountId;
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
			if (isset($school['startDate']))
				$schools[$i]['date_started'] = array_merge($date, $school['startDate']);
			if (isset($school['endDate']))
				$schools[$i]['date_ended'] = array_merge($date, $school['endDate']);
			$schools[$i]['account_id'] = $accountId;
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
			$recommendations[$i]['account_id'] = $accountId;
		}
		if (!empty($recommendations)) {
			$this->ResumeRecommendation->saveAll($recommendations);
		}
		
		$resume['summary'] = $data['summary'];
		$resume['specialties'] = $data['specialties'];
		$resume['associations'] = $data['associations'];
		$resume['honors'] = $data['honors'];
		$resume['interests'] = $data['interests'];
		$resume['first_name'] = $data['firstName'];
		$resume['last_name'] = $data['lastName'];
		if (!empty($resume)) {
			$this->save(array('Resume' => $resume));
		}
	}

}
?>