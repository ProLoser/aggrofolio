<?php
class Resume extends AppModel {
	public $name = 'Resume';
	public $displayField = 'purpose';
	public $validate = array(
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

	public $belongsTo = array(
		'Account',
	);
	
	public $hasMany = array(
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'Resume'),
		),
		'ResumeItem',
	);

	public $hasAndBelongsToMany = array(
		'ResumeRecommendation',
		'ResumeSchool',
		'ResumeSkill',
		'ResumeEmployer',
	);
	
	public $actsAs = array(
		'Activity',
		'Joinable.Joinable',
		'UploadPack.Upload' => array(
			'attachment' => array(
				'path' => ':webroot/resumes/:basename.:extension',
			),
		),
	);
	
	/**
	 * Prepared find for resume rendering
	 *
	 * @param string $id 
	 * @return void
	 * @author Dean Sofer
	 */
	public function render($id = null) {
		$conditions = array();
		if ($id) {
			$conditions['Resume.id'] = $id;
		}
		return $this->find('first', array(
			'conditions' => $conditions,
			'contain' => array(
				'Account',
				'PostRelationship',
				'ResumeRecommendation',
				'ResumeSchool' => array(
					'Project' => array(
						'conditions' => array('Project.published' => true),
						'MediaItem' => array(
							'conditions' => array('MediaItem.published' => true),
							'limit' => 2,
						),
					),
				),
				'ResumeSkill' => array(
					'order' => array('resume_skill_category_id', 'proficiency ASC', 'years DESC'),
					'ResumeSkillCategory',
				),
				'ResumeEmployer' => array(
					'Project' => array(
						'conditions' => array('Project.published' => true),
						'MediaItem' => array(
							'conditions' => array('MediaItem.published' => true),
							'limit' => 2,
						),
					),
				),
			),
		));
	}
	
	
	public function scanLinkedin($account) {
		$this->useDbConfig = 'linkedin';
		$data = $this->find('all', array(
			'path' => 'people/~',
			'fields' => array(
				'first-name', 'last-name', 'summary', 'specialties', 'associations', 'honors', 'interests', 'twitter-accounts', 
				'positions' => array('title', 'summary', 'start-date', 'end-date', 'is-current', 'company'), 
				'educations', 
				'certifications',
				'skills' => array('id', 'skill', 'proficiency', 'years'), 
				'recommendations-received',
			),
		));
		$this->useDbConfig = 'default';
		
		if (!$data) {
			return false;
		}
		
		$date = array('day' => 1, 'month' => 1, 'year' => null);
		foreach ($data['skills']['values'] as $i => $skill) {
			$skills[$i]['ResumeSkill']['uuid'] = $skill['id'];
			$skills[$i]['ResumeSkill']['name'] = $skill['skill']['name'];
			$skills[$i]['ResumeSkill']['years'] = $skill['years']['name'];
			$skills[$i]['ResumeSkill']['proficiency'] = $skill['proficiency']['name'];
			$skills[$i]['ResumeSkill']['account_id'] = $account['Account']['id'];
		}
		if (!empty($skills)) {
			$resume['ResumeSkill']['ResumeSkill'] = $this->saveAllIds($this->ResumeSkill, $skills);
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
			$employers[$i]['account_id'] = $account['Account']['id'];
		}
		if (!empty($employers)) {
			$resume['ResumeEmployer']['ResumeEmployer'] = $this->saveAllIds($this->ResumeEmployer, $employers);
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
			$schools[$i]['account_id'] = $account['Account']['id'];
		}
		if (!empty($schools)) {
			$resume['ResumeSchool']['ResumeSchool'] = $this->saveAllIds($this->ResumeSchool, $schools);
		}
		
		
		foreach ($data['recommendationsReceived']['values'] as $i => $recommendation) {
			$recommendations[$i]['uuid'] = $recommendation['id'];
			$recommendations[$i]['type'] = $recommendation['recommendationType']['code'];
			$recommendations[$i]['first_name'] = $recommendation['recommender']['firstName'];
			$recommendations[$i]['last_name'] = $recommendation['recommender']['lastName'];
			$recommendations[$i]['recommendor_uuid'] = $recommendation['recommender']['id'];
			$recommendations[$i]['text'] = $recommendation['recommendationText'];
			$recommendations[$i]['account_id'] = $account['Account']['id'];
		}
		if (!empty($recommendations)) {
			$resume['ResumeRecommendation']['ResumeRecommendation'] = $this->saveAllIds($this->ResumeRecommendation, $recommendations);
		}
		
		$resume['Resume']['summary'] = $data['summary'];
		$resume['Resume']['specialties'] = $data['specialties'];
		$resume['Resume']['associations'] = $data['associations'];
		$resume['Resume']['honors'] = $data['honors'];
		$resume['Resume']['interests'] = $data['interests'];
		$resume['Resume']['first_name'] = $data['firstName'];
		$resume['Resume']['last_name'] = $data['lastName'];
		
		if (!empty($resume)) {
			$this->save($resume);
		}
		
		return $data;
	}
	
	/**
	 * Saves multiple rows of the same model (like saveAll()) and returns the collection of insertIds
	 * Must 
	 *
	 * @param object $Model 
	 * @param array $data 
	 * @return array collection of insertIds
	 * @author Dean Sofer
	 */
	public function saveAllIds($Model, $data) {
		$ids = array();
		foreach ($data as $row) {
			$Model->create();
			$Model->save($row);
			$ids[] = $Model->id;
		}
		return $ids;
	}

}
?>