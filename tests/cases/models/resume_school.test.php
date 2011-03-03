<?php
/* ResumeSchool Test cases generated on: 2011-02-28 09:36:13 : 1298885773*/
App::import('Model', 'ResumeSchool');

class ResumeSchoolTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_school', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.albums_resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeSchool =& ClassRegistry::init('ResumeSchool');
	}

	function endTest() {
		unset($this->ResumeSchool);
		ClassRegistry::flush();
	}

}
?>