<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @subpackage    cake.cake
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppHelper extends Helper {
	
	/**
	 * Specifies whether the url prefix should be left alone in array urls when unspecified
	 *
	 * @var boolean True: leave prefix in url, False: strip prefix from url if unset
	 */
	var $maintainPrefix = true;
	
	function _categories($row) {
		$model = key($row);
		$result = $this->HtmlPlus->link(
			$row[$model]['name'], 
			array('category' => $row[$model]['id']), 
			array('title' => strip_tags(str_replace('"', '\"', $row[$model]['description'])), 'id' => 'cat-' . $row[$model]['id'])
		);
		return $result;
	}
}
