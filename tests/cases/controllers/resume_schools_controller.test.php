<?php
/* ResumeSchools Test cases generated on: 2011-02-28 09:36:14 : 1298885774*/
App::import('Controller', 'ResumeSchools');

class TestResumeSchoolsController extends ResumeSchoolsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumeSchoolsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.resume_school', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_schools_resume', 'app.resume_skill', 'app.resume_skills_resume', 'app.resume_employer', 'app.albums_resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeSchools =& new TestResumeSchoolsController();
		$this->ResumeSchools->constructClasses();
	}

	function endTest() {
		unset($this->ResumeSchools);
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