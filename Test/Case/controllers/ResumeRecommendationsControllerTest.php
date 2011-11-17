<?php
/* ResumeRecommendations Test cases generated on: 2011-02-28 09:37:24 : 1298885844*/
App::import('Controller', 'ResumeRecommendations');

class TestResumeRecommendationsController extends ResumeRecommendationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumeRecommendationsControllerTest extends CakeTestCase {
	var $fixtures = array('app.resume_recommendation', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.albums_resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeRecommendations =& new TestResumeRecommendationsController();
		$this->ResumeRecommendations->constructClasses();
	}

	function endTest() {
		unset($this->ResumeRecommendations);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>