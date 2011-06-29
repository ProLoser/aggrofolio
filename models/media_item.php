<?php
class MediaItem extends AppModel {
	var $name = 'MediaItem';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a name',
			),
		),
		'album_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select an album',
			),
		),
		'uuid' => array(
			'rule' => 'isUnique',
			'message' => 'be unique dammit',
			'allowEmpty' => true,
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
		'UploadPack.Upload' => array(
			'attachment' => array(
				'path' => ':webroot/uploads/:style-:basename.:extension',
				'styles' => array(
					'thumb' => '200x160',
				),
			),
		),
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
			
			App::import('Core', 'HttpSocket');
			$socket = new HttpSocket();
			
			foreach ($mediaItems as $mediaItem) {
			
				$response = $socket->get('http://backend.deviantart.com/oembed', array('url' => $mediaItem['MediaItem']['link']));
				$response = json_decode($response, true);
				
				$data['MediaItem'] = array(
					'url' => $mediaItem['MediaItem']['link'],
					'name' => $mediaItem['MediaItem']['Title'][0],
					'description' => $mediaItem['MediaItem']['Description'][1]['value'],
					'uuid' => $mediaItem['MediaItem']['guid']['value'],
					'album_id' => $album['Album']['id'],
					'attachment' => $this->loadUrl($response['url']),
					'published' => $album['Album']['published'],
				);
				if (isset($album['Album']['project_id']))
					$data['MediaItem']['project_id'] = $album['Album']['project_id'];
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}
	
	/**
	 * Tricks the upload behavior into working with a file retrieved from a url instead of form POST
	 *
	 * @param string $url 
	 * @return array $datao
	 */
	public function loadUrl($url) {
		$name = array_pop(explode('/',$url));
		$path = CACHE . md5($name);
		$success = copy($url, $path);
		$data = array(
			'name' => $name,
			'tmp_name' => $path,
			'error' => (int) !$success,
			'size' => filesize($path),
			'type' => null,
		);
		// TODO: install finfo onto server and figure out why types area always null in db
		// $finfo = finfo_open();
		// $data['type'] = finfo_file($finfo, $path, FILEINFO_MIME_TYPE);
		// finfo_close($finfo);
		return $data;
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
		$options['fields'] = 'photos';
		if (!empty($album['Album']['uuid'])) {
			$options['conditions']['photoset_id'] = $album['Album']['uuid'];
		}
		$photos = $this->find('all', $options);
		debug($photos);die;
		if (isset($photos['photos'])) {
			
		}
		$this->useDbConfig = 'default';
		$count = 0;
		if (!empty($photos)) {
			foreach ($photos['photoset']['photo'] as $photo) {
				$data['MediaItem'] = array(
					'url' => sprintf('http://www.flickr.com/photos/%s/%s', $album['Account']['username'], $photo['id']),
					'name' => $photo['title'],
					'uuid' => $photo['id'],
					'album_id' => $album['Album']['id'],
					'attachment' => $this->loadUrl(sprintf('http://farm%s.static.flickr.com/%s/%s_%s.jpg', $photo['farm'], $photo['server'], $photo['id'], $photo['secret'])),
					'published' => $album['Album']['published'],
				);
				if (isset($album['Album']['project_id']))
					$data['MediaItem']['project_id'] = $album['Album']['project_id'];
				$this->create();
				$this->save($data);
				$count++;
			}
		}
		return $count;
	}
}
?>