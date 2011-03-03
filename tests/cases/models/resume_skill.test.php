<?php
/* ResumeSkill Test cases generated on: 2011-02-28 09:35:40 : 1298885740*/
App::import('Model', 'ResumeSkill');

class ResumeSkillTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_skill', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skills_resume', 'app.resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeSkill =& ClassRegistry::init('ResumeSkill');
	}

	function endTest() {
		unset($this->ResumeSkill);
		ClassRegistry::flush();
	}

}
?>