<?php
/* ResumeEmployer Test cases generated on: 2011-02-28 09:35:59 : 1298885759*/
App::import('Model', 'ResumeEmployer');

class ResumeEmployerTest extends CakeTestCase {
	var $fixtures = array('app.resume_employer', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employers_resume', 'app.albums_resume_employer');

	function startTest() {
		$this->ResumeEmployer =& ClassRegistry::init('ResumeEmployer');
	}

	function endTest() {
		unset($this->ResumeEmployer);
		ClassRegistry::flush();
	}

}
?>