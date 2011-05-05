<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'mysql.holycrap.ws',
		'login' => 'holycrap',
		'password' => 'gamegod',
		'database' => 'deansofer',
	);
	
	var $codaset = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Codaset.Codaset',
	);
	
	var $github = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Github.Github',
	);
	
	var $rss = array(
		'datasource' => 'Rss.Rss',
		'cacheTime' => false,
	);
	
	var $flickr = array(
		'datasource' => 'Apis.Apis',
		'driver' => 'Flickr.Flickr',
		'login' => '80321c67bcc5f64e6322eceed5c887aa',
		'password' => 'f66a8cf28922ccd7',
	);
}
?>