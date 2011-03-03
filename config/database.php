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
		'datasource' => 'Codaset.Codaset',
	);
	
	var $github = array(
		'datasource' => 'Github.Github',
	);
	
	var $deviantart = array(
		'datasource' => 'Rss.Rss',
	);
}
?>