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
	
	var $linkedin = array(
		'datasource' => 'Rest.Rest',
		'driver' => 'Linkedin.Linkedin',
		'login' => '1KqQhz25v7ne60NEPWhdZjIE8ET3cEijT0m0RvgqKqKpFEZHXjwX14Vz-Hp5hMQ6',
		'password' => 'ldmVbU9wn08ea6l9_2EkBQKXnwbjLOf0EfKjptHzc0U-8ldBYE7J1TDIFEt9e9H4',
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