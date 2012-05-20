<?php
/**
 * Routes Configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
Router::parseExtensions('json', 'xml', 'rss', 'ajax');

if (Configure::read('subdomain')) {
	Router::connect('/', array('controller' => 'activities', 'action' => 'index'));	
} else {
	Router::connect('/', array('controller' => 'users', 'action' => 'register'));
}
Router::connect('/asset/*', array('controller' => 'settings', 'action' => 'asset'));
Router::connect('/paginated', array('controller' => 'activities', 'action' => 'paginated'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/admin', array('admin' => true, 'controller' => 'posts', 'action' => 'index'));

Router::connect('/blog/*', array('controller' => 'posts'));

Router::connect('/gallery/album/*', array('controller' => 'media_items', 'action' => 'album'));
Router::connect('/gallery/*', array('controller' => 'albums', 'action' => 'index'));

/*
 * Want localization instead?
 *#!#/
App::uses('LocalizedRouter', 'BakingPlate.Lib');
LocalizedRouter::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
LocalizedRouter::localize();
/*^*/


/**
 * Asset Compress
 */
Router::connect('/cache_css/*', array('plugin' => 'asset_compress', 'controller' => 'css_files', 'action' => 'get'));
Router::connect('/cache_js/*', array('plugin' => 'asset_compress', 'controller' => 'js_files', 'action' => 'get'));

require CAKE . 'Config' . DS . 'routes.php';