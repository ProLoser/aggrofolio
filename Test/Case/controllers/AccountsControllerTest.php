<?php
/* Accounts Test cases generated on: 2011-02-15 11:33:39 : 1297769619*/
App::import('Controller', 'Accounts');

class TestAccountsController extends AccountsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AccountsControllerTest extends CakeTestCase {
	var $fixtures = array('app.account');

	function startTest() {
		$this->Accounts =& new TestAccountsController();
		$this->Accounts->constructClasses();
	}

	function endTest() {
		unset($this->Accounts);
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