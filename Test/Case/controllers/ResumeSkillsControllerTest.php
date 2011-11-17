<?php
/* ResumeSkills Test cases generated on: 2011-02-28 09:35:42 : 1298885742*/
App::import('Controller', 'ResumeSkills');

class TestResumeSkillsController extends ResumeSkillsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ResumeSkillsControllerTest extends CakeTestCase {
	var $fixtures = array('app.resume_skill', 'app.account', 'app.project', 'app.user', 'app.album', 'app.media_item', 'app.resume', 'app.resume_recommendation', 'app.resume_recommendations_resume', 'app.resume_school', 'app.resume_schools_resume', 'app.resume_skills_resume', 'app.resume_employer', 'app.resume_employers_resume');

	function startTest() {
		$this->ResumeSkills =& new TestResumeSkillsController();
		$this->ResumeSkills->constructClasses();
	}

	function endTest() {
		unset($this->ResumeSkills);
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