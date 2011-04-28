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
		'Project',
	);

	var $hasMany = array(
		'PostRelationship' => array(
			'foreignKey' => 'foreign_key',
			'conditions' => array('PostRelationship.foreign_model' => 'MediaItem'),
		),
	);

	var $actsAs = array(
		'Log.Logable',
	);
	
	
	public function scan($albumId) {
		$album = $this->Album->find('first', array(
			'conditions' => array('Album.id' => $albumId), 
			'contain' => array('Account'),
		));
		if ($album['Account']['type'] == 'deviantart') {
			return $this->scanDevArtAlbum($album);
		} elseif ($album['Account']['type'] == 'flickr') {
			return $this->scanFlickr($album);
		}
	}

	public function scanDevArtAlbum($album) {
		$mediaItems = $this->fetchDevArt($album['Account']['username'], $album['Album']['uuid']);
		$count = 0;
		if (!empty($mediaItems)) {
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
				$count++;
			}
		}
		return $count;
	}
	
	public function fetchDevArt($user, $albumId = null) {
		$this->useDbConfig = 'rss';
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
	
	public function scanFlickr($album) {
		$this->useDbConfig = 'flickr';
		$photos = $this->find('all', array(
			'fields' => 'photos',
			'conditions' => array('photoset_id' => $album['Album']['uuid']),
		));
		$this->useDbConfig = 'default';
		$count = 0;
		if (!empty($photos)) {
			foreach ($photos['photoset']['photo'] as $photo) {
				$data['MediaItem'] = array(
					'url' => sprintf('http://www.flickr.com/photos/%s/%s', $album['Account']['username'], $photo['id']),
					'name' => $photo['title'],
					'uuid' => $photo['id'],
					'album_id' => $album['Album']['id'],
				);
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}
}
?>