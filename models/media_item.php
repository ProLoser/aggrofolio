<?php
class MediaItem extends AppModel {
	var $name = 'MediaItem';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
			),
		),
		'album_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			),
		),
		'uuid' => array(
			'rule' => 'isUnique',
			'message' => 'be unique dammit',
		),
		'published' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
			),
		),
	);

	var $belongsTo = array(
		'Album',
	);
	
	
	public function scanDevArtAlbum($albumId) {
		$album = $this->Album->find('first', array(
			'conditions' => array('Album.id' => $albumId), 
			'contain' => array('Account'),
		));
		$mediaItems = $this->fetchDevArt($album['Account']['username'], $album['Album']['uuid']);
		foreach ($mediaItems as $mediaItem) {
			$data['MediaItem'] = array(
				'url' => $mediaItem['MediaItem']['link'],
				'name' => $mediaItem['MediaItem']['Title'][0],
				'description' => $mediaItem['MediaItem']['Description'][1]['value'],
				'uuid' => $mediaItem['MediaItem']['guid']['value'],
				'album_id' => $album['Album']['id'],
			);
			$this->create();
			$this->save($data);
		}
		return $mediaItems;
	}
	
	public function fetchDevArt($user, $albumId = null) {
		$this->useDbConfig = 'deviantart';
		$mediaItems = array();
		$offset = 0;
		$path = "http://backend.deviantart.com/rss.xml?type=deviation&offset=:offset&q=gallery:" . $user;
		if ($albumId) {
			$path .= '/' . $albumId;
		}
		$mediaItems = array();
		do {
			$this->feedUrl = str_replace(':offset', $offset, $path);
			$newItems = $this->find('all');
			$count = count($newItems);
			$mediaItems = array_merge($mediaItems, $newItems);
			$offset += $count;
		} while ($count > 0);
		$this->useDbConfig = 'default';
		return $mediaItems;
	}
}
?>