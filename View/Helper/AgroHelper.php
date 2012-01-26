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
App::uses('AppHelper', 'View/Helper');
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
			'url' => 'http://www.last.fm/user/:name',
		),
		'grooveshark' => array(
			'name' =>'Grooveshark',
			'url' => 'http://grooveshark.com/#/:name',
		),
		'pandora' => array(
			'name' =>'Pandora',
			'url' => 'https://pandora.com/:name',
		),
		'facebook' => array(
			'name' =>'Facebook',
			'url' => 'https://facebook.com/:name',
		),
		'flickr' => array(
			'name' =>'Flickr',
			'url' => 'http://www.flickr.com/photos/:name',
		),
		'xmarks' => array(
			'name' =>'XMarks',
			'url' => 'https://xmarks.com/:name',
		),
		'jsfiddle' => array(
			'name' => 'JsFiddle',
			'url' => 'http://jsfiddle.net/user/:name/fiddles/',
		),
		'blog' => array(
			'name' => 'Blog',
			'url' => ':name',
		)
	);

	/**
	 * Called after the controller action is run, but before the view is rendered.
	 *
	 * @access public
	 */
	function beforeRender() {
		
	}
	
	function account($account, $options = array()) {
		$name = $this->types[$account['type']]['name'];
		$url = str_replace(':name', $account['username'], $this->types[$account['type']]['url']);
		return $this->Html->link($name, $url, $options);
	}
	
	/**
	 * Truncates a string based if a token is found and appends a 'Read More' link.
	 *
	 * @param string $content 
	 * @param mixed $target url to redirect the user with the readon link.
	 * @param array $options
	 * @return string
	 * @author Dean Sofer
	 */
	function truncate($content, $target = false, $options = array()) {
		$options = array_merge(array(
			'more' => 'Read More...',
			'token' => '<hr>',
			'wrapper' => 'footer',
			'striptags' => false,
		), $options);
		$pos = strpos($content, $options['token']);
		if ($pos === false) {
			if ($options['striptags']) {
				$content = strip_tags($content);
			}
			return $content;
		} else {
			$content = substr($content, 0, $pos);
			if ($options['striptags']) {
				$content = strip_tags($content);
			}
			if ($target) {
				$more = $this->Html->link($options['more'], $target, array('class' => 'readon'));
				if ($options['wrapper'])
					$more = $this->Html->tag($options['wrapper'], $more);
				$content .= $more;
			}
			return $content;
		}
	}
	
}