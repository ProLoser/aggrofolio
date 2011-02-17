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

	var $linkedin = array(
		'datasource' => 'Linkedin.Linkedin',
		'login' => '1KqQhz25v7ne60NEPWhdZjIE8ET3cEijT0m0RvgqKqKpFEZHXjwX14Vz-Hp5hMQ6',
		'password' => 'ldmVbU9wn08ea6l9_2EkBQKXnwbjLOf0EfKjptHzc0U-8ldBYE7J1TDIFEt9e9H4',
	);

	var $github = array(
		'datasource' => 'Github.Github',
		'login' => 'root',
		'password' => '',
	);

	var $codaset = array(
		'datasource' => 'Codaset.Codaset',
		'login' => '697d33d8ba9a7d9e4c9838a39c218d509d6fdffed7fb7db52ba8ca195ee8ea36',
		'password' => '9b423b3cb1e273b092f7688f89e0426013cf62d16dce90193af0a7f098be7566',
	);

}
?>