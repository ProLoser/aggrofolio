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
			'actions' => array('admin_index'),
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
		// 'AutoLogin.AutoLogin',
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
	
	function beforeFilter() {
		$this->_setAuth();
		if ((Configure::read('subdomain') && $this->prefix == 'manager') || (!Configure::read('subdomain') && $this->prefix == 'admin')) {
			throw new NotFoundException();
		}
		#$this->_setLanguage();
		#$this->_setMaintenance();
	}
	
	
/**
 * Changes the layout of the page if the prefix changes - switch to basic layout for errors
 */
	function beforeRender() {
		$this->_setTheme();
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
			} elseif (!Configure::read('subdomain')) {
				$this->viewClass = 'Theme';
				$this->theme = 'Main';
			} else {
				if (!Cache::read('navAccounts')) {
					$this->loadModel('Account');
					$this->Account->refreshNav();
				}
				if (!Cache::read('google_analytics')) {
					$this->loadModel('Setting');
					$this->Setting->refreshCache('google_analytics');
				}
				if (!Cache::read('site_name')) {
					$this->loadModel('Setting');
					$this->Setting->refreshCache('site_name');
				}
				$this->set('navAccounts', Cache::read('navAccounts'));
				$this->set('google_analytics', Cache::read('google_analytics'));
				$this->set('site_name', Cache::read('site_name'));
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