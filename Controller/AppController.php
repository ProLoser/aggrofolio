<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

	var $helpers = array(
		'Session',
		'Time',
		'BakingPlate.Plate',
		'Agro',
		'Html' => array('className' => 'BakingPlate.HtmlPlus'),
		'Form' => array('className' => 'BakingPlate.FormPlus'),
		'Paginator' => array('className' => 'BakingPlate.PaginatorPlus'),
	);
	var $components = array(
		'Session',
		'RequestHandler',
		'Batch.Batch' => array(
			'actions' => array('admin_index', 'manager_index'),
		),
		'BakingPlate.Plate',
		/* Auth Configuration */
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'password',
					),
				),
			),
			'loginAction' => array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'login'),
			'logoutRedirect' => array('action' => 'login'),
			'loginRedirect' => '/',
		),/**/
		'RememberMe.RememberMe',
		'Webservice.Webservice',
	);
	var $attributesForLayout = array(
		'id' => 'home',
		'class' => 'home',
	);
	var $descriptionForLayout = '';
	var $keywordsForLayout = '';

/**
 * $_GET keyword to force debug mode. Set to false or delete to disable.
 *
 * @var string
 */
	var $debugOverride = 'debug';

/**
 * Used to set a max for the pagination limit
 *
 * @var int
 */
    var $paginationMaxLimit = 25;

/**
 * This allows the enabling of debug mode even if debug is set to off.
 * Simply pass ?debug=1 in the url
 */
	public function __construct($request = null, $response = null) {
		if (!empty($this->debugOverride) && !empty($_GET[$this->debugOverride])) {
			Configure::write('debug', 2);
		}
		if (Configure::read('debug')) {
			// TODO: add interactive for debugkit or not
			$this->components[] = 'DebugKit.Toolbar';
			App::uses('FireCake', 'DebugKit.Lib');
		}
		parent::__construct($request, $response);
	}

	public function beforeFilter() {
		$this->_setOwner();
		$this->_setAuth();
		if (
			(Configure::read('owner') && ($this->Plate->prefix('manager') || (isset($this->main) && in_array($this->action, $this->main))))
			|| (!Configure::read('owner') && ($this->Plate->prefix('admin') || !$this->Plate->prefix('manager') && (!isset($this->main) || !in_array($this->action, $this->main))))
		) {
			if (!isset($this->both) || !in_array($this->action, $this->both)) {
				throw new NotFoundException();
			}
		}
		// $this->_setLanguage();
		// $this->_setMaintenance();
	}

	public function afterFilter() {
		$this->_rememberMember();
	}

/**
 * Changes the layout of the page if the prefix changes - switch to basic layout for errors
 */
	public function beforeRender() {
		$this->_setTheme();
	}

/**
 * Refresh the logged in user's cookie
 */
	protected function _rememberMember() {
	    if ($this->params['action'] != 'logout') {
	        $this->RememberMe->checkUser();
	    }
	}

/**
 * Populates the configuration with the current subdomain's owner info
 */
	protected function _setOwner() {
		$subdomain = Configure::read('subdomain');
		if ($subdomain) {
			$this->loadModel('User');
			$owner = $this->User->find('first', array(
				'conditions' => array('User.subdomain' => $subdomain),
				'link' => array('Setting' => array('fields' => array('site_name', 'google_analytics'))),
				'fields' => array('User.id'),
			));
			Configure::write('owner', $owner['User']['id']);
			$this->set('owner', $owner);
		}
	}

/**
 * Configure your Auth environment here
 */
	protected function _setAuth() {
		$this->Auth->authError = __('Sorry, but you need to login to access this location.');
		$this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again');

		if (!$this->Plate->prefix('admin')) {
			$this->Auth->allow();
		}

		if ($this->Plate->prefix('admin') && $this->Auth->user('role') !== 'admin' && Configure::read('owner') !== $this->Auth->user('id')) {
			$this->Session->setFlash('You are not the owner of this account');
			$this->redirect('/');
		}

		if ($this->Plate->prefix('manager') && $this->Auth->user('role') !== 'admin') {
			$this->Session->setFlash('You do not have permission to access this section');
			$this->redirect('/');
		}
	}

/**
 * Place your language switching logic here (if you use it)
 */
	protected function _setLanguage() {
		if (isset($this->request->params['lang']) && $this->request->params['lang'] == Configure::read('Languages.default'))
			$this->redirect(array('lang' => false));
		$lang = isset($this->request->params['lang']) ? $this->request->params['lang'] : Configure::read('Languages.default');
		Configure::write('Config.language', $lang);
	}

/**
 * set site into Maintenance mode but not for loggeed user - allow users to login
 */
	protected function _setMaintenance() {
		$user = Configure::read('Site.User') ? Configure::read('Site.User') : false;
		$mainMode = Configure::read('WebmasterTools.Maintenance');
		if(!isset($user['AppUser']) && $this->request->action !== 'login') {
			if($mainMode['active']) {
				$this->Plate->loadComponent(array('WebmasterTools.Maintenance'));
				$this->Maintenance->activate($mainMode['message']);
			}
		}
	}

/**
 * Place your theme-switching logic in here
 */
	protected function _setTheme() {
		if ($this->viewClass !== 'Webservice.Webservice') {
			if ($this->Plate->prefix('admin')) {
				$this->viewClass = 'Theme';
				$this->theme = 'Admin';
			} elseif ($this->Plate->prefix('manager')) {
				$this->viewClass = 'Theme';
				$this->theme = 'Manager';
			} elseif (!Configure::read('owner')) {
				$this->viewClass = 'Theme';
				$this->theme = 'Main';
			} else {
				if (!Cache::read('navAccounts')) {
					$this->loadModel('Account');
					$this->Account->refreshNav();
				}
				$this->set('navAccounts', Cache::read('navAccounts'));
				if (!Cache::read('navResume')) {
					$this->loadModel('Account');
					$this->Account->Resume->refreshNav();
				}
				$this->set('navResume', Cache::read('navResume'));
				if (!Cache::read('navProjects')) {
					$this->loadModel('Account');
					$this->Account->Project->refreshNav();
				}
				$this->set('navProjects', Cache::read('navProjects'));
				if (!Cache::read('navBlog')) {
					$this->loadModel('Account');
					$this->Account->Post->refreshNav();
				}
				$this->set('navBlog', Cache::read('navBlog'));
				if (!Cache::read('navBookmarks')) {
					$this->loadModel('Account');
					$this->Account->Bookmark->refreshNav();
				}
				$this->set('navBookmarks', Cache::read('navBookmarks'));
				if (!Cache::read('navGallery')) {
					$this->loadModel('Account');
					$this->Account->Album->refreshNav();
				}
				$this->set('navGallery', Cache::read('navGallery'));
			}
		}
	}

/**
 * Added support for continuing localized urls
 *
 * @param string $url
 * @param string $status
 * @param string $exit  Sofer
 * @access public
 */
	public function redirect($url, $status = null, $exit = true) {
		if (is_array($url) && !isset($url['locale']) && isset($this->request->params['locale'])) {
			$url['locale'] = $this->request->params['locale'];
		}
		parent::redirect($url, $status, $exit);
	}

}