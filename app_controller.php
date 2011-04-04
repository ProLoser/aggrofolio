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
		'AssetCompress.AssetCompress',
		'Navigation.Navigation',
		'Analogue.Analogue' => array(
			array('helper' => 'BakingPlate.HtmlPlus', 'rename' => 'Html'),
			array('helper' => 'BakingPlate.FormPlus', 'rename' => 'Form'),
		),
	);
	var $components = array(
		'Session',
		'RequestHandler',
		'Batch.Batch',
		'BakingPlate.Plate',
		/* Auth Configuration *[delete me]/
		'Auth' => array(
			'fields' => array(
				'username' => 'username', 
				'password' => 'password',
			),
			'loginAction' => array('staff' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'login'),
			'logoutRedirect' => array('action' => 'login'),
			'loginRedirect' => '/',
			//'authorize' => 'actions', // TODO Install ACL component?
		),/**/
	);
	var $view = 'Theme';
	var $attributesForLayout = array(
		'id' => 'home',
		'class' => 'home'
	);
	var $descriptionForLayout = '';
	var $keywordsForLayout = '';
	// $_GET keyword to force debug mode. Set to false or delete to disable.
	var $debugOverride = 'debug';

	function beforeFilter() {
		//$this->_setupAuth();
		//$this->_setLanguage();
		//$this->_setStaticCache();
	}
	
	/**
	 * Changes the layout of the page if the prefix changes
	 *
	 * @return void
	 * @author Dean
	 */
	function beforeRender() {
		$this->_setTheme();
	}
	
	/**
	 * This allows the enabling of debug mode even if debug is set to off. 
	 * Simply pass ?debug=1 in the url
	 *
	 * @author Dean
	 */
	public function __construct() {
		if (!empty($this->debugOverride) && !empty($_GET[$this->debugOverride])) {
			Configure::write('debug', 2);
		}
		if (Configure::read('debug')) {
			// todo: add interactive for debugkit or not
			$this->components[] = 'DebugKit.Toolbar';
			App::import('Vendor', 'DebugKit.FireCake');
		}
		parent::__construct();
	}

	/**
	 * Added support for continuing localized urls
	 *
	 * @param string $url 
	 * @param string $status 
	 * @param string $exit 
	 * @return void
	 * @author Dean Sofer
	 * @access public
	 */
	public function redirect($url, $status = null, $exit = true) {
		if (is_array($url) && !isset($url['locale']) && isset($this->params['locale'])) {
			$url['locale'] = $this->params['locale'];
		}
		parent::redirect($url, $status, $exit);
	}
	
	/**
	 * Set site theme
	 *
	 * todo: make it work, set from Site.theme or passed arg
	 * 	plan to allow theme to be switched off pass false
	 * 	call no arg or null to set with Configure::read('Site.theme');
	 *	if prefix is used and matches a theme use it
	 *
	 * @param string $theme
	 * @return void
	 * @author Sam
	 */
	function _setTheme($theme = null) {
		if ($this->Plate->prefix('admin')) {
			$this->theme = 'admin';
		} else {
			// currently hard coding to h5bp for testing
			//$this->theme = $this->Session->read('Config.locale');
			if(Configure::read('site.Theme')) {
				$this->theme = Configure::read('site.Theme');
			}
		}
	}
	
	/**
	 * Configures the AuthComponent according to the application's settings.
	 * Override this method in individual controllers for further configuration.
	 *
	 * @return void
	 * @access private
	 */
	protected function _setupAuth() {
		if ($this->Plate->prefix('admin')) {
			// TODO Role levels shouldn't be hardcoded
			if ($this->Auth->user() && $this->Auth->user('role_id') < 1) {
				$this->Session->setFlash('You do not have permission to enter this section');
				$this->redirect($this->Auth->loginAction);
			}
		} else {
			$this->Auth->allow();
		}
	}
	
	/**
	 * Stores the visitors 2 letter language code to cookie AND session so that the url parameter is optional (and remembered)
	 *
	 * @return void
	 * @author Dean
	 */
	protected function _setLanguage() {
		if (isset($this->params['lang']) && $this->params['lang'] == Configure::read('Languages.default'))
			$this->redirect(array('lang' => false));
		$lang = isset($this->params['lang']) ? $this->params['lang'] : Configure::read('Languages.default');
		Configure::write('Config.language', $lang);
	}

}