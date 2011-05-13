<?php
/**
 * AgroHelper
 * 
 * [Short Description]
 *
 * @package Aggropholio
 * @author Dean Sofer
 * @version $Id$
 * @copyright Art Engineered
 **/

class AgroHelper extends AppHelper {

	/**
	 * An array containing the names of helpers this controller uses. The array elements should
	 * not contain the "Helper" part of the classname.
	 *
	 * @var mixed A single name as a string or a list of names as an array.
	 * @access protected
	 */
	var $helpers = array('Html');
	
	var $types = array(
		'github' => array(
			'name' => 'Github',
			'url' => 'https://github.com/:name',
		),
		'codaset' => array(
			'name' => 'Codaset',
			'url' => 'http://codaset.com/:name',
		),
		'linkedin' => array(
			'name' =>'LinkedIn',
			'url' => 'http://www.linkedin.com/profile/view?id=:name',
		),
		'deviantart' => array(
			'name' =>'DeviantArt',
			'url' => 'http://:name.deviantart.com/',
		),
		'goodreads' => array(
			'name' =>'GoodReads',
			'url' => 'https://github.com/:name',
		),
		'twitter' => array(
			'name' =>'Twitter',
			'url' => 'http://twitter.com/:name',
		),
		'lastfm' => array(
			'name' =>'LastFm',
			'url' => 'https://github.com/:name',
		),
		'grooveshark' => array(
			'name' =>'Grooveshark',
			'url' => 'https://github.com/:name',
		),
		'pandora' => array(
			'name' =>'Pandora',
			'url' => 'https://github.com/:name',
		),
		'facebook' => array(
			'name' =>'Facebook',
			'url' => 'https://github.com/:name',
		),
		'flickr' => array(
			'name' =>'Flickr',
			'url' => 'https://github.com/:name',
		),
		'xmarks' => array(
			'name' =>'XMarks',
			'url' => 'https://github.com/:name',
		),
	);

	/**
	 * Called after the controller action is run, but before the view is rendered.
	 *
	 * @access public
	 */
	function beforeRender() {
		
	}
	
	function account($account) {
		$name = $this->types[$account['type']]['name'];
		$url = str_replace(':name', $account['username'], $this->types[$account['type']]['url']);
		return $this->Html->link($name, $url, array('class' => $account['type']));
	}
	
	
}