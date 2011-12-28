<?php
class DATABASE_CONFIG {

	var $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql.holycrap.ws',
		'login' => 'holycrap',
		'password' => 'gamegod',
		'database' => 'deansofer',
	);
	
	var $linkedin = array(
		'datasource' => 'Linkedin.Linkedin',
		'login' => '1KqQhz25v7ne60NEPWhdZjIE8ET3cEijT0m0RvgqKqKpFEZHXjwX14Vz-Hp5hMQ6',
		'password' => 'ldmVbU9wn08ea6l9_2EkBQKXnwbjLOf0EfKjptHzc0U-8ldBYE7J1TDIFEt9e9H4',
	);
	
	var $codaset = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Codaset.Codaset',
		'login' => '697d33d8ba9a7d9e4c9838a39c218d509d6fdffed7fb7db52ba8ca195ee8ea36',
		'password' => '9b423b3cb1e273b092f7688f89e0426013cf62d16dce90193af0a7f098be7566',
	);
	
	var $github = array(
		'datasource' => 'Github.Github',
		'login' => '728139c3a2d13a537cd9',
		'password' => '6d29f8b32792dc0151f068acd52267b705fb437c',
	);
	
	var $rss = array(
		'datasource' => 'Rss.Rss',
		'cacheTime' => false,
	);
	
	var $flickr = array(
		'datasource' => 'Flickr.Flickr',
		'login' => '80321c67bcc5f64e6322eceed5c887aa',
		'password' => 'f66a8cf28922ccd7',
	);

	var $twitter = array(
		'datasource' => 'Twitter.Twitter',
		'login' => 'mrF3tJPeGCcOKkSBrRCOrQ',
		'password' => 'XlDQD61nr8RW1031Ah4GZvDLMBOa8blNRm4qLRBBDnE'
	);

	var $jsfiddle = array(
		'datasource' => 'Jsfiddle.Jsfiddle',
	);
}