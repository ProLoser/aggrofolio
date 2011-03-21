<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'aggropholio',
	);
	
	var $codaset = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Codaset.Codaset',
	);
	
	var $github = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Github.Github',
	);
	
	var $deviantart = array(
		'datasource' => 'Rss.Rss',
	);
	
	var $rss = array(
		'datasource' => 'Rss.Rss',
	);
	
	var $flickr = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Flickr.Flickr',
		'login' => '80321c67bcc5f64e6322eceed5c887aa',
		'password' => 'f66a8cf28922ccd7',
	);
}
?>