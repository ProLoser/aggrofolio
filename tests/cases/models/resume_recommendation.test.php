<?php
/* ResumeRecommendation Test cases generated on: 2011-02-28 09:37:23 : 1298885843*/
App::import('Model', 'ResumeRecommendation');

class ResumeRecommendationTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_recommendation', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.albums_resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeRecommendation =& ClassRegistry::init('ResumeRecommendation');
	}

	function endTest() {
		unset($this->ResumeRecommendation);
		ClassRegistry::flush();
	}

}
?>