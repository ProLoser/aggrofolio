<?php
class Account extends AppModel {
	var $name = 'Account';
	var $displayField = 'type';
	var $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	var $hasMany = array(
		'Project',
		'Resume',
		'ResumeEmployer',
		'ResumeSchool',
		'ResumeRecommendation',
		'ResumeSkill',
	);
	
	var $types = array(
		'github'		=> 'Github',
		'codaset'		=> 'Codaset',
		'linkedin'		=> 'LinkedIn',
		'deviantart'	=> 'DeviantArt',
		'goodreads'		=> 'GoodReads',
		'twitter'		=> 'Twitter',
		'lastfm'		=> 'LastFm',
		'grooveshark'	=> 'Grooveshark',
		'pandora'		=> 'Pandora',
		'facebook'		=> 'Facebook',
		'flickr'		=> 'Flickr',
		'xmarks'		=> 'XMarks',
	);
	
	var $actsAs = array(
		'Cacheable.Cacheable',
	);
}
?>