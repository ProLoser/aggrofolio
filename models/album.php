<?php
class Album extends AppModel {
	var $name = 'Album';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'visible' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'MediaItem' => array(
			'className' => 'MediaItem',
			'foreignKey' => 'album_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function scanDevArtUser($username) {
		$user = 'thecritique';
		$page = sprintf('http://%s.deviantart.com/gallery/', $user);
		$link = array('tag' => 'a', 'class' => 'tv150-cover');
		$title = array('tag' => 'div', 'class' => 'tv150-tag');
		
		libxml_use_internal_errors(true);
		$doc = new DOMDocument();
		$doc->validateOnParse = true;
		$doc->loadHTMLFile($page);
		$subset = $doc->getElementById('output');
		$subset = simplexml_import_dom($subset)->asXML();
		$subset = simplexml_load_string($subset);
		$links = $subset->xpath(sprintf(
		    "//%s[@class='%s']",
		    $link['tag'],
		    $link['class']
		));
		$titles = $subset->xpath(sprintf(
		    "//%s[@class='%s']",
		    $title['tag'],
		    $title['class']
		));
		debug($links[0]);
		debug($titles);
		foreach ($links as $i => $link) {
			$link = $links[$i]->attributes();
			$title = $titles[$i]->attributes();
			debug($link);
			$folders[$link['href']] = $title[0];
		}
		
		debug($folders);
	}
	
	public function scanDevArtAlbum($user, $albumId = null) {
		$path = 'http://backend.deviantart.com/rss.xml?type=deviation&offset=0&q=gallery:' . $user;
		if ($albumId) {
			$path .= '/' . $albumId;
		}
	}

}
?>